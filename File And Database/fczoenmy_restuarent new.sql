-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2022 at 05:24 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fczoenmy_restuarent`
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
  `description` text COLLATE utf8mb4_unicode_ci,
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
  `properties` text COLLATE utf8mb4_unicode_ci,
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
(208, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-20 22:18:55', '2022-09-20 22:18:55'),
(209, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-21 01:02:54', '2022-09-21 01:02:54'),
(210, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-21 16:36:59', '2022-09-21 16:36:59'),
(211, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-21 20:41:20', '2022-09-21 20:41:20'),
(212, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-21 21:00:35', '2022-09-21 21:00:35'),
(213, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-23 14:51:16', '2022-09-23 14:51:16'),
(214, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-27 15:15:42', '2022-09-27 15:15:42'),
(215, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-29 16:18:47', '2022-09-29 16:18:47'),
(216, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-29 18:06:44', '2022-09-29 18:06:44'),
(217, 'Muhammad Faisal1', 'LoggedIn', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-29 18:12:22', '2022-09-29 18:12:22'),
(218, 'Muhammad Faisal1', 'LoggedOut', 66, 'App\\User', 66, 'App\\User', '[]', '2022-09-29 18:14:49', '2022-09-29 18:14:49'),
(219, 'Muhammad2', 'LoggedIn', 78, 'App\\User', 78, 'App\\User', '[]', '2022-09-29 18:14:59', '2022-09-29 18:14:59'),
(220, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-29 18:32:28', '2022-09-29 18:32:28'),
(221, 'Developer', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2022-09-29 18:32:36', '2022-09-29 18:32:36'),
(222, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-30 12:16:34', '2022-09-30 12:16:34'),
(223, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-09-30 13:50:38', '2022-09-30 13:50:38'),
(224, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-10-01 03:03:32', '2022-10-01 03:03:32'),
(225, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2022-10-01 17:11:11', '2022-10-01 17:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `bests`
--

CREATE TABLE `bests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
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
  `views` int(11) NOT NULL DEFAULT '0',
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
  `number_of_hours` int(191) DEFAULT NULL,
  `sum` int(191) DEFAULT NULL,
  `rate` int(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_hour` time NOT NULL,
  `finish_hour` time NOT NULL,
  `bonus_sum` float NOT NULL,
  `total_sum` double(65,2) DEFAULT NULL,
  `bonus_for_what` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Good Will Bonus',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'not paid in cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salaries`
--

INSERT INTO `employee_salaries` (`id`, `restaurant_id`, `created_at`, `updated_at`, `name`, `number_of_hours`, `sum`, `rate`, `date`, `start_hour`, `finish_hour`, `bonus_sum`, `total_sum`, `bonus_for_what`, `type`) VALUES
(39, 7, '2022-09-15 18:26:36', '2022-09-15 18:26:36', 'Muhammad Faisal Qasim', 1, 127, 123, '2022-09-15', '05:28:00', '06:30:00', 12, 139.10, 'tip', 'Paid in cash'),
(40, 7, '2022-09-15 18:30:20', '2022-09-15 18:30:20', 'Muhammad Faisal Qasim', 3, 371, 123, '2022-09-15', '06:33:00', '09:34:00', 23, 394.05, 'tip', 'Paid in cash'),
(41, 8, '2022-09-15 22:52:08', '2022-09-15 22:52:08', 'Muhammad Faisal Qasim', 10, 2, 123, '2022-09-15', '10:54:00', '10:55:00', 45, 47.05, 'tip', 'Paid in cash'),
(42, 7, '2022-09-19 22:42:31', '2022-09-19 22:42:31', 'Muhammad Faisal4', 1, 125, 123, '2022-09-05', '10:45:00', '09:44:00', 23, 148.05, 'tip', 'Paid in cash'),
(43, 7, '2022-09-20 15:27:36', '2022-09-20 15:27:36', 'Muhammad Faisal Qasim', 1, 133, 123, '2022-09-20', '03:27:00', '04:32:00', 23, 156.25, 'tip', 'Paid in cash'),
(47, 10, '2022-09-20 23:00:39', '2022-09-20 23:00:39', 'Muhammad  Faisal', 0, 1, 22, '2022-09-20', '11:02:00', '11:04:00', 12, 12.77, 'tip', 'Paid in cash'),
(48, 12, '2022-09-21 01:10:02', '2022-09-21 01:10:02', NULL, 10, 200, 20, '2022-09-20', '10:00:00', '20:00:00', 20, 220.00, 'Bonus', NULL),
(49, 12, '2022-09-21 01:10:33', '2022-09-21 01:10:33', NULL, 10, 193, 20, '2022-09-20', '10:20:00', '20:00:00', 0, 193.33, NULL, NULL),
(50, 11, '2022-09-21 20:44:11', '2022-09-21 20:44:11', 'ISMAIL2', 4, 95599, 23412, '2022-09-21', '07:42:00', '11:47:00', 12, 95611.00, 'salary', 'Paid in cash'),
(51, 11, '2022-09-21 21:03:10', '2022-09-21 21:03:10', 'Muhammad', 3, 71407, 23412, '2022-09-21', '08:03:00', '11:06:00', 23, 71429.60, 'tip', 'Paid in cash'),
(52, 13, '2022-09-23 15:01:28', '2022-09-23 15:01:28', 'Jan', 8, 256, 32, '2022-09-23', '10:00:00', '18:00:00', 20, 276.00, 'Opinie', 'Paid in cash'),
(53, 13, '2022-09-23 15:02:00', '2022-09-23 15:02:00', 'Łukasz', 10, 200, 20, '2022-09-23', '10:00:00', '20:00:00', 0, 200.00, NULL, 'Paid in cash'),
(54, 13, '2022-09-23 15:03:13', '2022-09-23 15:03:13', 'Łukasz', 10, 200, 20, '2022-09-23', '10:00:00', '20:00:00', 100, 300.00, 'Opinie', 'Paid in cash'),
(55, 13, '2022-09-27 17:15:38', '2022-09-27 17:15:38', 'Jan', 1, 33, 32, '2022-09-27', '05:17:00', '06:18:00', 12, 44.53, 'tip', 'Paid in cash'),
(56, 13, '2022-09-27 17:17:40', '2022-09-27 17:17:40', 'Łukasz', 5, 629979979, 123123123, '2022-09-27', '06:19:00', '11:26:00', 12, 629979991.35, 'tip', NULL),
(57, 15, '2022-09-30 12:38:07', '2022-09-30 12:38:07', 'Łukasz', 7, 78, 10, '2022-09-30', '10:00:00', '17:45:00', 10, 87.50, 'opinie', NULL),
(58, 15, '2022-09-30 12:39:52', '2022-09-30 12:39:52', 'Łukasz', 7, 140, 20, '2022-09-30', '10:00:00', '17:00:00', 10, 150.00, 'Opinie', NULL),
(59, 15, '2022-10-01 03:06:59', '2022-10-01 03:06:59', 'Łukasz', 7, 225, 30, '2022-09-30', '10:00:00', '17:30:00', 0, 225.00, '0', NULL);

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
(63, 13, '2022-09-27', '2022-09-27 20:06:33', 'Łukasz', 'asdasd', 18, '2022-09-27', 'not download'),
(64, 13, '2022-09-27', '2022-09-27 20:13:21', 'Łukasz', 'AgroAsia 385SE', 234, '2022-09-27', 'not download'),
(65, 13, '2022-09-27', '2022-09-27 20:19:07', 'Łukasz', 'khalil', 18, '2022-09-27', 'not download'),
(66, 15, '2022-09-30', '2022-09-30 12:30:04', 'Łukasz', 'biedronka', 1000, '2022-09-25', 'not download'),
(67, 15, '2022-09-30', '2022-10-01 03:07:47', 'Łukasz', 'Lidl', 1000, '2022-09-30', 'download');

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
(28, 52, '2022-09-21', '/uploads/ExpenseFile/2022/September/g1dDNttzy6JohS1L20220921024444000000.pdf', '2022-09-21', '2022-09-21'),
(29, 54, '2022-09-27', '/uploads/ExpenseFile/2022/September/TmEphw59hdjwwyLH20220927102116000000.pdf', '2022-09-27', '2022-09-27'),
(30, 55, '2022-09-27', '/uploads/ExpenseFile/2022/September/nK64fxrCxdgZMdB520220927110236000000.docx', '2022-09-27', '2022-09-27'),
(31, 57, '2022-09-27', '/uploads/ExpenseFile/2022/September/QSdtZxGJmkClSUeU20220927111459000000.docx', '2022-09-27', '2022-09-27'),
(32, 58, '2022-09-27', '/uploads/ExpenseFile/2022/September/Ac0woUAA9hILMrQj20220927113018000000.docx', '2022-09-27', '2022-09-27'),
(33, 59, '2022-09-27', '/uploads/ExpenseFile/2022/September/sTz4PWhykGDTFa7T20220927125307000000.pdf', '2022-09-27', '2022-09-27'),
(34, 60, '2022-09-27', '/uploads/ExpenseFile/2022/September/n1YESJXZxgn5jpKj20220927012835000000.docx', '2022-09-27', '2022-09-27'),
(35, 61, '2022-09-27', '2022/September/Ms7nZAlMD2YflqaG20220927015423000000.docx', '2022-09-27', '2022-09-27'),
(36, 62, '2022-09-27', '2022/September/OwyaAiVQL2x1UCgU20220927015743000000.pdf', '2022-09-27', '2022-09-27'),
(37, 63, '2022-09-27', '2022/September/3QSJcevD6gUlTq0420220927020633000000.docx', '2022-09-27', '2022-09-27'),
(38, 64, '2022-09-27', '/uploads/ExpenseFile/2022/September/gSC0LrNUKGhtGequ20220927021321000000.docx', '2022-09-27', '2022-09-27'),
(39, 65, '2022-09-27', '/uploads/ExpenseFile/2022/September/D923HZT3AgZhycIv20220927021907000000.pdf', '2022-09-27', '2022-09-27'),
(40, 67, '2022-09-30', '/uploads/ExpenseFile/2022/September/gKOKjSBxlHsubRJZ20220930063241000000.pdf', '2022-09-30', '2022-09-30');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `description` text COLLATE utf8mb4_unicode_ci,
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
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(96, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(104, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(112, 1),
(114, 1),
(115, 1),
(116, 1),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(86, 4),
(87, 4),
(88, 4),
(89, 4),
(90, 4),
(91, 4),
(92, 4),
(93, 4),
(94, 4),
(95, 4),
(96, 4),
(97, 4),
(98, 4),
(99, 4),
(100, 4),
(101, 4),
(102, 4),
(103, 4),
(104, 4),
(105, 4),
(106, 4),
(107, 4),
(108, 4),
(109, 4),
(110, 4),
(111, 4),
(112, 4),
(113, 4),
(114, 4),
(115, 4),
(116, 4),
(117, 4),
(88, 8),
(90, 8),
(100, 8),
(104, 8),
(112, 8),
(116, 8);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
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
  `mother_name` text COLLATE utf8mb4_unicode_ci,
  `father_name` text COLLATE utf8mb4_unicode_ci,
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
(25, 66, NULL, NULL, '2022-09-16', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-16 17:03:33', '2022-09-16 17:03:33', '234234', NULL, '123', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL),
(26, 67, NULL, NULL, '2022-09-16', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-16 17:35:02', '2022-09-16 17:35:02', '234234', NULL, '123', '123', '123', '123', '1231', NULL, NULL, NULL, NULL, NULL),
(27, 68, NULL, NULL, NULL, 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-16 17:39:21', '2022-09-16 17:39:21', '234234', NULL, '234', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL),
(28, 69, NULL, NULL, '2022-09-18', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-19 01:13:22', '2022-09-19 01:13:22', '234234', NULL, '123', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL),
(29, 70, NULL, NULL, '2022-09-18', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-19 01:14:37', '2022-09-19 01:14:37', '234234', NULL, '123', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL),
(30, 71, NULL, NULL, '2022-09-19', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-19 22:38:46', '2022-09-19 22:38:46', '234234', NULL, '123', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL),
(31, 72, NULL, NULL, '2022-09-20', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-20 22:51:47', '2022-09-20 22:51:47', '234234', NULL, '123', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL),
(32, 73, NULL, NULL, '2022-09-20', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-20 22:28:37', '2022-09-20 22:28:37', '123', NULL, 'qwe', 'qwe', 'United Kingdom', 'qwe', 'qwe', NULL, NULL, NULL, NULL, NULL),
(33, 74, NULL, NULL, '2022-01-01', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-21 01:07:36', '2022-09-21 01:07:36', 'Gdynia', NULL, 'dsadasdas32131', '321312321', 'Poland', 'Celina', 'Zbigniew', NULL, NULL, NULL, NULL, NULL),
(34, 75, NULL, NULL, '2022-09-21', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-21 21:02:01', '2022-09-21 21:02:01', 'qwe', NULL, '123123', '123123123', 'adasd', 'asdasd', 'asdasd', NULL, NULL, NULL, NULL, NULL),
(35, 76, NULL, NULL, '1980-01-01', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-23 14:54:00', '2022-09-23 14:54:00', 'GFFDS', NULL, 'Q8932183', '321321', '321321', '321321', '321', NULL, NULL, NULL, NULL, NULL),
(36, 77, NULL, NULL, '2022-01-01', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-23 14:58:13', '2022-09-23 14:58:13', 'dsda', NULL, '321', '321', '3213', '321321', '3213', NULL, NULL, NULL, NULL, NULL),
(37, 78, NULL, NULL, '2022-08-29', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-29 16:23:08', '2022-09-29 16:23:08', '234234', NULL, '12323awd', '12121212121', 'pakistan', 'mother', 'father', NULL, NULL, NULL, NULL, NULL),
(38, 79, NULL, NULL, '2022-10-01', 'no_avatar.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-30 12:24:27', '2022-09-30 12:24:27', 'dsadsa', NULL, '312', '321', '321', '1321', '321', NULL, NULL, NULL, NULL, NULL);

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
  `can_see_upto_days` int(191) NOT NULL DEFAULT '2',
  `restaurant_id` int(11) DEFAULT NULL,
  `report_handler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_today` decimal(65,2) NOT NULL,
  `employee_salary_paid_today` decimal(65,2) NOT NULL,
  `date` date DEFAULT NULL,
  `status` decimal(65,0) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `created_at`, `updated_at`, `total_income`, `card_transactions`, `canceled_sale`, `supplier_cash`, `bank_cash_total`, `cash`, `can_see_upto_days`, `restaurant_id`, `report_handler`, `expense_today`, `employee_salary_paid_today`, `date`, `status`) VALUES
(76, '2022-09-20 21:31:27', '2022-09-20 21:31:27', 55499999.00, 522.00, 233.00, 40552.00, 11700.00, 55458325.00, 2, 9, 'Admin', '234.00', '133.00', '2022-09-20', '-55446625'),
(79, '2022-09-20 21:46:58', '2022-09-20 21:46:58', 341100000.00, 231.00, 12312.00, 40552.00, 77400.00, 341046538.00, 2, 7, 'Admin', '234.00', '133.00', '2022-09-20', '-340969138'),
(82, '2022-09-20 23:04:46', '2022-09-20 23:04:46', 12332000.00, 122.00, 123.00, 23423.00, 334700.00, 12307730.00, 2, 10, 'Muhammad Faisal1', '468.00', '134.00', '2022-09-20', '-11973030'),
(83, '2022-09-20 22:29:53', '2022-09-20 22:29:53', 234223212.00, 1231.00, 23.00, 23423.00, 4800.00, 234197933.00, 2, 11, 'Admin', '468.00', '134.00', '2022-09-20', '-234193133'),
(84, '2022-09-21 01:12:07', '2022-09-21 01:12:07', 1000.00, 200.00, 200.00, 0.00, 200.00, -1002.00, 2, 12, 'Jan', '1468.00', '134.00', '2022-09-20', '1202'),
(85, '2022-09-21 20:42:46', '2022-09-21 20:42:46', 123123.00, 123.00, 123.00, 0.00, 73800.00, 122877.00, 2, 11, 'ISMAIL2', '0.00', '0.00', '2022-09-21', '-49077'),
(86, '2022-09-23 15:04:06', '2022-09-23 15:04:06', 1000.00, 100.00, 100.00, 0.00, 200.00, -856.00, 2, 13, 'Jan', '1000.00', '656.00', '2022-09-23', '1056'),
(87, '2022-09-23 15:06:08', '2022-09-23 15:06:08', 1000.00, 100.00, 500.00, 0.00, 100.00, -1256.00, 2, 13, 'Jan', '1000.00', '656.00', '2022-09-23', '1356'),
(88, '2022-09-27 17:16:15', '2022-09-27 17:16:15', 123123.00, 12.00, 22.00, 0.00, 9650.00, 122726.00, 2, 13, 'Łukasz', '330.00', '33.00', '2022-09-27', '-113076'),
(89, '2022-09-27 17:16:35', '2022-09-27 17:16:35', 1111111111111111200.00, 12.00, 12.00, 0.00, 2400.00, 1111111111111110800.00, 2, 13, 'Łukasz', '330.00', '33.00', '2022-09-27', '-1111111111111108400'),
(90, '2022-09-29 18:09:48', '2022-09-29 18:09:48', 213123.00, 1231.00, 23.00, 0.00, 3600.00, 211869.00, 2, 13, 'Łukasz', '0.00', '0.00', '2022-09-29', '-208269'),
(91, '2022-09-30 12:48:01', '2022-09-30 12:48:01', 1000.00, 500.00, 100.00, 0.00, 200.00, -1600.00, 2, 15, 'Łukasz', '2000.00', '0.00', '2022-09-30', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `focalperson` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `see_cash_reports_days` int(191) DEFAULT '2',
  `active_for_this_restaurant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `created_at`, `updated_at`, `name`, `location`, `ranking`, `description`, `focalperson`, `see_cash_reports_days`, `active_for_this_restaurant`, `details`) VALUES
(15, '2022-09-30 12:18:09', '2022-09-30 12:55:43', 'Carte Dor', 'Gdynia', 1, NULL, NULL, 3, NULL, NULL),
(16, '2022-10-01 17:11:50', '2022-10-01 17:11:57', 'New Restaurant 1', 'north', 5, NULL, NULL, NULL, NULL, NULL);

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
(8, 66),
(8, 67),
(8, 68),
(8, 69),
(8, 70),
(8, 71),
(8, 72),
(8, 73),
(8, 74),
(8, 75),
(8, 76),
(8, 77),
(8, 78),
(8, 79);

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
  `payment` float DEFAULT '0',
  `paycheck` float DEFAULT '0',
  `ty_of_transaction` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cumulative` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safes`
--

INSERT INTO `safes` (`id`, `restaurant_id`, `created_at`, `updated_at`, `employee_complete_name`, `sum`, `date`, `date_of_deposited`, `date_of_withdrawal`, `payment`, `paycheck`, `ty_of_transaction`, `cumulative`) VALUES
(90, 9, '2022-09-19 22:39:33', '2022-09-19 22:39:33', '71', 23423, NULL, NULL, NULL, 23423, NULL, NULL, NULL),
(91, 9, '2022-09-19 22:39:41', '2022-09-19 22:39:41', '71', 23189, NULL, NULL, NULL, NULL, 234, NULL, NULL),
(92, 9, '2022-09-19 22:39:49', '2022-09-19 22:39:49', '71', 23312, NULL, NULL, NULL, 123, NULL, NULL, NULL),
(95, 7, '2022-09-19 22:40:51', '2022-09-19 22:40:51', '66', 10, NULL, NULL, NULL, 22, NULL, NULL, NULL),
(96, 7, '2022-09-19 22:58:50', '2022-09-19 22:58:50', 'Muhammad Faisal1', 23445, NULL, NULL, NULL, 23423, NULL, NULL, NULL),
(97, 7, '2022-09-19 22:58:59', '2022-09-19 22:58:59', 'Muhammad Faisal1', 22, NULL, NULL, NULL, NULL, 23423, NULL, NULL),
(99, 12, '2022-09-21 01:07:53', '2022-09-21 01:07:53', '74', 1000, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(100, 12, '2022-09-21 01:08:18', '2022-09-21 01:08:18', '74', 700, NULL, NULL, NULL, NULL, 300, NULL, NULL),
(101, 12, '2022-09-21 01:08:33', '2022-09-21 01:08:33', '74', 600, NULL, NULL, NULL, NULL, 100, NULL, NULL),
(103, 11, '2022-09-21 20:45:11', '2022-09-21 20:45:11', '73', -231, NULL, NULL, NULL, NULL, 231, NULL, NULL),
(104, 11, '2022-09-21 20:45:19', '2022-09-21 20:45:19', '73', -18, NULL, NULL, NULL, 213, NULL, NULL, NULL),
(105, 13, '2022-09-23 14:58:52', '2022-09-23 14:58:52', '76', 1000, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(106, 13, '2022-09-23 14:59:20', '2022-09-23 14:59:20', '77', 2000, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(108, 13, '2022-09-23 14:59:52', '2022-09-23 14:59:52', '76', 2400, NULL, NULL, NULL, NULL, 100, NULL, NULL),
(109, 13, '2022-09-27 17:14:09', '2022-09-27 17:14:09', '76', 3112, NULL, NULL, NULL, 1212, NULL, NULL, NULL),
(110, 13, '2022-09-27 17:14:28', '2022-09-27 17:14:28', '76', 791, NULL, NULL, NULL, NULL, 2321, NULL, NULL),
(111, 15, '2022-09-30 12:24:52', '2022-09-30 12:24:52', '79', 100, NULL, NULL, NULL, 100, NULL, NULL, NULL),
(113, 15, '2022-09-30 12:27:43', '2022-09-30 12:27:43', '79', 200, NULL, NULL, NULL, 100, NULL, NULL, NULL),
(114, 15, '2022-09-30 12:27:53', '2022-09-30 12:27:53', '79', 190, NULL, NULL, NULL, NULL, 10, NULL, NULL),
(115, 15, '2022-09-30 12:28:14', '2022-09-30 12:28:25', '79', 200, NULL, '2022-09-20', NULL, NULL, NULL, NULL, NULL);

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
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `created_at`, `updated_at`, `name`, `sum`, `date_of_order`, `date_of_delivery`, `restaurant_id`, `status`) VALUES
(11, '2022-09-19 22:37:33', '2022-09-23 14:55:22', 'UBER', '0.00', '2022-09-19', '2022-09-20', NULL, 1),
(13, '2022-09-21 20:52:37', '2022-09-23 14:55:38', 'BOLT', '0.00', '2022-09-21', NULL, NULL, 1),
(14, '2022-09-23 14:55:59', '2022-09-23 14:55:59', 'wolt', '0.00', '0001-01-01', '0001-01-01', 13, 1),
(15, '2022-09-29 18:10:50', '2022-09-29 18:10:50', 'AMMAR ENGINEERING', '234.00', '2022-09-29', NULL, 14, 1),
(16, '2022-09-30 12:44:26', '2022-09-30 12:44:26', 'Uber', '0.00', '2002-01-01', '2022-01-01', 15, 1),
(17, '2022-10-01 17:12:08', '2022-10-01 17:12:19', 'BOLT', NULL, NULL, NULL, 16, 1);

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
  `pieces` int(11) DEFAULT '0',
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
  `status` int(11) DEFAULT '1' COMMENT '1-active,2-banned',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `date_of_joining` date DEFAULT '2022-08-24',
  `date_of_leaving` date DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '23-2344234-12',
  `salary` double NOT NULL DEFAULT '23'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `restaurant_id`, `provider_id`, `provider`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `date_of_joining`, `date_of_leaving`, `telephone`, `salary`) VALUES
(1, 'Admin', '', 'admin@admin.com', '$2y$10$V.cftIsbXRceE.EI.HgZ8.l1JDt3K9tEftyD8aW53H8dgzRAhDgLi', 0, NULL, NULL, 1, NULL, '2020-07-17 15:23:06', '2022-09-12 19:21:23', NULL, '2020-07-17', '0000-00-00', '23-2344234-12', 45),
(3, 'Developer', '', 'dev@admin.com', '$2y$10$PWsYJJSFcNKGsnUclBBU9e9TiLBtfBuzUu3Cd2T6WmJOia6PeeL2S', 0, NULL, NULL, 1, NULL, '2020-07-17 16:39:44', '2020-07-17 16:39:45', NULL, '2020-09-19', '0000-00-00', '23-2344234-12', 45),
(66, 'Muhammad Faisal1', 'Qasim', 'Faisal1@admin.com', '$2y$10$4Yg6FkhnKGuSREKMKD.5/.qBdd/Y/JD2MAdTsZc4rDwTLmHV5LYWi', 7, NULL, NULL, 1, NULL, '2022-09-16 17:03:33', '2022-09-16 17:03:33', NULL, '2022-08-28', NULL, '2342424234', 123),
(67, 'Muhammad Faisal2', 'Qasim', 'Faisal2@admin.com', '$2y$10$W3KbX6Evf3BEwJ5LPKfQx.43zpuCF./Fa7EqDOfoPPjejPzUPHv/2', 7, NULL, NULL, 1, NULL, '2022-09-16 17:35:02', '2022-09-16 17:35:02', NULL, '2022-09-16', NULL, '2342424234', 3424),
(68, 'Muhammad Faisal Qasim', 'Qasim', 'Faisal3@admin.com', '$2y$10$wWlKwS0T21UPGzAxfcDfUe2gF2nsvhMCRZT3q4dx0sThmPApB7nXG', 7, NULL, NULL, 1, NULL, '2022-09-16 17:39:21', '2022-09-16 17:39:21', NULL, '2022-09-16', NULL, '2342424234', 123),
(69, 'Muhammad Faisal4', 'Qasim', 'Faisal4@admin.com', '$2y$10$Joj1ojPzQiS.8PC6c21QlOI4MltsoE0QD42svetBE6Q5iBMHixr/G', 7, NULL, NULL, 1, NULL, '2022-09-19 01:13:22', '2022-09-19 01:13:22', NULL, '2022-09-18', NULL, '2342424234', 123),
(70, 'Muhammad Faisal4', 'Qasim', 'Faisal5@admin.com', '$2y$10$.U7oiQsPtrCt34/N405OI.ZbS9cSq8TiybzzAMKTF6jsrV3bla.Aa', 7, NULL, NULL, 1, NULL, '2022-09-19 01:14:37', '2022-09-19 01:14:37', NULL, '2022-09-18', NULL, '2342424234', 123),
(71, 'Muhammad Faisal8', 'Qasim', 'Faisal8@admin.com', '$2y$10$ZkGbupkaQRxeqlH4bm7KtuT3v2V.W7c1krKWhm/jTV2CnWHxC6sYq', 9, NULL, NULL, 1, NULL, '2022-09-19 22:38:46', '2022-09-19 22:38:46', NULL, '2022-09-19', '2022-09-21', '2342424234', 123),
(72, 'Muhammad  Faisal', 'Qasim', 'Faisal34@admin.com', '$2y$10$DoPeqQLX9zkOfYVtznHXx.5z6aG9Sg0KfZqx5gFFYOOVwI2v0ZdYW', 10, NULL, NULL, 1, NULL, '2022-09-20 22:51:46', '2022-09-20 22:51:46', NULL, '2022-09-20', '2022-09-20', '2342424234', 234),
(73, 'ISMAIL2', 'REHMAN', 'ISMAIL2@admin.com', '$2y$10$vLGxsdNcbcM8ZYDKZdkEmeBxuPdK/iYKDdt9Pnz3icOIphNSTDUfC', 11, NULL, NULL, 1, NULL, '2022-09-20 22:28:37', '2022-09-20 22:28:37', NULL, '2022-09-20', '2022-09-20', '7911123456', 23412),
(74, 'Jan', 'Kowalski', 'admin@admin.com2', '$2y$10$mRdM6Su/IySKFMgP2LE68uUVhKOh8LmSz9tDrASgqfhZVYcoKCqeS', 12, NULL, NULL, 1, NULL, '2022-09-21 01:07:36', '2022-09-21 01:07:36', NULL, '0001-01-01', '2022-12-31', '791555588', 20),
(75, 'Muhammad', 'Qasim', 'Muhammad@admin.com', '$2y$10$5sG2CjVeJzFTo7x/MZ4uKOqRp1O882zrUtTFIx8uWJ/qiC8Vrdi2m', 11, NULL, NULL, 1, NULL, '2022-09-21 21:02:01', '2022-09-21 21:02:01', NULL, '2022-09-21', '2022-09-21', '2342424234', 23),
(76, 'Łukasz', 'PIetryszyn', 'admin@admin.coms', '$2y$10$ePVfjMzZnZzjz/U8z2LiUOJgwBMYQJgk9.uD8Son1SVmT1hH0spjq', 13, NULL, NULL, 1, NULL, '2022-09-23 14:54:00', '2022-09-23 14:54:00', NULL, '2020-09-10', '2022-12-31', '509182580', 20),
(77, 'Jan', 'Nowak', 'admin@admin33.com', '$2y$10$n.x5aHFeDlph3hR60CzbNOOfLgqmxoXA0vu0rlb85AZCyF9Bx.L0O', 13, NULL, NULL, 1, NULL, '2022-09-23 14:58:13', '2022-09-23 14:58:13', NULL, '2022-10-09', '2022-09-01', '321321', 32),
(78, 'Muhammad2', 'Qasim', 'Muhammad2@admin.com', '$2y$10$7DqvFDZkaWiNYQ3t6F28M.bDOYLYTw5/L2DCSbDHzqvQy7Ha5VtgS', 14, NULL, NULL, 1, NULL, '2022-09-29 16:23:08', '2022-09-29 16:23:08', NULL, '2022-09-29', NULL, '2342424234', 254),
(79, 'Łukasz', 'PIetryszyn', 'admin@admin3.com', '$2y$10$KwC.Eoy4q2DHB.8binuJZ.Lwm8zweIpNlEkQnLQKTI./TRXHx/UJ.', 15, NULL, NULL, 1, NULL, '2022-09-30 12:24:27', '2022-09-30 12:24:27', NULL, '2000-10-10', NULL, '509182580', 321),
(80, 'ISMAIL', 'REHMAN', 'ISMAIL1@admin.com', NULL, NULL, NULL, NULL, 1, NULL, '2022-10-01 17:13:23', '2022-10-01 17:13:23', NULL, '2022-08-24', NULL, '23-2344234-12', 23);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `expense_file`
--
ALTER TABLE `expense_file`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `safes`
--
ALTER TABLE `safes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
