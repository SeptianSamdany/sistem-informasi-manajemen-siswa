<?php
session_start();
require_once('../helper/connection.php');

// Periksa apakah kunci array telah didefinisikan sebelum mengaksesnya
$id_pembayaran = isset($_POST['id_pembayaran']) ? $_POST['id_pembayaran'] : '';
$tanggal_bayar = isset($_POST['tanggal_bayar']) ? $_POST['tanggal_bayar'] : '';
$total_bayar = isset($_POST['total_bayar']) ? $_POST['total_bayar'] : '';
$keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';
$nama_siswa = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : '';
$id_spp = isset($_POST['id_spp']) ? $_POST['id_spp'] : '';
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';


// Tambahkan tanda kutip yang hilang di akhir query
$query = mysqli_query($connection, "INSERT INTO pembayaran(id_pembayaran, tanggal_bayar, total_bayar, keterangan, nama_siswa, id_spp, nis) VALUES('$id_pembayaran', '$tanggal_bayar', '$total_bayar', '$keterangan', '$nama_siswa',  '$id_spp', '$nis')");

if ($query) {
    $_SESSION['info'] = [
        'status' => 'success',
        'message' => 'Berhasil menambah data'
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
