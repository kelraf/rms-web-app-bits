-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 07:29 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) NOT NULL,
  `apartmentName` tinytext NOT NULL,
  `apartmentLocation` varchar(20) NOT NULL,
  `landlordId` int(10) NOT NULL,
  `numberHouses` int(10) DEFAULT NULL,
  `emptyHouses` int(15) DEFAULT NULL,
  `occupiedHouses` tinytext DEFAULT NULL,
  `rentalTotal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `apartmentName`, `apartmentLocation`, `landlordId`, `numberHouses`, `emptyHouses`, `occupiedHouses`, `rentalTotal`) VALUES
(11, 'Green Garden', 'Kiambu', 12, NULL, NULL, NULL, NULL),
(12, 'File Zone', 'Nairobi', 12, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `houseType` varchar(20) NOT NULL,
  `apartmentId` varchar(20) NOT NULL,
  `landlordId` int(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `rent` int(20) NOT NULL,
  `tenantId` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `houseType`, `apartmentId`, `landlordId`, `status`, `rent`, `tenantId`) VALUES
(27, '2', '11', 12, 'occupied', 18000, 8),
(28, '1', '12', 12, 'occupied', 20000, 3),
(29, '2', '11', 12, 'occupied', 25000, 2),
(30, '1', '12', 12, 'occupied', 10000, 5),
(31, '', '11', 12, 'occupied', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(6) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registrationData` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `exitDate` varchar(50) NOT NULL,
  `landlordId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `firstName`, `lastName`, `gender`, `phoneNo`, `email`, `registrationData`, `status`, `exitDate`, `landlordId`) VALUES
(2, 'Raphael', 'Kingara', 'male', '0745634144', 'kelraf11746@gmail.com', '', '', '', '12'),
(4, 'Tata', 'Tete', 'male', '0712563457', 'tete@gmail.com', '', '', '', '12'),
(5, 'Kika ', 'Keke', 'male', '0766', 'rafwamburu@gmail.com', '', '', '', '12'),
(7, 'Teleza', 'Tete', 'female', '0712345678', 'heli@gmail.com', '', '', '', '12'),
(8, 'Raphael', 'Kingara', 'male', '0733768891', 'kelraf1146@gmail.com', '', '', '', '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` tinytext DEFAULT NULL,
  `lastName` tinytext DEFAULT NULL,
  `gender` tinytext DEFAULT NULL,
  `phoneNo` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `registrationData` varchar(30) DEFAULT NULL,
  `passw` varchar(100) NOT NULL,
  `confirmPassw` varchar(100) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `gender`, `phoneNo`, `email`, `registrationData`, `passw`, `confirmPassw`, `role`) VALUES
(12, 'Tenis', 'Tenana', 'female', '0720674459', 'tenis@gmail.com', NULL, '$2y$10$OTvwkm2RF94SgvSrmxdv1edqkdaxf/MQxlcjX.hcqvQhp4S9HA3aS', '$2y$10$y6XCB.qTmRdVOcqaITZFNu9q6p3MKJ5pNwSjBzNqXugOXwo2hbufC', 'landlord'),
(13, NULL, NULL, NULL, NULL, 'rafwamburu@gmail.com', NULL, '', '', 'landlord'),
(15, NULL, NULL, NULL, NULL, 'rafwamburu@gmail.com', NULL, 'kelraf', 'kelraf', 'landlord'),
(16, NULL, NULL, NULL, NULL, 'telcom@gmail.com', NULL, '$2y$10$g0aRupbOsQfSxxHfmSByI.JAi2fyitlaD/fpcMwH6Flrokhxn1H6O', '$2y$10$tUaVOymxGK7aG0k4CHh7/uM1H1LEelegFK1eYfs5F84TW1HsqwTIq', 'landlord'),
(19, NULL, NULL, NULL, NULL, 'kelraf11746@gmail.com', NULL, '$2y$10$wxd8TxuM3JtCMlsvlGoqiu5gocVOZEyDAXwpG/VTChWi4XixMclqe', '$2y$10$My1rIRMqo2biTJLP0GAwJ.arrR0NPxfbGBl1OfeXDVwzW3ZfeC4OO', 'landlord'),
(21, '', '', 'female', '0743901945', 'norineachieng@gmail.com', NULL, '$2y$10$pTLJj4X8wPLaknLu1emy.ubv8LEJxA9z0kzRR8iDnxQuyIe1mN9Bq', '$2y$10$NXsMIQ0PqtBZNvlgKtFe.O/KXDY7.qipT6TqLOKKW2DCrQQvszpfu', 'landlord'),
(22, '', '', 'male', '', 'admin@gmail.com', NULL, '$2y$10$mlZ5q9kTrVWEAWNGc5BK8.2mmAQcrDv0NwSNG97nPpAChzQtC1HWi', '$2y$10$LesnMIV9dP0mj375FNu4euMOaiEIl8MHrCvH9ZfN4UTU5n0p8fVkC', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
