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
-- Table structure for table `cp_persons`
--

CREATE TABLE IF NOT EXISTS `cp_persons` (
`perID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_persons`
--

INSERT INTO `cp_persons` (`perID`, `name`, `email`, `mobile`) VALUES
(1, 'Bobg', 'test@hotmail.com', '555-555-5555'),
(2, 'Alex', 'test2@gmail.com', '333-333-3333'),
(3, 'Jack', 'test@test.test', '574-987-4521'),
(4, 'Bandit', 'ewmack@xmail.wat', '553-357-2536'),
(18, 'Sally', 'sally@msn.com', '455-884-1345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cp_persons`
--
ALTER TABLE `cp_persons`
 ADD PRIMARY KEY (`perID`), ADD KEY `id` (`perID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cp_persons`
--
ALTER TABLE `cp_persons`
MODIFY `perID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
