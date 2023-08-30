-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2023 a las 02:31:24
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
('222-ABC', '20202020', 'nestor', 'garcia', 69677638, 'vagoneta negra'),
('333-ABC', '30303030', 'Juan', 'Peres', 69677638, 'auto blanco');

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
  `estado_parqueo` int(5) NOT NULL,
  `observaciones` varchar(120) NOT NULL,
  `estado_noti` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parqueo`
--

INSERT INTO `parqueo` (`idparqueo`, `placa`, `fecha`, `horaentrada`, `horasalida`, `estado_parqueo`, `observaciones`, `estado_noti`) VALUES
(1, '111-ABC', '2023-08-18', '21:41:05', '18:41:05', 1, 'ninguna observacion', 0),
(3, '222-ABC', '2023-08-19', '17:51:32', '18:51:32', 1, 'ninguna', 0),
(16, '111-ABC', '2023-08-20', '17:16:00', '18:16:00', 1, 'Reserva rapida ', 0),
(34, '111-ABC', '2023-08-22', '19:40:00', '20:40:00', 0, 'Reserva rapida, cliente en camino ', 1),
(56, '111-ABC', '2023-08-27', '21:30:00', '22:30:00', 0, 'Reserva rapida, cliente en camino ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `horainiciores` time NOT NULL,
  `fechareserva` date NOT NULL,
  `horafinalres` time NOT NULL,
  `id_cliente` varchar(15) NOT NULL,
  `estado_reserva` int(11) NOT NULL,
  `comentarios` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `horainiciores`, `fechareserva`, `horafinalres`, `id_cliente`, `estado_reserva`, `comentarios`) VALUES
(1, '00:00:00', '2023-08-20', '22:53:05', '10101010', 1, 'ninguno'),
(2, '00:00:00', '2023-08-19', '04:53:05', '20202020', 1, 'ninguno'),
(27, '00:08:00', '2023-08-22', '22:08:00', '20202020', 1, ''),
(28, '21:26:00', '2023-08-25', '00:25:00', '20202020', 1, ''),
(32, '23:48:00', '2023-08-24', '00:48:00', '20202020', 1, ''),
(34, '20:41:00', '2023-08-27', '00:00:00', '10101010', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idtarifa` int(11) NOT NULL,
  `tipotarifa` varchar(30) NOT NULL,
  `descripciontarifa` varchar(80) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`idtarifa`, `tipotarifa`, `descripciontarifa`, `valor`) VALUES
(5, 'reserva rapida', '15% extra de tarifa normal', 25),
(6, 'reserva planeada', '5% mas de costo normal', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` varchar(15) NOT NULL,
  `contrasena` varchar(11) NOT NULL,
  `nivel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `contrasena`, `nivel`) VALUES
('10101010', '111-ABC', 0),
('20202020', '222-ABC', 0),
('30303030', '333-ABC', 1);

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
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idtarifa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `parqueo`
--
ALTER TABLE `parqueo`
  MODIFY `idparqueo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idtarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
