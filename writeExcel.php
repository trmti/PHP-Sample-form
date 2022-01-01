<?php
header("Location: ./index.php");

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', '名前');
$sheet->setCellValue('B1', "性別");
$sheet->setCellValue('C1', "身長");
$sheet->setCellValue('D1', "体重");

$num = 3;

foreach($_POST as $name => $value) {
  $sheet->setCellValue("A${num}", $name);
  $sheet->setCellValue("B${num}", $value["sex"]);
  $sheet->setCellValue("C${num}", $value["stature"]);
  $sheet->setCellValue("D${num}", $value["bodyWeight"]);
  $num++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('SampleForm.xlsx');
exit;
?>