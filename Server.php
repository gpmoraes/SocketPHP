<?php

// Define the host and port for the socket connection
$host = "127.0.0.1";
$port = 20205;
$conn = 0;

// Set the time limit to an infinite value, so the script will stay open and waiting for connections
set_time_limit(0);

// Create the socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0);

// Check if the socket was created successfully
if (!$socket) {
    echo "Could not create socket" . PHP_EOL;
}

// Bind the socket to the host and port
$result = socket_bind($socket, $host, $port);

// Check if the socket was bound successfully
if (!$result) {
    echo "Could not bind to socket" . PHP_EOL;
}

// Listen for incoming connections on the socket
$result = socket_listen($socket, 3);

// Check if the socket is listening
if (!$result) {
    echo "Could not set up socket listener" . PHP_EOL;
}

// Display information about the host and port in the terminal
echo "Host: " . $host . ":" . $port . PHP_EOL;
echo "Listening for connections..." . PHP_EOL;
echo PHP_EOL;

// Chat class that will provide a method for reading input from the terminal
class Chat {
    // Method that reads a line from the terminal
    function readLine(){ 
        return rtrim(fgets(STDIN));
    }
}

// Infinite loop to keep listening for incoming connections
do {
    // Accept incoming connections
    $accept = socket_accept($socket);

    // Check if the connection was accepted successfully
    if (!$accept) {
        echo "Could not accept incoming connection." . PHP_EOL;
    }

    // Read the message sent by the client
    $msg = socket_read($accept, 1024) or die("Could not read input.");
    echo "Client says: " . $msg . PHP_EOL;

    // Check if the client has sent the "quit" message
    if ($msg == "quit") {
        break;
    }

    // Create an instance of the Chat class
    $line = new Chat();
    echo "Enter Replay: \t";
    // Read the response from the terminal
    $replay = $line->readLine();

    // Send the response back to the client
    socket_write($accept, $replay, strlen($replay)) or die("could not write output\n");

} while (true);

// Close the socket connection
socket_close($accept, $socket);

