<?php

class FeedbackController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	public $model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function getModelName()
	{
		return __CLASS__;
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$model = Feedback::model()->findByPk(isset($_GET["id"])? $_GET["id"] : '-1');
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','delete','download','view'),
				'users'=>array('admin', (isset($model) && isset($model->module0->academicYear->student))? $model->module0->academicYear->student->email : ''),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','index'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->model = $model;
		
		$this->render('view',array(
				'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($moduleId)
	{
		$model=new Feedback;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$model->module = $moduleId;
		$model->feedback_file = "ttt";

		if(isset($_POST['Feedback']))
		{
			$model->attributes=$_POST['Feedback'];
			$model->image=CUploadedFile::getInstance($model,'image');
			$model->feedback_file = $model->image;
			
			if($model->save())
			{
				if(file_exists("FeedbackFiles/$model->id"))
				{
					unlink("FeedbackFiles/$model->id");
				}
				$model->image->saveAs("FeedbackFiles/$model->id");
				$this->redirect('index.php');
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	public function actionDownload($id){
		$model=$this->loadModel($id);
		
		$fullpath = "FeedbackFiles/$id";
		if(!empty($fullpath)){
			header("Content-type:application/pdf"); //for pdf file
			//header('Content-Type:text/plain; charset=ISO-8859-15');
			//if you want to read text file using text/plain header
			header('Content-Disposition: attachment; filename="'.$model->feedback_file.'"');
			header('Content-Length: ' . filesize($fullpath));
			readfile($fullpath);
		}
	}
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->feedback_file = "ttt";
		
		if(isset($_POST['Feedback']))
		{
			$model->attributes=$_POST['Feedback'];
			$model->image=CUploadedFile::getInstance($model,'image');
			$model->feedback_file = $model->image;
				
			if($model->save())
			{
				if(file_exists("FeedbackFiles/$model->id"))
				{
					unlink("FeedbackFiles/$model->id");
				}
				$model->image->saveAs("FeedbackFiles/$model->id");
				$this->redirect('index.php');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(Yii::app()->request->urlReferrer);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Feedback');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Feedback('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Feedback']))
			$model->attributes=$_GET['Feedback'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Feedback the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Feedback::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Feedback $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='feedback-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
