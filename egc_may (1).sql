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
-- Table structure for table `egc_items`
--

CREATE TABLE `egc_items` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_short_name` varchar(100) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `item_type_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `preferred_vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `standard_cost` decimal(15,2) DEFAULT 0.00,
  `selling_price` decimal(15,2) DEFAULT 0.00,
  `opening_stock` decimal(15,3) DEFAULT 0.000,
  `opening_stock_value` decimal(15,2) DEFAULT 0.00,
  `has_expiry` tinyint(1) DEFAULT 0,
  `has_batch` tinyint(1) DEFAULT 0,
  `has_serial_no` tinyint(1) DEFAULT 0,
  `gst_percentage` decimal(5,2) DEFAULT 0.00,
  `hsn_code` varchar(20) DEFAULT NULL,
  `default_bin` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0 Active,1 Inactive',
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `egc_item_batch_settings`
--

CREATE TABLE `egc_item_batch_settings` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `batch_prefix` varchar(30) DEFAULT NULL,
  `expiry_required` tinyint(1) DEFAULT 0,
  `manufacture_date_required` tinyint(1) DEFAULT 0,
  `serial_tracking` tinyint(1) DEFAULT 0,
  `fifo_enabled` tinyint(1) DEFAULT 1,
  `batch_auto_generate` tinyint(1) DEFAULT 1,
  `status` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `egc_item_categories`
--

CREATE TABLE `egc_item_categories` (
  `sno` int(10) UNSIGNED NOT NULL,
  `category_code` varchar(20) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=Active,1=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_item_categories`
--

