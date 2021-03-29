-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2021 a las 23:27:57
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diel_delivery_app_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` text NOT NULL COMMENT 'Ruta en donde se almacena la imagen en el servidor',
  `description` varchar(256) NOT NULL,
  `value_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) NOT NULL,
  `id_manager` bigint(20) NOT NULL,
  `id_user_delivery` bigint(20) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `date_request` date NOT NULL DEFAULT current_timestamp(),
  `state` varchar(20) NOT NULL COMMENT 'Estados: New, Sent, Cancelled, Delivered, Returned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests_details`
--

CREATE TABLE `requests_details` (
  `id` bigint(20) NOT NULL,
  `id_request` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_api`
--

CREATE TABLE `users_api` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL COMMENT 'Roles: customer, manager, user_delivery',
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_manager` (`id_manager`),
  ADD KEY `id_user_delivery` (`id_user_delivery`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indices de la tabla `requests_details`
--
ALTER TABLE `requests_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_request` (`id_request`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `users_api`
--
ALTER TABLE `users_api`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requests_details`
--
ALTER TABLE `requests_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_api`
--
ALTER TABLE `users_api`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`id_manager`) REFERENCES `users_api` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`id_user_delivery`) REFERENCES `users_api` (`id`),
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `users_api` (`id`);

--
-- Filtros para la tabla `requests_details`
--
ALTER TABLE `requests_details`
  ADD CONSTRAINT `requests_details_ibfk_1` FOREIGN KEY (`id_request`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `requests_details_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
