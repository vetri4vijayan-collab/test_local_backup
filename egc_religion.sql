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
-- Table structure for table `egc_religion`
--

CREATE TABLE `egc_religion` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `religion_name` varchar(100) NOT NULL,
  `minority_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-No,1-Yes',
  `display_order` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_religion`
--

INSERT INTO `egc_religion` (`sno`, `religion_name`, `minority_status`, `display_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hindu', 0, 1, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(2, 'Muslim', 1, 2, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(3, 'Christian', 1, 3, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(4, 'Sikh', 1, 4, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(5, 'Buddhist', 1, 5, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(6, 'Jain', 1, 6, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(7, 'Parsi', 1, 7, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(8, 'Jewish', 1, 8, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(9, 'Baháʼí', 1, 9, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53'),
(10, 'Other', 0, 10, 0, '2026-07-21 08:57:53', '2026-07-21 08:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_religion`
--
ALTER TABLE `egc_religion`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `religion_name` (`religion_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_religion`
--
ALTER TABLE `egc_religion`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
