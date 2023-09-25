-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2023 at 06:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posko_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(256) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama_desa`, `id_kecamatan`, `id_kabupaten`, `created_at`) VALUES
(1, 'Bingkeng', 1, 1, '2023-09-22 02:31:19'),
(2, 'Bolang', 1, 1, '2023-09-22 02:31:19'),
(3, 'Panulisan', 1, 1, '2023-09-22 02:31:19'),
(4, 'Adimulya', 2, 1, '2023-09-22 02:31:19'),
(5, 'Bantar', 2, 1, '2023-09-22 02:31:19'),
(6, 'Mulyasari', 3, 1, '2023-09-22 02:31:19'),
(8, 'Srowot', 10, 3, '2023-09-23 18:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `nama_kabupaten` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama_kabupaten`, `created_at`) VALUES
(1, 'Cilacap', '2023-09-22 02:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(256) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `id_kabupaten`, `created_at`) VALUES
(1, 'Dayeuhluhur', 1, '2023-09-22 02:27:12'),
(2, 'Wanareja', 1, '2023-09-22 02:27:13'),
(3, 'Majenang', 1, '2023-09-22 02:27:13'),
(4, 'Cimanggu', 1, '2023-09-22 02:27:13'),
(5, 'Karangpucung', 1, '2023-09-22 02:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_pelaporan` int(11) NOT NULL,
  `status` varchar(128) NOT NULL DEFAULT 'proses',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `waktu_status` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_pelaporan`, `status`, `created_at`, `updated_at`, `waktu_status`) VALUES
(1, 1, 'proses', '2023-09-25 11:38:48', '2023-09-25 11:38:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(22, '2023-09-21-091218', 'App\\Database\\Migrations\\Users', 'default', 'App', 1695324331, 1),
(23, '2023-09-21-184509', 'App\\Database\\Migrations\\Kecamatan', 'default', 'App', 1695324331, 1),
(24, '2023-09-21-184809', 'App\\Database\\Migrations\\Desa', 'default', 'App', 1695324332, 1),
(25, '2023-09-21-185701', 'App\\Database\\Migrations\\DataBanjir', 'default', 'App', 1695324332, 1),
(26, '2023-09-21-185948', 'App\\Database\\Migrations\\Laporan', 'default', 'App', 1695324332, 1),
(27, '2023-09-21-191755', 'App\\Database\\Migrations\\Kabupaten', 'default', 'App', 1695324333, 1),
(28, '2023-09-22-110107', 'App\\Database\\Migrations\\Laporan', 'default', 'App', 1695380495, 2),
(30, '2023-09-22-110742', 'App\\Database\\Migrations\\Pelaporan', 'default', 'App', 1695380912, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_rumah` varchar(128) NOT NULL,
  `jumlah_warga` varchar(128) NOT NULL,
  `jumlah_meninggal` varchar(128) NOT NULL,
  `jumlah_pengungsi` varchar(128) NOT NULL,
  `kebutuhan_perahu` varchar(128) NOT NULL,
  `kebutuhan_tenda` varchar(128) NOT NULL,
  `kebutuhan_beras` varchar(128) NOT NULL,
  `kebutuhan_telur` varchar(128) NOT NULL,
  `kebutuhan_mineral` varchar(128) NOT NULL,
  `kebutuhan_minyak` varchar(128) NOT NULL,
  `kebutuhan_pengobatan` varchar(128) NOT NULL,
  `penyebab_banjir` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`id`, `id_kabupaten`, `id_kecamatan`, `id_desa`, `id_user`, `jumlah_rumah`, `jumlah_warga`, `jumlah_meninggal`, `jumlah_pengungsi`, `kebutuhan_perahu`, `kebutuhan_tenda`, `kebutuhan_beras`, `kebutuhan_telur`, `kebutuhan_mineral`, `kebutuhan_minyak`, `kebutuhan_pengobatan`, `penyebab_banjir`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 3, '8', '8', '87', '67', '6', '6', '6', '6', '6', '6', '6', 'sd', '2023-09-25 11:38:48', '2023-09-25 11:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(256) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `id_desa`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$jTjEOlCBZ31sqVdGkfJXmOU3Sz5jsaHWc25ByTU7EKm6mLKcuBkgu', 'Rizki Andika Super', 1, 'superadmin', '2023-09-22 02:26:44', NULL),
(2, 'admin2', '$2y$10$Evj9pEW6No.jVROI3Ec9s.iRMQIZtaKRwVly51AIUBEJMF7v70yN2', 'Rizki Andika Admin', 1, 'admin', '2023-09-22 02:26:44', '2023-09-21 23:24:30'),
(3, 'admin3', '$2y$10$ULZYyhbdPGmou4d..vc1d.e9vPDlUfAId46KqlyPjhUZWl7SoV8lq', 'Rizki Andika User', 1, 'user', '2023-09-22 02:26:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