INSERT INTO `egc_item_categories` (`sno`, `category_code`, `category_name`, `description`, `sort_order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ICAT001', 'Raw Materials', 'Raw materials used for manufacturing', 1, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(2, 'ICAT002', 'Consumables', 'Daily consumption materials', 2, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(3, 'ICAT003', 'Electrical Components', 'Electrical spare parts', 3, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(4, 'ICAT004', 'Mechanical Components', 'Mechanical spare parts', 4, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(5, 'ICAT005', 'Bearings', 'Industrial bearings', 5, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(6, 'ICAT006', 'Fasteners', 'Bolts, Nuts, Washers and Screws', 6, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(7, 'ICAT007', 'Lubricants', 'Oil, Grease and Coolants', 7, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(8, 'ICAT008', 'Hydraulic Parts', 'Hydraulic accessories', 8, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(9, 'ICAT009', 'Pneumatic Parts', 'Pneumatic accessories', 9, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(10, 'ICAT010', 'Safety Equipment', 'PPE and Safety Items', 10, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(11, 'ICAT011', 'Tools', 'Hand and Power Tools', 11, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(12, 'ICAT012', 'Packaging Materials', 'Boxes, Tape and Packing materials', 12, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(13, 'ICAT013', 'Office Supplies', 'Office consumables', 13, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(14, 'ICAT014', 'IT Equipment', 'Computer and Networking items', 14, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(15, 'ICAT015', 'Furniture', 'Office furniture', 15, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(16, 'ICAT016', 'Housekeeping', 'Cleaning materials', 16, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(17, 'ICAT017', 'Medical Supplies', 'Medical and First Aid', 17, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(18, 'ICAT018', 'Production Consumables', 'Production consumables', 18, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(19, 'ICAT019', 'Machine Spare Parts', 'Machine replacement parts', 19, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0),
(20, 'ICAT020', 'Finished Goods', 'Finished saleable products', 20, 0, 0, '2026-07-13 11:40:15', '2026-07-13 11:40:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `egc_item_inventory_settings`
--

CREATE TABLE `egc_item_inventory_settings` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL,
  `minimum_stock` decimal(15,3) DEFAULT 0.000,
  `maximum_stock` decimal(15,3) DEFAULT 0.000,
  `reorder_level` decimal(15,3) DEFAULT 0.000,
  `reorder_quantity` decimal(15,3) DEFAULT 0.000,
  `safety_stock` decimal(15,3) DEFAULT 0.000,
  `default_bin` varchar(50) DEFAULT NULL,
  `allow_negative_stock` tinyint(1) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `egc_item_purchase_settings`
--

CREATE TABLE `egc_item_purchase_settings` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `preferred_vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lead_time_days` int(11) DEFAULT 0,
  `minimum_order_quantity` decimal(15,3) DEFAULT 1.000,
  `purchase_unit_price` decimal(15,2) DEFAULT 0.00,
  `last_purchase_price` decimal(15,2) DEFAULT 0.00,
  `currency` varchar(10) DEFAULT 'INR',
  `is_preferred_vendor` tinyint(1) DEFAULT 1,
  `status` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `egc_item_subcategories`
--

CREATE TABLE `egc_item_subcategories` (
  `sno` int(10) UNSIGNED NOT NULL,
  `subcategory_code` varchar(20) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=Active,1=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_item_subcategories`
--

INSERT INTO `egc_item_subcategories` (`sno`, `subcategory_code`, `category_id`, `subcategory_name`, `description`, `sort_order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ISC001', 3, 'MCB', NULL, 1, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(2, 'ISC002', 3, 'Switches', NULL, 2, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(3, 'ISC003', 3, 'Contactors', NULL, 3, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(4, 'ISC004', 3, 'Cables', NULL, 4, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(5, 'ISC005', 4, 'Shafts', NULL, 5, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(6, 'ISC006', 4, 'Couplings', NULL, 6, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(7, 'ISC007', 4, 'Gears', NULL, 7, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(8, 'ISC008', 5, 'Ball Bearings', NULL, 8, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(9, 'ISC009', 5, 'Roller Bearings', NULL, 9, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(10, 'ISC010', 6, 'Bolts', NULL, 10, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(11, 'ISC011', 6, 'Nuts', NULL, 11, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(12, 'ISC012', 6, 'Washers', NULL, 12, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(13, 'ISC013', 7, 'Engine Oil', NULL, 13, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(14, 'ISC014', 7, 'Grease', NULL, 14, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(15, 'ISC015', 7, 'Hydraulic Oil', NULL, 15, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(16, 'ISC016', 10, 'Safety Helmet', NULL, 16, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(17, 'ISC017', 10, 'Safety Gloves', NULL, 17, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(18, 'ISC018', 10, 'Safety Shoes', NULL, 18, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(19, 'ISC019', 11, 'Hand Tools', NULL, 19, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(20, 'ISC020', 11, 'Power Tools', NULL, 20, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(21, 'ISC021', 12, 'Carton Boxes', NULL, 21, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(22, 'ISC022', 12, 'Stretch Film', NULL, 22, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(23, 'ISC023', 13, 'Printer Paper', NULL, 23, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(24, 'ISC024', 13, 'Pens', NULL, 24, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(25, 'ISC025', 14, 'Laptop', NULL, 25, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(26, 'ISC026', 14, 'Printer', NULL, 26, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(27, 'ISC027', 18, 'Cutting Disc', NULL, 27, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(28, 'ISC028', 18, 'Welding Rod', NULL, 28, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(29, 'ISC029', 19, 'Motor Spare', NULL, 29, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0),
(30, 'ISC030', 19, 'Pump Spare', NULL, 30, 0, 0, '2026-07-13 11:42:07', '2026-07-13 11:42:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `egc_item_types`
--

CREATE TABLE `egc_item_types` (
  `sno` int(10) UNSIGNED NOT NULL,
  `type_code` varchar(20) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `maintain_stock` tinyint(1) DEFAULT 1,
  `allow_purchase` tinyint(1) DEFAULT 1,
  `allow_sales` tinyint(1) DEFAULT 1,
  `is_asset` tinyint(1) DEFAULT 0,
  `description` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=Active,1=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `egc_item_types`
--

INSERT INTO `egc_item_types` (`sno`, `type_code`, `type_name`, `maintain_stock`, `allow_purchase`, `allow_sales`, `is_asset`, `description`, `sort_order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'IT001', 'Raw Material', 1, 1, 0, 0, NULL, 1, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(2, 'IT002', 'Semi Finished Goods', 1, 1, 1, 0, NULL, 2, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(3, 'IT003', 'Finished Goods', 1, 1, 1, 0, NULL, 3, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(4, 'IT004', 'Consumable', 1, 1, 0, 0, NULL, 4, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(5, 'IT005', 'Spare Part', 1, 1, 1, 0, NULL, 5, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(6, 'IT006', 'Tool', 1, 1, 0, 0, NULL, 6, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(7, 'IT007', 'Asset', 1, 1, 0, 1, NULL, 7, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(8, 'IT008', 'Service', 0, 1, 1, 0, NULL, 8, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(9, 'IT009', 'Packaging Material', 1, 1, 0, 0, NULL, 9, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0),
(10, 'IT010', 'Trading Item', 1, 1, 1, 0, NULL, 10, 0, 0, '2026-07-13 11:44:50', '2026-07-13 11:44:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_items`
--
ALTER TABLE `egc_items`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_item_code` (`item_code`),
  ADD KEY `idx_category` (`category_id`),
  ADD KEY `idx_subcategory` (`subcategory_id`),
  ADD KEY `idx_brand` (`brand_id`),
  ADD KEY `idx_type` (`item_type_id`),
  ADD KEY `idx_unit` (`unit_id`),
  ADD KEY `idx_vendor` (`preferred_vendor_id`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `egc_item_batch_settings`
--
ALTER TABLE `egc_item_batch_settings`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_batch_item` (`item_id`);

--
-- Indexes for table `egc_item_categories`
--
ALTER TABLE `egc_item_categories`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_category_code` (`category_code`),
  ADD UNIQUE KEY `uk_category_name` (`category_name`);

--
-- Indexes for table `egc_item_inventory_settings`
--
ALTER TABLE `egc_item_inventory_settings`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_item_warehouse` (`item_id`,`warehouse_id`),
  ADD KEY `fk_inventory_warehouse` (`warehouse_id`);

--
-- Indexes for table `egc_item_purchase_settings`
--
ALTER TABLE `egc_item_purchase_settings`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_item_vendor` (`item_id`,`preferred_vendor_id`),
  ADD KEY `fk_purchase_vendor` (`preferred_vendor_id`);

--
-- Indexes for table `egc_item_subcategories`
--
ALTER TABLE `egc_item_subcategories`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_subcategory_code` (`subcategory_code`),
  ADD KEY `idx_category` (`category_id`);

--
-- Indexes for table `egc_item_types`
--
ALTER TABLE `egc_item_types`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uk_type_code` (`type_code`),
  ADD UNIQUE KEY `uk_type_name` (`type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_items`
--
ALTER TABLE `egc_items`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `egc_item_batch_settings`
--
ALTER TABLE `egc_item_batch_settings`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `egc_item_categories`
--
ALTER TABLE `egc_item_categories`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `egc_item_inventory_settings`
--
ALTER TABLE `egc_item_inventory_settings`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `egc_item_purchase_settings`
--
ALTER TABLE `egc_item_purchase_settings`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `egc_item_subcategories`
--
ALTER TABLE `egc_item_subcategories`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `egc_item_types`
--
ALTER TABLE `egc_item_types`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egc_items`
--
ALTER TABLE `egc_items`
  ADD CONSTRAINT `fk_item_brand` FOREIGN KEY (`brand_id`) REFERENCES `egc_brands` (`sno`),
  ADD CONSTRAINT `fk_item_category` FOREIGN KEY (`category_id`) REFERENCES `egc_item_categories` (`sno`),
  ADD CONSTRAINT `fk_item_subcategory` FOREIGN KEY (`subcategory_id`) REFERENCES `egc_item_subcategories` (`sno`),
  ADD CONSTRAINT `fk_item_type` FOREIGN KEY (`item_type_id`) REFERENCES `egc_item_types` (`sno`),
  ADD CONSTRAINT `fk_item_unit` FOREIGN KEY (`unit_id`) REFERENCES `egc_units` (`sno`),
  ADD CONSTRAINT `fk_item_vendor` FOREIGN KEY (`preferred_vendor_id`) REFERENCES `egc_vendors` (`sno`);

--
-- Constraints for table `egc_item_batch_settings`
--
ALTER TABLE `egc_item_batch_settings`
  ADD CONSTRAINT `fk_batch_item` FOREIGN KEY (`item_id`) REFERENCES `egc_items` (`sno`);

--
-- Constraints for table `egc_item_inventory_settings`
--
ALTER TABLE `egc_item_inventory_settings`
  ADD CONSTRAINT `fk_inventory_item` FOREIGN KEY (`item_id`) REFERENCES `egc_items` (`sno`),
  ADD CONSTRAINT `fk_inventory_warehouse` FOREIGN KEY (`warehouse_id`) REFERENCES `egc_warehouses` (`sno`);

--
-- Constraints for table `egc_item_purchase_settings`
--
ALTER TABLE `egc_item_purchase_settings`
  ADD CONSTRAINT `fk_purchase_item` FOREIGN KEY (`item_id`) REFERENCES `egc_items` (`sno`),
  ADD CONSTRAINT `fk_purchase_vendor` FOREIGN KEY (`preferred_vendor_id`) REFERENCES `egc_vendors` (`sno`);

--
-- Constraints for table `egc_item_subcategories`
--
ALTER TABLE `egc_item_subcategories`
  ADD CONSTRAINT `fk_item_subcategory_category` FOREIGN KEY (`category_id`) REFERENCES `egc_item_categories` (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
