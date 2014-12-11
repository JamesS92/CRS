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
        		 	 'actions'=>array('user', 'job', 'slot', 'jobreport', 'jobreportmenu', 'queuereport','jobReportMenu', 'usageSumReport'),
        		 	 'users'=>array('*'),
        		 ),
        		 array('allow',  // allow all users to perform 'index' and 'view' actions
        		 	 'actions'=>array('ajaxQueueReport', 'ajaxUsageSumReport'),
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
		
	     public function actionAjaxQueueReport()
	     {
		 
		$model = new QueueReportForm;
		$model->attributes = $_POST; 
		$model->validate(); 
		if ($model->hasErrors())
		{
			$this->setAjaxResponse('error', true); 
			$this->setAjaxResponse('message', $model->getErrors()); 
		}else 
			$this->setAjaxResponse('data',$model->getData()); 
		
		echo CJSON::encode($this->ajaxResponse); 
		
		
	     }
	     /* ******************************************************* */
		
		public function actionQueueReport()
	{
		// register the jq plot package 
		$model = new QueueReportForm;

		$this->render('queueReport',array('model'=>$model));
	}
		/* ******************************************************* */
		
	     public function actionAjaxUsagesumReport()
	     {
		 
		$model = new UsagesumReportForm;
		$model->attributes = $_POST; 
		$model->validate(); 
		if ($model->hasErrors())
		{
			$this->setAjaxResponse('error', true); 
			$this->setAjaxResponse('message', $model->getErrors()); 
		}else 
			$this->setAjaxResponse('data',$model->getData()); 
		
		echo CJSON::encode($this->ajaxResponse); 
		
		
	     }
	     /* ******************************************************* */
		
		public function actionUsagesumReport()
	{
		// register the jq plot package 
		$model = new UsagesumReportForm;

		$this->render('usagesumReport',array('model'=>$model));
	}

}
