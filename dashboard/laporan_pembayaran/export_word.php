<?php
require_once('../helper/connection.php');
require 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

$phpWord = new PhpWord();

$current_year = date('Y');
$query_spp_this_year = mysqli_query($connection, "SELECT tahun, SUM(nominal) as total_spp_this_year FROM spp WHERE tahun = '$current_year'");
$data_spp_this_year = mysqli_fetch_assoc($query_spp_this_year);
$total_spp_this_year = $data_spp_this_year['total_spp_this_year'];
$tahun_spp = $data_spp_this_year['tahun'];

$result = mysqli_query($connection, "SELECT * FROM pembayaran");

$section = $phpWord->addSection();
$section->addTitle("Laporan Pembayaran", 1);
$section->addText("Tagihan SPP Tahun $tahun_spp : Rp " . number_format($total_spp_this_year, 0, ',', '.'));

$table = $section->addTable();
$table->addRow();
$table->addCell(2000)->addText("Nama Siswa");
$table->addCell(2000)->addText("NIS");
$table->addCell(2000)->addText("ID Pembayaran");
$table->addCell(2000)->addText("Tanggal Bayar");
$table->addCell(2000)->addText("Total Bayar");
$table->addCell(2000)->addText("Keterangan");
$table->addCell(2000)->addText("ID SPP");

while ($data = mysqli_fetch_array($result)) {
    $table->addRow();
    $table->addCell(2000)->addText($data['nama_siswa']);
    $table->addCell(2000)->addText($data['nis']);
    $table->addCell(2000)->addText($data['id_pembayaran']);
    $table->addCell(2000)->addText($data['tanggal_bayar']);
    $table->addCell(2000)->addText('Rp ' . number_format($data['total_bayar'], 0, ',', '.'));
    $table->addCell(2000)->addText($data['keterangan']);
    $table->addCell(2000)->addText($data['id_spp']);
}

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="Laporan_Pembayaran.docx"');

$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');
exit;
?>
