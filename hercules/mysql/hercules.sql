-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2020 a las 19:32:37
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
  `nombre` varchar(50) NOT NULL,
  `caloriasConsumidas` double UNSIGNED DEFAULT NULL,
  `carbohidratos` double UNSIGNED DEFAULT NULL,
  `proteinas` double UNSIGNED DEFAULT NULL,
  `grasas` double UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alimento`
--

INSERT INTO `alimento` (`idAlimento`, `nombre`, `caloriasConsumidas`, `carbohidratos`, `proteinas`, `grasas`) VALUES
(1, 'manzana', 55, 12, 0, 0),
(2, 'ensalada mediterránea', 57, 9, 1.9, 1.5),
(3, 'merluza', 64, 0, 12, 1.8),
(4, 'pollo', 166, 0, 19.8, 9.6),
(5, 'tarta de queso', 233, 22, 7.3, 11.8),
(6, 'judí­as', 37, 4.2, 2.3, 0.5),
(7, 'paella', 173, 17.4, 12.3, 5.7),
(8, 'salmorejo', 77, 6.2, 1.1, 5.1),
(9, 'tortilla de patatas', 217, 24, 3.9, 11.8),
(10, 'pulpo', 84, 0, 18, 1.5),
(11, 'macarrones boloñesa', 136, 17, 3.3, 6),
(12, 'cereales frosties', 355, 88.6, 5.3, 0.2),
(13, 'solomillo de cerdo', 158, 0, 22.3, 7.6),
(14, 'lasaña boloñesa', 156, 12, 7.9, 8.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentocomida`
--

CREATE TABLE `alimentocomida` (
  `idAlimento` int(10) NOT NULL,
  `idComida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alimentocomida`
--

INSERT INTO `alimentocomida` (`idAlimento`, `idComida`) VALUES
(1, 1),
(2, 2),
(3, 2),
(5, 2);

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
  `dia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo` varchar(15) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`idComida`, `dia`, `tipo`, `usuario`) VALUES
