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
    <title>Login</title>
    <?php include 'css/css.html'; ?>
</head>
<body>

<img class="imgLogo" src="img/famjamlogo.jpg">
<div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="signup.php">Sign Up</a></li>
        <li class="tab active"><a href="login.php">Log In</a></li>
      </ul>   

<div class="tab-content"></div>

<div id="login">   
 <h1>Welcome Back</h1>
 
 <form action="verify.php" method="post" autocomplete="off">
 
   <div class="field-wrap">
   <label>
     Email Address<span class="req">*</span>
   </label>
   <input type="email" required autocomplete="off" name="email"/>
 </div>
 
 <div class="field-wrap">
   <label>
     Password<span class="req">*</span>
   </label>
   <input type="password" required autocomplete="off" name="password"/>
 </div>
 <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
 <button class="button button-block" name="login" >Log In</button>
 </form>

 </div>
 </div>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>