-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2023 at 05:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_parqueo3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
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
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`placa`, `ci`, `nombres`, `apellidos`, `telefono`, `descripcionvehiculo`) VALUES
('111-ABC', '10101010', 'jose', 'miranda', 69677638, 'camioneta blanca'),
('222-ABC', '20202020', 'nestor', 'garcia', 69677638, 'vagoneta negra');

-- --------------------------------------------------------

--
-- Table structure for table `parqueo`
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
-- Dumping data for table `parqueo`
--

INSERT INTO `parqueo` (`idparqueo`, `placa`, `fecha`, `horaentrada`, `horasalida`, `estado_parqueo`, `observaciones`, `estado_noti`) VALUES
(1, '111-ABC', '2023-08-18', '21:41:05', '18:41:05', 1, 'ninguna observacion', 0),
(2, '222-ABC', '2023-08-19', '16:41:05', '18:20:00', 0, 'ninguna observacion', 1),
(3, '222-ABC', '2023-08-19', '17:51:32', '18:51:32', 1, 'ninguna', 0),
(16, '111-ABC', '2023-08-20', '17:16:00', '18:16:00', 1, 'Reserva rapida ', 0),
(17, '111-ABC', '2023-08-20', '17:19:00', '18:19:00', 0, 'Reserva rapida ', 0),
(18, '111-ABC', '2023-08-22', '12:33:00', '13:33:00', 0, 'Reserva rapida, cliente en camino ', 1),
(21, '111-ABC', '2023-08-22', '12:51:00', '13:51:00', 0, 'Reserva rapida, cliente en camino ', 0),
(23, '111-ABC', '2023-08-22', '13:03:00', '14:03:00', 0, 'Reserva rapida, cliente en camino ', 0),
(28, '111-ABC', '2023-08-22', '19:28:00', '20:28:00', 0, 'Reserva rapida, cliente en camino ', 0),
(29, '111-ABC', '2023-08-22', '19:33:00', '20:33:00', 0, 'Reserva rapida, cliente en camino ', 0),
(30, '111-ABC', '2023-08-22', '19:33:00', '20:33:00', 0, 'Reserva rapida, cliente en camino ', 0),
(31, '111-ABC', '2023-08-22', '19:34:00', '20:34:00', 0, 'Reserva rapida, cliente en camino ', 1),
(32, '111-ABC', '2023-08-22', '19:36:00', '20:36:00', 0, 'Reserva rapida, cliente en camino ', 1),
(33, '111-ABC', '2023-08-22', '19:39:00', '20:39:00', 0, 'Reserva rapida, cliente en camino ', 1),
(34, '111-ABC', '2023-08-22', '19:40:00', '20:40:00', 0, 'Reserva rapida, cliente en camino ', 1),
(35, '111-ABC', '2023-08-22', '19:53:00', '20:53:00', 0, 'Reserva rapida, cliente en camino ', 1),
(36, '111-ABC', '2023-08-23', '20:10:00', '21:10:00', 0, 'Reserva rapida, cliente en camino ', 0),
(37, '111-ABC', '2023-08-23', '20:10:00', '21:10:00', 0, 'Reserva rapida, cliente en camino ', 0),
(38, '111-ABC', '2023-08-23', '20:22:00', '21:22:00', 0, 'Reserva rapida, cliente en camino ', 0),
(39, '222-ABC', '2023-08-23', '20:24:00', '21:24:00', 0, 'Reserva rapida, cliente en camino ', 0),
(41, '222-ABC', '2023-08-23', '20:27:00', '21:27:00', 0, 'Reserva rapida, cliente en camino ', 0),
(42, '222-ABC', '2023-08-23', '20:31:00', '21:31:00', 0, 'Reserva rapida, cliente en camino ', 0),
(43, '222-ABC', '2023-08-23', '20:59:00', '21:59:00', 0, 'Reserva rapida, cliente en camino ', 0),
(44, '222-ABC', '2023-08-23', '22:44:00', '23:44:00', 1, 'Reserva rapida, cliente en camino ', 0),
(45, '222-ABC', '2023-08-23', '23:06:00', '00:06:00', 0, 'Reserva rapida, cliente en camino ', 0),
(46, '222-ABC', '2023-08-23', '23:07:00', '00:07:00', 0, 'Reserva rapida, cliente en camino ', 0),
(47, '222-ABC', '2023-08-24', '20:30:00', '21:30:00', 0, 'Reserva rapida, cliente en camino ', 0),
(48, '222-ABC', '2023-08-24', '20:31:00', '21:31:00', 0, 'Reserva rapida, cliente en camino ', 0),
(49, '222-ABC', '2023-08-24', '20:33:00', '21:33:00', 0, 'Reserva rapida, cliente en camino ', 0),
(50, '222-ABC', '2023-08-24', '20:33:00', '21:33:00', 0, 'Reserva rapida, cliente en camino ', 0),
(51, '222-ABC', '2023-08-24', '20:33:00', '21:33:00', 0, 'Reserva rapida, cliente en camino ', 0),
(52, '222-ABC', '2023-08-24', '20:47:00', '21:47:00', 0, 'Reserva rapida, cliente en camino ', 0),
(53, '222-ABC', '2023-08-24', '20:49:00', '21:49:00', 0, 'Reserva rapida, cliente en camino ', 0),
(55, '111-ABC', '2023-08-26', '18:00:00', '19:00:00', 0, 'Reserva rapida, cliente en camino ', 1),
(56, '111-ABC', '2023-08-27', '21:30:00', '22:30:00', 0, 'Reserva rapida, cliente en camino ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
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
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `horainiciores`, `fechareserva`, `horafinalres`, `id_cliente`, `estado_reserva`, `comentarios`) VALUES
(1, '00:00:00', '2023-08-20', '22:53:05', '10101010', 1, 'ninguno'),
(2, '00:00:00', '2023-08-19', '04:53:05', '20202020', 1, 'ninguno'),
(3, '11:34:00', '2023-08-17', '16:31:00', '10101010', 1, ''),
(4, '18:46:00', '2023-08-24', '20:46:00', '10101010', 1, ''),
(5, '15:08:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(6, '15:08:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(7, '15:08:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(8, '15:08:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(9, '15:09:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(10, '15:09:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(11, '00:00:00', '0000-00-00', '00:00:00', '10101010', 1, ''),
(12, '15:18:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(13, '15:19:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(14, '00:00:00', '0000-00-00', '00:00:00', '10101010', 1, ''),
(15, '15:21:00', '2023-08-20', '00:00:00', '10101010', 1, ''),
(16, '01:35:00', '2023-08-31', '19:36:00', '10101010', 1, ''),
(17, '15:59:00', '2023-08-29', '19:33:00', '10101010', 1, ''),
(18, '00:00:00', '0000-00-00', '00:00:00', '10101010', 1, ''),
(19, '22:33:00', '2023-08-23', '01:30:00', '20202020', 1, ''),
(20, '01:44:00', '2023-08-30', '03:44:00', '20202020', 1, ''),
(21, '23:41:00', '2023-08-17', '23:47:00', '20202020', 1, ''),
(22, '23:52:00', '2023-08-24', '06:48:00', '20202020', 1, ''),
(23, '20:50:00', '2023-09-01', '23:00:00', '20202020', 1, ''),
(24, '00:03:00', '2023-08-24', '08:03:00', '20202020', 1, ''),
(25, '00:04:00', '2023-08-24', '22:04:00', '20202020', 1, ''),
(26, '23:11:00', '2023-08-23', '23:46:00', '20202020', 1, ''),
(27, '00:08:00', '2023-08-22', '22:08:00', '20202020', 1, ''),
(28, '21:26:00', '2023-08-25', '00:25:00', '20202020', 1, ''),
(29, '00:26:00', '2023-08-24', '00:32:00', '20202020', 1, ''),
(30, '21:28:00', '2023-09-01', '00:00:00', '20202020', 1, ''),
(31, '23:34:00', '2023-08-23', '00:00:00', '20202020', 1, ''),
(32, '23:48:00', '2023-08-24', '00:48:00', '20202020', 1, ''),
(33, '22:19:00', '2023-08-26', '00:00:00', '10101010', 1, ''),
(34, '20:41:00', '2023-08-27', '00:00:00', '10101010', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tarifa`
--

CREATE TABLE `tarifa` (
  `idtarifa` int(11) NOT NULL,
  `tipotarifa` varchar(30) NOT NULL,
  `descripciontarifa` varchar(80) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarifa`
--

INSERT INTO `tarifa` (`idtarifa`, `tipotarifa`, `descripciontarifa`, `valor`) VALUES
(5, 'reserva rapida', '15% extra de tarifa normal', 12),
(6, 'reserva planeada', '5% mas de costo normal', 8);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` varchar(15) NOT NULL,
  `contrasena` varchar(11) NOT NULL,
  `nivel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `contrasena`, `nivel`) VALUES
('10101010', '111-ABC', 0),
('20202020', '222-ABC', 0),
('30303030', '333-ABC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`placa`),
  ADD UNIQUE KEY `UK_ci` (`ci`);

--
-- Indexes for table `parqueo`
--
ALTER TABLE `parqueo`
  ADD PRIMARY KEY (`idparqueo`),
  ADD KEY `FK_placa` (`placa`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FK_Cliente_CI` (`id_cliente`);

--
-- Indexes for table `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idtarifa`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parqueo`
--
ALTER TABLE `parqueo`
  MODIFY `idparqueo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idtarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parqueo`
--
ALTER TABLE `parqueo`
  ADD CONSTRAINT `FK_placa` FOREIGN KEY (`placa`) REFERENCES `cliente` (`placa`);

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_Cliente_CI` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
