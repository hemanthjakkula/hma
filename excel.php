<?php 
session_start();
$_POST["user"] = $_SESSION['username'];
$start_date = $_SESSION['start_date'];
$end_date = $_SESSION['end_date'];
require 'connect_db.php';
$output = '';
if(isset($_POST["export_excel"]))
{
if (isset($_POST["user"])) {

                      if($_POST["user"] == 'allusers') {
                        $user_clause = "";
                      } else {
                        $user_clause = "userid = '".$_POST["user"]."' AND";
                      }

                      $select_all = " SELECT * FROM mis_details WHERE ".$user_clause." disbursed_date >= CAST('".$start_date."' AS DATE) AND disbursed_date <= CAST('".$end_date."' AS DATE) " ;
                      }
else {
    $select_all = "SELECT * FROM mis_details LIMIT 10 ";
    }
	$result = $connect->query($select_all);
	
	if($result->num_rows > 0)
	{
		$output .= '
		<table class="table" border="1" >
			<tr>
				<th>CUSTOMER NAME</th>
				<th>LOS/UAP NUMBER</th>
				<th>Loan Amount</th>
				<th>Net Loan Amount</th>
				<th>Disbursed Date</th>
				<th>Location</th>
				<th>Loan Type</th>
				<th>Entity</th>
				<th>Bank Name</th>
		';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr>
				<td>'.$row["customer_name"].'</td>
				<td>'.$row["los_number"].'</td>
				<td>'.$row["loan_amount"].'</td>
				<td>'.$row["net_loan_amount"].'</td>
				<td>'.$row["disbursed_date"].'</td>
				<td>'.$row["location"].'</td>
				<td>'.$row["loan_type"].'</td>
				<td>'.$row["entity"].'</td>
				<td>'.$row["bank_name"].'</td>
				</tr>
			';
		}
		$output .= '</table>';
		header("Content-Type: application/xlsx");
		header("Content-Disposition: attachment; filename=mis.xlsx");
		echo $output;
	}
}
else {
	$message = "No Data to Download";
      echo "<script type = 'text/javascript'>alert('$message');</script> ";
      //header will not work we should use Javascript
      echo "<script>location.href='mis_detail.php'</script>";
}
mysqli_close($connect);
?>