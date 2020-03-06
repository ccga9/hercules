-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2020 a las 13:17:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hercules`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `idEntrenador` varchar(10) NOT NULL,
  `titulacion` varchar(30) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `experiencia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `nombre` varchar(10) NOT NULL,
  `edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`nombre`, `edad`) VALUES
('uno', 10),
('value', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioentrenador`
--

CREATE TABLE `usuarioentrenador` (
  `id` varchar(10) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `entrenador` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nif` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contrasenna` varbinary(800) NOT NULL,
  `foto` mediumblob NOT NULL,
  `email` varchar(30) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `peso` decimal(5,0) NOT NULL,
  `altura` decimal(5,0) NOT NULL,
  `preferencias` varchar(50) NOT NULL,
  `tipoUsuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`idEntrenador`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `entrenador` (`entrenador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nif`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  ADD CONSTRAINT `usuarioentrenador_ibfk_1` FOREIGN KEY (`entrenador`) REFERENCES `entrenadores` (`idEntrenador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioentrenador_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
