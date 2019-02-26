<?php
require ('db.php');
$db = get_db();

/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = pg_escape_string($_POST['firstname']);
$last_name = pg_escape_string($_POST['lastname']);
$email = pg_escape_string($_POST['email']);
$password = pg_escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = pg_escape_string( md5( rand(0,1000) ) );


// Check if user with that email already exists
$result = $db->prepare ("SELECT email FROM users WHERE email='$email'");
$result->execute();
if($result > 1){
   
    $_SESSION['message'] = 'Registration failed, Email already used';
    header("location: signup.php");
    die();
}
else{
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";
    $statment = $db->prepare($sql);
    $statment->execute();

    // Add user to the database
    if ( pg_query($db, $sql) ){

        $_SESSION['active'] = f; //false until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( CS313 Project )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 
}
}

//catch (PDOException $ex)
//{
//    $_SESSION['message'] = 'Registration failed, Email already used';
//        header("location: signup.php");
//}

