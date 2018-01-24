<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="../../css/login.css"  media="screen,projection"/>
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

<p id = "heading"> Add Student Financial Information </p>
<br>

<form method="post" action="" class ="col s8">
  <?php require_once('processadmin.php');?>

  <div class="row">
   <div class="input-field col s4">
      <input id="id" type="text" name ="id" class="validate">
      <label for="id">Student ID</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s4">
       <input id="fees" type="text" name ="fees" class="validate">
       <label for="fees">Fees Amount</label>
     </div>
   </div>
   <div class="row">
     <div class="input-field col s4">
        <input id="details" type="text" name ="details" class="validate">
        <label for="details">Details / Description</label>
      </div>
    </div>
   <div class="row">
     <div class="input-field col s4">
        <input id="paid" type="text" name ="paid" class="validate">
        <label for="paid">Amount Paid</label>
      </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="studentFinancial">Submit</button>
  </form>
</body>
</html>
