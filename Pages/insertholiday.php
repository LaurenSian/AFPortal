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

//if(isset($_POST['confirmation'])){
//$sqlupdate = "UPDATE Assignment SET Assignment_Confirmed='$_POST[confirmation]' WHERE Assignment.Employee_ID='$_POST[employee_id]' AND Assignment.Shift_ID ='$_POST[shift_id]'";

//if(mysqli_query($conn, $sqlupdate)){
// header("refresh:0; url='shift.php'");
//} else {
// echo "Not Updated";
//}
//};
$empID = "AF001";

$insertsql = 'INSERT INTO Holiday (Employee_ID, Holiday_DateofRequest, Holiday_StartDate, Holiday_EndDate, Holiday_NoDays, Holiday_Reason, Holiday_Status)
       VALUES ("'.$empID.'", now(), ?, ?, ?, ?, "pending")';

$stmt = mysqli_prepare($conn, $insertsql);

$stmt->bind_param("ssis", $_POST['holstart'], $_POST['holend'], $_POST['nodays'], $_POST['reason']);

$stmt->execute();

if (count($_POST)>0) echo '<div id="form-submit-alert"><h1>Holiday form submitted!</h1></div>';

header("refresh:2; url='holidayinsert.php'");

?>
