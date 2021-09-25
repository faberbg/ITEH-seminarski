-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 01:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kladionica`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(6) NOT NULL,
  `ime_prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_uloga` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime_prezime`, `email`, `sifra`, `id_uloga`) VALUES
(57, 'Ana Anic', 'ana123@gmail.com', 'ana123', 1),
(58, 'Milan Milic', 'milan@gmail.com', 'milan', 2),
(59, 'test', 'test@gmail.com', 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `listic`
--

CREATE TABLE `listic` (
  `id` int(6) NOT NULL,
  `id_zaposleni` int(6) NOT NULL DEFAULT 41,
  `id_kladionicar` int(6) NOT NULL,
  `id_utakmica` int(6) NOT NULL,
  `kvota` int(11) NOT NULL DEFAULT 0,
  `rezultat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ulog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listic`
--

INSERT INTO `listic` (`id`, `id_zaposleni`, `id_kladionicar`, `id_utakmica`, `kvota`, `rezultat`, `ulog`) VALUES
(204, 57, 59, 77, 2, '1', 50);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(6) NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'zaposleni'),
(2, 'kladionicar');

-- --------------------------------------------------------

--
-- Table structure for table `utakmica`
--

CREATE TABLE `utakmica` (
  `id` int(6) NOT NULL,
  `tim1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tim2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `vreme` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utakmica`
--

INSERT INTO `utakmica` (`id`, `tim1`, `tim2`, `opis`, `vreme`) VALUES
(77, 'Barselona ', 'Real Madrid ', '1 4.0\r\n2.1.5\r\nX 2.0', '01.10.2021 Barselona, Spanija'),
(78, 'Madjarska', 'Portugal', '1 1.5\r\n2 3\r\nx 2', '10.10.2021. Budimpesta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uloga_fk` (`id_uloga`);

--
-- Indexes for table `listic`
--
ALTER TABLE `listic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontrolor_fk` (`id_kladionicar`),
  ADD KEY `vlasnik_fk` (`id_zaposleni`),
  ADD KEY `vozilo_fk` (`id_utakmica`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `listic`
--
ALTER TABLE `listic`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utakmica`
--
ALTER TABLE `utakmica`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `uloga_fk` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listic`
--
ALTER TABLE `listic`
  ADD CONSTRAINT `kontrolor_fk` FOREIGN KEY (`id_kladionicar`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `vlasnik_fk` FOREIGN KEY (`id_zaposleni`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `vozilo_fk` FOREIGN KEY (`id_utakmica`) REFERENCES `utakmica` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
