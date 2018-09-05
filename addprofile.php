<?php

$connect = mysqli_connect("localhost", "root", "6325", "hma");

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

  //conversion of date
  //$converted_date = new DateTime($joining_date);
  //$converted_date->format('Y-m-d');

  $query = "INSERT INTO user_details (name, email, referee_name, referee_mobile, password, joining_date, experience, advance_amount, address) VALUES ('$name', '$email', '$referee_name', '$referee_mobile', '$password', '$joining_date', '$experience', '$advance_amount', '$address')";

  mysqli_query($connect, $query);
  header('location: addprofile.php'); //redirect to addprofile page after inserting
}
mysqli_close($connect);

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
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
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
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>MIS COMPARE</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="detailed_report.php">
            <i class="fa fa-th"></i> <span>Detailed Report</span>
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
          <a href="#">
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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Fixed</li>
      </ol>
        <!-- form starting -->
      <div class="tab-pane" id="settings">
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
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit" class="btn btn-danger">Submit</button>
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
