-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2015. Sze 24. 21:22
-- Szerver verzió: 5.6.17
-- PHP verzió: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `chuntestdb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `chuntesttable`
--

CREATE TABLE IF NOT EXISTS `chuntesttable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EmpFirstName` varchar(32) DEFAULT NULL,
  `EmpLastName` varchar(32) DEFAULT NULL,
  `EmpPhone` varchar(32) DEFAULT NULL,
  `EmpEmail` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `chuntesttable`
--

INSERT INTO `chuntesttable` (`id`, `EmpFirstName`, `EmpLastName`, `EmpPhone`, `EmpEmail`) VALUES
(1, 'OH CUHUN', 'LASTCHUB', '55478', 'chun@chun.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
