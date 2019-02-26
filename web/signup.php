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
    <title>Signup</title>
</head>
<body>
<h1>Sign Up for Free</h1>
    <div>
        <form action="register.php" method="post" autocomplete="off">
            First Name:     <br><input type="text" required name="firstname" autocomplete="off"><br>
            Last Name:      <br><input type="text" required name="lastname" autocomplete="off"><br>
            E-mail:         <br><input type="email" required name="email" autocomplete="off"><br>
            Password:       <br><input type="password" required name="password" autocomplete="off"><br>
            <input type="Submit">
        </form>
    </div>
    
</body>
</html>