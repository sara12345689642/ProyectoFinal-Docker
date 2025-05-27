-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2025 a las 02:10:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bienestar_u`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `usuario_id`, `tipo`, `mensaje`, `fecha`) VALUES
(3, 8, 'Académica', 'certificados', '2025-04-22 17:04:31'),
(4, 8, 'Otro', 'talleres', '2025-04-22 17:04:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_actividades`
--

CREATE TABLE `inscripciones_actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `codigo_estudiantil` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `actividad` varchar(100) DEFAULT NULL,
  `comentarios` text DEFAULT NULL,
  `fecha_inscripcion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones_actividades`
--

INSERT INTO `inscripciones_actividades` (`id`, `nombre`, `codigo_estudiantil`, `correo`, `actividad`, `comentarios`, `fecha_inscripcion`) VALUES
(1, 'sara', '2362723', 'tunombre@correoinstitucional', 'Danza', '', '2025-04-05 04:38:03'),
(2, 'carlos', '2362724', 'carlos@correounivalle', 'Teatro', 'proporcionar los materiales', '2025-04-05 04:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'usuario'),
(3, 'profesionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_apoyo`
--

CREATE TABLE `solicitud_apoyo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_servicio` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(50) DEFAULT 'Pendiente',
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud_apoyo`
--

INSERT INTO `solicitud_apoyo` (`id`, `usuario_id`, `tipo_servicio`, `descripcion`, `fecha_solicitud`, `estado`, `correo`) VALUES
(6, 8, 'Psicológico', 'mente', '2025-04-05 04:24:36', 'Pendiente', 'tunombre@correoinstitucional'),
(7, 8, 'Alimentario', 'aaaa', '2025-04-05 15:33:21', 'Pendiente', 'sara@correounivalle.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role_id`) VALUES
(5, 'Sara', '$2y$10$baq6Wbf0OTy56hW8bMr/ZudrhgCGsy18dMAcnQ.gfwOC/C0V.nWQC', 1),
(6, 'majo', '$2y$10$DGci4RTYC/L4EhxOeVUFY.9s.KyzXF/hSC7fRSOS3JG4QL7038afm', 3),
(7, 'pedro', '$2y$10$2xY3U7VRctrmzn3Jii0aIeTMQmaKvRFpDgEmjxlD3CRZLj2BvZ5/S', 2),
(8, 'juan', '$2y$10$pIdYixfgb5DWrUM.JaVSSuoIy.kg6ccPCf68XEaa5RcSrQr.z7hpa', 2),
(9, 'oscar', '$2y$10$FlRSrERh0XxQktIJXpv4tuKVUkyGlOJ5rFnJAc4jTtpDvbnTT3dO.', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `inscripciones_actividades`
--
ALTER TABLE `inscripciones_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_apoyo`
--
ALTER TABLE `solicitud_apoyo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscripciones_actividades`
--
ALTER TABLE `inscripciones_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitud_apoyo`
--
ALTER TABLE `solicitud_apoyo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `solicitud_apoyo`
--
ALTER TABLE `solicitud_apoyo`
  ADD CONSTRAINT `solicitud_apoyo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
