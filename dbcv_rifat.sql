-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2025 at 03:55 PM
-- Server version: 11.8.5-MariaDB-log
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcv_rifat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Junior Photographer — BNSP', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(2, 'Video Editor — BNSP', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(3, 'Camera Operator — BNSP', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(255) NOT NULL,
  `program` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `institution`, `program`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Universitas Muhammadiyah Sukabumi (UMMI)', 'Teknik Informatika', '2023 – Sekarang', '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(2, 'SMKN 1 Kota Sukabumi', 'Produksi Film', '2019 – 2022', '2025-11-19 21:54:04', '2025-11-19 22:15:00'),
(3, 'SMPN 1 Cisaat', NULL, '2016 – 2019', '2025-11-19 21:54:04', '2025-11-19 21:54:04');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_19_205705_create_profiles_table', 1),
(5, '2025_11_19_205710_create_skills_table', 1),
(6, '2025_11_19_205715_create_projects_table', 1),
(7, '2025_11_19_205719_create_education_table', 1),
(8, '2025_11_19_205723_create_certificates_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `domicile` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `about` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `domicile`, `status`, `about`, `email`, `whatsapp`, `instagram`, `github`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Rifat Pratama', 'Sukabumi', 'Mahasiswa Teknik Informatika — Universitas Muhammadiyah Sukabumi', 'Mahasiswa Teknik Informatika dengan minat di web dan mobile development. Memiliki pengalaman dalam pengembangan aplikasi web menggunakan Laravel dan React Native. Selalu bersemangat untuk mempelajari teknologi baru dan berkontribusi dalam proyek-proyek yang menantang.', 'rifatpratamaa@gmail.com', '085863441987', '_rifatpratamaa', 'Vhatzz', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `tech_stack` varchar(255) NOT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `features`, `tech_stack`, `github_link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Foodinary - Mobile App', 'Aplikasi mobile untuk eksplorasi kuliner dengan fitur pencarian restoran dan menu makanan terpopuler.', 'Pencarian restoran, review pengguna, sistem rating, favorit menu', 'React Native, Firebase, Node.js', 'https://github.com/Vhatzz/foodinary', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(2, 'E-Commerce Website', 'Website e-commerce lengkap dengan sistem pembayaran dan manajemen produk.', 'Keranjang belanja, pembayaran online, manajemen produk, sistem user', 'Laravel, MySQL, Bootstrap, Midtrans API', 'https://github.com/Vhatzz/ecommerce', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('hard','soft','tool') NOT NULL,
  `level` enum('Beginner','Intermediate','Advanced') DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `type`, `level`, `logo_url`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'hard', 'Intermediate', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(2, 'PHP', 'hard', 'Intermediate', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(3, 'JavaScript', 'hard', 'Intermediate', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(4, 'MySQL', 'hard', 'Intermediate', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(5, 'React Native', 'hard', 'Beginner', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(6, 'React', 'hard', 'Beginner', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(7, 'UI/UX Design', 'hard', 'Beginner', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(8, 'Communication', 'soft', NULL, NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(9, 'Teamwork', 'soft', NULL, NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(10, 'Problem Solving', 'soft', NULL, NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(11, 'Adaptability', 'soft', NULL, NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(12, 'Time Management', 'soft', NULL, NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(13, 'VSCode', 'tool', 'Intermediate', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg', '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(14, 'Figma', 'tool', 'Beginner', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', '2025-11-19 21:54:04', '2025-11-19 21:54:04'),
(16, 'Photoshop', 'tool', 'Intermediate', 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/photoshop/photoshop-plain.svg', '2025-11-19 21:54:04', '2025-11-19 21:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vhatz Admin', 'vhatz@cv.com', 'vhatz', NULL, '$2y$12$wZguRxLoFR9HV2m95Vu11Oav8XqmECiEtAg7eoHc.SxXLkDFC31FS', NULL, '2025-11-19 21:54:04', '2025-11-19 21:54:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
