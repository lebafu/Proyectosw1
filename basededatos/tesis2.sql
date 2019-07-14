-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2019 a las 00:14:13
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_profesor_guia` int(11) NOT NULL,
  `nombre_alumno` varchar(255) NOT NULL,
  `profesor_comision1` varchar(255) NOT NULL,
  `profesor_comision2` varchar(255) NOT NULL,
  `profesor_comision3` varchar(255) DEFAULT NULL,
  `profesor_externo1` varchar(255) DEFAULT NULL,
  `correo_profe_externo1` varchar(255) DEFAULT NULL,
  `institucion1` varchar(255) DEFAULT NULL,
  `profe_externo2` varchar(255) DEFAULT NULL,
  `correo_profe_externo2` varchar(255) DEFAULT NULL,
  `institucion2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

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
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `nombre_tesis` varchar(255) NOT NULL,
  `area_tesis` varchar(255) NOT NULL,
  `profesor_guia` varchar(255) NOT NULL,
  `carrera` varchar(3) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `objetivos` varchar(255) NOT NULL,
  `tipo_vinculacion` varchar(255) NOT NULL,
  `nombre_vinculacion` varchar(255) NOT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `estado1` int(11) NOT NULL DEFAULT 1,
  `estado2` int(11) DEFAULT NULL,
  `fecha_peticion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo_usuario`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@admin.com', NULL, '$2y$10$P7Por1l.Ep3mdBZyEvq5OOaTOCePQZw.T0S4Zkj9qF5LFJADxsrue', 0, NULL, NULL, NULL),
(2, 'Marco Toranzo', 'mtoranzo@gmail.com', NULL, '$2y$10$cDO7FmP/DByIJOOXnE3A0erApwHtRVCaLipU6xKv43bX63CNGvJHm', 2, NULL, NULL, NULL),
(3, 'Ivan Merino', 'IvanMerino@gmail.com', NULL, '$2y$10$L.hX2TqJArzPGdOZtpOrMeZD0l.7IGs3gNJYDJWIHJdeQnv.qDd16', 3, NULL, NULL, NULL),
(4, 'Leonardo Ignacio Bascuñan Fuentealba', 'leonardob94@hotmail.com', NULL, '$2y$10$6490PIadS/2p/RGUcq2j0eZ/Up/adnCsGAqoO3.7f7f2Wb/UZeMlS', 1, NULL, '2019-07-14 23:56:55', '2019-07-14 23:56:55'),
(5, 'Daniel Gonzalez', 'DanielG@gmail.com', NULL, '$2y$10$/4vu2hHMHXBt0JDq0qObzO.UkE3UowDaC1RHFbeU.RTjS.wg2PDI6', 1, NULL, '2019-07-14 23:59:24', '2019-07-14 23:59:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
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
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_tesis` (`nombre_tesis`);

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comision`
--
ALTER TABLE `comision`
  ADD CONSTRAINT `comision_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tesis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
