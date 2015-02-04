-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2015 at 04:49 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kjhdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kjh_ettoreach`
--

CREATE TABLE IF NOT EXISTS `kjh_ettoreach` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `bybus` varchar(100) NOT NULL,
  `bycar` varchar(100) NOT NULL,
  `byfoot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kjh_ettoreach`
--

INSERT INTO `kjh_ettoreach` (`from`, `to`, `bybus`, `bycar`, `byfoot`) VALUES
(0, 1, '10 minutes', '5 minutes', '30 minutes'),
(0, 2, 'N/A', '5 minutes', '5 minutes'),
(0, 3, '2', '2', '4 minutes'),
(0, 4, 'e', 'e', '1minutes');

-- --------------------------------------------------------

--
-- Table structure for table `kjh_login`
--

CREATE TABLE IF NOT EXISTS `kjh_login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Active/Inactive',
  `session` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kjh_login`
--

INSERT INTO `kjh_login` (`uid`, `username`, `password`, `status`, `session`) VALUES
(1, 'sagar', 'sagar', 1, '9e1acf61b800c05c00099b9735544f49'),
(2, 'admin', 'admin', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `kjh_places`
--

CREATE TABLE IF NOT EXISTS `kjh_places` (
  `placeNo` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL,
  `locationMap` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `uniqueId` varchar(100) NOT NULL,
  PRIMARY KEY (`placeNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kjh_places`
--

INSERT INTO `kjh_places` (`placeNo`, `name`, `location`, `locationMap`, `description`, `uniqueId`) VALUES
(1, 'Bajeko sekuwa', 'Anamnagar Chok', 'https://www.google.com.np/maps/place/Bajeko+Sekuwa/@27.697583,85.328579,17z/data=!3m1!4b1!4m2!3m1!1s0x39eb19a40b371b51:0x8309f1a056880ed6?hl=en', '1. Sekuwa Special \r\n2. Momo\r\n3. Chowmin', '1489815f9d1a2bb'),
(2, 'Bharat Dai ko Pasal', 'Pashupati Sadak', 'https://www.google.com.np/maps/dir/Verisk+Information+Technologies+Pvt.+Ltd.,+Hattisar+Sadak+429,+Kathmandu+44600/27.709829,85.3228505/@27.7106992,85.3225746,18z/data=!4m9!4m8!1m5!1m1!1s0x39eb1905d0b50847:0x9e277560a5a516b!2m2!1d85.321948!2d27.711703!1m0!3e2?hl=en', '1. Mo: Mo\r\n2. Chowmin\r\n3. Aalu Chop', '123dfg8w564srcs'),
(3, 'Kalinchok Fast Food', 'Pashupati Sadak', 'https://www.google.com.np/maps/dir/Verisk+Information+Technologies+Pvt.+Ltd.,+Hattisar+Sadak+429,+Kathmandu+44600/27.7102615,85.3236992/@27.7110855,85.3237045,18z/data=!4m9!4m8!1m5!1m1!1s0x39eb1905d0b50847:0x9e277560a5a516b!2m2!1d85.321948!2d27.711703!1m0!3e2?hl=en', '1. Mo: Mo Special', '206303168289c00'),
(4, 'tetdfdDSF', 'te', 'e', 'sdfsdfsd', 'd4d02d2988aceb4');

-- --------------------------------------------------------

--
-- Table structure for table `kjh_userinfo`
--

CREATE TABLE IF NOT EXISTS `kjh_userinfo` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `dateJoined` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kjh_userinfo`
--

INSERT INTO `kjh_userinfo` (`uid`, `firstName`, `lastName`, `middleName`, `email`, `dateJoined`) VALUES
(1, 'Sagar', 'Pathak', '', 'sagar@gmai.com', '2014-12-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
