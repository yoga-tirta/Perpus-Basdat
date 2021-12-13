<?php

session_start();
$koneksi = mysqli_connect("localhost", "root", "", "perpus");
if (!isset($_SESSION['idadmin'])) {
  header("Location: login.php");
}

if (isset($_POST['cari'])) {
  $keyword_admin = $_POST['keyword_admin'];
  $_SESSION['keyword_admin'] = $keyword_admin;
  echo '<script>
      location.replace("admin.php?hal=1");
  </script>';
} else {
  $keyword_admin = isset($_SESSION['keyword_admin']) ? $_SESSION['keyword_admin'] : null;
}
// if(isset($_POST['jumlah_data_per_halaman'])) {
//     $jumlahDataPerHalaman = $_POST['jumlah_data_per_halaman'];
//     $_SESSION['jumlahDataPerHalaman_uji'] = $jumlahDataPerHalaman;
// } else {
//     $jumlahDataPerHalaman = isset($_SESSION['jumlahDataPerHalaman_uji']) ? $_SESSION['jumlahDataPerHalaman_uji'] : 5;
// }
$jumlahDataPerHalaman = 5;
if (!$keyword_admin) {
  //konfigurasi pagination

  // $jumlahData = count(query("select * from tb_sru_masuk ORDER BY m_tgl_surat ASC"));
  $result = mysqli_query($koneksi, "select * from tbladmin");
  $jumlahData = mysqli_num_rows($result);
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  //operator ternary
  $halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
} else {
  //konfigurasi pagination
  // $jumlahData = count(query("select * from tb_sru_masuk ORDER BY m_tgl_surat ASC"));
  $result = mysqli_query($koneksi, "select * from tbladmin WHERE username LIKE '%$keyword_admin%' OR password LIKE '%$keyword_admin%'OR nama LIKE '%$keyword_admin%'");
  $jumlahData = mysqli_num_rows($result);
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  //operator ternary
  $halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
  <title>Perpustakaan</title>
  <!-- Bootstrap Core CSS -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- chartist CSS -->
  <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
  <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
  <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
  <!--This page css - Morris CSS -->
  <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- You can change the theme colors from here -->
  <link href="css/colors/blue.css" id="theme" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
      <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            <!-- Logo icon --><b>
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

              <!-- Light Logo icon -->
              <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text --><span>

              <!-- Light Logo text -->
              <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
            </span>
          </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav mr-auto mt-md-0">
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
              <form class="app-search">
                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
              </form>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" />Rama</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin-list-buku.php" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Buku</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin-peminjaman.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Peminjaman</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="admin-kembali.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Pengembalian</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="user.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Admin</span></a>
                        </li><!--
                        <li> <a class="waves-effect waves-dark" href="icon-material.html" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Icons</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu">Google Map</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i class="mdi mdi-help-circle"></i><span class="hide-menu">Error 404</span></a>
                        </li> -->
                    </ul>
                    <!-- <div class="text-center m-t-30">
                        <a href="https://themewagon.com/themes/material-bootstrap-4-free-admin-template/" class="btn waves-effect waves-light btn-warning hidden-md-down">Download Now</a>
                    </div> -->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
          <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Admin</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div>
          <div class="col-md-7 col-4 align-self-center">
            <form action="" method="POST">
              <a href="logout.php" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">Logout</a>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div id="layoutSidenav_content">
          <main>
            <section class="content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">List Data Admin</h3>
                      <div class="box-tools pull-left">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fa fa-male"></i> Tambah Admin</a>
                      </div>
                    </div>
                    <div class="box-body">

                      <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0 table-bordered" id="dataTable">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>No Telepon</th>
                              <th>Alamat</th>
                              <th>Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            $queryview = mysqli_query($koneksi, "SELECT * FROM tbladmin");
                            while ($row = mysqli_fetch_assoc($queryview)) {
                            ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td><?php echo $row['notelp']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td>
                                  <!--<a href="../user/form_edituser.php?id=<?php echo $row['idadmin'] ?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                                  <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updateuser<?php echo $no; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                  <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deleteuser<?php echo $no; ?>"><i class="fa fa-trash"></i> Delete</a>

                                  <!-- modal delete -->
                                  <div class="example-modal">
                                    <div id="deleteuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h3 class="modal-title">Konfirmasi Delete Data Admin</h3>
                                          </div>
                                          <div class="modal-body">
                                            <h4 align="center">Apakah anda yakin ingin menghapus admin id <?php echo $row['idadmin']; ?><strong><span class="grt"></span></strong> ?</h4>
                                          </div>
                                          <div class="modal-footer">
                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                            <a href="function_admin.php?act=deleteuser&idadmin=<?php echo $row['idadmin']; ?>" class="btn btn-primary">Delete</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- modal delete -->

                                  <!-- modal update user -->
                                  <div class="example-modal">
                                    <div id="updateuser<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h3 class="modal-title">Edit Data Admin</h3>
                                          </div>
                                          <div class="modal-body">
                                            <form action="function_admin.php?act=updateuser" method="post" role="form">
                                              <?php
                                              $idadmin = $row['idadmin'];
                                              $query = "SELECT * FROM tbladmin WHERE idadmin='$idadmin'";
                                              $result = mysqli_query($koneksi, $query);
                                              while ($row = mysqli_fetch_assoc($result)) {
                                              ?>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <div class="col-sm-8"><input type="hidden" class="form-control" name="idadmin" placeholder="Idadmin" value="<?php echo $row['idadmin']; ?>"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Username <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username']; ?>"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Alamat <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $row['alamat']; ?>"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nama <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $row['nama']; ?>"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Telpon <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="telpon" placeholder="Telpon" value="<?php echo $row['notelp']; ?>"></div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Password <span class="text-red">*</span></label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="password" placeholder="Password" id="myPassword" value="<?php echo $row['password']; ?>">                                                      
                                                    </div>
                                                  </div>
                                                </div>                                                
                                                <div class="modal-footer">
                                                  <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                  <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                </div>
                                              <?php
                                              }
                                              ?>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div><!-- modal update user -->
                                </td>
                              </tr>
                            <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <!-- modal insert -->
                    <div class="example-modal">
                      <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Tambah Admin</h3>
                            </div>
                            <div class="modal-body">
                              <form action="function_admin.php?act=tambahuser" method="post" role="form">
                                <div class="form-group">
                                  <div class="row">
                                    <label class="col-sm-3 control-label text-right"> Nama <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value=""></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <label class="col-sm-3 control-label text-right">Username <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" value=""></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <label class="col-sm-3 control-label text-right">Password <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="password" class="form-control" name="password" placeholder="Password" id="myPassword" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <label class="col-sm-3 control-label text-right">No Telepon <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="notelp" placeholder="No Telepon" value=""></div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <label class="col-sm-3 control-label text-right">Alamat <span class="text-red">*</span></label>
                                    <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="alamat" value=""></div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                  <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                </div>
                                <!--<div class="box-footer">
                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div> /.box-footer -->
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- modal insert close -->
                  </div>
                </div>
              </div>
            </section>
          </main>

        </div>
      </div>
      <!-- Row -->
      <!-- Row -->
      <!-- ============================================================== -->
      <!-- End PAge Content -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer"> © 2020 Perpustakaan Online </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="js/sidebarmenu.js"></script>
  <!--stickey kit -->
  <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
  <!--Custom JavaScript -->
  <script src="js/custom.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugins -->
  <!-- ============================================================== -->
  <!-- chartist chart -->
  <script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
  <script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
  <!--c3 JavaScript -->
  <script src="assets/plugins/d3/d3.min.js"></script>
  <script src="assets/plugins/c3-master/c3.min.js"></script>
  <!-- Chart JS -->
  <script src="js/dashboard1.js"></script>
</body>

</html>