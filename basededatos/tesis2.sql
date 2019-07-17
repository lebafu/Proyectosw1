-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2019 a las 02:33:48
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
  `id_profesor_guia` int(11) DEFAULT NULL,
  `nombre_alumno` varchar(255) NOT NULL,
  `profesor1_comision` varchar(255) NOT NULL,
  `profesor2_comision` varchar(255) NOT NULL,
  `profesor3_comision` varchar(255) DEFAULT NULL,
  `profesor1_externo` varchar(255) DEFAULT NULL,
  `correo_profe1_externo` varchar(255) DEFAULT NULL,
  `institucion1` varchar(255) DEFAULT NULL,
  `profe2_externo` varchar(255) DEFAULT NULL,
  `correo_profe2_externo` varchar(255) DEFAULT NULL,
  `institucion2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`id`, `id_profesor_guia`, `nombre_alumno`, `profesor1_comision`, `profesor2_comision`, `profesor3_comision`, `profesor1_externo`, `correo_profe1_externo`, `institucion1`, `profe2_externo`, `correo_profe2_externo`, `institucion2`) VALUES
(18, 17, 'Camilo Cavieres', 'Angelica Urrutia', 'Xaviera Lopez', 'Angelica Urrutia', 'Jose Torres', 'JoseT@gmail.com', 'Universidad de Talca', 'Gabriel Perez', 'GabrielP@gmail.com', 'Universidad campo feo ctmmmmm!!!!!');

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
  `rut` varchar(255) NOT NULL,
  `nombre_tesis` varchar(255) NOT NULL,
  `area_tesis` varchar(255) NOT NULL,
  `ano_ingreso` int(11) NOT NULL,
  `profesor_guia` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `contribucion` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `objetivos` varchar(255) NOT NULL,
  `tipo_vinculacion` varchar(255) NOT NULL,
  `nombre_vinculacion` varchar(255) NOT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `estado1` int(11) NOT NULL DEFAULT 1,
  `estado2` int(11) DEFAULT NULL,
  `fecha_peticion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id`, `nombre_completo`, `rut`, `nombre_tesis`, `area_tesis`, `ano_ingreso`, `profesor_guia`, `carrera`, `tipo`, `contribucion`, `descripcion`, `objetivos`, `tipo_vinculacion`, `nombre_vinculacion`, `observacion`, `estado1`, `estado2`, `fecha_peticion`) VALUES
(8, 'Carlos Andres Cancino Duran', '18670608', 'Reconocimiento de patrones con redes neuronalesen imagenes', 'IA', 2013, 'Sergio Hernandez', 'Ingenieria Civil Informatica', 'Tesis', 'Promover y potenciar el concepto de ciudades inteligentes', 'Descripcion1 Descripcion2 Descripcion3', 'Aplicación de IA, en camaras de seguridad', 'Proyecto', 'Ciudades inteligentes XX', NULL, 1, NULL, '2019-07-16 04:02:26'),
(10, 'Oscar Raul Perez Fernandez', '16788324', 'Sistema de evidencias UCM', 'Desarrollo Web', 2013, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Automatizar y agilizar el proceso', 'Descripcion1 Descripcion2', 'Sistema de evidencias para la Universidad', 'Empresa', 'UCM', NULL, 1, NULL, '2019-07-16 04:12:04'),
(16, 'Rodrigo Chavez', '18063911', 'Aplicacion movil', 'Ingenieria de Software', 2014, 'Paulo Gonzalez', 'Ingenieria Civil Informatica', 'Memoria', 'Contribucion1,Contribucion2', 'Descripcion1Descripcion2', 'Ayudar a la comunidad', 'Empresa', 'Tutelkan', NULL, 1, NULL, '2019-07-16 03:56:45'),
(18, 'Camilo Cavieres', '18928324', 'Desarrollo de aplicacion movil ed. fisica', 'Ingenieria de Software', 2013, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Cooperación interna de la universidad', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Empresa', 'Desarrollo de aplicacion movil ed. fisica', NULL, 1, NULL, '2019-07-16 04:32:23');

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
(3, 'Ivan Merino Gonzalez', 'IvanMer@gmail.com', NULL, '$2y$10$anttO5pGkowu1tb/eIibDOwWSaGqaM00hJWKdXIPpWfAyRY3FX7xS', 3, NULL, NULL, '2019-07-15 07:25:02'),
(4, 'Leonardo Ignacio Bascuñan Fuentealba', 'leonardob94@hotmail.com', NULL, '$2y$10$6490PIadS/2p/RGUcq2j0eZ/Up/adnCsGAqoO3.7f7f2Wb/UZeMlS', 1, NULL, '2019-07-14 23:56:55', '2019-07-14 23:56:55'),
(7, 'Hugo Araya', 'Haraya@gmail.com', NULL, '$2y$10$QqEmvavE8novbkj647RUA.nnX6TvRPlQZ.0pf39IZ1dt/JDFjWwxC', 2, NULL, NULL, NULL),
(8, 'Carlos Andres Cancino Duran', 'CarlosCancino@gmail.com', NULL, '$2y$10$FI0FmorGtaq2VMHczi3RMO9aQNqozX1FNIeDet09n6TMf2.n8cZSK', 1, NULL, '2019-07-16 04:16:21', '2019-07-16 04:16:21'),
(9, 'Rafael  Alexis Perez Torres', 'RafaelPerez@gmail.com', NULL, '$2y$10$raKHvuUg4HJKAh6UO2pwXuiVfwzu7F5VTyesjCOvZxNoi3C7tsgJW', 1, NULL, '2019-07-16 04:18:50', '2019-07-16 04:18:50'),
(10, 'Oscar Raul Perez Fernandez', 'OscarPerez@gmail.com', NULL, '$2y$10$UHCQuJdxJw8aJTFDi3dL1.zW7F4HcfX35y99g.8iMiZvbPDkUin1.', 1, NULL, '2019-07-16 04:20:43', '2019-07-16 04:20:43'),
(11, 'Sergio Hernandez', 'SergioH@gmail.com', NULL, '$2y$10$.TlN2J1rHiIVDRAG3PV8UewsoqYEEXE0p8t/YgRGnmzNR3QxVA4yi', 2, NULL, NULL, NULL),
(12, 'Paulo Gonzalez', 'PauloGonzalez@gmail.com', NULL, '$2y$10$KHYX3bJYRoGyRaP3/.XkhuB13XyyS7qdcuaTjcBD8g2VMUquP.ewO', 2, NULL, NULL, NULL),
(13, 'Wladimir Soto', 'wsoto@gmail.com', NULL, '$2y$10$LMZ77GNVx.JyErYX/hKYEuXbTQw/LDof/cSTSNcvS5XMRKnjHWaHG', 2, NULL, NULL, NULL),
(14, 'Xaviera Lopez', 'XavieraL@gmail.com', NULL, '$2y$10$cqRhXlsEoLaQm1K0pIWojuip9L7.5ImOUabzoKP8X3T.0yj.SQnDW', 2, NULL, NULL, NULL),
(15, 'Angelica Urrutia', 'AngelicaU@gmail.com', NULL, '$2y$10$iGcbzkHlxSIaeohbifLgp.X2xLtBfJPSIWQ/7Sqxcyr/q06SEw/zW', 2, NULL, NULL, NULL),
(16, '18063911', 'RodrigoC@gmail.com', NULL, '$2y$10$IIMkIRIefVWEIR6u5Saby.szXbs5GmJ6cdumfFnmtgVArUi81R1c6', 1, NULL, '2019-07-16 07:55:40', '2019-07-16 07:56:45'),
(17, 'Marco Toranzo', 'mtoranzo@gmail.com', NULL, '$2y$10$/tGoCVb4KMYJvxU5/zTsTug0hnoqshVEAVuVkvqiChPqRSJS0hNcG', 2, NULL, NULL, NULL),
(18, 'Camilo Cavieres', 'CamiloC@gmail.com', NULL, '$2y$10$U9YUF0dsIGH.mtoDiuaOJuho1QeRg/kZCpK9GjiL7h0J24GbsqH/S', 1, NULL, '2019-07-16 08:27:48', '2019-07-16 08:27:48');

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
  ADD UNIQUE KEY `nombre_tesis` (`nombre_tesis`),
  ADD UNIQUE KEY `rut` (`rut`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
