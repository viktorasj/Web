-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2018 at 08:59 PM
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
-- Database: `nfq`
--

-- --------------------------------------------------------

--
-- Table structure for table `guitar_price`
--

CREATE TABLE `guitar_price` (
  `id` int(4) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `guitar_price`
--

INSERT INTO `guitar_price` (`id`, `price`) VALUES
(1, 469);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `shipping_adr` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order_price` int(4) NOT NULL,
  `order_number` varchar(255) CHARACTER SET utf32 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `last_name`, `email`, `shipping_adr`, `qty`, `order_price`, `order_number`, `date`) VALUES
(1, 'Rokas', 'Burokas', 'rokas.burokas@gmail.com', 'Putinų g. 55, Alytus', '1', 469, 'IFq7eWAk', '2017-06-13'),
(2, 'Martynas', 'Karpavičius', 'martynas.karpavicius@yahoo.com', 'Gudų g. 98-1, Klaipėda', '1', 469, 'pdEDL8if', '2017-09-12'),
(3, 'Julija', 'Šukevičiūtė', 'julija@one.lt', 'Alyvų g. 8-31, Vilkaviškis', '1', 469, 'It36zjOU', '2018-01-05'),
(4, 'Arnoldas', 'Žukas', 'arnoldas.zukas@gmail.com', 'Karmėlavos g. 7, Kaunas', '2', 938, 'oJRLDEPP', '2017-11-12'),
(5, 'Vitalijus', 'Molis', 'molis.vitalijus@yahoo.com', 'Husarų g. 61, Alytus', '1', 469, 'D51Bpfww', '2017-06-04'),
(6, 'Asta', 'Kurlinskaitė', 'kurlinskaitee@gmail.com', 'Jovanos g. 13, Vilnius', '1', 469, 'FXo8zVDG', '2017-08-14'),
(7, 'Igoris', 'Sutkinas', 'igoris@sutkinas.com', 'Kauno g. 1-14, Vilnius', '2', 938, 'V4qQm5rY', '2018-02-17'),
(8, 'Akvilė', 'Dundurytė', 'akv.dund@hotmail.com', 'Laukinių arklių g. 8, Kuršėnai', '1', 469, 'cbug6JAY', '2017-03-09'),
(9, 'Tadas', 'Žukauskas', 'tadaszukauskas@hotmail.com', 'Naujoji g. 14-11, Alytus', '1', 469, 'FZkOjEI7', '2017-10-14'),
(10, 'Laurynas', 'Papartynas', 'papartynas@one.lt', 'Medvėgalio g. 18, Kaunas', '2', 938, 'CNvMD3a2', '2017-10-07'),
(11, 'Denisas', 'Orbakovas', 'orbakovas.denis@gmail.com', 'Kuratorių g. 11, Klaipėda', '1', 469, 'ktKjtiou', '2017-08-11'),
(12, 'Mindaugas', 'Skystimas', 'skystimas@kaunovandenys.lt', 'Melioratorių g. 25, Rokai', '1', 469, 's8vIVYvl', '2017-09-01'),
(13, 'Anelė ', 'Ibelhaubtaite', 'anele.ibel@yahoo.com', 'Kurmių g. 1, Tauragė', '1', 469, 'mu6DHWoc', '2017-01-11'),
(14, 'Kęstutis', 'Baniulis', 'baniulis@one.lt', 'Jazminų g. 14, Kaunas', '2', 938, 'B8tQqHVR', '2017-12-25'),
(15, 'Laura', 'Jazminaitė', 'laura.jazminaite@gmail.com', 'Strėvos g. 17-61, Tauragė', '1', 469, 'oOgP621x', '2018-02-09'),
(16, 'Viktoras', 'Jefimovas', 'viktoras.jefimovas@gmail.com', 'Studentų g. 14, Kaunas', '1', 469, 'H725qCy9', '2017-08-30'),
(17, 'Janina', 'Štukienė', 'stukiene@kaunas.lt', 'Šviesos g. 26, Kaunas', '1', 469, 'hN3UE073', '2017-07-22'),
(18, 'Modestas', 'Lapinskas', 'lapinskas.modestas@gmail.com', 'Utenos g. 17, Ukmergė', '1', 469, '03ORFG0s', '2017-12-15'),
(19, 'Darius', 'Kareivis', 'kareivis@svara,lt', 'Jurginų g. 16-18, Zarasai', '1', 469, 'XvH9ZarS', '2017-11-25'),
(20, 'Kornelija', 'Daugirdaitė', 'kornelija.daugirdaite@gmail.com', 'Vilniaus g. 44, Kaunas', '1', 469, 'PUJUoO48', '2017-05-25'),
(21, 'Dominykas', 'Obuolevičius', 'obuolevicius@sodas.lt', 'Obuolių g. 7, Kalniškės', '1', 469, 'AnZRtP1b', '2017-10-18'),
(22, 'Raimundas', 'Grigonis', 'grigonis.raimundas@gmail.com', 'Karaliaučiaus 12, Kaunas', '1', 469, 'cIsVrdmo', '2018-02-17'),
(23, 'Raimonda', 'Žukauskienė', 'raimonda.zukauskiene@hotmail.com', 'Lėktuvų g. 77, Vilnius', '1', 469, 'Kii1LPqI', '2017-05-19'),
(24, 'Giedrius', 'Belousovas', 'belousovas@one.lt', 'Ežero g. 22, Joniškis', '1', 469, 'nrt6DdOK', '2017-04-20'),
(25, 'Artiom', 'Gulkin', 'artiom.gulkin@gmail.com', 'Šiauliu g. 2, Klaipėda', '2', 938, 'zMuWdiL2', '2017-07-16'),
(26, 'Jūratė', 'Morkevičiūtė', 'morkeviciute.jurate@info.lt', 'Dzūkų g. 22-17, Varėna', '1', 469, 'mkkgTsPi', '2017-04-15'),
(27, 'Henrikas', 'Tamošiūnas', 'henriikas@delfi.lt', 'Švenčionių g. 31-39, Molėtai', '1', 469, 't2NNSOTV', '2018-02-11'),
(28, 'Marius', 'Petraitis', 'marius.petraitis@gmail.com', 'Gulbių 61-11, Vilnius', '1', 469, 'qswzfJFh', '2018-02-01'),
(29, 'Mantas', 'Paluckas', 'mantas.paluckas@yahoo.com', 'Raudondvario g. 52, Vilkyškiai', '1', 469, '0VwBdzSz', '2017-12-12'),
(30, 'Laurynas', 'Kondratavičius', 'kondratavicius.lau@gmail.com', 'Baldų sk. 12, Kaunas', '1', 469, 'u9odyzYN', '2018-01-15'),
(31, 'Romualdas', 'Juozaitis', 'rom.juoz@vilnius.lt', 'Gaižiūnų g. 44, Kaunas', '1', 469, 'URlAEVLz', '2018-02-12'),
(32, 'Kostas', 'Ridikas', 'kostas.ridikas@yahoo.com', 'Kulautuvos g. 2, Vilnius', '2', 938, 'DMjqsfUB', '2018-02-05'),
(33, 'Ieva ', 'Pakštaitė', 'ieva.pakstaite@hotmail.com', 'Kariuomenės g. 2, Griškabūdis', '1', 469, 'o9ICbROe', '2018-02-17'),
(34, 'Marius', 'Jonaitis', 'marius.jonaitis@yahoo.com', 'Jazminų g. 12, Vilnius', '1', 469, 'LiJoDQQR', '2017-08-20'),
(35, 'Dalia', 'Kuzmickienė', 'kuzmickiene.dalia@gmail.com', 'Laurų g. 4, Vilnius', '1', 469, 'BMLE9qlB', '2018-02-03'),
(36, 'Darius', 'Breskis', 'darius.breskis@gmail.com', 'Zarasų g. 61, Pakuonis', '1', 469, 'FCBkR5el', '2018-01-29'),
(37, 'Gediminas ', 'Sakalas', 'sakalas@paukstynas.lt', 'Raudondvario pl. 155, Kaunas', '1', 469, 'cIZv9Mxr', '2018-02-17'),
(38, 'Tauras', 'Morkevičius', 'tauras.morkevicius@gmail.com', 'Salako g. 19-22, Alytus', '1', 469, 'CLrqE8bE', '2018-02-14'),
(39, 'Tomas', 'Lokys', 'lokys@zverynas.lt', 'Technikos g. 81-2, Kaunas', '1', 469, 'o05oMbOW', '2018-01-09'),
(40, 'Rimantas ', 'Karalius', 'karalius.rimantas@yahoo.com', 'Paukščių g. 22-31, Utena', '1', 469, 'nDCZdVH1', '2017-04-02'),
(41, 'Robertas', 'Šalkauskas', 'salkauskas.robertas@gmail.com', 'Kriaušių 12, Kaunas', '1', 469, 'm2cKXnRy', '2017-03-30'),
(42, 'Gabrielė', 'Šiaulytė', 'gabriele.siaulyte@gmail.com', 'Jūros g. 42-11, Klaipėda', '1', 469, 'xsz0Hjh9', '2018-01-22'),
(43, 'Mantas', 'Laurinaitis', 'laurinaitis.mantas@hotmail.com', 'Pušyno g. 3, Vilnius', '2', 938, 'TQO3L2c4', '2018-02-18'),
(44, 'Gintaras', 'Kriaučiūnas', 'kriauciunas.gintaras@gmail.com', 'Lelijų g. 15-2, Šiauliai', '1', 469, 'zwlxgH5r', '2018-01-23'),
(45, 'Mindaugas', 'Kiškis', 'kiskis.mindaugas@hotmail.com', 'Gedimino g. 51-13, Kaunas', '1', 469, 'kZhrGvdm', '2018-02-18'),
(46, 'Tomas', 'Obelenis', 'tomas.ob@gmail.com', 'Tulpių g. 30, Visaginas', '1', 469, '48vQaGpm', '2017-12-04'),
(47, 'Edita', 'Rimšienė', 'edita.rimsiene@gmail.com', 'Briedžių takas 3, Naugardiškė', '1', 469, '4PL0MSxy', '2017-09-12'),
(48, 'Tadas', 'Jablonskis', 'jablonskis.tadas@gmail.com', 'Jaunimo g. 5, Ringaudai', '1', 469, 'aESEzsjp', '2018-01-18'),
(49, 'Ugnius', 'Lapinskas', 'lapinskas.ugnius@hotmail.com', 'Medeinos g. 8, Kretinga', '1', 469, 'eX0Jpyxn', '2018-01-01'),
(50, 'Domantas', 'Sladkevičius', 'domanatas.sl@gmail.com', 'Trakų g. 77, Trakai', '1', 469, 'jPcvAn3M', '2017-02-11'),
(51, 'Mindaugas', 'Kazakevičius', 'kazakevicius@vilnius.lt', 'Molėtų pl. 2, Vilnius', '1', 469, 'ynfa4ifs', '2018-02-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guitar_price`
--
ALTER TABLE `guitar_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guitar_price`
--
ALTER TABLE `guitar_price`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
