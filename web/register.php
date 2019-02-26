<?php
require ('db.php');
$db = get_db();
$stmtname = '';
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

// Check to see if the email already exists
$params = array($email);
$query = "SELECT email FROM users WHERE email='$email'";
$prepare = pg_prepare($db,$stmtname,$query);
$result = pg_execute($db,$stmtname,$params);



// Add user is result of check comes back false
if($result == 0){
    $sql = "INSERT INTO users (first_name, last_name, email, password)"
    . "VALUES ('$first_name','$last_name','$email','$password')";

   if( pg_query($db, $sql)){

       $_SESSION['logged_in'] = true; // So we know when the user has logged in

       //redirect to profile page
       header("Location: profile.php");
   }
   else{
       $_SESSION['message'] = 'Registration Failed, Please Try Again';
       header("Location: error.php");
   }
}
else{
    $_SESSION['Message'] = 'Email Provided Already in Use';
    header("location: error.php");
}