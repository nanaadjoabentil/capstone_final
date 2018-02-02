<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
<body>
<p id = "heading"> Add a health condition </p>
<br>

<form method="post" action="#" id="form">
  <?php require_once('processadmin.php');?>

<!-- get student id and store in a session so i can save it in the database -->
<div class="form-group">
  <label for="id">Student ID::</label>
  <input type="text" class="form-control" id="id" name="id" required>
</div>

<div class="form-group">
  <label for="condition">Condition:</label>
  <input type="text" class="form-control" id="condition" name="condition" required>
</div>

<div class="form-group">
  <label for="details">Details:</label>
  <textarea class="form-control" rows="5" id="details" name="details" required></textarea>
</div>

<button type="submit" class="btn btn-primary" name="enterCondition">Submit</button>

  </body>
</html>
