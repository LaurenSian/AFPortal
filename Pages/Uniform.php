<?php include 'dbconnection.php';
?>

<?php include 'navigation.html';
?>

<!DOCTYPE html>
<html lang="en">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Main Page -->

      <h1>Uniform & Items</h1>
      <hr>
      <p>Here you will find all your currently loaned items and uniform.</p>
    <!-- /.container-fluid-->


    <div id="wrapper">

                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                        <!-- /.col-lg-12 -->
                      </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                              <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Item Size</th>
                                            <th>Issue Date</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                      while ($row = mysqli_fetch_array($queryitem))
                                        {
                                          echo '<tr class="gradeA">
                                          <td>'.$row['Item_Name'].'</td>
                                          <td>'.$row['Item_Size'].'</td>
                                          <td>'.$row['Date'].'</td>
                                          <td>'.$row['Item_Description'].'</td>
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
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

</body>

</html>
