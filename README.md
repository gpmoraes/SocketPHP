# PHP Socket Implementation

This is a simple implementation of a PHP socket using only PHP and HTML. This application demonstrates the basic concepts of socket programming and how it can be used to create a simple chat application.

## How PHP Sockets Work

A socket is a endpoint for sending or receiving data across a computer network. PHP provides a set of functions to create, manage, and interact with sockets. In this implementation, we use the `socket_create()`, `socket_bind()`, `socket_listen()`, `socket_accept()`, `socket_read()`, and `socket_write()` functions to create, bind, listen, accept, read, and write data to the socket respectively.

The `socket_create()` function creates a new socket and returns a socket resource on success. In this implementation, we create a TCP socket using the `AF_INET` (Internet Protocol version 4) address family and the `SOCK_STREAM` socket type.

The `socket_bind()` function binds a name to a socket. In this implementation, we bind the socket to the localhost IP address and port 20205.

The `socket_listen()` function listens for incoming connections on a socket. We set the maximum number of connections to 3.

The `socket_accept()` function accepts a connection on a socket.

The `socket_read()` function reads data from a socket and the `socket_write()` function writes data to a socket.

## How the Code Works

The server.php file creates a socket, binds it to the localhost IP address and port 20205, and listens for incoming connections. The do-while loop in the server.php file listens for incoming messages from the client, prints them to the terminal, and allows the user to enter a response. Once the message "quit" is received, the loop breaks and the socket connection is closed.

The client.php file is an HTML form that allows the user to enter a message, which is then sent to the server via the socket. The server's response is then printed to a textarea in the HTML form.

## How to Use

1. Start by running the server.php file in the command line using the command "php Server.php". This will start the socket server and listen for incoming connections.

2. Next, open the client.php file in a web browser. You should see an HTML form with a text input and a submit button.

3. Type a message in the text input and click on the submit button. This will send the message to the server via the socket.

4. The server will receive the message and display it in the terminal. The server will then prompt the user to enter a response.

5. The server's response will be sent back to the client and displayed in the textarea of the HTML form.

6. Repeat steps 3-5 to continue the conversation. To end the conversation, type "quit" in the text input and click on the submit button. This will close the socket connection.

Please note that this is a simple implementation for educational purposes and it does not include security features, error handling, or other best practices.
