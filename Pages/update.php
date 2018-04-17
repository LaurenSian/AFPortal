<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "afstaffportal";
 $db = "AlliedStaff";

// create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
// Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

if(isset($_POST['confirmation'])){
$sqlupdate = "UPDATE Assignment SET Assignment_Confirmed='$_POST[confirmation]' WHERE Assignment.Employee_ID='$_POST[employee_id]' AND Assignment.Shift_ID ='$_POST[shift_id]'";

if(mysqli_query($conn, $sqlupdate)){
  header("refresh:0; url='shift.php'");
} else {
  echo "Not Updated";
}
};

?>
