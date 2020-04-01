-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2020 a las 01:38:10
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
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `idAlimento` int(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `caloriasConsumidas` int(4) UNSIGNED NOT NULL,
  `carbohidratos` int(4) UNSIGNED NOT NULL,
  `proteínas` int(4) UNSIGNED NOT NULL,
  `grasas` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentocomida`
--

CREATE TABLE `alimentocomida` (
  `idAlimento` int(10) NOT NULL,
  `idComida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(10) NOT NULL,
  `idUsuarioEntrenador` int(10) NOT NULL,
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
  `idComida` int(10) NOT NULL,
  `dia` date NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` int(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `caloriasGastadas` int(4) UNSIGNED NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `multimedia` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `caloriasGastadas`, `tipo`, `descripcion`, `multimedia`) VALUES
(0, 'Sentadillas', 68, `Tonificacion` , 'Consiste en flexionar las rodillas y bajar el cuerpo manteniendo la verticalidad,
  para luego regresar a una posición erguida.', $img);

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `caloriasGastadas`, `tipo`, `descripcion`, `multimedia`) VALUES
 (0, 'Jumping jacks', 188, `Cardio` , ' En la posición de inicio, abre las piernas a la anchura de los hombros, a continuación
   júntalas con un leve salto mientras levantas los brazos a la vez para que las manos se toquen detrás de la cabeza.
   Asegúrate de mantener la cabeza recta y la vista al frente.', $img);

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `caloriasGastadas`, `tipo`, `descripcion`, `multimedia`) VALUES
 (0, 'Planchas', 80, `Tonificacion` , 'Recuéstate boca abajo sobre la manta y luego apóyate sobre los antebrazos,
   de modo que los codos queden ubicados debajo del pecho. Ahora, eleva tus piernas del piso sosteniéndote con las
   puntas de los pies para formar la plancha .', $img);

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `caloriasGastadas`, `tipo`, `descripcion`, `multimedia`) VALUES
 (0, 'Remo con banda elástica', 133, `Fuerza` , 'Con una ligera flexión de rodillas, nos inclinamos hacia delante desde
  las caderas, la columna vertebral de permanecer neutral. Tiramos desde los omóplatos hacia atrás y levantamos los codos
  tanto como pueda. Baje lentamente y repita.', $img);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

CREATE TABLE `entrenamiento` (
  `idEntrenamiento` int(10) NOT NULL,
  `idUsuarioEntrenador` int(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientoejercicio`
--

CREATE TABLE `entrenamientoejercicio` (
  `idEntrenamiento` int(10) NOT NULL,
  `idEjercicio` int(10) NOT NULL,
  `repeticiones` int(2) NOT NULL,
  `series` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE `recomendacion` (
  `idUsuarioEntrenador` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `recomendacion` text NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
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
  `tipoUsuario` tinyint(1) NOT NULL DEFAULT 0,
  `titulacion` varchar(30) DEFAULT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `experiencia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`, `titulacion`, `especialidad`, `experiencia`) VALUES
('01234568F', 'SOLID SNAKE', '$2y$10$jrEMOknXYLCVAvcd7K9PuO0/JtYzpwljmxw7lj7zqXGZouDkkB2Q2', NULL, 'chengliu@ucm.es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Maestro del sigilo', 'Gluteos', 'Demasiada'),
('26515643R', 'JUAN LIU', '$2y$10$vsnM.mnZYqtDZ8GbhnCIiu0qJwylwmaZsfk7sD.i8LycSq3nzbYmy', NULL, 'chengliu@ucm.es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioentrenador`
--

CREATE TABLE `usuarioentrenador` (
  `id` int(10) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `entrenador` varchar(10) NOT NULL,
  `estado` enum('aceptado','pendiente','') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`idAlimento`);

--
-- Indices de la tabla `alimentocomida`
--
ALTER TABLE `alimentocomida`
  ADD PRIMARY KEY (`idAlimento`,`idComida`),
  ADD KEY `idComida` (`idComida`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuarioEntrenador` (`idUsuarioEntrenador`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`idComida`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  ADD PRIMARY KEY (`idEntrenamiento`),
  ADD KEY `idUsuarioEntrenador` (`idUsuarioEntrenador`);

--
-- Indices de la tabla `entrenamientoejercicio`
--
ALTER TABLE `entrenamientoejercicio`
  ADD PRIMARY KEY (`idEntrenamiento`,`idEjercicio`),
  ADD KEY `idEjercicio` (`idEjercicio`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD PRIMARY KEY (`idUsuarioEntrenador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nif`);

--
-- Indices de la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `entrenador` (`entrenador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimento`
--
ALTER TABLE `alimento`
  MODIFY `idAlimento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `idComida` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  MODIFY `idEntrenamiento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  MODIFY `idUsuarioEntrenador` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentocomida`
--
ALTER TABLE `alimentocomida`
  ADD CONSTRAINT `alimentocomida_ibfk_1` FOREIGN KEY (`idAlimento`) REFERENCES `alimento` (`idAlimento`),
  ADD CONSTRAINT `alimentocomida_ibfk_2` FOREIGN KEY (`idComida`) REFERENCES `comida` (`idComida`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idUsuarioEntrenador`) REFERENCES `usuarioentrenador` (`id`);

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nif`);

--
-- Filtros para la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  ADD CONSTRAINT `entrenamiento_ibfk_1` FOREIGN KEY (`idUsuarioEntrenador`) REFERENCES `usuarioentrenador` (`id`);

--
-- Filtros para la tabla `entrenamientoejercicio`
--
ALTER TABLE `entrenamientoejercicio`
  ADD CONSTRAINT `entrenamientoejercicio_ibfk_1` FOREIGN KEY (`idEntrenamiento`) REFERENCES `entrenamiento` (`idEntrenamiento`),
  ADD CONSTRAINT `entrenamientoejercicio_ibfk_2` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`);

--
-- Filtros para la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD CONSTRAINT `recomendacion_ibfk_1` FOREIGN KEY (`idUsuarioEntrenador`) REFERENCES `usuarioentrenador` (`id`);

--
-- Filtros para la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  ADD CONSTRAINT `usuarioentrenador_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`nif`),
  ADD CONSTRAINT `usuarioentrenador_ibfk_2` FOREIGN KEY (`entrenador`) REFERENCES `usuario` (`nif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
