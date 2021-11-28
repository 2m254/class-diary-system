-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 01:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cds-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year_tbl`
--

CREATE TABLE `academic_year_tbl` (
  `ay_id` int(5) NOT NULL,
  `year` varchar(20) NOT NULL,
  `semester` int(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_year_tbl`
--

INSERT INTO `academic_year_tbl` (`ay_id`, `year`, `semester`, `status`) VALUES
(1, '2020-2021', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_diary_tbl`
--

CREATE TABLE `class_diary_tbl` (
  `cd_id` int(5) NOT NULL,
  `week` varchar(10) NOT NULL,
  `ay_id` int(30) NOT NULL,
  `day` varchar(20) NOT NULL,
  `dat` varchar(30) NOT NULL,
  `de_id` int(50) NOT NULL,
  `le_id` int(50) NOT NULL,
  `level_room` text NOT NULL,
  `mo_id` int(50) NOT NULL,
  `lect_id` int(50) NOT NULL,
  `start_time` varchar(40) NOT NULL,
  `end_time` varchar(40) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `toc` varchar(100) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `commdesc` varchar(500) NOT NULL,
  `cm_comm` varchar(500) DEFAULT NULL,
  `cm_checked` int(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_diary_tbl`
--

INSERT INTO `class_diary_tbl` (`cd_id`, `week`, `ay_id`, `day`, `dat`, `de_id`, `le_id`, `level_room`, `mo_id`, `lect_id`, `start_time`, `end_time`, `activity`, `toc`, `comment`, `commdesc`, `cm_comm`, `cm_checked`, `status`) VALUES
(1, '1', 2020, 'Tuesday ', '2021-11-27', 4, 14, 'B', 11, 8, '07:07', '00:07', 'Theory', 'introduction ', 'Not Understandable', 'not explain well.', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `de_id` int(5) NOT NULL,
  `de_title` varchar(50) NOT NULL,
  `de_short` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`de_id`, `de_title`, `de_short`) VALUES
(4, 'IT', 'IT'),
(5, 'ET', 'ET'),
(6, 'RE', 'RE');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_tbl`
--

CREATE TABLE `lecture_tbl` (
  `lect_id` int(5) NOT NULL,
  `lect_name` varchar(50) NOT NULL,
  `lect_assistant` varchar(50) NOT NULL,
  `mo_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture_tbl`
--

INSERT INTO `lecture_tbl` (`lect_id`, `lect_name`, `lect_assistant`, `mo_id`) VALUES
(8, 'Ethiene', 'Nepo', 11);

-- --------------------------------------------------------

--
-- Table structure for table `level_tbl`
--

CREATE TABLE `level_tbl` (
  `le_id` int(5) NOT NULL,
  `le_title` varchar(30) NOT NULL,
  `le_class` varchar(10) NOT NULL,
  `de_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_tbl`
--

INSERT INTO `level_tbl` (`le_id`, `le_title`, `le_class`, `de_id`) VALUES
(13, 'level 6', 'A', 6),
(14, 'level 1', 'B', 6),
(15, 'level 1', 'B', 4),
(16, 'level 1', 'A', 4),
(17, 'level 2', 'B', 4),
(18, 'level 2', 'A', 4),
(19, 'level 3', 'A', 4),
(20, 'level 3', 'B', 4),
(21, 'level 3', 'C', 4);

-- --------------------------------------------------------

--
-- Table structure for table `modules_tbl`
--

CREATE TABLE `modules_tbl` (
  `mo_id` int(5) NOT NULL,
  `mo_title` varchar(50) NOT NULL,
  `mo_code` varchar(10) NOT NULL,
  `mo_credit` int(2) NOT NULL,
  `ay_id` int(30) NOT NULL,
  `le_id` int(50) NOT NULL,
  `department` text NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules_tbl`
--

INSERT INTO `modules_tbl` (`mo_id`, `mo_title`, `mo_code`, `mo_credit`, `ay_id`, `le_id`, `department`, `status`) VALUES
(11, 'Linux', 'ict105', 10, 2020, 14, 'IT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `post` text NOT NULL,
  `level_name` text NOT NULL,
  `level_room` text NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `fname`, `lname`, `username`, `password`, `post`, `level_name`, `level_room`, `department`) VALUES
(1, '', '', 'hod', 'hod', 'HOD', 'all', 'all', 'IT'),
(5, '', '', 'hod', 'hodre', 'HOD', 'all', '', 'RE'),
(6, '', '', 'hod', 'hodet', 'HOD', '', '', 'ET'),
(8, 'Habimana', 'Gerve', 'gerve', 'gerve', 'CR', 'level 3', 'A', 'RE'),
(9, 'Mushimiyimana', 'Aimme', 'aimme', 'aimme123', 'CM', 'level 3', 'A', 'RE'),
(12, 'david', 'muhirwa', 'david', 'david', 'CR', 'level 1', 'B', 'IT'),
(13, 'sada', 'sada', 'sada', 'sada123', 'CM', 'level 1', 'B', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year_tbl`
--
ALTER TABLE `academic_year_tbl`
  ADD PRIMARY KEY (`ay_id`);

--
-- Indexes for table `class_diary_tbl`
--
ALTER TABLE `class_diary_tbl`
  ADD PRIMARY KEY (`cd_id`),
  ADD KEY `de_id` (`de_id`),
  ADD KEY `mo_id` (`mo_id`),
  ADD KEY `le_id` (`le_id`),
  ADD KEY `lect_id` (`lect_id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  ADD PRIMARY KEY (`lect_id`),
  ADD KEY `mo_id` (`mo_id`);

--
-- Indexes for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD PRIMARY KEY (`le_id`),
  ADD KEY `de_id` (`de_id`);

--
-- Indexes for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  ADD PRIMARY KEY (`mo_id`),
  ADD KEY `le_id` (`le_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year_tbl`
--
ALTER TABLE `academic_year_tbl`
  MODIFY `ay_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_diary_tbl`
--
ALTER TABLE `class_diary_tbl`
  MODIFY `cd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `de_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  MODIFY `lect_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `level_tbl`
--
ALTER TABLE `level_tbl`
  MODIFY `le_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  MODIFY `mo_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_diary_tbl`
--
ALTER TABLE `class_diary_tbl`
  ADD CONSTRAINT `class_diary_tbl_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `department_tbl` (`de_id`),
  ADD CONSTRAINT `class_diary_tbl_ibfk_2` FOREIGN KEY (`mo_id`) REFERENCES `modules_tbl` (`mo_id`),
  ADD CONSTRAINT `class_diary_tbl_ibfk_3` FOREIGN KEY (`le_id`) REFERENCES `level_tbl` (`le_id`),
  ADD CONSTRAINT `class_diary_tbl_ibfk_4` FOREIGN KEY (`lect_id`) REFERENCES `lecture_tbl` (`lect_id`);

--
-- Constraints for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  ADD CONSTRAINT `lecture_tbl_ibfk_1` FOREIGN KEY (`mo_id`) REFERENCES `modules_tbl` (`mo_id`);

--
-- Constraints for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD CONSTRAINT `level_tbl_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `department_tbl` (`de_id`);

--
-- Constraints for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  ADD CONSTRAINT `modules_tbl_ibfk_1` FOREIGN KEY (`le_id`) REFERENCES `level_tbl` (`le_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
