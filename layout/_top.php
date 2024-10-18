<?php

require_once '../helper/connection.php'; 

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

  <!-- Custom CSS for DataTables Buttons -->
  <style>
    .dt-button {
      color: white;
      border: none;
      padding: 10px 20px;
      margin: 5px;
      font-size: 13px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
    }
    .dt-button:hover {
      transform: translateY(-2px);
    }
    .dt-button:focus {
      outline: none;
    }
    .dt-button i {
      margin-right: 8px;
    }
    .btn-pdf {
      background-color: #dc3545; /* Merah */
    }
    .btn-pdf:hover {
      background-color: #c82333; /* Merah lebih gelap saat hover */
    }
    .btn-print {
      background-color: #007bff; /* Biru */
    }
    .btn-print:hover {
      background-color: #0056b3; /* Biru lebih gelap saat hover */
    }
    .btn-excel {
      background-color: #28a745; /* Hijau */
    }
    .btn-excel:hover {
      background-color: #218838; /* Hijau lebih gelap saat hover */
    }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?php
      require_once('_header.php');
      require_once('_sidenav.php');
      ?>
      <!-- Main Content -->
      <div class="main-content">