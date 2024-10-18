<?php 
require_once('../layout/_top.php'); 
require_once('../helper/connection.php'); 

$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '';

$query = "SELECT * FROM pembayaran_spp_a1";
if ($bulan && $tahun) {
    $query .= " WHERE MONTH(tanggal_bayar) = '$bulan' AND YEAR(tanggal_bayar) = '$tahun'";
}

$result = mysqli_query($connection, $query);

$namaBulan = '';
if ($bulan) {
    $namaBulan = date('F', mktime(0, 0, 0, $bulan, 10));
}
?> 

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Data Pembayaran SPP Kelas A1</h1>
        <a href="./create.php" class="btn btn-primary" style="margin-right: 150px;">Tambah Data</a>
        <a href="../laporan_bayar/index.php" class="btn btn-danger">Kembali</a>
    </div>
    <form method="get" action="" class="form-inline mb-3">
        <div class="form-group mx-sm-3 mb-2">
            <label for="bulan" class="mr-2">Pilih Bulan:</label>
            <select name="bulan" id="bulan" class="form-control">
                <option value="">--Pilih Bulan--</option>
                <?php 
                for ($m=1; $m<=12; $m++) {
                    $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                    $value = str_pad($m, 2, '0', STR_PAD_LEFT);
                    echo "<option value='$value' ".($bulan == $value ? 'selected' : '').">$month</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="tahun" class="mr-2">Pilih Tahun:</label>
            <select name="tahun" id="tahun" class="form-control">
                <option value="">--Pilih Tahun--</option>
                <?php 
                for ($y=2023; $y<=2026; $y++) {
                    echo "<option value='$y' ".($tahun == $y ? 'selected' : '').">$y</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-info mb-2">Filter</button>
    </form>

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
                                <th>Tanggal Bayar</th>
                                <th>Tagihan</th>
                                <th>Uang Masuk</th>
                                <th>Sisa Bayar</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_array($result)) :
                                // Remove non-numeric characters and convert to float
                                $tagihan = (float) preg_replace('/[^\d]/', '', $data['tagihan']);
                                $uang_masuk = (float) preg_replace('/[^\d]/', '', $data['uang_masuk']);
                                $sisa_bayar = (float) preg_replace('/[^\d]/', '', $data['sisa_bayar']);
                            ?>
                                <tr class="text-center">
                                    <td><?= $data['nis'] ?></td>
                                    <td><?= $data['nama_siswa'] ?></td>
                                    <td><?= $data['tanggal_bayar'] ?></td>
                                    <td>Rp. <?= number_format($tagihan, 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($uang_masuk, 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($sisa_bayar, 0, ',', '.') ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?nis=<?= $data['nis'] ?>">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </a>
                                        <a class="btn btn-sm btn-info mb-md-0 mb-1" href="edit.php?nis=<?= $data['nis'] ?>">
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
    var bulan = '<?= $namaBulan ?>';
    var tahun = '<?= $tahun ?>';

    $('#table-1').DataTable({
      dom: 'Bfrtip',
      paging: false,  // Menghilangkan fitur paging
      searching: false,  // Menghilangkan fitur searching
        buttons: [
                   {
                      extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> Export to PDF',
                        className: 'btn-pdf',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        title: 'Data Pembayaran SPP Kelas A1 Bulan ' + bulan + ' Tahun ' + tahun,
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        },
                        customize: function(doc) {
                            doc.content[1].table.widths = [
                                '15%',
                                '20%',
                                '20%',
                                '15%',
                                '15%',
                                '15%'
                            ];

                            var objLayout = {};
                            objLayout['hLineWidth'] = function(i) { return .5; };
                            objLayout['vLineWidth'] = function(i) { return .5; };
                            objLayout['hLineColor'] = function(i) { return '#aaa'; };
                            objLayout['vLineColor'] = function(i) { return '#aaa'; };
                            objLayout['paddingLeft'] = function(i) { return 4; };
                            objLayout['paddingRight'] = function(i) { return 4; };
                            objLayout['paddingTop'] = function(i) { return 2; };
                            objLayout['paddingBottom'] = function(i) { return 2; };
                            doc.content[1].layout = objLayout;

                            // Center-align all cells
                            doc.styles.tableHeader.alignment = 'center';
                            doc.styles.tableBodyEven.alignment = 'center';
                            doc.styles.tableBodyOdd.alignment = 'center';
                        }
                    }
                ]
            });
        });
</script>

<style>
    .dataTables_info {
    display: none;
  }
</style>