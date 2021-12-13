<?php
include 'config.php';


if($_GET['act']== 'tambahuser'){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];

    //query
    $sql = "INSERT INTO tbladmin (nama, username, password, notelp, alamat) VALUES('$nama' , '$username' , '$password' , '$notelp', '$alamat')";
    $querytambah =  mysqli_query($conn, $sql);

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:admin.php");
    }
    else{
        echo "<script>alert('Terjadi kesalahan.')</script>";
    }
}
elseif ($_GET['act'] == 'deleteuser'){
  $idadmin = $_GET['idadmin'];

  //query hapus
  $sql = "DELETE FROM tbladmin WHERE idadmin = '$idadmin'";
  $querydelete = mysqli_query($conn, $sql);

  if ($querydelete) {
      # redirect ke index.php
      header("location:admin.php");
  }
  else{
        echo "<script>alert('Terjadi kesalahan.')</script>";
  }

  mysqli_close($conn);
}
elseif($_GET['act']=='updateuser'){
  $idadmin = $_POST['idadmin'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $notelp = $_POST['telpon'];
  $alamat = $_POST['alamat'];

  //query update
  $queryupdate = mysqli_query($conn, "UPDATE tbladmin SET username='$username' , password='$password' , nama='$nama' , alamat='$alamat' , notelp='$notelp' WHERE idadmin='$idadmin' ");

  if ($queryupdate) {
      # credirect ke page index
      header("location:admin.php");    
  }
  else{
      echo "ERROR, data gagal diupdate". mysqli_error($conn);
  }
}
?>