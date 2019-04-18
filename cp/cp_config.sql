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
-- Table structure for table `cp_config`
--

CREATE TABLE IF NOT EXISTS `cp_config` (
`configID` int(11) NOT NULL,
  `perID` int(11) NOT NULL,
  `PartID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_config`
--

INSERT INTO `cp_config` (`configID`, `perID`, `PartID`) VALUES
(56, 16, 1),
(58, 16, 3),
(72, 16, 3),
(78, 3, 1),
(79, 3, 2),
(80, 3, 3),
(82, 3, 5),
(83, 3, 6),
(84, 3, 7),
(86, 3, 15),
(87, 3, 16),
(88, 3, 17),
(89, 3, 16),
(90, 3, 17),
(91, 3, 18),
(92, 4, 17),
(93, 4, 18),
(94, 4, 19),
(96, 1, 3),
(98, 1, 5),
(99, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cp_config`
--
ALTER TABLE `cp_config`
 ADD PRIMARY KEY (`configID`), ADD UNIQUE KEY `configID` (`configID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cp_config`
--
ALTER TABLE `cp_config`
MODIFY `configID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
