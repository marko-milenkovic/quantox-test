-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2021 at 06:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quantox-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_58562B47CB944F1A` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `student_id`, `type`, `date`) VALUES
(11, 1, 1, '2021-06-05 18:30:26'),
(12, 2, 1, '2021-06-05 18:30:32'),
(13, 3, 2, '2021-06-05 18:30:40'),
(14, 4, 2, '2021-06-05 18:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_595AAE34CB944F1A` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `student_id`, `value`, `date`) VALUES
(11, 1, '5', '2021-06-05 18:30:58'),
(12, 1, '6', '2021-06-05 18:31:02'),
(13, 1, '7', '2021-06-05 18:31:06'),
(14, 1, '8', '2021-06-05 18:31:09'),
(15, 2, '8', '2021-06-05 18:31:14'),
(16, 2, '9', '2021-06-05 18:31:18'),
(17, 2, '10', '2021-06-05 18:31:21'),
(18, 3, '7', '2021-06-05 18:31:51'),
(19, 3, '8', '2021-06-05 18:31:56'),
(20, 4, '8', '2021-06-05 18:32:02'),
(21, 4, '9', '2021-06-05 18:32:05'),
(22, 4, '10', '2021-06-05 18:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `date`) VALUES
(1, 'Test 1', 'Test 1', '2021-06-05 18:30:26'),
(2, 'Test 2', 'Test 2', '2021-06-05 18:30:32'),
(3, 'Test 3', 'Test 3', '2021-06-05 18:30:40'),
(4, 'Test 4', 'Test 4', '2021-06-05 18:30:45');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `FK_58562B47CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `FK_595AAE34CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
