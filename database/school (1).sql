-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 apr 2020 om 14:20
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '.'),
(4, 'max', '.'),
(6, 'admintest', '$2y$10$4UjmHnSVwfur7Sy/X1Hzi.OB9riTZEXOAT8FXmPvzpm4svgMDVkaO'),
(7, 'admin123', '$2y$10$j9XrIC45UpHydHVmptQHvOT4.VGBBVHS.SmX3WuzSwCIh3kYvF69q'),
(8, 'pwdtest', '$2y$10$j0WVcT7xe0imZyCMG06iJuZWnjALfGvPbc3qommPLvA7lPME6ZPiu');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `active`) VALUES
(1, 'openworld', 'open world zijn op world games waar je vrij kan rondlopen', 1),
(2, 'action', 'action games zijn actie games', 1),
(3, 'fps', 'fps games zijn first person shooters', 1),
(4, 'local', 'local spellen zijn spellen die je alleen lokaal kan spelen ', 1),
(5, 'multiplayer', 'multiplayer is online en hier speel je met of tegen andere mensen', 1),
(6, 'anime', 'anime is een japanse tekenstijl', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `costumer`
--

CREATE TABLE `costumer` (
  `id` int(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(10) DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `street` varchar(30) NOT NULL,
  `houseNumber` int(5) NOT NULL,
  `houseNumber_addon` varchar(2) DEFAULT NULL,
  `zipCode` varchar(7) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `emailadress` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `newsletter_subscription` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `costumer`
--

INSERT INTO `costumer` (`id`, `gender`, `firstName`, `middleName`, `lastName`, `street`, `houseNumber`, `houseNumber_addon`, `zipCode`, `city`, `country`, `phone`, `emailadress`, `password`, `newsletter_subscription`) VALUES
(11, '?', '', '', '', '', 0, '', '', '', '', '', '', '', 0),
(12, 'm', 'max', 'van', 'gorp', 'ingenhouszstraat', 53, NULL, '3514hv', 'Utrecht', 'Nederland', '0648055428', 'maxvangorp1001@gmail.com', '$2y$10$3lRLa93HTFzvsc2pu22H4eeaa5FwuPYOWnsTJdZJHpApHE6Kmiuse', 0),
(17, 'm', 'test', 'test', 'tetst', '12', 21, '12', '12', '12', '12', '12', '12@gmail.com', '$2y$10$OE4mBxAH0wQp40.yYRdrM.atfiPP89Zhi/mIBMKnXmRtPWJ4KITbu', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `category_id` int(6) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `platform` varchar(30) NOT NULL,
  `ageRestriction` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category_id`, `price`, `platform`, `ageRestriction`, `active`) VALUES
(1, 'cyberpunk 2077', 'cyberpunk 2077 is een openworld action-adventure story in the future thats opsessed with power and body modification', 1, '59.99', 'pc, ps4, xbox one', 18, 1),
(2, 'doom eternal', 'hells leger is de aarde binnengedrongen. jij bent de gene die hun moet doden ', 3, '59.99', 'pc, ps4, xbox one, switch', 18, 1),
(3, 'monster hunter world', 'monster hunter world speelt zich op een wereld af waar jij op monster kan jagen ', 1, '29.99', 'pc, ps4, xbox one', 12, 1),
(4, 'pummel party', 'pummel party is de perfecte game om met je vrienden thuis te spelen', 4, '12.49', 'pc, ps4', 0, 1),
(5, 'middle-earth: shadow of war ', 'middle earth speelt zich af in de wereld van de lord of the rings jij bent een koning die zijn koningkrijk groter maakt', 5, '11.99', 'pc, ps4, xbox one', 18, 1),
(6, 'grand theft auto V', 'dit is een spel waar ij keuzen kan maken in los santos ', 2, '14.99', 'pc, ps4, xbox one', 18, 1),
(7, 'biped', 'biped is een local coop game tussen 2 spelers', 4, '12.49', 'pc', 0, 1),
(8, 'one piece pirates warriors 4', 'one piece pirates warriors 4 is een japans spel waar jij als one piece speelt van de serie one piece', 6, '49.99', 'pc, ps4, xbox one, switch', 12, 1),
(9, 'cities skyline', 'cities skyline is een spel is een waar jij een stad moet maken ', 4, '5.59', 'pc, ps4, xbox one, switch, mac', 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `active`) VALUES
(1, 3, 'monster1.jpg', 1),
(2, 3, 'monster2.jpg', 1),
(3, 3, 'monster3.jpg', 1),
(4, 2, 'doom1.jpg', 1),
(5, 2, 'Doom2.jpg', 1),
(6, 2, 'Doom3.jpg', 1),
(7, 1, 'cyber1.jpg', 1),
(8, 1, 'cyber2.jpg', 1),
(9, 1, 'cyber3.jpg', 1),
(10, 4, 'pummel2.jpg', 1),
(11, 4, 'pummel3.jpg', 1),
(12, 4, 'pummel1.jpg', 1),
(13, 6, 'GTA1.jpg', 1),
(14, 6, 'GTA2.jpg', 1),
(15, 6, 'GTA3.jpg', 1),
(16, 8, 'one1.jpg', 1),
(17, 8, 'one2.jpg', 1),
(18, 8, 'one3.jpg', 1),
(19, 7, 'biped1.jpg', 1),
(20, 7, 'biped2.jpg', 1),
(21, 7, 'biped3.jpg', 1),
(22, 5, 'middle1.jpg', 1),
(23, 5, 'middle2.jpg', 1),
(24, 5, 'middle3.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(100) NOT NULL,
  `costumer_id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `street` varchar(70) NOT NULL,
  `houseNumber` int(4) NOT NULL,
  `houseNumber_addon` varchar(4) NOT NULL,
  `zipCode` varchar(8) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `delivery` enum('ophalen','bezorgen_thuis','bezorgen_anders','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `costumer_id`, `date`, `street`, `houseNumber`, `houseNumber_addon`, `zipCode`, `city`, `country`, `paid`, `delivery`) VALUES
(1, 1, '2020-04-01 00:00:00', 'ander aflever adres', 123, 'bis', '1234ab', 'utrecht', 'nederland', 1, 'bezorgen_anders');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(50) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `product_id`, `amount`) VALUES
(1, 1, 5, 3),
(2, 1, 1, 1),
(3, 1, 2, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `firstName` varchar(12) DEFAULT NULL,
  `middleName` varchar(10) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `houseNumber` int(5) DEFAULT NULL,
  `houseNumber_addon` varchar(2) DEFAULT NULL,
  `zipCode` varchar(10) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `emailadres` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rechten` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `gender`, `firstName`, `middleName`, `lastName`, `birthDate`, `street`, `houseNumber`, `houseNumber_addon`, `zipCode`, `city`, `country`, `phone`, `emailadres`, `password`, `rechten`) VALUES
(4, '', 'jan', 'van', 'os', '2020-01-01', '', 0, '', '', '', '', '', 'jos@glu.nl', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(13, '', 'max', 'van', 'Gorp', '0000-00-00', '', 0, '', '', '', '', '', 'max124@gmail.com', '286Werkplaats', 2),
(14, '', 'max', 'van', 'van Gorp', '0000-00-00', '', 0, '', '', '', '', '', 'max@gmail.com', '286Werkplaats', 2),
(16, '', 'max', 'van', 'gorp', '2003-07-10', '', 0, '', '', '', '', '', 'maxvg@gmail.com', '$2y$10$nAqjZd6P38f.yhoYMkkJ6O7LkbHtVlX9s4ACcJCwn13guBeNvu1u2', 2),
(17, 'm', '1', '1', '1', '1111-11-11', '1', 1, '1', '1', '2', '2', '1', '2@gmail.com', '$2y$10$FwwD4ziiayzgk0AGWaGhFe9lMos65540jSWguT9GMsszw6SNnC.aC', 2),
(20, 'm', 'max', 'van', ' gorp', NULL, '53123', 53, '53', '3514hv', 'Utrecht', 'Nederland', '0648055428', 'maxvangorp123@gmail.', '$2y$10$SfK7ucttmkMrn75V3QN6iO43IiiqxtZ/eSWJjr6rEKm6h9vR3aDBW', 1),
(22, 'm', '123', '123', '123', NULL, '123', 123, '12', '123', '123', '123', '123', '123', '$2y$10$FwwD4ziiayzgk0AGWaGhFe9lMos65540jSWguT9GMsszw6SNnC.aC', 1),
(23, 'm', 'max', 'van', 'gorp', NULL, '53', 321, NULL, '3514hv', 'Utrecht', 'Nederland', '0648055428', '213@gmail.com', '$2y$10$IDICJeJgbTzWSVPcsVqJ/.OiWCbi3KIb8mz20tFw2jxDIuKnTQlSC', 1),
(25, 'm', '123', '123', '123', NULL, '53123', 123, '12', '3514h123v', 'Utrecht', 'Nederland', '0648055428', '1001@gmail.com', '$2y$10$NSIdtJ13Q6A3GSR8c2u8dO0zSR0/CZnO8qj2Pl6oLNSIY2hCkXZRm', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailadress` (`emailadress`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailadres` (`emailadres`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT voor een tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
