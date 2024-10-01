-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2024 a las 04:26:10
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_estado_programacion` ()   BEGIN
    DECLARE vehiculo_id_val INT;
    DECLARE km_total_viajes INT;
    DECLARE km_programacion INT;
    DECLARE porcentaje_km DECIMAL(5,2);
    DECLARE estado_programacion VARCHAR(20);
    DECLARE done INT DEFAULT FALSE; -- Variable para controlar el bucle

    -- Cursor para recorrer los vehículos
    DECLARE cur CURSOR FOR 
        SELECT vv.idVehiculo
        FROM viajes_vehiculo vv
        GROUP BY vv.idVehiculo;

    -- Variables para manejar errores
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    OPEN cur;
    read_loop: LOOP
        FETCH cur INTO vehiculo_id_val;
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Calcular el total de kilómetros recorridos por el vehículo en todos los viajes
        SET km_total_viajes = (SELECT SUM(v.KmLlegada - v.KmSalida)
                               FROM viajes v
                               INNER JOIN viajes_vehiculo vv ON v.id = vv.idViaje
                               WHERE vv.idVehiculo = vehiculo_id_val);

        -- Obtener el total de kilómetros programados para el vehículo
        SET km_programacion = (SELECT km FROM programacion WHERE idVehiculo = vehiculo_id_val);

        -- Calcular el porcentaje de kilómetros recorridos en comparación con la programación
        SET porcentaje_km = (km_total_viajes / km_programacion) * 100;

        -- Determinar estado de la programación
        IF porcentaje_km > 100 THEN
            SET estado_programacion = 'Mantenimiento atrasado';
        ELSEIF porcentaje_km <= 100  AND porcentaje_km > 80 THEN
            SET estado_programacion = 'Alerta';
        ELSEIF porcentaje_km <= 80 AND porcentaje_km > 20 THEN
            SET estado_programacion = 'Próximo a mantenimiento';
        ELSE
            SET estado_programacion = 'Buen estado';
        END IF;

        -- Actualizar estado en la tabla programacion para el vehículo actual
        UPDATE programacion SET Estado = estado_programacion WHERE idVehiculo = vehiculo_id_val;
    END LOOP;

    CLOSE cur;
END$$

DELIMITER ;

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
(5, 'RICARDO JOSUE', 'VACA MINO', '+593985527102', '1801869321', 'C1', '2024-03-30', 'Unidad Nacional Y Agustin Ruales'),
(6, 'Carltos ', 'Pintag', '099873445', '1803971371', 'EI', '2024-04-03', 'Quito'),
(7, 'Marcelo', 'Volvo', '026855655', '0092939323', 'C1', '2024-04-02', 'Quito'),
(8, 'RICARDO ', 'Moncayo', '0985527102', '16022559988', 'C1', '2024-03-25', 'Unidad Nacional Y Agustin Ruales'),
(9, 'Marco Vinicio', 'Vaca Sanchez', '03288434', '19034324324', 'D1', '2024-04-05', 'Puyo'),
(12, 'Oswaldo', 'Martinez', '0985527102', '1234567891', 'A1', '2024-04-05', 'Unidad Nacional Y Agustin Ruales'),
(13, 'Eduardo', 'Jacome', '0589332555', '1225896315', 'E', '2024-04-05', 'Ignacio Herrera'),
(14, 'Luis', 'Verdozo', '12259966323', '1600055233', 'D', '2024-04-25', 'Unidad Nacional Y Agustin Ruales'),
(15, 'Jose', 'Choloquiga', '089922158', '19952009995', 'E', '2024-09-04', 'Latacunga');

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
  `nota` varchar(500) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`id`, `fecha`, `nombreMantenimiento`, `repuesto`, `idVehiculo`, `km`, `hora`, `dia`, `mes`, `anio`, `nota`, `estado`) VALUES
(1, '', 'Mantenimiento Llantas', 'Llantas 156', 1, 100, 0, 0, 0, 0, '0', 'Próximo a mantenimie'),
(5, '02-03-2024', 'Mantenimiento preventivo', 'llantas 56', 5, 50000, 0, 0, 0, 0, 'none', 'Buen estado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion_repuestos`
--

CREATE TABLE `programacion_repuestos` (
  `idProgramacion` int(11) NOT NULL,
  `idRepuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programacion_repuestos`
--

INSERT INTO `programacion_repuestos` (`idProgramacion`, `idRepuesto`) VALUES
(1, 6),
(5, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaReporte` timestamp NOT NULL DEFAULT current_timestamp(),
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
(18, 'aceite145', '2024-03-30 18:11:13'),
(19, 'calefaccion', '2024-03-31 23:23:40'),
(20, 'ACEITE', '2024-03-31 23:27:20');

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
(1, 'PCA-5223', 'CABEZAL', '8.25', 'TRAILER', 'AZUL', 2012, 'INTERNATIONAL', '3H5CRT566HY67JY67H', '79505271'),
(2, 'AAAA-2569', 'CABEZAL', '20.0', 'TRAILER', 'GRIS', 2024, 'Mercedes Benz', '235999995958', 'R51R8FDS84'),
(3, 'SAD-2596', 'CABEZAL', '21', 'TRAILER', 'BLANCO', 2025, 'INTERNATIONAL', 'SD89SDV54SDF9', ' 9840126198492'),
(4, 'SAD-2596', 'CABEZAL', '21', 'TRAILER', 'BLANCO', 2025, 'INTERNATIONAL', 'SD89SDV54SDF9', ' 9840126198492'),
(5, 'QAA-1964', 'TRACTOCAMION', '57', 'TRAILER', 'PLOMO', 2015, 'MERCEDEZ BENZ', '88498SFWEFW', ' SFD8465S1DF1');

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
  `ordenTrabajo` varchar(100) DEFAULT NULL,
  `nota` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `fechaInicio`, `fechaFin`, `lugarPartida`, `lugarDestino`, `KmSalida`, `KmLlegada`, `ordenTrabajo`, `nota`) VALUES
(1, '02-02-2024', '03-03-2024', 'Coca', 'Quito', 1000, 1100, '2569853', ''),
(2, '30-03-2024', '01-04-2024', 'Quito', 'Guayaquil', 58000, 58060, '64191020', 'none');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes_conductor`
--

CREATE TABLE `viajes_conductor` (
  `idViaje` int(11) NOT NULL,
  `idConductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes_conductor`
--

INSERT INTO `viajes_conductor` (`idViaje`, `idConductor`) VALUES
(1, 1),
(2, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes_vehiculo`
--

CREATE TABLE `viajes_vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes_vehiculo`
--

INSERT INTO `viajes_vehiculo` (`idVehiculo`, `idViaje`) VALUES
(1, 1),
(3, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `programacion`
--
ALTER TABLE `programacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
