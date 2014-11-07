<?php

/**
 * This is the model class for table "job".
 *
 * The followings are the available columns in table 'job':
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $sub_time
 * @property string $start
 * @property string $wall_time
 * @property string $exit_code
 * @property string $status_id
 * @property string $create_time
 * @property string $create_usr_id
 * @property string $update_time
 * @property string $update_usr_id
 *
 * The followings are the available model relations:
 * @property RefStatus $status
 * @property User $user
 * @property Slot[] $slots
 */
class Job extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, name, create_time', 'required'),
			array('user_id, sub_time, start, wall_time, exit_code, status_id, create_time, create_usr_id, update_time, update_usr_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, name, sub_time, start, wall_time, exit_code, status_id, create_time, create_usr_id, update_time, update_usr_id', 'safe', 'on'=>'search'),
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
			'status' => array(self::BELONGS_TO, 'RefStatus', 'status_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'slots' => array(self::HAS_MANY, 'Slot', 'job_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'name' => 'Name',
			'sub_time' => 'Sub Time',
			'start' => 'Start',
			'wall_time' => 'Wall Time',
			'exit_code' => 'Exit Code',
			'status_id' => 'Status',
			'create_time' => 'Create Time',
			'create_usr_id' => 'Create Usr',
			'update_time' => 'Update Time',
			'update_usr_id' => 'Update Usr',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sub_time',$this->sub_time,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('wall_time',$this->wall_time,true);
		$criteria->compare('exit_code',$this->exit_code,true);
		$criteria->compare('status_id',$this->status_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_usr_id',$this->create_usr_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_usr_id',$this->update_usr_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Job the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
