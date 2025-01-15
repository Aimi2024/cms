-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2025 at 02:15 PM
-- Server version: 8.0.40
-- PHP Version: 8.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deducted_medicines`
--

CREATE TABLE `deducted_medicines` (
  `id` bigint UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_deducted` int NOT NULL,
  `deducted_at` date NOT NULL,
  `medicine_deduct_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deducted_medicines`
--

INSERT INTO `deducted_medicines` (`id`, `medicine_name`, `quantity_deducted`, `deducted_at`, `medicine_deduct_reason`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 2, '2025-01-07', 'test', 1, '2025-01-06 22:31:06', '2025-01-06 22:31:06'),
(3, 'paracetamol', 21, '2025-01-07', 'sakit ulo', 1, '2025-01-07 03:18:22', '2025-01-07 03:18:22'),
(7, 'test', 2, '2025-01-09', 'ambot lang', 1, '2025-01-09 02:21:18', '2025-01-09 02:21:18'),
(8, 'test', 2, '2025-01-09', 'idk', 3, '2025-01-09 02:24:16', '2025-01-09 02:24:16'),
(9, 'test1', 20, '2025-01-09', 'nagg minus lang', 1, '2025-01-09 05:24:37', '2025-01-09 05:24:37'),
(10, 'test1', 5, '2025-01-09', 'asd', 1, '2025-01-09 05:25:29', '2025-01-09 05:25:29'),
(11, 'biodisec', 2, '2025-01-09', 'labad ulo ni jodarin', 1, '2025-01-09 05:27:42', '2025-01-09 05:27:42'),
(12, 'biodisec', 2, '2025-01-09', 'asd', 1, '2025-01-09 05:29:09', '2025-01-09 05:29:09'),
(13, 'biodisec', 2, '2025-01-11', 'headache', 1, '2025-01-10 16:52:35', '2025-01-10 16:52:35'),
(14, 'test', 2, '2025-01-11', 'wala lang', 4, '2025-01-10 16:55:09', '2025-01-10 16:55:09'),
(16, 'test', 2, '2025-01-11', 'naglabad ang ulo ni shiela', 1, '2025-01-10 18:04:31', '2025-01-10 18:04:31'),
(17, 'ambroxol', 100, '2025-01-11', 'wala ra gyd', 1, '2025-01-10 18:08:32', '2025-01-10 18:08:32'),
(18, 'test', 2, '2025-01-11', 'asd', 5, '2025-01-10 18:18:03', '2025-01-10 18:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `deduct_equipment`
--

CREATE TABLE `deduct_equipment` (
  `eqd_id` bigint UNSIGNED NOT NULL,
  `eqd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eqd_stock_deducted` int NOT NULL,
  `eq_deduc_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eq_da` date NOT NULL,
  `eqd_date_deducted` date NOT NULL,
  `added_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deduct_equipment`
--

INSERT INTO `deduct_equipment` (`eqd_id`, `eqd_name`, `eqd_stock_deducted`, `eq_deduc_reason`, `eq_da`, `eqd_date_deducted`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'bondage', 2, 'test', '2025-01-07', '2025-01-07', 1, '2025-01-06 22:35:45', '2025-01-06 22:35:45'),
(2, 'bondage', 2, 'wound', '2025-01-07', '2025-01-07', 1, '2025-01-07 03:14:10', '2025-01-07 03:14:10'),
(4, 'test equipment1', 2, 'testing 2', '2025-01-25', '2025-01-09', 3, '2025-01-09 02:28:33', '2025-01-09 02:28:33'),
(5, 'bondage', 5, 'nasamad', '2025-01-07', '2025-01-11', 5, '2025-01-10 18:18:44', '2025-01-10 18:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `eq_id` bigint UNSIGNED NOT NULL,
  `eq_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eq_da` date DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `expiration_da` date DEFAULT NULL,
  `service_life_end` date DEFAULT NULL,
  `added_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eq_id`, `eq_name`, `eq_da`, `stock`, `expiration_da`, `service_life_end`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'bondage', '2025-01-07', 14, NULL, '2025-01-07', 1, '2025-01-06 22:35:35', '2025-01-10 18:18:44'),
(2, 'bondage', '2025-01-07', 25, NULL, '2025-01-31', 1, '2025-01-07 07:49:17', '2025-01-07 07:49:17'),
(3, 'test equipment1', '2025-01-25', 121, NULL, '2025-01-09', 1, '2025-01-09 00:18:46', '2025-01-09 02:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `m_id` bigint UNSIGNED NOT NULL,
  `m_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_da` date NOT NULL,
  `m_stock` int DEFAULT NULL,
  `m_date_expired` date NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`m_id`, `m_name`, `m_da`, `m_stock`, `m_date_expired`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'test', '2025-01-07', 109, '2025-01-07', 1, '2025-01-06 22:30:46', '2025-01-10 18:18:03'),
(2, 'paracetamol', '2025-01-07', 18, '2025-01-07', NULL, '2025-01-06 23:59:47', '2025-01-08 19:43:07'),
(3, 'paracetamol', '2025-01-07', 0, '2025-01-07', 1, '2025-01-07 03:16:14', '2025-01-07 03:18:22'),
(4, 'test1', '2025-01-09', 0, '2025-01-09', 1, '2025-01-09 00:17:50', '2025-01-09 05:25:29'),
(5, 'biodisec', '2025-01-09', 7, '2025-02-07', 1, '2025-01-09 05:26:54', '2025-01-10 16:58:09'),
(6, 'biodisec', '2025-01-09', 23, '2025-05-14', 1, '2025-01-09 05:30:35', '2025-01-10 16:52:35'),
(7, 'paracetamol', '2025-01-11', 25, '2026-01-11', 1, '2025-01-10 16:51:29', '2025-01-10 16:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(77, '0001_01_01_000000_create_users_table', 1),
(78, '0001_01_01_000001_create_cache_table', 1),
(79, '0001_01_01_000002_create_jobs_table', 1),
(80, '2024_12_23_033640_create_medicines_table', 1),
(81, '2024_12_23_034408_create_equipment_table', 1),
(82, '2024_12_29_014244_create_deducted_medicines_table', 1),
(83, '2024_12_29_093736_create_deduct_equipment_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2CCfpy0IgBIlWieisU3a2WvcLKf74PiLQz7RmW3b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.13.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjlLYnlqZkVTOXlVQ0ZoalFSZ3VNWlhLT05PaWJrSnBWMEloYVB5VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vY21zLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736762256),
('A0BNlPlX5j3utsOy6ZKH7qPFsYucE2PbyrFsXXoc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGF1eWpoZUtWUUNrNHQzODducVZWMXpiRHZWQktrd3drQkFhWFlRcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHA6Ly9jbXMudGVzdCI7fX0=', 1736562304),
('DzeOyWPOAoe1CcWGmPpFH1HO22NJqAgGI3UEUXrZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2xIS0NxejJpTW5RRjc0THVXaHZpMTh6T3Bwd3dGOGNxaXluQmtMUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHA6Ly9jbXMudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736556558),
('FLP6Mhj7K6EpfULQxVRZI3XHJwjzXbaBpQr0RpGW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXg1TWY1MGFmclh1QlIxYjE2VURKZ2ppS1BmelVzTTNpeWEwOGJWUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHA6Ly9jbXMudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736556558),
('hXuSmWo0ZQpQCoNFsUm8B6KLDkEaGYfazrxvS735', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibEZHUW92elBHUEpmMWtKYUg3MXp4eGRVNDh6YjdYNk55aGRnbDJvUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHA6Ly9jbXMudGVzdCI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjU6Imh0dHA6Ly9jbXMudGVzdC9kYXNoYm9hcmQiO319', 1736562329),
('T1gWeLClsgxWFK6PnVMul677zslHPLp6ljuIDOBv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.13.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUw5S2gzcE80NDdJMmExMzAxRzc1c3VkcGk5b29jYVVRVlkyUDZEdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9jbXMudGVzdC8/aGVyZD1wcmV2aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1736565319),
('UbBT2cRIiXNVP22xRPzBPzh3420Thq8IaKGELAEU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.13.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGhSNWtuS015UW04aUd2V2oyV3hSdDV6YWExYU5POWl6cURpRkZZaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9jbXMudGVzdC8/aGVyZD1wcmV2aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1736762256),
('XYBeEdEC9CZHkLQef9UDhYf9ERByOUzvfTXxfLm6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWc4elNLdHdGTzg1SFY0QmxyV2k4VUVsamg3ZjZmVVFjWWRCQWNFSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHA6Ly9jbXMudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736556558);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `last_seen` timestamp NULL DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `type`, `last_seen`, `is_online`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin_user', 'admin@example.com', NULL, '$2y$12$/BD8II00XM64k6OcRfbFkuuUjAnR1VGHkmrGIPn7BEZpfhs8ircne', 'admin', '2025-01-10 18:17:29', 0, NULL, '2025-01-06 22:29:42', '2025-01-06 22:29:42'),
(3, 'khrestine', 'khrestine@gmail.com', NULL, '$2y$12$QQAimjYj55.2Xu.UdHvm/.6hPPAj2GbNo//.h/nWohctYrXdDminu', 'admin', '2025-01-09 02:34:26', 0, NULL, '2025-01-09 02:23:09', '2025-01-10 18:13:49'),
(4, 'kervin', 'kervin@gmail.com', NULL, '$2y$12$ZzgJGmctNoH./Mpey1xrB.gJcbTCzz4noogvM4d4q7HCEvuT5Oiw2', 'user', '2025-01-10 18:16:07', 0, NULL, '2025-01-10 16:54:19', '2025-01-10 18:13:18'),
(5, 'kervin1', 'kervin1@gmail.com', NULL, '$2y$12$z8jmrWyLhWwecZl5Ndt3gejlebMAFODih2EGFPTjjIOqJqmaDsJQu', 'user', '2025-01-10 18:22:22', 0, NULL, '2025-01-10 18:15:46', '2025-01-10 18:15:46');

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
-- Indexes for table `deducted_medicines`
--
ALTER TABLE `deducted_medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deducted_medicines_added_by_foreign` (`added_by`);

--
-- Indexes for table `deduct_equipment`
--
ALTER TABLE `deduct_equipment`
  ADD PRIMARY KEY (`eqd_id`),
  ADD KEY `deduct_equipment_added_by_foreign` (`added_by`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`eq_id`),
  ADD KEY `equipment_added_by_foreign` (`added_by`);

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
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `medicines_added_by_foreign` (`added_by`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `deducted_medicines`
--
ALTER TABLE `deducted_medicines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `deduct_equipment`
--
ALTER TABLE `deduct_equipment`
  MODIFY `eqd_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `eq_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `m_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deducted_medicines`
--
ALTER TABLE `deducted_medicines`
  ADD CONSTRAINT `deducted_medicines_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deduct_equipment`
--
ALTER TABLE `deduct_equipment`
  ADD CONSTRAINT `deduct_equipment_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
