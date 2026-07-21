-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2026 at 03:04 PM
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
-- Database: `egc_may`
--

-- --------------------------------------------------------

--
-- Table structure for table `egc_community`
--

CREATE TABLE `egc_community` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `community_code` varchar(20) DEFAULT NULL,
  `community_name` varchar(100) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_community`
--

INSERT INTO `egc_community` (`sno`, `community_code`, `community_name`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'OC', 'Open Category', 1, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(2, 'GEN', 'General', 2, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(3, 'EWS', 'Economically Weaker Section', 3, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(4, 'BC', 'Backward Class', 4, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(5, 'BCM', 'Backward Class Muslim', 5, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(6, 'MBC', 'Most Backward Class', 6, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(7, 'DNC', 'Denotified Community', 7, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(8, 'OBC', 'Other Backward Class', 8, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(9, 'SC', 'Scheduled Caste', 9, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(10, 'SCA', 'Scheduled Caste Arunthathiyar', 10, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01'),
(11, 'ST', 'Scheduled Tribe', 11, 0, '2026-07-21 08:59:01', '2026-07-21 08:59:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_community`
--
ALTER TABLE `egc_community`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_community`
--
ALTER TABLE `egc_community`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
