-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2020 at 03:47 PM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7235656_rma`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icons` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bg_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `icons`, `bg_icon`) VALUES
(1, 5, 'Marketing', '2019-10-01 17:00:00', '2019-10-01 17:00:00', 'fa fa-cart-plus', 'bg-primary'),
(2, 6, 'Keuangan', '2019-10-01 17:00:00', '2019-10-01 17:00:00', 'fa fa-credit-card', 'bg-danger'),
(3, 3, 'Ops', '2019-10-01 17:00:00', '2019-10-01 17:00:00', 'fa fa-briefcase', 'bg-info'),
(4, 3, 'Readaksi', '2019-10-01 17:00:00', '2019-10-01 17:00:00', 'fa fa-book', 'bg-success'),
(5, 5, 'HR', '2019-10-01 17:00:00', '2019-10-01 17:00:00', 'fa fa-spinner', 'bg-warning'),
(6, 3, 'IT', '2019-10-01 17:00:00', '2019-10-01 17:00:00', 'fa fa-laptop', 'bg-info');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `board_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `due_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `board_id`, `name`, `created_at`, `updated_at`, `due_on`) VALUES
(2, 5, 1, 'Buat Test 2', '2019-10-04 17:00:00', '2019-10-04 17:00:00', '2019-10-31 00:00:00'),
(4, 2, 6, 'Ruang Keluarga App', '2020-07-01 06:12:47', '2020-07-01 06:12:47', '2020-08-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `menuses`
--

CREATE TABLE `menuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_induk` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menuses`
--

INSERT INTO `menuses` (`id`, `id_induk`, `nama`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'home', '/home', '2019-09-28 17:00:00', '2019-09-28 17:00:00'),
(2, 0, 'Task', 'text_fields', '/task', '2019-09-28 17:00:00', '2019-09-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_28_151835_create_task_table', 2),
(5, '2019_09_29_101031_create_menus_table', 3),
(6, '2019_09_30_160528_create_tasks_table', 4),
(7, '2019_09_30_160904_create_priorities_table', 4),
(8, '2019_09_30_161654_create_pivots_table', 4),
(9, '2019_09_30_162041_create_pivots_table', 5),
(10, '2019_09_30_162408_create_tasks_table', 6),
(11, '2019_09_30_162508_priorities_tasks_table', 6),
(12, '2019_09_30_162558_priorities_pivots_table', 6),
(13, '2019_10_01_151740_create_boards_table', 7),
(14, '2019_10_01_152052_create_cards_table', 7),
(15, '2019_10_01_152254_create_tasks_table', 7),
(16, '2019_10_01_153033_add_order_key_to_task', 7),
(17, '2019_10_05_155211_add_icons_and_bg_icon', 8),
(18, '2019_10_05_155759_add_icons_and_bg_icon', 9),
(19, '2019_10_05_161823_create_cards_table', 10),
(20, '2019_10_05_164043_create_tasks_table', 11),
(21, '2019_10_12_055109_remove_due_date_on_task', 12),
(22, '2019_10_12_055818_add_due_date_on_card', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `card_id`, `name`, `is_done`, `created_at`, `updated_at`) VALUES
(22, 2, 2, 'membuat task baru', 1, '2019-10-27 08:13:28', '2019-10-27 10:00:15'),
(23, 2, 2, 'replay', 1, '2019-10-27 08:20:27', '2019-10-28 11:22:34'),
(31, 2, 2, 'Makan malam', 0, '2019-11-15 06:52:42', '2019-11-15 06:52:42'),
(32, 2, 4, 'Logo', 0, '2020-07-01 06:13:00', '2020-07-01 06:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin Admin', 'admin@rma.com', '2019-09-29 09:05:33', '$2y$10$oka9qZaxC7jmq9brf4ipKuJF10b6Hm5We6H6HoTHrRQCioFPByJsK', 'A3hxzAFBtRtCqRaxnJui5bgnkhTVi82CeSY7a9modthKW9AxrR79x5ElH6gk', '2019-09-29 09:05:33', '2019-09-29 09:05:33'),
(5, 'marketing', 'marketing@gmail.com', NULL, '$2y$10$LmZZRbmLXJThVA/UCP638Oe0EY8O2xU04SE2bykr7rNHsi7xq3FOy', NULL, '2019-10-06 04:24:10', '2019-10-06 04:24:10'),
(6, 'keuangan', 'keuangan@gmail.com', NULL, '$2y$10$LkBTIWGGrZedoUEAo.R5/.d9fLOBmHXXzr8ZIHfQBjqm1xnTvkL52', NULL, '2019-10-17 23:54:59', '2019-10-25 21:06:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boards_user_id_index` (`user_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_board_id_foreign` (`board_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuses`
--
ALTER TABLE `menuses`
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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_card_id_foreign` (`card_id`);

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
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menuses`
--
ALTER TABLE `menuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
