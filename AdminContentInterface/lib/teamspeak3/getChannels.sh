{
sleep 0.1
echo "login SevenOperation uaPh36uV"
sleep 0.1
echo "use 1"
sleep 0.1
echo "channellist"
sleep 0.1
echo "quit"
} |telnet -l SevenOperatio localhost 10011 > channels

