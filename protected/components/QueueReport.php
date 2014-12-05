<?php

 class QueueReport extends MinMax{
 
 public function init()
       {
       	       
       }
       
       public static function findNormal($beginTime, $endTime, $qID)
       {
       	       $beginTime = $beginTime / 1000;
       	       $endTime = $endTime / 1000;
       	       
       	       $minCPU = self::minVal($beginTime, $endTime, $qID, 'cpu_sum');
       	       $maxCPU =  self::maxVal($beginTime, $endTime, $qID, 'cpu_sum');
       	       $minMemory =  self::minVal($beginTime, $endTime, $qID, 'memory_sum');
       	       $maxMemory =  self::maxVal($beginTime, $endTime, $qID, 'memory_sum');
       	       $minIO =  self::minVal($beginTime, $endTime, $qID, 'io_sum');
       	       $maxIO =  self::maxVal($beginTime, $endTime, $qID, 'io_sum');
       	       $minVMem =  self::minVal($beginTime, $endTime, $qID, 'maxvmem_sum');
       	       $maxVMem =  self::maxVal($beginTime, $endTime, $qID, 'maxvmem_sum');
       	       
       	       
       	       return array (	'minCPU' => $minCPU,
       	       	       		'maxCPU' => $maxCPU,
       	       	       		'minMemory' => $minMemory,
       	       	       		'maxMemory' => $maxMemory,
       	       	       		'minIO' =>  $minIO,
       	       	       		'maxIO' =>  $maxIO,
       	       	       		'minVMem' => $minVMem,
       	       	       		'maxVMem' => $maxVMem,
       	       	       		'beginTime' => $beginTime,
       	       	       		'endTime' => $endTime
       	       	       		);
       }

}
