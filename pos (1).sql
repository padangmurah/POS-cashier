-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 05:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` varchar(45) NOT NULL,
  `kode_barang` varchar(13) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `harga_akhir` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `kode_barang`, `nama`, `harga_awal`, `discount`, `harga_akhir`, `status`, `created_at`, `updated_at`) VALUES
('30a3cf19-413b-4b78-91ab-6f7537e80f55', '3589760412985', 'Obeng', 15000, 10, 13500, 1, '2018-10-14 06:35:23', '2018-10-14 08:31:30'),
('5af26363-9010-465b-96d6-0a2e68da881b', '3681022489591', 'Stang', 1200000, 0, 1200000, 1, '2018-10-14 06:36:25', '2018-10-14 08:34:38'),
('5e3a4fa4-3439-4f4f-9ff4-c90135389278', '2796170034524', 'Lampu', 400000, 25, 300000, 1, '2018-10-14 06:36:08', '2018-10-14 08:34:15'),
('5f859215-d2b7-4034-b736-479dee7deb16', '8427301567103', 'Spakbor', 175500, 0, 175500, 1, '2018-10-14 06:35:45', '2018-10-14 08:33:46'),
('f030bd7b-a6c1-4d0b-b9be-417864287614', '2906137951708', 'Baut', 12000, 0, 12000, 1, '2018-10-14 06:42:05', '2018-10-14 08:35:00'),
('fd23cf68-d9fe-4de8-8f7e-8a026e9324aa', '3763499115224', 'Ban', 200000, 5, 190000, 1, '2018-10-13 16:10:38', '2018-10-14 08:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `code_id` int(1) NOT NULL,
  `code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`code_id`, `code`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(40) NOT NULL,
  `nama` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa_kategori`
--

CREATE TABLE `jasa_kategori` (
  `jasa_kategori_id` varchar(40) NOT NULL,
  `nama` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa_kategori`
--

INSERT INTO `jasa_kategori` (`jasa_kategori_id`, `nama`) VALUES
('27fc7e02-f3f6-4653-9a28-8898a087f9e9', 'Body'),
('37f1b5b4-2d45-454f-8c81-c8b69c67dfb5', 'Chasis'),
('4581eb0b-c937-480e-a057-c221556b9d93', 'Engine');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_subkategori`
--

CREATE TABLE `jasa_subkategori` (
  `jasa_subkategori_id` varchar(40) NOT NULL,
  `jasa_kategori_id` varchar(40) NOT NULL,
  `nama` varchar(115) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa_subkategori`
--

INSERT INTO `jasa_subkategori` (`jasa_subkategori_id`, `jasa_kategori_id`, `nama`, `harga`) VALUES
('df25b8b8-8ba9-4206-9f16-2741b2e2d727', '27fc7e02-f3f6-4653-9a28-8898a087f9e9', 'Stang', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_mobil`
--

CREATE TABLE `jenis_mobil` (
  `jenis_mobil_id` varchar(40) NOT NULL,
  `nama` varchar(115) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_mobil`
--

INSERT INTO `jenis_mobil` (`jenis_mobil_id`, `nama`, `harga`) VALUES
('0b1729ea-7415-44ae-a162-5a9dd7c9e48e', 'Truck', 50000),
('a424e325-0da0-4a41-9294-82eef4b2c265', 'Sedan', 65000);

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `montir_id` varchar(40) NOT NULL,
  `nama` varchar(115) NOT NULL,
  `kelamin` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`montir_id`, `nama`, `kelamin`) VALUES
