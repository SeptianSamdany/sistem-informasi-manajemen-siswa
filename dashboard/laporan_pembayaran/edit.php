<?php 
require_once('../layout/_top.php'); 
require_once('../helper/connection.php'); 

// Query untuk mengambil data id_spp dari tabel spp 
$sql_spp = "SELECT id_spp FROM spp";
$result_spp = mysqli_query($connection, $sql_spp);

// Query untuk mengambil data nis dari tabel siswa
$sql_siswa = "SELECT nis FROM siswa"; // Mengambil hanya NIS, bukan NIS dan tahun ajaran
$result_siswa = mysqli_query($connection, $sql_siswa);

// Ambil data pembayaran berdasarkan ID Pembayaran yang diberikan
$id_pembayaran = $_GET['id_pembayaran'];
$query_pembayaran = mysqli_query($connection, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
$row_pembayaran = mysqli_fetch_assoc($query_pembayaran);

// Dapatkan NIS dari tabel pembayaran
$nis = $row_pembayaran['nis'];
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Ubah Data Pembayaran</h1>
        <a href="./index.php" class="btn btn-light">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form action="./update.php" method="post">
                        <input type="hidden" name="id_pembayaran" value="<?= $id_pembayaran ?>">
                        <table >
                            <tr>
                                <td>ID Pembayaran</td>
                                <td><input class="form-control" required value="<?= $row_pembayaran['id_pembayaran'] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>ID SPP</td>
                                <td>
                                    <select class="form-control" name="id_spp" required>
                                        <option value="">--Pilih ID SPP--</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result_spp)) {
                                            echo "<option value='" . $row['id_spp'] . "'>" . $row['id_spp'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>NIS</td>
                                <td>
                                    <select class="form-control" name="nis" id="nis" required>
                                        <option value="">--Pilih NIS--</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result_siswa)) {
                                            if ($row['nis'] == $nis) {
                                                echo "<option value='" . $row['nis'] . "' selected>" . $row['nis'] . "</option>"; // Hanya menampilkan NIS saja
                                            } else {
                                                echo "<option value='" . $row['nis'] . "'>" . $row['nis'] . "</option>"; // Hanya menampilkan NIS saja
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td><input class="form-control" type="text" name="nama_siswa" id="nama_siswa" readonly></td>
                            </tr>
                            <tr>
                                <td>Total Bayar</td>
                                <td><input class="form-control" type="text" name="total_bayar" pattern="^\Rp\d{1,3}(.\d{3})*(\.\d+)?$" value="<?= $row_pembayaran['total_bayar'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Bayar</td>
                                <td><input class="form-control" type="date" name="tanggal_bayar" value="<?= $row_pembayaran['tanggal_bayar'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>
                                    <select class="form-control" name="keterangan" required>
                                        <option value="">--Pilih Keterangan--</option>
                                        <option value="lunas" <?= $row_pembayaran['keterangan'] == "lunas" ? "selected" : "" ?>>Lunas</option>
                                        <option value="belum lunas" <?= $row_pembayaran['keterangan'] == "belum lunas" ? "selected" : "" ?>>Belum Lunas</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-primary" type="submit" name="proses" value="Ubah">
                                    <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('nis').addEventListener('change', function() {
    var selectedNIS = this.value;
    
    // Kirim permintaan AJAX ke server untuk mengambil nama siswa berdasarkan NIS yang dipilih
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_nama_siswa.php?nis=' + selectedNIS, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById('nama_siswa').value = response;
        }
    };
    xhr.send();
});
</script>

<?php
require_once '../layout/_bottom.php';
?>
