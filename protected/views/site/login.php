
<div class="col-lg-8" style="margin-top: 4%;">
<div class="panel panel-default">

    <div class="panel-heading">
        <i class="fa fa-lock fa-fw"></i> Login
    </div>

    <div style="margin: 4%;">
        <div>
          

<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">
	<a href='index.php?r=user/create'>Please click here to register if you are not a member</a> <br/>
	Fields with <span class="required">*</span> are required.
	</p>


	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'Email', 'aria-describedby'=>'basic-addon1')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',  array('class'=>'form-control', 'placeholder'=>'Password', 'aria-describedby'=>'basic-addon1')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-default')); ?>
	</div>
	
	

<?php $this->endWidget(); ?>
</div><!-- form -->

        </div>
    </div>

</div>

</div>