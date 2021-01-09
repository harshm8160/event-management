-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 12:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_managemet_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_custom_repeat` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 => Repeat , 1 => Repeat on the',
  `repeat_type` enum('1','2','3','4') DEFAULT NULL COMMENT '1 => Every, 2 => Every Other, 3 => Every Third, 4 => Every Fourth',
  `every` enum('1','2','3','4') DEFAULT NULL COMMENT '1 => Day, 2 => Week, 3 => Month, 4 => Year',
  `repeat_on` enum('1','2','3','4') DEFAULT NULL,
  `repeat_week` enum('1','2','3','4','5','6','7') DEFAULT NULL COMMENT '1 => Sun, 2 => Mon, 3 => Tue, 4 => Wed, 5 => Thu, 6 => Fri, 7 => Sat',
  `repeat_month` enum('1','2','3','4','5') DEFAULT NULL COMMENT '1 => Month, 2 => 3 Month, 3 => 4 Month, 4 => 6 Month, 5 => Year',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `is_custom_repeat`, `repeat_type`, `every`, `repeat_on`, `repeat_week`, `repeat_month`, `created_at`, `updated_at`) VALUES
(1, 'test event 2', '2021-07-01', '1970-01-01', '1', '', '', '1', '1', '1', '2021-01-09 11:04:36', '2021-01-09 11:04:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
