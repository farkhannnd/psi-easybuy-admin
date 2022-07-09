-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 04:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easybuys`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `barang`, `stok_barang`, `idkategori`) VALUES
(1, 'Pot', 135, 2),
(2, 'Rak Tanaman Besar 4x90cm', 7, 1),
(3, 'Rak Tanaman Besar 3x90', 12, 1),
(4, 'Rak Tanaman Besar 2x90', 4, 1),
(5, 'Rak Tanaman Kecil 4x30', 4, 1),
(6, 'Tanaman Kaktus Kecil', 200, 101),
(7, 'Anggrek Bulan', 2, 2),
(27, 'Kaktus Putih', 2, 101),
(31, 'Tenda Anak motif Jerry', 2, 1),
(32, 'Mangkok Mie', 12, 102),
(33, '101', 12, 0),
(34, '102', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_stok`
--

CREATE TABLE `kategori_stok` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_stok`
--

INSERT INTO `kategori_stok` (`idkategori`, `namakategori`) VALUES
(0, 'Lainnya'),
(1, 'Perabotan'),
(2, 'Tanaman Hias Bunga'),
(3, 'Tanaman Hias Daun'),
(4, 'Tanaman Hias Air'),
(5, 'Tanaman Hias Buatan'),
(6, 'Bibit Tanaman Hias'),
(7, 'Tanaman Hias Gantung'),
(101, 'Tanaman Hias Kaktus'),
(102, 'Bunga Langka yang tidak boleh diperjualbelikan'),
(103, 'Tanaman Hias Berduri');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_jenis` enum('Masuk','Keluar') NOT NULL,
  `transaksi_kategori` int(11) NOT NULL,
  `transaksi_barang` int(11) NOT NULL,
  `transaksi_nominal` int(11) NOT NULL,
  `transaksi_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tanggal`, `transaksi_jenis`, `transaksi_kategori`, `transaksi_barang`, `transaksi_nominal`, `transaksi_keterangan`) VALUES
(2, '2022-07-01', 'Masuk', 1, 1, 5, 'asek'),
(3, '2022-06-01', 'Keluar', 101, 6, 6, 'ini jual'),
(4, '2022-07-07', 'Masuk', 1, 1, 40, 'ini pot'),
(5, '2021-01-01', 'Keluar', 101, 27, 12, ''),
(6, '2020-04-04', 'Masuk', 102, 7, 90, 'ilegal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adminlogo.png', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indexes for table `kategori_stok`
--
ALTER TABLE `kategori_stok`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori_stok`
--
ALTER TABLE `kategori_stok`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori_stok` (`idkategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
