<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nis = $_GET['nis'];
$query = mysqli_query($connection, "SELECT * FROM pembayaran_spp_b3 WHERE nis='$nis'");
$row = mysqli_fetch_array($query);

function formatRupiah($number)
{
    return number_format($number, 0, ',', '.');
}
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Pembayaran SPP</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="./update.php" method="post">
            <input type="hidden" name="nis" value="<?= $row['nis'] ?>">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>NIS</td>
                <td><input class="form-control" required value="<?= $row['nis'] ?>" disabled></td>
              </tr>
              <tr>
                <td>Nama Siswa</td>
                <td><input class="form-control" type="text" name="nama_siswa" required value="<?= $row['nama_siswa'] ?>"></td>
              </tr>
              <tr>
                <td>Tanggal Bayar</td>
                <td><input class="form-control" type="date" name="tanggal_bayar" required value="<?= $row['tanggal_bayar'] ?>"></td>
              </tr>
              <tr>
                <td>Tagihan</td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp . </span>
                    </div>
                    <input class="form-control" type="number" step="0.01" id="tagihan" name="tagihan" required value="<?= preg_replace('/[^\d]/', '', $row['tagihan']) ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Uang Masuk</td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp . </span>
                    </div>
                    <input class="form-control" type="number" step="0.01" id="uang_masuk" name="uang_masuk" required value="<?= preg_replace('/[^\d]/', '', $row['uang_masuk']) ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Sisa Bayar</td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp . </span>
                    </div>
                    <input class="form-control" type="text" id="sisa_bayar" name="sisa_bayar" readonly value="<?= 'Rp . ' . formatRupiah(floor(preg_replace('/[^\d]/', '', $row['sisa_bayar']))) ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="submit" class="btn btn-primary" name="proses" value="Ubah">
                  <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once '../layout/_bottom.php'; ?>

<!-- Custom Script -->
<script>
  function formatRupiah(number) {
    return new Intl.NumberFormat('id-ID', { style: 'decimal', minimumFractionDigits: 0 }).format(number);
  }

  function updateSisaBayar() {
    var tagihan = parseFloat(document.getElementById('tagihan').value) || 0;
    var uangMasuk = parseFloat(document.getElementById('uang_masuk').value) || 0;
    var sisaBayar = Math.floor(tagihan - uangMasuk);
    document.getElementById('sisa_bayar').value = "Rp . " + formatRupiah(sisaBayar);
  }

  document.getElementById('uang_masuk').addEventListener('input', updateSisaBayar);
  document.getElementById('tagihan').addEventListener('input', updateSisaBayar);
</script>
