<?php
    include "connect.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perpustakaan</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logoo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face<?= $_SESSION['user']['userid'] ?>.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?= $_SESSION['user']['username'] ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                
                <a class="dropdown-item" href="logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="logout.php">
                <i class="mdi mdi-power"></i>
              </a>
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
            <li class="nav-item nav-profile">
              <a href="?page=profile" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face<?= $_SESSION['user']['userid'] ?>.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $_SESSION['user']['namalengkap'] ?></span>
                  <span class="text-secondary text-small"><?= $_SESSION['user']['role'] ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <?php
              if($_SESSION['user']['role'] == 'user'){
            ?>
            <li class="nav-item <?php if($page == 'home') echo 'active' ?>">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'buku') echo 'active' ?>">
              <a class="nav-link" href="?page=buku">
                <span class="menu-title">Buku</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'bukukategori') echo 'active' ?>">
              <a class="nav-link" href="?page=bukukategori">
                <span class="menu-title">Kategori</span>
                <i class="mdi mdi-apps menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'dipinjam') echo 'active' ?>">
              <a class="nav-link" href="?page=dipinjam">
                <span class="menu-title">Dipinjam</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'dikembalikan') echo 'active' ?>">
              <a class="nav-link" href="?page=dikembalikan">
                <span class="menu-title">Dikembalikan</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'koleksi') echo 'active' ?>">
              <a class="nav-link" href="?page=koleksi">
                <span class="menu-title">Koleksi</span>
                <i class="mdi mdi-bookmark-check menu-icon"></i>
              </a>
            </li>
            <?php
              }elseif($_SESSION['user']['role'] == 'petugas'){
            ?>
            <li class="nav-item <?php if($page == 'home') echo 'active' ?>">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'peminjaman') echo 'active' ?>">
              <a class="nav-link" href="?page=peminjaman">
                <span class="menu-title">Peminjaman</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'pendataan') echo 'active' ?>">
              <a class="nav-link" href="?page=pendataan">
                <span class="menu-title">Pendataan Buku</span>
                <i class="mdi mdi-book-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'kategori') echo 'active' ?>">
              <a class="nav-link" href="?page=kategori">
                <span class="menu-title">Pendataan Kategori</span>
                <i class="mdi mdi-apps menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'ulasanbuku') echo 'active' ?>">
              <a class="nav-link" href="?page=ulasanbuku">
                <span class="menu-title">Pendataan Ulasan</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
                <?php
                  }elseif($_SESSION['user']['role'] == 'admin'){
                ?>
            <li class="nav-item <?php if($page == 'home') echo 'active' ?>">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Home</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item <?php if($page == 'peminjaman') echo 'active' ?>">
            <a class="nav-link" href="?page=peminjaman">
              <span class="menu-title">Peminjaman</span>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
          </li>
            <li class="nav-item <?php if($page == 'pendataan') echo 'active' ?>">
              <a class="nav-link" href="?page=pendataan">
                <span class="menu-title">Pendataan Buku</span>
                <i class="mdi mdi-book-multiple menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'kategori') echo 'active' ?>">
              <a class="nav-link" href="?page=kategori">
                <span class="menu-title">Pendataan Kategori</span>
                <i class="mdi mdi-apps menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'user') echo 'active' ?>">
              <a class="nav-link" href="?page=user">
                <span class="menu-title">Pendataan User</span>
                <i class="mdi mdi-account-box menu-icon"></i>
              </a>
            </li>
            <li class="nav-item <?php if($page == 'ulasanbuku') echo 'active' ?>">
              <a class="nav-link" href="?page=ulasanbuku">
                <span class="menu-title">Pendataan Ulasan</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
              <?php
              }
              ?>
              <li class="nav-item">
              <a class="nav-link" href="?page=kategori">
                <a href="logout.php" style="text-decoration:none; color:black;">Logout</a>
              </a>
            </li>
            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <?php
              if(file_exists($page . '.php')){
                include $page . '.php';
              }else{
                include '404.php';
              }
            ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Raditya Putra Company 2024</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end">Aplikasi Perpustakaan Online</span>
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
    <!-- <script src="assets/vendors/js/vendor.bundle.base.js"></script> -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>