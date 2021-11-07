-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 02:53 AM
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
-- Database: `cds_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_mentor_tbl`
--

CREATE TABLE `class_mentor_tbl` (
  `class_mentor_id` int(5) NOT NULL,
  `class_mentor_name` varchar(50) DEFAULT NULL,
  `le_id` int(5) DEFAULT NULL,
  `ro_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_mentor_tbl`
--

INSERT INTO `class_mentor_tbl` (`class_mentor_id`, `class_mentor_name`, `le_id`, `ro_id`) VALUES
(1, 'leatitia', 17, 5),
(2, 'Brezz', 3, 7),
(3, 'Sada', 16, 7),
(4, 'Mugabe', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `class_rep_tbl`
--

CREATE TABLE `class_rep_tbl` (
  `class_rep_id` int(5) NOT NULL,
  `class_rep_name` varchar(50) DEFAULT NULL,
  `le_id` int(5) DEFAULT NULL,
  `ro_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_rep_tbl`
--

INSERT INTO `class_rep_tbl` (`class_rep_id`, `class_rep_name`, `le_id`, `ro_id`) VALUES
(1, 'Davide', 18, 8),
(2, 'Kanyesaro', 13, 10),
(3, 'Moise teck', 3, 9),
(4, 'Gasirimu', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `de_id` int(5) NOT NULL,
  `de_title` varchar(50) DEFAULT NULL,
  `de_short` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`de_id`, `de_title`, `de_short`) VALUES
(1, 'INFORMATION TECHNOLOGY', 'IT'),
(2, 'ELECTRONIC TELECOMINICATION', 'ET'),
(3, 'RENUABLE ENERGY', 'RE'),
(4, 'ADMINISTRATOR', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_tbl`
--

CREATE TABLE `lecture_tbl` (
  `lect_id` int(5) NOT NULL,
  `lect_name` varchar(50) DEFAULT NULL,
  `lect_assistant` varchar(50) DEFAULT NULL,
  `mo_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture_tbl`
--

INSERT INTO `lecture_tbl` (`lect_id`, `lect_name`, `lect_assistant`, `mo_id`) VALUES
(1, 'Mugwaneza leatithie', 'Hirwa jean luc', 4),
(2, 'Arcade', 'Mugabe', 2),
(3, 'sada', 'Yves', 2),
(4, 'Karenzi', 'Kamanzi', 3),
(5, 'sada', 'jojo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level_tbl`
--

CREATE TABLE `level_tbl` (
  `le_id` int(5) NOT NULL,
  `le_title` varchar(20) DEFAULT NULL,
  `le_class` varchar(10) DEFAULT NULL,
  `de_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_tbl`
--

INSERT INTO `level_tbl` (`le_id`, `le_title`, `le_class`, `de_id`) VALUES
(1, 'level 6', 'A', 1),
(2, 'level 6', 'B', 1),
(3, 'level 6', 'A', 2),
(4, 'level 6', 'B', 2),
(5, 'level 6', 'A', 3),
(6, 'level 6', 'B', 3),
(7, 'level 7', 'A', 1),
(9, 'level 7', 'A', 2),
(10, 'level 7', 'B', 2),
(11, 'level 7', 'A', 3),
(12, 'level 7', 'B', 3),
(13, 'level 3', 'A', 1),
(14, 'level 3', 'B', 1),
(15, 'level 3', 'A', 2),
(16, 'level 3', 'B', 2),
(17, 'level 3', 'A', 3),
(18, 'level 3', 'B', 3),
(19, 'level 3', 'A', 3),
(20, 'level 3', 'B', 1),
(21, 'level 3', 'C', 1),
(22, 'level 3', 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_tbl`
--

CREATE TABLE `module_tbl` (
  `mo_id` int(5) NOT NULL,
  `mo_title` varchar(40) DEFAULT NULL,
  `mo_code` varchar(10) DEFAULT NULL,
  `mo_credits` int(2) DEFAULT NULL,
  `le_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_tbl`
--

INSERT INTO `module_tbl` (`mo_id`, `mo_title`, `mo_code`, `mo_credits`, `le_id`) VALUES
(1, 'DATABASE ADMINISTRATION', 'ICT200', 10, 1),
(2, 'ANALOG ', 'ETT200', 10, 2),
(3, 'POWER', 'RE201', 15, 5),
(4, 'NETWORKING', 'ict201', 15, 1),
(5, 'Mult Media', 'MUlt201', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE `role_tbl` (
  `ro_id` int(5) NOT NULL,
  `ro_title` varchar(30) DEFAULT NULL,
  `de_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_tbl`
--

INSERT INTO `role_tbl` (`ro_id`, `ro_title`, `de_id`) VALUES
(1, 'HOD', 1),
(2, 'HOD', 2),
(3, 'HOD', 3),
(4, 'REGISTRA', 4),
(5, 'CM', 1),
(6, 'CM', 2),
(7, 'CM', 3),
(8, 'CR', 1),
(9, 'CR', 2),
(10, 'CR', 3);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount_tbl`
--

CREATE TABLE `useraccount_tbl` (
  `ua_id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount_tbl`
--

INSERT INTO `useraccount_tbl` (`ua_id`, `username`, `password`, `user_id`) VALUES
(1, 'moses', 'moses123', 1),
(2, 'ethiene', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(5) NOT NULL,
  `fistname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `ro_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `fistname`, `lastname`, `phone`, `ro_id`) VALUES
(1, 'NIYITANGA', 'Moise', '0787196502', 4),
(2, 'HAVUMIRAGIRA', 'Ethiene', '0788231432', 1),
(3, 'SHIMIYIMANA', 'Arcade', '0787389942', 2),
(4, 'BANEZA', 'Christophe', '0787837372', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_mentor_tbl`
--
ALTER TABLE `class_mentor_tbl`
  ADD PRIMARY KEY (`class_mentor_id`),
  ADD KEY `ro_id` (`ro_id`),
  ADD KEY `le_id` (`le_id`);

--
-- Indexes for table `class_rep_tbl`
--
ALTER TABLE `class_rep_tbl`
  ADD PRIMARY KEY (`class_rep_id`),
  ADD KEY `le_id` (`le_id`),
  ADD KEY `ro_id` (`ro_id`);

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
-- Indexes for table `module_tbl`
--
ALTER TABLE `module_tbl`
  ADD PRIMARY KEY (`mo_id`),
  ADD KEY `le_id` (`le_id`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`ro_id`),
  ADD KEY `de_id` (`de_id`);

--
-- Indexes for table `useraccount_tbl`
--
ALTER TABLE `useraccount_tbl`
  ADD PRIMARY KEY (`ua_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ro_id` (`ro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_mentor_tbl`
--
ALTER TABLE `class_mentor_tbl`
  MODIFY `class_mentor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_rep_tbl`
--
ALTER TABLE `class_rep_tbl`
  MODIFY `class_rep_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `de_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  MODIFY `lect_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level_tbl`
--
ALTER TABLE `level_tbl`
  MODIFY `le_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `module_tbl`
--
ALTER TABLE `module_tbl`
  MODIFY `mo_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_tbl`
--
ALTER TABLE `role_tbl`
  MODIFY `ro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `useraccount_tbl`
--
ALTER TABLE `useraccount_tbl`
  MODIFY `ua_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_mentor_tbl`
--
ALTER TABLE `class_mentor_tbl`
  ADD CONSTRAINT `class_mentor_tbl_ibfk_1` FOREIGN KEY (`ro_id`) REFERENCES `role_tbl` (`ro_id`),
  ADD CONSTRAINT `class_mentor_tbl_ibfk_2` FOREIGN KEY (`le_id`) REFERENCES `level_tbl` (`le_id`);

--
-- Constraints for table `class_rep_tbl`
--
ALTER TABLE `class_rep_tbl`
  ADD CONSTRAINT `class_rep_tbl_ibfk_1` FOREIGN KEY (`le_id`) REFERENCES `level_tbl` (`le_id`),
  ADD CONSTRAINT `class_rep_tbl_ibfk_2` FOREIGN KEY (`ro_id`) REFERENCES `role_tbl` (`ro_id`);

--
-- Constraints for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  ADD CONSTRAINT `lecture_tbl_ibfk_1` FOREIGN KEY (`mo_id`) REFERENCES `module_tbl` (`mo_id`);

--
-- Constraints for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD CONSTRAINT `level_tbl_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `department_tbl` (`de_id`);

--
-- Constraints for table `module_tbl`
--
ALTER TABLE `module_tbl`
  ADD CONSTRAINT `module_tbl_ibfk_1` FOREIGN KEY (`le_id`) REFERENCES `level_tbl` (`le_id`);

--
-- Constraints for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD CONSTRAINT `role_tbl_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `department_tbl` (`de_id`);

--
-- Constraints for table `useraccount_tbl`
--
ALTER TABLE `useraccount_tbl`
  ADD CONSTRAINT `useraccount_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`);

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`ro_id`) REFERENCES `role_tbl` (`ro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
