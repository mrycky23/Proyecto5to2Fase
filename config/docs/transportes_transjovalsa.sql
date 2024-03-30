-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2024 a las 22:54:43
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
-- Base de datos: `transjovalsa2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `idAccesos` int(11) NOT NULL,
  `IdTipoAcceso` int(11) NOT NULL,
  `Ultimo` datetime NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `tipoLicencia` varchar(2) NOT NULL,
  `fechaExpLicencia` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id`, `nombre`, `apellido`, `telefono`, `cedula`, `tipoLicencia`, `fechaExpLicencia`, `direccion`) VALUES
(1, 'Juan', 'Maliza', '0999563258', '1600743174', 'E', '30-11-2024', 'Av. Los Arboles'),
(5, 'RICARDO JOSUE', 'VACA MINO', '+593985527102', '1801869321', 'C1', '2024-03-30', 'Unidad Nacional Y Agustin Ruales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE `programacion` (
  `id` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `nombreMantenimiento` varchar(256) NOT NULL,
  `repuesto` varchar(50) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `km` int(20) NOT NULL,
  `hora` int(20) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `nota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`id`, `fecha`, `nombreMantenimiento`, `repuesto`, `idVehiculo`, `km`, `hora`, `dia`, `mes`, `anio`, `nota`) VALUES
(1, '', 'Mantenimiento Llantas', 'Llantas 156', 1, 100, 0, 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion_repuestos`
--

CREATE TABLE `programacion_repuestos` (
  `idProgramacion` int(11) NOT NULL,
  `idRepuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaReporte` varchar(20) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  `idProgramacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id`, `nombre`, `fecha_creacion`) VALUES
(1, 'Aceite 3322', '2024-03-29 15:38:51'),
(6, 'Filtro de aire', '2024-03-29 20:50:27'),
(8, 'Aceite motor', '2024-03-29 20:52:19'),
(9, 'Aceite 123', '2024-03-29 22:10:42'),
(10, 'Aceite 269', '2024-03-29 22:12:13'),
(11, 'Pastillas', '2024-03-29 22:14:33'),
(12, 'llantas', '2024-03-29 22:25:47'),
(13, 'Cruceta', '2024-03-29 22:32:55'),
(14, 'Ventilacion', '2024-03-29 22:33:53'),
(15, 'Motor', '2024-03-29 22:36:34'),
(16, 'llantas r22', '2024-03-30 12:56:07'),
(17, 'aire acondicionado', '2024-03-30 17:20:58'),
(18, 'aceite145', '2024-03-30 18:11:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acceso`
--

CREATE TABLE `tipo_acceso` (
  `IdTipoAcceso` int(11) NOT NULL,
  `Detalle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `apellidoUsuario` varchar(30) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombreUsuario`, `apellidoUsuario`, `contrasenia`, `correo`) VALUES
(1, 'Fausto', 'Robledo', '123', 'F@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_roles`
--

CREATE TABLE `usuario_roles` (
  `idUsuarioRol` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_roles`
--

INSERT INTO `usuario_roles` (`idUsuarioRol`, `idUsuario`, `idRol`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `placa` varchar(9) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `tonelaje` varchar(5) NOT NULL,
  `clase` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `anio` int(4) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `chasis` varchar(100) NOT NULL,
  `motor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `placa`, `tipo`, `tonelaje`, `clase`, `color`, `anio`, `marca`, `chasis`, `motor`) VALUES
(1, 'PCA-5223', 'CABEZAL', '8.25', 'TRAILER', 'AZUL', 2012, 'INTERNATIONAL', '3H5CRT566HY67JY67H', '79505271');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_usuario`
--

CREATE TABLE `vehiculo_usuario` (
  `idVehiculo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `fechaInicio` varchar(30) NOT NULL,
  `fechaFin` varchar(30) NOT NULL,
  `lugarPartida` varchar(100) NOT NULL,
  `lugarDestino` varchar(100) NOT NULL,
  `KmSalida` int(11) NOT NULL,
  `KmLlegada` int(11) NOT NULL,
  `ordenTrabajo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes_conductor`
--

CREATE TABLE `viajes_conductor` (
  `idViaje` int(11) NOT NULL,
  `idConductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes_vehiculo`
--

CREATE TABLE `viajes_vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`idAccesos`),
  ADD KEY `fk_Accesos_Usuarios1_idx` (`Usuarios_idUsuarios`),
  ADD KEY `Acceso_tipoAcceso` (`IdTipoAcceso`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_programacion_vehiculo` (`idVehiculo`);

--
-- Indices de la tabla `programacion_repuestos`
--
ALTER TABLE `programacion_repuestos`
  ADD PRIMARY KEY (`idProgramacion`,`idRepuesto`),
  ADD KEY `fk_programacion_repuestos_repuestos` (`idRepuesto`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reportes_usuario` (`idUsuario`),
  ADD KEY `fk_reportes_vehiculo` (`idVehiculo`),
  ADD KEY `fk_reportes_programacion` (`idProgramacion`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  ADD PRIMARY KEY (`IdTipoAcceso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_roles`
--
ALTER TABLE `usuario_roles`
  ADD PRIMARY KEY (`idUsuarioRol`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`,`idRol`) USING BTREE,
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo_usuario`
--
ALTER TABLE `vehiculo_usuario`
  ADD PRIMARY KEY (`idVehiculo`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viajes_conductor`
--
ALTER TABLE `viajes_conductor`
  ADD PRIMARY KEY (`idViaje`,`idConductor`),
  ADD KEY `idConductor` (`idConductor`);

--
-- Indices de la tabla `viajes_vehiculo`
--
ALTER TABLE `viajes_vehiculo`
  ADD PRIMARY KEY (`idViaje`,`idVehiculo`),
  ADD KEY `idVehiculo` (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programacion`
--
ALTER TABLE `programacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  MODIFY `IdTipoAcceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_roles`
--
ALTER TABLE `usuario_roles`
  MODIFY `idUsuarioRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `Acceso_tipoAcceso` FOREIGN KEY (`IdTipoAcceso`) REFERENCES `tipo_acceso` (`IdTipoAcceso`),
  ADD CONSTRAINT `fk_Accesos_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD CONSTRAINT `fk_programacion_vehiculo` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `programacion_repuestos`
--
ALTER TABLE `programacion_repuestos`
  ADD CONSTRAINT `fk_programacion_repuestos_programacion` FOREIGN KEY (`idProgramacion`) REFERENCES `programacion` (`id`),
  ADD CONSTRAINT `fk_programacion_repuestos_repuestos` FOREIGN KEY (`idRepuesto`) REFERENCES `repuestos` (`id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `fk_reportes_programacion` FOREIGN KEY (`idProgramacion`) REFERENCES `programacion` (`id`),
  ADD CONSTRAINT `fk_reportes_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_reportes_vehiculo` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `usuario_roles`
--
ALTER TABLE `usuario_roles`
  ADD CONSTRAINT `usuario_roles_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_roles_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `vehiculo_usuario`
--
ALTER TABLE `vehiculo_usuario`
  ADD CONSTRAINT `vehiculo_usuario_ibfk_1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `vehiculo_usuario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `viajes_conductor`
--
ALTER TABLE `viajes_conductor`
  ADD CONSTRAINT `viajes_conductor_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`),
  ADD CONSTRAINT `viajes_conductor_ibfk_2` FOREIGN KEY (`idConductor`) REFERENCES `conductor` (`id`);

--
-- Filtros para la tabla `viajes_vehiculo`
--
ALTER TABLE `viajes_vehiculo`
  ADD CONSTRAINT `viajes_vehiculo_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`),
  ADD CONSTRAINT `viajes_vehiculo_ibfk_2` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
