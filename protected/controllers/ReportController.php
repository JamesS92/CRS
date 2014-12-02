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
        		 	 'actions'=>array('user', 'job', 'slot', 'jobreport', 'jobreportmenu'),
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
	
		public function actionSlot()
	{
		
		
		$slotModel = new Slot('search');
		$slotModel->unsetAttributes();  // clear any default values
		if (isset($_GET['Slot'])) {
			$slotModel->attributes = $_GET['Slot'];
		}
		
		$this->render('slot', array(
			'slotModel' => $slotModel,
		));
		 if (isset($_GET['pageSize'])) {
                    Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
                    unset($_GET['pageSize']);
                }
		 
	}
		/* ******************************************************* */
		
		public function actionJobReport()
	{
		$jobModel = new Job('search');
		$jobModel->unsetAttributes();  // clear any default values
		if (isset($_GET['Job'])) {
			$jobModel->attributes = $_GET['Job'];
		}
		
		$this->render('jobreport', array(
			'jobModel' => $jobModel,
		));
		 if (isset($_GET['pageSize'])) {
                    Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
                    unset($_GET['pageSize']);
                }
                }
                
                /* ******************************************************* */
		
		public function actionJobReportMenu()
	{
		$model = array();
		$this->render('JobReportMenu');
		if(isset($_POST['jobreportmenu']))
		{
			$model->attributes=$_POST['jobreportmenu'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->urlManager->createUrl('report/jobreport', array(10,10)));
		}
	}
}
