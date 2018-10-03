<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Helper\Sample;

require_once $_SERVER['DOCUMENT_ROOT'] . '/hma/src/Bootstrap.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/hma/connect_db.php';

$helper = new Sample();

$inputFileType = 'Xlsx';
$inputFileName = __DIR__ . '/sampleData/MURALI.xlsx';

//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
$reader = IOFactory::createReader($inputFileType);

$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($inputFileName);

$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


 $query = '';
 for ($row=2; $row <=count($sheetData) ; $row++) { 

 	$xx = "'" . implode("','", $sheetData[$row]) . "'";
	
	
 	// to explode and get required values
 	 $split_value = explode(',', $xx);
 	 $query = "INSERT INTO excel(los, amount, bank) VALUES ($split_value[0], $split_value[6], $split_value[14]);";
 	 mysqli_query($connect, $query);
 }
	 echo "<script>location.href='../../layout.php'</script>";

mysqli_close($connect);
?>

