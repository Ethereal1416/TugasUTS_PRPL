<title>
  Kembalikan Peminjaman
</title>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="?" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=barang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=barang&tindakan=input" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Barang</p>
                </a>
              </li>
            </ul>
          </li>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Peminjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=peminjaman" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Barang</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=peminjaman&tindakan=input" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Peminjaman</p>
                </a>
              </li>
            </ul>
          </li>
          
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="?page=user" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
        </ul>
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
    </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kembalikan Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
              <li class="breadcrumb-item">Kembalikan Peminjaman</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kembalikan Peminjaman</h3>
              </div>
              <form method="post" action="">
            	<?php 
				$id_peminjaman = $_GET['id'];
            	$sql = mysqli_query($koneksi,"SELECT * from peminjaman INNER JOIN barang ON peminjaman.kode_barang=barang.kode INNER JOIN user ON peminjaman.id_peminjam=user.id where id_peminjaman='$id_peminjaman'");      
					$tampil = $sql->fetch_assoc();
                ?>
                <div class="card-body">
                    <input type="hidden" name="kode" class="form-control" id="kode" value="<?= $tampil['kode'] ?>" readonly>
                  <div class="form-group">
                    <label for="nama">Nama Peminjam</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $tampil['nama_user'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $tampil['nama'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?= $tampil['tgl_pinjam'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="bataspinjam">Batas Pinjam</label>
                    <input type="date" name="bataspinjam" class="form-control" id="bataspinjam" value="<?= $tampil['batas'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama">Kondisi Awal</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $tampil['kondisi_awal'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="kondisi">Kondisi Kembali</label><br/>
                    <select name="kondisi" class="form-control">
                    <option value="Baik">Baik</option>
                    <option value="Kurang Baik">Kurang Baik</option>
                    <option value="Rusak">Rusak</option>
                  </select>
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" name="kembalikan" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>

<?php

if(isset($_POST['kembalikan'])) {

date_default_timezone_set("Asia/Jakarta");
$status = "Completed";
$kondisi = $_POST['kondisi'];
$tgl_kembali = date("Y-m-d H:i:s");

$sql = $koneksi->query("SELECT * from peminjaman INNER JOIN barang ON peminjaman.kode_barang=barang.kode where id_peminjaman = '$id_peminjaman'");

$ambil = mysqli_fetch_array($sql);
$kode = $ambil['kode_barang'];
$stock = $ambil['jumlah'];
$jumlah_pinjam = $ambil['jumlah_pinjam'];

$total = $stock+$jumlah_pinjam;

$sql = $koneksi->query("UPDATE barang set jumlah='$total' where kode='$kode'");
$sql1 = $koneksi->query("UPDATE peminjaman set status='$status', kondisi_kembali='$kondisi', tgl_kembali='$tgl_kembali' where id_peminjaman='$id_peminjaman'");

if ($sql && $sql1) {
    ?>
        <script type="text/javascript">

            alert ("Telah Dikembalikan");
            window.location.href="?page=peminjaman";
        </script>
    <?php
    }}
?>