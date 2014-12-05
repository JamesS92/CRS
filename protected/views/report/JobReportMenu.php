<body id="user">
<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobreportmenu',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	)); 

$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'startdate',
    'model'=>$model,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'altFormat'=>'@',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'enddate',
    'model'=>$model,    
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));

echo CHtml::dropDownList('queue','',
	CHtml::listData(RefQueue::model()->findAll('status_id=:active',array(':active'=>Types::$status['active']['id'])) 
				,'id', 'name' ) , 
		array('id'=>'user-select','onchange'=>'js:$.app.page.nameChange();')
	); 

echo CHtml::submitButton('search');
$this->endWidget();
