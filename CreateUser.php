<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "l934m411", "phoom7Ji", "l934m411");

/* check connection */
if($mysqli->connet_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
}

    $username = $_POST['username'];
    if($username == null){
        printf("Error, User not added.");
    }

    $sql = "INSERT INTO Users (user_id) VALUES ('$username')";

    $check = "SELECT user_id FROM Users WHERE user_id='$username'";
    $count = $mysqli->query($check);

    if($count->num_rows > 0){
        echo "Error duplicate user.";
    }
    else if($mysqli->query($sql) === true){
        echo "New user added.";
    }else{
        echo "Error";
    }
    $mysqli->close();
?>