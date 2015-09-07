-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2015 at 04:05 AM
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
  `link` text,
  `filename` varchar(100) NOT NULL,
  `filesize` int(20) DEFAULT NULL,
  `mediaID` int(3) unsigned zerofill NOT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `userID` varchar(50) NOT NULL,
  PRIMARY KEY (`fileID`),
  KEY `filetype` (`mediaID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `mediatype`
--

CREATE TABLE IF NOT EXISTS `mediatype` (
  `mediaID` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mediavariety` varchar(10) NOT NULL,
  PRIMARY KEY (`mediaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mediatype`
--

INSERT INTO `mediatype` (`mediaID`, `mediavariety`) VALUES
(001, 'jpg'),
(002, 'jpeg'),
(003, 'gif'),
(004, 'png'),
(005, 'mpg'),
(006, 'mpeg'),
(007, 'mp4'),
(008, 'avi'),
(009, 'mkv'),
(010, 'mobi'),
(011, 'pdf'),
(012, 'epub'),
(013, 'mp3'),
(014, 'wav'),
(015, 'm4a'),
(016, 'wma');

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
('david@me.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '', ''),
('fart@me.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'asfas', 'faf'),
('fs@f.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'fasf', 'fasf');

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
