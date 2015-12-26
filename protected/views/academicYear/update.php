<?php
/* @var $this AcademicYearController */
/* @var $model AcademicYear */

$this->breadcrumbs=array(
	'Academic Years'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);


?>

<h1>Update AcademicYear <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>