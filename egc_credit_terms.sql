-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2026 at 12:53 PM
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
-- Table structure for table `egc_credit_terms`
--

CREATE TABLE `egc_credit_terms` (
  `sno` int(11) NOT NULL,
  `credit_days` int(11) DEFAULT NULL,
  `credit_name` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_credit_terms`
--

INSERT INTO `egc_credit_terms` (`sno`, `credit_days`, `credit_name`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, 0, 'Immediate', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(2, 7, '7 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(3, 15, '15 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(4, 30, '30 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(5, 45, '45 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(6, 60, '60 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(7, 90, '90 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(8, 120, '120 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0),
(9, 180, '180 Days', 0, '2026-07-13 11:15:25', 0, '2026-07-13 11:15:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_credit_terms`
--
ALTER TABLE `egc_credit_terms`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_credit_terms`
--
ALTER TABLE `egc_credit_terms`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
