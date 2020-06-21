-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 20:10:49
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
-- Estructura de tabla para la tabla `Seller_Recibo`
--

DROP TABLE IF EXISTS `Seller_Recibo`;
CREATE TABLE IF NOT EXISTS `Seller_Recibo` (
  `idRecibo` int(11) NOT NULL AUTO_INCREMENT,
  `DocNum` int(11) NOT NULL,
  `Tipo_Documento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CodCliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NumFactura` int(11) NOT NULL,
  `Abono` double NOT NULL,
  `Saldo` double NOT NULL,
  `Monto_Efectivo` double NOT NULL,
  `Monto_Cheque` double NOT NULL,
  `Monto_Tranferencia` double NOT NULL,
  `Num_Cheque` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Banco_Cheque` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Factura` date NOT NULL,
  `Fecha_Venci` date NOT NULL,
  `TotalFact` double NOT NULL,
  `Comentario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Num_Tranferencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Banco_Tranferencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gastos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hora_Abono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Impreso` int(11) NOT NULL,
  `PostFechaCheque` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DocEntry` int(11) NOT NULL,
  `CodBancocheque` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CodBantranfe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EnSap` int(11) NOT NULL,
  PRIMARY KEY (`idRecibo`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Seller_Recibo`
--

INSERT INTO `Seller_Recibo` (`idRecibo`, `DocNum`, `Tipo_Documento`, `CodCliente`, `Nombre`, `NumFactura`, `Abono`, `Saldo`, `Monto_Efectivo`, `Monto_Cheque`, `Monto_Tranferencia`, `Num_Cheque`, `Banco_Cheque`, `Fecha`, `Fecha_Factura`, `Fecha_Venci`, `TotalFact`, `Comentario`, `Num_Tranferencia`, `Banco_Tranferencia`, `Gastos`, `Hora_Abono`, `Impreso`, `PostFechaCheque`, `DocEntry`, `CodBancocheque`, `CodBantranfe`, `EnSap`) VALUES
(23, 10016084, 'FA', 'c502-6221', 'ABASTECEDOR EL RINCONSITO  (GUAYABO)', 998382, 13298.2, 0, 13298.2, 0, 0, '', '', '2017/11/27', '2017-11-14', '2017-11-14', 13298.22, '', '', '', '0', '04:19:19 PM', 0, '', 712017, '', '', 0),
(22, 10016084, 'FA', 'c502-6221', 'ABASTECEDOR EL RINCONSITO  (GUAYABO)', 996498, 20659.8, 0, 20659.8, 0, 0, '', '', '2017/11/27', '2017-11-07', '2017-11-07', 20659.85, '', '', '', '0', '04:19:19 PM', 0, '', 710131, '', '', 0),
(21, 10016084, 'FA', 'c502-6221', 'ABASTECEDOR EL RINCONSITO  (GUAYABO)', 1000159, 19493.6, 0, 19493.6, 0, 0, '', '', '2017/11/27', '2017-11-21', '2017-11-21', 19493.64, '', '', '', '0', '04:19:19 PM', 0, '', 713796, '', '', 0),
(20, 10016083, 'FA', 'C502-4003', 'ABASTECEDOR CLAUDIO     ((TIERRAS MORENAS))', 1001507, 48326.8, 0, 48326.8, 0, 0, '', '', '2017/11/27', '2017-11-25', '2017-11-25', 48326.81, '', '', '', '0', '04:17:17 PM', 1, '', 715145, '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
