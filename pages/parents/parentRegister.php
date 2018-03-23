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

<p id = "heading"> Register: Parents </p>
<br>

    <form method="post" action="#" id="form">
       <?php require_once('processparent.php'); ?>

       <a href="index.php">Go to Login Page</a><br>
       <div class="form-group">
         <label for="name">Name:</label>
         <input type="text" class="form-control" id="name" name="name" required>
       </div>

       <div class="form-group">
         <label for="username">User Name:</label>
         <input type="text" class="form-control" id="username" name="username" required>
       </div>

       <div class="form-group">
         <label for="password">Password:</label>
         <input type="password" class="form-control" id="password" name="password" required>
       </div>

       <div class="form-group">
         <label for="studentid">Your Child's ID number:</label>
         <input type="text" class="form-control" id="studentid" name="studentid" required>
       </div>

       <button type="submit" class="btn btn-primary" id="butns" name="registerParent">Register</button>
   </body>
 </html>
