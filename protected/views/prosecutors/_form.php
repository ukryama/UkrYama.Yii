<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prosecutors-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gibdd_name'); ?>
		<?php echo $form->textField($model,'gibdd_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'gibdd_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject_id'); ?>
		<?php echo $form->dropDownList($model,'subject_id', CHtml::listData(RfSubjects::model()->findAll(),'id','name_full')); ?>
		<?php echo $form->error($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preview_text'); ?>
		<?php echo $form->textArea($model,'preview_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'preview_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->