-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 20:10:20
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
-- Estructura de tabla para la tabla `Seller_Devoluciones`
--

DROP TABLE IF EXISTS `Seller_Devoluciones`;
CREATE TABLE IF NOT EXISTS `Seller_Devoluciones` (
  `idDevolucion` int(11) NOT NULL AUTO_INCREMENT,
  `DocNumUne` varchar(50) NOT NULL,
  `DocNum` varchar(50) NOT NULL,
  `CodCliente` varchar(50) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Fecha` varchar(50) NOT NULL,
  `Credito` varchar(100) NOT NULL,
  `ItemCode` varchar(100) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Cant_Uni` varchar(100) NOT NULL,
  `Porc_Desc` varchar(100) NOT NULL,
  `Mont_Desc` varchar(100) NOT NULL,
  `Porc_Imp` varchar(100) NOT NULL,
  `Mont_Imp` varchar(100) NOT NULL,
  `Sub_Total` varchar(100) NOT NULL,
  `Total` varchar(100) NOT NULL,
  `Cant_Cj` varchar(100) NOT NULL,
  `Empaque` varchar(100) NOT NULL,
  `Precio` varchar(100) NOT NULL,
  `PrecioSUG` varchar(100) NOT NULL,
  `Hora_Nota` varchar(100) NOT NULL,
  `Impreso` varchar(100) NOT NULL,
  `UnidadesACajas` varchar(100) NOT NULL,
  `Transmitido` varchar(100) NOT NULL,
  `Proforma` varchar(100) NOT NULL,
  `Porc_Desc_Fijo` varchar(100) NOT NULL,
  `Porc_Desc_Promo` varchar(100) NOT NULL,
  `EnSAP` int(11) NOT NULL,
  `Anulado` varchar(2) NOT NULL,
  PRIMARY KEY (`idDevolucion`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `Seller_Devoluciones` (`idDevolucion`, `DocNumUne`, `DocNum`, `CodCliente`, `Nombre`, `Fecha`, `Credito`, `ItemCode`, `ItemName`, `Cant_Uni`, `Porc_Desc`, `Mont_Desc`, `Porc_Imp`, `Mont_Imp`, `Sub_Total`, `Total`, `Cant_Cj`, `Empaque`, `Precio`, `PrecioSUG`, `Hora_Nota`, `Impreso`, `UnidadesACajas`, `Transmitido`, `Proforma`, `Porc_Desc_Fijo`, `Porc_Desc_Promo`, `EnSAP`, `Anulado`) VALUES
(25, '12000003', '12000003', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/12/01', '5', '006001000', 'ABRILL SUPERF ARCOTEN LITRO 1X12  [801050]', '2', '0', '0', '13', '778.22', '5297.64', '5986.33', '2', '1', '2648.82', '1.200000', '12:26:26 AM', 'NO', '0', '0', '0', '0', '0', 0, '0'),
(26, '12000003', '12000003', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/12/01', '5', '006003001', 'CHAMPU /CARRO DUTY PICHINGA 1x19 Lts [801227]', '3', '0', '0', '13', '6810.61', '46362.2', '52389.3', '3', '1', '15454.07', '1.200000', '12:26:26 AM', 'NO', '0', '0', '0', '0', '0', 0, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
