-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 03:49:35
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
-- Base de datos: `eres_capaz`
--
CREATE DATABASE IF NOT EXISTS `eres_capaz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eres_capaz`;

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
-- Estructura de tabla para la tabla `categorias_actividades`
--

DROP TABLE IF EXISTS `categorias_actividades`;
CREATE TABLE `categorias_actividades` (
  `id_categoria_actividades` int(10) NOT NULL,
  `categoria_actividades` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_actividades`
--

INSERT INTO `categorias_actividades` (`id_categoria_actividades`, `categoria_actividades`) VALUES
(1, 'pre_numerico'),
(2, 'numerico_emergente'),
(3, 'desarrollo_numerico');

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
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

DROP TABLE IF EXISTS `ninos`;
CREATE TABLE `ninos` (
  `id_nino` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `id_categoria_actividades` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_profesional` int(10) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ultimo_acceso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id_notificacion` int(10) NOT NULL,
  `id_nino` int(10) NOT NULL,
  `id_profesional` int(10) NOT NULL,
  `mensaje` varchar(50) DEFAULT NULL,
  `fecha_hora_envio` datetime DEFAULT NULL,
  `estado` enum('pendiente','leido') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE `profesionales` (
  `id_profesional` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_cargo` int(10) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `apellido` varchar(55) NOT NULL,
  `correo_electronico` varchar(80) NOT NULL,
  `centro_educativo_profesional` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id_profesional`, `id_usuario`, `id_cargo`, `nombre`, `apellido`, `correo_electronico`, `centro_educativo_profesional`) VALUES
(8, 1, 1, 'Yaireli', 'Perdomo', 'yayiperdomo@gmail.com', '234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progresos`
--

DROP TABLE IF EXISTS `progresos`;
CREATE TABLE `progresos` (
  `id_progreso` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `porcentaje` int(5) DEFAULT 0,
  `fecha_hora_inicio` datetime DEFAULT NULL,
  `fecha_hora_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Niño');

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
  `fecha_hora_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `usuario`, `clave`, `estado`, `permisos`, `fecha_hora_creacion`) VALUES
(1, 1, 'Yayi33', '123', b'1', b'1', '2024-11-25 22:29:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categorias_actividades`
--
ALTER TABLE `categorias_actividades`
  ADD PRIMARY KEY (`id_categoria_actividades`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`id_nino`),
  ADD KEY `id_profesional` (`id_profesional`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_categoria_actividades` (`id_categoria_actividades`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `id_nino` (`id_nino`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id_profesional`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `progresos`
--
ALTER TABLE `progresos`
  ADD PRIMARY KEY (`id_progreso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

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
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias_actividades`
--
ALTER TABLE `categorias_actividades`
  MODIFY `id_categoria_actividades` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id_nino` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `progresos`
--
ALTER TABLE `progresos`
  MODIFY `id_progreso` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD CONSTRAINT `ninos_ibfk_1` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`),
  ADD CONSTRAINT `ninos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `ninos_ibfk_3` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `ninos_ibfk_4` FOREIGN KEY (`id_categoria_actividades`) REFERENCES `categorias_actividades` (`id_categoria_actividades`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_nino`) REFERENCES `ninos` (`id_nino`),
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`);

--
-- Filtros para la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD CONSTRAINT `profesionales_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `profesionales_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);

--
-- Filtros para la tabla `progresos`
--
ALTER TABLE `progresos`
  ADD CONSTRAINT `progresos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
