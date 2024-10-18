<?php
require_once('../helper/connection.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$current_year = date('Y');
$query_spp_this_year = mysqli_query($connection, "SELECT tahun, SUM(nominal) as total_spp_this_year FROM spp WHERE tahun = '$current_year'");
$data_spp_this_year = mysqli_fetch_assoc($query_spp_this_year);
$total_spp_this_year = $data_spp_this_year['total_spp_this_year'];
$tahun_spp = $data_spp_this_year['tahun'];

$result = mysqli_query($connection, "SELECT * FROM pembayaran");

$sheet->setCellValue('A1', 'Laporan Pembayaran');
$sheet->setCellValue('A2', "Tagihan SPP Tahun $tahun_spp : Rp " . number_format($total_spp_this_year, 0, ',', '.'));

$sheet->setCellValue('A4', 'Nama Siswa');
$sheet->setCellValue('B4', 'NIS');
$sheet->setCellValue('C4', 'ID Pembayaran');
$sheet->setCellValue('D4', 'Tanggal Bayar');
$sheet->setCellValue('E4', 'Total Bayar');
$sheet->setCellValue('F4', 'Keterangan');
$sheet->setCellValue('G4', 'ID SPP');

$row = 5;
while ($data = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $row, $data['nama_siswa']);
    $sheet->setCellValue('B' . $row, $data['nis']);
    $sheet->setCellValue('C' . $row, $data['id_pembayaran']);
    $sheet->setCellValue('D' . $row, $data['tanggal_bayar']);
    $sheet->setCellValue('E' . $row, 'Rp ' . number_format($data['total_bayar'], 0, ',', '.'));
    $sheet->setCellValue('F' . $row, $data['keterangan']);
    $sheet->setCellValue('G' . $row, $data['id_spp']);
    $row++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan_Pembayaran.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
