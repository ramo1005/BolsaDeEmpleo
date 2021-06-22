-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 02:06:28
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empleos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--
CREATE DATABASE empleos;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `limitJobs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`, `created`, `limitJobs`) VALUES
(1, 'root', '$2y$10$BH9xnPfhoIbKvAk8sy1JE.EyJnjcA/r7FpIOqypQKlVrwVTIIGQBW', '2021-06-04 23:33:11', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleador`
--

CREATE TABLE `empleador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `compañia` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `api_token` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleo`
--

CREATE TABLE `empleo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `compañia` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(50) NOT NULL,
  `id_empleador` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp(),
  `modificado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacion`
--

CREATE TABLE `postulacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `curriculum` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idEmpleador` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_nombre` (`nombre`);

--
-- Indices de la tabla `empleador`
--
ALTER TABLE `empleador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `unique_user` (`user`);

--
-- Indices de la tabla `empleo`
--
ALTER TABLE `empleo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_categoria` (`categoria`),
  ADD KEY `FK_empleo_empleador` (`id_empleador`);

--
-- Indices de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_postulacion_empleo` (`jobId`),
  ADD KEY `FK_postulacion_empleador` (`idEmpleador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleador`
--
ALTER TABLE `empleador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleo`
--
ALTER TABLE `empleo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleo`
--
ALTER TABLE `empleo`
  ADD CONSTRAINT `FK_empleo_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`nombre`),
  ADD CONSTRAINT `FK_empleo_empleador` FOREIGN KEY (`id_empleador`) REFERENCES `empleador` (`id`);

--
-- Filtros para la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD CONSTRAINT `FK_postulacion_empleador` FOREIGN KEY (`idEmpleador`) REFERENCES `empleador` (`id`),
  ADD CONSTRAINT `FK_postulacion_empleo` FOREIGN KEY (`jobId`) REFERENCES `empleo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
