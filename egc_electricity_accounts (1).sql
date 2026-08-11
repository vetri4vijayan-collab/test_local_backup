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
-- Table structure for table `egc_electricity_accounts`
--

CREATE TABLE `egc_electricity_accounts` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `account_code` varchar(50) NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `tariff_category_id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(200) NOT NULL,
  `service_no` varchar(100) NOT NULL,
  `consumer_no` varchar(100) DEFAULT NULL,
  `connection_name` varchar(250) DEFAULT NULL,
  `connection_type_id` bigint(20) UNSIGNED NOT NULL,
  `supply_type_id` bigint(20) UNSIGNED NOT NULL,
  `phase_type_id` bigint(20) UNSIGNED NOT NULL,
  `voltage_level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meter_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_cycle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sanction_load` decimal(12,3) DEFAULT NULL,
  `sanction_load_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contract_demand` decimal(12,3) DEFAULT NULL,
  `contract_demand_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Active, 1=Inactive, 2=Deleted',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_electricity_accounts`
--

INSERT INTO `egc_electricity_accounts` (`sno`, `account_code`, `building_id`, `entity_id`, `branch_id`, `location_id`, `provider_id`, `tariff_category_id`, `account_name`, `service_no`, `consumer_no`, `connection_name`, `connection_type_id`, `supply_type_id`, `phase_type_id`, `voltage_level_id`, `meter_type_id`, `billing_cycle_id`, `sanction_load`, `sanction_load_unit_id`, `contract_demand`, `contract_demand_unit_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'EB-000001', 1, 1, 1, NULL, 1, 4, 'Madurai Corporate Office EB Account', '012345678901', '012345678901', NULL, 10, 12, 17, 19, NULL, 28, 250.000, 32, 200.000, 32, 0, 1, 1, '2026-08-11 10:38:43', '2026-08-11 11:22:56'),
(2, 'EB-000002', 2, 1, 2, NULL, 1, 6, 'Madurai Branch EB Account', '098765432101', '098765432101', NULL, 10, 12, 17, 20, 35, 28, 500.000, 32, 400.000, 32, 0, 1, 1, '2026-08-11 11:22:24', '2026-08-11 11:22:58'),
(3, 'EB-000003', 1, NULL, NULL, 1, 1, 4, 'Madurai Corporate Office EB Account', 'TEST-MDU-EB-0003', 'TEST-MDU-CONS-0003', NULL, 10, 33, 17, 19, 34, 29, 100000.000, 31, 80000.000, 31, 0, 0, 0, '2026-08-11 13:09:04', '2026-08-11 13:09:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_electricity_accounts`
--
ALTER TABLE `egc_electricity_accounts`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_electricity_account_code` (`account_code`),
  ADD UNIQUE KEY `uq_electricity_provider_service` (`provider_id`,`service_no`),
  ADD KEY `idx_electricity_building` (`building_id`),
  ADD KEY `idx_electricity_entity` (`entity_id`),
  ADD KEY `idx_electricity_branch` (`branch_id`),
  ADD KEY `idx_electricity_provider` (`provider_id`),
  ADD KEY `idx_electricity_tariff` (`tariff_category_id`),
  ADD KEY `idx_electricity_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_electricity_accounts`
--
ALTER TABLE `egc_electricity_accounts`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
