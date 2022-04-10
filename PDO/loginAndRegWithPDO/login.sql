-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Apr 2022 um 20:53
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kungfu`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE `login` (
  `ID` int(3) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `pw` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`ID`, `username`, `pw`) VALUES
(1, 'heiri89', '$2y$10$PZHGAXcxUdAH4Wq/z63m1.FMOSia0ZcaMQf1VYwBfIEIbTYTWwKiC'),
(2, 'carla34', '$2y$10$3.L5.e4HTDR.8hbsIgrx1eDd6.XQpjmj45sgzkARiymo4omKO5qgq'),
(3, 'Svendolin', '$2y$10$FgOn0FvCZtT6E0yyE.ZwmOBecuAxRKSRUyT3tQQBbU9lYqpKHLG1u'),
(8, 'Hansrudolf', '$2y$10$fRUa1D1AIyvLjy1G3O2u4uSqTip0nGyWhAhvwHq2oDqkpY1glTt8m');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
