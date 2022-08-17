-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 08:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marine_breeze`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rID` int(11) NOT NULL,
  `rName` varchar(200) NOT NULL,
  `rEmail` varchar(200) NOT NULL,
  `rContactNumber` varchar(10) NOT NULL,
  `rDate` date NOT NULL,
  `rTime` time NOT NULL,
  `rNoOfPeople` int(11) NOT NULL,
  `rMessage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rID`, `rName`, `rEmail`, `rContactNumber`, `rDate`, `rTime`, `rNoOfPeople`, `rMessage`) VALUES
(1, 'Githmi', 'githmi@gmail.com', '0712345678', '2022-07-30', '11:06:09', 2, 'Just Testing'),
(2, 'Prabhashvari', 'prabai@gmail.com', '0710987654', '2022-07-30', '11:09:13', 4, 'Trial'),
(5, 'Vinod', 'vinod@gmail.com', '0766781534', '2022-08-14', '19:38:00', 4, 'miracle happens');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
