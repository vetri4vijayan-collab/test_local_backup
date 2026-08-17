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
-- Table structure for table `egc_acc_expense_categories`
--

CREATE TABLE `egc_acc_expense_categories` (
  `sno` bigint(20) NOT NULL,
  `category_code` varchar(200) DEFAULT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `icon` varchar(200) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_acc_expense_categories`
--

INSERT INTO `egc_acc_expense_categories` (`sno`, `category_code`, `category_name`, `icon`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'SALARY', 'Salary Category', 'mdi-tools', 0, 0, '2026-08-08 14:25:17', '2026-08-08 14:25:17', 0),
(2, 'SUBSCRIPTION', 'Subscription', 'mdi-dots-horizontal', 0, 0, '2026-08-08 15:32:46', '2026-08-08 15:32:46', 0),
(3, 'EMAIL', 'Email 1', 'mdi-shape-outline', 0, 0, '2026-08-08 18:39:44', '2026-08-10 12:46:43', 2),
(4, 'TEST', 'test', 'mdi-shape-outline', 0, 0, '2026-08-10 10:13:37', '2026-08-10 10:29:15', 2),
(5, 'GMAIL', 'Gmail 2', 'mdi-shape-outline', 0, 0, '2026-08-10 10:30:22', '2026-08-10 10:30:42', 2),
(6, 'EMAIL', 'Email', 'mdi-tools', 0, 0, '2026-08-10 12:46:55', '2026-08-10 12:46:55', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_acc_expense_categories`
--
ALTER TABLE `egc_acc_expense_categories`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_acc_expense_categories`
--
ALTER TABLE `egc_acc_expense_categories`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
