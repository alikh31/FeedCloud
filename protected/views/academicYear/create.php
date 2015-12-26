<?php
/* @var $this AcademicYearController */
/* @var $model AcademicYear */

$this->breadcrumbs=array(
	'Academic Years'=>array('index'),
	'Create',
);

$model->student = $this->currentUser;
?>

<h1>Create AcademicYear</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>