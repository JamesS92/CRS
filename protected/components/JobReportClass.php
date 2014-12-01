<?php 

class JobReportClass extends ReportClass
{
	
	private function minCPUTime($beginTime, $endTime, $qName){
		
		
		$CPUtime = Yii::app()->db->createCommand()
		 
			->select('j.id, j.cpu_sum')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->where('j.status_id=:active AND j.min_time > :beginTime AND j.max_time < :endTime AND rq.name = :qName', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$beginTime,
						':endTime'=>$endTime,
						':qName'=>$qName,
						) ) 
						->order('j.cpu_sum ASC')

			->queryRow(); 
			
			
			return array ($minCPU) ; 
	}
	private function maxCPUTime($beginTime, $endTime, $qName){
		
		
		$CPUtime = Yii::app()->db->createCommand()
		 
			->select('j.id, j.cpu_sum')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->where('j.status_id=:active AND j.min_time > :beginTime AND j.max_time < :endTime AND rq.name = :qName', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$beginTime,
						':endTime'=>$endTime,
						':qName'=>$qName,
						) ) 
			->order('j.cpu_sum DESC')
			->queryRow(); 
			
			
			return array ($maxCPU) ; 
	}
		
}
