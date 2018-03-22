<?php
// including the database
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
else if(isset($_POST['studentFinancial']))
{
  addFinancial();
}
else if(isset($_POST['withdraw']))
{
  withdrawInventory();
}
else if(isset($_POST['registerTeacher']))
{
  checkUsernameT();
}
else if (isset($_POST['updateStaff']))
{
  updateStaff();
}

//------------------------LOGIN FUNCTIONS--------------------------------------------------------

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

      $sql = "SELECT * FROM login WHERE username = '$username' && password = '$password'";

      //create new instance of database connection class

      $login = new Connect;

      //execute query
      $run = $login->query($sql);
      $results = $login->fetch();

      if ($results)
      {
        //echo "Successful Login as Admin";
        header("location:tindex.php");
      }
      else
      {
        echo "Error occurred. Please try again.";
      }
}

//-----------------------------STUDENT PERSONAL FUNCTIONS----------------------------------------------------

//function for registering students
function registerStudent()
{
  //get form fields from webpage
  $id = rand(10,10000);
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $gender = $_POST['group1'];
  $pobox = $_POST['pobox'];
  $parent1name = $_POST['parent1name'];
  $parent1num = $_POST['parent1num'];
  $parent2name = $_POST['parent2name'];
  $parent2num = $_POST['parent2num'];
  $email = $_POST['email'];

  // $passwordhash = password_hash($pwd, PASSWORD_DEFAULT);

  $sql = "INSERT INTO student(id,firstname,middlename,lastname,dateofbirth,gender,postaladdress,
    parent1name,parent1number,parent2name,parent2number,contactemail) VALUES ('$id','$firstname','$middlename',
      '$lastname','$dob','$gender','$pobox','$parent1name','$parent1num','$parent2name','$parent2num','$email')";

// echo $sql;
  //new instance of database class
  $register = new Connect;

  //execute query
  $run = $register->query($sql);
// var_dump($run);

  if($run)
  {
    echo $firstname." ". $lastname."'s' student ID is". " ".$id;
    //create popup window to show child's id.
  }
  else
  {
    echo "Error occurred during registration";
  }
}

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


//function to delete student record from Database
function deleteStudent()
{
  $id = $_POST['id'];
  $sql = "DELETE FROM student WHERE id = '$id'";

  $login = new Connect;

  $run = $login->query($sql);

  if ($run)
  {
    echo "Student Record with ID ". $id. " successfully removed from database.";
  }
  else
  {
    echo "Unable to remove student record with ID ". $id. ".";
  }
}

