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
-- Table structure for table `egc_support_ticket`
--

CREATE TABLE `egc_support_ticket` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `ticket_no` varchar(30) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `staff_name` varchar(150) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `priority` enum('Low','Medium','High','Urgent','Critical') NOT NULL DEFAULT 'Medium',
  `status` enum('Open','Assigned','In Progress','Waiting Staff','Waiting Third Party','Resolved','Closed','Reopened','Cancelled') NOT NULL DEFAULT 'Open',
  `assigned_to` bigint(20) DEFAULT NULL,
  `assigned_at` datetime DEFAULT NULL,
  `is_reopened` tinyint(1) NOT NULL DEFAULT 0,
  `reopened_count` int(11) NOT NULL DEFAULT 0,
  `first_response_at` datetime DEFAULT NULL,
  `resolved_at` datetime DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `sla_response_hours` int(11) DEFAULT 4,
  `sla_resolution_hours` int(11) DEFAULT 24,
  `is_sla_breached` tinyint(1) NOT NULL DEFAULT 0,
  `staff_rating` tinyint(4) DEFAULT NULL,
  `staff_feedback` text DEFAULT NULL,
  `last_reply_by` bigint(20) DEFAULT NULL,
  `last_reply_at` datetime DEFAULT NULL,
  `last_activity_at` datetime DEFAULT current_timestamp(),
  `created_ip` varchar(45) DEFAULT NULL,
  `created_browser` varchar(255) DEFAULT NULL,
  `created_device` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_flag` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Active,2=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_support_ticket`
--

INSERT INTO `egc_support_ticket` (`sno`, `ticket_no`, `staff_id`, `staff_name`, `department_id`, `category_id`, `subject`, `description`, `priority`, `status`, `assigned_to`, `assigned_at`, `is_reopened`, `reopened_count`, `first_response_at`, `resolved_at`, `closed_at`, `sla_response_hours`, `sla_resolution_hours`, `is_sla_breached`, `staff_rating`, `staff_feedback`, `last_reply_by`, `last_reply_at`, `last_activity_at`, `created_ip`, `created_browser`, `created_device`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_flag`) VALUES
(2, 'TKT2026072400001', 0, 'akmax', 1, 2, 'I wnat Leave For Tommorrow', 'I wnat Leave For Tommorrow description', 'Medium', 'Open', NULL, NULL, 0, 0, NULL, NULL, NULL, 4, 24, 0, NULL, NULL, NULL, NULL, '2026-07-24 16:37:58', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '\"Windows\"', 0, NULL, '2026-07-24 11:07:58', '2026-07-24 11:07:58', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_support_ticket`
--
ALTER TABLE `egc_support_ticket`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `ticket_no` (`ticket_no`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `priority` (`priority`),
  ADD KEY `status` (`status`),
  ADD KEY `created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_support_ticket`
--
ALTER TABLE `egc_support_ticket`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egc_support_ticket`
--
ALTER TABLE `egc_support_ticket`
  ADD CONSTRAINT `fk_ticket_category` FOREIGN KEY (`category_id`) REFERENCES `egc_support_category` (`sno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ticket_department` FOREIGN KEY (`department_id`) REFERENCES `egc_support_department` (`sno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
