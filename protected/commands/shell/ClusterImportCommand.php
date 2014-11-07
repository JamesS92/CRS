<?php

class ClusterImportCommand extends CConsoleCommand
{
	public $seperator = "=============================================================="; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/protected/commands/shell/data"; 
	public $fileName = "3.txt";
	
    public function run($args)
    {
    	    date_default_timezone_set ( 'UTC' );
    	    $file = sprintf('%s/%s', $this->dataDir , $this->fileName); 
	    $data = file_get_contents( $file );
	    $job = array();
	    
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
				
				$job[$jobNo] = array(
					'qname'=>$component[1], 
					'owner'=>$component[4],
					'jobnumber'=>$component[8],
					'jobname'=>$component[7],
					'qsubtime'=>strtotime($component[12]),
					'starttime'=>strtotime($component[13]),
					'walltime'=>(strtotime($component[14])-strtotime($component[13])),
					'hosts'=>array() 
				);
			
			}
			
			$job[$jobNo]['hosts'][] = array('hostname'=>$component[2],
						'slots'=>$component[16],
						'exitstatus'=>$component[18],
						'wallclock'=>$component[19],
						'cpu'=>$component[37],
						'memory'=>$component[38],
						'io'=>$component[39],
						'maxvmem'=>$component[41]
						);  
				 
		}   	
		
	    }
	    print_r($job);
    	    
    }
}
