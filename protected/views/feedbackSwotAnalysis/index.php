<?php
/* @var $this FeedbackSwotAnalysisController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Feedback Swot Analysises',
);

$this->menu=array(
	array('label'=>'Create FeedbackSwotAnalysis', 'url'=>array('create')),
	array('label'=>'Manage FeedbackSwotAnalysis', 'url'=>array('admin')),
);
?>

<h1>Feedback Swot Analysises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
