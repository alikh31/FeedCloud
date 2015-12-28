<?php $feedbackActionPlan = $model;?>
	   				
<div class="col-lg" >
	<div class="panel panel-primary">

		<div class="panel-heading">
    		<i class="fa fa-bar-chart fa-fw"></i> Action plan
    		
    		<div class="pull-right" style="margin-top: -.5em;">
            	<a href="index.php?r=feedbackActionPlan/update&id= <?php echo $feedbackActionPlan->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
            	
            	<? 	echo CHtml::link(CHtml::encode('remove'), array('feedbackActionPlan/delete', 'id'=>$feedbackActionPlan->id),
					array(	'submit'=>array('feedbackActionPlan/delete', 'id'=>$feedbackActionPlan->id),
							'class' => 'delete btn btn-danger','confirm'=>'This will remove the action plan. Are you sure?'));?>
            </div>
	    </div>

		<div style="margin: .4em;">
        	<div>
        	
        		
        		<p><?php echo $feedbackActionPlan->description;?></p>
        	
		   			
	   		</div>
   		</div>
   	</div>
</div>