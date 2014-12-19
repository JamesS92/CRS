                                    <?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class UsagedetailsReport extends CFormModel
{

	public $returnTime;
	public $qID;
	public $returnInterval;
	public $chosenCategory;
	
	/* ************************************************************** */
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('returnTime, qID, returnInterval, chosenCategory', 'required'),
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
			
		);
	}
	
	/* ************************************************************** */
	public function getDetails()
	{
		$returnTime = $this->returnTime/1000;
		$halfInterval = $this->returnInterval / 2;
		$lowertime = $returnTime - $halfInterval;
		$uppertime = $returnTime + $halfInterval;
		$qID = $this->qID + 1;
		
		$data = Yii::app()->db->createCommand()
		 
			->select('j.id, u.username, j.min_time, j.name as job_name, rq.name as queue_name, j.cpu_sum, j.io_sum, j.memory_sum, j.maxvmem_sum, j.wait_time')
			->from('job j')
			->join('ref_queue rq' , 'rq.id = j.queue_id')
			->join('user u' , 'u.id = j.user_id')
			->where('j.status_id=:active AND j.min_time >= :beginTime AND j.min_time < :endTime AND j.queue_id = :qID', 
					array(':active'=>Types::$status['active']['id'],
						':beginTime'=>$lowertime,
						':endTime'=>$uppertime,
						':qID'=>$qID, 
						) ) 
			->order('j.'.$this->chosenCategory.' DESC')

			->queryAll(); 
			
			for($i=0; $i<count($data); $i++)
			{
				$data[$i]['min_time'] = date('d/m/Y h:i:s', $data[$i]['min_time']);
				/*$t = $data[$i]['wait_time'];
				$h = ($t/3600);
				$m = ($t/60%60);
				$s = $t%60;
				$data[$i]['wait_time'] = sprintf('%02d:%02d:%02d', $h, $m, $s);
				/*if ($h>24) {
					$d = $h/24;
					$h = $h%24;
					$data[$i]['wait_time'] = sprintf('%02d %02d:%02d:%02d', $d, $h, $m, $s);
				}*/
			}

			return $data;
			
	}
	
	
	
}
