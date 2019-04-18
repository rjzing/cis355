-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 11:45 AM
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
-- Table structure for table `cp_components`
--

CREATE TABLE IF NOT EXISTS `cp_components` (
`partID` int(11) NOT NULL,
  `part` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cost` double NOT NULL,
  `vendor` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_components`
--

INSERT INTO `cp_components` (`partID`, `part`, `description`, `cost`, `vendor`) VALUES
(1, 'GPU', 'ASUS ROG NVIDA 1060 6gb', 300, 'Newegg'),
(2, 'Case', 'Phanteks', 100, 'Amazon'),
(3, 'PSU', 'EVGA 1000 Watt', 150, 'Amazon'),
(4, 'HDD', 'Seagate 4TB', 89.99, 'Newegg'),
(5, 'SSD', 'SanDisk 500GB', 120, 'MicroCenter'),
(6, 'Motherboard', 'ASUS ROG Crosshair VI', 249.99, 'Newegg'),
(7, 'Processor ', 'AMD Ryzen 1600x', 250, 'Newegg'),
(13, 'Cooling', 'Corsair Blue LED Fan - 140mm', 15.99, 'Amazon'),
(15, 'Cooling', 'Cooler Master 200mm Fan', 12.99, 'Amazon'),
(16, 'GPU', 'RX 580 8gb', 299.99, 'BestBuy'),
(17, 'Cooling', 'Thermaltake 360mm', 119.99, 'Amazon'),
(18, 'Processor', 'AMD Threadripper', 899.99, 'Newegg'),
(19, 'HDD', 'Seagate 1TB', 68.99, 'Amazon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cp_components`
--
ALTER TABLE `cp_components`
 ADD PRIMARY KEY (`partID`), ADD UNIQUE KEY `id` (`partID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cp_components`
--
ALTER TABLE `cp_components`
MODIFY `partID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
