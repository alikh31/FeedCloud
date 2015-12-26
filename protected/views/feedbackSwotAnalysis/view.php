<?php
/* @var $this FeedbackSwotAnalysisController */
/* @var $model FeedbackSwotAnalysis */

$this->breadcrumbs=array(
	'Feedback Swot Analysises'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FeedbackSwotAnalysis', 'url'=>array('index')),
	array('label'=>'Create FeedbackSwotAnalysis', 'url'=>array('create')),
	array('label'=>'Update FeedbackSwotAnalysis', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FeedbackSwotAnalysis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeedbackSwotAnalysis', 'url'=>array('admin')),
);
?>

<h1>View FeedbackSwotAnalysis #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'description',
		'feedback',
	),
)); ?>
