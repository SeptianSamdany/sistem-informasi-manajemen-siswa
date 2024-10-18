<?php 
require_once('../layout/_top.php'); 
require_once('../helper/connection.php'); 

// Query untuk mengambil data id_spp dari tabel spp 
$sql_spp = "SELECT id_spp FROM spp";
$result_spp = mysqli_query($connection, $sql_spp);

// Query untuk mengambil data nis dan tahun ajaran dari tabel siswa
$sql_siswa = "SELECT nis, tahun_ajaran FROM siswa";
$result_siswa = mysqli_query($connection, $sql_siswa);

?> 

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Tambah Data Pembayaran</h1>
        <a href="./index.php" class="btn btn-light">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form action="./store.php" method="POST">
                        <table>
                            <tr>
                                <td>ID Pembayaran</td>
                                <td><input class="form-control" type="text" name="id_pembayaran"></td>
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
                                            echo "<option value='" . $row['nis'] . "'>" . $row['nis'] . "</option>";
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
                                <td><input class="form-control" type="text" name="total_bayar" pattern="^\Rp\d{1,3}(.\d{3})*(\.\d+)?$"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Bayar</td>
                                <td><input class="form-control" type="date" name="tanggal_bayar"></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>
                                    <select class="form-control" name="keterangan" required>
                                        <option value="">--Pilih Keterangan--</option>
                                        <option value="lunas">Lunas</option>
                                        <option value="belum lunas">Belum Lunas</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
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
    
    // Kirim permintaan AJAX ke server untuk mengambil nama siswa dan tahun ajaran berdasarkan NIS yang dipilih
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_nama_tahun_ajaran.php?nis=' + selectedNIS, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById('nama_siswa').value = response.nama_siswa;
            document.getElementById('tahun_ajaran').value = response.tahun_ajaran;
        }
    };
    xhr.send();
});
</script>

<?php
require_once '../layout/_bottom.php';
?>
