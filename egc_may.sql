-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2026 at 12:52 PM
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
-- Table structure for table `egc_vendors`
--

CREATE TABLE `egc_vendors` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `vendor_code` varchar(30) NOT NULL,
  `legal_name` varchar(255) NOT NULL,
  `trade_name` varchar(255) NOT NULL,
  `contact_person` varchar(150) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `gstin` varchar(20) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tier_id` int(11) NOT NULL,
  `payment_mode_id` int(11) NOT NULL,
  `credit_term_id` int(11) NOT NULL,
  `vendor_status_id` int(11) NOT NULL DEFAULT 1,
  `address` text NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `sla_percentage` decimal(5,2) DEFAULT 0.00,
  `rating` decimal(3,2) DEFAULT 0.00,
  `ytd_spend` decimal(18,2) DEFAULT 0.00,
  `remarks` text DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_vendors`
--

INSERT INTO `egc_vendors` (`sno`, `vendor_code`, `legal_name`, `trade_name`, `contact_person`, `mobile`, `email`, `gstin`, `pan`, `category_id`, `tier_id`, `payment_mode_id`, `credit_term_id`, `vendor_status_id`, `address`, `city_id`, `state_id`, `country_id`, `pincode`, `sla_percentage`, `rating`, `ytd_spend`, `remarks`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'VEN000001', 'Spear Mart Private Limited', 'Spear Mart', 'Ramesh Kumar', '9876543210', 'sales@spearmart.com', '33ABCDE1234F1Z5', 'ABCDE1234F', 2, 2, 7, 6, 2, '12 Anna Nagar', 0, 0, 0, '625020', 98.00, 4.50, 7800000.00, 'Preferred OEM Vendor', NULL, NULL, '2026-07-13 06:04:39', '2026-07-13 06:04:39', 0),
(2, 'VEN000002', 'Velmurugan Industries', 'Velmurugan Industries', 'Suresh Babu', '9123456780', 'purchase@velmurugan.in', '33AAACV4567L1Z2', 'AAACV4567L', 5, 1, 7, 4, 4, 'KK Nagar', 0, 0, 0, '625020', 95.00, 4.40, 7118000.00, 'Steel Fabrication Vendor', NULL, NULL, '2026-07-13 06:04:39', '2026-07-13 06:04:39', 0),
(3, 'VEN000003', 'Indo Gulf Lubricants', 'Indo Gulf Lubricants', 'Hari Prasad', '9012345678', 'info@indogulf.com', '33AAACI8765M1Z9', 'AAACI8765M', 10, 2, 3, 5, 2, 'SIDCO Estate', 0, 0, 0, '625012', 99.00, 4.70, 5864000.00, 'Industrial Lubricant Supplier', NULL, 0, '2026-07-13 06:04:39', '2026-07-13 10:50:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `egc_vendor_bank_accounts`
--

CREATE TABLE `egc_vendor_bank_accounts` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `branch_name` varchar(150) NOT NULL,
  `account_holder` varchar(150) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `ifsc_code` varchar(20) NOT NULL,
  `upi_id` varchar(100) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT 1,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_vendor_bank_accounts`
--

INSERT INTO `egc_vendor_bank_accounts` (`sno`, `vendor_id`, `bank_name`, `branch_name`, `account_holder`, `account_number`, `ifsc_code`, `upi_id`, `is_primary`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ICICI Bank', 'Tallakulam', 'Spear Mart Private Limited', '123456789012', 'ICIC0001234', 'spearmart@icici', 1, 1, '2026-07-13 06:06:29', '2026-07-13 06:06:29'),
(2, 2, 'HDFC Bank', 'KK Nagar', 'Velmurugan Industries', '998877665544', 'HDFC0001234', 'velmurugan@hdfc', 1, 1, '2026-07-13 06:06:29', '2026-07-13 06:06:29'),
(3, 3, 'State Bank of India', 'Main Branch', 'Indo Gulf Lubricants', '445566778899', 'SBIN0000456', 'indogulf@sbi', 1, 0, '2026-07-13 06:06:29', '2026-07-13 06:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `egc_vendor_category`
--

CREATE TABLE `egc_vendor_category` (
  `sno` int(11) NOT NULL,
  `category_name` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_vendor_category`
--

INSERT INTO `egc_vendor_category` (`sno`, `category_name`, `description`, `sort_order`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Raw Materials', NULL, 0, NULL, NULL, 0, 0, 0),
(2, 'Spares & Consumables', NULL, 0, NULL, NULL, 0, 0, 0),
(3, 'Electrical', NULL, 0, NULL, NULL, 0, 0, 0),
(4, 'Mechanical', NULL, 0, NULL, NULL, 0, 0, 0),
(5, 'Fabrication', NULL, 0, NULL, NULL, 0, 0, 0),
(6, 'Machining', NULL, 0, NULL, NULL, 0, 0, 0),
(7, 'Tools', NULL, 0, NULL, NULL, 0, 0, 0),
(8, 'Safety Equipments', NULL, 0, NULL, NULL, 0, 0, 0),
(9, 'Chemicals', NULL, 0, NULL, NULL, 0, 0, 0),
(10, 'Lubricants', NULL, 0, NULL, NULL, 0, 0, 0),
(11, 'Packaging', NULL, 0, NULL, NULL, 0, 0, 0),
(12, 'IT Equipment', NULL, 0, NULL, NULL, 0, 0, 0),
(13, 'Office Supplies', NULL, 0, NULL, NULL, 0, 0, 0),
(14, 'Maintenance', NULL, 0, NULL, NULL, 0, 0, 0),
(15, 'Civil Works', NULL, 0, NULL, NULL, 0, 0, 0),
(16, 'Transport', NULL, 0, NULL, NULL, 0, 0, 0),
(17, 'Housekeeping', NULL, 0, NULL, NULL, 0, 0, 0),
(18, 'Professional Services', NULL, 0, NULL, NULL, 0, 0, 0),
(19, 'Contractor', NULL, 0, NULL, NULL, 0, 0, 0),
(20, 'Rental Equipment', NULL, 0, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `egc_vendor_hold_reason`
--

CREATE TABLE `egc_vendor_hold_reason` (
  `sno` int(11) NOT NULL,
  `reason_name` varchar(200) DEFAULT NULL,
  `comments_check` int(4) DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `egc_vendor_scorecard`
--

CREATE TABLE `egc_vendor_scorecard` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_score` decimal(5,2) DEFAULT 0.00,
  `quality_score` decimal(5,2) DEFAULT 0.00,
  `compliance_score` decimal(5,2) DEFAULT 0.00,
  `response_score` decimal(5,2) DEFAULT 0.00,
  `price_score` decimal(5,2) DEFAULT 0.00,
  `service_score` decimal(5,2) DEFAULT 0.00,
  `composite_score` decimal(5,2) DEFAULT 0.00,
  `disputes` int(11) NOT NULL DEFAULT 0,
  `review_date` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `reviewed_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_vendor_scorecard`
--

INSERT INTO `egc_vendor_scorecard` (`sno`, `vendor_id`, `delivery_score`, `quality_score`, `compliance_score`, `response_score`, `price_score`, `service_score`, `composite_score`, `disputes`, `review_date`, `remarks`, `reviewed_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 94.10, 96.40, 100.00, 92.00, 90.00, 91.50, 4.52, 0, '2026-07-01', NULL, NULL, '2026-07-13 06:09:50', '2026-07-13 06:09:50', 0),
(2, 2, 91.00, 95.20, 98.50, 90.10, 89.00, 90.00, 4.32, 0, '2026-07-01', NULL, NULL, '2026-07-13 06:09:50', '2026-07-13 06:09:50', 0),
(3, 3, 98.50, 99.20, 100.00, 96.00, 95.00, 96.50, 4.85, 0, '2026-07-01', NULL, NULL, '2026-07-13 06:09:50', '2026-07-13 06:09:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `egc_vendor_status`
--

CREATE TABLE `egc_vendor_status` (
  `sno` int(11) NOT NULL,
  `status_name` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_vendor_status`
--

INSERT INTO `egc_vendor_status` (`sno`, `status_name`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, 'Pending', 0, '2026-07-13 11:58:54', 0, '2026-07-13 11:58:54', 0),
(2, 'Active', 0, '2026-07-13 11:59:07', 0, '2026-07-13 11:59:07', 0),
(3, 'Hold', 0, '2026-07-13 11:58:54', 0, '2026-07-13 11:58:54', 0),
(4, 'Blocked', 0, '2026-07-13 11:59:07', 0, '2026-07-13 11:59:07', 0),
(5, 'Rejected', 0, '2026-07-13 11:59:07', 0, '2026-07-13 11:59:07', 0),
(6, 'Blacklisted', 0, '2026-07-13 11:58:54', 0, '2026-07-13 11:58:54', 0),
(7, 'Inactive', 0, '2026-07-13 11:59:07', 0, '2026-07-13 11:59:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `egc_vendor_status_history`
--

CREATE TABLE `egc_vendor_status_history` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `old_status` int(11) NOT NULL,
  `new_status` int(11) NOT NULL,
  `reason_id` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `changed_by` bigint(20) DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_vendor_status_history`
--

INSERT INTO `egc_vendor_status_history` (`sno`, `vendor_id`, `old_status`, `new_status`, `reason_id`, `remarks`, `changed_by`, `changed_at`, `status`) VALUES
(1, 1, 1, 2, NULL, 'Vendor approved', 1, '2026-07-13 06:08:06', 0),
(2, 2, 2, 4, 2, 'Quality issue reported', 1, '2026-07-13 06:08:06', 0),
(3, 3, 2, 3, 4, 'Financial review initiated', 1, '2026-07-13 06:08:06', 0),
(4, 3, 3, 2, NULL, NULL, 0, '2026-07-13 07:31:42', 0),
(5, 3, 2, 3, NULL, NULL, 0, '2026-07-13 07:31:46', 0),
(6, 3, 3, 2, NULL, NULL, 0, '2026-07-13 10:50:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `egc_vendor_tier`
--

CREATE TABLE `egc_vendor_tier` (
  `sno` int(11) NOT NULL,
  `tier_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_vendor_tier`
--

INSERT INTO `egc_vendor_tier` (`sno`, `tier_name`, `description`, `status`) VALUES
(1, 'Tier 1', NULL, 0),
(2, 'Tier 2', NULL, 0),
(3, 'Tier 3', NULL, 0),
(4, 'Strategic', NULL, 0),
(5, 'Preferred', NULL, 0),
(6, 'Approved', NULL, 0),
(7, 'Trial', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_vendors`
--
ALTER TABLE `egc_vendors`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `vendor_code` (`vendor_code`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `tier_id` (`tier_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`),
  ADD KEY `credit_term_id` (`credit_term_id`),
  ADD KEY `vendor_status_id` (`vendor_status_id`);

--
-- Indexes for table `egc_vendor_bank_accounts`
--
ALTER TABLE `egc_vendor_bank_accounts`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `egc_vendor_category`
--
ALTER TABLE `egc_vendor_category`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `egc_vendor_hold_reason`
--
ALTER TABLE `egc_vendor_hold_reason`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `egc_vendor_scorecard`
--
ALTER TABLE `egc_vendor_scorecard`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `egc_vendor_status`
--
ALTER TABLE `egc_vendor_status`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `egc_vendor_status_history`
--
ALTER TABLE `egc_vendor_status_history`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `old_status` (`old_status`),
  ADD KEY `new_status` (`new_status`);

--
-- Indexes for table `egc_vendor_tier`
--
ALTER TABLE `egc_vendor_tier`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_vendors`
--
ALTER TABLE `egc_vendors`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `egc_vendor_bank_accounts`
--
ALTER TABLE `egc_vendor_bank_accounts`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `egc_vendor_category`
--
ALTER TABLE `egc_vendor_category`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `egc_vendor_hold_reason`
--
ALTER TABLE `egc_vendor_hold_reason`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `egc_vendor_scorecard`
--
ALTER TABLE `egc_vendor_scorecard`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `egc_vendor_status`
--
ALTER TABLE `egc_vendor_status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `egc_vendor_status_history`
--
ALTER TABLE `egc_vendor_status_history`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `egc_vendor_tier`
--
ALTER TABLE `egc_vendor_tier`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egc_vendor_bank_accounts`
--
ALTER TABLE `egc_vendor_bank_accounts`
  ADD CONSTRAINT `fk_vendor_bank` FOREIGN KEY (`vendor_id`) REFERENCES `egc_vendors` (`sno`) ON DELETE CASCADE;

--
-- Constraints for table `egc_vendor_scorecard`
--
ALTER TABLE `egc_vendor_scorecard`
  ADD CONSTRAINT `fk_vendor_score` FOREIGN KEY (`vendor_id`) REFERENCES `egc_vendors` (`sno`) ON DELETE CASCADE;

--
-- Constraints for table `egc_vendor_status_history`
--
ALTER TABLE `egc_vendor_status_history`
  ADD CONSTRAINT `fk_vendor_status` FOREIGN KEY (`vendor_id`) REFERENCES `egc_vendors` (`sno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
