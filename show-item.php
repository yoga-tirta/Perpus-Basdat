<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>User | Cart</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php 
// Mulai sesi
session_start();
require 'config.php';
// require '../login.php';
// require 'item.php';
// var_dump($_GET['id']);
$sql = mysqli_query($conn, "SELECT tblitem.*, tblbuku.judul FROM tblitem INNER JOIN tblbuku ON tblitem.idbuku = tblbuku.idbuku WHERE idtransaksi = '$_GET[idtransaksi]'");
$sqlUser = mysqli_query($conn, "SELECT tbltransaksi.*, tbluser.nama FROM tbltransaksi INNER JOIN tbluser ON tbltransaksi.iduser = tbluser.iduser WHERE tbltransaksi.idtransaksi = '$_GET[idtransaksi]'");
$userDetail = mysqli_fetch_assoc($sqlUser);
// var_dump($userDetail);die
?>
<div class="container-fluid" style="margin: 0 0 0 30%;">
    <h3> Detail buku yang telah kamu pinjam </h3>
    <table>
        <tr>
            <td>Nomor Transaksi</td>
            <td class="text-center" style="width: 20%;">:</td>
            <td><?= $_GET['idtransaksi'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td class="text-center" style="width: 20%;">:</td>
            <td><?= $userDetail['nama'] ?></td>
        </tr>
        <tr>
            <td>Tgl pinjam</td>
            <td class="text-center" style="width: 20%;">:</td>
            <td><?= $userDetail['tgl_pinjam'] ?></td>
        <tr>
            <td>Tgl kembali</td>
            <td class="text-center" style="width: 20%;">:</td>
            <td><?= $userDetail['tgl_kembali'] ?></td>
        </tr>
        <tr>
            <td>Telat</td>
            <td class="text-center" style="width: 20%;">:</td>
            <td><?= $userDetail['denda'] ?> Hari</td>
        </tr>
        <tr>
            <td>Denda</td>
            <td class="text-center" style="width: 20%;">:</td>
            <td><?= $userDetail['jumlah_denda'] ?> -</td>
        </tr>
    </table>
        <table class="table table-hover table-bordered" style="width: 60%; margin-top:40px;">
            <tr>
                <th>No</th>
                <th style="width:18%">Kode Buku</th>
                <th style="width:100%">Judul Buku</th>
                <th>Qty</th>
            </tr>
            <?php $angka = 1; ?>
            <?php while($d = mysqli_fetch_array($sql)): ?>
            <tr>
                <td class="text-center"> <?php echo $angka; ?> </td>
                <td class="text-center"> <?php echo $d['idbuku']; ?> </td>
                <td> <?php echo $d['judul']; ?> </td>
                <td class="text-center"> <?php echo $d['jumlah_pinjam']; ?> </td>
            </tr>
            <?php $angka++;?>
            <?php endwhile;?>
        </table>
    </form>
    <br>
    <?php
    if(isset($_SESSION['idadmin'])){
    echo "
        <a class='btn btn-info' href='admin-kembali.php'>Kembali</a>";
    }
    else if(isset($_SESSION['iduser'])){
        echo"
        <a class='btn btn-info' href='user-list-pinjam.php'>Kembali</a>
        <br><br><br>
        <small>*Silahkan ke meja pustakawan dan tunjukkan kode transakasi untuk mengembalikannya</small>
        <br>
        <small>**Denda keterlambatan peminjaman buku adalah Rp. 500 per hari</small>";
    }
    ?>

    
</div>
?>
</body>
 </html>