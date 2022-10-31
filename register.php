<?php
    require('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Sekolah Vokasi Universitas Sebelas Maret</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Pendaftaran Akun Inventaris Sekolah Vokasi</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
          </div>
        </div>
      </form>


      <a href="login.php" class="text-center">Sudah Memiliki Akun</a>
    </div>
  </div>
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
  if (isset($_POST['register'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = "user";

    $sql = mysqli_query($koneksi, "INSERT into user (nama_user, email, password, role) values ('$nama', '$email', '$password', '$role');");

    if($sql){
        $ambil = $koneksi->query("select * from user where email = '$email'");
        $get = $ambil->fetch_assoc();
        $id = $get['id'];
    $key = 2;

    for ($i = 0; $i < strlen($password); $i++) {
        $kode[$i] = ord($password[$i]);
        $b[$i] = ($kode[$i] + $key) % 256;
        $c[$i] = chr($b[$i]);
    }

    $hsl = '';
    for ($i = 0; $i < strlen($password); $i++) {
        $hsl = $hsl . $c[$i];
    }

    $pw = md5($hsl . $id);

    $update = $koneksi->query("UPDATE user set password='$pw' where email = '$email'");

    if($update){
                ?>
                    <script type="text/javascript">
                        
                        alert ("Daftar Berhasil")
                        window.location.href="login.php";

                    </script>
                <?php  
    }
    }
}
?>