(1, '2020-04-24 18:00:00', 'desayuno', '12345678E'),
(2, '2020-04-25 16:18:46', 'cena', '12345678E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` int(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `caloriasGastadas` int(4) UNSIGNED NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `multimedia` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `caloriasGastadas`, `tipo`, `descripcion`, `multimedia`) VALUES
(1, 'Sentadillas(Squats)', 220, 'Tonificacion', 'Consiste en flexionar las rodillas y bajar el cuerpo manteniendo la verticalidad,\r\n  para luego regresar a una posición erguida.', ''),
(2, 'Jumping jacks', 188, 'Cardio', ' En la posición de inicio, abre las piernas a la anchura de los hombros, a continuación\r\n   júntalas con un leve salto mientras levantas los brazos a la vez para que las manos se toquen detrás de la cabeza.\r\n   Asegúrate de mantener la cabeza recta y la vista al frente.', ''),
(3, 'Planchas', 160, 'Tonificacion', 'Recuéstate boca abajo sobre la manta y luego apóyate sobre los antebrazos,\r\n   de modo que los codos queden ubicados debajo del pecho. Ahora, eleva tus piernas del piso sosteniéndote con las\r\n   puntas de los pies para formar la plancha .', ''),
(4, 'Remo con banda elástica', 133, 'Fuerza', 'Con una ligera flexión de rodillas, nos inclinamos hacia delante desde\r\n  las caderas, la columna vertebral de permanecer neutral. Tiramos desde los omóplatos hacia atrás y levantamos los codos\r\n  tanto como pueda. Baje lentamente y repita.', ''),
(5, 'Zumba Fitness', 200, 'Cardio', 'La zumba es un tipo de actividad física (fitness) basada en ritmos y músicas lationamericanas. Las coreografías de zumba incluyen ritmos como la samba, la salsa, el reggaeton, la cumbia, el merengue y el mambo.', ''),
(6, 'Aeróbic step, con step de 15-20 cm', 193, 'Cardio', 'Consiste subir y bajar de un plataforma combinando pasos al ritmo de la música de aerobic.', ''),
(7, 'Aeróbic step, con step de 25-30 cm', 227, 'Cardio', 'Consiste subir y bajar de un plataforma combinando pasos al ritmo de la música de aerobic.', ''),
(8, 'Kettlebells', 196, 'Fuerza', 'Colócate de pie con los pies a la anchura de los hombros y deja la kettlebell en el suelo a la altura de los dedos de los pies. Dobla las rodillas, mantén la espalda recta y baja en posición de sentadilla hasta coger del asa al kettle con ambas manos hasta elevarlo hacia atrás mientras estiras las piernas manteniendo tensión en la zona de los abdominales y el glúteo hasta llevarla de nuevo con un impulso a la zona delantera por encima de la cabeza. Cuando éste regresa al centro después del balanceo, lleva la cadera hacia atrás y colócate con las piernas rectas.', ''),
(9, 'Saltar a la cuerda', 260, 'Cardio', 'Hay muchas modalidades, salto simple lo más rápido posible, doble salto, etc...', ''),
(10, 'Burpees', 286, 'Tonificación', ' Consiste en agachar el cuerpo y apoyar las manos en el suelo, impulsar los pies hacia atrás hasta quedar en la postura de una plancha, para después realizar una flexión tocando el suelo con el pecho. Trabaja pectorales, bíceps, tríceps, abdominales, glúteos y cuádriceps.', ''),
(11, 'Máquina de remo', 250, 'Fuerza', 'Utiliza los músculos la espalda, brazos, hombros, piernas, así como los llamado músculos del core, los cuales se componen de los abdominales, lumbares, la pelvis, los glúteos y la musculatura de la columna.', ''),
(12, 'Zancadas(Lunges)', 185, 'Tonificación', 'De pie, con los pies separados casi a la altura de los hombros, haz un paso largo hacia atrás(o hacia delante) con una pierna mientras la otra permanece en la posicion inicial. Flexiona ambas rodillas y finalmente, vuelve a la posicion incial, así con ambas piernas.', ''),
(13, 'Flexiones(Push ups)', 109, 'Tonificacion', 'Estás tumbado boca abajo con el pecho y vientre sobre el suelo, con los brazos doblados y las palmas de la mano en el suelo junto el pecho – los codos deben mirar hacia atrás. Luego, levantas el cuerpo entero empujando el cuerpo hacia arriba hasta que los brazos estén completamente estirados.', ''),
(14, 'Correr', 380, 'Cardio', 'Puedes aumentar tu velocidad, correr en terrenos con más inclinación para consumir mas calorias y aumentar tu frecuencia cardíaca.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

CREATE TABLE `entrenamiento` (
  `idEntrenamiento` int(10) NOT NULL,
  `idUsuarioEntrenador` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `repeticiones` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientoejercicio`
--

CREATE TABLE `entrenamientoejercicio` (
  `idEntrenamiento` int(10) NOT NULL,
  `idEjercicio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `emisor` varchar(10) NOT NULL,
  `receptor` varchar(10) NOT NULL,
  `texto` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `del_1` tinyint(1) NOT NULL DEFAULT 0,
  `del_2` tinyint(1) NOT NULL DEFAULT 0,
  `visto` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `emisor`, `receptor`, `texto`, `fecha`, `del_1`, `del_2`, `visto`) VALUES
(1, '26515643R', '12345678A', 'Prueba de mensajes', '2020-04-26 13:27:40', 0, 0, 1),
(2, '12345678A', '26515643R', 'Que pasa bro', '2020-04-26 14:11:21', 0, 1, 1),
(3, '26515643R', '12345678A', 'Hola', '2020-04-27 14:21:36', 0, 0, 1),
(4, '26515643R', '12345678A', 'Hola', '2020-04-27 14:22:53', 0, 0, 1),
(5, '26515643R', '12345678A', 'Fuck', '2020-04-27 14:23:07', 0, 0, 1),
(6, '26515643R', '12345678B', '¡Hola! Soy JUAN LIU.', '2020-04-27 17:11:18', 0, 0, 0);

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
('12345678A', 'PETER PARKER', '$2y$10$AVXZMNDY3t0qMnnlDsK2ieHc20jp0elXy3AGUtTTROr29gJwgZ9h6', NULL, 'spidy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Entrenador profesional', 'Escalada', '20'),
('12345678B', 'TONY STARK', '$2y$10$tatd6qauszToIxFssh7V8uvAn/jdLXu0ttWYQhi3vbc6ZHQ58PCsC', NULL, 't_stark@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Entrenador profesional', 'Apoyo moral', '30'),
('12345678C', 'MIKE', '$2y$10$WXvI7J3TDkc3K4WdSjuZBebcgpYB8FK0NIfcZmA4S1IY.zvufxsYG', NULL, 'm_tyson@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
('12345678D', 'HUGAN', '$2y$10$L9uPLpdr8gX6ffx.6tBuy.xciEHtyQV7Q9CV4sJXSzp93fPKaZsRu', NULL, 'theHulk@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
('12345678E', 'PACO', '$2y$10$tzz1gsEjLR0KpjlmpP2aTeWNYnJoQu1rKmNorVy2FI1PGmNqezYMG', NULL, 'paco@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
('26515643R', 'JUAN LIU', '$2y$10$jdDa6gcD88z2T1eZcaBOqOShDc6UjXaHVqUn5n7SpPwiHSg.8IRdW', NULL, 'chengliu@ucm.es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

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
-- Volcado de datos para la tabla `usuarioentrenador`
--

INSERT INTO `usuarioentrenador` (`id`, `usuario`, `entrenador`, `estado`) VALUES
(8, '12345678D', '12345678B', 'aceptado');

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
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emisor` (`emisor`,`receptor`),
  ADD KEY `receptor` (`receptor`);

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
  MODIFY `idAlimento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `idComida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  MODIFY `idEntrenamiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `entrenamiento_ibfk_1` FOREIGN KEY (`idUsuarioEntrenador`) REFERENCES `usuarioentrenador` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrenamientoejercicio`
--
ALTER TABLE `entrenamientoejercicio`
  ADD CONSTRAINT `entrenamientoejercicio_ibfk_1` FOREIGN KEY (`idEntrenamiento`) REFERENCES `entrenamiento` (`idEntrenamiento`),
  ADD CONSTRAINT `entrenamientoejercicio_ibfk_2` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`emisor`) REFERENCES `usuario` (`nif`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`receptor`) REFERENCES `usuario` (`nif`) ON DELETE CASCADE;

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
