-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 07:14 AM
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
  `password` varchar(70) NOT NULL,
  `username` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `email`, `password`, `username`) VALUES
(1, '123@gmail.com', '$2y$10$Kx2z.9TCMTIC4g7akscKiekK/CVu6I.vfG0vfBstdkMFyGaeHIm3m', '456'),
(2, '321@gmail.com', '$2y$10$J9xfiiD9BaTFEmh5W6tDe.WUee/DpxJwucCPeeYg.URb5xEuwEZAa', '654'),
(3, 'sam@gmail.com', '$2y$10$uMrIT7jnlIbNAWNsdnNeWeizthGcxircr8Uo/3SsKCxpsVJhkLU7O', 'sung'),
(4, 'qwe@gmail.com', '$2y$10$tzFFnvwoVpG/v68O6Ks5Ju9HosqZrGF8xWWqWzNb/gFmzhDKWLGKy', 'rty'),
(5, 'prince@gmail.com', '$2y$10$MZJUfhk2Bqiv2UdMBMabkeCjAT2510rY8mjK/Kdh5zWDCAOYaxxCm', 'rain'),
(6, 'superadmin@gmail.com', '$2y$10$DND.mewjy7IdQ4eZ8FjPweZvQec07VXp9wjCmruhwjpTtr4XOAh5a', 'god'),
(7, 'king@gmail.com', '$2y$10$c61VDxPx9hBxzVL0IizeweL2lHCjcOZzKfatVRkX2.ZjPM9pPx/CK', 'nimda'),
(8, 'superadmin@mail.com', '$2y$03ac21a9797a06114f0aedd391a1e2a3', 'dog'),
(9, 'queen@gmail.com', '$2y$10$M8QTvfRphnQBkKd5CiyRYO2fw6LGw3nPwElul46tXWQHsP2fv7pLS', 'rip'),
(10, 'jim@gmail.com', '$2y$10$.rczf3pvlKV/6mOv2FCpAuRpnxFRbc5iSWoczrRjUQ2aYHTm7UTNq', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_of_tings`
--

CREATE TABLE `table_of_tings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `colour` varchar(45) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_of_tings`
--

CREATE DATABASE  IF NOT EXISTS `2204_for_fun` /*DEFAULT CHARACTER SET utf8 */;
USE `2204_for_fun`;

INSERT INTO `table_of_tings` (`id`, `name`, `price`, `colour`, `image_path`) VALUES
(1, 'Pen', '$2.00', 'red', 'https://designwanted.com/wp-content/uploads/2022/02/Bic-pen-13-scaled-1-scaled.jpg'),
(2, 'Pencil', '$2.00', 'black', 'https://www.tradeinn.com/f/13770/137700046/staedtler-noris-graduation-pencil.jpg'),
(3, 'Bag', '$4.00', 'blue', 'https://ih1.redbubble.net/image.549059937.6683/drawstring_bag,x600-pad,600x600,f8f8f8.u4.jpg'),
(4, 'Backpack', '$5.00', 'brown', 'https://media.karousell.com/media/photos/products/2018/09/04/singapore_army_backpack_1536040727_78ca2722.jpg'),
(5, 'Laptop', '$10.00', 'pink', 'https://hips.hearstapps.com/pop.h-cdn.co/assets/16/17/1461938344-lte.jpg'),
(6, 'Book', '$2.00', 'white', 'https://m.media-amazon.com/images/I/51P8kPdUOqL.jpg'),
(7, 'Phone', '$13.00', 'green', 'https://m.media-amazon.com/images/S/aplus-media/vc/64ac96f6-7bc9-4522-9806-23b68c2e57cf.__CR0,0,2100,2100_PT0_SX300_V1___.jpg'),
(8, 'Speaker', '$5.00', 'purple', 'https://asiatrend.org/wp-content/uploads/2020/06/Huge-airpod_a.jpg'),
(9, 'Shirt', '$2.00', 'black', 'https://cdn.shopify.com/s/files/1/0269/6193/6451/products/admint_1024x1024.jpg?v=1589959963'),
(10, 'Charger', '$2.00', 'black', 'https://i.ytimg.com/vi/fA2x3XsciHI/maxresdefault.jpg'),
(11, 'Notepad', '$3.00', 'white', 'https://media.istockphoto.com/photos/strong-and-weak-easy-password-note-pad-and-laptop-picture-id1050184338?k=20&m=1050184338&s=170667a&w=0&h=ujFg26nRWaidQPxxIVFXOAxaS99gF6JUG--K9otLSJQ='),
(12, 'Mouse', '$1.00', 'black', 'https://live-production.wcms.abc-cdn.net.au/fa955cd44396a37ced05d1f941d65a19?impolicy=wcms_crop_resize&cropH=576&cropW=1023&xPos=0&yPos=0&width=862&height=485');

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
  MODIFY `idmember` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table_of_tings`
--
ALTER TABLE `table_of_tings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
