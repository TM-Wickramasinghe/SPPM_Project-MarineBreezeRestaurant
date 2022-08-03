-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 03, 2022 at 07:41 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marinebreeze`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aID` int(11) NOT NULL AUTO_INCREMENT,
  `aName` varchar(200) NOT NULL,
  `aEmail` varchar(200) NOT NULL,
  `aPwd` varchar(8) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aID`, `aName`, `aEmail`, `aPwd`, `Designation`) VALUES
(1, 'Anura Fernando', 'anurafernando@gmail.com', 'anura11*', 'Admin'),
(3, 'Shane Ranasinghe', 'shane@gmail.com', 'Shane22*', 'Manager'),
(4, 'Nimsara Fernado', 'Nimsara3@gmail.com', 'Nim123**', 'Manager');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
