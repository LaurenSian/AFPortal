<?php include 'dbconnection.php';
?>

<?php include 'navigation.html';
?>

<!DOCTYPE html>
<html lang="en">


<!-- Custom styles -->
<head>
<!-- Custom styles -->
<link href="../css/custom.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Main Page -->

      <h1>Licensing Information</h1>
      <hr>
      <p>Here you will find all your SIA licence details.
        <br/>If your licence is due to expire in under two months please renew your licence as soon as possible. Visit the <a href="https://www.sia.homeoffice.gov.uk/Pages/licensing-renewals.aspx">SIA Licensing Website.</a></p>
    <!-- /.container-fluid-->


    <div id="wrapper">


          <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->

                      <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Licence Number</th>
                                            <th>Licence Type</th>
                                            <th>Expiry Date</th>
                                            <th>Renew Licence?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      while ($row = mysqli_fetch_array($querylicence))
                                        {
                                          echo '<tr class="gradeA">
                                          <td>'.$row['Licence_No'].'</td>
                                          <td>'.$row['Licence_Type'].'</td>
                                          <td>'.$row['Licence_Expiry'].'</td>
                                          <td>'.$row['Renew_Licence'].'</td>
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



                                        </div>
                                        <!-- /#page-wrapper -->

                                    </div>
                                    <!-- /#wrapper -->





    <!-- DataTables JavaScript -->
  <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

</body>

</html>
