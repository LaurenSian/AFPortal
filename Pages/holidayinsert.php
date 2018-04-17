<?php include 'dbconnection.php';
?>

<?php include 'navigation.html';
?>

<!DOCTYPE html>
<html lang="en">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Main Page -->
      <h1>Holiday</h1>
      <hr>
      <p>View the status of your upcoming holiday as well as previous holiday taken. All dates are inclusive.
      <br/> All holiday requests must be made 1 month in advance.</p>
    <!-- /.container-fluid-->

<div id="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Your Upcoming Holiday</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->

                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-upcomingholiday">
                                    <thead>
                                        <tr>
                                          <th>Leave Start Date</th>
                                          <th>Leave End Date</th>
                                          <th>No. Days</th>
                                          <th>Reason for leave</th>
                                          <th>Holiday Status</th>
                                          <th>Authorised By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($queryupcomingholiday))
                                        {
                                          echo '
                                          <td>'.$row['Holiday_Start'].'</td>
                                          <td>'.$row['Holiday_EndDate'].'</td>
                                          <td>'.$row['Holiday_NoDays'].'</td>
                                          <td>'.$row['Holiday_Reason'].'</td>
                                          <td>'.$row['Holiday_Status'].'</td>
                                          <td>'.$row['Auth_ByName'].'</td>
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



<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Request Holiday</h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
              <form method="POST" action="insertholiday.php">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-holidayreq">
                    <thead>
                        <tr>
                            <th>Leave Start Date</th>
                            <th>Leave End Date</th>
                            <th>No. Days</th>
                            <th>Reason for leave</th>
                        </tr>
                    </thead>
                    <tbody>
                          <td><input class='form-control input-sm' type="datetime-local" name=holstart></td>
                          <td><input class='form-control input-sm' type="datetime-local" name=holend></td>
                          <td><input class='form-control input-sm' type="number" name=nodays></td>
                          <td><input class='form-control input-sm' type="text" name=holend></td>
                          </tr>


                                                          </tbody>
                                                          </table>
                                                            <input class='btn btn-primary' type="submit" value="Submit Request"  />
                                                          <!-- /.table-responsive -->
                                                      </div>
                                                      <!-- /.panel-body -->
                                                  </div>
                                                  <!-- /.panel -->
                                              </div>
                                              <!-- /.col-lg-12 -->
                                          </div>
                          </div>





                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Holiday Taken / Past Leave</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->


                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pastholiday">
                                    <thead>
                                        <tr>
                                            <th>Leave Start Date</th>
                                            <th>Leave End Date</th>
                                            <th>No. Days</th>
                                            <th>Reason for leave</th>
                                            <th>Holiday Status</th>
                                            <th>Authorised By Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($querypastholiday))
                                        {
                                          echo '
                                          <td>'.$row['Holiday_Start'].'</td>
                                          <td>'.$row['Holiday_EndDate'].'</td>
                                          <td>'.$row['Holiday_NoDays'].'</td>
                                          <td>'.$row['Holiday_Reason'].'</td>
                                          <td>'.$row['Holiday_Status'].'</td>
                                          <td>'.$row['Auth_ByName'].'</td>
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
    $('#dataTables-upcomingholiday').DataTable({
        responsive: true,
        "bSort": false
    });
});
</script>

<script>
$(document).ready(function() {
$('#dataTables-holidayreq').DataTable({
    responsive: true,
    "bSort": false,
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false
});
});
</script>

<script>
$(document).ready(function() {
$('#dataTables-pastholiday').DataTable({
    responsive: true,
    "bSort": false
});
});
</script>



</body>

</html>
