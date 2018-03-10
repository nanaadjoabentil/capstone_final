<!DOCTYPE html>
 <html>
 <header>
   <img src="../../images/2.png" alt="pic" width="1270px">
 </header>
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

     <form method="post" action="#" id="form" class="form-signin">
       <?php require_once('processadmin.php');?>

       <div class="wrapper">
           <h2 class="form-signin-heading">Administrator Login</h2><br>
           <input type="text" class="form-control" name="username" placeholder="Username" required/><br>
           <input type="password" class="form-control" name="password" placeholder="Password" required/><br>

           <button class="btn btn-lg btn-primary btn-block" type="submit" id="butns" name="adminlogin">Login</button>
         </form>
       </div>

</body>
</html>
