-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2020 a las 20:32:06
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
(1, 3),
(3, 5),
(6, 1),
(8, 5),
(8, 7),
(10, 6),
(11, 1),
(12, 2),
(12, 3),
(12, 4),
(13, 6),
(14, 7);

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
(1, '2020-05-08 14:31:49', 'comida', '26515643R'),
(2, '2020-05-01 14:32:38', 'desayuno', '12345678F'),
(3, '2020-05-03 13:37:56', 'desayuno', '12345678F'),
(4, '2020-05-10 13:39:11', 'desayuno', '12345678F'),
(5, '2020-05-10 13:43:32', 'cena', '12345678G'),
(6, '2020-05-06 14:00:00', 'comida', '12345678H'),
(7, '2020-05-04 17:38:14', 'cena', '12345678G');

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
  `multimedia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `caloriasGastadas`, `tipo`, `descripcion`, `multimedia`) VALUES
(1, 'Sentadillas(Squats)', 220, 'Tonificacion', 'Consiste en flexionar las rodillas y bajar el cuerpo manteniendo la verticalidad,\r\n  para luego regresar a una posición erguida.', 'includes/img/sentadillas.png'),
(2, 'Jumping jacks', 188, 'Cardio', ' En la posición de inicio, abre las piernas a la anchura de los hombros, a continuación\r\n   júntalas con un leve salto mientras levantas los brazos a la vez para que las manos se toquen detrás de la cabeza.\r\n   Asegúrate de mantener la cabeza recta y la vista al frente.', 'includes/img/jumpingjacks.png'),
(3, 'Planchas', 160, 'Tonificacion', 'Recuéstate boca abajo y apóyate sobre los antebrazos,\r\n   de modo que los codos queden ubicados debajo del pecho. Ahora, eleva tus piernas del piso sosteniéndote con las\r\n   puntas de los pies para formar la plancha.', 'includes/img/planchas.png'),
(4, 'Remo con banda elástica', 133, 'Fuerza', 'Con una ligera flexión de rodillas, nos inclinamos hacia delante desde\r\n  las caderas, la columna vertebral de permanecer neutral. Tiramos desde los omóplatos hacia atrás y levantamos los codos\r\n  tanto como pueda. Baje lentamente y repita.', 'includes/img/remoconbandaelastica.png'),
(5, 'Zumba Fitness', 200, 'Cardio', 'La zumba es un tipo de actividad física (fitness) basada en ritmos y músicas lationamericanas. Las coreografías de zumba incluyen ritmos como la samba, la salsa, el reggaeton, la cumbia, el merengue y el mambo.', 'includes/img/zumba.png'),
(6, 'Aeróbic step, con step de', 193, 'Cardio', 'Consiste subir y bajar de un plataforma combinando pasos al ritmo de la música de aeróbic.', 'includes/img/aerobicsteps.png'),
(7, 'Aeróbic step, con step de', 227, 'Cardio', 'Consiste subir y bajar de un plataforma combinando pasos al ritmo de la música de aeróbic.', 'includes/img/aerobicsteps.png'),
(8, 'Kettlebells', 196, 'Fuerza', 'Colócate de pie con los pies a la anchura de los hombros y deja la kettlebell en el suelo a la altura de los dedos de los pies. Dobla las rodillas, mantén la espalda recta y baja en posición de sentadilla hasta coger del asa al kettle con ambas manos hasta elevarlo hacia atrás mientras estiras las piernas manteniendo tensión en la zona de los abdominales y el glúteo hasta llevarla de nuevo con un impulso a la zona delantera por encima de la cabeza. Cuando éste regresa al centro después del balanceo, lleva la cadera hacia atrás y colócate con las piernas rectas.', 'includes/img/kettlebells.png'),
(9, 'Saltar a la cuerda', 260, 'Cardio', 'Hay muchas modalidades, salto simple lo más rápido posible, doble salto, etc...', 'includes/img/saltaralacuerda.png'),
(10, 'Burpees', 286, 'Tonificacion', ' Consiste en agachar el cuerpo y apoyar las manos en el suelo, impulsar los pies hacia atrás hasta quedar en la postura de una plancha, para después realizar una flexión tocando el suelo con el pecho. Trabaja pectorales, bíceps, tríceps, abdominales, glúteos y cuádriceps.', 'includes/img/burpees.png'),
(11, 'Máquina de remo', 250, 'Fuerza', 'Utiliza los músculos la espalda, brazos, hombros, piernas, así como los llamado músculos del core, los cuales se componen de los abdominales, lumbares, la pelvis, los glúteos y la musculatura de la columna.', 'includes/img/maquinaderemo.png'),
(12, 'Zancadas(Lunges)', 185, 'Tonificacion', 'De pie, con los pies separados casi a la altura de los hombros, haz un paso largo hacia atrás(o hacia delante) con una pierna mientras la otra permanece en la posición inicial. Flexiona ambas rodillas y finalmente, vuelve a la posicion incial, así con ambas piernas.', 'includes/img/zancadas.png'),
(13, 'Flexiones(Push ups)', 109, 'Tonificacion', 'Estás tumbado boca abajo con el pecho y vientre sobre el suelo, con los brazos doblados y las palmas de la mano en el suelo junto el pecho, los codos deben mirar hacia atrás. Luego, levantas el cuerpo entero empujando el cuerpo hacia arriba hasta que los brazos estén completamente estirados.', 'includes/img/flexiones.png'),
(14, 'Correr', 380, 'Cardio', 'Puedes aumentar tu velocidad, correr en terrenos con más inclinación para consumir mas calorias y aumentar tu frecuencia cardíaca.', 'includes/img/correr.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

CREATE TABLE `entrenamiento` (
  `idEntrenamiento` int(10) NOT NULL,
  `idUsuarioEntrenador` int(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `fecha` date NOT NULL,
  `repeticiones` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenamiento`
