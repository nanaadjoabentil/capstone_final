<!DOCTYPE html>
<html lang="en">
<header>
  <img src="../../images/1.png" alt="pic" width="1235px" height="300px">
</header>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
<body>
<p id = "heading"> Withdraw from Inventory  </p>
<br>

<form method="post" action="#" id="form">
  <?php require_once('processadmin.php');?>

  <div class="form-group">
    <label for="item_name">Item Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>

  <div class="form-group">
    <label for="item_name">Number Withdrawn:</label>
    <input type="number" class="form-control" id="number" name="number" min="1" required>
  </div>

  <div class="form-group">
    <label for="item_name">Withdrawn By:</label>
    <input type="text" class="form-control" id="who" name="who" required>
  </div>

  <button type="submit" class="btn btn-primary" id="butns" name="withdraw">Withdraw</button>
  <a href="tindex.php"><input type="button" class="btn btn-primary" id="butns" value="Back"></a>
</form>
   </body>
   </html>
