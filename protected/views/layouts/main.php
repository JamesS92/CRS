<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <meta name="description" content="" /> 
    <meta name="author" content="" /> 
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
     <?php $this->renderPartial('//layouts/_javascript'); ?>            
           
  </head> 
 
  <body>
   
  <?php $this->renderPartial('//layouts/_navHeader'); ?> 
  
 
    <div class="container"> 
	<?php echo $content; ?>
    </div> 
 
     
 
 </body> 
 </html> 
