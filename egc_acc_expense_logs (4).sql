-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2026 at 03:27 PM
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
-- Table structure for table `egc_acc_expense_logs`
--

CREATE TABLE `egc_acc_expense_logs` (
  `sno` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `tiderc_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT 0,
  `reference_no` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `reference_link` text DEFAULT NULL,
  `currency_type` enum('INR','USD') DEFAULT 'INR',
  `currency_amount` double DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(4) NOT NULL DEFAULT 0,
  `expense_frequency` varchar(250) DEFAULT 'One Time',
  `next_payment_date` date DEFAULT NULL,
  `custom_start_date` date DEFAULT NULL,
  `custom_end_date` date DEFAULT NULL,
  `recurring_status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_acc_expense_logs`
--

INSERT INTO `egc_acc_expense_logs` (`sno`, `company_id`, `entity_id`, `branch_id`, `category_id`, `product_id`, `tiderc_id`, `date`, `amount`, `reference_no`, `remarks`, `email`, `mobile_no`, `reference_link`, `currency_type`, `currency_amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `expense_frequency`, `next_payment_date`, `custom_start_date`, `custom_end_date`, `recurring_status`) VALUES
(1, 4, 4, NULL, 2, 2, 2, '2026-08-08', 49999.99, NULL, NULL, NULL, NULL, NULL, 'INR', 0, NULL, NULL, '2026-08-08 15:46:32', '2026-08-08 18:00:47', 2, 'one_time', NULL, NULL, NULL, 0),
(2, 3, 3, NULL, 2, 2, 3, '2026-08-09', 123300, NULL, 'sfgfd', NULL, NULL, NULL, 'INR', 0, NULL, NULL, '2026-08-08 15:59:05', '2026-08-08 18:09:01', 2, 'one_time', NULL, NULL, NULL, 0),
(3, 3, 3, NULL, 2, 2, 2, '2026-08-08', 2500, 'ghffgh', NULL, NULL, NULL, NULL, 'INR', 0, NULL, NULL, '2026-08-08 18:10:28', '2026-08-08 18:10:28', 0, 'one_time', NULL, NULL, NULL, 0),
(4, 3, 3, NULL, 6, 7, 2, '2026-08-10', 15000, 'EibS Gmail', NULL, NULL, NULL, NULL, 'INR', 0, 0, 0, '2026-08-10 14:26:39', '2026-08-10 14:26:39', 0, 'monthly', '2026-09-10', NULL, NULL, 1),
(5, 0, NULL, NULL, 6, 7, 2, '2026-08-10', 15000, 'EGC Gmail', NULL, NULL, NULL, NULL, 'INR', 0, 0, 0, '2026-08-10 15:06:03', '2026-08-10 15:06:03', 0, 'monthly', '2026-09-10', NULL, NULL, 1),
(6, 0, NULL, NULL, 1, 20, 2, '2026-08-14', 1500, 'dygsjh dgjh', NULL, 'vetri4vijayan@gmail.com', '7864876387', 'https://dev.erp.elysiumtechnologies.com/', 'INR', 1500, 0, 0, '2026-08-14 14:10:58', '2026-08-14 14:10:58', 0, 'one time', NULL, NULL, NULL, 0),
(7, 1, NULL, NULL, 2, 2, 3, '2026-08-14', 5500, 'chat sub', 'next chat ai', 'vetri4vijayan@gmail.com', '897687675', NULL, 'USD', 150, 0, 0, '2026-08-14 14:17:22', '2026-08-14 14:17:22', 0, 'monthly', '2026-09-11', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_acc_expense_logs`
--
ALTER TABLE `egc_acc_expense_logs`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_acc_expense_logs`
--
ALTER TABLE `egc_acc_expense_logs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
