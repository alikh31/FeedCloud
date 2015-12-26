<?php
/* @var $this FeedbackActionPlanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Feedback Action Plans',
);

$this->menu=array(
	array('label'=>'Create FeedbackActionPlan', 'url'=>array('create')),
	array('label'=>'Manage FeedbackActionPlan', 'url'=>array('admin')),
);
?>

<h1>Feedback Action Plans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