('b62ced13-2e16-40a6-84ae-eb18e80fa8da', 'Fadly', 'L');

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
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` varchar(45) NOT NULL,
  `barang_id` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `barang_id`, `qty`, `total`, `tanggal`) VALUES
('002c758c-dc33-426b-9102-5a2c398e27a0', 'fd23cf68-d9fe-4de8-8f7e-8a026e9324aa', 1, 568000, '2018-10-14 13:55:34'),
('3d9108cd-6e61-4cc3-95c0-af1e5be31fd0', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 1, 203500, '2018-10-15 10:48:17'),
('47a3252c-e9b3-43ac-8c75-4dab9e458fdc', 'fd23cf68-d9fe-4de8-8f7e-8a026e9324aa', 1, 203500, '2018-10-17 22:28:14'),
('4b42ed4c-c079-4999-9f25-6625c8feb6e6', '5e3a4fa4-3439-4f4f-9ff4-c90135389278', 1, 2069000, '2018-10-18 07:57:15'),
('64d09474-0901-4b78-89b8-9f52699dd2e2', 'fd23cf68-d9fe-4de8-8f7e-8a026e9324aa', 1, 217000, '2018-10-14 13:57:15'),
('66deac7c-9b6b-4b85-acbc-03dedd7f9d62', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 2, 568000, '2018-10-14 13:55:33'),
('816664ca-50f4-4b51-ad4f-6dde31821e56', '5f859215-d2b7-4034-b736-479dee7deb16', 1, 2069000, '2018-10-18 07:57:15'),
('816683b6-ac31-4daf-a484-c2c795500bd3', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 1, 2069000, '2018-10-18 07:57:15'),
('8a650806-a844-4695-bce2-1ad3d65848e0', 'fd23cf68-d9fe-4de8-8f7e-8a026e9324aa', 2, 2069000, '2018-10-18 07:57:15'),
('931e62f2-575d-437a-82c2-74cc6a4b8151', '5f859215-d2b7-4034-b736-479dee7deb16', 2, 568000, '2018-10-14 13:55:34'),
('9fbb2a25-cdb4-4ebf-9136-444e934d410b', 'f030bd7b-a6c1-4d0b-b9be-417864287614', 4, 48000, '2018-10-15 22:41:05'),
('bb2e138f-489c-4baf-86de-9708edd4e230', 'fd23cf68-d9fe-4de8-8f7e-8a026e9324aa', 1, 203500, '2018-10-15 10:48:17'),
('cc2f88a2-e833-4d63-9416-f78034436d1c', '5e3a4fa4-3439-4f4f-9ff4-c90135389278', 1, 300000, '2018-10-14 23:07:37'),
('d27ebe2a-dbdb-4694-969f-090d4eb6a25d', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 1, 203500, '2018-10-17 22:28:14'),
('eb815781-a20f-47ab-8398-906b071bd95e', '5e3a4fa4-3439-4f4f-9ff4-c90135389278', 1, 300000, '2018-10-15 22:40:29'),
('ecec2781-de39-4129-81aa-858f5b3f90c1', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 2, 27000, '2018-10-15 22:39:58'),
('eead6880-8ede-4e12-ae8f-8b542bec2e62', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 2, 217000, '2018-10-14 13:57:15'),
('f57054f3-00b6-4d69-8ac3-cfea69404461', '5af26363-9010-465b-96d6-0a2e68da881b', 1, 2069000, '2018-10-18 07:57:15'),
('f9c57571-0ab9-4c90-b77f-8e2a293cad90', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 1, 13500, '2018-10-15 06:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `save_transaksi`
--

CREATE TABLE `save_transaksi` (
  `save_transaksi_id` varchar(45) NOT NULL,
  `nama` varchar(115) NOT NULL,
  `code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_transaksi`
--

INSERT INTO `save_transaksi` (`save_transaksi_id`, `nama`, `code`) VALUES
('b19dfa0b-1104-4861-956b-0c5b77aee314', 'Transaksi Stang', '10b81830-3291-407c-9038-ad2c66850054'),
('b2ad6174-f18f-4ec9-962d-7c2d72781c0b', 'lampu', '8d77c2fc-af10-4d51-8831-9e28b491875d');

-- --------------------------------------------------------

--
-- Table structure for table `temp_transaksi`
--

CREATE TABLE `temp_transaksi` (
  `temp_transaksi_id` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `barang_id` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_transaksi`
--

INSERT INTO `temp_transaksi` (`temp_transaksi_id`, `code`, `barang_id`, `qty`) VALUES
('0c4802b9-7911-493a-b06f-5df0817e6273', '8d77c2fc-af10-4d51-8831-9e28b491875d', '5e3a4fa4-3439-4f4f-9ff4-c90135389278', 2),
('0c4d58c0-3024-4332-a6dd-e77db50b1ae2', '10b81830-3291-407c-9038-ad2c66850054', '5af26363-9010-465b-96d6-0a2e68da881b', 1),
('268224b4-804a-4f9e-bdf7-14114de2665b', '8d77c2fc-af10-4d51-8831-9e28b491875d', '5f859215-d2b7-4034-b736-479dee7deb16', 5),
('34602e6c-7179-48ce-b261-c53024ff702a', '567d8e40-2903-473c-abdf-f06a5194be31', 'fd23cf68-d9fe-4de8-8f7e-8a026e9324aa', 1),
('efdf72d9-dda1-4382-af0f-8f967ffdffd7', '567d8e40-2903-473c-abdf-f06a5194be31', '30a3cf19-413b-4b78-91ab-6f7537e80f55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$Xwgp9CmgUoqXoBhzpattzuBIvTsdyCbJgA5WIdZuJXOJs8Q1KDbCe', 'mAiObeZ1Vg7RcVpQ9Xp5wLMNRgeHwUAPuncFuUjldEbLRQwS8mCJ3M9blh8o', '2018-11-07 14:07:50', '2018-11-07 14:07:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `jasa_kategori`
--
ALTER TABLE `jasa_kategori`
  ADD PRIMARY KEY (`jasa_kategori_id`);

--
-- Indexes for table `jasa_subkategori`
--
ALTER TABLE `jasa_subkategori`
  ADD PRIMARY KEY (`jasa_subkategori_id`);

--
-- Indexes for table `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  ADD PRIMARY KEY (`jenis_mobil_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`montir_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `save_transaksi`
--
ALTER TABLE `save_transaksi`
  ADD PRIMARY KEY (`save_transaksi_id`);

--
-- Indexes for table `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  ADD PRIMARY KEY (`temp_transaksi_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
