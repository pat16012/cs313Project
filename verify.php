<?php
require ('db.php');
$db = get_db();
session_start();

// Escape to protect against SQL injection
$email = pg_escape_string($_POST['email']);

// Check to see if the email already exists
$query = "SELECT * FROM users WHERE email='$email'";
$result = pg_query($db,$query);
$resultData = pg_fetch_all($result,PGSQL_BOTH);


if($resultData[0][3] != $email){
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else{
    if(password_verify($_POST['password'], $resultData[0][4])){
        $_SESSION['email'] = $resultData[0][3];
        $_SESSION['first_name'] = $resultData[0][1];
        $_SESSION['last_name'] = $resultData[0][2];
        
        // Know if user is logged in
        $_SESSION['logged_in'] = true;
        
        header("location: profile.php");

    }
    else {
        $_SESSION['message'] = "You have entered the wrong password, please try again";
        header("location: error.php");
        
    }    

}

?>