-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2018 at 09:44 PM
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
-- Database: `orca`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `who` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `who`, `email`, `comment`, `date`) VALUES
(6, 'John Doe', 'test@tes.lt', 'Nam sed purus cursus, ultricies orci id, dictum lectus. Sed gravida neque eget eros rhoncus tempus. Donec mollis porttitor urna, sit amet egestas ipsum dapibus ac. Integer tincidunt commodo enim, ornare consequat sem ultricies vel. Suspendisse viverra metus nisi, ut porta ex pretium quis. Vivamus consequat tincidunt ligula, sit amet.', '2018-07-07'),
(7, 'Blake Lawson', 'test@test.com', 'Sed quis ligula tellus. Fusce faucibus placerat dictum. Phasellus in convallis nisi. Aliquam in nibh vitae felis ultrices rhoncus eget non mauris. Maecenas maximus turpis quis ligula tincidunt commodo. In orci velit, tristique mattis faucibus eu, congue non purus. In neque nisi, facilisis non.', '2018-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `who` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `reply_comment` text CHARACTER SET latin1 NOT NULL,
  `belongs_to_id` int(12) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `who`, `email`, `reply_comment`, `belongs_to_id`, `date`) VALUES
(31, 'Jaylen Cortez', 'test@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam erat risus, efficitur vitae est sed, tempus accumsan sapien. Sed felis justo, eleifend et mi ut, tempor pulvinar metus. Morbi dignissim laoreet urna. Cras eu ante ac libero tempor ullamcorper. Curabitur vel ante condimentum, imperdiet mi a, congue eros. Praesent eleifend ante eget elementum dictum. Nullam ut faucibus nulla. Donec eget arcu vehicula, feugiat purus et, blandit eros. Duis sapien sem, dictum id dui sit amet, ultricies rhoncus erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent maximus lectus vitae dolor vulputate pharetra. Suspendisse massa massa, mollis id.', 7, '2018-07-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
