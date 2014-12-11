<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class UsagesumReportForm extends CFormModel
{
	public $usage_category;
	public $search_interval;
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
			array('usage_category, search_interval, start_date_timestamp, start_date, end_date, end_date_timestamp', 'required'),
			// email has to be a valid email address
			
			// verifyCode needs to be entered correctly
			
		);
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
			'usage_category'=>'Search By Type',
			'search_interval'=>'Search Interval',
			'start_date'=>'Start date',
			'end_date'=>'End date',
		);
	}
	/* ************************************************************** */
	public function getData()
	{
		
		$beginTime = $this->start_date_timestamp / 1000;
		$endTime = $this->end_date_timestamp / 1000;
		$lowTime = $beginTime;
		$day = 3600*24;
		$weeks = 56 * $day;
		$interval = $day*$this->search_interval;
		$returnData= array(); 
		$maxUsage = 0;
		$counter = 0;
		$totaljobs = 0;
		/* ************************************************************** */
		/*
		while ($lowTime <= ($endTime - $interval))
		{
			$highTime = $lowTime + $interval;
			$midTime = ($lowTime + $highTime)/2;
			for ($i = 1;  $i <= 1; $i++)
			{
		
		$data = Yii::app()->db->createCommand()
		 
			->select('j.id, j.min_time, j.'.$this->usage_category.'')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->where('j.status_id=:active AND j.min_time >= :beginTime AND j.min_time < :endTime AND j.queue_id = :qID', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$lowTime,
						':endTime'=>$highTime,
						':qID'=>1, 
						) ) 

			->queryAll(); 
			$totalUsage = 0;
			$jobs = 0;
			
			foreach($data as $element)
			{
				$totalUsage += $element[$this->usage_category];
				$jobs++;
				$totaljobs++;
			}
					
			$returnData[$counter]['jobs3'] = $jobs;
			$returnData[$counter]['totaljobs3'] = $totaljobs;
			$returnData[$counter]["usage_total_3"] = $totalUsage;
					
			

			
			if ($maxUsage < $totalUsage) $maxUsage = $totalUsage;
			}
			$returnData[$counter]['start_time'] = $midTime;
			$lowTime = $highTime;
			$counter++;
		}
				/* ************************************************************** */
		
		
		$uppertime = 0;
		$totaljobs = 0;
		for ($i = 1;  $i <= 4; $i++)
			{
				$counter = 0;
				$lowTime = $beginTime;
				$lowertime = $beginTime;
				while ($lowertime < $endTime)
					{
						if($endTime > ($lowertime + $weeks))
						$uppertime = $lowertime + $weeks;
						else $uppertime = $endTime;
		$data = Yii::app()->db->createCommand()
		 
			->select('j.id, j.min_time, j.'.$this->usage_category.'')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->where('j.status_id=:active AND j.min_time >= :beginTime AND j.min_time < :endTime AND j.queue_id = :qID', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$lowertime,
						':endTime'=>$uppertime,
						':qID'=>$i, 
						) ) 
			->order('j.min_time ASC')

			->queryAll(); 
			
			
			$index = 0;
			
			while ($lowTime <= ($uppertime - $interval))
		{
			$highTime = $lowTime + $interval;
			$midTime = ($lowTime + $highTime)/2;
			$totalUsage = 0;
			$jobs = 0;
			if (array_key_exists($index, $data))
			$recentTime = $data[$index]['min_time'];
			else $recentTime = $lowertime;
			while (($recentTime < $highTime) && (array_key_exists($index, $data)))
			{
				$totalUsage += $data[$index][$this->usage_category];
				$jobs++;
				$index++;
				$totaljobs++;
				if (array_key_exists($index, $data))              
				$recentTime = $data[$index]['min_time'];
				else break;
			}
			$returnData[$counter]["usage_total_$i"] = $totalUsage;
			$returnData[$counter]['jobs'] = $jobs;
			$returnData[$counter]['totaljobs'] = $totaljobs;
			if ($maxUsage < $totalUsage) $maxUsage = $totalUsage;
			
			$returnData[$counter]['start_time'] = $midTime;
			$lowTime = $highTime;
			$counter++;
		}
		$lowertime = $uppertime;
					}
			}
		
		/* ************************************************************** */
		/*
		$totaljobs = 0;
		for ($i = 1;  $i <= 1; $i++)
			{
				$counter = 0;
				$lowTime = $beginTime;

		$data = Yii::app()->db->createCommand()
		 
			->select('j.id, j.min_time, j.'.$this->usage_category.'')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->where('j.status_id=:active AND j.min_time >= :beginTime AND j.min_time < :endTime AND j.queue_id = :qID', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$beginTime,
						':endTime'=>$endTime,
						':qID'=>$i, 
						) ) 
			->order('j.min_time ASC')

			->queryAll(); 
			
			$index = 0;
			
			while ($lowTime <= ($endTime - $interval))
		{
			$highTime = $lowTime + $interval;
			$midTime = ($lowTime + $highTime)/2;
			$totalUsage = 0;
			$jobs = 0;
			if (array_key_exists($index, $data))
			$recentTime = $data[$index]['min_time'];
			while (($recentTime < $highTime) && (array_key_exists($index, $data)))
			{
				$totalUsage += $data[$index][$this->usage_category];
				$jobs++;
				$index++;
				$totaljobs++;
				if (array_key_exists($index, $data))              
				$recentTime = $data[$index]['min_time'];
				else break;
			}
			$returnData[$counter]["usage_total_2"] = $totalUsage;
			$returnData[$counter]['jobs2'] = $jobs;
			$returnData[$counter]['totaljobs2'] = $totaljobs;
			if ($maxUsage < $totalUsage) $maxUsage = $totalUsage;
			
			$returnData[$counter]['start_time2'] = $midTime;
			$lowTime = $highTime;
			$counter++;
		}
			}
		
		/* ************************************************************** */
		$returnData[0]['beginTime'] = $beginTime;
		$returnData[0]['endTime'] = $endTime;
		$returnData[0]['maxY'] = $maxUsage;
		$returnData[0]['category'] = $this->usage_category;
		//print_r($returnData);
		return $returnData; 
	} 
	/* ************************************************************** */
	
	
	
}
