<?php
/* @var $this FeedbackActionPlanController */
/* @var $model FeedbackActionPlan */

$this->breadcrumbs=array(
	'Feedback Action Plans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FeedbackActionPlan', 'url'=>array('index')),
	array('label'=>'Create FeedbackActionPlan', 'url'=>array('create')),
	array('label'=>'Update FeedbackActionPlan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FeedbackActionPlan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeedbackActionPlan', 'url'=>array('admin')),
);
?>

<h1>View FeedbackActionPlan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'feedback',
	),
)); ?>
