<?php include 'dbconnection.php';
?>

<?php include 'navigation.html';
?>

<?php
//query for site contacts
$sqlsitecontact = 'SELECT Site_Name, Site_PhoneNo, Site_Email, Client_Company, Client_POC, Client_JobTitle, Client_PhoneNo, Client_Email
FROM Site
JOIN Shift on Site.Site_ID = Shift.Site_ID
JOIN Assignment on Shift.Shift_ID = Assignment.Shift_ID
JOIN Employee on Assignment.Employee_ID = Employee.Employee_ID
JOIN Client on Site.Client_ID = Client.Client_ID
WHERE Employee.Employee_ID = "'.$empID.'" AND Shift_End >= (CURDATE() - INTERVAL 6 MONTH)
GROUP BY Site.Site_ID
ORDER BY Site_Name';

$querysitecontact = mysqli_query($conn, $sqlsitecontact);

if (!$querysitecontact) {
 die ('SQL Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Main Page -->

      <h1>Site Contacts</h1>
      <hr>
      <p>Below is contact information for the sites you work, or have worked at in the last 6 months. For all urgent matter please contact our Head Office.
     </p>
    <!-- /.container-fluid-->


                    <div class="col-lg-12">
                    </div>
                    <!-- /.col-lg-12 -->

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-sitecontacts">
                                    <thead>
                                        <tr>
                                            <th>Site Name</th>
                                            <th>Site Phone No.</th>
                                            <th>Site Email</th>
                                            <th>Client</th>
                                            <th>Client Point of Contact</th>
                                            <th>Job Title</th>
                                            <th>Client Phone No.</th>
                                            <th>Client Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      while ($row = mysqli_fetch_array($querysitecontact))
                                        {
                                          echo '<tr class="gradeA">
                                          <td>'.$row['Site_Name'].'</td>
                                          <td>'.$row['Site_PhoneNo'].'</td>
                                          <td>'.$row['Site_Email'].'</td>
                                          <td>'.$row['Client_Company'].'</td>
                                          <td>'.$row['Client_POC'].'</td>
                                          <td>'.$row['Client_JobTitle'].'</td>
                                          <td>'.$row['Client_PhoneNo'].'</td>
                                          <td>'.$row['Client_Email'].'</td>
                                          </tr>';
                                  }?>

                                        </tr>
                                    </tbody>
                                  </table>
                                  <!-- /.table-responsive -->
                              </div>
                              <!-- /.panel-body -->
                          </div>
                          <!-- /.panel -->
                      </div>
                      <!-- /.col-lg-12 -->
                  </div>


    <!-- DataTables JavaScript -->
  <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
$(document).ready(function() {
    $('#dataTables-sitecontacts').DataTable({
        responsive: true
    });
});
</script>

</body>

</html>
