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

 $sql = 'SELECT Employee_ID, Employee_fName, Employee_lName FROM Employee';

 $query = mysqli_query($conn, $sql);

 if (!$query) {
 	die ('SQL Error: ' . mysqli_error($conn));
 }
 ?>
 <!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Allied Facilities Staff Portal</title>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   <a class="navbar-brand" href="index.html">Allied Facilities Staff Portal</a>
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarResponsive">
     <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Shifts">
         <a class="nav-link" href="tables.html">
           <i class="fa fa-fw fa-calendar"></i>
           <span class="nav-link-text">Shifts</span>
         </a>
       </li>
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Holiday">
         <a class="nav-link" href="index.html">
           <i class="fa fa-fw fa-sun-o"></i>
           <span class="nav-link-text">Holiday</span>
         </a>
       </li>
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Uniform">
         <a class="nav-link" href="#">
           <i class="fa fa-fw fa-black-tie"></i>
           <span class="nav-link-text">Uniform</span>
         </a>
       </li>
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Licence">
         <a class="nav-link" href="charts.html">
           <i class="fa fa-fw fa-drivers-license-o"></i>
           <span class="nav-link-text">Licence</span>
         </a>
       </li>
     </ul>
     <ul class="navbar-nav sidenav-toggler">
       <li class="nav-item">
         <a class="nav-link text-center" id="sidenavToggler">
           <i class="fa fa-fw fa-angle-left"></i>
         </a>
       </li>
     </ul>
     <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown">
         <!-- Top nav bar - alerts -->
         <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-fw fa-bell"></i>
           <span class="d-lg-none">Alerts
             <span class="badge badge-pill badge-warning">6 New</span>
           </span>
           <span class="indicator text-warning d-none d-lg-block">
             <i class="fa fa-fw fa-circle"></i>
           </span>
         </a>
         <div class="dropdown-menu" aria-labelledby="alertsDropdown">
           <h6 class="dropdown-header">New Alerts:</h6>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#">
             <span class="text-success">
               <strong>
                 <i class="fa fa-long-arrow-up fa-fw"></i>New Shift Added</strong>
             </span>
             <span class="small float-right text-muted">11:21 AM</span>
             <div class="dropdown-message small">You have been allocated to a new shift..</div>
           </a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#">
             <span class="text-danger">
               <strong>
                 <i class="fa fa-long-arrow-down fa-fw"></i>New Shift Added</strong>
             </span>
             <span class="small float-right text-muted">11:21 AM</span>
             <div class="dropdown-message small">You have been allocated to a new shift..</div>
           </a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#">
             <span class="text-success">
               <strong>
                 <i class="fa fa-long-arrow-up fa-fw"></i>New Shift Added</strong>
             </span>
             <span class="small float-right text-muted">11:21 AM</span>
             <div class="dropdown-message small">You have been allocated to a new shift..</div>
           </a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item small" href="#">View all alerts</a>
         </div>
       </li>
       <li class="nav-item">
         <form class="form-inline my-2 my-lg-0 mr-lg-2">
           <div class="input-group">
             <input class="form-control" type="text" placeholder="Search for...">
             <span class="input-group-append">
               <button class="btn btn-primary" type="button">
                 <i class="fa fa-search"></i>
               </button>
             </span>
           </div>
         </form>
       </li>
       <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
           <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       </li>
     </ul>
   </div>
 </nav>
 <div class="content-wrapper">
   <div class="container-fluid">

     <!-- Main Page -->
     <!-- Breadcrumbs-->
     <ol class="breadcrumb">
       <li class="breadcrumb-item">
         <a href="#">Shifts</a>
       </li>
       <li class="breadcrumb-item active">Schedule</li>
     </ol>
     <h1>Shifts</h1>
     <hr>
     <p>This page will have upcoming shifts to accept/decline, as well as a table of historical shifts.</p>
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
                           <div class="panel-heading">
                               DataTables Advanced Tables
                           </div>
                           <!-- /.panel-heading -->
                           <div class="panel-body">
                               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
                                       <tr>
                                           <th>Employee_ID</th>
                                           <th>Testtest</th>
                                           <th>Platform(s)</th>
                                           <th>Engine version</th>
                                           <th>CSS grade</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     <?php
                                     $no 	= 1;
                                     $total 	= 0;
                                     while ($row = mysqli_fetch_array($query))
                                     {
                                       echo '<tr class="gradeA">
                                       <td>'.$no.'</td>
                                       <td>'.$row['Employee_ID'].'</td>
                                       <td>'.$row['Employee_fName'].'</td>
                                       <td>'.$no.'</td>
                                       </tr>';
                                       $no++;
                                     }?>
                                     <tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 2.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 3.0</td>
    <td>Win 2k+ / OSX.3+</td>
    <td class="center">1.9</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.0</td>
    <td>OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.5</td>
    <td>OSX.3+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape 7.2</td>
    <td>Win 95+ / Mac OS 8.6-9.2</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Browser 8</td>
    <td>Win 98SE+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Navigator 9</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 2.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 3.0</td>
    <td>Win 2k+ / OSX.3+</td>
    <td class="center">1.9</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.0</td>
    <td>OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.5</td>
    <td>OSX.3+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape 7.2</td>
    <td>Win 95+ / Mac OS 8.6-9.2</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Browser 8</td>
    <td>Win 98SE+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Navigator 9</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1</td>
    <td class="center">A</td>
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


   <!-- /.content-wrapper-->
   <footer class="sticky-footer">
     <div class="container">
       <div class="text-center">
         <small>Copyright © Allied Facilities 2018</small>
       </div>
     </div>
   </footer>
   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
     <i class="fa fa-angle-up"></i>
   </a>
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


   <!-- Bootstrap core JavaScript-->
   <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- Core plugin JavaScript-->
   <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
   <!-- Custom scripts for all pages-->
   <script src="../js/sb-admin.min.js"></script>
   <!-- Custom scripts for this page-->

   <!-- DataTables JavaScript -->
 <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
 <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
 <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

   <!-- Toggle between fixed and static navbar-->
   <script>
   $('#toggleNavPosition').click(function() {
     $('body').toggleClass('fixed-nav');
     $('nav').toggleClass('fixed-top static-top');
   });
   </script>

   <script>
$(document).ready(function() {
   $('#dataTables-example').DataTable({
       responsive: true
   });
});
</script>

</body>

</html>

<!-- http://webcheatsheet.com/php/connect_mysql_database.php -->
