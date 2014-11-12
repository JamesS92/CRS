<?php 

return array(
	 'packages' => array(
		
	 	 'crs-base-package'=>array(
		 	'baseUrl'=> '/',
		 	'js'=>array('js/app.js' , 'js/appBoot.js'),
		 	'css'=>array('css/normalize.css', 'css/global.css'),
		 	'depends'=> array('jquery') 
		 ),
		  
		 'bootstrap3'=>array(
			 // pass a baseUrl because we don't need to publish 
			 'baseUrl'=> '/packages/bootstrap3',   
			 'css'    => array( 'css/bootstrap.min.css' , 'css/bootstrap-theme.min.css' ),
			 'js'     => array( 'js/bootstrap.min.js' ),
			 'depends'=> array('crs-base-package')
			 
		 ),
		 
		 /*
		 'fontawesome'=>array(
			 // pass a baseUrl because we don't need to publish 
			 'baseUrl'=> '/packages/font-awesome-4',   
			 'css'    => array( 'css/font-awesome.css'),
			 'depends'=> array('bootstrap3')
			 
		 ),
		 'jquery-ui'=>array(
		 	  'baseUrl'=> '/packages/jquery-ui',   
			 'css'    => array( 'jquery-ui.min.css'),
			 'js'	=>array('jquery-ui.min.js'),
			 'depends'=> array('jquery')
		 ),
		 */ 
	),
); 
