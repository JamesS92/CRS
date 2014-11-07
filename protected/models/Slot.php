<?php

/**
 * This is the model class for table "slot".
 *
 * The followings are the available columns in table 'slot':
 * @property string $id
 * @property string $job_id
 * @property string $machine_id
 * @property string $memory
 * @property string $cpu_time
 * @property string $io
 * @property string $slots
 * @property string $status_id
 * @property string $create_time
 * @property string $create_usr_id
 * @property string $update_time
 * @property string $update_usr_id
 *
 * The followings are the available model relations:
 * @property RefStatus $status
 * @property Job $job
 * @property RefMachine $machine
 */
class Slot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'slot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_id, machine_id, create_time', 'required'),
			array('job_id, machine_id, memory, cpu_time, io, slots, status_id, create_time, create_usr_id, update_time, update_usr_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, job_id, machine_id, memory, cpu_time, io, slots, status_id, create_time, create_usr_id, update_time, update_usr_id', 'safe', 'on'=>'search'),
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
			'job' => array(self::BELONGS_TO, 'Job', 'job_id'),
			'machine' => array(self::BELONGS_TO, 'RefMachine', 'machine_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'job_id' => 'Job',
			'machine_id' => 'Machine',
			'memory' => 'Memory',
			'cpu_time' => 'Cpu Time',
			'io' => 'Io',
			'slots' => 'Slots',
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
		$criteria->compare('job_id',$this->job_id,true);
		$criteria->compare('machine_id',$this->machine_id,true);
		$criteria->compare('memory',$this->memory,true);
		$criteria->compare('cpu_time',$this->cpu_time,true);
		$criteria->compare('io',$this->io,true);
		$criteria->compare('slots',$this->slots,true);
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
	 * @return Slot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}