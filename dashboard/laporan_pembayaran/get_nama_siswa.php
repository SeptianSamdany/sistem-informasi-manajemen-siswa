<?php
require_once('../helper/connection.php');

$nis = $_GET['nis'];

// Query untuk mengambil nama siswa berdasarkan NIS
$sql = "SELECT nama_siswa FROM siswa WHERE nis = '$nis'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['nama_siswa'];
} else {
    echo 'Nama Siswa tidak ditemukan';
}
?>
