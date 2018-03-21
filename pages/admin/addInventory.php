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
<p id = "heading"> Add Inventory Items </p>

    <form method="post" action="#" id="form">
      <?php require_once('processadmin.php');?>

      <div class="form-group">
        <label for="item_name">Item Name:</label>
        <input type="text" class="form-control" id="item_name" name="item_name" required>
      </div>

      <div class="form-group">
      <label for="type">Item Type:</label>
      <select class="form-control" id="type" name="type">
        <option value="" disabled selected>Choose...</option>
        <option value="stationery">Stationery</option>
        <option value="toiletries">Toiletries</option>
        <option value="uniforms">Uniforms</option>
        <option value="medicines">Medicine</option>
        <option value="cleaning supplies">Cleaning Supplies</option>
        <option value="other">Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="other">If other, please enter the item type here:</label>
      <input type="text" class="form-control" id="other" name="other">
    </div>

    <div class="form-group">
      <label for="number">Number / Amount:</label>
      <input type="text" class="form-control" id="number" name="number" required>
    </div>

    <div class="form-group">
    <label for="grouping">Grouping:</label>
    <select class="form-control" id="grouping" name="grouping">
      <option value="" disabled selected>Choose...</option>
      <option value="singles">Singles</option>
      <option value="boxes">Boxes</option>
      <option value="packs">Packs</option>
      <option value="bags">Bags</option>
      <option value="other">Other</option>
    </select>
  </div>

  <div class="form-group">
    <label for="othergroup">If other, please enter the item grouping here:</label>
    <input type="text" class="form-control" id="othergroup" name="othergroup">
  </div>

  <div class="form-group">
    <label for="total">Total Number / Amount:</label>
    <input type="text" class="form-control" id="total" name="total" required>
  </div>

  <button type="submit" class="btn btn-primary" id="butns" name="addInventory">Add to Database</button>
  <a href="tindex.php"><input type="button" class="btn btn-primary" id="butns" value="Back"></a>

   </body>
   </html>
