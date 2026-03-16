-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 05:14 PM
-- Server version: 8.0.44-0ubuntu0.24.04.2
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naman`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_directory`
--

CREATE TABLE `about_directory` (
  `id` int NOT NULL,
  `about_updated_date` datetime NOT NULL,
  `about_title` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title_highlights` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `about_paragraph` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_directory`
--

INSERT INTO `about_directory` (`id`, `about_updated_date`, `about_title`, `title_highlights`, `about_paragraph`) VALUES
(1, '2026-01-03 06:26:11', 'About Every great design begin with an even', 'better story', 'Since beginning my journey as a freelance designer nearly 8 years ago, I\'ve done remote work for agencies, consulted for startups, and collaborated with talented people to create digital products for both business and consumer use. I\'m quietly confident, naturally curious, and perpetually working on improving my chopsone design problem at a time.');

-- --------------------------------------------------------

--
-- Table structure for table `card_directory`
--

CREATE TABLE `card_directory` (
  `id` int NOT NULL,
  `card_updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `person_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_photo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `social_one` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `social_two` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `social_three` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `social_four` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `social_five` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `whatsapp_contact` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_dark_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `whatsapp_message` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `web_icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `web_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_directory`
--

INSERT INTO `card_directory` (`id`, `card_updated_date`, `person_name`, `profile_photo`, `email`, `address`, `company_name`, `social_one`, `social_two`, `social_three`, `social_four`, `social_five`, `whatsapp_contact`, `company_logo`, `company_dark_logo`, `whatsapp_message`, `web_icon`, `web_title`) VALUES
(1, '2026-01-06 14:53:45', 'Chandanjaiswallove', 'modules/assets/images/dpme.jpeg', 'hellodrake@gmail.com', 'Aidcom it Service Bettiah', 'Drake', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '917292818092', 'modules/assets/images/logo.png', 'modules/assets/images/logo_dark.png', 'Whatsapp message', 'modules/assets/images/cicon.png', 'Jaiswal');

-- --------------------------------------------------------

--
-- Table structure for table `company_logo_directory`
--

CREATE TABLE `company_logo_directory` (
  `id` int NOT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `company_logo` varchar(360) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_logo_directory`
--

INSERT INTO `company_logo_directory` (`id`, `date`, `company_logo`) VALUES
(1, '2026-01-06 17:09:41', 'modules/assets/images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_directory`
--

CREATE TABLE `contact_directory` (
  `id` int NOT NULL,
  `contact_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `visitor_fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `visitor_message` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_directory`
--

INSERT INTO `contact_directory` (`id`, `contact_date`, `visitor_fullname`, `visitor_email`, `visitor_phone`, `visitor_subject`, `visitor_message`) VALUES
(1, '2026-01-06 15:15:34', 'Rahul Jaiswal', 'rahul@gmail.com', '7292818092', 'website', 'i wanr to meet you');

-- --------------------------------------------------------

--
-- Table structure for table `introduce_directory`
--

CREATE TABLE `introduce_directory` (
  `id` int NOT NULL,
  `introduce_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `introduce_title` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `introduce_highlight` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `introduce_paragraph` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `experience` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_completed` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_download` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `introduce_directory`
--

INSERT INTO `introduce_directory` (`id`, `introduce_date`, `introduce_title`, `introduce_highlight`, `introduce_paragraph`, `experience`, `project_completed`, `project_download`) VALUES
(4, '2025-12-30 08:00:46', 'Say Hi from Framer Designer and Developer', 'Drake,', 'I design and code beautifully simple things and i love what i do. Just simple like that!I design and code beautifully simple things and i love what i do. Just simple like that!', '20+', '112+', '');

-- --------------------------------------------------------

--
-- Table structure for table `myskill_directory`
--

CREATE TABLE `myskill_directory` (
  `id` int NOT NULL,
  `skill_updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `skill_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skill_percentage` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skill_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myskill_directory`
--

INSERT INTO `myskill_directory` (`id`, `skill_updated_date`, `skill_logo`, `skill_percentage`, `skill_name`) VALUES
(1, '2026-01-06 14:46:22', 'modules/assets/images/laravel.png', '12%', 'Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_projects`
--

CREATE TABLE `portfolio_projects` (
  `id` int NOT NULL,
  `image_type` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_link` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `full_image` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `small_image` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `    project_title` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_tags`
--

CREATE TABLE `portfolio_tags` (
  `project_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_tags` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_tags`
--

INSERT INTO `portfolio_tags` (`project_id`, `project_tags`, `created_at`) VALUES
('', '', '2026-01-07 07:20:53'),
('1', 'HTML', '2026-01-07 07:26:46'),
('1', 'CSS', '2026-01-07 07:26:46'),
('1', 'Bootstrap', '2026-01-07 07:26:46'),
('2', 'PHP', '2026-01-07 07:26:46'),
('2', 'CodeIgniter', '2026-01-07 07:26:46'),
('2', 'MySQL', '2026-01-07 07:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_card`
--

CREATE TABLE `pricing_card` (
  `id` int NOT NULL,
  `plan_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `small_description` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pricing` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sample_url` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricing_items`
--

CREATE TABLE `pricing_items` (
  `id` int NOT NULL,
  `pricing_id` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_text` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register_directory`
--

CREATE TABLE `register_directory` (
  `id` int NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_directory`
--

INSERT INTO `register_directory` (`id`, `user_id`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Z7IGLN13', 'chandan@gmail.com', '$2y$10$2CRj8GO5A0HHrHPDU7ER8ePigWDOpbxJiRqu0NtRbJOgVSDN9m4kS', 1, '2026-01-07 10:11:25', '2026-01-07 10:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `resume_blocks`
--

CREATE TABLE `resume_blocks` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `block_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resume_block_dates`
--

CREATE TABLE `resume_block_dates` (
  `id` int NOT NULL,
  `block_id` int NOT NULL,
  `date_text` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resume_block_descriptions`
--

CREATE TABLE `resume_block_descriptions` (
  `id` int NOT NULL,
  `block_id` int NOT NULL,
  `description_text` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resume_block_titles`
--

CREATE TABLE `resume_block_titles` (
  `id` int NOT NULL,
  `block_id` int NOT NULL,
  `title_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_directory`
--

CREATE TABLE `services_directory` (
  `id` int NOT NULL,
  `updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `heading` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `projects_count` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_icon` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_directory`
--

INSERT INTO `services_directory` (`id`, `updated_date`, `heading`, `description`, `projects_count`, `service_icon`) VALUES
(1, '2026-01-06 15:56:59', 'head test', 'ser test', '44', 'modules/assets/images/cicon.png'),
(1, '2026-01-06 16:37:40', 'web development', 'we are ready for this', '34', 'modules/assets/images/dpme.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_directory`
--

CREATE TABLE `testimonial_directory` (
  `id` int NOT NULL,
  `testimonial_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `profile_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_photo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `client_review` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `client_project_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial_directory`
--

INSERT INTO `testimonial_directory` (`id`, `testimonial_date`, `profile_name`, `profile_photo`, `company_name`, `client_review`, `client_project_name`) VALUES
(1, '2026-01-06 16:38:44', 'Karate Classes', 'modules/assets/images/dpme.jpeg', 'Martials Arts', 'lorem review', 'solar system');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_directory`
--
ALTER TABLE `about_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_directory`
--
ALTER TABLE `card_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_logo_directory`
--
ALTER TABLE `company_logo_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_directory`
--
ALTER TABLE `contact_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduce_directory`
--
ALTER TABLE `introduce_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myskill_directory`
--
ALTER TABLE `myskill_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_projects`
--
ALTER TABLE `portfolio_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_card`
--
ALTER TABLE `pricing_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_items`
--
ALTER TABLE `pricing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_directory`
--
ALTER TABLE `register_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_blocks`
--
ALTER TABLE `resume_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_block_dates`
--
ALTER TABLE `resume_block_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_block_descriptions`
--
ALTER TABLE `resume_block_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_block_titles`
--
ALTER TABLE `resume_block_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_directory`
--
ALTER TABLE `testimonial_directory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_directory`
--
ALTER TABLE `about_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_directory`
--
ALTER TABLE `card_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_logo_directory`
--
ALTER TABLE `company_logo_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_directory`
--
ALTER TABLE `contact_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `introduce_directory`
--
ALTER TABLE `introduce_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myskill_directory`
--
ALTER TABLE `myskill_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_projects`
--
ALTER TABLE `portfolio_projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing_card`
--
ALTER TABLE `pricing_card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing_items`
--
ALTER TABLE `pricing_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_directory`
--
ALTER TABLE `register_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resume_blocks`
--
ALTER TABLE `resume_blocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resume_block_dates`
--
ALTER TABLE `resume_block_dates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resume_block_descriptions`
--
ALTER TABLE `resume_block_descriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resume_block_titles`
--
ALTER TABLE `resume_block_titles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial_directory`
--
ALTER TABLE `testimonial_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
