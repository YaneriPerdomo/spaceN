-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2025 a las 00:37:12
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
-- Base de datos: `spacen`
--
CREATE DATABASE IF NOT EXISTS `spacen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `spacen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id_cargo` int(10) NOT NULL,
  `cargo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `cargo`) VALUES
(1, 'Docente'),
(2, 'Terapeuta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_lecciones`
--

DROP TABLE IF EXISTS `estado_lecciones`;
CREATE TABLE `estado_lecciones` (
  `id_estado_leccion` int(10) NOT NULL,
  `id_leccion` int(10) DEFAULT NULL,
  `id_usuario` varchar(30) DEFAULT NULL,
  `completado` enum('bloqueado','completado','en_espera') DEFAULT NULL,
  `porcentaje` int(11) DEFAULT 0,
  `diamantes_obtenidos` int(100) DEFAULT 0,
  `tiempo` varchar(25) NOT NULL DEFAULT '00:00:00',
  `fallida` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `id_genero` int(10) NOT NULL,
  `genero` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--

DROP TABLE IF EXISTS `historiales`;
CREATE TABLE `historiales` (
  `id_historial` int(10) NOT NULL,
  `id_nino` int(10) DEFAULT NULL,
  `id_profesional` int(10) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

DROP TABLE IF EXISTS `lecciones`;
CREATE TABLE `lecciones` (
  `id_leccion` int(10) NOT NULL,
  `id_tema` int(10) DEFAULT NULL,
  `leccion` int(10) DEFAULT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `objetivo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lecciones`
--

INSERT INTO `lecciones` (`id_leccion`, `id_tema`, `leccion`, `titulo`, `objetivo`) VALUES
(1, 1, 1, 'Asociación de cantidad con objetos', 'Asociación de cantidad con objetos: ejercicios de contar objetos de diferentes tipos y tamaños.'),
(2, 1, 2, 'Comparación de cantidades', 'Comparación de cantidades: actividades para identificar \"más\", \"menos\" e \"igual\".'),
(3, 2, 1, 'Reconocimiento de números. Parte 1', 'Reconocimiento de números del 1 al 10: ejercicios de identificación auditiva.'),
(4, 2, 2, 'Reconocimiento de números. Parte 2', 'Reconocimiento de números del 1 al 10: ejercicios de identificación visual.'),
(5, 3, 1, 'Conteo hacia adelante y hacia atrás', 'Ejercicios de contar desde un numero inicial'),
(6, 3, 2, 'Conteo con objetos', 'Actividades para comprender las cantidades con objetos'),
(7, 4, 1, 'Suma y resta con objetos', 'Ejercicios manipulativos para visualizar las operaciones.'),
(8, 4, 2, 'Problemas sencillos', 'Resolución de problemas contextualizados.'),
(10, 9, 1, 'Multiplicación y división', 'Introducción a los conceptos básicos.'),
(11, 3, 2, ' Problemas más complejos', 'Resolución de problemas que involucran múltiples operaciones.'),
(12, 10, 1, 'Concepto de fracción', 'Representación gráfica y manipulativa '),
(13, 10, 2, 'Comparación de fracciones', 'Ejercicios para identificar fracciones equivalentes y ordenarlas ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `id_modulo` int(10) NOT NULL,
  `id_nivel_acceso` int(10) DEFAULT NULL,
  `modulo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `id_nivel_acceso`, `modulo`) VALUES
(1, 1, ' Fundamentos Numéricos'),
(2, 2, ' Ampliando el Concepto de Número'),
(3, 3, 'Desarrollo de Habilidades Numéricas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

DROP TABLE IF EXISTS `ninos`;
CREATE TABLE `ninos` (
  `id_nino` int(10) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `id_profesional` int(10) NOT NULL,
  `id_nivel_acceso` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ultimo_acceso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles_acceso`
--

DROP TABLE IF EXISTS `niveles_acceso`;
CREATE TABLE `niveles_acceso` (
  `id_nivel_acceso` int(10) NOT NULL,
  `nivel_acceso` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `niveles_acceso`
--

INSERT INTO `niveles_acceso` (`id_nivel_acceso`, `nivel_acceso`) VALUES
(1, 'pre_numerico'),
(2, 'numerico_emergente'),
(3, 'desarrollo_numerico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id_notificacion` int(10) NOT NULL,
  `id_nino` int(10) DEFAULT NULL,
  `id_profesional` int(10) DEFAULT NULL,
  `mensaje` varchar(50) DEFAULT NULL,
  `fecha_hora_envio` datetime DEFAULT NULL,
  `estado` enum('pendiente','leido') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE `profesionales` (
  `id_profesional` int(10) NOT NULL,
  `id_cargo` int(10) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(80) DEFAULT NULL,
  `centro_educativo` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progresos`
--

DROP TABLE IF EXISTS `progresos`;
CREATE TABLE `progresos` (
  `id_progreso` int(10) NOT NULL,
  `id_nivel_acceso` int(10) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT 0,
  `total_diamantes` int(100) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_rol` int(10) NOT NULL,
  `rol` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Profesional'),
(2, 'Niño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

DROP TABLE IF EXISTS `temas`;
CREATE TABLE `temas` (
  `id_tema` int(10) NOT NULL,
  `id_modulo` int(10) DEFAULT NULL,
  `tema` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `id_modulo`, `tema`) VALUES
(1, 1, 'Conceptos básicos'),
(2, 1, 'Introducción a los números'),
(3, 2, 'Conteo'),
(4, 2, 'Operaciones básicas'),
(5, 3, 'Operaciones avanzadas'),
(6, 3, 'Fracciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(8) NOT NULL,
  `estado` bit(1) DEFAULT b'1',
  `fecha_hora_creacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `estado_lecciones`
--
ALTER TABLE `estado_lecciones`
  ADD PRIMARY KEY (`id_estado_leccion`),
  ADD KEY `id_leccion` (`id_leccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_nino` (`id_nino`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id_leccion`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `id_nivel_acceso` (`id_nivel_acceso`);

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`id_nino`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_nivel_acceso` (`id_nivel_acceso`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `niveles_acceso`
--
ALTER TABLE `niveles_acceso`
  ADD PRIMARY KEY (`id_nivel_acceso`);

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
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `progresos`
--
ALTER TABLE `progresos`
  ADD PRIMARY KEY (`id_progreso`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_nivel_acceso` (`id_nivel_acceso`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
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
-- AUTO_INCREMENT de la tabla `estado_lecciones`
--
ALTER TABLE `estado_lecciones`
  MODIFY `id_estado_leccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historiales`
--
ALTER TABLE `historiales`
  MODIFY `id_historial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id_leccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id_nino` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `niveles_acceso`
--
ALTER TABLE `niveles_acceso`
  MODIFY `id_nivel_acceso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `progresos`
--
ALTER TABLE `progresos`
  MODIFY `id_progreso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD CONSTRAINT `historiales_ibfk_1` FOREIGN KEY (`id_nino`) REFERENCES `ninos` (`id_nino`),
  ADD CONSTRAINT `historiales_ibfk_2` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
