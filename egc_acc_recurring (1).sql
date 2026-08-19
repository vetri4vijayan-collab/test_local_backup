-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2026 at 02:39 PM
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
-- Table structure for table `egc_acc_recurring`
--

CREATE TABLE `egc_acc_recurring` (
  `sno` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `frequency_type` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL COMMENT 'Original/current recurring billing date',
  `next_pay_date` date DEFAULT NULL,
  `last_paid_date` date DEFAULT NULL,
  `amount` double DEFAULT 0,
  `currency_type` enum('INR','USD') NOT NULL DEFAULT 'INR',
  `currency_amount` double DEFAULT 0,
  `is_gst` tinyint(1) NOT NULL DEFAULT 0,
  `gst_amount` double DEFAULT 0,
  `total_amount` double DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 Active, 2 Stopped',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_acc_recurring`
--
ALTER TABLE `egc_acc_recurring`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_recurring_product` (`product_id`),
  ADD KEY `idx_recurring_next_pay_date` (`next_pay_date`),
  ADD KEY `idx_recurring_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_acc_recurring`
--
ALTER TABLE `egc_acc_recurring`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
