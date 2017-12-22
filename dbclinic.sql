-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
<<<<<<< HEAD
-- Generation Time: Dec 21, 2017 at 09:38 PM
=======
-- Generation Time: Dec 21, 2017 at 09:35 PM
>>>>>>> test
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--

CREATE TABLE `articulo` (
  `id_producto` int(100) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `UM` varchar(5) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articulo`
--

INSERT INTO `articulo` (`id_producto`, `codigo`, `descripcion`, `UM`, `tipo`) VALUES
(7, '76765', 'Acetaminofen 500g', 'c/u', 'medicamento'),
(19, '23456', 'pirantel', 'c/u', 'medicamento'),
(20, '435', 'Amoxicilina 500 mg capsula o tableta oral empaque primario individual', 'c/u', 'medicamento'),
(21, '57899', 'Mebendazol 100mg Tableta oral empaque primario individual', 'c/u', 'medicamento'),
(22, '00593', 'albendazol', 'C/U', 'Medicamento'),
(23, '56711', 'Amlodipina (Besilato) 5 mg tableta oral empaque primario individual protegido de la luz', 'C/U', 'Medicamento'),
(24, '556774', 'Metrozan', 'c/u', 'medicamento'),
(25, '337009', 'Tetrave', 'C/U', 'Medicamento'),
(26, '1100001', 'Guantes de goma', 'cto', 'insumo'),
(27, '54545', 'tetraciclina', 'C/U', 'Medicamento'),
(28, '330000', 'terminazol', '', 'medicamento'),
(29, '44433', 'garbacina', 'c/u', 'medicamento'),
(30, '001677', 'virogrip', 'c/u', 'medicamento'),
(31, '446655', 'paldolo', 'c/u', 'medicamento');

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(100) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecof`
--

CREATE TABLE `ecof` (
  `id_ecof` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `encargado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecof`
--

INSERT INTO `ecof` (`id_ecof`, `nombre`, `direccion`, `telefono`, `encargado`) VALUES
(1, 'clinica 1', 'jocoro', '12345678', 'jose'),
(2, 'clinica 2', 'sociedad', '34234', 'jorge');

-- --------------------------------------------------------

--
-- Table structure for table `movimiento`
--

CREATE TABLE `movimiento` (
  `id_movimiento` int(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_producto` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_ecof` int(100) NOT NULL,
  `numPed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movimiento`
--

INSERT INTO `movimiento` (`id_movimiento`, `tipo`, `cantidad`, `fecha`, `id_producto`, `id_usuario`, `id_ecof`, `numPed`) VALUES
(158, 'Entrada', 222, '2017-12-14', 7, 2, 1, '123'),
(159, 'Entrada', 123, '2017-12-14', 19, 2, 1, '123'),
(160, 'Entrada', 456, '2017-12-14', 20, 2, 1, '123'),
(161, 'Envio', 123, '2017-12-13', 7, 2, 1, '111'),
(162, 'Envio', 456, '2017-12-13', 19, 2, 1, '111'),
(163, 'Envio', 300, '2017-12-13', 20, 2, 1, '111'),
(164, 'Envio', 12, '2017-12-13', 7, 2, 1, '111'),
(165, 'Entrada', 200, '2017-12-14', 7, 2, 1, '900'),
(166, 'Entrada', 200, '2017-12-14', 19, 2, 1, '900'),
(167, 'Entrada', 200, '2017-12-14', 20, 2, 1, '900'),
(168, 'Entrada', 100, '2017-06-12', 7, 2, 1, '009'),
(169, 'Entrada', 400, '2017-06-12', 19, 2, 1, '009'),
(170, 'Entrada', 345, '2017-06-12', 20, 2, 1, '009'),
(171, 'Entrada', 11, '2017-06-12', 7, 2, 1, '009'),
(172, 'Entrada', 22, '2017-06-12', 19, 2, 1, '009'),
(173, 'Entrada', 56, '2017-06-12', 20, 2, 1, '009'),
(174, 'Entrada', 4, '2017-03-07', 7, 2, 1, '008'),
(175, 'Entrada', 10, '2017-03-07', 19, 2, 1, '008'),
(176, 'Entrada', 100, '2017-03-07', 20, 2, 1, '008'),
(177, 'Entrada', 20, '2017-10-09', 19, 2, 1, '006'),
(178, 'Entrada', 100, '2017-10-09', 20, 2, 1, '006'),
(179, 'Entrada', 6, '2017-10-09', 7, 2, 1, '006'),
(180, 'Entrada', 100, '2017-02-12', 7, 2, 1, '002'),
(181, 'Entrada', 300, '2017-02-12', 19, 2, 1, '002'),
(182, 'Entrada', 400, '2017-02-12', 20, 2, 1, '002'),
(183, 'Entrada', 100, '2018-12-12', 7, 2, 1, '004'),
(184, 'Entrada', 300, '2018-12-12', 19, 2, 1, '004'),
(185, 'Entrada', 400, '2018-12-12', 20, 2, 1, '004'),
(186, 'Entrada', 200, '2017-07-12', 7, 2, 1, '005'),
(187, 'Entrada', 300, '2017-07-12', 19, 2, 1, '005'),
(188, 'Entrada', 590, '2017-07-12', 20, 2, 1, '005'),
(189, 'Entrada', 200, '2017-12-12', 7, 2, 1, '0012'),
(190, 'Entrada', 400, '2017-12-12', 19, 2, 1, '0012'),
(191, 'Entrada', 200, '2017-12-12', 20, 2, 1, '0012'),
(192, 'Entrada', 100, '2017-11-11', 7, 2, 1, '0014'),
(193, 'Entrada', 300, '2017-11-11', 19, 2, 1, '0014'),
(194, 'Entrada', 400, '2017-11-11', 20, 2, 1, '0014'),
(195, 'Entrada', 100, '2016-12-12', 7, 2, 1, '0019'),
(196, 'Entrada', 300, '2016-12-12', 19, 2, 1, '0019'),
(197, 'Entrada', 800, '2016-12-12', 20, 2, 1, '0019'),
(198, 'Entrada', 100, '2016-11-06', 7, 2, 1, '012'),
(199, 'Entrada', 200, '2016-11-06', 19, 2, 1, '012'),
(200, 'Entrada', 400, '2016-11-06', 20, 2, 1, '012'),
(201, 'Entrada', 100, '2015-12-12', 7, 2, 1, '0099'),
(202, 'Entrada', 300, '2015-12-12', 19, 2, 1, '0099'),
(203, 'Entrada', 800, '2015-12-12', 20, 2, 1, '0099'),
(204, 'Entrada', 200, '2017-08-08', 7, 2, 1, '00001'),
(205, 'Entrada', 100, '2017-08-08', 19, 2, 1, '00001'),
(206, 'Entrada', 50, '2017-08-08', 20, 2, 1, '00001'),
(207, 'Entrada', 100, '2017-09-08', 20, 2, 2, '1000'),
(208, 'Entrada', 300, '2017-12-12', 7, 2, 1, '8080'),
(209, 'Entrada', 800, '2017-12-12', 20, 2, 1, '8080'),
(210, 'Entrada', 200, '2017-03-04', 7, 2, 1, '0404'),
(211, 'Entrada', 200, '2017-03-04', 20, 2, 1, '0404'),
(212, 'Envio', 250, '2017-12-09', 7, 2, 2, '000111'),
(213, 'Envio', 200, '2017-12-09', 19, 2, 2, '000111'),
(214, 'Envio', 300, '2017-12-09', 20, 2, 2, '000111'),
(215, 'Entrada', 1000, '2017-03-03', 19, 2, 1, '2901'),
(216, 'Consumo diario', 60, '2017-12-13', 7, 2, 1, '0000009'),
(217, 'Consumo diario', 20, '2017-12-13', 19, 2, 1, '0000009'),
(218, 'Consumo diario', 40, '2017-12-13', 20, 2, 1, '0000009'),
(219, 'Consumo diario', 123, '2017-09-09', 7, 2, 1, '9876'),
(220, 'Consumo diario', 200, '2017-09-09', 19, 2, 1, '9876'),
(221, 'Consumo diario', 300, '2017-09-09', 20, 2, 1, '9876'),
(222, 'Envio', 123, '2017-12-12', 7, 2, 1, '678'),
(223, 'Envio', 345, '2017-12-12', 19, 2, 1, '678'),
(224, 'Envio', 55, '2017-12-12', 20, 2, 1, '678'),
(225, 'Ajuste', 400, '2013-02-03', 7, 2, 2, '9001'),
(226, 'Ajuste', 390, '2013-02-03', 19, 2, 2, '9001'),
(227, 'Ajuste', 345, '2013-02-03', 20, 2, 2, '9001'),
(228, 'Ajuste', 400, '2017-04-06', 7, 2, 1, '23009'),
(229, 'Ajuste', 345, '2017-04-06', 19, 2, 1, '23009'),
(230, 'Ajuste', 789, '2017-04-06', 20, 2, 1, '23009'),
(231, 'Entrada', 300, '2017-03-09', 21, 2, 1, '00606'),
(232, 'Consumo diario', 3345, '2017-12-12', 19, 2, 1, '430099'),
(233, 'Consumo diario', 40, '2017-12-12', 7, 2, 1, '430099'),
(234, 'Consumo diario', 20, '2017-12-12', 21, 2, 1, '430099'),
(235, 'Ajuste', 233, '2017-03-09', 19, 2, 1, '22003'),
(236, 'Ajuste', 55, '2017-03-09', 20, 2, 1, '22003'),
(237, 'Ajuste', 22, '2017-03-09', 21, 2, 1, '22003'),
(238, 'Entrada', 60, '2017-09-09', 7, 2, 2, '123002'),
(239, 'Entrada', 33, '2017-09-09', 19, 2, 2, '123002'),
(240, 'Entrada', 5, '2017-09-09', 20, 2, 2, '123002'),
(241, 'Entrada', 2, '2017-09-09', 21, 2, 2, '123002'),
(242, 'Entrada', 500, '2017-09-09', 24, 2, 1, '1110098'),
(243, 'Entrada', 123, '2017-09-09', 22, 2, 1, '1110098'),
(244, 'Envio', 42, '2017-06-06', 7, 2, 2, '111111111'),
(245, 'Envio', 60, '2017-01-01', 20, 2, 2, '33001122'),
(246, 'Envio', 378, '2017-01-01', 7, 2, 2, '33001122'),
(247, 'Envio', 266, '2017-01-01', 19, 2, 2, '33001122'),
(248, 'Entrada', 1, '2016-03-05', 7, 2, 2, '33333333'),
(249, 'Entrada', 1, '2016-03-05', 19, 2, 2, '33333333'),
(250, 'Entrada', 1, '2016-03-05', 20, 2, 2, '33333333'),
(251, 'Entrada', 1, '2016-03-05', 26, 2, 2, '33333333'),
(252, 'Entrada', 1, '2016-03-05', 28, 2, 2, '33333333'),
(253, 'Entrada', 200, '2017-12-15', 29, 2, 2, '333334566'),
(254, 'Entrada', 100, '2017-12-15', 30, 2, 2, '333334566'),
(255, 'Ajuste', 250, '2017-12-15', 29, 2, 1, '556789000'),
(256, 'Ajuste', 90, '2017-12-15', 30, 2, 1, '556789000'),
(257, 'Consumo diario', 44, '2017-09-15', 24, 2, 2, '3333333333'),
(258, 'Consumo diario', 23, '2017-09-15', 29, 2, 2, '3333333333'),
(259, 'Consumo diario', 1, '2017-09-10', 7, 2, 2, '1111112121212'),
(260, 'Consumo diario', 27, '2017-09-15', 29, 2, 2, '6667676767'),
(261, 'Consumo diario', 50, '2017-09-15', 29, 2, 2, '3090909090'),
(262, 'Consumo diario', 50, '2017-09-16', 29, 2, 1, '56566567879'),
(263, 'Consumo diario', 50, '2017-07-10', 30, 2, 1, '44579811222'),
(264, 'Envio', 12, '0000-00-00', 0, 2, 2, '3232323232323'),
(265, 'Envio', 1, '0000-00-00', 0, 2, 2, '3232323232323'),
(266, 'Envio', 1, '2017-12-21', 0, 2, 1, '677978000'),
(267, 'Envio', 100, '2017-12-21', 0, 2, 1, '677978000'),
(268, 'Envio', 14, '2017-12-21', 0, 2, 1, '677978000'),
(269, 'Envio', 40, '2017-12-17', 0, 2, 1, '1111111'),
(270, 'Envio', 100, '2017-12-17', 0, 2, 1, '1111111'),
(271, 'Envio', 1, '2017-12-17', 0, 2, 1, '1111111'),
(272, 'Envio', 100, '2017-12-03', 0, 2, 1, '00011121'),
(273, 'Envio', 40, '2017-12-03', 0, 2, 1, '00011121'),
(274, 'Envio', 24, '2017-12-03', 0, 2, 1, '00011121'),
(275, 'Envio', 1, '2017-12-30', 0, 2, 1, '2354567898'),
(276, 'Envio', 100, '2017-12-30', 0, 2, 1, '2354567898'),
(277, 'Envio', 400, '2017-12-30', 0, 2, 1, '2354567898'),
(278, 'Envio', 40, '2017-12-30', 30, 2, 1, '2354567898'),
(279, 'Envio', 123, '2017-12-30', 22, 2, 1, '2354567898'),
(280, 'Envio', 1, '2017-12-27', 19, 2, 1, '7832112121'),
(281, 'Envio', 1, '2017-12-27', 20, 2, 1, '7832112121'),
(282, 'Envio', 24, '2017-12-27', 0, 2, 1, '7832112121'),
(283, 'Envio', 56, '2017-12-27', 0, 2, 1, '7832112121'),
(284, 'Envio', 1, '2017-12-27', 0, 2, 1, '7832112121'),
(285, 'Envio', 100, '2017-12-27', 0, 2, 1, '7832112121'),
(286, 'Envio', 50, '2017-12-01', 29, 2, 1, '0009090'),
(287, 'Envio', 23, '2017-12-01', 0, 2, 1, '0009090'),
(288, 'Envio', 50, '2017-12-01', 0, 2, 1, '0009090'),
(289, 'Envio', 1, '2017-12-01', 28, 2, 1, '0009090'),
(290, 'Entrada', 456, '0000-00-00', 7, 2, 1, '1212123456'),
(291, 'Entrada', 234, '0000-00-00', 19, 2, 1, '1212123456'),
(292, 'Entrada', 890, '0000-00-00', 20, 2, 1, '1212123456'),
(293, 'Entrada', 231, '0000-00-00', 22, 2, 1, '1212123456'),
(294, 'Entrada', 777, '0000-00-00', 30, 2, 1, '1212123456'),
(295, 'Entrada', 222, '0000-00-00', 31, 2, 1, '1212123456');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(100) NOT NULL,
  `existencia` int(11) NOT NULL,
  `id_producto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `existencia`, `id_producto`) VALUES
(1, 800, 4),
(2, 456, 7),
(6, 234, 19),
(7, 890, 20),
(8, 24, 21),
(9, 231, 22),
(10, 456, 24),
(11, 1, 26),
(12, 0, 28),
(13, 50, 29),
(14, 777, 30),
(15, 222, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_datos`
--

CREATE TABLE `tmp_datos` (
  `id_tmp` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `eco` varchar(14) NOT NULL,
  `numPed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `clave`) VALUES
(2, 'Adrian Campos', 'adrian', '1234'),
(3, 'Juan Manuel', 'Juana', '4321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `descripcion` (`descripcion`),
  ADD UNIQUE KEY `descripcion_2` (`descripcion`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `codigo_2` (`codigo`),
  ADD UNIQUE KEY `descripcion_3` (`descripcion`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indexes for table `ecof`
--
ALTER TABLE `ecof`
  ADD PRIMARY KEY (`id_ecof`),
  ADD UNIQUE KEY `nombre` (`nombre`,`direccion`);

--
-- Indexes for table `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id_movimiento`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `tmp_datos`
--
ALTER TABLE `tmp_datos`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `usuario_2` (`usuario`),
  ADD UNIQUE KEY `usuario_3` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_producto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `ecof`
--
ALTER TABLE `ecof`
  MODIFY `id_ecof` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id_movimiento` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tmp_datos`
--
ALTER TABLE `tmp_datos`
  MODIFY `id_tmp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
