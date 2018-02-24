<?php

require_once("../../database/connect.php");


if (isset($_POST['teacherlogin']))
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
  // $results = $login->fetch();
  // $tid = $results['teacher'];

  // if($results)
  // {
    echo "<br>";
    echo "<table>";
    echo "<tr><th>Student ID</th><th>Subject Name</th><th>Teacher's Name</th><th>Grade</th><th>Class</th><th>Term</th><th>Year</th></tr>";

    while ($results = $login->fetch())
    {
      // $sql2 = "SELECT name FROM staffProfile WHERE staffid = '$tid'";
      // $run2 = $login->query($sql2);
      // $ans = $login->fetch();
      //try and display teacher's names instead of ids.
      echo "<tr>";
      echo "<td>".$results['sid']."</td>";
      echo "<td>".$results['subject']."</td>";
      // echo "<td>".$ans['name']."</td>";
      echo "<td>".$results['teacher']."</td>";
      echo "<td>".$results['grade']."</td>";
      echo "<td>".$results['class']."</td>";
      echo "<td>".$results['term']."</td>";
      echo "<td>".$results['year']."</td>";
      echo "</tr>";
    }
    echo '</table>';
      // echo "Student ID: " . $results['sid'] . '<br><br>';
      // echo "Subject: " . $results['subject'] . '<br><br>';
      // echo "Teacher ID: " . $results['teacher'] . '<br><br>';
      // echo "Grade: " . $results['grade'] . '<br><br>';
      // echo "Class: " . $results['class'] . '<br><br>';
      // echo "Term: " . $results['term'] . '<br><br>';
      // echo "Year: " . $results['year'] . '<br><br>';
//  }
}
?>
