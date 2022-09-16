-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2022 a las 23:29:00
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo_musica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `token`) VALUES
(0, 'BQB3RrLK4YNc2XmCztC90aTDPz28NM4rUeMiFkhMP9w0gBUMsQSBzBx1tiNGh471G2x_0H2653jseFqLU_lhoInJHIKnchN-ryJTwTnPYW06LE51z24');
COMMIT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `al_id` int(11) NOT NULL,
  `al_nombre` varchar(50) NOT NULL,
  `al_duracion` varchar(5) NOT NULL,
  `al_genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`al_id`, `al_nombre`, `al_duracion`, `al_genero`) VALUES
(5, 'The Wall', '', 'Rock'),
(6, 'The Dark Side of the Moon', '', 'Rock'),
(7, 'Mothership', '', 'Rock'),
(8, 'Nightmare', '', 'Heavy metal'),
(9, 'Pendulum', '', 'Rock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `a_id` int(11) NOT NULL,
  `a_nombre` varchar(50) NOT NULL,
  `a_pais` varchar(50) NOT NULL,
  `a_grupo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`a_id`, `a_nombre`, `a_pais`, `a_grupo`) VALUES
(3, 'Pink Floyd', 'UK', ''),
(4, 'Led Zeppelin', 'UK', ''),
(5, 'Avenged Sevenfold', 'USA', ''),
(6, 'Creedence Clearwater Revival', 'USA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_tiene_cancion`
--

CREATE TABLE `artista_tiene_cancion` (
  `a_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artista_tiene_cancion`
--

INSERT INTO `artista_tiene_cancion` (`a_id`, `c_id`) VALUES
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 13),
(5, 14),
(6, 15),
(6, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `c_id` int(11) NOT NULL,
  `c_nombre` varchar(40) NOT NULL,
  `c_duracion` varchar(10) NOT NULL,
  `c_genero` varchar(20) NOT NULL,
  `c_anio` int(11) NOT NULL,
  `c_enlace` varchar(100) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`c_id`, `c_nombre`, `c_duracion`, `c_genero`, `c_anio`, `c_enlace`, `p_id`) VALUES
(4, 'Mother', '5:33', 'Rock', 1979, '', 5),
(5, 'The Happiest Days of Our Lives', '1:51', 'Rock', 1979, '', 5),
(6, 'Us and Them', '7:49', 'Rock', 1974, '', 6),
(7, 'Brain Damage', '3:46', 'Rock', 1973, '', 6),
(8, 'On the Run', '3:50', 'Rock', 1973, '', 6),
(9, 'Money', '6:22', 'Rock', 1973, '', 6),
(10, 'Heartbreaker', '3:39', 'Rock', 1999, '', 7),
(11, 'Babe I’m Gonna Leave You', '6:40', 'Rock', 1969, '', 7),
(12, 'Since I’ve Been Loving You', '7:23', 'Rock', 1970, '', 7),
(13, 'Nightmare', '6:14', 'Rock', 2010, '', 8),
(14, 'Welcome to the Family', '4:05', 'Heavy metal', 2010, '', 8),
(15, 'Have You Ever Seen the Rain', '2:40', 'Rock', 1970, '', 9),
(16, 'Pagan Baby', '6:25', 'Rock', 1970, '', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion_esta_album`
--

CREATE TABLE `cancion_esta_album` (
  `c_id` int(11) NOT NULL,
  `al_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancion_esta_album`
--

INSERT INTO `cancion_esta_album` (`c_id`, `al_id`) VALUES
(4, 5),
(4, 5),
(5, 5),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 7),
(11, 7),
(12, 7),
(13, 8),
(14, 8),
(15, 9),
(16, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`u_id`, `c_id`) VALUES
(8, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productor`
--

CREATE TABLE `productor` (
  `p_id` int(11) NOT NULL,
  `p_nombre` varchar(50) NOT NULL,
  `p_pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productor`
--

INSERT INTO `productor` (`p_id`, `p_nombre`, `p_pais`) VALUES
(5, 'Columbia Records', 'USA'),
(6, 'Capitol Records', 'USA'),
(7, 'Atlantic Records', 'UK'),
(8, 'Warner Records', 'USA'),
(9, 'Fantasy Records', 'USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `u_id` int(11) NOT NULL,
  `u_nombre` varchar(20) NOT NULL,
  `u_contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`u_id`, `u_nombre`, `u_contrasena`) VALUES
(8, 'm', 'c');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`al_id`);

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`a_id`);

--
-- Indices de la tabla `artista_tiene_cancion`
--
ALTER TABLE `artista_tiene_cancion`
  ADD PRIMARY KEY (`a_id`,`c_id`),
  ADD KEY `cancion` (`c_id`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `productor_cancion` (`p_id`);

--
-- Indices de la tabla `cancion_esta_album`
--
ALTER TABLE `cancion_esta_album`
  ADD KEY `album` (`al_id`),
  ADD KEY `cancion_album` (`c_id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD KEY `usuario` (`u_id`),
  ADD KEY `cancion_fav` (`c_id`);

--
-- Indices de la tabla `productor`
--
ALTER TABLE `productor`
  ADD PRIMARY KEY (`p_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `nombre_usuario` (`u_nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `al_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productor`
--
ALTER TABLE `productor`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `artista_tiene_cancion`
--
ALTER TABLE `artista_tiene_cancion`
  ADD CONSTRAINT `artista` FOREIGN KEY (`a_id`) REFERENCES `artista` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cancion` FOREIGN KEY (`c_id`) REFERENCES `cancion` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `productor_cancion` FOREIGN KEY (`p_id`) REFERENCES `productor` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cancion_esta_album`
--
ALTER TABLE `cancion_esta_album`
  ADD CONSTRAINT `album` FOREIGN KEY (`al_id`) REFERENCES `album` (`al_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cancion_album` FOREIGN KEY (`c_id`) REFERENCES `cancion` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `cancion_fav` FOREIGN KEY (`c_id`) REFERENCES `cancion` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`u_id`) REFERENCES `usuario` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
