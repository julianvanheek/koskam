-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 nov 2017 om 15:50
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koskam`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_kvk` int(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_company_name` varchar(255) DEFAULT NULL,
  `user_owner_name` varchar(255) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_zipcode` varchar(7) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_delivery_adress` varchar(100) DEFAULT NULL,
  `user_level` enum('0','1','2','3') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_kvk`, `user_email`, `user_password`, `user_company_name`, `user_owner_name`, `user_phone`, `user_zipcode`, `user_city`, `user_delivery_adress`, `user_level`) VALUES
(1, 0, 'info@koskam.nl', '$2y$10$hB0NyU8sUfa9514dS5mFv.IjLgJSiQ5PnqUXRJhHWSz9yLNU1ZSES', 'koskam', '', NULL, '', NULL, NULL, '3'),
(3, 12345678, 'admin@admin.org', '$2y$10$CfAvqkEw.MXRJgHK5aGaUOMWpH7t8zHsBhYVDE..GXItjGt5jMKg2', 'admin', '', NULL, '', NULL, NULL, '2');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
