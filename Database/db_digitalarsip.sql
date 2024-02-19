-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 01:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_digitalarsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE `aktifitas` (
  `id` int(11) NOT NULL,
  `Aktifitas` varchar(255) NOT NULL,
  `Staff` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NamaBerkas` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `id_standarisasi` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nama_departement` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `nama_departement`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kelembagaan', '', '2024-01-18 16:28:19', '2024-01-18 16:28:19'),
(2, 'Keuangan', '', '2024-01-18 09:28:31', '2024-01-18 09:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `namaberkas` varchar(255) NOT NULL,
  `namastaff` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Kategori` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `Nama_Kategori`, `Keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Penetapan', '', NULL, NULL),
(2, 'Pelaksanaan', '', NULL, NULL),
(3, 'Evaluasi', '', NULL, NULL),
(4, 'Pengendalian', '', NULL, NULL),
(59, 'Peningkatan', 'Kategori Peningkatan', '2024-01-25 09:45:54', '2024-01-25 09:48:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_03_011947_create_berkas_table', 2),
(6, '2023_06_03_012002_create_subkategoris_table', 2),
(7, '2023_06_03_012009_create_kategoris_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `standarisasis`
--

CREATE TABLE `standarisasis` (
  `id` int(11) NOT NULL,
  `nama_standarisasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `standarisasis`
--

INSERT INTO `standarisasis` (`id`, `nama_standarisasi`, `keterangan`, `updated_at`, `created_at`) VALUES
(27, 'Visi, Misi Tujuan dan Strategi Standar', '', '2024-01-18 14:49:55', '2024-01-18 14:49:55'),
(28, 'Visi, Misi Tujuan dan Strategi', '', '2024-01-18 14:51:31', '2024-01-18 14:50:07'),
(29, 'Tata Pamong, Tata Kelola dan Kerja Sama', '', '2024-01-18 14:52:03', '2024-01-18 14:52:03'),
(30, 'Mahasiswa', '', '2024-01-18 14:52:10', '2024-01-18 14:52:10'),
(31, 'Sumber Daya Manusia', '', '2024-01-18 14:52:20', '2024-01-18 14:52:20'),
(32, 'Keuangan, Sarana dan Prasarana', '', '2024-01-18 14:52:37', '2024-01-18 14:52:37'),
(34, 'Penelitian', '', '2024-01-18 14:52:57', '2024-01-18 14:52:57'),
(35, 'Pengabdian kepada Masyarakat', '', '2024-01-18 14:53:10', '2024-01-18 14:53:10'),
(36, 'Luaran dan Capaian Tridharma', '', '2024-01-18 14:53:31', '2024-01-18 14:53:31'),
(38, 'Pendidikan', 'Standar Berkas Pendidikan', '2024-01-25 16:49:09', '2024-01-25 16:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `subkategoris`
--

CREATE TABLE `subkategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_SubKategori` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkategoris`
--

INSERT INTO `subkategoris` (`id`, `Nama_SubKategori`, `Keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kebijakan', '', NULL, NULL),
(2, 'Manual Mutu', '', NULL, NULL),
(3, 'Standar Mutu', '', NULL, NULL),
(4, 'Formulir', '', NULL, NULL),
(5, 'Evaluasi Mutu Internal', '', NULL, NULL),
(6, 'Pengaturan Pengelolaan SPMI Instutusi', '', NULL, NULL),
(7, 'Pengaturan Organisasi Pengelolaan SPMI Institusi', '', NULL, NULL),
(8, 'Pengaturan Terkati Evaluasi', '', NULL, NULL),
(9, 'Pengaturan Terkait Pengendalian Pelaksanaan Standar', '', NULL, NULL),
(10, 'Pengaturan Terkait Peningkatan standar dalam SPMI Institusi', '', NULL, NULL),
(11, 'MoU', '', NULL, NULL),
(18, 'Beasiswa', 'Bagian Beasiswa', '2024-01-25 09:50:41', '2024-01-25 09:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `Jabatan` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `id_departement`, `url`, `email_verified_at`, `password`, `no_telp`, `Jabatan`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Ferry A Herman', 'ferryaja@gmail.com', 2, '/img/profile/1698735854273-IMG-20221201-WA0043.jpg', NULL, '$2y$10$zAxeYqlqA/sEhmEHFl4K3OuF8ooLbd3jw69dqc4h80xGO6AXS6Bsq', '0812-2466-9182', 'Ketua SaCianjuren', 'Admin', 'AzB3onS96lnevSUjootQdJ3BxnG0jkF8fWgfBwyzLLzl4c2xTQiqNmxS41SB', NULL, '2024-01-18 10:04:49'),
(26, 'User1', 'user1@user.com', 1, '/img/profile/1706278264708-ferry.jpg', NULL, '$2y$10$RvAB.E4IW9u8eY6DWbxkg.54BEiZN5LzCZf4PKOFfnejdAnzVa2Gu', '0812-4214-2343-21', 'Pranata Komputer', 'Staff', NULL, '2024-01-26 14:11:04', '2024-01-26 14:11:04'),
(27, 'user2', 'user2@user2.com', 1, '/img/profile/1706278315698-Screenshot-2023-11-24-091646.png', NULL, '$2y$10$4LoyBBVgJVes5eHimeTsyepFP3IwnPUk96M.tTmtKv48Pau4IwoNS', '0252-343', 'Senior', 'Staff', NULL, '2024-01-26 14:11:55', '2024-02-19 12:25:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `standarisasis`
--
ALTER TABLE `standarisasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkategoris`
--
ALTER TABLE `subkategoris`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standarisasis`
--
ALTER TABLE `standarisasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subkategoris`
--
ALTER TABLE `subkategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
