<?php
require ('db.php');
session_start();

// Escape to protect against SQL injection
$email = pg_escape_string($_POST['email']);
 

// Check to see if the email already exists
$query = "SELECT email FROM users WHERE email='$email'";
$result = pg_query($db,$query);
$resultData = pg_fetch_array($result,0);

echo("This is the result before if: $resultData <br>");
print_r($resultData);

if(!$result){
    echo "An Error Has occured";
}

$user = pg_fetch_all($result, PGSQL_BOTH);

echo("Data [0]: $user");
echo("Data [0]: $user[0]");
print_r($user);

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