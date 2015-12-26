<?php
/* @var $this FeedbackSwotAnalysisController */
/* @var $model FeedbackSwotAnalysis */

$this->breadcrumbs=array(
	'Feedback Swot Analysises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeedbackSwotAnalysis', 'url'=>array('index')),
	array('label'=>'Manage FeedbackSwotAnalysis', 'url'=>array('admin')),
);
?>

<h1>Create FeedbackSwotAnalysis</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>