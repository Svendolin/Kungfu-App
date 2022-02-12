SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `kungfu`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `CRUD`
--

CREATE TABLE `CRUD` (
  `ID` int(4) unsigned NOT NULL,
  `vorname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bemerkungen` varchar(1500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `CRUD`
--
ALTER TABLE `CRUD`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `CRUD`
--
ALTER TABLE `CRUD`
  MODIFY `ID` int(4) unsigned NOT NULL AUTO_INCREMENT;