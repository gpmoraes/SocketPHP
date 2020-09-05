<?php

$host = "127.0.0.1";
$port = 20205;
$conn = 0;
// No timeout, stay open waiting fot connections
set_time_limit(0);
// Creating the socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0);
if (!$socket) {
    echo "Could not create socket" . PHP_EOL;
}
$result = socket_bind($socket, $host, $port);
if (!$result) {
    echo "Could not bind to socket" . PHP_EOL;
}
// Listens for a conection on a socket
$result = socket_listen($socket, 3);
if (!$result) {
    echo "Could not set up socket listener" . PHP_EOL;
}
// Show information to the user in terminal
echo "Host: " . $host . ":" . $port . PHP_EOL;
echo "Listening for connections..." . PHP_EOL;
echo PHP_EOL;

class Chat {
    // Gets the text in the terminal
    function readLine(){ 
        return rtrim(fgets(STDIN));
    }
}
// Loop 
do {
    // Accepts connection on a socket
    $accept = socket_accept($socket);
    if (!$accept) {
        echo "Could not accept incoming connection." . PHP_EOL;
    }
    // Reads the message
    $msg = socket_read($accept, 1024) or die("Could not read input.");
    echo "Client says: " . $msg . PHP_EOL;
    // Quit the executation
    if ($msg == "quit") {
        break;
    }

    $line = new Chat();
    echo "Enter Replay: \t";
    $replay = $line->readLine();

    socket_write($accept, $replay, strlen($replay)) or die("could not write output\n");

} while (true);

socket_close($accept, $socket);