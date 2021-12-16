<?php

require 'config.php';

$id = $_GET["id"];
// var_dump($id);die;
if (hapus_sup($id) > 0) {
    echo "
        <script>
            alert('data berhasil di hapus!');
            document.location.href = 'supplier.php';
        </script>
        ";
} else{
    echo "
        <script>
            alert('data gagal dihapus!!!');
            document.location.href = 'supplier.php';
        </script>
        ";
}
?>