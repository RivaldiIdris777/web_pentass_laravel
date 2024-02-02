-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2024 at 07:52 AM
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
-- Database: `db_pentaseni`
--

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
(5, '2024_01_22_202843_create_permission_tables', 1),
(6, '2024_01_24_104835_add_column_slug_to_users_table', 2),
(7, '2024_01_25_101440_create_tb_lomba_table', 3),
(8, '2024_01_25_102959_create_tbl_peserta_table', 3),
(9, '2024_01_26_162237_add_url_nomor_peserta_column_to_tbl_peserta', 4),
(10, '2024_01_26_165328_create_tbl_slider', 5),
(11, '2024_01_31_044337_add_lomba_peserta_column_to_tbl_peserta', 6),
(12, '2024_01_31_083302_add_lomba_id_column_to_tbl_peserta', 7),
(13, '2024_02_01_082327_add_lomba_column_to_tbl_peserta', 8),
(14, '2024_02_01_131712_add_gbr_ktp_column_to_tbl_peserta', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'tambah-data', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(10, 'edit-data', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(11, 'hapus-data', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(12, 'lihat-data', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(13, 'tambah-peserta', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(14, 'edit-peserta', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(15, 'hapus-peserta', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(16, 'lihat-peserta', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(2, 'staff', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28'),
(3, 'user', 'web', '2024-01-23 01:48:28', '2024-01-23 01:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 2),
(14, 2),
(14, 3),
(15, 2),
(16, 2),
(16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lomba`
--

CREATE TABLE `tbl_lomba` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lomba` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_pendaftaran` varchar(255) DEFAULT NULL,
  `tanggal_perlombaan` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_lomba`
--

INSERT INTO `tbl_lomba` (`id`, `nama_lomba`, `slug`, `gambar`, `keterangan`, `tanggal_pendaftaran`, `tanggal_perlombaan`, `pic`, `created_at`, `updated_at`) VALUES
(7, 'TIlawatil Qur\'an', 'tilawatil-quran', 'zEOuEOIVAYU0M94RpiWU1tyXCADdXVqaI1fvRi7v.png', 'Khusus untuk Putra & Putri Tingkat SMA/MA Sederajat', '2024-01-31', '2024-02-01', 'UM JAMBI', '2024-01-31 08:55:01', '2024-02-01 03:43:14'),
(17, 'Karya Tulis Ilmiah', 'karya-tulis-ilmiah', 'bqioxP3zdbKdUGn7N1I9mDjAhcqbgv0eSJ5gYf16.png', 'Tema : \"Digital Literasi\"', '2024-01-31', '2024-02-01', 'UM JAMBI', '2024-01-31 09:11:02', '2024-02-01 02:38:58'),
(18, 'Cerpen', 'cerpen', 'DqBCXVCQ1XTzsvX7uA9YzW0UyQtkZi89CypQ9Smz.png', 'Tema : \"Jambi Rumah Untuk Keberagaman\"', '2024-02-01', '2024-02-02', 'UM JAMBI', '2024-01-31 09:12:48', '2024-02-01 02:41:01'),
(19, 'Short Movie', 'short-movie', '7cJYH00IDV1fax91a8YBfAc2TlaadZ8nFNNZK7KG.png', 'Tema : 1. \"Generasi Muda Tanpa Narkoba\", \" 2. \" Geng Motor Bukan Prestasi\"', '2024-02-01', '2024-02-02', 'UM JAMBI', '2024-01-31 09:19:38', '2024-02-01 02:42:06'),
(20, 'Paduan Suara', 'paduan-suara', 'vzErFmfqeXmfj0Tubam8Er96pE0LBkWZzNUtyOks.png', 'Mars Universitas Muhammadiyah Jambi', '2024-02-01', '2024-02-01', 'UM JAMBI', '2024-01-31 09:20:58', '2024-02-01 02:42:36'),
(21, 'Baca Puisi', 'baca-puisi', '8q3dCNm88iOxCvCVA3s3PSLPzj9DXtnf5rQjJGKW.png', 'Tema : \"Adat Melayu Jambi\"', '2024-02-01', '2024-02-02', 'UM JAMBI', '2024-01-31 09:22:14', '2024-02-01 02:44:13'),
(22, 'Poster', 'poster', 'ArTzLN0CkrTpF9ar2OJN6CXhP1erAcXh40qFHo7n.png', 'Tema : \"Lingkungan, Hutan Jambi\"', '2024-02-01', '2024-02-02', 'UM JAMBI', '2024-01-31 09:23:39', '2024-02-01 02:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_peserta` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `no_wa` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `status` enum('calon_peserta','peserta','pemenang') NOT NULL DEFAULT 'calon_peserta',
  `url` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lomba_id` int(11) DEFAULT NULL,
  `lomba` varchar(255) DEFAULT NULL,
  `file_ktp_suket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id`, `nama`, `no_peserta`, `slug`, `no_wa`, `asal_sekolah`, `status`, `url`, `keterangan`, `created_at`, `updated_at`, `lomba_id`, `lomba`, `file_ktp_suket`) VALUES
(19, 'Sadinur', '1706824669PSERTA0896034521341025', 'sadinur', '089603452134', 'SMA 10 Kota Jambi', 'calon_peserta', 'https://drive.google.com/file/d/1FrO692a5PJ-QpIVK_C56RXGUzGIi-WXf/view?usp=drive_link', 'Perkenalkan', '2024-02-02 02:57:49', '2024-02-02 02:57:49', NULL, 'Karya Tulis Ilmiah', '089603452134.png'),
(20, 'Sadinur', '1706854296PSERTA08921234324398', 'sadinur', '0892123432', 'SMA 10 Kota Jambi', 'calon_peserta', 'https://drive.google.com/file/d/1FrO692a5PJ-QpIVK_C56RXGUzGIi-WXf/view?usp=drive_link', 'Perkenalkan saya Sadinur dari SMA N 10 Tanjung Jabung timur. Saya mewakili sekolah ingin mengikuti lomba ini ingin menunjukkan kemampuan saya dalam membuat karya cerita pendek. Tidak hanya itu. Tujuan saya juga untuk mengharumkan sekolah dan membanggakan kedua orang tua saya', '2024-02-02 11:11:36', '2024-02-02 11:11:36', NULL, 'Cerpen', '0892123432.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_slider` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `gambar`, `nama_slider`, `slug`, `keterangan`, `created_at`, `updated_at`) VALUES
(16, '1706742378.jpeg', 'Pentas Slider', 'pentas-slider', '-', '2024-02-01 04:06:18', '2024-02-01 04:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `slug`) VALUES
(5, 'admin', 'admin@gmail.com', NULL, '$2y$12$MY6Th8SLm7ZwCinBJOqQAO5ueN9o9FwKviggg4JHYulFP6RATKQNe', NULL, '2024-01-23 01:51:52', '2024-01-23 01:51:52', ''),
(6, 'staff', 'staff@gmail.com', NULL, '$2y$12$u33or/WWhZBk4tziZAYe8uDLpjHZHOTXEC0PDY1FZRcUS66Tz1gwC', NULL, '2024-01-23 01:51:52', '2024-01-23 01:51:52', ''),
(7, 'user', 'user@gmail.com', NULL, '$2y$12$Sjxr0qh23KvNs8laBQKIde28Pt2aZWZQn7/5hD8.SxE9Ohn33Y1ai', NULL, '2024-01-23 01:51:52', '2024-01-23 01:51:52', ''),
(16, 'andi', 'andi@gmail.com', '2024-01-25 18:31:02', '$2y$12$MinZiiyiT79xTn551wvdM.pASMYavBttkDg./3mctuqoHjSwAikMK', NULL, NULL, NULL, 'andi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tbl_lomba`
--
ALTER TABLE `tbl_lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_lomba`
--
ALTER TABLE `tbl_lomba`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
