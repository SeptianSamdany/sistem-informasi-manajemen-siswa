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
        <h4>Formulir Pembayaran Alat</h4>
      </div>
      <div class="container">
        <form action="./store.php" method="POST">
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" required>
          </div>
          <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
          </div>
          <div class="form-group">
            <label for="tagihan">Tagihan</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp .</span>
              </div>
              <input type="number" step="0.01" class="form-control" id="tagihan" name="tagihan" placeholder="Contoh : 200000" required>
            </div>
          </div>
          <div class="form-group">
            <label for="angsuran_ke_1">Angsuran Ke-1</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp .</span>
              </div>
              <input type="number" step="0.01" class="form-control" id="angsuran_ke_1" name="angsuran_ke_1" placeholder="Contoh : 50000" required>
            </div>
          </div>
          <div class="form-group">
            <label for="angsuran_ke_2">Angsuran Ke-2</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp .</span>
              </div>
              <input type="number" step="0.01" class="form-control" id="angsuran_ke_2" name="angsuran_ke_2" required>
            </div>
          </div>
          <div class="form-group">
            <label for="angsuran_ke_3">Angsuran Ke-3</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp .</span>
              </div>
              <input type="number" step="0.01" class="form-control" id="angsuran_ke_3" name="angsuran_ke_3" required>
            </div>
          </div>
          <div class="form-group">
            <label for="sisa_tagihan">Sisa Tagihan</label>
            <input type="text" class="form-control" id="sisa_tagihan" name="sisa_tagihan" placeholder="Rp . 0" readonly>
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

  <!-- JS Libraries -->
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

  <!-- Custom Script -->
  <script>
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp . ' + rupiah : '');
    }

    function calculateSisaTagihan() {
      var tagihan = parseFloat(document.getElementById('tagihan').value) || 0;
      var angsuran1 = parseFloat(document.getElementById('angsuran_ke_1').value) || 0;
      var angsuran2 = parseFloat(document.getElementById('angsuran_ke_2').value) || 0;
      var angsuran3 = parseFloat(document.getElementById('angsuran_ke_3').value) || 0;
      var sisaTagihan = tagihan - (angsuran1 + angsuran2 + angsuran3);
      document.getElementById('sisa_tagihan').value = formatRupiah(sisaTagihan.toString(), 'Rp . ');
    }

    document.getElementById('tagihan').addEventListener('input', calculateSisaTagihan);
    document.getElementById('angsuran_ke_1').addEventListener('input', calculateSisaTagihan);
    document.getElementById('angsuran_ke_2').addEventListener('input', calculateSisaTagihan);
    document.getElementById('angsuran_ke_3').addEventListener('input', calculateSisaTagihan);
  </script>
</body>
</html>
