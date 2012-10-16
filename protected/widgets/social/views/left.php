<div id="competition">
<h2>Внимание! Конкурс.</h2>
<noindex><a href="http://www.ahelp.ua/competition-rde2012.html" target="_blank" title="Конкурс УкрЯма" alt="Конкурс УкрЯма" /><img src="<?php echo Yii::app()->request->baseUrl?>/images/newroad.jpg" width="195"></a></noindex>
</div><br />



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

<div id="banner_ap">
	<div class="banner_yama">
		<span class="">Партнер:</span><br />
		<noindex><a href="http://autoportal.ua/" target="_blank" rel="nofollow"><img src="<?php echo Yii::app()->request->baseUrl;?>/banners/ap-bann-215x111.png" alt="" /></a></noindex>
	</div>
	<br />
	<div id="partners">
		SSL сертификаты и <a href="http://www.isplicense.ru/" target="_blank">лицензии ПО</a>
	</div> 
</div>
	
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