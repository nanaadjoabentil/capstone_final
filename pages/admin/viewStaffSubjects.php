<!DOCTYPE html>
<html lang="en">
<header>
  <img src="../../images/2.png" alt="pic" width="1270px">
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

<p id = "heading"> Staff, Subjects and Classes: Search </p>
<br>

<form method="post" id="form">
  <div class="form-group">
    <label for="id">Search by Staff ID</label>
    <input type="text" class="form-control" id="id" name="id">
  </div>

  <button type="submit" class="btn btn-primary" id="butns" name="searchStaffSubjects">Search</button>
  <a href="../admin/tindex.php"><input type="button" class="btn btn-primary" id="butns" value="Back"></a>

  </div>
</form><br><br>

<?php

require_once('../teachers/processteacher.php');

if (isset($_POST['searchStaffSubjects']))
{
  searchStaffSubjects();
}
else
{
  viewAllStaffSubjects();
}

?>

<footer>
  &copy2018  Nana Adjoa Bentil
</footer>
</body>
</html>
