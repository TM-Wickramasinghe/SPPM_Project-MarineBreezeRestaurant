-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2022 at 12:01 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `fID` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(70) NOT NULL,
  `fComment` varchar(600) NOT NULL,
  PRIMARY KEY (`fID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fID`, `fName`, `fComment`) VALUES
(1, 'Dinura Asanka', 'I experienced caring staff, but pity about the French fries.'),
(2, 'Manushi Perera', 'Amazing wines, food and service.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `ItemNo` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(150) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Picture` varchar(500) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `PriceSmall` varchar(10) NOT NULL,
  `PriceMedium` varchar(10) NOT NULL,
  `PriceLarge` varchar(10) NOT NULL,
  `Availability` varchar(100) NOT NULL,
  PRIMARY KEY (`ItemNo`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ItemNo`, `Category`, `Name`, `Picture`, `Description`, `PriceSmall`, `PriceMedium`, `PriceLarge`, `Availability`) VALUES
(13, 'Main_Course', 'Egg Noodles', '5.jpg', '', '750', '980', '1500', 'Available'),
(12, 'Main_Course', 'VEG Biriyani', '4.jpg', ' Dhal Fry, Papadam, Pickle', '800', 'N/A', 'N/A', 'Available'),
(11, 'Side_Dish', 'Devilled Chicken', '3.jpg', '', '400', '560', '1000', 'Available'),
(10, 'Side_Dish', 'Hot Butter Cuttlefish', '2.jpg', '', '400', '560', '1000', 'Available'),
(9, 'Appetizers', ' Seafood Classic ', '1.jpg', 'Food', '450', '700', '1100', 'Available'),
(14, 'Dessert', 'Watalappan', '6.jpg', '', '220', 'N/A', 'N/A', 'Available'),
(15, 'Dessert', 'Ice Cream', '7.jpg', 'Chocolate/Vanilla/Strawberry', '200', 'N/A', 'N/A', 'Available'),
(16, 'Drinks', 'Milk Shake', '10.jpg', 'Chocolate/Vanilla/Strawberry', '620', 'N/A', 'N/A', 'Available'),
(17, 'Main_Course', 'Koththu', '11.jpg', 'Chicken/Egg/Cheese', '550', '840', '1200', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `rID` int(11) NOT NULL AUTO_INCREMENT,
  `rName` varchar(200) NOT NULL,
  `rEmail` varchar(200) NOT NULL,
  `rContactNumber` varchar(10) NOT NULL,
  `rDate` date NOT NULL,
  `rTime` time NOT NULL,
  `rNoOfPeople` int(11) NOT NULL,
  `rMessage` varchar(500) NOT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rID`, `rName`, `rEmail`, `rContactNumber`, `rDate`, `rTime`, `rNoOfPeople`, `rMessage`) VALUES
(1, 'Githmi', 'githmi@gmail.com', '0712345678', '2022-07-30', '11:06:09', 2, 'Just Testing'),
(2, 'Prabhashvari', 'prabai@gmail.com', '0710987654', '2022-07-30', '11:09:13', 4, 'Trial'),
(5, 'Vinod', 'vinod@gmail.com', '0766781534', '2022-08-14', '19:38:00', 4, 'miracle happens');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
