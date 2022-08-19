-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2022 at 12:00 PM
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
  `verifyToken` varchar(200) NOT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aID`, `aName`, `aEmail`, `aPwd`, `Designation`, `verifyToken`) VALUES
(1, 'Anura Fernando', 'anurafernando@gmail.com', 'anura11*', 'Admin', ''),
(3, 'Thulani Wickramasinghe', 'thulani98.tw@gmail.com', 'Thuu123*', 'Manager', '8eb72992ecd253d5989f4618be6a24ba'),
(4, 'Nimsara Fernado', 'Nimsara3@gmail.com', 'Nim123**', 'Manager', ''),
(5, 'testName', 'test@gmail.com', 'Test123@', 'Manager', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
