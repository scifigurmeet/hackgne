-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 04:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL,
  `access_user_ids` text NOT NULL,
  `structure` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `description`, `create_time`, `update_time`, `status`, `access_user_ids`, `structure`) VALUES
(1, 'Jordan Myers', 'Adipisicing sit eni', '2019-10-04 17:58:35', '2019-10-04 17:58:35', '0', '1,2,3', 'a:2:{i:0;a:3:{s:10:\"field_name\";s:11:\"Venus Vance\";s:10:\"field_type\";s:16:\"selected_options\";s:17:\"field_description\";s:18:\"Velit quaerat sint\";}i:1;a:3:{s:10:\"field_name\";s:12:\"Baker Juarez\";s:10:\"field_type\";s:16:\"selected_options\";s:17:\"field_description\";s:19:\"Et illum cillum sun\";}}'),
(2, 'Hackathon Registration', 'Registration Form For Hackathon 2019 @ GNDEC', '2019-10-04 18:39:50', '2019-10-04 18:39:50', '0', '1,2,3', 'a:3:{i:0;a:3:{s:10:\"field_name\";s:9:\"Team Name\";s:10:\"field_type\";s:4:\"text\";s:17:\"field_description\";N;}i:1;a:3:{s:10:\"field_name\";s:16:\"Team Leader Name\";s:10:\"field_type\";s:4:\"text\";s:17:\"field_description\";N;}i:2;a:3:{s:10:\"field_name\";s:19:\"Team Leader Contact\";s:10:\"field_type\";s:4:\"text\";s:17:\"field_description\";N;}}'),
(3, 'Thane Hughes', 'Autem lorem consequu', '2019-10-04 18:41:12', '2019-10-04 18:41:12', '0', '1,2,3', 'a:1:{i:0;a:3:{s:10:\"field_name\";s:11:\"Sarah Brown\";s:10:\"field_type\";s:16:\"selected_options\";s:17:\"field_description\";s:7:\"A|B|C|D\";}}'),
(4, 'Students Data Collect', 'Anything', '2019-10-05 01:37:18', '2019-10-05 01:37:18', '0', '1,2,3', 'a:2:{i:0;a:3:{s:10:\"field_name\";s:5:\"Hello\";s:10:\"field_type\";s:4:\"text\";s:17:\"field_description\";N;}i:1;a:3:{s:10:\"field_name\";s:4:\"Test\";s:10:\"field_type\";s:16:\"selected_options\";s:17:\"field_description\";s:25:\"Option 1|Option2|Option 3\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`id`, `form_id`, `user_id`, `data`) VALUES
(3, 2, 5, 'a:3:{i:0;s:6:\"Team 1\";i:1;s:6:\"Leader\";i:2;s:10:\"9876541230\";}');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` text NOT NULL,
  `member_user_ids` text NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `description` longtext,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `member_user_ids`, `created_by_user_id`, `description`, `created_on`) VALUES
(1, 'Document Buddies', '1,2,3', 1, 'Hello buddies', '2019-10-04 15:36:23'),
(2, 'File Buddies', '1,2,3', 1, 'Hello buddies', '2019-10-04 15:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sent_files`
--

CREATE TABLE `sent_files` (
  `id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `sent_from_id` int(11) NOT NULL,
  `sent_to_ids` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_files`
--

INSERT INTO `sent_files` (`id`, `document_id`, `sent_from_id`, `sent_to_ids`, `description`) VALUES
(1, 22, 1, '1,2', 'Adipisicing sit eni'),
(2, 22, 4, '5', 'hello'),
(3, 1, 1, '5', 'Adipisicing sit eni'),
(4, 2, 5, '1', 'Image'),
(5, 2, 1, '4,5', NULL),
(6, 1, 1, '4', 'Adipisicing sit eni'),
(7, 1, 0, '1', 'Scanned With QR Code'),
(8, 1, 0, '1', 'Scanned With QR Code'),
(9, 1, 0, '1', 'Scanned With QR Code'),
(10, 1, 0, '1', 'Scanned With QR Code');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `name` text,
  `path` text NOT NULL,
  `mime_type` text NOT NULL,
  `allowed_users` text,
  `upload_user_id` int(11) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_size` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `mime_type`, `allowed_users`, `upload_user_id`, `upload_time`, `file_size`) VALUES
(1, '6_4_19 Lead Form_Leads_2019-04-06_2019-05-11.csv', '5d97a0424b378.csv', 'csv', '6_4_19 Lead Form_Leads_2019-04-06_2019-05-11.csv', 1, '2019-10-04 19:40:50', '104.44 KB'),
(2, 'background-login.jpg', '5d97a0e2363b1.jpg', 'jpg', 'background-login.jpg', 5, '2019-10-04 19:43:30', '137.71 KB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `relation_id` int(11) NOT NULL DEFAULT '1',
  `password` text,
  `email_id` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `designation` text,
  `description` longtext,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `relation_id`, `password`, `email_id`, `mobile_number`, `designation`, `description`, `create_time`, `update_time`, `token`) VALUES
(1, 'Gurmeet', 'Singh', 'scifigurmeet', 1, '202cb962ac59075b964b07152d234b70', 'scifigurmeet@gmail.com', '9876543210', 'Developer', 'Developer', '2019-10-04 09:35:32', '2019-10-05 01:35:29', '5d97f36107f78'),
(2, 'Camilla', 'King', NULL, 1, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'cabo@mailinator.com', NULL, NULL, NULL, '2019-10-04 17:26:52', '2019-10-04 17:26:52', NULL),
(3, 'Shaeleigh', 'Frost', 'zinavykid', 1, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'gutypa@mailinator.com', NULL, NULL, NULL, '2019-10-04 17:27:25', '2019-10-04 17:27:25', NULL),
(4, 'Saksham', 'Bhatia', 'saksham', 1, '202cb962ac59075b964b07152d234b70', 'saksham@saksham.com', NULL, NULL, NULL, '2019-10-04 17:27:59', '2019-10-04 18:43:05', '5d9792b93233d'),
(5, 'Gurneet', 'Singh', 'gurneet', 1, '202cb962ac59075b964b07152d234b70', 'gurneet@gurneet.com', NULL, NULL, NULL, '2019-10-04 18:44:03', '2019-10-04 18:44:27', '5d97930b3e0aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_files`
--
ALTER TABLE `sent_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sent_files`
--
ALTER TABLE `sent_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
