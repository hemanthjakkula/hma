<?php

require 'connect_db.php';
session_start();
if(isset($_GET['logged_in'])) {
      $_SESSION['logged_in']='admin';
    }

 if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $referee_name = $_POST['referee_name'];
  $referee_mobile = $_POST['referee_mobile'];
  $password = $_POST['password'];
  $joining_date = $_POST['joining_date'];
  $experience = $_POST['experience'];
  $advance_amount = $_POST['advance_amount'];
  $address = $_POST['address'];
  $pl_hdfc = $_POST['pl_hdfc'];
  $pl_icici = $_POST['pl_icici'];
  $pl_axis = $_POST['pl_axis'];
  $pl_fullerton = $_POST['pl_fullerton'];
  $pl_bajaj = $_POST['pl_bajaj'];
  $pl_tata = $_POST['pl_tata'];
  $pl_dhfl = $_POST['pl_dhfl'];
  $pl_magma = $_POST['pl_magma'];
  $pl_indiabulls = $_POST['pl_indiabulls'];
  $pl_sriram = $_POST['pl_sriram'];
  $bl_hdfc = $_POST['bl_hdfc'];
  $bl_icici = $_POST['bl_icici'];
  $bl_axis = $_POST['bl_axis'];
  $bl_fullerton = $_POST['bl_fullerton'];
  $bl_bajaj = $_POST['bl_bajaj'];
  $bl_tata = $_POST['bl_tata'];
  $bl_dhfl = $_POST['bl_dhfl'];
  $bl_magma = $_POST['bl_magma'];
  $bl_indiabulls = $_POST['bl_indiabulls'];
  $bl_sriram = $_POST['bl_sriram'];
  $lap_hdfc = $_POST['lap_hdfc'];
  $lap_icici = $_POST['lap_icici'];
  $lap_axis = $_POST['lap_axis'];
  $lap_fullerton = $_POST['lap_fullerton'];
  $lap_bajaj = $_POST['lap_bajaj'];
  $lap_tata = $_POST['lap_tata'];
  $lap_dhfl = $_POST['lap_dhfl'];
  $lap_magma = $_POST['lap_magma'];
  $lap_indiabulls = $_POST['lap_indiabulls'];
  $lap_sriram = $_POST['lap_sriram'];
  $hl_hdfc = $_POST['hl_hdfc'];
  $hl_icici = $_POST['hl_icici'];
  $hl_axis = $_POST['hl_axis'];
  $hl_fullerton = $_POST['hl_fullerton'];
  $hl_bajaj = $_POST['hl_bajaj'];
  $hl_tata = $_POST['hl_tata'];
  $hl_dhfl = $_POST['hl_dhfl'];
  $hl_magma = $_POST['hl_magma'];
  $hl_indiabulls = $_POST['hl_indiabulls'];
  $hl_sriram = $_POST['hl_sriram'];
  $plgvt_hdfc = $_POST['plgvt_hdfc'];
  $plgvt_icici = $_POST['plgvt_icici'];
  $plgvt_axis = $_POST['plgvt_axis'];
  $plgvt_fullerton = $_POST['plgvt_fullerton'];
  $plgvt_bajaj = $_POST['plgvt_bajaj'];
  $plgvt_tata = $_POST['plgvt_tata'];
  $plgvt_dhfl = $_POST['plgvt_dhfl'];
  $plgvt_magma = $_POST['plgvt_magma'];
  $plgvt_indiabulls = $_POST['plgvt_indiabulls'];
  $plgvt_sriram = $_POST['plgvt_sriram'];
 
  $query = "INSERT INTO user_details (name, email, referee_name, referee_mobile, password, joining_date, experience, advance_amount, address) VALUES ('$name', '$email', '$referee_name', '$referee_mobile', '$password', '$joining_date', '$experience', '$advance_amount', '$address');";

  $query .= "INSERT INTO commision_structure(userid, pl_hdfc, pl_icici, pl_axis, pl_fullerton,pl_bajaj, pl_tata, pl_dhfl, pl_magma, pl_indiabulls, pl_sriram, bl_hdfc, bl_icici, bl_axis, bl_fullerton, bl_bajaj, bl_tata, bl_dhfl, bl_magma, bl_indiabulls, bl_sriram, lap_hdfc, lap_icici, lap_axis, lap_fullerton, lap_bajaj, lap_tata, lap_dhfl, lap_magma, lap_indiabulls, lap_sriram, hl_hdfc, hl_icici, hl_axis, hl_fullerton, hl_bajaj, hl_tata, hl_dhfl, hl_magma, hl_indiabulls, hl_sriram, plgvt_hdfc, plgvt_icici, plgvt_axis, plgvt_fullerton, plgvt_bajaj, plgvt_tata, plgvt_dhfl, plgvt_magma, plgvt_indiabulls, plgvt_sriram ) VALUES (LAST_INSERT_ID(), '$pl_hdfc', '$pl_icici', '$pl_axis', '$pl_fullerton', '$pl_bajaj', '$pl_tata', '$pl_dhfl','$pl_magma','$pl_indiabulls', '$pl_sriram', '$bl_hdfc', '$bl_icici', '$bl_axis', '$bl_fullerton', '$bl_bajaj', '$bl_tata', '$bl_dhfl', '$bl_magma','$bl_indiabulls', '$bl_sriram', '$lap_hdfc', '$lap_icici', '$lap_axis', '$lap_fullerton', '$lap_bajaj', '$lap_tata', '$lap_dhfl', '$lap_magma', '$lap_indiabulls', '$lap_sriram', '$hl_hdfc', '$hl_icici', '$hl_axis', '$hl_fullerton', '$hl_bajaj', '$hl_tata', '$hl_dhfl', '$hl_magma','$hl_indiabulls', '$hl_sriram', '$plgvt_hdfc', '$plgvt_icici', '$plgvt_axis', '$plgvt_fullerton', '$plgvt_bajaj', '$plgvt_tata', '$plgvt_dhfl', '$plgvt_magma', '$plgvt_indiabulls', '$plgvt_sriram' ) ";
  
  if (mysqli_multi_query($connect, $query)) {
    # code...
    do {
      if ($result=mysqli_store_result($connect)) {

        mysqli_free_result($result);

      }
    }
    while (mysqli_next_result($connect)); 
  }
  
  header('location: addprofile.php'); //redirect to addprofile page after inserting
}


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMA | Fixed Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="layout.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>MA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Harsha</b>Megha</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="login.php" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Logout</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/logo_160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Muralidhar Rao</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="layout.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="mis_detail.php">
            <i class="fa fa-table"></i> <span>MIS</span>
          </a>
        </li>
        <li>
          <a href="mis_compare.php">
            <i class="fa fa-files-o"></i>
            <span>MIS COMPARE</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="paymentdetails.php">
            <i class="fa fa-inr"></i>
            <span>Payment Details</span>
          </a>
        </li>
        <li class=" active">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Add Member</span>
          </a>
        </li>
        <li>
          <a href="edituserdetails.php">
            <i class="fa fa-calendar"></i> <span>Edit Member Details</span>
          </a>
        </li>
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
      </h1>
        <!-- form starting -->
      <div class="tab-panel" id="settings">
                <form class="form-horizontal" id='login' action="addprofile.php" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-4">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputReferee_name" class="col-sm-2 control-label">Referee Name</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="referee_name" name="referee_name" placeholder="Referee name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputReferee_number" class="col-sm-2 control-label">Referee Number</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="referee_mobile" name="referee_mobile" placeholder="Referee Number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-4">
                      <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="experience" name="experience" placeholder="Experience">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputJoiningdate" class="col-sm-2 control-label">Date of Joining</label>

                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="joining_date" name="joining_date" placeholder="Date of Joining">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAdvanceamount" class="col-sm-2 control-label">Advance Amount</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="advance_amount" name="advance_amount" placeholder="Advance Amount">
                    </div>
                  </div>

                  <center> <h2>ENTER PAYOUT DETAILS</h2> </center>
                  <table id='table_id' class='table table-hover' style="width: 100%" >
                    <tr>
                      <th>Bank name</th>
                      <th>HDFC</th>
                      <th>ICICI</th>
                      <th>AXIS</th>
                      <th>FULLERTON</th>
                      <th>BAJAJ</th>
                      <th>TATA</th>
                      <th>DHFL</th>
                      <th>MAGMA</th>
                      <th>INDIA BULLS</th>
                      <th>SRIRAM</th>
                    </tr>
                    <tr>
                      <th>Personal Loan</th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_hdfc"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_icici"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_axis"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_fullerton"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_bajaj"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_tata"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_dhfl"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_magma"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_indiabulls"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="pl_sriram"></th>
                    </tr>
                    <tr>
                      <th>Business Loan</th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_hdfc"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_icici"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_axis"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_fullerton"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_bajaj"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_tata"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_dhfl"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_magma"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_indiabulls"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="bl_sriram"></th>
                    </tr>
                    <tr>
                      <th>LAP</th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_hdfc"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_icici"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_axis"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5"name="lap_fullerton"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_bajaj"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_tata"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_dhfl"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_magma"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_indiabulls"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="lap_sriram"></th>
                    </tr>
                    <tr>
                      <th>Housing Loan</th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_hdfc"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_icici"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_axis"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_fullerton"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_bajaj"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_tata"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_dhfl"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_magma"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_indiabulls"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="hl_sriram"></th>
                    </tr>
                    <tr>
                      <th>GOVT-PL</th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_hdfc"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_icici"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_axis"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_fullerton"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_bajaj"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_tata"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_dhfl"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_magma"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_indiabulls"></th>
                      <th><input type="number" class="col-sm-10" step="0.01" min="0" max="5" name="plgvt_sriram"></th>
                    </tr>
                  </table>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <center>
                      <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                    </center>
                    </div>
                  </div>
                </div>
                </form>
              </div>
        <!-- form ends -->

    </section>

    <!-- Main content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Developed for HarshaMegha Associates by Sai Hemanth Jakkula</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
mysqli_close($connect);
?>