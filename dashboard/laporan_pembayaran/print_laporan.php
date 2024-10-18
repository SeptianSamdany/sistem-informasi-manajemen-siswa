<?php
require_once('../helper/connection.php');

// Ambil informasi SPP tahun ini
$current_year = date('Y');
$query_spp_this_year = mysqli_query($connection, "SELECT SUM(nominal) as total_spp_this_year FROM spp WHERE tahun = '$current_year'");
$data_spp_this_year = mysqli_fetch_assoc($query_spp_this_year);
$total_spp_this_year = $data_spp_this_year['total_spp_this_year'];

$result = mysqli_query($connection, "SELECT * FROM pembayaran");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Laporan Pembayaran</title>
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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
    .print-header {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="print-header">
      <h1 style="margin-top: 50px;">Laporan Pembayaran</h1>
      <p>Tagihan SPP Tahun Ini : <b><?= "Rp " . number_format($total_spp_this_year, 0, ',', '.') ?></b></p>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr class="text-center">
          <th>Nama Siswa</th>
          <th>NIS</th>
          <th>ID Pembayaran</th>
          <th>Tanggal Bayar</th>
          <th>Total Bayar</th>
          <th>Keterangan</th>
          <th>ID SPP</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($data = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><?= $data['nama_siswa'] ?></td>
            <td><?= $data['nis'] ?></td>
            <td class="text-center"><?= $data['id_pembayaran'] ?></td>
            <td><?= $data['tanggal_bayar'] ?></td>
            <td><?= 'Rp ' . number_format($data['total_bayar'], 0, ',', '.') ?></td>
            <td><?= $data['keterangan'] ?></td>
            <td><?= $data['id_spp'] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <button class="btn btn-primary no-print" onclick="window.print()">Cetak Laporan</button>
    <a href="index.php" class="btn btn-secondary no-print">Kembali</a>
  </div>
</body>
</html>
