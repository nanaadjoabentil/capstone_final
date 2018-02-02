<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
     <script type="text/javascript" src="../js/bootstrap.js"></script>
     <script type="text/javascript" src="../js/bootstrap.min,js"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </head>
<body>
<p id = "heading"> Add Student Academic Information </p>
<br>

<!--bootstrap form below-->
<form method="post" action="#" id="form">
  <?php require_once('processteacher.php');?>

  <div class="form-group">
    <label for="id">Student ID:</label>
    <input type="text" class="form-control" id="id" name="id" required>
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

</body>
</html>
