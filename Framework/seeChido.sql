-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 00:05:24
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `see`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addAlumno` (IN `matri` INT, IN `nom` VARCHAR(100), IN `pas` LONGTEXT, IN `ema` VARCHAR(100), IN `inde` INT)  BEGIN
       INSERT INTO users(matricula,nombre,pass,email,type,indexx)VALUES(matri,nom,pas,ema,'alumno',-1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_admin` (IN `mat` INT, IN `nom` VARCHAR(200), IN `pas` TEXT, IN `ema` VARCHAR(200), IN `car` INT, IN `typ` VARCHAR(50))  BEGIN
  INSERT INTO users(matricula,pass,email,carrera,type,indexx,nombre) 
			 VALUES(mat,pas,ema,car,typ,-1,nom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambia_pass` (IN `mat` INT, IN `pas` TEXT)  BEGIN
  UPDATE users SET pass = pas WHERE matricula = mat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_notificacion` (IN `txt` TEXT, IN `ima` VARCHAR(300), IN `car` INT, IN `mat` INT)  BEGIN
  INSERT INTO notificaciones(texto,image,carrera,matricula_user)VALUES(txt,ima,car,mat);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editar_notificacion` (IN `txt` TEXT, IN `img` VARCHAR(300), IN `car` INT, IN `di` INT)  BEGIN
  UPDATE notificaciones SET texto = txt, image = img,carrera = car WHERE id = di ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUser` (IN `matri` INT)  BEGIN
    SELECT * FROM users where matricula = matri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_notificaciones` ()  BEGIN
	SELECT N.id, N.texto, N.image, N.estatus, N.carrera, N.creacion, N.matricula_user, U.nombre FROM notificaciones AS N
	INNER JOIN users AS U ON  matricula = N.matricula_user;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `texto` text,
  `image` varchar(100) DEFAULT NULL,
  `estatus` tinyint(4) NOT NULL DEFAULT '1',
  `carrera` int(11) NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `matricula_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `texto`, `image`, `estatus`, `carrera`, `creacion`, `matricula_user`) VALUES
(1, 'Nueva notificacion', NULL, 1, 2, '2019-06-27 23:13:44', 201600112),
(2, 'Cambios realizados n', 'noticia.png', 1, 1, '2019-07-02 16:23:37', 201600112),
(3, 'Mañana no hay clases', NULL, 1, 2, '2019-07-01 23:43:54', 201600077),
(4, 'Conferencia Salva a la mujer perdida', '', 1, 1, '2019-07-02 14:24:27', 201600321),
(5, 'Junta de jefes de grupo el 25 / 03 / 2020', '', 1, 1, '2019-07-02 14:49:17', 201600321);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `matricula` int(11) NOT NULL,
  `pass` longtext NOT NULL,
  `email` varchar(150) NOT NULL,
  `email_pass` varchar(150) DEFAULT NULL,
  `carrera` varchar(100) NOT NULL,
  `type` enum('alumno','admin','superadmin') NOT NULL,
  `indexx` int(11) DEFAULT '-1',
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`matricula`, `pass`, `email`, `email_pass`, `carrera`, `type`, `indexx`, `nombre`) VALUES
(201100016, 'secret', '201100016@estudiantes.upqroo.edu.mx', NULL, '', 'alumno', -1, 'PAT MAY MANUEL JACOB'),
(201600011, 'secret', '201600011@estudiantes.upqroo.edu.mx', NULL, '', 'alumno', -1, 'CHAN CRUZ KARINA MAYTE'),
(201600059, 'secret', '201600059@estudiantes.upqroo.edu.mx', NULL, '', 'alumno', -1, 'ARRIOLA VALENCIA ANNEI EDELY'),
(201600064, 'secret', '201600064@estudiantes.upqroo.edu.mx', NULL, '', 'alumno', -1, 'CANTU MARTINEZ VIRIDIANA'),
(201600077, 'secret', '201600077@edu.com', 'secret2', '', 'admin', -1, 'Katherine Felix'),
(201600078, 'secret', '201600078@estudiantes.upqroo.edu.mx', NULL, '', 'alumno', -1, 'FUENTES VIVEROS MAURICIO'),
(201600111, 'secret', '201600111@upqroo.alumnos.com', 'secret2', '', 'alumno', -1, 'Victor Malvado'),
(201600112, 'secretoo', '201600112@gmail.com', 'secret2', '', 'superadmin', -1, 'Andres Romero'),
(201600113, 'secret', '201600113@estudiantes.upqroo.edu.mx', NULL, '', 'alumno', -1, 'ROSALES DIAZ ERIC'),
(201600123, 'mipass', '201600123@gmail.com', NULL, '2', 'admin', -1, 'Fulanito Jimenes'),
(201600321, 'pass', '201600321@gmail.com', NULL, '1', 'admin', -1, 'Lolito Fernandez'),
(201800376, 'secret', '201800376@estudiantes.upqroo.edu.mx', NULL, '', 'alumno', -1, 'CAMACHO TORRES LUIS MARIO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula_user` (`matricula_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`matricula_user`) REFERENCES `users` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
