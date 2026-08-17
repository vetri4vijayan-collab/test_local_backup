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
-- Table structure for table `egc_acc_tiderc_drac`
--

CREATE TABLE `egc_acc_tiderc_drac` (
  `sno` int(11) NOT NULL,
  `tiderc_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `b_name` text DEFAULT NULL,
  `rd_prsn_name` text DEFAULT NULL,
  `rd_name` text DEFAULT NULL,
  `rd_prt1` int(4) DEFAULT NULL,
  `rd_prt2` int(4) DEFAULT NULL,
  `rd_prt3` int(4) DEFAULT NULL,
  `rd_prt4` int(4) DEFAULT NULL,
  `rd_prt5` int(4) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `due` date DEFAULT NULL,
  `vv_no` varchar(50) DEFAULT NULL,
  `value` double DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_acc_tiderc_drac`
--

INSERT INTO `egc_acc_tiderc_drac` (`sno`, `tiderc_id`, `company_id`, `entity_id`, `b_name`, `rd_prsn_name`, `rd_name`, `rd_prt1`, `rd_prt2`, `rd_prt3`, `rd_prt4`, `rd_prt5`, `type`, `due`, `vv_no`, `value`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, NULL, 0, 0, 'sbi', 'ysyg', 'gfhghjd', 4111, 4111, 4111, 4111, NULL, 'Visa', '2026-08-01', '5675', 0, 0, 0, '2026-08-08 12:09:43', '2026-08-08 12:26:07', 2),
(2, NULL, 0, 0, 'SBI', 'TEST USER', 'EGC Card', 4111, 4111, 4111, 4111, NULL, 'Visa', '2026-09-01', '123', 0, 0, 0, '2026-08-08 12:31:27', '2026-08-08 12:31:27', 0),
(3, NULL, 0, 0, 'Sdfds Sdfsdf', 'sdfsf dfgdfg', 'Dffgd Dfgdf', 5645, 5645, 6756, 7868, NULL, 'Visa', '2026-11-01', '453', 208783564, 0, 0, '2026-08-08 12:58:03', '2026-08-08 12:58:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_acc_tiderc_drac`
--
ALTER TABLE `egc_acc_tiderc_drac`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_acc_tiderc_drac`
--
ALTER TABLE `egc_acc_tiderc_drac`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
