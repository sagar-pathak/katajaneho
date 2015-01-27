-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2014 at 12:43 PM
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
-- Table structure for table `kjh_login`
--

CREATE TABLE IF NOT EXISTS `kjh_login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Active/Inactive',
  `session` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kjh_login`
--

INSERT INTO `kjh_login` (`uid`, `username`, `password`, `status`, `session`) VALUES
(1, 'sagar', 'sagar', 1, 'a0de669c0b46fe7e5ed027e23970f7e0f'),
(2, 'admin', 'admin', 0, '');

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
