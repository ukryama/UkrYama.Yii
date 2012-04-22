<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="ru" />
<meta name="copyright" content="ukryama" />
<meta name="robots" content="index, follow" />
<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/template_styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie.css" type="text/css" /><![endif]-->


<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?22"></script>

<script type="text/javascript">VK.init({apiId: 2232074, onlyWidgets: true});</script>

</head>

<body>

<script type="text/javascript">
					$(document).ready(function(){
						if ($('.name  a').width()>$('.auth .name').width())
							{
								$('.grad').show()
							}


					})


                    //$(".change-language").click( function(){
                     function changeLanguage($lang){

                        //$lang = $(this).attr("lang");
                        var theDate = new Date();
                        var oneWeekLater = new Date(theDate.getTime() + 1000 * 60 * 60 * 24 * 100);
                        var expiryDate = oneWeekLater.toString();

                        document.cookie = 'prefLang=' + $lang + '; expires=' + expiryDate + '; path=/;';

                        $.ajax({
                            type: "POST",
                            url: "<?php echo $this->createUrl("site/changelang")?>",
                            cache: false,
                            data: "lang="+$lang,
                            dataType: "html",
                            timeout: 5000,
                            success: function (data) {
                                window.location.reload();
                            }
                        });



                         return false;

                    }
				</script>

<div class="wrap">
<div class="navigation">
		<div class="container">
			<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'О проекте', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Карта', 'url'=>array('/holes/map')),
				//array('label'=>'Нормативы', 'url'=>array('/site/page', 'view'=>'regulations')),
				//array('label'=>'Статистика', 'url'=>array('/statics/index')),
				//array('label'=>'FAQ', 'url'=>array('/site/page', 'view'=>'faq')),
				//array('label'=>'Сообщество', 'url'=>array('/sprav/index')),
				array('label'=>Yii::t("template", "MENU_TOP_ABOUT"), 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>Yii::t("template", "MENU_TOP_MAP"), 'url'=>array('/holes/map')),
				array('label'=>Yii::t("template", "MENU_TOP_STANDARDS"), 'url'=>array('/site/page', 'view'=>'regulations')),
				array('label'=>Yii::t("template", "MENU_TOP_STATISTICS"), 'url'=>array('/statics/index')),
				array('label'=>Yii::t("template", "MENU_TOP_FAQ"), 'url'=>array('/site/page', 'view'=>'faq')),
				array('label'=>Yii::t("template", "MENU_TOP_MANUALS"), 'url'=>array('/sprav/index')),
				//array('label'=>'Logout ('.$this->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!$this->user->isGuest)
			),
			'htmlOptions'=>array('class'=>'menu'), 
			'firstItemCssClass'=>'first',
			'activeCssClass'=>'selected',
		)); ?>

            <div style="float: left; margin-right: 10px;padding-top: 3px; cursor: pointer;">

                <?php if(Yii::app()->language == "ru"):?>
                <a href="#" onclick="changeLanguage('ua');"><img src="/images/flags/ua.png" alt="Українською" lang="ua" class="change-language" ></a>
                 <?php else: ?>
                 <a href="#" onclick="changeLanguage('ru');"><img src="/images/flags/ru.png" alt="По-русски"  lang="ru" class="change-language"></a>
                     <?php endif;?>
            </div>

            
			<div class="search">
				<form action="/map">
			<input type="image" name="s" src="<?php echo Yii::app()->request->baseUrl; ?>/images/search_btn.gif" class="btn" /><input type="text" class="textInput inactive" name="q"  value="<?php echo Yii::t("template", "FIND_BY_ADRESS");?>" />
	<script type="text/javascript">
		$(document).ready(function(){
			var startSearchWidth=$('.search').width();
			var startSearchInputWidth=$('.search .textInput').width();
			var time=200;
			
							var searchWidth=230;
				var	searchInputWidth=searchWidth-30;
				
										searchInputWidth-=47;
				searchWidth-=47;
							if ($.browser.msie && $.browser.version == 9) {
					searchInputWidth+=5;
					searchWidth+=5;
					}
				$('.search .textInput').click(function(){
					if ($(this).val()=='<?php echo Yii::t("template", "FIND_BY_ADRESS");?>')
					{
						$(this).val('').removeClass('inactive');
					}
					$('.search').animate({width:searchWidth},time);
					$('.search .textInput').animate({width:searchInputWidth},time);
				})
				$('.search .textInput').blur(function(){
					
					if ($(this).val()=='')
					{
						$(this).val('<?php echo Yii::t("template", "FIND_BY_ADRESS");?>').addClass('inactive');
					}
					$('.search').animate({width:startSearchWidth},time);
					$('.search .textInput').animate({width:startSearchInputWidth},time);
				})
			})
	</script>
	</form>
			</div>
			<div class="auth">
			<?php if(!$this->user->isGuest) : ?>
					<?php echo CHtml::link('<img src="'.Yii::app()->request->baseUrl.'/images/logout.png" alt="'.Yii::t("template", "LOGOUT").'" />',Array('/site/logout'),Array('title'=>Yii::t("template", "LOGIN"))); ?>
					<div class="name">
						<p><?php echo CHtml::link($this->user->fullname,Array('/holes/personal')); ?></p><span class="grad"></span>
					</div>
				<?php else: ?>
					<?php echo CHtml::link(Yii::t("template", "LOGIN"),Array('/holes/personal'),Array('title'=>Yii::t("template", "LOGOUT"), 'class'=>'profileBtn')); ?>
				<? endif; ?>
					<style type="text/css">
						.auth .name
						{
							width: 150px !important;
						}
						
					</style>
					
			</div>
		</div>
	</div>	
		<?php echo $content; ?>

	<div class="footer">
		<div class="container">
			<p class="rosyama">
				<noindex><a target="_blank" href="http://rosyama.ru/" title="РосЯма">РосЯма</a></noindex><br>Яму мне запили!<br/>			
				<a href="http://novus.org.ua/" style="background:none;" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo-novus.png"></a> 
			</p>
			<p class="copy">Идея - <noindex><a href="http://navalny.ru/">Алексей Навальный</a></noindex>, 2011<br />
			Дизайн </noindex><a href="http://greensight.ru">Greensight</a></noindex>. <br/>
			Хостинг — «<noindex><a href="http://ihc.com.ua/" target="_blank">ihc</a></noindex>»<br />
			
			<br/>Разработано в <a href="http://pixelsmedia.ru">Pixelsmedia</a><br/>
			Powered by Yii Framework.
			<br />
			
			</p>
			<?php if($this->beginCache('countHoles', array('duration'=>3600))) { ?>
			<?php $this->widget('application.widgets.collection.collectionWidget'); ?>			
			<?php $this->endCache(); } ?>
			<p class="friends">Информация:<br />
				<a href="<?php echo $this->createUrl('site/page',array('view'=>'donate'))?>">Помочь проекту</a><br />
				<a href="http://ukryama.info" target="_blank">Сообщество</a><br />
				<a href="<?php echo $this->createUrl('site/page',array('view'=>'partners'))?>" title="Наши партнеры">Партнеры</a><br />
				<a href="<?php echo $this->createUrl('site/page',array('view'=>'thanks'))?>" title="Все те, кто нам помог">Благодарности</a><br />
				<a href="<?php echo $this->createUrl('site/page',array('view'=>'smi'))?>" title="Сми об «УкрЯме»">СМИ</a><br />
			</p>
			<p class="info"></p>
		</div>
	</div>
	
