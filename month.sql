-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 09:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `month`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records_table`
--

CREATE TABLE `attendance_records_table` (
  `date` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `day_column` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `august2024`
--

CREATE TABLE `august2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `august2024`
--

INSERT INTO `august2024` (`id`, `name`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`, `day31`, `absent`, `present`, `holiday`) VALUES
(1, 'Prakash Sawant', 'Present', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Holiday', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 1, 19, 12),
(2, 'vishal pandit', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Present', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 16, 2, 13),
(3, 'Sakshi Patil', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(4, 'Adinath Kinkar', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(5, 'Atharv Bhand', 'Holiday', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 20, 4, 7),
(6, 'Poonam Jamadar', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(7, 'Rati Bhatt', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(8, 'Reshma Marathe', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 18, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `december2024`
--

CREATE TABLE `december2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `description`) VALUES
(1, '2024-05-01', 'Workers Day'),
(2, '2024-05-03', 'its holiday'),
(3, '2024-06-03', '-'),
(4, '2024-06-01', 'Workers Day'),
(5, '2024-06-01', 'Workers Day'),
(6, '2024-05-07', '-'),
(7, '2024-06-01', 'Workers Day'),
(8, '2024-06-01', 'Workers Day'),
(9, '2024-06-01', 'Workers Day'),
(10, '2024-06-01', 'Workers Day'),
(11, '2024-06-01', 'Sunday'),
(12, '2024-05-05', '-'),
(13, '2024-06-01', 'Workers Day'),
(14, '2024-06-01', 'Workers Day'),
(30, '2024-07-02', 'Workers Day'),
(31, '2024-07-01', '-'),
(32, '2024-06-10', '-'),
(33, '2024-06-05', '-'),
(34, '2024-06-07', '-'),
(35, '2024-06-02', '-'),
(36, '2024-05-31', '-'),
(37, '2024-05-10', '-'),
(38, '2024-05-30', '-'),
(39, '2024-05-15', '-'),
(40, '2024-06-05', '-'),
(41, '2024-07-04', 'Sunday'),
(42, '2024-07-13', '-'),
(46, '2024-06-07', 'Workers Day'),
(47, '2024-09-07', '-'),
(48, '2024-09-01', '-');

--
-- Triggers `holidays`
--
DELIMITER $$
CREATE TRIGGER `update_attendance_after_holiday_insert` AFTER INSERT ON `holidays` FOR EACH ROW BEGIN
    DECLARE day_column VARCHAR(10);
    SET day_column = CONCAT('day', DAY(NEW.date)); -- Get the day from the inserted date
    
    -- Update attendance records table for the corresponding day
    UPDATE attendance_records_table
    SET day_column = 'Holiday'
    WHERE day_column IS NOT NULL; -- Assuming there are no NULL values in the attendance records table
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `january2025`
--

CREATE TABLE `january2025` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `july2024`
--

