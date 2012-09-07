<?php

class HoleAnswerResultsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/header_user';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'userGroupsAccessControl', // perform access control for CRUD operations
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
				'actions'=>array('create','update', 'order','view','index','delete','publish'),
				'groups'=>array('root', 'admin'), 
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new HoleAnswerResults;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HoleAnswerResults']))
		{
			$model->attributes=$_POST['HoleAnswerResults'];
			$model->ordering=$model->LastOrder+1;
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HoleAnswerResults']))
		{
			$model->attributes=$_POST['HoleAnswerResults'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']) && !isset($_POST['submit_mult']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}


	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new HoleAnswerResults('search');
		$model->unsetAttributes();  // clear any default values

		if (isset($_GET['pageSize'])) {
		Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
		unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}

		if(isset($_GET['HoleAnswerResults']))
			$model->attributes=$_GET['HoleAnswerResults'];

		$this->render('index',array(
			'model'=>$model,
		));
	}


	public function actionOrder($id)
		{
		        $model=$this->loadModel($id);

				if(!empty($_GET['dir']) && ($_GET['dir']=='up' || $_GET['dir']=='down' || $_GET['dir']=='movebefore'))
		        {
		                if($_GET['dir']=='up')
		                {
		                        $model->ordering=$model->ordering-1;
		                }

		                elseif($_GET['dir']=='down')
		                {
		                        $model->ordering=$model->ordering+1;
		                }

		                 elseif($_GET['dir']=='movebefore')
		                {
		                       $modelbefore=HoleAnswerResults::model()->findByPk($_GET['beforeid']);
		                       $modelafter=HoleAnswerResults::model()->findByPk($_GET['afterid']);		                       
		                       if ($modelbefore) $model->ordering=$modelbefore->ordering-1;
		                       else $model->ordering=$modelafter->ordering;

		                       if ($model->ordering==0)$model->ordering=1;
		                }

		                // we don't need to update the current record with a new sort order value
		                $vehicles=HoleAnswerResults::model()->findAll(array('condition'=>'id !='.$model->id, 'order'=>'ordering'));

		                if($model->ordering != 0 && $model->ordering <= count($vehicles)+1)
		                {
		                        $model->update();

		                        $i=1;
		                        foreach($vehicles as $vehicle)
		                        {
		                                if($i != $model->ordering)       // skip the record that holds the requested sort order value
		                                {
		                                        $vehicle->ordering=$i;   // assign new sort orders to these records
		                                }
		                                else
		                                {
		                                        $vehicle->ordering=$i+1; // add one to the sort order value of the record that holds the requested sort order value
		                                        $i++;                      // because we have already assigned the next ordering value above
		                                }

		                                $vehicle->update();
		                                $i++;
		                        }
		                }
		        }

		        else
		        {
		                $this->redirect(array('admin'));
		        }
		}

		public function actionItemsSelected()
		{
		if ($_POST['submit_mult']=='�������'){
			foreach ( $_POST['itemsSelected'] as $id){
				$this->actionDelete($id);
			}
		}

		if ($_POST['submit_mult']=='������������'){
			foreach ( $_POST['itemsSelected'] as $id){
				$model=HoleAnswerResults::model()->findbyPk($id);
				$model->published=1;
				$model->update();
			}
		}

		if ($_POST['submit_mult']=='����� � ����������'){
			foreach ( $_POST['itemsSelected'] as $id){
				$model=HoleAnswerResults::model()->findbyPk($id);
				$model->published=0;
				$model->update();
			}
		}

		$this->redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function actionPublish($id)
	{
		$model=$this->loadModel($id);
		if ($model->published) $model->published=0;
		else $model->published=1;
		$model->update();
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
		$model=HoleAnswerResults::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='hole-answer-results-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
