<?php
/* @var $this FeedbackActionPlanController */
/* @var $model FeedbackActionPlan */

$this->breadcrumbs=array(
	'Feedback Action Plans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update FeedbackActionPlan <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>