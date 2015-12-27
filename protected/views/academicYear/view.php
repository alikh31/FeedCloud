






<?php 
	{
		$record = $model;
	
		?> 
		<div class="col-lg" style="margin-top: 2%;">
			<div class="panel panel-default">
	
	    		<div class="panel-heading">
	        		<i class="fa fa-archive fa-fw"></i> <?php echo $record->title;?>
	        		
	        		<div class="pull-right" style="margin-top: -.5em;">
                    	<a href="index.php?r=academicYear/update&id= <?php echo $record->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
                    	<? 	echo CHtml::link(CHtml::encode('remove'), array('academicYear/delete', 'id'=>$record->id),
							array(	'submit'=>array('academicYear/delete', 'id'=>$record->id),
									'class' => 'delete btn btn-danger','confirm'=>'This will remove the accademic year. Are you sure?'));?>
                    	
                    	<a href="index.php?r=module/create&yearId= <?php echo $record->id;?>" class="btn btn-primary" data-dismiss="modal">Add module</a>
                    </div>
			    </div>
	
	    		<div style="margin: .4em;">
		        	<div>
				   			
				   			
				   			<?php 
				   			if(isset($record->modules))
				   			{
					   			foreach ($record->modules as $module){
					   				?>

					   				
					   				
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
											   				?>
						
											   				
											   				
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
																   				?>
											
																   				
																   				
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
												   	
												   	
											
																   				<?php
																   			}
															   			}
											                    		?>
											                    		
											                    		
											                    		<?php 
															   			if(isset($feedback->feedbackActionPlans))
															   			{
																   			foreach ($feedback->feedbackActionPlans as $feedbackActionPlan){
																   				?>
											
																   				
																   				
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
												   	
												   	
											
																   				<?php
																   			}
															   			}
											                    		?>
															        	
															        	
															        	
																	   			
																   		</div>
															   		</div>
															   	</div>
														   	</div>
							   	
							   	
						
											   				<?php
											   			}
										   			}
						                    		?>
									        	
									        	
									        	
											   			
										   		</div>
									   		</div>
									   	</div>
								   	</div>
	   	
	   	

					   				<?php
					   			}
				   			}
                    		?>
			   		</div>
		   		</div>
		   	</div>
	   	</div>
	   	
	   	<?php
	}
?>


