<?php
session_start();
require_once('../helper/connection.php');

// Periksa apakah kunci array telah didefinisikan sebelum mengaksesnya
$id_spp = isset($_POST['id_spp']) ? $_POST['id_spp'] : '';
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
$nominal = isset($_POST['nominal']) ? $_POST['nominal'] : '';

// Tambahkan tanda kutip yang hilang di akhir query
$query = mysqli_query($connection, "INSERT INTO spp(id_spp, tahun, nominal) VALUES('$id_spp', '$tahun', '$nominal')");

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
