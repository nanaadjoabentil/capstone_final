<?php
require_once('../../database/connect.php');

if (isset($_POST['adminlogin']))
{
  adminvalidateLogin();
}
else if (isset($_POST['enterCondition']))
{
  enterCondition();
}
else if (isset($_POST['registerStudent']))
{
  registerStudent();
}
else if (isset($_POST['addInventory']))
{
  addInventory();
}
else if (isset($_POST['searchPersonal']))
{
  $id = $_POST['id'];
  viewStudentPersonal($id);
}
else if (isset($_POST['searchHealth']))
{
  $id = $_POST['id'];
  viewStudentHealth($id);
}
else if(isset($_POST['studentFinancial']))
{
  addFinancial();
}
elseif (isset($_POST['searchFinancial']))
{
  $id = $_POST['id'];
  viewStudentFinancial($id);
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


//function to fetch student information to be viewed
function viewStudentPersonal($id)
{
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
  echo "Age: ". $results['age']. '<br><br>';
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

//function to view student health Information
function viewStudentHealth($id)
{
  $sql = "SELECT * FROM health_conditions WHERE sid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);

  $results = $login->fetch();

  if ($results)
  {
    $sql2 = "SELECT firstname, lastname FROM student WHERE id = '$id'";
    $ans = $login->query($sql2);
    $res = $login->fetch();

    echo $res['firstname'] . " " . $res['lastname'] . "'s health information: " . '<br><br>';

//loop through and print all results with the specified ID
    }
    foreach ($results as $key => $value)
    {
      echo $key['cid'].'<br><br>';
      echo $key['sid'].'<br><br>';
      echo $key['health_condition'].'<br><br>';
      echo $key['details'].'<br><br><br><br>';
    }
  }


//function to add inventory Item
function addInventory()
{
  $item_name = $_POST['item_name'];
  $item_type = $_POST['type'];
  $number = $_POST['number'];
  $other_type = $_POST['other'];

  if ($item_type == "other")
  {
    $sql = "INSERT INTO inventory(item_name,item_type,num_in_stock) VALUES ('$item_name','$other_type','$number')";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
      echo $number . " ". $item_name. "(s) Successfully Added to Inventory Database";
    }
    else
    {
      echo "Error Occurred. Could not Add ". $number . " " . $item_name . "(s) to Database. Try Again";
    }
  }
  else
  {
    $sql = "INSERT INTO inventory(item_name,item_type,num_in_stock) VALUES ('$item_name','$item_type','$number')";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
      echo $number . " ". $item_name. "(s) Successfully Added to Inventory Database";
    }
    else
    {
      echo "Error Occurred. Could not Add ". $number . " " . $item_name . "(s) to Database. Try Again";
    }
  }
}

//function to view inventoru Items
function viewInventory()
{
  $sql = "SELECT * FROM inventory";

  $login = new Connect;

  $run = $login->query($sql);
  $results = $login->fetch();

  echo "<table>";
  echo "<tr><th>ID</th><th>Item Name</th><th>Item Type</th><th>Number in Stock</th></tr>";

  for ($i=0; $i < count($results); $i++) {
    echo "<tr>";
    echo "<td>".$results['id']."</td>";
    echo "<td>".$results['item_name']."</td>";
    echo "<td>".$results['item_type']."</td>";
    echo "<td>".$results['num_in_stock']."</td>";
    echo "</tr>";
  }
//   foreach($results as $row)
//   {
//     echo "<tr>";
//     echo "<td>".$row['id']."</td>";
//     echo "<td>".$row['item_name']."</td>";
//     echo "<td>".$row['item_type']."</td>";
//     echo "<td>".$row['num_in_stock']."</td>";
//     echo "</tr>";
// }
echo "</table>";

}

//function to add financial information to a student's profile
function addFinancial()
{
  $id = $_POST['id'];
  $fees = $_POST['fees'];
  $details = $_POST['details'];
  $paid = $_POST['paid'];
  $arrears = $fees - $paid;

  $sql = "INSERT INTO financial(sid,bill,details,amount_paid,fees_arrears) VALUES ('$id','$fees','$details','$paid','$arrears')";

  $login = new Connect;

  $run = $login->query($sql);

  if ($run)
  {
    echo "Financial Information for Student ID ". $id. " successfully entered.";
  }
  else
  {
    echo "Could not update financial information for Student ID number ".$id;
  }
}

//function to view student financial information
function viewStudentFinancial($id)
{
  $sql = "SELECT * FROM financial WHERE sid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);
  $results = $login->fetch();

  echo "<table>";
  echo "<tr><th>Record ID</th><th>Student ID</th><th>Bill</th><th>Details</th><th>Amount Paid</th><th>Amount Outstanding/Arrears</th></tr>";

  foreach ($results as $key => $value)
  {
    echo "<tr>";
    echo "<td>".$value['fid']."</td>";
    echo "<td>".$value['sid']."<td>";
    echo "<td>".$value['bill']."</td>";
    echo "<td>".$value['details']."</td>";
    echo "<td>".$value['amount_paid']."</td>";
    echo "<td>".$value['fees_arrears']."<td>";
    echo "</tr>";
  }
  echo "<table>";
}

//function to search inventory
function searchInventory()
{
  $searchitem = $_POST['searchitem'];

  $sql = "SELECT * FROM inventory WHERE item_name = '$searchitem'";

  $login = new Connect;

  $run = $login->query($sql);
  $results = $login->fetch();

  for ($i=0; $i <count($results) ; $i++)
  {
    echo $results['id'];
    echo $results['item_name'];
    echo $results['item_type'];
    echo $results['num_in_stock'];
    echo $results['date_recorded'];
  }
}

?>
