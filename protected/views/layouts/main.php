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
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/template_styles.css?v=<?php echo rand(); ?>" />
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

            <div class="change-language">

                <?php if(Yii::app()->language == "ru"):?>
                <a href="#" onclick="changeLanguage('ua');" class="ukr">Українською</a>
                 <?php else: ?>
                 <a href="#" onclick="changeLanguage('ru');" class="ru">По-русски</a>
                     <?php endif;?>
            </div>
            <a href="<?php echo $this->createUrl('site/page',array('view'=>'donate'))?>" class="help-link">Помочь проекту</a>
            
			<div class="search">
				<form action="/map">
			<input type="image" name="s" src="<?php echo Yii::app()->request->baseUrl; ?>/images/search_btn.gif" class="btn" /><input type="text" class="textInput inactive" name="q"  value="" />
			<span class="placeholder"><?php echo Yii::t("template", "FIND_BY_ADRESS");?></span>
	</form>
			</div>
            <?php if ((Yii::app()->getController()->getAction()->controller->getId() != 'holes') || (Yii::app()->getController()->getAction()->controller->action->id != 'index')): ?>
                <div class="add-yama-container">
                    <?php echo CHtml::link('<span>Додати дефект</span>',Array('/holes/add')); ?>
                </div>
            <?php endif;?>
			<div class="auth">
			<?php if(!$this->user->isGuest) : ?>
					<div class="name">
						<p>
                            <?php echo CHtml::link($this->user->fullname,Array('/holes/personal')); ?>
                            <?php echo CHtml::link('',Array('/site/logout'),Array('title'=>Yii::t("template", "LOGOUT"), 'class' => 'logout')); ?>
                        </p>
                        <span class="grad"></span>
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
	<div class="bottom-content clearfix">
		<div class="r-col">
			<ul class="socbuttons">
				<li class="rss"><noindex><a href="http://ukryama.info/rss/new/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="RSS" class="quimby_search_image"></a></noindex></li>
				<li class="twitter"><noindex><a href="http://twitter.com/ukryama" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="Twitter" class="quimby_search_image"></a></noindex></li>
				<li class="vkontakte"><noindex><a href="http://vkontakte.ru/ukryama" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="VKontakte" class="quimby_search_image"></a></noindex></li>
				<li class="facebook"><noindex><a href="http://www.facebook.com/ukryama" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="Facebook" class="quimby_search_image"></a></noindex></li>
			</ul>
			<ul class="small-menu">
				<li>Информація:</li>
				<li><a href="<?php echo $this->createUrl('site/page',array('view'=>'donate'))?>">Допомогти проекту</a></li>
				<li><a href="http://ukryama.info/" target="_blank">Спільнота</a></li>
				<li><a href="<?php echo $this->createUrl('site/page',array('view'=>'partners'))?>">Партнери</a></li>
				<li><a href="<?php echo $this->createUrl('site/page',array('view'=>'thanks'))?>">Подяка</a></li>
				<li><a href="<?php echo $this->createUrl('site/page',array('view'=>'smi'))?>">ЗМІ</a></li>
			</ul>
		</div>
		<div class="l-col">
			<div class="twitter-widget-wrap">
				<script src="http://widgets.twimg.com/j/2/widget.js"></script>
				<style type="text/css" media="screen">
					.twtr-ft{
						background:#0ac0f5;
					}
					.twtr-hd {padding:0}
					#twtr-widget-1 div.twtr-doc {background:#fff !important}
					.twtr-timeline, .twtr-doc {}
					.twtr-widget {background: #fff; margin-bottom: 30px; padding: 10px 15px 0}
					.twtr-ft img {display:none}
					.twtr-ft span {float:none}
					.twtr-ft .twtr-join-conv {display:inline; color:#1985b5 !important; font-size: 11px;}
				</style>
				<noindex><script>
					new TWTR.Widget({
					version: 2,
					type: 'search',
					search: 'ukryama',
					interval: 6000,
					title: '',
					subject: '',
					width: 219,
					height: 313,
					theme: {
						shell: {
							background: '#ececec',
							color: '#ffffff'
						},
						tweets: {
							background: '#ffffff',
							color: '#444444',
							links: '#1985b5'
						}
					},
					features: {
						scrollbar: false,
						loop: true,
						live: true,
						hashtags: true,
						timestamp: true,
						avatars: true,
						toptweets: true,
						behavior: 'default'
					}
					}).render().start();
				</script></noindex>
			</div>
			<div class="social-widgets-wrap">
				<div class="socialGroups">
		<script src="http://widgets.twimg.com/j/2/widget.js"></script>
			<ul id="groupSwitch">
				<li><noindex><a href="/" id="fb" class="active">Faceboo<span class="l"></span><span class="r"></span>k</a></noindex></li>
				<li><noindex><a href="/" id="vk">Вконтакте<span class="l"></span><span class="r"></span></a></noindex></li>
			</ul>
			<ul id="groupsWrap">
					<li id="fb">
						<noindex><iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fukryama&amp;width=468&amp;height=281&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;appId=264274036927475" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:468px; height:281px;" allowTransparency="true"></iframe></noindex> 
					</li>
					<li id="vk">
						<!-- VK Widget -->
						<div id="vk_groups" style="width: 468px; background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; height: 290px; background-position: initial initial; background-repeat: initial initial; "><noindex><iframe name="fXDdef69" frameborder="0" src="http://vkontakte.ru/widget_community.php?app=2472807&amp;width=468px&amp;gid=25318995&amp;mode=0&amp;height=290&amp;url=http%3A%2F%2Fukryama.com%2F" width="468px" height="200" scrolling="no" id="vkwidget1" style="overflow-x: hidden; overflow-y: hidden; height: 432px; "></iframe></noindex></div>
						<script>
							var widget_vk_height = 290;
							var widget_vk_width = 468;
							VK.Widgets.NewGroup = function(objId, options, gid) {
								VK.Widgets.Group(objId, options, gid);
								return this.count;
							};
							//all creating widget
							var widget_id = VK.Widgets.NewGroup("vk_groups", {
								mode	:	0,
								width	:	widget_vk_width,
								height	:	widget_vk_height
							}, 30251259);
							
							$(function() {
								var vk_groups_iframe = $("#vk_groups").find("iframe");
								$("#groupsWrap #vk").click(function(){
									VK.Widgets.RPC[widget_id].methods.resize(widget_vk_height);
								});
								vk_groups_iframe.attr("src", vk_groups_iframe.attr("src"));
							});	
						</script>
						</li>
					</ul>
				</div>	
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<p class="rosyama">
				<noindex><a class="rs" target="_blank" href="http://rosyama.ru/" title="РосЯма">РосЯма</a></noindex><br>Яму мне запили!<br/>			
				 
			</p>
			<p class="copy">Идея — <noindex><a href="http://navalny.ru/">Алексей Навальный</a></noindex>, 2011<br />
			Хостинг — «<noindex><a href="http://ihc.com.ua/" target="_blank">ihc</a></noindex>»<br />
			<span class="studio-copyright">Дизайн — веб-студия </noindex><a href="http://stfalcon.com"><span class="icon"></span>stfalcon.com</a></noindex></span>
			Разработано в <a href="http://pixelsmedia.ru">Pixelsmedia</a> на Yii.<br/>
			<a href="http://novus.org.ua/" style="background:none;" class="notus-logo" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo-novus.png"></a>
			</p>
			<?php if($this->beginCache('countHoles', array('duration'=>3600))) { ?>
			
			<?php $this->widget('application.widgets.collection.collectionWidget'); ?>		

			<?php $this->endCache(); } ?>
			<p class="friends">Информация:<br />
				<a href="http://ukryama.info" target="_blank">Сообщество</a><br />
				<a href="<?php echo $this->createUrl('site/page',array('view'=>'partners'))?>" title="Наши партнеры">Партнеры</a><br />
				<a href="<?php echo $this->createUrl('site/page',array('view'=>'thanks'))?>" title="Все те, кто нам помог">Благодарности</a><br />
				<a href="<?php echo $this->createUrl('site/page',array('view'=>'smi'))?>" title="Сми об «УкрЯме»">СМИ</a><br />
			</p>
			<p class="info"></p>
		</div>
	</div>
	
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
