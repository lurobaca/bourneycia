-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 20:10:36
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

DROP TABLE IF EXISTS `Seller_Gastos`;
CREATE TABLE IF NOT EXISTS `Seller_Gastos` (
  `idGasto` int(11) NOT NULL AUTO_INCREMENT,
  `DocNum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NumFactura` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Total` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FechaGasto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Transmitido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EnSAP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idGasto`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
