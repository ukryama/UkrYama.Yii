<!-- Переделаный About [Начало] -->
<div class="rCol">
	<div class="aboutProject-placeholder" style="display:none;"><a href="#" id="show-about">Як працює УкрЯма?</a></div>
	<div class="aboutProject-wrap">
		<h2>Як працює УкрЯма</h2>
		<ul class="aboutProject">
			<li class="about1"><span class="img"></span><br>Добавить факт и&nbsp;отправить заявление в&nbsp;местное ГАИ </li>
			<li class="about2"><span class="img"></span><br>Ждать 31&nbsp;календарный день с&nbsp;момента регистрации вашего заявления</li>
			<li class="about3"><span class="img"></span><br>Если дефект не&nbsp;исправили, отправлять жалобу в&nbsp;прокуратуру</li>
		</ul>
		<a href="#" id="close-about">Приховати</a>
	</div>
</div>
<script>
	$('#close-about').click(function(e){
		$(this).closest('.aboutProject-wrap').slideUp(180, function(){$(this).addClass('hidden')});
		$('.aboutProject-placeholder').slideDown(180);
		e.preventDefault();
	});
	$('#show-about').click(function(e){
		$('.aboutProject-wrap').slideDown(180, function(){$(this).addClass('hidden')});
		$('.aboutProject-placeholder').slideUp(180);
		e.preventDefault();
	});
</script>
<!-- Переделаный About [Конец] -->