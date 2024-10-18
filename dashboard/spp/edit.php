<?php 
require_once '../layout/_top.php'; 
require_once '../helper/connection.php'; 

$id_spp = $_GET['id_spp'];
$query = mysqli_query($connection, "SELECT * FROM spp WHERE id_spp='$id_spp'"); 

?> 

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Ubah Data SPP</h1>
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
                            <input type="hidden" name="id_spp" value="<?= $row['id_spp'] ?>">
                            <table cellpadding="8" class="w-100">
                                <tr>
                                    <td>ID SPP</td>
                                    <td><input class="form-control" required value="<?= $row['id_spp'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td><input class="form-control" type="text" name="tahun" required value="<?= $row['tahun'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td><input class="form-control" type="number" name="nominal" required value="<?= $row['nominal'] ?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
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

<?php
require_once '../layout/_bottom.php';
?>
