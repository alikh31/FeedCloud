<?php
/* @var $this FeedbackActionPlanController */
/* @var $model FeedbackActionPlan */

$this->breadcrumbs=array(
	'Feedback Action Plans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeedbackActionPlan', 'url'=>array('index')),
	array('label'=>'Manage FeedbackActionPlan', 'url'=>array('admin')),
);
?>

<h1>Create FeedbackActionPlan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>