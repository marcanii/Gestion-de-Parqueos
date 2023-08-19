-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2023 a las 03:55:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_parqueo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `placa` varchar(11) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `descripcionvehiculo` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`placa`, `ci`, `nombres`, `apellidos`, `telefono`, `descripcionvehiculo`) VALUES
('111-ABC', '10101010', 'jose', 'miranda', 69677638, 'camioneta blanca'),
('222-ABC', '20202020', 'nestor', 'garcia', 72895575, 'vagoneta negra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueo`
--

CREATE TABLE `parqueo` (
  `idparqueo` int(6) NOT NULL,
  `placa` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaentrada` time NOT NULL,
  `horasalida` time NOT NULL,
  `observaciones` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parqueo`
--

INSERT INTO `parqueo` (`idparqueo`, `placa`, `fecha`, `horaentrada`, `horasalida`, `observaciones`) VALUES
(1, '111-ABC', '2023-08-18', '21:41:05', '22:41:05', 'ninguna observacion'),
(2, '222-ABC', '2023-08-19', '20:41:05', '21:41:05', 'ninguna observacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `fechahorareserva` date NOT NULL,
  `fechahorainiciores` datetime NOT NULL,
  `fechahorafinres` datetime NOT NULL,
  `id_cliente` varchar(15) NOT NULL,
  `estado_reserva` int(11) NOT NULL,
  `comentarios` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fechahorareserva`, `fechahorainiciores`, `fechahorafinres`, `id_cliente`, `estado_reserva`, `comentarios`) VALUES
(1, '2023-08-18', '2023-08-20 21:53:05', '2023-08-20 22:53:05', '10101010', 1, 'ninguno'),
(2, '2023-08-18', '2023-08-19 03:53:05', '2023-08-19 04:53:05', '20202020', 1, 'ninguno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`placa`),
  ADD UNIQUE KEY `UK_ci` (`ci`);

--
-- Indices de la tabla `parqueo`
--
ALTER TABLE `parqueo`
  ADD PRIMARY KEY (`idparqueo`),
  ADD KEY `FK_placa` (`placa`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FK_Cliente_CI` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `parqueo`
--
ALTER TABLE `parqueo`
  MODIFY `idparqueo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parqueo`
--
ALTER TABLE `parqueo`
  ADD CONSTRAINT `FK_placa` FOREIGN KEY (`placa`) REFERENCES `cliente` (`placa`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_Cliente_CI` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
