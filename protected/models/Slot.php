<?php

/**
 * This is the model class for table "slot".
 *
 * The followings are the available columns in table 'slot':
 * @property string $id
 * @property string $job_id
 * @property string $machine_id
 * @property string $slot_order
 * @property string $start_time
 * @property string $end_time
 * @property string $wall_time
 * @property string $memory
 * @property string $cpu_time
 * @property string $io
 * @property string $slots
 * @property string $maxvmem
 * @property string $failed
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
class Slot extends XActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	public $auxJobNo; 
	public $auxMachineName; 	 
	 
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
			array('job_id, machine_id, slot_order, create_time', 'required'),
			array('job_id, machine_id, slot_order, start_time, end_time, wall_time, slots, status_id, create_time, create_usr_id, update_time, update_usr_id', 'length', 'max'=>10),
			array('memory, cpu_time, io, maxvmem', 'length', 'max'=>16),
			array('failed', 'length', 'max'=>512),
			array('auxJobNo,auxMachineName','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, job_id,auxJobNo,auxMachineName, machine_id, slot_order, start_time, end_time, wall_time, memory, cpu_time, io, slots, maxvmem, failed, status_id, create_time, create_usr_id, update_time, update_usr_id', 'safe', 'on'=>'search'),
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
			'auxJobNo'=> 'Job No',
			'machine_id' => 'Machine',
			'auxMachineName'=> ' Machine Name',
			'slot_order' => 'Slot Order',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
			'wall_time' => 'Wall Time',
			'memory' => 'Memory',
			'cpu_time' => 'Cpu Time',
			'io' => 'Io',
			'slots' => 'Slots',
			'maxvmem' => 'Maxvmem',
			'failed' => 'Failed',
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
		if(strpos(Yii::app()->request->getRequestUri(),"=")!=false){
		$pageno=explode('=',Yii::app()->request->getRequestUri());
		$this->job_id = $pageno;
		}
		
		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.job_id',$this->job_id,false);
		$criteria->compare('t.machine_id',$this->machine_id,true);
		$criteria->compare('machine.name',$this->auxMachineName,true);
		$criteria->compare('job.job_no',$this->auxJobNo,true);
		$criteria->compare('t.start_time',$this->start_time,true);
		$criteria->compare('t.end_time',$this->end_time,true);
		$criteria->compare('t.wall_time',$this->wall_time,true);
		$criteria->compare('t.memory',$this->memory,true);
		$criteria->compare('t.cpu_time',$this->cpu_time,true);
		$criteria->compare('t.io',$this->io,true);
		$criteria->compare('t.slots',$this->slots,true);
		$criteria->compare('t.maxvmem',$this->maxvmem,true);
		$criteria->compare('t.failed',$this->failed,true);
		$criteria->compare('t.status_id',$this->status_id,true);
		$criteria->compare('t.create_time',$this->create_time,true);
		$criteria->compare('t.create_usr_id',$this->create_usr_id,true);
		$criteria->compare('t.update_time',$this->update_time,true);
		$criteria->compare('t.update_usr_id',$this->update_usr_id,true);
		
		return new CActiveDataProvider(get_class($this), array(
                        'pagination'=>array(
                                'pageSize'=> 100,
                               // Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize'])
                        ),
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
	
	public function afterFind()
	{
		$this->start_time = Yii::app()->dateFormatter->formatDateTime($this->start_time,"medium","medium");
		$this->end_time = Yii::app()->dateFormatter->formatDateTime($this->end_time,"medium","medium");
		return parent::afterFind();
		
		
	}
}
