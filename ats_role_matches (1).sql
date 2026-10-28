-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 02:17 PM
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
-- Table structure for table `egc_applicant_ats_role_matches`
--

CREATE TABLE `egc_applicant_ats_role_matches` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `analysis_sno` bigint(20) UNSIGNED NOT NULL,
  `applicant_sno` bigint(20) UNSIGNED NOT NULL,
  `role_sno` bigint(20) UNSIGNED NOT NULL,
  `role_code` varchar(80) DEFAULT NULL,
  `role_name` varchar(150) NOT NULL,
  `role_family` varchar(100) DEFAULT NULL,
  `seniority_level` tinyint(3) UNSIGNED DEFAULT NULL,
  `match_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `semantic_fit_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `decision` varchar(30) NOT NULL DEFAULT 'match',
  `title_alignment_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `skill_alignment_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `education_alignment_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `mandatory_skill_coverage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `education_requirement_coverage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `candidate_experience_years` decimal(5,1) NOT NULL DEFAULT 0.0,
  `required_experience_years` decimal(5,1) NOT NULL DEFAULT 0.0,
  `confidence_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `scoring_version` varchar(80) DEFAULT NULL,
  `experience_alignment_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `responsibility_alignment_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `seniority_alignment_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `evidence_quality_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `reason` text DEFAULT NULL,
  `evidence_json` longtext DEFAULT NULL,
  `gaps_json` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_applicant_ats_role_matches`
--
ALTER TABLE `egc_applicant_ats_role_matches`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_ats_role_match_analysis_role` (`analysis_sno`,`role_sno`),
  ADD KEY `egc_applicant_ats_role_matches_analysis_sno_index` (`analysis_sno`),
  ADD KEY `egc_applicant_ats_role_matches_applicant_sno_index` (`applicant_sno`),
  ADD KEY `egc_applicant_ats_role_matches_role_sno_index` (`role_sno`),
  ADD KEY `egc_applicant_ats_role_matches_applicant_sno_match_score_index` (`applicant_sno`,`match_score`),
  ADD KEY `idx_ats_role_matches_applicant_decision_score` (`applicant_sno`,`decision`,`match_score`),
  ADD KEY `idx_ats_role_matches_confidence` (`confidence_score`,`match_score`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_applicant_ats_role_matches`
--
ALTER TABLE `egc_applicant_ats_role_matches`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
