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
<body>
     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="../../js/materialize.min.js"></script>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<p id = "heading"> Add a health condition </p>
<br>

<form method="post" action="" class ="col s8">
  <?php require_once('../../unsecure/processunsecure.php'); ?>

<!-- get student id and store in a session so i can save it in the database -->
  <div class="row">
   <div class="input-field col s4">
      <input id="condition" type="text" name ="condition" class="validate">
      <label for="condition">Condition</label>
    </div>
    <div class="row">
     <div class="input-field col s4">
        <input id="details" type="text" name ="details" class="validate">
        <label for="details">Details</label>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="enterCondition">Submit
      </button>

  </body>
</html>
