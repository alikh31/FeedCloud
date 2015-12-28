<?php $module = $model;?>
<div class="col-lg" >
	<div class="panel panel-primary ">
		<div class="panel-heading">
			<i class="fa fa-book fa-fw"></i> <?php echo $module->title;?>
		
			<div class="pull-right" style="margin-top: -.5em;">
        		<a href="index.php?r=module/update&id= <?php echo $module->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
        	
        		<? 	echo CHtml::link(CHtml::encode('remove'), array('module/delete', 'id'=>$module->id),
					array(	'submit'=>array('module/delete', 'id'=>$module->id),
							'class' => 'delete btn btn-danger','confirm'=>'This will remove the module. Are you sure?'));?>
        	
        		<a href="index.php?r=feedback/create&moduleId= <?php echo $module->id;?>" class="btn btn-primary" data-dismiss="modal">Add new Feedback</a>
        	</div>
    	</div>

		<div style="margin: .4em;">
    		<div>
    	
	    	<?php 
	   			if(isset($module->feedbacks))
	   			{
		   			foreach ($module->feedbacks as $feedback){
		   				$this->renderPartial('/feedback/view', array('model'=>$feedback));
		   			}
	   			}
	    		?>	   			
	   		</div>
		</div>
	</div>
</div>
