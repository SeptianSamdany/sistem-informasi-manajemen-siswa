<?php 
require_once('../layout/_top.php'); 
require_once('../helper/connection.php'); 

// Ambil informasi SPP tahun ini
$current_year = date('Y');
$query_spp_this_year = mysqli_query($connection, "SELECT SUM(nominal) as total_spp_this_year FROM spp WHERE tahun = '$current_year'");
$data_spp_this_year = mysqli_fetch_assoc($query_spp_this_year);
$total_spp_this_year = $data_spp_this_year['total_spp_this_year'];

$result = mysqli_query($connection, "SELECT * FROM pembayaran");

?> 

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Data Pembayaran</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
    <a href="print_laporan.php" class="btn btn-secondary">Cetak Laporan</a>
  </div>
  <!-- Informasi SPP Tahun Ini -->
  <div class="row mb-1">
    <div class="col-lg-6 col-lg-12 col-sm-12 col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h4>Informasi SPP Tahun Ini</h4>
        </div>
        <div class="card-body">
          <p>Tagihan SPP Tahun Ini: <b> <?= "Rp " . number_format($total_spp_this_year, 0, ',', '.') ?></b></p>
        </div>
      </div>
    </div>
  </div>
  <!-- Tabel Data Pembayaran -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>ID Pembayaran</th>
                  <th>Tanggal Bayar</th>
                  <th>Total Bayar</th>
                  <th>Keterangan</th>
                  <th>ID SPP</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['nama_siswa'] ?></td>
                    <td><?= $data['nis'] ?></td>
                    <td style="text-align: center;"><?= $data['id_pembayaran'] ?></td>
                    <td><?= $data['tanggal_bayar'] ?></td>
                    <td><?= 'Rp ' . number_format($data['total_bayar'], 0, ',', '.') ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td><?= $data['id_spp'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id_pembayaran=<?= $data['id_pembayaran'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id_pembayaran=<?= $data['id_pembayaran'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                  </tr>

                <?php
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>
