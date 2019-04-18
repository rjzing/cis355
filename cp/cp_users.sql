-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 11:46 AM
-- Server version: 5.5.59-0+deb8u1
-- PHP Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rjzinger`
--

-- --------------------------------------------------------

--
-- Table structure for table `cp_users`
--

CREATE TABLE IF NOT EXISTS `cp_users` (
`user_ID` int(11) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_users`
--

INSERT INTO `cp_users` (`user_ID`, `username`, `password`) VALUES
(1, 'rjzinger', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'test', '6f1ed002ab5595859014ebf0951522d9'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(4, 'test', '098f6bcd4621d373cade4e832627b4f6'),
(5, 'rz', '4b43b0aee35624cd95b910189b3dc231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cp_users`
--
ALTER TABLE `cp_users`
 ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cp_users`
--
ALTER TABLE `cp_users`
MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
