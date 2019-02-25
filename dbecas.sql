-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2019 a las 03:17:40
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
CREATE DATABASE IF NOT EXISTS `dbecas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbecas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas`
--

CREATE TABLE `becas` (
  `id_becas` int(11) NOT NULL,
  `id_detalle` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  `periodo_pago` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ini_beca` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `becas`
--

INSERT INTO `becas` (`id_becas`, `id_detalle`, `id_patrocinador`, `periodo_pago`, `fecha_ini_beca`) VALUES
(1, 1, 1, 'por mes', '15-07-2018'),
(2, 2, 2, '2', '13/09/2018'),
(3, 2, 2, 'menstrual', '18/09/1998');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id_caso` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id_caso`, `descripcion`, `fecha`, `id_cita`) VALUES
(1, 'dfghjhgfd', '23/08/2018', 2),
(2, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(3, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(4, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(5, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(6, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(7, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(8, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(14, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(15, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(16, 'Estimado el caso es el siguiente', '18/09/2018', 2),
(17, 'brytuvuyg', '18/09/2018', 6),
(18, 'hhhhhjhjjhjj', '18/09/2018', 2),
(19, 'sdfghjjuhvfccvgbjj', '19/09/2018', 2),
(20, 'dcftgvbhbuhnj', '19/09/2018', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

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

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`, `id_detalle`) VALUES
(2, 'Cita', 'Casa de alexia', '#FF0000', '#FFFFFF', '2018-08-12 ', '2018-08-12 ', 1),
(3, 'Visita casa de alexia', 'Visitar', '#FF0000', '#FFFFFF', '2018-09-16 ', '2018-09-16 ', 1),
(4, 'tes', '', '#FF0000', '#FFFFFF', '2018-09-14 -10:90', '2018-09-14 -10:90', 1),
(5, 'Vista', 'Visita', '#FF0000', '#FFFFFF', '2018-09-19 10:50', '2018-09-19 10:50', 1),
(6, 'dasdasd', 'dasdasdasd', '#FF0000', '#FFFFFF', '2018-09-07 00:00', '2018-09-07 00:00', 2),
(7, 'visita casa araña', 'dssdsd', '#FF0000', '#FFFFFF', '2018-09-08 12:00', '2018-09-08 12:00', 1),
(8, 'Visita casa Alexia', 'wxctyghun', '#FF0000', '#FFFFFF', '2018-09-15 12:00', '2018-09-15 12:00', 2),
(9, 'Visitar casa de Fernando', 'fgddfdf', '#FF0000', '#FFFFFF', '2018-10-20 18:25', '2018-10-20 18:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(350) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `id_becas` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `fecha`, `id_becas`, `id_patrocinador`, `id_usuario`) VALUES
(1, 'HOLAAA', '', 1, 1, 3),
(3, 'HOLA', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

CREATE TABLE `detalle_solicitud` (
  `id_detalle` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_solicitud`
--

INSERT INTO `detalle_solicitud` (`id_detalle`, `id_estado`, `id_solicitud`) VALUES
(1, 1, 7),
(2, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_solicitud`
--

CREATE TABLE `estado_solicitud` (
  `id_estado` int(11) NOT NULL,
  `estado_solicitud` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_solicitud`
--

INSERT INTO `estado_solicitud` (`id_estado`, `estado_solicitud`) VALUES
(1, 'Aprobada'),
(2, 'En proceso'),
(3, 'Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

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
  `especialidad` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_contraseña` datetime NOT NULL,
  `intentos` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `estado_sesion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `usuario`, `contraseña`, `n_carnet`, `grado`, `especialidad`, `fecha_contraseña`, `intentos`, `estado`, `estado_sesion`) VALUES
(1, 'Fernando', 'Xavier', 'Maldonado', 'Canjura', 'XaviCaM', '$2y$10$1rNNw4FhsQNHoEoQoYYcHeExzSETIFcycrZased6D18XzOf6xX4.2', 20160250, '3° Año', 'Desarrollo de Software', '2019-02-24 15:35:09', 0, 0, 0),
(3, 'Fatima', 'Mercedez', 'Aguilar', 'Aguirre', 'fatimaaguilar', '$2y$10$sXs98Y1Xnx/IDhPjmvAXsOpSNZJQ5FaKA5RQzR2kyMjrlNrZ9M2sq', 20160296, '3° Año', 'Software', '0000-00-00 00:00:00', 0, 0, 0),
(4, 'Gabriel', 'Fernando', 'Murcia', 'Salazar', 'gabrielsalazar', '$2y$10$jXF1hX39tGGR/EU5UOuObu6A7OK5KaFcHuNP/AtpcXEn/1RZZm0fu', 20160134, '3 Año', 'Software', '0000-00-00 00:00:00', 0, 0, 0),
(6, 'Alexandra', 'Marina', 'Castillo', 'Mendez', 'alexandra', '$2y$10$jYj8TlYc9pjqohBZ2AA02.QWY6WgcVplyK7y2eTFS6qoiDA8bcc/O', 23456793, '3 año', 'Ninguna', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares_estudiante`
--

CREATE TABLE `familiares_estudiante` (
  `id_fam_estudiante` int(11) NOT NULL,
  `depende` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuota` double(6,2) DEFAULT NULL,
  `id_integrante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `familiares_estudiante`
--

INSERT INTO `familiares_estudiante` (`id_fam_estudiante`, `depende`, `grado`, `institucion`, `cuota`, `id_integrante`) VALUES
(0, 'no', 'rtyuk', 'ghn ', 20.00, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_mensuales`
--

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

--
-- Volcado de datos para la tabla `gastos_mensuales`
--

INSERT INTO `gastos_mensuales` (`id_gastos`, `alimentacion`, `pago_vivienda`, `energia_electrica`, `agua`, `telefono`, `vigilancia`, `servicio_domestico`, `alcadia`, `pago_deudas`, `cotizacion`, `seguro_personal`, `seguro_vehiculo`, `seguro_inmuebles`, `transporte`, `gastos_man_vehiculo`, `salud`, `pagos_asociasiones`, `pago_colegiatura`, `pago_universidad`, `gastos_material_estudios`, `impuesto_renta`, `iva`, `tarjeta_credito`, `otros`) VALUES
(1, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00),
(2, 9999.99, 9999.99, 9999.99, 9999.99, 9999.99, NULL, NULL, 9999.99, NULL, 9999.99, NULL, NULL, NULL, 9999.99, NULL, 9999.99, NULL, 9999.99, NULL, 9999.99, 9999.99, 9999.99, NULL, NULL),
(3, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00),
(4, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00),
(5, 1.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00),
(6, 1.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00),
(7, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

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

CREATE TABLE `grupo_familiar` (
  `id_familia` int(11) NOT NULL,
  `ingreso_familiar` double(6,2) NOT NULL,
  `id_gastos` int(11) NOT NULL,
  `total_gastos` double(6,2) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `monto_deuda` double(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo_familiar`
--

INSERT INTO `grupo_familiar` (`id_familia`, `ingreso_familiar`, `id_gastos`, `total_gastos`, `id_solicitud`, `monto_deuda`) VALUES
(1, 800.00, 1, 600.00, 7, 15.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_casos`
--

CREATE TABLE `imagenes_casos` (
  `id_img_caso` int(11) NOT NULL,
  `imagen_caso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_propiedad`
--

CREATE TABLE `imagenes_propiedad` (
  `id_img_propiedad` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_propiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes_propiedad`
--

INSERT INTO `imagenes_propiedad` (`id_img_propiedad`, `imagen`, `id_propiedad`) VALUES
(1, '5b99345db2003.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_proveniente`
--

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
(15, 'La UES', 'San Salvador', 100.00, 'Segundo año'),
(16, 'Don Bosco', 'San Salvador', 10.00, 'Segundo año'),
(17, 'Matias', 'San Salvador, El Salvador', 10.00, 'Segundo año'),
(93, 'christofer goodman', 'das', 0.00, 'Noveno grado'),
(94, 'wertyu', 'ghjkl, fghjk', 0.00, 'Noveno grado'),
(95, 'wertyu', 'ghjkl, fghjk', 0.00, 'Noveno grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante_familia`
--

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

--
-- Volcado de datos para la tabla `integrante_familia`
--

INSERT INTO `integrante_familia` (`id_integrante`, `nombres`, `apellidos`, `parentesco`, `fecha_nacimiento`, `profesion_ocupacion`, `lugar_trabajo`, `tel_trabajo`, `salario`, `id_solicitud`) VALUES
(1, 'dddddd', 'dddddd', 'dddd', '20/04/2000', 'ddd', NULL, NULL, NULL, 7),
(2, 'Xavier', 'Maldonado', 'Primo', '2018/05/01', 'Estudiante', NULL, NULL, NULL, 7),
(11, 'Fernando', 'Maldonado', 'Tio', '2018/05/01', 'Estudiante', NULL, NULL, NULL, 7),
(12, 'christofer', 'goodman', 'ddd', '2018/05/01', 'dsdsd', NULL, NULL, NULL, 7),
(13, 'rtyui', 'rtyui', 'tyui', '04/09/2018', 'ertyui', 'ertyui', 12345678, 600.00, 8),
(14, 'ryu', 'rtyui', 'tyuio', '07/09/2018', 'xcvbnm', NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intermedia_propiedad`
--

CREATE TABLE `intermedia_propiedad` (
  `id_inter` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_propiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `intermedia_propiedad`
--

INSERT INTO `intermedia_propiedad` (`id_inter`, `id_integrante`, `id_propiedad`) VALUES
(1, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_recibo` int(11) NOT NULL,
  `fecha_emi_recibo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  `monto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_entregado` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_recibo`, `fecha_emi_recibo`, `id_patrocinador`, `monto`, `fecha_entregado`) VALUES
(1, '18/09/2018', 1, '300', '18/09/2018'),
(2, '06/09/2018', 1, '700', '13/09/2018'),
(3, '18/09/2018', 1, 'hola', '17/09/2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinadores`
--

CREATE TABLE `patrocinadores` (
  `id_patrocinador` int(11) NOT NULL,
  `id_tipo_patro` int(11) NOT NULL,
  `profesion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_empresa` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `patrocinadores`
--

INSERT INTO `patrocinadores` (`id_patrocinador`, `id_tipo_patro`, `profesion`, `cargo`, `nombre_empresa`, `direccion`, `telefono`, `correo`, `nombres`, `apellidos`) VALUES
(1, 1, 'Ingeniero Civil', 'Administrador', 'Omnisport', 'San Salvador', 42124356, 'jonathan@gmail.com', 'Jonathan', 'Olmedo'),
(2, 2, 'Economista', 'Administrador', 'Mercacel', 'Santa Tecla', 1234567, 'robertadario@gmail.com', 'Roberta', 'Darío'),
(4, 2, 'Diseñadora', 'Diseñadora', 'DRAFT', 'Mejicanos', 1234, 'emily@gmail.com', 'Emily', 'Rivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `periodo` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id_periodo`, `periodo`) VALUES
(1, '1° Periodo'),
(2, '2° Periodo'),
(3, '3° Periodo'),
(4, '4° Periodo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `tipo_propiedad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cuota_mensual` double(6,2) DEFAULT NULL,
  `valor_casa` double(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_propiedad`, `tipo_propiedad`, `cuota_mensual`, `valor_casa`) VALUES
(1, 'Propia', 20.00, NULL),
(2, 'Propia', NULL, 9999.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remesas_familiar`
--

CREATE TABLE `remesas_familiar` (
  `id_remesa` int(11) NOT NULL,
  `monto` double(6,2) NOT NULL,
  `periodo_recibido` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `benefactor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_familia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_casos`
--

CREATE TABLE `seguimiento_casos` (
  `id_seguimiento` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `descripcion` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `soluciones` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seguimiento_casos`
--

INSERT INTO `seguimiento_casos` (`id_seguimiento`, `id_periodo`, `descripcion`, `soluciones`, `id_caso`) VALUES
(1, 3, 'ofihfsfisd', 'kdbviudifvbfdujfl', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

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
  `id_institucion_proveniente` int(11) NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombres_responsable` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_responsable` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `id_estudiante`, `id_genero`, `religion`, `encargado`, `direccion`, `correo`, `tel_fijo`, `cel_papa`, `cel_mama`, `cel_hijo`, `fecha_nacimiento`, `lugar_nacimiento`, `pais_nacimiento`, `estudios_finan`, `id_institucion_proveniente`, `fecha`, `nombres_responsable`, `apellidos_responsable`) VALUES
(7, 1, 1, 'ddd', 'Solo madre', 'ddd', 'dd@gmial.com', 11111111, NULL, NULL, NULL, '07/05/2018', 'ddd', 'dd', 'Sus padres', 17, '13/08/2018', '', ''),
(8, 3, 1, 'Ateo', 'Ambos padres', 'ertyuiop', 'feadssd@gmail.com', 12345678, NULL, NULL, 98765432, '10/09/2018', 'ddfghjk', 'tyui', 'Sus padres', 95, '12/09/2018', 'ertyuio', 'ertyu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_patrocinador`
--

CREATE TABLE `tipo_patrocinador` (
  `id_tipo_patro` int(11) NOT NULL,
  `tipo_patrocinador` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_patrocinador`
--

INSERT INTO `tipo_patrocinador` (`id_tipo_patro`, `tipo_patrocinador`) VALUES
(1, 'Empresa'),
(2, 'Independiente'),
(3, 'Fundación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo_usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Jefes'),
(3, 'Empresa/Indepen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `usuario` varchar(34) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(11) NOT NULL,
  `estado_sesion` int(11) NOT NULL,
  `fecha_contraseña` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_tipo`, `usuario`, `contraseña`, `correo`, `nombres`, `apellidos`, `intentos`, `estado_sesion`, `fecha_contraseña`, `estado`, `fecha_creacion`) VALUES
(1, 1, 'alexiarojas', '$2y$10$HeYFaBoXT8fKkU14xnLYr.4pKIJDwFNR48.DV0TDz0RqmdkkkFsb2', 'alereana.rojas@gmail.com', 'Alexia Beatriz', 'Rojas Figueroa', 0, 0, '2018-10-04 00:00:00', 0, '2018-09-19'),
(3, 2, 'jonathanolmedo', '$2y$10$ks5fjcJw/eyYrnqdUZ5mF.Wc3nPhTxhlhlZb8FYGvY6HVVrBv/5za', 'alereana.rojas@gmail.com', 'Jonathan Alexis', 'Olmedo Lopez', 0, 0, '2018-09-11 00:00:00', 0, '2018-09-19'),
(8, 3, 'Ernesto', '@Jonathan123.', 'ernesto@gmail.com', 'Ernesto', 'Rodriguez', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00'),
(10, 1, 'XaviCaM', '$2y$10$8JP5m0439mso/ySGmPK78ufnTVb4sQRLIgAAtL3fwRFaqF8B1f9Au', 'fernanxavi58@gmail.com', 'Xavier', 'Canjura', 0, 1, '2019-02-24 00:00:00', 0, '2019-02-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `tipo_vehiculo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `año` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `valor_actual` double(8,2) NOT NULL,
  `id_propiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `tipo_vehiculo`, `año`, `valor_actual`, `id_propiedad`) VALUES
(1, 'Sedan', '2015', 7500.00, 2);

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
  ADD KEY `id_patrocinador` (`id_patrocinador`),
  ADD KEY `id_becas` (`id_becas`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  ADD PRIMARY KEY (`id_fam_estudiante`);

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
-- Indices de la tabla `imagenes_propiedad`
--
ALTER TABLE `imagenes_propiedad`
  ADD PRIMARY KEY (`id_img_propiedad`),
  ADD KEY `id_propiedad` (`id_propiedad`);

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
  ADD KEY `id_integrante` (`id_integrante`) USING BTREE,
  ADD KEY `id_propiedad` (`id_propiedad`) USING BTREE;

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `id_patrocinador` (`id_patrocinador`);

--
-- Indices de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  ADD PRIMARY KEY (`id_patrocinador`),
  ADD KEY `id_tipo_patro` (`id_tipo_patro`) USING BTREE;

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`);

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
-- Indices de la tabla `seguimiento_casos`
--
ALTER TABLE `seguimiento_casos`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `id_caso` (`id_caso`),
  ADD KEY `seguimiento_casos_ibfk_2` (`id_periodo`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD UNIQUE KEY `id_institucion_proveniente` (`id_institucion_proveniente`),
  ADD UNIQUE KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_genero` (`id_genero`) USING BTREE;

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
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_propiedad` (`id_propiedad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id_becas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id_caso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_solicitud`
--
ALTER TABLE `estado_solicitud`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `familiares_estudiante`
--
ALTER TABLE `familiares_estudiante`
  MODIFY `id_fam_estudiante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gastos_mensuales`
--
ALTER TABLE `gastos_mensuales`
  MODIFY `id_gastos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  MODIFY `id_familia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `imagenes_propiedad`
--
ALTER TABLE `imagenes_propiedad`
  MODIFY `id_img_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `institucion_proveniente`
--
ALTER TABLE `institucion_proveniente`
  MODIFY `id_institucion_proveniente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `integrante_familia`
--
ALTER TABLE `integrante_familia`
  MODIFY `id_integrante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `intermedia_propiedad`
--
ALTER TABLE `intermedia_propiedad`
  MODIFY `id_inter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  MODIFY `id_patrocinador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT de la tabla `seguimiento_casos`
--
ALTER TABLE `seguimiento_casos`
  MODIFY `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_patrocinador`
--
ALTER TABLE `tipo_patrocinador`
  MODIFY `id_tipo_patro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_patrocinador`) REFERENCES `patrocinadores` (`id_patrocinador`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_becas`) REFERENCES `becas` (`id_becas`),
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD CONSTRAINT `detalle_solicitud_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado_solicitud` (`id_estado`),
  ADD CONSTRAINT `detalle_solicitud_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`);

--
-- Filtros para la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD CONSTRAINT `grupo_familiar_ibfk_1` FOREIGN KEY (`id_gastos`) REFERENCES `gastos_mensuales` (`id_gastos`),
  ADD CONSTRAINT `grupo_familiar_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`);

--
-- Filtros para la tabla `imagenes_propiedad`
--
ALTER TABLE `imagenes_propiedad`
  ADD CONSTRAINT `imagenes_propiedad_ibfk_1` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id_propiedad`);

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
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_patrocinador`) REFERENCES `patrocinadores` (`id_patrocinador`);

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
-- Filtros para la tabla `seguimiento_casos`
--
ALTER TABLE `seguimiento_casos`
  ADD CONSTRAINT `seguimiento_casos_ibfk_1` FOREIGN KEY (`id_caso`) REFERENCES `casos` (`id_caso`),
  ADD CONSTRAINT `seguimiento_casos_ibfk_2` FOREIGN KEY (`id_periodo`) REFERENCES `periodos` (`id_periodo`);

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

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_propiedad`) REFERENCES `propiedad` (`id_propiedad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
