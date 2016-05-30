-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2016 at 07:18 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `name`, `parent`) VALUES
(1, 'Hardware', 0),
(2, 'Software', 0),
(3, 'Movies', 0),
(4, 'Clothes', 0),
(5, 'Printers', 1),
(6, 'Monitors', 1),
(7, 'Inkjet printers', 5),
(8, 'Laserjet Printers', 5),
(9, 'LCD monitors', 6),
(10, 'TFT monitors', 6),
(11, 'Antivirus', 2),
(12, 'Action movies', 3),
(13, 'Comedy Movies', 3),
(14, 'Romantic movie', 3),
(15, 'Thriller Movies', 3),
(16, 'Mens', 4),
(17, 'Womens', 4),
(18, 'Shirts', 16),
(19, 'T-shirts', 16),
(20, 'Shirts', 16),
(21, 'Jeans', 16),
(22, 'Accessories', 16),
(23, 'Tees', 17),
(24, 'Skirts', 17),
(25, 'Leggins', 17),
(26, 'Jeans', 17),
(27, 'Accessories', 17),
(28, 'Watches', 22),
(29, 'Tie', 22),
(30, 'cufflinks', 22),
(31, 'Earrings', 27),
(32, 'Bracelets', 27),
(33, 'Necklaces', 27),
(34, 'Pendants', 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `general` enum('male','female') DEFAULT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
