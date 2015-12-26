<?php

/**
 * This is the model class for table "tbl_feedback".
 *
 * The followings are the available columns in table 'tbl_feedback':
 * @property integer $id
 * @property string $feedback_file
 * @property string $description
 * @property integer $module
 *
 * The followings are the available model relations:
 * @property Module $module0
 * @property FeedbackSwotAnalysis[] 
 * @property FeedbackActionPlan[] $feedbackActionPlans
 */
class Feedback extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_feedback';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('feedback_file, module', 'required'),
			array('module', 'numerical', 'integerOnly'=>true),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, feedback_file, description, module', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'module0' => array(self::BELONGS_TO, 'Module', 'module'),
			'feedbackSwotAnalysises' => array(self::HAS_MANY, 'FeedbackSwotAnalysis', 'feedback'),
			'feedbackActionPlans' => array(self::HAS_MANY, 'FeedbackActionPlan', 'feedback'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'feedback_file' => 'Feedback File',
			'description' => 'Description',
			'module' => 'Module',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('feedback_file',$this->feedback_file,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('module',$this->module);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Feedback the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
