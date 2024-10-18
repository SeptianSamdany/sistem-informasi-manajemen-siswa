<?php 

require_once('../helper/connection.php'); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; TK Pertiwi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="../assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Formulir Pendaftaran Siswa</h4>
      </div>
      <div class="container">
        <form action="./store.php" method="POST">
          <div class="row">
            <!-- Bagian Identitas Anak -->
            <div class="col-md-6">
              <div class="card mb-4">
                <div class="card-header">
                  <h4>Identitas Anak</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="namaSiswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="namaSiswa" name="namaSiswa" required>
                  </div>
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" required>
                  </div>
                  <div class="form-group">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenisKelamin" name="jenisKelamin" required>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                  </div>
                  <div class="form-group">
                    <label for="ttl">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" id="ttl" name="ttl" required>
                  </div>
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control" id="agama" name="agama" required>
                  </div>
                  <div class="form-group">
                    <label for="jumlahSaudara">Jumlah Saudara Kandung</label>
                    <input type="number" class="form-control" id="jumlahSaudara" name="jumlah_saudara_kandung" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                  </div>
                  <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Bagian Keterangan Lain -->
            <div class="col-md-6">
              <div class="card mb-4">
                <div class="card-header">
                  <h4>Keterangan Lain</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="tinggi_badan">Tinggi Badan</label>
                    <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
                  </div>
                  <div class="form-group">
                    <label for="berat_badan">Berat Badan</label>
                    <input type="number" class="form-control" id="berat_badan" name="berat_badan" required>
                  </div>
                  <div class="form-group">
                    <label for="jarak_ke_sekolah">Jarak ke Sekolah (km)</label>
                    <input type="number" class="form-control" id="jarak_ke_sekolah" name="jarak_ke_sekolah" required>
                  </div>
                  <div class="form-group">
                    <label for="waktu_tempuh">Waktu Tempuh (menit)</label>
                    <input type="number" class="form-control" id="waktu_tempuh" name="waktu_tempuh" required>
                  </div>
                  <div class="form-group">
                    <label for="penyakit_yang_diderita">Penyakit yang Pernah Diderita</label>
                    <input type="text" class="form-control" id="penyakit_yang_diderita" name="penyakit_yang_diderita" required>
                  </div>
                  <div class="form-group">
                    <label for="hal_yang_dikemukakan">Hal yang Perlu Diketahui</label>
                    <input type="text" class="form-control" id="hal_yang_dikemukakan" name="hal_yang_dikemukakan" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Bagian Identitas Orang Tua -->
          <div class="card mb-4">
            <div class="card-header">
              <h4>Identitas Orang Tua</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="namaAyah">Nama Ayah</label>
                    <input type="text" class="form-control" id="namaAyah" name="namaAyah" required>
                  </div>
                  <div class="form-group">
                    <label for="ttlAyah">Tempat Tanggal Lahir Ayah</label>
                    <input type="text" class="form-control" id="ttlAyah" name="ttlAyah" required>
                  </div>
                  <div class="form-group">
                    <label for="pendidikanAyah">Pendidikan Ayah</label>
                    <input type="text" class="form-control" id="pendidikanAyah" name="pendidikanAyah" required>
                  </div>
                  <div class="form-group">
                    <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="pekerjaanAyah" name="pekerjaanAyah" required>
                  </div>
                  <div class="form-group">
                    <label for="noHpAyah">No HP Ayah</label>
                    <input type="text" class="form-control" id="noHpAyah" name="noHpAyah" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="namaIbu">Nama Ibu</label>
                    <input type="text" class="form-control" id="namaIbu" name="namaIbu" required>
                  </div>
                  <div class="form-group">
                    <label for="ttlIbu">Tempat Tanggal Lahir Ibu</label>
                    <input type="text" class="form-control" id="ttlIbu" name="ttlIbu" required>
                  </div>
                  <div class="form-group">
                    <label for="pendidikanIbu">Pendidikan Ibu</label>
                    <input type="text" class="form-control" id="pendidikanIbu" name="pendidikanIbu" required>
                  </div>
                  <div class="form-group">
                    <label for="pekerjaanIbu">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="pekerjaanIbu" name="pekerjaanIbu" required>
                  </div>
                  <div class="form-group">
                    <label for="noHpIbu">No HP Ibu</label>
                    <input type="text" class="form-control" id="noHpIbu" name="noHpIbu" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="button" class="btn btn-danger" onclick="window.history.back();">Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="../assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="../assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="../assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="../assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/forms-advanced-forms.js"></script>
  
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>
</html>
