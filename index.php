<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    require 'function.php';


    $admin = $_SESSION['admin'];
    $user = $_SESSION['user'];
    $superadmin = $_SESSION['superadmin'];

    $sql = $koneksi->query("select * from user where email = '$admin' or email = '$user' or email = '$superadmin'");
    $get = $sql->fetch_assoc();
    $nama = $get['nama_user'];

    if ($_SESSION['admin'] || $_SESSION['user'] || $_SESSION['superadmin']) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/logosv.png" alt="logosv" height="60" width="60">
  </div>

  <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?" class="nav-link">Home</a>
      </li>

      <?php
      if ($_SESSION['admin'] || $_SESSION['superadmin']) {
        ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=barang" class="nav-link">Barang</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=peminjaman" class="nav-link">Peminjaman</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?page=user" class="nav-link">Data User</a>
      </li>
  <?php } ?>
    </ul>

    <ul class="navbar-nav ml-auto">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="?" class="brand-link">
      <img src="dist/img/logosv.png" alt="SV Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventaris SV</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $nama ?></a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

  <?php
    $page = $_GET['page'];
    $tindakan = $_GET['tindakan'];

    if ($page == "barang") {
        if ($tindakan == "") {
            include "page/barang/barang.php";
    }elseif ($tindakan == "input") {
            include "page/barang/input.php";
    }elseif ($tindakan == "edit") {
            include "page/barang/edit.php";
    }

    }if ($page == "peminjaman") {
        if ($tindakan == "") {
            include "page/peminjaman/peminjaman.php";
    }elseif ($tindakan == "input") {
            include "page/peminjaman/input.php";
    }elseif ($tindakan == "edit") {
            include "page/peminjaman/edit.php";
    }elseif ($tindakan == "confirm") {
            include "page/peminjaman/confirm.php";
    }elseif ($tindakan == "return") {
            include "page/peminjaman/return.php";
    }elseif ($tindakan == "lost") {
            include "page/peminjaman/lost.php";
    }

    }if ($page == "user") {
        if ($tindakan == "") {
            include "page/user/user.php";
    }

    }elseif ($page=="") {
        include "dashboard.php";
    }
    ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>

<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>

<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
<?php
}else{
    header("location:login.php");
} ?>