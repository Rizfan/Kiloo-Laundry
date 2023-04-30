-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2021 pada 08.32
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laudry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_paket`, `qty`, `total_harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(46, 54, 1, 3, 30000, 'Extra Pewangi', '2021-04-08 06:35:02', '2021-04-08 06:35:02'),
(47, 54, 4, 2, 30000, 'oke', '2021-04-08 06:35:48', '2021-04-08 06:35:48'),
(48, 55, 8, 2, 20000, NULL, '2021-04-08 06:40:01', '2021-04-08 06:40:01'),
(49, 55, 8, 1, 10000, NULL, '2021-04-08 06:40:25', '2021-04-08 06:40:25'),
(50, 56, 6, 2, 18000, 'oke', '2021-04-08 06:57:34', '2021-04-08 06:57:34'),
(51, 56, 8, 1, 10000, 'extra pewangi', '2021-04-08 06:57:52', '2021-04-08 06:57:52'),
(52, 58, 6, 2, 18000, NULL, '2021-04-08 07:05:23', '2021-04-08 07:05:23'),
(53, 60, 1, 2, 20000, 'sip', '2021-04-10 17:27:21', '2021-04-10 17:27:21'),
(54, 60, 1, 3, 30000, 'extra pewangi', '2021-04-10 17:27:50', '2021-04-10 17:27:50'),
(55, 61, 8, 3, 30000, 'sip', '2021-04-14 06:55:53', '2021-04-14 06:55:53'),
(56, 61, 6, 2, 18000, 'mantap', '2021-04-14 06:56:42', '2021-04-14 06:56:42'),
(57, 63, 8, 2, 20000, 'extra pewangi', '2021-04-15 02:05:31', '2021-04-15 02:05:31'),
(58, 63, 8, 1, 10000, NULL, '2021-04-15 02:05:43', '2021-04-15 02:05:43'),
(59, 64, 6, 2, 18000, 'extra pewangi', '2021-04-17 17:16:33', '2021-04-17 17:16:33'),
(60, 64, 8, 3, 30000, NULL, '2021-04-17 17:18:00', '2021-04-17 17:18:00'),
(61, 65, 4, 3, 45000, 'okew', '2021-04-18 08:02:19', '2021-04-18 08:02:19'),
(62, 65, 5, 2, 14000, 'sip', '2021-04-18 08:02:43', '2021-04-18 08:02:43'),
(63, 69, 4, 1, 15000, 'w', '2021-04-18 09:58:24', '2021-04-18 09:58:24'),
(64, 69, 1, 3, 30000, 'w', '2021-04-18 09:58:34', '2021-04-18 09:58:34'),
(65, 73, 5, 2, 14000, 'okew', '2021-04-20 15:42:26', '2021-04-20 15:42:26'),
(66, 74, 6, 2, 18000, 'okew', '2021-04-21 03:41:23', '2021-04-21 03:41:23'),
(67, 74, 8, 1, 10000, NULL, '2021-04-21 03:56:06', '2021-04-21 03:56:06'),
(68, 76, 1, 2, 20000, 'okew', '2021-04-21 04:14:06', '2021-04-21 04:14:06'),
(69, 76, 1, 1, 10000, 'okew', '2021-04-21 04:24:51', '2021-04-21 04:24:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` bigint(20) UNSIGNED NOT NULL,
  `nama_member` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_member` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_member` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat_member`, `jenis_kelamin`, `tlp_member`, `created_at`, `updated_at`) VALUES
(2, 'Rispan', 'Bekasi', 'L', '082256349900', '2021-03-10 08:46:45', '2021-03-10 08:46:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_08_021610_create_member_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `tlp_outlet` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `tlp_outlet`, `created_at`, `updated_at`) VALUES
(0, 'w', 'w', 'a', NULL, NULL),
(1, 'Kartika Laundry', 'Cibitung, Kartika Wanasari', '0822563499', '2021-03-09 19:32:33', '2021-03-09 19:32:33'),
(5, 'Cibitung Laundry', 'Bekasi', '083523362', '2021-03-28 08:13:49', '2021-03-28 08:13:49'),
(9, 'Bekasi Laundry', 'Bekasi', '0823651', '2021-04-20 10:29:20', '2021-04-20 10:29:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis_paket` enum('Kiloan','Selimut','Bed Cover','Kaos','Lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_outlet`, `jenis_paket`, `nama_paket`, `harga_paket`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kiloan', 'Paket Hemat', 10000, '2021-03-09 19:38:09', '2021-03-09 19:38:09'),
(4, 1, 'Bed Cover', 'Paket Oce', 15000, '2021-03-26 07:16:52', '2021-03-26 07:16:52'),
(5, 1, 'Bed Cover', 'Paket Keluarga', 7000, '2021-03-27 15:56:23', '2021-03-27 15:56:23'),
(6, 5, 'Selimut', 'Paket Serba Murah', 9000, '2021-03-28 08:15:52', '2021-03-28 08:15:52'),
(8, 5, 'Bed Cover', 'oke oce', 10000, '2021-04-05 06:38:04', '2021-04-05 06:38:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) DEFAULT NULL,
  `kode_invoice` varchar(100) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon_transaksi` double DEFAULT NULL,
  `pajak_transaksi` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_transaksi` enum('Baru','Proses','Selesai','Diambil') DEFAULT NULL,
  `pembayaran` enum('Dibayar','Belum Dibayar') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl_transaksi`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon_transaksi`, `pajak_transaksi`, `total_bayar`, `status_transaksi`, `pembayaran`, `id_user`, `created_at`, `updated_at`) VALUES
(54, 1, 'INV/20210408/4V9775DMR', 2, '2021-04-08 13:34:20', '2021-04-08 13:34:00', '2021-04-08 13:36:42', 10000, 30, 3000, 51100, 'Diambil', 'Dibayar', 3, NULL, NULL),
(56, 5, 'INV/20210408/GAMG1ZIVK', 2, '2021-04-08 13:55:20', '2021-04-08 13:56:00', '2021-04-11 00:31:14', 20000, 20, 1400, 39520, 'Diambil', 'Dibayar', 5, NULL, NULL),
(58, 5, 'INV/20210408/D1G7CKEI6', 2, '2021-04-08 14:04:42', '2021-04-08 14:04:00', '2021-04-11 00:34:08', 10000, 20, 900, 23120, 'Diambil', 'Dibayar', 5, NULL, NULL),
(60, 1, 'INV/20210411/QHHEX314I', 2, '2021-04-11 00:24:19', '2021-04-11 00:24:00', '2021-04-14 14:20:16', 2000, 20, 2500, 43600, 'Selesai', 'Dibayar', 3, NULL, NULL),
(61, 5, 'INV/20210414/0FSEWK36N', 2, '2021-04-14 13:55:10', '2021-04-14 13:55:00', '2021-04-14 13:58:35', 2000, 15, 2400, 44540, 'Diambil', 'Dibayar', 3, NULL, NULL),
(63, 5, 'INV/20210415/UMSCSFZC2', 2, '2021-04-15 09:05:05', '2021-04-15 09:05:00', '2021-04-15 09:08:04', 2000, 20, 1500, 26800, 'Diambil', 'Dibayar', 3, NULL, NULL),
(64, 5, 'INV/20210418/9ZEQO25AT', 2, '2021-04-18 00:15:37', '2021-04-18 00:15:00', '2021-04-18 00:18:36', 5000, 20, 2400, 44320, 'Diambil', 'Dibayar', 3, NULL, NULL),
(65, 1, 'INV/20210418/TWFBACPWN', 2, '2021-04-18 14:59:52', '2021-04-18 14:59:00', '2021-04-18 15:05:02', 2000, 20, 2950, 51160, 'Selesai', 'Dibayar', 4, NULL, NULL),
(70, 9, NULL, NULL, '2021-04-20 17:37:29', NULL, NULL, NULL, NULL, NULL, NULL, 'Baru', 'Belum Dibayar', NULL, NULL, NULL),
(71, 9, NULL, NULL, '2021-04-20 17:37:32', NULL, NULL, NULL, NULL, NULL, NULL, 'Baru', 'Belum Dibayar', NULL, NULL, NULL),
(75, 5, NULL, NULL, '2021-04-21 11:08:30', NULL, NULL, NULL, NULL, NULL, NULL, 'Baru', 'Belum Dibayar', NULL, NULL, NULL),
(76, 1, 'INV/20210421/EIBPG2SMY', 2, '2021-04-21 11:13:49', '2021-04-22 11:13:00', NULL, 2000, 10, 1500, 30150, 'Proses', 'Belum Dibayar', 8, '2021-04-21 04:13:49', '2021-04-21 04:13:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_outlet` int(11) DEFAULT NULL,
  `role` enum('admin','kasir','owner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `id_outlet`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rispan', 'rispan', 'admin@gmail.com', NULL, '$2y$10$ZW4c19RCpi.E7gdV/y9BAOL/uQVn2TNtyPoP1JDPlz0d27kfyP33K', 0, 'admin', NULL, '2021-03-08 05:58:40', '2021-03-08 05:58:40'),
(4, 'Herlaya', 'rispan566', 'rispanher@gmail.com', NULL, '$2y$10$9cz1Bgua9E3xr2cPtDSUb.Kn1gK.De3ZE0PqgbNHoS7sJKcRWHEc2', 1, 'kasir', NULL, '2021-03-13 08:33:43', '2021-03-13 08:33:43'),
(5, 'Rizfan', 'rizfan', 'rispans@gmail.com', NULL, '$2y$10$hm./ybhtFGdgXPakM8z8ien..PmLYoR2EZcLxUWmWEF2tzklCK74W', 5, 'kasir', NULL, '2021-03-28 08:14:46', '2021-03-28 08:14:46'),
(8, 'Rizfan', 'rispanher', 'rispan@gmail.com', NULL, '$2y$10$xzFb0PjftumJ50ax02caBOMmMLsWwlkGePfqg7VBWlJlucMcuO7fm', 0, 'admin', NULL, '2021-04-05 06:02:46', '2021-04-05 06:02:46'),
(10, 'pan', 'pan', 'pan@gmail.com', NULL, '$2y$10$f0TNAs8zsM7zYTSLo9Vyh.soc.t.9h3FA3zzIV52s2ySFbT0.5aVK', 0, 'owner', NULL, '2021-04-21 05:56:19', '2021-04-21 05:56:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
