#!/bin/bash 

JOB=$1
SEPERATOR='\=\=\=\=\=\=\=\=\=\='
#qname
#hostname
#owner 
#jobname
#qsub_time  
#start_time 
#exit_status 
#ru_wallclock
#cpu  
#mem  
#io   
#slots 


qacct -j $JOB | grep -E   "$SEPERATOR|qname|hostname|owner|jobname|qsub_time|start_time|exit_status|ru_wallclock|cpu|mem|io|slots"
