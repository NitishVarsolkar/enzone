<?php
$roomname = $_GET['roomname'];

include 'db_connect.php';

// Sanitize the room name to prevent SQL injection
$roomname = mysqli_real_escape_string($conn, $roomname);

$sql = "SELECT * FROM `rooms` WHERE roomname = '$roomname'";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) == 0) {
        $message = "This Room Does Not Exist. Try Creating One";
        
        echo '<script language="javascript">';
        echo 'alert("' . $message . '");';
        echo 'window.location="http://localhost/chatify/";';
        echo '</script>';
    }
} else {
    echo "ERROR: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }
        #chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            overflow-y: auto;
            height: 60vh; /* Fixed height for chat area */
        }
        #message-container {
            display: flex;
            margin-top: 10px;
        }
        #message-container input {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
    <h3>Chat Room - <?php echo $roomname; ?></h3>
        <div id="chat-container"></div>
        <div id="message-container" class="input-group">
            <input type="text" id="message-input" class="form-control" placeholder="Type a message...">
            <div class="input-group-append">
                <button class="btn btn-primary" id="send-button">Send</button>
            </div>
        </div>
    </div>

    <script>
        const socket = new WebSocket('ws://localhost:8080');

        const chatContainer = document.getElementById('chat-container');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');

        socket.addEventListener('message', function (event) {
            const messageElement = document.createElement('div');
            messageElement.textContent = event.data;
            chatContainer.appendChild(messageElement);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        });

        sendButton.addEventListener('click', function () {
            const message = messageInput.value;
            if (message) {
                socket.send(message);
                messageInput.value = '';
                const messageElement = document.createElement('div');
                messageElement.textContent = `You: ${message}`;
                chatContainer.appendChild(messageElement);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
        });

        messageInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendButton.click();
            }
        });
    </script>
</body>
</html>