--

INSERT INTO `entrenamiento` (`idEntrenamiento`, `idUsuarioEntrenador`, `nombre`, `fecha`, `repeticiones`) VALUES
(3, 11, 'Rutina 1', '2020-05-10', 10),
(4, 11, 'Rutina 2', '2020-05-11', 5),
(5, 11, 'Rutina 3', '2020-05-12', 1),
(6, 8, 'Rutina correr', '2020-05-15', 4),
(7, 8, 'Rutina cuerda', '2020-05-16', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientoejercicio`
--

CREATE TABLE `entrenamientoejercicio` (
  `idEntrenamiento` int(10) NOT NULL,
  `idEjercicio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenamientoejercicio`
--

INSERT INTO `entrenamientoejercicio` (`idEntrenamiento`, `idEjercicio`) VALUES
(3, 1),
(3, 3),
(3, 14),
(4, 5),
(4, 13),
(5, 4),
(6, 6),
(6, 14),
(7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id` int(10) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `respuestas` int(4) NOT NULL,
  `id_r` int(10) NOT NULL,
  `tema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id`, `autor`, `mensaje`, `fecha`, `respuestas`, `id_r`, `tema`) VALUES
(5, 'Hugan', 'HOLA', '2020-05-10', 1, 0, 'TEMA DE PRUEBA'),
(61, 'Lara Ibarra', 'BIEEEEEEEEEEN', '2020-05-21', 0, 5, ''),
(65, 'Lara Ibarra', 'ESTA MARAVILLOSA WEB TIENE EL MEJOR FORO DEL MUNDO!!', '2020-05-21', 0, 0, 'HABLANDO DE HéRCULES...');

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
(3, '26515643R', '12345678A', 'Hola', '2020-04-27 14:21:36', 0, 0, 1),
(4, '26515643R', '12345678A', 'Hola', '2020-04-27 14:22:53', 0, 0, 1),
(6, '26515643R', '12345678B', '¡Hola! Soy JUAN LIU.', '2020-04-27 17:11:18', 0, 0, 1),
(8, '12345678F', '12345678G', '¡Hola! Soy Hugan.', '2020-05-10 13:40:38', 0, 0, 1),
(9, '12345678F', '12345678c', '¡Hola! Soy Hugan.', '2020-05-10 13:40:50', 0, 0, 0),
(10, '12345678F', '12345678a', 'Hola, buenos dias.', '2020-05-10 13:41:00', 0, 0, 0),
(11, '12345678G', '12345678F', 'que tal estás?', '2020-05-10 13:42:38', 0, 0, 1),
(12, '12345678G', '12345678a', '¡Hola! Soy Paco.', '2020-05-10 13:42:43', 0, 0, 0),
(13, '12345678H', '12345678f', '¡Hola! Soy ALBA CROFT.', '2020-05-10 13:52:49', 0, 0, 0),
(14, '12345678B', '12345678f', '¡Hola! Soy Sergio Peinado.', '2020-05-10 13:55:22', 0, 0, 0),
(15, '12345678B', '12345678G', '¡Hola! Soy Sergio Peinado.', '2020-05-10 13:55:30', 0, 0, 1),
(16, '12345678B', '12345678G', 'Que tal vas con las rutinas, Paco?', '2020-05-10 13:55:38', 0, 0, 1),
(17, '12345678F', '12345678a', 'Hola', '2020-05-10 13:56:26', 0, 0, 0),
(18, '12345678F', '12345678G', 'Bien Paco, y tú como vas?', '2020-05-10 13:56:42', 0, 0, 0),
(19, '12345678G', '12345678B', 'Muy bien, Paco', '2020-05-10 13:57:39', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nif` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contrasenna` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'includes/img/usuarios/default.png',
  `email` varchar(30) NOT NULL,
  `sexo` varchar(6) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` decimal(5,0) DEFAULT NULL,
  `preferencias` varchar(50) DEFAULT NULL,
  `tipoUsuario` tinyint(2) NOT NULL DEFAULT 0,
  `titulacion` varchar(30) DEFAULT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `experiencia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`, `titulacion`, `especialidad`, `experiencia`) VALUES
('12345678A', 'Lara Ibarra', '$2y$10$tatd6qauszToIxFssh7V8uvAn/jdLXu0ttWYQhi3vbc6ZHQ58PCsC', 'includes/img/usuarios/12345678A.jpg', 'lara@gmail.com', 'mujer', '1996-08-05', '673455328', 'Madrid', '50.00', '156', 'Sin especificar', 1, 'Nutrición', 'Dietista', '8'),
('12345678B', 'Sergio Peinado', '$2y$10$AVXZMNDY3t0qMnnlDsK2ieHc20jp0elXy3AGUtTTROr29gJwgZ9h6', 'includes/img/usuarios/12345678B.jpg', 'fuertacos@gmail.com', 'hombre', '1993-02-01', '699598712', 'Madrid', '84.00', '177', 'Convertir a toda la sociedad en fuertacos', 1, 'Licenciado en las actividades ', 'Entrenador personal', '10'),
('12345678C', 'Vadym Calavera', '$2y$10$WXvI7J3TDkc3K4WdSjuZBebcgpYB8FK0NIfcZmA4S1IY.zvufxsYG', 'includes/img/usuarios/12345678C.jpg', 'vuamos@gmail.com', 'hombre', '1992-05-12', '912554222', 'Bogotá', '82.00', '185', 'Sin espeficar', 1, 'Entrenador personal', 'Fuerza y ganar masa muscular', '10'),
('12345678D', 'Chris Heria', '$2y$10$AVXZMNDY3t0qMnnlDsK2ieHc20jp0elXy3AGUtTTROr29gJwgZ9h6', 'includes/img/usuarios/12345678D.jpg', 'thenx@gmail.com', 'hombre', '1996-02-01', '698598712', 'Florida', '77.20', '180', 'Sin especificar', 1, 'Entrenador personal', 'Pérdida de peso y fuerza', '6'),
('12345678E', 'Fausto Murillo', '$2y$10$AVXZMNDY3t0qMnnlDsK2ieHc20jp0elXy3AGUtTTROr29gJwgZ9h6', 'includes/img/usuarios/12345678E.jpg', 'fausto@gmail.com', 'hombre', '1992-01-01', '699598712', 'Bogotá', '75.00', '182', 'Sin especificar', 1, 'Entrenador personal', 'Pérdida de peso y fuerza', '12'),
('12345678F', 'Hugan', '$2y$10$L9uPLpdr8gX6ffx.6tBuy.xciEHtyQV7Q9CV4sJXSzp93fPKaZsRu', 'includes/img/usuarios/default.png', 'theHulk@gmail.com', 'hombre', '1999-05-08', 'Sin especificar', 'Sin especificar', '0.00', '0', 'Sin especificar', 0, NULL, NULL, NULL),
('12345678G', 'Paco', '$2y$10$tzz1gsEjLR0KpjlmpP2aTeWNYnJoQu1rKmNorVy2FI1PGmNqezYMG', 'includes/img/usuarios/default.png', 'paco@gmail.com', 'hombre', '1996-08-08', 'Sin especificar', 'Sin especificar', '0.00', '0', 'Sin especificar', 0, NULL, NULL, NULL),
('12345678H', 'Alba Croft', '$2y$10$BpZNFwptPVCLn6LT.dknqe1JvDk3ipbSg5JY5NhI1nLkQsavkRise', 'includes/img/usuarios/default.png', 'alba@gmail.com', 'Mujer', '2020-03-10', 'No especificado', 'Madrid', '55.00', '170', 'Deportes', 0, NULL, NULL, NULL),
('12345678I', 'Miriam', '$2y$10$tzz1gsEjLR0KpjlmpP2aTeWNYnJoQu1rKmNorVy2FI1PGmNqezYMG', ' includes/img/usuarios/default.png', 'chengliu@ucm.es', 'mujer', '1997-08-05', 'Sin especificar', 'Sin especificar', '0.00', '0', 'Sin especificar', 0, NULL, NULL, NULL),
('26515643R', 'Juan Liu', '$2y$10$tzz1gsEjLR0KpjlmpP2aTeWNYnJoQu1rKmNorVy2FI1PGmNqezYMG', 'includes/img/usuarios/default.png', 'chengliu@ucm.es', 'hombre', '1999-05-05', 'Sin especificar', 'Sin especificar', '0.00', '0', 'Sin especificar', 0, NULL, NULL, NULL);

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
(8, '12345678G', '12345678B', 'aceptado'),
(9, '26515643R', '12345678B', 'aceptado'),
(10, '12345678G', '12345678C', 'pendiente'),
(11, '12345678G', '12345678A', 'aceptado'),
(12, '12345678H', '12345678A', 'pendiente'),
(13, '12345678H', '12345678C', 'pendiente'),
(14, '12345678H', '12345678D', 'pendiente'),
(15, '12345678F', '12345678B', 'aceptado');


-- ------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id` int(10) NOT NULL,
  `usuario1` varchar(10) NOT NULL,
  `usuario2` varchar(10) NOT NULL,
  `estado` enum('aceptado','pendiente','') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `amigos` (`id`, `usuario1`, `usuario2`, `estado`) VALUES
(1, '12345678F', '12345678H', 'aceptado'),
(2, '12345678G', '12345678I', 'pendiente');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `hacia` varchar(10) NOT NULL,
  `de` varchar(10) NOT NULL,
  `texto` text NOT NULL,
  `valor` int(1) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`hacia`, `de`, `texto`, `valor`, `visible`, `fecha`) VALUES
