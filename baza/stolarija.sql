-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 02:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stolarija`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `ID` int(11) NOT NULL,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Sifra` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `ID` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Ukupna_cena` int(11) NOT NULL,
  `IDKorisnik` int(11) NOT NULL,
  `IDProizvod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `ID` int(11) NOT NULL,
  `Naziv` varchar(50) NOT NULL,
  `Slika` text NOT NULL,
  `Cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`ID`, `Naziv`, `Slika`, `Cena`) VALUES
(1, 'Jednokrilni', 'slike/jednokrilni.jpeg', 100),
(2, 'Dvokrilni', 'slike/dvokrilni.jpeg', 200),
(3, 'Vrata jednokrilna', 'slike/vrataj.jpeg', 150),
(4, 'Vrata dvokrilna', 'slike/vratad.jpeg', 250),
(5, 'Rolokomarnik', 'slike/rolokomarnik.jpeg', 50),
(6, 'Roletna', 'slike/roletna.jpeg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `stavkeporudzbine`
--

CREATE TABLE `stavkeporudzbine` (
  `ID` int(11) NOT NULL,
  `IDPorudzbina` int(11) NOT NULL,
  `IDProizvod` int(11) NOT NULL,
  `Kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `korisnik` (`IDKorisnik`),
  ADD KEY `proizvod` (`IDProizvod`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stavkeporudzbine`
--
ALTER TABLE `stavkeporudzbine`
  ADD PRIMARY KEY (`ID`,`IDPorudzbina`),
  ADD KEY `proizvod` (`IDProizvod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stavkeporudzbine`
--
ALTER TABLE `stavkeporudzbine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
