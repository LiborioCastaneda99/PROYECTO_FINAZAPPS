-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-12-2020 a las 01:22:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `audis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clases_Tran`
--

CREATE TABLE `Clases_Tran` (
  `Cod_clase_t` int(11) NOT NULL,
  `descrip_clase_t` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Clases_Tran`
--

INSERT INTO `Clases_Tran` (`Cod_clase_t`, `descrip_clase_t`) VALUES
(1, 'Compra'),
(2, 'Gasto'),
(3, 'Otro Ingreso'),
(4, 'Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cuentas_Creditos`
--

CREATE TABLE `Cuentas_Creditos` (
  `Consecutivo_cc` int(11) NOT NULL,
  `Consecutivo_t_cc` int(11) NOT NULL,
  `Saldo_cc` decimal(12,0) NOT NULL,
  `Tipo_cc` varchar(10) NOT NULL,
  `Estado_cc` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Cuentas_Creditos`
--

INSERT INTO `Cuentas_Creditos` (`Consecutivo_cc`, `Consecutivo_t_cc`, `Saldo_cc`, `Tipo_cc`, `Estado_cc`) VALUES
(1, 1, '0', 'Por Cobrar', 'Inactiva'),
(2, 2, '0', 'Por Cobrar', 'Pagada'),
(3, 3, '79500', 'Por Pagar', 'Activa'),
(4, 4, '0', 'Por Cobrar', 'Inactiva'),
(5, 5, '0', 'Por Cobrar', 'Pagada'),
(6, 13, '51000', 'Por Pagar', 'Activa'),
(7, 14, '70000', 'Por Cobrar', 'Activa'),
(8, 18, '78000', 'Por Cobrar', 'Activa'),
(9, 19, '45000', 'Por Cobrar', 'Activa'),
(10, 20, '25000', 'Por Cobrar', 'Activa'),
(11, 24, '0', 'Por Pagar', 'Pagada'),
(12, 31, '154612', 'Por Cobrar', 'Activa'),
(13, 32, '0', 'Por Cobrar', 'Pagada'),
(14, 33, '5555', 'Por Cobrar', 'Activa'),
(15, 34, '33333', 'Por Pagar', 'Activa'),
(16, 35, '2332', 'Por Pagar', 'Activa'),
(17, 36, '3333', 'Por Pagar', 'Activa'),
(18, 37, '6666', 'Por Pagar', 'Activa'),
(19, 38, '3333', 'Por Cobrar', 'Activa'),
(22, 41, '2323', 'Por Pagar', 'Activa'),
(24, 43, '6565', 'Por Cobrar', 'Activa'),
(25, 44, '3232', 'Por Cobrar', 'Activa'),
(26, 45, '12345', 'Por Pagar', 'Activa'),
(27, 46, '4343', 'Por Cobrar', 'Activa'),
(28, 47, '4444', 'Por Cobrar', 'Activa'),
(29, 49, '45667', 'Por Cobrar', 'Activa'),
(30, 50, '564', 'Por Pagar', 'Activa'),
(31, 51, '5454', 'Por Cobrar', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pagos_pcc`
--

CREATE TABLE `Pagos_pcc` (
  `Consecutivo_pcc` int(11) NOT NULL,
  `Fecha_pcc` date NOT NULL,
  `Concepto_pcc` varchar(200) NOT NULL,
  `Monto_pcc` decimal(12,0) NOT NULL,
  `Responsable_pcc` varchar(40) NOT NULL,
  `Cuenta_credito_pcc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Pagos_pcc`
--

INSERT INTO `Pagos_pcc` (`Consecutivo_pcc`, `Fecha_pcc`, `Concepto_pcc`, `Monto_pcc`, `Responsable_pcc`, `Cuenta_credito_pcc`) VALUES
(12, '2020-11-27', 'Pago total', '250000', 'Juan', 1),
(13, '2020-11-27', 'primera cuota', '800000', 'John Zamora', 3),
(14, '2020-11-27', 'Cuota numero 1', '500000', 'Audis', 4),
(15, '2020-11-27', 'Pago total', '60000', 'Audis M', 4),
(16, '2020-11-27', 'PAGO TOTAL', '66677', 'Audis', 2),
(17, '2020-11-30', 'Pago total deuda', '20000', 'John Zamora', 5),
(18, '2020-12-07', 'Pago final', '100000', 'Diana', 13),
(19, '2020-12-07', 'Compra de arrozg', '5000', 'g', 32),
(20, '2020-12-07', 'Compra de azucar', '1000', 'Diana', 32),
(21, '2020-12-07', 'Vcc', '50000', 'ff', 32),
(22, '2020-12-07', 'Co', '5000', 'Maria Jose ', 13),
(23, '2020-12-07', 'Compra de arroz', '1000', 'John Zamora', 32),
(24, '2020-12-07', 'Compra de azucar', '4444', 'Diana', 31),
(25, '2020-12-07', 'Compra de azucar', '500', 'John Zamora', 31),
(26, '2020-12-07', 'Compra de arroz', '9000', 'Diana', 32),
(27, '2020-12-07', 'Compra de arroz', '444', 'John Zamora', 31),
(28, '2020-12-07', 'Compra de arroz', '800', 'John Zamora', 13),
(29, '2020-12-07', 'Compra de azucar', '200', 'Diana', 13),
(30, '2020-12-07', 'Compra de arroz', '8890', 'John Zamora', 3),
(31, '2020-12-07', 'Compra de azucar', '500', 'John Zamora', 32),
(32, '2020-12-07', 'Compra de azucar', '500', 'John Zamora', 3),
(33, '2020-12-07', 'Compra de arroz', '9000', 'John Zamora', 13),
(34, '2020-12-07', 'Compra de arroz', '9000', 'John Zamora', 13),
(35, '2020-12-09', 'Compra de azucar', '10000', 'Diana', 13),
(36, '2020-12-09', 'PAgo', '9500', 'Diana', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Saldo_Anterior`
--

CREATE TABLE `Saldo_Anterior` (
  `Fecha_corte` date NOT NULL,
  `Monto_valor` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Saldo_Caja`
--

CREATE TABLE `Saldo_Caja` (
  `Monto_Caja` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Terceros`
--

CREATE TABLE `Terceros` (
  `Nit_Tercero` decimal(10,0) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Telefono` decimal(10,0) NOT NULL,
  `Correo` varchar(40) DEFAULT NULL,
  `Tipo_Cli_Prov` varchar(10) DEFAULT NULL,
  `Observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Terceros`
--

INSERT INTO `Terceros` (`Nit_Tercero`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Tipo_Cli_Prov`, `Observaciones`) VALUES
('112345', 'Juan Labrum', 'Calle 95 #34-25', '3264853234', 'juanlabrum@gmail.com', 'Cliente', 'Ninguna'),
('198567', 'El Encanto SA', 'Calle 72 #44-70', '3174315018', 'elencanto@outlook.es', 'Proveedor', 'Proveedor textil'),
('223456', 'Monica Galindo', 'Cra 25 #14-24', '4567643289', 'monicagalindo@gmail.com', 'Cliente', 'Vive fuera de la ciudad'),
('312345', 'La Fortaleza SA', 'Calle 55 #14-31', '4355647234', 'lafortaleza@gmail.com', 'Cliente', 'Vive fuera de la ciudad'),
('321098', 'Maria Cabal', 'Cra 75 #80-17', '3714264528', 'macaba@hotmail.com', 'Cliente', 'Linea credito'),
('321998', 'Armando Meza', 'Calle 35 #25-46', '3164310809', 'armandomeza@gmail.com', 'Cliente', 'Ninguna'),
('345123', 'El Punto Ltda', 'Calle 45 #33-12', '3214361720', 'elencanto@outlook.es', 'Proveedor', 'surtidor de hilos'),
('345678', 'Aquiles Castro', 'Cra 93 #70-85', '3104207603', 'aquilescastro@gmail.com', 'Cliente', 'solo fines de semana'),
('432109', 'Peroveeedores SA', 'Calle 30 #34-45-66', '3714568007', 'provesa@outlook.es', 'Proveedor', 'Surtidor textil'),
('432199', 'Danilo ditta', 'Calle 19 #40-10', '3174203030', 'danilodita@gmail.com', 'Cliente', 'Ninguna'),
('445678', 'La Varilla SA', 'Cra 75 #44-21', '3285643234', 'lavarilla@gmail.com', 'Proveedor', 'Ninguna'),
('450670', 'Esteban dido', 'Calle 56 #7-10', '3014709670', 'estebandido69@gmail.com', 'Cliente', 'Control de pagos'),
('456789', 'Maria Canedo', 'Calle 68 #1-36', '4254527628', 'macado@yahoo.com', 'Cliente', 'Ninguna'),
('567098', 'Pura Maza', 'Cra 75 #29-76', '3184762020', 'puramaza@gmail.com', 'Cliente', 'Ninguna'),
('567890', 'Susana Horia', 'Cra 25 #84-29', '3212673232', 'susanahoria@gmail.com', 'Cliente', 'Con crédito'),
('678900', 'Alan Ditta', 'Cra 76 #44-88', '3298763234', 'alanditta@gmail.com', 'Cliente', 'Con crédito permanente'),
('678901', 'Transporte Sol SA', 'Calle 14 #27-30', '3454731820', 'trasposol33@gmail.com', 'Proveedor', 'Transporte de mercancia'),
('789123', 'Lorenzo Gomez', 'Cra 33 #79-80', '3193764530', 'lorenzo69@gmail.com', 'Cliente', 'Ninguna'),
('967890', 'Energia Confiable', 'Cra 49 #7-62', '3183752633', 'eneco76@gmail.com', 'Proveedor', 'Pago de energia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Transacciones`
--

CREATE TABLE `Transacciones` (
  `Nit_tercero_t` decimal(10,0) NOT NULL,
  `Consecutivo_t` int(11) NOT NULL,
  `Fecha_t` date NOT NULL,
  `Concepto_t` varchar(200) NOT NULL,
  `Monto_t` decimal(12,0) NOT NULL,
  `Tipo_Ing_Egr_t` varchar(7) NOT NULL,
  `Clase_t` int(11) NOT NULL,
  `Forma_Pago_t` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Transacciones`
--

INSERT INTO `Transacciones` (`Nit_tercero_t`, `Consecutivo_t`, `Fecha_t`, `Concepto_t`, `Monto_t`, `Tipo_Ing_Egr_t`, `Clase_t`, `Forma_Pago_t`) VALUES
('312345', 1, '2020-11-26', 'Compra de arroz', '250000', 'Ingreso', 3, 'Crédito'),
('678900', 2, '2020-11-26', 'Compra de arroz y azucar', '66677', 'Ingreso', 4, 'Crédito'),
('445678', 3, '2020-11-27', 'Compra de arroz', '888890', 'Egreso', 1, 'Crédito'),
('450670', 4, '2020-11-26', 'Compra de arroz diana', '560000', 'Ingreso', 4, 'Crédito'),
('112345', 5, '2020-11-30', 'Compra de arroz', '20000', 'Ingreso', 4, 'Crédito'),
('678900', 6, '2020-11-30', 'Compra de azucar', '444444', 'Ingreso', 3, 'Efectivo'),
('450670', 7, '2020-11-30', 'Compra de arrozg', '555555', 'Ingreso', 3, 'Efectivo'),
('321998', 9, '2020-11-02', 'Venta de pantalones', '120000', 'Ingreso', 4, 'Efectivo'),
('456789', 10, '2020-11-02', 'Venta de pantalones', '80000', 'Ingreso', 4, 'Efectivo'),
('312345', 11, '2020-11-02', 'Compra de insumos', '320000', 'Egreso', 1, 'Efectivo'),
('567890', 12, '2020-11-02', 'Venta de camisas', '150000', 'Ingreso', 4, 'Efectivo'),
('445678', 13, '2020-11-02', 'Compra de tela', '285000', 'Egreso', 1, 'Credito'),
('567098', 14, '2020-11-03', 'Venta de calzones', '70000', 'Ingreso', 4, 'Credito'),
('312345', 15, '2020-11-03', 'Compra de camisas', '420600', 'Egreso', 1, 'Efectivo'),
('321998', 16, '2020-11-03', 'Venta de sueteres', '140500', 'Ingreso', 4, 'Efectivo'),
('678900', 17, '2020-11-03', 'Venta de medias', '85000', 'Ingreso', 4, 'Efectivo'),
('456789', 18, '2020-11-04', 'Venta de interiores', '78000', 'Ingreso', 4, 'Credito'),
('345678', 19, '2020-11-04', 'Venta de medias', '450000', 'Ingreso', 4, 'Credito'),
('567890', 20, '2020-11-04', 'Venta de Sostenes', '45000', 'Ingreso', 4, 'Credito'),
('321998', 21, '2020-11-04', 'Venta de fsldas', '120000', 'Ingreso', 4, 'Efectivo'),
('312345', 22, '2020-11-05', 'Compra de prendas', '136700', 'Egreso', 1, 'Efectivo'),
('456789', 23, '2020-11-05', 'Venta de chompas', '75000', 'Ingreso', 4, 'Efectivo'),
('445678', 24, '2020-11-05', 'Compra de tubos', '27000', 'Egreso', 1, 'Credito'),
('567890', 25, '2020-11-06', 'Venta de Camisas', '67200', 'Ingreso', 4, 'Efectivo'),
('321998', 26, '2020-11-06', 'Venta de ganchos', '120500', 'Ingreso', 3, 'Efectivo'),
('456789', 27, '2020-11-06', 'Venta de faldas', '130000', 'Ingreso', 4, 'Efectivo'),
('967890', 28, '2020-11-07', 'Pago de energia', '168000', 'Egreso', 2, 'Efectivo'),
('789123', 29, '2020-11-07', 'Venta de medias', '45000', 'Ingreso', 4, 'Efectivo'),
('456789', 30, '2020-11-08', 'Venta de pantalones', '94500', 'Ingreso', 4, 'Efectivo'),
('456789', 31, '2020-11-08', 'Venta de corbatas', '160000', 'Ingreso', 4, 'Credito'),
('450670', 32, '2020-11-09', 'Venta de camisas', '320000', 'Ingreso', 4, 'Efectivo'),
('567890', 33, '2020-11-10', 'Venta de faldas', '136000', 'Ingreso', 4, 'Credito'),
('112345', 34, '2020-12-11', 'Compra de arroz', '5555', 'Ingreso', 3, 'Crédito'),
('345123', 35, '2020-12-13', '32323', '33333', 'Egreso', 2, 'Crédito'),
('345123', 36, '2020-12-13', 'Compra de arroz', '2332', 'Egreso', 2, 'Crédito'),
('198567', 37, '2020-12-13', 'Compra de arrozg', '3333', 'Egreso', 2, 'Crédito'),
('345123', 38, '2020-12-19', 'Compra de arroz', '6666', 'Egreso', 2, 'Crédito'),
('112345', 39, '2020-12-13', 'Compra de azucar', '3333', 'Ingreso', 4, 'Crédito'),
('112345', 40, '2020-12-13', 'Compra de azucar', '3333', 'Ingreso', 4, 'Crédito'),
('112345', 41, '2020-12-13', 'Compra de azucar', '3333', 'Ingreso', 4, 'Crédito'),
('198567', 42, '2020-12-13', 'Compra de arroz', '2323', 'Egreso', 2, 'Crédito'),
('198567', 43, '2020-12-13', 'Compra de arroz', '2323', 'Egreso', 2, 'Crédito'),
('223456', 44, '2020-12-13', 'Compra de arrozg', '6565', 'Ingreso', 3, 'Crédito'),
('223456', 45, '2021-01-03', 'Compra de azucar', '3232', 'Ingreso', 4, 'Crédito'),
('445678', 46, '2020-12-13', 'Pshos', '12345', 'Egreso', 2, 'Crédito'),
('112345', 47, '2020-12-13', 'Compra de azucar', '4343', 'Ingreso', 4, 'Crédito'),
('198567', 48, '2020-12-13', 'Compra de arroz', '4444', 'Egreso', 1, 'Efectivo'),
('112345', 49, '2020-12-13', 'Compra de arroz', '4444', 'Ingreso', 4, 'Crédito'),
('112345', 50, '2020-12-13', 'Compra de azucar', '45667', 'Ingreso', 3, 'Crédito'),
('345123', 51, '2020-12-13', 'Compra de azucar', '564', 'Egreso', 1, 'Crédito'),
('112345', 52, '2020-12-12', 'Comptando vsainas', '5454', 'Ingreso', 4, 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL,
  `Loggin_usr` varchar(50) NOT NULL,
  `Clave_usr` varchar(100) NOT NULL,
  `Identificacion_usr` decimal(10,0) NOT NULL,
  `Nombre_usr` varchar(40) NOT NULL,
  `Nivel_usr` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `Loggin_usr`, `Clave_usr`, `Identificacion_usr`, `Nombre_usr`, `Nivel_usr`) VALUES
(1, 'libodjyj@gmail.com', '$2y$10$KjR5fYWb49OQobDYb6ItVuK3.dVBC9Y7xOq22zhlLnpA1XRlCqkqu', '1045173046', 'Liborio Castañeda', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Clases_Tran`
--
ALTER TABLE `Clases_Tran`
  ADD PRIMARY KEY (`Cod_clase_t`),
  ADD UNIQUE KEY `descrip_clase_t` (`descrip_clase_t`);

--
-- Indices de la tabla `Cuentas_Creditos`
--
ALTER TABLE `Cuentas_Creditos`
  ADD PRIMARY KEY (`Consecutivo_cc`),
  ADD UNIQUE KEY `Consecutivo_t_cc` (`Consecutivo_t_cc`);

--
-- Indices de la tabla `Pagos_pcc`
--
ALTER TABLE `Pagos_pcc`
  ADD PRIMARY KEY (`Consecutivo_pcc`);

--
-- Indices de la tabla `Terceros`
--
ALTER TABLE `Terceros`
  ADD PRIMARY KEY (`Nit_Tercero`);

--
-- Indices de la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  ADD PRIMARY KEY (`Consecutivo_t`),
  ADD KEY `transaTercero` (`Nit_tercero_t`),
  ADD KEY `fktransaClase` (`Clase_t`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Identificacion_usr` (`Identificacion_usr`),
  ADD UNIQUE KEY `Loggin_usr` (`Loggin_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Clases_Tran`
--
ALTER TABLE `Clases_Tran`
  MODIFY `Cod_clase_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `Cuentas_Creditos`
--
ALTER TABLE `Cuentas_Creditos`
  MODIFY `Consecutivo_cc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `Pagos_pcc`
--
ALTER TABLE `Pagos_pcc`
  MODIFY `Consecutivo_pcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  MODIFY `Consecutivo_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Cuentas_Creditos`
--
ALTER TABLE `Cuentas_Creditos`
  ADD CONSTRAINT `FkCuenteTransa` FOREIGN KEY (`Consecutivo_t_cc`) REFERENCES `Transacciones` (`Consecutivo_t`);

--
-- Filtros para la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  ADD CONSTRAINT `fktransaClase` FOREIGN KEY (`Clase_t`) REFERENCES `Clases_Tran` (`Cod_clase_t`),
  ADD CONSTRAINT `transaTercero` FOREIGN KEY (`Nit_tercero_t`) REFERENCES `Terceros` (`Nit_Tercero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
