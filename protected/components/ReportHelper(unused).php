<?php 

class ReportHelper extends CComponent 
{


	
	/* **************************************************************** */ 
 
	public static function jobsByUser($username){
		
		
		$dataReader = Yii::app()->db->createCommand()
		 
			->select('j.id,j.job_no,j.user_id,j.queue_id,rq.name,j.sub_time')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->join('user u' , 'u.id = j.user_id')
			->where('j.status_id=:active AND u.username=:username', 
					array(':active'=>Types::$status['active']['id'],
						':username'=>$username,
						) ) 
			->queryAll(); 
			// ->queryRow();  if you are only want to pull out one row recordset  
			return $dataReader ;  
		
	} 
	
	/* **************************************************************** */
	
	// job_id = id from table (not job_no)
	public static function slotsByJob($job_id){
		
		// make sure slot status is active: 
		
		// with  update slot set status_id = 2; 
		
		$dataReader = Yii::app()->db->createCommand()
		 
			->select('j.id,j.job_no,j.user_id,j.queue_id,rq.name,j.sub_time')
			->from('job j')
			->join('')
			->join('')
			->where('j.status_id=:active AND u.username=:username', 
					array(':active'=>Types::$status['active']['id'],
						':username'=>$username,
						) ) 
			->queryAll(); 
			return $dataReader ;  
		
	}
	/* **************************************************************** */
	public static function getUsers()
	{
	} 
	
	/* **************************************************************** */
	public static function getTotalCpuTime($job_id)
	{
		// select sum cpu_time from slot where job_id = X 
	}
	/* **************************************************************** */
	public static function getTotalMemTime($job_id)
	{
	}
	/* **************************************************************** */
	public static function getTotalIoTime($job_id)
	{
	}
	/* **************************************************************** */
} 
