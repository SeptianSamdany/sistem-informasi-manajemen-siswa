<?php 
require_once('../layout/_top.php'); 
require_once('../helper/connection.php'); 
?> 

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Tambah Data SPP</h1>
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
                                <td>ID SPP</td>
                                <td><input class="form-control" type="text" name="id_spp"></td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td><input class="form-control" type="text" name="tahun" placeholder="Contoh: 2024"></td>
                            </tr>
                            <tr>
                                <td>Nominal</td>
                                <td><input class="form-control" type="number" name="nominal"></td>
                            </tr>
                            <tr>
                                <td>
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

<?php
require_once '../layout/_bottom.php';
?>
