-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2017 at 09:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `sid` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `s1` int(11) NOT NULL DEFAULT '0',
  `s2` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`sid`, `sname`, `s1`, `s2`, `total`) VALUES
(11, 'akhi', 52, 52, 104),
(88, 'kila', 78, 77, 155),
(23, 'ayo', 23, 23, 46),
(22, 'errr4545', 22, 23, 45),
(27, 'kumar', 78, 77, 155),
(14, 'kk', 14, 14, 28),
(117, 'hello', 99, 99, 198),
(79, 'iafh', 87, 78, 165),
(60, 'ABC', 13, 13, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
