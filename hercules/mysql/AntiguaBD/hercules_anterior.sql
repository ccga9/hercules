-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2020 a las 11:28:31
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
-- Estructura de tabla para la tabla `alimentocomida`
--

CREATE TABLE `alimentocomida` (
  `idAlimento` varchar(10) NOT NULL,
  `idRegistro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `idAlimento` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `caloriasConsumidas` int(4) UNSIGNED NOT NULL,
  `carbohidratos` int(4) UNSIGNED NOT NULL,
  `proteínas` int(4) UNSIGNED NOT NULL,
  `grasas` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `usuario` varchar(10) NOT NULL,
  `entrenador` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(60) NOT NULL,
  `valoracion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientoejercicio`
--

CREATE TABLE `entrenamientoejercicio` (
  `idEntrenamiento` varchar(10) NOT NULL,
  `idEjercicio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos`
--

CREATE TABLE `entrenamientos` (
  `idEntrenamiento` varchar(10) NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8 NOT NULL,
  `caloriasGastadas` int(4) UNSIGNED NOT NULL,
  `tipo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `multimedia` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `entrenador` varchar(10) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `recomendacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocomida`
--

CREATE TABLE `registrocomida` (
  `dia` date NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `comida` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroejercicio`
--

CREATE TABLE `registroejercicio` (
  `fecha` date NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `ejercicio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioentrenador`
--

CREATE TABLE `usuarioentrenador` (
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
  `contrasenna` varchar(64) NOT NULL,
  `foto` mediumblob DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `peso` float(5,0) NOT NULL,
  `altura` float(5,0) NOT NULL,
  `preferencias` varchar(50) NOT NULL,
  `tipoUsuario` tinyint(1) NOT NULL,
  `titulacion` varchar(30) DEFAULT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `experiencia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`, `titulacion`, `especialidad`, `experiencia`) VALUES
('88664422A', 'PRUEBA', '1234', NULL, 'MICORREO@UCM.ES', 'M', '2000-01-01', '11111111', 'MADRID', 50, 1, 'CORRER', 0, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentocomida`
--
ALTER TABLE `alimentocomida`
  ADD PRIMARY KEY (`idAlimento`,`idRegistro`),
  ADD KEY `idalimento` (`idAlimento`,`idRegistro`),
  ADD KEY `idRegistro` (`idRegistro`);

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idAlimento`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `entrenador` (`entrenador`);

--
-- Indices de la tabla `entrenamientoejercicio`
--
ALTER TABLE `entrenamientoejercicio`
  ADD PRIMARY KEY (`idEntrenamiento`,`idEjercicio`),
  ADD KEY `idEntrenamiento` (`idEntrenamiento`,`idEjercicio`),
  ADD KEY `idEjercicio` (`idEjercicio`);

--
-- Indices de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD PRIMARY KEY (`idEntrenamiento`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`entrenador`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `registrocomida`
--
ALTER TABLE `registrocomida`
  ADD PRIMARY KEY (`tipo`,`dia`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `comida` (`comida`);

--
-- Indices de la tabla `registroejercicio`
--
ALTER TABLE `registroejercicio`
  ADD PRIMARY KEY (`fecha`,`tipo`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `ejercicio` (`ejercicio`);

--
-- Indices de la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  ADD PRIMARY KEY (`usuario`,`entrenador`),
  ADD KEY `usuario` (`usuario`,`entrenador`),
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
-- Filtros para la tabla `alimentocomida`
--
ALTER TABLE `alimentocomida`
  ADD CONSTRAINT `alimentocomida_ibfk_1` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idAlimento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alimentocomida_ibfk_2` FOREIGN KEY (`idRegistro`) REFERENCES `registrocomida` (`comida`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarioentrenador` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrenamientoejercicio`
--
ALTER TABLE `entrenamientoejercicio`
  ADD CONSTRAINT `entrenamientoejercicio_ibfk_1` FOREIGN KEY (`idEjercicio`) REFERENCES `registroejercicio` (`ejercicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entrenamientoejercicio_ibfk_2` FOREIGN KEY (`idEntrenamiento`) REFERENCES `entrenamientos` (`idEntrenamiento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD CONSTRAINT `recomendaciones_ibfk_1` FOREIGN KEY (`entrenador`) REFERENCES `usuarioentrenador` (`entrenador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recomendaciones_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrocomida`
--
ALTER TABLE `registrocomida`
  ADD CONSTRAINT `registrocomida_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registroejercicio`
--
ALTER TABLE `registroejercicio`
  ADD CONSTRAINT `registroejercicio_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  ADD CONSTRAINT `usuarioentrenador_ibfk_1` FOREIGN KEY (`entrenador`) REFERENCES `usuarios` (`nif`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioentrenador_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
