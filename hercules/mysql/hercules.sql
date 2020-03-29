-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1

-- Tiempo de generación: 28-03-2020 a las 22:51:36
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nif` varchar(10) NOT NULL PRIMARY KEY,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioentrenador`
--

CREATE TABLE `usuarioentrenador` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usuario` varchar(10) NOT NULL,
  `entrenador` varchar(10) NOT NULL,
  FOREIGN KEY (usuario) REFERENCES usuario(nif),
  FOREIGN KEY (entrenador) REFERENCES usuario(nif)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `alimento`
--
-- --------------------------------------------------------
CREATE TABLE `alimento` (
  `idAlimento` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(15) NOT NULL,
  `caloriasConsumidas` int(4) UNSIGNED NOT NULL,
  `carbohidratos` int(4) UNSIGNED NOT NULL,
  `proteínas` int(4) UNSIGNED NOT NULL,
  `grasas` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `comida`
--
-- --------------------------------------------------------

CREATE TABLE `comida` (
  `idComida` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `dia` date NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  FOREIGN KEY(usuario) REFERENCES usuario(nif)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `alimentocomida`
--
-- --------------------------------------------------------



CREATE TABLE `alimentocomida` (
  `idAlimento` int(10) NOT NULL,
  `idComida` int(10) NOT NULL,
  PRIMARY KEY(idAlimento, idComida),
  FOREIGN KEY (idAlimento) REFERENCES alimento(idAlimento),
  FOREIGN KEY (idComida) REFERENCES comida(idComida)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idUsuarioEntrenador` int(10) NOT NULL,
  `entrenador` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(60) NOT NULL,
  `valoracion` int(1) NOT NULL,
  FOREIGN KEY (idUsuarioEntrenador) REFERENCES usuarioentrenador(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE `recomendacion` (
  `idUsuarioEntrenador` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `fecha` date NOT NULL,
  `recomendacion` text NOT NULL,
  `tipo` varchar(10) NOT NULL,
  FOREIGN KEY (idUsuarioEntrenador) REFERENCES usuarioentrenador(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(25) NOT NULL,
  `caloriasGastadas` int(4) UNSIGNED NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `multimedia` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

CREATE TABLE `entrenamiento` (
  `idEntrenamiento` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `idUsuarioEntrenador` int(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  FOREIGN KEY(idUsuarioEntrenador) REFERENCES usuarioentrenador(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientoejercicio`
--

CREATE TABLE `entrenamientoejercicio` (
  `idEntrenamiento` int(10) NOT NULL,
  `idEjercicio` int(10) NOT NULL,
  `repeticiones` int(2) NOT NULL,
  `series` int(2) NOT NULL,
  PRIMARY KEY(idEntrenamiento, idEjercicio),
  FOREIGN KEY (idEntrenamiento) REFERENCES entrenamiento(idEntrenamiento),
  FOREIGN KEY (idEjercicio) REFERENCES ejercicio(idEjercicio)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;







--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`, `titulacion`, `especialidad`, `experiencia`) VALUES
('26515643R', 'JUAN LIU', '$2y$10$vsnM.mnZYqtDZ8GbhnCIiu0qJwylwmaZsfk7sD.i8LycSq3nzbYmy', NULL, 'chengliu@ucm.es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
