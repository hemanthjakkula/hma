<!-- php code starts -->
<?php
require 'connect_db.php';

if (isset($_POST['adminname']))
{
$adminname = $_POST['adminname'];
$password = $_POST['password'];
}

if(isset($adminname) && isset($password))
{
  $query = "select * from hma.admin where adminname = '$adminname' and password = '$password'";

  $output = mysqli_query($connect, $query);

  $outputrow = mysqli_num_rows($output);

  if($outputrow == 1)
  {
    header('Location: layout.php');
  }
  else
  {
    echo "invalid credentials";
  }
}

mysqli_close($connect);
?>
