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
        		 	 'actions'=>array('user', 'job'),
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
	public function actionJob()
	{
		
		
		$jobModel = new Job('search');
		$jobModel->unsetAttributes();  // clear any default values
		if (isset($_GET['Job'])) {
			$jobModel->attributes = $_GET['Job'];
		}
		
		$this->render('job', array(
			'jobModel' => $jobModel,
		));
		 if (isset($_GET['pageSize'])) {
                    Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
                    unset($_GET['pageSize']);
                }
		 
	}
		/* ******************************************************* */

}
