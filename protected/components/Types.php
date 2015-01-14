<?php 

class Types extends CComponent {
	
	
	static $httpCodes = array(
			200=>'OK', 
			301=>'Moved permanently', 
			302=>'Found',
			304=>'Not modified',
			307=>'Temporary redirected',
			400=>'Bad request',
			401=>'Unauthorized',
			403=>'Forbidden', 
			404=>'Not found', 
			405=>'Method not allowed', 
			406=>'Not acceptable',
			500=>'Internal server error' 
            ); 
         
        
        
        /* **************************************************************** */
        static $status = array(
        		'null'=>array('id'=>1,'code'=>'null','name'=>'null' , 'description'=> '' , 'title'=>'' ),
        		'active'=>array('id'=>2,'code'=>'active','name'=>'Active' , 'description'=> '' , 'title'=>'' ),
        		'inactive'=>array('id'=>3,'code'=>'inactive','name'=>'Inactive' , 'description'=> '' , 'title'=>'' ),
        		'pending'=>array('id'=>4,'code'=>'pending','name'=>'Pending' , 'description'=> '' , 'title'=>'' ),
			'unknown'=>array('id'=>5,'code'=>'unknown','name'=>'Unknown' , 'description'=> '' , 'title'=>'' ),

        	);
        
	/* **************************************************************** */
	
      
	
} // end classs 
