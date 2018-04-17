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

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-currentshift">
                                    <thead>
                                        <tr>
                                          <th>Start</th>
                                          <th>Finish</th>
                                          <th>Site Name</th>
                                          <th>Confirmation</th>
                                          <th>test</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($queryshiftcurrent))
                                        {
                                           echo "<form action='update.php' method=post>";
                                           echo "<input type=hidden name=shift_id value='".$row['Shift_ID']."'>";
                                           echo "<input type=hidden name=employee_id value='".$row['Employee_ID']."'>";
                                           echo "<tr>";
                                           echo "<td>".$row['Shift_StartTime']."</td>";
                                           echo "<td>".$row['Shift_EndTime']."</td>";
                                           echo "<td>".$row['Site_Name']."</td>";
                                           echo "<td>".$row['Assignment_Confirmed']."</td>";
                                           echo "<td><select class='form-control input-sm' name='confirmation' id='confirmation'>
                                           <option value='Pending'>Pending</option>
                                           <option value='Accepted'>Accepted</option>
                                           <option value='Rejected'>Rejected</option>
                                           </select>
                                           <input type='submit' value:'update' name:'submit'/>
                                           </tr>
                                           </form>";
                                  }?>

                                    </tbody>
                                    </table>
</div>
</div>
</div>



</body>
</html>
