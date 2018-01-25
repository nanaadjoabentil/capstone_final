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
  checkUsernameP();
}
else if(isset($_POST['registerTeacher']))
{
  checkUsernameT();
}
else if (isset($_POST['teacherlogin']))
{
  teachervalidateLogin();
}

//function to check if parent username is unique
function checkUsernameP()
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
  $type = "parent";

  // $passwordhash = password_hash($pwd, PASSWORD_DEFAULT);

  $sql = "INSERT INTO parents(name,username,studentid) VALUES ('$name','$username','$studentid')";
  $sql2 = "INSERT INTO login(username,password,usertype) VALUES('$username','$password','$type')";

// echo $sql;
  //new instance of database class
  $register = new Connect;

  //execute query
  $run = $register->query($sql);
  $run2 = $register->query($sql2);
// var_dump($run);

  if($run)
  {
    if ($run2)
    {
      echo "Registration Successful";
      //if query works, redirect to login page
      header("location: parentLogin.php");
    }
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


//function for parent Login
function parentLogin()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $studentid = $_POST['studentid'];

    $sql = "SELECT * FROM login WHERE username = '$username' && password = '$password'";

    //create new instance of database connection class

    $login = new Connect;

    //execute query
    $run = $login->query($sql);
    $results = $login->fetch();

    if ($results)
    {
      header("location: parentindex.php");
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

 ?>
