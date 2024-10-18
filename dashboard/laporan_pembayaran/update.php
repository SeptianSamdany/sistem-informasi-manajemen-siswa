<?php
session_start();
require_once('../helper/connection.php');

$id_pembayaran = $_POST['id_pembayaran'];
$tanggal_bayar = $_POST['tanggal_bayar'];
$total_bayar = $_POST['total_bayar'];
$keterangan = $_POST['keterangan'];
$nama_siswa = $_POST['nama_siswa'];
$id_spp = $_POST['id_spp'];

$sql_data_siswa = "SELECT nis FROM siswa WHERE nama_siswa = '$nama_siswa'";
$result_data_siswa = mysqli_query($connection, $sql_data_siswa);

if (mysqli_num_rows($result_data_siswa) > 0) {
    $row_data_siswa = mysqli_fetch_assoc($result_data_siswa);
    $nis = $row_data_siswa['nis'];
    $tahun_ajaran = $row_data_siswa['tahun_ajaran']; // Mengambil tahun ajaran dari hasil query

    $query = mysqli_query($connection, "UPDATE pembayaran SET tanggal_bayar = '$tanggal_bayar', total_bayar = '$total_bayar', keterangan = '$keterangan', nis = '$nis', id_spp = '$id_spp' WHERE id_pembayaran = '$id_pembayaran'");

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
} else {
    $_SESSION['info'] = [
        'status' => 'failed',
        'message' => 'Nama siswa tidak ditemukan'
    ];
    header('Location: ./index.php');
}

?>
