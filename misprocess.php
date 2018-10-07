<?php
 require 'connect_db.php';
// wrapping the $_POST in single quotes works the query
 $update = "UPDATE mis_details set customer_name = '".$_POST["customer_name"]."', los_number = '".$_POST["los_number"]."', loan_amount = '".$_POST["loan_amount"]."', net_loan_amount = '".$_POST["net_loan_amount"]."', disbursed_date = '".$_POST["disbursed_date"]."', location = '".$_POST["location"]."', loan_type = '".$_POST["loan_type"]."', entity = '".$_POST["entity"]."', bank_name = '".$_POST["bank_name"]."' WHERE userid = '".$_POST["userid"]."'" ;
 $connect->query($update);
 header('Location: mis_detail.php');
 mysqli_close($connect);
?>
