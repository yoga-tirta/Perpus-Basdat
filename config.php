<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "perpus";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}


//=============================FUNCTION TABEL BUKU==================================

// proses mengambil tiap isi di database
function query($query) {
    global $conn;

    // lemari
    $result = mysqli_query($conn, $query);
    //menyiapkan data kosong
    $rows = [];

    // Proses memasukkan tiap isi kedalam $rows
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    
    global $conn;
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
    mysqli_query($conn, $query);
    //mengembalikan nilai apakah ada perubahan atau tidak
    return mysqli_affected_rows($conn);
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
    global $conn;
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
    mysqli_query($conn, $query);
    //mengembalikan nilai apakah ada perubahan atau tidak
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tblbuku WHERE idbuku=$id");
    //hapus user

    //mengembalikan nilai apakah ada perubahan atau tidak
    //var_dump(mysqli_affected_rows($koneksi));die;
    return mysqli_affected_rows($conn);
}
//==========================FUNCTION TABEL BUKU============================


//==========================FUNCTION TABEL USER============================

function tambah_user($data) {
    global $conn;
    // ambil data tiap elemen
    $username = $data["username"];
    $password = $data["password"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $notelp = $data["notelp"];

    //query insert data
    $query = "INSERT INTO tbluser
            VALUES
            ('', '$username', '$password', '$nama', '$alamat', '$notelp')
        ";
    mysqli_query($conn, $query);
    //mengembalikan nilai apakah ada perubahan atau tidak
    return mysqli_affected_rows($conn);
}

function ubah_user($data) {
    global $conn;
    //var_dump($data["iduser"]);die;
    // ambil data tiap elemen
    $id = $data["iduser"];
    $username = $data["username"];
    $password = $data["password"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $notelp = $data["notelp"];
    
    //query update data
    $query = "UPDATE tbluser SET
                username = '$username',
                password = '$password',
                nama = '$nama',
                alamat = '$alamat',
                notelp = '$notelp'
              WHERE iduser = '$id'
        ";
    // var_dump($query);die;
    // proses ke database
    mysqli_query($conn, $query);
    //mengembalikan nilai apakah ada perubahan atau tidak
    return mysqli_affected_rows($conn);
}

function hapus_user($id) {
    global $conn;
    //hapus user
    mysqli_query($conn, "DELETE FROM tbluser WHERE iduser=$id");
    //mengembalikan nilai apakah ada perubahan atau tidak
    //var_dump(mysqli_affected_rows($koneksi));die;
    return mysqli_affected_rows($conn);
}

//==========================FUNCTION TABEL USER============================


?>
