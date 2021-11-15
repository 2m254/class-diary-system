-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 12:16 AM
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
-- Table structure for table `class_diary_tbl`
--

CREATE TABLE `class_diary_tbl` (
  `cd_id` int(5) NOT NULL,
  `week` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `dat` varchar(30) NOT NULL,
  `de_id` int(50) NOT NULL,
  `le_id` int(50) NOT NULL,
  `mo_id` int(50) NOT NULL,
  `lect_id` int(50) NOT NULL,
  `start_time` varchar(40) NOT NULL,
  `end_time` varchar(40) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `toc` varchar(100) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `commdesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `de_id` int(5) NOT NULL,
  `de_title` varchar(50) NOT NULL,
  `de_short` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `modules_tbl`
--

CREATE TABLE `modules_tbl` (
  `mo_id` int(5) NOT NULL,
  `mo_title` varchar(50) NOT NULL,
  `mo_code` varchar(10) NOT NULL,
  `mo_credit` int(2) NOT NULL,
  `le_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roll_tbl`
--

CREATE TABLE `roll_tbl` (
  `ro_id` int(5) NOT NULL,
  `ro_title` varchar(20) NOT NULL,
  `de_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount_tbl`
--

CREATE TABLE `useraccount_tbl` (
  `ua_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `ro_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `roll_tbl`
--
ALTER TABLE `roll_tbl`
  ADD PRIMARY KEY (`ro_id`),
  ADD KEY `de_id` (`de_id`);

--
-- Indexes for table `useraccount_tbl`
--
ALTER TABLE `useraccount_tbl`
  ADD PRIMARY KEY (`ua_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ro_id` (`ro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_diary_tbl`
--
ALTER TABLE `class_diary_tbl`
  MODIFY `cd_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `de_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  MODIFY `lect_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_tbl`
--
ALTER TABLE `level_tbl`
  MODIFY `le_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  MODIFY `mo_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roll_tbl`
--
ALTER TABLE `roll_tbl`
  MODIFY `ro_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccount_tbl`
--
ALTER TABLE `useraccount_tbl`
  MODIFY `ua_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for table `roll_tbl`
--
ALTER TABLE `roll_tbl`
  ADD CONSTRAINT `roll_tbl_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `department_tbl` (`de_id`);

--
-- Constraints for table `useraccount_tbl`
--
ALTER TABLE `useraccount_tbl`
  ADD CONSTRAINT `useraccount_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`user_id`);

--
-- Constraints for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`ro_id`) REFERENCES `roll_tbl` (`ro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