<!--	<script type="text/javascript">
                var reformalOptions = {
                        project_id: 43983,
                        project_host: "rosyama.reformal.ru",
                        force_new_window: false,
                        tab_alignment: "left",
                        tab_top: "316",
                        tab_image_url: "http://reformal.ru/files/images/buttons/reformal_tab_orange.png"
                };
                (function() {
                        if ('https:' == document.location.protocol) return;
                        var script = document.createElement('script');
                        script.type = 'text/javascript';
                        script.src = 'http://media.reformal.ru/widgets/v1/reformal.js';
                        document.getElementsByTagName('head')[0].appendChild(script);
                })();
        </script>
               	-->
	
<!--	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-21943923-3']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script> 
	-->
	<? if (!$this->user->isGuest && $flash=$this->user->getFlash('user')):?>
		<div id="addDiv">
			<div id="fon">
			</div>
			<div id="popupdiv">
			<?php echo ($flash); ?>			
				 <span class="filterBtn close">
					<i class="text">Продолжить</i>
				 </span>
			</div>
		</div>
		
		<script type="text/javascript">
		$(document).ready(function(){				
			$('.close').click(function(){
				$('#popupdiv').fadeOut(400);
				$('#fon').fadeOut(600);
				$('#addDiv').fadeOut(800);
			})
		})
	
		</script>
	<?endif?>
	
	</body>
	</html>