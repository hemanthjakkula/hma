<?php
// Connect to db
require 'connect_db.php';

$start_date_compare = $_SESSION['start_date_compare'];
$end_date_compare = $_SESSION['end_date_compare'];



// Clear white spaces and convert to upper case
function clean_string($string) {
  $nowhites = preg_replace('/\s*/', '', $string);
  return strtoupper($nowhites);
}



// Get all rows for particular date bracket
$query = "SELECT * FROM mis_details WHERE disbursed_date >= CAST('".$start_date_compare."' AS DATE) AND disbursed_date <= CAST('".$end_date_compare."' AS DATE)";
$mis_result = mysqli_query($connect, $query);

// Comparing
while ($mis_row = $mis_result -> fetch_assoc()) {
  // Fetch by los number from excel table
  $query = "SELECT * FROM excel WHERE los =".$mis_row["los_number"];
  $excel_rows = mysqli_query($connect, $query);
  $excel_row = mysqli_fetch_assoc($excel_rows);

  echo "-----------------------------------------<br>";
  echo "Mis details -> ".$mis_row["los_number"].", ".$mis_row["net_loan_amount"].", ".clean_string($mis_row["bank_name"])."<br>";

  // Check if los exists
  if ($excel_row == null) {
    // Update mis_details that los does not exists
    $update1 = "UPDATE mis_details SET remarks = 'LOS_NOT_FOUND' where los_number=".$mis_row["los_number"];
    $connect->query($update1);
    var_dump($excel_row)."<br>";
    echo "Query -> ".$update1."<br>";
    echo "Excel row not found -> updated<br>";
  } else {
    echo "Excel rows -> ".$excel_row["los"].", ".$excel_row["amount"].", ".clean_string($excel_row["bank"])."<br>";
    $amount_check = false;
    $bankname_check = false;
    // check if amount matches are equal
    if ($excel_row["amount"] == $mis_row["net_loan_amount"]) {
      $amount_check = true;
      echo "Amounts matches <br>";
    }
    if (clean_string($excel_row["bank"]) == clean_string($mis_row["bank_name"])) {
      $bankname_check = true;
      echo "Bank name matches <br>";
    }

    if ($amount_check && $bankname_check) {
      // if both matches then update mis_detail as matches
      $update2 = "UPDATE mis_details SET remarks = 'MATCHED' WHERE los_number=".$mis_row["los_number"];
      $connect->query($update2);
      echo "Query -> ".$update2."<br>";
      echo "So both matches -> updated<br>";
    } else {
      // As one of them might have mis matched update mis_detail as mismatch
      $mismatch = '';
      if (!$amount_check) {
        $mismatch = $mismatch . 'AMOUNT_MISMATCH_';
      }
      if (!$bankname_check) {
        $mismatch = $mismatch . 'BANK_NAME_MISMATCH';
      }
      $update3 = "UPDATE mis_details SET remarks = '".$mismatch."' where los_number=".$mis_row["los_number"];
      $connect->query($update3);
      echo "Query -> ".$update3."<br>";
      echo "Some mismatch  -> updated <br>";
    }
  }

  echo "-----------------------------------------";
}
echo $start_date_compare;
echo "<br>";
echo $end_date_compare;
echo "Comparison done! Please redirect me";

 ?>
