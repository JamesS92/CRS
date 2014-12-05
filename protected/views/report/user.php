<?php


$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $userModel->search(),
    'filter' => $userModel,
     'ajaxUpdate'=>true,
    'selectableRows'=>1,
    //'selectionChanged'=>'js:$.app.page.selectUser();', 
    'columns' => array(
        'username',
        'firstname',
        'lastname',
    ),
));


echo CHtml::dropDownList('usersearch','',
	CHtml::listData(User::model()->findAll('status_id=:active',array(':active'=>Types::$status['active']['id'])) 
				,'id', 'username' ) , 
		array('id'=>'user-select','onchange'=>'js:$.app.page.selectUser();')
	); 
  
Yii::app()->clientScript->registerScript('usersearch', "
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
     alert(getSelection);
    return false;
});
");
