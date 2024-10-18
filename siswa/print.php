<?php
require_once '../helper/connection.php';
require_once '../vendor/autoload.php';
use Dompdf\Dompdf;

$nis = $_GET['nis'];
$result = mysqli_query($connection, "SELECT * FROM siswa WHERE nis='$nis'");
$data = mysqli_fetch_array($result);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Detail Siswa &mdash; TK Pertiwi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body { font-family: Arial, sans-serif; }
    .container { margin-top: 30px; }
    .header { text-align: center; margin-bottom: 30px; }
    .header h4 { font-size: 24px; font-weight: bold; }
    .card-header { background-color: #007bff; color: white; font-weight: bold; }
    .form-group { margin-bottom: 10px; }
    .form-row { display: flex; margin-bottom: 10px; }
    .form-row label { font-weight: bold; margin-right: 10px; width: 150px; }
    .form-row p { margin: 0; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h4>Detail Siswa</h4>
    </div>
    <div class="card mb-4">
      <div class="card-header">Identitas Anak</div>
      <div class="card-body">
        <div class="form-row">
          <p>1. Nama Siswa : ' . htmlspecialchars($data['nama_siswa']) . '</p>
        </div>
        <div class="form-row">
          <label>NIS:</label>
          <p>' . htmlspecialchars($data['nis']) . '</p>
        </div>
        <div class="form-row">
          <label>Jenis Kelamin:</label>
          <p>' . htmlspecialchars($data['jenis_kelamin']) . '</p>
        </div>
        <div class="form-row">
          <label>NIK:</label>
          <p>' . htmlspecialchars($data['nik']) . '</p>
        </div>
        <div class="form-row">
          <label>Tempat Tanggal Lahir:</label>
          <p>' . htmlspecialchars($data['tempat_tanggal_lahir']) . '</p>
        </div>
        <div class="form-row">
          <label>Agama:</label>
          <p>' . htmlspecialchars($data['agama']) . '</p>
        </div>
        <div class="form-row">
          <label>Jumlah Saudara Kandung:</label>
          <p>' . htmlspecialchars($data['jumlah_saudara_kandung']) . '</p>
        </div>
        <div class="form-row">
          <label>Alamat:</label>
          <p>' . htmlspecialchars($data['alamat']) . '</p>
        </div>
        <div class="form-row">
          <label>Kewarganegaraan:</label>
          <p>' . htmlspecialchars($data['kewarganegaraan']) . '</p>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">Identitas Orang Tua</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-row">
              <label>Nama Ayah:</label>
              <p>' . htmlspecialchars($data['nama_ayah']) . '</p>
            </div>
            <div class="form-row">
              <label>Tempat Tanggal Lahir Ayah:</label>
              <p>' . htmlspecialchars($data['tempat_tanggal_lahir_ayah']) . '</p>
            </div>
            <div class="form-row">
              <label>Pendidikan Ayah:</label>
              <p>' . htmlspecialchars($data['pendidikan_ayah']) . '</p>
            </div>
            <div class="form-row">
              <label>Pekerjaan Ayah:</label>
              <p>' . htmlspecialchars($data['pekerjaan_ayah']) . '</p>
            </div>
            <div class="form-row">
              <label>No HP Ayah:</label>
              <p>' . htmlspecialchars($data['no_hp_ayah']) . '</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-row">
              <label>Nama Ibu:</label>
              <p>' . htmlspecialchars($data['nama_ibu']) . '</p>
            </div>
            <div class="form-row">
              <label>Tempat Tanggal Lahir Ibu:</label>
              <p>' . htmlspecialchars($data['tempat_tanggal_lahir_ibu']) . '</p>
            </div>
            <div class="form-row">
              <label>Pendidikan Ibu:</label>
              <p>' . htmlspecialchars($data['pendidikan_ibu']) . '</p>
            </div>
            <div class="form-row">
              <label>Pekerjaan Ibu:</label>
              <p>' . htmlspecialchars($data['pekerjaan_ibu']) . '</p>
            </div>
            <div class="form-row">
              <label>No HP Ibu:</label>
              <p>' . htmlspecialchars($data['no_hp_ibu']) . '</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">Keterangan Lain</div>
      <div class="card-body">
        <div class="form-row">
          <label>Tinggi Badan:</label>
          <p>' . htmlspecialchars($data['tinggi_badan']) . ' cm</p>
        </div>
        <div class="form-row">
          <label>Berat Badan:</label>
          <p>' . htmlspecialchars($data['berat_badan']) . ' kg</p>
        </div>
        <div class="form-row">
          <label>Jarak ke Sekolah (km):</label>
          <p>' . htmlspecialchars($data['jarak_ke_sekolah']) . ' km</p>
        </div>
        <div class="form-row">
          <label>Waktu Tempuh (menit):</label>
          <p>' . htmlspecialchars($data['waktu_tempuh'])  . ' menit</p>
        </div>
        <div class="form-row">
          <label>Penyakit yang Pernah Diderita:</label>
          <p>' . htmlspecialchars($data['penyakit_yang_diderita']) . '</p>
        </div>
        <div class="form-row">
          <label>Hal yang Perlu Diketahui:</label>
          <p>' . htmlspecialchars($data['hal_yang_dikemukakan']) . '</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Detail_Siswa_' . htmlspecialchars($data['nis']) . '.pdf', array("Attachment" => 0));
?>
