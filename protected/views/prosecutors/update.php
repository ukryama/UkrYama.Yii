<?php
$this->breadcrumbs=array(
	'Prosecutors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prosecutors', 'url'=>array('index')),
	array('label'=>'Create Prosecutors', 'url'=>array('create')),
	array('label'=>'View Prosecutors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prosecutors', 'url'=>array('admin')),
);
?>

<h1>Update Prosecutors <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>