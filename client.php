<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple_Chat_Scocket</title>
</head>
<body>
    <div align="center" style="margin-top: 100px;">
        <form method="POST">
            <table>
                <tr>
                    <td>
                        <!-- Text input for the message -->
                        <input type="text" name="txtMessage" placeholder="Message..." autocomplete="off">
                        <!-- Submit button to send the message -->
                        <input type="submit" name="btnSend" value="Send">
                    </td>
                </tr>
                <?php
                    // Server information
                    $host = "127.0.0.1";
                    $port = 20205;
                    // Check if the form has been submitted
                    if (isset($_POST["btnSend"])) {
                        // Get the message from the text input
                        $msg = $_REQUEST["txtMessage"];
                        // Create the socket
                        $sock = socket_create(AF_INET, SOCK_STREAM, 0);
                        // Connect to the server
                        socket_connect($sock, $host, $port);
                        // Write the message to the socket
                        socket_write($sock, $msg, strlen($msg));
                        // Read the response from the server
                        $reply = socket_read($sock, 1924);
                        // Format the response
                        $reply = ($reply);
                        $reply = "Server says: " . $reply;
                    }
                ?>
                <tr>
                    <td>
                        <!-- Textarea to display the response from the server -->
                        <textarea name="MSG" cols="27" rows="10" style="resize: vertical">
                            <?php
                                // Display the response
                                echo @$reply . PHP_EOL;
                            ?>
                        </textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
