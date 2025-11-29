-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `colasmaa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `colasmaa`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `accountability`;
CREATE TABLE `accountability` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `accountability` (`id`, `title`, `slug`, `image`, `external_image`, `description`, `url`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'EJEMPLO DE RENDICION',	'ejemplo-de-rendicion',	'/img/accountability/17173502791717350279instagramjpg.jpg',	'/img/accountability/17173502791717350279fb-icon-325x325png.png',	'<p><b>awdadadwa</b><br></p>',	'http://localhost/adminer2/?username=root&db=muniaa&table=accountability',	0,	'2024-06-02 22:40:47',	'2024-06-02 22:45:30',	'2024-06-02 22:45:30'),
(2,	'RENDICION',	'rendicion',	'/img/accountability/17173501811717350181fb-f-logo-blue-512png.png',	'/img/accountability/17173501811717350181instagramjpg.jpg',	'<p>DDDDDDDDDDDDDDDDDDD<br></p>',	'https://www.youtube.com/',	1,	'2024-06-02 22:43:01',	'2024-06-02 22:43:01',	NULL);

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oficio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `procedencia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `evento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ambito` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `duracion` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `asistencia` tinyint(1) NOT NULL,
  `derivado` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `observacion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_agenda_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_agenda_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `agenda` (`id`, `oficio`, `procedencia`, `evento`, `ambito`, `tipo`, `categoria`, `fecha`, `hora`, `duracion`, `lugar`, `descripcion`, `created`, `updated`, `usuario_id`, `asistencia`, `derivado`, `observacion`) VALUES
(66,	'1245',	'colegio MC',	'PREMIACION ALTO RENDIMIENTO DEL COLEGIO ',	'Local',	'Academico',	'Firmas',	'2015-03-25',	'16:00',	'',	'Mercado de ciuda nueva ',	'Mercado de ciuda nueva Mercado de ciuda nueva Mercado de ciuda nueva Mercado de ciuda nueva Mercado de ciuda nueva Mercado de ciuda nueva Mercado de ciuda nueva ',	'2015-03-25 20:53:00',	'2015-03-25 20:56:00',	1,	0,	'CPC Magdalena M. Mamani C. (G. Administr',	''),
(67,	'007',	'reunion',	'asds',	'Local',	'Academico',	'Audiencia',	'2015-04-03',	'21:00',	'',	'Mercado de ciuda nueva ',	'asdsdsda',	'2015-04-03 20:04:00',	'2015-04-16 13:25:00',	1,	1,	'Ing. Edy J. Aduvire V. (G.D.E.S) ',	''),
(68,	'007',	'Mercado Ciudad Nueva ',	'Modernizacion del mercado de ciudad nueva ',	'Regional',	'Cultural',	'Sesión de Consejo Extraordinaria',	'2015-04-17',	'12:00',	'',	'Auditorio MDCN',	'Modernizacion del Mercado Ciudad ',	'2015-04-17 10:28:00',	'2015-04-21 10:28:00',	1,	0,	'Ing. Elmer Robles P.(G.M.)',	'');

DROP TABLE IF EXISTS `city_council`;
CREATE TABLE `city_council` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_id` int(10) unsigned NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `city_council` (`id`, `position`, `icon`, `name`, `email`, `photo`, `commission_id`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Alcalde',	NULL,	'Juan Ramos Arocutipa',	NULL,	'https://drive.google.com/uc?id=1D1Av7xx4XZsJJBWHeekLHGYlXkA1AZ6M&export=media',	0,	0,	'2021-08-23 04:43:54',	'2023-03-31 09:10:01',	'2023-03-31 09:10:01'),
(2,	'Regidora',	NULL,	'Dra. Educación Estela Cecilia Gamero Lopez',	NULL,	'https://drive.google.com/uc?id=1CemVoPHrWiOaOKqWMOuGF5CBag8yQeVP&export=media',	0,	0,	'2021-08-23 04:43:54',	'2023-03-31 09:09:58',	'2023-03-31 09:09:58'),
(3,	'Regidor',	NULL,	'Ing. Pedro Augusto Lopez',	NULL,	'https://drive.google.com/uc?id=1gTmfHW0HDAkuC9g5OldBllSNxf0OVhYg&export=media',	0,	0,	'2021-08-23 04:43:54',	'2023-03-31 09:09:55',	'2023-03-31 09:09:55'),
(4,	'Regidor',	NULL,	'Sr.Cristian Joao Victor Barrientos Tintaya',	NULL,	'https://drive.google.com/uc?id=1YZSpqj7GxyTBOZDqGhFaq27rCrkmE_Kg&export=media',	0,	0,	'2021-08-23 04:43:59',	'2023-03-31 09:09:52',	'2023-03-31 09:09:52'),
(5,	'Regidora',	NULL,	'Sra. Elena Peralta Callacondo.',	NULL,	'https://drive.google.com/uc?id=12Ztwx-uI3o8J9pbYP0ucmbN2stIhC1KO&export=media',	0,	0,	'2021-08-23 04:44:03',	'2023-03-31 09:09:48',	'2023-03-31 09:09:48'),
(6,	'Regidora',	NULL,	'Abg. Magdalena del Rosario Mena Caipa',	'magdalena@gmail.com',	'https://drive.google.com/uc?id=1QS8RqDMM0as_9Ftbw7iNgVpyZKcRJntb&export=media',	0,	0,	'2021-08-23 04:44:07',	'2023-03-31 09:09:43',	'2023-03-31 09:09:43'),
(7,	'Barrendero',	NULL,	'Luisx',	'luis.charres.06@gmail.com',	NULL,	0,	0,	'2021-09-13 02:05:49',	'2021-09-13 02:06:10',	'2021-09-13 02:06:10'),
(8,	'Barrendero',	NULL,	'Luis',	'luis.charres.06@gmail.com',	'https://drive.google.com/uc?id=13JKWkjFZCTbvAMTZbGaMZvVLV6BCJPLh&export=media',	0,	0,	'2021-09-13 03:59:34',	'2023-03-31 09:09:38',	'2023-03-31 09:09:38'),
(9,	'prueba',	NULL,	'prueba',	'hola@gmail.com',	'/img/city_council/1685930492jpg',	0,	1,	'2023-06-05 07:01:32',	'2023-06-05 07:01:59',	'2023-06-05 07:01:59'),
(10,	'5',	'<i class=\"bi bi-bank2\"></i>',	'CONTADURIA',	'CT',	'/img/city_council/1717364504png',	5,	1,	'2024-06-03 02:41:44',	'2025-05-27 20:57:38',	NULL),
(11,	'10',	'<i class=\"bi bi-cash-stack\"></i>',	'TESORERIA',	'TR',	NULL,	4,	1,	'2024-07-16 04:44:10',	'2025-05-27 20:55:57',	NULL),
(12,	'13',	'<i class=\"bi bi-shield-fill-check\"></i>',	'SEGURIDAD',	'SDD',	NULL,	6,	1,	'2024-07-16 09:48:15',	'2025-05-27 20:55:19',	NULL);

DROP TABLE IF EXISTS `clave`;
CREATE TABLE `clave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `area` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `clave` (`id`, `usuario`, `clave`, `area`) VALUES
(1,	'imagen',	'mdcn123*',	'imagen'),
(2,	'declaraciones',	'tacnaperu123',	'declaraciones'),
(3,	'publicaciones',	'tacnaperu123456',	'imagen'),
(4,	'obras',	'tacnaperu123456',	'obras'),
(5,	'procesos',	'tacnaperu123',	'procesos'),
(6,	'seguridad',	'seguridadmdcn123*',	'seguridad ciudadana');

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `nombre` text NOT NULL,
  `telefono` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `comentarios` (`id`, `comentario`, `nombre`, `telefono`, `email`) VALUES
(3,	'Buenas tardes Sr. Alcalde de la M.D. de Ciudad Nueva, primeramento le felicito por su gestion que a travez de los tramites realizados es mas eficiente y eficaz en su trabajo laborioso.',	'Jackelin Ninaja Rivera',	'952703943',	'yackelin_1@hotmail.com');

DROP TABLE IF EXISTS `commissions`;
CREATE TABLE `commissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `president` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `members` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `commissions` (`id`, `title`, `president`, `members`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Comision 1',	'Yo',	'luis\r\nkarina\r\nx',	1,	'2021-09-13 02:26:01',	'2021-09-13 02:26:13',	'2021-09-13 02:26:13'),
(2,	'comision 1',	'comision',	'comisno \r\nacoamsod',	1,	'2023-06-05 07:02:14',	'2023-06-05 07:02:52',	'2023-06-05 07:02:52'),
(3,	'asda',	'asd',	'asdass',	1,	'2023-06-05 07:02:37',	'2023-06-05 07:02:49',	'2023-06-05 07:02:49'),
(4,	'1',	'JUANITO',	'PEPITO\r\nDIANA\r\nLA FOCA',	1,	'2024-06-03 02:49:16',	'2024-07-17 05:17:00',	NULL),
(5,	'2',	'',	'',	1,	'2024-07-16 09:42:35',	'2024-07-17 05:16:56',	NULL),
(6,	'3',	'',	'',	1,	'2024-07-17 02:34:36',	'2024-07-17 05:16:52',	NULL),
(7,	'Ventanilla 4',	'',	'',	1,	'2025-06-05 16:10:16',	'2025-06-05 16:10:16',	NULL);

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` int(11) NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `contents` (`id`, `title`, `url`, `model_type`, `model_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'pdf1',	'https://drive.google.com/uc?id=1xjb47XhlH-odZMOjRX8P8CCeqR4Gzi6v&export=media',	1,	6,	2,	'2021-08-16 09:15:47',	'2021-08-23 06:48:43',	'2021-08-23 06:48:43'),
(2,	'pdf2',	'https://drive.google.com/uc?id=1EGsMO8DWA6q81fAQsIbDJfuyx46sJNtC&export=media',	1,	6,	2,	'2021-08-16 09:15:51',	'2021-08-23 06:48:43',	'2021-08-23 06:48:43'),
(3,	'TY',	'https://drive.google.com/uc?id=14aT_lnEQmNSU_GIT1klkcpcVjerpvUlU&export=media',	1,	7,	2,	'2021-08-16 09:47:11',	'2023-04-03 03:06:41',	'2023-04-03 03:06:41'),
(4,	'da',	'https://drive.google.com/uc?id=1i1ypAFZaIyAe7dy8sQjLdEs14a7GIUZL&export=media',	2,	1,	2,	'2021-08-16 09:48:49',	'2021-08-23 06:55:24',	'2021-08-23 06:55:24'),
(5,	'archivonombre',	'https://drive.google.com/uc?id=18ns1hoA2Pnted5SUjkGyiEbUrt9PBYV8&export=media',	1,	8,	2,	'2021-08-23 06:49:34',	'2023-04-03 03:04:03',	'2023-04-03 03:04:03'),
(6,	'archivodocuints',	'https://drive.google.com/uc?id=1XGSrRzg11JTKQBlG_gSd8RSx-dene2zr&export=media',	2,	2,	2,	'2021-08-23 06:56:07',	'2023-04-03 03:09:55',	'2023-04-03 03:09:55'),
(7,	'VERSION 2019',	'https://drive.google.com/uc?id=1BjV_-MmK1BDjT3LmXnvOava4L3h5WZQl&export=media',	1,	7,	2,	'2021-11-05 12:22:11',	'2023-04-03 03:06:41',	'2023-04-03 03:06:41'),
(8,	'ROF',	'/files/documents/16804731901680473190pdf',	1,	9,	2,	'2023-04-03 03:06:30',	'2023-06-06 03:36:12',	'2023-06-06 03:36:12'),
(9,	'SEGURIDAD CIUDADANA',	'/files/documents/16804733891680473389pdf',	2,	4,	2,	'2023-04-03 03:09:49',	'2023-04-03 03:09:49',	NULL),
(10,	'ORGANIGRAMA',	'/files/documents/16804736121680473612pdf',	2,	5,	2,	'2023-04-03 03:13:32',	'2023-04-03 03:13:32',	NULL),
(11,	NULL,	'/files/documents/16860040591686004059pdf',	1,	10,	2,	'2023-06-06 03:27:39',	'2023-06-06 03:38:34',	'2023-06-06 03:38:34'),
(12,	'rff',	'/files/documents/16860046591686004659pdf',	1,	11,	2,	'2023-06-06 03:37:39',	'2023-06-06 03:40:29',	'2023-06-06 03:40:29'),
(13,	'xd',	'/files/documents/16860046591686004659pdf',	1,	11,	2,	'2023-06-06 03:37:39',	'2023-06-06 03:40:29',	'2023-06-06 03:40:29'),
(14,	'version 1',	'/files/documents/16860048091686004809pdf',	1,	12,	2,	'2023-06-06 03:40:09',	'2023-06-06 03:40:31',	'2023-06-06 03:40:31'),
(15,	'version 2',	'/files/documents/16860048091686004809pdf',	1,	12,	2,	'2023-06-06 03:40:09',	'2023-06-06 03:40:31',	'2023-06-06 03:40:31'),
(16,	'version 1',	'/files/documents/16860048891686004889pdf',	1,	13,	2,	'2023-06-06 03:41:29',	'2023-06-06 03:41:29',	NULL),
(17,	'version 2',	'/files/documents/16860048891686004889pdf',	1,	13,	2,	'2023-06-06 03:41:29',	'2023-06-06 03:41:29',	NULL),
(18,	'archivo',	'/files/documents/1686084840168608484015-aptos-resultado-final-casxlsxpdf.pdf',	2,	6,	2,	'2023-06-07 01:54:00',	'2023-06-07 19:53:51',	'2023-06-07 19:53:51'),
(19,	'archivo 1',	'/files/documents/168608500316860850035-resultados-de-remision-de-documentos-cas-006pdf.pdf',	2,	7,	2,	'2023-06-07 01:56:43',	'2023-06-07 19:52:16',	'2023-06-07 19:52:16'),
(20,	'archivo 2',	'/files/documents/16860850031686085003bases-006pdf.pdf',	2,	7,	2,	'2023-06-07 01:56:43',	'2023-06-07 19:52:16',	'2023-06-07 19:52:16'),
(21,	'Pdf',	'/files/documents/17170839301717083930crear-enlacepdf.pdf',	2,	8,	2,	'2024-05-30 20:45:30',	'2024-05-30 20:59:24',	'2024-05-30 20:59:24'),
(22,	'xddd',	'/files/documents/17171908971717190897pdf',	1,	15,	2,	'2024-06-01 02:28:17',	'2024-06-01 02:28:17',	NULL),
(23,	'dxxxxxxxx',	'/files/documents/17171914521717191452crear-enlacepdf.pdf',	2,	9,	2,	'2024-06-01 02:37:32',	'2024-06-01 02:37:32',	NULL),
(24,	'PDF RELACIONADO',	'/files/documents/17171916251717191625enlaces-servicios-favoritospdf.pdf',	2,	9,	2,	'2024-06-01 02:40:25',	'2024-06-01 02:40:25',	NULL),
(25,	'ENALCE 1',	'/files/accountability/17173501811717350181pdf',	1,	2,	3,	'2024-06-02 22:43:01',	'2024-06-02 22:43:01',	NULL),
(26,	'ddddddddddd',	'/files/accountability/17173502791717350279pdf',	1,	1,	3,	'2024-06-02 22:44:39',	'2024-06-02 22:45:30',	'2024-06-02 22:45:30');

DROP TABLE IF EXISTS `declaraciones`;
CREATE TABLE `declaraciones` (
  `idnor` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` text NOT NULL,
  `cargo` text NOT NULL,
  `depeorig` text NOT NULL,
  `dia` text NOT NULL,
  `mes` text NOT NULL,
  `ano` text NOT NULL,
  `nomfile` varchar(250) NOT NULL,
  `validado` text NOT NULL,
  PRIMARY KEY (`idnor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `declaraciones` (`idnor`, `empleado`, `cargo`, `depeorig`, `dia`, `mes`, `ano`, `nomfile`, `validado`) VALUES
(80,	'ARPASI VALERIANO YOEL',	'GERENTE',	'4',	'',	'',	'',	'decla_ARPASI.pdf',	'SI'),
(78,	'VARGAS TIPULA YURI ALEXEY',	'SUB GERENTE',	'14',	'',	'',	'',	'decla_VARGAS.pdf',	'NO'),
(81,	'CABANA PONCE LORENZO  ',	'GERENTE',	'29',	'',	'',	'',	'decla_CABANA.pdf',	'SI'),
(82,	'CACSI SANTIN EDUARDO  ',	'SUB GERENTE',	'12',	'',	'',	'',	'decla_CACSI.pdf',	'NO'),
(83,	'CAÑARI YAPUCHURA OBITO  ',	'SUB GERENTE',	'31',	'',	'',	'',	'decla_CANARI.pdf',	'NO'),
(84,	'CARAZAS TORRES LUZMILA',	'SUB GERENTE',	'5',	'',	'',	'',	'decla_CARAZAS.pdf',	'SI'),
(85,	'CHAMBE VEGA IVAN',	'JEFE',	'18',	'',	'',	'',	'decla_CHAMBE.pdf',	'SI'),
(86,	'CHOQUE QUISPE JOSE  ',	'REGIDOR',	'32',	'',	'',	'',	'decla_CHOQUE.pdf',	'SI'),
(87,	'GALLEGOS GALLEGOS CESAR  ',	'GERENTE',	'7',	'',	'',	'',	'decla_gallegos.pdf',	'SI'),
(88,	'GUILLERMO ACHO PEDRO  ',	'JEFE',	'19',	'',	'',	'',	'decla_GUILLERMO.pdf',	'SI'),
(89,	'HILASACA PAUCAR FREDY ',	'SUB GERENTE',	'10',	'',	'',	'',	'decla_hilasaca.pdf',	'SI'),
(92,	'HUALPA MAMANI JOSE  ',	'JEFE',	'22',	'',	'',	'',	'',	'SI'),
(93,	'LOAYZA GALLEGOS ELAN  ',	'SUB GERENTE',	'11',	'',	'',	'',	'decla_LOAIZA.pdf',	'NO'),
(95,	'MAMANI QUIÑONEZ TIBURCIO ',	'SUB GERENTE',	'16',	'',	'',	'',	'decla_MAMANI.pdf',	'NO'),
(96,	'MENDOZA INCHUÑA EFREN  ',	'SUB GERENTE',	'24',	'',	'',	'',	'decla_MENDOZA.pdf',	'SI'),
(97,	'MITA ALANOCA HUGO CECILIO  ',	'ALCALDE',	'32',	'',	'',	'',	'decla_MITA.pdf',	'SI'),
(98,	'RODRIGUEZ AYCA GREGORIO  ',	'SUB GERENTE',	'15',	'',	'',	'',	'decla_RODRIGUEZ.pdf',	'SI'),
(99,	'ROQUE MAQUERA SERGIO',	'GERENTE',	'8',	'',	'',	'',	'decla_ROQUE.pdf',	'SI'),
(100,	'TAPIA LUCERO JESUS  ',	'GERENTE',	'6',	'',	'',	'',	'decla_TAPIA.pdf',	'SI'),
(101,	'TORRES TORRES MANUEL  ',	'JEFE',	'21',	'',	'',	'',	'decla_TORRES_TORRES.pdf',	'SI'),
(102,	'VALENCIA CANDIA DARIO  ',	'GERENTE',	'9',	'',	'',	'',	'decla_DARIO.pdf',	'NO'),
(109,	'CARDENAS ALE JAVI',	'JEFE',	'17',	'',	'',	'',	'decla_CARDENAS.pdf',	'SI'),
(103,	'ESCOBAR QUISPE DANIEL',	'REGIDOR',	'32',	'',	'',	'',	'decla_ESCOBAR.pdf',	'SI'),
(104,	'FERNANDEZ CHAPARRO HELMER JOEL',	'TENIENTE ALCALDE',	'32',	'',	'',	'',	'decla_FERNANDEZ_CHAPARRO.pdf',	'SI'),
(105,	'PALOMINO CHOQUE BENIGNO',	'REGIDOR',	'32',	'',	'',	'',	'decla_PALOMINO.pdf',	'SI'),
(106,	'PILCO CHIPANA ROGELIO',	'REGIDOR',	'32',	'',	'',	'',	'decla_PILCO.pdf',	'SI'),
(107,	'TORRES CHAPARRO MARCOS',	'REGIDOR',	'32',	'',	'',	'',	'decla_TORRES.pdf',	'SI'),
(108,	'MANUELO CHOQUE SUSANA SONIA',	'REGIDOR',	'32',	'',	'',	'',	'decla_CHOQUE_MANUELO.pdf',	'SI'),
(110,	'LOAYZA GUTIERREZ DULIA',	'JEFE',	'23',	'',	'',	'',	'decla_LOAYZA_GUTIERREZ.pdf',	'SI'),
(111,	'ARRATIA CABRERA TOMASINI',	'SUB GERENTE',	'16',	'',	'',	'',	'decla_ARRATIA.pdf',	'NO'),
(112,	'ROQUE CHURACUTIPA BLADIMIRO',	'SUB GERENTE',	'31',	'',	'',	'',	'decla_ROQUE_CHURACUTIPA.pdf',	'NO'),
(113,	'PACARI MAMANI YURI NILO',	'SUB GERENTE',	'34',	'',	'',	'',	'decla_PACARI.pdf',	'SI'),
(115,	'QUENTA ROQUE ROMMELL',	'SUB GERENTE',	'12',	'',	'',	'',	'decla_QUENTA_ROQUE.pdf',	'SI');

DROP TABLE IF EXISTS `document_types`;
CREATE TABLE `document_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `document_types` (`id`, `name`, `slug`, `description`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Acuerdo de Concejo',	'acuerdo-de-concejo',	NULL,	1,	'2024-05-30 04:40:15',	'2024-05-30 04:45:45',	'2024-05-30 04:45:45'),
(2,	'Ordenanza Municipal',	'ordenanza-municipal',	'dx',	1,	'2024-05-30 04:40:37',	'2024-05-30 04:41:01',	NULL),
(3,	'Resolución de Alcaldía',	'resolucion-de-alcaldia',	NULL,	1,	'2024-05-30 04:43:30',	'2024-05-30 04:43:30',	NULL),
(4,	'Acuerdo de Concejo',	'acuerdo-de-concejo',	'recreado',	1,	'2024-05-30 04:46:00',	'2024-05-30 04:46:00',	NULL);

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `area` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


DROP TABLE IF EXISTS `info_informacion`;
CREATE TABLE `info_informacion` (
  `in_id_informacion` int(11) NOT NULL AUTO_INCREMENT,
  `vc_titulo_informacion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `slug` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `vc_resumen_informacion` text COLLATE latin1_spanish_ci,
  `tx_contenido_informacion` text COLLATE latin1_spanish_ci,
  `dt_fecha_informacion` date DEFAULT NULL,
  `in_hits_informacion` int(11) NOT NULL DEFAULT '0',
  `foto1` text COLLATE latin1_spanish_ci NOT NULL,
  `foto1_path` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha_en` text COLLATE latin1_spanish_ci,
  `autor` text COLLATE latin1_spanish_ci NOT NULL,
  `dia` text COLLATE latin1_spanish_ci NOT NULL,
  `mes` text COLLATE latin1_spanish_ci NOT NULL,
  `ano` text COLLATE latin1_spanish_ci NOT NULL,
  `video` text COLLATE latin1_spanish_ci NOT NULL,
  `foto` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `foto_path` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `foto2` text COLLATE latin1_spanish_ci NOT NULL,
  `foto2_path` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `foto3` text COLLATE latin1_spanish_ci NOT NULL,
  `foto3_path` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `foto4` text COLLATE latin1_spanish_ci NOT NULL,
  `foto4_path` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `categoria` text COLLATE latin1_spanish_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`in_id_informacion`),
  FULLTEXT KEY `busqueda` (`vc_titulo_informacion`,`vc_resumen_informacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `info_informacion` (`in_id_informacion`, `vc_titulo_informacion`, `slug`, `vc_resumen_informacion`, `tx_contenido_informacion`, `dt_fecha_informacion`, `in_hits_informacion`, `foto1`, `foto1_path`, `tipo`, `fecha`, `fecha_en`, `autor`, `dia`, `mes`, `ano`, `video`, `foto`, `foto_path`, `foto2`, `foto2_path`, `foto3`, `foto3_path`, `foto4`, `foto4_path`, `categoria`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1394,	'prueba',	'prueba',	NULL,	'<p><br></p>',	NULL,	0,	'/img/news/168046994111b.jpg',	'',	'1',	'18/04/2023',	'2023-04-18',	'por hacer',	'02',	'04',	'2023',	'',	'/img/news/168046995300a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-04-03 02:12:08',	'2023-04-03 18:21:06',	'2023-04-03 18:21:06'),
(1391,	'CARNAVAL ESTIQUE PUEBLO 2023',	'carnaval-estique-pueblo-2023',	'CARNAVAL ESTIQUE PUEBLO 2023',	'<p>CARNAVAL ESTIQUE PUEBLO 2023</p>',	NULL,	0,	'',	'',	'1',	'24/02/2023',	'2023-02-24',	'por hacer',	'31',	'03',	'2023',	'',	'/img/news/168023787400a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-03-31 09:20:08',	'2023-03-31 20:36:13',	NULL),
(1392,	'CARNAVAL ESTIQUE PUEBLO 2023',	'carnaval-estique-pueblo-2023',	'CARNAVAL ESTIQUE PUEBLO 2023',	'<p>CARNAVAL ESTIQUE PUEBLO 2023</p>',	NULL,	0,	'',	'',	'1',	'23/02/2023',	'2023-02-23',	'por hacer',	'31',	'03',	'2023',	'',	'/img/news/168023790700a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-03-31 09:45:07',	'2023-03-31 20:36:06',	NULL),
(1393,	'CARNAVAL ESTIQUE PUEBLO 2023',	'carnaval-estique-pueblo-2023',	'CARNAVAL ESTIQUE PUEBLO 2023',	'<p>CARNAVAL ESTIQUE PUEBLO 2023</p>',	NULL,	0,	'',	'',	'1',	'22/02/2023',	'2023-02-22',	'por hacer',	'31',	'03',	'2023',	'',	'/img/news/168023792600a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-03-31 09:45:26',	'2023-03-31 20:35:58',	NULL),
(1395,	'La municipalidad de Estique \"Incentivando el inicio del año escolar 2023\"',	'la-municipalidad-de-estique-incentivando-el-inicio-del-ano-escolar-2023',	'La municipalidad de Estique \"Incentivando el inicio del año escolar 2023\"\r\n\r\nLa alcaldesa de Estique, Prof. Teodocia M. Espinoza Mamani, en compañía de los regidores y funcionarios, encabezaron la actividad de donación de  útiles escolares a los estudiantes de inicial, primaria y secundaria de Estique y Talabaya, por el buen inicio del año escolar 2023',	'<p>La municipalidad de Estique \"Incentivando el inicio del año escolar 2023\"</p><p><span style=\"font-size: 1rem;\">La alcaldesa de Estique, Prof. Teodocia M. Espinoza Mamani, en compañía de los regidores y funcionarios, encabezaron la actividad de donación de&nbsp; útiles escolares a los estudiantes de inicial, primaria y secundaria de Estique y Talabaya, por el buen inicio del año escolar 2023</span><br></p>',	NULL,	0,	'/img/news/168239196111b.jpg',	'',	'1',	'14/04/2023',	'2023-04-14',	'por hacer',	'25',	'04',	'2023',	'',	'/img/news/168239196100a.jpg',	'',	'/img/news/168239196122c.jpg',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-04-25 08:02:57',	'2023-04-25 08:12:36',	'2023-04-25 08:12:36'),
(1396,	'\"Seguridad ante todo\"',	'seguridad-ante-todo',	'\"Seguridad ante todo\" \r\n\r\nEl pasado miércoles 12 de Abril del 2023 la Municipalidad distrital de Estique realizo una reunión con el comisario PNP  del puesto policial de Estique Pampa acompañado de su jefe inmediato de Tacna  y conjuntamente con la alcaldesa de la Municipalidad de Estique. \r\nLa finalidad de esta reunión es llevar acabo las coordinaciones de un plan de seguridad con el fin de garantizar la seguridad y tranquilidad de los pobladores de Estique, Talabaya y Palquilla\r\nAgradecer el apoyo y voluntad de nuestra policía nacional del Peru en garantizar la seguridad y tranquilidad de nuestro distrito de Estique',	'<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word;\"><div dir=\"auto\" style=\"text-align: center; \"><font color=\"#050505\" face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\"><span style=\"font-size: 18px; white-space: pre-wrap;\"><b>\"Seguridad ante todo\" </b></span></font></div><div dir=\"auto\" style=\"\"><font color=\"#050505\" face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15px; white-space: pre-wrap;\"><br></span></font><br></div><div dir=\"auto\" style=\"color: rgb(5, 5, 5); font-family: inherit; font-size: 15px; white-space: pre-wrap;\">El pasado miércoles 12 de Abril del 2023 la Municipalidad distrital de Estique realizo una reunión con el comisario PNP  del puesto policial de Estique Pampa acompañado de su jefe inmediato de Tacna  y conjuntamente con la alcaldesa de la Municipalidad de Estique. </div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">La finalidad de esta reunión es llevar acabo las coordinaciones de un plan de seguridad con el fin de garantizar la seguridad y <span style=\"font-family: inherit;\"><a tabindex=\"-1\" style=\"color: rgb(56, 88, 152); cursor: pointer; font-family: inherit;\"></a></span>tranquilidad de los pobladores de Estique, Talabaya y Palquilla</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">Agradecer el apoyo y voluntad de nuestra policía nacional del Peru en garantizar la seguridad y tranquilidad de nuestro distrito de Estique </div></div>',	NULL,	0,	'',	'',	'1',	'18/04/2023',	'2023-04-18',	'por hacer',	'25',	'04',	'2023',	'',	'/img/news/168239261700a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-04-25 08:16:57',	'2023-04-25 08:16:57',	NULL),
(1397,	'La Municipalidad del Distrito de Estique en una actividad programada en el Anexo de Palquilla',	'la-municipalidad-del-distrito-de-estique-en-una-actividad-programada-en-el-anexo-de-palquilla',	'La Municipalidad del Distrito de Estique en una actividad programada en el Anexo de Palquilla se realizó con éxitos  la reunión con la población con la finalidad de realizar  la elección del  nuevo Agente Municipal que en esta oportunidad recaerá la responsabilidad a la Señora Francisca Osnayo Alférez pobladora del anexo de Palquilla\r\nLa Municipalidad de Estique que tiene como máxima autoridad edil a la Alcaldesa Prof. Teodocia M. Espinoza Mamani conjuntamente con plancha de regidores y autoridades del distrito viene trabajando arduamente y de modo continuo por el desarrollo del distrito',	'<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word;\"><div dir=\"auto\" style=\"text-align: center; \"><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xdj266r x126k92a\" style=\"margin: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; text-align: left;\"><div dir=\"auto\" style=\"font-family: inherit;\">La Municipalidad del Distrito de Estique en una actividad programada en el Anexo de Palquilla se realizó con éxitos  la reunión con la población con la finalidad de realizar  la elección del  nuevo Agente Municipal que en esta oportunidad recaerá la responsabilidad a la Señora Francisca Osnayo Alférez pobladora del anexo de Palquilla</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; text-align: left;\"><div dir=\"auto\" style=\"font-family: inherit;\">La Municipalidad de Estique que tiene como máxima autoridad edil a la Alcaldesa Prof. Teodocia M. Espinoza Mamani <span style=\"font-family: inherit;\"><a tabindex=\"-1\" style=\"color: rgb(56, 88, 152); cursor: pointer; font-family: inherit;\"></a></span>conjuntamente con plancha de regidores y autoridades del distrito viene trabajando arduamente y de modo continuo por el desarrollo del distrito </div></div></div></div>',	NULL,	0,	'/img/news/168239269711b.jpg',	'',	'1',	'17/04/2023',	'2023-04-17',	'por hacer',	'25',	'04',	'2023',	'',	'/img/news/168239269700a.jpg',	'',	'/img/news/168239269722c.jpg',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-04-25 08:18:17',	'2023-04-25 08:18:17',	NULL),
(1398,	'La Municipalidad Distrital de Estique, en coordinación con la comunidad de Palquilla realizaron la actividad de inspección  del reservorio de agua de uso poblacional',	'la-municipalidad-distrital-de-estique-en-coordinacion-con-la-comunidad-de-palquilla-realizaron-la-actividad-de-inspeccion-del-reservorio-de-agua-de-uso-poblacional',	'La Municipalidad Distrital de Estique, en coordinación con la comunidad de Palquilla realizaron la actividad de inspección  del reservorio de agua de uso poblacional',	'<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word;\"><div dir=\"auto\" style=\"text-align: center; \"><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xdj266r x126k92a\" style=\"margin: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-family: \" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" rgb(5,=\"\" 5,=\"\" 5);=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" left;\"=\"\"><ul><li style=\"font-family: inherit;\"><span style=\"color: rgb(5, 5, 5); font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; text-align: start;\">La Municipalidad Distrital de Estique, en coordinación con la comunidad de Palquilla realizaron la actividad de inspección  del reservorio de agua de uso poblacional</span><br></li></ul></div></div></div>',	NULL,	0,	'/img/news/168239276211b.jpg',	'',	'1',	'17/04/2023',	'2023-04-17',	'por hacer',	'25',	'04',	'2023',	'',	'/img/news/171726442400a.png',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	1,	'2023-04-25 08:19:22',	'2024-06-01 22:53:44',	NULL),
(1399,	'La Municipalidad Distrital de Estique, en coordinación con la comunidad de Palquilla realizaron la actividad de inspección  del reservorio de agua de uso poblacional',	'la-municipalidad-distrital-de-estique-en-coordinacion-con-la-comunidad-de-palquilla-realizaron-la-actividad-de-inspeccion-del-reservorio-de-agua-de-uso-poblacional',	'La Municipalidad Distrital de Estique, en coordinación con la comunidad de Palquilla realizaron la actividad de inspección  del reservorio de agua de uso poblacional\r\n\r\nCon el compromiso que tenemos con la población de nuestro querido distrito  de Estique, nuestra Máxima autoridad la Alcaldesa Teodocia M Espinoza Mamani conjuntamente con su plancha de regidores y autoridades del distrito,  dieron inicio a la obra de \"MEJORAMIENTO DE LA TOMA PRINCIPAL DEL CANAL CIRCA\" del distrito de Estique beneficiando a la población del distrito. \r\nLa iniciativa municipal, es una de las distintas actividades que se vienen realizando, y a su ves indicar  que se vendrán más actividades en beneficios a la población.',	'<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word;\"><div dir=\"auto\" style=\"text-align: center; \"><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xdj266r x126k92a\" style=\"margin: 0px; overflow-wrap: break-word;\" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" rgb(5,=\"\" 5,=\"\" 5);=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" left;\"=\"\"><p style=\"\"><div style=\"font-family: inherit; white-space: pre-wrap; text-align: justify;\"><span style=\"color: rgb(5, 5, 5); font-family: inherit; font-size: 1rem;\">La Municipalidad Distrital de Estique, en coordinación con la comunidad de Palquilla realizaron la actividad de inspección  del reservorio de agua de uso poblacional</span></div><span style=\"\" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" start;\"=\"\"><div style=\"text-align: justify;\"><font color=\"#050505\"><span style=\"white-space: pre-wrap;\"><br></span></font></div><font color=\"#050505\" face=\"inherit\"><span style=\"white-space: pre-wrap;\">Con el compromiso que tenemos con la población de nuestro querido distrito  de Estique, nuestra Máxima autoridad la Alcaldesa Teodocia M Espinoza Mamani conjuntamente con su plancha de regidores y autoridades del distrito,  dieron inicio a la obra de \"MEJORAMIENTO DE LA TOMA PRINCIPAL DEL CANAL CIRCA\" del distrito de Estique beneficiando a la población del distrito. \r\n<div style=\"text-align: justify;\"><span style=\"font-family: inherit; font-size: 1rem;\">La iniciativa municipal, es una de las distintas actividades que se vienen realizando, y a su ves indicar  que se vendrán más actividades en beneficios a la población.</span></div></span></font></span></p></div></div></div>',	NULL,	0,	'/img/news/168239283011b.jpg',	'',	'1',	'16/04/2023',	'2023-04-16',	'por hacer',	'25',	'04',	'2023',	'',	'/img/news/171726441400a.jpg',	'',	'/img/news/168239283022c.jpg',	'',	'',	'',	'',	'',	'por hacer',	1,	'2023-04-25 08:20:30',	'2024-06-01 22:53:34',	NULL),
(1400,	'La municipalidad de Estique \"Incentivando el inicio del año escolar 2023\"',	'la-municipalidad-de-estique-incentivando-el-inicio-del-ano-escolar-2023',	'La alcaldesa de Estique, Prof. Teodocia M. Espinoza Mamani, en compañía de los regidores y funcionarios, encabezaron la actividad de donación de  útiles escolares a los estudiantes de inicial, primaria y secundaria de Estique y Talabaya, por el buen inicio del año escolar 2023',	'<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word;\"><div dir=\"auto\" style=\"text-align: center; \"><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xdj266r x126k92a\" style=\"margin: 0px; overflow-wrap: break-word;\" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" rgb(5,=\"\" 5,=\"\" 5);=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" left;\"=\"\"><p style=\"\"></p><div style=\"text-align: justify;\"><span style=\"text-align: start;\"><font color=\"#050505\" face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15px; white-space: pre-wrap;\"> La municipalidad de Estique \"Incentivando el inicio del año escolar 2023\"</span></font></span></div><div style=\"text-align: justify;\"><span style=\"text-align: start;\"><font color=\"#050505\" face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15px; white-space: pre-wrap;\"><br></span></font><br></span></div><div style=\"font-family: inherit; white-space: pre-wrap; text-align: justify;\"><span style=\"color: rgb(5, 5, 5); font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; text-align: start;\">La alcaldesa de Estique, Prof. Teodocia M. Espinoza Mamani, en compañía de los regidores y funcionarios, encabezaron la actividad de donación de  útiles escolares a los estudiantes de inicial, primaria y secundaria de Estique y Talabaya, por el buen inicio del año escolar 2023</span><br></div><p></p></div></div></div>',	NULL,	0,	'/img/news/168239287411b.jpg',	'',	'1',	'15/04/2023',	'2023-04-15',	'por hacer',	'25',	'04',	'2023',	'',	'/img/news/171726440600a.png',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	1,	'2023-04-25 08:21:14',	'2024-06-01 22:53:26',	NULL),
(1401,	'probando',	'probando',	'probando',	'<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0.5em 0px 0px; overflow-wrap: break-word;\"><div dir=\"auto\" style=\"text-align: center; \"><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xdj266r x126k92a\" style=\"margin: 0px; overflow-wrap: break-word;\" segoe=\"\" ui=\"\" historic\",=\"\" \"segoe=\"\" ui\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" rgb(5,=\"\" 5,=\"\" 5);=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" left;\"=\"\"><p style=\"\"></p><div style=\"text-align: justify;\"><span style=\"text-align: start;\"><font face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\" color=\"#050505\"><span style=\"font-size: 15px; white-space: pre-wrap;\"> La municipalidad de Estique \"Incentivando el inicio del año escolar 2023\"</span></font></span></div><div style=\"text-align: justify;\"><span style=\"text-align: start;\"><font face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\" color=\"#050505\"><span style=\"font-size: 15px; white-space: pre-wrap;\"><br></span></font><br></span></div><div style=\"font-family: inherit; white-space: pre-wrap; text-align: justify;\"><span style=\"color: rgb(5, 5, 5); font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 15px; text-align: start;\">La alcaldesa de Estique, Prof. Teodocia M. Espinoza Mamani, en compañía de los regidores y funcionarios, encabezaron la actividad de donación de  útiles escolares a los estudiantes de inicial, primaria y secundaria de Estique y Talabaya, por el buen inicio del año escolar 2023</span><br></div><p></p></div></div></div>',	NULL,	0,	'',	'',	'1',	'26/04/2023',	'2023-04-26',	'por hacer',	'26',	'04',	'2023',	'',	'/img/news/168247240300a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-04-26 06:26:43',	'2023-04-26 06:27:06',	'2023-04-26 06:27:06'),
(1402,	'probaando ando',	'probaando-ando',	'awdad',	'<p>adwawd<br></p>',	NULL,	0,	'',	'',	'1',	'19/04/2023',	'2023-04-19',	'por hacer',	'26',	'04',	'2023',	'awda',	'/img/news/168247971200a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-04-26 08:26:48',	'2023-04-26 08:32:52',	'2023-04-26 08:32:52'),
(1403,	'probando ando',	'probando-ando',	'awdad',	'<p>adwawdawda<br></p>',	NULL,	0,	'',	'',	'1',	'24/04/2023',	'2023-04-24',	'por hacer',	'26',	'04',	'2023',	'',	'/img/banners/168248024500a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-04-26 08:33:43',	'2023-05-17 08:33:53',	'2023-05-17 08:33:53'),
(1404,	'Dia de la Madre',	'dia-de-la-madre',	'Hoy a partir de las 9.00am  se estará realizando la entrega de presentes a las madres residentes Estiqueñas en el local Pumacahua 390  de Para grande',	'<p>Hoy a partir de las 9.00am&nbsp; se estará realizando la entrega de presentes a las madres residentes Estiqueñas en el local Pumacahua 390&nbsp; de Para grande<br></p>',	NULL,	0,	'',	'',	'1',	'11/05/2023',	'2023-05-11',	'por hacer',	'27',	'05',	'2023',	'',	'/img/news/168521515200a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-05-28 00:19:12',	'2023-06-07 19:43:49',	NULL),
(1405,	'prueba',	'prueba',	NULL,	'<p><br></p>',	NULL,	0,	'',	'',	'1',	'26/05/2023',	'2023-05-26',	'por hacer',	'28',	'05',	'2023',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	0,	'2023-05-28 10:08:12',	'2023-05-28 10:08:18',	'2023-05-28 10:08:18'),
(1406,	'cvxc',	'cvxc',	'xcvxcv',	'<p>xcvxcv</p>',	NULL,	0,	'',	'',	'1',	'13/06/2023',	'2023-06-13',	'por hacer',	'05',	'06',	'2023',	'',	'/img/news/168593084000a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	1,	'2023-06-05 07:07:20',	'2023-06-05 07:08:16',	'2023-06-05 07:08:16'),
(1407,	'NOTICIA PRUEBA 1',	'noticia-prueba-1',	'RESUMEN PRUEBA 1',	'<p><b><i><u>DESCRIPCION PRUEBA 1</u></i></b><br></p>',	NULL,	0,	'',	'',	'1',	'05/06/2023',	'2023-06-05',	'por hacer',	'05',	'06',	'2023',	'',	'/img/news/168600575700a.jpg',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	1,	'2023-06-06 03:55:57',	'2023-06-06 08:41:00',	'2023-06-06 08:41:00'),
(1408,	'Noticia',	'noticia',	'qwdqdq',	'<p>d<b>esc</b><i>awdawda</i><br></p>',	NULL,	0,	'/img/news/171734255211b.png',	'',	'1',	'28/06/2024',	'2024-06-28',	'por hacer',	'02',	'06',	'2024',	'https://www.youtube.com/',	'/img/news/171734255200a.png',	'',	'/img/news/171734255222c.png',	'',	'',	'',	'',	'',	'por hacer',	1,	'2024-06-02 20:35:52',	'2024-06-02 20:39:38',	NULL),
(1409,	'Titulo',	'titulo',	'resumen',	'<p>desc<br></p>',	NULL,	0,	'',	'',	'1',	'27/06/2024',	'2024-06-27',	'por hacer',	'02',	'06',	'2024',	'https://www.youtube.com/',	'',	'',	'',	'',	'',	'',	'',	'',	'por hacer',	1,	'2024-06-02 20:40:06',	'2024-06-02 20:40:11',	'2024-06-02 20:40:11');

DROP TABLE IF EXISTS `institutional_documents`;
CREATE TABLE `institutional_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `institutional_documents` (`id`, `title`, `slug`, `description`, `image`, `external_image`, `acronym`, `published`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'TUPA',	'tupa',	NULL,	NULL,	NULL,	'TUPA',	0,	NULL,	'2021-08-16 09:03:29',	'2023-04-03 03:06:45',	'2023-04-03 03:06:45'),
(2,	'adwwad',	'adwwad',	NULL,	NULL,	NULL,	'adwwad',	0,	NULL,	'2021-08-16 09:08:48',	'2021-08-23 06:48:27',	'2021-08-23 06:48:27'),
(3,	'adwawdadad',	'adwawdadad',	NULL,	NULL,	NULL,	'adwada',	0,	NULL,	'2021-08-16 09:09:45',	'2021-08-23 06:48:31',	'2021-08-23 06:48:31'),
(4,	'qwqwdqwdq',	'qwqwdqwdq',	NULL,	NULL,	NULL,	'qwdq',	0,	NULL,	'2021-08-16 09:10:15',	'2021-08-23 06:48:34',	'2021-08-23 06:48:34'),
(5,	'wdqdqdqd',	'wdqdqdqd',	NULL,	NULL,	NULL,	'fwf',	0,	NULL,	'2021-08-16 09:13:46',	'2021-08-23 06:48:37',	'2021-08-23 06:48:37'),
(6,	'wdqdwqdqdwq',	'wdqdwqdqdwq',	NULL,	NULL,	NULL,	'dwqd',	0,	NULL,	'2021-08-16 09:15:41',	'2021-08-23 06:48:43',	'2021-08-23 06:48:43'),
(7,	'MOF',	'mof',	NULL,	NULL,	NULL,	'MOF',	0,	NULL,	'2021-08-16 09:47:07',	'2023-04-03 03:06:41',	'2023-04-03 03:06:41'),
(8,	'ROF',	'rof',	NULL,	NULL,	NULL,	'ROF',	0,	NULL,	'2021-08-23 06:49:29',	'2023-04-03 03:04:03',	'2023-04-03 03:04:03'),
(9,	'REGLAMENTO DE ORGANIZACIONES DE FUNCIONES',	'reglamento-de-organizaciones-de-funciones',	NULL,	NULL,	NULL,	'ROF',	1,	NULL,	'2023-04-03 03:06:30',	'2023-06-06 03:36:12',	'2023-06-06 03:36:12'),
(10,	'I AUDIENCIA PUBLICA - RENDICION DE CUENTAS',	'i-audiencia-publica-rendicion-de-cuentas',	NULL,	NULL,	NULL,	'I AUDIENCIA PÚBLICA',	1,	NULL,	'2023-06-01 00:04:30',	'2023-06-06 03:38:34',	'2023-06-06 03:38:34'),
(11,	'adwad',	'adwad',	NULL,	NULL,	NULL,	'awd',	1,	NULL,	'2023-06-06 03:37:39',	'2023-06-06 03:40:29',	'2023-06-06 03:40:29'),
(12,	'REGLAMENTO DE ORGANIZACIONES',	'reglamento-de-organizaciones',	NULL,	NULL,	NULL,	'ROF',	1,	NULL,	'2023-06-06 03:40:09',	'2023-06-06 03:40:31',	'2023-06-06 03:40:31'),
(13,	'REGLAMENTO DE ORGANIZACIONES',	'reglamento-de-organizaciones',	NULL,	NULL,	NULL,	'ROF',	1,	NULL,	'2023-06-06 03:41:29',	'2023-06-06 03:41:29',	NULL),
(14,	'I AUDIENCIA PUBLICA - RENDICION DE CUENTAS',	'i-audiencia-publica-rendicion-de-cuentas',	NULL,	NULL,	NULL,	'I AUDIENCIA PUBLICA - RENDICION DE CUENTAS',	1,	NULL,	'2023-06-06 08:43:18',	'2023-06-06 08:43:18',	NULL),
(15,	'DOC INST',	'doc-inst',	'<p><b><i>DAWDA</i></b><br></p>',	'/img/documents/17171901521717190152towerjpg.jpg',	'/img/documents/17171901521717190152fb-f-logo-blue-512png.png',	'doc-inst',	1,	NULL,	'2024-05-30 22:23:26',	'2024-06-01 02:15:52',	NULL),
(16,	'FAVORITOWITH URL',	'favoritowith-url',	'<p>AWDADA<br></p>',	NULL,	NULL,	'favoritowith-url',	1,	'https://drive.google.com/drive/u/0/home',	'2024-06-04 02:20:36',	'2024-06-04 02:20:51',	NULL);

DROP TABLE IF EXISTS `last_documents`;
CREATE TABLE `last_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `last_documents` (`id`, `title`, `slug`, `description`, `acronym`, `url`, `image`, `external_image`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'negros en cartel',	'negros-en-cartel',	NULL,	'NC',	NULL,	NULL,	NULL,	0,	'2021-08-16 09:48:44',	'2021-08-23 06:55:24',	'2021-08-23 06:55:24'),
(2,	'documento insti',	'documento-insti',	NULL,	'docuinstsiglas',	NULL,	NULL,	NULL,	0,	'2021-08-23 06:56:01',	'2023-04-03 03:09:55',	'2023-04-03 03:09:55'),
(3,	'45353',	'45353',	NULL,	'ee',	NULL,	NULL,	NULL,	0,	'2021-09-12 21:28:19',	'2023-04-03 03:02:31',	'2023-04-03 03:02:31'),
(4,	'PLAN DE ACCIÓN DISTRITAL DE SEGURIDAD CIUDADANA',	'plan-de-accion-distrital-de-seguridad-ciudadana',	NULL,	'SEGURIDAD CIUDADANA',	NULL,	NULL,	NULL,	1,	'2023-04-03 03:09:49',	'2023-06-06 02:06:36',	NULL),
(5,	'ESTRUCTURA ORGÁNICA DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'estructura-organica-de-la-municipalidad-distrital-de-estique',	NULL,	'ORGANIGRAMA',	NULL,	NULL,	NULL,	1,	'2023-04-03 03:13:32',	'2023-06-06 02:06:31',	NULL),
(6,	'I AUDIENCIA PUBLICA - RENDICION DE CUENTAS',	'i-audiencia-publica-rendicion-de-cuentas',	NULL,	'I AUDIENCIA PUBLICA - RENDICION DE CUENTAS',	NULL,	NULL,	NULL,	1,	'2023-06-01 00:05:53',	'2023-06-07 19:53:51',	'2023-06-07 19:53:51'),
(7,	'Otro documento b',	'otro-documento-b',	NULL,	'ODB',	NULL,	NULL,	NULL,	1,	'2023-06-07 01:56:43',	'2023-06-07 19:52:16',	'2023-06-07 19:52:16'),
(8,	'Probando 1 23',	'probando-1-23',	'<p><b><i>any textxxxxx</i>xxxx</b><br></p>',	'probando-1-23',	'https://www.youtube.com/watch?v=zJgNnQD6ljM',	'/img/documents/1717084425171708442565611272-2393123590749011-2462071714461253632-njpg.jpg',	'/img/documents/17170844861717084486tower-of-fantasy-tsubasa-5jpg.jpg',	0,	'2024-05-30 20:44:24',	'2024-05-30 20:59:24',	'2024-05-30 20:59:24'),
(9,	'OTRO DOCUMENTO IMPORTANTE',	'otro-documento-importante',	'<p><strong>L<i>orem Ipsum</i></strong><b><i> is simply dummy text of the printing and\r\n typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</i></b></p><p></p>',	'otro-documento-importante',	'https://x.com/home',	'/img/documents/17171916251717191625fb-f-logo-blue-512png.png',	'/img/documents/17171916251717191625fb-icon-325x325png.png',	1,	'2024-06-01 02:37:32',	'2024-06-01 02:40:25',	NULL);

DROP TABLE IF EXISTS `matrimonio`;
CREATE TABLE `matrimonio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novio_nombre` text NOT NULL,
  `novio_dni` text NOT NULL,
  `novio_edad` text NOT NULL,
  `novia_nombre` text NOT NULL,
  `novia_dni` text NOT NULL,
  `novia_edad` text NOT NULL,
  `foto` text NOT NULL,
  `ano` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `matrimonio` (`id`, `novio_nombre`, `novio_dni`, `novio_edad`, `novia_nombre`, `novia_dni`, `novia_edad`, `foto`, `ano`) VALUES
(1,	'Hacked by over-x',	'41995704',	'28',	'Hacked by over-x',	'41248191',	'29',	'foto01.jpg',	'2011'),
(2,	'Hacked by over-x',	'45040449',	'23',	'Hacked by over-x',	'45128575',	'23',	'foto01.jpg',	'2011'),
(3,	'JUAN RAUL APAZAO AQUINO',	'43138142',	'34',	'NANCY ALICIA ROQUE LAYME',	'00792110',	'36',	'foto01.jpg',	'2011'),
(4,	'DANIEL EZEQUIEL CRUZ RAMIREZ',	'30941190',	'45',	'GLADIS GUADALUPE PORTOCARRERO RAMIREZ',	'04743406',	'37',	'foto01.jpg',	'2011'),
(5,	'NAZARIO HUACCA COAQUIRA',	'00449594',	'58',	'BEATRIZ CONDORI MAMANI',	'00447903',	'53',	'foto01.jpg',	'2011'),
(6,	'OBER ESTEBAN MENESES RIVERA',	'47053904',	'21',	'ROSMERY QUISPE MAMANI',	'74287628',	'16',	'',	'2011'),
(7,	'MIGUEL ANGEL ESPINOZA MAQUERA',	'46214024',	'27',	'GABRIELA DORA MAMANI ZAMBRANO',	'44810905',	'24',	'',	'2011'),
(8,	'JOSE LUIS CHURA CHURA',	'41841464',	'28',	'DORIS GLORIA COAQUIRA CARRILLO',	'41063238',	'30',	'',	'2011'),
(9,	'DANIEL ELIAS RODRIGUEZ FLORES',	'41451714',	'29',	'GUISELLA MAXIMINA CORCINO BAZALAR',	'43493520',	'27',	'',	'2011'),
(10,	'MAXIMO CONDORI LAURA',	'00503208',	'62',	'ISIDORA MAMANI CEREZO',	'00503296',	'57',	'',	'2011'),
(11,	'Hacked by over-x',	'71920648',	'17',	'Hacked by over-x',	'71275538',	'16',	'',	'2011'),
(12,	'Hacked by over-x',	'',	'',	'',	'',	'',	'',	'');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `controlador` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `accion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `menu` (`id`, `name`, `created`, `updated`, `controlador`, `accion`, `url`, `orden`) VALUES
(1,	'Inicio',	'2014-07-07 10:56:30',	'2020-06-15 11:59:00',	'agenda',	'index',	'',	1),
(25,	'Configurar Menu ',	'2014-07-07 11:17:00',	'2015-03-13 16:55:00',	'menu',	'index',	'',	4),
(26,	'Administrar Usuarios',	'2014-07-07 11:18:00',	'2015-03-13 16:56:00',	'usuario',	'index',	'',	5),
(27,	'Configurar Perfiles',	'2014-07-07 11:18:00',	'2015-03-13 16:55:00',	'perfil',	'index',	'',	4),
(32,	'Administrar Asistencia',	'2014-07-07 22:50:00',	'2015-03-13 16:47:00',	'agenda',	'asistencia',	'',	7),
(33,	'Eventos Próximos ',	'2014-07-09 15:09:00',	'2015-03-13 16:51:00',	'agenda',	'next_events',	'',	2),
(34,	'Crear Nuevo Evento',	'2015-03-06 17:52:00',	'2015-03-13 16:49:00',	'agenda',	'create',	'',	3),
(35,	'Eventos de Hoy',	'2015-03-09 15:05:00',	'2015-03-09 15:05:00',	'agenda',	'today_events',	'',	1),
(36,	'Configurar Accesos',	'2015-03-10 20:46:00',	'2015-03-13 16:56:00',	'menu_perfil',	'index',	'',	4),
(37,	'Eventos Derivados ',	'2015-03-11 14:43:00',	'2015-03-13 16:47:00',	'agenda',	'no_asist',	'',	2),
(38,	'Eventos Asistidos Alcalde',	'2015-03-11 14:51:00',	'2015-03-13 16:47:00',	'agenda',	'asist',	'',	2),
(39,	'Salir Sesión',	'2015-03-13 16:58:00',	'2015-03-13 16:58:00',	'home',	'salir',	'',	10),
(40,	'Cambiar Contraseña',	'2015-03-13 17:00:00',	'2015-03-13 17:00:00',	'home',	'cambio_clave',	'',	9);

DROP TABLE IF EXISTS `menu_perfil`;
CREATE TABLE `menu_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `perfil_id` (`perfil_id`),
  CONSTRAINT `menu_perfil_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  CONSTRAINT `menu_perfil_ibfk_2` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `menu_perfil` (`id`, `created`, `updated`, `menu_id`, `perfil_id`) VALUES
(1,	'2014-07-07 10:56:59',	'2014-07-07 10:57:02',	1,	1),
(3,	'2014-07-17 17:26:00',	'2014-07-17 17:26:00',	1,	9),
(5,	'2015-03-03 15:11:00',	'2015-03-03 15:11:00',	26,	1),
(8,	'2015-03-03 15:12:00',	'2015-03-03 15:12:00',	32,	1),
(9,	'2015-03-03 15:12:00',	'2015-03-03 15:12:00',	32,	9),
(11,	'2015-03-03 15:12:00',	'2015-03-03 15:12:00',	33,	1),
(12,	'2015-03-03 15:12:00',	'2015-03-03 15:12:00',	33,	9),
(14,	'2015-03-09 18:23:00',	'2015-03-09 18:23:00',	25,	1),
(15,	'2015-03-09 18:23:00',	'2015-03-09 18:23:00',	27,	1),
(19,	'2015-03-09 18:24:00',	'2015-03-09 18:24:00',	34,	1),
(21,	'2015-03-09 18:24:00',	'2015-03-09 18:24:00',	35,	1),
(22,	'2015-03-09 18:24:00',	'2015-03-09 18:24:00',	35,	9),
(23,	'2015-03-10 20:47:00',	'2015-03-10 20:47:00',	36,	1),
(24,	'2015-03-13 17:10:00',	'2015-03-13 17:10:00',	34,	9),
(25,	'2015-03-13 17:10:00',	'2015-03-13 17:10:00',	40,	1),
(26,	'2015-03-13 17:10:00',	'2015-03-13 17:10:00',	40,	9),
(27,	'2015-03-13 17:10:00',	'2015-03-13 17:10:00',	39,	1),
(28,	'2015-03-13 17:10:00',	'2015-03-13 17:10:00',	39,	9),
(29,	'2015-03-13 17:10:00',	'2015-03-13 17:10:00',	38,	1),
(30,	'2015-03-13 17:10:00',	'2015-03-13 17:10:00',	38,	9),
(31,	'2015-03-27 16:02:00',	'2015-03-27 16:02:00',	1,	18),
(32,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	39,	18),
(33,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	40,	18),
(34,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	38,	18),
(35,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	37,	1),
(36,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	37,	18),
(37,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	37,	9),
(38,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	35,	18),
(39,	'2015-03-27 16:03:00',	'2015-03-27 16:03:00',	33,	18),
(40,	'2015-03-27 16:04:00',	'2015-03-27 16:04:00',	34,	18),
(41,	'2015-03-27 16:05:00',	'2015-03-27 16:05:00',	32,	18);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2021_04_13_142905_modelos',	1),
(4,	'2021_05_03_204521_add_timestamps_to_info_information_table',	1),
(5,	'2021_05_03_212653_add_some_fields_to_info_informacion',	1),
(6,	'2021_05_06_161741_add_fecha_en_to_info_informacion_table',	1),
(7,	'2021_05_06_220524_add_timestamps_to_mw_convoca_table',	1),
(8,	'2021_05_06_220543_add_timestamps_to_norma_table',	1),
(9,	'2021_05_10_205022_add_type_timestamps_to_obra_table',	2),
(10,	'2021_05_10_210154_add_timestamps_to_obras_table',	2),
(11,	'2021_05_10_212838_add_foto_path_to_obra_table',	2),
(12,	'2021_05_11_173407_add_slug_to_obra_table',	2),
(13,	'2021_05_11_205602_add_foto1_foto2_path_to_obra_table',	2),
(14,	'2021_05_16_230951_add_role_id_to_users_table',	3),
(15,	'2021_05_16_234856_add_timestamps_to_normas_table',	4),
(16,	'2021_05_17_163057_add_timestamps_to_slide_table',	5),
(17,	'2021_05_17_163113_add_timestamps_to_popup_table',	5),
(18,	'2021_08_09_210442_create_services_table',	6),
(19,	'2021_08_14_051052_add_timestamps_to_youtube_table',	6),
(20,	'2021_08_14_234346_create_contents_table',	7),
(21,	'2021_08_14_235429_create_institutional_documents_table',	8),
(22,	'2021_08_15_000000_create_last_documents_table',	8),
(23,	'2021_08_16_172142_add_deleted_at_to_users_table',	9),
(24,	'2021_08_19_164843_create_settings_table',	10),
(25,	'2021_08_19_212906_create_city_council_table',	11),
(26,	'2021_08_23_015856_add_more_fields_to_settings_table',	12),
(27,	'2021_08_23_171235_add_history_to_settings_table',	13),
(28,	'2021_08_23_220115_create_commissions_table',	14),
(29,	'2021_08_24_000101_add_cover_to_settings_table',	15),
(30,	'2021_09_11_234237_create_schedule_table',	16),
(31,	'2021_09_16_035206_create_tributes_table',	17),
(32,	'2021_09_16_035301_create_operating_license_table',	17),
(33,	'2021_10_04_034658_add_organization_chart_to_settings_table',	18),
(34,	'2023_04_04_002625_add_correo_to_users_table',	19),
(35,	'2023_05_22_173900_create_permissions_table',	19),
(36,	'2023_05_22_173925_create_permission_user_table',	19),
(37,	'2023_05_23_162142_add_finished_at_to_popup_tables',	19),
(38,	'2023_05_24_154617_add_active_to_users_table',	19),
(39,	'2023_05_24_154834_add_published_at_to_city_council_table',	19),
(40,	'2023_05_24_155001_add_published_at_to_schedule_table',	19),
(41,	'2023_05_24_155034_add_published_at_to_info_informacion_table',	19),
(42,	'2023_05_24_155152_add_published_to_obra_table',	19),
(43,	'2023_05_24_155223_add_published_to_slide_table',	19),
(44,	'2023_05_24_155242_add_published_to_popup_table',	19),
(45,	'2023_05_24_155302_add_published_to_services_table',	19),
(46,	'2023_05_24_155347_add_published_to_mw_convoca_table',	19),
(47,	'2023_05_24_155422_add_published_to_normas_table',	19),
(48,	'2023_05_24_155452_add_published_to_youtube_table',	19),
(49,	'2023_05_24_155518_add_published_to_institutional_documents_table',	19),
(50,	'2023_05_24_155538_add_published_to_last_documents_table',	19),
(51,	'2024_05_20_171229_create_roles_table',	20),
(52,	'2024_05_20_204146_create_role_permission_table',	21),
(53,	'2024_05_29_214201_create_document_types_table',	22),
(54,	'2024_05_30_142255_add_url_to_last_documents',	23),
(55,	'2024_05_30_170556_add_description_to_institutional_documents',	24),
(56,	'2024_05_30_173344_add_image_to_settings_table',	25),
(57,	'2024_05_31_041259_add_image_to_services_table',	26),
(58,	'2024_05_31_204823_add_order_to_services_table',	27),
(59,	'2024_06_01_041843_add_url_to_services_table',	28),
(60,	'2024_06_01_044513_add_social_networks_to_settings_table',	29),
(61,	'2024_06_01_045916_change_column_programa_to_text_on_obra_table',	30),
(62,	'2024_06_01_153218_add_officials_to_settings_table',	31),
(63,	'2024_06_02_051125_add_tourism_to_settings_table',	32),
(64,	'2024_06_02_052126_create_accountability_table',	33),
(65,	'2024_06_03_211726_add_url_to_institutional_documents_table',	34),
(66,	'2024_07_10_222717_create_tickets_table',	35),
(67,	'2024_07_11_155757_add_ventanilla_on_users_table',	36),
(68,	'2024_07_15_233940_add_office_id_to_tickets_table',	37),
(69,	'2024_07_16_042521_add_office_id_to_users_table',	38),
(70,	'2024_07_16_043853_add_commission_id_to_city_council_table',	38),
(71,	'2024_07_16_204745_change_ticket_column_to_string_on_tickets_table',	39),
(72,	'2024_07_16_205110_add_code_to_tickets_table',	40),
(73,	'2025_05_27_154544_add_icon_to_city_council_table',	41),
(74,	'2025_05_27_163326_add_is_superadmin_to_users_table',	42),
(75,	'2025_05_27_170406_change_position_to_nullable_on_users_table',	43),
(76,	'2025_05_28_125024_add_type_to_tickets_table',	44);

DROP TABLE IF EXISTS `mw_convoca`;
CREATE TABLE `mw_convoca` (
  `idnoti` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `unidad` varchar(200) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `bases` varchar(250) NOT NULL,
  `resultados` varchar(250) NOT NULL,
  `fechayhora` varchar(50) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `fechayhora2` varchar(50) NOT NULL,
  `ip2` varchar(30) NOT NULL,
  `fechayhora3` varchar(50) NOT NULL,
  `ip3` varchar(30) NOT NULL,
  `aptos` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnoti`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `mw_convoca` (`idnoti`, `fecha`, `unidad`, `referencia`, `bases`, `resultados`, `fechayhora`, `ip`, `fechayhora2`, `ip2`, `fechayhora3`, `ip3`, `aptos`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(196,	'2023-06-23',	'1e2aea',	'e21e1',	'/files/convocatorias/1685936891pdf',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2023-06-05 08:48:11',	'2023-06-05 08:52:03',	'2023-06-05 08:52:03'),
(197,	'2023-06-30',	'awda',	'dawda',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2023-06-06 02:11:23',	'2023-06-06 02:11:41',	'2023-06-06 02:11:41'),
(198,	'2023-06-05',	'RECURSOS HUMANOS',	'CAS Nº 0001-2023',	'/files/convocatorias/1685999678pdf',	'/files/convocatorias/1686002426pdf',	'',	'',	'',	'',	'',	'',	'/files/convocatorias/1686002446pdf',	1,	'2023-06-06 02:14:38',	'2023-06-06 03:12:38',	'2023-06-06 03:12:38'),
(199,	'2023-06-05',	'RECURSOS HUMANOS',	'CONVOCATORIA CAS Nº 0001-2023',	'/files/convocatorias/1686003289pdf',	'/files/convocatorias/1686003324pdf',	'',	'',	'',	'',	'',	'',	'/files/convocatorias/1686003338pdf',	1,	'2023-06-06 03:14:49',	'2023-06-06 03:16:09',	'2023-06-06 03:16:09');

DROP TABLE IF EXISTS `norma`;
CREATE TABLE `norma` (
  `idnor` int(11) DEFAULT NULL,
  `tipodocu` int(11) NOT NULL,
  `fechaemi` text COLLATE utf8_spanish2_ci NOT NULL,
  `depeorig` int(11) NOT NULL,
  `numdoc` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `referenc` text COLLATE utf8_spanish2_ci NOT NULL,
  `nomfile` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `digitador` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `anno` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `detalle` text COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `norma` (`idnor`, `tipodocu`, `fechaemi`, `depeorig`, `numdoc`, `referenc`, `nomfile`, `visitas`, `digitador`, `anno`, `detalle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(NULL,	4,	'02/01/2020',	0,	'Resolucion de Alcaldia N° 434-',	'Resolucion de Alcaldia N° 434-2019-MDCN-T.pdf',	'',	0,	'',	'2020',	'',	NULL,	NULL,	NULL),
(NULL,	4,	'31/07/2020',	3,	'Resolucion de Alcaldia N°280-2',	'DAR POR CONCLUIDA la designación de la ING. PAMELA INÉS CARDOSO LINARES, al 31 de Julio del 2020, en de cargo de Sub Gerente de Programación Multianual de Inversiones de la Municipalidad Distrital de Ciudad Nueva',	'Resolucion de Alcaldia N°280-2020-MDCN-T.pdf',	0,	'',	'',	'',	NULL,	NULL,	NULL),
(NULL,	4,	'31/07/2020',	3,	'Resolucion de Alcaldia N°281-2',	'DAR POR CONCLUIDA la designación del BACH. EN lNG. ECON. AGRARIA DANIEL AGAPITO ROMERO MACHACA, al 31 de julio  del 2020, en el cargo de SUB GERENTE DE FORMULACIÓN DE PROYECTOS DE INVERSIÓN DE LA MUNICIPALIDAD DISTRITAL DE CIUDAD NUEVA.',	'Resolucion de Alcaldia N°281-2020-MDCN-T.pdf',	0,	'',	'',	'',	NULL,	NULL,	NULL),
(NULL,	4,	'31/07/2020',	3,	'Resolucion de Alcaldia N°281-2',	'DAR POR CONCLUIDA la designación del BACH. EN ING. ECON. AGRARIA DANIEL AGAPITO ROMERO MACHACA, al 31 de julio  del 2020, en el cargo de SUB GERENTE DE FORMULACIÓN DE PROYECTOS DE INVERSIÓN DE LA MUNICIPALIDAD DISTRITAL DE CIUDAD NUEVA.',	'Resolucion de Alcaldia N°281-2020-MDCN-T.pdf',	0,	'',	'',	'',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `normas`;
CREATE TABLE `normas` (
  `idnor` int(11) NOT NULL AUTO_INCREMENT,
  `tipodocu` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaemi` text COLLATE utf8_spanish2_ci NOT NULL,
  `depeorig` int(11) NOT NULL,
  `numdoc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `referenc` text COLLATE utf8_spanish2_ci NOT NULL,
  `nomfile` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `digitador` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `anno` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `detalle` text COLLATE utf8_spanish2_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `normas` (`idnor`, `tipodocu`, `fechaemi`, `depeorig`, `numdoc`, `referenc`, `nomfile`, `visitas`, `digitador`, `anno`, `detalle`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'3',	'2021-09-28',	3,	'ORDENANZA MUNICIPAL N° 012-2021-MDE',	'ORDENANZA MUNICIPAL N° 012-2021-MDE',	'/files/norma/1680471232pdf',	0,	'',	'2023',	'',	1,	'2023-04-03 02:33:52',	'2024-05-30 04:54:45',	NULL),
(2,	'3',	'2021-09-17',	3,	'ORDENANZA MUNICIPAL N° 011-2021-MDE',	'REGLAMENTO DE ORGANIZACIÓN Y FUNCIONES DEL COMITÉ DE ADMINISTRACIÓN DEL PROGRAMA DE VASO DE LECHE DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680471308pdf',	0,	'',	'2023',	'',	1,	'2023-04-03 02:34:55',	'2023-06-06 02:06:00',	NULL),
(3,	'3',	'2021-06-28',	3,	'ORDENANZA MUNICIPAL N° 010-2021-MDE',	'ORDENANZA QUE APRUEBA LA MODIFICACIÓN DEL REGLAMENTO DE ORGANIZACIÓN Y FUNCIONES - ROF DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE E INCORPORA LA UNIDAD ORGÁNICA DE EQUIPO FUNCIONAL DE GESTIÓN AMBIENTAL, COMO UNIDAD DEPENDIENTE DE LA GERENCIA DE DESARROLLO ECONÓMICO SOCIAL Y GESTIÓN AMBIENTAL',	'/files/norma/1680471381pdf',	0,	'',	'2023',	'',	1,	'2023-04-03 02:36:21',	'2023-06-06 02:06:07',	NULL),
(4,	'3',	'2021-05-17',	3,	'ORDENANZA MUNICIPAL N° 009-2021-MDE',	'ORDENANZA QUE APRUEBA EL REGLAMENTO DE FUNCIONAMIENTO DEL CENTRO INTEGRAL DE ATENCIÓN AL ADULTO/A MAYOR (CIAM) DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680471442pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 02:37:22',	'2023-04-03 02:37:22',	NULL),
(5,	'3',	'2021-04-30',	3,	'ORDENANZA MUNICIPAL N° 008-2021-MDE',	'ORDENANZA QUE APRUEBA EL REGLAMENTO DE SUPERVISIÓN AMBIENTAL EN LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680471500pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 02:38:20',	'2023-04-03 02:38:20',	NULL),
(6,	'3',	'2021-04-30',	3,	'ORDENANZA MUNICIPAL N° 007-2021-MDE',	'ORDENANZA QUE APRUEBA EL REGLAMENTO PARA ATENCIÓN DE DENUNCIAS AMBIENTALES PRESENTADAS ANTE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680471545pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 02:39:05',	'2023-04-03 02:39:05',	NULL),
(7,	'3',	'2021-03-30',	3,	'ORDENANZA MUNICIPAL N° 006-2021-MDE',	'ORDENANZA QUE APRUEBA EL REGLAMENTO PARA EL PROCESO DEL PRESUPUESTO PARTICIPATIVO BASADO EN RESULTADOS PARA EL AÑO FISCAL 2022',	'/files/norma/1680471616pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 02:40:16',	'2023-04-03 02:40:16',	NULL),
(8,	'3',	'2021-03-30',	3,	'ORDENANZA MUNICIPAL N° 005-2021-MDE',	'ORDENANZA QUE APRUEBA EL REGLAMENTO DE AUDIENCIA PÚBLICA \"RENDICIÓN DE CUENTAS\" DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680472656pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 02:57:36',	'2023-04-03 02:57:36',	NULL),
(9,	'3',	'2021-02-25',	3,	'ORDENANZA MUNICIPAL N° 004-2021-MDE',	'ORDENANZA MUNICIPAL QUE RATIFICA EL PLAN DE ACCIÓN DISTRITAL DE SEGURIDAD CIUDADANA 2020',	'/files/norma/1680472703pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 02:58:23',	'2023-04-03 02:58:23',	NULL),
(10,	'3',	'2021-01-29',	3,	'ORDENANZA MUNICIPAL N° 003-2021-MDE',	'QUE REGULA EL EXPENDIO O VENTA DE BEBIDAS TRADICIONALES ELABORADAS CON PLANTAS MEDICINALES DE EMOLIENTE U OTRAS INFUSIONES, DE QUINUA, MACA, KIWICHA Y AFINES, EN LAS VÍAS PÚBLICAS, COMO MICROEMPRESAS GENERADORAS DE AUTOEMPLEO PRODUCTIVO EN EL DISTRITO DE ESTIQUE',	'/files/norma/1680472747pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 02:59:07',	'2023-04-03 02:59:07',	NULL),
(11,	'3',	'2021-01-14',	3,	'ORDENANZA MUNICIPAL N° 002-2021-MDE',	'QUE APRUEBA EL REGLAMENTO QUE REGULA LA EXTRACCIÓN DE MATERIALES DE ACARREO UBICADOS EN LOS ALVEOLOS A CAUCES NATURALES DE AGUA EN LA JURISDICCIÓN DEL DISTRITO DE ESTIQUE',	'/files/norma/1680472808pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:00:08',	'2023-04-03 03:00:08',	NULL),
(12,	'3',	'2021-01-14',	3,	'ORDENANZA MUNICIPAL N° 001-2021-MDE',	'QUE APRUEBA EL REGLAMENTO DE APLICACIÓN DE ACCIONES ADMINISTRATIVAS (RASA) Y EL CUADRO ÚNICO DE INFRACCIONES Y SANCIONES (CUIS) DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680472870pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:01:10',	'2023-04-03 03:01:10',	NULL),
(13,	'3',	'2020-09-30',	3,	'ORDENANZA MUNICIPAL N° 007-2020-MDE',	'ORDENANZA MUNICIPAL QUE CREA EL CENTRO INTEGRAL DE ATENCION DE LA ATENCION AL ADULTO MAYO EN LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680472916pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:01:56',	'2023-04-03 03:01:56',	NULL),
(14,	'3',	'2020-07-13',	3,	'odenanzas-municipales N° 05-2020',	'APRUEBA EL TEXTO ÚNICO DE PROCEDIMIENTOS ADMINISTRATIVOS  TUPA DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680473303pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:08:23',	'2023-04-03 03:08:23',	NULL),
(15,	'3',	'2020-07-13',	3,	'odenanzas-municipales N° 04-2020',	'PLAN DE ACCIÓN DISTRITAL DE SEGURIDAD CIUDADANA 2020',	'/files/norma/1680473359pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:09:19',	'2023-04-03 03:09:19',	NULL),
(16,	'3',	'2020-06-30',	3,	'odenanzas-municipales N° 03-2020',	'ESTRUCTURA ORGÁNICA DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680473577pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:12:57',	'2023-04-03 03:12:57',	NULL),
(17,	'3',	'2020-03-13',	3,	'Odenanzas-municipales N° 02-2020',	'REGLAMENTO PARA EL PROCESO DEL PRESUPUESTO PARTICIPATIVO BASADO EN RESULTADOS PARA EL AÑO FISCAL 2021',	'/files/norma/1680473678pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:14:38',	'2023-04-03 03:14:38',	NULL),
(18,	'3',	'2020-03-13',	3,	'odenanzas-municipales N° 01-2020',	'REGLAMENTO DE RENDICIÓN DE CUENTAS EN AUDIENCIA PÚBLICA DE LA MUNICIPALIDAD DISTRITAL DE ESTIQUE',	'/files/norma/1680473732pdf',	0,	'',	'2023',	'',	0,	'2023-04-03 03:15:32',	'2023-04-03 03:15:32',	NULL),
(19,	'3',	'2023-06-22',	3,	'ASDSA',	'ASDASD',	'/files/norma/1685931152certificadopdf.pdf',	0,	'',	'2023',	'',	1,	'2023-06-05 07:12:32',	'2023-06-05 07:13:41',	'2023-06-05 07:13:41'),
(20,	'3',	'2023-06-23',	3,	'3432',	'233',	'/files/norma/1685935561arequipa-caracterizacionpdf.pdf',	0,	'',	'2023',	'',	1,	'2023-06-05 08:26:01',	'2023-06-06 08:41:49',	'2023-06-06 08:41:49'),
(21,	'3',	'2023-06-05',	3,	'ORDENANZA MUNICIPAL Nº 0005-2023',	'REFERENCIA',	'/files/norma/168600354915-aptos-resultado-final-casxlsxpdf.pdf',	0,	'',	'2023',	'',	1,	'2023-06-06 03:19:09',	'2023-06-06 03:23:54',	'2023-06-06 03:23:54'),
(22,	'3',	'2023-06-05',	3,	'ORDENANZA MUNICIPAL Nº 0005-2023',	'REFERENCIA',	'/files/norma/1686003947bases-006pdf.pdf',	0,	'',	'2023',	'',	0,	'2023-06-06 03:25:47',	'2023-06-06 03:26:52',	'2023-06-06 03:26:52'),
(23,	'4',	'2024-05-29',	3,	'ORDENZNAD MUNICIPALXDDDDD',	'ADWADADDDDDDDDDDDDDDD',	'',	0,	'',	'2024',	'',	1,	'2024-05-30 04:51:33',	'2024-05-30 04:54:52',	NULL);

DROP TABLE IF EXISTS `obra`;
CREATE TABLE `obra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa` text COLLATE utf8_spanish2_ci NOT NULL,
  `actividad` text COLLATE utf8_spanish2_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `localizacion` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechaini` date NOT NULL,
  `plazo` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechater` date NOT NULL,
  `responsable` text COLLATE utf8_spanish2_ci NOT NULL,
  `inspector` text COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto_path` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `foto1` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto1_path` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `foto2` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto2_path` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `foto3` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto3_path` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `foto4` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto4_path` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `obra` (`id`, `programa`, `actividad`, `slug`, `localizacion`, `fechaini`, `plazo`, `fechater`, `responsable`, `inspector`, `descripcion`, `foto`, `foto_path`, `foto1`, `foto1_path`, `foto2`, `foto2_path`, `foto3`, `foto3_path`, `foto4`, `foto4_path`, `type`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'<p><br></p>',	'ACTIVIDAD',	'actividad',	'',	'2023-04-05',	'',	'2023-04-27',	'',	'',	'',	'/img/obras/168046978800a.jpg',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'6',	0,	'2023-04-03 02:09:48',	'2023-06-07 19:42:46',	NULL),
(2,	'<p><br></p>',	'ACTIVIDAD2',	'actividad2',	'',	'2023-04-04',	'',	'2023-04-26',	'',	'',	'',	'/img/obras/168046989100a.jpg',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'8',	0,	'2023-04-03 02:10:14',	'2023-06-07 19:42:40',	NULL),
(3,	'<p><br></p>',	'ACTIVIDAD',	'actividad',	'',	'2023-04-19',	'',	'2023-04-26',	'',	'',	'',	'/img/obras/168593091200a.jpg',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'8',	0,	'2023-04-03 02:21:30',	'2023-06-07 19:42:34',	NULL),
(4,	'<p><strong>Lorem Ipsum</strong><b> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type spe</b><u><b>cimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essential</b>ly unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum</u></p>',	'ACTIVIDAD DE PRUEBA',	'actividad-de-prueba',	'',	'2024-05-04',	'',	'2024-05-31',	'',	'',	'',	'/img/obras/171721866300a.png',	'',	'/img/obras/171721866311b.jpg',	'',	'/img/obras/171721866322c.png',	'',	'',	'',	'',	'',	'6',	1,	'2024-06-01 10:11:03',	'2024-06-01 10:11:03',	NULL);

DROP TABLE IF EXISTS `obras`;
CREATE TABLE `obras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `detalle` text NOT NULL,
  `foto` text NOT NULL,
  `archivo` text NOT NULL,
  `monto` text NOT NULL COMMENT '15',
  `tipo` text NOT NULL COMMENT '20',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `obras` (`id`, `titulo`, `detalle`, `foto`, `archivo`, `monto`, `tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6,	'Ejecutadas',	'ejecutadas',	'',	'',	'',	'',	'2021-05-12 16:21:36',	'2021-05-12 16:21:36',	NULL),
(7,	'En Proceso',	'en-proceso',	'',	'',	'',	'',	'2021-05-12 16:21:55',	'2021-05-12 16:21:55',	NULL),
(8,	'Por Ejecutar',	'por-ejecutar',	'',	'',	'',	'',	'2021-05-12 16:22:08',	'2021-05-12 16:22:08',	NULL);

DROP TABLE IF EXISTS `operating_license`;
CREATE TABLE `operating_license` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `perfil` (`id`, `name`, `created`, `updated`) VALUES
(1,	'administrador',	'2014-07-07 10:56:15',	'2014-07-07 10:56:18'),
(9,	'Secretaria',	'2014-07-07 22:57:00',	'2015-03-27 15:51:00'),
(18,	'Imagen Institucional',	'2015-03-27 15:50:00',	'2020-06-14 14:56:00');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Ver Configuración',	'ver-configuracion',	NULL,	NULL,	NULL),
(2,	'Ver Usuarios',	'ver-usuarios',	NULL,	NULL,	NULL),
(3,	'Ver Concejo Municipal',	'ver-concejo-municipal',	NULL,	NULL,	NULL),
(4,	'Ver Comisiones',	'ver-comisiones',	NULL,	NULL,	NULL),
(5,	'Ver Agenda',	'ver-agenda',	NULL,	NULL,	NULL),
(6,	'Ver Noticias',	'ver-noticias',	NULL,	NULL,	NULL),
(7,	'Ver Obras',	'ver-obras',	NULL,	NULL,	NULL),
(8,	'Ver Sliders',	'ver-sliders',	NULL,	NULL,	NULL),
(9,	'Ver Popup',	'ver-popup',	NULL,	NULL,	NULL),
(10,	'Ver Servicios',	'ver-servicios',	NULL,	NULL,	NULL),
(11,	'Ver Convocatorias',	'ver-convocatorias',	NULL,	NULL,	NULL),
(12,	'Ver Normas',	'ver-normas',	NULL,	NULL,	NULL),
(13,	'Ver Videos',	'ver-videos',	NULL,	NULL,	NULL),
(14,	'Ver Documentos Institucionales',	'ver-documentos-institucionales',	NULL,	NULL,	NULL),
(15,	'Ver Otros documentos importantes',	'ver-otros-documentos-importantes',	NULL,	NULL,	NULL),
(16,	'Ver Roles',	'ver-roles',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permission_user` (`id`, `permission_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	NULL,	NULL),
(29,	16,	1,	NULL,	NULL),
(30,	2,	1,	NULL,	NULL),
(31,	3,	1,	NULL,	NULL),
(32,	4,	1,	NULL,	NULL),
(33,	5,	1,	NULL,	NULL),
(34,	6,	1,	NULL,	NULL),
(35,	7,	1,	NULL,	NULL),
(36,	8,	1,	NULL,	NULL),
(37,	9,	1,	NULL,	NULL),
(38,	10,	1,	NULL,	NULL),
(39,	11,	1,	NULL,	NULL),
(40,	12,	1,	NULL,	NULL),
(41,	13,	1,	NULL,	NULL),
(42,	14,	1,	NULL,	NULL),
(43,	15,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `popup`;
CREATE TABLE `popup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` text NOT NULL,
  `enlace` text NOT NULL,
  `visible` text NOT NULL,
  `finished_at` date DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `popup` (`id`, `imagen`, `enlace`, `visible`, `finished_at`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(51,	'/img/1680470074.png',	'ASD',	'SI',	NULL,	0,	'2023-04-03 02:14:34',	'2023-04-03 02:14:55',	'2023-04-03 02:14:55'),
(50,	'/img/1680528452.jpg',	'#',	'SI',	'2023-06-22',	0,	'2023-03-31 20:12:06',	'2023-06-06 03:43:16',	'2023-06-06 03:43:16'),
(52,	'/img/1685936834.png',	'awdad',	'SI',	'2023-06-30',	1,	'2023-06-05 08:47:14',	'2023-06-05 08:48:21',	'2023-06-05 08:48:21'),
(53,	'/img/1686005067.jpg',	'www.carnavalestique.pe',	'SI',	'2023-06-30',	1,	'2023-06-06 03:44:27',	'2023-06-06 03:45:02',	'2023-06-06 03:45:02'),
(54,	'/img/1686005145.jpg',	'https://www.google.com/search?client=firefox-b-d&q=gp',	'SI',	'2023-06-30',	1,	'2023-06-06 03:45:45',	'2023-06-06 03:51:26',	'2023-06-06 03:51:26'),
(55,	'/img/1717384795.jpg',	'https://www.google.com/',	'SI',	'2024-06-21',	1,	'2023-06-06 03:52:43',	'2024-06-04 02:12:56',	NULL),
(56,	'/img/1717449187.png',	'https://www.facebook.com/',	'SI',	'2024-06-28',	1,	'2024-06-03 08:18:04',	'2024-06-04 02:13:07',	NULL);

DROP TABLE IF EXISTS `procesos`;
CREATE TABLE `procesos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `detalle` text NOT NULL,
  `archivo` text NOT NULL,
  `dia` text NOT NULL,
  `mes` text NOT NULL,
  `ano` text NOT NULL,
  `fecha` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Administrador',	'administrador',	'el que todo lo sabex',	'2024-05-20 22:57:59',	'2024-05-20 23:02:00',	NULL),
(2,	'Trabajador',	'trabajador',	'persona que atiende los tickets',	'2025-05-27 21:56:59',	'2025-05-27 22:09:30',	NULL),
(3,	'Ticket',	'ticket',	'para el acceso a pantalla',	'2025-05-27 22:09:39',	'2025-05-27 22:09:39',	NULL),
(4,	'Monitor',	'monitor',	'acceso a monitor',	'2025-06-05 15:40:53',	'2025-06-05 15:40:53',	NULL);

DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	NULL,	NULL),
(3,	1,	16,	NULL,	NULL),
(4,	1,	2,	NULL,	NULL),
(5,	1,	3,	NULL,	NULL),
(6,	1,	4,	NULL,	NULL),
(7,	1,	5,	NULL,	NULL),
(8,	1,	6,	NULL,	NULL),
(9,	1,	7,	NULL,	NULL),
(10,	1,	8,	NULL,	NULL),
(11,	1,	9,	NULL,	NULL),
(12,	1,	10,	NULL,	NULL),
(13,	1,	11,	NULL,	NULL),
(14,	1,	12,	NULL,	NULL),
(15,	1,	13,	NULL,	NULL),
(16,	1,	14,	NULL,	NULL),
(17,	1,	15,	NULL,	NULL);

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `schedule` (`id`, `subject`, `date`, `type`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'<p>dasdasd</p>',	'2024-06-01',	'Cultural',	1,	'2023-06-05 07:03:03',	'2024-06-02 01:41:45',	NULL);

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto1_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto3_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `icon`, `icon_path`, `foto1`, `foto1_path`, `foto2`, `foto2_path`, `foto3`, `foto3_path`, `image`, `external_image`, `published`, `url`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4,	'Servicio de comida',	'servicio-de-comida',	'comida',	'https://drive.google.com/uc?id=1zNvZrRH3xFv-r6FP2hrEKPzfjxvT4Frd&export=media',	'1629147339[Cereal Avena Integral] Avena Quaker Instantanea 400g.jpg',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	0,	NULL,	1,	'2021-08-17 01:55:43',	'2021-08-24 18:40:10',	'2021-08-24 18:40:10'),
(5,	'fasdasdasdasd',	'fasdasdasdasd',	'<p>asdasdasdasdas</p>',	'https://drive.google.com/uc?id=1Vy-YAiwjeIrswK-K7BBfrgb7ZV5MQU6w&export=media',	'16296818243.png',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	0,	NULL,	1,	'2021-08-23 05:23:50',	'2021-08-24 18:40:16',	'2021-08-24 18:40:16'),
(6,	'Seguridad-Ciudadana',	'seguridad-ciudadana',	'<p></p><div style=\"text-align: center;\"><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></div><header style=\"text-align: center; padding: 0px; margin: 0px; border: 0px; color: rgb(51, 51, 51); font-family: droid_sans, Arial, Helvetica, sans-serif; font-size: 10px;\"><b><span style=\"font-size: 14px;\">INFORMACIÓN GENERAL</span></b></header><p></p><p style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px;\"></p><div style=\"text-align: center;\"><span style=\"font-size: 14px;\">MUNICIPALIDAD DE ESTIQUE</span></div><span style=\"padding: 0px; margin: 0px; border: 0px;\"><div style=\"text-align: center;\"><br></div></span><p></p>',	'/img/services/1680275292png',	'1634860218blusa_rojo.jpg',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	0,	NULL,	1,	'2021-08-23 05:33:08',	'2023-03-31 20:38:14',	'2023-03-31 20:38:14'),
(7,	'VASO DE LECHE',	'vaso-de-leche',	'<h2 class=\"entry-title\" style=\"color: rgb(51, 51, 51); margin: 20px 0px 10px; clear: both; font-size: 30px; line-height: 1.1; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">VASO DE LECHE</h2><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">El Programa del Vaso de Leche se constituye como uno de los PRINCIPALES PROGRAMAS DE APOYO SOCIAL ALIMENTARIOque implementa el Estado a través de las Municipalidades a Nivel Nacional, a través de la entrega de una ración diaria de alimentos a los grupos sociales más vulnerables, con el PROPÓSITO DE AYUDAR A SUPERAR LA INSEGURIDAD ALIMENTARIA EN LA QUE SE ENCUENTRA EN LA ACTUALIDAD.</p><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"442\" style=\"border-spacing: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; width: 441px;\"><tbody><tr height=\"22\"><td colspan=\"3\" height=\"22\" style=\"padding: 0px; height: 22px; width: 441px;\"><span style=\"font-weight: 700;\">REQUISITOS PARA ACCEDER AL VASO DE LECHE&nbsp;</span></td></tr><tr height=\"20\"><td colspan=\"3\" height=\"234\" rowspan=\"11\" style=\"padding: 0px; height: 234px; width: 441px;\">1.Residir en Distrito de Estique<br>2.Formatos de empadronamiento<br>3.DNI del apoderado<br>4.DNI del beneficiario<br>5.Recibo de agua o luz<br>6.Tarjeta de vacunación - control prenatal<br>7.Constancia del centro de atención del centro<br>8.Copia de la Resolución de Discapacidad (CONADIS) y/u otro 9.documento que certifique la discapacidad o enfermedad.<br>10.Llenar la ficha de inscripción y Ficha Socio-Económica.</td></tr></tbody></table>',	'/img/services/1680277249png',	'1629816034pvl.png',	'',	'',	'',	'',	'',	'',	'/img/services/17171295781717129578mi-fotojpg.jpg',	'/img/documents/17171295781717129578towerjpg.jpg',	1,	NULL,	2,	'2021-08-24 18:40:39',	'2024-06-01 01:52:18',	NULL),
(8,	'SISFOH',	'sisfoh',	'<p>SISFOH<br></p>',	'/img/services/1680277380png',	'1629816056sisfoh.png',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	1,	NULL,	1,	'2021-08-24 18:41:01',	'2023-06-07 19:45:40',	NULL),
(9,	'DEMUNA',	'demuna',	'<p><br></p>',	'/img/services/1680277430png',	'1629816081demuna.png',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	1,	NULL,	1,	'2021-08-24 18:41:26',	'2023-06-07 19:45:46',	NULL),
(10,	'PENSION 65',	'pension-65',	'<p>PENSION 65</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">ensión 65 surge como una respuesta del Estado ante la necesidad de brindar protección a un sector especialmente vulnerable de la población, y les entrega una subvención económica de 250 soles bimestrales por persona y con este beneficio contribuye a que ellos y ellas tengan la seguridad de que sus necesadades básicas serán atendidas, que sean revalorados por su familia y su comunidad, y contribuye también a dinamizar pequeños mercados y ferias locales.</p><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"442\" style=\"border-spacing: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; width: 441px;\"><tbody><tr height=\"21\"><td colspan=\"3\" height=\"21\" style=\"padding: 0px; height: 21px; width: 441px;\"><span style=\"font-weight: 700;\">REQUISITOS&nbsp;</span></td></tr><tr height=\"20\"><td colspan=\"3\" height=\"20\" style=\"padding: 0px; height: 20px;\"><ol style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><li>Tener 65 años a más.</li><li>Contar con&nbsp;DNI.</li><li>Encontrarse en condición de extrema pobreza, de acuerdo a la clasificación&nbsp; &nbsp; &nbsp; &nbsp;socioeconómica otorgada por el Sistema de Focalización de Hogares (SISFOH)</li><li>No recibir pensión proveniente del sector público o privado: ONP, AFP, ni de EsSalud.</li><li>Presentar una Declaración Jurada (DJ) debidamente llenada, con datos personales e incluyendo el número de DNI (formulario 1000).</li></ol></td></tr></tbody></table>',	'/img/services/1680471092png',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	1,	NULL,	1,	'2023-03-31 20:37:38',	'2023-06-07 19:46:11',	NULL),
(11,	'UNIDAD DE REGISTRO CIVIL -MDE',	'unidad-de-registro-civil-mde',	'<h2 class=\"entry-title\" style=\"color: rgb(51, 51, 51); margin: 20px 0px 10px; clear: both; font-size: 30px; line-height: 1.1; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">UNIDAD DE REGISTRO CIVIL -MDE</h2><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">a Unidad de Registros Civiles de la Municipalidad Distrital de Estique. Le corresponde a la Unidad de Registro Civil, con categoría organizacional dentro de la estructura orgánica de la Municipalidad, dependiendo administrativa y funcionalmente de la Oficina de Secretaria General.</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\"><u>VISIÓN</u></span></p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">\"Nos esforzamos para conseguir que nuestro servicio sea&nbsp;<span style=\"font-weight: 700;\">accesible</span>&nbsp;a todo ciudadano,&nbsp;<span style=\"font-weight: 700;\">seguro</span>&nbsp;para garantizar la conservación de la documentación,&nbsp;<span style=\"font-weight: 700;\">Dable</span>&nbsp;a fin de asegurar que la información sea actualizada, sistematizada e&nbsp;<span style=\"font-weight: 700;\">íntegro</span>&nbsp;de manera a recoger todos los datos y la totalidad de los actos y hechos que se registren en nuestra jurisdicción y&nbsp;<span style=\"font-weight: 700;\">eficiente</span>&nbsp;en sus resultados”</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\"><u>MISIÓN</u></span></p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">\"Somos una institución pública dependiente de la Municipalidad Distrital de Estique, que presta servicios a la ciudadanía caracterizándonos por nuestra e?ciencia, siendo responsables del registro de nacimientos, matrimonios, defunciones y de toda modificación a los mismos, estando a nuestro cargo la custodia de la documentación, el archivo, y la expedición de certificados relativos a dichos actos y hechos vitales y jurídicos, relacionados al estado civil de las personas de nuestra jurisdicción ”</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\"><u>UBICACIÓN</u></span></p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">Las Oficinas administrativas de la Unidad de Registros Civiles de la Municipalidad Distrital de Estique, se encuentra ubicada en Plaza Estique Pueblo S/N.&nbsp;</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">&nbsp;</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\"><u>HORARIO DE ATENCION</u></span></p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Lunes a viernes</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Mañana: 8:00 am a 12:30&nbsp; pm</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Tarde:&nbsp;&nbsp; 1:30 pm a 4:30&nbsp; pm.</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">&nbsp;</p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\"><u>FUNCIONES</u></span></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li style=\"text-align: justify;\">Desempeñar funciones de planear, dirigir y ejecutar las actividades de Registro e identificación según lo normado por la Ley Nº 26497 y su Reglamento.</li><li style=\"text-align: justify;\">Planear, organizar, dirigir y racionalizar las inscripciones de su competencia.</li><li style=\"text-align: justify;\">Registrar los nacimientos, matrimonios, divorcios, defunciones y demás actos que modifiquen el estado civil de las personas, así como las resoluciones judiciales o administrativas que de ellos se refieran susceptibles de inscripción y los demás actos que señala la Ley;</li><li style=\"text-align: justify;\">Aprobar o denegar las solicitudes de rectificaciones y/o regularizaciones administrativas de actas registrales;</li><li style=\"text-align: justify;\">Emitir las constancias de inscripción correspondientes.</li><li style=\"text-align: justify;\">Expedir copias certificadas de los hechos vitales que se encuentran en los archivos de registro civil de la Municipalidad;</li><li style=\"text-align: justify;\">Garantizar la privacidad de los datos relativos a las personas que son materia de inscripción. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</li><li style=\"text-align: justify;\">Celebrar matrimonios civiles.</li><li style=\"text-align: justify;\">Elaborar las estadísticas mensuales de los hechos y actos vitales y reporte mensual de fallecidos de menores y mayores de edad registrados en el Registro del Estado Civil a la Oficina de Fallecidos de RENIEC.</li><li style=\"text-align: justify;\">Conservar y proteger los libros de registros y documentos (archivo) en los que están registrados los hechos vitales, organizándolos en orden cronológico, utilizando sistemas y metros cuadrados todos simplificados computarizados.</li></ul><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0.75pt; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\"><u>REQUISITOS</u></span></p><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><u>PARTIDA DE NACIMIENTO</u></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li>Certificado de nacido vivo</li></ul><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><u>RECTIFICACIÓN ADMINISTRATIVA DE ACTA DE NACIMIENTO</u></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li>Solicitud (motivo de rectificación)</li><li>Carta Poder ( si es apoderado)</li><li>Copia de DNI</li><li>Certificado de nacido vivo (según corresponda)</li><li>partida de nacimiento certificada (del solicitante)</li><li>partida de nacimiento certificada de los padres (según corresponda)</li><li>copia de recibo (Derecho de Tramite)</li></ul><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><u>RECTIFICACIÓN DE ACTA DE MATRIMONIO</u></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li>Solicitud (motivo de rectificación)</li><li>Carta Poder (si es apoderado)</li><li>Copia de DNI del solicitante</li><li>Acta de nacimiento certificada (según corresponda)</li><li>Acta de matrimonio certificada</li><li>copia de recibo (Derecho de Tramite)</li></ul><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><u>RECTIFICACIÓN DE ACTA DE DEFUNCIÓN</u></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li>Solicitud (motivo de rectificación)</li><li>Copia de DNI del solicitante</li><li>Acta de nacimiento certificada (según corresponda)</li><li>Acta de defunción certificada</li><li>copia de recibo (Derecho de Tramite)</li></ul><p style=\"color: rgb(65, 64, 64); line-height: 22px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\"><u>REQUISITOS PARA CONTRAER MATRIMONIO CIVIL</u></span></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li>Solicitud de Celebración de Matrimonio Civil.</li><li>Acta de Nacimiento actualizada de los contrayentes.</li><li>Copia de DNI de los contrayentes.</li><li>Copia de DNI legalizada de los testigos.</li><li>Constancia negativa de Inscripción de matrimonio.</li><li>Declaración Jurada de Domicilio.</li><li>Constancia de Consejería ITS VIH/SIDA</li><li>Certificado Médico de los contrayentes.</li><li>copia de recibo (Derecho de Tramite)</li></ul>',	'/img/services/1680471108png',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	1,	NULL,	1,	'2023-03-31 20:37:59',	'2023-06-07 19:46:38',	NULL),
(12,	'DEFENSA CIVIL',	'defensa-civil',	'<p>DEFENSA CIVIL<br></p>',	'/img/services/1680277282png',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	0,	NULL,	1,	'2023-03-31 20:41:22',	'2023-03-31 20:41:22',	NULL),
(13,	'PROGRAMAS JUNTOS',	'programas-juntos',	'<h2 class=\"entry-title\" style=\"color: rgb(51, 51, 51); margin: 20px 0px 10px; clear: both; font-size: 30px; line-height: 1.1; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">PROGRAMAS JUNTOS</h2><div style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">El Programa Juntos contribuye a canalizar los recursos de los diversos sectores de la sociedad civil y el Estado destinados a otorgar prestaciones de salud y educación orientadas a asegurar la salud preventiva materno – infantil y la escolaridad, con la participación y compromiso voluntario de las familias beneficiadas, dándose cumplimiento a los compromisos de equidad del Acuerdo Nacional, a los Lineamientos de la Carta de Política Social y los Objetivos de Desarrollo del Milenio.</div><div style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">El Programa tiene por finalidad ejecutar transferencias directas en beneficio de las familias más pobres de la población, rural y urbana. El Programa otorga a las familias beneficiadas, con su participación y compromiso voluntario, prestaciones de salud y educación orientadas a asegurar la salud preventiva materno – infantil y la escolaridad sin deserción.</div>',	'/img/services/1680528215png',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	0,	NULL,	1,	'2023-04-03 02:24:21',	'2023-04-03 18:23:35',	NULL),
(14,	'TRABAJA PERU',	'trabaja-peru',	'<p><span style=\"color: rgb(65, 64, 64); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">El Programa para la Generación de Empleo Social Inclusivo “Trabaja Perú” se creó con el objetivo de generar empleo y promover el empleo sostenido y de calidad en la población desempleada y subempleada de las áreas urbanas y rurales, en condición de pobreza y pobreza extrema y/o afectada parcial o íntegramente por una emergencia o desastre natural.</span><br></p>',	'/img/services/1680528234png',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	0,	NULL,	1,	'2023-04-03 18:23:54',	'2023-04-03 18:23:54',	NULL),
(15,	'SERVICIO PRUEBA',	'servicio-prueba',	'<p>AWDADDD<br></p>',	'',	'',	'',	'',	'',	'',	'',	'',	'/img/services/17171300521717130052fb-f-logo-blue-512png.png',	'/img/services/17171300521717130052fb-icon-325x325png.png',	1,	NULL,	1,	'2024-05-31 09:34:12',	'2024-05-31 09:35:14',	'2024-05-31 09:35:14'),
(16,	'ddddddddddd',	'ddddddddddd',	'<p>adwada<br></p>',	'',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	1,	NULL,	1,	'2024-05-31 09:35:01',	'2024-05-31 09:35:09',	'2024-05-31 09:35:09'),
(17,	'dawada',	'dawada',	'<p><br></p>',	'/img/services/1717188892pdf',	'',	'',	'',	'',	'',	'',	'',	'/img/services/17171878841717187884fb-f-logo-blue-512png.png',	'/img/services/17171878841717187884fb-icon-325x325png.png',	1,	NULL,	1,	'2024-06-01 01:38:04',	'2024-06-01 01:54:52',	NULL),
(18,	'probando primer',	'probando-primer',	'<p>awdad<br></p>',	'',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	1,	NULL,	0,	'2024-06-01 01:51:41',	'2024-06-01 01:54:22',	'2024-06-01 01:54:22'),
(19,	'SERVICIO WITH FILE',	'servicio-with-file',	'<p>awda<br></p>',	'/img/services/17171890921717189092enlaces-servicios-favoritospdf.pdf',	'',	'',	'',	'',	'',	'',	'',	'/img/services/17172161461717216146towerjpg.jpg',	NULL,	1,	'https://www.youtube.com/watch?v=PUHh8_PC-vA',	1,	'2024-06-01 01:58:12',	'2024-06-01 09:29:06',	NULL),
(20,	'SERVICIO WITH URL',	'servicio-with-url',	'<p>dxxxxxxd<br></p>',	'',	'',	'',	'',	'',	'',	'',	'',	NULL,	NULL,	1,	'https://www.instagram.com/puchyslove/',	1,	'2024-06-01 09:22:15',	'2024-06-01 09:22:15',	NULL);

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `web_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_chart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` text COLLATE utf8mb4_unicode_ci,
  `officials` text COLLATE utf8mb4_unicode_ci,
  `directory` text COLLATE utf8mb4_unicode_ci,
  `planning_and_organization` text COLLATE utf8mb4_unicode_ci,
  `directives` text COLLATE utf8mb4_unicode_ci,
  `facebook_tourism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_tourism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_tourism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_tourism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tributes` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tourism` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `major`, `photo`, `photo_path`, `description`, `vision`, `mission`, `created_at`, `updated_at`, `deleted_at`, `web_title`, `cover`, `image1`, `image2`, `image3`, `organization_chart`, `address`, `reference`, `phone`, `email`, `schedule_days`, `schedule_hours`, `history`, `officials`, `directory`, `planning_and_organization`, `directives`, `facebook_tourism`, `tiktok_tourism`, `instagram_tourism`, `youtube_tourism`, `tributes`, `facebook`, `tiktok`, `instagram`, `youtube`, `tourism`) VALUES
(1,	'Profesora Teodocia Maximina Espinoza  Mamani',	'/imagenes/muniestique/16804724521680472452png',	NULL,	'Alcaldesa de la Municipalidad Distrital de Estique\r\nPeriodo 2023 - 2026',	'Estique Pueblo es un distrito, Ordenado, Organizado, Agropecuario que ha alcanzado eficiencia en el uso del recurso hídrico de calidad generando una agricultura rentable, Tecnificada y Ecológica, siendo un atractivo para el turismo, cuenta con servicios básicos de Salud, Educción, Equipados y abastecidos y medios de comunicación de punta, existe una participación activa de grupos organizados.',	'Promover el Desarrollo Local Sostenible con uso de recursos humanos y materiales que permitan mejorar la calidad de vida de la población',	NULL,	'2024-06-03 02:45:09',	NULL,	'Municipalidad Distrital de Estique',	'/imagenes/muniestique/16804724721680472472jpg',	'/imagenes/muni/17170926041717092604png',	'/imagenes/muni/17170928341717092834png',	'/imagenes/muni/17170928341717092834jpg',	'/imagenes/muni/17173647091717364709jpg',	'Estique Pueblo',	'Tacna',	'952 900 645',	'muniestique2023@gmail.com (mesa de partes) || muniestique@muniestique.gob.pe',	'Lunes a Viernes',	'8:00 am a 3:30 pm',	'<p style=\"margin: 6pt 0cm; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:\"Arial\",sans-serif;color:#414040\">El <b>Distrito de Estique</b> es\r\nuno de los 8 distritos de la Provincia de Tarata, ubicada en\r\nel Departamento de Tacna, bajo la administración del Gobierno\r\nregional de Tacna, Perú.</span><span style=\"font-size:10.5pt;font-family:\"Helvetica\",sans-serif;\r\ncolor:#414040\"><o:p></o:p></span></p><p style=\"margin: 6pt 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:\"Arial\",sans-serif;\r\ncolor:#414040\">Desde el punto de vista jerárquico de la Iglesia católica forma\r\nparte de la Diócesis de Tacna y Moquegua la cual, a su vez, pertenece\r\na la Arquidiócesis de Arequipa.</span><span style=\"font-size:10.5pt;\r\nfont-family:\"Helvetica\",sans-serif;color:#414040\"><o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n</p><p style=\"margin: 6pt 0cm; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;\r\nfont-family:\"Arial\",sans-serif;color:#414040\">El distrito fue creado mediante\r\nDecreto s/n del 2 de enero de 1857.</span><span style=\"font-size:10.5pt;\r\nfont-family:\"Helvetica\",sans-serif;color:#414040\"><o:p></o:p></span></p>',	'<p><span style=\"font-size: 24px;\">funcionarios</span><br></p>',	'<p><u>directorio</u><br></p>',	'<p><i>planeamiento</i><br></p>',	'<p><b>directivas</b><br></p>',	'facebookturismo',	'tiktokturismo',	'instagramturismo',	NULL,	'<table class=\"striped scrollspy\" id=\"aFormularios\" style=\"margin: 0px; padding: 0px; border: none; outline: none; font-size: 15px; line-height: inherit; color: rgb(117, 117, 117); font-family: \" source=\"\" sans=\"\" pro\";\"=\"\"><tbody style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(41, 128, 185);\"><span style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; font-weight: bolder;\">CARACTERISTICAS DEL IMPUESTO PREDIAL</span></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\">&nbsp;</td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; font-weight: bolder;\"><span class=\"glyphicon glyphicon-circle-arrow-right\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"></span>Caracteristicas del Impuesto Predial</span></td><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><a href=\"https://municalana.gob.pe/documentos/000Caracter%C3%ADsticas%20del%20Impuesto%20Predial%202017\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(58, 132, 58); cursor: pointer;\"><img src=\"http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png\" style=\"margin: 0px; padding: 0px; border-width: initial; border-color: initial; border-image: initial; outline: none; line-height: inherit; display: inline-block; max-width: 100%; height: auto;\"></a></div></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\">&nbsp;</td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(41, 128, 185);\"><span style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; font-weight: bolder;\">FORMULARIOS</span></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\">&nbsp;</td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; font-weight: bolder;\">1.- Formato de Declaración Jurada del Impuesto Predial</span></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"></div></td><td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px 0px 0px 5px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 5px;\">1.1.- Hoja de Resumen - HR</span></td><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\">&nbsp;&nbsp;<a href=\"https://municalana.gob.pe/documentos/HR.pdf\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(58, 132, 58); cursor: pointer;\"><img src=\"http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png\" style=\"margin: 0px; padding: 0px; border-width: initial; border-color: initial; border-image: initial; outline: none; line-height: inherit; display: inline-block; max-width: 100%; height: auto;\"></a></div></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"></div></td><td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px 0px 0px 5px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 5px;\">1.2.- Predio Urbano - PR</span></td><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><a href=\"https://municalana.gob.pe/documentos/PU.pdf\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(58, 132, 58); cursor: pointer;\"><img src=\"http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png\" style=\"margin: 0px; padding: 0px; border-width: initial; border-color: initial; border-image: initial; outline: none; line-height: inherit; display: inline-block; max-width: 100%; height: auto;\"></a></div></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"></div></td><td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px 0px 0px 5px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 5px;\">1.3.- Predio Rustico - PR</span></td><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><a href=\"https://municalana.gob.pe/documentos/PR.pdf\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(58, 132, 58); cursor: pointer;\"><img src=\"http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png\" style=\"margin: 0px; padding: 0px; border-width: initial; border-color: initial; border-image: initial; outline: none; line-height: inherit; display: inline-block; max-width: 100%; height: auto;\"></a></div></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td colspan=\"5\" valign=\"middle\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; font-weight: bolder;\">2.- Instrucciones para el llenado del Formato de Declaración Jurada</span></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"></div></td><td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px 0px 0px 25px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 15px;\">2.1.- Hoja de Resumen - HR</span></td><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><a href=\"https://municalana.gob.pe/documentos/INDXICACION%20Y%20LLENADO%20HR.pdf\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(58, 132, 58); cursor: pointer;\"><img src=\"http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png\" style=\"margin: 0px; padding: 0px; border-width: initial; border-color: initial; border-image: initial; outline: none; line-height: inherit; display: inline-block; max-width: 100%; height: auto;\"></a></div></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"></div></td><td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><span style=\"margin: 0px 0px 0px 5px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 5px;\">2.2.- Predio Urbano - PU</span></td><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><a href=\"https://municalana.gob.pe/documentos/INDICACION%20Y%20LLENADO%20PU.pdf\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit; color: rgb(58, 132, 58); cursor: pointer;\"><img src=\"http://cdn.munialbarracin.gob.pe/web_institucional/images/pdf-24.png\" style=\"margin: 0px; padding: 0px; border-width: initial; border-color: initial; border-image: initial; outline: none; line-height: inherit; display: inline-block; max-width: 100%; height: auto;\"></a></div></td></tr><tr style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><td style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><div align=\"center\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"></div></td><td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\"><p><span style=\"margin: 0px 0px 0px 5px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 5px;\">2.3- Predio Rustico - PR</span></p><p><span style=\"margin: 0px 0px 0px 5px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 5px;\">&nbsp;</span></p><p><span style=\"margin: 0px 0px 0px 5px; padding: 0px; border: none; outline: none; line-height: inherit; text-align: justify; text-indent: 5px;\">www</span></p></td></tr></tbody></table>',	'facebook.com',	'tiktok.com',	'instagram.com',	'youtube.com',	'<p>turismo<br></p>');

DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_slide` text COLLATE utf8_spanish2_ci NOT NULL,
  `orden_slide` int(11) NOT NULL,
  `img_slide` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `anno` text COLLATE utf8_spanish2_ci NOT NULL,
  `mes` text COLLATE utf8_spanish2_ci NOT NULL,
  `dia` text COLLATE utf8_spanish2_ci NOT NULL,
  `hora` text COLLATE utf8_spanish2_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `slide` (`id_slide`, `titulo_slide`, `orden_slide`, `img_slide`, `visitas`, `anno`, `mes`, `dia`, `hora`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16,	'MUNICIPALIDAD DISTRITAL DE ESTIQUE',	1,	'/img/banners/1680274671.png',	0,	'0',	'0',	'0',	'0',	0,	'2023-03-31 19:56:46',	'2023-04-02 10:16:43',	'2023-04-02 10:16:43'),
(17,	'MUNICIPALIDAD DISTRITAL DE ESTIQUE',	2,	'/img/banners/1680275002.jpg',	0,	'0',	'0',	'0',	'0',	1,	'2023-03-31 20:02:29',	'2023-08-10 17:57:02',	NULL),
(18,	'MUNICIPALIDAD DISTRITAL DE ESTIQUE',	1,	'/img/banners/1680412558.png',	0,	'0',	'0',	'0',	'0',	1,	'2023-04-02 10:15:44',	'2023-08-10 17:56:49',	NULL),
(19,	'La municipalidad de Estique \"Incentivando el inicio del año escolar 2023\"',	1,	'/img/banners/1682393515.jpg',	0,	'0',	'0',	'0',	'0',	1,	'2023-04-25 08:29:37',	'2023-08-10 17:56:57',	NULL),
(20,	'dawda',	1,	'/img/banners/1682480304.jpg',	0,	'0',	'0',	'0',	'0',	0,	'2023-04-26 08:38:24',	'2023-04-26 08:38:31',	'2023-04-26 08:38:31'),
(21,	'adwad',	1,	'/img/banners/1682480345.jpg',	0,	'0',	'0',	'0',	'0',	0,	'2023-04-26 08:39:05',	'2023-04-26 08:41:23',	'2023-04-26 08:41:23'),
(22,	'adwada',	2,	'/img/banners/1682480720.jpg',	0,	'0',	'0',	'0',	'0',	0,	'2023-04-26 08:43:53',	'2023-04-26 08:45:28',	'2023-04-26 08:45:28'),
(23,	'MDE',	1,	'/img/banners/1692131367.nature-strategy-update-900x400jpg.jpg',	0,	'0',	'0',	'0',	'0',	1,	'2023-05-28 04:47:07',	'2023-08-16 00:30:23',	'2023-08-16 00:30:23'),
(24,	'Example 1',	2,	'/img/banners/1686082220.jpg',	0,	'0',	'0',	'0',	'0',	1,	'2023-06-07 01:10:20',	'2023-06-07 01:41:26',	'2023-06-07 01:41:26'),
(25,	'ejemplo 1',	10,	'/img/banners/1686084106.nature-strategy-update-900x400jpg.jpg',	0,	'0',	'0',	'0',	'0',	1,	'2023-06-07 01:41:46',	'2023-06-07 01:44:31',	'2023-06-07 01:44:31'),
(26,	'Ejemplo 1',	3,	'/img/banners/1686084578.nature-strategy-update-900x400jpg.jpg',	0,	'0',	'0',	'0',	'0',	0,	'2023-06-07 01:49:38',	'2023-06-07 01:50:54',	'2023-06-07 01:50:54');

DROP TABLE IF EXISTS `tdocumento`;
CREATE TABLE `tdocumento` (
  `iddoc` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(40) NOT NULL,
  PRIMARY KEY (`iddoc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tdocumento` (`iddoc`, `detalle`) VALUES
(1,	'ORDENANZA MUNICIPAL'),
(2,	'ACUERDO DE CONCEJO'),
(3,	'DECRETO DE ALCALDIA'),
(4,	'RESOLUCION DE ALCALDIA'),
(5,	'RESOLUCION DE GERENCIA MUNICIPAL'),
(6,	'OTROS DOCUMENTOS');

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL,
  `dni` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `ventanilla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tickets` (`id`, `ticket`, `code`, `estado`, `dni`, `office_id`, `ventanilla`, `created_at`, `updated_at`, `deleted_at`, `type`) VALUES
(1,	'1',	'',	3,	'72147634',	0,	'1',	'2024-07-11 20:45:39',	'2024-07-11 21:05:40',	NULL,	NULL),
(2,	'2',	'',	0,	'32569858',	0,	'',	'2024-07-11 21:02:35',	'2024-07-11 21:02:35',	NULL,	NULL),
(3,	'3',	'',	0,	'21458965',	0,	'',	'2024-07-11 21:03:06',	'2024-07-11 21:03:06',	NULL,	NULL),
(4,	'1',	'TR0001',	3,	'65896589',	11,	'1',	'2024-07-16 05:28:20',	'2024-07-17 04:34:19',	NULL,	NULL),
(5,	'2',	'CT0002',	0,	'65412358',	10,	'',	'2024-07-16 05:28:33',	'2024-07-16 05:28:33',	NULL,	NULL),
(7,	'2',	'TR0002',	3,	'56984587',	11,	'1',	'2024-07-17 01:56:14',	'2024-07-17 04:35:06',	NULL,	NULL),
(8,	'3',	'TR0003',	2,	'58458765',	11,	'1',	'2024-07-17 01:56:29',	'2024-07-17 04:35:28',	NULL,	NULL),
(9,	'3',	'CT0003',	0,	'87456523',	10,	'',	'2024-07-17 01:56:43',	'2024-07-17 01:56:43',	NULL,	NULL),
(10,	'1',	'SDD0001',	3,	'32569808',	12,	'3',	'2024-07-17 01:57:05',	'2024-07-17 02:38:05',	NULL,	NULL),
(11,	'2',	'SDD0002',	2,	'23658965',	12,	'3',	'2024-07-17 02:40:09',	'2024-07-17 02:40:34',	NULL,	NULL),
(12,	'4',	'TR0004',	0,	'25804587',	11,	'',	'2024-07-17 04:33:45',	'2024-07-17 04:33:45',	NULL,	NULL),
(13,	'1',	'TR0001',	2,	'12546363',	11,	'4',	'2024-07-17 05:08:33',	'2024-07-17 05:16:15',	NULL,	NULL),
(14,	'2',	'TR0002',	3,	'58058069',	11,	'5',	'2024-07-17 05:10:00',	'2024-07-17 05:16:07',	NULL,	NULL),
(15,	'3',	'TR0003',	1,	'25874123',	11,	'5',	'2024-07-17 05:10:17',	'2024-07-17 05:24:32',	NULL,	NULL),
(16,	'1',	'SDD0001',	0,	'85698521',	12,	'',	'2024-07-17 05:10:30',	'2024-07-17 05:10:30',	NULL,	NULL),
(17,	'4',	'TR0004',	0,	'78582565',	11,	'',	'2024-07-17 05:10:51',	'2024-07-17 05:10:51',	NULL,	NULL),
(18,	'1',	'CT0001',	0,	'65890785',	10,	'',	'2025-05-09 16:51:05',	'2025-05-09 16:51:05',	NULL,	NULL),
(19,	'1',	'SDD0001',	0,	'25478541',	12,	'',	'2025-05-09 16:51:18',	'2025-05-09 16:51:18',	NULL,	NULL),
(20,	'1',	'TR0001',	2,	'25807414',	11,	'4',	'2025-05-09 16:52:36',	'2025-05-09 16:53:44',	NULL,	NULL),
(21,	'1',	'TR0001',	0,	'########',	11,	'',	'2025-05-27 21:30:21',	'2025-05-27 21:30:21',	NULL,	NULL),
(22,	'2',	'TR0002',	0,	'########',	11,	'',	'2025-05-27 21:30:39',	'2025-05-27 21:30:39',	NULL,	NULL),
(23,	'3',	'TR0003',	0,	'########',	11,	'',	'2025-05-27 21:30:42',	'2025-05-27 21:30:42',	NULL,	NULL),
(24,	'4',	'TR0004',	0,	'########',	11,	'',	'2025-05-27 21:31:18',	'2025-05-27 21:31:18',	NULL,	NULL),
(25,	'1',	'CT0001',	0,	'########',	10,	'',	'2025-05-27 21:31:23',	'2025-05-27 21:31:23',	NULL,	NULL),
(26,	'1',	'TR0001',	1,	'########',	11,	'0',	'2025-05-28 17:17:33',	'2025-05-28 17:17:34',	NULL,	NULL),
(27,	'2',	'TR0002',	2,	'########',	11,	'5',	'2025-05-28 17:26:04',	'2025-05-28 22:19:44',	NULL,	'Regular'),
(28,	'3',	'TR0003',	0,	'########',	11,	'',	'2025-05-28 17:26:12',	'2025-05-28 17:26:12',	NULL,	'Regular'),
(29,	'1',	'TR0001',	3,	'########',	11,	'5',	'2025-05-29 15:23:36',	'2025-05-29 15:24:21',	NULL,	NULL),
(30,	'2',	'TR0002',	3,	'########',	11,	'5',	'2025-05-29 15:23:39',	'2025-05-29 18:19:44',	NULL,	'Regular'),
(31,	'3',	'TR0003',	3,	'########',	11,	'5',	'2025-05-29 18:05:04',	'2025-05-29 18:19:56',	NULL,	'Regular'),
(32,	'1',	'SDD0001',	3,	'########',	12,	'7',	'2025-06-05 17:29:31',	'2025-06-05 17:40:52',	NULL,	'Regular'),
(33,	'2',	'SDD0002',	3,	'########',	12,	'7',	'2025-06-05 17:39:47',	'2025-06-05 17:41:13',	NULL,	'Regular'),
(34,	'3',	'SDD0003',	3,	'########',	12,	'7',	'2025-06-05 17:41:05',	'2025-06-05 17:41:23',	NULL,	'Regular'),
(35,	'4',	'SDD0004',	3,	'########',	12,	'7',	'2025-06-05 18:08:32',	'2025-06-05 20:54:11',	NULL,	'Regular'),
(36,	'5',	'SDD0005',	2,	'########',	12,	'7',	'2025-06-05 20:56:56',	'2025-06-05 20:58:04',	NULL,	'Regular'),
(37,	'1',	'TR0001',	2,	'########',	11,	'5',	'2025-06-05 20:56:57',	'2025-06-05 20:58:13',	NULL,	'Regular'),
(38,	'1',	'TR0001',	1,	'########',	11,	'5',	'2025-07-16 17:06:37',	'2025-07-16 17:14:35',	NULL,	'Regular');

DROP TABLE IF EXISTS `toficina`;
CREATE TABLE `toficina` (
  `idofi` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(150) NOT NULL,
  PRIMARY KEY (`idofi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `toficina` (`idofi`, `detalle`) VALUES
(1,	'LOGISTICA'),
(2,	'GERENCIA'),
(3,	'ALCALDIA'),
(4,	'GERENCIA PLANEAMIENTO Y PRESUPUESTO'),
(5,	'SUB GERENCIA DE CONTABILIDAD'),
(6,	'GERENCIA MUNICIPAL'),
(7,	'GERENCIA DE ADMINISTRACION'),
(8,	'GERENCIA DE DESARROLLO ECONOMICO SOCIAL'),
(9,	'GERENCIA DE DESARROLLO URBANO E INFRAESTRUCTURA'),
(10,	'SUB GERENCIA DEL DESARROLLO DEL CAPITAL HUMANO'),
(11,	'SUB GERENCIA DE LOGISTICA'),
(12,	'SUB GERENCIA DE TECNOLOGIAS DE INFORMACION Y COMUNICACIONES'),
(13,	'SUB GERENCIA DE PLANEAMIENTO URBANO, CATASTRO Y MARGESI'),
(14,	'SUB GERENCIA DE GESTION AMBIENTAL Y MANTENIMIENTO'),
(15,	'SUB GERENCIA DE SEGURIDAD CIUDADANA, DEFENSA CIVIL Y POLICIA MUNICIPAL'),
(16,	'SUB GERENCIA DE CULTURA Y DEPORTE'),
(17,	'OFICINA DE PROGRAMACION DE INVERSIONES (OPI)'),
(18,	'OFICINA DE SUPERVISION DE PROYECTOS (LIQUIDACION)'),
(19,	'OFICINA DE SECRETARIA GENERAL'),
(20,	'UNIDAD DE REGISTRO CIVIL'),
(21,	'GRIFO MUNICIPAL'),
(22,	'DEMUNA'),
(23,	'OCI'),
(24,	'SUB GERENCIA DE TESORERIA'),
(25,	'DEFENSA CIVIL'),
(26,	'ASISTENCIA SOCIAL'),
(27,	'VASO DE LECHE'),
(28,	'OMAPED'),
(29,	'GERENCIA DE ASESORIA JURIDICA'),
(30,	'EQUIPO MECANICO'),
(31,	'SUB GERENCIA DE GESTION TRIBUTARIA'),
(32,	'CONSEJO MUNICIPAL'),
(34,	'SUB GERENCIA DE ESTUDIOS Y PROYECTOS');

DROP TABLE IF EXISTS `tran_transparencia`;
CREATE TABLE `tran_transparencia` (
  `in_id_transparencia` int(11) NOT NULL AUTO_INCREMENT,
  `in_id_categoria` int(11) NOT NULL DEFAULT '0',
  `in_id_periodo` int(11) NOT NULL DEFAULT '0',
  `in_id_usuario` int(11) NOT NULL DEFAULT '0',
  `in_id_accion` int(11) NOT NULL DEFAULT '0',
  `vc_titulo_transparencia` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `vc_numeracion_transparencia` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `in_numero_transparencia` int(11) DEFAULT NULL,
  `tx_contenido_transparencia` text COLLATE latin1_spanish_ci,
  `dt_fecha_transparencia` datetime DEFAULT NULL,
  `in_activo_transparencia` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Estado de la Transparencia',
  `in_publicado_transparencia` tinyint(1) NOT NULL DEFAULT '1',
  `dt_fechapublica_transparencia` datetime DEFAULT NULL,
  `dt_fechamod_transparencia` datetime DEFAULT NULL,
  `dt_fechareg_transparencia` datetime DEFAULT NULL,
  `nomfile` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`in_id_transparencia`),
  FULLTEXT KEY `busqueda` (`vc_titulo_transparencia`,`tx_contenido_transparencia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `tran_transparencia` (`in_id_transparencia`, `in_id_categoria`, `in_id_periodo`, `in_id_usuario`, `in_id_accion`, `vc_titulo_transparencia`, `vc_numeracion_transparencia`, `in_numero_transparencia`, `tx_contenido_transparencia`, `dt_fecha_transparencia`, `in_activo_transparencia`, `in_publicado_transparencia`, `dt_fechapublica_transparencia`, `dt_fechamod_transparencia`, `dt_fechareg_transparencia`, `nomfile`) VALUES
(477,	0,	0,	0,	0,	'Presupuesto Analítico de Gastos - PAP ',	NULL,	NULL,	'2015',	NULL,	1,	1,	NULL,	NULL,	NULL,	'PAP 2015.pdf'),
(476,	0,	0,	0,	0,	'Manual de Procedimientos Administrativos - MAPRO',	NULL,	NULL,	'2010',	NULL,	1,	1,	NULL,	NULL,	NULL,	'MAPRO 2010.pdf'),
(475,	0,	0,	0,	0,	'Texto Único de Procedimiento Administrativos - TUPA',	NULL,	NULL,	'2016',	NULL,	1,	1,	NULL,	NULL,	NULL,	'TUPA 2016.pdf');

DROP TABLE IF EXISTS `tributes`;
CREATE TABLE `tributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `ventanilla` smallint(6) NOT NULL DEFAULT '0',
  `office_id` int(10) unsigned NOT NULL DEFAULT '0',
  `is_superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `correo`, `cellphone`, `position`, `active`, `ventanilla`, `office_id`, `is_superadmin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'admin',	'admin',	'$2y$10$Nqet.vRW//CWweb8WFFd5.y2Q05o4iEvyVa7MhvLFbtII9z9iYrdq',	1,	'',	'',	'',	0,	4,	11,	1,	'KVacqky1BjHicT3NiPOMpXnOQS4tFeuaBYICCkFf4hSbgmW14wBAjTeVXe7S',	NULL,	NULL,	NULL),
(2,	'asesoria',	'asesoria',	'$2y$10$Nqet.vRW//CWweb8WFFd5.y2Q05o4iEvyVa7MhvLFbtII9z9iYrdq',	5,	'',	'',	'',	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL),
(3,	'imagen',	'imagen1234',	'$2y$10$VPH7tlhqQzKVt7DpGd3av.CWuk.EMvWcWIaj3ERAFDHOoTE4IIK3W',	2,	NULL,	NULL,	NULL,	0,	7,	12,	0,	'7KmltyfAhEKPFvu3Vt1K0QrLrCO8Wz8Jw5qQBh3uGYB2zBC4HURHfmfVxU8a',	NULL,	'2025-06-05 16:10:46',	NULL),
(4,	'rrhh',	'monitor1234',	'$2y$10$3lAgQdaTYum9OvRm7ymMQeAe43gx/3dDu.SeqbMSJ7QIGG5FVl7Bi',	4,	NULL,	NULL,	NULL,	0,	0,	0,	0,	'Py4HdQEy2PE1URfp8d7uYbJYO1rd9PaiSHPtLRb42o2B5nzSnfWIq2BDQkZi',	NULL,	'2025-06-05 16:19:43',	NULL),
(5,	'juanito vende',	'usuarerr',	'$2y$10$TiwmzAH8CDJK1NzYcMPih.ko0YUwTSF0PEKw87H/e.3qKzxeeKB/i',	1,	'juanit@gmail.com',	'93493459',	'jefa',	0,	6,	12,	0,	'V9z4HRt2aKCpnwxjhEBavPlpZJPIBVVdbSZLOAzjaIbcyi4lzBO8Mn376e9T',	'2024-06-15 21:46:22',	'2024-07-17 02:35:31',	NULL),
(6,	'probando1',	'probando1',	'$2y$10$pDx7awo4NMOChK25hGqUn.uP14NfIWxVot4TShlBKieZhQjNd71p2',	1,	'probando1@gmail.com',	'34343423',	'atendedor',	0,	0,	11,	0,	NULL,	'2024-07-17 05:03:40',	'2025-05-28 21:25:23',	NULL),
(7,	'ticket pantalla',	'ticket1234',	'$2y$10$2Pug7C9v3MdzaNkXCb40QeqXxUtxeDMTszcZaB/RR0ZkpIN6FiikO',	3,	NULL,	NULL,	NULL,	0,	0,	0,	0,	'I5L1sV7NX3qZwG9iXYlbjnTSIQ2Af7CbKr7yboyDnK2akKCZO7PTM3vPtbQJ',	'2025-05-27 22:13:45',	'2025-05-28 21:24:29',	NULL),
(8,	'juan pe',	'tesorero1234',	'$2y$10$du.wMXBZZlQhOidXOKlRDe.T/VW2W0o2RP.SwOAjaHcSrpXEznGma',	2,	'juanqq@gmail.com',	'453453464',	'trabajador',	0,	5,	11,	0,	NULL,	'2025-05-28 15:21:32',	'2025-06-05 20:55:06',	NULL);

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `login` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_id` (`perfil_id`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `usuario` (`id`, `name`, `created`, `updated`, `login`, `password`, `email`, `perfil_id`) VALUES
(1,	'Administrador',	'2014-07-07 10:55:40',	'2015-04-20 10:00:00',	'admin',	'admin',	'admin@gmail.com',	1),
(6,	'secre',	'2014-07-07 22:57:00',	'2015-03-27 15:58:00',	'secre',	'secre',	'emperatriz@gmail.com',	9),
(8,	'Jefe Imagen',	'2015-03-27 15:59:00',	'2015-04-16 10:50:00',	'imagen',	'muni2015',	'imagen@mdcn.gob.pe',	18);

DROP TABLE IF EXISTS `usuariosconvoca`;
CREATE TABLE `usuariosconvoca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` text NOT NULL,
  `clave_usuario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `usuariosconvoca` (`id`, `nombre_usuario`, `clave_usuario`) VALUES
(1,	'mdcnpersonal',	'tacnaperu123456');

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `video` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `youtube`;
CREATE TABLE `youtube` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` text NOT NULL,
  `video` text NOT NULL,
  `titulo` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `youtube` (`id`, `foto`, `video`, `titulo`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'/files/videos/1721064213mp4',	'',	'Como está la moto sasuke',	1,	'2024-07-15 22:23:33',	'2025-05-29 21:19:09',	NULL),
(2,	'/files/videos/1721065912mp4',	'',	'El chico del ramen usa el amaterasu',	1,	'2024-07-15 22:51:52',	'2025-05-29 21:19:15',	NULL);

-- 2025-07-16 17:19:54
