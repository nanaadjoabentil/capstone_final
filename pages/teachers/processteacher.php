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
else if(isset($_POST['enterCondition']))
{
  enterCondition();
}
else if(isset($_POST['searchStaff']))
{
  searchStaff();
}
else if (isset($_POST['updateStaff']))
{
  updateStaff();
}
else if (isset($_POST['deleteStaff']))
{
  deleteStaff();
}
else if (isset($_POST['addStaffSubjects']))
{
  addStaffSubjects();
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
  $score = $_POST['score'];

  $login = new Connect;

  $sql = "INSERT INTO academic(sid,subject,teacher,score,grade,class,term,year) VALUES ('$id','$subject','$teacher','$score','$grade','$class','$term','$year')";

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
  $sql = "SELECT aID,sid,subject,teacher,score,grade,class,term,year FROM academic WHERE sid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);

    echo "<br>";
    echo "<table>";
    echo "<tr><th>Record ID</th><th>Student ID</th><th>Subject Name</th><th>Teacher's Name</th><th>Score</th><th>Grade</th><th>Class</th><th>Term</th><th>Year</th></tr>";

    while ($results = $login->fetch())
    {
      $tid = $results['teacher'];

      $login2 = new Connect;

      $sql2 = "SELECT name FROM staffProfile WHERE staffid = '$tid'";

      $run2 = $login2->query($sql2);

      $ans = $login2->fetch();

      $name = $ans['name'];

      echo "<tr>";
      echo "<td>".$results['aID']."</td>";
      echo "<td>".$results['sid']."</td>";
      echo "<td>".$results['subject']."</td>";
      echo "<td>".$name."</td>";
      echo "<td>".$results['score']."</td>";
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
  echo "<tr><th>Record ID</th><th>Student ID</th><th>Subject Name</th><th>Teacher's Name</th><th>Score</th><th>Grade</th><th>Class</th><th>Term</th><th>Year</th></tr>";

  while ($results = $login->fetch())
  {
    $tid = $results['teacher'];

    $login2 = new Connect;

    $sql2 = "SELECT name FROM staffProfile WHERE staffid = '$tid'";

    $run2 = $login2->query($sql2);

    $ans = $login2->fetch();

    $name = $ans['name'];

    echo "<tr>";
    echo "<td>".$results['aID']."</td>";
    echo "<td>".$results['sid']."</td>";
    echo "<td>".$results['subject']."</td>";
    echo "<td>".$name."</td>";
    echo "<td>".$results['score']."</td>";
    echo "<td>".$results['grade']."</td>";
    echo "<td>".$results['class']."</td>";
    echo "<td>".$results['term']."</td>";
    echo "<td>".$results['year']."</td>";
    echo "</tr>";
  }
  echo '</table>';
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
    echo "Condition name: \"". $condition ."\" successfully added to ID: ". $id;
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

//----------------------------------------------STAFF PROFILES---------------------------------------------------------------------------
//function to view staff information
function searchStaff()
{
  $id = $_POST['id'];
  $sql = "SELECT staffid,username,name,number,email,nextofkin,nextofkintelephone FROM staffProfile WHERE staffid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);
  $results = $login->fetch();


if ($results)
{
    echo '<br>';
    echo "Staff ID: " .$results['staffid'].'<br>';
    echo "Full Name: ". $results['name'].'<br>';
    echo "Username: " .$results['username'].'<br>';
    echo "Telephone Number: " .$results['number'].'<br>';
    echo "Email address: " .$results['email'].'<br>';
    echo "Next of Kin: " .$results['nextofkin'].'<br>';
    echo "Next of Kin's Telephone Number: " .$results['nextofkintelephone'].'<br>';
  }
  else
  {
    echo "<br>";
    echo "No Staff Member with that ID Number";
  }
  }

  //function to update staff member's personal information
  function updateStaff()
  {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['tel'];
    $email = $_POST['email'];
    $nextofkin = $_POST['nextofkin'];
    $noknumber = $_POST['noknumber'];

    $sql = "SELECT * FROM staffProfile WHERE staffid = '$id'";

    $login = new Connect;

    $run = $login->query($sql);

    while ($results = $login->fetch())
    {
      $sql2 = "UPDATE staffProfile SET name = '$name' WHERE staffid = '$id'";
      $sql3 = "UPDATE staffProfile SET number = '$number' WHERE staffid = '$id'";
      $sql4 = "UPDATE staffProfile SET email = '$email' WHERE staffid = '$id'";
      $sql5 = "UPDATE staffProfile SET nextofkin = '$nextofkin' WHERE staffid = '$id'";
      $sql6 = "UPDATE staffProfile SET nextofkintelephone = '$noknumber' WHERE staffid = '$id'";

      $run2 = $login->query($sql2);
      $run3 = $login->query($sql3);
      $run4 = $login->query($sql4);
      $run5 = $login->query($sql5);
      $run6 = $login->query($sql6);

      if ($run2 && $run3 && $run4 && $run5 && $run6)
      {
        echo "Update Successful";
      }
      else
      {
        echo "Update failed";
      }
    }
  }

  //function to delete a staff member's personal information
  function deleteStaff()
  {
    $id = $_POST['id'];

    $sql = "DELETE FROM staffProfile WHERE staffid = '$id'";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
      echo "Staff Profile with ID ". $id . " successfully deleted";
      // header("location: deleteStaff.php");
    }
    else
    {
      echo "Uh Oh! Something went wrong.";
    }
  }

  //-------------------------------------------------------STUDENT PERSONAL ----------------------------------------------------
  //function to view all students
  function viewAllStudents()
  {
    $sql = "SELECT id,firstname,middlename,lastname,dateofbirth,gender,postaladdress,parent1name,parent1number,parent2name,parent2number,contactemail FROM student";

    $login = new Connect;

    $run = $login->query($sql);

    // echo "<br><br>";
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Date of Birth</th><th>Gender</th><th>Postal Address</th><th>Parent Name</th><th>Parent Telephone Number</th><th>Parent Name</th><th>Parent Telephone Number</th><th>Contact Email</th></tr>";

    while ($results = $login->fetch())
    {
      echo "<tr>";
      echo "<td>".$results['id']."</td>";
      echo "<td>".$results['firstname']."</td>";
      echo "<td>".$results['middlename']."</td>";
      echo "<td>".$results['lastname']."</td>";
      echo "<td>".$results['dateofbirth']."</td>";
      echo "<td>".$results['gender']."</td>";
      echo "<td>".$results['postaladdress']."</td>";
      echo "<td>".$results['parent1name']."</td>";
      echo "<td>".$results['parent1number']."</td>";
      echo "<td>".$results['parent2name']."</td>";
      echo "<td>".$results['parent2number']."</td>";
      echo "<td>".$results['contactemail']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }

  //function to fetch student information to be viewed (search by id)
  function viewStudentPersonal()
  {
    $id = $_POST['id'];
    $sql = "SELECT * FROM student WHERE id = '$id'";

    $login = new Connect;

    $run = $login->query($sql);

    $results = $login->fetch();

    if ($results)
    {
    echo $results['firstname']."'s'" . " personal information:". '<br><br>';
    echo "ID: ". $results['id']. '<br><br>';
    echo "First Name: ". $results['firstname']. '<br><br>';
    if ($results['middlename'] != "")
    {
      echo "Middle Name: ". $results['middlename']. '<br><br>';
    }
    echo "Last Name: ". $results['lastname']. '<br><br>';
    echo "Date of Birth: ". $results['dateofbirth']. '<br><br>';
    echo "Gender: ". $results['gender']. '<br><br>';
    echo "Postal Address: ". $results['postaladdress']. '<br><br>';
    echo "First Parent's Name: ". $results['parent1name']. '<br><br>';
    echo "First Parent's Number: ". $results['parent1number']. '<br><br>';
    echo "Second Parent's Name: ". $results['parent2name']. '<br><br>';
    echo "Second Parent's Telephone Number: ". $results['parent2number']. '<br><br>';
    echo "Email address: ". $results['contactemail']. '<br><br>';
  }
  else
  {
    echo "No Record Found with that ID";
  }
  }

//-----------------------------------------STAFF SUBJECTS----------------------------------------------------------------------------
//function to add staffSubjects
function addStaffSubjects()
{
  $id = $_POST['id'];
  $subject = $_POST['subject'];
  $class = $_POST['class'];

  $sql = "INSERT INTO staffSubjects(staffid,subject,class) VALUES ('$id','$subject','$class')";

  $login = new Connect;

  $run = $login->query($sql);

  if ($run)
  {
    echo "Successfully Added";
  }
  else
  {
    echo "Could not be added";
  }
}

//function to search staff subjects
function searchStaffSubjects()
{
  $id = $_POST['id'];

  $sql = "SELECT staffid, subject, class FROM staffSubjects WHERE staffid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<table>";
  echo "<tr><th>Staff ID</th><th>Subject</th><th>Class</th></tr>";

  while ($results = $login->fetch())
  {
    echo "<tr>";
    echo "<td>".$results['staffid']."</td>";
    echo "<td>".$results['subject']."</td>";
    echo "<td>".$results['class']."</td>";
    echo "</tr>";
  }
  echo "</table>";
}

//function to view all staff subjects
function viewAllStaffSubjects()
{
  $sql = "SELECT staffid, subject, class FROM staffSubjects";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<table>";
  echo "<tr><th>Staff ID</th><th>Subject</th><th>Class</th></tr>";

  while ($results = $login->fetch())
  {
    echo "<tr>";
    echo "<td>".$results['staffid']."</td>";
    echo "<td>".$results['subject']."</td>";
    echo "<td>".$results['class']."</td>";
    echo "</tr>";
  }
  echo "</table>";
}

//function delete staff subjects
function deleteStaffSubjects()
{
  $id = $_POST['id'];
  $subject = $_POST['subject'];
  $class = $_POST['class'];

  $sql = "DELETE FROM staffSubjects WHERE staffid = '$id' AND subject = '$subject' AND class = '$class'";

  $login = new Connect;

  $run = $login->query($sql);

  if ($run)
  {
    echo "Successfully Deleted";
    header ("location: deleteStaffSubjects.php");
  }
  else
  {
    echo "Could not Delete.";
  }
}
?>
