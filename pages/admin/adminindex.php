<!DOCTYPE html>
<html lang="en">
<header>
  <img src="../../images/2.png" alt="pic" width="1235px" height="300px">
</header>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min,js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
<body>

<p id = "heading"> Admin Dashboard </p>
<br>

<?php
 require_once('processadmin.php');
 ?>

 <nav>
   <ul>
     <li><a href="student.php">Student Links Page</a></li>
     <li><a href="staff.php">Staff Links</a></li>
     <li><a href="inventory.php">Inventory</a></li>
   </ul>
 </nav>

Welcome to the admin dashboard. <BR><BR>
here, the admin can: <br><br>

1. view and edit staff profiles<br>
2. view staff classes<br>
3. view and edit inventory<br>
4. view student academic data <br>
5. view and edit student personal information <br>
6. view and edit student health information <br>
7. view and edit student financial information <br>

<bR>
  will do these in the form of cards with nice designs on each <br>
  each card leads to a page.


</body>
</html>
