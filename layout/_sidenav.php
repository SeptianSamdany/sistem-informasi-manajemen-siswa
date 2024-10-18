<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">
        <img src="../assets/img/logo-fix.jpg" alt="logo" width="70" style="margin-top: 10px; margin-bottom:10px">
      </a>
      <h5>TK PERTIWI DWP</h5>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.php">EF</a>
    </div>
    <ul class="sidebar-menu" style="margin-top: 20px;">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="../dashboard/index.php"><i class="fas fa-fire"></i> <span>Home</span></a></li>
      <li class="menu-header">Main Feature</li>
      <!-- <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Siswa</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="../siswa/index.php">List</a></li>
          <li><a class="nav-link" href="../siswa/create.php">Tambah Data</a></li>
        </ul>
      </li> -->
      <li class="">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" onclick="event.preventDefault(); location.href='../laporan_siswa/index.php';"><i class="fas fa-columns"></i> <span>Laporan Siswa</span></a>
      </li>
      <li class="">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" onclick="event.preventDefault(); location.href='../laporan_bayar/index.php';"><i class="fas fa-columns"></i> <span>Laporan Pembayaran</span></a>
      </li>
    </ul>
  </aside>
</div>