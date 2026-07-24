-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2026 at 01:10 PM
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
-- Table structure for table `egc_support_category`
--

CREATE TABLE `egc_support_category` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `category_code` varchar(30) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 1,
  `allow_attachment` tinyint(1) NOT NULL DEFAULT 1,
  `is_approval_required` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Active,1=Inactive,2=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_support_category`
--

INSERT INTO `egc_support_category` (`sno`, `department_id`, `category_code`, `category_name`, `description`, `display_order`, `allow_attachment`, `is_approval_required`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'HR001', 'Attendance', NULL, 1, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(2, 1, 'HR002', 'Leave Request', NULL, 2, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(3, 1, 'HR003', 'Payroll', NULL, 3, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(4, 1, 'HR004', 'PF / ESI', NULL, 4, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(5, 1, 'HR005', 'Employee ID Card', NULL, 5, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(6, 1, 'HR006', 'Joining Formalities', NULL, 6, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(7, 1, 'HR007', 'Resignation', NULL, 7, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(8, 1, 'HR008', 'Promotion', NULL, 8, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(9, 1, 'HR009', 'Transfer', NULL, 9, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(10, 1, 'HR010', 'Other HR Issue', NULL, 10, 1, 0, 0, 0, '2026-07-24 10:16:49', '2026-07-24 10:16:49', 0),
(11, 2, 'IT001', 'ERP Issue', NULL, 1, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(12, 2, 'IT002', 'Login Problem', NULL, 2, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(13, 2, 'IT003', 'Password Reset', NULL, 3, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(14, 2, 'IT004', 'Email Issue', NULL, 4, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(15, 2, 'IT005', 'Printer Issue', NULL, 5, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(16, 2, 'IT006', 'Internet Issue', NULL, 6, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(17, 2, 'IT007', 'Computer Issue', NULL, 7, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(18, 2, 'IT008', 'Software Installation', NULL, 8, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(19, 2, 'IT009', 'Network Issue', NULL, 9, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(20, 2, 'IT010', 'Mobile App Issue', NULL, 10, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(21, 2, 'IT011', 'Website Issue', NULL, 11, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(22, 2, 'IT012', 'Other IT Issue', NULL, 12, 1, 0, 0, 0, '2026-07-24 10:17:06', '2026-07-24 10:17:06', 0),
(23, 3, 'ACC001', 'Salary Issue', NULL, 1, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(24, 3, 'ACC002', 'Expense Claim', NULL, 2, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(25, 3, 'ACC003', 'Advance Request', NULL, 3, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(26, 3, 'ACC004', 'Incentive Issue', NULL, 4, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(27, 3, 'ACC005', 'Reimbursement', NULL, 5, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(28, 3, 'ACC006', 'Bank Details Change', NULL, 6, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(29, 3, 'ACC007', 'TDS / Form 16', NULL, 7, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(30, 3, 'ACC008', 'Other Accounts Issue', NULL, 8, 1, 0, 0, 0, '2026-07-24 10:17:25', '2026-07-24 10:17:25', 0),
(31, 4, 'ADM001', 'Office Maintenance', NULL, 1, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0),
(32, 4, 'ADM002', 'Vehicle Request', NULL, 2, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0),
(33, 4, 'ADM003', 'Furniture Request', NULL, 3, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0),
(34, 4, 'ADM004', 'Stationery', NULL, 4, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0),
(35, 4, 'ADM005', 'Housekeeping', NULL, 5, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0),
(36, 4, 'ADM006', 'Security', NULL, 6, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0),
(37, 4, 'ADM007', 'Access Card', NULL, 7, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0),
(38, 4, 'ADM008', 'Other Admin Issue', NULL, 8, 1, 0, 0, 0, '2026-07-24 10:17:36', '2026-07-24 10:17:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_support_category`
--
ALTER TABLE `egc_support_category`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_support_category`
--
ALTER TABLE `egc_support_category`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egc_support_category`
--
ALTER TABLE `egc_support_category`
  ADD CONSTRAINT `fk_support_category_department` FOREIGN KEY (`department_id`) REFERENCES `egc_support_department` (`sno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
