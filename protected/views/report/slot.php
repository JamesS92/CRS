<?php

//$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'slot-grid',
    'dataProvider' => $slotModel->search(),
    'filter' => $slotModel,
    'selectableRows'=>1,
    'enableSorting'=>false, 
    'updateSelector'=>'custom-page-selector', //update selector
    //'selectionChanged'=>'js:$.app.page.selectUser();', 
    'columns' => array(
        array('name'=>'auxJobNo',  'value'=>'$data->job->job_no'),
        array('name'=>'auxMachineName',  'value'=>'$data->machine->name'),
        'start_time',
        'wall_time',
        'memory',
        'cpu_time',
       // array('name'=>'sub_time',  'value'=>'Yii::app()->dateFormatter->formatDateTime("sub_time","full","full")'),
        'io',
        'slots',
        'maxvmem',
        'failed'
    ),
));
