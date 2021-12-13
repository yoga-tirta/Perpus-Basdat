<?php

require 'config.php';
session_start();
$idadmin = $_SESSION['idadmin'];
echo $idadmin;
?>

<?php
$idtransaksi = $_GET['id'];
$tglpinjam_awal =$_GET['tgl'];
$date1 = $tglpinjam_awal;
$date2 = date('Y-m-d');
$days = 0;
$jumlahDenda = 0;
if ($date1 >= $date2){
}
else{

    $diff = abs(strtotime($date2) - strtotime($date1));
    $days = floor(($diff / (60*60*24)));
    $jumlahDenda = (int)$days * 500;
}
$now = (date('Y-m-d'));
// echo $days;
$sql = mysqli_query($conn, "UPDATE tbltransaksi SET idadmin = 1, tgl_kembali = '$now', status =  'kembali', denda = 0 ,jumlah_denda = 0 WHERE  idtransaksi = $idtransaksi");
echo $days.$jumlahDenda;
if($sql){
    $buku = mysqli_query($conn, "SELECT * FROM tblitem WHERE idtransaksi = '$idtransaksi'");
    if($buku){
        while($d = mysqli_fetch_array($buku)){
            $qtyItem = (int)$d['jumlah_pinjam'];
            var_dump($qtyItem);
            $idBuku = $d['idbuku'];
            $qtyBuku = mysqli_query($conn, "UPDATE tblbuku SET jumlah_buku = jumlah_buku + '$qtyItem' WHERE idbuku = '$idBuku'");
            if(!$qtyBuku){
                echo "<script>
                alert('tambah qty Gagal!')
                </script>";
            }
        }
        echo "<script>
                alert('Buku berhasil dikembalikan!')
                </script>";
        header("location:admin-peminjaman.php");
    }
    else{
        echo "<script>
        alert('tambah qty Gagal!')
        </script>";
    }
}
else{
    echo "<script>
    alert('SQL Gagal!')
    </script>";
}
?>
