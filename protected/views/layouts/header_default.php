<?php $this->beginContent('//layouts/main'); ?>
<div class="head">
		<div class="container">
			<div class="lCol">
					<a href="/" class="logo" title="На главную"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"  alt="УкрЯма" /></a>
					<div class="btn">
						<?php echo CHtml::link('<i class="text">'. Yii::t('holes', 'addholes') .'</i><i class="arrow"></i>',Array('/holes/add'),Array('class'=>'addFact')); ?>
					</div>
			</div>

			<?php $this->renderPartial('//layouts/_text');?>
		</div>
	</div>
	

	<div class="mainCols">
	<?php echo $content; ?>
	</div>		
	
<?php $this->endContent(); ?>
