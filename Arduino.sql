-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2015 at 10:06 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arduino`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BatThietBi`(TenThietBi varchar(50))
begin
	update ThietBi set TrangThai="1" where ThietBi.TenThietBi=TenThietBi;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DangNhap`(in TenDangNhap varchar(30),MatKhau varchar(30))
begin
	select *
    from thongtinnguoidung
    where thongtinnguoidung.TenDangNhap=TenDangNhap and thongtinnguoidung.MatKhau=MatKhau;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `KiemTraCoNguoi`()
begin
	select TenThietBi,TrangThai
    from ThietBi;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayTrangThai`()
begin
	select *
    from thietbi;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayTrangThaiArduino`()
begin
	select *
    from thietbi
    where TenThietBi<>"NhietDo" and TenThietBi<>"CoNguoiONha";
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RaNgoai`()
begin
	update ThietBi set TrangThai="0" where TenThietBi<>"NhietDo";
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TatThietBi`(TenThietBi varchar(50))
begin
	update ThietBi set TrangThai="0" where ThietBi.TenThietBi=TenThietBi;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateNhietDo`(IN NhietDo varchar(10))
begin
	update ThietBi set TrangThai=NhietDo where TenThietBi='NhietDo';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateStt`(IN `CodeStt` INT)
begin
	update ThietBi set TrangThai=CodeStt where TenThietBi="CoNguoiONha";
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `thietbi`
--

CREATE TABLE IF NOT EXISTS `thietbi` (
`id` int(11) NOT NULL,
  `TenThietBi` varchar(50) NOT NULL,
  `TrangThai` varchar(10) NOT NULL,
  `TenVietTat` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thietbi`
--

INSERT INTO `thietbi` (`id`, `TenThietBi`, `TrangThai`, `TenVietTat`) VALUES
(2, 'NhietDo', '55', 'nd'),
(5, 'DenComPac', '0', 'dcp'),
(6, 'DenTuypDai', '0', 'dtd'),
(7, 'QuatDien1', '0', 'qd1'),
(8, 'QuatDien2', '0', 'qd2'),
(9, 'Tivi', '0', 'tv'),
(10, 'CoNguoiONha', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `thongtinnguoidung`
--

CREATE TABLE IF NOT EXISTS `thongtinnguoidung` (
`id` int(11) NOT NULL,
  `TenDangNhap` varchar(30) NOT NULL,
  `MatKhau` varchar(30) NOT NULL,
  `SDT` varchar(12) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thongtinnguoidung`
--

INSERT INTO `thongtinnguoidung` (`id`, `TenDangNhap`, `MatKhau`, `SDT`, `Email`) VALUES
(1, 'adminstrator', '123456a@', '01688558810', 'quytutlu@gmail.com'),
(2, 'quytutlu', '60648994t', '01688558810', 'quytutlu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE IF NOT EXISTS `trangthai` (
`id` int(11) NOT NULL,
  `MaStt` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`id`, `MaStt`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thietbi`
--
ALTER TABLE `thietbi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thietbi`
--
ALTER TABLE `thietbi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
