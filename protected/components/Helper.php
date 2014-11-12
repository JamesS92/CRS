<?php 

class Helper extends CComponent{
	
      private $_jsConfig; 
      
      /* ************************************************************** */
        
      /* ************************************************************** */
      /* ************************************************************** */
       public function init()
       {
       	     $this->_jsConfig = new CAttributeCollection;
       } 
      /* ************************************************************** */
      public function getJsConfig()
      {
      	     	return $this->_jsConfig; 
      } 
      /* ************************************************************** */
       public function addJsConfig($name,$value) {
       	   $this->_jsConfig->add($name,$value);
       }
       /* ************************************************************** */
   }
