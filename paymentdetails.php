<?php require 'connect_db.php' ?>

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
  <!--  Datepicker include scripts -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
        <li class="active">
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
        Payment Details
        <small>Helps to know the Payment Details of Users</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
                  <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Select User</label>
                <!-- here name="user" is important -->
                <form action = "paymentdetails.php" method = "post">
                <select class="form-control select2" name="user" style="width: 100%;"> 
                  <?php 
                    $query = "SELECT name, userid FROM user_details";
                    $result = mysqli_query($connect, $query);
                  ?>
                  <?php while ($row1 = mysqli_fetch_array($result)):; ?>
                      <option value=<?php echo $row1[1]?>><?php echo $row1[0]; ?></option>
                    <?php endwhile; ?>
                  <option selected="selected">All users</option>
                </select>
                <?php
                    if (isset($_POST["user"], $_POST["reservation"])) {
                      # code...
                      $selected = $_POST['user'];
                      $array = explode("-", $_POST["reservation"]);
                      echo "This is selected:".$selected;
                      echo "<br>";
                      for ($i=0; $i < count($array) ; $i++) { 
                        ${'var'.$i} = $array[$i];
                      }
                      echo "var0 is ".$var0;
                      echo "<br>";
                      echo "var1 is ".$var1;
                    }
                    else {
                      echo "nothing selected";
                    }
                      ?>
              </div>
            </div>
            <label>Date range:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <div class="col-sm-4">
                  <input type="text" class="form-control pull-right" id="reservation" name="reservation">
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="submit">
              </form>
                </div>
                <!-- /.input group -->
          </div>
        </div>
        </div>
        <div class="box-body">
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <?php 
                $select_all = " SELECT payment_details.userid, user_details.name, payment_details.amount_given, payment_details.amount_given_date FROM payment_details JOIN user_details ON user_details.userid = payment_details.userid " ;
                
                $result = $connect->query($select_all);

                if ($result->num_rows > 0) {
                  echo "<tr>";
                  echo "<table class='table table-hover'>
                  <tr>
                  <th>ID</th>
                  <th>USER NAME</th>
                  <th>Paid Amount</th>
                  <th>Paid Date</th>
                  </tr>";
                //output the data of each row
                while ($row = $result->fetch_assoc()) {
                      echo "<tr><td>" . $row["userid"]. "</td><td>" . $row["name"]. "</td><td>" . $row["amount_given"]. "</td><td>" . $row["amount_given_date"]. "</td></tr>" ;
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
      </div>
      <!-- /.box -->
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
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
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
    //Date range picker
     $('#reservation').daterangepicker()
  });

</script>

</body>
</html>
<?php mysqli_close($connect); ?>