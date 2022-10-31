<?php
    require('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Sekolah Vokasi Universitas Sebelas Maret</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <form action="" method="post">
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
            <div class="icheck-primary">
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
          </div>
        </div>
      </form>

      <p class="mb-0">
        <a href="register.php" class="text-center">Pendaftaran Akun</a>
      </p>
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
  
  if (isset($_POST['login'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = $koneksi->query("select * from user where email = '$email'");
      $get = $sql->fetch_assoc();
      $found = $sql->num_rows;
      $pw = $get['password'];
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

      $pwd = md5($hsl . $id);

      if ($found >=1 && $pwd == $pw) {

        session_start();


        if ($get['role'] == "admin") {
          
          $_SESSION['admin'] = $email;
 
          header("location:/manpro/");

        }else if ($get['role'] == "user") {
          
          $_SESSION['user'] = $email;

          header("location:/manpro/");

        }else if ($get['role'] == "superadmin") {
          
          $_SESSION['superadmin'] = $email;

          header("location:/manpro/");

        }}else{

        ?>
        <script type="text/javascript">
          alert("Email/Password Salah")
      </script>
      <?php
  }
  
}
 ?>
