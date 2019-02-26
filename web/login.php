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
</head>
<body>

<h1>Welcome</h1>
    <div>
        <form action="verify.php" method="post" autocomplete="off">
            E-mail:         <br><input type="email" required name="email" ><br>
            Password:       <br><input type="password" required name="password" ><br>
            <input type="Submit">
        </form>
    </div>
    
</body>
</html>