<?php
require 'connect_db.php';
 $update = "UPDATE user_details set name = ".$_POST["name"].",userid =".$_POST["userid"].", email = ".$_POST["email"].", referee_name = ".$_POST["referee_name"].", referee_mobile = ".$_POST["referee_mobile"].", password = ".$_POST["password"].", joining_date = ".$_POST["joining_date"].", experience = ".$_POST["experience"].", address = ".$_POST["address"]." WHERE userid = ".$_POST["userid"] ;
$connect->query($update);
//$date = "";
//$connect1->query($date);
header('Location: edituserdetails.php');
mysqli_close($connect);
?>