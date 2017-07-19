-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2017 at 03:21 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icrime`
--

-- --------------------------------------------------------

--
-- Table structure for table `wanted`
--

CREATE TABLE IF NOT EXISTS `wanted` (
  `id` int(11) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `region` varchar(50) NOT NULL,
  `alias` varchar(25) NOT NULL,
  `reward` decimal(11,2) NOT NULL,
  `mcn` varchar(50) NOT NULL COMMENT 'Memorandum Circular Number',
  `mcdate` date NOT NULL COMMENT 'Memorandum Circular Date',
  `ccn` varchar(50) NOT NULL COMMENT 'Criminal Case Number',
  `offenses` varchar(225) NOT NULL,
  `court` varchar(125) NOT NULL,
  `synopsis` varchar(512) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `eyes` varchar(25) NOT NULL,
  `hair` varchar(25) NOT NULL,
  `complexion` varchar(25) NOT NULL,
  `other` varchar(125) NOT NULL,
  `image` varchar(125) NOT NULL,
  `age` int(3) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(125) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `father` varchar(75) NOT NULL,
  `mother` varchar(75) NOT NULL,
  `address` varchar(125) NOT NULL,
  `civilstatus` varchar(15) NOT NULL,
  `elementary` varchar(125) NOT NULL,
  `secondary` varchar(125) NOT NULL,
  `college` varchar(125) NOT NULL,
  `sort` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
