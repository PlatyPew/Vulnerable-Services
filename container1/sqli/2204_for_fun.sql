-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 03:27 PM
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
-- Database: `2204_for_fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idmember` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `email`, `password`, `username`) VALUES
(1, '123@gmail.com', '$2y$10$pyt64v4DD68btK4DMC4yQuyVlvmraE1HgY5hE6', NULL),
(2, '321@gmail.com', '$2y$10$VJjwvBYHKoTOliXx1KIEHeeGvJsM6G93y0Ro3G', NULL),
(3, 'k@gmail.com', '$2y$10$o1tnq09MZSJtEiutSwbcdewu.QBcG/ifNSt4Bj', NULL),
(5, 'qwe@gmail.com', '$2y$10$BHq2BSKjY3NkYrVxcVoLe.tVMsKmSJGbVmUX4Q', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_of_tings`
--

CREATE TABLE `table_of_tings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_of_ting` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `colour` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_of_tings`
--

INSERT INTO `table_of_tings` (`id`, `name_of_ting`, `price`, `colour`) VALUES
(1, 'pen', '2sgd', 'red'),
(2, 'pencil', '2sgd', 'black'),
(3, 'bag', '4sgd', 'blue'),
(4, 'backpack', '5sgd', 'brown'),
(5, 'laptop', '10sgd', 'pink'),
(6, 'book', '2sgd', 'white');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `table_of_tings`
--
ALTER TABLE `table_of_tings`
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_of_tings`
--
ALTER TABLE `table_of_tings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
