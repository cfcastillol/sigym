-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-09-2015 a las 11:20:49
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sigym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `rule_name` varchar(64) COLLATE utf8_spanish_ci DEFAULT NULL,
  `data` text COLLATE utf8_spanish_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `data` text COLLATE utf8_spanish_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE IF NOT EXISTS `ejercicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `musculoid` int(10) unsigned NOT NULL,
  `ejercicio` varchar(80) COLLATE utf8_spanish_ci NOT NULL COMMENT '\n',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL COMMENT '\n\n',
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ejercicio_musculo1_idx` (`musculoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`id`, `musculoid`, `ejercicio`, `descripcion`, `imagen`, `video`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(7, 1, 'BICEPS EN BANCO', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec odio eu quam efficitur dignissim. Donec eu neque dolor. Sed facilisis mollis turpis eget feugiat. Nunc pretium eros pellentesque dui consectetur, in malesuada dui tincidunt. Sed convallis, arcu eget porttitor cursus, quam magna efficitur nibh, tincidunt porttitor turpis sapien id neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam volutpat, nibh sed aliquam suscipit, metus felis aliquet lorem, sit amet interdum erat lectus quis sem. Quisque sed quam sed est sagittis gravida. Proin ac rhoncus massa. Vivamus mollis, lorem in porta tincidunt, arcu quam efficitur mauris, id hendrerit libero odio sit amet massa. Nullam ut metus aliquam, dictum sem viverra, cursus lectus. In hac habitasse platea dictumst. Quisque in lectus ac purus elementum blandit.', 'uploads/ejerciciodesubidadeimagen.png', '<iframe width="560" height="315" src="https://www.youtube.com/embed/q10Vm7YVpLM" frameborder="0" allowfullscreen></iframe>', '1', '2015-09-09 17:48:00', '1', '2015-09-12 10:02:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(1, 'ACTIVO', '1', '2015-09-07 17:05:06', '1', '2015-09-07 17:05:31'),
(2, 'INACTIVO', '1', '2015-09-07 17:05:20', '1', '2015-09-07 17:05:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

CREATE TABLE IF NOT EXISTS `membresia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estadoid` int(10) unsigned NOT NULL,
  `membresia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `valor` double NOT NULL,
  `cantidadmeses` int(11) NOT NULL,
  `cantidaddias` int(11) NOT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_membresia_estado1_idx` (`estadoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `membresia`
--

INSERT INTO `membresia` (`id`, `estadoid`, `membresia`, `descripcion`, `valor`, `cantidadmeses`, `cantidaddias`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(1, 1, 'MEMBRESÍA PARA UN DÍA', 'esta membresía le permite a la persona permanecer 1 día en el gymnasio', 3000, 0, 1, '1', '2015-09-07 17:43:17', '1', '2015-09-07 17:52:25'),
(2, 1, 'MEMBRESÍA PARA UN MES', 'Esta membresía le permite al usuario hacer parte del centro de acondicionamiento físico por un periodo no mayor a 30 días', 40000, 1, 30, '1', '2015-09-09 18:22:10', '1', '2015-09-09 18:22:10'),
(3, 1, 'MEMBRESIA PARA TRES MESES', 'ESTA MEMBRESÍA LE PERMITE AL CLIENTE HACER PARTE DE EL GYM POR UN PERIODO DE TIEMPO NO MAYOR A 3 MESES', 120000, 3, 90, '1', '2015-09-10 10:51:07', '1', '2015-09-10 10:51:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musculo`
--

CREATE TABLE IF NOT EXISTS `musculo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `musculo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `musculo`
--

INSERT INTO `musculo` (`id`, `musculo`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(1, 'BICEPS', '1', '2015-09-08 08:31:15', '1', '2015-09-08 08:32:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sexoid` int(10) unsigned NOT NULL,
  `tipodocumentoid` int(10) unsigned NOT NULL,
  `documento` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `primernombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `segundonombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `primerapellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `segundoapellido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `estatura` double NOT NULL,
  `peso` double NOT NULL,
  `edad` int(11) NOT NULL,
  `imc` double NOT NULL,
  `pgc` double NOT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_persona_tipodocumento_idx` (`tipodocumentoid`),
  KEY `fk_persona_sexo1_idx` (`sexoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `sexoid`, `tipodocumentoid`, `documento`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `direccion`, `telefono`, `email`, `estatura`, `peso`, `edad`, `imc`, `pgc`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(1, 1, 1, '1054556735', 'CRISTIAN', 'FABIAN', 'CASTILLO', 'LOPEZ', 'K 3 20 60', '3128296605', 'cfcastillol@gmail.com', 1.73, 90, 23, 30, 25.09, '1', '2015-09-09 00:00:00', '1', '2015-09-09 00:00:00'),
(2, 1, 1, '1054552330', 'NILSON', 'FERNANDO', 'CASTILLO', 'LOPEZ', 'K 3 20 60', '', 'nilson@gmail.com', 1.72, 71, 25, 23.666666666667, 17.95, '1', '2015-09-09 00:00:00', '1', '2015-09-09 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personamembresia`
--

CREATE TABLE IF NOT EXISTS `personamembresia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personaid` int(10) unsigned NOT NULL,
  `membresiaid` int(10) unsigned NOT NULL,
  `estadoid` int(10) unsigned NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_persona_has_membresia_membresia1_idx` (`membresiaid`),
  KEY `fk_persona_has_membresia_persona1_idx` (`personaid`),
  KEY `fk_personamembresia_estado1_idx` (`estadoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `personamembresia`
--

INSERT INTO `personamembresia` (`id`, `personaid`, `membresiaid`, `estadoid`, `fechainicio`, `fechafin`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(1, 1, 2, 2, '2015-09-09', '2015-10-09', '1', '2015-09-10 00:00:00', '1', '2015-09-10 00:00:00'),
(2, 2, 1, 1, '2015-09-09', '2015-09-10', '1', '2015-09-10 00:00:00', '1', '2015-09-10 00:00:00'),
(3, 2, 2, 1, '2015-09-01', '2015-10-01', '1', '2015-09-10 00:00:00', '1', '2015-09-10 00:00:00'),
(4, 1, 2, 1, '2015-09-10', '2015-10-10', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sexo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `sexo_UNIQUE` (`sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `sexo`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(1, 'MASCULINO', '1', '2015-09-08 17:27:07', '1', '2015-09-08 17:27:07'),
(2, 'FEMENINO', '1', '2015-09-10 10:54:16', '1', '2015-09-10 10:54:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `abreviatura` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `tipodocumento` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `usuariocrea` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `usuariomodifica` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechamodifica` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id`, `abreviatura`, `tipodocumento`, `usuariocrea`, `fechacrea`, `usuariomodifica`, `fechamodifica`) VALUES
(1, 'C.C', 'CÉDULA DE CIUDADANÍA', '1', '2015-09-08 16:52:53', '1', '2015-09-08 16:52:53'),
(2, 'T.I', 'TARJETA DE IDENTIDAD', '1', '2015-09-08 16:53:11', '1', '2015-09-08 16:53:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `fechacrea` datetime NOT NULL,
  `fechamodifica` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `fechacrea`, `fechamodifica`) VALUES
(1, 'admin', 'admin', 'pwwAaOO5YbWPm-kgPI9rBduF-RONfIcq', '$2y$13$qpd6.bbz3MJZxpRL54pqW.j/8LVh5eqrN6PskDu7zbYaZoMxio7C6', NULL, 'cfcastillol@midasingenieria.com', 10, '2015-06-22 15:18:33', '2015-06-22 15:18:33');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `fk_ejercicio_musculo1` FOREIGN KEY (`musculoid`) REFERENCES `musculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `membresia`
--
ALTER TABLE `membresia`
  ADD CONSTRAINT `fk_membresia_estado1` FOREIGN KEY (`estadoid`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_sexo1` FOREIGN KEY (`sexoid`) REFERENCES `sexo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_tipodocumento` FOREIGN KEY (`tipodocumentoid`) REFERENCES `tipodocumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personamembresia`
--
ALTER TABLE `personamembresia`
  ADD CONSTRAINT `fk_persona_has_membresia_membresia1` FOREIGN KEY (`membresiaid`) REFERENCES `membresia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_membresia_persona1` FOREIGN KEY (`personaid`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personamembresia_estado1` FOREIGN KEY (`estadoid`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `ActualizaEstadoPersonaMembresia` ON SCHEDULE EVERY 1 DAY STARTS '2015-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE personamembresia SET estadoid = 2, fechamodifica = NOW() where fechafin < NOW()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