CREATE TABLE `july2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `july2024`
--

INSERT INTO `july2024` (`id`, `name`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`, `day31`, `absent`, `present`, `holiday`) VALUES
(1, 'Prakash Sawant', 'Present', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Holiday', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Absent', 1, 19, 11),
(2, 'vishal pandit', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Present', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(3, 'Sakshi Patil', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(4, 'Adinath Kinkar', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(5, 'Atharv Bhand', 'Holiday', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 20, 4, 7),
(6, 'Poonam Jamadar', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(7, 'Rati Bhatt', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(8, 'Reshma Marathe', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 18, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `june2024`
--

CREATE TABLE `june2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `june2024`
--

INSERT INTO `june2024` (`id`, `name`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`, `day31`, `absent`, `present`, `holiday`) VALUES
(1, 'Prakash Sawant', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 1, 19, 12),
(2, 'vishal pandit', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 22, 2, 8),
(3, 'Sakshi Patil', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 22, 2, 8),
(4, 'Adinath Kinkar', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 23, 1, 8),
(5, 'Atharv Bhand', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 20, 4, 8),
(6, 'Poonam Jamadar', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 22, 2, 8),
(7, 'Rati Bhatt', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 23, 1, 8),
(8, 'Reshma Marathe', '', '', '', '', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nil', '', '', 'nil', 18, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `may2024`
--

CREATE TABLE `may2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `may2024`
--

INSERT INTO `may2024` (`id`, `name`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`, `day31`, `absent`, `present`, `holiday`) VALUES
(1, 'Prakash Sawant', 'Present', 'Holiday', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Holiday', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 1, 19, 13),
(2, 'vishal pandit', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Present', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 17, 2, 14),
(3, 'Sakshi Patil', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 8),
(4, 'Adinath Kinkar', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 8),
(5, 'Atharv Bhand', 'Holiday', 'Holiday', 'Holiday', 'Present', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 20, 4, 8),
(6, 'Poonam Jamadar', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 8),
(7, 'Rati Bhatt', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 8),
(8, 'Reshma Marathe', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Absent', 'Absent', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 18, 2, 12),
(9, 'RAM KADAM', '', 'Holiday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `november2024`
--

CREATE TABLE `november2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `october2024`
--

CREATE TABLE `october2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `october2024`
--

INSERT INTO `october2024` (`id`, `name`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`, `day31`, `absent`, `present`, `holiday`) VALUES
(1, 'Prakash Sawant', 'Present', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Holiday', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Absent', 1, 19, 11),
(2, 'vishal pandit', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Present', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(3, 'Sakshi Patil', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(4, 'Adinath Kinkar', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(5, 'Atharv Bhand', 'Holiday', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 20, 4, 7),
(6, 'Poonam Jamadar', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(7, 'Rati Bhatt', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(8, 'Reshma Marathe', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 18, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `september2024`
--

CREATE TABLE `september2024` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `day1` varchar(255) NOT NULL,
  `day2` varchar(255) NOT NULL,
  `day3` varchar(255) NOT NULL,
  `day4` varchar(255) NOT NULL,
  `day5` varchar(255) NOT NULL,
  `day6` varchar(255) NOT NULL,
  `day7` varchar(255) NOT NULL,
  `day8` varchar(255) NOT NULL,
  `day9` varchar(255) NOT NULL,
  `day10` varchar(255) NOT NULL,
  `day11` varchar(255) NOT NULL,
  `day12` varchar(255) NOT NULL,
  `day13` varchar(255) NOT NULL,
  `day14` varchar(255) NOT NULL,
  `day15` varchar(255) NOT NULL,
  `day16` varchar(255) NOT NULL,
  `day17` varchar(255) DEFAULT NULL,
  `day18` varchar(255) NOT NULL,
  `day19` varchar(255) NOT NULL,
  `day20` varchar(255) NOT NULL,
  `day21` varchar(255) NOT NULL,
  `day22` varchar(255) NOT NULL,
  `day23` varchar(255) NOT NULL,
  `day24` varchar(255) NOT NULL,
  `day25` varchar(255) NOT NULL,
  `day26` varchar(255) NOT NULL,
  `day27` varchar(255) NOT NULL,
  `day28` varchar(255) NOT NULL,
  `day29` varchar(255) NOT NULL,
  `day30` varchar(255) NOT NULL,
  `day31` varchar(255) NOT NULL,
  `absent` int(10) NOT NULL,
  `present` int(10) NOT NULL,
  `holiday` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `september2024`
--

INSERT INTO `september2024` (`id`, `name`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`, `day31`, `absent`, `present`, `holiday`) VALUES
(1, 'Prakash Sawant', 'Holiday', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Holiday', 'Holiday', 'Holiday', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Holiday', 'Present', 'Holiday', 'Present', 'Present', 'Present', 'Holiday', 'Absent', 1, 19, 11),
(2, 'vishal pandit', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Holiday', 'Present', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(3, 'Sakshi Patil', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(4, 'Adinath Kinkar', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(5, 'Atharv Bhand', 'Holiday', 'Present', 'Holiday', 'Present', 'Holiday', 'Present', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 20, 4, 7),
(6, 'Poonam Jamadar', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 22, 2, 7),
(7, 'Rati Bhatt', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Holiday', 'Present', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 23, 1, 7),
(8, 'Reshma Marathe', 'Holiday', 'Present', 'Holiday', 'Absent', 'Holiday', 'Present', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Holiday', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 'Absent', 'Holiday', 'Absent', 'Absent', 'Absent', 'Holiday', 'Holiday', 18, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`) VALUES
(1, 'Adarsh Pande', 'adarsh23@gmail.com', 'testuser', 'password123', 'employee'),
(4, 'Pranjali Suryvanshi', 'pranjali123@gmail.com', 'developer', 'dev@1234', ''),
(5, 'Viraj Thorat', 'vt123@gmail.com', 'employee', 'vt123456', ''),
(6, 'Dheeraj Kate', 'dheeraj56@gmail.com', 'testuser1', 'password123', ''),
(7, 'aaa', 'ab@gmail.com', 'aaa', 'aaa', ''),
(9, 'acc', 'ab@gmail.com', 'abc', 'aaaa', ''),
(10, 'Atharv ghatage', 'atharv123@gmail.com', 'desktop sup', '985643231', 'admin'),
(11, 'admin', 'admin@gmail.com', 'admin', '12345678', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `august2024`
--
ALTER TABLE `august2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `december2024`
--
ALTER TABLE `december2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `january2025`
--
ALTER TABLE `january2025`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `july2024`
--
ALTER TABLE `july2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `june2024`
--
ALTER TABLE `june2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `may2024`
--
ALTER TABLE `may2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `november2024`
--
ALTER TABLE `november2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `october2024`
--
ALTER TABLE `october2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `september2024`
--
ALTER TABLE `september2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `august2024`
--
ALTER TABLE `august2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `december2024`
--
ALTER TABLE `december2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `january2025`
--
ALTER TABLE `january2025`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `july2024`
--
ALTER TABLE `july2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `june2024`
--
ALTER TABLE `june2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `may2024`
--
ALTER TABLE `may2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `november2024`
--
ALTER TABLE `november2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `october2024`
--
ALTER TABLE `october2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `september2024`
--
ALTER TABLE `september2024`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
