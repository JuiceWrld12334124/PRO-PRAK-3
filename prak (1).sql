-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 mrt 2022 om 15:34
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prak`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `appeals`
--

CREATE TABLE `appeals` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `isbanned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_parent` int(11) DEFAULT NULL,
  `resolved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`id`, `username`, `message`, `time`, `id_parent`, `resolved`) VALUES
(1, 'Emre', 'Ik wil mijn php fixen\r\n', '2022-03-08 10:50:14', 1, 0),
(3, 'Killerdead', 'Penis', '2022-03-08 15:29:49', 3, 0),
(28, 'Emre', 'Laat je code zien', '2022-03-08 10:50:31', 1, 0),
(29, 'Killerdead', 'wwwe', '2022-03-08 15:29:54', 3, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userRole` varchar(30) NOT NULL DEFAULT 'user',
  `isbanned` tinyint(1) NOT NULL,
  `bannedUntil` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`username`, `password`, `userRole`, `isbanned`, `bannedUntil`) VALUES
('Emre', 'Emre', 'admin', 0, '2022-03-07 07:49:05'),
('EmreCengel', '123', 'moderator', 0, '2022-03-10 14:12:51'),
('Killerdead', '123', 'user', 1, '2022-03-09 10:39:03');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `isBanned` (`isbanned`);

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `isBanned` (`isbanned`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `appeals`
--
ALTER TABLE `appeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `appeals`
--
ALTER TABLE `appeals`
  ADD CONSTRAINT `appeals_ibfk1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `isbanned_ibfk2` FOREIGN KEY (`isbanned`) REFERENCES `user` (`isbanned`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
