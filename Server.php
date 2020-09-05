<?php

$host = "127.0.0.1";
$port = 20205;
set_time_limit(0);

$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_bind($sock, $host, $port) or die("Could not bind to socket\n");

$result = socket_listen($sock, 3) or die("Could not set up socket listener\n");
echo "Listening for connections...\n";

class Chat {
    function readLine(){ 
        return rtrim(fgets(STDIN));
    }
}

do {
    $accept = socket_accept($sock) or die("Could not accept incoming connection.");
    $msg = socket_read($accept, 1024) or die("Could not read input.");

    $msg = trim($msg);
    echo "Client says:\t " . $msg . "\n\n";

    $line = new Chat();
    echo "Enter Replay: \t";
    $replay = $line->readLine();

    socket_write($accept, $replay, strlen($replay)) or die("could not write output\n");

} while (true);

socket_close($accept, $sock);