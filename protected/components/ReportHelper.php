<?php 

class ReportHelper extends CComponent 
	

	{
		
		public static function normalise($value , $min , $max)
		{
			if(($max - $min) > 0)
			return  ($value - $min)/($max - $min); 
			else return 0;
		}
		/* ***************************************************** */
		
		
	} 
