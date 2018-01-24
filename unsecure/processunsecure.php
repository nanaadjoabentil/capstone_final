<?php
require_once('../../database/connect.php');
//load all

//check login or registration
if (isset($_POST['parentlogin']))
{
  parentvalidateLogin();
}
else if (isset($_POST['registerParent']))
{
  checkUsername();
}
else if (isset($_POST['teacherlogin']))
{
  teachervalidateLogin();
}

//function to check if username is unique
function checkUsername()
{
  $username = $_POST['username'];

  $check = new Connect;

  $sql = "SELECT * FROM parents WHERE username = '$username'";
  //echo $sql;

  $result = $check->query($sql);
  $get = $check->fetch();

  if ($get)
  {
     echo "Please choose another username. This one is already taken";
  }
  else
  {
    //if username is unique, go ahead and register user.
    checkMatch();
  }
}

//function to check if parent matches student
function checkMatch()
{
  $name = $_POST['name'];
  $studentid = $_POST['studentid'];

  $check = new Connect;

  $sql = "SELECT parent1name, parent2name FROM student WHERE id = '$studentid'";

  $result = $check->query($sql);
  $get = $check->fetch();

  // echo $get['parent1name']. " <-- parent1name".'<br>';
  //   echo $get['parent2name']. " <-- parent2name".'<br>';
  //   echo $name." <= name". '<br>';

    $p1name = $get['parent1name'];
    $p2name = $get['parent2name'];

    $ans1 = strcasecmp($p1name, $name);
    // echo $ans1." <-ans 1".'<br>';

    $ans2 = strcasecmp($p2name, $name);
    // echo $ans2." <-ans2".'<br>';

  if ($ans1 !== 0 && $ans2 !== 0)
  {
    echo "Sorry, you're not authorised to register with this ID";
  }
  else {
    // echo "Linking complete";
    registerParent();
  }

}

//function for registering parents
function registerParent()
{
  //get form fields from webpage
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $studentid = $_POST['studentid'];

  // $passwordhash = password_hash($pwd, PASSWORD_DEFAULT);

  $sql = "INSERT INTO parents(name,username,password,studentid) VALUES ('$name','$username','$password','$studentid')";

// echo $sql;
  //new instance of database class
  $register = new Connect;

  //execute query
  $run = $register->query($sql);
// var_dump($run);

  if($run)
  {
    //if query works, redirect to login page
    header("location: login.php");
    //create popup window to show child's id.
  }
  else
  {
    echo "Error occurred during registration";
  }
}


//function to validate parent login
function parentvalidateLogin()
{
  if (empty($_POST['username']))
  {
    echo "Please enter your username";
  }
  else if (empty($_POST['password']))
  {
    echo "Please enter your password";
  }
  else if (empty($_POST['studentid']))
  {
    echo "Please enter your child's student ID";
  }
  else
  {
    //if none of them are empty, log the user in
    parentLogin();
  }
}

//function to validate login
function teachervalidateLogin()
{
  if (empty($_POST['staffid']))
  {
    echo "Please enter your Staff ID number";
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


//function for parent Login
function parentLogin()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $studentid = $_POST['studentid'];
    $_SESSION['studentid'] = $studentid;

    $sql = "SELECT * FROM parents WHERE username = '$username' && password = '$password'";

    //create new instance of database connection class

    $login = new Connect;

    //execute query
    $run = $login->query($sql);
    $results = $login->fetch();

    if ($results)
    {
      header("location:../parents/parentindex.php");
    }

//function to login teacher
function teacherLogin()
{
  $staffid = $_POST['staffid'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM staffProfile WHERE staffid = '$staffid' && password = '$password'";

  //create new instance of database connection class

  $login = new Connect;

  //execute query
  $run = $login->query($sql);
  $results = $login->fetch();

  if ($results)
  {
    echo "Successful Login With ID". " ". $staffid;
  }
  else
  {
    echo "Error occurred. Please try again.";
  }
}

 ?>
