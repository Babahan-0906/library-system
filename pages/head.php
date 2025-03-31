<?php
  require_once 'init.php';
  mysqli_query($connection, "SET NAMES utf8");
  //error_reporting(0); ?>

<head>
  <meta charset="UTF-8">

  <title>Library</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css"> -->
  <!-- SweetAlert2 -->
  <script src="../../plugins/sweetalert2/sweetalert2.js"></script>
  <!-- <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css"> -->
  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.css?v=<?php echo time(); ?>">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/loading_page.css?v=<?php echo time(); ?>">
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="../../dist/css/adminlte.google_style.css" rel="stylesheet">


  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/New Folder/DataTables/datatables.min.css?v=1657810874">
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.js"></script>
  
  <link rel="icon" href="../../plugins/website-icons/icon.PNG" type="image/x-icon">

  <style>
    td button {
      margin: 2px;
    }
  </style>

</head>
  