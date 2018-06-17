-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2018 at 07:25 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serrano`
--

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(4) NOT NULL,
  `food_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_ingridients` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_price_medium` decimal(6,2) NOT NULL,
  `food_price_big` decimal(6,2) NOT NULL,
  `food_img_thumb` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_img_norm` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_cat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_type` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(4) NOT NULL,
  `food_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_ingridients` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_price_medium` decimal(6,2) NOT NULL,
  `food_price_big` decimal(6,2) NOT NULL,
  `food_img_thumb` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_img_norm` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_cat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_type` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `food_name`, `food_ingridients`, `food_price_medium`, `food_price_big`, `food_img_thumb`, `food_img_norm`, `food_cat`, `food_type`) VALUES
(48, 'Test Pizza 1', 'Ingridientai: 1, 2, 3, 4', 6.88, 7.11, './img/thumbs/thumb_pizza1.jpg', './img/normal/pizza1.jpg', 'Mės', 'pizza'),
(49, 'Test Pizza 2', 'Ingridientai: suris, dešra, agurkai', 8.99, 9.88, './img/thumbs/thumb_pizza2.jpg', './img/normal/pizza2.jpg', 'Mės', 'pizza');

-- --------------------------------------------------------

--
-- Table structure for table `rolls`
--

CREATE TABLE `rolls` (
  `id` int(4) NOT NULL,
  `food_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_ingridients` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_price_medium` decimal(6,2) NOT NULL,
  `food_price_big` decimal(6,2) NOT NULL,
  `food_img_thumb` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_img_norm` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_cat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_type` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salad`
--

CREATE TABLE `salad` (
  `id` int(4) NOT NULL,
  `food_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_ingridients` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_price_medium` decimal(6,2) NOT NULL,
  `food_price_big` decimal(6,2) NOT NULL,
  `food_img_thumb` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_img_norm` varchar(255) CHARACTER SET latin1 NOT NULL,
  `food_cat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_type` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolls`
--
ALTER TABLE `rolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salad`
--
ALTER TABLE `salad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `rolls`
--
ALTER TABLE `rolls`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salad`
--
ALTER TABLE `salad`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
