-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2018 at 10:24 PM
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
(19, 'Sicilijos', 'Ingridientai: sūris, saliamis, alyvuogės', 5.99, 6.99, './img/pizza1.jpg', './img/pizza1.jpg', 'Veg', 'pizza'),
(21, 'Havajų', 'Sūris, kumpis, ananasai', 4.99, 6.99, './img/pizza2.jpg', './img/pizza2.jpg', 'Mės', 'pizza'),
(23, 'Capricciosa', 'Ingridientai: Sūris, pievagrybiai, alyvuogės, švieži bazilikai, saliamis', 5.99, 6.99, './img/pizza3.jpg', './img/pizza3.jpg', 'mės', 'pizza'),
(24, 'Ypatingoji', 'Ingridientai: Sūris, vištiena, šoninė, paprika, porai, bazilikų padažas', 4.99, 6.99, './img/pizza4.jpg', './img/pizza4.jpg', 'mės', 'pizza'),
(173, 'test', 'test', 12.00, 14.00, './img/thumbs/thumb_CAM00026.jpg', './img/normal/CAM00026.jpg', 'Mės', 'pizza');

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
-- Dumping data for table `salad`
--

INSERT INTO `salad` (`id`, `food_name`, `food_ingridients`, `food_price_medium`, `food_price_big`, `food_img_thumb`, `food_img_norm`, `food_cat`, `food_type`) VALUES
(22, 'Su vištiena', 'Pekino salota, pomidorai, vištiena, skrebučiai, kietasis sūris', 1.99, 1.99, './img/chicken_salad.jpg', './img/chicken_salad.jpg', 'Mės', 'salad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
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
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `salad`
--
ALTER TABLE `salad`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
