-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2014 a las 13:48:19
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
(1, 'Remeraas', '', '2014-10-20 18:38:21', '2014-10-20 18:38:21'),
(2, 'Short', '', '2014-10-20 18:38:21', '2014-10-20 18:38:21'),
(3, 'Bermudas', '', '2014-10-20 18:38:21', '2014-10-20 18:38:21'),
(4, 'Buzos', '', '2014-10-20 18:38:21', '2014-10-20 18:38:21'),
(5, 'Pantalones', '', '2014-10-20 18:38:21', '2014-10-20 18:38:21');

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
('2014_10_17_213302_CreateProductTable', 1),
('2014_10_18_020348_createProduct_SizeTable', 1),
('2014_10_18_023306_CreateProduct_ImgTable', 1);

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
('user', 'jorgea@axoft.com', '2cd36327ddcee158f5cbe54c86c1924265cfe777', '2014-10-08 03:48:34');

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
  `stock` int(11) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_desc_unique` (`desc`),
  KEY `product_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `desc`, `desc2`, `desc3`, `price`, `old_price`, `stock`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'skull White 666', 'Remera skull White', '<p>\r\nThis stone knitted crewneck sweater has an applied patch design on the front and on the left sleeve.\r\nAlso features a woven neck label with an inserted size tag.\r\n</p>\r\n\r\n-100% Cotton.<br>\r\n-Model is 5''11" and is wearing a Medium.<br>\r\n-Medium measures 53cm chest / 73cm length.<br>\r\n-Machine washable. Do not tumble dry. View inside label for care instructions.<br>', '320.00', '380.00', 2, 1, '0000-00-00 00:00:00', '2014-11-18 14:18:05'),
(4, 'Remera skull Black', 'Remera skull Black', 'Remera skull Black', '350.00', '390.00', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Short Black', 'Short Black', 'Short Black', '420.00', '510.00', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Remera skull White2', 'Remera skull White', '<p>\r\nThis stone knitted crewneck sweater has an applied patch design on the front and on the left sleeve.\r\nAlso features a woven neck label with an inserted size tag.\r\n</p>\r\n\r\n-100% Cotton.<br>\r\n-Model is 5''11" and is wearing a Medium.<br>\r\n-Medium measures 53cm chest / 73cm length.<br>\r\n-Machine washable. Do not tumble dry. View inside label for care instructions.<br>', '320.00', '380.00', 11, 1, '2014-11-03 22:36:02', '2014-11-12 05:14:08'),
(11, 'Nuevo produto', 'Nuevooooo', 'nuevoooo', '100.00', '200.00', 22, 1, '2014-11-12 04:58:26', '2014-11-12 05:14:02'),
(12, 'asdasd', 'asdasd', 'asdasd', '2.00', '2.00', 2, 2, '2014-11-14 18:48:32', '2014-11-14 18:48:32'),
(13, ' STEAK TSHIRT', ' STEAK TSHIRT', ' STEAK TSHIRT', '10.00', '30.00', 10, 1, '2014-11-14 18:49:59', '2014-11-14 18:49:59'),
(14, 'cybermonday', 'cybermonday', 'cybermonday', '50.00', '50.00', 2, 1, '2014-11-14 20:05:42', '2014-11-14 20:05:42'),
(15, 'cybermondaycybermonday', 'cybermondaycybermonday', '<h1>cybermondaycybermondaycybermonday</h1>', '50.00', '56.00', 0, 1, '2014-11-14 20:06:14', '2014-11-14 20:06:14'),
(16, 'Kaka', 'Kaka 222', '<h1>Mi remera es kaka</h1>\r\n\r\n\r\n-es de algodon <br>\r\n'',masmds \r\n-asldkksadlsksd', '20.00', '200.00', 50, 3, '2014-11-17 01:29:31', '2014-11-17 01:31:02'),
(17, 'Kabra', 'Kabra mosca', 'ñlaksd akñsdj ña sñ asñdjk\r\nañlsdñlsa\r\nañlsdñlaksd\r\nañlksdñlasd\r\n', '50.00', '60.00', 50, 1, '2014-11-19 14:43:55', '2014-11-19 14:43:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_img`
--

CREATE TABLE IF NOT EXISTS `product_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_img_url_img_unique` (`url_img`),
  KEY `product_img_product_id_foreign` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- Volcado de datos para la tabla `product_img`
--

INSERT INTO `product_img` (`id`, `url_img`, `desc`, `product_id`, `created_at`, `updated_at`) VALUES
(16, '1.png', '1.png', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '2.png', '2.png', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '3.png', '3.png', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '4.png', '4.png', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '4_3.jpg', '3.jpg', 4, '2014-11-14 20:09:05', '2014-11-14 20:09:05'),
(52, '6_2.jpg', '2.jpg', 6, '2014-11-14 20:09:39', '2014-11-14 20:09:39'),
(53, '10_4.jpg', '4.jpg', 10, '2014-11-14 20:09:51', '2014-11-14 20:09:51'),
(54, '11_5.jpg', '5.jpg', 11, '2014-11-14 20:10:12', '2014-11-14 20:10:12'),
(55, '12_6.jpg', '6.jpg', 12, '2014-11-14 20:10:26', '2014-11-14 20:10:26'),
(56, '13_7.jpg', '7.jpg', 13, '2014-11-14 20:10:39', '2014-11-14 20:10:39'),
(57, '14_9.jpg', '9.jpg', 14, '2014-11-14 20:10:53', '2014-11-14 20:10:53'),
(58, '15_13.jpg', '13.jpg', 15, '2014-11-14 20:11:17', '2014-11-14 20:11:17'),
(59, '16_tumblr_n6sb969LqI1s4j88qo1_500.jpg', 'tumblr_n6sb969LqI1s4j88qo1_500.jpg', 16, '2014-11-17 01:29:56', '2014-11-17 01:29:56'),
(60, '16_tumblr_n0bdd8ERL01t62daho1_500.jpg', 'tumblr_n0bdd8ERL01t62daho1_500.jpg', 16, '2014-11-17 01:30:01', '2014-11-17 01:30:01'),
(61, '17_10342496_542057919245715_1320603925652205143_n.jpg', '10342496_542057919245715_1320603925652205143_n.jpg', 17, '2014-11-19 14:44:37', '2014-11-19 14:44:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Volcado de datos para la tabla `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(65, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 4, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 12, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 12, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 13, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 13, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 13, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 14, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 14, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 14, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 15, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 15, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 15, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 16, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 16, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 17, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 17, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 17, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'xs', '2014-10-20 18:38:20', '2014-10-20 18:38:20'),
(2, 's', '2014-10-20 18:38:20', '2014-10-20 18:38:20'),
(3, 'm', '2014-10-20 18:38:20', '2014-10-20 18:38:20'),
(4, 'l', '2014-10-20 18:38:21', '2014-10-20 18:38:21'),
(5, 'xl', '2014-10-20 18:38:21', '2014-10-20 18:38:21');

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
(1, 'root', 'user@mail.com', '$2y$10$T/1xPo/LU2.ieUc5UO3Gw.Ga.oBHcjcq3S5.wj2HV1s0OdFe0W7Ku', 'IvD9h0sd7Z9anPgBWeuCVO1PQVglblQ2jpIQsFgsUMArs9tPDaf0hIVwzmGg', '2014-11-17 01:28:01', 1),
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
-- Filtros para la tabla `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_img_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Filtros para la tabla `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
