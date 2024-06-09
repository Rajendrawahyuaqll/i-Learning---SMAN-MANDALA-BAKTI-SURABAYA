-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2024 pada 15.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sma_manba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_semester` char(255) NOT NULL,
  `nis` char(255) NOT NULL,
  `kode_mapel` char(255) NOT NULL,
  `nilai_uh` char(255) NOT NULL,
  `nilai_uts` char(255) NOT NULL,
  `nilai_uas` char(255) NOT NULL,
  `kode_kelas` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `id_semester`, `nis`, `kode_mapel`, `nilai_uh`, `nilai_uts`, `nilai_uas`, `kode_kelas`, `created_at`, `updated_at`) VALUES
(1, '1/22', '1116', '123', '80', '85', '90', '101', NULL, NULL),
(2, '1/22', '1137', '127', '85', '88', '94', '101', NULL, NULL),
(3, '1/22', '1140', '124', '70', '90', '100', '111', NULL, NULL),
(4, '2/23', '1157', '128', '85', '80', '95', '111', NULL, NULL),
(5, '2/23', '1116', '126', '88', '70', '80', '101', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
