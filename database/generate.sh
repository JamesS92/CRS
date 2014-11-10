#!/bin/bash 

cat header.txt > db.txt 

for i in *.sql ; do  cat $i >> db.txt ; done 
