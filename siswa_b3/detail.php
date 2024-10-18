<?php 
require_once('../helper/connection.php'); 

$nis = $_GET['nis'];
$result = mysqli_query($connection, "SELECT * FROM siswa_b3 WHERE nis='$nis'");
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Detail Siswa &mdash; TK Pertiwi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Detail Siswa</h4>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">
                <h4>Identitas Anak</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="namaSiswa">Nama Siswa:</label>
                  <p><?= $data['nama_siswa'] ?></p>
                </div>
                <div class="form-group">
                  <label for="nis">NIS:</label>
                  <p><?= $data['nis'] ?></p>
                </div>
                <div class="form-group">
                  <label for="jenisKelamin">Jenis Kelamin:</label>
                  <p><?= $data['jenis_kelamin'] ?></p>
                </div>
                <div class="form-group">
                  <label for="nik">NIK:</label>
                  <p><?= $data['nik'] ?></p>
                </div>
                <div class="form-group">
                  <label for="ttl">Tempat Tanggal Lahir:</label>
                  <p><?= $data['tempat_tanggal_lahir'] ?></p>
                </div>
                <div class="form-group">
                  <label for="agama">Agama:</label>
                  <p><?= $data['agama'] ?></p>
                </div>
                <div class="form-group">
                  <label for="jumlahSaudara">Jumlah Saudara Kandung:</label>
                  <p><?= $data['jumlah_saudara_kandung'] ?></p>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat:</label>
                  <p><?= $data['alamat'] ?></p>
                </div>
                <div class="form-group">
                  <label for="kewarganegaraan">Kewarganegaraan:</label>
                  <p><?= $data['kewarganegaraan'] ?></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-header">
                <h4>Keterangan Lain</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="tinggi_badan">Tinggi Badan:</label>
                  <p><?= $data['tinggi_badan']; echo(' cm') ?></p>
                </div>
                <div class="form-group">
                  <label for="berat_badan">Berat Badan:</label>
                  <p><?= $data['berat_badan']; echo(' kg') ?></p>
                </div>
                <div class="form-group">
                  <label for="jarak_ke_sekolah">Jarak ke Sekolah (km):</label>
                  <p><?= $data['jarak_ke_sekolah'] ?></p>
                </div>
                <div class="form-group">
                  <label for="waktu_tempuh">Waktu Tempuh (menit):</label>
                  <p><?= $data['waktu_tempuh'] ?></p>
                </div>
                <div class="form-group">
                  <label for="penyakit_yang_diderita">Penyakit yang Pernah Diderita:</label>
                  <p><?= $data['penyakit_yang_diderita'] ?></p>
                </div>
                <div class="form-group">
                  <label for="hal_yang_dikemukakan">Hal yang Perlu Diketahui:</label>
                  <p><?= $data['hal_yang_dikemukakan']?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="card mb-4">
          <div class="card-header">
            <h4>Identitas Orang Tua</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="namaAyah">Nama Ayah:</label>
                  <p><?= $data['nama_ayah'] ?></p>
                </div>
                <div class="form-group">
                  <label for="ttlAyah">Tempat Tanggal Lahir Ayah:</label>
                  <p><?= $data['tempat_tanggal_lahir_ayah'] ?></p>
                </div>
                <div class="form-group">
                  <label for="pendidikanAyah">Pendidikan Ayah:</label>
                  <p><?= $data['pendidikan_ayah'] ?></p>
                </div>
                <div class="form-group">
                  <label for="pekerjaanAyah">Pekerjaan Ayah:</label>
                  <p><?= $data['pekerjaan_ayah'] ?></p>
                </div>
                <div class="form-group">
                  <label for="noHpAyah">No HP Ayah:</label>
                  <p><?= $data['no_hp_ayah'] ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="namaIbu">Nama Ibu:</label>
                  <p><?= $data['nama_ibu'] ?></p>
                </div>
                <div class="form-group">
                  <label for="ttlIbu">Tempat Tanggal Lahir Ibu:</label>
                  <p><?= $data['tempat_tanggal_lahir_ibu'] ?></p>
                </div>
                <div class="form-group">
                  <label for="pendidikanIbu">Pendidikan Ibu:</label>
                  <p><?= $data['pendidikan_ibu'] ?></p>
                </div>
                <div class="form-group">
                  <label for="pekerjaanIbu">Pekerjaan Ibu:</label>
                  <p><?= $data['pekerjaan_ibu'] ?></p>
                </div>
                <div class="form-group">
                  <label for="noHpIbu">No HP Ibu:</label>
                  <p><?= $data['no_hp_ibu'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group text-center">
          <button type="button" class="btn btn-danger" onclick="window.history.back();">Kembali</button>
          <a href="print.php?nis=<?= $data['nis'] ?>" class="btn btn-info" target="_blank">Konversi ke PDF</a>
        </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>
