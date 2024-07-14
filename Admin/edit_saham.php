<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/iconBBCA.png">
  <link rel="icon" type="image/png" href="../assets/img/iconBBCA.png">
  <title>
    BCA
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/logoBBCA.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Saham</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        </li>  <li class="nav-item">
          <a class="nav-link active" href="saham_management.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-money-coins text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Saham</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="data_transaksi.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-exchange-alt text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="user_management.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-users text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Nasabah</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="analytics.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-chart-bar text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Analytics</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Data Saham</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <div class="dropdown">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                   <a class="fa fa-user me-sm-1 dropdown-toggle text-white font-weight-bold px-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">  Admin</a>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Akun</a></li>
                  <li><a class="dropdown-item" href="../login.php">Logout</a></li>
              </ul>
            </div>
               </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="container mt-5">
                <h2>Edit Data Saham</h2>
                <?php
// Koneksi ke database
include 'koneksi.php';

// Memeriksa apakah form telah disubmit untuk pembaruan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_saham = $_POST['ID_SAHAM'];
    $tanggal = $_POST['TANGGAL'];
    $harga_penutup = $_POST['HARGA_PENUTUP'];
    $harga_pembuka = $_POST['HARGA_PEMBUKA'];
    $harga_tertinggi = $_POST['HARGA_TERTINGGI'];
    $harga_terendah = $_POST['HARGA_TERENDAH'];
    $perubahan = $_POST['PERUBAHAN'];
    $volume = $_POST['VOLUME'];

    // Query untuk memperbarui data saham
    $query = "UPDATE saham SET TANGGAL='$tanggal', HARGA_PENUTUP='$harga_penutup', HARGA_PEMBUKA='$harga_pembuka', HARGA_TERTINGGI='$harga_tertinggi', HARGA_TERENDAH='$harga_terendah', PERUBAHAN='$perubahan', VOLUME='$volume' WHERE ID_SAHAM='$id_saham'";
    if (mysqli_query($koneksi, $query)) {
        echo "Data saham berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
    header('Location: saham_management.php'); // Ganti 'your_main_file.php' dengan nama file utama Anda
    exit;
} else {
    $id_saham = $_GET['id'];

    // Query untuk mengambil data saham berdasarkan ID
    $query = "SELECT * FROM saham WHERE ID_SAHAM='$id_saham'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
}
?>

<form method="post" action="">
        <input type="hidden" name="ID_SAHAM" value="<?php echo $row['ID_SAHAM']; ?>">
        <div class="form-group">
            <label for="TANGGAL">Tanggal:</label>
            <input type="date" id="TANGGAL" name="TANGGAL" class="form-control" value="<?php echo $row['TANGGAL']; ?>" required>
        </div>
        <div class="form-group">
            <label for="HARGA_PENUTUP">Harga Penutup:</label>
            <input type="text" id="HARGA_PENUTUP" name="HARGA_PENUTUP" class="form-control" value="<?php echo $row['HARGA_PENUTUP']; ?>" required>
        </div>
        <div class="form-group">
            <label for="HARGA_PEMBUKA">Harga Pembuka:</label>
            <input type="text" id="HARGA_PEMBUKA" name="HARGA_PEMBUKA" class="form-control" value="<?php echo $row['HARGA_PEMBUKA']; ?>" required>
        </div>
        <div class="form-group">
            <label for="HARGA_TERTINGGI">Harga Tertinggi:</label>
            <input type="text" id="HARGA_TERTINGGI" name="HARGA_TERTINGGI" class="form-control" value="<?php echo $row['HARGA_TERTINGGI']; ?>" required>
        </div>
        <div class="form-group">
            <label for="HARGA_TERENDAH">Harga Terendah:</label>
            <input type="text" id="HARGA_TERENDAH" name="HARGA_TERENDAH" class="form-control" value="<?php echo $row['HARGA_TERENDAH']; ?>" required>
        </div>
        <div class="form-group">
            <label for="PERUBAHAN">Perubahan%:</label>
            <input type="text" id="PERUBAHAN" name="PERUBAHAN" class="form-control" value="<?php echo $row['PERUBAHAN']; ?>" required>
        </div>
        <div class="form-group">
            <label for="VOLUME">Volume:</label>
            <input type="text" id="VOLUME" name="VOLUME" class="form-control" value="<?php echo $row['VOLUME']; ?>" required>
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>

            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with</i> by
                <a href="https://www.bca.co.id/id" class="font-weight-bold" target="_blank">PT BANK CENTRAL ASIA Tbk</a>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.bca.co.id/id" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.bca.co.id" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.bca.co.id" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.bca.co.id" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <!-- Tambahkan script JavaScript untuk mengirim data tambah data -->

</body>

</html>