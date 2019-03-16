<?php
require ('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <?php include 'css/css.html'; ?>
</head>


<body>
  <img class="imgLogo" src="img/famjamlogo.jpg">

<div class="form">
<div>
<h1>Welcome to <strong>FAMJAM</strong> Connect</h1><br>

<img class="imgfam" src="img/famjam.jpg">

<h2>Please Choose a Selection</h2>

<ul class="tab-group">
        <li class="tab active"><a href="signup.php">Sign Up</a></li>
        <li class="tab active"><a href="login.php">Log In</a></li>
      </ul>
</>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
    
</body>
</html>