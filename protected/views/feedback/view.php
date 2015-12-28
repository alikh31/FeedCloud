<?php $feedback = $model; ?>

<div class="col-lg" >
	<div class="panel panel-default">

		<div class="panel-heading">
    		<i class="fa fa-file fa-fw"></i> <a href="index.php?r=feedback/download&id=<?php echo $feedback->id;?>"> Click to download feedback file </a>
    		
    		<div class="pull-right" style="margin-top: -.5em;">
            	<a href="index.php?r=feedback/update&id=<?php echo $feedback->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
            	
            	<? 	echo CHtml::link(CHtml::encode('remove'), array('feedback/delete', 'id'=>$feedback->id),
					array(	'submit'=>array('feedback/delete', 'id'=>$feedback->id),
							'class' => 'delete btn btn-danger','confirm'=>'This will remove the feedback. Are you sure?'));?>
            	
            	<a href="index.php?r=feedbackActionPlan/create&feedbackId= <?php echo $feedback->id;?>" class="btn btn-primary" data-dismiss="modal">Add Action Plan</a>
            	<a href="index.php?r=feedbackSwotAnalysis/create&feedbackId= <?php echo $feedback->id;?>" class="btn btn-primary" data-dismiss="modal">Add SWOT Analysis</a>
            </div>
	    </div>

		<div style="margin: .4em;">
        	<div>
        	
        	<p>Description:<br/> <?php echo $feedback->description;?></p>
        	<?php 
   			if(isset($feedback->feedbackSwotAnalysises))
   			{
	   			foreach ($feedback->feedbackSwotAnalysises as $feedbackSwotAnalysise){
	   				
					$this->renderPartial('/feedbackSwotAnalysis/view', array('model'=>$feedbackSwotAnalysise));
	   			}
   			}
    		?>
    		
    		
    		<?php 
   			if(isset($feedback->feedbackActionPlans))
   			{
	   			foreach ($feedback->feedbackActionPlans as $feedbackActionPlan){
	   				$this->renderPartial('/feedbackActionPlan/view', array('model'=>$feedbackActionPlan));
	   			}
   			}
    		?>
	   		</div>
   		</div>
   	</div>
</div>