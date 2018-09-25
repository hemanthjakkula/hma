<?php 
   require 'connect_db.php';
  if(isset($_POST['adminname']) && isset($_POST['password'])) {
    $adminname = $_POST['adminname'];
    $password = $_POST['password'];
    if($adminname=='admin@gmail.com' && $password=='password')
      {
      session_start();
      $_SESSION['logged_in']='admin';
      header("location:layout.php");
      }
      else {
      if($adminname!='admin@gmail.com' || $password!='password') {
      $message = "Invalid Username or Password";
      echo "<script type = 'text/javascript'>alert('$message');</script> ";
      //header will not work we should use Javascript
      echo "<script>location.href='login.php'</script>";
      }
    }
  }
  mysqli_close($connect);
 ?>