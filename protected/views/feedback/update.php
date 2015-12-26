<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Feedback</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>