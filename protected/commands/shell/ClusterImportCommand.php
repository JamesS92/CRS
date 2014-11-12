<?php

class ClusterImportCommand extends CConsoleCommand
{
	public $seperator = "=============================================================="; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/import/jobinfo/1"; 
	
	
    public function run($args)
    {
    	    $this->parseJobFile( $this->dataDir , '989.txt');
    	    /*$this->initMachines(); 
    	    $dir = array_diff(scandir($this->dataDir), array('..', '.'));
    	    // print_r ($dir);
    	    
    	  	 foreach ($dir as $currentDir)
    	  	 {
    	  	 	 print_r ($currentDir );
    	  	 	 print_r (' ');
    	  	 	 $thisDir = $this->dataDir . DIRECTORY_SEPARATOR . $currentDir;
    	  	 	 $file = array_diff(scandir($thisDir), array('..', '.'));
    	  	 	 //print_r ($file);
    	    	 	foreach ($file as $chosenFile) 
    	    	 	{
    	    	 		//print_r ($chosenFile);
    	    	 		if (filesize($thisDir .'/'. $chosenFile) > 0)
    	    	 		$this->parseJobFile( $thisDir , $chosenFile); 
    	    	 	}
    	    	 }*/
    	    
    }
    
    
    /* ******************************************************************** */
    private function initMachines()
    {
    	    $domain = 'cubric.cf.ac.uk'; 
    	    for ($i  = 1  ; $i < 7 ; $i++)
    	    {
    	    	    for ($j  = 1  ; $j < 19 ; $j++)
    	    	    {
    	    	    	    $machine = sprintf('c%sb%s.%s' , $i , $j , $domain); 
    	    	    	     $machineModel = RefMachine::model()->find('name=:hostname', array(':hostname'=>$machine)); 
    	    	    	     if ($machineModel === null)
    	    	    	     {
    	    	    	     	     $machineModel = new RefMachine;
    	    	    	     	     $machineModel->name = $machine; 
    	    	    	     	     $machineModel->save(); 
    	    	    
    	    	    	     }
    	    	    }
    	    }
    } 
    
    /* ******************************************************************** */
    /* ******************************************************************** */
    /* ******************************************************************** */
    
