

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome <?= $first_name.' '.$last_name ?></title>
    <link rel="stylesheet" href="css/profile.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</head>
<body>
<div class="row">
    <div class="col-1 col-s-1">
      <div >
      <img src="img/famjamlogo.jpg" href="profile.php"/>
      </div>
    </div>
    <div class="col-1 col-s-1">
      <div class="header">
        <div class="row">
      <ul>
        <li>
          <div class="col-3">
          <a class="left" href="profile.php">Home</a>
          </div>
          <div class="col-2">
          <a class="center"><?= $first_name.' '.$last_name?></a>
          </div> 
          <div class="col-3">
          <a class="right" href="logout.php">Logout</a>
          </div> 
        </li>
      </ul>
      </div>
      </div>
    </div>
  </div>

    
    