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

<p id = "heading"> Register a Student </p>
<br>

     <form method="post" action="" class ="col s8">
       <?php require_once('../../unsecure/processunsecure.php'); ?>
        <div class="row">
         <div class="input-field col s4">
            <input id="firstname" type="text" name = "firstname" class="validate">
            <label for="firstname">First Name</label>
          </div>
          <div class="input-field col s4">
             <input id="middlename" type="text" name="middlename" class="validate">
             <label for="middlename">Middle Name</label>
           </div>
          <div class="input-field col s4">
          <input id="lastname" type="text" name="lastname" class="validate">
          <label for="lastname">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="dob" type="text" placeholder="yyyy/mm/dd" name="dob" class="validate">
          <label for="dob">Date of Birth</label>
        </div>
        <div class="input-field col s4">
          <input id="age" type="number" name="age" class="validate">
          <label for="age">Age</label>
        </div>
        <p>
          Gender: <br>
         <input name="group1" type="radio" id="genderM" value = "Male" class="with-gap"/>
         <label for="genderM">Male</label>
         <input name="group1" type="radio" id="genderF" value = "Female" class="with-gap"/>
         <label for="genderF">Female</label>
       </p>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="pobox" type="text" name="pobox" class="validate">
          <label for="pobox">Postal Address</label>
        </div>
      </div>
      Parent Info
      <div class="row">
        <div class="input-field col s6">
          <input id="parent1name" type="text" name="parent1name" class="validate">
          <label for="parent1name">Parent Name</label>
        </div>
        <div class="input-field col s6">
          <input id="parent1num" type="text" name="parent1num" class="validate">
          <label for="parent1num">Parent's Phone Number</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="parent2name" type="text" name="parent2name" class="validate">
          <label for="parent2name">Parent 2 Name</label>
        </div>
        <div class="input-field col s6">
          <input id="parent2num" type="text" name="parent2num" class="validate">
          <label for="parent2num">Parent 2 Phone Number</label>
      </div>
      </div>
      <div class="row">
        <div class="input-field col s9">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Contact Email</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="registerStudent" onclick="registerStudent()">Register
      </button>
   </body>
 </html>
