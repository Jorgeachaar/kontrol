-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2014 a las 04:34:11
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `kontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url_img` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_desc_unique` (`desc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `desc`, `url_img`, `created_at`, `updated_at`) VALUES
(1, 'Remeraas', '', '2014-10-18 00:20:55', '2014-10-18 00:20:55'),
(2, 'Short', '', '2014-10-18 00:20:55', '2014-10-18 00:20:55'),
(3, 'Bermudas', '', '2014-10-18 00:20:56', '2014-10-18 00:20:56'),
(4, 'Buzos', '', '2014-10-18 00:20:56', '2014-10-18 00:20:56'),
(5, 'Pantalones', '', '2014-10-18 00:20:56', '2014-10-18 00:20:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_17_211811_CreateSizeTable', 1),
('2014_10_17_211829_CreateCategoryTable', 1),
('2014_10_17_213302_CreateProductTable', 2),
('2014_10_18_020348_createProduct_SizeTable', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_type_index` (`type`),
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_reminders`
--

INSERT INTO `password_reminders` (`type`, `email`, `token`, `created_at`) VALUES
('user', 'jorgea@axoft.com', '50792db133c5ddb19ffc59f93e82c9c852ef5c03', '2014-10-03 20:45:07'),
('user', 'jorgea@axoft.com', 'c36b0aa71692249ccaf50bb90bc539b9df75d581', '2014-10-03 20:46:27'),
('user', 'jorgea@axoft.com', '55be156b9b3b54eaa4061804f16fc6d1eb1ec207', '2014-10-03 20:46:40'),
('user', 'jorgea@axoft.com', 'a348019ed6855fae6c4245f5f3aa39f46738fc0b', '2014-10-08 03:45:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desc3` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `old_price` decimal(5,2) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_desc_unique` (`desc`),
  KEY `product_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `desc`, `desc2`, `desc3`, `price`, `old_price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Remera Ktrl Negra', 'Detalle del produto o algun tipo de informaciòn adicional.', '<p>\n     			This stone knitted crewneck sweater has an applied patch design on the front and on the left sleeve.\n				Also features a woven neck label with an inserted size tag.\n     		</p>\n\n				-100% Cotton.<br>\n				-Model is 5''11" and is wearing a Medium.<br>\n				-Medium measures 53cm chest / 73cm length.<br>\n				-Machine washable. Do not tumble dry. View inside label for care instructions.<br>', '150.00', '190.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Remera blanca Ktrl', 'Remera blanca Ktrl', 'Remera blanca Ktrl', '160.00', '190.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Pantanlon Negro Ktrl', 'Pantanlon Negro Ktrl', 'Pantanlon Negro Ktrl', '200.00', '250.00', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_size_product_id_foreign` (`product_id`),
  KEY `product_size_size_id_foreign` (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `size_desc_unique` (`desc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `size`
--

INSERT INTO `size` (`id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'xs', '2014-10-18 00:20:55', '2014-10-18 00:20:55'),
(2, 's', '2014-10-18 00:20:55', '2014-10-18 00:20:55'),
(3, 'm', '2014-10-18 00:20:55', '2014-10-18 00:20:55'),
(4, 'l', '2014-10-18 00:20:55', '2014-10-18 00:20:55'),
(5, 'xl', '2014-10-18 00:20:55', '2014-10-18 00:20:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `remember_token`, `updated_at`, `active`) VALUES
(1, 'root', 'user@mail.com', '$2y$10$T/1xPo/LU2.ieUc5UO3Gw.Ga.oBHcjcq3S5.wj2HV1s0OdFe0W7Ku', 'IRfR6ANluD1SiD5f3y6DEgiBXKoiCOXfApToh7ksHLx8yDw9MZlBiUmCuSBS', '2014-10-07 15:22:43', 1),
(5, 'Jorge', 'jorgea@axoft.com', '$2y$10$PmQ/m7Fil1.jJqoCb78chOJ4algZRr23ABHuwC8DO9JHFQZJpn1JW', 'l8EFUKOlEdPZWEYJeAgmIwKqz6BoshzrtyA0F32Gp3fRuj221t0EAHiuXCDH', '2014-10-07 15:53:14', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Filtros para la tabla `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
