<?php 

session_start(); 
require_once('../helper/connection.php'); 

$id_spp = $_POST['id_spp']; 
$tahun = $_POST['tahun']; 
$nominal = $_POST['nominal']; 

$query = mysqli_query($connection, "UPDATE spp SET tahun = '$tahun', nominal = '$nominal' WHERE id_spp = '$id_spp'");

if ($query) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil mengubah data'
    ];
    
    header('Location: ./index.php');
} else {
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => mysqli_error($connection)
    ];
    header('Location: ./index.php');
}

?>
