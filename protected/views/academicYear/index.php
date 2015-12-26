<?php
/* @var $this AcademicYearController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Academic Years',
);

$this->menu=array(
	array('label'=>'Create AcademicYear', 'url'=>array('create')),
	array('label'=>'Manage AcademicYear', 'url'=>array('admin')),
);
?>

<h1>Academic Years</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
