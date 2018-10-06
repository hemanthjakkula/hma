<?php
require 'connect_db.php';

session_start();
if(isset($_GET['logged_in'])) {
      $_SESSION['logged_in']='admin';
}

$userid = $_POST["userid"];
$los_number = $_POST["los"];
$commission = $_POST["commission"];
$bal_amt = "SELECT balance_amount FROM amount_details WHERE userid = '$userid' ";
//$amount = mysqli_query($connect, $bal_amt);

$hey = $connect->query($bal_amt);
$row = mysqli_fetch_row($hey); 
if ($row[0]>=$commission) {
	$updated_amount = $row[0] - $commission;
	$update_query = "UPDATE amount_details SET balance_amount = '$updated_amount' WHERE userid = '$userid' ";
	$connect->query($update_query);
} else {
	$update2 = "UPDATE amount_details SET balance_amount = '0' WHERE userid = '$userid' ";
	$connect->query($update2);
	$advance = $row[0] - $commission;
	$advance_amt = "UPDATE amount_details SET advance_amount = advance_amount + '$advance' ";
}
$delete = "DELETE FROM mis_details WHERE los_number ='$los_number' ";
$connect->query($delete);
echo $delete;
header('Location: mis_compare.php');
?> 