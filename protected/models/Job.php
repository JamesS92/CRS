<?php

/**
 * This is the model class for table "job".
 *
 * The followings are the available columns in table 'job':
 * @property string $id
 * @property string $job_no
 * @property string $user_id
 * @property string $queue_id
 * @property string $name
 * @property string $sub_time
 * @property string 	$min_time
 * @property string 	$max_time
 * @property string 	$duration
 * @property string	$cpu_sum  	
 * @property string	$memory_sum  	
 * @property string	$io_sum  	
 * @property string	$maxvmem_sum  	
 * @property string	$failed_slot  	
 * @property string	$node_count  	
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
 * @property RefQueue $queue
 * @property Slot[] $slots
 */
class Job extends XActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	public $auxUsername; 
	public $auxQueuename; 
	
	public function tableName()
	{
		return 'job';
	}

	
	public function init()
	{
		/* custom stuff here */ 
		
		return parent::init(); 
		
	} 
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_no, user_id, queue_id, name, create_time', 'required'),
			array('job_no, user_id, queue_id, sub_time, min_time, max_time, duration, failed_slot, node_count, exit_code, status_id, create_time, create_usr_id, update_time, update_usr_id', 'length', 'max'=>10),
			array('cpu_sum, memory_sum ,io_sum,maxvmem_sum', 'length', 'max'=>16),  
			array('name', 'length', 'max'=>512),
			array('auxUsername,auxQueuename','safe'), 
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, job_no, auxUsername, auxQueuename, user_id, queue_id, name, sub_time, min_time, max_time, duration, cpu_sum ,memory_sum ,io_sum ,maxvmem_sum,failed_slot ,node_count exit_code, status_id, create_time, create_usr_id, update_time, update_usr_id', 'safe', 'on'=>'search'),
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
			'queue' => array(self::BELONGS_TO, 'RefQueue', 'queue_id'),
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
			'job_no' => 'Job No',
			'user_id' => 'User',
			'queue_id' => 'Queue',
			'name' => 'Name',
			'auxUsername'=>'CUBRIC user', 
			'sub_time' => 'Sub Time',
			'min_time' => 'Start Time',
			'max_time' => 'End Time',
			'duration' => 'Duration',
			'cpu_sum'  => 'CPU Sum ', 	
			'memory_sum'  => 'Memory Sum',
			'io_sum'  => 'IO Sum',
			'maxvmem_sum'  => 'Maxvmem Sum',
			'failed_slot'  => 'Failed Slot', 
			'node_count'  => 'Node Count', 
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

		
		
		/*
		$sort = new CSort;
		$sort->attributes = array(
			'*', 
			'queue.name'=>array(
				'asc'=>'queue.name',
				'desc'=>'queue.name desc',
			), 
			'user.username'=>array(
				'asc'=>'user.username',
				'desc'=>'user.username desc',	
				),
			);
		*/ 
			$criteria=new CDbCriteria;
			$criteria->with = array('user','queue');
		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('queue.name',$this->auxQueuename,true);
		$criteria->compare('user.username',$this->auxUsername,true);
		$criteria->compare('t.job_no',$this->job_no,true);
		$criteria->compare('t.user_id',$this->user_id,true);
		$criteria->compare('t.queue_id',$this->queue_id,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.sub_time',$this->sub_time,true);
		$criteria->compare('t.min_time',$this->min_time,true);
		$criteria->compare('t.max_time',$this->max_time,true);
		$criteria->compare('t.duration',$this->duration,true);
		$criteria->compare('t.cpu_sum',$this->cpu_sum,true);  	
		$criteria->compare('t.memory_sum',$this->memory_sum,true);
		$criteria->compare('t.io_sum', $this->io_sum,true); 	
		$criteria->compare('t.maxvmem_sum',$this->maxvmem_sum,true);
		$criteria->compare('t.failed_slot', $this->failed_slot,true);
		$criteria->compare('t.node_count', $this->node_count,true);
		$criteria->compare('t.exit_code',$this->exit_code,true);
		$criteria->compare('t,status_id',$this->status_id,true);
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
	
	public function afterFind()
	{
		$this->sub_time = Yii::app()->dateFormatter->formatDateTime($this->sub_time,"medium","medium");
		$this->min_time = Yii::app()->dateFormatter->formatDateTime($this->min_time,"medium","medium");
		$this->max_time = Yii::app()->dateFormatter->formatDateTime($this->max_time,"medium","medium");
		return parent::afterFind();
		
		
	}
}