//function to update a student's personal Information
function updateStudentPersonal()
{
  $id = $_POST['id'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $gender = $_POST['group1'];
  $pobox = $_POST['pobox'];
  $parent1name = $_POST['parent1name'];
  $parent1num = $_POST['parent1num'];
  $parent2name = $_POST['parent2name'];
  $parent2num = $_POST['parent2num'];
  $email = $_POST['email'];

  $sql = "SELECT * FROM student WHERE id = '$id'";

  $login = new Connect;

  $run = $login->query($sql);

  while ($results = $login->fetch())
  {
    $sql1 = "UPDATE student SET firstname = '$firstname' WHERE id = '$id'";
    $sql2 = "UPDATE student SET middlename = '$middlename' WHERE id = '$id'";
    $sql3 = "UPDATE student SET lastname = '$lastname' WHERE id = '$id'";
    $sql4 = "UPDATE student SET dateofbirth = '$dob' WHERE id = '$id'";
    $sql5 = "UPDATE student SET gender = '$gender' WHERE id = '$id'";
    $sql6 = "UPDATE student SET postaladdress = '$pobox' WHERE id = '$id'";
    $sql7 = "UPDATE student SET parent1name = '$parent1name' WHERE id = '$id'";
    $sql8 = "UPDATE student SET parent1number = '$parent1num' WHERE id = '$id'";
    $sql9 = "UPDATE student SET parent2number = '$parent2num' WHERE id = '$id'";
    $sql10 = "UPDATE student SET parent2name = '$parent2name' WHERE id = '$id'";
    $sql11 = "UPDATE student SET contactemail = '$email' WHERE id = '$id'";

    $run1 = $login->query($sql1);
    $run2 = $login->query($sql2);
    $run3 = $login->query($sql3);
    $run4 = $login->query($sql4);
    $run5 = $login->query($sql5);
    $run6 = $login->query($sql6);
    $run7 = $login->query($sql7);
    $run8 = $login->query($sql8);
    $run9 = $login->query($sql9);
    $run10 = $login->query($sql10);
    $run11 = $login->query($sql11);

    if ($run1 && $run2 && $run3 && $run4 && $run5 && $run6 && $run7 && $run8 && $run9 && $run10 && $run11)
    {
      echo "Update Successful <br><br><br>";
      echo "Old" . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'. "New". "<br><br>";
      echo $results['firstname'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $firstname. "<br><br>";
      echo $results['middlename'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $middlename. "<br><br>";
      echo $results['lastname'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $lastname. "<br><br>";
      echo $results['dateofbirth'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $dob. "<br><br>";
      echo $results['gender'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $gender. "<br><br>";
      echo $results['postaladdress'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $pobox. "<br><br>";
      echo $results['parent1name'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $parent1name. "<br><br>";
      echo $results['parent1number'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $parent1num. "<br><br>";
      echo $results['parent2name'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $parent2name. "<br><br>";
      echo $results['parent2number'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $parent2num. "<br><br>";
      echo $results['contactemail'] . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $email;
    }
    else
    {
      echo "Update failed.";
    }
  }




}

//---------------------------------HEALTH CONDITIONS-----------------------------------------------

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
        echo $results['cid'].'<br><br>';
        echo "Student ID: ". $results['sid'].'<br><br>';
        echo "Health Condition: ". $results['health_condition'].'<br><br>';
        echo "Details: ". $results['details'].'<br><br><br><br>';
      }
}


//function to view all health information from the database
function viewAllHealth()
{
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

//function to delete a health record
function deleteHealthRecord()
{
  $id = $_POST['id'];
  $condition = $_POST['condition'];

  $sql = "DELETE FROM health_conditions WHERE sid = '$id' AND health_condition = '$condition'";

  $login = new Connect;

  $run = $login->query($sql);

  if ($run)
  {
    echo "Deletion successful.";
  }
  else
  {
    echo "Problem occurred while deleting.";
  }
}

//----------------------------------------INVENTORY INFORMATION---------------------------------------------------------------------
//function to add inventory Item
function addInventory()
{
  $item_name = $_POST['item_name'];
  $item_type = $_POST['type'];
  $number = $_POST['number'];
  $other_type = $_POST['other'];
  $group = $_POST['grouping'];
  $other_group = $_POST['othergroup'];
  $total = $_POST['total'];

  if ($item_type == "other" && $group == "other")
  {
    $sql = "INSERT INTO inventory(item_name,item_type,grouping,num_in_stock,total) VALUES ('$item_name','$other_type','$other_group','$number','$total')";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
      echo $number . " " . $other_group . " of ". $item_name. " successfully added to Inventory Database";
    }
    else
    {
      echo "Error Occurred. Could not Add ". $number . " " . $other_group . " of ". $item_name. " to Database. Try Again";
    }
  }
  else if ($item_type == "other" && $group != "other")
  {
    $sql = "INSERT INTO inventory(item_name,item_type,grouping,num_in_stock,total) VALUES ('$item_name','$other_type','$group','$number','$total')";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
      echo $number . " " . $other_group . " of ". $item_name. " successfully added to Inventory Database";
    }
    else
    {
     echo "Error Occurred. Could not Add ". $number . " " . $other_group . " of ". $item_name. " to Database. Try Again";
    }
  }
  else if ($item_type != "other" && $group == "other")
  {
    $sql = "INSERT INTO inventory(item_name,item_type,grouping,num_in_stock,total) VALUES ('$item_name','$item_type','$other_group','$number','$total')";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
     echo $number . " " . $other_group . " of ". $item_name. " successfully added to Inventory Database";
    }
    else
    {
      echo "Error Occurred. Could not Add ". $number . " " . $other_group . " of ". $item_name. " to Database. Try Again";
    }
  }
  else
  {
    $sql = "INSERT INTO inventory(item_name,item_type,grouping,num_in_stock,total) VALUES ('$item_name','$item_type','$group','$number','$total')";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
      echo $number . " " . $other_group . " of ". $item_name. " successfully added to Inventory Database";
    }
    else
    {
    echo "Error Occurred. Could not Add ". $number . " " . $other_group . " of ". $item_name. " to Database. Try Again";
    }
  }
}

//function to view inventory Items
function viewInventory()
{
  $sql = "SELECT * FROM inventory";

  $login = new Connect;

  $run = $login->query($sql);
  // $results = $login->fetch();

echo "<br><br>";
  echo "<table>";
  echo "<tr><th>ID</th><th>Item Name</th><th>Item Type</th><th>Grouping</th><th>Number in Stock</th><th>Total</th><th>Date and Time Recorded</th></tr>";

while ($results = $login->fetch())
{
  echo "<tr>";
  echo "<td>".$results['id']."</td>";
  echo "<td>".$results['item_name']."</td>";
  echo "<td>".$results['item_type']."</td>";
  echo "<td>".$results['grouping']."</td>";
  echo "<td>".$results['num_in_stock']."</td>";
  echo "<td>".$results['total']."</td>";
  echo "<td>".$results['date_recorded']."</td>";
  echo "</tr>";
}
echo "</table>";
}

//function to search inventory
function searchInventory()
{
  $searchitem = $_POST['searchitem'];
  $sql = "SELECT * FROM inventory WHERE item_type LIKE '%$searchitem%'";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<br>";
  echo "<table>";
  echo "<tr><th>ID</th><th>Item Name</th><th>Item Type</th><th>Grouping</th><th>Number in Stock</th><th>Total</th><th>Date and Time Recorded</th></tr>";

  while ($results = $login->fetch())
  {
    echo "<tr>";
    echo "<td>".$results['id']."</td>";
    echo "<td>".$results['item_name']."</td>";
    echo "<td>".$results['item_type']."</td>";
    echo "<td>".$results['grouping']."</td>";
    echo "<td>".$results['num_in_stock']."</td>";
    echo "<td>".$results['total']."</td>";
    echo "<td>".$results['date_recorded']."</td>";
    echo "</tr>";
  }
}

//function to search inventory withdrawals table
function searchWithdrawals()
{
  $searchitem = $_POST['searchitem'];

  $sql = "SELECT * FROM inventory_withdrawals WHERE item_name LIKE '%$searchitem%'";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<br>";
  echo "<table>";
  echo "<tr><th>Item Name</th><th>Number in Stock</th><th>Number Withdrawn</th><th>Withdrawn By</th><th>Date Withdrawn</th><th>Number Left</th></tr>";

  while ($results = $login->fetch())
  {
    echo "<tr>";
    echo "<td>".$results['item_name']."</td>";
    echo "<td>".$results['num_in_stock']."</td>";
    echo "<td>".$results['num_withdrawn']."</td>";
    echo "<td>".$results['withdrawn_by']."</td>";
    echo "<td>".$results['date']."</td>";
    echo "<td>".$results['num_left']."</td>";
    echo "</tr>";
  }
}

function viewTotals()
{
  $sql = "SELECT item_name, SUM(total) AS total FROM INVENTORY GROUP BY item_name";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<br>";
  echo "<table>";
  echo "<tr><th>Item Name</th><th>Total</th>";

  while ($results = $login->fetch())
  {
    echo "<tr>";
    echo "<td>".$results['item_name']."</td>";
    echo "<td>".$results['total']."</td>";
    echo "</tr>";
  }
}

function deleteInventory()
{
  $id = $_POST['id'];

    $sql = "DELETE FROM INVENTORY WHERE id = '$id'";

    $login = new Connect;

    $run = $login->query($sql);

    if ($run)
    {
      echo "Inventory item successfully deleted";
      header("location: deleteInventory.php");
    }
    else
    {
      echo "Could not delete item";
    }
  }

// function to take account of inventory withdrawals
function withdrawInventory()
{
  $name = $_POST['name'];
  $number = $_POST['number'];
  $who = $_POST['who'];

  // query to get current number of item in Database
  $sql = "SELECT SUM(total) as total FROM inventory WHERE item_name = '$name'";

  $instance = new Connect;

  $do = $instance->query($sql);
  $get = $instance->fetch();

  $current = $get['total'];
  $numleft = $current - $number;

  // insert into withdrawals table
  $sql2 = "INSERT INTO inventory_withdrawals(item_name,num_in_stock,num_withdrawn,withdrawn_by,num_left)
  VALUES ('$name','$current','$number','$who','$numleft')";

  $run = $instance->query($sql2);

  if ($run)
  {
    echo "Withdrawal Noted";
  }
  else
  {
    echo "Withdrawal could not be noted";
  }
}

function viewWithdrawals()
{
  $sql = "SELECT * FROM inventory_withdrawals";

  $instance = new Connect;

  $run = $instance->query($sql);

  echo "<br>";
  echo "<table>";
  echo "<tr><th>Item Name</th><th>Total</th><th>Withdrawn</th><th>Total Left</th><th>Withdrawn By</th><th>Date Withdrawn</th>";

  while ($results = $instance->fetch())
  {
    echo "<tr>";
    echo "<td>".$results['item_name']."</td>";
    echo "<td>".$results['num_in_stock']."</td>";
    echo "<td>".$results['num_withdrawn']."</td>";
    echo "<td>".$results['num_left']."</td>";
    echo "<td>".$results['withdrawn_by']."</td>";
    echo "<td>".$results['date']."</td>";
    echo "</tr>";
  }
}
//---------------------------------STUDENT FINANCIAL INFORMATION-------------------------------------------

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

//function to search through for a particular student in financial information
function searchFinancial()
{
  $id = $_POST['id'];
  $sql = "SELECT * FROM financial WHERE sid = '$id'";
  $sql2 = "SELECT SUM(fees_arrears) as totalArrears FROM financial WHERE sid= '$id'";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<table>";
  echo "<tr><th>Record ID</th><th>Student ID</th><th>Bill</th><th>Details</th><th>Amount Paid</th><th>Arrears</th><th>Date Time</th></tr>";

  while ($results = $login->fetch())
  {
    echo "<br>";
    echo "<tr>";
    echo "<td>".$results['fid']."</td>";
    echo "<td>".$results['sid']."</td>";
    echo "<td>".$results['bill']."</td>";
    echo "<td>".$results['details']."</td>";
    echo "<td>".$results['amount_paid']."</td>";
    echo "<td>".$results['fees_arrears']."</td>";
    echo "<td>".$results['date']."</td>";
    echo "</tr>";
  }

  echo "<table>";
  $run2 = $login->query($sql2);
  $ans = $login->fetch();
  echo "<br>";
  echo "TOTAL ARREARS = GHS " .$ans['totalArrears'];
}


//function to view all financial information from the database.
function viewAllFinancial()
{
  $sql = "SELECT * FROM financial";

  $login = new Connect;

  $run = $login->query($sql);

  echo "<table>";
  echo "<tr><th>Student ID</th><th>Bill</th><th>Details</th><th>Amount Paid</th><th>Arrears</th><th>DateTime</th></tr>";

  while ($results = $login->fetch())
  {
    // echo "<br>";
    echo "<tr>";
    // echo "<td>".$results['fid']."</td>";
    echo "<td>".$results['sid']."</td>";
    echo "<td>".$results['bill']."</td>";
    echo "<td>".$results['details']."</td>";
    echo "<td>".$results['amount_paid']."</td>";
    echo "<td>".$results['fees_arrears']."</td>";
    echo "<td>".$results['date']."</td>";
    echo "</tr>";
  }
  echo "<table>";
}

//function to delete a financial Record
function deleteFinancial()
{
  $id = $_POST['id'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $datetime = $date ." ". $time;

  $sql = "DELETE FROM financial where date = '$datetime'";

  $login = new Connect;

  $run = $login->query($sql);

  if($run)
  {
    echo "Successfully deleted";
  }
  else
  {
    echo "Could not delete";
  }
}
//-------------------------------------------------------------STAFF INFO-----------------------------------------------------------------------------------------

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
  $id = rand(10000,99999);
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
      echo "Teacher registration successful";
    }
    else
    {
      echo "Error Occurred during registration";
    }
  }
}

//function to view staff information
function searchStaff()
{
  $id = $_POST['id'];
  $sql = "SELECT staffid,username,name,number,email,nextofkin,nextofkintelephone FROM staffProfile WHERE staffid = '$id'";

  $login = new Connect;

  $run = $login->query($sql);
  $results = $login->fetch();

    echo '<br>';
    echo "Staff ID: " .$results['staffid'].'<br>';
    echo "Full Name: ". $results['name'].'<br>';
    echo "Username: " .$results['username'].'<br>';
    echo "Telephone Number: " .$results['number'].'<br>';
    echo "Email address: " .$results['email'].'<br>';
    echo "Next of Kin: " .$results['nextofkin'].'<br>';
    echo "Next of Kin's Telephone Number: " .$results['nextofkintelephone'].'<br>';
  }

//function to view all staff members
function viewAllStaff()
{
  $sql = "SELECT staffid,username,name,number,email,nextofkin,nextofkintelephone FROM staffProfile";

  $login = new Connect;

  $run = $login->query($sql);

  $results = $login->fetch();

  if($results)
  {
    echo '<Br><br><br>';
    echo "<table>";
    echo "<tr><th>Staff ID</th><th>Username</th><th>Name</th><th>Number</th><th>Email</th><th>Next of Kin</th><th>Next of Kin Contact</th></tr>";
    while ($results = $login->fetch())
    {
      echo "<tr>";
      echo "<td>".$results['staffid']."</td>";
      echo "<td>".$results['username']."</td>";
      echo "<td>".$results['name']."</td>";
      echo "<td>".$results['number']."</td>";
      echo "<td>".$results['email']."</td>";
      echo "<td>".$results['nextofkin']."</td>";
      echo "<td>".$results['nextofkintelephone']."</td>";
      echo "</tr>";
    }
    echo "</table>";
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
    header("location: deleteStaff.php");
  }
  else
  {
    echo "Uh Oh! Something went wrong.";
  }
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



if(isset($_POST['student']))
{
  dashboardstudent();
}
//function for three buttons dashboard
function dashboardstudent()
{
  echo
    '<nav>
      <ul>
      <form method="post">
        <a href="academic.php"><button id="dbutton" name="academic"><br><br>Academic Information</button></a>
        <a href="health.php"><button id="dbutton" name="health"><br><br>Health Information</button></a>
        <a href="personal.php"><button id="dbutton" name="personal"><br><br>Personal Information</button></a
        <a href="financial.php"><button id="dbutton" name="financial"><br><br>Financial Information</button></a>
        </form>
      </ul>
    </nav>';
}

if(isset($_POST['academic']))
{
  header("location: academic.php");
}

if(isset($_POST['health']))
{
  header("location: health.php");
}

if(isset($_POST['personal']))
{
  header("location: personal.php");
}

if(isset($_POST['financial']))
{
  header("location: financial.php");
}


if(isset($_POST['staff']))
{
  dashboardstaff();
}

function dashboardstaff()
{
  echo
  '<nav>
    <ul>
    <form method="post">
      <a href="addStaff.php"><button id="dbutton" name="addprofile"><br>Add New Staff Profile</button></a>
      <button id="dbutton" name="addcns">Add Staff Subjects and Classes Information</button>
      <a href="viewStaff.php"><button id="dbutton" name="viewprofile"><br>View Staff Profile</button></a>
      <a href="updateStaff.php"><button id="dbutton" name="updateprofile"><br>Update Staff Personal Information</button></a>
      <a href="../teachers/viewStaffSubjects.php"><button id="dbutton" name="viewcns">View Staff Subjects and Classes Information</button></a>
      <a href="deleteStaff.php"><button id="dbutton" name="deleteprofile"><br>Delete Staff Personal Information</button></a>
      <a href="../teachers/deleteStaffSubjects.php"><button id="dbutton" name="deletecns">Delete Staff Subjects and Classes Information</button></a>
      </form>
    </ul>
  </nav>';
}

if(isset($_POST['addcns']))
{
  header("location: ../teachers/addStaffSubjects.php");
}
if(isset($_POST['viewprofile']))
{
  header("location: viewStaff.php");
}
if(isset($_POST['updateprofile']))
{
  header("location: updateStaff.php");
}
if(isset($_POST['viewcns']))
{
  header("location: ../teachers/viewStaffSubjects.php");
}
if(isset($_POST['deleteprofile']))
{
  header("location: deleteStaff.php");
}
if(isset($_POST['deletecns']))
{
  header("location: ../teachers/deleteStaffSubjects.php");
}
if(isset($_POST['addprofile']))
{
  header("location: addStaff.php");
}




if(isset($_POST['inventory']))
{
  dashboardinventory();
}

function dashboardinventory()
{
  echo
  '<nav>
    <ul>
    <form method="post">
      <a href="addInventory.php"><button id="dbutton" name="add">Add a New Inventory Item</button></a>
      <a href="viewInventory.php"><button id="dbutton" name="view">View Inventory Items</button></a>
      <a href="viewWithdrawals.php"><button id="dbutton" name="viewwithdrawals">View Inventory Withdrawals</button></a>
      <a href="withdrawals.php"><button id="dbutton" name="withdraw">Withdraw from Inventory</button></a>
      <a href="deleteInventory.php"><button id="dbutton" name="delete">Delete Inventory Items</button></a>
      </form>
    </ul>
  </nav>';
}

if(isset($_POST['add']))
{
  header("location: addInventory.php");
}
if(isset($_POST['view']))
{
  header("location: viewInventory.php");
}
if(isset($_POST['viewwithdrawals']))
{
  header("location: viewWithdrawals.php");
}
if(isset($_POST['withdraw']))
{
  header("location: withdrawals.php");
}
if(isset($_POST['delete']))
{
  header("location: deleteInventory.php");
}




?>
