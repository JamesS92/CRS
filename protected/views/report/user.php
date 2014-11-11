<?php


$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $userModel->search(),
    'filter' => $userModel,
    'selectableRows'=>1,
    //'selectionChanged'=>'js:$.app.page.selectUser();', 
    'columns' => array(
        'username',
        'firstname',
        'lastname',
    ),
));


echo CHtml::dropDownList('user','',
	CHtml::listData(User::model()->findAll('status_id=:active',array(':active'=>Types::$status['active']['id'])) 
				,'id', 'username' ) , 
		array('id'=>'user-select','onchange'=>'js:$.app.page.nameChange();')
	); 
  

