-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2018 a las 03:19:59
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbecas`
--
CREATE DATABASE IF NOT EXISTS `dbecas` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `dbecas`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `alumnos_nombre`$$
CREATE DEFINER=`Expo_becas`@`localhost` PROCEDURE `alumnos_nombre` (`NombreAlumno` VARCHAR(20))  SELECT * 
FROM estudiantes 
WHERE primer_nombre = NombreAlumno || segundo_nombre = NombreAlumno$$

DROP PROCEDURE IF EXISTS `patrocinadores_nombre`$$
CREATE DEFINER=`Expo_becas`@`localhost` PROCEDURE `patrocinadores_nombre` (`NombrePatro` VARCHAR(20))  SELECT * 
FROM patrocinadores
WHERE nombres = NombrePatro$$

DROP PROCEDURE IF EXISTS `patrocinador_tipo`$$
CREATE DEFINER=`Expo_becas`@`localhost` PROCEDURE `patrocinador_tipo` (`tipo` VARCHAR(15))  SELECT nombres, apellidos, tipo_patrocinador, profesion, cargo, nombre_empresa, direccion, telefono
from patrocinadores, tipo_patrocinador
WHERE patrocinadores.id_tipo_patro = tipo_patrocinador.id_tipo_patro
AND tipo_patrocinador.tipo_patrocinador = tipo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas`
--

