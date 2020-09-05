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
                        <input type="text" name="txtMessage" placeholder="Message..." autocomplete="off">
                        <input type="submit" name="btnSend" value="Send">
                    </td>
                </tr>
                <?php
                    // Server information
                    $host = "127.0.0.1";
                    $port = 20205;
                    // When the user sends the message
                    if (isset($_POST["btnSend"])) {
                        $msg = $_REQUEST["txtMessage"];
                        $sock = socket_create(AF_INET, SOCK_STREAM, 0);
                        socket_connect($sock, $host, $port);
                        socket_write($sock, $msg, strlen($msg));

                        $reply = socket_read($sock, 1924);
                        $reply = ($reply);
                        $reply = "Server says: " . $reply;
                    }
                ?>
                <tr>
                    <td>
                        <textarea name="MSG" cols="27" rows="10" style="resize: vertical">
                            <?php
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