-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 01:50 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbnotifications`
--

CREATE TABLE `tbnotifications` (
  `note_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `is_read` varchar(5) NOT NULL,
  `description` varchar(10) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnotifications`
--

INSERT INTO `tbnotifications` (`note_id`, `user_id`, `is_read`, `description`, `created`) VALUES
(1, 1, '1', NULL, '2016-11-16'),
(2, 1, '0', NULL, '2016-11-16'),
(3, 1, '0', NULL, '2016-11-16'),
(4, 1, '0', NULL, '2016-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pro` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`user_id`, `user_name`, `user_gender`, `user_phone`, `user_email`, `user_pro`) VALUES
(1, 'mesa', 'M', '093494818', 'soutmesa3@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbnotifications`
--
ALTER TABLE `tbnotifications`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `fk_user_note` (`user_id`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbnotifications`
--
ALTER TABLE `tbnotifications`
  MODIFY `note_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
