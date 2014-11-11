<?php

class ReportController extends XController
{
	/**
	 * Declares class-based actions.
	 */
	/* ******************************************************* */
	 public function accessRules()
	{
    	    
		return array(
        		 array('allow',  // allow all users to perform 'index' and 'view' actions
        		 	 'actions'=>array('user'),
        		 	 'users'=>array('*'),
        		 ),
        		array('deny', 'users' => array('*')),
		 );
        }
        /* ******************************************************* */
	public function actionUser()
	{
		
		
		$userModel = new User('search');
		$userModel->unsetAttributes();  // clear any default values
		if (isset($_GET['User'])) {
			$userModel->attributes = $_GET['User'];
		}
		$this->render('user', array(
			'userModel' => $userModel,
		));
		 
	}
	
	/* ******************************************************* */
	
}
