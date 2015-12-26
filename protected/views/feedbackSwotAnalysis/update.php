<?php
/* @var $this FeedbackSwotAnalysisController */
/* @var $model FeedbackSwotAnalysis */

$this->breadcrumbs=array(
	'Feedback Swot Analysises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update FeedbackSwotAnalysis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>