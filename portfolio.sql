-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2026 at 03:57 PM
-- Server version: 8.0.45-0ubuntu0.22.04.1
-- PHP Version: 8.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
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
(1, '2026-03-08 05:20:43', 'Every great design begin with', 'BEETER story', 'Since beginning my journey as a freelance designer nearly 8 years ago, I\'ve done remote work for agencies, consulted for startups, and collaborated with talented people to create digital products for both business and consumer use. I\'m quietly confident, naturally curious, and perpetually working on improving my chopsone design problem at a time.');

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
(1, '2026-03-08 10:16:37', 'Chandanjaiswallove', 'modules/assets/images/dpme.jpeg', 'hellodrake@gmail.com', 'Aidcom it Service Bettiah', 'Drake', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '917292818092', 'modules/assets/images/logo.png', 'modules/assets/images/logo_dark.png', 'Thank you for your message. We\'re unavailable right now, but will respond as soon as possible. ', 'uploads/profile/company_icon_6964925d97eb31.93487644', 'Jaiswal');

-- --------------------------------------------------------

--
-- Table structure for table `company_logo_directory`
--

CREATE TABLE `company_logo_directory` (
  `id` int NOT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `company_logo` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_logo_directory`
--

INSERT INTO `company_logo_directory` (`id`, `date`, `company_logo`) VALUES
(11, '2026-03-08 08:06:41', 'uploads/testimonials/872f289d5b55aa9b454fe9b3042c5e23.png'),
(12, '2026-03-08 08:06:51', 'uploads/testimonials/2bc784135ba4148566ef0739d57ad82b.png'),
(13, '2026-03-08 08:07:03', 'uploads/testimonials/a8b5785a4f4f29d415efad29ec9ed970.png');

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
  `visitor_message` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_blocks`
--

CREATE TABLE `education_blocks` (
  `id` int NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_blocks`
--

INSERT INTO `education_blocks` (`id`, `date`, `created_at`) VALUES
(62, '2026 - Present', '2026-02-17 09:26:09'),
(63, '2022 - 2025', '2026-02-17 09:26:09'),
(64, '2019 - 2022', '2026-02-17 09:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `education_items`
--

CREATE TABLE `education_items` (
  `id` int NOT NULL,
  `block_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_items`
--

INSERT INTO `education_items` (`id`, `block_id`, `title`, `description`) VALUES
(118, 62, 'Framer Desinger & Developer', 'Brunodee Agency'),
(119, 62, 'Front-End WordPress Developer', 'Envato Market'),
(120, 63, 'Webflow Developer & Co-Founder', 'Designflow Studio'),
(121, 63, 'Web Designer', 'Freelance'),
(122, 63, 'Leader Team of Marketing', 'AHA Marketing Agency'),
(123, 64, 'Bachelor Degree of Information Technology', 'US RMIT University');

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
(4, '2026-03-08 10:50:11', 'Webflow Designer and Developer', 'CJLLL,', 'I design and code beautifully simple things and i love what i do. Just simple like that!', '71+', '182+', 'uploads/projects/1768198188_newProjectCreationCodeigniter.pdf');

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
(5, '2026-03-08 06:59:46', 'uploads/skill/f0ba25325a2b02c1781e5e72a69db42b.png', '11', 'Laravel '),
(6, '2026-03-08 07:01:57', 'uploads/skill/3197eea1d956d7071d21fd3282fc8a74.png', '14', 'React');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_projects`
--

CREATE TABLE `portfolio_projects` (
  `id` int NOT NULL,
  `project_link` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `full_image` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `project_title` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_projects`
--

INSERT INTO `portfolio_projects` (`id`, `project_link`, `created_at`, `full_image`, `project_title`) VALUES
(9, 'http://localhost/Portfolio/', '2026-03-08 12:53:01', 'uploads/portproject/f6106c6d5b465546ad4709164ae9025f.jpg', 'Bureau - Architecture Studio Website');

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
('9', 'Framer', '2026-03-08 07:23:01'),
('9', 'WordPress', '2026-03-08 07:23:01');

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
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing_card`
--

INSERT INTO `pricing_card` (`id`, `plan_name`, `small_description`, `pricing`, `duration`, `sample_url`, `created_at`, `updated_at`) VALUES
(25, 'Basic', 'Short Description', '999', '2 Years ', 'https://www.facebook.com/chandanjaiswalloves', '2026-03-10 08:49:07', '2026-03-09 21:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_items`
--

CREATE TABLE `pricing_items` (
  `pricing_id` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_text` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing_items`
--

INSERT INTO `pricing_items` (`pricing_id`, `item_text`, `created_at`, `updated_at`) VALUES
('25', 'Don\'t need wireframe or anything', '2026-03-10 03:19:07', '0000-00-00 00:00:00'),
('25', 'Instagram Facebook', '2026-03-10 03:19:07', '0000-00-00 00:00:00'),
('25', 'Don\'t need wireframe or anything', '2026-03-10 03:19:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register_directory`
--

CREATE TABLE `register_directory` (
  `id` int NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_directory`
--

INSERT INTO `register_directory` (`id`, `user_id`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(2, '2', '223', '23', 2, '2026-01-21 20:12:14', '2026-01-21 20:12:14'),
(5, 'Z7IGLN13', 'chandan@gmail.com', '$2y$10$2CRj8GO5A0HHrHPDU7ER8ePigWDOpbxJiRqu0NtRbJOgVSDN9m4kS', 1, '2026-01-07 10:11:25', '2026-01-07 10:11:25');

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
(11, '2026-03-08 06:48:51', 'Website Design', 'I created digital products with unique ideas use Figma & Framer\r\n\r\n', '24 Projects', 'uploads/services/5fd87dfb29ab118a216c6b03a2019dda.png'),
(12, '2026-03-08 06:51:47', 'Seo Marketing', 'Here\'s what\'s happening with seo project know today.', 'Projects', 'uploads/services/5fa5aa5c02c6b803d5c1078a347e736d.png');

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
  `client_project_name` varchar(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial_directory`
--

INSERT INTO `testimonial_directory` (`id`, `testimonial_date`, `profile_name`, `profile_photo`, `company_name`, `client_review`, `client_project_name`, `updated_at`) VALUES
(33, '2026-01-22 16:52:44', 'Web Development 1', 'uploads/testimonials/84fdbb28a2bf9ce7baad7a11ed051336.jpg', 'Aidcom It Service & Solutions Bettiah1', 'we are here ...11', 'Robin Kujur 1', '2026-01-22 11:22:44'),
(35, '2026-03-08 08:24:46', 'Rockey Michels', 'uploads/testimonials/91e718f7437913b25635a39b2d515c23.png', 'Sulzon Global', '“Extremely profressional and fast service!. Drake is amaster of code and he also very creative. We done 3 projectswith him and certain will continue.”', 'Green Engergy', '2026-03-08 13:54:46');

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
-- Indexes for table `education_blocks`
--
ALTER TABLE `education_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_items`
--
ALTER TABLE `education_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_id` (`block_id`);

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
-- Indexes for table `register_directory`
--
ALTER TABLE `register_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_directory`
--
ALTER TABLE `services_directory`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_directory`
--
ALTER TABLE `contact_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `education_blocks`
--
ALTER TABLE `education_blocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `education_items`
--
ALTER TABLE `education_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `introduce_directory`
--
ALTER TABLE `introduce_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myskill_directory`
--
ALTER TABLE `myskill_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio_projects`
--
ALTER TABLE `portfolio_projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pricing_card`
--
ALTER TABLE `pricing_card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `register_directory`
--
ALTER TABLE `register_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services_directory`
--
ALTER TABLE `services_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonial_directory`
--
ALTER TABLE `testimonial_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education_items`
--
ALTER TABLE `education_items`
  ADD CONSTRAINT `education_items_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `education_blocks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
