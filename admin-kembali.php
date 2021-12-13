<?php

require 'config.php';
$data_buku = query("SELECT tbltransaksi.*, tbluser.nama FROM tbltransaksi INNER JOIN tbluser ON tbltransaksi.iduser=tbluser.iduser 
                    WHERE tbltransaksi.status = 'kembali' ORDER BY tgl_kembali DESC, idtransaksi DESC");
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
    <title>Admin | Pengembalian</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
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
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
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
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
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
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
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
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" />Admin</a>
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
                        <li> <a class="waves-effect waves-dark" href="admin-peminjaman.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Peminjaman</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="admin-kembali.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Pengembalian</span></a></li>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="user.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Admin</span></a>
                        </li>
                        <!-- <li> <a class="waves-effect waves-dark" href="pages-profile.html" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="table-basic.html" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Basic Table</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="icon-material.html" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Icons</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu">Google Map</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Blank Page</span></a>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Daftar Pengembalian</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Pengembalian</li>
                        </ol>
                    </div>
                    <!-- <div class="col-md-7 col-4 align-self-center">
                        <a href="https://themewagon.com/themes/material-bootstrap-4-free-admin-template/" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">Download Now</a>
                    </div> -->
                    <!-- <div class="col-md-7 col-4 align-self-center"> -->
                        <!-- <a href="admin-tambah-buku.php" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">Tambah Buku</a>
                     -->
                     <!-- <input type="text" name="cari" id="" class="form-group">
                     -->
                     <div class="row align-self-center" style="margin-left: 244px;">
                     <!-- <div class="form-group row" style="margin-left:256px;"> -->
                         <form method="get" action="">
                            <label class="col-md-4" style="padding:8px 0 0 0;">ID Transaksi</label>
                            <div class="col-md-8 input-group" style="float: right;">
                                <input type="text" name="cari" class="form-control form-control-line">
                                <div  class="input-group-btn">
                                    <button class="btn btn-info" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- </div> -->

                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- <div class="form-group row" >
                    <label class="col-md-1.5" style="text-indent:16px; padding:8px 0 0 0;">ID Transaksi</label>
                    <div class="col-md-3 input-group">
                        <input type="text" name="pengarang" placeholder="" class="form-control form-control-line">
                        <div  class="input-group-btn">
                            <a class="btn btn-info" href="#" role="button">Cari</a>
                        </div>
                    </div>
                </div> -->


                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">List Pengembalian</h4>
                                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Transaksi</th>
                                                <th>Nama</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Status</th>
                                                <th>Telat</th>
                                                <th>Denda</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php if(!isset($_GET['cari']) || $_GET['cari'] == '' ) { ?>
                                        <?php $angka = 1; ?>
                                        <?php foreach($data_buku as $row): ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $angka?></td>
                                                <td><?= $row["idtransaksi"]?></td>
                                                <td><?= $row["nama"]?></td>
                                                <td><?= $row["tgl_pinjam"]?></td>
                                                <td><?= $row["tgl_kembali"]?></td>
                                                <td><?= $row["status"]?></td>
                                                <td><?= $row["denda"]?> hari</td>
                                                <td><?= $row["jumlah_denda"]?></td>
                                                <!-- <td><img src="foto/<?= $row["sampul"]?>" width="100"></td> -->
                                                <td>
                                                <!-- <a class="btn btn-info" href="123">Lihat</a> -->
                                                <a class="btn btn-info col-12" href="show-item.php?idtransaksi=<?= $row['idtransaksi']?>">Lihat</a>
                                                <!-- <a href="admin-edit-buku.php?id=<?= $row['idbuku']?>"><i class="mdi mdi-table-edit"></i></a> --> 
                                                <!-- <a class="btn btn-danger" href="admin-hapus-buku.php?id=<?= $row['idbuku']?>"><i class="mdi mdi-delete"></i></a> -->
                                                
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php $angka++;?>
                                        <?php endforeach;?>
                                        <?php }
                                        else{ ?>
                                        <?php $data_cari = query("SELECT tbltransaksi.*, tbluser.nama FROM tbltransaksi INNER JOIN tbluser ON tbltransaksi.iduser=tbluser.iduser 
                                                                WHERE tbltransaksi.status = 'kembali' AND idtransaksi LIKE '$_GET[cari]%' ORDER BY tgl_kembali DESC"); ?>
                                        <?php $angka = 1; ?>
                                        <?php foreach($data_cari as $row): ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $angka?></td>
                                                <td><?= $row["idtransaksi"]?></td>
                                                <td><?= $row["nama"]?></td>
                                                <td><?= $row["tgl_pinjam"]?></td>
                                                <td><?= $row["tgl_kembali"]?></td>
                                                <td><?= $row["status"]?></td>
                                                <td><?= $row["denda"]?> hari</td>
                                                <td><?= $row["jumlah_denda"]?></td>
                                                <!-- <td><img src="foto/<?= $row["sampul"]?>" width="100"></td> -->
                                                <td>
                                                <a class="btn btn-info" href="show-item.php?idtransaksi=<?= $row['idtransaksi']?>">Lihat</a>
                                                
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php $angka++;?>
                                        <?php endforeach;?>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <footer class="footer">
                © 2021 Perpustakaan Online
            </footer>
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
</body>

</html>
