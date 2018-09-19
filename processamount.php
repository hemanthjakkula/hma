<?php
require 'connect_db.php';
$update1 = "INSERT INTO payment_details (userid, amount_given, amount_given_date) VALUES (".$_POST['userid'].", ".$_POST['amount'].", NOW() ) ";
 $update = "UPDATE amount_details set amount_given = amount_given + ".$_POST["amount"].", balance_amount = balance_amount - ".$_POST["amount"]." WHERE userid  = " . $_POST["userid"];
$connect->query($update);
$connect->query($update1);
header('Location: layout.php');
mysqli_close($connect);
?>
