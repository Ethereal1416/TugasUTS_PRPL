<?php
    $id = $_GET['id'];

    $sql = $koneksi->query("select * from barang where id = '$id'");

    $tampil = $sql->fetch_assoc();
?>
<title>
  Edit Data Barang
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
          <li class="nav-item menu-open">
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
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Peminjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=peminjaman" class="nav-link">
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
            <h1>Edit Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Barang</a></li>
              <li class="breadcrumb-item active">Edit Data Barang</li>
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
                <h3 class="card-title">Edit Data Barang</h3>
              </div>
              <form method="post" action="function.php">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?= $tampil['id'] ?>">
                    <label for="kode">Kode Barang</label>
                    <input type="text" name="kode" class="form-control" id="kode" placeholder="Masukkan Kode Barang" value="<?= $tampil['kode'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Barang" value="<?= $tampil['nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="merk">Merk</label>
                    <input type="text" name="merk" class="form-control" id="merk" placeholder="Masukan Merk" value="<?= $tampil['merk'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="satuan">Satuan</label><br/>
                    <select name="satuan" class="form-control">
                    <option value="Unit">Unit</option>
                    <option value="Perangkat">Perangkat</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Keterangan" value="<?= $tampil['keterangan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="kondisi">Kondisi</label><br/>
                    <select name="kondisi" class="form-control">
                    <option value="Baik">Baik</option>
                    <option value="Kurang Baik">Kurang Baik</option>
                    <option value="Rusak">Rusak</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="depresiasi">Depresiasi</label>
                    <input type="number" name="depresiasi" class="form-control" id="depresiasi" placeholder="Masukkan Depresiasi" value="<?= $tampil['depresiasi'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="lama">Lama</label>
                    <input type="text" name="lama" class="form-control" id="lama" placeholder="Masukkan Lama" value="<?= $tampil['lama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga" value="<?= $tampil['harga'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Lokasi" value="<?= $tampil['lokasi'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan Jumlah" value="<?= $tampil['jumlah'] ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" name="update" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>