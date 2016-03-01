#!/bin/bash
result=$(ps -aux|grep sendemail.php|grep -v grep)
if [[ $result ]]
then
	echo 'this service already runing';
	exit;
fi
php ./sendemail.php >> ws.log 2>&1 &
echo 'websocket begin runing'
exit;
