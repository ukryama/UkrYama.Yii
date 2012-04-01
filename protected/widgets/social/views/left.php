<div id="from_blog">
	<script src="http://www.google.com/jsapi?key=internal-sample" type="text/javascript"></script>
	<script language="Javascript" type="text/javascript">//<![CDATA[
		google.load("feeds", "1");
		function OnLoad() {
		var feedControl = new google.feeds.FeedControl();
		feedControl.addFeed("http://ukryama.info/rss/", "<h2>Сообщество УкрЯмы</h2>Новости:");
		feedControl.setNumEntries(4)
		feedControl.setLinkTarget(google.feeds.LINK_TARGET_BLANK );
		feedControl.draw(document.getElementById("feedControl"));
		}
		google.setOnLoadCallback(OnLoad);
	//]]>
	</script> 
	<div id="feedControl">Загрузка постов…</div>
</div>



<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<style type="text/css" media="screen">
		.twtr-hd {padding:0}
		#twtr-widget-1 div.twtr-doc {background:#fff !important}
		.twtr-timeline, .twtr-doc {border-radius:0}
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
		width: 185,
		height: 300,
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
	<div class="socialGroups">
		<script src="http://widgets.twimg.com/j/2/widget.js"></script>
			<ul class="socbuttons">
				<li class="facebook"><noindex><a href="http://www.facebook.com/ukryama" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="Facebook" class="quimby_search_image"></a></noindex></li>
				<li class="vkontakte"><noindex><a href="http://vkontakte.ru/ukryama" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="VKontakte" class="quimby_search_image"></a></noindex></li>
				<li class="twitter"><noindex><a href="http://twitter.com/ukryama" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="Twitter" class="quimby_search_image"></a></noindex></li>
				<li class="join"> — join</li>
				<li class="rss"><noindex><a href="http://ukryama.info/rss/new/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl?>/images/social_icons.png" alt="RSS" class="quimby_search_image"></a></noindex></li>
			</ul>

			<ul id="groupSwitch">
				<li><noindex><a href="/" id="fb" class="active">Facebook</a></noindex></li>
				<li><noindex><a href="/" id="vk">Вконтакте</a></noindex></li>
			</ul>

			<ul id="groupsWrap">
						<li id="fb">
							<noindex><iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fukryama&amp;width=230&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;appId=264274036927475" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:230px; height:258px;" allowTransparency="true"></iframe></noindex> 
						</li>
						<li id="vk">
							<!-- VK Widget -->
							<div id="vk_groups" style="width: 220px; background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; height: 290px; background-position: initial initial; background-repeat: initial initial; "><noindex><iframe name="fXDdef69" frameborder="0" src="http://vkontakte.ru/widget_community.php?app=2472807&amp;width=242px&amp;gid=25318995&amp;mode=0&amp;height=290&amp;url=http%3A%2F%2Fukryama.com%2F" width="220px" height="200" scrolling="no" id="vkwidget1" style="overflow-x: hidden; overflow-y: hidden; height: 432px; "></iframe></noindex></div>
							<script>
								var widget_vk_height = 290;
								var widget_vk_width = 220;
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

	
<div class="like">
		<noindex><script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="vkontakte,facebook,twitter,lj"></div></noindex><br />
	<div id="banner_ap">
	<!--	<div class="banner_yama">
			<span class="">Партнер:</span><br />
			<noindex><a href="http://autoportal.ua/" target="_blank" rel="nofollow"><img src="/banners/ap-bann-215x111.png" alt="" /></a></noindex>
		</div>
		<br />
		<div id="partners">
			SSL сертификаты и <a href="http://www.isplicense.ru/" target="_blank">лицензии ПО</a>
		</div> -->
	</div>
</div>
	
<script type="text/javascript">
$(document).ready(function(){
	$('#groupSwitch a').click(function(){
	var $target = $(event.target);
	if($target.className != "active") {
		$('#groupSwitch a').removeClass('active');
		$target.addClass('active');
		$('#groupsWrap li').hide();
		$('#groupsWrap #' + event.target.id).show();
		if(event.target.id=="vk") {
			$('#groupsWrap #' + event.target.id + ' #vk_groups').css('height','290px');
			$('#groupsWrap #' + event.target.id + ' iframe').css('height','290px');
		}
	}
	return false;
	});
});	
</script>
	
	
	<!--
	
	
	<div class="like">
		<!-- Facebook like -->
	<!--	<div id="fb_like">
			<iframe src="http://www.facebook.com/plugins/like.php?href=http://<?php echo $_SERVER['SERVER_NAME'] ?>/&amp;layout=button_count&amp;show_faces=false&amp;width=180&amp;action=recommend&amp;font&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:21px;" allowTransparency="true"></iframe>
		</div>
		<!-- Vkontakte like -->
	<!--	<div id="vk_like"></div>
		<script type="text/javascript">VK.Widgets.Like("vk_like", {type: "button", verb: 1});</script>
	</div>-->