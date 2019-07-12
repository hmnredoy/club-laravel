-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 06:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_info`
--

CREATE TABLE `club_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` int(11) NOT NULL,
  `club_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_info`
--

INSERT INTO `club_info` (`id`, `club_id`, `club_name`) VALUES
(1, 1, 'Computer Club'),
(2, 2, 'Shomoy Club'),
(3, 3, 'AIUB Art Club'),
(4, 4, 'AIUB Drama Club');

-- --------------------------------------------------------

--
-- Table structure for table `joined_clubs`
--

CREATE TABLE `joined_clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `joined_clubs`
--

INSERT INTO `joined_clubs` (`id`, `club_id`, `username`, `status`, `created_at`, `updated_at`) VALUES
(44, 2, 'hmnredoy', 'active', NULL, NULL),
(45, 4, 'Nishat', 'active', NULL, NULL),
(47, 2, 'Nishat', 'active', NULL, NULL),
(48, 1, 'Nishat', 'inactive', NULL, NULL),
(49, 1, 'hmnredoy1', 'active', NULL, NULL),
(53, 1, 'hmnredoy12', 'active', NULL, NULL),
(54, 1, 'hmnredoy123', 'active', NULL, NULL),
(55, 3, 'hmnredoy123', 'active', NULL, NULL),
(56, 1, 'hmnredoy1234', 'inactive', NULL, NULL),
(57, 3, 'hmnredoy1234', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2019_03_11_190052_create_users_table', 1),
(3, '2019_04_17_192033_add_loggedin_to_users', 1),
(4, '2019_04_17_234548_create_joined_clubs_table', 2),
(5, '2019_04_17_234610_create_club_info_table', 2),
(7, '2019_04_17_235641_create_club_info_table', 3),
(8, '2019_04_19_074246_add_join_date_to_users_table', 4),
(10, '2019_04_19_141848_add_designation_to_users_table', 5),
(12, '2019_04_20_160649_add_gender_to_users_table', 6),
(13, '2019_04_20_200051_create_messages_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loggedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General Member',
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `username`, `dob`, `phone`, `email`, `password`, `active_status`, `avatar`, `created_at`, `updated_at`, `loggedin`, `join_date`, `designation`, `gender`) VALUES
(1, 'admin', 'Admin', 'admin', '14/08/1995', '017522747094', 'admin@gmail.com', '123456', 'active', '', NULL, NULL, '1558500433', '', 'Admin', ''),
(2, 'student', 'N Zaman Redoy', 'hmnredoy', '1995-08-14', '01742072430', 'hmnredoy@gmail.com', '$2y$10$UjXXgn75yrRpJi8TdSvOkOpHrJwSVY/WkMgcyWMO5kMpV0TQTeRzW', 'active', '1555796170.jpg', NULL, NULL, NULL, '20/04/2019', 'General Member', ''),
(3, 'student', 'Nishat Mohona', 'Nishat', '2000-06-25', '01794547656', 'mohona@gmail.com', '$2y$10$kYRWGbRCVaeNLjbLgRL6iOE4lOgpPdQ2kL5HcCNA2utmK8PP61xNu', 'active', '1556564359.jpg', NULL, NULL, NULL, '20/04/2019', 'Assistant Manager', ''),
(4, 'student', 'Nazmuzzaman Redoy', 'hmnredoy1', '2019-05-06', '01670814698', 'hmnredoyy@gmail.com', '$2y$10$BzXupMWJhHwXS45x5PsNVu9ZrJy8rbKNLZlLCjwicDqz7Ri2PbkAG', 'active', '1558420232.PNG', NULL, NULL, NULL, '21-05-2019', 'General Member', ''),
(8, 'student', 'Nazmuzzaman Redoy', 'hmnredoy12', '2019-05-23', '91680814698', 'hmnredoywe@gmail.com', '$2y$10$..aIuKzitad.jtxSmn1w/uWV8Z7ydEeJV8l/Hici7kTnCHQc/9iUG', 'active', '1558421090.PNG', NULL, NULL, NULL, '21-05-2019', 'General Member', ''),
(9, 'student', 'Nazmuzzaman Redoy', 'hmnredoy123', '2019-05-07', '91680814698', 'hmnredoywwe@gmail.com', '$2y$10$Q3024NXaB7Q5GBwbYLt0RuRskFnq7jc1Zq9DvXRWv4cWxWrkGJuNe', 'active', '1558421362.PNG', NULL, NULL, NULL, '21-05-2019', 'General Member', ''),
(10, 'student', 'Nazmuzzaman Redoy', 'hmnredoy1234', '2019-05-07', '91680814698', 'hmnredo4we@gmail.com', '$2y$10$yZ9P7XVd/C0J/Y/eQPW1K.14Mgf4nyqlBqtnU9TEc8VSpNK8gCu7q', 'active', '1558421797.PNG', NULL, NULL, NULL, '21-05-2019', 'General Member', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_info`
--
ALTER TABLE `club_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joined_clubs`
--
ALTER TABLE `joined_clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `club_info`
--
ALTER TABLE `club_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `joined_clubs`
--
ALTER TABLE `joined_clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
