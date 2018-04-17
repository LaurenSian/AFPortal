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

  $empID = "AF001";
//  $empID = mysql_real_escape_string($empID);

//query for actual shifts page employeeid =

$sqlshiftcurrent = 'SELECT e.Employee_ID, Shift.Shift_ID, DATE_FORMAT(CONVERT(Shift_Start, DATE), "%a %e-%b-%y") AS Shift_StartDate, DATE_FORMAT(CONVERT(Shift_Start, TIME), "%H:%i") AS Shift_StartTime, DATE_FORMAT(CONVERT(Shift_End, TIME), "%H:%i") AS Shift_EndTime, Site_Name, Shift_Hours, CONCAT("£", Shift_Payrate) AS Shift_Payrate, Assignment_Confirmed, Site_Address, Site_City, Site_Postcode
FROM Site
JOIN Shift on Site.Site_ID = Shift.Site_ID
JOIN Assignment on Shift.Shift_ID = Assignment.Shift_ID
JOIN Employee e on Assignment.Employee_ID = e.Employee_ID
WHERE e.Employee_ID = "'.$empID.'" AND Shift_End >= NOW()
ORDER BY Shift_Start';

$queryshiftcurrent = mysqli_query($conn, $sqlshiftcurrent);

//while(list($Employee_ID, $Shift_ID) = mysqli_fetch_row($queryshiftcurrent))
//{echo $Employee_ID, $Shift_ID;}

if (!$queryshiftcurrent) {
 die ('SQL Error: ' . mysqli_error($conn));
}

//query for past shifts

$sqlshiftpast = 'SELECT DATE_FORMAT(CONVERT(Shift_Start, DATE), "%a %e-%b-%y") AS Shift_StartDate, DATE_FORMAT(CONVERT(Shift_Start, TIME), "%H:%i") AS Shift_StartTime, DATE_FORMAT(CONVERT(Shift_End, TIME), "%H:%i") AS Shift_EndTime, Site_Name, Shift_Hours, CONCAT("£", Shift_Payrate) AS Shift_Payrate, Site_Address, Site_City, Site_Postcode
FROM Site
JOIN Shift on Site.Site_ID = Shift.Site_ID
JOIN Assignment on Shift.Shift_ID = Assignment.Shift_ID
JOIN Employee on Assignment.Employee_ID = Employee.Employee_ID
WHERE Employee.Employee_ID = "'.$empID.'" AND Shift_End < NOW()
ORDER BY Shift_Start desc';

$queryshiftpast = mysqli_query($conn, $sqlshiftpast);

if (!$queryshiftpast) {
 die ('SQL Error: ' . mysqli_error($conn));
}

//query for booked holiday (coming up)
$sqlupcomingholiday = 'SELECT Holiday_ID, Holiday.Employee_ID, DATE_FORMAT(Holiday_StartDate, "%a %e-%b-%y %H:%i") AS Holiday_Start, DATE_FORMAT(Holiday_EndDate, "%a %e-%b-%y %H:%i") AS Holiday_EndDate, Holiday_NoDays, Holiday_Reason, Holiday_Status, Holiday_AuthorisedBy, CONCAT(Employee_fName, " ", Employee_lName) AS Auth_ByName
FROM Holiday
LEFT JOIN Employee on Holiday.Holiday_AuthorisedBy = Employee.Employee_ID
WHERE Holiday.Employee_ID = "'.$empID.'" AND Holiday_EndDate > NOW()
ORDER BY Holiday_StartDate';

 $queryupcomingholiday = mysqli_query($conn, $sqlupcomingholiday);

 if (!$queryupcomingholiday) {
  die ('SQL Error: ' . mysqli_error($conn));
 }

 //query for holiday taken (past)
 $sqlpastholiday = 'SELECT Holiday_ID, Holiday.Employee_ID, DATE_FORMAT(Holiday_StartDate, "%a %e-%b-%y %H:%i") AS Holiday_Start, DATE_FORMAT(Holiday_EndDate, "%a %e-%b-%y %H:%i") AS Holiday_EndDate, Holiday_NoDays, Holiday_Reason, Holiday_Status, Holiday_AuthorisedBy, CONCAT(Employee_fName, " ", Employee_lName) AS Auth_ByName
 FROM Holiday
 LEFT JOIN Employee on Holiday.Holiday_AuthorisedBy = Employee.Employee_ID
 WHERE Holiday.Employee_ID = "'.$empID.'" AND Holiday_EndDate <= NOW()
 ORDER BY Holiday_StartDate desc';

  $querypastholiday = mysqli_query($conn, $sqlpastholiday);

  if (!$querypastholiday) {
   die ('SQL Error: ' . mysqli_error($conn));
  }

//query for uniform/items
 $sqlitem = 'SELECT Item_Name, Item_Size, DATE_FORMAT(Inventory_IssueDate, "%D %M %Y") AS Date, Item_Description from Inventory inv
JOIN Item on Item.Item_ID = inv.Item_ID';

 $queryitem = mysqli_query($conn, $sqlitem);

 if (!$queryitem) {
  die ('SQL Error: ' . mysqli_error($conn));
 }

//query for licensing
$sqllicence = 'SELECT Licence_No, Licence_IssueDate, Licence_Type, DATE_FORMAT(Licence_Expiry, "%D %M %Y") AS Expiry,
(CASE
WHEN Licence_Expiry > (CURDATE() + INTERVAL 2 MONTH) THEN "Licence is current"
WHEN Licence_Expiry BETWEEN CURDATE() AND (CURDATE() + INTERVAL 2 MONTH) THEN "Licence expiring soon"
WHEN Licence_Expiry < CURDATE() THEN "Licence expired"
ELSE "No licence" END) AS Renew_Licence
FROM SIALicence s
JOIN Employee e on s.Employee_ID = e.Employee_ID
WHERE s.Employee_ID = "'.$empID.'"
ORDER BY Licence_IssueDate';

$querylicence = mysqli_query($conn, $sqllicence);

if (!$querylicence) {
 die ('SQL Error: ' . mysqli_error($conn));
}
 ?>
