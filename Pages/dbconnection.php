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

//query for actual shifts page

$sqlshiftcurrent = 'SELECT e.Employee_ID, Shift.Shift_ID, DATE_FORMAT(CONVERT(Shift_Start, DATE), "%a %e-%b-%y") AS Shift_StartDate, DATE_FORMAT(CONVERT(Shift_Start, TIME), "%H:%i") AS Shift_StartTime, DATE_FORMAT(CONVERT(Shift_End, TIME), "%H:%i") AS Shift_EndTime, Site_Name, Shift_Hours, CONCAT("£", Shift_Payrate) AS Shift_Payrate, Assignment_Confirmed, Site_Address, Site_City, Site_Postcode
FROM Site
JOIN Shift on Site.Site_ID = Shift.Site_ID
JOIN Assignment on Shift.Shift_ID = Assignment.Shift_ID
JOIN Employee e on Assignment.Employee_ID = e.Employee_ID
WHERE e.Employee_ID = "AF002" AND Shift_End >= NOW()
ORDER BY Shift_Start desc';

$queryshiftcurrent = mysqli_query($conn, $sqlshiftcurrent);

if (!$queryshiftcurrent) {
 die ('SQL Error: ' . mysqli_error($conn));
}

//query for past shifts

$sqlshiftpast = 'SELECT DATE_FORMAT(CONVERT(Shift_Start, DATE), "%a %e-%b-%y") AS Shift_StartDate, DATE_FORMAT(CONVERT(Shift_Start, TIME), "%H:%i") AS Shift_StartTime, DATE_FORMAT(CONVERT(Shift_End, TIME), "%H:%i") AS Shift_EndTime, Site_Name, Shift_Hours, CONCAT("£", Shift_Payrate) AS Shift_Payrate, Site_Address, Site_City, Site_Postcode
FROM Site
JOIN Shift on Site.Site_ID = Shift.Site_ID
JOIN Assignment on Shift.Shift_ID = Assignment.Shift_ID
JOIN Employee on Assignment.Employee_ID = Employee.Employee_ID
WHERE Employee.Employee_ID = "AF002" AND Shift_End < NOW()
ORDER BY Shift_Start desc';

$queryshiftpast = mysqli_query($conn, $sqlshiftpast);

if (!$queryshiftpast) {
 die ('SQL Error: ' . mysqli_error($conn));
}



//query for testing shifts under indexphp
 $sqlshift = 'SELECT Employee_ID, Employee_fName, Employee_lName FROM Employee';

 $queryshift = mysqli_query($conn, $sqlshift);

 if (!$queryshift) {
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
$sqllicence = 'SELECT Licence_No, Licence_Type, Licence_Expiry, (CASE
WHEN Licence_Expiry > (CURDATE() + INTERVAL 2 MONTH) THEN "Licence is current"
WHEN Licence_Expiry BETWEEN CURDATE() AND (CURDATE() + INTERVAL 2 MONTH) THEN "Licence expiring soon"
WHEN Licence_Expiry < CURDATE() THEN "Licence expired"
ELSE "No licence" END) AS Renew_Licence
FROM SIALicence s
JOIN Employee e on s.Employee_ID = e.Employee_ID
WHERE s.Employee_ID = "AF001"';

$querylicence = mysqli_query($conn, $sqllicence);

if (!$querylicence) {
 die ('SQL Error: ' . mysqli_error($conn));
}
 ?>
