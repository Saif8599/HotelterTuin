-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 apr 2023 om 15:02
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_ter_tuin`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `guests`
--

CREATE TABLE `guests` (
  `guest_id` int(6) UNSIGNED NOT NULL,
  `guest_name` varchar(30) NOT NULL,
  `guest_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `guests`
--

INSERT INTO `guests` (`guest_id`, `guest_name`, `guest_email`) VALUES
(1, 'Hadani', 'Ninja_saif@hotmail.com'),
(2, 'mikel angelo', 'Ninja_saif@hotmail.com'),
(3, 'Seff', 'Ninja_saif@hotmail.com'),
(4, 'Wsasai Amaoi', '1@hotmail.com'),
(5, 'Taidoen', 'taidoen@hotmi.com'),
(6, 'Kalio', 'Kalio@hotmail.com'),
(7, 'TapieAK', 'TapieAK@live.com'),
(8, 'Yohannes Gehyui ', 'Gehyui@hotmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerkers`
--

INSERT INTO `medewerkers` (`id`, `username`, `password`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) UNSIGNED NOT NULL,
  `guest_id` int(11) UNSIGNED NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `guest_id`, `room_type`, `checkin_date`, `checkout_date`) VALUES
(1, 1, 'Double', '2023-02-25', '2023-02-27'),
(2, 2, 'Double', '2023-02-25', '2023-02-27'),
(3, 2, 'Double', '2023-02-25', '2023-02-27'),
(4, 2, 'Double', '2023-02-25', '2023-02-27'),
(5, 3, 'Suite', '2023-03-16', '2023-03-18'),
(6, 4, 'Double', '2023-04-23', '2023-05-07'),
(7, 5, 'Double', '2023-04-14', '2023-04-24'),
(8, 6, 'Single', '2023-04-16', '2023-04-18'),
(9, 7, 'Single', '2023-04-17', '2023-04-24'),
(10, 8, 'Double', '2023-04-24', '2023-04-28');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`guest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
