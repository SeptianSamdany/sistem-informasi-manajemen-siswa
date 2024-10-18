<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// Ambil jumlah siswa dari masing-masing kelas
$query_total_siswa_a1 = mysqli_query($connection, "SELECT COUNT(*) as total_siswa_a1 FROM siswa_a1");
$data_total_siswa_a1 = mysqli_fetch_assoc($query_total_siswa_a1);
$total_siswa_a1 = $data_total_siswa_a1['total_siswa_a1'];

$query_total_siswa_a2 = mysqli_query($connection, "SELECT COUNT(*) as total_siswa_a2 FROM siswa_a2");
$data_total_siswa_a2 = mysqli_fetch_assoc($query_total_siswa_a2);
$total_siswa_a2 = $data_total_siswa_a2['total_siswa_a2'];

$query_total_siswa_b1 = mysqli_query($connection, "SELECT COUNT(*) as total_siswa_b1 FROM siswa_b1");
$data_total_siswa_b1 = mysqli_fetch_assoc($query_total_siswa_b1);
$total_siswa_b1 = $data_total_siswa_b1['total_siswa_b1'];

$query_total_siswa_b2 = mysqli_query($connection, "SELECT COUNT(*) as total_siswa_b2 FROM siswa_b2");
$data_total_siswa_b2 = mysqli_fetch_assoc($query_total_siswa_b2);
$total_siswa_b2 = $data_total_siswa_b2['total_siswa_b2'];

$query_total_siswa_b3 = mysqli_query($connection, "SELECT COUNT(*) as total_siswa_b3 FROM siswa_b3");
$data_total_siswa_b3 = mysqli_fetch_assoc($query_total_siswa_b3);
$total_siswa_b3 = $data_total_siswa_b3['total_siswa_b3'];

// Ambil jumlah pembayaran SPP dari masing-masing kelas
$query_pembayaran_spp_a1 = mysqli_query($connection, "SELECT SUM(uang_masuk) as total_spp_a1 FROM pembayaran_spp_a1");
$data_pembayaran_spp_a1 = mysqli_fetch_assoc($query_pembayaran_spp_a1);
$total_spp_a1 = $data_pembayaran_spp_a1['total_spp_a1'];

$query_pembayaran_spp_a2 = mysqli_query($connection, "SELECT SUM(uang_masuk) as total_spp_a2 FROM pembayaran_spp_a2");
$data_pembayaran_spp_a2 = mysqli_fetch_assoc($query_pembayaran_spp_a2);
$total_spp_a2 = $data_pembayaran_spp_a2['total_spp_a2'];

$query_pembayaran_spp_b1 = mysqli_query($connection, "SELECT SUM(uang_masuk) as total_spp_b1 FROM pembayaran_spp_b1");
$data_pembayaran_spp_b1 = mysqli_fetch_assoc($query_pembayaran_spp_b1);
$total_spp_b1 = $data_pembayaran_spp_b1['total_spp_b1'];

$query_pembayaran_spp_b2 = mysqli_query($connection, "SELECT SUM(uang_masuk) as total_spp_b2 FROM pembayaran_spp_b2");
$data_pembayaran_spp_b2 = mysqli_fetch_assoc($query_pembayaran_spp_b2);
$total_spp_b2 = $data_pembayaran_spp_b2['total_spp_b2'];

$query_pembayaran_spp_b3 = mysqli_query($connection, "SELECT SUM(uang_masuk) as total_spp_b3 FROM pembayaran_spp_b3");
$data_pembayaran_spp_b3 = mysqli_fetch_assoc($query_pembayaran_spp_b3);
$total_spp_b3 = $data_pembayaran_spp_b3['total_spp_b3'];
?>

<style>
.custom-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
  transition: 0.6s;
}

.column{
  margin-top: -2rem;
}

</style>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Jumlah Siswa Setiap Kelas</h2>
      </div>
    </div>
    <div class="row">
      <!-- Total Siswa Kelas A1 -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 custom-card">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Siswa Kelas A1</h4>
            </div>
            <div class="card-body">
              <?= $total_siswa_a1 ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Siswa Kelas A2 -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 custom-card">
          <div class="card-icon bg-danger">
            <i class="fas fa-user-friends"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Siswa Kelas A2</h4>
            </div>
            <div class="card-body">
              <?= $total_siswa_a2 ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Siswa Kelas B1 -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 custom-card">
          <div class="card-icon bg-success">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Siswa Kelas B1</h4>
            </div>
            <div class="card-body">
              <?= $total_siswa_b1 ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Siswa Kelas B2 -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 custom-card">
          <div class="card-icon bg-warning">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Siswa Kelas B2</h4>
            </div>
            <div class="card-body">
              <?= $total_siswa_b2 ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Siswa Kelas B3 -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 custom-card">
          <div class="card-icon bg-secondary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Siswa Kelas B3</h4>
            </div>
            <div class="card-body">
              <?= $total_siswa_b3 ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
