<?php
$module = ($this->module) ? $this->getModule()->name : 'site'; 
$controller = Yii::app()->controller->id; //set current controller
$action = Yii::app()->controller->action->id; //set current action
$modconfig ='{};';
$modconfig = CJavaScript::encode(Yii::app()->helper->jsConfig->toArray()); 

  
$jsFile = sprintf('%s/js/modules/%s/%s/%s.js' , Yii::app()->baseUrl   , $module , $controller , $action) ; // filename to load
  
	$cs = Yii::app()->getClientScript();
	// check if file exists on the server	
	if(is_file(YiiBase::getPathOfAlias('webroot') .  $jsFile))
	{ 
				
		$cs->registerScriptFile(
			$jsFile,
			CClientScript::POS_END
		);
		
		$cs->registerScript(
			'action-specific-javascript',
			'$.app.page = new ' .   ucfirst($module) .  ucfirst($controller) . ucfirst($action) .'Action();',   
			CClientScript::POS_END
		);

	}
		$cs->registerScript(
			'module-config-javascript',
			'$.app.mc = ' . $modconfig ,   
			CClientScript::POS_END
		);
    

