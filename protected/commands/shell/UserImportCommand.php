<?php

class UserImportCommand extends CConsoleCommand
{
	public $seperator = "\n"; 
	public $dataDir = "/cubric/users/sapwe/Sites/CRS/protected/commands/shell/data"; 
	public $fileName = "users.txt";
	public $jobNo = 0;
    public function run($args)
    {
    	    //lscubricusers | awk '{print $3}'
    	   //  qstat -u '*' | awk '{ print $1 }' | sort -u  | tail -n 2 | head -n 1 

    	    $file = sprintf('%s/%s', $this->dataDir , $this->fileName); 
	    $data = file_get_contents( $file );
	    $job = array();
	    $searchData = array('firstname'=>'','surname'=>'','telephone'=>'','email'=>'',
    			'id_man'=>'', 
    			'username'=>'', 
    			'logon_type_id'=>Types::$logonType['DB']['id'], 
    			'record_type_id'=>Types::$recordType['PSY-USR']['id'], 
    			'gender_id'=>1,
    			'lang'=>'en-GB',
    			'status_id'=>Types::$status['active']['id'], 
    			'title_id'=>1,
    			'operation'=>'Add ',
    			'found'=>0,
    			); 
	    
	    if ($data)
		    $users= explode($this->seperator, $data);
	    
	    foreach($users as $u)
	    {
	    	    
	    	    
	    	    $user = User::model()->find('username=:username', array(':username'=>$username));
	    	    	 
	    	    	if ($user === null)
	    	    	{
	    	    		$user = new User;
	    	    	}
			$ldap = new LdapFinder();
			$search = $ldap->search(sprintf('(uid=%s)', $username));
			if ($search->count === 1)
			{ 
				$searchData['firstname'] = $search->data[0]['givenname'][0];
				$searchData['surname'] = $search->data[0]['sn'][0]; 
				$searchData['username'] = $username;
				$user->username = $username; 
				$user->firstname =$searchData['firstname']
				$user->lastname = $searchData['surname']
				$user->save(); 
				if ($user->hasErrors())
					print_r($user->getErrors());
			}else
				echo sprintf("ERROR: Something went wrong with %s" , $username); 
		
			$ldap = null;	    	    		
	    	    		 
	    	    	 
	    	    	
	    	    
	    	     
	    	    // unset($ldap); 
	    	    
	    	    
	    	    
	    } 
    }
}
