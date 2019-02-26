<?php
require ('db.php');
$db = get_db();
session_start();

// Escape to protect against SQL injection
$email = pg_escape_string($_POST['email']);
$password = pg_escape_string($_POST['password']);
 
echo("THis is the post e-mail : $email");

// Check to see if the email already exists
$query = "SELECT * FROM users WHERE email='$email'";
$result = pg_query($db,$query);
$resultData = pg_fetch_all($result,PGSQL_BOTH);



echo("This is the result before if: $resultData <br>");




$user = pg_fetch_all($result, PGSQL_BOTH);

//echo("Datauser [0]: $user");
echo("Datauser [0]: $user[0]");
//print_r($user);

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