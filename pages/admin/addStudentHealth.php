<!DOCTYPE html>
<html lang="en">
<header>
  <img src="../../images/2.png" alt="pic" width="1270px"> <!-- header image -->
</header>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- including css and javascript files -->
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
  <!-- page heading -->
    <p id = "heading"> Add a health condition </p>
    <br>

    <!-- form to add a student health condition -->
    <form method="post" id="form">
      <!-- including php page with function to process the insertion of the data entered in form into database -->
      <?php require_once('processadmin.php');?>

        <div class="form-group">
          <label for="id">Student ID:</label>
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

        <button type="submit" class="btn btn-primary" id="butns" name="enterCondition">Submit</button>
      </form>
  </body>
</html>
