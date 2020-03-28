-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2020 a las 20:36:36
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

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
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `dia` date NOT NULL,
  `tipo` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `usuario` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `comida` varchar(10) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `Nombre` varchar(25) NOT NULL,
  `Calorias gastadas` int(4) UNSIGNED NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Descripcion` text NOT NULL,
  `Multimedia` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `nif` varchar(10) NOT NULL,
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
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `entrenador` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `usuario` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `fecha` date NOT NULL,
  `recomendacion` text CHARACTER SET utf8mb4 NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `contrasenna` varchar(255) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `sexo` varchar(6) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `peso` decimal(5,0) DEFAULT NULL,
  `altura` decimal(5,0) DEFAULT NULL,
  `preferencias` varchar(50) DEFAULT NULL,
  `tipoUsuario` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`) VALUES
('26515643R', 'JUAN LIU', '$2y$10$vsnM.mnZYqtDZ8GbhnCIiu0qJwylwmaZsfk7sD.i8LycSq3nzbYmy', NULL, 'chengliu@ucm.es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `entrenador` (`entrenador`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`dia`,`tipo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`nif`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`entrenador`,`fecha`),
  ADD KEY `usuario` (`usuario`);

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
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarioentrenador` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`);

--
-- Filtros para la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD CONSTRAINT `recomendaciones_ibfk_1` FOREIGN KEY (`entrenador`) REFERENCES `entrenadores` (`nif`),
  ADD CONSTRAINT `recomendaciones_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`);

--
-- Filtros para la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  ADD CONSTRAINT `usuarioentrenador_ibfk_1` FOREIGN KEY (`entrenador`) REFERENCES `entrenadores` (`nif`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioentrenador_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nif`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
