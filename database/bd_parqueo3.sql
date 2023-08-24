-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2023 at 11:28 PM
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
(7, '111-ABC', '2023-08-20', '16:49:00', '00:00:00', 0, 'Reserva rapida ', 0),
(8, '111-ABC', '2023-08-20', '16:50:00', '00:00:00', 0, 'Reserva rapida ', 0),
(9, '111-ABC', '2023-08-20', '16:50:00', '00:00:00', 0, 'Reserva rapida ', 0),
(10, '111-ABC', '2023-08-20', '16:54:00', '00:00:00', 0, 'Reserva rapida 1 ', 1),
(12, '111-ABC', '2023-08-20', '16:57:00', '00:00:00', 0, 'Reserva rapida 1 ', 0),
(13, '111-ABC', '2023-08-20', '04:58:00', '00:00:00', 0, 'Reserva rapida 1 ', 0),
(15, '111-ABC', '2023-08-20', '17:05:00', '00:00:00', 0, 'Reserva rapida 1 ', 0),
(16, '111-ABC', '2023-08-20', '17:16:00', '18:16:00', 1, 'Reserva rapida ', 0),
(17, '111-ABC', '2023-08-20', '17:19:00', '18:19:00', 1, 'Reserva rapida ', 0);

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
(18, '00:00:00', '0000-00-00', '00:00:00', '10101010', 1, '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parqueo`
--
ALTER TABLE `parqueo`
  MODIFY `idparqueo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
