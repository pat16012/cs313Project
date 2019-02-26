<?php
require ('db.php');
session_start();

// Escape to protect against SQL injection
$email = pg_escape_string($_POST['email']);
 

//Check to see if email is in DB
$query = "SELECT * FROM users WHERE email='$email'";
$result = pg_query($db,$query);
$user = pg_fetch_all($result);

echo("Data [0]: $user");
echo("Data [0]: $user[0]");
print_r($resultData);

if($resultData[0] != $email){
    $_SESSION['message'] = "User with that email doesn't exist!";
    echo("Email not used before");
   // header("location: error.php");
}
else{
    $user = $resultData[0];
    echo("Email parting before");
}

?>