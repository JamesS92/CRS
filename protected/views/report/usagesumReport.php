<body id="user">
<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'usagesumReport',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	)); 
?>
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-5" for="type">Search By Type:</label>
    <div class="col-sm-2">
<?php echo CHtml::dropDownList('usage_category','',array('cpu_sum'=>'CPU', 'io_sum'=>'IO', 'memory_sum'=>'Memory', 'maxVMem_sum'=>'VMem', 'wait_time'=>'Wait Time')); ?>
    </div>
  </div>
  
  <form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-5" for="interval">Search Interval:</label>
    <div class="col-sm-2">
<?php echo CHtml::dropDownList('search_interval','',array(1=>'Day', 7=>'Week', 28=>'4 Weeks')); ?>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-5" for="start">Start Date:</label>
    <div class="col-sm-2"> 
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'start_date',
    'model'=>$model,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'dd/mm/yy',
        'altField' => '#start_date_timestamp',
        'altFormat'=>'@',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
)); ?>
</div>
  </div>
  <div class="form-group"> 
      <label class="control-label col-sm-5" for="end">End Date:</label>
    <div class="col-sm-2">
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'end_date',
    'model'=>$model,    
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'dd/mm/yy',
        'altField' => '#end_date_timestamp',
        'altFormat'=>'@',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
)); ?>   
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-8">
    <?php echo CHtml::hiddenField('start_date_timestamp','',array('id'=>'start_date_timestamp')); ?>
    <?php echo CHtml::hiddenField('end_date_timestamp','',array('id'=>'end_date_timestamp')); ?>
    <?php echo CHtml::button('search',array('onclick'=>'js:$.app.page.renderReport();')); ?>  
</div>
  </div>
</form>
<?php $this->endWidget(); ?>


<div id='report_canvas'> 

</div> 

<table style="width:100%" id="detailsTable">
  
  
</table>

