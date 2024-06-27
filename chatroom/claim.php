<?php
$room = $_POST['room'];

if (strlen($room) > 20 || strlen($room) < 2) {
    $message = "Please Choose a Name Between 2 to 20 Characters";
    
    echo '<script language="javascript">';
    echo 'alert("' . $message . '");';
    echo 'window.location="http://localhost/chatify/";';
    echo '</script>'; 
}
elseif (!ctype_alnum($room)) {
    $message = "Please Choose Alphanumeric Characters";
    
    echo '<script language="javascript">';
    echo 'alert("' . $message . '");';
    echo 'window.location="http://localhost/chatify/";';
    echo '</script>';     
}
else {
    include 'db_connect.php';

    // Check if room already exists
    $sql = "SELECT * FROM `rooms` WHERE `roomname` = '$room'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $message = "Sorry, Room Already Exists";
            
            echo '<script language="javascript">';
            echo 'alert("' . $message . '");';
            echo 'window.location="http://localhost/chatify/";';
            echo '</script>';     
        }
        else {
            // Insert new room
            $sql = "INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', current_timestamp())";
            if (mysqli_query($conn, $sql)) {
                $message = "Your Room is Ready";
                
                echo '<script language="javascript">';
                echo 'alert("' . $message . '");';
                echo 'window.location="http://localhost/chatify/rooms.php?roomname=' . $room . '";';
                echo '</script>'; 
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
