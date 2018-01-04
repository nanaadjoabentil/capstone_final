<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="register.css"  media="screen,projection"/>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">


     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>

     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<p id = "heading"> Register: Parents </p>
<br>

     <form method="post" action="" class ="col s8">
       <?php require_once('processunsecure.php'); ?>
        <div class="row">
         <div class="input-field col s4">
            <input id="name" type="text" name = "name" class="validate">
            <label for="name">Name</label>
          </div>
        </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="username" type="text" name="username" class="validate">
          <label for="username">User Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="studentid" type="text" name="studentid" class="validate">
          <label for="studentid">Your Child's ID number</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="registerParent" onclick="registerParent()">Register
      </button>
   </body>
 </html>
