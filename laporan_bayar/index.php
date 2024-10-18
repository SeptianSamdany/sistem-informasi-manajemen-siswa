<?php

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
<?php
require_once('../layout/_header.php');
require_once('../layout/_sidenav.php');
?>

<div class="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Laporan Pembayaran</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Pembayaran</a></div>
                        <div class="breadcrumb-item">Laporan Pembayaran</div>
                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title">Informasi Pembayaran</h2>
                    <p class="section-lead">Halaman ini berisi informasi terkait pembayaran SPP, uang alat, dan uang tahunan di TK Pertiwi DWP Tasikmalaya.</p>
                    
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-header" style="margin-bottom: -30px;">
                                     <h4>SPP</h4>
                                </div>
                                <div class="card-body">
                                    <p>Informasi tentang pembayaran SPP.</p>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="../pembayaran_spp_a1/index.php" class="btn btn-primary btn-block">Kelas A1</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_spp_a2/index.php" class="btn btn-primary btn-block">Kelas A2</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_spp_b1/index.php" class="btn btn-primary btn-block">Kelas B1</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_spp_b2/index.php" class="btn btn-primary btn-block">Kelas B2</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_spp_b3/index.php" class="btn btn-primary btn-block">Kelas B3</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-header" style="margin-bottom: -30px;">
                                    <h4>Uang Alat</h4>
                                </div>
                                <div class="card-body">
                                    <p>Informasi tentang pembayaran uang alat.</p>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="../pembayaran_alat_a1/index.php" class="btn btn-primary btn-block">Kelas A1</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_alat_a2/index.php" class="btn btn-primary btn-block">Kelas A2</a>
                                        </li>
                                        <li class="list-group-item">
                                           <a href="../pembayaran_alat_b1/index.php" class="btn btn-primary btn-block">Kelas B1</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_alat_b2/index.php" class="btn btn-primary btn-block">Kelas B2</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_alat_b3/index.php" class="btn btn-primary btn-block">Kelas B3</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-whitesmoke">

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-header" style="margin-bottom: -30px;">
                                    <h4>Uang Tahunan</h4>
                                </div>
                                <div class="card-body">
                                    <p>Informasi tentang pembayaran uang tahunan.</p>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="../pembayaran_tahun_a1/index.php" class="btn btn-primary btn-block">Kelas A1</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_tahun_a2/index.php" class="btn btn-primary btn-block">Kelas A2</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_tahun_b1/index.php" class="btn btn-primary btn-block">Kelas B1</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_tahun_b2/index.php" class="btn btn-primary btn-block">Kelas B2</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="../pembayaran_tahun_b3/index.php" class="btn btn-primary btn-block">Kelas B3</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="card-header">
                            <h4>Example Card</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            This is card footer
                        </div>
                    </div> -->
                </div>
            </section>
        </div>
    </div>
</div>

<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2024 HMSI</a>
  </div>
  <div class="footer-right">

  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../assets/modules/jquery.sparkline.min.js"></script>
<script src="../assets/modules/Chart.min.js"></script>
<script src="../assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="../assets/modules/summernote/summernote-bs4.js"></script>
<script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="../assets/modules/datatables/datatables.min.js"></script>
<script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/modules/izitoast/js/iziToast.min.js"></script>

<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="../assets/js/page/index.js"></script>
</body>

</html>

