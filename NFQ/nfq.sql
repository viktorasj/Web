-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2018 at 07:27 PM
-- Server version: 10.1.23-MariaDB-9+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfq`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `sh_addr` varchar(255) NOT NULL,
  `qty` int(4) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `time_stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `sh_addr`, `qty`, `order_id`, `time_stamp`) VALUES
(1, 'Rokas', 'rokas.burokas@gmail.com', 'Putinų g. 55, Alytus', 1, 'IFq7eWAk', '2018-07-13'),
(2, 'Martynas', 'martynas.karpavicius@yahoo.com', 'Gudų g. 98-1, Klaipėda', 1, 'pdEDL8if', '2017-09-12'),
(3, 'Julija', 'julija@one.lt', 'Alyvų g. 8-31, Vilkaviškis', 1, 'It36zjOU', '2018-01-05'),
(4, 'Arnoldas', 'arnoldas.zukas@gmail.com', 'Karmėlavos g. 7, Kaunas', 2, 'oJRLDEPP', '2017-11-12'),
(5, 'Vitalijus', 'molis.vitalijus@yahoo.com', 'Husarų g. 61, Alytus', 1, 'D51Bpfww', '2017-06-04'),
(6, 'Asta', 'kurlinskaitee@gmail.com', 'Jovanos g. 13, Vilnius', 1, 'FXo8zVDG', '2017-08-14'),
(7, 'Igoris', 'igoris@sutkinas.com', 'Kauno g. 1-14, Vilnius', 2, 'V4qQm5rY', '2018-02-17'),
(8, 'Akvilė', 'akv.dund@hotmail.com', 'Laukinių arklių g. 8, Kuršėnai', 1, 'cbug6JAY', '2017-03-09'),
(9, 'Tadas', 'tadaszukauskas@hotmail.com', 'Naujoji g. 14-11, Alytus', 1, 'FZkOjEI7', '2017-10-14'),
(10, 'Laurynas', 'papartynas@one.lt', 'Medvėgalio g. 18, Kaunas', 2, 'CNvMD3a2', '2017-10-07'),
(11, 'Denisas', 'orbakovas.denis@gmail.com', 'Kuratorių g. 11, Klaipėda', 1, 'ktKjtiou', '2017-08-11'),
(12, 'Mindaugas', 'skystimas@kaunovandenys.lt', 'Melioratorių g. 25, Rokai', 1, 's8vIVYvl', '2017-09-01'),
(13, 'Anelė ', 'anele.ibel@yahoo.com', 'Kurmių g. 1, Tauragė', 1, 'mu6DHWoc', '2017-01-11'),
(14, 'Kęstutis', 'baniulis@one.lt', 'Jazminų g. 14, Kaunas', 2, 'B8tQqHVR', '2017-12-25'),
(15, 'Laura', 'laura.jazminaite@gmail.com', 'Strėvos g. 17-61, Tauragė', 1, 'oOgP621x', '2018-02-09'),
(16, 'Viktoras', 'viktoras.jefimovas@gmail.com', 'Studentų g. 14, Kaunas', 1, 'H725qCy9', '2017-08-30'),
(17, 'Janina', 'stukiene@kaunas.lt', 'Šviesos g. 26, Kaunas', 1, 'hN3UE073', '2017-07-22'),
(18, 'Modestas', 'lapinskas.modestas@gmail.com', 'Utenos g. 17, Ukmergė', 1, '03ORFG0s', '2017-12-15'),
(19, 'Darius', 'kareivis@svara,lt', 'Jurginų g. 16-18, Zarasai', 1, 'XvH9ZarS', '2017-11-25'),
(20, 'Kornelija', 'kornelija.daugirdaite@gmail.com', 'Vilniaus g. 44, Kaunas', 1, 'PUJUoO48', '2017-05-25'),
(21, 'Dominykas', 'obuolevicius@sodas.lt', 'Obuolių g. 7, Kalniškės', 1, 'AnZRtP1b', '2017-10-18'),
(22, 'Raimundas', 'grigonis.raimundas@gmail.com', 'Karaliaučiaus 12, Kaunas', 1, 'cIsVrdmo', '2018-02-17'),
(23, 'Raimonda', 'raimonda.zukauskiene@hotmail.com', 'Lėktuvų g. 77, Vilnius', 1, 'Kii1LPqI', '2017-05-19'),
(24, 'Giedrius', 'belousovas@one.lt', 'Ežero g. 22, Joniškis', 1, 'nrt6DdOK', '2017-04-20'),
(25, 'Artiom', 'artiom.gulkin@gmail.com', 'Šiauliu g. 2, Klaipėda', 2, 'zMuWdiL2', '2017-07-16'),
(26, 'Jūratė', 'morkeviciute.jurate@info.lt', 'Dzūkų g. 22-17, Varėna', 1, 'mkkgTsPi', '2017-04-15'),
(27, 'Henrikas', 'henriikas@delfi.lt', 'Švenčionių g. 31-39, Molėtai', 1, 't2NNSOTV', '2018-02-11'),
(28, 'Marius', 'marius.petraitis@gmail.com', 'Gulbių 61-11, Vilnius', 1, 'qswzfJFh', '2018-02-01'),
(29, 'Mantas', 'mantas.paluckas@yahoo.com', 'Raudondvario g. 52, Vilkyškiai', 1, '0VwBdzSz', '2017-12-12'),
(30, 'Laurynas', 'kondratavicius.lau@gmail.com', 'Baldų sk. 12, Kaunas', 1, 'u9odyzYN', '2018-01-15'),
(31, 'Romualdas', 'rom.juoz@vilnius.lt', 'Gaižiūnų g. 44, Kaunas', 1, 'URlAEVLz', '2018-02-12'),
(32, 'Kostas', 'kostas.ridikas@yahoo.com', 'Kulautuvos g. 2, Vilnius', 2, 'DMjqsfUB', '2018-02-05'),
(33, 'Ieva ', 'ieva.pakstaite@hotmail.com', 'Kariuomenės g. 2, Griškabūdis', 1, 'o9ICbROe', '2018-02-17'),
(34, 'Marius', 'marius.jonaitis@yahoo.com', 'Jazminų g. 12, Vilnius', 1, 'LiJoDQQR', '2017-08-20'),
(35, 'Dalia', 'kuzmickiene.dalia@gmail.com', 'Laurų g. 4, Vilnius', 1, 'BMLE9qlB', '2018-02-03'),
(36, 'Darius', 'darius.breskis@gmail.com', 'Zarasų g. 61, Pakuonis', 1, 'FCBkR5el', '2018-01-29'),
(37, 'Gediminas ', 'sakalas@paukstynas.lt', 'Raudondvario pl. 155, Kaunas', 1, 'cIZv9Mxr', '2018-02-17'),
(38, 'Tauras', 'tauras.morkevicius@gmail.com', 'Salako g. 19-22, Alytus', 1, 'CLrqE8bE', '2018-02-14'),
(39, 'Tomas', 'lokys@zverynas.lt', 'Technikos g. 81-2, Kaunas', 1, 'o05oMbOW', '2018-01-09'),
(40, 'Rimantas ', 'karalius.rimantas@yahoo.com', 'Paukščių g. 22-31, Utena', 1, 'nDCZdVH1', '2017-04-02'),
(41, 'Robertas', 'salkauskas.robertas@gmail.com', 'Kriaušių 12, Kaunas', 1, 'm2cKXnRy', '2017-03-30'),
(42, 'Gabrielė', 'gabriele.siaulyte@gmail.com', 'Jūros g. 42-11, Klaipėda', 1, 'xsz0Hjh9', '2018-01-22'),
(43, 'Mantas', 'laurinaitis.mantas@hotmail.com', 'Pušyno g. 3, Vilnius', 2, 'TQO3L2c4', '2018-02-18'),
(44, 'Gintaras', 'kriauciunas.gintaras@gmail.com', 'Lelijų g. 15-2, Šiauliai', 1, 'zwlxgH5r', '2018-01-23'),
(45, 'Mindaugas', 'kiskis.mindaugas@hotmail.com', 'Gedimino g. 51-13, Kaunas', 1, 'kZhrGvdm', '2018-02-18'),
(46, 'Tomas', 'tomas.ob@gmail.com', 'Tulpių g. 30, Visaginas', 1, '48vQaGpm', '2017-12-04'),
(47, 'Edita', 'edita.rimsiene@gmail.com', 'Briedžių takas 3, Naugardiškė', 1, '4PL0MSxy', '2017-09-12'),
(48, 'Tadas', 'jablonskis.tadas@gmail.com', 'Jaunimo g. 5, Ringaudai', 1, 'aESEzsjp', '2018-01-18'),
(49, 'Ugnius', 'lapinskas.ugnius@hotmail.com', 'Medeinos g. 8, Kretinga', 1, 'eX0Jpyxn', '2018-01-01'),
(50, 'Domantas', 'domanatas.sl@gmail.com', 'Trakų g. 77, Trakai', 1, 'jPcvAn3M', '2017-02-11'),
(51, 'Mindaugas', 'kazakevicius@vilnius.lt', 'Molėtų pl. 2, Vilnius', 1, 'ynfa4ifs', '2018-02-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
