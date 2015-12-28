
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;



?>




<?php 
	if(Yii::app()->user->name === 'admin')
	{
		
	}
	
	else 
	{
		?>
		
<div style="margin-top: 1em;">
	<a href="index.php?r=academicYear/create" style="text-align: center;">Add new accademic year</a>												                    	
</div>
		<?php 

		foreach ($academic as $record) { 
			$this->renderPartial('/academicYear/view', array('model'=>$record)); 
		}
	}
?>




