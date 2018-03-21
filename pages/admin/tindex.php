
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
    <link type="text/css" rel="stylesheet" href="../../css/dashboard.css"  media="screen,projection"/>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
<body>

<p id = "heading"> Dashboard </p>
<br>

<!-- <h4 id="parentswelcome"> Welcome to your personalised parents' dashboard, <!?php session_start(); echo $_SESSION['username']; ?> </h4><br>
You can access academic, financial, health and personal information about your child from here. <br><br>
To access these, click on the tab with the name of the information you would like to see. <br><br> -->
<!-- Click on the various tabs to see the various categories of information about your ward. -->
        <form method="post" id="form">
          <button type="submit" class="btn btn-primary" id="butns" name="student">Student Information</button>
          <button type="submit" class="btn btn-primary" id="butns" name="staff">Staff Information</button>
          <button type="submit" class="btn btn-primary" id="butns" name="inventory">Inventory Information</button>
          <br><br><br>
          <?php require_once("processadmin.php"); ?>
        </form>
<br><br><br><br><br><br>
        <footer>
          &copy2018  Nana Adjoa Bentil
        </footer>

</body>
</html>
