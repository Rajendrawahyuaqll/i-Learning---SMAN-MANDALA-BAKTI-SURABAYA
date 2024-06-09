-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2024 pada 15.10
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
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` char(255) NOT NULL,
  `nama` char(255) NOT NULL,
  `ttl` char(255) NOT NULL,
  `alamat` char(255) NOT NULL,
  `jenis_kelamin` char(255) NOT NULL,
  `agama` char(255) NOT NULL,
  `asal_sekolah` char(255) NOT NULL,
  `no_ijazah_smp` char(255) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `nama`, `ttl`, `alamat`, `jenis_kelamin`, `agama`, `asal_sekolah`, `no_ijazah_smp`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1116, '22051214116', 'Siti Nur Hamidah', 'Jombang, 04-04-2004', 'Jl. Simo Rukun 8/18 YGY', 'perempuan', 'islam', 'SMPN 4 SBY', '6386459', '101', NULL, NULL),
(1137, '22051214137', 'Karim Sultan', 'Yogyakarta, 04-07-2003', 'Jl. Babaran No. 7 YGY', 'laki-laki', 'islam', 'SMPN 2 YGY', '8547934', '103', NULL, NULL),
(1140, '22051214140', 'Rajendra Wahyu Aqilla', 'Gresik, 03-03-2003', 'Jl. Anggrek 5/80 YGY', 'laki-laki', 'islam', 'SMPN 5 GRESIK', '5387469', '103', NULL, NULL),
(1157, '22051214157', 'Ihsan Alaydrus', 'Arab, 09-01-2003', 'Jl. Jambrong 9 No. 5 YGY', 'laki-laki', 'islam', 'SMPN 8 YGY', '4538729', '105', NULL, NULL),
(1745, '22051214745', 'Puan Anjayani', 'Surabaya, 09-05-2004', 'Jl. Mawar 5 No. 3A YGY', 'perempuan', 'budha', 'SMPN 2 YGY', '5483962', '107', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1746;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
