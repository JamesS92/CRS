<body id="user">
<?php

//$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'job-grid',
    'dataProvider' => $jobModel->search(),
    'filter' => $jobModel,
    'selectableRows'=>1,
    'enableSorting'=>false, 
    'updateSelector'=>'custom-page-selector', //update selector
    //'selectionChanged'=>'js:$.app.page.selectUser();', 
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('report/slot', array('job_id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
    'columns' => array(
        'job_no',
        array('name'=>'auxUsername',  'value'=>'$data->user->username'),
        array('name'=>'auxQueuename',  'value'=>'$data->queue->name'),
        'sub_time',
        'min_time',
        'duration',
        'node_count',
        'failed_slot',
       // array('name'=>'sub_time',  'value'=>'Yii::app()->dateFormatter->formatDateTime("sub_time","full","full")'),
        'exit_code',
    ),
));


/*echo CHtml::dropDownList('user','',
	CHtml::listData(User::model()->findAll('status_id=:active',array(':active'=>Types::$status['active']['id'])) 
				,'id', 'username' ) , 
		array('id'=>'user-select','onchange'=>'js:$.app.page.nameChange();')
	); 
  
*/
