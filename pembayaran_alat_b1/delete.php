<?php 
session_start(); 
require_once '../helper/connection.php'; 

$nis = $_GET["nis"]; 

// Hapus data di tabel siswa
$result = mysqli_query($connection, "DELETE FROM pembayaran_alat_b1 WHERE nis='$nis'"); 

if (mysqli_affected_rows($connection) > 0) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil menghapus data'
    ];
    header('Location: ./index.php');
} else {
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => mysqli_error($connection)
    ];
    header('Location: ./index.php');
}
