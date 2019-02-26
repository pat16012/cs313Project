<?php
/* User login process, checks if user exists and password is correct */
require_once 'db.php';
$db = get_db();
// Escape email to protect against SQL injections
$email = pg_escape_string($_POST['email']);
$result = $db->prepare("SELECT email FROM users WHERE email='$email'");
$result->execute();

if ( $result->fetchColumn == NULL ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc(PDO::FETCH_ASSOC);

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

