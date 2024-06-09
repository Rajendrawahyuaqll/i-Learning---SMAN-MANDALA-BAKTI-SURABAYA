-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2024 pada 14.00
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
-- Struktur dari tabel `pelajarans`
--

CREATE TABLE `pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` char(255) NOT NULL,
  `status_mapel` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelajarans`
--

INSERT INTO `pelajarans` (`id`, `nama_mapel`, `status_mapel`, `created_at`, `updated_at`) VALUES
(123, 'Bahasa Indonesia', '0', NULL, NULL),
(124, 'Bahasa Inggris', '0', NULL, NULL),
(125, 'Matematika', '0', NULL, NULL),
(126, 'IPA (Fisika & Biologi)', '0', NULL, NULL),
(127, 'PKN', '0', NULL, NULL),
(128, 'Seni Budaya', '0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelajarans`
--
ALTER TABLE `pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelajarans`
--
ALTER TABLE `pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
