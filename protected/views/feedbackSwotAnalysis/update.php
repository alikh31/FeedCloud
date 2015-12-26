<?php
/* @var $this FeedbackSwotAnalysisController */
/* @var $model FeedbackSwotAnalysis */

$this->breadcrumbs=array(
	'Feedback Swot Analysises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeedbackSwotAnalysis', 'url'=>array('index')),
	array('label'=>'Create FeedbackSwotAnalysis', 'url'=>array('create')),
	array('label'=>'View FeedbackSwotAnalysis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FeedbackSwotAnalysis', 'url'=>array('admin')),
);
?>

<h1>Update FeedbackSwotAnalysis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>