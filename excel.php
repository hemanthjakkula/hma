<?php 
require 'connect_db.php';
$output = '';
if(isset($_POST["export_excel"]))
{
	if(isset($_POST["userid"])) {
		if($_POST["user"] == 'allusers') {
			$user_clause = "";
		  } else {
			$user_clause = "userid = '".$_POST["user"]."' AND";
		  }
		$sql = " SELECT * FROM mis_details WHERE ".$user_clause." disbursed_date >= CAST('".$_POST["start"]."' AS DATE) AND disbursed_date <= CAST('".$_POST["end"]."' AS DATE) " ;
	} else {
		$sql = "SELECT * FROM mis_details WHERE disbursed_date >= CAST('".$_POST["start"]."' AS DATE) AND disbursed_date <= CAST('".$_POST["end"]."' AS DATE) ";
	}
	$result = mysqli_query($connect, $sql);
	if(mysqli_num_rows($result) > 0)
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
mysqli_close($connect);
?>