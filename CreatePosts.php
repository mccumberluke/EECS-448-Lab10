<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "l934m411", "phoom7Ji", "l934m411");

/* check connection */
if($mysqli->connet_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
}

    $username = $_POST['username'];
    $post = $_POST['post'];

    $sqlExist = "SELECT user_id FROM Users WHERE user_id='$username'";
    $validUser = $mysqli->query($sqlExist);
    $save = "INSERT INTO Posts (content, author_id) VALUES ('$post','$username')";

    if($validUser->num_rows == 0){
        echo "Error, does not exist.";
    }
    else if($post == null){
        echo "Must enter text.";
    }
    else if($mysqli->query($save) == true){
        echo "Post was saved.";
    }
    else{
        echo "Error.";
    }
    $mysqli->close();
?>