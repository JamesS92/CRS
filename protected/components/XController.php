<?php 

abstract class XController extends CController {



	
        public $moduleName;
        public $menu; 
        public $breadcrumbs; 
         private $_ajaxResponse; 
       
	/* ******************************************************* */
	public function getControllerAdmins()
	{
		return array(); 
	} 
	/* ******************************************************* */
	public function filters()
	{
		return array('accessControl');
	}
	/* ******************************************************* */	
	public function init()
	{
		
		
		
		$this->moduleName ='site'; 
		if ($this->module) 
			$this->moduleName =$this->module->getName(); 
		 
		$this->layout ="//layouts/column1";
		
		Yii::app()->clientScript->registerPackage('bootstrap3');
		
		// standard ajax response code for non Yii ajax'd operations 
		$this->_ajaxResponse = new CAttributeCollection(); 
		$this->_ajaxResponse->message = array();
		$this->_ajaxResponse->error = false;
		$this->_ajaxResponse->data = array(); 
		$this->_ajaxResponse->id = 0; 
		$this->_ajaxResponse->code = 200;
		$this->menu = array(); 
		
		
		return parent::init(); 
		
		
	}
	/* ******************************************************* */
	public function getAjaxResponse()
	{
		return $this->_ajaxResponse; 
	}
	/* ******************************************************* */
	public function setAjaxResponse($name,$value)
	{
		if ($this->_ajaxResponse->hasProperty($name))
			$this->_ajaxResponse->add($name,$value);
	} 
	/* ******************************************************* */
	public function accessRules()
	{
    	    
		return array(
        		array('deny', 'users' => array('*')),
		 );
        }
        /* ******************************************************* */
        
} 

