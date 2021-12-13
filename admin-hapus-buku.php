<?php

require 'config.php';

$id = $_GET["id"];
// var_dump($id);die;
if (hapus($id) > 0) {
    echo "
        <script>
            alert('data berhasil di hapus!');
            document.location.href = 'admin-list-buku.php';
        </script>
        ";
} else{
    echo "
        <script>
            alert('data gagal dihapus!!!');
            document.location.href = 'admin-list-buku.php';
        </script>
        ";
}
?>