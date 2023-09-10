-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2023 a las 22:13:43
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
('222-ABC', '96', 'Nulla est et reicie', 'Consequatur Tempore', 28, 'Voluptas a explicabo'),
('A inventore', '5', 'Est tempora beatae a', 'Esse dolore adipisc', 80, 'Ad minima ullam pari'),
('Accusamus n', '26', 'Pariatur Molestiae ', 'Autem et qui eiusmod', 57, 'Sapiente sequi aliqu'),
('Alias qui p', '960', 'Soluta reprehenderit', 'Elit qui exercitati', 73, 'Sunt unde ad ea qui '),
('Dolore cons', '643', 'Dolore incidunt ut ', 'Voluptate mollitia n', 59, 'Ipsa libero omnis d'),
('Eos sint ni', '40', 'Reiciendis nisi adip', 'Rerum id voluptatem', 4, 'Quaerat tenetur inve'),
('Est id eum ', '20', 'Expedita quod beatae', 'Numquam sapiente rat', 3, 'Nemo saepe excepturi'),
('Non nobis f', '635', 'Obcaecati sunt dolor', 'Aut vitae dicta sed ', 29, 'Dicta voluptas quia '),
('Numquam ill', '32', 'Et veniam ipsam vol', 'Aliqua Dolore corru', 34, 'Ipsum in non ducimu'),
('Pariatur No', '100', 'Nostrud dolor suscip', 'Rerum dolor dolorem ', 4, 'In commodi porro off'),
('Tempor in d', '64', 'Est quibusdam esse ', 'Sit sed ad cupidata', 37, 'Architecto nesciunt');

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
  `costo_total` double NOT NULL,
  `observaciones` varchar(120) NOT NULL,
  `estado_noti` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parqueo`
--

INSERT INTO `parqueo` (`idparqueo`, `placa`, `fecha`, `horaentrada`, `horasalida`, `estado_parqueo`, `costo_total`, `observaciones`, `estado_noti`) VALUES
(34, '111-ABC', '2023-08-24', '07:40:00', '08:40:00', 0, 15, 'Reserva rapida, cliente en camino ', 1),
(82, '222-ABC', '2023-09-10', '10:47:30', '12:47:30', 0, 10, 'Sint enim voluptas i', 0),
(83, 'Tempor in d', '2023-09-10', '11:52:52', '15:00:00', 0, 2, 'Similique ad occaeca', 0),
(84, 'Numquam ill', '2023-09-10', '11:53:09', '20:00:00', 0, 7, 'Dolore ut delectus ', 0),
(85, 'Pariatur No', '2023-09-10', '14:17:01', '15:00:00', 0, 5, 'Et dolorem officia l', 0),
(86, 'Est id eum ', '2023-09-10', '14:17:13', '23:49:00', 0, 7, 'Neque sit praesenti', 0),
(87, 'Alias qui p', '2023-09-10', '15:17:40', '22:00:00', 0, 3, 'In beatae consequatu', 0),
(88, 'Dolore cons', '2023-09-10', '15:18:05', '22:00:00', 0, 5, 'Modi vitae voluptate', 0),
(89, 'A inventore', '2023-09-10', '16:20:36', '21:00:00', 0, 8, 'At id porro tempora', 0),
(90, 'Non nobis f', '2023-09-10', '16:21:23', '23:07:00', 0, 3, 'Est aut nisi sed ips', 0),
(91, 'Accusamus n', '2023-09-10', '17:02:53', '17:19:00', 0, 1, 'Repellendus Veniam', 0),
(92, 'Eos sint ni', '2023-09-10', '17:03:05', '18:05:00', 0, 3, 'Cupiditate autem lab', 0);

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
(1, '00:00:00', '2023-08-20', '22:53:05', '10101010', 0, 'ninguno'),
(34, '20:41:00', '2023-08-27', '00:00:00', '10101010', 0, '');

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
(5, 'reserva rapida', '15% extra de tarifa normal', 10),
(6, 'reserva planeada', '5% mas de costo normal', 5),
(10, 'Hora', 'Tarifa regular', 5);

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
('admin', 'admin', 1),
('encargado1', 'encargado1', 2);

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
  MODIFY `idparqueo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idtarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
