<?php include 'dbconnection.php';
?>

<?php include 'navigation.html';
?>

<!DOCTYPE html>
<html lang="en">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Main Page -->
      <h1>Shifts</h1>
      <hr>
      <p>Here you will find your upcoming scheduled shifts, as well as further down there is your past shifts.
      <br/>
      Please confirm the shifts you are able to work - this information will then be recieved by the control room. If you have any doubts about how to use this page please <a href="headoffice.php">contact us</a>.
    </br/></p>
    <!-- /.container-fluid-->

<div id="page-wrapper">
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
                            <!-- /.panel-heading -->


                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-currentshift">
                                    <thead>
                                        <tr>
                                          <th>Start Date</th>
                                          <th>Start</th>
                                          <th>Finish</th>
                                          <th>Site Name</th>
                                          <th>Shift Hours</th>
                                          <th>Hourly Payrate</th>
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
                                          echo '<tr class="gradeX">
                                          <td>'.$row['Shift_StartDate'].'</td>
                                          <td>'.$row['Shift_StartTime'].'</td>
                                          <td>'.$row['Shift_EndTime'].'</td>
                                          <td>'.$row['Site_Name'].'</td>
                                          <td>'.$row['Shift_Hours'].'</td>
                                          <td>'.$row['Shift_Payrate'].'</td>
                                          <td>'.$row['Assignment_Confirmed'].'</td>
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

<div id="page-wrapper">
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
                                            <th>Shift Hours</th>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- DataTables JavaScript -->
  <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
$(document).ready(function() {
    $('#dataTables-currentshift').DataTable({
        responsive: true
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
