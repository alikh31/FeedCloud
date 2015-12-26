<?php
/* @var $this ModuleController */
/* @var $model Module */

$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Edit module <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>