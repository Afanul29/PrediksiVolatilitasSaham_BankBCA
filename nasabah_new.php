<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/iconBBCA.png">
<link rel="icon" type="image/png" href="assets/img/iconBBCA.png">
<title>BCA</title>
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="Admiassets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">
    </div>
  </div>
</div>
<main class="main-content mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card card-plain">
              <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Sign up</h4>
                <p class="mb-0"></p>
              </div>
              <div class="card-body">
              <form id="signupForm" method="post" action="nasabah_new.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Daftar</button>
            </div>
        </form>
        <?php if (isset($message)) { ?>
            <div class="alert alert-info text-center mt-3">
                <?php echo $message; ?>
            </div>
        <?php } ?>
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];

    // Query untuk menyimpan data nasabah
    $query = "INSERT INTO nasabah (USERNAME_NASABAH, PASSWORD_NASABAH, NAMA_NASABAH, EMAIL, NOMER_TELEPON, ALAMAT, SALDO)
              VALUES ('$username', '$password', '$nama', '$email', '$nomor_telepon', '', 0)";

    if (mysqli_query($koneksi, $query)) {
        $message = "Pendaftaran berhasil. Anda telah menjadi nasabah kami.";
    } else {
        $message = "Pendaftaran gagal: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Have an account?
                  <a href="login.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://cdn1.katadata.co.id/media/images/thumb/2023/08/28/Wisma_BCA_Foresta_di_Kawasan_BSD-2023_08_28-15_26_26_38562614b8dbc0f285a9d7c20cc81678_960x640_thumb.jpg'); background-size: cover;">
              <span class="mask bg-gradient-primary opacity-6"></span>
              <h4 class="mt-5 text-white font-weight-bolder position-relative">"PT. BANK CENTRAL ASIA Tbk"</h4>
              <p class="text-white position-relative">Senantiasa Disisi Anda</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Core JS Files -->
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
