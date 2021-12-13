<?php 
session_start();
require 'config.php';
require 'item.php';
$iduser = $_SESSION['iduser'];
//Simpan pesanan baru
$now = date('Y-m-d');
$toWeek = date( "Y-m-d", strtotime( "$now +1 week" ) );
$sql1 = "INSERT INTO tbltransaksi VALUES ('', '$iduser', 1, '$now', '$toWeek', 'dipinjam', 0,'' )";
mysqli_query($conn, $sql1);

$sql2 = mysqli_query($conn, "SELECT max(idtransaksi) AS last FROM tbltransaksi");
// $last = $sql2['last'];
$last = mysqli_fetch_object($sql2);
// var_dump($last->last);
$next = (int)$last->last;
$ordersid = mysqli_insert_id($conn); 
$cart = unserialize(serialize($_SESSION['cart'])); //Set $cart sebagai array, serialize () mengubah string menjadi array
for($i=0; $i<count($cart);$i++) {
    $id = (int)$cart[$i]->id;
    $qty = (int)$cart[$i]->quantity;
    // var_dump($next);
    // var_dump($id);
    // var_dump($qty);

    $qtyStock = mysqli_query($conn, "SELECT jumlah_buku FROM tblbuku WHERE idbuku = '$id'");
    $stock = mysqli_fetch_array($qtyStock);
    if($stock['jumlah_buku'] >= $qty){

        $check = mysqli_query($conn, "INSERT INTO tblitem VALUES ('', '$next' , '$id', '$qty')");
        $checkQty = mysqli_query($conn, "UPDATE tblbuku SET jumlah_buku = jumlah_buku - '$qty' WHERE idbuku = '$id'");

        if(!$checkQty){
            echo "<script>alert(gagal woe!)</script>";
        }

        unset($_SESSION['cart']);
        echo "<script> alert('Checkout berhasil, silahkan ambil buku pesanan anda. Untuk mengambilnya perlihatkan kode transaksi anda yang terdapat pada dashboard peminjaman kepada pustakawan')
        location.href = 'user-list-buku.php'
        </script>";
    }
    else{
        echo "<script>
        alert('Stok buku tidak cukup dengan jumlah yang ingin anda pinjam')
        location.href = 'user-list-buku.php'
        </script>";
        
    }

}
//Menghapus semua produk dalam keranjang
// header("location:../user-list-buku.php");
 ?>
 