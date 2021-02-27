-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 10:49 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nekretnina`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotografije`
--

CREATE TABLE `fotografije` (
  `id_fotografije` int(11) NOT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `id_nekretnina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotografije`
--

INSERT INTO `fotografije` (`id_fotografije`, `slika`, `id_nekretnina`) VALUES
(68, 'uploads/60357c94a3c47.png', 48),
(69, 'uploads/60357c94a5457.png', 48),
(70, 'uploads/60357c94a602f.png', 48),
(71, 'uploads/60357c94a6a4e.png', 48),
(72, 'uploads/603627f953dfb.png', 49),
(73, 'uploads/603654a095d29.png', 50),
(74, 'uploads/603654a097616.png', 50),
(75, 'uploads/603654a099563.png', 50),
(79, 'uploads/603659617c1ff.png', 52),
(80, 'uploads/603659617e095.png', 52),
(81, 'uploads/603659617f93f.png', 52),
(82, 'uploads/603ab8b4e0feb.png', 53),
(83, 'uploads/603ab8b4e214a.png', 53),
(84, 'uploads/603ab8b4e2d5f.png', 53),
(87, 'uploads/603aba48967f6.png', 53),
(88, 'uploads/603abd187432a.png', 50),
(89, 'uploads/603abda034579.png', 53);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id_grad` int(11) NOT NULL,
  `grad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id_grad`, `grad`) VALUES
(1, 'Andrijevica'),
(2, 'Bar'),
(3, 'Berane'),
(4, 'Bijelo Polje'),
(5, 'Budva'),
(6, 'Cetinje'),
(7, 'Danilovgrad'),
(8, 'Herceg Novi'),
(9, 'Kolasin'),
(10, 'Kotor'),
(11, 'Mojkovac'),
(12, 'Niksic'),
(13, 'Plav'),
(14, 'Pljevlja'),
(15, 'Pluzine'),
(16, 'Podgorica'),
(17, 'Rozaje'),
(18, 'Savnik'),
(19, 'Tivat'),
(20, 'Ulcinj'),
(21, 'Zabljak'),
(24, 'Madrid');

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

CREATE TABLE `nekretnina` (
  `id_nekretnina` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `cijena` float NOT NULL,
  `povrsina` float NOT NULL,
  `stats` tinyint(1) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `godina_izgradnje` date NOT NULL,
  `datum_prodaje` date DEFAULT NULL,
  `id_grad` int(11) NOT NULL,
  `id_tip_nekretnine` int(11) NOT NULL,
  `id_tip_oglasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`id_nekretnina`, `naziv`, `cijena`, `povrsina`, `stats`, `opis`, `godina_izgradnje`, `datum_prodaje`, `id_grad`, `id_tip_nekretnine`, `id_tip_oglasa`) VALUES
