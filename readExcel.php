<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

function getData(
  $data_range,
  $sheetNum = 0,
  $inputFileName = "./SampleForm.xlsx",
) {
  $reader = new XlsxReader();
  $spreadsheet = $reader->load($inputFileName);
  $sheet = $spreadsheet->getSheet($sheetNum);
  $dataArray = $sheet->rangeToArray(
    $data_range,
    NULL,
    TRUE,
    TRUE,
    TRUE,
  );
  return $dataArray;
}
?>