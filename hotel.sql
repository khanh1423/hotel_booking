-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 09:22 AM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT 1,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `uuid`, `parent_id`, `status`, `name`, `locale`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'cc711d28-cecd-409c-abdf-47b37ff9a59c', NULL, 'on', 'ROOT', 'vi', 1, NULL, '2023-06-05 01:01:51', '2023-06-05 01:01:51'),
(2, 'd7fae597-e74c-4a21-8051-53d735999ef0', 1, 'on', 'Phòng tắm', 'vi', 1, NULL, '2023-06-05 22:14:44', '2023-06-12 19:13:23'),
(3, '2f4395ed-9487-4ccb-83ee-6ad88063fe39', 1, 'on', 'Phòng ngủ', 'vi', 1, NULL, '2023-06-05 22:15:10', '2023-06-05 22:15:10'),
(4, 'fd10b960-f062-40d4-9269-7d351b80d1bd', 2, 'on', 'Bồn tắm', 'vi', 1, NULL, '2023-06-05 22:15:40', '2023-06-05 22:15:40'),
(5, 'd21a6a54-515b-4f7e-b4d5-8608a6ae05e0', 2, 'on', 'Gương', 'vi', 1, NULL, '2023-06-05 22:16:21', '2023-06-05 22:16:21'),
(6, 'ce1f5fe5-c690-4744-a761-af3af6e59804', 3, 'on', 'Giường', 'vi', 1, NULL, '2023-06-05 22:18:22', '2023-06-05 22:18:22'),
(7, '6ec59d0d-e816-41ef-b1f8-5f93aa12a999', 3, 'on', 'Bàn lớn', 'vi', 1, NULL, '2023-06-05 22:18:36', '2023-06-06 23:53:34'),
(9, 'c71ac282-05e3-47e6-bd0a-76da98492d61', 6, 'on', 'Gối', 'vi', 1, NULL, '2023-06-05 22:28:14', '2023-06-05 22:28:14'),
(10, 'f0fe1fbc-c5b2-4834-88d9-592f00791fbb', 6, 'on', 'Chăn', 'vi', 1, NULL, '2023-06-05 22:28:23', '2023-06-05 22:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_05_31_044931_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_31_050023_create_room_types_table', 1),
(7, '2023_05_31_050438_create_rooms_table', 1),
(8, '2023_05_31_050844_create_room_images_table', 1),
(9, '2023_05_31_051126_create_attributes_table', 1),
(10, '2023_05_31_051438_create_room_attributes_table', 1),
(11, '2023_05_31_051625_create_bookings_table', 1),
(12, '2023_05_31_052506_create_bills_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `name`, `description`, `status`, `locale`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'e9c0cf91-bf66-470b-b400-81f4a565e8ec', 'Giám Đốc', 'Quản lý toàn bộ website', 'on', 'vi', NULL, '2023-05-31 23:42:02', '2023-05-31 23:42:02'),
(2, 'c31ecaf5-4ad0-4790-bcbf-1ca551eaabc4', 'Quản Trị Viên', 'Quản lý website và liên hệ khách hàng', 'on', 'vi', NULL, '2023-05-31 20:12:18', '2023-05-31 20:12:18'),
(4, '3e271351-b751-48d4-8a06-42b94a2d082e', 'Khách hàng', 'Khách hàng đặt phòng của hệ thống', 'on', 'vi', NULL, '2023-05-31 21:58:03', '2023-05-31 21:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomtype_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `uuid`, `roomtype_id`, `name`, `image`, `price`, `description`, `slug`, `status`, `locale`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, '4bee820a-ec55-4464-8f23-9fcb04e9b25b', 10, 'Phòng 301', 'room-phong-301-1686724558.jpg', NULL, 'Phòng đầy đủ tiện nghi', 'phong-301', 'on', 'vi', 1, NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `room_attributes`
--

CREATE TABLE `room_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_attributes`
--

INSERT INTO `room_attributes` (`id`, `attribute_id`, `room_id`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 2, 11, '2', NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58'),
(11, 3, 11, '1', NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58'),
(12, 4, 11, '2', NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `image`, `alt`, `position`, `room_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'images-room-0-1686724558.jpg', NULL, 1, 11, NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58'),
(9, 'images-room-1-1686724558.jpg', NULL, 1, 11, NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58'),
(10, 'images-room-2-1686724558.jpg', NULL, 1, 11, NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58'),
(11, 'images-room-3-1686724558.jpg', NULL, 1, 11, NULL, '2023-06-13 23:35:58', '2023-06-13 23:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `uuid`, `parent_id`, `name`, `description`, `image`, `slug`, `status`, `locale`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1cf2b46c-e30b-4ec5-bd2c-9a6e3f82a1b0', NULL, 'ROOT', 'ROOT', NULL, 'root', 'on', 'vi', 1, NULL, '2023-06-12 21:34:28', '2023-06-12 21:34:28'),
(2, 'dce4b5c4-59a9-4919-af88-2c4352c99ae2', 1, 'Phòng tầng 1', 'Phòng thấp vừa trong tầm giá', NULL, 'phong-tong-thong', 'on', 'vi', 1, NULL, '2023-06-12 21:37:19', '2023-06-12 21:37:19'),
(3, '208bc970-a4dc-4718-9492-9817bc2076cc', 1, 'Phòng tầng 2', 'Phòng ở vị trí tầng 2', NULL, 'phong-tang-2', 'on', 'vi', 1, NULL, '2023-06-12 21:44:57', '2023-06-12 21:44:57'),
(4, '8c941ab1-7462-40f6-a5ec-b11bcb3c08d4', 1, 'Phòng tầng 3', 'Phòng ở vị trí tầng 3', NULL, 'phong-tang-3', 'on', 'vi', 1, NULL, '2023-06-12 21:45:14', '2023-06-12 21:45:14'),
(5, '105cef19-6eb5-4e62-912a-7538c3eb9159', 2, 'Phòng có ban công (tầng 1)', 'Phòng ở tầng 1 và hướng ra ngoài có ban công nhé', NULL, 'phong-co-ban-cong-tang-1', 'on', 'vi', 1, NULL, '2023-06-12 21:46:01', '2023-06-12 23:09:44'),
(6, 'f70c8319-6588-49d5-b5bb-48a73b421360', 2, 'Phòng bình thường', 'Phòng bình thưởng ở tầng 1', NULL, 'phong-binh-thuong', 'on', 'vi', 1, NULL, '2023-06-12 21:46:28', '2023-06-12 21:46:28'),
(7, '4e487d38-ce6a-45ee-9def-ced9c11e4bbc', 3, 'Phòng có ban công (tầng 2)', 'phòng có ban công tầng 2', NULL, 'phong-co-ban-cong-tang-2', 'on', 'vi', 1, NULL, '2023-06-12 21:47:15', '2023-06-12 21:47:15'),
(8, '0daa2773-1e0b-4a08-a24b-1d5c5a9cf4a9', 3, 'Phòng bình thường (tầng 2)', 'Phòng bình thường ở tầng 2', NULL, 'phong-binh-thuong-tang-2', 'on', 'vi', 1, NULL, '2023-06-12 21:47:39', '2023-06-12 21:47:39'),
(9, '292b87f1-86ca-4da4-8fd4-7fb7209831e2', 4, 'Phòng tổng thống', 'Phòng có chất lượng cao nhất và tốt nhất', NULL, 'phong-tong-thong', 'on', 'vi', 1, NULL, '2023-06-12 21:47:58', '2023-06-12 21:47:58'),
(10, 'e6efad2f-ac82-4ed5-ade6-e15bcb5bbbc0', 4, 'Phòng VIP', 'phòng vip ở tầng 3, dịch  vụ thì tuyệt vời', NULL, 'phong-vip', 'on', 'vi', 1, NULL, '2023-06-12 21:48:23', '2023-06-12 21:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `level` tinyint(4) NOT NULL DEFAULT 2,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `email`, `email_verified_at`, `password`, `full_name`, `phone`, `image`, `gender`, `address`, `role_id`, `status`, `level`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '66432dba-c992-448b-b44a-07dc534495fe', 'luantran04555@gmail.com', NULL, '$2y$10$TPbuecvZ2dZpt2xGSVQXKOML4zUbC2fLQxpLi7YvL.CqnAjn2YIga', 'Trần Thanh Luân', '0987661703', 'avatar-tran-thanh-luan-1685947441.jpg', 'Nam', 'Quận 12, Hồ Chí Minh', 1, 'on', 1, NULL, NULL, '2023-06-03 02:41:22', '2023-06-04 23:44:01'),
(2, '50906e03-7154-4668-bf72-d5ac70d3cfa6', 'tranluan@gmail.com', NULL, '$2y$10$uwq6S93GOlBJhjMRnPMAkuTqGyK397wrPnUiRBS3LUMxc83PnB77O', 'Trần Luân', '0987661703', 'avatar-tran-luan-1685786342.jpg', 'Nam', 'Quận 12, Hồ Chí Minh', 2, 'on', 2, NULL, NULL, '2023-06-03 02:59:02', '2023-06-03 02:59:02'),
(3, '22e8b18f-2a89-4a5c-b6bf-6e3b2a6987a1', 'ngocde2309@gmail.com', NULL, '$2y$10$eMMmKKBE0sAa215sZxZegOKejOUMR0gTBhKvc9dfCxaktyo1bZG9S', 'Trương Ngọc Dễ', '0349394368', 'avatar-ngoc-de-1685787070.jpg', 'Nữ', 'Thạnh Trị, Sóc Trăng', 4, 'on', 4, NULL, NULL, '2023-06-03 03:11:10', '2023-06-04 21:35:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_uuid_unique` (`uuid`),
  ADD KEY `attributes_user_id_foreign` (`user_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bills_uuid_unique` (`uuid`),
  ADD KEY `bills_booking_id_foreign` (`booking_id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_uuid_unique` (`uuid`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

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
  ADD UNIQUE KEY `roles_uuid_unique` (`uuid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_uuid_unique` (`uuid`),
  ADD KEY `rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `room_attributes`
--
ALTER TABLE `room_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_attributes_attribute_id_foreign` (`attribute_id`),
  ADD KEY `room_attributes_room_id_foreign` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_images_room_id_foreign` (`room_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_types_uuid_unique` (`uuid`),
  ADD KEY `room_types_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_attributes`
--
ALTER TABLE `room_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_attributes`
--
ALTER TABLE `room_attributes`
  ADD CONSTRAINT `room_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_attributes_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_types`
--
ALTER TABLE `room_types`
  ADD CONSTRAINT `room_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
