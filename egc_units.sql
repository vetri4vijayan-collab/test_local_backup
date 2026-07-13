-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2026 at 03:49 PM
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
-- Table structure for table `egc_units`
--

CREATE TABLE `egc_units` (
  `sno` int(10) UNSIGNED NOT NULL,
  `unit_code` varchar(20) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `unit_symbol` varchar(20) NOT NULL,
  `unit_type` enum('Count','Weight','Length','Volume','Area','Time') NOT NULL,
  `decimal_allowed` tinyint(1) DEFAULT 0 COMMENT '0=No,1=Yes',
  `sort_order` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=Active,1=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_units`
--

INSERT INTO `egc_units` (`sno`, `unit_code`, `unit_name`, `unit_symbol`, `unit_type`, `decimal_allowed`, `sort_order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'UNIT001', 'Numbers', 'Nos', 'Count', 0, 1, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(2, 'UNIT002', 'Pieces', 'Pcs', 'Count', 0, 2, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(3, 'UNIT003', 'Boxes', 'Box', 'Count', 0, 3, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(4, 'UNIT004', 'Packets', 'Pkt', 'Count', 0, 4, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(5, 'UNIT005', 'Sets', 'Set', 'Count', 0, 5, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(6, 'UNIT006', 'Pairs', 'Pair', 'Count', 0, 6, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(7, 'UNIT007', 'Rolls', 'Roll', 'Count', 0, 7, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(8, 'UNIT008', 'Kilogram', 'Kg', 'Weight', 1, 8, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(9, 'UNIT009', 'Gram', 'g', 'Weight', 1, 9, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(10, 'UNIT010', 'Metric Ton', 'Ton', 'Weight', 1, 10, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(11, 'UNIT011', 'Litre', 'L', 'Volume', 1, 11, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(12, 'UNIT012', 'Millilitre', 'ml', 'Volume', 1, 12, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(13, 'UNIT013', 'Meter', 'Mtr', 'Length', 1, 13, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(14, 'UNIT014', 'Centimeter', 'Cm', 'Length', 1, 14, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(15, 'UNIT015', 'Feet', 'Ft', 'Length', 1, 15, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(16, 'UNIT016', 'Square Feet', 'Sq.ft', 'Area', 1, 16, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(17, 'UNIT017', 'Square Meter', 'Sq.m', 'Area', 1, 17, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(18, 'UNIT018', 'Hour', 'Hr', 'Time', 1, 18, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0),
(19, 'UNIT019', 'Day', 'Day', 'Time', 0, 19, 0, 0, '2026-07-13 11:42:49', '2026-07-13 11:42:49', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_units`
--
ALTER TABLE `egc_units`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_unit_code` (`unit_code`),
  ADD UNIQUE KEY `uk_unit_name` (`unit_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_units`
--
ALTER TABLE `egc_units`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
