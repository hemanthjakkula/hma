<?php
//require 'connect_db.php';
//$update1 = "INSERT INTO amount_details (userid, amount_given, amount_given_date) VALUES (".$_POST['userid']", ".$_POST['amount']")";
 //$update = "UPDATE amount_details set amount_given = amount_given + ".$_POST["amount"].", balance_amount = balance_amount - ".$_POST["amount"]." WHERE userid  = " . $_POST["userid"];
//$connect->query($update);
//$date = "";
//$connect1->query($date);
//header('Location: layout.php');
//mysqli_close($connect);
?>

<?php 

require 'connect_db.php';

$query = "INSERT INTO amount_details (userid, amount_given, balance_amount, amount_given_date) VALUES (".$_POST["userid"].", ".$_POST["amount_given"].", ".$_POST["balance_amount"].", "NOW()" )";
$connect->query($query);
header('Location: layout.php');
mysqli_close($connect);

?>