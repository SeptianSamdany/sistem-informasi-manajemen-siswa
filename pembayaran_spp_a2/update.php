<?php
session_start();
require_once('../helper/connection.php');

// Mendapatkan data dari form
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$tanggal_bayar = $_POST['tanggal_bayar'];
$tagihan = $_POST['tagihan'];
$uang_masuk = $_POST['uang_masuk']; 
$sisa_bayar = $_POST['sisa_bayar'];

// Query untuk memperbarui data pembayaran_spp
$query = mysqli_query($connection, "UPDATE pembayaran_spp_a2 SET 
  nama_siswa = '$nama_siswa', 
  tanggal_bayar = '$tanggal_bayar', 
  tagihan = '$tagihan', 
  uang_masuk = '$uang_masuk',
  sisa_bayar = '$sisa_bayar'
  WHERE nis = '$nis'");

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
?>
