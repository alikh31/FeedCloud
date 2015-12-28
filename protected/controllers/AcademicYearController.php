<?php

class AcademicYearController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public $academicYears;
	public $currentUser;
	
	public $model;
	
	private function updateInfo()
	{
		if (!Yii::app()->user->isGuest)
		{
			$this->currentUser = User::model()->findByAttributes(array("email"=>Yii::app()->user->name));
	
			$userId = $this->currentUser->id;
	
			$this->academicYears = AcademicYear::model()->findAll(array("condition"=>"student_id = $userId"));
		}
	}
	
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
	
// 	public function action()
// 	{
// 		if (!Yii::app()->user->isGuest)
// 		{
// 			$this->currentUser = User::model()->findByAttributes(array('email'=>Yii::app()->user->name));
// 			$this->academicYears = AcademicYear::model()->findAll(array("condition"=>"student_id = '$this->currentUser->id'"));
// 		}
// 	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{	
		$model = AcademicYear::model()->findByPk(isset($_GET["id"])? $_GET["id"] : '-1');
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','delete','view'),
				'users'=>array('admin', (isset($model) && isset($model->student))? $model->student->email : ''),
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
		$this->updateInfo();
		
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
	public function actionCreate()
	{
		$this->updateInfo();
		
		$model=new AcademicYear;
		$model->student_id = $this->currentUser->id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AcademicYear']))
		{
			$model->attributes=$_POST['AcademicYear'];
			if($model->save())
				$this->redirect('index.php');
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->updateInfo();
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AcademicYear']))
		{
			$model->attributes=$_POST['AcademicYear'];
			if($model->save())
				$this->redirect('index.php');
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
		$this->updateInfo();
		
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect('index.php');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->updateInfo();
		
		$dataProvider=new CActiveDataProvider('AcademicYear');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->updateInfo();
		
		$model=new AcademicYear('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AcademicYear']))
			$model->attributes=$_GET['AcademicYear'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AcademicYear the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AcademicYear::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AcademicYear $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='academic-year-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
