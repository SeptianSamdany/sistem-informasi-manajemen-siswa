<?php
session_start();
require_once('../helper/connection.php');

// Mendapatkan data dari form
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$nama_siswa = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : '';
$tagihan = isset($_POST['tagihan']) ? $_POST['tagihan'] : '';
$angsuran_ke_1 = isset($_POST['angsuran_ke_1']) ? $_POST['angsuran_ke_1'] : '';
$angsuran_ke_2 = isset($_POST['angsuran_ke_2']) ? $_POST['angsuran_ke_2'] : '';
$angsuran_ke_3 = isset($_POST['angsuran_ke_3']) ? $_POST['angsuran_ke_3'] : '';
$angsuran_ke_4 = isset($_POST['angsuran_ke_4']) ? $_POST['angsuran_ke_4'] : '';
$angsuran_ke_5 = isset($_POST['angsuran_ke_5']) ? $_POST['angsuran_ke_5'] : '';
 // Hitung sisa tagihan
 $sisa_tagihan = $tagihan - ($angsuran_ke_1 + $angsuran_ke_2 + $angsuran_ke_3 + $angsuran_ke_4 + $angsuran_ke_5);

// Menyiapkan query menggunakan prepared statements
$query = "INSERT INTO pembayaran_tahun_b2(nis, nama_siswa, tagihan, angsuran_ke_1, angsuran_ke_2, angsuran_ke_3, angsuran_ke_4, angsuran_ke_5, sisa_tagihan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Mempersiapkan statement
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    // Mengikat parameter ke statement
    mysqli_stmt_bind_param($stmt, 'sssssssss', $nis, $nama_siswa, $tagihan, $angsuran_ke_1, $angsuran_ke_2, $angsuran_ke_3, $angsuran_ke_4, $angsuran_ke_5, $sisa_tagihan);

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
        'message' => mysqli_error($conn)
    ];
}

// Redirect ke halaman index
header('Location: ./index.php');
exit;
?>
