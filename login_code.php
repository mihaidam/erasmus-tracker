<?php

$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string($_POST['password']);
$SQL = "SELECT * FROM users WHERE email='".$email. "'" ;
$result = $mysqli->query($SQL);

if ( $result->num_rows == 0 ){ 
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error1.php");
}
else { 
    $user = $result->fetch_assoc();

    if ( password_verify($password, $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        
        $_SESSION['logged_in'] = 1;

        header("location: destinations.php");
    }
    else {
        $_SESSION['message'] = "You have entered a wrong password, try again!";
        header("location: error1.php");
    }
}

