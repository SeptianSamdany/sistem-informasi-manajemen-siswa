<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nis = $_GET['nis'];
$query = mysqli_query($connection, "SELECT * FROM siswa_a1 WHERE nis='$nis'");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Siswa</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="nis" value="<?= $row['nis'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>NIS</td>
                  <td><input class="form-control" required value="<?= $row['nis'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Siswa</td>
                  <td><input class="form-control" type="text" name="nama_siswa" required value="<?= $row['nama_siswa'] ?>"></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>
                    <select class="form-control" name="jenis_kelamin" required>
                      <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                      <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>NIK</td>
                  <td><input class="form-control" type="text" name="nik" required value="<?= $row['nik'] ?>"></td>
                </tr>
                <tr>
                  <td>Tempat Tanggal Lahir</td>
                  <td><input class="form-control" type="text" name="tempat_tanggal_lahir" required value="<?= $row['tempat_tanggal_lahir'] ?>"></td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td><input class="form-control" type="text" name="agama" required value="<?= $row['agama'] ?>"></td>
                </tr>
                <tr>
                  <td>Jumlah Saudara Kandung</td>
                  <td><input class="form-control" type="number" name="jumlah_saudara_kandung" required value="<?= $row['jumlah_saudara_kandung'] ?>"></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td colspan="3"><textarea class="form-control" name="alamat" id="alamat" required><?= $row['alamat'] ?></textarea></td>
                </tr>
                <tr>
                  <td>Kewarganegaraan</td>
                  <td><input class="form-control" type="text" name="kewarganegaraan" required value="<?= $row['kewarganegaraan'] ?>"></td>
                </tr>
                <tr>
                  <td>Nama Ayah</td>
                  <td><input class="form-control" type="text" name="nama_ayah" required value="<?= $row['nama_ayah'] ?>"></td>
                </tr>
                <tr>
                  <td>Tempat Tanggal Lahir Ayah</td>
                  <td><input class="form-control" type="text" name="tempat_tanggal_lahir_ayah" required value="<?= $row['tempat_tanggal_lahir_ayah'] ?>"></td>
                </tr>
                <tr>
                  <td>Pendidikan Ayah</td>
                  <td><input class="form-control" type="text" name="pendidikan_ayah" required value="<?= $row['pendidikan_ayah'] ?>"></td>
                </tr>
                <tr>
                  <td>Pekerjaan Ayah</td>
                  <td><input class="form-control" type="text" name="pekerjaan_ayah" required value="<?= $row['pekerjaan_ayah'] ?>"></td>
                </tr>
                <tr>
                  <td>No. HP Ayah</td>
                  <td><input class="form-control" type="text" name="no_hp_ayah" required value="<?= $row['no_hp_ayah'] ?>"></td>
                </tr>
                <tr>
                  <td>Nama Ibu</td>
                  <td><input class="form-control" type="text" name="nama_ibu" required value="<?= $row['nama_ibu'] ?>"></td>
                </tr>
                <tr>
                  <td>Tempat Tanggal Lahir Ibu</td>
                  <td><input class="form-control" type="text" name="tempat_tanggal_lahir_ibu" placeholder="Tempat, Tanggal Lahir Ibu" required value="<?= $row['tempat_tanggal_lahir_ibu'] ?>"></td>
                </tr>
                <tr>
                  <td>Pendidikan Ibu</td>
                  <td><input class="form-control" type="text" name="pendidikan_ibu" required value="<?= $row['pendidikan_ibu'] ?>"></td>
                </tr>
                <tr>
                  <td>Pekerjaan Ibu</td>
                  <td><input class="form-control" type="text" name="pekerjaan_ibu" required value="<?= $row['pekerjaan_ibu'] ?>"></td>
                </tr>
                <tr>
                  <td>No. HP Ibu</td>
                  <td><input class="form-control" type="text" name="no_hp_ibu" required value="<?= $row['no_hp_ibu'] ?>"></td>
                </tr>
                <tr>
                  <td>Tinggi Badan</td>
                  <td><input class="form-control" type="number" name="tinggi_badan" required value="<?= $row['tinggi_badan'] ?>"></td>
                </tr>
                <tr>
                  <td>Berat Badan</td>
                  <td><input class="form-control" type="number" name="berat_badan" required value="<?= $row['berat_badan'] ?>"></td>
                </tr>
                <tr>
                  <td>Jarak ke Sekolah (km)</td>
                  <td><input class="form-control" type="number" name="jarak_ke_sekolah" required value="<?= $row['jarak_ke_sekolah'] ?>"></td>
                </tr>
                <tr>
                  <td>Waktu Tempuh</td>
                  <td><input class="form-control" type="text" name="waktu_tempuh" required value="<?= $row['waktu_tempuh'] ?>"></td>
                </tr>
                <tr>
                  <td>Penyakit yang Diderita</td>
                  <td><textarea class="form-control" name="penyakit_yang_diderita" required><?= $row['penyakit_yang_diderita'] ?></textarea></td>
                </tr>
                <tr>
                  <td>Hal yang Dikemukakan</td>
                  <td><textarea class="form-control" name="hal_yang_dikemukakan" required><?= $row['hal_yang_dikemukakan'] ?></textarea></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="submit" class="btn btn-primary" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  </td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once '../layout/_bottom.php'; ?>
