-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 15 apr 2015 om 12:14
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `examen_sql`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechten`
--

CREATE TABLE IF NOT EXISTS `gerechten` (
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `type` varchar(150) COLLATE utf8_bin NOT NULL,
`gerechtid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `gerechten`
--

INSERT INTO `gerechten` (`name`, `type`, `gerechtid`) VALUES
('Kipschotel', 'hoofdgerecht', 1),
('Visschotel', 'hoofdgerecht', 2),
('Soep', 'voorgerecht', 3),
('Salade', 'voorgerecht', 4),
('Chocoladecake', 'nagerecht', 5),
('Chocomouse', 'nagerecht', 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menukeuzes`
--

CREATE TABLE IF NOT EXISTS `menukeuzes` (
  `personeelid` int(10) NOT NULL,
  `starter` varchar(150) COLLATE utf8_bin NOT NULL,
  `hoofdgerecht` varchar(150) COLLATE utf8_bin NOT NULL,
  `dessert` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `menukeuzes`
--

INSERT INTO `menukeuzes` (`personeelid`, `starter`, `hoofdgerecht`, `dessert`) VALUES
(1, 'Soep', 'Visschotel', 'Chocomouse'),
(2, 'Soep', 'Kipschotel', 'Chocomouse');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personeelsleden`
--

CREATE TABLE IF NOT EXISTS `personeelsleden` (
`personeelsid` int(150) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `usertype` int(10) NOT NULL DEFAULT '10',
  `username` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `personeelsleden`
--

INSERT INTO `personeelsleden` (`personeelsid`, `email`, `password`, `usertype`, `username`) VALUES
(1, 'yasmineplasmans@gmail.com', 'examen-sql', 1, 'YasminePlasmans'),
(2, 'ditiseentest@gmail.com', 'grapje', 10, 'Testje');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gerechten`
--
ALTER TABLE `gerechten`
 ADD PRIMARY KEY (`gerechtid`);

--
-- Indexen voor tabel `menukeuzes`
--
ALTER TABLE `menukeuzes`
 ADD PRIMARY KEY (`personeelid`);

--
-- Indexen voor tabel `personeelsleden`
--
ALTER TABLE `personeelsleden`
 ADD PRIMARY KEY (`personeelsid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gerechten`
--
ALTER TABLE `gerechten`
MODIFY `gerechtid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `personeelsleden`
--
ALTER TABLE `personeelsleden`
MODIFY `personeelsid` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `menukeuzes`
--
ALTER TABLE `menukeuzes`
ADD CONSTRAINT `menukeuzes_ibfk_1` FOREIGN KEY (`personeelid`) REFERENCES `personeelsleden` (`personeelsid`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
