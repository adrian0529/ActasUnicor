-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 08-02-2022 a las 16:36:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actasunicor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actas`
--

CREATE TABLE `actas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `act_reu_par`
--

CREATE TABLE `act_reu_par` (
  `idacta` int(11) NOT NULL,
  `idreunion` int(11) NOT NULL,
  `idparticipante` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `idcargo` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idcargo`, `titulo`) VALUES
(1, 'Profesor'),
(2, 'Estudiante'),
(3, 'Funcionario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromisos`
--

CREATE TABLE `compromisos` (
  `idcompromiso` int(11) NOT NULL,
  `compromiso` varchar(50) NOT NULL,
  `idencargado` varchar(10) NOT NULL,
  `idreunion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `idparticipante` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`idparticipante`, `nombre`, `apellido`, `telefono`, `email`, `idcargo`) VALUES
('1003378473', 'MIGUEL', 'ARGEL', '3104375467', 'miguel@gmail.com', 3),
('1045683726', 'ANA', 'LOPEZ', '3237893465', 'ana@gmail.com', 3),
('1123547363', 'MILAGRO', 'CAUSIL', '3112334554', 'milagro@gmail.com', 2),
('1193025227', 'JOSE', 'VARGAS', '3114567897', 'jose@gmail.com', 1),
('1234567890', 'ADRIAN', 'ALEMAN ', '3213456789', 'adrian@gmail.com', 2),
('1453232423', 'ANDRES', 'PEREZ', '3214343546', 'andres@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsabilidades`
--

CREATE TABLE `responsabilidades` (
  `idresponsabilidad` int(11) NOT NULL,
  `responsabilidad` varchar(50) NOT NULL,
  `idencargado` varchar(10) NOT NULL,
  `idreunion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE `reuniones` (
  `idreunion` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(30) NOT NULL,
  `idorganizador` varchar(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reuniones`
--

INSERT INTO `reuniones` (`idreunion`, `tema`, `fecha`, `lugar`, `idorganizador`, `hora_inicio`, `hora_fin`) VALUES
(1, 'Conformación del comité de convivencia laboral', '2022-02-01', 'Biblioteca', '1045683726', '14:00:00', '17:00:00'),
(2, 'Casos de acoso laboral', '2022-01-06', 'Centro de convenciones', '1193025227', '09:00:00', '12:00:00'),
(3, 'Conformación del comité de convivencia laboral', '2022-02-01', 'Biblioteca', '1123547363', '15:00:00', '17:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actas`
--
ALTER TABLE `actas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `act_reu_par`
--
ALTER TABLE `act_reu_par`
  ADD PRIMARY KEY (`idacta`,`idreunion`),
  ADD KEY `idreunion` (`idreunion`),
  ADD KEY `idparticipante` (`idparticipante`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD PRIMARY KEY (`idcompromiso`),
  ADD KEY `idencargado` (`idencargado`),
  ADD KEY `idreunion` (`idreunion`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`idparticipante`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idcargo` (`idcargo`);

--
-- Indices de la tabla `responsabilidades`
--
ALTER TABLE `responsabilidades`
  ADD PRIMARY KEY (`idresponsabilidad`),
  ADD KEY `idencargado` (`idencargado`),
  ADD KEY `idreunion` (`idreunion`);

--
-- Indices de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD PRIMARY KEY (`idreunion`),
  ADD KEY `idorganizador` (`idorganizador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actas`
--
ALTER TABLE `actas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compromisos`
--
ALTER TABLE `compromisos`
  MODIFY `idcompromiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsabilidades`
--
ALTER TABLE `responsabilidades`
  MODIFY `idresponsabilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `idreunion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `act_reu_par`
--
ALTER TABLE `act_reu_par`
  ADD CONSTRAINT `act_reu_par_ibfk_1` FOREIGN KEY (`idacta`) REFERENCES `actas` (`id`),
  ADD CONSTRAINT `act_reu_par_ibfk_2` FOREIGN KEY (`idreunion`) REFERENCES `reuniones` (`idreunion`),
  ADD CONSTRAINT `act_reu_par_ibfk_3` FOREIGN KEY (`idparticipante`) REFERENCES `participantes` (`idparticipante`);

--
-- Filtros para la tabla `compromisos`
--
ALTER TABLE `compromisos`
  ADD CONSTRAINT `compromisos_ibfk_1` FOREIGN KEY (`idencargado`) REFERENCES `participantes` (`idparticipante`),
  ADD CONSTRAINT `compromisos_ibfk_2` FOREIGN KEY (`idreunion`) REFERENCES `reuniones` (`idreunion`);

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`idcargo`) REFERENCES `cargos` (`idcargo`);

--
-- Filtros para la tabla `responsabilidades`
--
ALTER TABLE `responsabilidades`
  ADD CONSTRAINT `responsabilidades_ibfk_1` FOREIGN KEY (`idencargado`) REFERENCES `participantes` (`idparticipante`),
  ADD CONSTRAINT `responsabilidades_ibfk_2` FOREIGN KEY (`idreunion`) REFERENCES `reuniones` (`idreunion`);

--
-- Filtros para la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD CONSTRAINT `reuniones_ibfk_1` FOREIGN KEY (`idorganizador`) REFERENCES `participantes` (`idparticipante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
