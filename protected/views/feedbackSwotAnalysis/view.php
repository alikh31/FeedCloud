<?php $feedbackSwotAnalysise = $model;?>	   				
<div class="col-lg" >
	<div class="panel <?php
    		switch($feedbackSwotAnalysise->type)
    		{
    			case 0:
    				echo "panel-success";
    				break;
    				
    			case 1:
    				echo "panel-warning";
    				break;
    				
    			case 2:
    				echo "panel-info";
    				break;
    						
    			case 3:
   					echo "panel-danger";
   					break;
    		}
    				
    		?>">

		<div class="panel-heading">
    		<i class="fa fa-bar-chart fa-fw"></i> SWOT analysis: <?php
    		
    		switch($feedbackSwotAnalysise->type)
    		{
    			case 0:
    				echo "strengths";
    				break;
    				
    			case 1:
    				echo "weaknesses";
    				break;
    				
    			case 2:
    				echo "opportunities";
    				break;
    						
    			case 3:
   					echo "threats";
   					break;
    		}
    				
    		?>
    		
    		<div class="pull-right" style="margin-top: -.5em;">
            	<a href="index.php?r=feedbackSwotAnalysis/update&id= <?php echo $feedbackSwotAnalysise->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
            	
            	<? 	echo CHtml::link(CHtml::encode('remove'), array('feedbackSwotAnalysis/delete', 'id'=>$feedbackSwotAnalysise->id),
					array(	'submit'=>array('feedbackSwotAnalysis/delete', 'id'=>$feedbackSwotAnalysise->id),
							'class' => 'delete btn btn-danger','confirm'=>'This will remove the SWOT analysis. Are you sure?'));?>
            </div>
	    </div>

		<div style="margin: .4em;">
        	<div>
        	
        		
        		<p><?php echo $feedbackSwotAnalysise->description;?></p>
        	
		   			
	   		</div>
   		</div>
   	</div>
</div>