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
-- Table structure for table `egc_payment_modes`
--

CREATE TABLE `egc_payment_modes` (
  `sno` int(11) NOT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_payment_modes`
--

INSERT INTO `egc_payment_modes` (`sno`, `payment_mode`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, 'Cheque', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0),
(2, 'NEFT', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0),
(3, 'UPI', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0),
(4, 'Bank Transfer', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0),
(5, 'Credit Card', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0),
(6, 'Debit Card', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0),
(7, 'RTGS', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0),
(8, 'IMPS', NULL, 0, '2026-07-13 11:11:32', 0, '2026-07-13 11:11:32', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_payment_modes`
--
ALTER TABLE `egc_payment_modes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_payment_modes`
--
ALTER TABLE `egc_payment_modes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
