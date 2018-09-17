<?php require 'connect_db.php'; ?>
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

<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>

<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="layout.html" class="logo">
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
            <a href="login.php">
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
          <a href="#">
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
        <li>
          <a href="addprofile.php">
            <i class="fa fa-edit"></i> <span>Add Member</span>
          </a>
        </li>
        <li class="active">
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
        Fixed Layout
        <small>Blank example to the fixed layout</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Details</h3>
        </div>
        <div class="box-body">
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php
$select_all = "SELECT * FROM user_details";
$result = $connect->query($select_all);

if ($result->num_rows > 0) {
  echo "<tr>";
  echo "<table class='table table-hover'>
                <tr>
                  <th>ID</th>
                  <th>USERNAME</th>
                  <th>email</th>
                  <th>Referee Name</th>
                  <th>Referee Mobile</th>
                  <th>Password</th>
                  <th>Date of Joining</th>
                  <th>Experience</th>
                  <th>Advance amount</th>
                  <th>Address</th>
                </tr>";
                       //output the data of each row
                   while ($row = $result->fetch_assoc()) {
                      echo "<tr><td>" . $row["userid"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["referee_name"]. "</td><td>" . $row["referee_mobile"]. "</td><td>" . $row["password"]. "</td><td>" . $row["joining_date"]."</td><td>" . $row["experience"]."</td><td>" . $row["advance_amount"]."</td><td>" . $row["address"]."</td><td><button type='button' class='btn btn-info testclass' class='open-modal' data-toggle='modal' data-target='#modal-default' data-userid=".$row["userid"]." data-name=".$row["name"]." data-email=".$row["email"]." data-referee_name=".$row["referee_name"]." data-referee_mobile=".$row["referee_mobile"]." data-password=".$row["password"]." data-joining_date=".$row["joining_date"]." data-experience=".$row["experience"]." data-address=".$row["address"].">Edit</button></td></tr>";
                     }
                echo "</table>";
                      }
                    else {
                       echo "0 results";
                        }
              ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
<!-- modal  -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter Amount</h4>
              </div>
              <div class="modal-body">
                <!-- <p>Amount...&hellip;</p> -->
                <form action="editdetailsmodal.php" method="post">
                <input type="text" class="form-control" id="amount" name="amount" placeholder="amount">
                <input type="hidden" class="form-control" id="userid" name="userid">
                Username:<br>
                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                email:<br>
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                Referee Name:<br>
                <input type="text" class="form-control" id="referee_name" name="referee_name" placeholder="Referee name">
                Referee Mobile:<br>
                <input type="text" class="form-control" id="referee_mobile" name="referee_mobile" placeholder="Referee Mobile">
                Password:<br>
                <input type="text" class="form-control" id="password" name="password" placeholder="password">
                Date of Joining:<br>
                <input type="text" class="form-control" id="joining_date" name="joining_date" placeholder="Date of Joining">
                Experience:<br>
                <input type="text" class="form-control" id="experience" name="experience" placeholder="Experience">
                Address:<br>
                <input type="text" class="form-control" id="address" name="username" placeholder="address">
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary modelamount" value="Submit">
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
        <!-- /.modal close -->
    </section>
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
<script>
$(function () {
  $('#modal-default').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var userid = button.data('userid');
    var name = button.data('name');
    var email = button.data('email');
    var referee_name = button.data('referee_name');
    var referee_mobile = button.data('referee_mobile');
    var password = button.data('password');
    var joining_date = button.data('joining_date');
    var experience = button.data('experience');
    var address = button.data('address');
    var modal = $(this);
    modal.find('#userid').val(userid);
    modal.find('#name').val(name);
    modal.find('#email').val(email);
    modal.find('#referee_name').val(referee_name);
    modal.find('#referee_mobile').val(referee_mobile);
    modal.find('#password').val(password);
    modal.find('#joining_date').val(joining_date);
    modal.find('#experience').val(experience);
    modal.find('#address').val(address);
    
  });
});
</script>
</body>
</html>
<?php
mysqli_close($connect);
?>