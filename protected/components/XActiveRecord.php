<?php

/**

This is an abstract parent class that sits between CActiveRecord and my Models. Its intention is 
to customize the framework without editing the framework itself. 

*/
abstract class XActiveRecord  extends CActiveRecord
{
	
	public function beforeValidate()
	{
		
		if ($this->isNewRecord)
		{
			$this->create_time = mktime();
			$this->create_usr_id = 1; 
		}
		else 
			$this->update_time = mktime(); 
			
		return parent::beforeValidate(); 
	} 
	
}
