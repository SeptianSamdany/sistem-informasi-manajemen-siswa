<?php
session_start();
require_once('../helper/connection.php');

$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nik = $_POST['nik'];
$tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];
$agama = $_POST['agama'];
$jumlah_saudara = $_POST['jumlah_saudara_kandung'];
$alamat = $_POST['alamat'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$nama_ayah = $_POST['nama_ayah'];
$tempat_tanggal_lahir_ayah = $_POST['tempat_tanggal_lahir_ayah'];
$pendidikan_ayah = $_POST['pendidikan_ayah'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah'];
$no_hp_ayah = $_POST['no_hp_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$tempat_tanggal_lahir_ibu = $_POST['tempat_tanggal_lahir_ibu'];
$pendidikan_ibu = $_POST['pendidikan_ibu'];
$pekerjaan_ibu = $_POST['pekerjaan_ibu'];
$no_hp_ibu = $_POST['no_hp_ibu'];
$tinggi_badan = $_POST['tinggi_badan'];
$berat_badan = $_POST['berat_badan'];
$jarak_sekolah = $_POST['jarak_ke_sekolah'];
$waktu_tempuh = $_POST['waktu_tempuh'];
$penyakit = $_POST['penyakit_yang_diderita'];
$hal_lain = $_POST['hal_yang_dikemukakan'];

$query = mysqli_query($connection, "UPDATE siswa_a2 SET 
  nama_siswa = '$nama_siswa', 
  jenis_kelamin = '$jenis_kelamin', 
  nik = '$nik', 
  tempat_tanggal_lahir = '$tempat_tanggal_lahir', 
  agama = '$agama', 
  jumlah_saudara_kandung = '$jumlah_saudara', 
  alamat = '$alamat', 
  kewarganegaraan = '$kewarganegaraan', 
  nama_ayah = '$nama_ayah', 
  tempat_tanggal_lahir_ayah = '$tempat_tanggal_lahir_ayah', 
  pendidikan_ayah = '$pendidikan_ayah', 
  pekerjaan_ayah = '$pekerjaan_ayah', 
  no_hp_ayah = '$no_hp_ayah', 
  nama_ibu = '$nama_ibu', 
  tempat_tanggal_lahir_ibu = '$tempat_tanggal_lahir_ibu', 
  pendidikan_ibu = '$pendidikan_ibu', 
  pekerjaan_ibu = '$pekerjaan_ibu', 
  no_hp_ibu = '$no_hp_ibu', 
  tinggi_badan = '$tinggi_badan', 
  berat_badan = '$berat_badan', 
  jarak_ke_sekolah = '$jarak_sekolah', 
  waktu_tempuh = '$waktu_tempuh', 
  penyakit_yang_diderita = '$penyakit', 
  hal_yang_dikemukakan = '$hal_lain' 
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
