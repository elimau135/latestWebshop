-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220616.7a6bd9eb57
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Jun 2022 um 22:52
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `bild` varchar(50) NOT NULL,
  `preis` decimal(10,2) NOT NULL,
  `speicherort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`a_id`, `a_name`, `beschreibung`, `bild`, `preis`, `speicherort`) VALUES
(1, 'Emma-Jamaika Blue Mountain', 'Tropische Früchte, Blumen und Nüsse', 'kaffee1.png', '49.99', 'kaffee.php'),
(2, 'Emma-Käffchen ', 'Karamell, Schokolade, Popcorn', 'kaffee2.png', '14.99', 'kaffee.php'),
(3, 'COFFEE LOVER', 'Becher Coffee Lover', 'kaffeebecher.png', '19.99', 'zubehör.php'),
(4, 'KAFFEE GLAS', 'Doppelwandiges Glas', 'kaffeeglas.png', '4.99', 'zubehör.php'),
(5, 'Emma-Aromaheld', 'Dunkle Schokolade, Kokos, Sahne, Vanille', 'Espresso.png', '19.99', 'kaffee.php'),
(6, 'OATLY', 'Hafer-Brista-Milch', 'milch1.png', '2.49', 'milch.php'),
(7, 'Elmhurst', 'Hafer-Brista-Milch', 'milch2.png', '2.49', 'milch.php'),
(8, 'All Good', 'Hafer-Brista-Milch', 'milch3.png', '2.49', 'milch.php'),
(9, 'Kaffekaraffe', 'Die MUST HAVE Karaffe für jeden modernen Haushalt!', 'kaffeekaraffe.png', '14.99', 'zubehör.php'),
(10, 'Kaffemühle', 'Kaffee entspannt im Vollautomat? Schnee von gestern!\r\nJeden Morgen laut und aufwändig Kaffee selber mahlen dank: DER KAFFEEMÜHLE', 'kaffeemühle.jpg', '79.99', 'zubehör.php'),
(11, 'Milchkanne', 'Joah - eine Milchkanne halt', 'milchkanne.png', '9.99', 'zubehör.php');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE `bestellung` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `artikelid` int(11) NOT NULL,
  `produkt` varchar(255) NOT NULL,
  `menge` int(11) NOT NULL,
  `preis` double NOT NULL,
  `versand` varchar(255) NOT NULL,
  `gesamtpreis` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bestellung`
--

