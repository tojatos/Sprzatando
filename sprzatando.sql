-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Sty 2017, 15:47
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sprzatando`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers`
--

CREATE TABLE `offers` (
  `id` int(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `rooms` int(50) NOT NULL,
  `todos` int(50) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `offers`
--

INSERT INTO `offers` (`id`, `datetime`, `phone`, `email`, `place`, `price`, `rooms`, `todos`, `user`) VALUES
(4, '2017-01-16 21:37:00', '123456789', 'f@email.com', 'ul. Testowa', 343, 1, 1, 'tojatos'),
(5, '2017-01-16 12:34:00', '2353', 'f@email.com', 'ul. Testowa', 343, 2, 2, 'tojatos'),
(6, '2017-01-16 12:34:00', '2353', 'f@email.com', 'ul. Testowa', 343, 3, 3, 'tojatos'),
(7, '2017-01-17 13:00:00', '2145', 'tojatos@interia.pl', 'twitch chat', 0, 4, 4, 'tojatos'),
(8, '2017-01-17 13:00:00', '2145', 'tojatos@interia.pl', 'twitch chat', 0, 5, 5, 'tojatos'),
(9, '2017-01-17 13:00:00', '2145', 'tojatos@interia.pl', 'twitch chat', 0, 6, 6, 'tojatos'),
(10, '2017-02-26 21:37:00', '123456789', 'wyjebnik@gmail.com', 'za garażami 65/2 Opole', 50, 7, 7, 'tojatos'),
(11, '2017-02-25 06:00:00', '134531462', 'email@email.com', 'Bardzo ciekawe miejsce ;)', 500, 8, 8, 'tojatos'),
(12, '2017-07-28 12:34:00', '885234212', 'foter@f55.com', 'ul. Kościuszki Opole główne', 831, 9, 9, 'tojatos'),
(13, '2017-02-24 21:00:00', '3463246234632463', 'testowy@test.pl', 'ul. Sienkiewicza 4/3', 500, 10, 10, 'test'),
(14, '2017-02-24 21:00:00', '3463246234632463', 'testowy@test.pl', 'ul. Sienkiewicza 4/3', 500, 11, 11, 'test'),
(15, '2017-02-24 21:00:00', '3463246234632463', 'testowy@test.pl', 'ul. Sienkiewicza 536', 23, 12, 12, 'test'),
(16, '2017-03-18 23:59:00', '505707909', 'hermiona@mail.pl', 'ul.moja hacjęda', 2147483647, 13, 13, 'Minecraft'),
(17, '2017-03-18 23:59:00', '505707909', 'hermiona@mail.pl', 'ul.moja hacjęda', 2147483647, 14, 14, 'Minecraft'),
(18, '2017-02-14 15:58:00', '505707909', 'hermiona@mail.pl', 'ul. dupowa 5/405', 89, 15, 15, 'Minecraft'),
(19, '0000-00-00 00:00:00', 'ghjkkkkkkkk', 'ghfstdrgfffr@frt', 'hhhhhhhhhhh', -1, 16, 16, 'Minecraft');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `participants`
--

CREATE TABLE `participants` (
  `id` int(50) NOT NULL,
  `offer_id` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `finished` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `participants`
--

INSERT INTO `participants` (`id`, `offer_id`, `user`, `price`, `text`, `accepted`, `confirmed`, `finished`) VALUES
(1, 12, 'test', 34, 't', 1, 0, 0),
(3, 16, 'test', 4, 'fg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rooms`
--

CREATE TABLE `rooms` (
  `id` int(50) NOT NULL,
  `bathroom` tinyint(1) NOT NULL DEFAULT '0',
  `kitchen` tinyint(1) NOT NULL DEFAULT '0',
  `living_room` tinyint(1) NOT NULL DEFAULT '0',
  `bedroom` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rooms`
--

INSERT INTO `rooms` (`id`, `bathroom`, `kitchen`, `living_room`, `bedroom`) VALUES
(1, 1, 1, 0, 0),
(2, 0, 0, 0, 0),
(3, 0, 0, 0, 0),
(4, 1, 1, 1, 1),
(5, 0, 0, 0, 0),
(6, 1, 1, 1, 1),
(7, 0, 1, 0, 0),
(8, 0, 0, 1, 1),
(9, 0, 0, 0, 0),
(10, 0, 1, 0, 0),
(11, 0, 1, 0, 0),
(12, 0, 1, 0, 0),
(13, 1, 0, 0, 0),
(14, 1, 0, 0, 0),
(15, 1, 0, 0, 0),
(16, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `todos`
--

CREATE TABLE `todos` (
  `id` int(50) NOT NULL,
  `clean_car` tinyint(1) NOT NULL DEFAULT '0',
  `clean_windows` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `todos`
--

INSERT INTO `todos` (`id`, `clean_car`, `clean_windows`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 0, 0),
(7, 0, 0),
(8, 1, 1),
(9, 1, 1),
(10, 0, 0),
(11, 0, 0),
(12, 1, 1),
(13, 1, 0),
(14, 1, 0),
(15, 0, 1),
(16, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `e-mail`, `type`, `verified`, `blocked`) VALUES
(7, 'tojatos', 'dfd78a16b381b25866f43fc5ee1758438d81cd14', 'tojatos@gmail.com', 'standard', 1, 0),
(9, 'admin', '7c99cb247ff984c46570e8331ef65ae5fe9ae76c', 'admin@localhost', 'administrator', 1, 0),
(10, 'test', '3afeaa52bf36f292938d8ad6709643462a200960', 'test@test.pl', 'standard', 1, 0),
(11, 'Minecraft', 'b0fa7aa8daa7fe70d1e8dbcc2651f5a749db65d6', 'hermiona@mail.pl', 'standard', 1, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
