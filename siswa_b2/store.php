<?php
session_start();
require_once('../helper/connection.php');

// Periksa apakah kunci array telah didefinisikan sebelum mengaksesnya
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$nama_siswa = isset($_POST['namaSiswa']) ? $_POST['namaSiswa'] : '';
$jenis_kelamin = isset($_POST['jenisKelamin']) ? $_POST['jenisKelamin'] : '';
$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
$tempat_tanggal_lahir = isset($_POST['ttl']) ? $_POST['ttl'] : '';
$agama = isset($_POST['agama']) ? $_POST['agama'] : '';
$jumlah_saudara = isset($_POST['jumlah_saudara_kandung']) ? $_POST['jumlah_saudara_kandung'] : '';
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
$kewarganegaraan = isset($_POST['kewarganegaraan']) ? $_POST['kewarganegaraan'] : '';

$nama_ayah = isset($_POST['namaAyah']) ? $_POST['namaAyah'] : '';
$tempat_tanggal_lahir_ayah = isset($_POST['ttlAyah']) ? $_POST['ttlAyah'] : '';
$pendidikan_ayah = isset($_POST['pendidikanAyah']) ? $_POST['pendidikanAyah'] : '';
$pekerjaan_ayah = isset($_POST['pekerjaanAyah']) ? $_POST['pekerjaanAyah'] : '';
$no_hp_ayah = isset($_POST['noHpAyah']) ? $_POST['noHpAyah'] : '';

$nama_ibu = isset($_POST['namaIbu']) ? $_POST['namaIbu'] : '';
$tempat_tanggal_lahir_ibu = isset($_POST['ttlIbu']) ? $_POST['ttlIbu'] : '';
$pendidikan_ibu = isset($_POST['pendidikanIbu']) ? $_POST['pendidikanIbu'] : '';
$pekerjaan_ibu = isset($_POST['pekerjaanIbu']) ? $_POST['pekerjaanIbu'] : '';
$no_hp_ibu = isset($_POST['noHpIbu']) ? $_POST['noHpIbu'] : '';

$tinggi_badan = isset($_POST['tinggi_badan']) ? $_POST['tinggi_badan'] : '';
$berat_badan = isset($_POST['berat_badan']) ? $_POST['berat_badan'] : '';
$jarak_sekolah = isset($_POST['jarak_ke_sekolah']) ? $_POST['jarak_ke_sekolah'] : '';
$waktu_tempuh = isset($_POST['waktu_tempuh']) ? $_POST['waktu_tempuh'] : '';
$penyakit = isset($_POST['penyakit_yang_diderita']) ? $_POST['penyakit_yang_diderita'] : '';
$hal_lain = isset($_POST['hal_yang_dikemukakan']) ? $_POST['hal_yang_dikemukakan'] : '';

$query = mysqli_query($connection, "INSERT INTO siswa_b2(nis, nama_siswa, jenis_kelamin, nik, tempat_tanggal_lahir, agama, jumlah_saudara_kandung, alamat, kewarganegaraan, nama_ayah, tempat_tanggal_lahir_ayah, pendidikan_ayah, pekerjaan_ayah, no_hp_ayah, nama_ibu, tempat_tanggal_lahir_ibu, pendidikan_ibu, pekerjaan_ibu, no_hp_ibu, tinggi_badan, berat_badan, jarak_ke_sekolah, waktu_tempuh, penyakit_yang_diderita, hal_yang_dikemukakan) VALUES('$nis', '$nama_siswa', '$jenis_kelamin', '$nik', '$tempat_tanggal_lahir', '$agama', '$jumlah_saudara', '$alamat', '$kewarganegaraan', '$nama_ayah', '$tempat_tanggal_lahir_ayah', '$pendidikan_ayah', '$pekerjaan_ayah', '$no_hp_ayah', '$nama_ibu', '$tempat_tanggal_lahir_ibu', '$pendidikan_ibu', '$pekerjaan_ibu', '$no_hp_ibu', '$tinggi_badan', '$berat_badan', '$jarak_sekolah', '$waktu_tempuh', '$penyakit', '$hal_lain')");

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
