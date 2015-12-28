<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Document converter">
        <meta name="author" content="Ali Khoramshahi">

        <title>Feed Cloud</title>
        
        
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/starter-template.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/timeline.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/sb-admin-2.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/morris.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/metisMenu.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/swfobject.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/web_socket.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/Chart.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/metisMenu.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/morris.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/sb-admin-2.js"></script>
    </head>

    <body>
    
    <?php
    	$currentUser;
    	
    	if(isset($this->model))
    	{
	    	switch ($this->getModelName())
	    	{
	    		case 'AcademicYearController':
	    			$currentUser = $this->model->student;
	    			break;
	    		case 'FeedbackActionPlanController':
	    			$currentUser = $this->model->feedback0->module0->academicYear->student;
	    			break;
	    		case 'FeedbackController':
	    			$currentUser = $this->model->module0->academicYear->student;
	    			break;
	    		case 'FeedbackSwotAnalysisController':
	    			$currentUser = $this->model->feedback0->module0->academicYear->student;
	    			break;
	    		case 'ModuleController':
	    			$currentUser = $this->model->academicYear->student;
	    			break;
	    		case 'SiteController':
	    			$currentUser = $this->currentUser;
	    			break;
	    		case 'UserController':
	    			break;
	    	}
    	}
    	
    	if($this->getModelName() === 'SiteController')
    		$currentUser = $this->currentUser;
    	
    	if(isset($currentUser))
    		$academicYears = $currentUser->academicYears;
    	
    	//$this->model->id
    ?>
    	

        <div id="wrapper">
        
        	<?php if(!Yii::app()->user->isGuest  && Yii::app()->user->name !== 'admin') {?>
        
        	<div class="navbar-default sidebar" role="navigation">
			    <div class="sidebar-nav navbar-collapse">
			        <ul class="nav" >
			            <li>
			                <a <?php if($this->getModelName() === 'SiteController') echo 'class="active"'?> href="<?php echo Yii::app()->request->baseUrl; ?>/index.php"><i class="fa fa-graduation-cap fa-fw"></i> Dashboard</a>
			            </li>
			            
			            <?php if(isset($academicYears)) {?>                        
			            <li>
			                <a href="#"><i class="fa fa-clock-o fa-fw"></i> Accademic Years<span class="fa arrow"></span></a>
			                <ul class="nav nav-second-level">
			                	
			                	<?php 
			                	
	  									foreach ($academicYears as $record) { ?>
	  									
	  									
	  									<li>	  									   	
	  									   	<a <?php if($this->getModelName() === 'AcademicYearController' && $this->model->id === $record->id) echo 'class="active"'?> href="index.php?r=academicYear/view&id=<?php echo $record->id?>"><i class="fa fa-archive fa-fw"></i>	
	  									   	<?php echo $record->title; ?>  </a>
	  									   	
	  									   	<ul class="nav nav-third-level">
		  									   		<?php 
		  									   			foreach ($record->modules as $module) { ?>
		  									   				<li><a <?php if($this->getModelName() === 'ModuleController' && $this->model->id === $module->id) echo 'class="active"';?> href="index.php?r=module/view&id=<?php echo $module->id?>"> <i class="fa fa-book fa-fw"></i><?php echo $module->title?></a></li>
		  									   			<?php }?>
		  									   		
		  									 </ul>  	
	  									</li>
	  								<?php }?>
			                    <li >
			                    <a href="index.php?r=academicYear/create" style="text-align: center;">Add new accademic year</a>
			                    </li>
			                </ul>
			            </li>    
			            <?php }?>                 
			        </ul>
			    </div>
			</div>
			
			<?php }
			elseif (Yii::app()->user->name === 'admin') { ?>
			
			<div class="navbar-default sidebar" role="navigation">
			    <div class="sidebar-nav navbar-collapse">
			        <ul class="nav" id="side-menu">
			            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=user/admin"><i class="fa fa-cogs fa-fw active"></i> Manage User</a></li>
			            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=academicyear/admin"><i class="fa fa-cogs fa-fw active"></i> Manage Academic Years</a></li>
			            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=module/admin"><i class="fa fa-cogs fa-fw active"></i> Manage Modules</a></li>
			            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=feedback/admin"><i class="fa fa-cogs fa-fw active"></i> Manage Fedbacks</a></li>
			            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=feedbackswotanalysis/admin"><i class="fa fa-cogs fa-fw active"></i> Manage SWOT Analysis</a></li>
			            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=feedbackactionplan/admin"><i class="fa fa-cogs fa-fw active"></i> Manage Action Plan</a></li>
			                                   
			                             
			        </ul>
			    </div>
			</div>
				
			<?php  }?>
			            

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-top: -50px">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/index.php">Feed Cloud</a>
                </div>

                <ul class="nav navbar-top-links navbar-right" style="visibility: <?php if (Yii::app()->user->isGuest) echo 'hidden'; else echo 'visible'?> ">
                    <li class="dropdown"> 
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo Yii::app()->user->name?>
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                        	<?php if(isset($currentUser) && isset($currentUser->id)) {?>
                            <li><a href="?r=user/update&id=<?php echo $currentUser->id?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <?php }?>
                            <li class="divider"></li>
                            <li><a href='index.php?r=site/logout' ><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                
            </nav>

                

            <div id="page-wrapper" style="margin-top: -20px">
                <!-- /.row -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
            
            
            <div id="footer">
		Created as a project for 'Advanced Server-Side Technologies'.<br/>
		Design and Implimentation by Ali Khormashahi, 2015
		</div><!-- footer -->
		
		
        </div>
    </body>
</html>
