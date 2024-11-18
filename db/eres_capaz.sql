-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 19:06:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tu_puedes`
--
CREATE DATABASE IF NOT EXISTS `eres_capaz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
USE `eres_capaz`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliaciones`
--

DROP TABLE IF EXISTS `afiliaciones`;
CREATE TABLE `afiliaciones` (
  `id_afiliacion` int(10) NOT NULL,
  `afiliacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `afiliaciones`
--

INSERT INTO `afiliaciones` (`id_afiliacion`, `afiliacion`) VALUES
(1, 'Madre'),
(2, 'Padre'),
(3, 'Abuelo'),
(4, 'Abuela'),
(5, 'Bisabuelo'),
(6, 'Bisabuela'),
(7, 'Tío'),
(8, 'Tía'),
(9, 'Sobrino'),
(10, 'Sobrina'),
(11, 'Primo'),
(12, 'Primo'),
(13, 'Vecino'),
(14, 'Vecina'),
(15, 'Suegro'),
(16, 'Suegra'),
(17, 'Cuñado'),
(18, 'Cuñada'),
(19, 'Yerno'),
(20, 'Nuera'),
(21, 'Pareja'),
(22, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id_cargo` int(10) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `cargo`) VALUES
(1, 'Docente'),
(2, 'Terapeuta ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_jugadores`
--

DROP TABLE IF EXISTS `detalles_jugadores`;
CREATE TABLE `detalles_jugadores` (
  `id_detalles_jugador` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha_validez` date DEFAULT NULL,
  `estrellas_totales` tinyint(3) DEFAULT NULL,
  `porcentaje` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

DROP TABLE IF EXISTS `etapas`;
CREATE TABLE `etapas` (
  `id_etapa` int(10) NOT NULL,
  `etapa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`id_etapa`, `etapa`) VALUES
(1, 'prelectores'),
(2, 'lectores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `id_genero` int(10) NOT NULL,
  `genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`) VALUES
(1, 'Masculino '),
(2, 'Femenina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

DROP TABLE IF EXISTS `lecciones`;
CREATE TABLE `lecciones` (
  `id_leccion` int(10) NOT NULL,
  `id_seccion` int(10) DEFAULT NULL,
  `leccion` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lecciones`
--

INSERT INTO `lecciones` (`id_leccion`, `id_seccion`, `leccion`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 3, 1),
(16, 3, 2),
(17, 3, 3),
(18, 3, 4),
(19, 3, 5),
(20, 3, 6),
(21, 3, 7),
(22, 3, 8),
(23, 4, 9),
(24, 4, 10),
(25, 4, 11),
(26, 4, 12),
(27, 4, 13),
(28, 4, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones_completadas`
--

DROP TABLE IF EXISTS `lecciones_completadas`;
CREATE TABLE `lecciones_completadas` (
  `id_leccion_completada` int(10) NOT NULL,
  `id_leccion` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `completada` bit(1) DEFAULT b'0',
  `estrellas` tinyint(3) DEFAULT NULL,
  `porcentaje` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lecciones_completadas`
--

INSERT INTO `lecciones_completadas` (`id_leccion_completada`, `id_leccion`, `id_usuario`, `completada`, `estrellas`, `porcentaje`) VALUES
(1, 1, 12, b'0', 0, 0),
(2, 1, 42, b'0', 22, 63),
(4, 1, 54, b'1', 2, 29),
(5, 2, 54, b'0', 0, 0),
(6, 15, 55, b'1', 4, 25),
(7, 1, 63, b'1', 26, 93),
(8, 15, 62, b'0', 0, 0),
(9, 2, 63, b'1', 2, 67),
(10, 3, 63, b'1', 28, 93),
(11, 4, 63, b'1', 22, 73),
(12, 5, 63, b'1', 63, 100),
(13, 6, 63, b'1', 26, 93),
(14, 7, 63, b'1', 11, 65),
(15, 8, 63, b'0', 20, 100),
(16, 15, 65, b'1', 21, 47),
(17, 16, 65, b'1', 31, 65),
(18, 17, 65, b'1', 21, 78),
(19, 18, 65, b'1', 22, 30),
(20, 19, 65, b'1', 11, 32),
(21, 20, 65, b'1', 1, 50),
(22, 21, 65, b'1', 1, 50),
(23, 22, 65, b'1', 2, 33),
(24, 23, 65, b'0', 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

DROP TABLE IF EXISTS `ninos`;
CREATE TABLE `ninos` (
  `id_nino` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_pais` int(10) NOT NULL,
  `id_profesional` int(10) DEFAULT NULL,
  `id_representante` int(10) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sabe_leer` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id_nino`, `id_genero`, `id_usuario`, `id_pais`, `id_profesional`, `id_representante`, `nombre`, `apellido`, `fecha_nacimiento`, `sabe_leer`) VALUES
(1, 1, 12, 11, NULL, NULL, NULL, NULL, '2021-02-02', b'0'),
(6, 1, 19, 5, 1, NULL, NULL, NULL, '2023-02-23', b'0'),
(19, 1, 51, 34, 3, NULL, 'Edgar', 'Perdomo', '2018-07-11', b'0'),
(30, 2, 62, 34, NULL, 1, 'migelina', 'Perdomo', '2024-11-01', b'1'),
(31, 2, 63, 34, 7, NULL, 'Paola', 'Perdomo', '2012-11-23', b'0'),
(32, 2, 64, 34, 6, NULL, 'Paola', 'Nieves', '2016-12-01', b'0'),
(33, 2, 65, 34, 7, NULL, 'cynthia', 'nieves', '2013-12-21', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises` (
  `id_pais` int(10) NOT NULL,
  `pais` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `pais`) VALUES
(1, 'México '),
(2, 'Belice'),
(3, 'Costa Rica'),
(4, 'El Salvador'),
(5, 'Guatemala'),
(6, 'Honduras'),
(7, 'Nicaragua'),
(8, 'Panamá'),
(9, 'Antigua y Barbuda'),
(10, 'Bahamas'),
(11, 'Barbados'),
(12, 'Cuba'),
(13, 'Dominica'),
(14, 'Granada'),
(15, 'Haití'),
(16, 'Jamaica'),
(17, 'Puerto Rico'),
(18, 'República Dominicana'),
(19, 'San Cristóbal y Nevis'),
(20, 'Santa Lucía'),
(21, 'San Vicente y las Granadinas'),
(22, 'Trinidad y Tobago'),
(23, 'Argentina'),
(24, 'Bolivia'),
(25, 'Brasil'),
(26, 'Chile'),
(27, 'Colombia'),
(28, 'Ecuador'),
(29, 'Guyana'),
(30, 'Paraguay'),
(31, 'Perú'),
(32, 'Surinam'),
(33, 'Uruguay'),
(34, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE `profesionales` (
  `id_profesional` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_cargo` int(10) NOT NULL,
  `id_pais` int(10) DEFAULT NULL,
  `nombre` varchar(55) NOT NULL,
  `apellido` varchar(55) NOT NULL,
  `correo_electronico` varchar(80) NOT NULL,
  `centro_educativo_profesional` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id_profesional`, `id_usuario`, `id_cargo`, `id_pais`, `nombre`, `apellido`, `correo_electronico`, `centro_educativo_profesional`) VALUES
(1, 3, 1, NULL, 'yaneri', 'perdomo', 'perdomopaolabarrios@gmail.com', '1'),
(3, 7, 1, NULL, 'yaneri', 'perdomo', 'perdomopaolabarrio@gmail.com', '1'),
(6, 10, 1, NULL, 'Yaneri', 'Perdomo', 'Admin@gmail.com', '1'),
(7, 8, 1, 34, 'Test', 'Test', 'test', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

DROP TABLE IF EXISTS `representantes`;
CREATE TABLE `representantes` (
  `id_representante` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `id_afiliacion` int(10) DEFAULT NULL,
  `id_pais` int(10) DEFAULT NULL,
  `nombre` varchar(55) DEFAULT NULL,
  `apellido` varchar(55) DEFAULT NULL,
  `correo_electronico` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id_representante`, `id_usuario`, `id_afiliacion`, `id_pais`, `nombre`, `apellido`, `correo_electronico`) VALUES
(1, 13, 17, 34, 'Dustin', 'Perdomo', 'dustinperdomo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_rol` int(10) NOT NULL,
  `rol` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Profesional'),
(2, 'Representante'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

DROP TABLE IF EXISTS `secciones`;
CREATE TABLE `secciones` (
  `id_seccion` int(10) NOT NULL,
  `id_etapa` int(10) NOT NULL,
  `seccion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id_seccion`, `id_etapa`, `seccion`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo_jugadores`
--

DROP TABLE IF EXISTS `tiempo_jugadores`;
CREATE TABLE `tiempo_jugadores` (
  `id_tiempo_jugador` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `tiempo` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ultimas_fechas_sesion`
--

DROP TABLE IF EXISTS `ultimas_fechas_sesion`;
CREATE TABLE `ultimas_fechas_sesion` (
  `id_ultima_fecha_sesion` int(10) NOT NULL,
  `fecha_ultima_sesion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(8) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'0',
  `permisos` bit(1) DEFAULT b'0',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_validez` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `usuario`, `clave`, `estado`, `permisos`, `fecha_creacion`, `fecha_validez`) VALUES
(3, 1, 'yaneri', '1234', b'1', b'1', '2024-06-21 00:00:00', NULL),
(7, 1, 'yane3perdomo', '123', b'1', b'1', '2024-06-21 00:00:00', NULL),
(8, 1, 'perdomo', '123', b'1', b'1', '2024-06-21 00:00:00', NULL),
(10, 1, 'yaneriperdomo72', '123', b'1', b'1', '2024-06-22 00:00:00', NULL),
(12, 3, 'Yane3perdomo0', '123', b'1', b'1', '2024-08-02 00:00:00', '2024-08-27 00:00:00'),
(13, 2, 'Dustin', '12345', b'1', b'0', '2024-08-02 00:00:00', NULL),
(18, 3, '', '', b'1', b'0', '2024-09-04 00:00:00', '0000-00-00 00:00:00'),
(19, 3, '2232', '123', b'1', b'0', '2024-09-04 00:00:00', '2030-02-22 00:00:00'),
(22, 3, '343', '123', b'1', b'0', '2024-09-04 00:00:00', '0000-00-00 00:00:00'),
(23, 3, '434324353', '123', b'1', b'1', '2024-09-04 00:00:00', '2030-02-02 00:00:00'),
(42, 3, 'test', '123', b'1', b'1', '2024-10-16 00:00:00', '2027-01-01 00:00:00'),
(50, 3, 'Emily2019', '12345', b'1', b'1', '2024-11-01 00:00:00', '2024-11-19 00:00:00'),
(51, 3, 'Edgar25', '123', b'1', b'1', '2024-11-06 00:00:00', '2028-01-05 00:00:00'),
(54, 3, 'Fanny3', '123', b'1', b'1', '2024-11-06 00:00:00', '2024-11-29 00:00:00'),
(55, 3, 'Pablo2024', '123', b'1', b'1', '2024-11-07 00:00:00', '2024-11-27 00:00:00'),
(62, 3, 'migelina', '123', b'1', b'1', '2024-11-07 00:00:00', '2024-11-20 00:00:00'),
(63, 3, 'Nieves', '123', b'1', b'1', '2024-11-07 00:00:00', '2024-11-28 00:00:00'),
(64, 3, 'Paola3', '123', b'1', b'1', '2024-11-08 00:00:00', '2024-11-22 00:00:00'),
(65, 3, 'cynthia3', '123', b'1', b'1', '2024-11-13 00:00:00', '2024-11-15 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliaciones`
--
ALTER TABLE `afiliaciones`
  ADD PRIMARY KEY (`id_afiliacion`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `detalles_jugadores`
--
ALTER TABLE `detalles_jugadores`
  ADD PRIMARY KEY (`id_detalles_jugador`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id_leccion`),
  ADD KEY `id_seccion` (`id_seccion`);

--
-- Indices de la tabla `lecciones_completadas`
--
ALTER TABLE `lecciones_completadas`
  ADD PRIMARY KEY (`id_leccion_completada`),
  ADD KEY `id_leccion` (`id_leccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`id_nino`),
  ADD KEY `id_pais` (`id_pais`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `ninos_ibfk_4` (`id_profesional`),
  ADD KEY `ninos_ibfk_5` (`id_representante`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id_profesional`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id_representante`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_afiliacion` (`id_afiliacion`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `id_etapa` (`id_etapa`);

--
-- Indices de la tabla `tiempo_jugadores`
--
ALTER TABLE `tiempo_jugadores`
  ADD PRIMARY KEY (`id_tiempo_jugador`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ultimas_fechas_sesion`
--
ALTER TABLE `ultimas_fechas_sesion`
  ADD PRIMARY KEY (`id_ultima_fecha_sesion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliaciones`
--
ALTER TABLE `afiliaciones`
  MODIFY `id_afiliacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalles_jugadores`
--
ALTER TABLE `detalles_jugadores`
  MODIFY `id_detalles_jugador` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id_etapa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id_leccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `lecciones_completadas`
--
ALTER TABLE `lecciones_completadas`
  MODIFY `id_leccion_completada` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id_nino` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id_representante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id_seccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiempo_jugadores`
--
ALTER TABLE `tiempo_jugadores`
  MODIFY `id_tiempo_jugador` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ultimas_fechas_sesion`
--
ALTER TABLE `ultimas_fechas_sesion`
  MODIFY `id_ultima_fecha_sesion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_jugadores`
--
ALTER TABLE `detalles_jugadores`
  ADD CONSTRAINT `detalles_jugadores_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD CONSTRAINT `lecciones_ibfk_1` FOREIGN KEY (`id_seccion`) REFERENCES `secciones` (`id_seccion`);

--
-- Filtros para la tabla `lecciones_completadas`
--
ALTER TABLE `lecciones_completadas`
  ADD CONSTRAINT `lecciones_completadas_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`),
  ADD CONSTRAINT `lecciones_completadas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD CONSTRAINT `ninos_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`),
  ADD CONSTRAINT `ninos_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `ninos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `ninos_ibfk_4` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`),
  ADD CONSTRAINT `ninos_ibfk_5` FOREIGN KEY (`id_representante`) REFERENCES `representantes` (`id_representante`);

--
-- Filtros para la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD CONSTRAINT `profesionales_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `profesionales_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`),
  ADD CONSTRAINT `profesionales_ibfk_3` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`);

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `representantes_ibfk_2` FOREIGN KEY (`id_afiliacion`) REFERENCES `afiliaciones` (`id_afiliacion`),
  ADD CONSTRAINT `representantes_ibfk_3` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`);

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `secciones_ibfk_1` FOREIGN KEY (`id_etapa`) REFERENCES `etapas` (`id_etapa`);

--
-- Filtros para la tabla `tiempo_jugadores`
--
ALTER TABLE `tiempo_jugadores`
  ADD CONSTRAINT `tiempo_jugadores_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
