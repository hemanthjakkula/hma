<?php 

require 'connect_db.php';
$output = '';

if(isset($_POST["export_excel"]))
{
	$sql = "SELECT * FROM mis_details ORDER BY userid DESC";
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

