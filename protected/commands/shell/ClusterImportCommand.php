<?php

class ClusterImportCommand extends CConsoleCommand
{
	public $seperator = "=============================================================="; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/import/jobinfo/"; 
	
	/* ******************************************************************** */
	
    public function run($args)
    {
    	   $this->initMachines(); 
    	   //$this->initUsers();
    	   $this->pullJob(); 
    	   $this->checkRunningJobs();
    }
     /* ******************************************************************** */
     /* ******************************************************************** */
     private function pullJob()
    {
    	    $value = Yii::app()->db->createCommand()
		 
			->select('j.job_no')
			->from('job j')
			->order('j.job_no DESC')

			->queryRow(); 
			

	    $firstJob = $value[0] + 1;
    	    
    	    $job=$firstJob;
    	    
    	    $dir = 0;
    	    $tmpDir = system('mktemp -d');
    	     print_r ('tempfolder');
    	    system("mkdir $tmpDir/$dir");
    	    
    	    $counter = 0;
    	    while($job<$lastJob){
    	    	    $counter++;
    	    	    system("qacct -j $job > $tmpDir/$dir/$job.txt");
    	    	    if($counter>=1000){
    	    	    	    $dir++;
    	    	    	    $counter = 0;
    	    	    	    system("mkdir $tmpDir/$dir");
    	    	    }
    	    	    $job++;
    	    }
    	    $this->findJobFile($tmpDir);
    }
     /* ******************************************************************** */
     private function findJobFile($tmpDir)
    {
    	    
    	    
    	      $dir = array_diff(scandir($tmpDir), array('..', '.'));
    	    
    	  	 foreach ($dir as $currentDir)
    	  	 {
    	  	 	 print_r ($currentDir );
    	  	 	 //print_r (' ');
    	  	 	 $thisDir = $tmpDir . DIRECTORY_SEPARATOR . $currentDir;
    	  	 	 $file = array_diff(scandir($thisDir), array('..', '.'));
    	  	 	 //print_r ($file);
    	    	 	foreach ($file as $chosenFile) 
    	    	 	{
    	    	 		//print_r ($chosenFile);
    	    	 		if (filesize($thisDir .'/'. $chosenFile) > 0)
    	    	 		$this->parseJobFile( $thisDir , $chosenFile); 
    	    	 		else $this->parseFailedJob(basename("$chosenFile", ".txt"));
    	    	 	}
    	    	 }
    	    	 
    	    	 
    }
    /* ******************************************************************** */
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
    	     print_r ('initMachines');
    } 
    
    /* ******************************************************************** */
    /* ******************************************************************** */
    private function parseFailedJob($jobNo)
    {
    	    $jobModel = Job::model()->find('job_no=:job_no', array(':job_no'=>$jobNo));
    	    
    	    if ($jobModel===null)
    	    {
    	    	    $jobModel = new Job; 
    	    	    $jobModel->job_no = $jobNo;
    	    	    $jobModel->queue_id = 'Unknown';
    	    	    $jobModel->user_id = $this->getUserId('Unknown');
    	    	    $jobModel->name = 'Unknown';
    	    	    $jobModel->status_id = 5;
    	    	   // print_r($jobModel); 
    	    	    //$jobModel->save();
    	    	    
    	    	    if ($jobModel->save())
    	    	    {
    	    	    } else 
    	    	    	if ($jobModel->hasErrors())
    	    	    	{
    	    	    		print_r($job['jobnumber']);
    	    	    		print_r($jobModel->getErrors()); 
    	    	    	}
    	    }
    }
    	    
    /* ******************************************************************** */
    /* ******************************************************************** */
    
    private function parseJobFile($dir,$file)
    {
    	    
    	    $file = sprintf('%s/%s', $dir , $file);
    	    $data = file_get_contents( $file );
	    $job = array();
	    $qtime = 0;
	    $mintime = 0;
	    $wait = 0;
	    $maxtime = 0;
	    $duration = 0;
	    $cpu = 0;
	    $memory = 0;
	    $io =  0;
	    $failed = 0;
	    $cpu_sum = 0;  	
	    $memory_sum   = 0;
	    $io_sum  	 = 0;
	    $maxvmem_sum  = 0;
	    $failed_slot   = 0;
	    $node_count   = 0;
	    $e = 0;
	    $s = 0;
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
			
			$starttime = strtotime($component[13]);
			$endtime = strtotime($component[14]);
			
			if ($i==1)
			{   
				
				$qtime = strtotime($component[12]);      
				
				$job = array(
					'qname'=>str_replace(' ', '', $component[1]), 
					'owner'=>str_replace(' ', '', $component[4]),
					'jobnumber'=>str_replace(' ', '', $component[8]),
					'jobname'=>str_replace(' ', '', $component[7]),
					'qsubtime'=>$qtime,
					'exitstatus'=>str_replace(' ', '', $component[18]),
					'hosts'=>array() 
				);
					

			}
			
			if ($i > 0 && $starttime !== null && $starttime > 130000000 && $s == 0)
			{
				$mintime = $starttime;
				$s = 1;
			}
			
			if ($i > 0 && $endtime !== null && $endtime > 130000000 && $e == 0)
			{
				$maxtime = $endtime;
				$e = 1;
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
				
			$cpu = 	str_replace(' ', '', $component[37]);
			$memory = str_replace(' ', '', $component[38]);
			$io =   str_replace(' ', '', $component[39]);
			$failed = $component[17];
				
			
			$job['hosts'][] = array('hostname'=>str_replace(' ', '', $component[2]),
						'slots'=>str_replace(' ', '', $component[16]),
						'slot_order'=>$i,
						'starttime'=>$starttime,
						'endtime'=>$endtime,
						'walltime'=>str_replace(' ', '', $component[19]),
						'cpu'=>$cpu,
						'memory'=>$memory,
						'io'=>$io,
						'maxvmem'=>$maxvmem,
						'failed'=>$failed
						);  
			
			$cpu_sum += $cpu; 
			$memory_sum += $memory;
			$io_sum += $io;
			$maxvmem_sum += $maxvmem;
			
			if ($i > 1 && $starttime < $mintime && $s == 1 && $starttime !== null && $starttime > 130000000)
			$mintime = $starttime;
			if ($i > 1 && $endtime > $mintime && $e ==1 && $endtime !== null && $endtime > 130000000)
			$maxtime = $endtime;	 
		}
		if ($failed > 0)
			$failed_slot += 1;
		
		
	    }
		$job['node_count'] = count($job['hosts']); 
		
		$job['cpu_sum'] = $cpu_sum;
		$job['memory_sum'] = $memory_sum;
		$job['io_sum'] = $io_sum;
		$job['maxvmem_sum'] = $maxvmem_sum;
		$job['failed_slot'] = $failed_slot;

		
		$job['min_time'] = $mintime;
		if ($s == 0)
			$job['min_time'] = 0;
		
		$job['max_time'] = $maxtime;
		if ($e == 0)
			$job['max_time'] = 0;
		
		$wait = $mintime - $qtime;
		if ($mintime < $qtime) $wait = 0;
		elseif ($wait > 130000000) $wait = 0;
		$job['wait_time'] = $wait;
		$duration = $maxtime - $mintime;
		$job['duration'] = $duration;
	    //echo $job['jobnumber'];
	    	//print_r($job);
	    	    
	 //  return 0;
	   return $this->processJob($job);
    
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
    	    	    $jobModel->min_time        = $job['min_time'];
    	    	    $jobModel->max_time        = $job['max_time'];
    	    	    $jobModel->wait_time        = $job['wait_time'];
    	    	    $jobModel->duration        = $job['duration'];
    	    	    $jobModel->cpu_sum		 = $job['cpu_sum'];
    	    	    $jobModel->memory_sum      = $job['memory_sum'];
    	    	    $jobModel->io_sum  	       = $job['io_sum'];
    	    	    $jobModel->maxvmem_sum     = $job['maxvmem_sum'];
    	    	    $jobModel->failed_slot      = $job['failed_slot'];
    	    	    $jobModel->node_count      = $job['node_count'];
    	    	    $jobModel->exit_code = $job['exitstatus'];
    	    	    $jobModel->min_time = $job['min_time'];
    	    	    $jobModel->max_time = $job['max_time'];
    	    	    $jobModel->duration = $job['duration'];
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
    	    $slotModel = Slot::model()->find('job_id=:job_id AND machine_id=:machine_id AND slot_order=:slot_order', array(':job_id'=>$job_id,':machine_id'=>$machine_id,':slot_order'=>$slot['slot_order'])); 
    	    if ($slotModel === null)
    	    {
    	    	    $slotModel = new Slot; 
    	    	    $slotModel->job_id = $job_id;
    	    	    $slotModel->machine_id = $machine_id;
    	    	    $slotModel->slot_order = $slot['slot_order'];
    	    	    $slotModel->start_time = $slot['starttime'];
    	    	    $slotModel->end_time = $slot['endtime'];
    	    	    $slotModel->wall_time = $slot['walltime'];
    	    	    $slotModel->memory = $slot['memory'];
    	    	    $slotModel->cpu_time = $slot['cpu'];
    	    	    $slotModel->io = $slot['io'];
    	    	    $slotModel->slots = $slot['slots'];
    	    	    $slotModel->maxvmem = $slot['maxvmem'];
    	    	    $slotModel->failed = $slot['failed'];
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
    /* ******************************************************************** */
    private function initUsers()
    {
    	    
    }
    /* ******************************************************************** */
    /* ******************************************************************** */
    private function getUserId($username)
    {
    	    $userModel = User::model()->find('username=:username', array('username'=>$username)); 
    	    if ($userModel !== null)
    	    	    return $userModel->id;
    	    else 
    	    {
    	    	    $userModel = new User;
    	    	    $userModel->username = $username;
    	    	    $userModel->firstname = $username;
    	    	    $userModel->save(); 
    	    	    return $userModel->id;
    	    }
    	    	
    	    
    }
    /* ******************************************************************** */
    /* ******************************************************************** */
    private function processMachine($machine)
    {
    	    $machineModel = RefMachine::model()->find('name=:hostname', array(':hostname'=>$machine)); 
    	    if ($machineModel !== null)
    	    	    return $machineModel->id; 
    	     else 
    	    {
    	    	$machineModel = new RefMachine;
    	    	    $machineModel->name = $machine; 
    	    	    $machineModel->save(); 
    	    	    return $machineModel->id;
    	    }
    	    
    	    		
    } 
    /* ******************************************************************** */
    /* ******************************************************************** */
    private function checkRunningJobs()
    {
    	    $tmpDir = system('mktemp -d');
    	    $value = Yii::app()->db->createCommand()
		 
			->select('j.job_no, j.create_time')
			->from('job j')
			->where('j.status_id=:unknown',
				array(':unknown'=>Types::$status['unknown']['id'],)
				)

			->queryAll(); 
			
			foreach($value as $runningJob){
				 system("qacct -j ".$runningJob['job_no']." > $tmpDir/0/$runningJob.txt");
				 print_r ('runningJob');
				 	  print_r ($runningJob);
				 }
			
			
			$this->findJobFile($tmpDir);
    }
    /* ******************************************************************** */
    /* ******************************************************************** */
    
} // end class 
