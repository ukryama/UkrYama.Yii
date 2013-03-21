<?
$this->pageTitle=Yii::app()->name . ' :: Добавление дефекта';
?>

<div id="addmess" style="display:none; color:#0C0"><p><b>Выберите место на карте и кликните по нему два раза, чтобы отметить расположение ямы.</b></p></div>
  <div class="head">
		<div class="container">
			<div class="lCol"><a href="/" class="logo" title="На главную"><img src="/images/logo.png"  alt="РосЯма" /></a></div>		
		</div>
	</div>
	<div class="mainCols">
		<h1>Добавление дефекта</h1>
				
		<?php echo $this->renderPartial('_form', array('model'=>$model, 'newimage'=>new PictureFiles)); ?>

	</div>


