<?php
require ('db.php');
$db = get_db();

// Registration checks inputs for SQL injection and enters data into database only if not already registered.

// Session variables to be used on profile page.
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all POST variables to protect against SQL injections
$first_name = pg_escape_string($_POST['firstname']);
$last_name = pg_escape_string($_POST['lastname']);
$email = pg_escape_string($_POST['email']);
$password = pg_escape_string(password_hash($_POST['password'], PASSWORD_DEFAULT));
$hash = pg_escape_string( md5( rand(0,1000) ) );

// Check to see if the email already exists
$query = "SELECT email FROM users WHERE email='$email'";
$result = pg_query($db,$query);
$resultData = pg_fetch_all($result,PGSQL_BOTH);

echo("result[0]: " . $resultData[0][3]);

// Add user is result of check comes back false
if($resultData[0][3] == $email){
    $_SESSION['Message'] = 'Email Provided Already in Use';
    header("location: error.php");
    
}
else{
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash)"
    . "VALUES ('$first_name','$last_name','$email','$password','$hash')";

   if( pg_query($db, $sql)){

       $_SESSION['logged_in'] = true; // So we know when the user has logged in
       $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( https://cs313-project.herokuapp.com/ )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        https://cs313-project.herokuapp.com/accountVerify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

       //redirect to profile page
       header("Location: login.php");
   }
   else{
       $_SESSION['message'] = 'Registration Failed, Please Try Again';
      // header("Location: error.php");
   }
}