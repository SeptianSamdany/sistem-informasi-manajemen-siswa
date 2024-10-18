<?php
require_once '../helper/connection.php';
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;

$nis = $_GET['nis'];
$result = mysqli_query($connection, "SELECT * FROM siswa_b2 WHERE nis='$nis'");
$data = mysqli_fetch_array($result);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Siswa &mdash; TK Pertiwi</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: Roboto, sans-serif;
      font-size: 15px;
      margin: 0;
      padding: 0;
      line-height: 1.5;
      background-color: #f8f9fa;
    }
    .container {
      width: 100%;
      margin: 10px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }
    .card {
      border: 1px solid #ddd;
      border-radius: 10px;
      margin-bottom: 30px;
      padding: 10px;
      background-color: #fff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .card-header-top {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
      text-align: center;
      color: black;
      text-decoration: underline;
      padding: 10px;
      border-bottom: 1px solid #ddd;
      border-radius: 10px 10px 0 0;
    }
    .card-header {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 10px;
      text-align: center;
      background-color: #007bff;
      color: white;
      padding: 5px;
      border-bottom: 1px solid #ddd;
      border-radius: 10px 10px 0 0;
    }
    .card-body {
      padding: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header-top">
        <h4>DETAIL SISWA TK PERTIWI DWP</h4>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>Identitas Anak</h4>
        </div>
        <div class="card-body">
          <table>
            <tr>
              <th>Keterangan Siswa</th>
              <th></th>
            </tr>
            <tr>
              <td>Nama Siswa</td>
              <td>' . htmlspecialchars($data['nama_siswa']) . '</td>
            </tr>
            <tr>
              <td>NIS</td>
              <td>' . htmlspecialchars($data['nis']) . '</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>' . htmlspecialchars($data['jenis_kelamin']) . '</td>
            </tr>
            <tr>
              <td>NIK</td>
              <td>' . htmlspecialchars($data['nik']) . '</td>
            </tr>
            <tr>
              <td>Tempat Tanggal Lahir</td>
              <td>' . htmlspecialchars($data['tempat_tanggal_lahir']) . '</td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>' . htmlspecialchars($data['agama']) . '</td>
            </tr>
            <tr>
              <td>Jumlah Saudara Kandung</td>
              <td>' . htmlspecialchars($data['jumlah_saudara_kandung']) . '</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>' . htmlspecialchars($data['alamat']) . '</td>
            </tr>
            <tr>
              <td>Kewarganegaraan</td>
              <td>' . htmlspecialchars($data['kewarganegaraan']) . '</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="card" style="margin-top: 150px"> 
        <div class="card-header">
          <h4>Keterangan Lain</h4>
        </div>
        <div class="card-body">
          <table>
            <tr>
              <th>Keterangan Lain</th>
              <th></th>
            </tr>
            <tr>
              <td>Tinggi Badan</td>
              <td>' . htmlspecialchars($data['tinggi_badan']) . ' cm</td>
            </tr>
            <tr>
              <td>Berat Badan</td>
              <td>' . htmlspecialchars($data['berat_badan']) . ' kg</td>
            </tr>
            <tr>
              <td>Jarak ke Sekolah (km)</td>
              <td>' . htmlspecialchars($data['jarak_ke_sekolah']) . '</td>
            </tr>
            <tr>
              <td>Waktu Tempuh (menit)</td>
              <td>' . htmlspecialchars($data['waktu_tempuh']) . '</td>
            </tr>
            <tr>
              <td>Penyakit yang Pernah Diderita</td>
              <td>' . htmlspecialchars($data['penyakit_yang_diderita']) . '</td>
            </tr>
            <tr>
              <td>Hal yang Perlu Diketahui</td>
              <td>' . htmlspecialchars($data['hal_yang_dikemukakan']) . '</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>Identitas Orang Tua</h4>
        </div>
        <div class="card-body">
          <table style="margin-bottom: 20px">
            <tr>
              <th>Identitas Ayah</th>
              <th></th>
            </tr>
            <tr>
              <td>Nama Ayah</td>
              <td>' . htmlspecialchars($data['nama_ayah']) . '</td>
            </tr>
            <tr>
              <td>Tempat Tanggal Lahir Ayah</td>
              <td>' . htmlspecialchars($data['tempat_tanggal_lahir_ayah']) . '</td>
            </tr>
            <tr>
              <td>Pendidikan Ayah</td>
              <td>' . htmlspecialchars($data['pendidikan_ayah']) . '</td>
            </tr>
            <tr>
              <td>Pekerjaan Ayah</td>
              <td>' . htmlspecialchars($data['pekerjaan_ayah']) . '</td>
            </tr>
            <tr>
              <td>No HP Ayah</td>
              <td>' . htmlspecialchars($data['no_hp_ayah']) . '</td>
            </tr>
          </table>
          <table style="margin-top: 80px">
            <tr>
              <th>Identitas Ibu</th>
              <th></th>
            </tr>
            <tr>
              <td>Nama Ibu</td>
              <td>' . htmlspecialchars($data['nama_ibu']) . '</td>
            </tr>
            <tr>
              <td>Tempat Tanggal Lahir Ibu</td>
              <td>' . htmlspecialchars($data['tempat_tanggal_lahir_ibu']) . '</td>
            </tr>
            <tr>
              <td>Pendidikan Ibu</td>
              <td>' . htmlspecialchars($data['pendidikan_ibu']) . '</td>
            </tr>
            <tr>
              <td>Pekerjaan Ibu</td>
              <td>' . htmlspecialchars($data['pekerjaan_ibu']) . '</td>
            </tr>
            <tr>
              <td>No HP Ibu</td>
              <td>' . htmlspecialchars($data['no_hp_ibu']) . '</td>
            </tr>
          </table>
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
$dompdf->stream('Detail_Siswa_' . htmlspecialchars($data['nis']) . '.pdf');
?>
