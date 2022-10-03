-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 01:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_uses`
--

CREATE TABLE `about_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_uses`
--

INSERT INTO `about_uses` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`, `description`, `image`) VALUES
(1, '2020-07-21 18:28:14', '2020-07-21 18:28:14', NULL, 'Madeinukrainee', 'Got me into plat 5 from gold 3, the boosters are awesome & know how to carry!', 'client1_1595330894.png'),
(2, '2020-07-21 18:29:04', '2020-07-21 18:29:04', NULL, 'Peterkwokjai', 'Very fast service. Done is a week. Has plenty of people working with him to make sure your account is done is a timely manner. Will do business again anytime.', 'client3_1595330944.png'),
(3, '2020-07-21 18:29:47', '2020-07-21 18:29:47', NULL, 'Callen', 'Great service . Plat 1 > Diamond 5 less than one day , Professional booster , work very hard , won 14/4 A++++++ recommended', 'client1_1595330987.png'),
(4, '2020-07-21 18:30:30', '2020-07-21 21:22:10', NULL, 'Killerwave', 'Great service! Very reliable, purchased a p1 to d5 boost and promos were free! Would use again', 'client2_1595341330.png');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 16:19:39', '2020-07-17 16:19:39'),
(2, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 16:33:07', '2020-07-17 16:33:07'),
(3, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 16:34:15', '2020-07-17 16:34:15'),
(4, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 16:37:23', '2020-07-17 16:37:23'),
(5, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 16:37:38', '2020-07-17 16:37:38'),
(6, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 16:58:27', '2020-07-17 16:58:27'),
(7, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2020-07-17 16:59:03', '2020-07-17 16:59:03'),
(8, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2020-07-17 16:59:26', '2020-07-17 16:59:26'),
(9, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 16:59:50', '2020-07-17 16:59:50'),
(10, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:00:31', '2020-07-17 17:00:31'),
(11, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 17:00:42', '2020-07-17 17:00:42'),
(12, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 17:02:40', '2020-07-17 17:02:40'),
(13, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:02:52', '2020-07-17 17:02:52'),
(14, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:05:17', '2020-07-17 17:05:17'),
(15, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 17:05:27', '2020-07-17 17:05:27'),
(16, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 17:05:34', '2020-07-17 17:05:34'),
(17, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:05:46', '2020-07-17 17:05:46'),
(18, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:06:56', '2020-07-17 17:06:56'),
(19, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:07:07', '2020-07-17 17:07:07'),
(20, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:08:12', '2020-07-17 17:08:12'),
(21, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 17:08:24', '2020-07-17 17:08:24'),
(22, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-17 17:08:33', '2020-07-17 17:08:33'),
(23, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 17:08:44', '2020-07-17 17:08:44'),
(24, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 19:00:36', '2020-07-17 19:00:36'),
(25, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 20:23:28', '2020-07-17 20:23:28'),
(26, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 20:26:38', '2020-07-17 20:26:38'),
(27, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 20:33:26', '2020-07-17 20:33:26'),
(28, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 20:34:13', '2020-07-17 20:34:13'),
(29, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 21:13:42', '2020-07-17 21:13:42'),
(30, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 21:21:23', '2020-07-17 21:21:23'),
(31, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 21:38:46', '2020-07-17 21:38:46'),
(32, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 21:39:07', '2020-07-17 21:39:07'),
(33, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-17 22:24:51', '2020-07-17 22:24:51'),
(34, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-20 14:23:55', '2020-07-20 14:23:55'),
(35, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2020-07-20 15:25:01', '2020-07-20 15:25:01'),
(36, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-20 15:25:15', '2020-07-20 15:25:15'),
(37, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-20 19:01:56', '2020-07-20 19:01:56'),
(38, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-20 21:54:01', '2020-07-20 21:54:01'),
(39, 'myuser', 'LoggedIn', 4, 'App\\User', 4, 'App\\User', '[]', '2020-07-20 22:06:38', '2020-07-20 22:06:38'),
(40, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-21 15:33:53', '2020-07-21 15:33:53'),
(41, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-21 16:56:52', '2020-07-21 16:56:52'),
(42, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-21 17:35:54', '2020-07-21 17:35:54'),
(43, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-23 18:22:17', '2020-07-23 18:22:17'),
(44, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-23 18:46:47', '2020-07-23 18:46:47'),
(45, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-23 18:58:29', '2020-07-23 18:58:29'),
(46, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-23 19:02:25', '2020-07-23 19:02:25'),
(47, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-23 19:07:13', '2020-07-23 19:07:13'),
(48, 'New User', 'LoggedIn', 5, 'App\\User', 5, 'App\\User', '[]', '2020-07-23 19:30:11', '2020-07-23 19:30:11'),
(49, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-23 20:37:56', '2020-07-23 20:37:56'),
(50, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-23 20:58:48', '2020-07-23 20:58:48'),
(51, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-24 18:34:16', '2020-07-24 18:34:16'),
(52, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-24 20:23:33', '2020-07-24 20:23:33'),
(53, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-24 20:45:13', '2020-07-24 20:45:13'),
(54, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-27 16:10:14', '2020-07-27 16:10:14'),
(55, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-28 15:57:09', '2020-07-28 15:57:09'),
(56, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-30 14:26:58', '2020-07-30 14:26:58'),
(57, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-07-30 17:03:27', '2020-07-30 17:03:27'),
(58, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-03 14:28:35', '2020-08-03 14:28:35'),
(59, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-04 23:06:42', '2020-08-04 23:06:42'),
(60, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-05 12:15:03', '2020-08-05 12:15:03'),
(61, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-05 20:18:05', '2020-08-05 20:18:05'),
(62, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-06 12:33:16', '2020-08-06 12:33:16'),
(63, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-07 13:35:39', '2020-08-07 13:35:39'),
(64, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-10 13:17:14', '2020-08-10 13:17:14'),
(65, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-19 13:51:16', '2020-08-19 13:51:16'),
(66, 'Moiz', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-19 15:10:40', '2020-08-19 15:10:40'),
(67, 'Moiz', 'LoggedOut', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-19 15:21:00', '2020-08-19 15:21:00'),
(68, 'Moiz', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-19 15:21:19', '2020-08-19 15:21:19'),
(69, 'Moiz', 'LoggedOut', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-19 15:21:23', '2020-08-19 15:21:23'),
(70, 'Moiz', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-19 15:24:31', '2020-08-19 15:24:31'),
(71, 'Moiz', 'LoggedOut', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-19 15:24:52', '2020-08-19 15:24:52'),
(72, 'Moiz', 'LoggedIn', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-20 12:17:50', '2020-08-20 12:17:50'),
(73, 'Moiz', 'LoggedOut', 6, 'App\\User', 6, 'App\\User', '[]', '2020-08-20 12:18:34', '2020-08-20 12:18:34'),
(74, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-20 12:19:47', '2020-08-20 12:19:47'),
(75, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2020-08-20 20:59:53', '2020-08-20 20:59:53'),
(76, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-01-02 08:35:13', '2021-01-02 08:35:13'),
(77, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-01-02 08:44:05', '2021-01-02 08:44:05'),
(78, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2021-01-02 08:44:25', '2021-01-02 08:44:25'),
(79, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-01-02 08:46:42', '2021-01-02 08:46:42'),
(80, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-23 21:38:38', '2022-08-23 21:38:38'),
(81, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-23 21:49:31', '2022-08-23 21:49:31'),
(82, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-23 21:53:39', '2022-08-23 21:53:39'),
(83, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-23 22:04:07', '2022-08-23 22:04:07'),
(84, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-23 22:17:14', '2022-08-23 22:17:14'),
(85, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-23 22:17:21', '2022-08-23 22:17:21'),
(86, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-23 22:22:03', '2022-08-23 22:22:03'),
(87, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-23 22:22:23', '2022-08-23 22:22:23'),
(88, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-23 22:37:01', '2022-08-23 22:37:01'),
(89, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-24 19:51:13', '2022-08-24 19:51:13'),
(90, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-24 19:54:21', '2022-08-24 19:54:21'),
(91, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-24 19:56:08', '2022-08-24 19:56:08'),
(92, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-24 19:56:43', '2022-08-24 19:56:43'),
(93, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-24 19:56:54', '2022-08-24 19:56:54'),
(94, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-24 19:57:19', '2022-08-24 19:57:19'),
(95, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-24 20:00:40', '2022-08-24 20:00:40'),
(96, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-24 20:04:16', '2022-08-24 20:04:16'),
(97, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-24 22:05:35', '2022-08-24 22:05:35'),
(98, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-24 22:06:14', '2022-08-24 22:06:14'),
(99, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-25 14:54:36', '2022-08-25 14:54:36'),
(100, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-25 16:56:30', '2022-08-25 16:56:30'),
(101, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-25 16:56:41', '2022-08-25 16:56:41'),
(102, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-25 17:09:35', '2022-08-25 17:09:35'),
(103, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-25 17:09:58', '2022-08-25 17:09:58'),
(104, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-25 17:10:06', '2022-08-25 17:10:06'),
(105, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-25 18:51:34', '2022-08-25 18:51:34'),
(106, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-25 19:14:16', '2022-08-25 19:14:16'),
(107, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-25 19:14:22', '2022-08-25 19:14:22'),
(108, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-25 19:14:34', '2022-08-25 19:14:34'),
(109, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-25 21:55:09', '2022-08-25 21:55:09'),
(110, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-25 22:02:54', '2022-08-25 22:02:54'),
(111, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-26 16:59:11', '2022-08-26 16:59:11'),
(112, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-26 17:57:30', '2022-08-26 17:57:30'),
(113, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-26 19:46:10', '2022-08-26 19:46:10'),
(114, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-26 21:19:30', '2022-08-26 21:19:30'),
(115, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-26 22:03:00', '2022-08-26 22:03:00'),
(116, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-26 22:22:48', '2022-08-26 22:22:48'),
(117, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-26 23:01:03', '2022-08-26 23:01:03'),
(118, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-27 14:25:38', '2022-08-27 14:25:38'),
(119, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-29 15:45:10', '2022-08-29 15:45:10'),
(120, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-30 15:43:50', '2022-08-30 15:43:50'),
(121, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-30 19:23:02', '2022-08-30 19:23:02'),
(122, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-30 19:23:16', '2022-08-30 19:23:16'),
(123, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-30 23:27:09', '2022-08-30 23:27:09'),
(124, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-30 23:27:39', '2022-08-30 23:27:39'),
(125, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-30 23:27:45', '2022-08-30 23:27:45'),
(126, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-30 23:28:19', '2022-08-30 23:28:19'),
(127, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-31 14:45:27', '2022-08-31 14:45:27'),
(128, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-31 14:55:08', '2022-08-31 14:55:08'),
(129, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-31 14:56:08', '2022-08-31 14:56:08'),
(130, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-31 14:58:44', '2022-08-31 14:58:44'),
(131, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-31 14:58:49', '2022-08-31 14:58:49'),
(132, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-31 17:01:19', '2022-08-31 17:01:19'),
(133, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-08-31 17:37:06', '2022-08-31 17:37:06'),
(134, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-08-31 18:05:19', '2022-08-31 18:05:19'),
(135, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-08-31 22:53:29', '2022-08-31 22:53:29'),
(136, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-01 14:36:17', '2022-09-01 14:36:17'),
(137, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-01 19:51:52', '2022-09-01 19:51:52'),
(138, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-09-01 23:27:16', '2022-09-01 23:27:16'),
(139, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-02 16:02:09', '2022-09-02 16:02:09'),
(140, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-09-02 16:18:36', '2022-09-02 16:18:36'),
(141, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-02 18:54:43', '2022-09-02 18:54:43'),
(142, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2022-09-02 22:44:55', '2022-09-02 22:44:55'),
(143, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-03 14:36:51', '2022-09-03 14:36:51'),
(144, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-03 14:49:49', '2022-09-03 14:49:49'),
(145, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-03 14:49:58', '2022-09-03 14:49:58'),
(146, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-03 19:46:24', '2022-09-03 19:46:24'),
(147, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-03 21:25:07', '2022-09-03 21:25:07'),
(148, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-05 15:24:44', '2022-09-05 15:24:44'),
(149, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-05 22:48:11', '2022-09-05 22:48:11'),
(150, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-06 00:24:57', '2022-09-06 00:24:57'),
(151, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-06 01:00:50', '2022-09-06 01:00:50'),
(152, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-06 15:02:56', '2022-09-06 15:02:56'),
(153, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-07 15:20:02', '2022-09-07 15:20:02'),
(154, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-07 17:43:12', '2022-09-07 17:43:12'),
(155, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-07 17:43:20', '2022-09-07 17:43:20'),
(156, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-08 00:43:11', '2022-09-08 00:43:11'),
(157, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-08 15:35:02', '2022-09-08 15:35:02'),
(158, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-08 16:04:13', '2022-09-08 16:04:13'),
(159, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-09 00:05:37', '2022-09-09 00:05:37'),
(160, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-09 14:49:56', '2022-09-09 14:49:56'),
(161, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-09 14:51:50', '2022-09-09 14:51:50'),
(162, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-09 14:55:15', '2022-09-09 14:55:15'),
(163, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-09 15:01:05', '2022-09-09 15:01:05'),
(164, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-09 15:17:22', '2022-09-09 15:17:22'),
(165, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-09 17:53:17', '2022-09-09 17:53:17'),
(166, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-09 23:32:25', '2022-09-09 23:32:25'),
(167, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-12 16:37:04', '2022-09-12 16:37:04'),
(168, 'essa', 'LoggedIn', 12, 'App\\User', 12, 'App\\User', '[]', '2022-09-12 16:48:43', '2022-09-12 16:48:43'),
(169, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-12 16:53:07', '2022-09-12 16:53:07'),
(170, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-13 18:38:44', '2022-09-13 18:38:44'),
(171, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-13 20:26:54', '2022-09-13 20:26:54'),
(172, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-14 16:06:42', '2022-09-14 16:06:42'),
(173, 'Muhammad Faisal Qasim', 'LoggedIn', 53, 'App\\User', 53, 'App\\User', '[]', '2022-09-15 14:44:03', '2022-09-15 14:44:03'),
(174, 'Muhammad Faisal Qasim', 'LoggedOut', 53, 'App\\User', 53, 'App\\User', '[]', '2022-09-15 14:49:32', '2022-09-15 14:49:32'),
(175, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-15 14:50:03', '2022-09-15 14:50:03'),
(176, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-16 14:46:21', '2022-09-16 14:46:21'),
(177, 'Muhammad Faisal Qasim', 'LoggedIn', 60, 'App\\User', 60, 'App\\User', '[]', '2022-09-16 17:00:32', '2022-09-16 17:00:32'),
(178, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 17:04:15', '2022-09-16 17:04:15'),
(179, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-16 17:17:04', '2022-09-16 17:17:04'),
(180, 'Muhammad Faisal1', 'LoggedOut', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 17:39:33', '2022-09-16 17:39:33'),
(181, 'Muhammad Faisal2', 'LoggedIn', 67, 'App\\User', 67, 'App\\User', '[]', '2022-09-16 17:39:42', '2022-09-16 17:39:42'),
(182, 'Muhammad Faisal2', 'LoggedOut', 67, 'App\\User', 67, 'App\\User', '[]', '2022-09-16 17:40:02', '2022-09-16 17:40:02'),
(183, 'Muhammad Faisal Qasim', 'LoggedIn', 68, 'App\\User', 68, 'App\\User', '[]', '2022-09-16 17:40:13', '2022-09-16 17:40:13'),
(184, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 19:52:50', '2022-09-16 19:52:50'),
(185, 'Muhammad Faisal1', 'LoggedOut', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 20:04:30', '2022-09-16 20:04:30'),
(186, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-16 20:04:53', '2022-09-16 20:04:53'),
(187, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 20:06:02', '2022-09-16 20:06:02'),
(188, 'Muhammad Faisal1', 'LoggedOut', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 20:07:20', '2022-09-16 20:07:20'),
(189, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 20:07:36', '2022-09-16 20:07:36'),
(190, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-16 21:13:21', '2022-09-16 21:13:21'),
(191, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-17 15:09:55', '2022-09-17 15:09:55'),
(192, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-17 16:24:45', '2022-09-17 16:24:45'),
(193, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-17 16:26:08', '2022-09-17 16:26:08'),
(194, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-17 17:56:54', '2022-09-17 17:56:54'),
(195, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-18 20:40:06', '2022-09-18 20:40:06'),
(196, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-18 20:40:21', '2022-09-18 20:40:21'),
(197, 'Muhammad Faisal Qasim', 'LoggedIn', 68, 'App\\User', 68, 'App\\User', '[]', '2022-09-19 17:25:19', '2022-09-19 17:25:19'),
(198, 'Muhammad Faisal Qasim', 'LoggedOut', 68, 'App\\User', 68, 'App\\User', '[]', '2022-09-19 17:25:45', '2022-09-19 17:25:45'),
(199, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-19 17:26:04', '2022-09-19 17:26:04'),
(200, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-19 20:23:40', '2022-09-19 20:23:40'),
(201, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-19 21:04:56', '2022-09-19 21:04:56'),
(202, 'Developer', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-19 21:48:42', '2022-09-19 21:48:42'),
(203, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-19 22:32:26', '2022-09-19 22:32:26'),
(204, 'Muhammad Faisal1', 'LoggedOut', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-19 22:32:29', '2022-09-19 22:32:29'),
(205, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-19 22:32:36', '2022-09-19 22:32:36'),
(206, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-20 15:24:11', '2022-09-20 15:24:11'),
(207, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-20 16:29:49', '2022-09-20 16:29:49'),
(208, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-20 23:22:42', '2022-09-20 23:22:42'),
(209, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-21 14:51:40', '2022-09-21 14:51:40'),
(210, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-21 16:53:31', '2022-09-21 16:53:31'),
(211, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-21 21:48:08', '2022-09-21 21:48:08'),
(212, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-21 22:17:07', '2022-09-21 22:17:07'),
(213, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-22 20:09:17', '2022-09-22 20:09:17'),
(214, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-27 15:20:26', '2022-09-27 15:20:26'),
(215, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-27 18:19:05', '2022-09-27 18:19:05'),
(216, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-27 18:45:40', '2022-09-27 18:45:40'),
(217, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-27 19:59:08', '2022-09-27 19:59:08'),
(218, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-29 17:28:12', '2022-09-29 17:28:12'),
(219, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-29 17:29:34', '2022-09-29 17:29:34'),
(220, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-29 18:15:43', '2022-09-29 18:15:43'),
(221, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-29 19:35:01', '2022-09-29 19:35:01'),
(222, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-30 14:54:55', '2022-09-30 14:54:55'),
(223, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-30 20:21:16', '2022-09-30 20:21:16'),
(224, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-10-01 15:49:20', '2022-10-01 15:49:20'),
(225, 'Muhammad', 'LoggedIn', 81, 'App\\User', 81, 'App\\User', '[]', '2022-10-01 16:05:13', '2022-10-01 16:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `bests`
--

CREATE TABLE `bests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bests`
--

INSERT INTO `bests` (`id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, '2020-07-24 20:25:48', '2020-07-24 20:25:48', 'Anonymous Boosting', 'We have real reviews spanning multiple sites such as EpicNPC so you know you are dealing with a trusted service.'),
(2, '2020-07-24 20:26:27', '2020-07-24 20:26:27', 'Profession ELO Booster', 'We have real reviews spanning multiple sites such as Epic NPC so you know you are dealing with a trusted service.'),
(3, '2020-07-24 20:26:59', '2020-07-24 20:26:59', 'Verified Reviews', 'We have real reviews spanning multiple sites such as EpicNPC so you know you are dealing with a trusted service.');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `user_id`, `title`, `slug`, `content`, `image`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'My first blog', 'my-first-blog', '<p>Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas est ac dolor imperdiet pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor, erat sit amet venenatis luctus, augue libero ultrices quam, ut congue nisi risus eu purus. Cras semper consectetur elementum. Nulla vel aliquet libero. Vestibulum eget felis nec purus commodo convallis. Aliquam erat volutpat.  <br> <br> Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas est ac dolor imperdiet pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor, erat sit amet venenatis luctus, augue libero ultrices quam, ut congue nisi risus eu purus. Cras semper consectetur elementum. Nulla vel aliquet libero. Vestibulum eget felis nec purus commodo convallis. Aliquam erat volutpat.\n</p>\n', NULL, 0, '2020-07-17 15:23:09', '2020-07-17 15:23:09', NULL),
(2, 2, 1, 'My Second blog', 'my-second-blog', '<p>Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut atlis. Aliquam erat volutpat.  <br> <br> Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas est ac dolor imperdiet pretium. Lorem ipsum dolor sit amet, consectetur adipisci semper consectetur elementum. Nulla vel aliquet libero. Vestibulum eget felis nec purus commodo convallis. Aliquam erat volutpat.<br><br>mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas. tincidunt sed enim. Sed et felis metus.\n</p>\n', NULL, 0, '2020-07-17 15:23:10', '2020-07-17 15:23:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Love', 'love', '2020-07-17 15:23:08', '2020-07-17 15:23:08', NULL),
(2, 'Hate', 'hate', '2020-07-17 15:23:08', '2020-07-17 15:23:08', NULL),
(3, 'Inspiration', 'inspiration', '2020-07-17 15:23:08', '2020-07-17 15:23:09', NULL),
(4, 'Friends', 'friends', '2020-07-17 15:23:09', '2020-07-17 15:23:09', NULL),
(5, 'Motivational', 'motivational', '2020-07-17 15:23:09', '2020-07-17 15:23:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_employment` date DEFAULT NULL,
  `end_of_work_date` date DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `date_of_employment`, `end_of_work_date`, `telephone`, `status`, `restaurant_id`, `salary`) VALUES
(1, '2022-09-01 21:15:10', '2022-09-01 21:15:10', NULL, 'Muhammad Faisal Qasim', '2022-09-01', NULL, '234', 'active', 3, 23423),
(2, '2022-09-01 21:15:38', '2022-09-01 21:15:38', NULL, 'Muhammad Faisal Qasim', '2022-09-06', NULL, '34234', 'active', 3, 234);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_hours` double(65,2) DEFAULT NULL,
  `sum` double(65,2) DEFAULT NULL,
  `rate` int(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_hour` time NOT NULL,
  `finish_hour` time NOT NULL,
  `bonus_sum` float DEFAULT 0,
  `total_sum` double(65,2) DEFAULT NULL,
  `bonus_for_what` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Good Will Bonus',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'not paid in cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salaries`
--

INSERT INTO `employee_salaries` (`id`, `restaurant_id`, `created_at`, `updated_at`, `name`, `number_of_hours`, `sum`, `rate`, `date`, `start_hour`, `finish_hour`, `bonus_sum`, `total_sum`, `bonus_for_what`, `type`) VALUES
(57, 12, '2022-09-30 20:13:25', '2022-09-30 20:13:25', 'Muhammad Faisal1', 2.50, 256.00, 123, '2022-09-30', '07:13:00', '09:18:00', 256.25, 256.25, NULL, NULL),
(59, 12, '2022-09-30 21:19:05', '2022-09-30 21:20:12', 'Muhammad2', 11.00, 242.00, 22, '2022-09-30', '08:20:00', '18:21:00', 1232.05, 1232.05, NULL, NULL),
(60, 12, '2022-09-30 22:24:17', '2022-09-30 22:34:15', 'Muhammad Faisal2', 5.00, 110.00, 22, '2022-09-30', '09:26:00', '05:27:00', 87.6333, 87.63, NULL, NULL),
(61, 12, '2022-09-30 22:31:27', '2022-09-30 22:32:13', 'Muhammad Faisal2 Qasim', 4.00, 88.00, 22, '2022-09-30', '09:32:00', '05:33:00', 87.6333, 87.63, NULL, NULL),
(62, 60, '2022-09-30 22:35:45', '2022-09-30 22:35:45', 'Muhammad Faisal2 Qasim', 5.00, 110.00, 22, '2022-09-30', '09:35:00', '04:35:00', 110, 110.00, NULL, NULL),
(63, 60, '2022-09-30 22:36:05', '2022-09-30 22:36:05', 'Muhammad Faisal2 Qasim', 5.00, 110.00, 22, '2022-09-30', '09:35:00', '04:35:00', 110, 110.00, NULL, NULL),
(64, 18, '2022-10-01 16:45:57', '2022-10-01 16:45:57', 'Muhammad Qasim', 13.59, 144.20, 12, '2022-10-01', '15:46:00', '02:45:00', 144.2, 144.20, NULL, NULL),
(65, 64, '2022-10-01 16:48:06', '2022-10-01 16:48:06', 'Muhammad Qasim', 2.58, 12.40, 12, '2022-10-01', '03:48:00', '01:46:00', 12.4, 12.40, NULL, NULL),
(66, 64, '2022-10-01 16:51:16', '2022-10-01 16:51:16', 'Muhammad Qasim', 1.59, 0.38, 23, '2022-10-01', '03:52:00', '02:51:00', 0.383333, 0.38, NULL, NULL),
(67, 64, '2022-10-01 16:51:40', '2022-10-01 16:51:40', 'Muhammad Qasim', 1.59, 0.38, 23, '2022-10-01', '03:52:00', '02:51:00', 0.383333, 0.38, NULL, NULL),
(68, 18, '2022-10-01 18:15:55', '2022-10-01 18:15:55', 'Muhammad Qasim', 10.00, 120.00, 12, '2022-10-01', '07:16:00', '17:16:00', 120, 120.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(191) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum` int(11) DEFAULT NULL,
  `date_of_expense` date DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not download'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `restaurant_id`, `created_at`, `updated_at`, `for_whom`, `name`, `sum`, `date_of_expense`, `status`) VALUES
(37, 7, '2022-09-14', '2022-09-20 15:59:44', 'Admin', 'waiter', 234, '2022-09-14', 'not download'),
(38, 7, '2022-09-14', '2022-09-19 22:42:04', 'Admin', 'Ismail', 17120, '2022-09-14', 'download'),
(39, 7, '2022-09-14', '2022-09-15 00:52:44', 'Admin', 'Ismail', 17120, '2022-09-14', 'not download'),
(40, 9, '2022-09-14', '2022-09-15 00:54:35', 'Admin', 'VERONICA GOMES', 4234, '2022-09-14', 'not download'),
(41, 9, '2022-09-15', '2022-09-15 15:14:43', 'Admin', 'Ismail', 4234, '2022-09-15', 'not download'),
(43, 9, '2022-09-15', '2022-09-20 15:59:34', 'Admin', 'Muhammad Faisal Qasim', 17120, '2022-09-15', 'download'),
(44, 8, '2022-09-15', '2022-09-15 22:52:22', 'Admin', 'Muhammad Faisal Qasim', 17120, '2022-09-15', 'not download'),
(45, 8, '2022-09-16', '2022-09-16 19:00:25', 'Admin', 'Ismail', 534, '2022-09-16', 'not download'),
(46, 8, '2022-08-19', '2022-09-19 22:42:00', 'Admin', 'VERONICA GOMES', 234, '2022-09-19', 'not download'),
(49, 9, '2022-09-20', '2022-09-20 16:39:45', 'Admin', 'Ismail2', 234, '2022-09-20', 'not download'),
(50, 10, '2022-09-20', '2022-09-20 22:52:15', 'Muhammad  Faisal', '234', 234, '2022-09-20', 'not download'),
(51, 12, '2022-09-21', '2022-09-30 19:09:15', 'Admin', 'VERONICA GOMES', 181, '2022-09-21', 'download'),
(52, 12, '2022-09-22', '2022-09-30 19:09:02', 'Admin', 'Ismail', 4234, '2022-09-30', 'not download'),
(53, 12, '2022-09-27', '2022-09-27 17:12:14', 'Muhammad Faisal1', 'FaisalTesting5', 17120, '2022-09-27', 'not download'),
(56, 12, '2022-09-27', '2022-09-30 19:08:05', 'Admin', 'Muhammad Faisal Qasim', 24, '2022-09-30', 'download'),
(57, 12, '2022-09-27', '2022-09-30 19:09:07', 'Admin', 'AMMAR ENGINEERING', 234, '2022-09-30', 'not download'),
(58, 12, '2022-09-27', '2022-09-30 19:09:32', 'Admin', 'MainContent', 234, '2022-09-30', 'download'),
(60, 12, '2022-09-30', '2022-09-30 22:21:44', 'Muhammad Faisal2 Qasim', 'waiter', 17120, '2022-09-30', 'not download'),
(61, 18, '2022-10-01', '2022-10-01 17:48:53', 'Muhammad Qasim', 'waiter', 17120, '2022-10-01', 'download'),
(62, 18, '2022-10-01', '2022-10-01 17:49:44', 'Muhammad Qasim', 'waiter', 17120, '2022-10-01', 'not download'),
(63, 18, '2022-10-01', '2022-10-01 18:16:29', 'Muhammad Qasim', 'essa', 232, '2022-10-01', 'not download');

-- --------------------------------------------------------

--
-- Table structure for table `expense_file`
--

CREATE TABLE `expense_file` (
  `id` int(191) NOT NULL,
  `expenses_id` int(191) NOT NULL,
  `date_of_issue` date NOT NULL,
  `file` varchar(191) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_file`
--

INSERT INTO `expense_file` (`id`, `expenses_id`, `date_of_issue`, `file`, `created_at`, `updated_at`) VALUES
(19, 37, '2022-09-14', '/uploads/ExpenseFile/2022/September/bGCRCnS9miBe2Clo20220914055120000000.pdf', '2022-09-14', '2022-09-14'),
(20, 38, '2022-09-14', '/uploads/ExpenseFile/2022/September/8kSrgDctKcVzPn4G20220914055200000000.xlsx', '2022-09-14', '2022-09-14'),
(21, 42, '2022-09-15', '/uploads/ExpenseFile/2022/September/wdPaa79Y8ClAhoUY20220915010946000000.png', '2022-09-15', '2022-09-15'),
(22, 43, '2022-09-15', '/uploads/ExpenseFile/2022/September/iDE77qfD9pCBHGJz20220915011020000000.exe', '2022-09-15', '2022-09-15'),
(23, 45, '2022-09-16', '/uploads/ExpenseFile/2022/September/wXvs5l4Lc2yQS0gF20220916120025000000.docx', '2022-09-16', '2022-09-16'),
(24, 46, '2022-09-19', '/uploads/ExpenseFile/2022/September/B4f5MELWRj2knXU720220919034200000000.docx', '2022-09-19', '2022-09-19'),
(25, 48, '2022-09-20', '/uploads/ExpenseFile/2022/September/FIvkcvM0MsQbyQYj20220920091436000000.xlsx', '2022-09-20', '2022-09-20'),
(26, 49, '2022-09-20', '/uploads/ExpenseFile/2022/September/U3k51pXOChyjpjyR20220920093945000000.pdf', '2022-09-20', '2022-09-20'),
(27, 50, '2022-09-20', '/uploads/ExpenseFile/2022/September/R2yljLSwC8TjajCi20220920035215000000.pdf', '2022-09-20', '2022-09-20'),
(28, 51, '2022-09-21', '/uploads/ExpenseFile/2022/September/c5V0dekyO2kfJWIm20220921075503000000.docx', '2022-09-21', '2022-09-21'),
(29, 52, '2022-09-22', '/uploads/ExpenseFile/2022/September/G2G354ESFcPg4Kf120220922015757000000.docx', '2022-09-22', '2022-09-22'),
(30, 54, '2022-09-27', '/uploads/ExpenseFile/2022/September/IZqsItis9nqUPtaA20220927101234000000.docx', '2022-09-27', '2022-09-27'),
(31, 55, '2022-09-27', '/uploads/ExpenseFile/2022/September/xju2eBXrkH6E8Mmn20220927101335000000.docx', '2022-09-27', '2022-09-27'),
(32, 56, '2022-09-27', '/uploads/ExpenseFile/2022/September/ks2CKZ1sxdyWz5c320220927112247000000.docx', '2022-09-27', '2022-09-27'),
(33, 57, '2022-09-27', '/uploads/ExpenseFile/2022/September/rmKijzqZgFurWWdH20220927012802000000.docx', '2022-09-27', '2022-09-27'),
(34, 58, '2022-09-27', '/uploads/ExpenseFile/2022/September/lH67qBV52Wj4CYoW20220927015610000000.pdf', '2022-09-27', '2022-09-27'),
(35, 59, '2022-09-30', '/uploads/ExpenseFile/2022/September/9w9hv53xd3fnIp2y20220930090050000000.png', '2022-09-30', '2022-09-30'),
(36, 56, '2022-09-30', '/uploads/ExpenseFile/2022/September/ZiwZ8XU7y8xlWYK620220930120208000000.jpg', '2022-09-30', '2022-09-30'),
(37, 56, '2022-09-30', '/uploads/ExpenseFile/2022/September/YKTk4S9kYxSOreog20220930120220000000.jpg', '2022-09-30', '2022-09-30'),
(38, 57, '2022-09-30', '/uploads/ExpenseFile/2022/September/9TWUb7mgZ2rE7Tq320220930120311000000.jpg', '2022-09-30', '2022-09-30'),
(39, 58, '2022-09-30', '/uploads/ExpenseFile/2022/September/Xd8slM6z8u6RFf1020220930120932000000.svg', '2022-09-30', '2022-09-30'),
(40, 58, '2022-09-30', '/uploads/ExpenseFile/2022/September/n9PkvoLijUQImFR820220930120946000000.png', '2022-09-30', '2022-09-30'),
(41, 61, '2022-10-01', '/uploads/ExpenseFile/2022/October/qMIUbhrYBW2fDPqT20221001100121000000.png', '2022-10-01', '2022-10-01'),
(42, 62, '2022-10-01', '/uploads/ExpenseFile/2022/October/tLhJFgi6hO56zLAT20221001104944000000.png', '2022-10-01', '2022-10-01'),
(43, 63, '2022-10-01', '/uploads/ExpenseFile/2022/October/QPwlG6eSafLhaMSW20221001111629000000.pdf', '2022-10-01', '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_193651_create_roles_permissions_tables', 1),
(4, '2018_06_15_045804_create_profiles_table', 1),
(5, '2018_06_15_092930_create_social_accounts_table', 1),
(6, '2018_06_16_054705_create_activity_log_table', 1),
(7, '2018_06_27_072626_create_blog_module', 1),
(8, '2020_03_20_050141_create_failed_jobs_table', 1),
(9, '2020_07_17_094804_create_testings_table', 2),
(10, '2020_07_20_072752_create_news_table', 3),
(11, '2020_07_20_073506_create_news_table', 4),
(12, '2020_07_20_073841_create_news_table', 5),
(13, '2020_07_20_082749_create_news_table', 6),
(14, '2020_07_20_145845_create_categories_table', 7),
(15, '2020_07_21_083742_create_categories_table', 8),
(16, '2020_07_21_085604_create_e_l_o__boosters_table', 9),
(17, '2020_07_21_091528_create_games_table', 10),
(18, '2020_07_21_091920_create_game_details_table', 11),
(19, '2020_07_21_092259_create_game_options_table', 12),
(20, '2020_07_21_092554_create_testimonials_table', 13),
(21, '2020_07_21_093120_create_orders_table', 14),
(22, '2020_07_21_093642_create_order_account_details_table', 15),
(23, '2020_07_21_095223_create_payment_details_table', 16),
(24, '2020_07_21_104147_create_about_uses_table', 16),
(25, '2020_07_21_105148_create_payment_details_table', 17),
(26, '2020_07_21_130530_create_expertise_levels_table', 18),
(27, '2020_07_23_122132_create_services_table', 19),
(28, '2020_07_23_131731_create_services_table', 20),
(29, '2020_07_23_133028_create_services_table', 21),
(30, '2020_07_24_132418_create_bests_table', 22),
(31, '2020_07_27_122059_create_game_levels_table', 23),
(32, '2020_07_30_103506_create_game_regions_table', 24),
(33, '2020_08_03_105019_create_game_roles_table', 25),
(34, '2022_08_23_145407_create_tests_table', 26),
(35, '2022_08_23_150652_create_restaurants_table', 27),
(36, '2022_08_23_152402_create_safes_table', 28),
(37, '2022_08_23_152817_create_total_cashes_table', 29),
(38, '2022_08_23_153137_create_expenses_table', 30),
(39, '2022_08_23_153526_create_employee_salaries_table', 31),
(40, '2022_08_25_100203_create_suppliers_table', 32),
(41, '2022_08_25_150946_create_reports_table', 33),
(42, '2022_09_01_125648_create_employees_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`, `description`, `image`) VALUES
(1, '2020-07-20 16:09:45', '2020-07-21 22:52:01', '2020-07-21 22:52:01', 'Gaming Machine', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ipsa recusandae explicabo atque facilis dolorem labore deserunt modi ex. Aliquam amet incidunt ex quis illum. Accusamus a nesciunt enim reiciendis.', 'testimonialleft_1595334642.png'),
(2, '2020-07-20 16:11:12', '2020-07-21 22:49:20', NULL, 'ELO Boost News: Jayce in the LCS', 'Recently, lightning has rained down upon the Rift all over the world of Summoner. But while', 'new2_1595346560.png'),
(3, '2020-07-20 16:11:42', '2020-07-21 22:50:17', NULL, 'Top 9 Ways to Display True LOL Sportsmanship', 'Top 9 Ways to Display True LOL Sportsmanship Most people enjoy a bit of harmless banter', 'new3_1595346617.png'),
(4, '2020-07-20 17:21:09', '2020-07-21 22:48:28', NULL, 'ELO Boost News: Jayce in the LCS', 'Recently, lightning has rained down upon the Rift all over the world of Summoner. But while', 'new2_1595346508.png'),
(5, '2020-07-20 18:40:43', '2020-07-21 22:51:29', NULL, 'ELO Boost News: Jayce in the LCS', 'Recently, lightning has rained down upon the Rift all over the world of Summoner. But while', 'h2_1595346689.jpg');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'All Permission', NULL, '2020-07-17 15:23:06', '2020-07-17 15:23:06'),
(2, 'add-blog', NULL, '2020-07-17 15:23:07', '2020-07-17 15:23:07'),
(3, 'view-blog', NULL, '2020-07-17 15:23:07', '2020-07-17 15:23:07'),
(4, 'edit-blog', NULL, '2020-07-17 15:23:07', '2020-07-17 15:23:07'),
(5, 'delete-blog', NULL, '2020-07-17 15:23:07', '2020-07-17 15:23:07'),
(6, 'add-blog-category', NULL, '2020-07-17 15:23:08', '2020-07-17 15:23:08'),
(7, 'view-blog-category', NULL, '2020-07-17 15:23:08', '2020-07-17 15:23:08'),
(8, 'edit-blog-category', NULL, '2020-07-17 15:23:08', '2020-07-17 15:23:08'),
(9, 'delete-blog-category', NULL, '2020-07-17 15:23:08', '2020-07-17 15:23:08'),
(10, 'add-testing', NULL, '2020-07-17 16:48:05', '2020-07-17 16:48:05'),
(11, 'edit-testing', NULL, '2020-07-17 16:48:05', '2020-07-17 16:48:05'),
(12, 'view-testing', NULL, '2020-07-17 16:48:05', '2020-07-17 16:48:05'),
(13, 'delete-testing', NULL, '2020-07-17 16:48:06', '2020-07-17 16:48:06'),
(14, 'add-news', NULL, '2020-07-20 14:27:53', '2020-07-20 14:27:53'),
(15, 'edit-news', NULL, '2020-07-20 14:27:53', '2020-07-20 14:27:53'),
(16, 'view-news', NULL, '2020-07-20 14:27:53', '2020-07-20 14:27:53'),
(17, 'delete-news', NULL, '2020-07-20 14:27:53', '2020-07-20 14:27:53'),
(18, 'add-category', NULL, '2020-07-20 21:58:46', '2020-07-20 21:58:46'),
(19, 'edit-category', NULL, '2020-07-20 21:58:46', '2020-07-20 21:58:46'),
(20, 'view-category', NULL, '2020-07-20 21:58:46', '2020-07-20 21:58:46'),
(21, 'delete-category', NULL, '2020-07-20 21:58:46', '2020-07-20 21:58:46'),
(22, 'add-elo-booster', NULL, '2020-07-21 15:56:04', '2020-07-21 15:56:04'),
(23, 'edit-elo-booster', NULL, '2020-07-21 15:56:04', '2020-07-21 15:56:04'),
(24, 'view-elo-booster', NULL, '2020-07-21 15:56:05', '2020-07-21 15:56:05'),
(25, 'delete-elo-booster', NULL, '2020-07-21 15:56:05', '2020-07-21 15:56:05'),
(26, 'add-game', NULL, '2020-07-21 16:15:29', '2020-07-21 16:15:29'),
(27, 'edit-game', NULL, '2020-07-21 16:15:29', '2020-07-21 16:15:29'),
(28, 'view-game', NULL, '2020-07-21 16:15:29', '2020-07-21 16:15:29'),
(29, 'delete-game', NULL, '2020-07-21 16:15:29', '2020-07-21 16:15:29'),
(30, 'add-gamedetail', NULL, '2020-07-21 16:19:21', '2020-07-21 16:19:21'),
(31, 'edit-gamedetail', NULL, '2020-07-21 16:19:21', '2020-07-21 16:19:21'),
(32, 'view-gamedetail', NULL, '2020-07-21 16:19:21', '2020-07-21 16:19:21'),
(33, 'delete-gamedetail', NULL, '2020-07-21 16:19:21', '2020-07-21 16:19:21'),
(34, 'add-gameoptions', NULL, '2020-07-21 16:23:00', '2020-07-21 16:23:00'),
(35, 'edit-gameoptions', NULL, '2020-07-21 16:23:00', '2020-07-21 16:23:00'),
(36, 'view-gameoptions', NULL, '2020-07-21 16:23:00', '2020-07-21 16:23:00'),
(37, 'delete-gameoptions', NULL, '2020-07-21 16:23:00', '2020-07-21 16:23:00'),
(38, 'add-testimonials', NULL, '2020-07-21 16:25:55', '2020-07-21 16:25:55'),
(39, 'edit-testimonials', NULL, '2020-07-21 16:25:55', '2020-07-21 16:25:55'),
(40, 'view-testimonials', NULL, '2020-07-21 16:25:55', '2020-07-21 16:25:55'),
(41, 'delete-testimonials', NULL, '2020-07-21 16:25:55', '2020-07-21 16:25:55'),
(42, 'add-orders', NULL, '2020-07-21 16:31:21', '2020-07-21 16:31:21'),
(43, 'edit-orders', NULL, '2020-07-21 16:31:21', '2020-07-21 16:31:21'),
(44, 'view-orders', NULL, '2020-07-21 16:31:21', '2020-07-21 16:31:21'),
(45, 'delete-orders', NULL, '2020-07-21 16:31:21', '2020-07-21 16:31:21'),
(46, 'add-orderaccountdetail', NULL, '2020-07-21 16:36:43', '2020-07-21 16:36:43'),
(47, 'edit-orderaccountdetail', NULL, '2020-07-21 16:36:43', '2020-07-21 16:36:43'),
(48, 'view-orderaccountdetail', NULL, '2020-07-21 16:36:43', '2020-07-21 16:36:43'),
(49, 'delete-orderaccountdetail', NULL, '2020-07-21 16:36:43', '2020-07-21 16:36:43'),
(50, 'add-aboutus', NULL, '2020-07-21 17:41:48', '2020-07-21 17:41:48'),
(51, 'edit-aboutus', NULL, '2020-07-21 17:41:48', '2020-07-21 17:41:48'),
(52, 'view-aboutus', NULL, '2020-07-21 17:41:48', '2020-07-21 17:41:48'),
(53, 'delete-aboutus', NULL, '2020-07-21 17:41:48', '2020-07-21 17:41:48'),
(54, 'add-paymentdetail', NULL, '2020-07-21 17:51:48', '2020-07-21 17:51:48'),
(55, 'edit-paymentdetail', NULL, '2020-07-21 17:51:48', '2020-07-21 17:51:48'),
(56, 'view-paymentdetail', NULL, '2020-07-21 17:51:48', '2020-07-21 17:51:48'),
(57, 'delete-paymentdetail', NULL, '2020-07-21 17:51:48', '2020-07-21 17:51:48'),
(58, 'add-expertiselevel', NULL, '2020-07-21 20:05:31', '2020-07-21 20:05:31'),
(59, 'edit-expertiselevel', NULL, '2020-07-21 20:05:31', '2020-07-21 20:05:31'),
(60, 'view-expertiselevel', NULL, '2020-07-21 20:05:31', '2020-07-21 20:05:31'),
(61, 'delete-expertiselevel', NULL, '2020-07-21 20:05:31', '2020-07-21 20:05:31'),
(62, 'add-service', NULL, '2020-07-23 19:21:33', '2020-07-23 19:21:33'),
(63, 'edit-service', NULL, '2020-07-23 19:21:33', '2020-07-23 19:21:33'),
(64, 'view-service', NULL, '2020-07-23 19:21:33', '2020-07-23 19:21:33'),
(65, 'delete-service', NULL, '2020-07-23 19:21:33', '2020-07-23 19:21:33'),
(66, 'add-best', NULL, '2020-07-24 20:24:20', '2020-07-24 20:24:20'),
(67, 'edit-best', NULL, '2020-07-24 20:24:20', '2020-07-24 20:24:20'),
(68, 'view-best', NULL, '2020-07-24 20:24:20', '2020-07-24 20:24:20'),
(69, 'delete-best', NULL, '2020-07-24 20:24:20', '2020-07-24 20:24:20'),
(70, 'add-gamelevel', NULL, '2020-07-27 19:21:00', '2020-07-27 19:21:00'),
(71, 'edit-gamelevel', NULL, '2020-07-27 19:21:00', '2020-07-27 19:21:00'),
(72, 'view-gamelevel', NULL, '2020-07-27 19:21:00', '2020-07-27 19:21:00'),
(73, 'delete-gamelevel', NULL, '2020-07-27 19:21:00', '2020-07-27 19:21:00'),
(74, 'add-gameregion', NULL, '2020-07-30 17:35:07', '2020-07-30 17:35:07'),
(75, 'edit-gameregion', NULL, '2020-07-30 17:35:07', '2020-07-30 17:35:07'),
(76, 'view-gameregion', NULL, '2020-07-30 17:35:08', '2020-07-30 17:35:08'),
(77, 'delete-gameregion', NULL, '2020-07-30 17:35:08', '2020-07-30 17:35:08'),
(78, 'add-gameroles', NULL, '2020-08-03 17:50:21', '2020-08-03 17:50:21'),
(79, 'edit-gameroles', NULL, '2020-08-03 17:50:21', '2020-08-03 17:50:21'),
(80, 'view-gameroles', NULL, '2020-08-03 17:50:21', '2020-08-03 17:50:21'),
(81, 'delete-gameroles', NULL, '2020-08-03 17:50:21', '2020-08-03 17:50:21'),
(82, 'add-test', NULL, '2022-08-23 21:54:08', '2022-08-23 21:54:08'),
(83, 'edit-test', NULL, '2022-08-23 21:54:08', '2022-08-23 21:54:08'),
(84, 'view-test', NULL, '2022-08-23 21:54:08', '2022-08-23 21:54:08'),
(85, 'delete-test', NULL, '2022-08-23 21:54:08', '2022-08-23 21:54:08'),
(86, 'add-restaurant', NULL, '2022-08-23 22:06:53', '2022-08-23 22:06:53'),
(87, 'edit-restaurant', NULL, '2022-08-23 22:06:53', '2022-08-23 22:06:53'),
(88, 'view-restaurant', NULL, '2022-08-23 22:06:53', '2022-08-23 22:06:53'),
(89, 'delete-restaurant', NULL, '2022-08-23 22:06:53', '2022-08-23 22:06:53'),
(90, 'add-safe', NULL, '2022-08-23 22:24:02', '2022-08-23 22:24:02'),
(91, 'edit-safe', NULL, '2022-08-23 22:24:02', '2022-08-23 22:24:02'),
(92, 'view-safe', NULL, '2022-08-23 22:24:02', '2022-08-23 22:24:02'),
(93, 'delete-safe', NULL, '2022-08-23 22:24:02', '2022-08-23 22:24:02'),
(94, 'add-totalcash', NULL, '2022-08-23 22:28:18', '2022-08-23 22:28:18'),
(95, 'edit-totalcash', NULL, '2022-08-23 22:28:18', '2022-08-23 22:28:18'),
(96, 'view-totalcash', NULL, '2022-08-23 22:28:18', '2022-08-23 22:28:18'),
(97, 'delete-totalcash', NULL, '2022-08-23 22:28:18', '2022-08-23 22:28:18'),
(98, 'add-expenses', NULL, '2022-08-23 22:31:38', '2022-08-23 22:31:38'),
(99, 'edit-expenses', NULL, '2022-08-23 22:31:38', '2022-08-23 22:31:38'),
(100, 'view-expenses', NULL, '2022-08-23 22:31:38', '2022-08-23 22:31:38'),
(101, 'delete-expenses', NULL, '2022-08-23 22:31:38', '2022-08-23 22:31:38'),
(102, 'add-employeesalary', NULL, '2022-08-23 22:35:28', '2022-08-23 22:35:28'),
(103, 'edit-employeesalary', NULL, '2022-08-23 22:35:28', '2022-08-23 22:35:28'),
(104, 'view-employeesalary', NULL, '2022-08-23 22:35:28', '2022-08-23 22:35:28'),
(105, 'delete-employeesalary', NULL, '2022-08-23 22:35:28', '2022-08-23 22:35:28'),
(106, 'add-suppliers', NULL, '2022-08-25 17:02:04', '2022-08-25 17:02:04'),
(107, 'edit-suppliers', NULL, '2022-08-25 17:02:05', '2022-08-25 17:02:05'),
(108, 'view-suppliers', NULL, '2022-08-25 17:02:05', '2022-08-25 17:02:05'),
(109, 'delete-suppliers', NULL, '2022-08-25 17:02:05', '2022-08-25 17:02:05'),
(110, 'add-report', NULL, '2022-08-25 22:09:47', '2022-08-25 22:09:47'),
(111, 'edit-report', NULL, '2022-08-25 22:09:47', '2022-08-25 22:09:47'),
(112, 'view-report', NULL, '2022-08-25 22:09:47', '2022-08-25 22:09:47'),
(113, 'delete-report', NULL, '2022-08-25 22:09:47', '2022-08-25 22:09:47'),
(114, 'add-employee', NULL, '2022-09-01 19:56:49', '2022-09-01 19:56:49'),
(115, 'edit-employee', NULL, '2022-09-01 19:56:49', '2022-09-01 19:56:49'),
(116, 'view-employee', NULL, '2022-09-01 19:56:49', '2022-09-01 19:56:49'),
(117, 'delete-employee', NULL, '2022-09-01 19:56:49', '2022-09-01 19:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(86, 1),
(86, 4),
(87, 1),
(87, 4),
(88, 1),
(88, 4),
(88, 8),
(89, 1),
(89, 4),
(90, 1),
(90, 4),
(90, 8),
(91, 1),
(91, 4),
(92, 1),
(92, 4),
(92, 8),
(93, 1),
(93, 4),
(94, 1),
(94, 4),
(95, 1),
(95, 4),
(96, 1),
(96, 4),
(97, 1),
(97, 4),
(98, 1),
(98, 4),
(98, 8),
(99, 1),
(99, 4),
(100, 1),
(100, 4),
(100, 8),
(101, 1),
(101, 4),
(102, 1),
(102, 4),
(102, 8),
(103, 1),
(103, 4),
(104, 1),
(104, 4),
(104, 8),
(105, 1),
(105, 4),
(106, 1),
(106, 4),
(107, 1),
(107, 4),
(108, 1),
(108, 4),
(109, 1),
(109, 4),
(110, 1),
(110, 4),
(110, 8),
(111, 1),
(111, 4),
(112, 1),
(112, 4),
(112, 8),
(113, 1),
(113, 4),
(114, 4),
(115, 4),
(116, 4),
(116, 8),
(117, 4);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PESEL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_of_issue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_university` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `until_when_the_student` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `bio`, `gender`, `dob`, `pic`, `country`, `state`, `city`, `address`, `postal`, `created_at`, `updated_at`, `place_of_birth`, `PESEL`, `id_number`, `passport_number`, `country_of_issue`, `mother_name`, `father_name`, `citizenship`, `bank_account_number`, `student`, `name_of_the_university`, `until_when_the_student`) VALUES
(1, 1, '123', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-17 15:23:06', '2022-09-12 19:21:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Developer', 'male', '1995-07-31', 'IaIt6ScFMD.jpeg', 'Pakistan', 'Sindh', 'Karachi', 'Hyderabad', '70010', '2020-07-17 16:39:45', '2020-07-17 16:39:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 81, NULL, NULL, NULL, 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-01 15:53:22', '2022-10-01 15:53:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_income` double(65,2) DEFAULT NULL,
  `card_transactions` double(65,2) DEFAULT NULL,
  `canceled_sale` double(65,2) DEFAULT NULL,
  `supplier_cash` double(65,2) DEFAULT NULL,
  `bank_cash_total` double(65,2) DEFAULT NULL,
  `cash` double(65,2) NOT NULL,
  `can_see_upto_days` int(191) NOT NULL DEFAULT 2,
  `restaurant_id` int(11) DEFAULT NULL,
  `report_handler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_today` decimal(65,2) NOT NULL,
  `employee_salary_paid_today` decimal(65,2) NOT NULL,
  `date` date DEFAULT NULL,
  `status` decimal(65,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `created_at`, `updated_at`, `total_income`, `card_transactions`, `canceled_sale`, `supplier_cash`, `bank_cash_total`, `cash`, `can_see_upto_days`, `restaurant_id`, `report_handler`, `expense_today`, `employee_salary_paid_today`, `date`, `status`) VALUES
(76, '2022-09-20 21:31:27', '2022-09-20 21:31:27', 55499999.00, 522.00, 233.00, 40552.00, 11700.00, 55458325.00, 2, 9, 'Admin', '234.00', '133.00', '2022-09-20', '-55446625'),
(79, '2022-09-20 21:46:58', '2022-09-20 21:46:58', 341100000.00, 231.00, 12312.00, 40552.00, 77400.00, 341046538.00, 2, 7, 'Admin', '234.00', '133.00', '2022-09-20', '-340969138'),
(82, '2022-09-20 23:04:46', '2022-09-20 23:04:46', 12332000.00, 122.00, 123.00, 23423.00, 334700.00, 12307730.00, 2, 10, 'Muhammad Faisal1', '468.00', '134.00', '2022-09-20', '-11973030'),
(83, '2022-09-21 14:54:02', '2022-09-21 14:54:02', 12312312.00, 123.00, 123.00, 23423.00, 51600.00, 12288643.00, 2, 12, 'Admin', '0.00', '0.00', '2022-09-21', '-12237043'),
(84, '2022-09-21 20:04:03', '2022-09-21 20:04:03', 1212.00, 12.00, 12.00, 0.00, 9600.00, 501.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '9099'),
(85, '2022-09-21 20:05:44', '2022-09-21 20:05:44', 123.00, 123.00, 123.00, 0.00, 67650.00, -810.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '68460'),
(86, '2022-09-21 20:07:18', '2022-09-21 20:07:18', 12.00, 12.00, 12.00, 0.00, 3600.00, -699.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '4299'),
(87, '2022-09-21 20:10:19', '2022-09-21 20:10:19', 1212.00, 1212.00, 12.00, 0.00, 2400.00, -699.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '3099'),
(88, '2022-09-21 20:11:09', '2022-09-21 20:11:09', 12312.00, 123.00, 123.00, 0.00, 4800.00, 11379.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '-6579'),
(89, '2022-09-21 20:22:57', '2022-09-21 20:22:57', 121.00, 22.00, 12.00, 0.00, 3600.00, -600.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '4200'),
(90, '2022-09-21 20:23:48', '2022-09-21 20:23:48', 123.00, 123.00, 123.00, 0.00, 4600.00, -810.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '5410'),
(91, '2022-09-21 20:43:28', '2022-09-21 20:43:28', 123123.00, 123.00, 123.00, 0.00, 24600.00, 122190.00, 2, 12, 'Muhammad Faisal1', '181.00', '506.00', '2022-09-21', '-97590'),
(92, '2022-09-27 17:03:54', '2022-09-27 17:03:54', 12312.00, 123.00, 123.00, 0.00, 4560.00, 12066.00, 2, 12, 'Muhammad Faisal2', '0.00', '0.00', '2022-09-27', '-7506'),
(93, '2022-09-29 18:02:03', '2022-09-29 18:02:03', 13213.00, 123.00, 123.00, 0.00, 2400.00, 12967.00, 2, 12, 'Muhammad Faisal1', '0.00', '0.00', '2022-09-29', '-10567'),
(94, '2022-09-29 18:24:58', '2022-09-29 18:24:58', 234234.00, 123.00, 232.00, 0.00, 2400.00, 230439.00, 2, 12, 'Muhammad Faisal1', '0.00', '0.00', '2022-09-29', '-228039'),
(95, '2022-09-30 22:20:15', '2022-09-30 22:20:15', 123123.00, 1231.00, 21.00, 0.00, 2400.00, 121871.00, 2, 12, 'Muhammad Faisal1 Qasim', '0.00', '0.00', '2022-09-30', '-119471'),
(96, '2022-10-01 16:02:35', '2022-10-01 16:02:35', 23234.00, 123.00, 12.00, 0.00, 2400.00, 23099.00, 2, 18, 'Muhammad Qasim', '0.00', '0.00', '2022-10-01', '-20699'),
(97, '2022-10-01 18:15:12', '2022-10-01 18:15:12', 24234.00, 23.00, 23.00, 0.00, 2400.00, -10052.00, 2, 18, 'Muhammad Qasim', '34240.00', '0.00', '2022-10-01', '12452');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `focalperson` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `see_cash_reports_days` int(191) DEFAULT 2,
  `active_for_this_restaurant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `created_at`, `updated_at`, `name`, `location`, `ranking`, `description`, `focalperson`, `see_cash_reports_days`, `active_for_this_restaurant`, `details`) VALUES
(18, '2022-10-01', '2022-10-01', 'New Restaurant 1', 'Noth Uk', 4, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2020-07-17', '2020-07-17'),
(4, 'developer', NULL, '2021-01-02', '2021-01-02'),
(8, 'Employee', NULL, '2022-09-05', '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(4, 3),
(8, 81);

-- --------------------------------------------------------

--
-- Table structure for table `safes`
--

CREATE TABLE `safes` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_complete_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_of_deposited` date DEFAULT NULL,
  `date_of_withdrawal` date DEFAULT NULL,
  `payment` float DEFAULT 0,
  `paycheck` float DEFAULT 0,
  `ty_of_transaction` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cumulative` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safes`
--

INSERT INTO `safes` (`id`, `restaurant_id`, `created_at`, `updated_at`, `employee_complete_name`, `sum`, `date`, `date_of_deposited`, `date_of_withdrawal`, `payment`, `paycheck`, `ty_of_transaction`, `cumulative`) VALUES
(121, 12, '2022-09-30 16:47:46', '2022-09-30 16:47:46', 'Muhammad Faisal1', 270644, NULL, NULL, NULL, 123123, NULL, NULL, NULL),
(122, 12, '2022-09-30 17:01:20', '2022-09-30 17:01:20', 'Muhammad Faisal1', 124123, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(123, 12, '2022-09-30 17:01:37', '2022-09-30 17:01:59', 'Muhammad Faisal1', 126123, NULL, '2022-09-30', NULL, NULL, 2000, NULL, NULL),
(124, 12, '2022-09-30 17:02:21', '2022-09-30 17:02:21', 'Muhammad Faisal1', 123123, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(126, 18, '2022-10-01 17:51:33', '2022-10-01 17:52:39', 'Muhammad Qasim', 111, NULL, '2022-10-01', NULL, 234, NULL, NULL, NULL),
(127, 18, '2022-10-01 17:51:54', '2022-10-01 17:51:54', 'Muhammad Qasim', 88, NULL, NULL, NULL, NULL, 23, NULL, NULL),
(128, 18, '2022-10-01 17:55:03', '2022-10-01 18:01:36', 'Muhammad Qasim', 223, NULL, '2022-10-01', NULL, 1200, NULL, NULL, NULL),
(129, 18, '2022-10-01 17:55:12', '2022-10-01 17:55:12', 'Muhammad Qasim', 200, NULL, NULL, NULL, NULL, 23, NULL, NULL),
(130, 18, '2022-10-01 18:01:11', '2022-10-01 18:01:11', 'Admin', 77, NULL, NULL, NULL, NULL, 123, NULL, NULL),
(131, 18, '2022-10-01 18:01:21', '2022-10-01 18:01:21', 'Admin', 54, NULL, NULL, NULL, NULL, 23, NULL, NULL),
(132, 18, '2022-10-01 18:17:40', '2022-10-01 18:17:40', 'Muhammad Qasim', 1008, NULL, NULL, NULL, NULL, 234, NULL, NULL),
(133, 18, '2022-10-01 18:17:59', '2022-10-01 18:17:59', 'Muhammad Qasim', 13320, NULL, NULL, NULL, 12312, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum` decimal(11,2) DEFAULT NULL,
  `date_of_order` date DEFAULT NULL,
  `date_of_delivery` date DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `created_at`, `updated_at`, `name`, `sum`, `date_of_order`, `date_of_delivery`, `restaurant_id`, `status`) VALUES
(13, '2022-09-27 18:20:25', '2022-09-30 22:12:26', 'khalil2', '3440.00', '2022-09-27', NULL, 12, 1),
(14, '2022-09-29 18:12:07', '2022-09-29 18:12:07', 'Muhammad Faisal Qasim3', '102.00', '2022-09-14', NULL, 16, 1),
(15, '2022-09-30 23:11:11', '2022-09-30 23:11:11', 'umair', NULL, NULL, NULL, 17, 1),
(16, '2022-10-01 15:51:39', '2022-10-01 16:02:06', 'BOLT 2', NULL, NULL, NULL, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` int(11) NOT NULL,
  `taggable_id` int(11) NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`tag_id`, `taggable_id`, `taggable_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'App\\Blog', NULL, NULL, NULL),
(2, 1, 'App\\Blog', NULL, NULL, NULL),
(3, 1, 'App\\Blog', NULL, NULL, NULL),
(4, 2, 'App\\Blog', NULL, NULL, NULL),
(5, 2, 'App\\Blog', NULL, NULL, NULL),
(6, 2, 'App\\Blog', NULL, NULL, NULL),
(1, 1, 'App\\Blog', NULL, NULL, NULL),
(2, 1, 'App\\Blog', NULL, NULL, NULL),
(3, 1, 'App\\Blog', NULL, NULL, NULL),
(4, 2, 'App\\Blog', NULL, NULL, NULL),
(5, 2, 'App\\Blog', NULL, NULL, NULL),
(6, 2, 'App\\Blog', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'first blog', 'first-blog', '2020-07-17 15:23:09', '2020-07-17 15:23:09', NULL),
(2, 'new blog', 'new-blog', '2020-07-17 15:23:09', '2020-07-17 15:23:09', NULL),
(3, 'love', 'love', '2020-07-17 15:23:09', '2020-07-17 15:23:09', NULL),
(4, 'second blog', 'second-blog', '2020-07-17 15:23:10', '2020-07-17 15:23:10', NULL),
(5, 'new one', 'new-one', '2020-07-17 15:23:10', '2020-07-17 15:23:10', NULL),
(6, ' another blog', 'another-blog', '2020-07-17 15:23:10', '2020-07-17 15:23:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `total_cashes`
--

CREATE TABLE `total_cashes` (
  `id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_note` double(11,2) DEFAULT NULL,
  `pieces` int(11) DEFAULT 0,
  `together_bank_note_pieces` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_cashes`
--

INSERT INTO `total_cashes` (`id`, `restaurant_id`, `created_at`, `updated_at`, `bank_note`, `pieces`, `together_bank_note_pieces`) VALUES
(1, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 200.00, 32, '1435345'),
(2, 1, '2022-08-25 15:13:01', '2022-08-25 15:13:01', 100.00, 0, NULL),
(3, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 50.00, 32, '1435345'),
(4, 1, '2022-08-25 15:13:01', '2022-08-25 15:13:01', 20.00, 0, NULL),
(5, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 10.00, 32, '1435345'),
(6, 1, '2022-08-25 15:13:01', '2022-08-25 15:13:01', 5.00, 0, NULL),
(7, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 2.00, 32, '1435345'),
(8, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 1.00, 32, '1435345'),
(9, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 0.50, 32, '1435345'),
(10, 1, '2022-08-25 15:13:01', '2022-08-25 15:13:01', 0.20, 0, NULL),
(11, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 0.10, 32, '1435345'),
(12, 1, '2022-08-25 15:13:01', '2022-08-25 15:13:01', 0.05, 0, NULL),
(13, 1, '2022-08-23 23:44:03', '2022-08-25 15:57:40', 0.02, 32, '1435345'),
(14, 1, '2022-08-25 15:13:01', '2022-08-25 15:13:01', 0.01, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` int(191) DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1-active,2-banned',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `date_of_joining` timestamp NULL DEFAULT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `restaurant_id`, `provider_id`, `provider`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `date_of_joining`, `date_of_leaving`, `telephone`, `salary`) VALUES
(1, 'Admin', '', 'admin@admin.com', '$2y$10$V.cftIsbXRceE.EI.HgZ8.l1JDt3K9tEftyD8aW53H8dgzRAhDgLi', 0, NULL, NULL, 1, NULL, '2020-07-17 15:23:06', '2022-09-12 19:21:23', NULL, '2020-07-17 07:00:00', '0000-00-00', '23-2344234-12', 45),
(3, 'Developer', '', 'dev@admin.com', '$2y$10$PWsYJJSFcNKGsnUclBBU9e9TiLBtfBuzUu3Cd2T6WmJOia6PeeL2S', 0, NULL, NULL, 1, NULL, '2020-07-17 16:39:44', '2020-07-17 16:39:45', NULL, '2020-09-19 07:00:00', '0000-00-00', '23-2344234-12', 45),
(81, 'Muhammad', 'Qasim', 'Muhammad5@admin.com', '$2y$10$kHhJLUNgcQwXWSP5k20VKONrVlLxnm7XntN1HyqnFfbznWef82Y56', 18, NULL, NULL, 1, NULL, '2022-10-01 15:53:22', '2022-10-01 15:53:22', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_uses`
--
ALTER TABLE `about_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `bests`
--
ALTER TABLE `bests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_file`
--
ALTER TABLE `expense_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `safes`
--
ALTER TABLE `safes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_cashes`
--
ALTER TABLE `total_cashes`
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
-- AUTO_INCREMENT for table `about_uses`
--
ALTER TABLE `about_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `bests`
--
ALTER TABLE `bests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `expense_file`
--
ALTER TABLE `expense_file`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `safes`
--
ALTER TABLE `safes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `total_cashes`
--
ALTER TABLE `total_cashes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
