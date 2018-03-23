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
else if (isset($_POST['getAcademic']))
{
  viewAcademic();
}
else if (isset($_POST['getHealth']))
{
  viewHealth();
}
else if (isset($_POST['getPersonal']))
{
  viewPersonal();
}
else if (isset($_POST['getFinancial']))
{
  viewFinancial();
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
      header("location: index.php");
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
  else
  {
    //if none of them are empty, log the user in
    parentLogin();
  }
}

//function for parent Login
function parentLogin()
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
      session_start();

      $_SESSION['username'] = $username;

      header("location: parentindex.php");

    }
}


// function for parents to see their children's academic information.

function viewAcademic()
{
  //get child id based on parent name.
  // session_start();

  $username = $_SESSION['username'];

  $sql = "SELECT studentid FROM parents WHERE username = '$username'";

  $login = new Connect;

  $run = $login->query($sql);

  while ($results = $login->fetch())
  {
    // save result in variable.
    $id = $results['studentid'];

    //get child's academic info based on id
    $sql2 = "SELECT sid,subject,teacher,score,grade,class,term,year FROM academic WHERE sid = '$id'";

    $login2 = new Connect;

    $run2 = $login2->query($sql2);

      echo "<br>";
      echo "<h3> Academic Information / Grades </h3>"."<br>";
      echo "<table>";
      echo "<tr><th>Student ID</th><th>Subject Name</th><th>Teacher's Name</th><th>Score</th><th>Grade</th><th>Class</th><th>Term</th><th>Year</th></tr>";

      while ($results2 = $login2->fetch())
      {
        $staffid = $results2['teacher'];

        $sql3 = "SELECT name FROM staffProfile WHERE staffid = '$staffid'";

        $login3 = new Connect;

        $run3 = $login->query($sql3);

        $results3 = $login->fetch();

        $name = $results3['name'];

        //try and display teacher's names instead of ids.
        echo "<tr>";
        echo "<td>".$results2['sid']."</td>";
        echo "<td>".$results2['subject']."</td>";
        echo "<td>".$name."</td>";
        echo "<td>".$results2['score']."</td>";
        echo "<td>".$results2['grade']."</td>";
        echo "<td>".$results2['class']."</td>";
        echo "<td>".$results2['term']."</td>";
        echo "<td>".$results2['year']."</td>";
        echo "</tr>";
      }
      echo '</table>';
  }
}


//function for parents to see their children's health Information
function viewHealth()
{
  //get child id based on parent name.
  // session_start();

  $username = $_SESSION['username'];


  $sql = "SELECT studentid FROM parents WHERE username = '$username'";

  $login = new Connect;

  $run = $login->query($sql);

  while ($results = $login->fetch())
  {
    // save result in variable.
    $id = $results['studentid'];

    //get child's academic info based on id
    $sql2 = "SELECT sid,health_condition,details FROM health_conditions WHERE sid = '$id'";

    $login2 = new Connect;

    $run2 = $login2->query($sql2);

    echo "<h3> Health /  Medical Information </h3>"."<br>";

    while ($results2 = $login2->fetch())
    {
      echo "Student ID: ". $results2['sid'].'<br><br>';
      echo "Health Condition: ". $results2['health_condition'].'<br><br>';
      echo "Details: ". $results2['details'].'<br><br><br><br>';
    }
  }
}

//function for parents to view their children's financial information.
function viewFinancial()
{
  //getting parent username from login page via session
  // session_start();

  $username = $_SESSION['username'];

  //sql query to get student id based on parent login username
  $sql = "SELECT studentid FROM parents WHERE username = '$username'";

  $login = new Connect;

  $run = $login->query($sql);

  while ($results = $login->fetch())
  {
    // save result in variable.
    $id = $results['studentid'];

    $sql2 = "SELECT * FROM financial WHERE sid = '$id'";
    $sql3 = "SELECT SUM(fees_arrears) as totalArrears FROM financial WHERE sid= '$id'";

    $login2 = new Connect;

    $run2 = $login2->query($sql2);

    echo "<h3> Financial Information / Bills and Fees </h3>"."<br>";
    echo "<table>";
    echo "<tr><th>Student ID</th><th>Bill</th><th>Details</th><th>Amount Paid</th><th>Amount Outstanding/Arrears</th><th>Date Time</th></tr>";

    while ($results2 = $login2->fetch())
    {
      echo "<tr>";
      echo "<td>".$results2['sid']."</td>";
      echo "<td>".$results2['bill']."</td>";
      echo "<td>".$results2['details']."</td>";
      echo "<td>".$results2['amount_paid']."</td>";
      echo "<td>".$results2['fees_arrears']."</td>";
      echo "<td>".$results2['date']."</td>";
      echo "</tr>";
    }

    echo "<table>";

    $login3 = new Connect;
    $run3 = $login3->query($sql3);
    $ans = $login3->fetch();
    echo "<br>";
    echo "TOTAL ARREARS = GHS " .$ans['totalArrears'];

  }
}

//function for parents to see their children's personal Information
function viewPersonal()
{
  //getting parent username from login page via session
  // session_start();

  $username = $_SESSION['username'];

  //sql query to get student id based on parent login username
  $sql = "SELECT studentid FROM parents WHERE username = '$username'";

  $login = new Connect;

  $run = $login->query($sql);

  while ($results = $login->fetch())
  {
    // save result in variable.
    $id = $results['studentid'];

    $sql2 = "SELECT * FROM student WHERE id = '$id'";

    $login2 = new Connect;

    $run2 = $login2->query($sql2);

    $results2 = $login2->fetch();

    if ($results2)
    {
      echo "<h3> Personal Information / Biodata </h3>"."<br>";
      echo $results2['firstname']."'s'" . " personal information:". '<br><br>';
      echo "ID: ". $results2['id']. '<br><br>';
      echo "First Name: ". $results2['firstname']. '<br><br>';
      if ($results2['middlename'] != "")
      {
        echo "Middle Name: ". $results2['middlename']. '<br><br>';
      }
      echo "Last Name: ". $results2['lastname']. '<br><br>';
      echo "Date of Birth: ". $results2['dateofbirth']. '<br><br>';
      echo "Gender: ". $results2['gender']. '<br><br>';
      echo "Postal Address: ". $results2['postaladdress']. '<br><br>';
      echo "First Parent's Name: ". $results2['parent1name']. '<br><br>';
      echo "First Parent's Number: ". $results2['parent1number']. '<br><br>';
      echo "Second Parent's Name: ". $results2['parent2name']. '<br><br>';
      echo "Second Parent's Telephone Number: ". $results2['parent2number']. '<br><br>';
      echo "Email address: ". $results2['contactemail'];
    }
  }
}


 ?>
