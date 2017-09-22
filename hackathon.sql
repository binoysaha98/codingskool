-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2017 at 10:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `userid` int(11) DEFAULT NULL,
  `basic` tinyint(4) DEFAULT NULL,
  `typing` int(3) DEFAULT NULL,
  `competitive` int(3) DEFAULT NULL,
  `apti` int(2) DEFAULT NULL,
  `sorting` tinyint(4) DEFAULT NULL,
  `indent` tinyint(4) DEFAULT NULL,
  `shooting` tinyint(4) DEFAULT NULL,
  `cne` tinyint(4) DEFAULT NULL,
  `dbms` tinyint(4) DEFAULT NULL,
  `tree` tinyint(4) DEFAULT NULL,
  `oop` tinyint(4) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `linuxb` tinyint(4) DEFAULT NULL,
  `github` tinyint(4) DEFAULT NULL,
  `sincere` tinyint(4) DEFAULT NULL,
  `security` tinyint(4) DEFAULT NULL,
  `cloud` tinyint(4) DEFAULT NULL,
  `linuxp` tinyint(4) DEFAULT NULL,
  `manrating` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`userid`, `basic`, `typing`, `competitive`, `apti`, `sorting`, `indent`, `shooting`, `cne`, `dbms`, `tree`, `oop`, `app`, `linuxb`, `github`, `sincere`, `security`, `cloud`, `linuxp`, `manrating`, `level`) VALUES
(1, 100, 20, 30, 10, 40, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 100, 20, 30, 10, 40, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 127, 50, 10, 10, 40, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 10, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
`r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_skills` text NOT NULL,
  `r_points` text NOT NULL,
  `r_desc` text,
  `r_response` tinyint(1) DEFAULT NULL,
  `granted_pts` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`r_id`, `u_id`, `r_skills`, `r_points`, `r_desc`, `r_response`, `granted_pts`) VALUES
(1, 1, 'manrating', '12', '', 1, 10),
(2, 1, 'basic|typing', '12|22', '', 1, 30),
(3, 1, 'basic', '10', '', 0, 0),
(4, 4, 'aptitude|linux', '10|20', NULL, 0, NULL),
(5, 4, 'aptitude', '10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `contact`, `password`) VALUES
(1, 'mansi', 'mansikhamkar@gmail.com', 0, 'a4db21c69d5d1db6f8b3a9a4ca53c769'),
(2, 'reva', 'reva@gmail.com', 2147483647, '4c086d646ca3b54e21ebade951f5d3a0'),
(3, 'isha', 'isha@gmail.com', 2147483647, '6bd7182899ef714a429cce71df1f65c9'),
(4, 'binoy', 'binoysaha98@gmail.com', 798478453, '6579e96f76baa00787a28653876c6127');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
 ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
