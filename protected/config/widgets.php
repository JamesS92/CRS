<?php 
return array(
				'CJuiButton'=>array(
					'htmlOptions'=>array(
						
						) 
				),
				
				'CActiveForm'=>array(
					'htmlOptions'=>array(
						'class'=>'form-horizontal', 
						'role'=>'form'
					) 
				), 
				 	
				'LeStarRating'=>array(
					'starCount'=>'5',
					'minRating'=>'1', 
					'maxRating'=>'5', 
					'allowEmpty'=>false,
					'resetText'=>null,
					'resetValue'=>null,
					'callback'=>'function (value,link){ $.app.ideawidget.ajaxRate(value , 1 , this );  }', 
					'htmlOptions'=>array('style'=>'display:inline-block')
					
				),
				'CLinkPager' => array(
					'htmlOptions' => array('class' => 'pagination pagination-sm'),
					'selectedPageCssClass'=>'active',
					'hiddenPageCssClass'=>'',
					'header'=>''
				),
				
				'CGridView' => array(
					'template'=>'{summary}{pager}{items}',
					'pagerCssClass'=>'dummy',
					'itemsCssClass'=>'items table table-bordered table-condensed',
					'htmlOptions' => array('class' => ''),
					 
					
				),
				
				'CListView'=>array(
					'template'=>'{summary}{sorter}{pager}{items}',
					'cssFile'=>'/themes/localeyes/css/listview-style.css',
					'pagerCssClass'=>'dummy',
					'itemsCssClass'=>'',
					)
					,
				'CBreadcrumbs'=>array(
 					 'separator' => '',
					 'tagName' => 'ol',
					 'inactiveLinkTemplate' => '<li>{label}</li>',
					 'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
					 'htmlOptions' => array('class' => 'breadcrumb'),
					 'homeLink'=>false,
					), 
 				
  				'CDetailView'=>array(
 					  'htmlOptions'=>array('class'=>'table table-bordered'),
 					),
				
				
);  
