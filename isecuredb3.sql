-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2025 at 05:47 PM
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
-- Database: `isecuredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_audit_logs`
--

CREATE TABLE `admin_audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `action` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_audit_logs`
--

INSERT INTO `admin_audit_logs` (`id`, `user_id`, `action`, `ip_address`, `user_agent`, `created_at`) VALUES
(15, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-17 03:43:00'),
(16, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-17 08:32:00'),
(17, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-17 23:16:40'),
(18, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 00:18:10'),
(19, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 01:21:52'),
(20, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 01:23:00'),
(21, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 01:24:17'),
(22, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 02:43:05'),
(23, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 12:16:47'),
(24, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 12:24:06'),
(25, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 12:24:34'),
(26, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 12:34:50'),
(27, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-18 12:36:32'),
(28, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:07:47'),
(29, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:07:58'),
(30, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:08:08'),
(31, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:39:09'),
(32, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:39:18'),
(33, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:39:58'),
(34, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:41:42'),
(35, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:42:58'),
(36, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 00:43:30'),
(37, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 01:48:33'),
(38, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 02:50:05'),
(39, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 03:50:20'),
(40, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 04:22:28'),
(41, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 04:24:43'),
(42, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 04:24:49'),
(43, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 04:25:43'),
(44, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 05:28:36'),
(45, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 06:32:44'),
(46, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 06:58:53'),
(47, 'natnat@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 06:59:02'),
(48, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 07:08:09'),
(49, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 08:13:36'),
(50, '68bd277dc08a7', 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-19 08:43:27'),
(51, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 03:31:50'),
(52, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 06:43:48'),
(53, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 06:43:50'),
(54, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 06:43:54'),
(55, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:13:37'),
(56, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:15:06'),
(57, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:19:53'),
(58, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:19:57'),
(59, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:22:16'),
(60, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:22:27'),
(61, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:23:28'),
(62, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:23:32'),
(63, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:25:17'),
(64, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:25:38'),
(65, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:28:09'),
(66, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:28:35'),
(67, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:29:18'),
(68, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:29:21'),
(69, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:30:37'),
(70, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:31:05'),
(71, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:33:06'),
(72, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:38:43'),
(73, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:38:46'),
(74, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:38:51'),
(75, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:38:54'),
(76, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:41:40'),
(77, 'it11', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:41:58'),
(78, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:43:02'),
(79, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:46:30'),
(80, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 08:47:13'),
(81, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-20 09:48:12'),
(82, '', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:21:02'),
(83, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:21:37'),
(84, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:22:23'),
(85, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:22:37'),
(86, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:22:50'),
(87, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:24:03'),
(88, 'admin@example.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:24:13'),
(89, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 09:24:51'),
(90, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 10:27:05'),
(91, '', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 10:43:41'),
(92, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 10:43:54'),
(93, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 01:42:30'),
(94, '', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 02:07:34'),
(95, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 02:07:52'),
(96, 'admin@gmail.com', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 03:10:08'),
(97, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 03:10:24'),
(98, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 12:15:43'),
(99, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 13:30:00'),
(100, '', 'Failed login attempt', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 14:25:25'),
(101, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 14:25:55'),
(102, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 14:34:43'),
(103, '68bd277dc08a7', 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-26 15:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `id` char(36) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `rank` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `role` text DEFAULT NULL,
  `password_hash` text DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `last_active` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_users`
--

INSERT INTO `deleted_users` (`id`, `full_name`, `email`, `rank`, `status`, `role`, `password_hash`, `joined_date`, `last_active`, `deleted_at`) VALUES
('22fe8a92-950c-11f0-a23b-b0dcefd6f94c', 'ZHoFtDPZ+ugqUCBGXrpkuRj1X4CZz1A38eBhmZjdYvXsPu5qslAI+r4cYNQUhmOAkKH1QpZhst6o44VHtXqYwvjsxFgzXMaKYFc4lidXwlaBBb5zQe18eZwW5fOZ+qt4iMnrE/D4vDPx/kCcRm5r+g==', 'lGPGsKCtBrfyYMAUqQpgJDAQRMT2aVh4XCOt8eGzB0iZvFX5YE43Vafma131dRBc7C3PgK2vW+/Jw727iIKWZanXONvR+5stU3WxQxxmZ1uWIxIoPofzbFJjAA4WFx86IF9ecQy+DRKS3mPPQO47KA==', '2CI2zNNO+Yw1TeWfbZJ2mxsNpB6faJhMF6elFpWfeUIox5GdWujk7OiafUJMAth22KzLvJPRA/ocFmpdf3LVunAcg/aIvH/EZ6e9oOlK/Uw=', 'kXZWsEw0LQXruHYj2FBCQcF/BMyC9BjKPoO6Bufz8Pc=', 'dqH83w+G1PpO8ie/ZSHcLUpA0dQ2I8Ul2qq5XmjcZWE=', '$2y$10$jw1tow7PdSGpGC2OdACTr.8niaiieXFST3fSEdyI0atiCSep3Za6S', '2025-09-19 11:53:00', '2025-09-19 11:53:00', '2025-09-19 13:44:15'),
('40f8f789-951c-11f0-a23b-b0dcefd6f94c', '7r0qSRKZV6uidi7BnHx4lxipp6g5QhptRRFHnZ5D7TK+FFiqQfa9re7AGRmXNhFmKi0xxaSUrn5IpAlLiq4eEsFkUjs+WbfA4+s7uSUNcCk=', 'GID3QvJehdoQUrsotmoB1sYUUb+TismRT9gOgrKtY3430erwUFrZ2VuURdclFkgo4ncUjz7ScvzISTgRE4Cg7kFm3I7O3wZlj55uI3wPt9Tbob6wRwla1/EIIeBJnm4HTMQDzoyug65vMp0hFAbRmg==', 'EXtADybMJZ0KTaYxxRltnipenHG25kUu/119v+JYTha9XnluVEVh9AfKYrSXA0UvWwnUrIeQ2XyImSS1JlbuvyTiZLtCmDZguML0Y3+llNM=', 'YrL5nwRe0M+DDMiNwALlGCL9rxYa8FswLDcmrqs8brQ=', 'R5Nm36ajpfQoF0vNvs36hf7XP6NboS9PxSRk1GG4u5g=', '$2y$10$LRsb0rOp687W0f8.VOmYMe2zWaehwu4zfMg.sAt50heoL/YQQzyWu', '2025-09-19 13:48:23', '2025-09-19 13:48:23', '2025-09-19 15:10:30'),
('9a4e3867-9527-11f0-a23b-b0dcefd6f94c', 'YJw4w+6JANm91E1cbq8E2oxw3mil6GVcp5mzASEasr246AzeEjQHJbzP9ynbchVSD56DWWWqJQhsfSsPCnPw1g==', 'UPERHSnr9g7gnY8Xrks2YTJvFKU8z46T28NtC6c3uQKrpQ/IHm9Y7ECuxdPh0b0KzEfdyiNFi/qYbDPVOR26E9qWdm8+PyWGZC6qjZGnxGTAypVj6KZGV+g3IV/UiMYR', 'J/F7n5TwbUxZDP4gLnybTzpWw9hr75Ax3nOrpTafdJ6mZCqb3A1fjtdkqJxtWyIu8mchG9goUd3swnXOxz9zlQ==', 'ctEW0oaVsVgPXT0z3BKei44Hmme6XGoDBjo92DJKipY=', '2FuBP9J75zR5s6FL4Daocd5y6X3LOasceBAgDWLakus=', '$2y$10$i0kfedDlUSYuaxgTjH6I4eOV0Pu09GKoTO.rgS8LhYYa.BDwY9Zh6', '2025-09-19 15:09:37', '2025-09-19 15:09:37', '2025-09-19 15:10:23'),
('ddf937e9-9527-11f0-a23b-b0dcefd6f94c', 'Qz5PUFIKP8TlmzPJ519QBvu+BW4fwpccneKY3VFZ8v256wuGknaxNdxmA7aATx/vbzDHDX50tE5C3EJH6RGOfrdOvMzuZla9JVR9wcqacpC+Q5L60mrnUbrfaIE1Mjv/', 'slv8JX3guX3i33cVMSJuYb/bF/qY/xa6Y6i+41fWMiBdpvtBDPnFoS/yoDZ56fnxhQenkOo+vhw7eQetOHhzi9YjFPT2O4bsm9MJTti3yh9IgFKb4OkgNJx9CFWcxln8', 'aPYsVD6sFLBRLMgkTVu5OzlmL20toOoe6reMFMQMM5TwxxFne5fJvh4+6VgQ2ONfA/kzHQ1/lFKFiL2Try/+AQ==', 'QG+ZBW8hXuKzyVlqndX4aso8gNSaRSxtAByPaZxRQgQ=', 'R5WmJtHJUVRpNbDwaX5a0NIOCxJuMayjf4NkRJetWS4=', '$2y$10$viT3H34sThY5kJemIuR7nuhx1ivCb5oadenDPJ2Vvfq0HjHRJdCEy', '2025-09-19 15:11:30', '2025-09-19 15:11:30', '2025-09-19 15:12:20'),
('eed2c20f-9523-11f0-a23b-b0dcefd6f94c', 'b0XgoZqhVZoWu7ojJxtDw4lf41xgfdIZZsIqYvprLUEgcJIzs2odmN26dI1sD7/SXJ/eOeq7L7oR8UA7yz5uEA==', 'MBGUoiRwKpz01aUI34GxrMJReaZTT8KlpUagwrFXRdLxC0jpCHdMJBmStxt5DzSyRgfRkRHCZ2nZ+cQa2mSrXNtkFS+g22vTIuZ3dk78pCrRxh05GQNxqse9U6WUaRFg', 'U4XVh1aJFdbrbaq3bvyFvQKbBJZe4s9fQGkwIZvw9D3VhMrQNFcIaPt3y/E0/VSoJ83OjNF787c+Fqshkcy3KA==', 'TuPSEazHXMYxpTRqzsVjb/aEy1d8KeNJRnNSjeqVgLQ=', 'Hqim8yDFxGzYB+zzLxvfJcwW/U93aJrtSdfUrEGvH0k=', '$2y$10$SytvfTf8kVpQIZwUEFpQx.8.sxGEeqoDRWMGK4ZSekrlwJYiVRvDa', '2025-09-19 14:43:21', '2025-09-19 14:43:21', '2025-09-19 15:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `landing_about_us`
--

CREATE TABLE `landing_about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landing_about_us`
--

INSERT INTO `landing_about_us` (`id`, `title`, `content`) VALUES
(1, 'About Us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut fermentum aliquet odio, eu ornare sem tempor vel. Sed nibh turpis, malesuada a blandit ut, posuere sit amet urna. Vestibulum sit amet velit sem. In hendrerit euismod diam, nec ullamcorper magna ultrices id. Pellentesque sollicitudin neque nisl, ac posuere neque efficitur a. Aenean turpis nunc, scelerisque vel tellus sed, porta efficitur eros. Mauris ullamcorper ligula eget lorem feugiat, quis finibus nibh molestie. Curabitur tortor velit, ultricies non hendrerit facilisis, venenatis et augue. Sed consequat, elit ut blandit posuere, ante magna iaculis erat, vel blandit tortor orci at lacus. Duis ac enim interdum, condimentum turpis sed, fringilla leo. Proin eu vestibulum tortor. Aliquam erat volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.');

-- --------------------------------------------------------

--
-- Table structure for table `landing_audit_logs`
--

CREATE TABLE `landing_audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `action` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landing_audit_logs`
--

INSERT INTO `landing_audit_logs` (`id`, `user_id`, `action`, `ip_address`, `user_agent`, `created_at`) VALUES
(5, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 06:55:59'),
(6, NULL, 'Submitted visitation request form', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 06:56:47'),
(7, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 06:57:05'),
(8, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 06:59:10'),
(9, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:25:27'),
(10, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:27:45'),
(11, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:29:13'),
(12, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:29:29'),
(13, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:29:42'),
(14, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:29:44'),
(15, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:30:51'),
(16, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:31:14'),
(17, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:32:12'),
(18, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:35:54'),
(19, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:37:31'),
(20, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:38:08'),
(21, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:44:14'),
(22, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:44:44'),
(23, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:45:14'),
(24, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:46:13'),
(25, '2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-15 07:46:57'),
(26, '7566a21a0c3ecf9e13c5ceeae425b44d0ebf0e47e056ac2dedb9ef79dfd7e4f8', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-17 08:28:47'),
(27, '7566a21a0c3ecf9e13c5ceeae425b44d0ebf0e47e056ac2dedb9ef79dfd7e4f8', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-17 08:31:16'),
(28, '7566a21a0c3ecf9e13c5ceeae425b44d0ebf0e47e056ac2dedb9ef79dfd7e4f8', 'Visited landing page', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-17 08:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `landing_carousel`
--

CREATE TABLE `landing_carousel` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption_title` varchar(100) DEFAULT NULL,
  `caption_text` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landing_carousel`
--

INSERT INTO `landing_carousel` (`id`, `image_path`, `caption_title`, `caption_text`, `sort_order`) VALUES
(1, '..\\iSecure - final\\images\\carousel-img1.jpg', NULL, NULL, 0),
(2, '..\\iSecure - final\\images\\carousel-img2.jpg', NULL, NULL, 0),
(3, '..\\iSecure - final\\images\\carousel-img3.jpg', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `landing_vision_mission`
--

CREATE TABLE `landing_vision_mission` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `link_url` varchar(255) DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landing_vision_mission`
--

INSERT INTO `landing_vision_mission` (`id`, `title`, `image_path`, `link_url`) VALUES
(1, 'Vision', '..\\iSecure - final\\images\\Vision - Image.jpg', '#'),
(2, 'Mission', '..\\iSecure - final\\images\\Mission - Image.jpg', '#');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `plate_number` varchar(20) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `logged_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_carousel`
--

CREATE TABLE `news_carousel` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_carousel`
--

INSERT INTO `news_carousel` (`id`, `image_path`, `created_at`) VALUES
(1, '..\\iSecure - final\\images\\news-carousel1.jpg', '2025-09-13 05:42:30'),
(2, '..\\iSecure - final\\images\\news-carousel2.jpg', '2025-09-13 05:42:30'),
(3, '..\\iSecure - final\\images\\news-carousel3.jpg', '2025-09-13 05:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `news_headlines`
--

CREATE TABLE `news_headlines` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_headlines`
--

INSERT INTO `news_headlines` (`id`, `title`, `description`, `image_path`, `created_at`) VALUES
(1, 'Headline 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra rutrum fermentum. Fusce in dolor id turpis tristique accumsan vel ac nunc. Maecenas in facilisis quam. Suspendisse id fermentum tellus. Proin finibus tellus in consequat pharetra. Nullam vitae orci lorem. Maecenas a imperdiet arcu. Fusce porttitor, felis et porttitor accumsan. Vivamus dictum rhoncus ex, ut feugiat ante ultrices eu. Integer pulvinar enim efficitur ligula tincidunt tincidunt non ut nunc. Quisque vitae tempus libero. Nunc pulvinar imperdiet bibendum. Aliquam erat volutpat. Aliquam in viverra risus, vel suscipit ante. Donec iaculis nisi enim, in suscipit quam egestas nec. ', '..\\iSecure - final\\images\\news-item-img1.jpg', '2025-09-13 06:06:04'),
(2, 'Headline 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra rutrum fermentum. Fusce in dolor id turpis tristique accumsan vel ac nunc. Maecenas in facilisis quam. Suspendisse id fermentum tellus. Proin finibus tellus in consequat pharetra. Nullam vitae orci lorem. Maecenas a imperdiet arcu. Fusce porttitor, felis et porttitor accumsan. Vivamus dictum rhoncus ex, ut feugiat ante ultrices eu. Integer pulvinar enim efficitur ligula tincidunt tincidunt non ut nunc. Quisque vitae tempus libero. Nunc pulvinar imperdiet bibendum. Aliquam erat volutpat. Aliquam in viverra risus, vel suscipit ante. Donec iaculis nisi enim, in suscipit quam egestas nec. ', '..\\iSecure - final\\images\\news-item-img2.jpg', '2025-09-13 06:06:04'),
(3, 'Headline 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra rutrum fermentum. Fusce in dolor id turpis tristique accumsan vel ac nunc. Maecenas in facilisis quam. Suspendisse id fermentum tellus. Proin finibus tellus in consequat pharetra. Nullam vitae orci lorem. Maecenas a imperdiet arcu. Fusce porttitor, felis et porttitor accumsan. Vivamus dictum rhoncus ex, ut feugiat ante ultrices eu. Integer pulvinar enim efficitur ligula tincidunt tincidunt non ut nunc. Quisque vitae tempus libero. Nunc pulvinar imperdiet bibendum. Aliquam erat volutpat. Aliquam in viverra risus, vel suscipit ante. Donec iaculis nisi enim, in suscipit quam egestas nec. ', '..\\iSecure - final\\images\\news-item-img3.jpg', '2025-09-13 06:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` char(36) NOT NULL,
  `reset_token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `reset_token`, `expires_at`) VALUES
(1, '68bd277dc08a7', '1801e852254434b600f0810bcd23498c7037353ee168ffeb2ea4b4d7a7396ec4', '2025-09-15 09:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `face_encoding` longblob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE `personnels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `face_photo_path` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `face_encoding` text DEFAULT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_sessions`
--

CREATE TABLE `personnel_sessions` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `token` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel_sessions`
--

INSERT INTO `personnel_sessions` (`id`, `user_id`, `token`, `created_at`, `expires_at`) VALUES
('68d6b2a5817a5', '68bd277dc08a7', '450ea6cc94115c9b993be5c5d8d864c2c52edf63358914f5d3e0831d9c3ba646', '2025-09-26 23:35:01', '2025-09-27 00:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `status` enum('Active','Inactive','Banned','Pending','Suspended') DEFAULT 'Active',
  `password_hash` varchar(255) NOT NULL,
  `role` enum('Admin','User','Moderator','Guest') DEFAULT 'User',
  `joined_date` datetime DEFAULT current_timestamp(),
  `last_active` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_account` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `rank`, `status`, `password_hash`, `role`, `joined_date`, `last_active`, `deleted_account`) VALUES
('68bd277dc08a7', 'System Admin', 'admin@example.com', 'Captain', 'Active', '$2y$10$rEprAopI6R27Vvjvxp6VpOc3Ht.4IjItA6XPweGcPBGfFMG4ipnWO', 'Admin', '2025-09-07 14:34:37', '2025-09-20 11:31:32', 0),
('c6d782e7-9528-11f0-a23b-b0dcefd6f94c', 'nat', 'email@example.com', 'Captain', 'Active', '$2y$10$4Mfmqrhva22.MZb.jwPoi.5KVPBCwYInzKtBNx6BVbAz6ySfbVmgm', 'User', '2025-09-19 15:18:01', '2025-09-19 16:39:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `plate_number` varchar(20) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `owner_name` varchar(150) DEFAULT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `vehicle_brand` varchar(100) DEFAULT NULL,
  `vehicle_model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitation_requests`
--

CREATE TABLE `visitation_requests` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(100) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `valid_id_path` varchar(255) NOT NULL,
  `selfie_photo_path` varchar(255) NOT NULL,
  `vehicle_owner` varchar(100) DEFAULT NULL,
  `vehicle_brand` varchar(100) DEFAULT NULL,
  `plate_number` varchar(50) DEFAULT NULL,
  `vehicle_color` varchar(50) DEFAULT NULL,
  `vehicle_model` varchar(100) DEFAULT NULL,
  `vehicle_photo_path` varchar(255) DEFAULT NULL,
  `reason` text NOT NULL,
  `personnel_related` varchar(100) DEFAULT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitation_requests`
--

INSERT INTO `visitation_requests` (`id`, `visitor_name`, `home_address`, `contact_number`, `email`, `valid_id_path`, `selfie_photo_path`, `vehicle_owner`, `vehicle_brand`, `plate_number`, `vehicle_color`, `vehicle_model`, `vehicle_photo_path`, `reason`, `personnel_related`, `visit_date`, `visit_time`, `created_at`, `status`) VALUES
(3, 'Gabriel Pecson', 'Guagua Pampanga', '09291712820', 'gabriel@example.com', 'uploads/1757919407_personalid.jpg', 'uploads/1757919407_selfie.jpg', '', 'Toyota', 'ABC-1234', '', 'Vios', 'uploads/1757919407_viosred.jpg', 'visitation', 'Major Ponciano', '2025-09-21', '11:00:00', '2025-09-15 06:56:47', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `id_photo_path` varchar(255) DEFAULT NULL,
  `selfie_photo_path` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `status` enum('Inside','Outside') DEFAULT 'Inside'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_sessions`
--

CREATE TABLE `visitor_sessions` (
  `user_token` char(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_sessions`
--

INSERT INTO `visitor_sessions` (`user_token`, `created_at`, `expires_at`) VALUES
('159bbb4431fda55fe75ad07099e824e008e32f234ed30a43a03b48a7dc7678db', '2025-09-15 04:31:28', '2025-09-15 07:01:28'),
('2b696c044257944fed4d71809cabd5ed60aba9e00c550c98f3b369110d0cd6b1', '2025-09-15 06:43:38', '2025-09-15 09:13:38'),
('56889e5e7d9baf3cc317f67b2ba7a0d7dfe846f5f9d6d736444e8a0dccde2054', '2025-09-13 03:35:28', '2025-09-13 06:05:28'),
('7566a21a0c3ecf9e13c5ceeae425b44d0ebf0e47e056ac2dedb9ef79dfd7e4f8', '2025-09-17 08:28:46', '2025-09-17 10:58:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_audit_logs`
--
ALTER TABLE `admin_audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_about_us`
--
ALTER TABLE `landing_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_audit_logs`
--
ALTER TABLE `landing_audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_landing_session` (`user_id`);

--
-- Indexes for table `landing_carousel`
--
ALTER TABLE `landing_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_vision_mission`
--
ALTER TABLE `landing_vision_mission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_carousel`
--
ALTER TABLE `news_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_headlines`
--
ALTER TABLE `news_headlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token` (`reset_token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_sessions`
--
ALTER TABLE `personnel_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plate_number` (`plate_number`);

--
-- Indexes for table `visitation_requests`
--
ALTER TABLE `visitation_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_sessions`
--
ALTER TABLE `visitor_sessions`
  ADD PRIMARY KEY (`user_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_audit_logs`
--
ALTER TABLE `admin_audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `landing_about_us`
--
ALTER TABLE `landing_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing_audit_logs`
--
ALTER TABLE `landing_audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `landing_carousel`
--
ALTER TABLE `landing_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `landing_vision_mission`
--
ALTER TABLE `landing_vision_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_carousel`
--
ALTER TABLE `news_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_headlines`
--
ALTER TABLE `news_headlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitation_requests`
--
ALTER TABLE `visitation_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `landing_audit_logs`
--
ALTER TABLE `landing_audit_logs`
  ADD CONSTRAINT `fk_landing_session` FOREIGN KEY (`user_id`) REFERENCES `visitor_sessions` (`user_token`) ON DELETE CASCADE;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `personnel_sessions`
--
ALTER TABLE `personnel_sessions`
  ADD CONSTRAINT `personnel_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
