<?php 
include 'connect.php';
session_start();
if (empty($_SESSION['login'])) {
  header("Location: login.php");
}
$query = mysqli_query($conn,"SELECT * FROM transaksi");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Web Simple</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/account.png" alt="profile"/>
              <span class="nav-profile-name"><?php echo $_SESSION['nama']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="barang.php">Barang</a></li>
                <li class="nav-item"> <a class="nav-link" href="transaksi.php">Transaksi</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Selamat Datang</h2>
                    <p class="mb-md-0">Di Aplikasi Sederhana</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Transaksi</h4>
                  <div class="d-flex justify-content-between">
                    <button onclick="tambahTransaksi()" type="button" class="btn btn-inverse-warning btn-fw"><i class="mdi mdi-plus"></i> Tambah Data</button>
                    <button onclick="unduhTransaksi()" type="button" class="btn btn-success btn-icon-text">
                      Unduh
                      <i class="mdi mdi-download btn-icon-append"></i>                          
                    </button>
                  </div>  
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Kode Transaksi
                          </th>
                          <th>
                            Tanggal Transaksi
                          </th>
                          <th>
                            Waktu Transaksi
                          </th>
                          <th>
                            <center>Action</center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                         foreach ($query as $data): ?>
                        <tr>
                          <td>
                            <?php echo $no++; ?>
                          </td>
                          <td>
                            <?php echo $data['kode_transaksi']; ?>
                          </td>
                          <td>
                            <?php echo date("d F Y",strtotime($data['tanggal_transaksi'])); ?>
                          </td>
                          <td>
                            <?php echo $data['waktu_transaksi']; ?>
                          </td>
                          <td>
                            <center>
                              <a style="text-decoration: none;" href="edit_transaksi.php?id=<?php echo $data['id']?>">
                                <button type="button" class="btn btn-primary btn-rounded btn-fw">Ubah</button>
                              </a>
                              <button type="button" onclick="hapus()" kodeTransaksi = "<?php echo $data['kode_transaksi']?>" idTransaksi = "<?php echo $data['id']?>" class="btn btn-danger hapus btn-rounded btn-fw">Hapus</button>
                            </center>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <b>M. Isa Daud</b>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
    function tambahTransaksi() {
      document.location.href = "tambah_transaksi.php";
    }

    function unduhTransaksi() {
      document.location.href = "export_transaksi.php";
    }

    $(".hapus").click(function () {
      var CodeTransaksi = $(this).attr("kodeTransaksi");
      var IDTransaksi = $(this).attr("idTransaksi");
      var r = confirm("Apakah Anda yakin akan menghapus " + CodeTransaksi + "?");
      if (r == true) {
        window.location = "hapus_transaksi.php?id=" + IDTransaksi;
      } else {
        return;
      }
    });
</script>
  <!-- End custom js for this page-->
</body>

</html>

