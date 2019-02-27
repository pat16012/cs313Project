<?php
require ('db.php');
$db = get_db();
session_start();

// Escape to protect against SQL injection
$email = pg_escape_string($_POST['email']);
$password = pg_escape_string($_POST['password']);

// Check to see if the email already exists
$query = "SELECT * FROM users WHERE email='$email'";
$result = pg_query($db,$query);
$resultData = pg_fetch_all($result,PGSQL_BOTH);

//echo("Datauser [0]: $user");
echo("Datauser [0]: " . $resultData[0][3] . " END ");
print_r($resultData);

if($resultData[0][3] != $email){
    $_SESSION['message'] = "User with that email doesn't exist!";
    echo("Email not used before");
   // header("location: error.php");
}
else{
    $user = $resultData[0];
    echo("Email parting before");
}

?>