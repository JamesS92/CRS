<?php

class ClusterImportCommand extends CConsoleCommand
{
	public $seperator = "=============================================================="; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/protected/commands/shell/data"; 
    public function run($args)
    {
    	    //http://php.net/manual/en/function.readfile.php
    	    // http://php.net/manual/en/function.explode.php
    	    
    	    $directory = array_diff (scandir($this->dataDir), array('..', '.'));
    	    //$directory = scandir($this->dataDir);
    	    $job = array();
    	    
    	    
    	    foreach($directory as $dir)
    	    {
    	    	    $subDir = ($dataDir . DIRECTORY_SEPARATOR . $dir);
    	    	    $filename = array_diff (scandir($subDir), array('..', '.'));
    	    	    print_r ($filename);
    	    
    	    
		    for($j=0; $j < count($filename); $j++)
			{
			
			    $file = sprintf('%s/%s', $subDir , $filename[$j+2]); 
			    $data = file_get_contents( $file );
			    echo $directory[$j+2];
			    
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
						 
					
					/*$job[$i]['qname'] = $component[1];
					$job[$i]['hostname'] = $component[2];
					$job[$i]['owner'] = $component[3];
					$job[$i]['jobname'] = $component[4];
					$job[$i]['slots'] = $component[8];
					$job[$i]['walltime'] = $component[10];
					$job[$i]['cpu'] = $component[11];
					$job[$i]['memory'] = $component[12];
					$job[$i]['io'] = $component[13];*/
				}   	
				
				
					
			    }
				
		    
		   // foreach($components as $c)
			//print_r ($c);
			
			//echo count ($holder);
			/*echo "\n";
			echo $component[2];
			echo "\n";
			echo $job[1];*/
			//print_r($job);
			//print_r ($directory);
			//print_r (count($directory));
			//print_r($job);    	    	
			}
	    }
    	    	print_r($job);
    	     
    	    //echo "welcome to our command. Here are your arguments: "; 
    	    //print_r($args); */
    	    
    } 
}
?>
