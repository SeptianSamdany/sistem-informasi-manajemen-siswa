<?php
session_start();
require_once('../helper/connection.php');

// Mendapatkan data dari form
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$tagihan = $_POST['tagihan'];
$angsuran_ke_1 = $_POST['angsuran_ke_1'];
$angsuran_ke_2 = $_POST['angsuran_ke_2'];
$angsuran_ke_3 = $_POST['angsuran_ke_3'];

// Hitung ulang sisa tagihan di sisi server
$sisa_tagihan = $tagihan - ($angsuran_ke_1 + $angsuran_ke_2 + $angsuran_ke_3);

// Query untuk memperbarui data pembayaran_alat
$query = "UPDATE pembayaran_alat_b1 SET 
    nama_siswa = ?, 
    tagihan = ?, 
    angsuran_ke_1 = ?, 
    angsuran_ke_2 = ?, 
    angsuran_ke_3 = ?, 
    sisa_tagihan = ? 
    WHERE nis = ?";

// Mempersiapkan statement
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    // Mengikat parameter ke statement
    mysqli_stmt_bind_param($stmt, 'sssssss', $nama_siswa, $tagihan, $angsuran_ke_1, $angsuran_ke_2, $angsuran_ke_3, $sisa_tagihan, $nis);

    // Menjalankan statement
    $execute = mysqli_stmt_execute($stmt);

    if ($execute) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil mengubah data'
        ];
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => mysqli_stmt_error($stmt)
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
