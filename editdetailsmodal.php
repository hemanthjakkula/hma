<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'connect_db.php';
 // wrapping the $_POST in single quotes works the query
$update = "UPDATE user_details set name = '".$_POST["name"]."', email = '".$_POST["email"]."', referee_name = '".$_POST["referee_name"]."', referee_mobile = '".$_POST["referee_mobile"]."', password = '".$_POST["password"]."', joining_date = '".$_POST["joining_date"]."', experience = '".$_POST["experience"]."', address = '".$_POST["address"]."' WHERE userid = '".$_POST["userid"]."'" ;
$connect->query($update);
header('Location: edituserdetails.php');
mysqli_close($connect);
?>