#!/usr/bin/env bash

./sc -u pubinator -k 580f062b-af5a-4982-85dc-4619f66a2987 --pidfile pid > sauce-connect-log.txt &
sleep 1
while ! grep -m1 'Sauce Connect is up, you may start your tests.' < sauce-connect-log.txt; do 
	sleep 1
done
echo Sauce-Connect is up and running
