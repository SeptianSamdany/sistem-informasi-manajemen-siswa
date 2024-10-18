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
$angsuran_ke_4 = $_POST['angsuran_ke_4'];
$angsuran_ke_5 = $_POST['angsuran_ke_5'];

// Menghitung sisa tagihan
$sisa_tagihan = $tagihan - ($angsuran_ke_1 + $angsuran_ke_2 + $angsuran_ke_3 + $angsuran_ke_4 + $angsuran_ke_5);

// Query untuk update data
$query = "UPDATE pembayaran_tahun_b1 SET 
            nama_siswa = ?, 
            tagihan = ?, 
            angsuran_ke_1 = ?, 
            angsuran_ke_2 = ?, 
            angsuran_ke_3 = ?, 
            angsuran_ke_4 = ?, 
            angsuran_ke_5 = ?, 
            sisa_tagihan = ? 
          WHERE nis = ?";

// Mempersiapkan statement
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    // Mengikat parameter ke statement
    mysqli_stmt_bind_param($stmt, 'sssssssss', $nama_siswa, $tagihan, $angsuran_ke_1, $angsuran_ke_2, $angsuran_ke_3, $angsuran_ke_4, $angsuran_ke_5, $sisa_tagihan, $nis);

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
