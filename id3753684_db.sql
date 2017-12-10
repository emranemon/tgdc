-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2017 at 06:16 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3753684_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `t_id` int(11) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `Active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`ID`, `Name`, `t_id`, `lat`, `lon`, `Active`) VALUES
(1, 'north badda', 2, 23.786129, 90.426448, 1),
(2, 'merul badda', 2, 23.772377, 90.422534, 1),
(3, 'mirpur 10', 23, 23.806931, 90.368709, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `ID` int(11) NOT NULL,
  `thanaName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`ID`, `thanaName`) VALUES
(1, 'Adabor'),
(2, 'Badda'),
(3, 'Biman Bandar'),
(4, 'Bangshal'),
(5, 'Cantonment'),
(6, 'Chawkbazar Model'),
(7, 'Dakshinkhan'),
(8, 'Darus Salam'),
(9, 'Dhanmondi'),
(10, 'Demra'),
(11, 'Kotwali'),
(12, 'Gendaria'),
(13, 'Gulshan'),
(14, 'Hazaribagh'),
(15, 'Jatrabari'),
(16, 'Kadamtali'),
(17, 'Kafrul'),
(18, 'Kalabagan'),
(19, 'Kamringir'),
(20, 'Khilkhet'),
(21, 'Khilgaon'),
(22, 'Lalbagh'),
(23, 'Mirpur'),
(24, 'Mohammadpur'),
(25, 'Motijheel'),
(26, 'New Market'),
(27, 'Pallabi'),
(28, 'Paltan'),
(29, 'Ramna'),
(30, 'Rampura'),
(31, 'Sabujbagh'),
(32, 'Shah Ali'),
(33, 'Shahbagh'),
(34, 'Shahjahanpur'),
(35, 'Sher-e-Bangla Nagor'),
(36, 'Shyampur'),
(37, 'Sutrapur'),
(38, 'Tejgaon'),
(39, 'Tejgaon Industrial Area'),
(40, 'Turag'),
(41, 'Uttar Khan'),
(42, 'Uttara');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`ID`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@mail.com', 'admin', 'admin'),
(2, 'Selim Reza', 'selim512@gmail.com', 'selim', 'volunteer'),
(5, 'Emon', 'emon@mail.com', 'emran', 'volunteer'),
(6, 'Emran', 'emran@mail.com', 'emon', 'volunteer'),
(7, 'Jahid Hossain', 'jahid@mail.com', 'jahid', 'volunteer'),
(8, 'king', 'kingkhan@king.com', 'fuckuemon', 'volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `ID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fare` int(11) DEFAULT NULL,
  `place1` varchar(50) NOT NULL,
  `place2` varchar(50) NOT NULL,
  `Active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`ID`, `type`, `name`, `fare`, `place1`, `place2`, `Active`) VALUES
(1, 'bus', 'The Great Turag', 5, 'north badda', 'merul badda', 1),
(2, 'bus', 'Rob Rob Poribohon', 35, 'merul badda', 'mirpur 10', 1),
(3, 'bus', 'Nur-E-Mokka Poribohon', 35, 'mirpur 10', 'merul badda', 1),
(4, 'bus', 'Nur-E-Mokka Poribohon', 35, 'mirpur 10', 'merul badda', 1),
(5, 'Bus', 'Raida', 25, 'Rampura Bridge', 'Uttora Sector 12', 1),
(6, 'Boat', 'Water Taxi', 30, 'Hatirjhill', 'karwan bazar', 1),
(7, 'Bus', 'Labbayek', 50, 'Malibug Rail Crossing', 'Savar', 1),
(8, 'Bus', 'Boishakhi', 30, 'Uttor Badda', 'Gabtoli', 1),
(9, 'Bus', 'Suprovat', 5, 'Rampura Bridge', 'Hossain Market', 1),
(10, 'Bus', 'The Great Turag', 5, 'East West University', 'uttor badda', 1),
(12, 'Bus', 'Suprovat', 10, 'Rampura', 'Badda', 1),
(13, 'Bus', 'ekushey', 5, 'shahbag', 'dhanmondi', 1),
(14, 'Bus', 'ekushey', 40, 'shahbag', 'rajarbag', 1),
(15, 'Train', 'Silk City', 10, 'Bimanbondor', 'komlapur', 1),
(16, 'Bus', 'The Great Turag', 10, 'Abul Hotel', 'Hossain Market', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `thana` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
