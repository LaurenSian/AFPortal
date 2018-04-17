<?php include 'dbconnection.php';
?>

<?php include 'navigation.html';
?>

<!DOCTYPE html>
<html lang="en">

<body class="fixed-nav sticky-footer bg-dark" id="page-top">


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
                                          <td>' ?>
                                          <form method="post">
                                          <select class="form-control input-sm" name="confirmation" id="confirmation">
                                           <option value="accepted">Accepted</option>
                                           <option value="rejected">Rejected</option>
                                           <option value="pending" selected>Pending</option>
                                        </select>
                                        <input type="submit" name="Update" id="Update" value="Update">
                                        </form>
                                        <?php
                                        //  $shiftid = 'Assignment.Shift_ID';

                                        //Get ID from request
                                    //  $shiftid = isset($_GET['Shift.Shift_ID']) ? (int)$_GET['Shift.Shift_ID'] : 0;
                                             if(isset($_POST['Update'])){

                                               // get form data, making sure it is valid
                                              //   $empid = $_POST['Employee.Employee_ID'];
                                               $confirmvalue = $_POST['confirmation'];
                                               $employeeid = "AF002";
                                               $shiftid = isset($_GET['Shift.Shift_ID']) ? $_GET['Shift.Shift_ID'] : 0;
                                              $sqlsubmit = "UPDATE Assignment SET Assignment_Confirmed = '$confirmvalue' WHERE Employee_ID = '$employeeid' AND Shift_ID = '$shiftid'";
                                              $querysubmit = mysqli_query($conn, $sqlsubmit);
                                                if (!$querysubmit) {
                                               die ('SQL Error: ' . mysqli_error($conn));
                                             }}
                                        ?>
                                        </td>
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


</body>

</html>
