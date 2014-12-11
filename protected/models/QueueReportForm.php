<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class QueueReportForm extends CFormModel
{
	public $queue_id;
	public $start_date;
	public $start_date_timestamp;
	public $end_date;
	public $end_date_timestamp;
	
	/* ************************************************************** */
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('queue_id, start_date_timestamp, start_date, end_date, end_date_timestamp', 'required'),
			// email has to be a valid email address
			
			// verifyCode needs to be entered correctly
			
		);
	}

	/* ************************************************************** */
	public function getQueueList()
	{
		$models = RefQueue::model()->findAll('status_id=:active', array(':active'=>Types::$status['active']['id']));
		return CHtml::listData($models,'id', 'name'); 
		
	} 
	/* ************************************************************** */
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'queue_id'=>'Queue',
			'start_date'=>'Start date',
			'end_date'=>'End date',
		);
	}
	/* ************************************************************** */
	public function getData()
	{
		$returnData= array(); 
		$minMaxValues = array();
		$minMaxValues = QueueReport::findNormal($this->start_date_timestamp, $this->end_date_timestamp, $this->queue_id);
		
		$minCPU = $minMaxValues['minCPU'];
		$maxCPU =  $minMaxValues['maxCPU'];
		$minMemory = $minMaxValues['minMemory'];
		$maxMemory = $minMaxValues['maxMemory'];
		$minIO =  $minMaxValues['minIO'];
		$maxIO =  $minMaxValues['maxIO'];
		$minVMem = $minMaxValues['minVMem'];
		$maxVMem = $minMaxValues['maxVMem'];	
		$beginTime = $minMaxValues['beginTime'];
		$endTime = $minMaxValues['endTime'];
		$day = 3600*24;
		$weeks = 56 * $day;
		
		$lowertime = $beginTime;
				while ($lowertime < $endTime)
					{
						if($endTime > ($lowertime + $weeks))
						$uppertime = $lowertime + $weeks;
						else $uppertime = $endTime;
		
		$data = Yii::app()->db->createCommand()
		 
			->select('j.id, j.min_time, j.cpu_sum, j.memory_sum, j.io_sum, j.maxVMem_sum')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->where('j.status_id=:active AND j.min_time > :beginTime AND j.min_time <= :endTime AND j.queue_id = :qID', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$lowertime,
						':endTime'=>$uppertime,
						':qID'=>$this->queue_id,
						) ) 

			->queryAll(); 
			//print_r($minCPU);
			//print_r($data);
			//print_r($maxCPU);
		
		// $data = QueueReportHelper::getData($queue_id,$start,$end);
		foreach($data as $element)
		{
			$returnData[] = array('job'=>$element['id'] , 
					'start_time'=>$element['min_time'],
					'cpu_sum'=>ReportHelper::normalise($element['cpu_sum'],$minCPU,$maxCPU),  
					'io_sum'=>ReportHelper::normalise($element['io_sum'],$minIO,$maxIO),
					'memory_sum'=>ReportHelper::normalise($element['memory_sum'],$minMemory,$maxMemory),
					'maxVMem_sum'=>ReportHelper::normalise($element['maxVMem_sum'],$minVMem,$maxVMem),
					'beginTime'=>$beginTime,
					'endTime'=>$endTime
					); 
		} 	
		//print_r($returnData);
		$lowertime = $uppertime;
					}
		return $returnData; 
	} 
	/* ************************************************************** */
	
	
	
}