DROP TABLE IF EXISTS `becas`;
CREATE TABLE `becas` (
  `id_becas` int(11) NOT NULL,
  `id_detalle` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  `monto` double(6,2) NOT NULL,
  `periodo_pago` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ini_beca` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

DROP TABLE IF EXISTS `casos`;
CREATE TABLE `casos` (
  `id_caso` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `textColor` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `start` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_detalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(350) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `id_becas` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

DROP TABLE IF EXISTS `detalle_solicitud`;
CREATE TABLE `detalle_solicitud` (
  `id_detalle` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_solicitud`
--

DROP TABLE IF EXISTS `estado_solicitud`;
CREATE TABLE `estado_solicitud` (
  `id_estado` int(11) NOT NULL,
  `estado_solicitud` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `primer_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `n_carnet` int(8) NOT NULL,
  `grado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `usuario`, `contraseña`, `n_carnet`, `grado`, `especialidad`) VALUES
(1, 'Fernando', 'Xavier', 'Maldonado', 'Canjura', 'XaviCaM', '12345678', 20160250, '3° Año', 'Desarrollo de Software'),
(2, 'Emily', 'Vanessa', 'Rivas', 'Castillo', 'EmilyRivas', '12345678', 20170366, '2° Año', 'Diseño Grafico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares_estudiante`
--

DROP TABLE IF EXISTS `familiares_estudiante`;
CREATE TABLE `familiares_estudiante` (
  `id_fam_estudiante` int(11) NOT NULL,
  `depende` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuota` double(6,2) DEFAULT NULL,
  `id_integrante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_mensuales`
--

DROP TABLE IF EXISTS `gastos_mensuales`;
CREATE TABLE `gastos_mensuales` (
  `id_gastos` int(11) NOT NULL,
  `alimentacion` double(6,2) NOT NULL,
  `pago_vivienda` double(6,2) NOT NULL,
  `energia_electrica` double(6,2) NOT NULL,
  `agua` double(6,2) NOT NULL,
  `telefono` double(6,2) NOT NULL,
  `vigilancia` double(6,2) DEFAULT NULL,
  `servicio_domestico` double(6,2) DEFAULT NULL,
  `alcadia` double(6,2) NOT NULL,
  `pago_deudas` double(6,2) DEFAULT NULL,
  `cotizacion` double(6,2) NOT NULL,
  `seguro_personal` double(6,2) DEFAULT NULL,
  `seguro_vehiculo` double(6,2) DEFAULT NULL,
  `seguro_inmuebles` double(6,2) DEFAULT NULL,
  `transporte` double(6,2) NOT NULL,
  `gastos_man_vehiculo` double(6,2) DEFAULT NULL,
  `salud` double(6,2) NOT NULL,
  `pagos_asociasiones` double(6,2) DEFAULT NULL,
  `pago_colegiatura` double(6,2) NOT NULL,
  `pago_universidad` double(6,2) DEFAULT NULL,
  `gastos_material_estudios` double(6,2) NOT NULL,
  `impuesto_renta` double(6,2) NOT NULL,
  `iva` double(6,2) NOT NULL,
  `tarjeta_credito` double(6,2) DEFAULT NULL,
  `otros` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_familiar`
--

DROP TABLE IF EXISTS `grupo_familiar`;
CREATE TABLE `grupo_familiar` (
  `id_familia` int(11) NOT NULL,
  `ingreso_familiar` double(6,2) NOT NULL,
  `id_gastos` int(11) NOT NULL,
  `total_gastos` double(6,2) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `monto_deuda` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_casos`
--

DROP TABLE IF EXISTS `imagenes_casos`;
CREATE TABLE `imagenes_casos` (
  `id_img_caso` int(11) NOT NULL,
  `imagen_caso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_vehiculo`
--

DROP TABLE IF EXISTS `imagenes_vehiculo`;
CREATE TABLE `imagenes_vehiculo` (
  `id_img_vehiculo` int(11) NOT NULL,
  `imagen_vehiculo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_propiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_proveniente`
--

DROP TABLE IF EXISTS `institucion_proveniente`;
CREATE TABLE `institucion_proveniente` (
  `id_institucion_proveniente` int(11) NOT NULL,
  `nombre_institucion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_institucion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `cuota_pagada` double(6,2) NOT NULL,
  `año` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `institucion_proveniente`
--

INSERT INTO `institucion_proveniente` (`id_institucion_proveniente`, `nombre_institucion`, `lugar_institucion`, `cuota_pagada`, `año`) VALUES
(93, 'christofer goodman', 'das', 0.00, 'Noveno grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante_familia`
--

DROP TABLE IF EXISTS `integrante_familia`;
CREATE TABLE `integrante_familia` (
  `id_integrante` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `parentesco` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `profesion_ocupacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_trabajo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_trabajo` int(8) DEFAULT NULL,
  `salario` double(6,2) DEFAULT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intermedia_propiedad`
--

DROP TABLE IF EXISTS `intermedia_propiedad`;
CREATE TABLE `intermedia_propiedad` (
  `id_inter` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `id_recibo` int(11) NOT NULL,
  `fecha_emi_recibo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_becas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinadores`
--

DROP TABLE IF EXISTS `patrocinadores`;
CREATE TABLE `patrocinadores` (
  `id_patrocinador` int(11) NOT NULL,
  `id_tipo_patro` int(11) NOT NULL,
  `profesion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_empresa` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

DROP TABLE IF EXISTS `propiedad`;
CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `tipo_propiedad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cuota_mensual` double(6,2) DEFAULT NULL,
  `valor_casa` double(6,2) DEFAULT NULL,
  `tipo_vehiculo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `año_vehiculo` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor_vehiculo` double(6,2) DEFAULT NULL,
  `croquis` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_propiedad`, `tipo_propiedad`, `cuota_mensual`, `valor_casa`, `tipo_vehiculo`, `año_vehiculo`, `valor_vehiculo`, `croquis`) VALUES
(1, 'Propia', 20.00, NULL, 'Sedan', NULL, NULL, '5b0df68ba0bec.jpg'),
(2, 'Propia', 20.00, NULL, 'Sedan', NULL, NULL, '5b0df68ba0bec.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remesas_familiar`
--

DROP TABLE IF EXISTS `remesas_familiar`;
CREATE TABLE `remesas_familiar` (
  `id_remesa` int(11) NOT NULL,
  `monto` double(6,2) NOT NULL,
  `periodo_recibido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `benefactor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_familia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `religion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `encargado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tel_fijo` int(8) DEFAULT NULL,
  `cel_papa` int(8) DEFAULT NULL,
  `cel_mama` int(8) DEFAULT NULL,
  `cel_hijo` int(8) DEFAULT NULL,
  `fecha_nacimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_nacimiento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `pais_nacimiento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estudios_finan` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_institucion_proveniente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `id_estudiante`, `id_genero`, `religion`, `encargado`, `direccion`, `correo`, `tel_fijo`, `cel_papa`, `cel_mama`, `cel_hijo`, `fecha_nacimiento`, `lugar_nacimiento`, `pais_nacimiento`, `estudios_finan`, `id_institucion_proveniente`) VALUES
(43, 1, 1, 'ddd', 'Ambos padres', '84119', 'fernanxavi58@gmail.com', 19465732, NULL, NULL, NULL, '06/07/2018', 'dasd', 'Estados Unidos', 'Sus padres', 93);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_patrocinador`
--

DROP TABLE IF EXISTS `tipo_patrocinador`;
CREATE TABLE `tipo_patrocinador` (
  `id_tipo_patro` int(11) NOT NULL,
  `tipo_patrocinador` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo_usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo_usuario`) VALUES
(1, 'Admin'),
(2, 'Empresa'),
(3, 'Jefe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `usuario` varchar(34) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `id_tipo`, `usuario`, `contraseña`) VALUES
(1, 'Xavier', 'Canjura', 1, 'XaviCaM', '12345678'),
(2, 'The best', 'x2', 2, 'thebest', '12345678');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`id_becas`),
  ADD KEY `id_detalle` (`id_detalle`) USING BTREE,
  ADD KEY `id_patrocinador` (`id_patrocinador`) USING BTREE;

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id_caso`),
  ADD KEY `id_cita` (`id_cita`) USING BTREE;

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_detalle` (`id_detalle`) USING BTREE;

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_becas` (`id_becas`) USING BTREE,
  ADD KEY `id_patrocinador` (`id_patrocinador`);

--
-- Indices de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_solicitud` (`id_solicitud`) USING BTREE,
  ADD KEY `id_estado` (`id_estado`) USING BTREE;

--
-- Indices de la tabla `estado_solicitud`
--
ALTER TABLE `estado_solicitud`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `familiares_estudiante`
--
ALTER TABLE `familiares_estudiante`
  ADD PRIMARY KEY (`id_fam_estudiante`),
  ADD KEY `id_integrante` (`id_integrante`);

--
-- Indices de la tabla `gastos_mensuales`
--
ALTER TABLE `gastos_mensuales`
  ADD PRIMARY KEY (`id_gastos`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD PRIMARY KEY (`id_familia`),
  ADD KEY `id_solicitud` (`id_solicitud`) USING BTREE,
  ADD KEY `id_gastos` (`id_gastos`) USING BTREE;

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_caso` (`id_caso`);

--
-- Indices de la tabla `imagenes_casos`
--
ALTER TABLE `imagenes_casos`
  ADD PRIMARY KEY (`id_img_caso`),
  ADD KEY `id_caso` (`id_caso`) USING BTREE;

--
-- Indices de la tabla `imagenes_vehiculo`
--
ALTER TABLE `imagenes_vehiculo`
  ADD PRIMARY KEY (`id_img_vehiculo`),
  ADD KEY `id_propiedad` (`id_propiedad`) USING BTREE;

--
-- Indices de la tabla `institucion_proveniente`
--
ALTER TABLE `institucion_proveniente`
  ADD PRIMARY KEY (`id_institucion_proveniente`);

--
-- Indices de la tabla `integrante_familia`
--
ALTER TABLE `integrante_familia`
  ADD PRIMARY KEY (`id_integrante`),
  ADD KEY `id_solicitud` (`id_solicitud`) USING BTREE;

--
-- Indices de la tabla `intermedia_propiedad`
--
ALTER TABLE `intermedia_propiedad`
  ADD PRIMARY KEY (`id_inter`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`) USING BTREE,
  ADD KEY `id_propiedad` (`id_propiedad`) USING BTREE;

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `id_becas` (`id_becas`) USING BTREE;

--
-- Indices de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  ADD PRIMARY KEY (`id_patrocinador`),
  ADD KEY `id_tipo_patro` (`id_tipo_patro`) USING BTREE;

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_propiedad`);

--
-- Indices de la tabla `remesas_familiar`
--
ALTER TABLE `remesas_familiar`
  ADD PRIMARY KEY (`id_remesa`),
  ADD KEY `id_familia` (`id_familia`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD UNIQUE KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_genero` (`id_genero`) USING BTREE,
  ADD KEY `id_institucion_proveniente` (`id_institucion_proveniente`) USING BTREE;

--
-- Indices de la tabla `tipo_patrocinador`
--
ALTER TABLE `tipo_patrocinador`
  ADD PRIMARY KEY (`id_tipo_patro`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id_becas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id_caso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_solicitud`
--
ALTER TABLE `estado_solicitud`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `familiares_estudiante`
--
ALTER TABLE `familiares_estudiante`
  MODIFY `id_fam_estudiante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gastos_mensuales`
--
ALTER TABLE `gastos_mensuales`
  MODIFY `id_gastos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  MODIFY `id_familia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_casos`
--
ALTER TABLE `imagenes_casos`
  MODIFY `id_img_caso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_vehiculo`
--
ALTER TABLE `imagenes_vehiculo`
  MODIFY `id_img_vehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `institucion_proveniente`
--
ALTER TABLE `institucion_proveniente`
  MODIFY `id_institucion_proveniente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `integrante_familia`
--
ALTER TABLE `integrante_familia`
  MODIFY `id_integrante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intermedia_propiedad`
--
ALTER TABLE `intermedia_propiedad`
  MODIFY `id_inter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  MODIFY `id_patrocinador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `remesas_familiar`
--
ALTER TABLE `remesas_familiar`
  MODIFY `id_remesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `tipo_patrocinador`
--
ALTER TABLE `tipo_patrocinador`
  MODIFY `id_tipo_patro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `becas`
--
ALTER TABLE `becas`
  ADD CONSTRAINT `becas_ibfk_1` FOREIGN KEY (`id_detalle`) REFERENCES `detalle_solicitud` (`id_detalle`),
  ADD CONSTRAINT `becas_ibfk_2` FOREIGN KEY (`id_patrocinador`) REFERENCES `patrocinadores` (`id_patrocinador`);

--
-- Filtros para la tabla `casos`
--
ALTER TABLE `casos`
  ADD CONSTRAINT `casos_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_detalle`) REFERENCES `detalle_solicitud` (`id_detalle`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_becas`) REFERENCES `becas` (`id_becas`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_patrocinador`) REFERENCES `patrocinadores` (`id_patrocinador`);

--
-- Filtros para la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD CONSTRAINT `detalle_solicitud_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_solicitud` (`id_estado`),
  ADD CONSTRAINT `detalle_solicitud_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`);

--
-- Filtros para la tabla `familiares_estudiante`
--
ALTER TABLE `familiares_estudiante`
  ADD CONSTRAINT `familiares_estudiante_ibfk_1` FOREIGN KEY (`id_integrante`) REFERENCES `integrante_familia` (`id_integrante`);

--
-- Filtros para la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD CONSTRAINT `grupo_familiar_ibfk_1` FOREIGN KEY (`id_gastos`) REFERENCES `gastos_mensuales` (`id_gastos`),
  ADD CONSTRAINT `grupo_familiar_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_caso`) REFERENCES `casos` (`id_caso`);

--
-- Filtros para la tabla `imagenes_casos`
--
ALTER TABLE `imagenes_casos`
  ADD CONSTRAINT `imagenes_casos_ibfk_1` FOREIGN KEY (`id_caso`) REFERENCES `casos` (`id_caso`);

--
-- Filtros para la tabla `imagenes_vehiculo`
--
ALTER TABLE `imagenes_vehiculo`
  ADD CONSTRAINT `imagenes_vehiculo_ibfk_1` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id_propiedad`);

--
-- Filtros para la tabla `integrante_familia`
--
ALTER TABLE `integrante_familia`
  ADD CONSTRAINT `integrante_familia_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`);

--
-- Filtros para la tabla `intermedia_propiedad`
--
ALTER TABLE `intermedia_propiedad`
  ADD CONSTRAINT `intermedia_propiedad_ibfk_1` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id_propiedad`),
  ADD CONSTRAINT `intermedia_propiedad_ibfk_2` FOREIGN KEY (`id_integrante`) REFERENCES `integrante_familia` (`id_integrante`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_becas`) REFERENCES `becas` (`id_becas`);

--
-- Filtros para la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  ADD CONSTRAINT `patrocinadores_ibfk_1` FOREIGN KEY (`id_tipo_patro`) REFERENCES `tipo_patrocinador` (`id_tipo_patro`);

--
-- Filtros para la tabla `remesas_familiar`
--
ALTER TABLE `remesas_familiar`
  ADD CONSTRAINT `remesas_familiar_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `grupo_familiar` (`id_familia`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`id_institucion_proveniente`) REFERENCES `institucion_proveniente` (`id_institucion_proveniente`),
  ADD CONSTRAINT `solicitud_ibfk_3` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
