#!/bin/bash
result=$(ps -aux|grep sendemail.php|grep -v grep)
if [[ $result ]]
then
	echo 'this service already runing';
	exit;
fi
nohup php ./sendemail.php &
echo 'websocket begin runing'
exit;
