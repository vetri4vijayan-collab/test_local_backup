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
-- Table structure for table `egc_brands`
--

CREATE TABLE `egc_brands` (
  `sno` int(10) UNSIGNED NOT NULL,
  `brand_code` varchar(20) NOT NULL,
  `brand_name` varchar(150) NOT NULL,
  `country_of_origin` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=Active,1=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_brands`
--

INSERT INTO `egc_brands` (`sno`, `brand_code`, `brand_name`, `country_of_origin`, `website`, `description`, `sort_order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'BR001', 'SKF', 'Sweden', 'https://www.skf.com', NULL, 1, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(2, 'BR002', 'Bosch', 'Germany', 'https://www.bosch.com', NULL, 2, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(3, 'BR003', 'Siemens', 'Germany', 'https://www.siemens.com', NULL, 3, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(4, 'BR004', 'ABB', 'Switzerland', 'https://global.abb', NULL, 4, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(5, 'BR005', 'Schneider Electric', 'France', 'https://www.se.com', NULL, 5, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(6, 'BR006', 'Honeywell', 'USA', 'https://www.honeywell.com', NULL, 6, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(7, 'BR007', 'Castrol', 'United Kingdom', 'https://www.castrol.com', NULL, 7, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(8, 'BR008', 'Shell', 'Netherlands', 'https://www.shell.com', NULL, 8, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(9, 'BR009', 'Mobil', 'USA', 'https://www.mobil.com', NULL, 9, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(10, 'BR010', 'Tata', 'India', 'https://www.tata.com', NULL, 10, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(11, 'BR011', 'JK Tyre', 'India', 'https://www.jktyre.com', NULL, 11, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(12, 'BR012', 'MRF', 'India', 'https://www.mrftyres.com', NULL, 12, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(13, 'BR013', 'HP', 'USA', 'https://www.hp.com', NULL, 13, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(14, 'BR014', 'Dell', 'USA', 'https://www.dell.com', NULL, 14, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(15, 'BR015', 'Lenovo', 'China', 'https://www.lenovo.com', NULL, 15, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(16, 'BR016', 'Canon', 'Japan', 'https://global.canon', NULL, 16, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(17, 'BR017', 'Asian Paints', 'India', 'https://www.asianpaints.com', NULL, 17, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(18, 'BR018', '3M', 'USA', 'https://www.3m.com', NULL, 18, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(19, 'BR019', 'Pidilite', 'India', 'https://www.pidilite.com', NULL, 19, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0),
(20, 'BR020', 'Generic', 'N/A', NULL, NULL, 20, 0, 0, '2026-07-13 11:43:47', '2026-07-13 11:43:47', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_brands`
--
ALTER TABLE `egc_brands`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_brand_code` (`brand_code`),
  ADD UNIQUE KEY `uk_brand_name` (`brand_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_brands`
--
ALTER TABLE `egc_brands`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
