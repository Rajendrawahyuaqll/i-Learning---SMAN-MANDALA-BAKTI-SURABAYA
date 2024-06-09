-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2024 pada 18.09
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
-- Struktur dari tabel `gurumapels`
--

CREATE TABLE `gurumapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `ttl` varchar(20) NOT NULL,
  `Agama` varchar(7) NOT NULL,
  `nip` char(255) NOT NULL,
  `nama` char(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_mapel` char(255) NOT NULL,
  `kkm_mapel` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurumapels`
--

INSERT INTO `gurumapels` (`id`, `jenis_kelamin`, `ttl`, `Agama`, `nip`, `nama`, `no_hp`, `id_mapel`, `kkm_mapel`, `created_at`, `updated_at`) VALUES
(1, 'laki-laki', 'BDG, 25-11-2000', 'islam', '4127', 'Nur Iqbal', '082553674512', 'PKN', '80', NULL, NULL),
(2, 'laki-laki', 'JBG, 18-09-1999', 'islam', '4123', 'Fahmi Akhyar Abdillah', '0863275347823', 'IPA', '75', NULL, NULL),
(3, 'perempuan', 'JKT, 11-12-2001', 'islam', '4199', 'Adenia Nur', '083467532644', 'Matematika', '78', NULL, NULL),
(4, 'laki-laki', 'NTT, 09-02-2000', 'katolik', '4135', 'Reza Arsya', '087466325648', 'Bahasa Indonesia', '79', NULL, NULL),
(5, 'laki-laki', 'SBY, 03-02-1999', 'islam', '4122', 'Arse Patasik', '087763492377', 'Bahasa Inggris', '80', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gurumapels`
--
ALTER TABLE `gurumapels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gurumapels`
--
ALTER TABLE `gurumapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
