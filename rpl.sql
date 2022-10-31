-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 07:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(5) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `depresiasi` int(20) NOT NULL,
  `lama` int(4) NOT NULL,
  `harga` int(20) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `merk`, `satuan`, `keterangan`, `kondisi`, `depresiasi`, `lama`, `harga`, `lokasi`, `jumlah`, `tgl_input`) VALUES
(1, 'SV1', 'Laptop', 'Asus', 'Unit', 'Asus ROG', 'Baik', 18000000, 12, 220000000, '0', 1, '2022-10-31 06:06:48'),
(4, 'SV2', 'ESP32', 'Espressif Systems', 'Unit', 'ESP32', 'Baik', 70000, 1, 75000, '0', 20, '2022-10-31 05:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(6) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `id_peminjam` int(5) NOT NULL,
  `jumlah_pinjam` int(4) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `batas` date NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `kondisi_awal` varchar(15) NOT NULL,
  `kondisi_kembali` varchar(15) DEFAULT NULL,
  `terlambat` int(3) DEFAULT NULL,
  `denda` int(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_barang`, `id_peminjam`, `jumlah_pinjam`, `tgl_pinjam`, `batas`, `tgl_kembali`, `kondisi_awal`, `kondisi_kembali`, `terlambat`, `denda`, `status`) VALUES
(7, 'SV1', 3, 1, '2022-06-23', '2022-10-26', '2022-10-26 12:08:14', 'Baik', 'Baik', NULL, NULL, 'Completed'),
(8, 'SV1', 2, 1, '2022-10-23', '2022-10-26', NULL, 'Baik', NULL, NULL, NULL, 'Process'),
(9, 'SV2', 6, 1, '2022-10-23', '2022-10-26', NULL, '', NULL, NULL, NULL, 'Pending'),
(10, 'SV2', 7, 3, '2022-10-23', '2022-10-26', '2022-10-31 12:20:22', 'Baik', 'Baik', NULL, NULL, 'Completed'),
(11, 'SV1', 2, 1, '2022-10-31', '2022-11-04', NULL, '', NULL, NULL, NULL, 'Canceled'),
(12, 'SV1', 2, 4, '2022-10-31', '2022-11-02', NULL, '', NULL, NULL, NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `email`, `password`, `role`) VALUES
(1, 'Fitrah Firdaus', 'fitrahf87@gmail.com', 'de7f47e09c8e05e6021ababdf6bc58e7', 'superadmin'),
(2, 'Dandi Supriatna Fauzi', 'dandisf67@gmail.com', '66121d1f782d29b62a286909165517bc', 'user'),
(3, 'Gunawan Prabowo', 'bowbow@gmail.com', 'f356355c1634839cf42769e7f30905a3', 'user'),
(6, 'Citra Dewi', 'citra@gmail.com', 'def7924e3199be5e18060bb3e1d547a7', 'user'),
(7, 'Adam', 'adam@gmail.com', 'e1fc9c082df6cfff8cbcfff2b5a722ef', 'user'),
(8, 'Dendra', 'dean@gmail.com', 'e3ea33961a7c5b1ec04d6c97aa3b5379', 'user'),
(9, 'wijdan', 'mohamadwijdan@student.uns.ac.id', '9114654ed8f622108a3a4947dcc126f6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodde` (`kode`),
  ADD KEY `lokasi` (`lokasi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_peminjam` (`id_peminjam`),
  ADD KEY `kodebarang` (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `kodebarang` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
