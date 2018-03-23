<!DOCTYPE html>
<html lang="en">
<header>
  <img src="../../images/2.png" alt="pic" width="1235px" height="300px">
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

  <p id = "heading"> Update Staff Personal Information </p>
  <br>

  <form method="post" id="form">
       <?php require_once("processadmin.php");?>

    <div class="form-group">
      <label for="id">Update information for ID:</label>
      <input type="text" class="form-control" id="id" name="id">
    </div>

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
      <label for="tel">Telephone Number:</label>
      <input type="text" class="form-control" id="tel" name="tel" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="nextofkin">Next of Kin:</label>
      <input type="text" class="form-control" id="nextofkin" name="nextofkin" required>
    </div>

    <div class="form-group">
      <label for="noknumber">Next of Kin's Telephone Number:</label>
      <input type="text" class="form-control" id="noknumber" name="noknumber" required>
    </div>

    <button type="submit" class="btn btn-primary" id="butns" name="updateStaff">Update</button>
    <a href="tindex.php"><input type="button" class="btn btn-primary" id="butns" value="Back"></a>

</form>
<footer>
  &copy2018  Nana Adjoa Bentil
</footer>
   </body>
   </html>
