<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nis = $_GET['nis'];
$query = mysqli_query($connection, "SELECT * FROM pembayaran_tahun_b3 WHERE nis='$nis'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Pembayaran Tahunan</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
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
                  <td>Tagihan</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="number" step="0.01" class="form-control" name="tagihan" id="tagihan" required value="<?= $row['tagihan'] ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Angsuran Ke-1</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="number" step="0.01" class="form-control" name="angsuran_ke_1" id="angsuran_ke_1" required value="<?= $row['angsuran_ke_1'] ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Angsuran Ke-2</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="number" step="0.01" class="form-control" name="angsuran_ke_2" id="angsuran_ke_2" required value="<?= $row['angsuran_ke_2'] ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Angsuran Ke-3</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="number" step="0.01" class="form-control" name="angsuran_ke_3" id="angsuran_ke_3" required value="<?= $row['angsuran_ke_3'] ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Angsuran Ke-4</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="number" step="0.01" class="form-control" name="angsuran_ke_4" id="angsuran_ke_4" required value="<?= $row['angsuran_ke_4'] ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Angsuran Ke-5</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="number" step="0.01" class="form-control" name="angsuran_ke_5" id="angsuran_ke_5" required value="<?= $row['angsuran_ke_5'] ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Sisa Tagihan</td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input class="form-control" type="text" name="sisa_tagihan" id="sisa_tagihan" required readonly value="<?= $row['sisa_tagihan'] ?>">
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
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once '../layout/_bottom.php'; ?>

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
    return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
  }

  function calculateSisaTagihan() {
    var tagihan = parseFloat(document.getElementById('tagihan').value) || 0;
    var angsuran1 = parseFloat(document.getElementById('angsuran_ke_1').value) || 0;
    var angsuran2 = parseFloat(document.getElementById('angsuran_ke_2').value) || 0;
    var angsuran3 = parseFloat(document.getElementById('angsuran_ke_3').value) || 0;
    var angsuran4 = parseFloat(document.getElementById('angsuran_ke_4').value) || 0;
    var angsuran5 = parseFloat(document.getElementById('angsuran_ke_5').value) || 0;
    
    var sisaTagihan = tagihan - (angsuran1 + angsuran2 + angsuran3 + angsuran4 + angsuran5);
    // Membulatkan ke bilangan bulat terdekat
    sisaTagihan = Math.round(sisaTagihan);
    
    // Format ke mata uang Indonesia dengan prefix 'Rp . '
    document.getElementById('sisa_tagihan').value = formatRupiah(sisaTagihan.toString(), '');
  }

  document.getElementById('tagihan').addEventListener('input', calculateSisaTagihan);
  document.getElementById('angsuran_ke_1').addEventListener('input', calculateSisaTagihan);
  document.getElementById('angsuran_ke_2').addEventListener('input', calculateSisaTagihan);
  document.getElementById('angsuran_ke_3').addEventListener('input', calculateSisaTagihan);
  document.getElementById('angsuran_ke_4').addEventListener('input', calculateSisaTagihan);
  document.getElementById('angsuran_ke_5').addEventListener('input', calculateSisaTagihan);

  // Panggil fungsi sekali saat halaman dimuat untuk menginisialisasi nilai sisa tagihan
  calculateSisaTagihan();
</script>
