-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-07-2017 a las 00:53:38
-- Versión del servidor: 10.0.31-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `famcnetc_intersoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CALENDARIO`
--

CREATE TABLE `CALENDARIO` (
  `Id_calendario` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Fecha_inicio` date NOT NULL,
  `Hora_inicio` time DEFAULT NULL,
  `Fecha_final` date NOT NULL,
  `Hora_final` time DEFAULT NULL,
  `Lugar` varchar(700) DEFAULT NULL,
  `Descripcion` varchar(700) NOT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Notificacion` int(11) DEFAULT NULL,
  `Valor` float DEFAULT NULL,
  `Fecha_creacion` date NOT NULL,
  `Periocidad` varchar(45) DEFAULT NULL,
  `Id_usuario_creador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CIUDAD`
--

CREATE TABLE `CIUDAD` (
  `Id_ciudad` int(11) NOT NULL,
  `Codigo_ciudad` varchar(45) NOT NULL,
  `Nombre` varchar(700) NOT NULL,
  `Id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEPARTAMENTO`
--

CREATE TABLE `DEPARTAMENTO` (
  `Id_departamento` int(11) NOT NULL,
  `Codigo_departamento` varchar(45) NOT NULL,
  `Nombre` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `DEPARTAMENTO`
--

INSERT INTO `DEPARTAMENTO` (`Id_departamento`, `Codigo_departamento`, `Nombre`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DIRECTORIO`
--

CREATE TABLE `DIRECTORIO` (
  `Id_directorio` int(11) NOT NULL,
  `Nit` varchar(45) NOT NULL,
  `Digito` int(11) DEFAULT NULL,
  `Razon_social` varchar(700) NOT NULL,
  `Direccion` varchar(700) DEFAULT NULL,
  `Correo_electronico` varchar(700) DEFAULT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Telefono1` varchar(45) DEFAULT NULL,
  `Telefono2` varchar(45) DEFAULT NULL,
  `Financiancion` float DEFAULT NULL,
  `Descuento` float DEFAULT NULL,
  `Cupo_financiero` float DEFAULT NULL,
  `Rete_ica` float DEFAULT NULL,
  `Porcentaje_ret_iva` float DEFAULT NULL,
  `Actividad_economica` varchar(45) DEFAULT NULL,
  `Calificacion` varchar(45) DEFAULT NULL,
  `Nivel` varchar(45) DEFAULT NULL,
  `Zona_venta` varchar(45) DEFAULT NULL,
  `Transporte` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `Id_retefuente` int(11) NOT NULL,
  `Id_ciudad` int(11) NOT NULL,
  `Id_regimen` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_directorio_tipo` int(11) NOT NULL,
  `Id_directorio_clase` int(11) NOT NULL,
  `Id_directorio_tipo_tercero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DIRECTORIO_CLASE`
--

CREATE TABLE `DIRECTORIO_CLASE` (
  `Id_directorio_clase` int(11) NOT NULL,
  `Nombre_directorio_clase` varchar(700) NOT NULL,
  `Descripcion` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DIRECTORIO_DIRECCION_SECUNDARIA`
--

CREATE TABLE `DIRECTORIO_DIRECCION_SECUNDARIA` (
  `Id_direccion_sucursal` int(11) NOT NULL,
  `Direccion` varchar(700) DEFAULT NULL,
  `Zona_venta` varchar(700) DEFAULT NULL,
  `Vendedor` int(11) NOT NULL,
  `Id_directorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DIRECTORIO_TIPO`
--

CREATE TABLE `DIRECTORIO_TIPO` (
  `Id_directorio_tipo` int(11) NOT NULL,
  `Nombre_directorio_tipo` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DIRECTORIO_TIPO_TERCERO`
--

CREATE TABLE `DIRECTORIO_TIPO_TERCERO` (
  `Id_directorio_tipo_tercero` int(11) NOT NULL COMMENT 'mayorista - minorista-etc',
  `Nombre` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DOCUMENTO`
--

CREATE TABLE `DOCUMENTO` (
  `Id_documento` int(11) NOT NULL,
  `Prefijo` varchar(45) DEFAULT NULL,
  `Numero_documento` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `Fletes` float DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `Rete_ica` float DEFAULT NULL,
  `Descuento` float DEFAULT NULL,
  `Rete_fuente` float DEFAULT NULL,
  `Rete_iva` float DEFAULT NULL,
  `Impo_consumo` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Usuario_creador` int(11) DEFAULT NULL,
  `Id_tercero_afectado` int(11) DEFAULT NULL,
  `Id_tipo_documento` int(11) NOT NULL,
  `Id_sucursal` int(11) NOT NULL,
  `Id_empresa` int(11) NOT NULL,
  `Id_directorio` int(11) NOT NULL,
  `Id_forma_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EMPRESA`
--

CREATE TABLE `EMPRESA` (
  `Id_empresa` int(11) NOT NULL,
  `Razon_social` varchar(700) NOT NULL,
  `Direccion` varchar(700) DEFAULT NULL,
  `Actividad` varchar(45) DEFAULT NULL,
  `Dian_nit` varchar(45) DEFAULT NULL,
  `Nit_empresa` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Telefono1` varchar(45) DEFAULT NULL,
  `Telefono2` varchar(45) DEFAULT NULL,
  `Id_ciudad` int(11) NOT NULL,
  `Id_regimen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FORMA_PAGO`
--

CREATE TABLE `FORMA_PAGO` (
  `Id_forma_pago` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Dias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INVITADOS`
--

CREATE TABLE `INVITADOS` (
  `Id_invitados` int(11) NOT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Id_calendario` int(11) NOT NULL,
  `Id_directorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LINEA`
--

CREATE TABLE `LINEA` (
  `Id_linea` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LOTES`
--

CREATE TABLE `LOTES` (
  `Id_lote` int(11) NOT NULL,
  `Lote` varchar(45) NOT NULL,
  `Vencimiento` date NOT NULL,
  `Saldo` float NOT NULL,
  `Id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MARCA`
--

CREATE TABLE `MARCA` (
  `Id_marca` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCTO`
--

CREATE TABLE `PRODUCTO` (
  `Id_producto` int(11) NOT NULL,
  `Referencia` varchar(45) NOT NULL,
  `Codigo_barras` varchar(700) DEFAULT NULL,
  `Presentacion` varchar(45) DEFAULT NULL,
  `Factor_rendimiento` float DEFAULT NULL,
  `Stock_maximo` float NOT NULL,
  `Stock_minimo` float NOT NULL,
  `Iva` float NOT NULL,
  `Impuesto_consumo` float DEFAULT NULL,
  `Descuento` float DEFAULT NULL,
  `Id_clasificacion` int(11) NOT NULL,
  `Peso_kilo` float DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `Saldo` float NOT NULL,
  `Costo` float NOT NULL,
  `Homologo` int(11) DEFAULT NULL,
  `Fecha_creacion` date DEFAULT NULL,
  `Id_marca` int(11) NOT NULL,
  `Id_linea` int(11) NOT NULL,
  `Id_sucursal` int(11) NOT NULL,
  `Id_empresa` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REGIMEN`
--

CREATE TABLE `REGIMEN` (
  `Id_regimen` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESOLUCION`
--

CREATE TABLE `RESOLUCION` (
  `Id_resolucion` int(11) NOT NULL,
  `Fecha` varchar(45) NOT NULL,
  `Numero` varchar(45) NOT NULL,
  `Rango` varchar(45) NOT NULL,
  `Id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RETEFUENTE`
--

CREATE TABLE `RETEFUENTE` (
  `Id_retefuente` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Valor` float NOT NULL,
  `Descripcion` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SUCURSAL`
--

CREATE TABLE `SUCURSAL` (
  `Id_sucursal` int(11) NOT NULL,
  `Nombre` varchar(700) NOT NULL,
  `Codigo` varchar(45) NOT NULL,
  `Id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_E_INVENTARIO`
--

CREATE TABLE `S_E_INVENTARIO` (
  `id_salida` int(11) NOT NULL,
  `Cantidad` float NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `Valor_unidad` float NOT NULL,
  `Valor_total` float NOT NULL,
  `Lote` varchar(45) DEFAULT NULL,
  `Descuento` float DEFAULT NULL,
  `Iva` float DEFAULT NULL,
  `Id_producto` int(11) NOT NULL,
  `Id_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_DOCUMENTO`
--

CREATE TABLE `TIPO_DOCUMENTO` (
  `Id_tipo_documento` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Signo` varchar(45) NOT NULL,
  `Nomenclatura` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `Id_usuario` int(11) NOT NULL,
  `ncedula` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Cargo` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Password` varchar(45) NOT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`Id_usuario`, `ncedula`, `Nombre`, `Apellido`, `Cargo`, `Telefono`, `Password`, `Correo`, `Estado`) VALUES
(1, '1234', 'admin', 'admin', 'administrador', '3219045297', '123', 'fredymoreno@uan.edu.co', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CALENDARIO`
--
ALTER TABLE `CALENDARIO`
  ADD PRIMARY KEY (`Id_calendario`,`Id_usuario_creador`),
  ADD KEY `fk_CALENDARIO_USUARIO1_idx` (`Id_usuario_creador`);

--
-- Indices de la tabla `CIUDAD`
--
ALTER TABLE `CIUDAD`
  ADD PRIMARY KEY (`Id_ciudad`,`Id_departamento`),
  ADD KEY `fk_CIUDAD_DEPARTAMENTO2_idx` (`Id_departamento`);

--
-- Indices de la tabla `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  ADD PRIMARY KEY (`Id_departamento`);

--
-- Indices de la tabla `DIRECTORIO`
--
ALTER TABLE `DIRECTORIO`
  ADD PRIMARY KEY (`Id_directorio`,`Id_retefuente`,`Id_ciudad`,`Id_regimen`,`Id_usuario`,`Id_directorio_tipo`,`Id_directorio_clase`,`Id_directorio_tipo_tercero`),
  ADD KEY `fk_DIRECTORIO_RETEFUENTE2_idx` (`Id_retefuente`),
  ADD KEY `fk_DIRECTORIO_CIUDAD2_idx` (`Id_ciudad`),
  ADD KEY `fk_DIRECTORIO_REGIMEN2_idx` (`Id_regimen`),
  ADD KEY `fk_DIRECTORIO_USUARIO2_idx` (`Id_usuario`),
  ADD KEY `fk_DIRECTORIO_DIRECTORIO_TIPO2_idx` (`Id_directorio_tipo`),
  ADD KEY `fk_DIRECTORIO_DIRECTORIO_CLASE2_idx` (`Id_directorio_clase`),
  ADD KEY `fk_DIRECTORIO_DIRECTORIO_TIPO_TERCERO2_idx` (`Id_directorio_tipo_tercero`);

--
-- Indices de la tabla `DIRECTORIO_CLASE`
--
ALTER TABLE `DIRECTORIO_CLASE`
  ADD PRIMARY KEY (`Id_directorio_clase`);

--
-- Indices de la tabla `DIRECTORIO_DIRECCION_SECUNDARIA`
--
ALTER TABLE `DIRECTORIO_DIRECCION_SECUNDARIA`
  ADD PRIMARY KEY (`Id_direccion_sucursal`,`Vendedor`,`Id_directorio`),
  ADD KEY `fk_DIRECTORIO_DIRECCION_SECUNDARIA_DIRECTORIO_idx` (`Vendedor`),
  ADD KEY `fk_DIRECTORIO_DIRECCION_SECUNDARIA_DIRECTORIO1_idx` (`Id_directorio`);

--
-- Indices de la tabla `DIRECTORIO_TIPO`
--
ALTER TABLE `DIRECTORIO_TIPO`
  ADD PRIMARY KEY (`Id_directorio_tipo`);

--
-- Indices de la tabla `DIRECTORIO_TIPO_TERCERO`
--
ALTER TABLE `DIRECTORIO_TIPO_TERCERO`
  ADD PRIMARY KEY (`Id_directorio_tipo_tercero`);

--
-- Indices de la tabla `DOCUMENTO`
--
ALTER TABLE `DOCUMENTO`
  ADD PRIMARY KEY (`Id_documento`,`Id_tipo_documento`,`Id_sucursal`,`Id_empresa`,`Id_directorio`,`Id_forma_pago`),
  ADD KEY `fk_DOCUMENTO_TIPO_DOCUMENTO1_idx` (`Id_tipo_documento`),
  ADD KEY `fk_DOCUMENTO_SUCURSAL1_idx` (`Id_sucursal`,`Id_empresa`),
  ADD KEY `fk_DOCUMENTO_DIRECTORIO1_idx` (`Id_directorio`),
  ADD KEY `fk_DOCUMENTO_FORMA_PAGO1_idx` (`Id_forma_pago`);

--
-- Indices de la tabla `EMPRESA`
--
ALTER TABLE `EMPRESA`
  ADD PRIMARY KEY (`Id_empresa`,`Id_ciudad`,`Id_regimen`),
  ADD KEY `fk_EMPRESA_CIUDAD2_idx` (`Id_ciudad`),
  ADD KEY `fk_EMPRESA_REGIMEN2_idx` (`Id_regimen`);

--
-- Indices de la tabla `FORMA_PAGO`
--
ALTER TABLE `FORMA_PAGO`
  ADD PRIMARY KEY (`Id_forma_pago`);

--
-- Indices de la tabla `INVITADOS`
--
ALTER TABLE `INVITADOS`
  ADD PRIMARY KEY (`Id_invitados`,`Id_calendario`,`Id_directorio`),
  ADD KEY `fk_INVITADOS_CALENDARIO1_idx` (`Id_calendario`),
  ADD KEY `fk_INVITADOS_DIRECTORIO1_idx` (`Id_directorio`);

--
-- Indices de la tabla `LINEA`
--
ALTER TABLE `LINEA`
  ADD PRIMARY KEY (`Id_linea`);

--
-- Indices de la tabla `LOTES`
--
ALTER TABLE `LOTES`
  ADD PRIMARY KEY (`Id_lote`,`Id_producto`),
  ADD KEY `fk_LOTES_PRODUCTO1_idx` (`Id_producto`);

--
-- Indices de la tabla `MARCA`
--
ALTER TABLE `MARCA`
  ADD PRIMARY KEY (`Id_marca`);

--
-- Indices de la tabla `PRODUCTO`
--
ALTER TABLE `PRODUCTO`
  ADD PRIMARY KEY (`Id_producto`,`Id_marca`,`Id_linea`,`Id_sucursal`,`Id_empresa`,`Id_usuario`),
  ADD KEY `fk_PRODUCTO_MARCA1_idx` (`Id_marca`),
  ADD KEY `fk_PRODUCTO_LINEA1_idx` (`Id_linea`),
  ADD KEY `fk_PRODUCTO_SUCURSAL1_idx` (`Id_sucursal`,`Id_empresa`),
  ADD KEY `fk_PRODUCTO_USUARIO1_idx` (`Id_usuario`);

--
-- Indices de la tabla `REGIMEN`
--
ALTER TABLE `REGIMEN`
  ADD PRIMARY KEY (`Id_regimen`);

--
-- Indices de la tabla `RESOLUCION`
--
ALTER TABLE `RESOLUCION`
  ADD PRIMARY KEY (`Id_resolucion`,`Id_empresa`),
  ADD KEY `fk_RESOLUCION_EMPRESA2_idx` (`Id_empresa`);

--
-- Indices de la tabla `RETEFUENTE`
--
ALTER TABLE `RETEFUENTE`
  ADD PRIMARY KEY (`Id_retefuente`);

--
-- Indices de la tabla `SUCURSAL`
--
ALTER TABLE `SUCURSAL`
  ADD PRIMARY KEY (`Id_sucursal`,`Id_empresa`),
  ADD KEY `fk_SUCURSAL_EMPRESA2_idx` (`Id_empresa`);

--
-- Indices de la tabla `S_E_INVENTARIO`
--
ALTER TABLE `S_E_INVENTARIO`
  ADD PRIMARY KEY (`id_salida`,`Id_producto`,`Id_documento`),
  ADD KEY `fk_S_E_INVENTARIO_PRODUCTO1_idx` (`Id_producto`),
  ADD KEY `fk_S_E_INVENTARIO_DOCUMENTO1_idx` (`Id_documento`);

--
-- Indices de la tabla `TIPO_DOCUMENTO`
--
ALTER TABLE `TIPO_DOCUMENTO`
  ADD PRIMARY KEY (`Id_tipo_documento`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CIUDAD`
--
ALTER TABLE `CIUDAD`
  MODIFY `Id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  MODIFY `Id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `DIRECTORIO`
--
ALTER TABLE `DIRECTORIO`
  MODIFY `Id_directorio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DIRECTORIO_CLASE`
--
ALTER TABLE `DIRECTORIO_CLASE`
  MODIFY `Id_directorio_clase` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DIRECTORIO_DIRECCION_SECUNDARIA`
--
ALTER TABLE `DIRECTORIO_DIRECCION_SECUNDARIA`
  MODIFY `Id_direccion_sucursal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DIRECTORIO_TIPO`
--
ALTER TABLE `DIRECTORIO_TIPO`
  MODIFY `Id_directorio_tipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DIRECTORIO_TIPO_TERCERO`
--
ALTER TABLE `DIRECTORIO_TIPO_TERCERO`
  MODIFY `Id_directorio_tipo_tercero` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mayorista - minorista-etc';
--
-- AUTO_INCREMENT de la tabla `DOCUMENTO`
--
ALTER TABLE `DOCUMENTO`
  MODIFY `Id_documento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `EMPRESA`
--
ALTER TABLE `EMPRESA`
  MODIFY `Id_empresa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `LINEA`
--
ALTER TABLE `LINEA`
  MODIFY `Id_linea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `MARCA`
--
ALTER TABLE `MARCA`
  MODIFY `Id_marca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PRODUCTO`
--
ALTER TABLE `PRODUCTO`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `REGIMEN`
--
ALTER TABLE `REGIMEN`
  MODIFY `Id_regimen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `RESOLUCION`
--
ALTER TABLE `RESOLUCION`
  MODIFY `Id_resolucion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `RETEFUENTE`
--
ALTER TABLE `RETEFUENTE`
  MODIFY `Id_retefuente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `SUCURSAL`
--
ALTER TABLE `SUCURSAL`
  MODIFY `Id_sucursal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `S_E_INVENTARIO`
--
ALTER TABLE `S_E_INVENTARIO`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TIPO_DOCUMENTO`
--
ALTER TABLE `TIPO_DOCUMENTO`
  MODIFY `Id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CALENDARIO`
--
ALTER TABLE `CALENDARIO`
  ADD CONSTRAINT `fk_CALENDARIO_USUARIO1` FOREIGN KEY (`Id_usuario_creador`) REFERENCES `USUARIO` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `CIUDAD`
--
ALTER TABLE `CIUDAD`
  ADD CONSTRAINT `fk_CIUDAD_DEPARTAMENTO2` FOREIGN KEY (`Id_departamento`) REFERENCES `DEPARTAMENTO` (`Id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DIRECTORIO`
--
ALTER TABLE `DIRECTORIO`
  ADD CONSTRAINT `fk_DIRECTORIO_CIUDAD2` FOREIGN KEY (`Id_ciudad`) REFERENCES `CIUDAD` (`Id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DIRECTORIO_DIRECTORIO_CLASE2` FOREIGN KEY (`Id_directorio_clase`) REFERENCES `DIRECTORIO_CLASE` (`Id_directorio_clase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DIRECTORIO_DIRECTORIO_TIPO2` FOREIGN KEY (`Id_directorio_tipo`) REFERENCES `DIRECTORIO_TIPO` (`Id_directorio_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DIRECTORIO_DIRECTORIO_TIPO_TERCERO2` FOREIGN KEY (`Id_directorio_tipo_tercero`) REFERENCES `DIRECTORIO_TIPO_TERCERO` (`Id_directorio_tipo_tercero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DIRECTORIO_REGIMEN2` FOREIGN KEY (`Id_regimen`) REFERENCES `REGIMEN` (`Id_regimen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DIRECTORIO_RETEFUENTE2` FOREIGN KEY (`Id_retefuente`) REFERENCES `RETEFUENTE` (`Id_retefuente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DIRECTORIO_USUARIO2` FOREIGN KEY (`Id_usuario`) REFERENCES `USUARIO` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DIRECTORIO_DIRECCION_SECUNDARIA`
--
ALTER TABLE `DIRECTORIO_DIRECCION_SECUNDARIA`
  ADD CONSTRAINT `fk_DIRECTORIO_DIRECCION_SECUNDARIA_DIRECTORIO1` FOREIGN KEY (`Id_directorio`) REFERENCES `DIRECTORIO` (`Id_directorio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DOCUMENTO`
--
ALTER TABLE `DOCUMENTO`
  ADD CONSTRAINT `fk_DOCUMENTO_DIRECTORIO1` FOREIGN KEY (`Id_directorio`) REFERENCES `DIRECTORIO` (`Id_directorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DOCUMENTO_FORMA_PAGO1` FOREIGN KEY (`Id_forma_pago`) REFERENCES `FORMA_PAGO` (`Id_forma_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DOCUMENTO_SUCURSAL1` FOREIGN KEY (`Id_sucursal`,`Id_empresa`) REFERENCES `SUCURSAL` (`Id_sucursal`, `Id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DOCUMENTO_TIPO_DOCUMENTO1` FOREIGN KEY (`Id_tipo_documento`) REFERENCES `TIPO_DOCUMENTO` (`Id_tipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `EMPRESA`
--
ALTER TABLE `EMPRESA`
  ADD CONSTRAINT `fk_EMPRESA_CIUDAD2` FOREIGN KEY (`Id_ciudad`) REFERENCES `CIUDAD` (`Id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EMPRESA_REGIMEN2` FOREIGN KEY (`Id_regimen`) REFERENCES `REGIMEN` (`Id_regimen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `INVITADOS`
--
ALTER TABLE `INVITADOS`
  ADD CONSTRAINT `fk_INVITADOS_CALENDARIO1` FOREIGN KEY (`Id_calendario`) REFERENCES `CALENDARIO` (`Id_calendario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_INVITADOS_DIRECTORIO1` FOREIGN KEY (`Id_directorio`) REFERENCES `DIRECTORIO` (`Id_directorio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `LOTES`
--
ALTER TABLE `LOTES`
  ADD CONSTRAINT `fk_LOTES_PRODUCTO1` FOREIGN KEY (`Id_producto`) REFERENCES `PRODUCTO` (`Id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PRODUCTO`
--
ALTER TABLE `PRODUCTO`
  ADD CONSTRAINT `fk_PRODUCTO_LINEA1` FOREIGN KEY (`Id_linea`) REFERENCES `LINEA` (`Id_linea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCTO_MARCA1` FOREIGN KEY (`Id_marca`) REFERENCES `MARCA` (`Id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCTO_SUCURSAL1` FOREIGN KEY (`Id_sucursal`,`Id_empresa`) REFERENCES `SUCURSAL` (`Id_sucursal`, `Id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCTO_USUARIO1` FOREIGN KEY (`Id_usuario`) REFERENCES `USUARIO` (`Id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `RESOLUCION`
--
ALTER TABLE `RESOLUCION`
  ADD CONSTRAINT `fk_RESOLUCION_EMPRESA2` FOREIGN KEY (`Id_empresa`) REFERENCES `EMPRESA` (`Id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `SUCURSAL`
--
ALTER TABLE `SUCURSAL`
  ADD CONSTRAINT `fk_SUCURSAL_EMPRESA2` FOREIGN KEY (`Id_empresa`) REFERENCES `EMPRESA` (`Id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `S_E_INVENTARIO`
--
ALTER TABLE `S_E_INVENTARIO`
  ADD CONSTRAINT `fk_S_E_INVENTARIO_DOCUMENTO1` FOREIGN KEY (`Id_documento`) REFERENCES `DOCUMENTO` (`Id_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_S_E_INVENTARIO_PRODUCTO1` FOREIGN KEY (`Id_producto`) REFERENCES `PRODUCTO` (`Id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
