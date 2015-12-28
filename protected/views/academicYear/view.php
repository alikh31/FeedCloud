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
									$this->renderPartial('/module/view', array('model'=>$module)); 
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


