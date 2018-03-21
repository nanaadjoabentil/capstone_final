<!DOCTYPE html>
 <html lang="en">
 <header>
   <img src="../../images/2.png" alt="pic" width="1270px">
 </header>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../css/bootstrap.css">
     <link rel="stylesheet" href="../../css/bootstrap.min.css">
     <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
     <script type="text/javascript" src="../../js/bootstrap.js"></script>
     <script type="text/javascript" src="../../js/bootstrap.min.js"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </head>
<body>
<p id = "heading"> Add Student Academic Information </p>
<br>

<!--bootstrap form below-->
<form method="post" id="form">
  <?php require_once('processteacher.php');?>

  <div class="form-group">
    <label for="id">Student ID:</label>
    <input type="text" class="form-control" id="id" name="id" required>
  </div>

  <div class="form-group">
    <label for="subject">Subject:</label>
    <select class="form-control" id="subject" name="subject">
      <option>Choose...</option>
      <option value="English">English Language</option>
      <option value="Mathematics">Mathematics</option>
      <option value="Integrated Science">Integrated Science</option>
      <option value="Social Studies">Social Studies</option>
      <option value="Environmental Studies">Environmental Studies</option>
      <option value="French">French</option>
      <option value="Ghanaian Language">Ghanaian Language</option>
      <option value="Home Economics">Home Economics</option>
      <option value="Pre-Technical Skills">Pre-Technical Skills</option>
      <option value="Visual Arts">Visual Arts</option>
      <option value="Physical Education">Physical Education (P.E.)</option>
      <option value="French">French</option>
      <option value="ICT">Information and Communications Technology (I.C.T.)</option>
      <option value="Creative Arts">Creative Arts</option>
      <option value="Practical Life">Practical Life</option>
    </select>
    <!-- <input type="text" class="form-control" id="subject" name="subject" required> -->
  </div>

  <div class="form-group">
    <label for="score">Score / Marks:</label>
    <input type="number" class="form-control" id="score" name="score" min="1" max="100" required>
  </div>

  <div class="form-group">
    <label for="grade">Grade:</label>
      <select class="form-control" id="grade" name="grade">
        <option>Choose...</option>
        <option value="A">A - 80 to 100</option>
        <option value="B+">B+ - 79 to 75</option>
        <option value="B">B - 74 to 70</option>
        <option value="C+">C+ - 69 to 65</option>
        <option value="C">C - 64 to 60</option>
        <option value="D+">D+ - 59 to 55</option>
        <option value="D">D - 54 to 50</option>
        <option value="E">E - 49 to 45</option>
        <option value="F">F - 44 to 0</option>
      </select>
    <!-- <input type="text" class="form-control" id="grade" name="grade" required> -->
  </div>

  <div class="form-group">
    <label for="class">Class:</label>
    <select class="form-control" id="class" name="class">
      <option>Choose...</option>
      <option value="KG 1">KG 1</option>
      <option value="KG 2">KG 2</option>
      <option value="Class 1">Class 1</option>
      <option value="Class 2">Class 2</option>
      <option value="Class 3">Class 3</option>
      <option value="Class 4">Class 4</option>
      <option value="Class 5">Class 5</option>
      <option value="Class 6">Class 6</option>
      <option value="JHS 1">JHS 1</option>
      <option value="JHS 2">JHS 2</option>
      <option value="JHS 3">JHS 3</option>
    </select>
    <!-- <input type="text" class="form-control" id="class"  name="class"required> -->
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

<button type="submit" class="btn btn-primary" id="butns" name="addAcademic">Submit</button>

</body>
</html>
