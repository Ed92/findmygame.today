-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Mrz 2018 um 09:39
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `findmygame`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `comments_input` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `connector`
--

CREATE TABLE `connector` (
  `fk_group_id` int(11) DEFAULT NULL,
  `fk_tags_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `connector2` (
  `fk_group_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `games`
--

CREATE TABLE `games` (
  `games_id` int(11) NOT NULL,
  `games_name` varchar(255) DEFAULT NULL,
  `games_platform` varchar(150) DEFAULT NULL,
  `fk_genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE `groups` (
  `groups_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `scheduling` varchar(255) NOT NULL,
  `target_audience` varchar(200) NOT NULL,
  `open_spots` int(11) NOT NULL,
  `fk_games_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`groups_id`, `group_name`, `description`, `scheduling`, `target_audience`, `open_spots`, `fk_games_id`) VALUES
(1, 'Dummy group', 'lorem epson lorem epson lorem epson lorem epson lorem epson lorem epson lorem epson lorem epson ', 'friday evening', 'table top gamers', 8, NULL),
(3, 'boardgamers', '', 'every monday, time flexible', 'boardgamers', 5, NULL),
(4, 'boardgamers', '', 'every monday, time flexible', 'boardgamers', 5, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

CREATE TABLE `tags` (
  `tags_id` int(11) NOT NULL,
  `tag_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`tags_id`, `tag_name`) VALUES
(1, 'table tob');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `discord` varchar(255) DEFAULT NULL,
  `favorite_game` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `dob`, `avatar`, `discord`, `favorite_game`, `user_type`) VALUES
(1, 'test', 't@t.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1996-08-08', '', '', '', 1),
(2, 'conny', 'c@c.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1996-08-08', '', '', '', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indizes für die Tabelle `connector`
--
ALTER TABLE `connector`
  ADD KEY `fk_group_id` (`fk_group_id`),
  ADD KEY `fk_tags_id` (`fk_tags_id`);

  ALTER TABLE `connector2`
  ADD KEY `fk_group_id` (`fk_group_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indizes für die Tabelle `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`games_id`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indizes für die Tabelle `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groups_id`),
  ADD KEY `fk_games_id` (`fk_games_id`);

--
-- Indizes für die Tabelle `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tags_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `games`
--
ALTER TABLE `games`
  MODIFY `games_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `groups`
--
ALTER TABLE `groups`
  MODIFY `groups_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tags`
--
ALTER TABLE `tags`
  MODIFY `tags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `connector`
--
ALTER TABLE `connector`
  ADD CONSTRAINT `connector_ibfk_1` FOREIGN KEY (`fk_group_id`) REFERENCES `groups` (`groups_id`),
  ADD CONSTRAINT `connector_ibfk_2` FOREIGN KEY (`fk_tags_id`) REFERENCES `tags` (`tags_id`);

--
-- Constraints der Tabelle `groups`
--
-- ALTER TABLE `groups`
--   ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`fk_users_id`) REFERENCES `users` (`user_id`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
