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

<p id = "heading"> Add Inventory Item</p>
<br>

    <form method="post" action="" class ="col s8" id = "form">
      <?php require_once('../../unsecure/processunsecure.php');?>
      <div class="row">
      <div class="input-field col s4">
         <input id="item_name" type="text" name = "item_name" class="validate">
         <label for="item_name">Item Name</label>
       </div>
     </div>

     <label>Item type: </label>
      <select class="browser-default" name="type">
        <option value="" disabled selected>Choose...</option>
        <option value="stationery">Stationery</option>
        <option value="toiletries">Toiletries</option>
        <option value="uniforms">Uniforms</option>
        <option value="medicines">Medicine</option>
        <option value="cleaning supplies">Cleaning Supplies</option>
        <option value="other">Other</option>
      </select>
      <br><br>

      If other, please enter the item type here. <br><br>
      <div class="row">
       <div class="input-field col s12">
          <input id="other" type="text" name = "other">
          <label for="other">Other Item Type</label>
        </div><br>

      <div class="row">
        <div class="input-field col s4">
         <input id="number" type="text" name = "number" class="validate">
         <label for="number">Amount</label>
       </div>
     </div>
     <button class="btn waves-effect waves-light" type="submit" name="addInventory">Add to Database</button>

   </body>
   </html>
