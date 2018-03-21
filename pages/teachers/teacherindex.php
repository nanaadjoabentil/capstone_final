
<!DOCTYPE html>
<html lang="en">
<header>
  <img src="../../images/2.png" alt="pic" width="1235px" height="300px">
</header>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/dashboard.css">
    <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min,js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
<body>

<p id = "heading"> Dashboard </p>
<br>

<a href="teacherLogin.php"><input type="button" value="Back"></></a> &nbsp&nbsp&nbsp&nbsp&nbsp Welcome to the staff dashboard.
<br><br><br>

<!-- <a href="staff.php">Staff Links</a><br><br>
<a href="student.php">Student Links</a> -->

<p id = "subheading"> Staff </p>
<nav>
  <ul>
    <a href="addStaffSubjects.php"><button id="dbutton">Add Staff Classes and Subjects Information</button></a>
    <a href="updateStaff.php"><button id="dbutton">Update Staff Profile</button></a>
    <a href="viewStaffProfile.php"><button id="dbutton">View Staff Profile</button></a><br>
    <a href="staff.php" id="seeall">See All</a>
    <br>
  </ul>
</nav>

<p id = "subheading"> Students </p>
<nav>
  <ul>
    <a href="addStudentHealth.php"><button id="dbutton">Add Student's Health Information</button></a>
    <a href="addStudentAcademic.php"><button id="dbutton">Add Student Academic Information</button></a>
    <a href="viewStudentAcademic.php"><button id="dbutton">View Student Academic Information</button></a><br>
    <a href="student.php" id="seeall">See All</a>
  </ul>
</nav>
<br><br>

<footer>
  &copy2018  Nana Adjoa Bentil
</footer>
</body>
</html>
