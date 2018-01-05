-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2018 at 11:45 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article`) VALUES
(1, 'In early childhood Sraunus (real name - Paulius Markutis) started to play with a comb and piece of paper to imitate the sound of the flanger effect. I was singing in front of a mirror in my fictional language. That was how it all started, Sraunus experiment began. It was interesting, that I was so little taught about music. My creativity roots are firmly seated and I\'m still singing in my own music in my own known language, which is most accurately understood only by me. The others may interpret it according to themselves. Sraunus creations can be described as complicated electronic dub variations, that are floating between minimal techno and experimental restraints diving into pure ambient. In Sraunus journey through music experiments you can clearly hear my influence of Vangelis, Biosphere, Basic Channel community, Deepchord, Pink Floyd, Mr. Cloudy, Angelo Badalamenti (David Lynch\'s \'Twin Peaks\' soundtrack author). Music to enjoy the charm of long and dark nights.');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `color_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `color_code`) VALUES
(24, 'main', '#40119C'),
(25, 'main', '#FFF44A'),
(26, 'main', '#47FFE2'),
(27, 'main', '#2B94FF'),
(28, 'main', '#FF0000'),
(29, 'main', '#03FDFF'),
(30, 'main', '#00FF13');

-- --------------------------------------------------------

--
-- Table structure for table `iframes`
--

CREATE TABLE `iframes` (
  `id` int(11) NOT NULL,
  `src` varchar(150) NOT NULL,
  `href` varchar(100) NOT NULL,
  `label` varchar(50) NOT NULL,
  `artLinks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iframes`
--

INSERT INTO `iframes` (`id`, `src`, `href`, `label`, `artLinks`) VALUES
(1, 'https://bandcamp.com/EmbeddedPlayer/album=255314140/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/ambient', 'Ambient by Sraunus', './images_art/1Ambient.jpg'),
(2, 'https://bandcamp.com/EmbeddedPlayer/album=1601112954/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/atmospheric-insomnia', 'Atmospheric Insomnia by Sraunus', './images_art/2Atmospheric_Insomnia.jpg'),
(3, 'https://bandcamp.com/EmbeddedPlayer/album=4103229316/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/asperatus-clouds', 'Asperatus Clouds by Sraunus', './images_art/3Asperatus_Clouds.jpg'),
(4, 'https://bandcamp.com/EmbeddedPlayer/album=74384327/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/vibrant-dead-rock', 'VIBRANT DEAD ROCK by Sraunus', './images_art/4VIBRANT_DEAD_ROCK.jpg'),
(5, 'https://bandcamp.com/EmbeddedPlayer/album=3142394891/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/season-1', 'Season 1 by Sraunus', './images_art/5Season_1.jpg'),
(6, 'https://bandcamp.com/EmbeddedPlayer/album=1290605309/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/novellas', 'Novellas by Sraunus', './images_art/6Novellas.jpg'),
(7, 'https://bandcamp.com/EmbeddedPlayer/album=24979014/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/apie-pauli-epet', 'Apie Pauliu Sepeti by Sraunus', './images_art/7Apie_Pauliu_Sepeti.jpg'),
(8, 'https://bandcamp.com/EmbeddedPlayer/album=936072141/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/humanistinis-ep', 'Humanistinis ep by Sraunus', './images_art/8Humanistinis_ep.jpg'),
(9, 'https://bandcamp.com/EmbeddedPlayer/album=3145400858/size=large/bgcol=333333/linkcol=0f91ff/transparent=true/', 'http://sraunus.bandcamp.com/album/zukunft-afrika', 'Zukunft Afrika by Sraunus', './images_art/Zukunft Africa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `thumb_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_path`, `thumb_path`) VALUES
(22, '../images/gallery/1.jpg', '../images/gallery/thumbnails/thumb_1.jpg'),
(23, '../images/gallery/2.jpg', '../images/gallery/thumbnails/thumb_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(5, 'labas', 'nelabas', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iframes`
--
ALTER TABLE `iframes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `iframes`
--
ALTER TABLE `iframes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
