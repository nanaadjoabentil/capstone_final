<?php
require_once('../../database/connect.php');
//load all majors

//check login or registration
if (isset($_POST['parentlogin']))
{
  parentvalidateLogin();
}
else if (isset($_POST['registerStudent']))
{
  registerStudent();
}
else if (isset($_POST['registerParent']))
{
  checkUsername();
}
else if (isset($_POST['adminlogin']))
{
  adminvalidateLogin();
}
else if (isset($_POST['teacherlogin']))
{
  teachervalidateLogin();
}
else if (isset($_POST['enterCondition']))
{
  enterCondition();
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

//function for registering students
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

//function for registering students
function registerStudent()
{
  //get form fields from webpage
  $id = rand(10,10000);
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $age = $_POST['age'];
  $gender = $_POST['group1'];
  $pobox = $_POST['pobox'];
  $parent1name = $_POST['parent1name'];
  $parent1num = $_POST['parent1num'];
  $parent2name = $_POST['parent2name'];
  $parent2num = $_POST['parent2num'];
  $email = $_POST['email'];

  // $passwordhash = password_hash($pwd, PASSWORD_DEFAULT);

  $sql = "INSERT INTO student(id,firstname,middlename,lastname,dateofbirth,age,gender,postaladdress,parent1name,parent1number,parent2name,parent2number,contactemail) VALUES
  ('$id','$firstname','$middlename','$lastname','$dob','$age','$gender','$pobox','$parent1name','$parent1num','$parent2name','$parent2num','$email')";

// echo $sql;
  //new instance of database class
  $register = new Connect;

  //execute query
  $run = $register->query($sql);
// var_dump($run);

  if($run)
  {
    echo $firstname." ". $lastname."'s' student ID is". " ".$id;
    //if query works, redirect to login page
    // header("location: index.php");
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

//function to validate admin login
function adminvalidateLogin()
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
    adminLogin();
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

function displayStudentPersonal()
{
  $studentid = $_SESSION['studentid'];
  $sql2 = "SELECT * FROM student WHERE id = '$studentid'";

  $login = new Connect;

  $ans = $login->query($sql2);
  $res = $login->fetch();

  echo "<table>";

  echo "<tr><th>Student ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Date of Birth</th><th>Age</th><th>Gender</th><th>Postal Address</th><th>Parent Name</th><th>Parent Number</th><th>Parent Name</th><th>Parent Number</th><th>Contact Email</th></tr>";

$id = $res['id'];
$firstname = $res['firstname'];
$middlename = $res['middlename'];
$lastname = $res['lastname'];
$dateofbirth = $res['dateofbirth'];
$age = $res['age'];
$gender = $res['gender'];
$postaladdress = $res['postaladdress'];
$parent1name = $res['parent1name'];
$parent1number = $res['parent1number'];
$parent2name = $res['parent2name'];
$parent2number = $res['parent2number'];
$contactemail = $res['contactemail'];

echo "<tr>";
echo "<td>".$id."</td>";
echo "<td>".$firstname."</td>";
echo "<td>".$middlename."</td>";
echo "<td>".$lastname."</td>";
echo "<td>".$dateofbirth."</td>";
echo "<td>".$age."</td>";
echo "<td>".$gender."</td>";
echo "<td>".$postaladdress."</td>";
echo "<td>".$parent1name."</td>";
echo "<td>".$parent1number."</td>";
echo "<td>".$parent2name."</td>";
echo "<td>".$parent2number."</td>";
echo "<td>".$contactemail."</td>";
echo "</tr>";
}
echo "</table>";
}

//function to login admin
function adminLogin()
{
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";

      //create new instance of database connection class

      $login = new Connect;

      //execute query
      $run = $login->query($sql);
      $results = $login->fetch();

      if ($results)
      {
        //echo "Successful Login as Admin";
        header("location:../admin/adminindex.php");
      }
      else
      {
        echo "Error occurred. Please try again.";
      }
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

//function to add a health condition to a student
function enterCondition()
{
  $id = '3837';
  $condition = $_POST['condition'];
  $details = $_POST['details'];

  $sql = "INSERT INTO health_conditions(sid,health_condition,details) VALUES ('$id','$condition','$details')";
  // $sql = "INSERT INTO health_conditions(sid,health_condition,details) VALUES ('$id','$condition','$details')";
  
  //new instance of database class

  $login = new Connect;

  //execute query
  $run = $login->query($sql);

  if ($run)
  {
    echo "Condition name: ". $condition . ", " ."successfully added to ID: ". $id;
  }
  else
  {
    echo "Condition name: ". $condition . ", " . "Not added. Try again";
  }
}
 ?>
