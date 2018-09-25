<?php 
require 'connect_db.php';
$output = '';
if(isset($_POST["export_excel"]))
{
if (isset($_POST["user"])) {
                      # code...
                      $selected = $_POST['user'];
                      $array = explode("-", $_POST["reservation"]);
                      for ($i=0; $i < count($array) ; $i++) {
                        ${'var'.$i} = $array[$i];
                      }
                      //converting date format to mysql format
                      $start_date = date("Y/m/d", strtotime($var0));
                      $end_date = date("Y/m/d", strtotime($var1));

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
	$result = mysqli_query($connect, $select_all);
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