-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2026 at 03:49 PM
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
-- Table structure for table `egc_warehouses`
--

CREATE TABLE `egc_warehouses` (
  `sno` int(10) UNSIGNED NOT NULL,
  `warehouse_code` varchar(20) NOT NULL,
  `warehouse_name` varchar(150) NOT NULL,
  `warehouse_type` enum('Main','Branch','Transit','Returns','Damaged') DEFAULT 'Main',
  `contact_person` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT 'India',
  `pincode` varchar(10) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=Active,1=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_warehouses`
--

INSERT INTO `egc_warehouses` (`sno`, `warehouse_code`, `warehouse_name`, `warehouse_type`, `contact_person`, `mobile`, `email`, `address`, `city`, `state`, `country`, `pincode`, `is_default`, `remarks`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'WH001', 'Main Warehouse', 'Main', 'Warehouse Manager', '9876543210', 'warehouse@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 1, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(2, 'WH002', 'Production Store', 'Main', 'Production Incharge', '9876543211', 'production@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(3, 'WH003', 'Finished Goods Warehouse', 'Main', 'FG Store', '9876543212', 'fgstore@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(4, 'WH004', 'Raw Material Warehouse', 'Main', 'RM Store', '9876543213', 'rmstore@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(5, 'WH005', 'Maintenance Store', 'Branch', 'Maintenance Head', '9876543214', 'maintenance@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(6, 'WH006', 'Tool Crib', 'Branch', 'Tool Room', '9876543215', 'tools@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(7, 'WH007', 'Transit Warehouse', 'Transit', 'Logistics', '9876543216', 'logistics@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(8, 'WH008', 'Return Warehouse', 'Returns', 'Returns Team', '9876543217', 'returns@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0),
(9, 'WH009', 'Damaged Goods Warehouse', 'Damaged', 'Quality Team', '9876543218', 'quality@company.com', NULL, 'Chennai', 'Tamil Nadu', 'India', NULL, 0, NULL, 0, 0, '2026-07-13 11:46:12', '2026-07-13 11:46:12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_warehouses`
--
ALTER TABLE `egc_warehouses`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_warehouse_code` (`warehouse_code`),
  ADD UNIQUE KEY `uk_warehouse_name` (`warehouse_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_warehouses`
--
ALTER TABLE `egc_warehouses`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
