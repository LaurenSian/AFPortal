<?php include 'dbconnection.php';
?>

<?php include 'navigation.html';
?>

<?php include 'update.php';
?>

<!DOCTYPE html>
<html lang="en">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Main Page -->
      <h1>Shifts</h1>
      <hr>
      <p>Here you will find your upcoming scheduled shifts, as well as further down there is your past shifts.
      <br/>
      Please confirm the shifts you are able to work using the drop down - this information will then be recieved by the control room. If you have any doubts about how to use this page please <a href="headoffice.php">contact us</a>.
    </br/></p>

<div id="wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Scheduled Shifts</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                  </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-currentshift">
                                    <thead>
                                        <tr>
                                          <th>Start Date</th>
                                          <th>Start</th>
                                          <th>Finish</th>
                                          <th>Site Name</th>
                                          <th>Hours</th>
                                          <th>Hourly Payrate</th>
                                          <th>Status</th>
                                          <th>Confirmation</th>
                                          <th>Address</th>
                                          <th>City</th>
                                          <th>Postcode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($queryshiftcurrent))
                                        {
                                           echo "<tr><td>".$row['Shift_StartDate']."</td>";
                                           echo "<td>".$row['Shift_StartTime']."</td>";
                                           echo "<td>".$row['Shift_EndTime']."</td>";
                                           echo "<td>".$row['Site_Name']."</td>";
                                           echo "<td>".$row['Shift_Hours']."</td>";
                                           echo "<td>".$row['Shift_Payrate']."</td>";
                                           echo "<td>".$row['Assignment_Confirmed']."</td>";
                                           echo "<td><form method='post' action='update.php'>
                                           <input type=hidden name=shift_id value='".$row['Shift_ID']."'>
                                           <input type=hidden name=employee_id value='".$row['Employee_ID']."'>
                                           <select class='form-control input-sm' name='confirmation' id='confirmation'>
                                           <option value=''>Select</option>
                                           <option value='Accepted'>Accept</option>
                                           <option value='Declined'>Decline</option>
                                           </select>
                                           <input class='btn btn-primary' type='submit' value:'update.php' name:'submit'/></form></td>";
                                            echo "<td>".$row['Site_Address']."</td>";
                                            echo "<td>".$row['Site_City']."</td>";
                                            echo "<td>".$row['Site_Postcode']."</td>";
                                            echo "</tr>";
                                  }?>

                                    </tbody>
                                    </table>
</div>
</div>
</div>
</div>

<div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Past Shifts</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->


                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pastshift">
                                <thead>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Site Name</th>
                                        <th>Hours</th>
                                        <th>Hourly Payrate</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Postcode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($queryshiftpast))
                                    {
                                      echo '
                                      <td>'.$row['Shift_StartDate'].'</td>
                                      <td>'.$row['Shift_StartTime'].'</td>
                                      <td>'.$row['Shift_EndTime'].'</td>
                                      <td>'.$row['Site_Name'].'</td>
                                      <td>'.$row['Shift_Hours'].'</td>
                                      <td>'.$row['Shift_Payrate'].'</td>
                                      <td>'.$row['Site_Address'].'</td>
                                      <td>'.$row['Site_City'].'</td>
                                      <td>'.$row['Site_Postcode'].'</td>
                                      </tr>';
                              }?>

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
</div>




<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>


<script>

$(document).ready(function() {
  $('#dataTables-currentshift').DataTable({
      responsive: true,
      "bSort": false
  });
});
</script>

<script>
$(document).ready(function() {
$('#dataTables-pastshift').DataTable({
    responsive: true,
    "bSort": false
});
});
</script>

</body>

</html>
