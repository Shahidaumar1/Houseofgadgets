-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2023 at 10:10 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_repairing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `town_city` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `landline_number` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address_line_1`, `address_line_2`, `town_city`, `post_code`, `mobile_number`, `landline_number`, `email`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'branch 1', 'emoliyees colony layyah', 'Same as above', 'lahore', '31210', '03456767879', '060787654646', 'agi@gmnail.nom', '30.97265765', '70.96765430', NULL, '2023-11-30 12:08:43'),
(2, 'Branch 2', 'sgfhjgh', 'same as abive', 'Layyah', '31200', '03074068710', '0609876543', 'ali@gmail.com', '30.06136325', '70.63470085', NULL, '2023-12-01 02:45:07'),
(7, 'branch 3', 'kakdk', NULL, 'lahore', '76544', '03074068710', '0606786543', 'admin@admin.com', NULL, NULL, '2023-11-30 13:36:45', '2023-11-30 13:36:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
