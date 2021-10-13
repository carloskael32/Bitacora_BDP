-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2021 a las 19:51:06
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitacora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `agencias`
--

INSERT INTO `agencias` (`id`, `agencia`, `created_at`, `updated_at`) VALUES
(8, 'Camargo', NULL, NULL),
(9, 'Monteagudo', NULL, NULL),
(10, 'Sucre', NULL, NULL),
(12, 'Caranavi', NULL, NULL),
(13, 'Chulumani', NULL, NULL),
(15, 'El Alto', NULL, NULL),
(16, 'La Paz', NULL, NULL),
(17, 'Luribay', NULL, NULL),
(18, 'Patacamaya', NULL, NULL),
(19, 'San BuenaVentura', NULL, NULL),
(20, 'Palos Plancos', NULL, NULL),
(21, 'Villa Tunari', NULL, NULL),
(22, 'Cochabamba', NULL, NULL),
(23, 'Punata', NULL, NULL),
(24, 'Independencia', NULL, NULL),
(25, 'Aiquile', NULL, NULL),
(26, 'Oruro', NULL, NULL),
(27, 'Salinas de Garci Mendoza', NULL, NULL),
(28, 'Potosi', NULL, NULL),
(29, 'Uyuni', NULL, NULL),
(30, 'Tupiza', NULL, NULL),
(31, 'Tarija', NULL, NULL),
(32, 'Yacuiba', NULL, NULL),
(33, 'Santa Cruz', NULL, NULL),
(34, 'Comarapa', NULL, NULL),
(35, 'Mairana', NULL, NULL),
(36, 'Montero', NULL, NULL),
(37, 'Yapacani', NULL, NULL),
(38, 'Santa Rosa de la Roca', NULL, NULL),
(39, 'Camiri', NULL, NULL),
(40, 'San Julian', NULL, NULL),
(41, 'Santa Rosa del Sara', NULL, NULL),
(42, 'Riberalta', NULL, NULL),
(43, 'Trinidad', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoras`
--

CREATE TABLE `bitacoras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EncargadoOP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Temperatura` double NOT NULL,
  `Humedad` double NOT NULL,
  `Filtracion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UPS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Generador` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bitacoras`
--

INSERT INTO `bitacoras` (`id`, `agencia`, `EncargadoOP`, `Temperatura`, `Humedad`, `Filtracion`, `UPS`, `Generador`, `Observaciones`, `Fecha`) VALUES
(1, 'La Paz', 'cmamani', 100, 100, 'no', 'si', 'si', 'so', '2021-09-17'),
(11, 'La Paz', 'cmamani', 150, 150, 'no', 'si', 'si', 'so', '2021-09-02'),
(12, 'La Paz', 'cmamani', 150, 150, 'no', 'si', 'si', 'so', '2021-09-02'),
(13, 'La Paz', 'cmamani', 100, 50, 'no', 'si', 'si', 'so', '2021-09-02'),
(14, 'La Paz', 'cmamani', 50, 100, 'no', 'si', 'si', 'so', '2021-09-02'),
(15, 'La Paz', 'cmamani', 50, 100, 'no', 'si', 'si', 'so', '2021-09-02'),
(16, 'La Paz', 'cmamani', 50, 100, 'no', 'si', 'si', 'so', '2021-09-02'),
(17, 'La Paz', 'cmamani', 50, 100, 'no', 'si', 'si', 'so', '2021-09-02'),
(19, 'La Paz', 'cmamani', 50, 100, 'no', 'si', 'si', 'so', '2021-09-02'),
(26, 'La Paz', 'cmamani', 80, 52, 'no', 'si', 'si', 'so', '2021-09-02'),
(27, 'La Paz', 'cmamani', 200, 50, 'no', 'si', 'si', 'so', '2021-09-02'),
(28, 'La Paz', 'cmamani', 100, 20, 'no', 'si', 'no', 'so', '2021-09-02'),
(29, 'La Paz', 'cmamani', 100, 20, 'no', 'si', 'no', 'so', '2021-09-02'),
(30, 'La Paz', 'cmamani', 20, 40, 'no', 'si', 'si', 'so', '2021-09-03'),
(31, 'La Paz', 'cmamani', 15, 12, 'no', 'si', 'si', 'so', '2021-09-03'),
(32, 'La Paz', 'cmamani', 15.5, 12, 'no', 'si', 'si', 'so', '2021-09-03'),
(33, 'La Paz', 'cmamani', 22.5, 41, 'No', 'Si', 'Si', 'aumento de humedad', '2021-09-03'),
(34, 'La Paz', 'cmamani', 50, 40, 'no', 'si', 'si', 'so', '2021-09-08'),
(35, 'El Alto', 'valiaga', 25, 40, 'no', 'si', 'si', 'so', '2021-08-10'),
(36, 'El Alto', 'valiaga', 25, 30, 'no', 'si', 'si', 'so', '2021-08-04'),
(37, 'La Paz', 'cmamani', 30, 10, 'no', 'si', 'si', 'so', '2021-09-10'),
(38, 'El Alto', 'valiaga', 10, 10, 'no', 'si', 'si', 'so', '2021-09-10'),
(39, 'El Alto', 'valiaga', 10, 20, 'no', 'si', 'si', 'so', '2021-09-13'),
(40, 'La Paz', 'cmamani', 5, 10, 'no', 'si', 'si', 'so', '2021-01-06'),
(42, 'La Paz', 'cmamani', 7, 6, 'no', 'si', 'si', 'so', '2021-03-16'),
(43, 'La Paz', 'cmamani', 6, 9, 'no', 'si', 'si', 'so', '2021-04-16'),
(45, 'La Paz', 'cmamani', 2, 3, 'no', 'si', 'si', 'so', '2021-06-16'),
(46, 'La Paz', 'cmamani', 6, 9, 'no', 'si', 'si', 'so', '2021-07-16'),
(47, 'La Paz', 'cmamani', 21, 12, 'no', 'si', 'si', 'so', '2021-08-16'),
(48, 'La Paz', 'cmamani', 15, 15, 'no', 'si', 'si', 'so', '2021-01-20'),
(49, 'La Paz', 'cmamani', 8, 8, 'no', 'si', 'si', 'so', '2021-05-16'),
(50, 'El Alto', 'valiaga', 15, 20, 'no', 'si', 'si', 'so', '2021-09-17'),
(51, 'La Paz', 'cmamani', 20, 20, 'no', 'si', 'si', 'so', '2021-09-17'),
(59, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-05-05'),
(60, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-02'),
(61, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-03'),
(62, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-04'),
(63, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-05'),
(64, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-06'),
(65, 'El Alto', 'valiaga', 90, 50, 'no', 'si', 'si', 'so', '2021-09-07'),
(67, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-17'),
(68, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-17'),
(69, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-17'),
(70, 'El Alto', 'valiaga', 50, 90, 'no', 'si', 'si', 'so', '2021-09-17'),
(71, 'La Paz', 'cmamani', 60, 90, 'no', 'si', 'si', 'so', '2021-09-17'),
(72, 'La Paz', 'cmamani', 90, 90, 'no', 'si', 'si', 'so', '2021-09-20'),
(75, 'El Alto', 'valiaga', 50, 86, 'no', 'si', 'si', 'so', '2021-09-20'),
(76, 'El Alto', 'valiaga', 60, 20, 'no', 'si', 'si', 'so', '2021-09-20'),
(77, 'El Alto', 'valiaga', 70, 50, 'no', 'si', 'si', 'so', '2021-09-20'),
(78, 'El Alto', 'valiaga', 70, 50, 'no', 'si', 'si', 'so', '2021-09-20'),
(79, 'El Alto', 'valiaga', 70, 20, 'no', 'si', 'si', 'so', '2021-09-20'),
(88, 'La Paz', 'cmamani', 60, 20, 'no', 'si', 'si', 'so', '2021-09-20'),
(89, 'Luribay', 'fgutierrez', 20.1, 35.5, 'no', 'si', 'si', 'so', '2021-09-21'),
(90, 'La Paz', 'cmamani', 20.1, 35, 'No', 'si', 'si', 'so', '2021-09-23'),
(91, 'La Paz', 'cmamani', 20, 15, 'No', 'no', 'si', 'so', '2021-09-24'),
(92, 'La Paz', 'cmamani', 3.2, 5.2, 'No', 'no', 'sno', 'so', '2021-09-24'),
(93, 'La Paz', 'cmamani', 1.2, 2, 'No', 'no', 'si', 'no', '2021-09-24'),
(94, 'La Paz', 'cmamani', 20.85, 15.75, 'No', 'no', 'no', 'so', '2021-09-24'),
(95, 'La Paz', 'cmamani', 20.1, 35.5, 'No', 'No', 'No', 'Sin Observaciones', '2021-09-24'),
(96, 'La Paz', 'cmamani', 10.5, 22.05, 'No', 'No', 'No', 'Sin Observaciones', '2021-09-24'),
(97, 'La Paz', 'cmamani', 15, 20, 'No', 'No', 'No', 'Sin Observaciones', '2021-09-24'),
(98, 'El Alto', 'valiaga', 23.2, 33, 'No', 'En linea', 'Fuera de linea', 'Deterioro de pintura', '2021-09-27'),
(99, 'Luribay', 'fgutierrezzzzzz', 20.5, 15.2, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-09-27'),
(100, 'Patacamaya', 'rlopez', 20, 15.2, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-09-28'),
(101, 'Buenaventura', 'mconde', 15.2, 20.6, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-09-29'),
(102, 'Palos Blancos', 'mdavila', 15, 20, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-09-29'),
(103, 'Chulumani', 'lmamani', 15, 52, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-09-29'),
(104, 'Caranavi', 'rmachicado', 15, 20, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-09-29'),
(105, 'Yacuiba', 'lespinoza', 15, 20, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-10-01'),
(106, 'Luribay', 'fgutierrez', 20, 30, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-10-01'),
(107, 'prueba1', 'prueba1', 15, 20, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-10-07'),
(108, 'prueba', 'valiaga', 20, 20, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-10-07'),
(109, 'Chulumani', 'lmamani', 20, 30, 'No', 'En linea', 'En linea', 'Sin Observaciones', '2021-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generadors`
--

CREATE TABLE `generadors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `encargadoop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `generadors`
--

INSERT INTO `generadors` (`id`, `fecha`, `encargadoop`, `agencia`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, '2021-10-01', 'lespinoza', 'Yacuiba', 'so', NULL, NULL),
(2, '2021-10-01', 'fgutierrez', 'Luribay', 'sin observaciones', NULL, '2021-10-05 14:15:06'),
(3, '2021-10-13', 'fgutierrez', 'Luribay', 'so', NULL, NULL),
(4, '2021-10-13', 'lmamani', 'Chulumani', 'sin observaciones', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_23_162120_create_bitacoras_table', 1),
(5, '2021_09_30_131219_create_generadors_table', 2),
(6, '2021_10_11_105843_create_agencias_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `agencia`, `acceso`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'yes', 'carlos.mamani@bdp.com.bo', NULL, '$2y$10$0ROwmRYTzn.bj4WB6V82xu5KjYPgUpRZxsWgCdYeQtvA9k/b5GAbW', NULL, '2021-09-01 15:42:00', '2021-09-02 16:41:20'),
(2, 'rcondori', 'La Paz', 'no', 'rodrigo.condori@bdp.com.bo', NULL, '$2y$10$ZYh4a32Xc.hhILyq6M8byu4y3b6zLN7s0vLf67kJQxxI3HMK6PUM.', NULL, '2021-09-01 15:42:00', '2021-09-29 19:38:13'),
(7, 'acondori', 'El Alto', 'no', 'alida.condori@bdp.com.bo', NULL, '$2y$10$KCd7TL2oTIsh1DJirSIyN.BsG26.IkRdURKMWy88Gl1n/7YqKpPqC', NULL, NULL, '2021-09-29 19:37:26'),
(11, 'fgutierrez', 'Luribay', 'no', 'filomena.gutierrez@bdp.com.bo', NULL, '$2y$10$7SmxXE644Z548Jn0QWXGLuXDuSoOhM.M5ZVqC4s2.D4IhjizGZRpO', NULL, NULL, '2021-09-28 17:28:17'),
(12, 'rlopez', 'Patacamaya', 'no', 'ronald.lopez@bdp.com.bo', NULL, '$2y$10$nB2eoS71TmR.Jg6zjhM7xuuzAj5bmIvOFnDYf2fNdxw4xK4KGRTrS', NULL, NULL, NULL),
(14, 'rmachicado', 'Caranavi', 'no', 'ricardo.machicado@bdp.com.bo', NULL, '$2y$10$5uUQvvuM109odsf6sH3Xd.C5GP7o1g91ryZH0pDx3THjk8VdRWY5m', NULL, '2021-09-29 14:26:50', '2021-09-29 18:07:14'),
(15, 'lmamani', 'Chulumani', 'no', 'lizardo.mamani@bdp.com.bo', NULL, '$2y$10$miodkTuXmiCmzkFYfIBpu.DPJyTHXi/lfijb7Ft8lcin.GqGxzGMm', NULL, '2021-09-29 14:26:51', '2021-09-29 18:05:39'),
(16, 'mdavila', 'Palos Blancos', 'no', 'merced.davila@bdp.com.bo', NULL, '$2y$10$uTxJln3UydzHb3/rurLXvOFCw9Q4aLBL2R7VGkoPeFX1.KaQ0esr.', NULL, '2021-09-29 14:26:51', '2021-09-29 14:35:27'),
(17, 'mconde', 'Buenaventura', 'no', 'marleny.conde@bdp.com.bo', NULL, '$2y$10$2p0jBbu6JsB34JcfMOGK0eezAYc8L6D.FYfP7FVs2VPap6zNPJ.0G', NULL, '2021-09-29 14:26:51', '2021-09-29 14:34:39'),
(22, 'jbarrios', 'Monteagudo', 'no', 'javier.barrios@bdp.com.bo', NULL, '$2y$10$mGso/kxd.DoQ6z6BYfBvruffxRjEV3OVqVsHmbnvh94CHpjsPwaeC', NULL, NULL, NULL),
(23, 'agarcia', 'Aiquile', 'no', 'abel.garcia@bdp.com.bo', NULL, '$2y$10$m6T0DIQ6cSTZG3.rf4V/Ue64vwZjl/UP3spKaF5MhqzKJMfqBNbAW', NULL, NULL, NULL),
(24, 'rmoretta', 'Santa Rosa de Roca', 'no', 'rene.moretta@bdp.com.bo', NULL, '$2y$10$1s0/2Vbmg4ONzd9fk169m.z6zrM8rA1XzSgOudLPc503V8y3AoXuO', NULL, NULL, NULL),
(25, 'ribarra', 'San Julian', 'no', 'rosendo.ibarra@bdp.com.bo', NULL, '$2y$10$jJoXsXaAWoHaUJ..YzRks.smKf5Oa8foHSZy/WL413.nDG4o6R37O', NULL, NULL, NULL),
(26, 'lcastro', 'Camiri', 'no', 'lisseth.castro@bdp.com.bo', NULL, '$2y$10$ut7/1C1Upn6jk9r.nGwgg.L0CnEEzno3cBn1XFUE29UBP2Fj3h7YS', NULL, NULL, NULL),
(27, 'panaguaya', 'Mairana', 'no', 'pamela.anaguaya@bdp.com.bo', NULL, '$2y$10$sRJ5u6vleW/SuMJSA0rfsOKkcfJUGHwDNXr/5X.MCjmdEnYyd3sle', NULL, NULL, NULL),
(28, 'lespinoza', 'Yacuiba', 'no', 'lido.espinoza@bdp.com.bo', NULL, '$2y$10$KtumLvrNVWPmCRsz5SnGdOqqa9k3uU.g6EavJwRZNjYcFYYbTgjLm', NULL, NULL, NULL),
(32, 'prueba1', 'prueba1', 'no', 'seguridad.ti@bdp.com.bo', NULL, '$2y$10$WzOMSLjw6REJxepgS1P0r.8g5fCgxwBipofEUssDP22KnOMWAw1wi', NULL, NULL, NULL),
(33, 'valiaga', '', 'yes', 'virginia.aliaga@bdp.com.bo', NULL, '$2y$10$J6OtRAmS4O/U2C8asmKYdOdMqgymA7ynYahwHQsdEIfDLwviYoZk2', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacoras`
--
ALTER TABLE `bitacoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `generadors`
--
ALTER TABLE `generadors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `bitacoras`
--
ALTER TABLE `bitacoras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generadors`
--
ALTER TABLE `generadors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
