-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 10:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_laravel_tb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jenis_kendaraan` int(11) NOT NULL,
  `nama_jenis_kendaraan` varchar(255) NOT NULL,
  `tarif_parkir` int(12) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jenis_kendaraan`, `nama_jenis_kendaraan`, `tarif_parkir`, `keterangan`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LCGC', 15000, 'Convero', 2, 1, NULL, '2026-06-06 02:08:22', '2026-06-05 20:55:51', NULL),
(2, 'JEEP', 20000, 'Keluar Ahmad Yani', 2, 1, NULL, '2026-06-06 02:24:29', '2026-06-05 20:55:10', NULL),
(3, 'MPV', 10000, 'xenia', 1, 1, NULL, '2026-06-06 03:47:53', '2026-06-05 20:54:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_06_05_004143_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `id_parkir` int(11) NOT NULL,
  `id_jenis_kendaraan` int(11) NOT NULL,
  `id_pintu_masuk` int(11) NOT NULL,
  `id_pintu_keluar` int(11) DEFAULT NULL,
  `nomor_parkir` varchar(12) NOT NULL,
  `nomor_polisi` varchar(12) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `total_jam` int(11) DEFAULT NULL,
  `total_menit` int(11) DEFAULT NULL,
  `total_durasi` decimal(12,2) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`id_parkir`, `id_jenis_kendaraan`, `id_pintu_masuk`, `id_pintu_keluar`, `nomor_parkir`, `nomor_polisi`, `tanggal_masuk`, `tanggal_keluar`, `total_jam`, `total_menit`, `total_durasi`, `harga`, `total_harga`, `status_bayar`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, 'LUSYRWUQZIP5', 'b123yy', '2026-06-06 07:39:51', '2026-06-06 08:19:33', 0, 39, 0.66, 20000, 13000, 'Sudah', 1, 2, '2026-06-06 07:39:51', '2026-06-06 01:19:33'),
(2, 2, 1, NULL, 'LZOR1K2VR1NH', 'B321yi', '2026-06-06 08:20:00', '2026-06-06 08:47:12', 0, 27, 0.45, 20000, 9000, 'Sudah', 1, 2, '2026-06-06 08:20:00', '2026-06-06 01:47:12'),
(3, 2, 3, NULL, 'BXM8QS7PFBIT', 'B321yi', '2026-06-06 08:44:45', '2026-06-06 08:44:45', NULL, NULL, NULL, 20000, NULL, 'Menunggu', 1, 1, '2026-06-06 08:44:45', '2026-06-06 01:44:45'),
(4, 1, 1, NULL, 'N4LWTD6LSQZK', 'b777t', '2026-06-06 08:45:11', '2026-06-06 08:45:11', NULL, NULL, NULL, 15000, NULL, 'Menunggu', 1, 1, '2026-06-06 08:45:11', '2026-06-06 01:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `pintu_parkir`
--

CREATE TABLE `pintu_parkir` (
  `id_pintu_parkir` int(11) NOT NULL,
  `nama_pintu_parkir` varchar(255) NOT NULL,
  `jenis_pintu_parkir` varchar(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pintu_parkir`
--

INSERT INTO `pintu_parkir` (`id_pintu_parkir`, `nama_pintu_parkir`, `jenis_pintu_parkir`, `keterangan`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gate 1', 'Masuk', 'Masuk melalui Ahmad yani', 2, 2, NULL, '2026-06-06 02:08:22', '2026-06-05 19:23:50', NULL),
(2, 'Gate 2', 'Keluar', 'Keluar Ahmad Yani', 2, 2, NULL, '2026-06-06 02:24:29', '2026-06-05 19:24:29', NULL),
(3, 'Gate 3', 'Masuk', 'Cut Mutia', 2, 2, NULL, '2026-06-06 08:23:50', '2026-06-06 01:23:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'rioo', 'rio@gmail.com', 'rio', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 1, 2, NULL, '2026-06-04 20:19:05', '2026-06-05 01:51:29', NULL),
(5, 'gigi', 'gigi@gmail.com', 'gigi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 1, 1, NULL, '2026-06-04 20:38:46', '2026-06-04 20:38:46', NULL),
(6, 'dodo', 'dodo@gmail.com', 'dodo', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 1, 1, NULL, '2026-06-04 21:06:51', '2026-06-04 21:06:51', NULL),
(7, 'fifit', 'fifi@gmail.com', 'fifi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 1, 1, NULL, '2026-06-04 21:07:22', '2026-06-04 21:07:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`),
  ADD UNIQUE KEY `nama_jenis_kendaraan` (`nama_jenis_kendaraan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`id_parkir`),
  ADD UNIQUE KEY `nomor_parkir` (`nomor_parkir`);

--
-- Indexes for table `pintu_parkir`
--
ALTER TABLE `pintu_parkir`
  ADD PRIMARY KEY (`id_pintu_parkir`),
  ADD UNIQUE KEY `nama_pintu_parkir` (`nama_pintu_parkir`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parkir`
--
ALTER TABLE `parkir`
  MODIFY `id_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pintu_parkir`
--
ALTER TABLE `pintu_parkir`
  MODIFY `id_pintu_parkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
