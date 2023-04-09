-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 09:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyberknox`
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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_15_072905_create_users_table', 1),
(6, '2023_03_22_051019_create_user_product_registration_data_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Subhodeep Moitra', '8777376792', 'subhodeep2000@gmail.com', NULL, 0, '$2y$10$06PMpE7FCl1HvzPj/XQdd.AxyIBF62plfy43FxsrJ5dCeyuceqCmO', NULL, '2023-04-07 00:32:16', '2023-04-07 00:32:16'),
(2, 'Admin', '8777376792', 'subhodeepmoitra2000@gmail.com', NULL, 1, '$2y$10$kftNXjOCYxB6PwJIGhsDYON4.acQNWuhJJr/ues6617WMS5dccv.S', NULL, '2023-04-07 00:33:01', '2023-04-07 00:33:01'),
(3, 'Cheems', '8777376792', 'cheems@gmail.com', NULL, 0, '$2y$10$WBLlk2n9S6izMliQGL0uJuAB/fdJcHjVVSN0TBCgxpWx7jh/E0uae', NULL, '2023-04-07 00:34:25', '2023-04-07 00:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_product_registration_data`
--

CREATE TABLE `user_product_registration_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL DEFAULT '1',
  `lname` varchar(255) NOT NULL DEFAULT '1',
  `productId` varchar(255) NOT NULL DEFAULT '1',
  `invoice` varchar(300) NOT NULL DEFAULT '1',
  `address` varchar(255) NOT NULL DEFAULT '1',
  `additionalInfo` varchar(255) NOT NULL DEFAULT '1',
  `zipCode` varchar(255) NOT NULL DEFAULT '1',
  `place` varchar(255) NOT NULL DEFAULT '1',
  `country` varchar(255) NOT NULL DEFAULT '1',
  `code` varchar(255) NOT NULL DEFAULT '1',
  `phone` varchar(255) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL DEFAULT '1',
  `registrationStatus` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_product_registration_data`
--

INSERT INTO `user_product_registration_data` (`id`, `fname`, `lname`, `productId`, `invoice`, `address`, `additionalInfo`, `zipCode`, `place`, `country`, `code`, `phone`, `email`, `registrationStatus`, `created_at`, `updated_at`) VALUES
(1, 'Subhodeep', 'Moitra', 'DRM22312233', 'invoice/1680847872d1.jpg', '20, Thakurdas Babu Lane, Serampore, Hooghly, Pin 712201, West Bengal', 'Near to bangla high school', '712201', 'Serampore', 'India', '91', '8777376792', 'subhodeep2000@gmail.com', '1', '2023-04-07 00:41:12', '2023-04-07 00:41:12'),
(2, 'Subhodeep', 'Moitra', 'DRM22312244', 'invoice/1680848122d2.jpg', '20, Thakurdas Babu Lane, Serampore, Hooghly, Pin 712201, West Bengal', 'Near to bangla high school', '712201', 'Serampore', 'India', '91', '8777376792', 'subhodeep2000@gmail.com', '1', '2023-04-07 00:45:22', '2023-04-07 00:45:22'),
(3, 'Cheems', 'Moitra', 'CRM22312233', 'invoice/1680848205u1.jpg', '20, Thakurdas Babu Lane, Serampore, Hooghly, Pin 712201, West Bengal', 'Near to bangla high school', '712201', 'Serampore', 'India', '91', '8777376792', 'cheems@gmail.com', '1', '2023-04-07 00:46:45', '2023-04-07 00:46:45'),
(4, 'Nunu', 'Moitra', 'CRM22312244', 'invoice/1680848269u2.jpg', '20, Thakurdas Babu Lane, Serampore, Hooghly, Pin 712201, West Bengal', 'Near to bangla high school', '712201', 'Serampore', 'India', '91', '8777376792', 'cheems@gmail.com', '1', '2023-04-07 00:47:49', '2023-04-07 00:47:49');

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_product_registration_data`
--
ALTER TABLE `user_product_registration_data`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_product_registration_data`
--
ALTER TABLE `user_product_registration_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
