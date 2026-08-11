-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2026 at 03:23 PM
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
-- Database: `egc`
--

-- --------------------------------------------------------

--
-- Table structure for table `egc_electricity_master`
--

CREATE TABLE `egc_electricity_master` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `master_type` varchar(50) NOT NULL,
  `master_code` varchar(50) NOT NULL,
  `master_name` varchar(150) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Active, 1=Inactive, 2=Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_electricity_master`
--

INSERT INTO `egc_electricity_master` (`sno`, `master_type`, `master_code`, `master_name`, `parent_id`, `description`, `sort_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'provider', 'TANGEDCO', 'Tamil Nadu Generation and Distribution Corporation Limited', NULL, 'Tamil Nadu electricity distribution provider', 1, 0, NULL, NULL, '2026-08-11 10:25:19', '2026-08-11 10:38:41'),
(2, 'provider', 'OTHER', 'Other Electricity Provider', NULL, 'Other electricity provider', 99, 0, NULL, NULL, '2026-08-11 10:25:19', '2026-08-11 10:25:19'),
(3, 'tariff', 'LT_DOMESTIC', 'LT Domestic', NULL, 'Low Tension Domestic category', 1, 0, NULL, NULL, '2026-08-11 10:26:27', '2026-08-11 10:26:27'),
(4, 'tariff', 'LT_COMMERCIAL', 'LT Commercial', NULL, 'Low Tension Commercial category', 2, 0, NULL, NULL, '2026-08-11 10:26:27', '2026-08-11 10:26:27'),
(5, 'tariff', 'LT_INDUSTRIAL', 'LT Industrial', NULL, 'Low Tension Industrial category', 3, 0, NULL, NULL, '2026-08-11 10:26:27', '2026-08-11 10:26:27'),
(6, 'tariff', 'HT_COMMERCIAL', 'HT Commercial', NULL, 'High Tension Commercial category', 4, 0, NULL, NULL, '2026-08-11 10:26:27', '2026-08-11 10:26:27'),
(7, 'tariff', 'HT_INDUSTRIAL', 'HT Industrial', NULL, 'High Tension Industrial category', 5, 0, NULL, NULL, '2026-08-11 10:26:27', '2026-08-11 10:26:27'),
(8, 'tariff', 'HT_SPECIAL', 'HT Special', NULL, 'High Tension special category', 6, 0, NULL, NULL, '2026-08-11 10:26:27', '2026-08-11 10:26:27'),
(9, 'tariff', 'OTHER', 'Other', NULL, 'Other tariff category', 99, 0, NULL, NULL, '2026-08-11 10:26:27', '2026-08-11 10:26:27'),
(10, 'connection_type', 'PERMANENT', 'Permanent', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 10:27:08', '2026-08-11 10:27:08'),
(11, 'connection_type', 'TEMPORARY', 'Temporary', NULL, NULL, 2, 0, NULL, NULL, '2026-08-11 10:27:08', '2026-08-11 10:27:08'),
(12, 'supply_type', 'UTILITY', 'Utility Supply', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 10:27:36', '2026-08-11 10:27:36'),
(13, 'supply_type', 'DG', 'DG Backup', NULL, NULL, 2, 0, NULL, NULL, '2026-08-11 10:27:36', '2026-08-11 10:27:36'),
(14, 'supply_type', 'SOLAR', 'Solar', NULL, NULL, 3, 0, NULL, NULL, '2026-08-11 10:27:36', '2026-08-11 10:27:36'),
(15, 'supply_type', 'HYBRID', 'Hybrid', NULL, NULL, 4, 0, NULL, NULL, '2026-08-11 10:27:36', '2026-08-11 10:27:36'),
(16, 'phase', 'SINGLE', 'Single Phase', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 10:28:12', '2026-08-11 10:28:12'),
(17, 'phase', 'THREE', 'Three Phase', NULL, NULL, 2, 0, NULL, NULL, '2026-08-11 10:28:12', '2026-08-11 10:28:12'),
(18, 'voltage', '230V', '230 V', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 10:29:27', '2026-08-11 10:29:27'),
(19, 'voltage', '415V', '415 V', NULL, NULL, 2, 0, NULL, NULL, '2026-08-11 10:29:27', '2026-08-11 10:29:27'),
(20, 'voltage', '11KV', '11 KV', NULL, NULL, 3, 0, NULL, NULL, '2026-08-11 10:29:27', '2026-08-11 10:29:27'),
(21, 'voltage', '33KV', '33 KV', NULL, NULL, 4, 0, NULL, NULL, '2026-08-11 10:29:27', '2026-08-11 10:29:27'),
(22, 'voltage', 'OTHER', 'Other', NULL, NULL, 99, 0, NULL, NULL, '2026-08-11 10:29:27', '2026-08-11 10:29:27'),
(28, 'billing_cycle', 'MONTHLY', 'Monthly', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 10:30:55', '2026-08-11 10:30:55'),
(29, 'billing_cycle', 'BI_MONTHLY', 'Bi-Monthly', NULL, NULL, 2, 0, NULL, NULL, '2026-08-11 10:30:55', '2026-08-11 10:30:55'),
(30, 'billing_cycle', 'QUARTERLY', 'Quarterly', NULL, NULL, 3, 0, NULL, NULL, '2026-08-11 10:30:55', '2026-08-11 10:30:55'),
(31, 'load_unit', 'KW', 'KW', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 10:31:25', '2026-08-11 10:31:25'),
(32, 'load_unit', 'KVA', 'KVA', NULL, NULL, 2, 0, NULL, NULL, '2026-08-11 10:31:25', '2026-08-11 10:31:25'),
(33, 'supply_type', 'REGULAR', 'Regular', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 10:27:36', '2026-08-11 10:27:36'),
(34, 'meter_type', 'DIGITAL', 'Digital', NULL, NULL, 1, 0, NULL, NULL, '2026-08-11 11:17:42', '2026-08-11 11:17:42'),
(35, 'meter_type', 'SMART', 'Smart Meter', NULL, NULL, 2, 0, NULL, NULL, '2026-08-11 11:17:42', '2026-08-11 11:17:42'),
(36, 'meter_type', 'NET', 'Net Meter', NULL, NULL, 3, 0, NULL, NULL, '2026-08-11 11:17:42', '2026-08-11 11:17:42'),
(37, 'meter_type', 'TOD', 'TOD Meter', NULL, NULL, 4, 0, NULL, NULL, '2026-08-11 11:17:42', '2026-08-11 11:17:42'),
(38, 'meter_type', 'OTHER', 'Other', NULL, NULL, 99, 0, NULL, NULL, '2026-08-11 11:17:42', '2026-08-11 11:17:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_electricity_master`
--
ALTER TABLE `egc_electricity_master`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_electricity_master` (`master_type`,`master_code`),
  ADD KEY `idx_electricity_master_type_status` (`master_type`,`status`),
  ADD KEY `idx_electricity_master_parent` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_electricity_master`
--
ALTER TABLE `egc_electricity_master`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
