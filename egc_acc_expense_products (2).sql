-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2026 at 03:28 PM
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
-- Table structure for table `egc_acc_expense_products`
--

CREATE TABLE `egc_acc_expense_products` (
  `sno` bigint(20) NOT NULL,
  `product_code` varchar(200) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(30) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `frequency_type` varchar(200) DEFAULT NULL,
  `is_recurring` int(4) DEFAULT 0,
  `billing_date` date DEFAULT NULL,
  `currency_type` enum('INR','USD') NOT NULL DEFAULT 'INR',
  `amount_inr` double DEFAULT 0,
  `default_amount` double NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(4) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_acc_expense_products`
--

INSERT INTO `egc_acc_expense_products` (`sno`, `product_code`, `product_name`, `email_id`, `mobile_no`, `website`, `frequency_type`, `is_recurring`, `billing_date`, `currency_type`, `amount_inr`, `default_amount`, `remarks`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `category_id`) VALUES
(1, 'AMAZON', 'Amazon Api', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-08 15:01:52', '2026-08-08 15:01:52', 0, 0),
(2, 'AI', 'ChatGPT', 'vetri4vijayan@gmail.com', '897687675', NULL, 'Monthly', 1, '2026-09-11', 'USD', 5500, 150, 'next chat ai', 0, 0, '2026-08-08 15:33:11', '2026-08-14 14:13:13', 0, 2),
(3, 'GMAIL', 'Gmail', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-08 19:14:06', '2026-08-08 19:14:06', 0, 2),
(4, 'GMAIL-2', 'gmail', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 10:31:29', '2026-08-10 10:31:29', 0, 3),
(5, 'HGJHJGHJ', 'hgjhjghj', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 10:51:07', '2026-08-10 10:51:07', 0, 1),
(6, 'ROUTER', 'Router', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 11:16:58', '2026-08-10 11:16:58', 0, 2),
(7, 'GMAIL-3', 'Gmail Account', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 12:53:30', '2026-08-10 13:14:53', 0, 6),
(8, 'EMAIL-ACC', 'Email Acc', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:22:52', '2026-08-10 16:22:52', 0, 6),
(9, 'ACC2', 'acc2', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:26:12', '2026-08-10 16:26:12', 0, 6),
(10, 'ACC3', 'acc3', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:31:58', '2026-08-10 16:31:58', 0, 6),
(11, 'GHFG', 'ghfg', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:33:48', '2026-08-10 16:33:48', 0, 6),
(12, 'GDFHFG', 'gdfhfg', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:37:42', '2026-08-10 16:37:42', 0, 6),
(13, 'ERYTYTRRTYRT', 'erytytrrtyrt', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:39:42', '2026-08-10 16:39:42', 0, 6),
(14, 'FDGDFG', 'fdgdfg', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:42:01', '2026-08-10 16:42:01', 0, 1),
(15, 'NVVBVBN', 'nvvbvbn', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:42:50', '2026-08-10 16:42:50', 0, 6),
(16, 'DSFSD', 'dsfsd', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:43:46', '2026-08-10 16:43:46', 0, 6),
(17, 'DFGHFGJ', 'dfghfgj', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:46:36', '2026-08-10 16:46:36', 0, 1),
(18, 'HJKHGJFGH', 'hjkhgjfgh', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:48:49', '2026-08-10 16:48:49', 0, 6),
(19, 'GHFHGJKH', 'ghfhgjkh', NULL, NULL, NULL, NULL, 0, NULL, 'INR', 0, 0, NULL, 0, 0, '2026-08-10 16:53:21', '2026-08-10 16:53:21', 0, 6),
(20, 'TGHFG', 'tghfg', 'vetri4vijayan@gmail.com', '7864876387', 'https://dev.erp.elysiumtechnologies.com/', 'One Time', 0, NULL, 'INR', 1500, 1500, NULL, 0, 0, '2026-08-10 19:02:35', '2026-08-14 13:17:10', 0, 1),
(21, 'GMAIL-ACCOUNT-2', 'Gmail Account 2', 'vetri4vijayan@gmail.com', '786786786', NULL, 'One Time', 1, '2026-08-21', 'INR', 25000, 25000, NULL, 0, 0, '2026-08-14 13:54:42', '2026-08-14 13:54:42', 0, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_acc_expense_products`
--
ALTER TABLE `egc_acc_expense_products`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_acc_expense_products`
--
ALTER TABLE `egc_acc_expense_products`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