    private function parseJobFile($dir,$file)
    {
    	    
    	    $file = sprintf('%s/%s', $dir , $file);
    	    $data = file_get_contents( $file );
	    $job = array();
	    $minTime = array();
	    $maxTime = array();
	    
	    if ($data)
		    $nodes= explode($this->seperator, $data);
	    
	     
	    for($i = 0; $i < count($nodes); $i++)
	    {
	   
		if ($nodes[$i] !== null)
		{
			
			// component array = consituent parts of job at node level
			$component = explode("\n", $nodes[$i]);
			
			for ($x=0; $x < count($component); $x++)
			{
				$spliter = preg_split("/[\s,]+/", $component[$x], 2);
				$component[$x] = $spliter[1];
			}
			
			// if you are on the first record then fill in the stuff that is not specific.
			// this bit only happens once regardless of the size of the loop 
			
			if ($i==1)
			{   
				
				$job = array(
					'qname'=>str_replace(' ', '', $component[1]), 
					'owner'=>str_replace(' ', '', $component[4]),
					'jobnumber'=>str_replace(' ', '', $component[8]),
					'jobname'=>str_replace(' ', '', $component[7]),
					'qsubtime'=>strtotime($component[12]),
					'exitstatus'=>str_replace(' ', '', $component[18]),
					'hosts'=>array() 
				);
			
			}
			// parse the maxvmem value to strip the M or if G,strip the G and convert to M
			if ( strpos($component[41] , 'G') !== false )
			{
				$maxvmem = str_replace(' ', '', str_replace('G', '', $component[41]));
				$maxvmem = $maxvmem * 1024; 
			}elseif ( strpos($component[41] , 'M') !== false )
				$maxvmem = str_replace(' ', '', str_replace('M', '', $component[41]));
			else 
				$maxvmem = str_replace(' ', '' ,  $component[41]);
			
			$job['hosts'][] = array('hostname'=>str_replace(' ', '', $component[2]),
						'slots'=>str_replace(' ', '', $component[16]),
						'starttime'=>strtotime($component[13]),
						'endtime'=>strtotime($component[14]),
						'walltime'=>str_replace(' ', '', $component[19]),
						'cpu'=>str_replace(' ', '', $component[37]),
						'memory'=>str_replace(' ', '', $component[38]),
						'io'=>str_replace(' ', '', $component[39]),
						'maxvmem'=>$maxvmem 
						);  
			echo $job['hosts'][$i]['starttime'];
			$minTime[$i] = $job['hosts'][$i]['starttime'];
			$maxTime[$i] = $job['hosts'][$i]['endtime'];	 
		}
		$job['min_time'] = min($minTime);
		$job['max_time'] = max($maxTime);

	    }
	    //echo $job['jobnumber'];
	    print_r($job);
	    	    print_r($minTime);

	    return 0;
	    //$this->processJob($job);
    
    } 
    /* ******************************************************************** */
    private function processJob($job)
    {
    	    $queue_id = $this->processQueue($job['qname']);
    	    $jobModel = Job::model()->find('job_no=:job_no', array(':job_no'=>$job['jobnumber']));
    	    
    	    if ($jobModel===null)
    	    {
    	    	    $jobModel = new Job; 
    	    	    $jobModel->job_no = $job['jobnumber'];
    	    	    $jobModel->queue_id = $queue_id;
    	    	    $jobModel->user_id = $this->getUserId($job['owner']); 
    	    	    $jobModel->name = $job['jobname'];
    	    	    $jobModel->sub_time = $job['qsubtime'];
    	    	    $jobModel->exit_code = $job['exitstatus'];
    	    	   // print_r($jobModel);
    	    	    //$jobModel->save();
    	    	    
    	    	    if ($jobModel->save())
    	    	    {
    	    	    	foreach($job['hosts'] as $slot)
    	    	    		$this->processSlot($slot, $jobModel->id, $job['jobnumber']); 
    	    	    } else 
    	    	    	if ($jobModel->hasErrors())
    	    	    	{
    	    	    		print_r($job['jobnumber']);
    	    	    		print_r($jobModel->getErrors()); 
    	    	    	}
    	    }
    	    
    } 
    /* ******************************************************************** */
    private function processSlot($slot,$job_id, $jobno)
    {
    	    $machine_id = $this->processMachine($slot['hostname']);
    	    $slotModel = Slot::model()->find('job_id=:job_id AND machine_id=:machine_id', array(':job_id'=>$job_id,':machine_id'=>$machine_id)); 
    	    if ($slotModel === null)
    	    {
    	    	    $slotModel = new Slot; 
    	    	    $slotModel->job_id = $job_id;
    	    	    $slotModel->machine_id = $machine_id;
    	    	    $slotModel->start_time = $slot['starttime'];
    	    	    $slotModel->end_time = $slot['endtime'];
    	    	    $slotModel->wall_time = $slot['walltime'];
    	    	    $slotModel->memory = $slot['memory'];
    	    	    $slotModel->cpu_time = $slot['cpu'];
    	    	    $slotModel->io = $slot['io'];
    	    	    $slotModel->slots = $slot['slots'];
    	    	    $slotModel->maxvmem = $slot['maxvmem'];
    	    	        	    //	    print_r($slotModel);

    	    	    $slotModel->save();
    	    	    if ($slotModel->hasErrors())
    	    	    {
    	    	    	    print_r($jobno);
    	    	    	    print_r($slotModel->getErrors());
    	    	    }
    	    } 
    	    
    	    
    }
    /* ******************************************************************** */
    private function processQueue($queue)
    {
    	     $queueModel = RefQueue::model()->find('name=:qname', array(':qname'=>$queue)); 
    	    if ($queueModel === null)
    	    {
    	    	    $queueModel = new RefQueue;
    	    	    $queueModel->name = $queue; 
    	    	    $queueModel->save(); 
    	    	    
    	    }
    	    return $queueModel->id; 
    } 
    /* ******************************************************************** */
    private function getUserId($username)
    {
    	    $userModel = User::model()->find('username=:username', array('username'=>$username)); 
    	    if ($userModel !== null)
    	    	    return $userModel->id;
    	    else 
    	    	return 1; 
    	    	
    	    
    }
    /* ******************************************************************** */
    private function processMachine($machine)
    {
    	    $machineModel = RefMachine::model()->find('name=:hostname', array(':hostname'=>$machine)); 
    	    if ($machineModel !== null)
    	    	    return $machineModel->id; 
    	    
    	    		
    } 
    /* ******************************************************************** */
    /* ******************************************************************** */
    
} // end class 
