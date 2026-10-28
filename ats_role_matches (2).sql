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
-- Table structure for table `egc_applicant_ats_role_analyses`
--

CREATE TABLE `egc_applicant_ats_role_analyses` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `applicant_sno` bigint(20) UNSIGNED NOT NULL,
  `run_sno` bigint(20) UNSIGNED DEFAULT NULL,
  `schema_version` varchar(40) NOT NULL,
  `engine` varchar(80) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `source_type` varchar(40) NOT NULL,
  `source_label` varchar(255) DEFAULT NULL,
  `role_catalog_hash` char(64) DEFAULT NULL,
  `resume_sha256` char(64) DEFAULT NULL,
  `resume_chars` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `overall_match_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `best_role_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `resume_quality_score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `match_count` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `role_catalog_size` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `semantic_candidate_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `candidate_data_confidence` decimal(5,2) DEFAULT NULL,
  `review_required` tinyint(1) NOT NULL DEFAULT 0,
  `retrieval_model` varchar(255) DEFAULT NULL,
  `scoring_version` varchar(80) DEFAULT NULL,
  `analysis_json` longtext NOT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `egc_applicant_ats_role_analyses`
--

INSERT INTO `egc_applicant_ats_role_analyses` (`sno`, `applicant_sno`, `run_sno`, `schema_version`, `engine`, `model`, `source_type`, `source_label`, `role_catalog_hash`, `resume_sha256`, `resume_chars`, `overall_match_score`, `best_role_score`, `resume_quality_score`, `match_count`, `role_catalog_size`, `semantic_candidate_count`, `candidate_data_confidence`, `review_required`, `retrieval_model`, `scoring_version`, `analysis_json`, `processed_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 19410, NULL, 'ats_role_matching.v3', 'egc_ats_role_matching', NULL, 'stored', 'Candidate resume text', '2ea8bdd56ed09723f5c1911b8b351477a3c0958a419bfe34c40e00b5c69e71e0', '409a87a53b45b57f1dc7a846ad97dc9900e49f299d403277f132cbc81c6ecd74', 1206, 0.00, 0.00, 65.00, 0, 0, 0, NULL, 0, NULL, NULL, '{\"schema_version\":\"ats_role_matching.v3\",\"engine\":\"egc_ats_role_matching\",\"model\":\"configured Hugging Face model\",\"role_catalog_hash\":\"2ea8bdd56ed09723f5c1911b8b351477a3c0958a419bfe34c40e00b5c69e71e0\",\"analysis\":{\"overall_match_score\":0,\"resume_quality_score\":65,\"ats_keyword_match_score\":30,\"skills_alignment_score\":45,\"experience_relevance_score\":30,\"impact_metrics_score\":10,\"role_responsibility_match_score\":20,\"candidate_summary\":\"BSc in Computer Science graduate with foundational knowledge in HTML and SQL. Has experience in a college-level project involving bike management systems. Demonstrates skills in problem-solving, teamwork, and communication. Currently a fresher with no professional work experience. Limited technical depth or measurable impact in resume.\",\"professional_domains\":[\"Software Development\",\"Education\",\"College Projects\"],\"current_designation\":\"Fresher\",\"previous_designations\":[],\"experience_summary\":\"No professional work experience. One college project (Mechzone) involving HTML and SQL for bike management. Academic background in BSc (Computer Science).\",\"seniority_assessment\":\"Entry level (Fresher)\",\"education_summary\":\"BSc in Computer Science (6.0\\/10.0 CGPA), Senior Secondary (PCM, 91%), Secondary (Science, 91.6%)\",\"strengths\":[\"Analytical thinking\",\"Problem-solving\",\"Teamwork\",\"Communication\",\"Adaptability\"],\"weaknesses\":[\"No professional experience\",\"No measurable project impact\",\"Limited technical depth\",\"No mention of software development tools or frameworks\"],\"missing_keywords\":[\"Full Stack Developer\",\"Front End Developer\",\"Back End Developer\",\"Software Engineering\",\"Development\",\"Project Management\"],\"resume_improvements\":[\"Include specific responsibilities and outcomes from the Mechzone project\",\"Add details on tools, technologies, or platforms used beyond HTML and SQL\",\"Highlight any problem-solving or business impact from projects\",\"Clarify role in team or project leadership\"],\"optimized_summary\":\"BSc in Computer Science graduate with foundational skills in HTML and SQL. Developed a bike management project (Mechzone) to support bike selling, exchange, and fuelling. Demonstrates strong analytical, problem-solving, and communication abilities. Seeking entry-level role in software development or IT support with opportunities to grow technically and professionally.\",\"data_quality_notes\":[\"Resume lacks professional experience or job titles\",\"Project details are minimal and lack measurable outcomes\",\"No evidence of technical depth or domain-specific expertise\"]},\"matches\":[],\"near_matches\":[],\"processed_at\":\"2026-09-22T09:57:12+00:00\"}', '2026-09-22 04:27:12', 0, 0, '2026-09-22 04:27:12', '2026-09-22 04:27:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egc_applicant_ats_role_analyses`
--
ALTER TABLE `egc_applicant_ats_role_analyses`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `uq_ats_analysis_applicant` (`applicant_sno`),
  ADD KEY `egc_applicant_ats_role_analyses_run_sno_index` (`run_sno`),
  ADD KEY `egc_applicant_ats_role_analyses_role_catalog_hash_index` (`role_catalog_hash`),
  ADD KEY `egc_applicant_ats_role_analyses_resume_sha256_index` (`resume_sha256`),
  ADD KEY `egc_applicant_ats_role_analyses_processed_at_index` (`processed_at`),
  ADD KEY `egc_applicant_ats_role_analyses_all_mtch_score_mtch_cnt_idx` (`overall_match_score`,`match_count`),
  ADD KEY `idx_ats_analysis_catalog_size` (`role_catalog_size`,`processed_at`),
  ADD KEY `idx_ats_analysis_review_required` (`review_required`,`processed_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egc_applicant_ats_role_analyses`
--
ALTER TABLE `egc_applicant_ats_role_analyses`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
