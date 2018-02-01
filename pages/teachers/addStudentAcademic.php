<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">


     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>

     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="../../js/materialize.min.js"></script>
     <script type="text/javascript" src="../js/bootstrap.js"></script>
     <script type="text/javascript" src="../js/bootstrap.min,js"></script>
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<p id = "heading"> Add Student Academic Information </p>
<br>

<!--bootstrap form below-->
<form action="#" id="form">
  <?php require_once('processteacher.php');?>
  <div class="form-group">
    <label for="sid">Student ID:</label>
    <input type="text" class="form-control" id="sid" name="sid" required>
  </div>
  <div class="form-group">
    <label for="subject">Subject:</label>
    <input type="text" class="form-control" id="subject" name="subject" required>
  </div>
  <div class="form-group">
    <label for="grade">Grade:</label>
    <input type="text" class="form-control" id="grade" name="grade" required>
  </div>
  <div class="form-group">
    <label for="class">Class:</label>
    <input type="text" class="form-control" id="class"  name="class"required>
  </div>
  <div class="form-group">
  <label for="term">Select Term:</label>
  <select class="form-control" id="term" name="term">
    <option value="Sept-Dec">First Term: September to December</option>
    <option value="Jan-April">Second Term: January to April</option>
    <option value="May-August">Third Term: May to August</option>
  </select>
</div>
<div class="form-group">
  <label for="year">Year:</label>
  <input type="text" class="form-control" id="year" name="year" required>
</div>
<div class="form-group">
  <label for="teacher">Teacher ID:</label>
  <input type="text" class="form-control" id="teacher" name="teacher" required>
</div>
<button type="submit" class="btn btn-primary" name="addAcademic">Submit</button>

</html>
</body>
