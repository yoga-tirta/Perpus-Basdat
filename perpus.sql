-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 10:32 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tbladmin`
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
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`idadmin`, `username`, `password`, `nama`, `alamat`, `notelp`) VALUES
(0, 'admin0', '123', 'admin0', 'telang', '085158925522'),
(1, 'admin1', '123', 'admin', 'Bangkalan', '082382193122'),
(2, 'admin2', '123', 'admin', 'Bangkalan', '0872312312312'),
(5, 'coba', 'coba', 'coba', 'coba', '123'),
(6, 'user', 'user', 'user', 'user', '123'),
(7, 'test', 'test', 'test', 'test', '213');

-- --------------------------------------------------------

--
-- Table structure for table `tblbuku`
--

CREATE TABLE `tblbuku` (
  `idbuku` int(11) NOT NULL,
  `idsupplier` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `jumlah_buku` int(10) NOT NULL,
  `sampul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbuku`
--

INSERT INTO `tblbuku` (`idbuku`, `idsupplier`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `jumlah_buku`, `sampul`) VALUES
(7714, 4, 'WPU', 'Pak Dhika', '2019', 'Unpas', 15, '5cm.png'),
(7715, 1, 'asdfr', '123', '2019', 'Unpas1', 51, 'a744fb07bfc8e08ed3314689152d1662.png'),
(7716, 6, 'asdfr', 'Pak Dhika', '2123', 'Unpas1', 12, '095ac2fad8f269ef5cfdbff57a2640c2.png'),
(7717, 1, 'WPU1', 'Pak Dhika1', '2123', 'Unpas1', 11, '1.jpg'),
(7718, 4, 'WPU2', 'Pak Dhika2', '123', 'Unpas2', 12, '5cm.png'),
(7719, 6, 'WPU3', 'Pak Dhika3', '2123', 'Unpas3', 5, '7.jpg'),
(7720, 7, 'WPU4', 'Pak Dhika4', '1234', 'Unpas4', 5, 'a744fb07bfc8e08ed3314689152d1662.png'),
(7721, 7, 'WPU', 'Pak Dhika', '2019', 'Unpas', 15, '1.jpg'),
(7722, 6, 'WPU5', 'Pak Dhika5', '2019', 'Unpas5', 125, '11430494_01bf3184_818f_4d60_80bd_9dd111a28f47_300_438.jpg'),
(7723, 8, 'WPU6', 'Pak Dhika6', '123', 'Unpas6', 116, 'senibodoamat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblitem`
--

CREATE TABLE `tblitem` (
  `iditem` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `idsupplier` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`idsupplier`, `nama`, `alamat`, `notelp`, `email`) VALUES
(1, 'pt sejahtera', 'jalan asem2', '082134452', 'sejahtera@gmail.com'),
(4, 'PT Trunojoyo', 'telang', '123123123123', 'utm@gmail.com'),
(6, 'PT Sup1', 'telang', '123', 'sup1@gmail.com'),
(7, 'PT Sup2', 'telang', '123', 'sub@gmai.com'),
(8, 'PT sup3', 'telang', '123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaksi`
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
-- Dumping data for table `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`idtransaksi`, `iduser`, `idadmin`, `tgl_pinjam`, `tgl_kembali`, `tgl_bayar`, `status`, `denda`, `jumlah_denda`, `pembayaran`, `kembalian`) VALUES
(5, 3, 1, '2021-12-07', '2021-12-14', '0', 'denda', 2, '1000', '0', '0'),
(6, 3, 0, '2021-12-14', '2021-12-21', '0', 'dipinjam', 0, '0', '0', '0'),
(7, 1, 1, '2021-12-08', '2021-12-16', '0', 'denda', 1, '500', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
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
-- Dumping data for table `tbluser`
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
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `idsupplier` (`idsupplier`);

--
-- Indexes for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `idtransaksi` (`idtransaksi`),
  ADD KEY `idbuku` (`idbuku`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indexes for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idadmin` (`idadmin`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblbuku`
--
ALTER TABLE `tblbuku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7724;

--
-- AUTO_INCREMENT for table `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `idsupplier` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD CONSTRAINT `idsupplier` FOREIGN KEY (`idsupplier`) REFERENCES `tblsupplier` (`idsupplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD CONSTRAINT `tblitem_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `tbltransaksi` (`idtransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblitem_ibfk_2` FOREIGN KEY (`idbuku`) REFERENCES `tblbuku` (`idbuku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD CONSTRAINT `idadmin` FOREIGN KEY (`idadmin`) REFERENCES `tbladmin` (`idadmin`),
  ADD CONSTRAINT `tbltransaksi_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tbluser` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
