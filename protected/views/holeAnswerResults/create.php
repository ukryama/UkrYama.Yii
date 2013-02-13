<?php
$this->breadcrumbs=array(
	'Результаты запроса в ГАИ'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Результаты запроса в ГАИ', 'url'=>array('index')),
);
?>

<h1>Создать Результат запроса в ГИБДД</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>