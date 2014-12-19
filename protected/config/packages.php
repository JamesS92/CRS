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
		 
		 'jqplot'=>array(
			 // pass a baseUrl because we don't need to publish 
			 'baseUrl'=> '/packages/jqplot',   
			 'css'    => array( 'jquery.jqplot.css' ),
			 'js'     => array( 'jquery.jqplot.min.js' , 'excanvas.js', 'plugins/jqplot.highlighter.min.js', 'plugins/jqplot.dateAxisRenderer.min.js', 'plugins/jqplot.cursor.min.js', 'plugins/jqplot.logAxisRenderer.js' , 'plugins/spin.js' , 'plugins/spin.min.js' ),
			 'depends'=> array('crs-base-package')
			 
		 ),
		 
		 'spinner'=>array(
			 // pass a baseUrl because we don't need to publish 
			 'baseUrl'=> '/packages/spinner',   
			 'js'     => array( 'spin.js' , 'spin.min.js' ),
			 'depends'=> array('crs-base-package')
			 
		 ),
		 
		 /*'jqplotplugins'=>array(
			 // pass a baseUrl because we don't need to publish 
			 'baseUrl'=> '/packages/jqplot/plugins',   
			 'js'     => array( 'jqplot.highlighter.min.js' ),
			 'depends'=> array('jqplot')
			 
		 ),*/
		 
		 
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
