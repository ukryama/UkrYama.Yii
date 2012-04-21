<h2><?php echo $data->gibdd_name; ?></h2>

<div style="clear:both"></div>

<?php if ($data->fio): ?>
	ФИО:&nbsp;<?php echo $data->fio; ?><br />
<?php endif; ?>	  	
	
<?php if ($data->post): ?>
	Должность:&nbsp;<?php echo $data->post; ?><br />
<?php endif; ?>	  		  
		
<?php if ($data->address): ?>
	Адрес:&nbsp;<?php echo $data->address; ?><br />
<?php endif; ?>	  		

<?php if ($data->tel_degurn): ?>  		
	Телефон дежурной части:&nbsp;<?php echo $data->tel_degurn; ?><br />
<?php endif; ?>	  	

<?php if ($data->tel_dover): ?>  
	Телефон доверия:&nbsp;<?php echo $data->tel_dover; ?><br />
<?php endif; ?>	  	

<?php if ($data->link): ?>  		
	Сайт:&nbsp;<?php echo $data->link; ?><br />
<?php endif; ?>	  	


<?php if (!Yii::app()->user->isGuest && (Yii::app()->user->id==$data->author_id || Yii::app()->user->isModer) && $data->is_regional==0) : ?>
<br/>
<?php echo CHtml::link('редактировать', array('update','id'=>$data->id)); ?>
	<?php echo CHtml::link('удалить', array('delete','id'=>$data->id), array('onclick'=>'return confirm("Точно удаляем?");')); ?>
	<?php if (!$data->moderated && Yii::app()->user->isModer) : ?>
		<?php echo CHtml::link('модерировать', array('moderate','id'=>$data->id)); ?>
	<?php endif; ?>	  
<?php endif; ?>	  