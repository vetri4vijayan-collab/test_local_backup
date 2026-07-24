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
-- Table structure for table `egc_support_department`
--

CREATE TABLE `egc_support_department` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `department_code` varchar(20) NOT NULL,
  `department_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `department_head_id` bigint(20) DEFAULT NULL,
  `default_assignee_id` bigint(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `sla_response_hours` int(11) NOT NULL DEFAULT 4,
  `sla_resolution_hours` int(11) NOT NULL DEFAULT 24,
  `display_order` int(11) NOT NULL DEFAULT 1,
  `color_code` varchar(20) DEFAULT '#0d6efd',
  `icon` varchar(100) DEFAULT 'ri-customer-service-2-line',
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Active,1=Inactive,2=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_support_department`
--

INSERT INTO `egc_support_department` (`sno`, `department_code`, `department_name`, `description`, `department_head_id`, `default_assignee_id`, `email`, `phone`, `sla_response_hours`, `sla_resolution_hours`, `display_order`, `color_code`, `icon`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'HR', 'Human Resources', 'Employee related support', NULL, NULL, NULL, NULL, 4, 24, 1, '#0d6efd', 'ri-team-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:13:48', 0),
(2, 'IT', 'Information Technology', 'Software, Hardware, ERP and Network', NULL, NULL, NULL, NULL, 4, 24, 2, '#198754', 'ri-computer-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:13:48', 0),
(3, 'ACC', 'Accounts & Finance', 'Salary, Reimbursement, Payments', NULL, NULL, NULL, NULL, 4, 24, 3, '#ffc107', 'ri-money-rupee-circle-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:13:48', 0),
(4, 'ADMIN', 'Administration', 'Office facilities and administration', NULL, NULL, NULL, NULL, 4, 24, 4, '#6f42c1', 'ri-building-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:13:48', 0),
(5, 'OPS', 'Operations', 'Operations and workflow support', NULL, NULL, NULL, NULL, 4, 24, 5, '#20c997', 'ri-settings-3-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:14:41', 2),
(6, 'SALES', 'Sales', 'Sales related support', NULL, NULL, NULL, NULL, 4, 24, 6, '#fd7e14', 'ri-line-chart-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:14:37', 2),
(7, 'PUR', 'Purchase', 'Purchase and Vendor support', NULL, NULL, NULL, NULL, 4, 24, 7, '#0dcaf0', 'ri-shopping-cart-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:14:35', 2),
(8, 'STORE', 'Stores', 'Inventory and Store support', NULL, NULL, NULL, NULL, 4, 24, 8, '#6610f2', 'ri-archive-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:14:27', 2),
(9, 'LEGAL', 'Legal', 'Legal documentation support', NULL, NULL, NULL, NULL, 4, 24, 9, '#dc3545', 'ri-scales-3-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:14:20', 2),
(10, 'CRM', 'CRM', 'Customer Relationship support', NULL, NULL, NULL, NULL, 4, 24, 10, '#198754', 'ri-customer-service-2-line', 0, 0, '2026-07-24 10:13:48', '2026-07-24 10:14:17', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_support_department`
--
ALTER TABLE `egc_support_department`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `department_code` (`department_code`),
  ADD KEY `department_name` (`department_name`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_support_department`
--
ALTER TABLE `egc_support_department`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
