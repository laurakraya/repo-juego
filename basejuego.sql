-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2019 a las 17:03:47
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basejuego`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id` int(11) NOT NULL,
  `niveles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `imagen` text,
  `fecha_Nac` date DEFAULT NULL,
  `niveles_id` int(11) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `imagen`, `fecha_Nac`, `niveles_id`, `nombre`) VALUES
(1, 'Imagenes/1.1.jpg', '1985-02-05', NULL, 'Cristiano Ronaldo dos San'),
(2, 'Imagenes/1.2.jpg', '1973-12-09', NULL, 'Paul Walker'),
(3, 'Imagenes/1.3.jpg', '1993-11-23', NULL, 'Miley Cyrus'),
(4, 'Imagenes/1.4.jpg', '1961-05-06', NULL, 'Gorge Clooney'),
(5, 'Imagenes/1.5.jpg', '1994-03-01', NULL, 'Justin Bieber'),
(6, 'Imagenes/1.6.jpg', '1963-12-18', NULL, 'Brat Pitt'),
(7, 'Imagenes/1.7.jpg', '1989-07-23', NULL, 'Daniel Jacob Racliffe'),
(8, 'Imagenes/1.8.jpg', '1956-07-09', NULL, 'Tom Hanks'),
(9, 'Imagenes/1.9.jpg', '1946-12-18', NULL, 'Steven Spielberg'),
(10, 'Imagenes/1.10.jpg', '1970-10-08', NULL, 'Matt Damon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `fecha_partida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rta_correcta` tinyint(4) DEFAULT NULL,
  `respuesta_usuario` enum('<','>','=','>-','<+') DEFAULT NULL,
  `usuario_ID` int(11) DEFAULT NULL,
  `imagenA_ID` int(11) DEFAULT NULL,
  `imagenB_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `puntaje` int(11) DEFAULT '0',
  `nivel` int(11) DEFAULT '1',
  `img_usuario` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveles_id` (`niveles_id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenA_ID` (`imagenA_ID`),
  ADD KEY `imagenB_ID` (`imagenB_ID`),
  ADD KEY `usuario_ID` (`usuario_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `niveles_id` FOREIGN KEY (`niveles_id`) REFERENCES `niveles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`imagenA_ID`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`imagenB_ID`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`usuario_ID`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
