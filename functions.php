<?php

// koneksi ke database  dengan parameter nama host, username, paswd, nama dabatase
$koneksi = mysqli_connect("localhost", "root", "", "perpus");

////////////////////////FUNCTION TABEL BUKU/////////////////////////////////
// proses mengambil tiap isi di database
function query($query) {
    global $koneksi;

    // lemari
    $result = mysqli_query($koneksi, $query);
    //menyiapkan data kosong
    $rows = [];

    // Proses memasukkan tiap isi kedalam $rows
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    
    global $koneksi;
    // ambil data tiap elemen
    $judul = $data["judul"];
    $pengarang = $data["pengarang"];
    $tahun = $data["tahun"];
    $penerbit = $data["penerbit"];
    $jumlah_buku = $data["jumlah_buku"];
    


    // upload gambar
    $sampul = upload();
    if ( !$sampul) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO tblbuku
            VALUES
            ('', '$judul', '$pengarang', '$tahun', '$penerbit', '$jumlah_buku', '$sampul')
        ";
    mysqli_query($koneksi, $query);
    //mengembalikan nilai apakah ada perubahan atau tidak
    return mysqli_affected_rows($koneksi);
}



function upload() {
    // ambil isi dari $_FILES masukkan ke dalam variabel
    $namaFile = $_FILES['sampul']['name'];
    $ukuranFile =$_FILES['sampul']['size'];
    $error = $_FILES['sampul']['error'];
    $tmpName = $_FILES['sampul']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // yang di upload gambar / tidak

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // mengambil ekstensi file yang diupload dari 1 string gambar 
    // menggunakan fungsi explode=> memecah 1 string menjadi array
    // ahmad.jpg = ['ahmad', 'jpg]
    $ekstensiGambar = explode('.', $namaFile);
    // membuat sistem mengambil paling belakang saja
    // ex ahmad.fanani.jpg => yang diambil ekstensi belakang
    // mengubah huruf kecil semua ex fanani.JPG => fanani.jpg
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // mengecek ekstensi di dalam list ekstensi
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Masukkan gambar yang sesuai!!!');
        </script>";
        return false;
    }

    // cek ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar boss!!!!');
    </script>";
    return false;
    }


    // lolos pengecekan 
    move_uploaded_file($tmpName, 'foto/'.$namaFile);
    return $namaFile;
}



function ubah($data) {
    global $koneksi;
    //var_dump($data);die;
    // ambil data tiap elemen
    $id = $data["idbuku"];
    $judul = $data["judul"];
    $pengarang = $data["pengarang"];
    $tahun = $data["tahun"];
    $penerbit = $data["penerbit"];
    $jumlah_buku = $data["jumlah_buku"];
    $sampulLama = $data["sampulLama"];
    

    // cek apakah user memilih gambar baru apa tidak
    if ( $_FILES['sampul']['error'] === 4 ) {
        $sampul = $sampulLama;
        
    } else {
        $sampul = upload();
    }


    //query update data
    $query = "UPDATE tblbuku SET
                judul = '$judul',
                pengarang = '$pengarang',
                tahun_terbit = '$tahun',
                penerbit = '$penerbit',
                jumlah_buku = '$jumlah_buku',
                sampul = '$sampul'
              WHERE idbuku = '$id'
        ";
    // var_dump($query);die;
    // proses ke database
    mysqli_query($koneksi, $query);
    //mengembalikan nilai apakah ada perubahan atau tidak
    return mysqli_affected_rows($koneksi);

}


function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tblbuku WHERE idbuku=$id");
    //mengembalikan nilai apakah ada perubahan atau tidak
    //var_dump(mysqli_affected_rows($koneksi));die;
    return mysqli_affected_rows($koneksi);
}

////////////////////////FUNCTION TABEL BUKU/////////////////////////////////

?>

