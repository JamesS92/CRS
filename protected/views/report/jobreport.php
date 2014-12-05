<body id="user">
<?php
$page=explode('=',Yii::app()->request->getRequestUri());
if(array_key_exists (1, $page )==true){
$pageno=explode('+',$page[1]);
if(array_key_exists (2, $pageno)){
$qname = $pageno[0];
//$startTime = 1400763200;
$startTime = $pageno[1];
//$endTime = 1417520914;
$endTime = $pageno[2];
$maxCPU = Yii::app()->jobReport->maxVal($startTime, $endTime, $qname, 'cpu_time');
$minCPU = Yii::app()->jobReport->minVal($startTime, $endTime, $qname, 'cpu_time');
//$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'job-grid',
    'dataProvider' => $jobModel->searchJobNormal($startTime, $endTime, $qname),
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
        'cpu_sum',
        array('name'=>'cpu_sum',  'value'=>'1000 * ($data->cpu_sum - '.$minCPU.')/('.$maxCPU.' - '.$minCPU.')'),
        //array('name'=>'cpu_sum',  'value'=>'('.$maxCPU.' - '.$minCPU.')'),
       // array('name'=>'cpu_sum',  'value'=>'$data->cpu_sum/'.$maxCPU.''),
    ),
));

}
else{
Yii::app()->Controller->redirect('job');
}
}
else{
Yii::app()->Controller->redirect('job');
}
