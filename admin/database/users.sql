-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 02:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

-- CREATE TABLE `users` (
--   `id` int(11) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   `email` varchar(50) NOT NULL,
--   `username` varchar(50) NOT NULL,
--   `password` text NOT NULL,
--   `status` int(15) NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
--   `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- -- Indexes for dumped tables
-- --

-- --
-- -- Indexes for table `users`
--
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`);

--   ALTER TABLE `users`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- COMMIT;
-- end Users--

-- customer table start--
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;
-- customer table end--

-- start about table--
-- DROP TABLE IF EXISTS `abouts`;
-- CREATE TABLE IF NOT EXISTS `abouts` (
--   `id` int(11) NOT NULL,
--   `top_title` varchar(30) NOT NULL,
--   `top_desc` text NOT NULL,
--   `title` varchar(50) NOT NULL,
--   `description` text NOT NULL,
--   `img` varchar(255) NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end about table--

-- Start table skills--
-- DROP TABLE IF EXISTS `skills`;
-- CREATE TABLE IF NOT EXISTS `skills` (
--   `id` int(11) NOT NULL,
--   `title` varchar(30) NOT NULL,
--   `description` text NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end table skills--

-- start table fact--
-- DROP TABLE IF EXISTS `facts`;
-- CREATE TABLE IF NOT EXISTS `facts` (
--   `id` int(11) NOT NULL,
--   `numbers` int(11) NOT NULL,
--   `title` varchar(30) NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end table facts--

-- start table testimonials--
-- DROP TABLE IF EXISTS `testimonials`;
-- CREATE TABLE IF NOT EXISTS `testimonials` (
--   `id` int(11) NOT NULL,
--   `img` varchar(255) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   `position` varchar(50) NOT NULL,
--   `message` text NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end table testimonials--

-- start table services--
-- DROP TABLE IF EXISTS `services`;
-- CREATE TABLE IF NOT EXISTS `services` (
--   `id` int(11) NOT NULL,
--   `icon` varchar(255) NOT NULL,
--   `title` varchar(50) NOT NULL,
--   `description` text NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end table services--

-- start table contacts--
-- DROP TABLE IF EXISTS `contacts`;
-- CREATE TABLE IF NOT EXISTS `contacts` (
--   `id` int(11) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   `email` varchar(50) NOT NULL,
--   `subject` varchar(50) NOT NULL,
--   `message` text NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end table contacts--

-- start table files--
-- DROP TABLE IF EXISTS `files`;
-- CREATE TABLE IF NOT EXISTS `files` (
--   `id` int(11) NOT NULL,
--   `title` varchar(30) NOT NULL,
--   `description` text NOT NULL,
--   `img_link` varchar(255) NOT NULL,
--   `type` varchar(15) NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end table files--

-- start setting--
-- DROP TABLE IF EXISTS `settings`;
-- CREATE TABLE IF NOT EXISTS `settings` (
--   `id` int(11) NOT NULL,
--   `site_key` varchar(30) NOT NULL,
--   `site_value` text NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end setting--

-- start resume titles--
-- DROP TABLE IF EXISTS `resume_titles`;
-- CREATE TABLE IF NOT EXISTS `resume_titles` (
--   `id` int(11) NOT NULL,
--   `title` varchar(30) NOT NULL,
--   `status` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end resume titles--

-- start resume--
-- DROP TABLE IF EXISTS `resume`;
-- CREATE TABLE IF NOT EXISTS `resume` (
--   `id` int(11) NOT NULL,
--   `resume_title_id` int(11) NOT NULL,
--   `title` varchar(30) NOT NULL,
--   `start_date` varchar(30) NOT NULL,
--   `end_date` varchar(30) NOT NULL,
--   `org_name` varchar(30) NOT NULL,
--   `description` int(11) NOT NULL DEFAULT 1,
--    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- COMMIT;
-- end resume--
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--



