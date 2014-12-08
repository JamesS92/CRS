<body id="user">
<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'queueReport',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	)); 
?>
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-5" for="queue">Queue:</label>
    <div class="col-sm-2">
<?php echo CHtml::dropDownList('queue_id','',$model->queueList, array('id'=>'user-select','onchange'=>'js:$.app.page.nameChange();')); ?>
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
