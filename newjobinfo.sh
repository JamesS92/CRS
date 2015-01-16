#!/bin/bash 

COUNTER=0
JOB=1 
DIR=1
while [  $JOB -lt 416178 ]
do    
	if [ ! -d jobinfo/$DIR ]
	then 
		mkdir jobinfo/$DIR 
	fi 

	while [  $COUNTER -lt 1000 ]; do
             qacct -j $JOB > jobinfo/$DIR/$JOB.txt
	     let JOB=JOB+1  
             let COUNTER=COUNTER+1 
         done 
	let COUNTER=0
	let DIR=DIR+1
done 

