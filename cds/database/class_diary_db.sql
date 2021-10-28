-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 04:36 PM
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
-- Database: `class_diary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_mentor_tbl`
--

CREATE TABLE `class_mentor_tbl` (
  `class_mentor_id` int(5) NOT NULL,
  `class_mentor_name` varchar(50) DEFAULT NULL,
  `level_id` int(5) NOT NULL,
  `dept_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_mentor_tbl`
--

INSERT INTO `class_mentor_tbl` (`class_mentor_id`, `class_mentor_name`, `level_id`, `dept_id`) VALUES
(1, 'leatitia', 10, 2),
(2, 'Brezz', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_rep_tbl`
--

CREATE TABLE `class_rep_tbl` (
  `class_rep_id` int(5) NOT NULL,
  `class_rep_name` varchar(50) DEFAULT NULL,
  `dept_id` int(5) DEFAULT NULL,
  `level_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_rep_tbl`
--

INSERT INTO `class_rep_tbl` (`class_rep_id`, `class_rep_name`, `dept_id`, `level_id`) VALUES
(1, 'Davide', 1, 2),
(2, 'Kanyesaro', 1, 4),
(3, 'Moise teck', 3, 2),
(4, 'Gasirimu', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `depertment_tbl`
--

CREATE TABLE `depertment_tbl` (
  `dept_id` int(5) NOT NULL,
  `dept_name` varchar(5) DEFAULT NULL,
  `hod_names` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depertment_tbl`
--

INSERT INTO `depertment_tbl` (`dept_id`, `dept_name`, `hod_names`) VALUES
(1, 'I T', 'Ethiene'),
(2, 'E T', 'Arcade'),
(3, 'RE', 'Kaneza');

-- --------------------------------------------------------

--
-- Table structure for table `details_tbl`
--

CREATE TABLE `details_tbl` (
  `detail_id` int(5) NOT NULL,
  `week` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(30) NOT NULL,
  `module_id` int(5) NOT NULL,
  `lect_id` int(5) NOT NULL,
  `start_time` int(39) NOT NULL,
  `end_time` int(40) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `level_id` int(5) NOT NULL,
  `activity` varchar(40) NOT NULL,
  `content` varchar(300) NOT NULL,
  `comment` varchar(30) NOT NULL,
  `comment_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details_tbl`
--

INSERT INTO `details_tbl` (`detail_id`, `week`, `date`, `day`, `module_id`, `lect_id`, `start_time`, `end_time`, `dept_id`, `level_id`, `activity`, `content`, `comment`, `comment_desc`) VALUES
(1, 'one', '2021-10-26', 'monday', 1, 1, 800, 1000, 1, 11, 'practice', 'update and delete in jsp ', 'well understand', 'great');

-- --------------------------------------------------------

--
-- Table structure for table `lectures_tbl`
--

CREATE TABLE `lectures_tbl` (
  `lect_id` int(5) NOT NULL,
  `lect_name` varchar(50) DEFAULT NULL,
  `mod_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lectures_tbl`
--

INSERT INTO `lectures_tbl` (`lect_id`, `lect_name`, `mod_id`) VALUES
(1, 'muvandimwe', 1),
(2, 'mugabe', 2),
(3, 'kaneza', 3),
(4, 'gatete', 4);

-- --------------------------------------------------------

--
-- Table structure for table `level_tbl`
--

CREATE TABLE `level_tbl` (
  `level_id` int(5) NOT NULL,
  `level_name` varchar(20) DEFAULT NULL,
  `dept_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_tbl`
--

INSERT INTO `level_tbl` (`level_id`, `level_name`, `dept_id`) VALUES
(2, 'level 2', 3),
(4, 'level 1', 1),
(10, 'level 2 A', 1),
(11, 'level 3 B', 3),
(12, 'level 3 C', 2),
(13, 'level 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules_tbl`
--

CREATE TABLE `modules_tbl` (
  `mod_id` int(5) NOT NULL,
  `mod_name` varchar(50) DEFAULT NULL,
  `mod_code` varchar(5) DEFAULT NULL,
  `mod_credit` int(5) DEFAULT NULL,
  `dept_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules_tbl`
--

INSERT INTO `modules_tbl` (`mod_id`, `mod_name`, `mod_code`, `mod_credit`, `dept_id`) VALUES
(1, 'java', 'ict 2', 10, 1),
(2, 'analo', 'ETT 1', 10, 2),
(3, 'power', 'RE 10', 10, 3),
(4, 'php', 'ict 2', 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_mentor_tbl`
--
ALTER TABLE `class_mentor_tbl`
  ADD PRIMARY KEY (`class_mentor_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `class_rep_tbl`
--
ALTER TABLE `class_rep_tbl`
  ADD PRIMARY KEY (`class_rep_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `depertment_tbl`
--
ALTER TABLE `depertment_tbl`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `details_tbl`
--
ALTER TABLE `details_tbl`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `lect_id` (`lect_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `lectures_tbl`
--
ALTER TABLE `lectures_tbl`
  ADD PRIMARY KEY (`lect_id`),
  ADD KEY `mod_id` (`mod_id`);

--
-- Indexes for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  ADD PRIMARY KEY (`mod_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_mentor_tbl`
--
ALTER TABLE `class_mentor_tbl`
  MODIFY `class_mentor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_rep_tbl`
--
ALTER TABLE `class_rep_tbl`
  MODIFY `class_rep_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `depertment_tbl`
--
ALTER TABLE `depertment_tbl`
  MODIFY `dept_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `details_tbl`
--
ALTER TABLE `details_tbl`
  MODIFY `detail_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lectures_tbl`
--
ALTER TABLE `lectures_tbl`
  MODIFY `lect_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_tbl`
--
ALTER TABLE `level_tbl`
  MODIFY `level_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  MODIFY `mod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_mentor_tbl`
--
ALTER TABLE `class_mentor_tbl`
  ADD CONSTRAINT `class_mentor_tbl_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level_tbl` (`level_id`),
  ADD CONSTRAINT `class_mentor_tbl_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `depertment_tbl` (`dept_id`),
  ADD CONSTRAINT `class_mentor_tbl_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `depertment_tbl` (`dept_id`);

--
-- Constraints for table `class_rep_tbl`
--
ALTER TABLE `class_rep_tbl`
  ADD CONSTRAINT `class_rep_tbl_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level_tbl` (`level_id`),
  ADD CONSTRAINT `class_rep_tbl_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `depertment_tbl` (`dept_id`);

--
-- Constraints for table `details_tbl`
--
ALTER TABLE `details_tbl`
  ADD CONSTRAINT `details_tbl_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules_tbl` (`mod_id`),
  ADD CONSTRAINT `details_tbl_ibfk_2` FOREIGN KEY (`lect_id`) REFERENCES `lectures_tbl` (`lect_id`),
  ADD CONSTRAINT `details_tbl_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `depertment_tbl` (`dept_id`),
  ADD CONSTRAINT `details_tbl_ibfk_4` FOREIGN KEY (`level_id`) REFERENCES `level_tbl` (`level_id`);

--
-- Constraints for table `lectures_tbl`
--
ALTER TABLE `lectures_tbl`
  ADD CONSTRAINT `lectures_tbl_ibfk_1` FOREIGN KEY (`mod_id`) REFERENCES `modules_tbl` (`mod_id`);

--
-- Constraints for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD CONSTRAINT `level_tbl_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `depertment_tbl` (`dept_id`);

--
-- Constraints for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  ADD CONSTRAINT `modules_tbl_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `depertment_tbl` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
