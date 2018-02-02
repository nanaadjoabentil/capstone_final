<?php

require_once("../../database/connect.php");

if (isset($_POST['searchStaff']))
{
  $id = $_POST['id'];
  viewStaff($id);
}
else if(isset($_POST['registerTeacher']))
{
  checkUsernameT();
}
else if (isset($_POST['teacherlogin']))
{
  teachervalidateLogin();
}
else if(isset($_POST['addAcademic']))
{
  addAcademic();
}
else if(isset($_POST['viewAcademic']))
{
  $id = $_POST['id'];
  viewStudentAcademic($id);
}


//function to check if parent username is unique
function checkUsernameT()
{
  $username = $_POST['username'];

  $check = new Connect;

  $sql = "SELECT * FROM staffProfile WHERE username = '$username'";
  //echo $sql;

  $result = $check->query($sql);
  $get = $check->fetch();

  if ($get)
  {
     echo "Please choose another username. This one is already taken";
  }
  else
  {
    //if username is unique, go ahead and validate registration form.
    validateRegisterTeacher();
  }
}

//function to validate login
function teachervalidateLogin()
{
  if (empty($_POST['username']))
  {
    echo "Please enter your username";
  }
  else if (empty($_POST['password']))
  {
    echo "Please enter your password";
  }
  else
  {
    //if none of them are empty, log the user in
    teacherLogin();
  }
}

//function to validate teacher registration form
function validateRegisterTeacher()
{
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $number = $_POST['tel'];
  $email = $_POST['email'];
  $nextofkin = $_POST['nextofkin'];
  $noknumber = $_POST['noknumber'];

  if (empty($name || $username || $password || $number || $email || $nextofkin || $noknumber))
  {
    echo "All fields are required. Please fill all";
  }
  else
  {
    registerTeacher();
  }
}

//function to register a teacher
function registerTeacher()
{
  $id = rand(1,100);
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $number = $_POST['tel'];
  $email = $_POST['email'];
  $nextofkin = $_POST['nextofkin'];
  $noknumber = $_POST['noknumber'];
  $type = "teacher";

  $sql = "INSERT INTO staffProfile(staffid,username,name,number,email,nextofkin,nextofkintelephone)
  VALUES('$id','$username','$name','$number','$email','$nextofkin','$noknumber')";

  $sql2 = "INSERT INTO login(username,password,usertype) VALUES('$username','$password','$type')";

  $login = new Connect;

  $run = $login->query($sql);
  $run2 = $login->query($sql2);

  if ($run)
  {
    if ($run2)
    {
      header("location: teacherLogin.php");
    }
    else
    {
      echo "Error Occurred during registration";
    }
  }
}


//function to login teacher
function teacherLogin()
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM login WHERE username = '$username' && password = '$password'";

  //create new instance of database connection class

  $login = new Connect;

  //execute query
  $run = $login->query($sql);
  $results = $login->fetch();

  if ($results)
  {
    header("location: teacherindex.php");
  }
  else
  {
    echo "Error occurred. Please try again.";
  }
}

//function to view staff information
function viewStaff($id)
{
  $sql = "SELECT staffid,username,name,number,email,nextofkin,nextofkintelephone FROM staffProfile WHERE staffid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);
  $results = $login->fetch();

  if($results)
  {
      echo "Staff ID: " . $results['staffid'] . '<br><br>';
      echo "Username: " . $results['username'] . '<br><br>';
      echo "Name: " . $results['name'] . '<br><br>';
      echo "Number: " . $results['number'] . '<br><br>';
      echo "Email: " . $results['email'] . '<br><br>';
      echo "Next of Kin: " . $results['nextofkin'] . '<br><br>';
      echo "Next of Kin Telephone Number: " . $results['nextofkintelephone'] . '<br><br>';
  }
}


//function to add academic data of a student
function addAcademic()
{
  $id = $_POST['id'];
  $subject = $_POST['subject'];
  $grade = $_POST['grade'];
  $class = $_POST['class'];
  $term = $_POST['term'];
  $year = $_POST['year'];
  $teacher = $_POST['teacher'];

  $login = new Connect;

  $sql = "INSERT INTO academic(sid,subject,teacher,grade,class,term,year) VALUES ('$id','$subject','$teacher','$grade','$class','$term','$year')";

  $run = $login->query($sql);

  if($run)
  {
    echo " Academic data for student ID " . $id . " successfully entered into database";
  }
  else
  {
    echo "Error occurred. Try again later.";
  }
}


function viewStudentAcademic($id)
{
  $sql = "SELECT sid,subject,teacher,grade,class,term,year FROM academic WHERE sid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);
  $results = $login->fetch();

  if($results)
  {
      echo "Student ID: " . $results['sid'] . '<br><br>';
      echo "Subject: " . $results['subject'] . '<br><br>';
      echo "Teacher ID: " . $results['teacher'] . '<br><br>';
      echo "Grade: " . $results['grade'] . '<br><br>';
      echo "Class: " . $results['class'] . '<br><br>';
      echo "Term: " . $results['term'] . '<br><br>';
      echo "Year: " . $results['year'] . '<br><br>';
  }
}
?>
