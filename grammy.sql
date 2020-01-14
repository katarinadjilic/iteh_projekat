-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 08:25 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grammy`
--

-- --------------------------------------------------------

--
-- Table structure for table `glasanje`
--

CREATE TABLE `glasanje` (
  `glasanjeID` int(11) NOT NULL,
  `korisnikID` int(11) NOT NULL,
  `osobaID` int(11) NOT NULL,
  `kategorijaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `glasanje`
--

INSERT INTO `glasanje` (`glasanjeID`, `korisnikID`, `osobaID`, `kategorijaID`) VALUES
(1, 2, 2, 1),
(2, 2, 1, 2),
(3, 1, 1, 3),
(4, 2, 3, 2),
(5, 3, 11, 9),
(6, 1, 12, 3),
(7, 1, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `kategorijaID` int(11) NOT NULL,
  `nazivKategorije` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opisKategorije` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`kategorijaID`, `nazivKategorije`, `opisKategorije`) VALUES
(1, 'Najbolja pesma', 'Izbor za najbolju pesmu 2020. godine.'),
(2, 'Najbolji glas', 'Izbor za najbolji glas 2020. godine.'),
(3, 'Najbolji scenski nastup', 'Izbor za najbolji scenski nastup 2020. godine.'),
(4, 'Najbolji tekst', 'Izbor za najbolji tekst 2020. godine.'),
(5, 'Najbolji spot', 'Izbor za najbolji spot 2020. godine.'),
(6, 'Najbolji duet', 'Izbor na najbolji duet 2020. godine.'),
(7, 'Najbolji album', 'Izbor za najbolji album 2020. godine.'),
(8, 'Najbolji novi umetnik', 'Izbor za najboljeg novog umetnika 2020. godine.'),
(9, 'Najbolje zivotno delo', 'Izbor za najbolje zivotno delo 2020. godine.'),
(10, 'Najbolja solo izvedba', 'Izbor za najbolju solo izvedbu 2020. godine.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(11) NOT NULL,
  `imePrezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolaID` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `imePrezime`, `username`, `password`, `rolaID`) VALUES
(1, 'Katarina Ilic', 'katarina', 'katarina', 1),
(2, 'Ana Jankovic', 'ana', 'ana', 2),
(3, 'Irena Ilic', 'irena', 'irena', 2);

-- --------------------------------------------------------

--
-- Table structure for table `osoba`
--

CREATE TABLE `osoba` (
  `osobaID` int(11) NOT NULL,
  `imePrezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datumRodjenja` date NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `osoba`
--

INSERT INTO `osoba` (`osobaID`, `imePrezime`, `datumRodjenja`, `opis`) VALUES
(1, 'Lady Gaga', '1987-07-16', 'Rodjenja u NjuJorku, pohadjala muzicku akademiju, profesionalno se bavi muzikom od svoje 12. godine'),
(2, 'Alicia Keys', '1981-01-25', 'Rodjena u Majamiju, ima status zvezde od malena, poynata po hitovima Falling, NewYork i mnogim drugim'),
(3, 'Beyonce Giselle Knowles-Carter', '1981-01-04', 'Bivsa clanica grupe Destiny\'s child, svoju slavu je stekla jos davne 1991. Zajedno sa svojim muzem Jay-Z-jem ima troje dece i blistavu karijeru.'),
(4, 'Lana Del Ray', '1985-01-21', 'Rodjena u NjuJorku, svestrana i poznata po melodicnim hitovima koji plene sve koji cuju za njih.'),
(5, 'Ed Sheeran', '1991-01-17', 'Poznat po svojim blagim ritmovima i romaticnim pesmama, svoju slavu je stekao pre 5 godina sa hitom Shape Of You.'),
(6, 'Bruno Mars', '1985-01-08', 'Dinamican, ritmican, poznat po veselim scenskim nastupima i veselim izgledom.'),
(7, 'John Newman', '1990-01-15', 'Rodjen u UK, poznat po hitu Love me again, izdao 3 albuma do sada. Predvidja mu se blistava karijera u muzickoj karijeri.'),
(8, 'Justin Bieber', '1994-01-01', 'Najmladji nominovani na ovogodisnjem Grammy-ju, vise puta promenio svoj izgled, od nedavno ozenjen za poznatu manekenku.'),
(9, 'Taylor Swift', '1989-01-13', 'Americka pevacica i tekstopisac, poznata po ljubavnim pesmama koje posvecuje svojim bivsim momcima.'),
(10, 'Nicki Minaj', '1982-01-08', 'Potpuno drugacija od svega do sada vidjenog, jedinstvena i ponekad sokantna'),
(11, 'Madonna Loiuce Ciccone', '1958-01-16', 'Vec dugo na sceni, potpuno je besmisleno spominjati njene hitove i slavu koja je stekla svih ovih godina.'),
(12, 'Justin Timberlake', '1981-01-31', 'Bivsi vodeci vokal grupe N Sync, nakon raspada grupe oprobao se i kao grumac, miljenik zenske publike.'),
(13, 'Jennifer Lopez', '1969-01-24', 'Prepoznatljiva, jedinstvena, miljenik muske publike, odlicnog scenskog nastupa i neprevazidjenog glasa.'),
(14, 'Rihanna Fenty', '1988-01-20', 'Pevacica sa Barbadosa, svoju karijeru pocela u USA sa svima poznatim hitom Umbrella.');

-- --------------------------------------------------------

--
-- Table structure for table `rola`
--

CREATE TABLE `rola` (
  `rolaID` int(11) NOT NULL,
  `nazivRole` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`rolaID`, `nazivRole`) VALUES
(1, 'Administrator'),
(2, 'Korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glasanje`
--
ALTER TABLE `glasanje`
  ADD PRIMARY KEY (`glasanjeID`),
  ADD KEY `kategorijaID` (`kategorijaID`),
  ADD KEY `korisnikID` (`korisnikID`),
  ADD KEY `osobaID` (`osobaID`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`kategorijaID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`),
  ADD KEY `rolaID` (`rolaID`);

--
-- Indexes for table `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`osobaID`);

--
-- Indexes for table `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`rolaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glasanje`
--
ALTER TABLE `glasanje`
  MODIFY `glasanjeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `kategorijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `osoba`
--
ALTER TABLE `osoba`
  MODIFY `osobaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
  MODIFY `rolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `glasanje`
--
ALTER TABLE `glasanje`
  ADD CONSTRAINT `glasanje_ibfk_1` FOREIGN KEY (`kategorijaID`) REFERENCES `kategorija` (`kategorijaID`),
  ADD CONSTRAINT `glasanje_ibfk_2` FOREIGN KEY (`korisnikID`) REFERENCES `korisnik` (`korisnikID`),
  ADD CONSTRAINT `glasanje_ibfk_3` FOREIGN KEY (`osobaID`) REFERENCES `osoba` (`osobaID`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`rolaID`) REFERENCES `rola` (`rolaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
