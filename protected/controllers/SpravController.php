<?php

class SpravController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/header_blank';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view','fill_gibdd_reference', 'fill_prosecutor_reference','local'),
				'users'=>array('*'),
			),		
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('add','update','delete', 'moderate'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	// склонятор
	public function sklonyator($str)
	{
		$nanoyandex_reply = file_get_contents('http://export.yandex.ru/inflect.xml?name='.urlencode($str));
		$pos = strpos($nanoyandex_reply, '<inflection case="3">');
		if($pos === false)
		{
			return $str;
		}
		$nanoyandex_reply = substr($nanoyandex_reply, $pos);
		$nanoyandex_reply = substr($nanoyandex_reply, 21, strpos($nanoyandex_reply, '</inflection>') - 21); // 21 = strlen('<inflection case="3">')
		return trim($nanoyandex_reply, "\n\t ");
	}	
	
	//local - использовать данные из сохранённых файлов
	//http://www.sai.gov.ua иногда перестаёт отвечать при частых запросах, поэтому предпочтительнее использовать локальные копии
	public function actionFill_gibdd_reference($local=1)
	{
		set_time_limit(0);
		// список номеров областей http://www.sai.gov.ua/ru/regions.htm
		
		$_gibdd=array();
		for ($i=1; $i<=25; $i++) {
			$data=array('isajax'=>'true', 'module'=>'regions', 'showid'=>$i);
			$context=stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL .
								'Accept-Charset: windows-1251,utf-8'. PHP_EOL .
								'Cookie: PHPSESSID=040871b5897bc61d4392d7adb586d843; b=b; __utma=203730194.478985925.1333561827.1334640103.1334740301.6; __utmb=203730194.4.10.1334740301; __utmc=203730194; __utmz=203730194.1333561827.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)'.PHP_EOL .
								'X-Requested-With: XMLHttpRequest'. PHP_EOL .
								'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.162 Safari/535.19'. PHP_EOL .
								'Referer: http://www.sai.gov.ua/ru/regions.htm'. PHP_EOL .
								'Accept-Encoding: gzip,deflate,sdch'. PHP_EOL,
					'content' => http_build_query($data),
				),
			));
					
			if ($local=='0') $text=file_get_contents('http://www.sai.gov.ua/index.php?lang=ru',$use_include_path = false, $context);
			else $text=file_get_contents(Yii::app()->basePath.'/gibdd/'.$i.'.txt');
			
			preg_match_all('/<.*?>\s*(.*\sобласть|.*Крым.*)\s*<\/.*?>/U',$text,$matches);	//названия областей
			$_gibdd['region']=trim(strip_tags(preg_replace('/г.Киев и/U','',$matches[1][0])));
			
			//название подразделения
			preg_match_all('/<p>\s*(.*ГАИ.*\s(области|Крым))\s*.*<\/p>\s*<p>\s*(.*)\s*<\/p>\s*<p>\s*(.*\s*.*)<\/p>/U',$text,$matches);
			$_gibdd['department']=trim(strip_tags($matches[1][0]));
			$t=trim(preg_replace('/(Адрес:)|(&nbsp;)/U','',$matches[3][0]));
			if (!strlen($t)) $_gibdd['address']=trim($matches[4][0]);
			else $_gibdd['address']=$t;
			
			//телефон
			preg_match_all('/<p>\s*Телефон\s.*(<\/p>\s*<p>|<br\s*.*>)\s*(.*)<\/p>/U',$text,$matches);
			$_gibdd['phone']=trim($matches[2][0]);
			
			//ссылка
			preg_match_all('<a\s*href="(.*)">',$text,$matches);
			$_gibdd['url']=trim($matches[1][0]);
		
			$gibdd[]=$_gibdd;
		}

		//Заполнение списка регионов
		foreach ($gibdd as $g) {
			//проверяем существование региона
			$region=RfSubjects::model()->find('name_full LIKE :name',array(':name'=>'%'.$g['region'].'%'));
			if (!$region) {
				$region=new RfSubjects();
				$region->name_full=$g['region'];
				$region->save(false);
			}
			
			//ищем запись с главами гибдд
			$model=GibddHeads::model()->find('subject_id=:s_id',array(':s_id'=>$region->id));
			if (!$model) $model=new GibddHeads();
			$model->setAttributes(array(
				'name'=>$g['region'],
				'subject_id'=>$region->id,
				'is_regional'=>1,
				'moderated'=>1,
				'post'=>'Начальник',
				'post_dative'=>'Начальнику '.$g['department'],
				'gibdd_name'=>$g['department'],
				'address'=>$g['address'],
				'tel_degurn'=>$g['phone'],
				'url'=>$g['url'],
			));
			$model->save(false);
			//echo $region->id;
			//get RFSubject id;
		}
		
		Yii::app()->user->setFlash('user', 'Справочник загружен');
		$this->redirect(array('sprav/index'));
	}	

	public function actionFill_prosecutor_reference(){
		set_time_limit(0);
		$raw_html = file_get_contents('http://genproc.gov.ru/structure/subjects/');
		preg_match_all('`<select([\s\S]+)</select>`U', $raw_html, $_matches);
		preg_match_all('`<option value="([\d]+)"[\s\S]*>([\s\S]+)</option>`U', $_matches[0][0], $_matches, PREG_SET_ORDER);
		
		//$_matches = array ( 0 => array ( 0 => '', 1 => '110', 2 => 'Центральный федеральный округ', ), 1 => array ( 0 => '', 1 => '111', 2 => 'Северо-Западный федеральный округ', ), 2 => array ( 0 => '', 1 => '112', 2 => 'Южный федеральный округ', ), 3 => array ( 0 => '', 1 => '241', 2 => 'Северо-Кавказский федеральный округ', ), 4 => array ( 0 => '', 1 => '113', 2 => 'Приволжский федеральный округ', ), 5 => array ( 0 => '', 1 => '114', 2 => 'Уральский федеральный округ', ), 6 => array ( 0 => '', 1 => '115', 2 => 'Сибирский федеральный округ', ), 7 => array ( 0 => '', 1 => '116', 2 => 'Дальневосточный федеральный округ', ), 8 => array ( 0 => '', 1 => '242', 2 => 'Центральный аппарат', ), );
		
		foreach($_matches as &$set)
		{
			$raw_html = file_get_contents('http://genproc.gov.ru/structure/subjects/district-'.$set[1].'/');
			if(!$raw_html)
			{
				echo $set[1].' - fail<br>';
				continue;
			}
			$raw_html = substr($raw_html, strpos($raw_html, '<dl class="institutions">'));
			$raw_html = explode('<div>', $raw_html);
			foreach($raw_html as &$office)
			{
				
				
				
				$office = explode('</a>', $office);
				if($office[1])
				{
					$office[0] = strip_tags($office[0]);
					$subjects = explode("\n", $office[0]);
					//print_r($subjects);
					if (isset($subjects[2])){
					$itemname=$subjects[2];
					$subjects[1]=preg_replace('/\(.*\)/i', '', $subjects[1]);
					$subjectmodel = RfSubjects::model()->find("name_full LIKE '%".trim($subjects[1])."%'");
					if ($subjectmodel) $subject=$subjectmodel->id;
					else $subject=$subject=RfSubjects::model()->SearchID($subjects[1]);
					}
					else {
						$itemname=$subjects[0];
						$subject=0;
						}
					
					$r['name'] = trim(str_replace("\n", ' ', str_replace("\t", ' ', $office[0])));
					$r['gibdd_name'] = trim(str_replace("\n", '', str_replace("\t", '', $itemname)));
					$r['preview_text'] = trim(str_replace("\t", ' ', strip_tags($office[1], '<br>')));
					$r['subject_id']=$subject;
					
					$model=Prosecutors::model()->find('subject_id='.(int)$subject);
					if (!$model) $model=new Prosecutors;		
					$model->attributes=$r;
					$model->save();					
				}
			}
			echo $set[1].' - ok<br>';
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionLocal($id)
	{
	
		$cs=Yii::app()->getClientScript();
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/hole_view.css'); 
        $cs->registerScriptFile('http://api-maps.yandex.ru/1.1/index.xml?key='.$this->mapkey);
       	$jsFile = CHtml::asset($this->viewPath.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'view_script.js');
        $cs->registerScriptFile($jsFile); 
		
		$this->render('view_local',array(
			'model'=>$this->loadGibddModel($id),
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=RfSubjects::model()->with('gibdd')->findAll(Array('order'=>'t.region_num','together'=>true));
		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	public function actionAdd()
	{
		$model=new GibddHeads;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$cs=Yii::app()->getClientScript();
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/add_form.css');
        $cs->registerScriptFile('http://api-maps.yandex.ru/1.1/index.xml?key='.$this->mapkey);
        $jsFile = CHtml::asset($this->viewPath.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'ymap.js');
        $cs->registerScriptFile($jsFile);     

		if(isset($_POST['GibddHeads']))
		{
			$model->attributes=$_POST['GibddHeads'];
			$model->author_id=Yii::app()->user->id;	
			$model->created=time();
			$subj=RfSubjects::model()->SearchID(trim($model->str_subject));
			if($subj) $model->subject_id=$subj;
			else $model->subject_id=0;
			if (Yii::app()->user->level > 50) $model->moderated=1;
			else $model->moderated=0;
			if($model->save())
				$this->redirect(array('local','id'=>$model->id));
		}		

		$this->render('add',array(
			'model'=>$model,			
		));
	}	
	
	public function actionUpdate($id)
	{
	
		$model=$this->loadGibddModel($id);
		
		if (Yii::app()->user->id!=$model->author_id && Yii::app()->user->level <= 50)
			throw new CHttpException(403,'Доступ запрещен.');
		
		
		$cs=Yii::app()->getClientScript();
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/add_form.css');
        $cs->registerScriptFile('http://api-maps.yandex.ru/1.1/index.xml?key='.$this->mapkey);
        $jsFile = CHtml::asset($this->viewPath.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'ymap.js');
        $cs->registerScriptFile($jsFile);     

		if(isset($_POST['GibddHeads']))
		{
			$model->attributes=$_POST['GibddHeads'];
			$model->modified=time();
			if ($model->str_subject){
				$subj=RfSubjects::model()->SearchID(trim($model->str_subject));
				if($subj) $model->subject_id=$subj;
				else $model->subject_id=0;
			}
			if($model->save())
				$this->redirect(array('local','id'=>$model->id));
		}		

		$this->render('update',array(
			'model'=>$model,			
		));
	}
	
	public function actionModerate($id)
	{	
		$model=$this->loadGibddModel($id);
		if (!Yii::app()->user->isModer && $model->author_id!=Yii::app()->user->id)
				throw new CHttpException(403,'Доступ запрещен.');	
		$model->moderated=1;
		$model->update();
		if(!isset($_GET['ajax']))
			$this->redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function actionDelete($id)
	{
		$model=$this->loadGibddModel($id);
		
		if (!Yii::app()->user->isModer && $model->author_id!=Yii::app()->user->id)
				throw new CHttpException(403,'Доступ запрещен.');	
			
		$model->delete();

		if(!isset($_GET['ajax']))
				$this->redirect($_SERVER['HTTP_REFERER']);
	}
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=RfSubjects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadGibddModel($id)
	{
		$model=GibddHeads::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
