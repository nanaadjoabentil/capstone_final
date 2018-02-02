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

<p id = "heading"> Add Student Academic Information </p>
<br>

<form method="post" action="" class ="col s12">
  <?php require_once('processteacher.php');?>

  <div class="row">
   <div class="input-field col s12">
      <input id="id" type="text" name ="id" class="validate">
      <label for="id">Student ID</label>
    </div>
  </div>
  <div class="row">
   <div class="input-field col s12">
      <input id="subject" type="text" name ="subject" class="validate">
      <label for="subject">Subject</label>
    </div>
  </div>
  <div class="row">
   <div class="input-field col s12">
      <input id="grade" type="text" name ="grade" class="validate">
      <label for="grade">Grade</label>
    </div>
  </div>
  <div class="row">
   <div class="input-field col s12">
      <input id="class" type="text" name ="class" class="validate">
      <label for="class">Class</label>
    </div>
  </div>
  <label>Select Term:</label>
  <select id="term" name="term" class="browser-default">
    <option value="" disabled selected>Choose Term:</option>
    <option value="Sept-Dec">First Term: September to December</option>
    <option value="Jan-April">Second Term: January to April</option>
    <option value="May-August">Third Term: May to August</option>
  </select>
</div>
<div class="row">
 <div class="input-field col s12">
    <input id="year" type="text" name ="year" class="validate">
    <label for="year">Year</label>
  </div>
</div>
<div class="row">
 <div class="input-field col s12">
    <input id="teacher" type="text" name ="teacher" class="validate">
    <label for="teacher">Teacher ID</label>
  </div>
</div>
<button class="btn waves-effect waves-light" type="submit" name="addAcademic">Submit</button>
</form>
</body>
</html>
