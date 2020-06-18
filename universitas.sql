-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 01:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_depan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ulrich', 'Stren', 'L', 'Kristen', 'France', 'ulrich.jpg', 0, NULL, '2020-06-14 17:07:57'),
(2, 'Aelita', 'Stone', 'P', 'Kristen', 'Virtual', NULL, 0, NULL, NULL),
(3, 'Odd', 'Delarobia', 'L', 'Kristen', 'Paris', NULL, 0, NULL, NULL),
(4, 'Yumi', 'Sauki', 'P', 'Buddha', 'Japan', NULL, 0, NULL, NULL),
(5, 'aeda', 'stren', 'L', 'Islam', 'Buni', NULL, 0, NULL, NULL),
(12, 'Haruyuki', 'Arita', 'L', 'Ateis', 'Tokyo', NULL, 2, '2020-06-14 19:08:09', '2020-06-14 19:08:09'),
(13, 'Mahmud', 'Syakir', 'L', 'Islam', 'Jakarta', NULL, 3, '2020-06-15 20:29:17', '2020-06-15 20:29:17'),
(14, 'kaguya', 'sama', 'P', 'Ateis', 'Japan', 'kaguya.png', 4, '2020-06-15 20:46:25', '2020-06-15 20:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_matkul`
--

CREATE TABLE `mahasiswa_matkul` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_matkul`
--

INSERT INTO `mahasiswa_matkul` (`id`, `mahasiswa_id`, `matkul_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 80, '2020-06-15 07:24:05', '0000-00-00 00:00:00'),
(2, 1, 2, 75, '2020-06-15 07:24:05', '0000-00-00 00:00:00'),
(3, 2, 1, 80, '2020-06-15 07:39:20', '0000-00-00 00:00:00'),
(8, 2, 2, 90, '2020-06-16 03:25:52', '2020-06-16 10:25:52'),
(9, 3, 1, 70, '2020-06-16 16:59:52', '2020-06-16 23:59:52'),
(10, 3, 2, 88, '2020-06-16 17:00:01', '2020-06-17 00:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id`, `kode`, `nama`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'M-001', 'Matematika', 'ganjil', '2020-06-15 07:23:29', '0000-00-00 00:00:00'),
(2, 'B-002', 'Bahasa Indonesia', 'ganjil', '2020-06-15 07:23:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_09_061105_create_mahasiswa_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'aeda', 'aeda10@gmail.com', NULL, '$2y$10$sM.H2LVAECUOAQ4jdXjNi.Eem8qoh6O4/0cYuPuoGXC8Me92jYfcu', '0IyLjNWTABnwToVE47EU2xYquHmhfDv2cCgnMxzcSHM02Xami7n01GXnZKo3', '2020-06-12 16:24:35', '2020-06-12 16:24:35'),
(2, 'mahasiswa', 'Haruyuki', 'haruyuki@gmail.com', NULL, '$2y$10$kEJOonh1J830cgTSTio8Yek6T2p9Bu28C6OMh7JEuwycyc41JQPvW', '9hWlp3Q4nJJCMIqHkUOHaHaebyqGD9Xyt1CBcfN10UDNwd4OA9MyE1k2K3UM', '2020-06-14 19:08:09', '2020-06-14 19:08:09'),
(3, 'mahasiswa', 'Mahmud', 'mahmud@gmail.com', NULL, '$2y$10$NTzR1SwmvtftP6PNUcftGOSXO16aiDjM/Y3UKT/9aTM4f/AIU7DH6', 'JwsyNB8KGa7A8UamLni2t8bxwCy2qBS7fXzpOXyLckmSfBepBWRy20RCbFbj', '2020-06-15 20:29:17', '2020-06-15 20:29:17'),
(4, 'mahasiswa', 'kaguya', 'kaguya@gmail.com', NULL, '$2y$10$Rv7g8aPWhJYM89DiRH/Vc.eZaLWHPzQuMLUJKI0QDlZ7u6sNevYL.', 'kQpXNxa3jvCN2qaFEiNCTvt6PjNiCKTBhXqACKy57jwCmiHNTYcjIpSMEWdj', '2020-06-15 20:46:25', '2020-06-15 20:46:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_matkul`
--
ALTER TABLE `mahasiswa_matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mahasiswa_matkul`
--
ALTER TABLE `mahasiswa_matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
