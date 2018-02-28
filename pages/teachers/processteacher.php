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


// ---------------------------------------------------------TEACHER LOGIN ---------------------------------------------------------------------------

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

// ---------------------------------------------------------STUDENT ACADEMIC ---------------------------------------------------------------------------

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


function searchAcademic()
{
  $id = $_POST['id'];
  $sql = "SELECT sid,subject,teacher,grade,class,term,year FROM academic WHERE sid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);

    echo "<br>";
    echo "<table>";
    echo "<tr><th>Record ID</th><th>Student ID</th><th>Subject Name</th><th>Teacher's Name</th><th>Grade</th><th>Class</th><th>Term</th><th>Year</th></tr>";

    while ($results = $login->fetch())
    {
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
}

//function to view all academic information from the academic table
function viewAllAcademic()
{
  $sql = "SELECT * FROM academic";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<br>";
  echo "<table>";
  echo "<tr><th>Record ID</th><th>Student ID</th><th>Subject Name</th><th>Teacher's Name</th><th>Grade</th><th>Class</th><th>Term</th><th>Year</th></tr>";

  while ($results = $login->fetch())
  {
    //try and display teacher's names instead of ids.
    echo "<tr>";
    echo "<td>".$results['aID']."</td>";
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
}

//function to update academic Information
function updateAcademic()
{
  
}

// function to delete student academic Information using record ID
function deleteAcademic()
{
  $id = $_POST['id'];

  $sql = "DELETE FROM academic WHERE aID = '$id'";

  $login = new Connect;
  echo $sql;

  $run = $login->query($sql);

  if ($run)
  {
    echo "Deletion Successful";
    header("location: deleteAcademic.php");
  }
  else
  {
    echo "Error occurred while deleting. Could not delete at this time";
  }
}

// ---------------------------------------------------------STUDENT HEALTH ---------------------------------------------------------------------------

//function to add a health condition to a student
function enterCondition()
{
  $id = $_POST['id'];
  $condition = $_POST['condition'];
  $details = $_POST['details'];

  $sql = "INSERT INTO health_conditions(sid,health_condition,details) VALUES ('$id','$condition','$details')";

  //new instance of database class

  $login = new Connect;

  //execute query
  $run = $login->query($sql);

  if ($run)
  {
    echo "Condition name: ". $condition ." successfully added to ID: ". $id;
  }
  else
  {
    echo "Condition name: ". $condition . " Not added. Try again";
  }
}


//function to search through student health Information
function searchHealth()
{
  $id = $_POST['id'];
  $sql = "SELECT * FROM health_conditions WHERE sid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);

        //loop through and print all results with the specified ID

      while ($results = $login->fetch())
      {
        echo "Record ID: ".$results['cid'].'<br><br>';
        echo "Student ID: ". $results['sid'].'<br><br>';
        echo "Health Condition: ". $results['health_condition'].'<br><br>';
        echo "Details: ". $results['details'].'<br><br><br><br>';
      }
}


//function to view all health information from the database
function viewAllHealth()
{
  echo "All Records: " . '<br><br>';
  $sql = "SELECT * FROM health_conditions";

  $login = new Connect;

  $run = $login->query($sql);

      while ($results = $login->fetch())
      {
        echo "Record ID: ".$results['cid'].'<br><br>';
        echo "Student ID: ". $results['sid'].'<br><br>';
        echo "Health Condition: ". $results['health_condition'].'<br><br>';
        echo "Details: ". $results['details'].'<br><br><br><br>';
      }
}



?>
