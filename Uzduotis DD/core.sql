-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2017 at 07:56 PM
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
-- Database: `core`
--

-- --------------------------------------------------------

--
-- Table structure for table `1users_pri`
--

CREATE TABLE `1users_pri` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1users_pri`
--

INSERT INTO `1users_pri` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'antanas', 'vairuotojas', 'driver'),
(3, 'maryte', 'moteris', 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `2fuel_usage_pri`
--

CREATE TABLE `2fuel_usage_pri` (
  `id` int(11) NOT NULL,
  `vechile_name` varchar(255) NOT NULL,
  `fl_staying` int(3) NOT NULL,
  `fl_going` int(3) NOT NULL,
  `fl_loading` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2fuel_usage_pri`
--

INSERT INTO `2fuel_usage_pri` (`id`, `vechile_name`, `fl_staying`, `fl_going`, `fl_loading`) VALUES
(6, 'SsangYong_Sprinter', 4, 14, 11),
(7, 'Honda_Transporter', 7, 17, 14),
(8, 'Lada_2107', 12, 23, 18);

-- --------------------------------------------------------

--
-- Table structure for table `3temp_set_pri`
--

CREATE TABLE `3temp_set_pri` (
  `id` int(11) NOT NULL,
  `ajax_vechile_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `3temp_set_pri`
--

INSERT INTO `3temp_set_pri` (`id`, `ajax_vechile_name`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `honda_transporter`
--

CREATE TABLE `honda_transporter` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `dayRoute` varchar(255) DEFAULT NULL,
  `departed` time DEFAULT NULL,
  `speedo_start` int(11) DEFAULT NULL,
  `arrived_to_client` time DEFAULT NULL,
  `protracted` int(4) DEFAULT NULL,
  `departed_from_client` time DEFAULT NULL,
  `arrived` time DEFAULT NULL,
  `speedo_finish` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `fuel` int(11) DEFAULT NULL,
  `driver` varchar(20) DEFAULT NULL,
  `vechile_name` varchar(30) DEFAULT NULL,
  `going_time` int(11) DEFAULT NULL,
  `staying_time` int(11) DEFAULT NULL,
  `loading_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honda_transporter`
--

INSERT INTO `honda_transporter` (`id`, `date`, `dayRoute`, `departed`, `speedo_start`, `arrived_to_client`, `protracted`, `departed_from_client`, `arrived`, `speedo_finish`, `distance`, `fuel`, `driver`, `vechile_name`, `going_time`, `staying_time`, `loading_time`) VALUES
(1, '2017-01-09', 'UAB', '09:50:00', 2950, '11:10:00', 20, '11:40:00', '13:00:00', 3000, 50, 51, 'antanas', 'honda_transporter', 160, 10, 20),
(2, '2017-11-15', 'Trakai', '12:20:00', 3000, '13:00:00', 40, '14:00:00', '15:40:00', 3104, 104, 51, 'antanas', 'honda_transporter', 140, 20, 40),
(3, '2017-10-18', 'KlaipÄ—da', '06:30:00', 3104, '09:00:00', 20, '09:50:00', '12:10:00', 3693, 589, 90, 'antanas', 'honda_transporter', 290, 30, 20),
(4, '2017-03-14', 'UkmergÄ—', '05:10:00', 3693, '06:20:00', 20, '08:20:00', '11:00:00', 3899, 206, 82, 'antanas', 'honda_transporter', 230, 100, 20),
(5, '2017-02-09', 'Utena', '03:20:00', 3899, '05:50:00', 60, '07:50:00', '10:10:00', 4109, 210, 103, 'antanas', 'honda_transporter', 290, 60, 60),
(6, '2017-01-12', 'Kaunas', '07:20:00', 4109, '08:10:00', 20, '09:00:00', '10:20:00', 4244, 135, 45, 'maryte', 'honda_transporter', 130, 30, 20);

-- --------------------------------------------------------

--
-- Table structure for table `lada_2107`
--

CREATE TABLE `lada_2107` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `dayRoute` varchar(255) DEFAULT NULL,
  `departed` time DEFAULT NULL,
  `speedo_start` int(11) DEFAULT NULL,
  `arrived_to_client` time DEFAULT NULL,
  `protracted` int(4) DEFAULT NULL,
  `departed_from_client` time DEFAULT NULL,
  `arrived` time DEFAULT NULL,
  `speedo_finish` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `fuel` int(11) DEFAULT NULL,
  `driver` varchar(20) DEFAULT NULL,
  `vechile_name` varchar(30) DEFAULT NULL,
  `going_time` int(11) DEFAULT NULL,
  `staying_time` int(11) DEFAULT NULL,
  `loading_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lada_2107`
--

INSERT INTO `lada_2107` (`id`, `date`, `dayRoute`, `departed`, `speedo_start`, `arrived_to_client`, `protracted`, `departed_from_client`, `arrived`, `speedo_finish`, `distance`, `fuel`, `driver`, `vechile_name`, `going_time`, `staying_time`, `loading_time`) VALUES
(1, '2017-09-20', 'Kaunas', '08:10:00', 12443, '10:50:00', 30, '11:40:00', '12:40:00', 12620, 177, 97, 'antanas', 'lada_2107', 220, 20, 30),
(2, '2017-07-11', 'Vilnius', '07:00:00', 12620, '09:00:00', 40, '10:10:00', '12:30:00', 12992, 372, 118, 'antanas', 'lada_2107', 260, 30, 40);

-- --------------------------------------------------------

--
-- Table structure for table `ssangyong_sprinter`
--

CREATE TABLE `ssangyong_sprinter` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `dayRoute` varchar(255) DEFAULT NULL,
  `departed` time DEFAULT NULL,
  `speedo_start` int(11) DEFAULT NULL,
  `arrived_to_client` time DEFAULT NULL,
  `protracted` int(4) DEFAULT NULL,
  `departed_from_client` time DEFAULT NULL,
  `arrived` time DEFAULT NULL,
  `speedo_finish` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `fuel` int(11) DEFAULT NULL,
  `driver` varchar(20) DEFAULT NULL,
  `vechile_name` varchar(30) DEFAULT NULL,
  `going_time` int(11) DEFAULT NULL,
  `staying_time` int(11) DEFAULT NULL,
  `loading_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssangyong_sprinter`
--

INSERT INTO `ssangyong_sprinter` (`id`, `date`, `dayRoute`, `departed`, `speedo_start`, `arrived_to_client`, `protracted`, `departed_from_client`, `arrived`, `speedo_finish`, `distance`, `fuel`, `driver`, `vechile_name`, `going_time`, `staying_time`, `loading_time`) VALUES
(1, '2017-10-10', 'Klaipeda', '18:00:00', 2833, '19:10:00', 30, '20:00:00', '22:20:00', 3284, 451, 56, 'antanas', 'ssangyong_sprinter', 210, 20, 30),
(2, '2018-03-16', 'Kulautuva', '15:40:00', 3284, '16:20:00', 10, '17:20:00', '18:10:00', 3350, 66, 26, 'antanas', 'ssangyong_sprinter', 90, 50, 10),
(3, '2017-09-06', 'TelÅ¡iai', '04:00:00', 3350, '05:20:00', 20, '05:40:00', '06:20:00', 3420, 70, 32, 'antanas', 'ssangyong_sprinter', 120, 0, 20),
(4, '2017-08-14', 'Kaunas', '11:50:00', 3420, '12:50:00', 10, '13:20:00', '14:20:00', 3580, 160, 31, 'antanas', 'ssangyong_sprinter', 120, 20, 10),
(5, '2017-07-04', 'AnykÅ¡Äiai', '07:10:00', 3580, '08:30:00', 30, '10:00:00', '12:10:00', 3782, 202, 59, 'antanas', 'ssangyong_sprinter', 210, 60, 30),
(6, '2017-07-12', 'Kaunas', '05:40:00', 3782, '07:00:00', 20, '08:20:00', '10:40:00', 3940, 158, 59, 'maryte', 'ssangyong_sprinter', 220, 60, 20),
(7, '2017-07-07', 'Vilnius', '06:20:00', 3940, '07:20:00', 20, '08:30:00', '10:10:00', 4215, 275, 44, 'maryte', 'ssangyong_sprinter', 160, 50, 20),
(8, '2017-10-11', 'Vilnius', '16:10:00', 4215, '17:40:00', 20, '18:30:00', '19:00:00', 4420, 205, 34, 'maryte', 'ssangyong_sprinter', 120, 30, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1users_pri`
--
ALTER TABLE `1users_pri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2fuel_usage_pri`
--
ALTER TABLE `2fuel_usage_pri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `honda_transporter`
--
ALTER TABLE `honda_transporter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lada_2107`
--
ALTER TABLE `lada_2107`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ssangyong_sprinter`
--
ALTER TABLE `ssangyong_sprinter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1users_pri`
--
ALTER TABLE `1users_pri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `2fuel_usage_pri`
--
ALTER TABLE `2fuel_usage_pri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `honda_transporter`
--
ALTER TABLE `honda_transporter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lada_2107`
--
ALTER TABLE `lada_2107`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ssangyong_sprinter`
--
ALTER TABLE `ssangyong_sprinter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
