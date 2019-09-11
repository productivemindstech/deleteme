cd html
echo "server starting..."
pwd 
python -m SimpleHTTPServer 3000 > /dev/null 2>&1 &
sleep 5
cd ..
echo "Starting sauce connect"
bin/sc -u pubinator -k 580f062b-af5a-4982-85dc-4619f66a2987 > /dev/null 2>&1 &
sleep 30
echo "after connecting sauce connect"