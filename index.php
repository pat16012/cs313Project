<?php
require ('web/db.php');
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
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</head>
<body>
<div class="form">

<div>
<div>
  <img  src="web/img/famjamlogo.jpg">
  <img  src="web/img/famjam.jpg">
</div>
<h2>Please Choose a Selection</h2>
<ul class="tab-group">
        <li class="tab active"><a href="web/signup.php">Sign Up</a></li>
        <li class="tab active"><a href="web/login.php">Log In</a></li>
</ul>
</body>
</html>