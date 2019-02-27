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


<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>   

<div class="tab-content">

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
 <button class="button button-block" name="login" >Log In</button>
 </form>

 </div>
 </div>

</body>
</html>