-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 dec 2017 om 15:58
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
-- Tabelstructuur voor tabel `companies`
--

CREATE TABLE `companies` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_kvk` int(8) NOT NULL,
  `c_owner` varchar(255) NOT NULL,
  `c_deliver_address` varchar(255) NOT NULL,
  `c_zipcode` varchar(7) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `c_phone_m` varchar(255) DEFAULT NULL,
  `c_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `companies`
--

INSERT INTO `companies` (`c_id`, `c_name`, `c_kvk`, `c_owner`, `c_deliver_address`, `c_zipcode`, `c_city`, `c_phone`, `c_phone_m`, `c_email`) VALUES
(1, 'Broekhuis Rijssen', 65781066, 'Jan Averdijk', 'Kalanderstraat 9', '7461JL', 'Rijssen', '0548520738', '0611991522', 'jan.averdijk@broekhuis.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employees`
--

CREATE TABLE `employees` (
  `e_id` int(11) NOT NULL,
  `e_firstname` varchar(255) NOT NULL,
  `e_lastname` varchar(255) NOT NULL,
  `e_email` varchar(255) NOT NULL,
  `e_password` varchar(255) NOT NULL,
  `e_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employees_training`
--

CREATE TABLE `employees_training` (
  `et_id` int(11) NOT NULL,
  `et_title` varchar(255) NOT NULL DEFAULT 'Training',
  `et_description` varchar(255) NOT NULL,
  `et_seats` int(2) NOT NULL,
  `et_date` varchar(255) NOT NULL,
  `et_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `job_offers`
--

CREATE TABLE `job_offers` (
  `j_id` int(11) NOT NULL,
  `j_title` varchar(255) NOT NULL,
  `j_sub_title` varchar(255) NOT NULL,
  `j_message` longtext NOT NULL,
  `j_city` varchar(255) NOT NULL,
  `j_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `n_title` varchar(255) NOT NULL,
  `n_sub_title` varchar(255) NOT NULL,
  `n_message` longtext NOT NULL,
  `n_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `o_products` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_description` longtext NOT NULL,
  `p_price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`p_id`, `p_title`, `p_description`, `p_price`) VALUES
(1, 'Mattenset', 'Mattenset 2008', 150),
(2, 'Mattenset', 'Mattenset 3008', 200),
(11, 'Mattenset', '108', 50);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `routes`
--

CREATE TABLE `routes` (
  `r_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tokens`
--

CREATE TABLE `tokens` (
  `t_id` int(11) NOT NULL,
  `t_type` enum('0','1','2') NOT NULL,
  `t_token` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_firstname` varchar(255) NOT NULL,
  `u_lastname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_user_level` enum('0','1','2','3') NOT NULL DEFAULT '1',
  `u_active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`u_id`, `c_id`, `u_firstname`, `u_lastname`, `u_email`, `u_password`, `u_user_level`, `u_active`) VALUES
(1, 1, 'Jan', 'Averdijk', 'julianvanheek30@hotmail.com', '$2y$10$rgOZDUv5ab2UIJlgt4jMzeK7UCXP89G5lPctfj5Zc.pNi7lq2WGfi', '3', '1');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexen voor tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexen voor tabel `employees_training`
--
ALTER TABLE `employees_training`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexen voor tabel `job_offers`
--
ALTER TABLE `job_offers`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexen voor tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexen voor tabel `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexen voor tabel `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `companies`
--
ALTER TABLE `companies`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `employees_training`
--
ALTER TABLE `employees_training`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `job_offers`
--
ALTER TABLE `job_offers`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `routes`
--
ALTER TABLE `routes`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
