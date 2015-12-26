
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<?php 
	foreach ($academic as $record) { ?>
		<div class="col-lg" style="margin-top: 2%;">
			<div class="panel panel-default">
	
	    		<div class="panel-heading">
	        		<i class="fa fa-archive fa-fw"></i> <?php echo $record->title;?>
	        		
	        		<div class="pull-right" style="margin-top: -.5em;">
                    	<a href="index.php?r=academicYear/update&id= <?php echo $record->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
                    	
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
														        		<i class="fa fa-file fa-fw"></i> <?php echo $feedback->description;?>
														        		
														        		<div class="pull-right" style="margin-top: -.5em;">
													                    	<a href="index.php?r=feedback/update&id= <?php echo $feedback->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
													                    	
													                    	<a href="index.php?r=feedbackActionPlan/create&feedbackId= <?php echo $feedback->id;?>" class="btn btn-primary" data-dismiss="modal">Add Action Plan</a>
													                    	<a href="index.php?r=feedbackSwotAnalysis/create&feedbackId= <?php echo $feedback->id;?>" class="btn btn-primary" data-dismiss="modal">Add SWOT Analysis</a>
													                    </div>
																    </div>
														
														    		<div style="margin: .4em;">
															        	<div>
															        	
															        	
															        	
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
																		                    	<a href="index.php?r=feedbackActionPlan/update&id= <?php echo $feedbackSwotAnalysise->id;?>" class="btn btn-default" data-dismiss="modal">Edit</a>
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


