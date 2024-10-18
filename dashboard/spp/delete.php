<?php 
session_start(); 
require_once '../helper/connection.php'; 

$id_spp = $_GET["id_spp"]; 

$result = mysqli_query($connection, "DELETE FROM spp WHERE id_spp='$id_spp'"); 

if (mysqli_affected_rows($connection) > 0) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil menghapus data'
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
