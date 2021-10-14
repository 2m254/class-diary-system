-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 09:58 AM
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
-- Database: `cds`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecture_tbl`
--

CREATE TABLE `lecture_tbl` (
  `id` int(10) NOT NULL,
  `lecture_name` varchar(50) NOT NULL,
  `assistant_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture_tbl`
--

INSERT INTO `lecture_tbl` (`id`, `lecture_name`, `assistant_name`) VALUES
(1, 'Sada', 'Yvessss'),
(2, 'Gilbert', 'Brezz'),
(3, 'Gilbert', 'Brezz'),
(4, 'james', ''),
(5, 'Muvandimwe', ''),
(6, 'Muhamedhi', 'Harhette'),
(7, 'Muhamedhi', 'Harhette'),
(8, 'Muhamedhi', 'Harhette'),
(9, 'Ethiene', 'Brezz');

-- --------------------------------------------------------

--
-- Table structure for table `level_tbl`
--

CREATE TABLE `level_tbl` (
  `id` int(10) NOT NULL,
  `level_name` varchar(20) NOT NULL,
  `level_room` char(1) NOT NULL,
  `class_mentor` varchar(50) NOT NULL,
  `chief` varchar(50) NOT NULL,
  `chieften` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_tbl`
--

INSERT INTO `level_tbl` (`id`, `level_name`, `level_room`, `class_mentor`, `chief`, `chieften`) VALUES
(1, 'level 1', 'f', '', '', ''),
(2, 'level 1', 'b', '', '', ''),
(3, 'level 1', 'd', '', '', ''),
(4, 'level 1', 'a', '', '', ''),
(5, 'level 2', 'a', 'kamanzi', 'eric', 'Augustine'),
(6, 'level 2', 'b', '', '', ''),
(7, 'level 2', 'a', '', '', ''),
(8, 'level 2', 'a', 'SADA', 'david', 'Foi'),
(9, 'level 3', 'a', 'Muvandimwe', 'Muhirwa David', 'Nishimirwe Liliane'),
(10, 'level 3', 'b', 'Sada', 'Kanyesaro Luc', 'Aline foi'),
(11, 'level 2', 'a', 'Claire', 'Olivier', 'Kansime');

-- --------------------------------------------------------

--
-- Table structure for table `modules_tbl`
--

CREATE TABLE `modules_tbl` (
  `id` int(30) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `module_code` varchar(10) NOT NULL,
  `module_credit` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules_tbl`
--

INSERT INTO `modules_tbl` (`id`, `module_name`, `module_code`, `module_credit`) VALUES
(2, 'Linux', 'ict103', 15),
(3, 'JAVA', 'ict203', 15),
(5, 'networking', 'ict203', 15),
(6, 'php', 'ict103', 10),
(7, 'Digital', 'Elct102', 10),
(8, 'klsjdf', 'klsd38', 12),
(9, 'yyyyy', 'ksdf38', 12),
(10, 'dslkjfl;', 'dklsf312', 123),
(11, 'lkjdslk;fj', 'skld23', 14),
(12, 'aklhfjks', 'sdfjlksd', 123),
(13, 'hdhdj', 'sdl;kjfa', 1432),
(14, 'sdl;jkfa;', ';jsdflkjg', 0),
(15, 'IOT', 'EL209', 15),
(16, 'wdkrueuuu', 'vmmvmvmv', 0),
(17, 'rltkr', 'mmmmv', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecture_tbl`
--
ALTER TABLE `lecture_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level_tbl`
--
ALTER TABLE `level_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `modules_tbl`
--
ALTER TABLE `modules_tbl`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
