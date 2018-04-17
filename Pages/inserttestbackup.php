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

<!--  test input box
         <form method="post">
         <select class="form-control input-sm" name="confirmation" id="confirmation">
          <option value="accepted">Accepted</option>
          <option value="rejected">Rejected</option>
          <option value="pending" selected>Pending</option>
       </select>
       <input type="submit" name="update" value="Update">
       </form>
-->


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
                                          <th>shift id
                                          </th>
                                          <th>Start Date</th>
                                          <th>Start</th>
                                          <th>Finish</th>
                                          <th>Site Name</th>
                                          <th>Hours</th>
                                          <th>Hourly Payrate</th>
                                          <th>Confirmation</th>
                                          <th>Address</th>
                                          <th>City</th>
                                          <th>Postcode</th>
                                          <th>
                                            test
                                          </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($queryshiftcurrent))
                                        {  echo '<tr class="gradeX">
                                          <td>'.$row['Shift_ID'].'</td>
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
                                          <td><form method="post">
                                          <select class="form-control input-sm" name="confirmation" id="confirmation">
                                           <option value="accepted">Accepted</option>
                                           <option value="rejected">Rejected</option>
                                           <option value="pending" selected>Pending</option>
                                        </select>
                                        <input type="submit" name="Update" id="Update" value="Update">
                                        </form></td>
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

                <?php
                     if(isset($_POST['Update'])){

                       $confirmvalue = $_POST['confirmation'];

                      // mysql query to update data
                      $sqlsubmit = "UPDATE Assignment SET Assignment_Confirmed = '$confirmvalue' WHERE Employee_ID = 'AF002' AND Shift_ID = 9";

                      $querysubmit = mysqli_query($conn, $sqlsubmit);

                        if (!$querysubmit) {
                       die ('SQL Error: ' . mysqli_error($conn));
                     }}
                ?>
</body>

</html>
