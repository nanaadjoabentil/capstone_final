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

  <p id = "heading"> Update Student Personal Information </p>
  <br>

  <form method="post" id="form">

    <div class="form-group">
      <label for="id">Update information for ID:</label>
      <input type="text" class="form-control" id="id" name="id">
    </div>

    <div class="form-group">
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" id="firstname" name="firstname" required>
    </div>

    <div class="form-group">
      <label for="middlename">Middle Name:</label>
      <input type="text" class="form-control" id="middlename" name="middlename" required>
    </div>

    <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" id="lastname" name="lastname" required>
    </div>

    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" placeholder="yyyy/mm/dd" id="dob" name="dob" required>
    </div>

    <p>
      Gender: <br>
     <input name="group1" type="radio" id="genderM" value = "Male" required/>
     <label for="genderM">Male</label>
     <input name="group1" type="radio" id="genderF" value = "Female" required/>
     <label for="genderF">Female</label>
   </p>

    <div class="form-group">
      <label for="pobox">Postal Address:</label>
      <input type="text" class="form-control" id="pobox" name="pobox" required>
    </div>

    <div class="form-group">
      <label for="parent1name">First Parent / Guardian's Name:</label>
      <input type="text" class="form-control" id="parent1name" name="parent1name" required>
    </div>

    <div class="form-group">
      <label for="parent1num">First Parent / Guardian's Phone Number:</label>
      <input type="text" class="form-control" id="parent1num" name="parent1num" required>
    </div>

    <div class="form-group">
      <label for="parent2name">Second Parent / Guardian's Name:</label>
      <input type="text" class="form-control" id="parent2name" name="parent2name">
    </div>

    <div class="form-group">
      <label for="parent2num">Second Parent / Guardian's Phone Number:</label>
      <input type="text" class="form-control" id="parent2num" name="parent2num">
    </div>

    <div class="form-group">
      <label for="email">Contact Email:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>

   <button type="submit" class="btn btn-primary" id="butns" name="updateStudentPersonal">Update</button>

   </div>
   </form>

<?php require_once("processadmin.php");

if (isset($_POST['updateStudentPersonal']))
{
  updateStudentPersonal();
}

?>
</body>
</html>
