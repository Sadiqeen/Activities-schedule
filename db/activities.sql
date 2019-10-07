-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 04:26 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activities`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detail` text,
  `url` text,
  `place` varchar(250) NOT NULL DEFAULT 'Unknow',
  `color` varchar(10) NOT NULL DEFAULT '#00a65a',
  `is_all_day` int(11) NOT NULL DEFAULT '1',
  `Department_id` int(11) NOT NULL,
  `Users_id` int(11) NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `start_time`, `end_time`, `detail`, `url`, `place`, `color`, `is_all_day`, `Department_id`, `Users_id`, `approve`) VALUES
(21, 'First meet', '2018-10-25 17:00:00', '2018-10-26 16:59:00', 'What is real love', '', 'Art building', '#00a65a', 0, 30, 6, 2),
(22, 'About me', '2018-10-25 17:00:00', '2018-10-26 16:59:00', 'First meet with new student union theme', 'test.com', 'Science building', '#00a65a', 0, 2, 10, 2),
(23, '1233', '2018-10-25 17:00:00', '2018-10-26 16:59:00', 'First meet with new student union theme', 'test.com', 'Science building', '#00a65a', 0, 2, 10, 2),
(24, 'Flickr Images', '2018-10-25 17:00:00', '2018-10-26 16:59:00', 'First meet with new student union theme', 'test.com', 'Science building', '#00a65a', 0, 29, 11, 1),
(25, 'About me2', '2018-10-25 17:00:00', '2018-10-26 16:59:00', 'First meet with new student union theme', 'test.com', 'Science building', '#00a65a', 0, 29, 11, 2),
(26, 'First meet', '2018-10-25 17:00:00', '2018-10-26 16:59:00', 'First meet with new student union theme', '', 'Science building', '#00a65a', 0, 41, 10, 2),
(27, 'Art Seminar', '2018-10-30 01:30:00', '2018-11-07 07:30:00', 'Art seminar', '', 'Wannor Hall', '#00a65a', 0, 36, 10, 1),
(29, 'First meet', '2018-10-27 05:30:00', '2018-10-27 09:30:00', 'What is real love', 'http://reg.ftu.ac.th/registrar/home.asp', 'Science building', '#00a65a', 0, 4, 6, 1),
(32, 'About me', '2018-10-26 17:00:00', '2018-10-27 16:59:00', 'First meet with new student union theme', 'http://reg.ftu.ac.th/registrar/home.asp', 'Science building', '#00a65a', 0, 36, 10, 1),
(33, 'Flickr Images', '2018-10-26 17:00:00', '2018-10-27 16:59:00', 'das', 'http://reg.ftu.ac.th/registrar/home.asp', 'Science building', '#00a65a', 0, 2, 10, 2),
(34, 'Multimedia workshop', '2018-10-01 04:00:00', '2018-10-08 07:00:00', 'All IT student', '', 'Multimedia room', '#00a65a', 0, 29, 13, 1),
(38, 'Ice cream day', '2018-10-29 05:00:00', '2018-10-31 13:00:00', 'All RD student', '', 'DFtu', '#00a65a', 0, 28, 13, 1),
(39, 'test', '2018-11-22 15:11:00', '2018-11-22 16:59:00', 'Detail of activities', '', 'Science 2nd floor', '#00a65a', 0, 2, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `Faculties_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dname`, `Faculties_id`) VALUES
(1, 'All', 1),
(2, 'All', 4),
(3, 'All', 3),
(4, 'All', 5),
(5, 'All', 2),
(6, 'All', 6),
(28, 'Research and Development of Halal Product', 2),
(29, ' Information Technology (English Program)', 2),
(30, 'Teaching Malay', 3),
(31, 'Teaching English', 3),
(32, 'Teaching Chemistry', 3),
(33, ' Teaching General Science', 3),
(34, 'Teaching Arabic Language', 3),
(35, 'Teaching Islamic Studies', 3),
(36, 'Business Administration', 4),
(37, 'Malay (International Program)', 4),
(38, 'English (International Program)', 4),
(39, 'Financial Economics and Banking', 4),
(40, 'Public Administration', 4),
(41, 'Arabic (International Program)', 4),
(42, 'Al-Quran and al-Sunnah ( International Program)', 5),
(43, 'Shariah', 5),
(44, 'Usuluddin (International Program)', 5),
(45, 'Islamic Studies', 5),
(46, 'Laws Program', 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `fname`, `color`) VALUES
(1, 'Fatoni', '#00a65a'),
(2, 'Science', '#f39c12'),
(3, 'Education', '#00c0ef'),
(4, 'Arts', '#3c8dbc'),
(5, 'Islamic', '#dd4b39'),
(6, 'Club', '#605ca8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `position` int(11) NOT NULL COMMENT '1 admin;2 fac;3depart',
  `departments_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `position`, `departments_id`, `created_at`, `updated_at`) VALUES
(6, 'sadiqeen0702', 'admin@admin.com', '$2y$10$zu8r9J07PXXXOL1o3VasBePbj9gnlR8ofQY1V6TiSutedXlrRXZ1u', 1, 28, NULL, '2018-10-26 09:05:11'),
(10, 'Sarawut Rakchat', 'admin2@admin.com', '$2y$10$jSpE0cAh1eyuWetIqjmO1OGr6dIGF9k5IwmrqtjpCLKhBMgLNfroy', 2, 36, NULL, '2018-10-26 10:28:13'),
(11, 'wordpress', 'admin@gmail.com', '$2y$10$Ol8Jb53zbSVBm9qwCEG0buX26Hkh.jxVT0EWpecdONXfDcloEivki', 3, 29, NULL, '2018-10-26 11:10:19'),
(12, 'Sarawut Rakchat', 'function@gmail.com', '$2y$10$m35r0eOWqKiZMFkXehJObOzLVhkhxrdGNAdCwGMCxdGXq6zAjLB/2', 2, 39, NULL, '2018-10-26 18:10:13'),
(13, 'Abbas Langputeh', 'abslpt@gmail.com', '$2y$10$YmxCGXS/UxQ6k7iIbFLJJe7YCFWugWB8LZmb8ar01wO..iTGRNN/S', 2, 29, NULL, '2018-10-26 19:35:31'),
(16, 'KRIYA LANGPUTEH', 'zafilmas@gmail.com', '$2y$10$8fuMt1LASF/4rL0FqEt70.oGvFNvFj2JWxQAKiURfFyhvxhQiTTxW', 3, 31, NULL, '2018-10-28 13:23:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Activities_Department1_idx` (`Department_id`),
  ADD KEY `fk_Activities_Users1_idx` (`Users_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Department_Faculties_idx` (`Faculties_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_users_departments1_idx` (`departments_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_Activities_Department1` FOREIGN KEY (`Department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Activities_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_Department_Faculties` FOREIGN KEY (`Faculties_id`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_departments1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
