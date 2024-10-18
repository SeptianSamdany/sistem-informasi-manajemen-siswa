<?php
session_start();
require_once('../helper/connection.php');

// Mendapatkan data dari form
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$nama_siswa = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : '';
$tanggal_bayar = isset($_POST['tanggal_bayar']) ? $_POST['tanggal_bayar'] : '';
$tagihan = isset($_POST['tagihan']) ? $_POST['tagihan'] : '';
$uang_masuk = isset($_POST['uang_masuk']) ? $_POST['uang_masuk'] : '';
$sisa_bayar = isset($_POST['sisa_bayar']) ? $_POST['sisa_bayar'] : '';

// Menyiapkan query menggunakan prepared statements
$query = "INSERT INTO pembayaran_spp_b1(nis, nama_siswa, tanggal_bayar, tagihan, uang_masuk, sisa_bayar) VALUES (?, ?, ?, ?, ?, ?)";

// Mempersiapkan statement
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    // Mengikat parameter ke statement
    mysqli_stmt_bind_param($stmt, 'isssss', $nis, $nama_siswa, $tanggal_bayar, $tagihan, $uang_masuk, $sisa_bayar);

    // Menjalankan statement
    $execute = mysqli_stmt_execute($stmt);

    if ($execute) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menambah data'
        ];
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => mysqli_error($connection)
        ];
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['info'] = [
        'status' => 'failed',
        'message' => mysqli_error($connection)
    ];
}

// Redirect ke halaman index
header('Location: ./index.php');
exit;
?>
