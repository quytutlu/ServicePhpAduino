-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2015 at 10:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Arduino`
--

-- --------------------------------------------------------

--
-- Table structure for table `ThietBi`
--

CREATE TABLE IF NOT EXISTS `ThietBi` (
`id` int(11) NOT NULL,
  `TenThietBi` varchar(50) NOT NULL,
  `TrangThai` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ThietBi`
--

INSERT INTO `ThietBi` (`id`, `TenThietBi`, `TrangThai`) VALUES
(1, 'BongDen', '1'),
(2, 'NhietDo', '900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ThietBi`
--
ALTER TABLE `ThietBi`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ThietBi`
--
ALTER TABLE `ThietBi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
