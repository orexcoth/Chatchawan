-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 10:41 AM
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
-- Database: `chatchawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(11) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `part` varchar(255) NOT NULL,
  `log_user` int(11) NOT NULL,
  `event` longtext NOT NULL,
  `remark` longtext DEFAULT NULL,
  `ref` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `part`, `log_user`, `event`, `remark`, `ref`, `created_at`, `updated_at`) VALUES
(1, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-23 10:48:43', '2023-09-23 10:48:43'),
(2, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-23 14:52:11', '2023-09-23 14:52:11'),
(3, 'BACKEND', 1, 'logout', 'User 1 Logout from Backend!', 'midone@left4code.com', '2023-09-23 15:15:02', '2023-09-23 15:15:02'),
(4, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-23 15:15:06', '2023-09-23 15:15:06'),
(5, 'BACKEND', 1, 'logout', 'User 1 Logout from Backend!', 'midone@left4code.com', '2023-09-23 16:49:58', '2023-09-23 16:49:58'),
(6, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-23 16:50:02', '2023-09-23 16:50:02'),
(7, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-24 07:45:03', '2023-09-24 07:45:03'),
(8, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-24 19:18:41', '2023-09-24 19:18:41'),
(9, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-09-25 03:36:38', '2023-09-25 03:36:38'),
(10, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-25 07:16:28', '2023-09-25 07:16:28'),
(11, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-26 02:28:24', '2023-09-26 02:28:24'),
(12, 'BACKEND', 1, 'login', 'User 1 Login to Backend!', 'midone@left4code.com', '2023-09-26 07:25:17', '2023-09-26 07:25:17'),
(13, 'BACKEND', 1, 'logout', 'User 1 Logout from Backend!', 'midone@left4code.com', '2023-09-26 07:50:58', '2023-09-26 07:50:58'),
(14, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-09-26 07:51:03', '2023-09-26 07:51:03'),
(15, 'BACKEND', 4, 'create category', 'User 4 Create new Category!', '1', '2023-09-26 08:01:20', '2023-09-26 08:01:20'),
(16, 'BACKEND', 4, 'create category', 'User 4 Create new Category!', '2', '2023-09-26 08:01:56', '2023-09-26 08:01:56'),
(17, 'BACKEND', 4, 'create category', 'User 4 Create new Category!', '3', '2023-09-26 08:02:14', '2023-09-26 08:02:14'),
(18, 'BACKEND', 4, 'create category', 'User 4 Create new Category!', '4', '2023-09-26 08:02:40', '2023-09-26 08:02:40'),
(19, 'BACKEND', 4, 'create category', 'User 4 Create new Category!', '5', '2023-09-26 08:03:01', '2023-09-26 08:03:01'),
(20, 'BACKEND', 4, 'update category', 'User 4 Update Category!', '3', '2023-09-26 08:03:12', '2023-09-26 08:03:12'),
(21, 'BACKEND', 4, 'create user', 'User 4 Create new User!', '7', '2023-09-26 08:06:15', '2023-09-26 08:06:15'),
(22, 'BACKEND', 4, 'update profile', 'User 4 Update Profile!', '4', '2023-09-26 09:53:31', '2023-09-26 09:53:31'),
(23, 'BACKEND', 4, 'update profile', 'User 4 Update Profile!', '4', '2023-09-26 10:50:03', '2023-09-26 10:50:03'),
(24, 'BACKEND', 4, 'update profile', 'User 4 Update Profile!', '4', '2023-09-26 10:50:17', '2023-09-26 10:50:17'),
(25, 'BACKEND', 4, 'update profile', 'User 4 Update Profile!', '4', '2023-09-26 10:50:33', '2023-09-26 10:50:33'),
(26, 'BACKEND', 7, 'login', 'User 7 Login to Backend!', 'sedthasak@ots.co.th', '2023-09-27 09:09:12', '2023-09-27 09:09:12'),
(27, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-09-28 07:02:47', '2023-09-28 07:02:47'),
(28, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-10-03 08:15:51', '2023-10-03 08:15:51'),
(29, 'FRONTEND', 22, 'update profile', 'User 22 Update Profile!', '-', '2023-10-03 08:16:24', '2023-10-03 08:16:24'),
(30, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-10-03 10:29:16', '2023-10-03 10:29:16'),
(31, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-10-03 19:02:28', '2023-10-03 19:02:28'),
(32, 'BACKEND', 7, 'login', 'User 7 Login to Backend!', 'sedthasak@ots.co.th', '2023-10-04 03:16:07', '2023-10-04 03:16:07'),
(33, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-10-04 15:05:50', '2023-10-04 15:05:50'),
(34, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-10-11 18:48:44', '2023-10-11 18:48:44'),
(35, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-10-18 13:46:08', '2023-10-18 13:46:08'),
(36, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-10-19 04:00:58', '2023-10-19 04:00:58'),
(37, 'BACKEND', 6, 'login', 'User 6 Login to Backend!', 'admin@rodpromptkai.com', '2023-10-19 04:46:26', '2023-10-19 04:46:26'),
(38, 'BACKEND', 6, 'create user', 'User 6 Create new User!', '8', '2023-10-19 04:47:12', '2023-10-19 04:47:12'),
(39, 'BACKEND', 8, 'login', 'User 8 Login to Backend!', 'support@rodpromptkai.com', '2023-10-26 04:19:05', '2023-10-26 04:19:05'),
(40, 'BACKEND', 8, 'login', 'User 8 Login to Backend!', 'support@rodpromptkai.com', '2023-10-27 04:42:38', '2023-10-27 04:42:38'),
(41, 'BACKEND', 8, 'login', 'User 8 Login to Backend!', 'support@rodpromptkai.com', '2023-10-31 14:19:27', '2023-10-31 14:19:27'),
(42, 'BACKEND', 7, 'login', 'User 7 Login to Backend!', 'sedthasak@ots.co.th', '2023-11-09 03:24:28', '2023-11-09 03:24:28'),
(43, 'FRONTEND', 22, 'update profile', 'User 22 Update Profile!', '-', '2023-11-16 04:04:24', '2023-11-16 04:04:24'),
(44, 'FRONTEND', 22, 'update profile', 'User 22 Update Profile!', '-', '2023-11-16 04:05:17', '2023-11-16 04:05:17'),
(45, 'BACKEND', 7, 'login', 'User 7 Login to Backend!', 'sedthasak@ots.co.th', '2023-11-17 04:39:34', '2023-11-17 04:39:34'),
(46, 'BACKEND', 7, 'login', 'User 7 Login to Backend!', 'sedthasak@ots.co.th', '2023-11-17 09:44:25', '2023-11-17 09:44:25'),
(47, 'BACKEND', 7, 'login', 'User 7 Login to Backend!', 'sedthasak@ots.co.th', '2023-11-20 09:45:36', '2023-11-20 09:45:36'),
(48, 'BACKEND', 4, 'create user', 'User 4 Create new User!', '9', '2023-11-23 02:45:07', '2023-11-23 02:45:07'),
(49, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-19 04:29:18', '2023-12-19 04:29:18'),
(50, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2023-12-19 04:32:23', '2023-12-19 04:32:23'),
(51, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-19 04:32:32', '2023-12-19 04:32:32'),
(52, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2023-12-19 04:51:57', '2023-12-19 04:51:57'),
(53, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-19 04:52:14', '2023-12-19 04:52:14'),
(54, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2023-12-19 04:52:29', '2023-12-19 04:52:29'),
(55, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-19 04:52:35', '2023-12-19 04:52:35'),
(56, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-19 06:21:59', '2023-12-19 06:21:59'),
(57, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2023-12-19 06:22:06', '2023-12-19 06:22:06'),
(58, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-19 06:44:48', '2023-12-19 06:44:48'),
(59, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-20 06:55:48', '2023-12-20 06:55:48'),
(60, 'BACKEND', 4, 'update user', 'User 4 Update User!', '4', '2023-12-20 08:33:18', '2023-12-20 08:33:18'),
(61, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2023-12-20 08:33:39', '2023-12-20 08:33:39'),
(62, 'BACKEND', 6, 'login', 'User 6 Login to Backend!', 'admin@signature.com', '2023-12-20 08:33:48', '2023-12-20 08:33:48'),
(63, 'BACKEND', 6, 'logout', 'User 6 Logout from Backend!', 'admin@signature.com', '2023-12-20 08:35:26', '2023-12-20 08:35:26'),
(64, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-20 08:37:02', '2023-12-20 08:37:02'),
(65, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2023-12-20 08:53:28', '2023-12-20 08:53:28'),
(66, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-20 08:53:33', '2023-12-20 08:53:33'),
(67, 'BACKEND', 6, 'login', 'User 6 Login to Backend!', 'admin@signature.com', '2023-12-20 08:59:28', '2023-12-20 08:59:28'),
(68, 'BACKEND', 6, 'logout', 'User 6 Logout from Backend!', 'admin@signature.com', '2023-12-20 09:25:29', '2023-12-20 09:25:29'),
(69, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-20 12:21:12', '2023-12-20 12:21:12'),
(70, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2023-12-20 12:35:03', '2023-12-20 12:35:03'),
(71, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-20 12:35:13', '2023-12-20 12:35:13'),
(72, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2023-12-26 02:57:07', '2023-12-26 02:57:07'),
(73, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-01-18 08:56:57', '2024-01-18 08:56:57'),
(74, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-01-23 07:26:53', '2024-01-23 07:26:53'),
(75, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-01-23 09:49:01', '2024-01-23 09:49:01'),
(76, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-01-29 06:26:45', '2024-01-29 06:26:45'),
(77, 'BACKEND', 4, 'update user', 'User 4 Update User!', '6', '2024-01-29 06:55:01', '2024-01-29 06:55:01'),
(78, 'BACKEND', 4, 'create user', 'User 4 Create new User!', '10', '2024-01-29 10:11:05', '2024-01-29 10:11:05'),
(79, 'BACKEND', 4, 'update user', 'User 4 Update User!', '10', '2024-01-29 10:12:11', '2024-01-29 10:12:11'),
(80, 'BACKEND', 4, 'update user', 'User 4 Update User!', '10', '2024-01-29 10:12:28', '2024-01-29 10:12:28'),
(81, 'BACKEND', 4, 'create user', 'User 4 Create new User!', '11', '2024-01-29 10:44:55', '2024-01-29 10:44:55'),
(82, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-01 07:10:21', '2024-02-01 07:10:21'),
(83, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2024-02-01 07:11:26', '2024-02-01 07:11:26'),
(84, 'BACKEND', 6, 'login', 'User 6 Login to Backend!', 'admin@signature.com', '2024-02-01 07:11:36', '2024-02-01 07:11:36'),
(85, 'BACKEND', 6, 'logout', 'User 6 Logout from Backend!', 'admin@signature.com', '2024-02-01 07:11:43', '2024-02-01 07:11:43'),
(86, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-01 07:11:48', '2024-02-01 07:11:48'),
(87, 'BACKEND', 4, 'create user', 'User 4 Create new User!', '12', '2024-02-01 07:13:43', '2024-02-01 07:13:43'),
(88, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-01 08:48:03', '2024-02-01 08:48:03'),
(89, 'BACKEND', 4, 'update user', 'User 4 Update User!', '12', '2024-02-01 10:30:43', '2024-02-01 10:30:43'),
(90, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-02 11:04:29', '2024-02-02 11:04:29'),
(91, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-02 15:06:41', '2024-02-02 15:06:41'),
(92, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-07 14:43:35', '2024-02-07 14:43:35'),
(93, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-11 08:28:51', '2024-02-11 08:28:51'),
(94, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-14 12:05:23', '2024-02-14 12:05:23'),
(95, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-02-21 14:48:05', '2024-02-21 14:48:05'),
(96, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-03-06 16:24:45', '2024-03-06 16:24:45'),
(97, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-03-07 02:44:40', '2024-03-07 02:44:40'),
(98, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-03-07 07:01:10', '2024-03-07 07:01:10'),
(99, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-03-11 06:26:17', '2024-03-11 06:26:17'),
(100, 'BACKEND', 4, 'login', 'User 4 Login to Backend!', 'kk.supernova00@gmail.com', '2024-03-11 09:17:59', '2024-03-11 09:17:59'),
(101, 'BACKEND', 4, 'create user', 'User 4 Create new User!', '13', '2024-03-11 09:18:53', '2024-03-11 09:18:53'),
(102, 'BACKEND', 4, 'logout', 'User 4 Logout from Backend!', 'kk.supernova00@gmail.com', '2024-03-11 09:20:05', '2024-03-11 09:20:05'),
(103, 'BACKEND', 13, 'login', 'User 13 Login to Backend!', 'admin@orange.com', '2024-03-11 09:20:11', '2024-03-11 09:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_22_133159_create_customer_table', 2),
(6, '2023_09_22_133228_create_smsreceived_table', 2),
(7, '2023_09_22_133245_create_news_table', 2),
(8, '2023_09_22_133256_create_logs_table', 2),
(9, '2023_09_22_133322_create_brands_table', 2),
(10, '2023_09_22_133336_create_models_table', 2),
(11, '2023_09_22_133354_create_categories_table', 2),
(12, '2023_09_22_133407_create_tags_table', 2),
(13, '2023_09_22_133517_create_contacts_table', 2),
(14, '2023_09_22_133535_create_contacts_back_table', 2),
(15, '2023_09_22_133557_create_cars_table', 2),
(16, '2023_09_22_133614_create_ads_table', 2),
(17, '2023_09_22_133627_create_carprice_table', 2),
(18, '2023_09_22_143104_create_gallery_table', 2),
(19, '2023_09_27_170455_create_notice_table', 3),
(20, '2023_10_18_204746_create_generations_table', 3),
(21, '2023_10_18_204817_create_sub_models_table', 3),
(22, '2024_01_26_124921_create_customers_table', 4),
(23, '2024_01_26_124921_create_names_table', 4),
(24, '2024_01_26_124922_create_contacts_table', 5),
(25, '2024_01_26_124925_create_commissions_table', 5),
(26, '2024_01_26_124922_create_signs_table', 6),
(27, '2024_01_26_124923_create_sells_table', 7),
(28, '2024_01_26_124923_create_sells_names_table', 8),
(29, '2024_01_26_124924_create_sells_combos_table', 9),
(30, '2024_01_26_124924_create_downloads_table', 10),
(31, '2024_01_26_124921_create_articles_table', 11),
(32, '2024_01_26_124925_create_suggests_table', 12),
(33, '2024_01_26_124926_create_orders_table', 13),
(34, '2024_01_26_124926_create_works_table', 14),
(35, '2024_02_02_135300_create_options_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_key` longtext NOT NULL,
  `option_value` longtext NOT NULL,
  `setting` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_key`, `option_value`, `setting`, `created_at`, `updated_at`) VALUES
(1, 'price_th', '45', NULL, NULL, '2024-02-02 07:45:35'),
(2, 'price_en', '55', NULL, NULL, '2024-02-02 07:45:35');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` longtext DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `photo`, `gender`, `active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'kongphopots', 'kk.supernova00@gmail.com', NULL, '$2y$10$IrRRfqCwr9jDA6PIZoZVju/ZbO4y442cmIGF4tQmuTR3lL2rt1q8W', 'admin', 'uploads/photo/1703061198-6582a6ce03929.jpg', 'male', 1, NULL, NULL, '2023-09-24 20:02:09', '2023-12-20 08:33:18'),
(13, 'admin', 'admin@orange.com', NULL, '$2y$10$SpuGKRdiUZcDxjScE85MuOz7gE82dJTDkSMpLUitXW0JlZ1Sortz2', 'admin', 'uploads/photo/1710148733.jpg', NULL, NULL, NULL, NULL, '2024-03-11 09:18:53', '2024-03-11 09:18:53');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
