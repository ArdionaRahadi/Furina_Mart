-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 04:08 AM
-- Server version: 11.4.2-MariaDB-log
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_barang_keluar`
--

CREATE TABLE `t_barang_keluar` (
  `id` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_keluar` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_barang_masuk`
--

CREATE TABLE `t_barang_masuk` (
  `id` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_masuk` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_barang_masuk`
--

INSERT INTO `t_barang_masuk` (`id`, `barcode`, `nama_barang`, `harga`, `jumlah_barang`, `tanggal_masuk`) VALUES
(34, '7658904783', 'Menjes', 1000, 2, 1731554604000),
(35, '8765498306', 'Fanta', 5000, 10, 1731557208000);

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$JOpSYI.MbyhD/PARsD8aQOISUq4aMw3YR66bzopfQOrPoydUoiCje'),
(2, 'ardiona', '$2y$10$HhZdMFTsfbcPuZGWfmbVSOOT0eyJ8rU5ybJQaY7A8sIxp1pppbFfq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcod_barang_keluar` (`barcode`);

--
-- Indexes for table `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcod_barang_masuk` (`barcode`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
