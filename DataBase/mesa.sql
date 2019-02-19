-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2019 a las 07:51:29
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mesa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celular`
--

CREATE TABLE IF NOT EXISTS `celular` (
  `id` int(11) NOT NULL,
  `modelo` varchar(32) NOT NULL,
  `conectividad` varchar(1000) NOT NULL,
  `camara` varchar(500) NOT NULL,
  `sistema` varchar(1000) NOT NULL,
  `compra` varchar(500) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `celular`
--

INSERT INTO `celular` (`id`, `modelo`, `conectividad`, `camara`, `sistema`, `compra`, `imagen`) VALUES
(1, 'Samsung J7', 'Wi-Fi 802.11 b/g/n, Wi-Fi Direct, hotspot, Bluetooth 4.1, GPS, NFC, FM radio, microUSB 2.0', '13 MP, f/1.9, 28mm (wide), LED flash, Video	1080p@30fps', 'Android 5.1 (Lollipop), upgradable to 6.0.1 (Marshmallow), Chipset	Qualcomm MSM8939 Snapdragon 615 (28 nm), Octa-core (4x1.4 GHz Cortex-A53 & 4x1.0 GHz Cortex-A53), GPU Adreno 405', 'Contado $5309, 12 mesualidades de $541', 'imagenes/celulares/samsung'),
(2, 'Xiaomi mi 8', 'Wi-Fi 802.11, dual-band, Wi-Fi Direct, DLNA, hotspot, Bluetooth 5.0, GPS, NFC, Usb type C reversible', '12 MP, f/1.8, 1/2.55, 1.4µm, 4-axis OIS, dual pixel 12 MP, f/2.4, 56mm (telephoto), 1/3.4, 2x optical zoom', 'Android 8.1 (Oreo), upgradable to Android 9.0 (Pie); MIUI 10.1, Chipset	Qualcomm SDM845 Snapdragon 845 (10 nm), CPU Octa-core (4x2.8 GHz Kryo 385 Gold & 4x1.8 GHz Kryo 385 Silver),GPU	Adreno 630', 'Contado $9499, 12 meses de $916', 'imagenes/celulares/xiaomi'),
(3, 'Moto G6 play', 'Wi-Fi 802.11 b/g/n, WiFi Direct, hotspot, dual-band, WiFi Direct, Bluetooth 4.2, GPS, NFC, Radio FM radio, microUSB 2.0', '13 MP, f/2.0, 1.12µm, LED flash, HDR, Video 1080p@30fps', 'Android 8.0 (Oreo), upgradable to Android 9.0, Chipset	Qualcomm MSM8937 Snapdragon 430 (28 nm), CPU Octa-core 1.4 GHz Cortex-A53, GPU Adreno 505', 'Contado $3999, 12 meses de $416', 'imagenes/celulares/motorola'),
(4, 'Huawei Mate 20 Pro', 'Wi-Fi 802.11, dual-band, DLNA, Wi-Fi Direct, hotspot, Bluetooth 5.0, A2DP, GPS with dual-band A-GPS, NFC, Infrared port, USB	3.1, Type-C 1.0 reversible connector, USB On-The-Go', 'Triple	40 MP, f/1.8, 27mm (wide), 1/1.7, PDAF/Laser AF, 20 MP, f/2.2, 16mm (ultrawide), 1/2.7, PDAF/Laser AF, 8 MP, f/2.4, 80mm (telephoto), 1/4, 5x optical zoom,PDAF/Laser AF, Features	Leica optics, dual-LED dual-tone flash, panorama, HDR, Video 2160p@30fps, 1080p@60fps, 1080p@30fps (gyro-EIS), 720p@960fps', 'Android 9.0 (Pie), EMUI 9, Chipset	HiSilicon Kirin 980 (7 nm), CPU	Octa-core (2x2.6 GHz Cortex-A76 & 2x1.92 GHz Cortex-A76 & 4x1.8 GHz Cortex-A55), GPU Mali-G76 MP10', 'Contado $27899, 12 meses de $2,500', 'imagenes/celulares/huawei'),
(5, 'Nokia 5', 'Wi-Fi 802.11 b/g/n, hotspot, Bluetooth	4.1, A2DP, LE, GPS	with A-GPS, NFC, FM radio, microUSB 2.0, USB On-The-Go', '13 MP, f/2.0, 1/3, 1.12µm, PDAF, Features Dual-LED dual-tone flash, HDR, Video 1080p@30fps', 'Android 7.1.1 (Nougat), upgradable to Android 9.0 (Pie), Chipset	Qualcomm MSM8937 Snapdragon 430 (28 nm), CPU Octa-core 1.4 GHz Cortex-A53, GPU Adreno 505', 'Contado $3424, 12 meses de $458', 'imagenes/celulares/nokia'),
(6, 'Sony Xperia XA', 'Wi-Fi 802.11 a/b/g/n, Wi-Fi Direct, DLNA, hotspot, Bluetooth 4.1, GPS with A-GPS, GLONASS, NFC, FM radio, microUSB 2.0, USB Host', '13 MP, f/2.0, 1/3, 1.12µm, PDAF, Features LED flash, HDR, panorama, Video	1080p@30fps', 'Android 6.0.1 (Marshmallow), upgradable to 7.0 (Nougat), Chipset	Mediatek MT6755 Helio P10 (28 nm), CPU	Octa-core (4x2.0 GHz Cortex-A53 & 4x1.0 GHz Cortex-A53), GPU Mali-T860MP2', 'Contado $4199, 12 meses de $499', 'imagenes/celulares/sony');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioactual`
--

CREATE TABLE IF NOT EXISTS `usuarioactual` (
  `numUsuario` int(11) NOT NULL,
  `compara` tinyint(1) NOT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioactual`
--

INSERT INTO `usuarioactual` (`numUsuario`, `compara`, `categoria`) VALUES
(0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `celular1` int(11) DEFAULT NULL,
  `celular2` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `status`, `celular1`, `celular2`, `categoria`) VALUES
(1, 0, NULL, NULL, NULL),
(2, 0, NULL, NULL, NULL),
(3, 0, NULL, NULL, NULL),
(4, 0, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
