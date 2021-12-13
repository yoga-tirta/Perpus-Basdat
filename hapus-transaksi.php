<?php


require 'config.php';
session_start();

$id = $_GET["id"];
// var_dump($id);die;
$sql = mysqli_query($conn, "DELETE FROM tbltransaksi WHERE idtransaksi = '$id'");
if ($sql) {
    if(isset($_SESSION['idadmin'])){
    echo "
        <script>
            alert('data berhasil di hapus!');
            document.location.href = 'admin-peminjaman.php';
        </script>";
    }
    else if(isset($_SESSION['iduser'])){
        echo"
        <script>
            alert('data berhasil di hapus!');
            document.location.href = 'user-list-pinjam.php';
        </script>";
    }
} else{
    echo "
        <script>
            alert('data gagal dihapus!!!');
            document.location.href = 'admin-peminjaman.php';
        </script>
        ";
}
?>