('12345678A', '12345678G', 'Muy bien!!!', 4, 1, '2020-05-10 14:00:14'),
('12345678B', '12345678F', 'Gran entrenador', 4, 1, '2020-05-10 14:01:58'),
('12345678B', '12345678G', 'Excelente, gracias', 5, 1, '2020-05-10 13:42:59');

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
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario1` (`usuario1`),
  ADD KEY `usuario2` (`usuario2`);


--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`hacia`,`de`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimento`
--
ALTER TABLE `alimento`
  MODIFY `idAlimento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `idComida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  MODIFY `idEntrenamiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarioentrenador`
--
ALTER TABLE `usuarioentrenador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarioentrenador`
--
ALTER TABLE `amigos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentocomida`
--
ALTER TABLE `alimentocomida`
  ADD CONSTRAINT `alimentocomida_ibfk_1` FOREIGN KEY (`idAlimento`) REFERENCES `alimento` (`idAlimento`) ON DELETE CASCADE,
  ADD CONSTRAINT `alimentocomida_ibfk_2` FOREIGN KEY (`idComida`) REFERENCES `comida` (`idComida`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `entrenamientoejercicio_ibfk_1` FOREIGN KEY (`idEntrenamiento`) REFERENCES `entrenamiento` (`idEntrenamiento`) ON DELETE CASCADE,
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

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`usuario1`) REFERENCES `usuario` (`nif`),
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`usuario2`) REFERENCES `usuario` (`nif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
