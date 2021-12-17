-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2021 pada 19.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE `tbladmin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbladmin`
--

INSERT INTO `tbladmin` (`idadmin`, `username`, `password`, `nama`, `alamat`, `notelp`) VALUES
(0, 'admin0', '123', 'admin0', 'telang', '085158925522'),
(1, 'admin1', '123', 'admin', 'Bangkalan', '082382193122'),
(2, 'admin2', '123', 'admin', 'Bangkalan', '0872312312312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbuku`
--

CREATE TABLE `tblbuku` (
  `idbuku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `jumlah_buku` int(10) NOT NULL,
  `sampul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblbuku`
--

INSERT INTO `tblbuku` (`idbuku`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `jumlah_buku`, `sampul`) VALUES
(123, 'WPU', 'Padhika', '2109', 'Unpas', 5, '1.jpg'),
(7708, 'WPU', 'Pak Dhika', '2019', 'Unpas', 0, '2.jpg'),
(7710, 'WPU1', 'Pak Dhika1', 'qwe1', 'Unpas1', 41, '1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblitem`
--

CREATE TABLE `tblitem` (
  `iditem` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblitem`
--

INSERT INTO `tblitem` (`iditem`, `idtransaksi`, `idbuku`, `jumlah_pinjam`) VALUES
(2, 5, 123, 1),
(3, 6, 123, 1),
(4, 7, 7710, 1),
(5, 8, 7710, 2),
(6, 9, 7708, 5),
(7, 10, 123, 4),
(8, 14, 7710, 3),
(9, 15, 7710, 6),
(10, 16, 123, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbltransaksi`
--

CREATE TABLE `tbltransaksi` (
  `idtransaksi` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idadmin` int(10) NOT NULL DEFAULT 0,
  `tgl_pinjam` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL,
  `tgl_bayar` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL,
  `denda` int(20) NOT NULL,
  `jumlah_denda` varchar(255) NOT NULL DEFAULT '0',
  `pembayaran` varchar(255) NOT NULL DEFAULT '0',
  `kembalian` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`idtransaksi`, `iduser`, `idadmin`, `tgl_pinjam`, `tgl_kembali`, `tgl_bayar`, `status`, `denda`, `jumlah_denda`, `pembayaran`, `kembalian`) VALUES
(5, 3, 1, '2021-12-07', '2021-12-14', '2021-12-17', 'lunas', 2, '1000', '2000', '1000'),
(6, 3, 0, '2021-12-14', '2021-12-17', '2021-12-11', 'kembali', 0, '0', '0', '0'),
(7, 1, 1, '2021-12-08', '2021-12-16', '2021-12-10', 'lunas', 0, '500', '500', '0'),
(8, 2, 0, '2021-12-17', '2021-12-24', '2021-12-09', 'lunas', 0, '2000', '2000', '0'),
(9, 3, 0, '2021-12-17', '2021-12-24', '2021-12-19', 'lunas', 0, '3000', '3000', '0'),
(10, 1, 0, '2021-12-17', '2021-12-24', '', 'denda', 0, '1500', '', ''),
(13, 2, 0, '2021-12-11', '2021-12-22', '', 'dipinjam', 0, '0', '0', '0'),
(14, 2, 0, '2021-12-17', '2021-12-24', '', 'denda', 5, '2500', '', ''),
(15, 2, 0, '2021-12-17', '2021-12-24', '', 'dipinjam', 0, '', '', ''),
(16, 2, 0, '2021-12-17', '2021-12-24', '', 'denda', 4, '2000', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `username`, `password`, `nama`, `alamat`, `notelp`) VALUES
(1, 'yoga', '123', 'Yoga Tirta Permana', 'Mojokerto', '081234567890'),
(2, 'rama', '12345', 'Rama Priyadi', 'bangkalan', '123456789'),
(3, 'teguh', '123', 'Teguh Budi', 'Lamongan', '082338563527'),
(9, 'test', 'test', 'test', 'test', '213');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indeks untuk tabel `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `idtransaksi` (`idtransaksi`),
  ADD KEY `idbuku` (`idbuku`);

--
-- Indeks untuk tabel `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idadmin` (`idadmin`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tblbuku`
--
ALTER TABLE `tblbuku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7711;

--
-- AUTO_INCREMENT untuk tabel `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tblitem`
--
ALTER TABLE `tblitem`
  ADD CONSTRAINT `tblitem_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `tbltransaksi` (`idtransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblitem_ibfk_2` FOREIGN KEY (`idbuku`) REFERENCES `tblbuku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD CONSTRAINT `idadmin` FOREIGN KEY (`idadmin`) REFERENCES `tbladmin` (`idadmin`),
  ADD CONSTRAINT `tbltransaksi_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tbluser` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
