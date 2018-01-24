<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">


     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>

     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="../../js/materialize.min.js"></script>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<p id = "heading"> Register: Teachers </p>
<br>

     <form method="post" action="" class ="col s8">
       <?php require_once('../../unsecure/processunsecure.php'); ?>
        <div class="row">
         <div class="input-field col s12">
            <input id="name" type="text" name = "name" class="validate">
            <label for="name">Name</label>
          </div>
        </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="username" type="text" name="username" class="validate">
          <label for="username">User Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="tel" type="text" name="tel" class="validate">
          <label for="tel">Telephone Number</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" name="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="nextofkin" type="text" name="nextofkin" class="validate">
          <label for="nextofkin">Next of Kin</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="noknumber" type="text" name="noknumber" class="validate">
          <label for="noknumber">Next of Kin's Telephone Number</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="registerTeacher">Register</button>
   </body>
 </html>
