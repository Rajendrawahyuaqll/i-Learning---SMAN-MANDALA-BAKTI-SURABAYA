-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 12.36
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
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pegawai` char(255) NOT NULL,
  `ttl` char(255) NOT NULL,
  `jenis_kelamin` char(255) NOT NULL,
  `agama` char(255) NOT NULL,
  `pendidikan_akhir` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `user` char(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `no_hp` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama_pegawai`, `ttl`, `jenis_kelamin`, `agama`, `pendidikan_akhir`, `email`, `user`, `role_id`, `no_hp`, `created_at`, `updated_at`) VALUES
(8101, 'Haikal Putra', 'Yogyakarta, 09-11-1995', 'laki-laki', 'islam', 'S1 S.Pd', 'haikal@smanba.ac.id', 'haikalsmanbaygy', 1, '081216523477', NULL, NULL),
(8102, 'Sri Javier', 'YGY, 08-12-1997', 'perempuan', 'konghucu', 'S1 S.Kom', 'sri@smanba.ac.id', 'srismanbaygy', 1, '081216789233', NULL, NULL),
(8103, 'Wino Akhyar', 'JKT, 06-03-2000', 'laki-laki', 'islam', 'S1 S.A.P', 'wino@smanba.ac.id', 'winosmanbaygy', 1, '081355484971', NULL, NULL),
(8104, 'Farhan Abdullah', 'SBY, 09-02-2000', 'laki-laki', 'kristen', 'S1 S.E', 'farhan@smanba.ac.id', 'farhansmanbaygy', 1, '0812527673', NULL, NULL),
(8105, 'Tri Fadhil', 'BDG, 17-03-1999', 'laki-laki', 'islam', 'S1 S. Pd', 'fadhil@smanba.ac.id', 'fadhilsmanbaygy', 1, '081312719388', NULL, NULL),
(8510, 'Orlando Christiano', 'NTT, 25-06-2000', 'laki-laki', 'katolik', 'S1 S. Kom', 'orlan@smanba.ac.id', 'orlansmanbaygy', 2, '0815672349', NULL, NULL),
(8520, 'Akmal Duanda', 'SMR, 19-09-1996', 'laki-laki', 'islam', 'S1 S. Ak', 'akmal@smanba.ac.id', 'akmalsmanbaygy', 2, '081672835464', NULL, NULL),
(8530, 'Ilona Devgi', 'YGY, 22-06-2000', 'perempuan', 'hindu', 'S1 S. Kom', 'ilona@smanba.ac.id', 'ilonasmanbaygy', 2, '081675234487', NULL, NULL),
(8540, 'Zatalini Ruth', 'BDG, 28-03-1998', 'perempuan', 'kristen', 'S1 S.Ikom', 'zata@smanba.ac.id', 'zatasmanbaygy', 2, '08167835426', NULL, NULL),
(8550, 'Rani Syailendra', 'Ambon, 17-08-1999', 'perempuan', 'katolik', 'S1 S. Pd', 'rani@smanba.ac.id', 'ranismanbaygy', 2, '08156278543', NULL, NULL),
(8710, 'Ian nadhif', 'JKT, 13-06-2000', 'laki-laki', 'islam', 'S1 S. M', 'ian@smanba.ac.id', 'iansmanbaygy', 3, '08166372854', NULL, NULL),
(8720, 'Tya dahlia', 'SBY, 14-11-2000', 'perempuan', 'islam', 'S1 S. Sos', 'tya@smanba.ac.id', 'tyasmanbaygy', 3, '08536278124', NULL, NULL),
(8730, 'Farah', 'NTT, 09-12-1996', 'perempuan', 'islam', 'S1 Ilkom', 'farah@smanba.ac.id', 'farahsmanbaygy', 3, '081216411033', NULL, NULL),
(8740, 'Syaikh Ahmad', 'Arab, 01-01-1999', 'laki-laki', 'islam', 'S1 S. Ak', 'syaikh@smanba.ac.id', 'syaikhsmanbaygy', 3, '08155276354', NULL, NULL),
(8750, 'Devinta Diana', 'YGY, 14-08-1999', 'perempuan', 'islam', 'S2 M. Ak', 'devinta@smanba.ac.id', 'devintasmanbaygy', 3, '08251672538', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8753;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
