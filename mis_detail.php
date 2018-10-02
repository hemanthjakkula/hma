<?php 
require 'connect_db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMA | Fixed Layout</title>
  <!-- Table2excel installation including scripts -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/jquery-table2excel/dist/jquery.table2excel.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script> 
  <!--Datepicker scripts include -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
        <li class="active">
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
        MIS DETAILS
        <small>Blank example to the fixed layout</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- Date range -->
          <div class="form-group" >
            <div class="col-md-4">
              <div class="form-group">
                <label>Select User</label>
                <!-- here name="user" is important -->
                <form action = "mis_detail.php" method = "post">
                <select class="form-control select2" name="user" style="width: 100%;"> 
                  <?php 
                    $query = "SELECT name, userid FROM user_details";
                    $result = mysqli_query($connect, $query);
                  ?>
                  <?php while ($row1 = mysqli_fetch_array($result)):; ?>
                      <option value=<?php echo $row1[1]; ?>><?php echo $row1[0]; ?></option>
                    <?php endwhile; ?>
                  <option selected="selected" value="allusers" >All users</option>
                </select>
              </div>
            </div>
                <label>Date range:</label>
                <div class="input-group" >
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <div class="col-md-6"   >
                  <input type="text" class="form-control pull-right" id="reservation" name="reservation">
                </div>
                  <input type="submit" name="submit" class="btn btn-success" value="submit">
              </form> 
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        </div>
        <div class="box-body">
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
<?php

if (isset($_POST["user"], $_POST["reservation"])) {
                      # code...
                      $selected = $_POST['user'];
                      $array = explode("-", $_POST["reservation"]);
                      for ($i=0; $i < count($array) ; $i++) {
                        ${'var'.$i} = $array[$i];
                      }
                      //converting date format to mysql format
                      $start_date = date("Y/m/d", strtotime($var0));
                      $end_date = date("Y/m/d", strtotime($var1));

                      if($_POST["user"] == 'allusers') {
                        $user_clause = "";
                      } else {
                        $user_clause = "userid = '".$_POST["user"]."' AND";
                      }

                      $select_all = " SELECT * FROM mis_details WHERE ".$user_clause." disbursed_date >= CAST('".$start_date."' AS DATE) AND disbursed_date <= CAST('".$end_date."' AS DATE) " ;
                      }
                      else {
                        $select_all = "SELECT * FROM mis_details LIMIT 10 ";
                      }
$result = $connect->query($select_all);

if ($result->num_rows > 0) {
  echo "<tr>";
  echo "<table id='table_id' class='table table-hover' >
                <tr>
                  <th>ID</th>
                  <th>Customer Name</th>
                  <th>LOS/APP NO</th>
                  <th>Loan Amount</th>
                  <th>Net Laon Amount</th>
                  <th>Disburded Date</th>
                  <th>Location</th>
                  <th>Loan Type</th>
                  <th>Entity</th>
                  <th>Bank Name</th>
                  <th>Edit</th>
                </tr>";
  //output the data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["userid"]. "</td><td>" . $row["customer_name"]. "</td><td>" . $row["los_number"]. "</td><td>" . $row["loan_amount"]. "</td><td>" . $row["net_loan_amount"]. "</td><td>" . $row["disbursed_date"]. "</td><td>" . $row["location"]. "</td><td>" . $row["loan_type"]. "</td><td>" . $row["entity"]. "</td><td>" . $row["bank_name"]. "</td><td><button type='button' class='btn btn-info testclass' class='open-modal' data-toggle='modal' data-target='#modal-default' data-userid='".$row["userid"]."' data-customer_name='".$row["customer_name"]."' data-los_number='".$row["los_number"]."' data-loan_amount='".$row["loan_amount"]."' data-net_loan_amount='".$row["net_loan_amount"]."' data-disbursed_date='".$row["disbursed_date"]."' data-location='".$row["location"]."' data-loan_type='".$row["loan_type"]."' data-entity='".$row["entity"]."'>Edit</button></td></tr>";
  }
  echo "</table>";
}
else {
  echo "0 results";
}
?>
<!-- code for table2excel -->
            <div id="live_data"></div>
            <form action="excel.php" method="post">
              <?php
              if (isset($_POST["user"]))
              {
                $_SESSION['username'] = $_POST["user"]; 
                $_SESSION['start_date'] = $start_date;
                $_SESSION['end_date'] = $end_date;
              }
               ?>
              <input type="submit" name="export_excel" class="btn btn-success" value="Import to Excel">
            </form>
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
        <!-- modal  -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit MIS</h4>
              </div>
              <div class="modal-body">
                <!-- <p>Amount...&hellip;</p> -->
              <form action="misprocess.php" method="post">
                <input type="hidden" class="form-control" id="userid" name="userid">
                Customer Name:<br>
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name">
                Los/APP No:<br>
                <input type="text" class="form-control" id="los_number" name="los_number" placeholder="Los Number">
                Loan Amount:<br>
                <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="Loan Amount">
                Net Loan Amount:<br>
                <input type="text" class="form-control" id="net_loan_amount" name="net_loan_amount" placeholder="Net Loan Amount">
                Disbursed Date:<br>
                <input type="text" class="form-control" id="disbursed_date" name="disbursed_date" placeholder="Disbursed Date">
                Location:<br>
                <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                Loan Type:<br>
                <input type="text" class="form-control" id="loan_type" name="loan_type" placeholder="Loan Type">
                Entity:<br>
                <input type="text" class="form-control" id="entity" name="entity" placeholder="entity">
                Bank Name:<br>
                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
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
<!-- Page script -->
<script type="text/javascript">
   $(function () {
  $('#modal-default').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var userid = button.data('userid');
    var customer_name = button.data('customer_name');
    var los_number = button.data('los_number');
    var loan_amount = button.data('loan_amount');
    var net_loan_amount = button.data('net_loan_amount');
    var disbursed_date = button.data('disbursed_date');
    var location = button.data('location');
    var loan_type = button.data('loan_type');
    var entity = button.data('entity');
    var bank_name = button.data('bank_name');
    var modal = $(this);
    modal.find('#userid').val(userid);
    modal.find('#customer_name').val(customer_name);
    modal.find('#los_number').val(los_number);
    modal.find('#loan_amount').val(loan_amount);
    modal.find('#net_loan_amount').val(net_loan_amount);
    modal.find('#disbursed_date').val(disbursed_date);
    modal.find('#location').val(location);
    modal.find('#loan_type').val(loan_type);
    modal.find('#entity').val(entity);
    modal.find('#bank_name').val(bank_name);
  });
});
</script>
<script>
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker()

    $("#yourHtmTable").table2excel({
    exclude: ".excludeThisClass",
    name: "Worksheet Name",
    filename: "SomeFile" //do not include extension
    });

  });

</script>
</body>
</html>
<?php mysqli_close($connect); ?>
