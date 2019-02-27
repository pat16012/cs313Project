<?php
require ('db.php');
session_start();
$signup = "signup.php";
$login = "login.php";
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

<div class="form">
<ul class="tab-group">
        <li class="tab active"><a href=<?php $signup ?>>Sign Up</a></li>
        <li class="tab active"><a href=<?php $login ?>>Log In</a></li>
      </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
    
</body>
</html>