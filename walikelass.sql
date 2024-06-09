-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2024 pada 14.25
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
-- Struktur dari tabel `walikelass`
--

CREATE TABLE `walikelass` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` char(255) NOT NULL,
  `id_kelas` char(255) NOT NULL,
  `nama` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `walikelass`
--

INSERT INTO `walikelass` (`id`, `nip`, `id_kelas`, `nama`, `created_at`, `updated_at`) VALUES
(1, '4121', '101', 'Budi Santoso', NULL, NULL),
(2, '4128', '102', 'Octania Sriwahyuni', NULL, NULL),
(3, '4133', '103', 'Ardiva Yusati', NULL, NULL),
(4, '4188', '104', 'Bambang Wicaksono', NULL, NULL),
(5, '4150', '105', 'Zalikha Putri', NULL, NULL),
(6, '4145', '106', 'Danta Arya', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `walikelass`
--
ALTER TABLE `walikelass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `walikelass`
--
ALTER TABLE `walikelass`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
