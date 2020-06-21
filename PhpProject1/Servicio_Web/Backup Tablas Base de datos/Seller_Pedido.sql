-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 20:10:42
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
-- Estructura de tabla para la tabla `Seller_Pedido`
--

DROP TABLE IF EXISTS `Seller_Pedido`;
CREATE TABLE IF NOT EXISTS `Seller_Pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
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
  `Hora_Pedido` varchar(100) NOT NULL,
  `Impreso` varchar(100) NOT NULL,
  `UnidadesACajas` varchar(100) NOT NULL,
  `Transmitido` varchar(100) NOT NULL,
  `Proforma` varchar(100) NOT NULL,
  `Porc_Desc_Fijo` varchar(100) NOT NULL,
  `Porc_Desc_Promo` varchar(100) NOT NULL,
  `EnSAP` int(11) NOT NULL,
  `Anulado` varchar(2) NOT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Seller_Pedido`
--

INSERT INTO `Seller_Pedido` (`idPedido`, `DocNumUne`, `DocNum`, `CodCliente`, `Nombre`, `Fecha`, `Credito`, `ItemCode`, `ItemName`, `Cant_Uni`, `Porc_Desc`, `Mont_Desc`, `Porc_Imp`, `Mont_Imp`, `Sub_Total`, `Total`, `Cant_Cj`, `Empaque`, `Precio`, `PrecioSUG`, `Hora_Pedido`, `Impreso`, `UnidadesACajas`, `Transmitido`, `Proforma`, `Porc_Desc_Fijo`, `Porc_Desc_Promo`, `EnSAP`, `Anulado`) VALUES
(18, '12052645', '12052645', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/11/18', '5', '006002004', 'CERA LIQ ROJA DUTY PICHINGA 1X1 [N/A]', '6', '0', '0', '13', '12182.5', '82930.9', '93711.9', '', '1', '13,821.81', '18,742.37', '11:23:23 AM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(19, '12052646', '12052646', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/11/18', '5', '006002001', 'CERA LIQ BLANCA DUTY GALON  C/C 1X4', '9', '0', '0', '13', '4101.26', '27918.7', '31548.2', '', '4', '3,102.08', '4,206.42', '11:24:24 AM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(20, '12052647', '12052647', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/11/18', '5', '006001000', 'ABRILL SUPERF ARCOTEN LITRO 1X12  [801050]', '4', '0', '0', '13', '1556.45', '10595.3', '11972.7', '', '12', '2,648.82', '3,591.8', '11:26:26 AM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(17, '12052646', '12052646', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/11/18', '5', '006001005', 'ABRILL SUPERF ARCOTEN 230ml 1X12  [801005]', '7', '0', '0', '13', '1286.45', '8757.35', '9895.81', '', '12', '1,251.05', '1,696.42', '11:24:24 AM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(16, '12052645', '12052645', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/11/18', '5', '006001006', 'ABRILL PISOS FLORAL DUTY GLN 1X4 [800664]', '4', '0', '0', '13', '1333.99', '9080.92', '10261.4', '', '4', '2,270.23', '3,078.43', '11:23:23 AM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(21, '12052647', '12052647', 'C504-1103', 'ABASTECEDOR ALLAN   (STA CRUZ)', '2017/11/18', '5', '006001006', 'ABRILL PISOS FLORAL DUTY GLN 1X4 [800664]', '2', '0', '0', '13', '666.99', '4540.46', '5130.72', '', '4', '2,270.23', '3,078.43', '11:26:26 AM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(22, '10055031', '10055031', 'C502-4002', 'ABASTECEDOR CACHI  (TRONADORA)', '2017/11/23', '5', '006001000', 'ABRILL SUPERF ARCOTEN LITRO 1X12  [801050]', '3', '0', '0', '13', '1167.33', '7946.46', '8979.5', '', '12', '2,648.82', '3,591.8', '04:42:42 PM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(23, '10055031', '10055031', 'C502-4002', 'ABASTECEDOR CACHI  (TRONADORA)', '2017/11/23', '5', '006002001', 'CERA LIQ BLANCA DUTY GALON  C/C 1X4', '5', '0', '0', '13', '2278.48', '15510.4', '17526.8', '', '4', '3,102.08', '4,206.42', '04:42:42 PM', 'NO', 'true', '0', 'NO', '0', '0', 0, '0'),
(24, '10055031', '10055031', 'C502-4002', 'ABASTECEDOR CACHI  (TRONADORA)', '2017/11/23', '5', '006002003', 'CERA LIQ ROJA DUTY GALON C/C 1X4', '66', '0', '0', '13', '31536.5', '214680', '242589', '', '4', '3,252.73', '4,410.7', '04:41:41 PM', 'NO', 'true', '0', 'NO', '0', '0', 0, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
