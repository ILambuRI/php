-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2017 at 02:46 PM
-- Server version: 5.7.13
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soap`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `id` int(11) NOT NULL,
  `mark` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `engine` int(10) NOT NULL,
  `color` varchar(50) NOT NULL,
  `speed` int(10) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`id`, `mark`, `model`, `year`, `engine`, `color`, `speed`, `price`) VALUES
(1, 'BMW', 'X6', 2017, 500, 'white', 300, 120300),
(2, 'BMW', 'X5', 2016, 400, 'black', 250, 110200),
(3, 'BMW', 'X1', 2015, 300, 'gray', 230, 105100),
(4, 'VW', 'Beetle', 2017, 300, 'red', 200, 50100),
(5, 'VW', 'Polo', 2016, 250, 'white', 200, 60700),
(6, 'VW', 'Golf', 2015, 180, 'black', 210, 75800),
(7, 'Mitsubishi', 'Lancer', 2015, 250, 'red', 280, 71600),
(8, 'Mitsubishi', 'Outlander', 2016, 250, 'gray', 300, 90700),
(9, 'Mitsubishi', 'Pajero', 2017, 260, 'white', 290, 93900);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `payment` enum('card','cash') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `auto_id`, `firstname`, `lastname`, `payment`) VALUES
(1, 1, 'Dima', 'Lambru', 'cash'),
(2, 2, 'Petro', 'Petrovich', 'card'),
(3, 3, 'Vasya', 'Vasevich', 'cash'),
(4, 2, 'Masha', 'Mashina', 'card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