(48, 'Lux Apartman', 50000, 212, 0, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae ad nulla qui consequuntur, nam aliquid a maxime quas necessitatibus voluptates enim voluptas impedit ex et soluta, distinctio molestiae rem fugiat ipsum mollitia quia unde eligendi itaque eaque? Optio, rem amet enim reprehenderit ab tempore nobis facilis explicabo? Eos, quo? Dignissimos inventore, totam perferendis incidunt aperiam possimus. Ab saepe repellendus aspernatur vero, reprehenderit, ipsum fuga inventore omnis perferendis nulla corporis optio accusantium eveniet dolor laboriosam nostrum suscipit quidem ullam. Ratione, nulla.', '2021-02-03', '2021-02-25', 18, 2, 1),
(49, 'Kuca', 51000, 70, 1, 'The Summitridge Estate, an iconic brand new Contemporary estate designed by international designer Troy Adams, which took over 7 years to complete, situated on a one acre hilltop peninsula with jetliner views from downtown to the ocean. Featuring over 21,000 sf of indoor and outdoor living spaces and rooftop terraces. 5 star resort-like living throughout including a two-story living room, dining room, professional Dolby digital theater, cigar lounge, wine cellar, glass elevator, full guest house, car museum/gallery, gym, sculpture garden, zero edge infinity pool, and state-of-the-art systems throughout including motorized lift doors, Smart house technology with Crestron system, detailed security system, 9 ft video wall and custom lighting throughout. Completely private motorcourt. An incredible one of a kind oasis comprised of every conceivable amenity, built with the highest level of quality, detail, and craftsmanship. Truly special, there is nothing that compares.', '2021-02-01', '2021-02-26', 1, 3, 1),
(50, 'Lux Vila LA', 130000, 320, 1, 'The Summitridge Estate, an iconic brand new Contemporary estate designed by international designer Troy Adams, which took over 7 years to complete, situated on a one acre hilltop peninsula with jetliner views from downtown to the ocean. Featuring over 21,000 sf of indoor and outdoor living spaces and rooftop terraces. 5 star resort-like living throughout including a two-story living room, dining room, professional Dolby digital theater, cigar lounge, wine cellar, glass elevator, full guest house, car museum/gallery, gym, sculpture garden, zero edge infinity pool, and state-of-the-art systems throughout including motorized lift doors, Smart house technology with Crestron system, detailed security system, 9 ft video wall and custom lighting throughout. Completely private motorcourt. An incredible one of a kind oasis comprised of every conceivable amenity, built with the highest level of quality, detail, and craftsmanship. Truly special, there is nothing that compares.', '2021-02-01', '2021-02-11', 16, 1, 2),
(52, 'House on sale!', 130577, 64, 1, 'The Summitridge Estate, an iconic brand new Contemporary estate designed by international designer Troy Adams, which took over 7 years to complete, situated on a one acre hilltop peninsula with jetliner views from downtown to the ocean. Featuring over 21,000 sf of indoor and outdoor living spaces and rooftop terraces. 5 star resort-like living throughout including a two-story living room, dining room, professional Dolby digital theater, cigar lounge, wine cellar, glass elevator, full guest house, car museum/gallery, gym, sculpture garden, zero edge infinity pool, and state-of-the-art systems throughout including motorized lift doors, Smart house technology with Crestron system, detailed security system, 9 ft video wall and custom lighting throughout. Completely private motorcourt. An incredible one of a kind oasis comprised of every conceivable amenity, built with the highest level of quality, detail, and craftsmanship. Truly special, there is nothing that compares.', '2021-02-01', '2021-02-11', 16, 4, 1),
(53, 'test-renamed', 1, 1, 0, 'lorem lorem', '2015-01-01', '2019-02-03', 12, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tip_nekretnine`
--

CREATE TABLE `tip_nekretnine` (
  `id_tip_nekretnine` int(11) NOT NULL,
  `tip_nekretnine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip_nekretnine`
--

INSERT INTO `tip_nekretnine` (`id_tip_nekretnine`, `tip_nekretnine`) VALUES
(1, 'Stan'),
(2, 'Kuca'),
(3, 'Garaza'),
(4, 'Poslovni prostor');

-- --------------------------------------------------------

--
-- Table structure for table `tip_oglasa`
--

CREATE TABLE `tip_oglasa` (
  `id_tip_oglasa` int(11) NOT NULL,
  `tip_oglasa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip_oglasa`
--

INSERT INTO `tip_oglasa` (`id_tip_oglasa`, `tip_oglasa`) VALUES
(1, 'Prodaja'),
(2, 'Iznajmljivanje'),
(3, 'Kompenzacija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD PRIMARY KEY (`id_fotografije`),
  ADD KEY `fk_fotografije_nekretnina` (`id_nekretnina`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id_grad`);

--
-- Indexes for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD PRIMARY KEY (`id_nekretnina`),
  ADD KEY `fk_nekretnina_grad` (`id_grad`),
  ADD KEY `fk_nekretnina_tip_nekretnine` (`id_tip_nekretnine`),
  ADD KEY `fk_nekretnina_tip_oglasa` (`id_tip_oglasa`);

--
-- Indexes for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  ADD PRIMARY KEY (`id_tip_nekretnine`);

--
-- Indexes for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  ADD PRIMARY KEY (`id_tip_oglasa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotografije`
--
ALTER TABLE `fotografije`
  MODIFY `id_fotografije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id_grad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nekretnina`
--
ALTER TABLE `nekretnina`
  MODIFY `id_nekretnina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  MODIFY `id_tip_nekretnine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  MODIFY `id_tip_oglasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD CONSTRAINT `fk_fotografije_nekretnina` FOREIGN KEY (`id_nekretnina`) REFERENCES `nekretnina` (`id_nekretnina`);

--
-- Constraints for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD CONSTRAINT `fk_nekretnina_grad` FOREIGN KEY (`id_grad`) REFERENCES `grad` (`id_grad`),
  ADD CONSTRAINT `fk_nekretnina_tip_nekretnine` FOREIGN KEY (`id_tip_nekretnine`) REFERENCES `tip_nekretnine` (`id_tip_nekretnine`),
  ADD CONSTRAINT `fk_nekretnina_tip_oglasa` FOREIGN KEY (`id_tip_oglasa`) REFERENCES `tip_oglasa` (`id_tip_oglasa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
