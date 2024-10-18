<?php 
require_once('../layout/_top.php'); 
require_once('../helper/connection.php'); 

$result = mysqli_query($connection, "SELECT nis, nama_siswa, jenis_kelamin, alamat, nama_ayah, nama_ibu, no_hp_ayah, no_hp_ibu FROM siswa");

?> 

<section class="section">
  <div class="section-header d-flex justify-content-between">
      <h1>Data Siswa</h1>
      <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr class="text-center">
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>No. HP Ayah</th>
                  <th>No. HP Ibu</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['nis'] ?></td>
                    <td><?= $data['nama_siswa'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['nama_ayah'] ?></td>
                    <td><?= $data['nama_ibu'] ?></td>
                    <td><?= $data['no_hp_ayah'] ?></td>
                    <td><?= $data['no_hp_ibu'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-info" href="detail.php?nis=<?= $data['nis'] ?>">
                        <i class="fas fa-eye fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?nis=<?= $data['nis'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?nis=<?= $data['nis'] ?>">
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
