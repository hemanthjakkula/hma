<?php 
session_start();
if (!isset($_SESSION["logged_in"])) {
  session_destroy(); 
  header('Location: index.php'); 
}
	$connect = mysqli_connect("mysql-instance-1.cfwypymvbroc.ap-south-1.rds.amazonaws.com", "hemanth", "mypassword", "hma");
	//checking connection
                if ($connect->connect_error) {
                  die("Connection Failed: " . $connect->connect_error);
                }
 ?>