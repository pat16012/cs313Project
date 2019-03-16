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

 <?php include 'header.php'?>

<div class="row">
    <div class="column">
      <object type="text/html" data="frame/friend_frame.php"></object>
    </div>
    <div class="middle">
      <object type="text/html" data="frame/current_frame.php"></object>
    </div>
    <div class="column">
      <object type="text/html" data="frame/holder_frame.php"></object>
    </div>
</div> 
  
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>