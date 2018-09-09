<?php

use PhpOffice\phpspreadsheet\src\PhpSpreadsheet\IOFactory;
// check this in header.php file
use PhpOffice\phpspreadsheet\src\PhpSpreadsheet\Helper\Sample;

require_once  $_SERVER['DOCUMENT_ROOT'] . '/hma/src/Bootstrap.php';
//remove header
//require __DIR__ . '/../Header.php';

$helper = new sample();
$inputFileType = 'Xlsx';
$inputFileName = __DIR__ . '/sampleData/MURALI.Xlsx';
//removed log
//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
$reader = IOFactory::createReader($inputFileType);
//remove log
//$helper->log('Turning Formatting off for Load');
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($inputFileName);

$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
var_dump($sheetData);
