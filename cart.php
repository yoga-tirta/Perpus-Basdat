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
ob_start();
require 'config.php';
require 'item.php';
// require '../login.php';
// var_dump($_GET['id']);

if(isset($_GET['id']) && !isset($_POST['update']))  { 
    $sql = "SELECT * FROM tblbuku WHERE idbuku='$_GET[id]'";
    $result = mysqli_query($conn, $sql);
    $buku = mysqli_fetch_array($result); 
    var_dump($buku);
    $item = new Item();
    $item->id = $buku['idbuku'];
    $item->name = $buku['judul'];
    $iteminstock = $buku['jumlah_buku'];
    $item->quantity = 1;
    //Periksa produk dalam keranjang
    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart);$i++)
        if ($cart[$i]->id == $_GET['id']){
            $index = $i;
            break;
        }
        if($index == -1) 
            $_SESSION['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
        else {
            
            if (($cart[$index]->quantity) < $iteminstock)
                 $cart[$index]->quantity ++;
                 $_SESSION['cart'] = $cart;
        }
}
//Menghapus produk dalam keranjang
if(isset($_GET['index']) && !isset($_POST['update'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart = array_values($cart);
    $_SESSION['cart'] = $cart;
}
// Perbarui jumlah dalam keranjang
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>

<div class="container-fluid" style="margin: 0 0 0 30%;">
    <h2> Items in your cart: </h2> 
    <?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ){
    ?>
    <form method="POST">
        <table class="table table-hover" style="width: 60%;">
            <tr>
                <th>Aksi</th>
                <th style="width:20%">Kode Buku</th>
                <th style="width:60%">Judul Buku</th>
                <!-- <th>Price</th> -->
                <th>Quantity</th>
                
                <!-- <th>Total</th> -->
            </tr>
            <?php 
                $cart = unserialize(serialize($_SESSION['cart']));
                $s = 0;
                $index = 0;
                for($i=0; $i<count($cart); $i++){
                    //  var_dump($cart);
                    //  $s += $cart[$i]->price * $cart[$i]->quantity;
            ?>    
            <tr>
                <td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Hapus</a> </td>
                <td class="text-center"> <?php echo $cart[$i]->id; ?> </td>
                <td> <?php echo $cart[$i]->name; ?> </td>
                <!-- <td>Rp. <?php // echo $cart[$i]->price; ?> </td> -->
                <td> 
                    <!-- <div class="col-sm-4"> -->
                        <input class="form-control" type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> 
                    <!-- </div> -->
                </td>  
                <!-- <td> Rp.<?php // echo $cart[$i]->price * $cart[$i]->quantity; ?> </td>  -->
            </tr>
            <?php 
                $index++;
            } ?>
            <tr>
                <td colspan="5" style="text-align:right; font-weight:bold"> 
                <!-- <input id="saveimg" type="image" src="images/save.png" name="update" alt="Save Button"> -->
                <input class="btn waves-effect waves-light btn-primary" type="submit" name="update" value="Update quantity">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <a class="btn waves-effect waves-light btn-warning" href="user-list-buku.php">Kembali</a> | <a class="btn waves-effect waves-light btn-success" href="checkout.php" onclick="confirm('Anda yakin ingin checkout?')">Checkout</a>
    <br><br><br>
    <small>*Durasi peminjaman buku adalah satu minggu dimulai saat anda checkout</small>
    <br>
    <small>**Denda keterlambatan peminjaman buku adalah Rp. 500 per hari</small>
    <?php }

    else{ ?>
        <table class="table table-hover" style="width: 60%;">
            <tr>
                <th>Option</th>
                <th style="width:20%">Kode Buku</th>
                <th style="width:60%">Judul Buku</th>
                <!-- <th>Price</th> -->
                <th>Quantity</th>
                
                <!-- <th>Total</th> -->
            </tr>
        </table>
        <a class="btn waves-effect waves-light btn-warning" href="user-list-buku.php">Kembali</a> <p style="font-weight: bold;"> Keranjang buku anda kosong!</p>
    <?php } ?>
</div>
               
<?php 
if(isset($_GET["id"]) || isset($_GET["index"])){
 header('Location: cart.php');
}
ob_flush(); 
?>
</body>
 </html>