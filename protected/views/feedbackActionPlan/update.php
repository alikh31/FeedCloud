<?php
/* @var $this FeedbackActionPlanController */
/* @var $model FeedbackActionPlan */

$this->breadcrumbs=array(
	'Feedback Action Plans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeedbackActionPlan', 'url'=>array('index')),
	array('label'=>'Create FeedbackActionPlan', 'url'=>array('create')),
	array('label'=>'View FeedbackActionPlan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FeedbackActionPlan', 'url'=>array('admin')),
);
?>

<h1>Update FeedbackActionPlan <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>