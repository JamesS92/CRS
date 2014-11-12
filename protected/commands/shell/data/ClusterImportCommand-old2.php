<?php

class ClusterImportCommand extends CConsoleCommand
{
	public $seperator = "=============================================================="; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/protected/commands/shell/data"; 
    public function run($args)
    {
    	    $file = sprintf('%s/%s', $subDir , $filename[$j+2]); 
	    $data = file_get_contents( $file );
	   
	    
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
				//$component[$x] = explode(" ", $component[$x], 2);
			}
			
			// if you are on the first record then fill in the stuff that is not specific.
			// this bit only happens once regardless of the size of the loop 
			if ($i==1)
			{                                      
			$job[$j] = array(
					'qname'=>$component[1], 
					'owner'=>$component[3],
					'jobnumber'=>basename($directory[$j+2], '.txt'),
					'jobname'=>$component[4], 
					'starttime'=>10, 
					'walltime'=>15,
					'hosts'=>array() 
				); 
			}
			// end if 
			// then in a loop on each node populate the 
			$job[$j]['hosts'][] = array('hostname'=>$component[2],
						'cpu'=>$component[11],
						'memory'=>$component[12],
						'io'=>$component[13]
						);  
			// end loop 				 
				 
			
			
		}   	
		
		
			
	    }
    	    
    }
