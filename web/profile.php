<?php
/* Displays user information and some useful messages */
require ('db.php');
$db = get_db();
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome <?= $first_name.' '.$last_name ?></title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<img class="imgLogo" src="img/famjamlogo.jpg">
<div class="row"></div>
<div class="topnav">
  <a class="active" href="profile.php">Home</a>
  <a><strong><?php echo "Welcome   ". $first_name. ' ' .$last_name. '    '. $email;?></strong></a>
  <div>
    <a class="right select" id="logout" href="logout.php">Log Out</a>
  </div>
  
</div> 

<div class="row">
    <div class="column">hello 1</div>
    <div class="middle">hello 2</div>
    <div class="column">hello 3</div>
</div> 
  
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>