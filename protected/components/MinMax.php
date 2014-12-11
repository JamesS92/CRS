 <?php
 
 class MinMax extends ReportHelper{
 
 public function init()
       {
       	       
       }
       
       
        public static function minVal($beginTime, $endTime, $qID, $column){
		
		
		$value = Yii::app()->db->createCommand()
		 
			->select('j.id, j.'.$column.'')
			->from('job j')
			->where('j.status_id=:active AND j.min_time > :beginTime AND j.min_time < :endTime AND j.queue_id = :qID', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$beginTime,
						':endTime'=>$endTime,
						':qID'=>$qID,
						) ) 
						->order('j.'.$column.' ASC')

			->queryRow(); 
			
			$minVal = $value[''.$column.''];
						//print_r($value[''.$column.'']);


			return $minVal ; 
	}
	public static function maxVal($beginTime, $endTime, $qID, $column){
		
		
		$value = Yii::app()->db->createCommand()
		 
			->select('j.id, j.'.$column.'')
			->from('job j')
			->where('j.status_id=:active AND j.min_time > :beginTime AND j.min_time < :endTime AND j.queue_id = :qID', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$beginTime,
						':endTime'=>$endTime,
						':qID'=>$qID,
						) ) 
			->order('j.'.$column.' DESC')
			->queryRow(); 
			
			$maxVal = $value[''.$column.''];
			//print_r($value[''.$column.'']);
			return $maxVal ; 
	}
       
       /*public static function normaliseCPU($start, $end, $qID)
       {
       	       //$maxCPU = 10;
       	       //$minCPU = 0;
       	       $maxCPU = Yii::app()->jobReport->maxCPUTime($start, $end, $qID);
       	       $minCPU = Yii::app()->jobReport->minCPUTime($start, $end, $qID);
       	       $normalisedCPU = ($CPU - $minCPU)/($maxCPU - $minCPU);
       	       
       	       return $normalisedCPU;
       }*/
 }
