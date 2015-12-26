<?php
/* @var $this ModuleController */
/* @var $model Module */

$this->breadcrumbs=array(
	'Modules'=>array('index'),
	'Create',
);

?>

<h1>Create Module</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>