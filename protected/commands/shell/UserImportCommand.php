<?php

class UserImportCommand extends CConsoleCommand
{
	public $seperator = "\n"; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/protected/commands/shell/data"; 
	public $fileName = "users.txt";
	public $jobNo = 0;
    public function run($args)
    {
    	    
    	    $file = sprintf('%s/%s', $this->dataDir , $this->fileName); 
	    $data = file_get_contents( $file );
	    $job = array();
	    
	    if ($data)
		    $users= explode($this->seperator, $data);
	    
	    foreach($users as $u)
	    {
	    	    $line = explode('  ', $u);
	    	    $username = $line[0]; 
	    	    $firstname = $line[1];
	    	    if (isset($line[2]))
	    	    	$surname = $line[2];
	    	     
	    	      
	    	    	$user = User::model()->find('username=:username', array(':username'=>$username));
	    	    	 
	    	    	if ($user === null)
	    	    	{
	    	    		$user = new User; 
	    	    		$user->username = $username; 
	    	    		$user->firstname = $firstname;
	    	    		$user->lastname = $surname;
	    	    		$user->save(); 
	    	    		if ($user->hasErrors())
	    	    			print_r($user->getErrors()); 
	    	    	}; 
	    	    	
	    } 
    }
}
