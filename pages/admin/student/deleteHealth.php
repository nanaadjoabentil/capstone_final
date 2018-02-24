<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../../css/register.css"  media="screen,projection"/>
    <script type="text/javascript" src="../../../js/bootstrap.js"></script>
    <script type="text/javascript" src="../../../js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>

<body>

  <p id = "heading"> Delete a Health Record </p>
  <br>

  <form method="post" id="form">

    <div class="form-group">
      <label for="id">Delete information for ID:</label>
      <input type="text" class="form-control" id="id" name="id">
    </div>

      <div class="form-group">
        <label for="id">Condition to Delete:</label>
        <input type="text" class="form-control" id="condition" name="condition">
      </div>

      <button type="submit" class="btn btn-primary" name="deleteHealth">Delete Record</button><br><br>

      </div>
      </form>

      <?php

      require_once('../processadmin.php');
      if (isset($_POST['deleteHealth']))
      {
        deleteHealthRecord();
        header("location: deleteHealth.php");
      }
      else
      {
        viewAllHealth();
      }
      ?>
  </body>
</html>
