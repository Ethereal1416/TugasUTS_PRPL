<title>
  Input Peminjaman
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
                <a href="?page=peminjaman" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Barang</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=peminjaman&tindakan=input" class="nav-link active">
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
            <h1>Input Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
              <li class="breadcrumb-item active">Input Peminjaman</li>
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
                <h3 class="card-title">Input Peminjaman</h3>
              </div>
              <form method="post" action="function.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="id_peminjam">Peminjam</label><br/>
                    <select name="id_peminjam" class="form-control">
                    <?php
                        if($_SESSION['superadmin'] || $_SESSION['admin']){
                        $data = mysqli_query($koneksi,"SELECT * from user where role='user'");
                        while ($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['id']."'>".$d['nama_user']."</option>";
                        }}
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="kode_barang">Nama Barang</label>
                    <select name="kode_barang" class="form-control">
                    <?php
                        $data = mysqli_query($koneksi,"SELECT * from barang");
                        while ($d = mysqli_fetch_array($data)){
                            echo "<option value='".$d['kode']."'>".$d['nama']."</option>";
                        }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Masukan Jumlah">
                  </div>
                  <div class="form-group">
                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" placeholder="Masukkan Tanggal Kembali">
                  </div>
                  <div class="form-group">
                    <label for="tgl_kembali">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" placeholder="Masukkan Tanggal Kembali">
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" name="pinjam" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>