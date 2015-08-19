-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2015 at 12:25 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mediavault`
--
CREATE DATABASE IF NOT EXISTS `mediavault` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mediavault`;

-- --------------------------------------------------------

--
-- Table structure for table `linkandmeta`
--

CREATE TABLE IF NOT EXISTS `linkandmeta` (
  `fileID` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filesize` int(6) NOT NULL,
  `mediaID` int(3) unsigned zerofill NOT NULL,
  `length` int(10) NOT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `userID` varchar(50) NOT NULL,
  PRIMARY KEY (`fileID`),
  KEY `filetype` (`mediaID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mediatype`
--

CREATE TABLE IF NOT EXISTS `mediatype` (
  `mediaID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mediavariety` varchar(10) NOT NULL,
  PRIMARY KEY (`mediaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstName` varchar(25) DEFAULT NULL,
  `lastName` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='email is ID';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `firstName`, `lastName`) VALUES
('david@me.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linkandmeta`
--
ALTER TABLE `linkandmeta`
  ADD CONSTRAINT `linkandmeta_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `linkandmeta_ibfk_2` FOREIGN KEY (`mediaID`) REFERENCES `mediatype` (`mediaID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
