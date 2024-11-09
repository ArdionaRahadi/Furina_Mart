-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2024 pada 07.30
-- Versi server: 11.5.2-MariaDB
-- Versi PHP: 8.3.10

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
-- Struktur dari tabel `t_barang_keluar`
--

CREATE TABLE `t_barang_keluar` (
  `id` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_keluar` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang_masuk`
--

CREATE TABLE `t_barang_masuk` (
  `id` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `t_barang_masuk`
--

INSERT INTO `t_barang_masuk` (`id`, `barcode`, `nama_barang`, `harga`, `jumlah_barang`, `tanggal_masuk`) VALUES
(2, '365478095', 'Taro', 10000, 100, '2024-09-24 14:27:39'),
(3, '580963258', 'Pota Bee', 5000, 29, '2024-09-30 02:31:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$JOpSYI.MbyhD/PARsD8aQOISUq4aMw3YR66bzopfQOrPoydUoiCje'),
(2, 'Ardiona', '$2y$10$qbTYdKr.dE/XFpS1TCIoruMWQ487umE84lTAWxoh.mqqWwU9fjQaG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`) USING BTREE;

--
-- Indeks untuk tabel `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
