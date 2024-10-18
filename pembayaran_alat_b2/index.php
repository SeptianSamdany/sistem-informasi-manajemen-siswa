<?php

require_once('../layout/_top.php'); 
require_once('../helper/connection.php'); 

$result = mysqli_query($connection, "SELECT * FROM pembayaran_alat_b2");
?> 

<section class="section">
  <div class="section-header d-flex justify-content-between">
      <h1>Data Pembayaran Alat Kelas B2</h1>
      <a href="./create.php" class="btn btn-primary" style="margin-right: 150px;">Tambah Data</a>
      <a href="../laporan_bayar/index.php" class="btn btn-danger">Kembali</a>
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
                        <th>Tagihan</th>
                        <th>Angsuran Ke-1</th>
                        <th>Angsuran Ke-2</th>
                        <th>Angsuran Ke-3</th>
                        <th>Sisa Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_array($result)) :
                    ?>
                        <tr class="text-center">
                            <td><?= htmlspecialchars($data['nis']) ?></td>
                            <td><?= htmlspecialchars($data['nama_siswa']) ?></td>
                            <td>Rp. <?= number_format((float)$data['tagihan'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format((float)$data['angsuran_ke_1'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format((float)$data['angsuran_ke_2'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format((float)$data['angsuran_ke_3'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format((float)$data['sisa_tagihan'], 0, ',', '.') ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?nis=<?= htmlspecialchars($data['nis']) ?>">
                                    <i class="fas fa-trash fa-fw"></i>
                                </a>
                                <a class="btn btn-sm btn-info mb-md-0 mb-1" href="edit.php?nis=<?= htmlspecialchars($data['nis']) ?>">
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
        message: <?= json_encode($_SESSION['info']['message']) ?>,
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
        message: <?= json_encode($_SESSION['info']['message']) ?>,
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
<!-- DataTables and Buttons JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.pdfmake.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table-1').DataTable({
      paging: false,  // Menghilangkan fitur paging
      searching: false,  // Menghilangkan fitur searching
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'pdfHtml5',
          text: '<i class="fas fa-file-pdf"></i> Export to PDF',
          className: 'btn-pdf',
          orientation: 'landscape', // Ubah orientasi ke landscape untuk lebar tabel
          pageSize: 'A4',
          title: 'Data Pembayaran Alat Kelas B2',
          exportOptions: {
            columns: ':visible:not(:last-child)' // Menghilangkan kolom terakhir (Aksi)
          },
          customize: function(doc) {
            // Menyesuaikan lebar kolom
            doc.content[1].table.widths = [
              '10%',
              '15%',
              '15%',
              '15%',
              '15%',
              '15%',
              '15%'
            ];
            // Menambahkan garis pada kolom tabel
            doc.styles.tableHeader = {
              fillColor: '#2d4154',
              color: 'white',
              alignment: 'center'
            };
            doc.styles.tableBodyEven = {
              alignment: 'center'
            };
            doc.styles.tableBodyOdd = {
              fillColor: '#f3f3f3',
              alignment: 'center'
            };
            doc.content[1].layout = {
              hLineWidth: function(i, node) {
                return 0.5;
              },
              vLineWidth: function(i, node) {
                return 0.5;
              },
              hLineColor: function(i, node) {
                return '#aaa';
              },
              vLineColor: function(i, node) {
                return '#aaa';
              },
              paddingLeft: function(i, node) {
                return 4;
              },
              paddingRight: function(i, node) {
                return 4;
              }
            };
          }
        },
      ]
    });
  });
</script>

<!-- Custom CSS for DataTables Buttons -->
<style>
  .dt-button {
    color: white;
    border: none;
    padding: 10px 20px;
    margin: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
  }
  .dt-button:hover {
    transform: translateY(-2px);
  }
  .dt-button:focus {
    outline: none;
  }
  .dt-button i {
    margin-right: 8px;
  }
  .btn-pdf {
    background-color: #dc3545; /* Merah */
    border-radius: 10px;
  }
  .btn-pdf:hover {
    background-color: #c82333; /* Merah lebih gelap saat hover */
  }
  .dataTables_info {
    display: none;
  }
</style>
