#!/usr/bin/env bash

php --version
pkill php
nohup php -S 0.0.0.0:9000 &
SERVER_PID=$!
echo "Running PID ${SERVER_PID}"
