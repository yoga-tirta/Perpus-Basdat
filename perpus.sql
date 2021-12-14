-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 04:03 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
(2, 'admin2', '123', 'admin', 'Bangkalan', '0872312312312');

-- --------------------------------------------------------

--
-- Table structure for table `tblbuku`
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
-- Dumping data for table `tblbuku`
--

INSERT INTO `tblbuku` (`idbuku`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `jumlah_buku`, `sampul`) VALUES
(123, 'WPU', 'Padhika', '2109', 'Unpas', 9, '1.jpg'),
(7708, 'WPU', 'Pak Dhika', '2019', 'Unpas', 5, '2.jpg'),
(7710, 'WPU1', 'Pak Dhika1', 'qwe1', 'Unpas1', 50, '1.jpg');

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

--
-- Dumping data for table `tblitem`
--

INSERT INTO `tblitem` (`iditem`, `idtransaksi`, `idbuku`, `jumlah_pinjam`) VALUES
(2, 5, 123, 1),
(3, 6, 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaksi`
--

CREATE TABLE `tbltransaksi` (
  `idtransaksi` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idadmin` int(10) NOT NULL DEFAULT '0',
  `tgl_pinjam` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `denda` int(20) NOT NULL,
  `jumlah_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`idtransaksi`, `iduser`, `idadmin`, `tgl_pinjam`, `tgl_kembali`, `status`, `denda`, `jumlah_denda`) VALUES
(5, 3, 1, '2021-12-14', '2021-12-14', 'kembali', 0, '0'),
(6, 3, 0, '2021-12-14', '2021-12-21', 'dipinjam', 0, '');

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
(3, 'teguh', '123', 'Teguh Budi', 'Lamongan', '082338563527');

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
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `idtransaksi` (`idtransaksi`),
  ADD KEY `idbuku` (`idbuku`);

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
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbuku`
--
ALTER TABLE `tblbuku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7711;

--
-- AUTO_INCREMENT for table `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

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
