<?php

class ClusterImportCommand extends CConsoleCommand
{
	public $seperator = "=============================================================="; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/protected/commands/shell/data"; 
	public $fileName = "989.txt";
	public $jobNo = 0;
    public function run($args)
    {
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
				$spliter = preg_split("/[\s,]+/", $component[$x]);
				$component[$x] = $spliter[1];
			}
			
			// if you are on the first record then fill in the stuff that is not specific.
			// this bit only happens once regardless of the size of the loop 
			
			if ($i==1)
			{                                      
			$job[$jobNo] = array(
					'qname'=>$component[1], 
					'owner'=>$component[3],
					'jobnumber'=>basename($directory[$j+2], '.txt'),
					'jobname'=>$component[4], 
					'starttime'=>10, 
					'walltime'=>15,
					'hosts'=>array() 
				);
			
			}
			
			$job[$jobNo]['hosts'][] = array('hostname'=>$component[2],
						'cpu'=>$component[11],
						'memory'=>$component[12],
						'io'=>$component[13]
						);  
				 
		}   	
		
	    }
	    print_r($job);
    	    
    }
}
