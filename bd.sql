-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2022 a las 06:33:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` char(50) NOT NULL,
  `city_estado` enum('eliminado','create') NOT NULL DEFAULT 'create'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_estado`) VALUES
(1, 's', 'eliminado'),
(2, 'españa', 'create'),
(3, 'inglaterra', 'create'),
(4, 'xd', 'eliminado'),
(5, '', 'create'),
(6, 'españa', 'create');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_id_number` char(50) NOT NULL,
  `customer_name` char(50) NOT NULL,
  `customer_birth_date` date NOT NULL,
  `costomer_phone` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `estado` enum('eliminado','create') NOT NULL DEFAULT 'create'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_id_number`, `customer_name`, `customer_birth_date`, `costomer_phone`, `city_id`, `estado`) VALUES
(1, '22', 'juan carlos alberto', '2022-09-03', 2, 2, 'create'),
(2, '', 'xd', '0000-00-00', 0, 1, 'eliminado'),
(3, '1', 'sa', '2022-09-24', 12, 2, 'eliminado'),
(4, '1', '1', '2022-09-11', 12, 2, 'eliminado'),
(5, '12', 'lol', '2022-09-02', 12, 3, 'create'),
(6, '12', '12', '2022-09-11', 12, 2, 'create'),
(7, '12', 'xd', '2022-09-01', 12, 2, 'create');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `custumer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_total` decimal(15,2) NOT NULL,
  `order_date_delivery` date NOT NULL,
  `order_status` char(10) NOT NULL DEFAULT 'creado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`order_id`, `custumer_id`, `order_date`, `order_total`, `order_date_delivery`, `order_status`) VALUES
(1, 1, '2022-09-24', '630.00', '2022-09-24', 'eliminado'),
(2, 4, '2022-09-24', '190.00', '2022-09-24', 'entregado'),
(3, 1, '2022-09-24', '530.00', '0000-00-00', 'eliminado'),
(4, 1, '2022-09-24', '430.00', '0000-00-00', 'eliminado'),
(5, 1, '2022-09-24', '440.00', '0000-00-00', 'eliminado'),
(6, 1, '2022-09-24', '240.00', '0000-00-00', 'eliminado'),
(7, 1, '2022-09-24', '0.00', '0000-00-00', 'eliminado'),
(8, 1, '2022-09-24', '480.00', '0000-00-00', 'eliminado'),
(9, 4, '2022-09-24', '240.00', '0000-00-00', 'eliminado'),
(10, 1, '2022-09-24', '390.00', '0000-00-00', 'creado'),
(11, 1, '2022-09-24', '1130.00', '2022-09-24', 'entregado'),
(12, 1, '2022-09-24', '720.00', '2022-09-24', 'eliminado'),
(13, 1, '2022-09-24', '90.00', '0000-00-00', 'creado'),
(14, 1, '2022-09-24', '880.00', '0000-00-00', 'creado'),
(15, 1, '2022-09-24', '290.00', '0000-00-00', 'creado'),
(16, 1, '2022-09-24', '240.00', '0000-00-00', 'creado'),
(17, 1, '2022-09-24', '100.00', '0000-00-00', 'creado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 2),
(5, 1, 2),
(7, 2, 3),
(10, 2, 2),
(14, 3, 2),
(15, 3, 2),
(16, 3, 3),
(17, 3, 1),
(20, 4, 3),
(22, 5, 2),
(24, 5, 2),
(27, 6, 1),
(30, 8, 1),
(31, 8, 1),
(35, 9, 1),
(39, 10, 2),
(40, 10, 3),
(42, 10, 2),
(44, 10, 2),
(45, 11, 2),
(46, 11, 3),
(48, 11, 2),
(49, 11, 1),
(51, 11, 2),
(52, 11, 2),
(53, 11, 2),
(54, 11, 2),
(55, 11, 2),
(56, 11, 2),
(57, 12, 1),
(58, 12, 1),
(59, 12, 1),
(62, 13, 3),
(65, 14, 2),
(66, 14, 1),
(67, 14, 1),
(68, 14, 2),
(69, 15, 2),
(70, 15, 2),
(71, 15, 3),
(73, 16, 1),
(74, 14, 2),
(75, 17, 2),
(76, 14, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_description` char(200) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `product_value` decimal(15,2) NOT NULL,
  `product_status` char(10) NOT NULL DEFAULT 'creado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_description`, `product_amount`, `product_value`, `product_status`) VALUES
(1, 'manzanas', 12, '240.00', 'eliminado'),
(2, 'peras', 3, '100.00', 'creado'),
(3, 'Guayabas2', 2, '90.00', 'eliminado'),
(4, '12', 21, '12.00', 'eliminado'),
(5, 'mandarinas', 12, '12.00', 'creado'),
(6, 'maizena', 12, '12.00', 'creado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `custumer_id` (`custumer_id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`custumer_id`) REFERENCES `customers` (`customer_id`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
