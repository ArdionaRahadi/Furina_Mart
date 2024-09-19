-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2024 pada 03.18
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
  `no_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang_masuk`
--

CREATE TABLE `t_barang_masuk` (
  `id` int(11) NOT NULL,
  `no_barang` char(5) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `t_barang_masuk`
--

INSERT INTO `t_barang_masuk` (`id`, `no_barang`, `nama_barang`, `harga`, `jumlah_barang`, `tanggal_masuk`) VALUES
(1, 'M90ZA', 'Oreo', 3000, 10, '2024-09-16 17:00:00'),
(2, 'Z78YZ', 'Biskuit Roma', 10000, 20, '2024-09-17 16:25:04'),
(3, 'J65HZ', 'Permen Yupi', 500, 30, '2024-09-17 16:25:16'),
(4, 'R54ER', 'Permen Kopiko', 500, 40, '2024-09-17 16:21:46'),
(5, 'L04HN', 'Permen Kiss Blueberry', 500, 50, '2024-09-17 16:22:44'),
(6, 'A23RT', 'Permen Kiss Mint', 500, 60, '2024-09-17 16:23:09'),
(7, 'R90TR', 'Strepsils', 3000, 70, '2024-09-17 16:24:08'),
(8, 'C45RZ', 'Teh Pucuk', 3500, 80, '2024-09-17 16:24:44'),
(9, 'U77GH', 'Floridina', 4000, 90, '2024-09-17 16:26:59'),
(10, 'O10PL', 'Coca cola', 22000, 80, '2024-09-17 16:26:59');

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
(1, 'admin', '$2y$10$JOpSYI.MbyhD/PARsD8aQOISUq4aMw3YR66bzopfQOrPoydUoiCje');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
db_kasir
