<?php 
session_start();
if(isset($_GET['logged_in'])) {
      $_SESSION['logged_in']='admin';
    }
	$connect = mysqli_connect("localhost", "root", "6325", "hma");
	//checking connection
                if ($connect->connect_error) {
                  die("Connection Failed: " . $connect->connect_error);
                }
 ?>