INSERT INTO `bestellung` (`id`, `orderid`, `artikelid`, `produkt`, `menge`, `preis`, `versand`, `gesamtpreis`) VALUES
(1, 1, 2, 'Emma-Käffchen ', 4, 59.96, 'DHL', 134.93),
(2, 1, 3, 'COFFEE LOVER', 3, 59.97, 'DHL', 134.93),
(3, 2, 2, 'Emma-Käffchen ', 4, 59.96, 'DPD', 65.96),
(4, 5, 1, 'Emma-Jamaika Blue Mountain', 3, 149.97, 'DPD', 155.97),
(5, 6, 6, 'OATLY', 1, 2.49, 'DPD', 8.49),
(6, 7, 2, 'Emma-Käffchen ', 3, 44.97, 'DPD', 50.97),
(7, 8, 1, 'Emma-Jamaika Blue Mountain', 3, 149.97, 'DPD', 155.97),
(8, 9, 1, 'Emma-Jamaika Blue Mountain', 4, 199.96, 'DPD', 205.96),
(9, 10, 1, 'Emma-Jamaika Blue Mountain', 1, 49.99, 'DPD', 113.45),
(10, 10, 2, 'Emma-Käffchen ', 1, 14.99, 'DPD', 113.45),
(11, 10, 3, 'COFFEE LOVER', 2, 39.98, 'DPD', 113.45),
(12, 10, 6, 'OATLY', 1, 2.49, 'DPD', 113.45),
(13, 11, 2, 'Emma-Käffchen ', 4, 59.96, 'DPD', 145.92),
(14, 11, 3, 'COFFEE LOVER', 4, 79.96, 'DPD', 145.92),
(15, 12, 1, 'Emma-Jamaika Blue Mountain', 3, 149.97, 'DPD', 280.9),
(16, 12, 2, 'Emma-Käffchen ', 3, 44.97, 'DPD', 280.9),
(17, 12, 5, 'Emma-Aromaheld', 4, 79.96, 'DPD', 280.9),
(18, 13, 6, 'OATLY', 4, 9.96, 'DHL Express', 52.92),
(19, 13, 7, 'Elmhurst', 3, 7.47, 'DHL Express', 52.92),
(20, 13, 8, 'All Good', 1, 2.49, 'DHL Express', 52.92),
(21, 14, 6, 'OATLY', 4, 9.96, 'DHL Express', 52.92),
(22, 14, 7, 'Elmhurst', 3, 7.47, 'DHL Express', 52.92),
(23, 14, 8, 'All Good', 1, 2.49, 'DHL Express', 52.92),
(24, 15, 2, 'Emma-Käffchen ', 4, 59.96, 'DPD', 75.92),
(25, 15, 6, 'OATLY', 4, 9.96, 'DPD', 75.92),
(26, 16, 2, 'Emma-Käffchen ', 4, 59.96, 'DPD', 85.95),
(27, 16, 5, 'Emma-Aromaheld', 1, 19.99, 'DPD', 85.95),
(28, 17, 1, 'Emma-Jamaika Blue Mountain', 6, 299.94, 'DPD', 425.87),
(29, 17, 2, 'Emma-Käffchen ', 4, 59.96, 'DPD', 425.87),
(30, 17, 5, 'Emma-Aromaheld', 3, 59.97, 'DPD', 425.87);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungkopf`
--

CREATE TABLE `bestellungkopf` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gesamtsumme` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bestellungkopf`
--

INSERT INTO `bestellungkopf` (`id`, `userid`, `gesamtsumme`) VALUES
(1, 2, 134.93),
(2, 2, 65.96),
(3, 2, 65.96),
(4, 2, 65.96),
(5, 2, 155.97),
(6, 2, 8.49),
(7, 3, 50.97),
(8, 3, 155.97),
(9, 3, 205.96),
(10, 3, 113.45),
(11, 3, 145.92),
(12, 3, 280.9),
(13, 3, 52.92),
(14, 3, 52.92),
(15, 4, 75.92),
(16, 4, 85.95),
(17, 6, 425.87);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `loggedin`
--

CREATE TABLE `loggedin` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `loggedin`
--

INSERT INTO `loggedin` (`id`, `userid`) VALUES
(34, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `loginD` date DEFAULT '0000-00-00',
  `loginT` time(6) DEFAULT NULL,
  `loginBS` varchar(255) DEFAULT NULL,
  `loginA` varchar(255) DEFAULT NULL,
  `loginBrowser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `vorname`, `nachname`, `passwort`, `loginD`, `loginT`, `loginBS`, `loginA`, `loginBrowser`) VALUES
(6, 'robin.webprog@gmail.com', 'Robin', 'Fink', '33c39aef333cb9f9358c4d643c2503b0191f7a0f4b0a4302d4bea9376bea2884d06dd293ece4248a5ce17f927a0e891f91a737e7af0c9b7dc19658066ef00a19', '2022-06-23', '10:50:45.000000', 'Windows', '1920X1080', 'Chrome');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorb`
--

CREATE TABLE `warenkorb` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `artikelid` int(11) NOT NULL,
  `produkt` varchar(255) NOT NULL,
  `menge` int(11) NOT NULL,
  `preis` double NOT NULL,
  `rabatt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `warenkorb`
--

INSERT INTO `warenkorb` (`id`, `userid`, `artikelid`, `produkt`, `menge`, `preis`, `rabatt`) VALUES
(114, 6, 1, 'Emma-Jamaika Blue Mountain', 5, 49.99, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`a_id`);

--
-- Indizes für die Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bestellungkopf`
--
ALTER TABLE `bestellungkopf`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `loggedin`
--
ALTER TABLE `loggedin`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT für Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `bestellungkopf`
--
ALTER TABLE `bestellungkopf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `loggedin`
--
ALTER TABLE `loggedin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



