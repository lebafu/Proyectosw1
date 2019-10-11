-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2019 a las 02:07:20
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
-- Estructura de tabla para la tabla `area_tesis`
--

CREATE TABLE `area_tesis` (
  `id` bigint(20) NOT NULL,
  `area_tesis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area_tesis`
--

INSERT INTO `area_tesis` (`id`, `area_tesis`) VALUES
(1, 'BI'),
(2, 'IA'),
(3, 'Imagenes'),
(4, 'Ingenieria de Software'),
(5, 'Investigacion de operaciones'),
(7, 'Mineria de datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_profesor_guia` int(11) DEFAULT NULL,
  `nombre_alumno` varchar(255) NOT NULL,
  `profesor1_comision` varchar(255) DEFAULT NULL,
  `coguia` int(11) DEFAULT NULL,
  `profesor2_comision` varchar(255) DEFAULT NULL,
  `profesor3_comision` varchar(255) DEFAULT NULL,
  `profesor1_externo` varchar(255) DEFAULT NULL,
  `profesor1_grado_academico` varchar(255) DEFAULT NULL,
  `correo_profe1_externo` varchar(255) DEFAULT NULL,
  `institucion1` varchar(255) DEFAULT NULL,
  `profe2_externo` varchar(255) DEFAULT NULL,
  `profe2_grado_academico` varchar(255) DEFAULT NULL,
  `correo_profe2_externo` varchar(255) DEFAULT NULL,
  `institucion2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`id`, `id_profesor_guia`, `nombre_alumno`, `profesor1_comision`, `coguia`, `profesor2_comision`, `profesor3_comision`, `profesor1_externo`, `profesor1_grado_academico`, `correo_profe1_externo`, `institucion1`, `profe2_externo`, `profe2_grado_academico`, `correo_profe2_externo`, `institucion2`) VALUES
(8, 11, 'Carlos Andres Cancino Duran', 'Xaviera Lopez', NULL, 'Paulo Gonzalez', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 17, 'Oscar Raul Perez Fernandez', 'Hugo Araya', NULL, 'Paulo Gonzalez', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 12, 'Rodrigo Chavez', 'Hugo Araya', NULL, 'Marco Toranzo', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 17, 'Camilo Cavieres', 'Paulo Gonzalez', NULL, 'Hugo Araya', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 17, 'Gonzalo Ignacio Paredes Valenzuela', 'Hugo Araya', NULL, 'Paulo Gonzalez', 'Wladimir Soto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 21, 'Felipe Nicolas Tapia Nuñez', 'Sergio Hernandez', NULL, 'Paulo Gonzalez', 'Xaviera Lopez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 15, 'Rosa Karina Gonzalez Gutierrez', 'Paulo Gonzalez', NULL, 'Hugo Araya', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 13, 'Daniel Alarcon Chambles', 'Hugo Araya', NULL, 'Marco Toranzo', 'Paulo Gonzalez', 'Jose Torres', 'Mg.', 'JoseT@gmail.com', 'Universidad de Talca', 'Gabriel Perez', 'Dr.', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(32, 17, 'Jhon Michael Faundez Miño', 'Paulo Gonzalez', 1, 'Hugo Araya', 'Angelica Urrutia', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL),
(38, 17, 'Pedro Lopez', 'Paulo Gonzalez', NULL, 'Hugo Araya', 'Ricardo Barrientos', 'Jose Torres', 'Mg.', 'JoseTorres@utal.com', 'Universidad de Talca', 'Gabriel Perez', 'Dr.', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(39, 20, 'Hugo Rodriguez', 'Hugo Araya', NULL, 'Paulo Gonzalez', 'Sergio Hernandez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 17, 'Felipe Javier Barrios Lopez', 'Hugo Araya', NULL, 'Paulo Gonzalez', 'Ricardo Barrientos', 'Jose Torres', 'Mg.', 'JoseT@gmail.com', 'Universidad de Talca', 'Gabriel Perez', 'Dr.', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(41, 13, 'Francisco De la Fuente', 'Hugo Araya', NULL, 'Xaviera Lopez', 'Ricardo Barrientos', 'Jose Torres', 'Mg.', 'JoseTorres@utal.com', 'Universidad de Talca', NULL, NULL, NULL, NULL),
(42, 14, 'Rodrigo Ramirez', 'Sergio Hernandez', NULL, 'Angelica Urrutia', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 7, 'Walter Gonzalo Casanova Hurtado', 'Paulo Gonzalez', NULL, 'Marco Toranzo', 'Ninguno', 'Hugo Perez', 'Ing.', 'HugoP@gmail.com', 'Universidad de Concepcion', 'Gabriel Perez', 'Dr.', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(45, 15, 'Fernando Ignacio Olmos Duran', 'Xaviera Lopez', NULL, 'Marco Toranzo', 'Xaviera Lopez', 'Jose Torres', 'Mg.', 'JoseTorres@utal.com', 'Universidad de Talca', 'Hugo Yañez', 'Ing.', 'HugoY@utal.com', 'Universidad de Talca'),
(46, 13, 'Sebastian Garrido', 'Angelica Urrutia', NULL, 'Marco Toranzo', 'Hugo Araya', 'Jose Torres', 'Mg.', 'JoseT@utal.com', 'Universidad de Talca', 'Gabriel Perez', 'Dr.', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(47, 7, 'Miguel Ignacio Cancino Nuñez', 'Marco Toranzo', 1, 'Angelica Urrutia', 'Ricardo Barrientos', 'Jose Torres', 'Mg.', 'JoseT@gmail.com', 'Universidad de Talca', NULL, NULL, NULL, NULL),
(48, 17, 'Karina Patiño Albornoz', 'Paulo Gonzalez', NULL, 'Ricardo Barrientos', 'Angelica Urrutia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 11, 'Jose Miguel Valdes Salgado', 'Paulo Gonzalez', NULL, 'Hugo Araya', 'Sergio Hernandez', 'Jose Torres', 'Mg.', 'JoseT@gmail.com', 'Universidad de Talca', 'Gabriel Perez', 'Ing.', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(50, 14, 'Felipe Antonio Matamala Lopez', 'Sergio Hernandez', NULL, 'Angelica Urrutia', 'Hugo Araya', 'Jose Torres', 'Mg.', 'JoseT@gmail.com', 'Universidad de Talca', 'Gabriel Perez', 'Ing.', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(51, 15, 'Hector Carrasco Faundez', 'Hugo Araya', NULL, 'Paulo Gonzalez', 'Sergio Hernandez', 'Arturo Norambuena', 'Ing.', 'ArturoN@gmail.com', 'Universidad de Talca', NULL, 'Ing.', NULL, NULL),
(52, 17, 'Boris Salgado Lopez', 'Paulo Gonzalez', NULL, 'Wladimir Soto', 'Angelica Urrutia', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL),
(53, 12, 'Diego Gaete Bernales', 'Marco Mora', NULL, 'Ricardo Barrientos', 'Sergio Hernandez', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL),
(54, 12, 'Humberto Muñoz Norambuena', 'Hugo Araya', NULL, 'Marco Toranzo', 'Angelica Urrutia', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL),
(56, 12, 'Ignacio Lillo', 'Hugo Araya', NULL, 'Marco Toranzo', 'Ricardo Barrientos', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL),
(57, 7, 'Jose Lopez', 'Hugo Araya', NULL, 'Paulo Gonzalez', 'Angelica Urrutia', 'Bernardo Lopez', 'Ing.', 'BernardoL@utalca.cl', 'Universidad de Talca', NULL, 'Ing.', NULL, NULL),
(58, 17, 'Boris Mora Garrido', 'Paulo Gonzalez', NULL, 'Hugo Araya', 'Ninguno', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL),
(61, 7, 'Hugo Gutierrez', 'Marco Toranzo', 1, 'Paulo Gonzalez', 'Ninguno', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL),
(63, 17, 'Adolfo Fuentes', 'Hugo Araya', 0, 'Paulo Gonzalez', 'Angelica Urrutia', NULL, 'Ing.', NULL, NULL, NULL, 'Ing.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

CREATE TABLE `comunidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`id`, `nombre`) VALUES
(1, 'Municipalidad de Talca'),
(2, 'Municipalidad de San Clemente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`) VALUES
(1, 'Tutelkan'),
(5, 'Empresa01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondo_concursable`
--

CREATE TABLE `fondo_concursable` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fondo_concursable`
--

INSERT INTO `fondo_concursable` (`id`, `nombre`) VALUES
(1, 'Conicyt'),
(7, 'fondoconcursable2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_academico_profesor_planta`
--

CREATE TABLE `grado_academico_profesor_planta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `grado_academico` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grado_academico_profesor_planta`
--

INSERT INTO `grado_academico_profesor_planta` (`id`, `estado`, `grado_academico`) VALUES
(7, 1, 'Mg.'),
(11, 1, 'Dr.'),
(12, 1, 'Dr.'),
(13, 1, 'Mg.'),
(14, 1, 'Ing.'),
(15, 1, 'Dra.'),
(17, 1, 'Dr.'),
(20, 1, 'Dr.'),
(21, 1, 'Mg.'),
(96, 1, 'Dra.');

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
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`) VALUES
(1, 'Proyecto1'),
(2, 'Proyecto2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `nombre_completo2` varchar(255) DEFAULT NULL,
  `rut` varchar(255) NOT NULL,
  `rut2` varchar(255) DEFAULT NULL,
  `nombre_tesis` varchar(255) NOT NULL,
  `area_tesis` varchar(255) NOT NULL,
  `ano_ingreso` int(11) NOT NULL,
  `ano_ingreso2` int(11) DEFAULT NULL,
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
  `estado3` int(11) DEFAULT NULL,
  `fecha_peticion` timestamp NOT NULL DEFAULT current_timestamp(),
  `nota_pendiente` date DEFAULT NULL,
  `estado4` int(11) DEFAULT NULL,
  `nota_prorroga` date DEFAULT NULL,
  `estado5` int(11) DEFAULT NULL,
  `fecha_inscripcion` date DEFAULT NULL,
  `constancia_ex` varchar(255) DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `publicar` int(11) DEFAULT NULL,
  `fecha_presentacion_tesis` datetime DEFAULT NULL,
  `acta_ex` varchar(255) DEFAULT NULL,
  `nota_tesis` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id`, `nombre_completo`, `nombre_completo2`, `rut`, `rut2`, `nombre_tesis`, `area_tesis`, `ano_ingreso`, `ano_ingreso2`, `profesor_guia`, `carrera`, `tipo`, `contribucion`, `descripcion`, `objetivos`, `tipo_vinculacion`, `nombre_vinculacion`, `observacion`, `estado1`, `estado2`, `estado3`, `fecha_peticion`, `nota_pendiente`, `estado4`, `nota_prorroga`, `estado5`, `fecha_inscripcion`, `constancia_ex`, `abstract`, `publicar`, `fecha_presentacion_tesis`, `acta_ex`, `nota_tesis`) VALUES
(8, 'Carlos Andres Cancino Duran', NULL, '18.670.608-2', NULL, 'Reconocimiento de patrones con redes neuronalesen imagenes', 'Ingenieria de Software', 2013, NULL, 'Sergio Hernandez', 'Ingenieria Civil Informatica', 'Tesis', 'Promover y potenciar el concepto de ciudades inteligentes', 'Descripcion1 Descripcion2 Descripcion3', 'Aplicación de IA, en camaras de seguridad', 'Proyecto', 'Ciudades inteligentes XX', 'Tesis interesante', 4, 1, NULL, '2019-07-16 04:02:26', '2019-07-01', NULL, '2019-07-18', NULL, '2019-07-18', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Oscar Raul Perez Fernandez', NULL, '16.788.324-5', NULL, 'Sistema de control', 'Ingenieria de Software', 2013, NULL, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Automatizar y agilizar el proceso', 'Descripcion1 Descripcion2', 'Sistema de evidencias para la Universidad', 'Comunidad', 'Municiaplidad de San Clemente', NULL, 4, 1, NULL, '2019-07-16 04:12:04', NULL, NULL, NULL, NULL, '2019-07-18', '156538477419.pdf', 'Es cada vez más evidente que la informática (manejo de información) y los computadores (procesadores de información), están cambiando nuestro sistema de vida. Por ahora podemos decir que el computador nos ofrece las ventajas de una rapídez, seguridad y gran capacidad de trabajo de datos, por ejemplo: informática y estadísticas, y eso también nos alcanzará.', 1, '2019-10-09 19:00:00', NULL, NULL),
(16, 'Rodrigo Chavez', NULL, '18.063.911-8', NULL, 'Aplicacion movil', 'Ingenieria de Software', 2014, NULL, 'Paulo Gonzalez', 'Ingenieria en Ejecucion e Informatica', 'Memoria', 'Contribucion1,Contribucion2', 'Descripcion1Descripcion2', 'Ayudar a la comunidad', 'Empresa', 'Tutelkan', NULL, 1, NULL, NULL, '2019-07-16 03:56:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Camilo Cavieres', NULL, '18.738.562-9', NULL, 'Aplicacion en Ionix para ed fisica', 'Ingenieria de Software', 2013, NULL, 'Marco Toranzo', 'Ingenieria en Ejecucion e Informatica', 'Memoria', 'Se espera ser un apoyo para la carrera de de ed. fisica en la Universidad.', 'Descripcion1, Descripcion2', 'objetivo1 objetivo2', 'Empresa', 'Ed fisica.', 'Nombre incompleto', 4, 1, NULL, '2019-07-18 06:43:00', '2019-10-25', NULL, '2019-12-27', 1, '2019-07-21', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Gonzalo Ignacio Paredes Valenzuela', NULL, '17.345.456-3', NULL, 'Sistema de inventario UCM', 'Ingenieria de Software', 2012, NULL, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Se espera apoyar la automatizacion de un sistema de la universidad, y agilizar procesos.', 'Descripcion1, Descripcion2', 'objetivo1 objetivo2', 'Proyecto', 'Departamento de informatica UCM', NULL, 4, 1, NULL, '2019-07-19 19:11:32', NULL, NULL, '2019-07-24', NULL, '2019-07-28', '6kJevUClPeZ06vTKSelIPZAvdNPBhgehShMazLeW.pdf', 'presenta en algunos pasajes de esta obra viene a demostrar, como han cambiado las relaciones humanas y jurídicas con el advenimiento de la informática y de las telecomunicaciones. Sin pretender sentar bases sólidas, esta investigación pretende despertar el...', 1, '2019-09-03 16:00:00', 'TdIvKakaANdcnRINpzvLETmCxlCkqQlm67qN12fe.pdf', 7),
(22, 'Felipe Nicolas Tapia Nuñez', NULL, '18.732.564-7', NULL, 'Estudio de Patrones de venas de la mano', 'IA', 2013, NULL, 'Ricardo Barrientos', 'Ingenieria Civil Informatica', 'Tesis', 'Permitir ahorrar recursos en el reconocimiento unico de la poblacion, que actualmente se hace por huella dactilar.', 'El alumno deberá ayudar a generar en el reconocimiento de patrones de las venas de la mano.', 'Generar un modelo que permite el reconocimiento de las venas de la mano.', 'Fondo concusable', 'Conicyt', NULL, 4, 1, NULL, '2019-07-19 23:14:28', NULL, NULL, '2019-07-23', NULL, '2019-07-23', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Rosa Karina Gonzalez Gutierrez', NULL, '18.923.457-4', NULL, 'Analisis de sentimientos aplicando una taxonomia de encuestas', 'BI', 2013, NULL, 'Angelica Urrutia', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Comunidad', 'Jardin Infantil', 'Escribe aquí su observacion', 4, 1, 1, '2019-07-20 23:38:34', '2019-07-19', NULL, '2019-08-20', NULL, '2019-07-21', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Daniel Alarcon Chambles', NULL, '18.123.456-9', NULL, 'Desarrollo modelo de optimización en java', 'Ingenieria de Software', 2013, NULL, 'Wladimir Soto', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'objetivo1 objetivo2', 'Proyecto', 'UTALCA-UCM', 'Sin observacion', 4, 1, NULL, '2019-07-26 08:22:02', '2019-10-18', 1, NULL, NULL, '2019-07-29', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Jhon Michael Faundez Miño', 'Alfonso Bilocopetiuc Parra', '18.574.262-8', '18.574.262-8', 'Desarrollo de aplicacion movil ed. fisica', 'Ingenieria de Software', 2013, 2013, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Memoria', 'Se espera contribuir a la carrera de Educación fisica, desarrollando una aplicación de utilidad para ellos...', 'Esta tesis pretende...', 'Dentro de los objetivos de esta tesis se espera...', 'Proyecto', 'Proyecto1', 'Escribe aquí su observacion', 4, 1, NULL, '2019-09-19 01:30:10', NULL, NULL, NULL, NULL, '2019-09-19', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Felipe Garrido Perez', NULL, '19.234.544-6', NULL, 'Desarrollo de algoritmo de limpieza de imagenes', 'Imagenes', 2014, NULL, 'Paulo Gonzalez', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Proyecto', 'Proyecto F2', NULL, 1, NULL, NULL, '2019-07-26 12:03:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Nelson Guerra', NULL, '12.345.678-8', NULL, 'Desarrollo aplicacion', 'Imagenes', 2013, NULL, 'Ricardo Barrientos', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'objetivo1 objetivo2', 'Fondo concusable', 'Conycit', NULL, 1, NULL, NULL, '2019-07-26 12:12:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Cesar Poblete', NULL, '12-356.789-4', NULL, 'Aplicando BI sobre datos registro civil', 'BI', 2014, NULL, 'Angelica Urrutia', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'objetivo1 objetivo2', 'Empresa', '3it', NULL, 1, NULL, NULL, '2019-07-26 12:14:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Arturo Fernandez', NULL, '18.889.456-4', NULL, 'Desarrollo Aplicacion Movil', 'Ingenieria de Software', 2014, NULL, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1, Descripcion2', 'Objetivo1, Objetivo2', 'Empresa', 'Tutelkan', NULL, 1, NULL, NULL, '2019-07-26 12:18:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Pedro Lopez', NULL, '12.345.679-1', NULL, 'Filtro de imagenes', 'Ingenieria de Software', 2013, NULL, 'Paulo Gonzalez', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Proyecto', 'Desarrollo de aplicacion movil ed. fisica', 'Escribe aquí su observacion', 3, 1, NULL, '2019-07-26 12:23:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Hugo Rodriguez', NULL, '18.772.441-0', NULL, 'Optimizacion de filtro de imagenes', 'Imagenes', 2013, NULL, 'Marco Mora', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Fondo concusable', 'Conicyt', 'Tesis muy llamativa', 4, 1, NULL, '2019-07-26 12:26:07', NULL, NULL, NULL, NULL, '2019-07-30', '1565315421Autorizacion.pdf', 'Copie aqui su abstract o resumen.', 1, '2019-08-09 15:00:00', NULL, NULL),
(40, 'Felipe Javier Barrios Lopez', NULL, '12.345.677-9', NULL, 'Tesis1', 'Ingenieria de Software', 2014, NULL, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'Objetivo1, Objetivo2', 'Proyecto', 'Proyecto1', 'Escribe aquí su observacion', 3, 1, NULL, '2019-07-26 15:21:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Francisco De la Fuente', NULL, '18.928.324-5', NULL, 'Tesis2', 'BI', 2013, NULL, 'Wladimir Soto', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'objetivo1 objetivo2', 'Proyecto', 'Utalca', NULL, 4, 1, NULL, '2019-07-27 03:14:20', NULL, NULL, NULL, NULL, '2019-07-30', '156447033341.pdf', 'Utilizando valores de cierres semanales de los índices bursátiles estadounidenses Dow Jones(DJI), S&P500 (GSPC), Nasdaq (IXIC) y NYSE Composite (NYA), correspondientes al período comprendido entre el 4 de enero de 1980 al 31 de diciembre de 2005, se analiza la eficacia del Algoritmo Genético como técnica de optimización de estructuras de modelos GARCH para la predicción de retornos bursátiles. Los resultados obtenidos mediante Algoritmo Genético, considerando el Error Cuadrático Medio (ECM) como criterio de comparación, fueron contrastados con los de un modelo GARCH (1,1), un modelo GARCH especificado aleatoriamente y un modelo GARCH optimizado mediante Fuerza Bruta (probando todos los modelos posibles). Se efectuó un test de significancia estadística sobre la diferencia de ECM entre los modelos contrastados, además de realizar algunos test complementarios para medir el nivel de la aplicabilidad de los modelos (test LM de Engle, test Portmentau de bicorrelaciones de Hinich (test H) y test de correlaciones simples (testC)). Para todos los índices bajo análisis, los modelos GARCH optimizados por el Algoritmo Genético alcanzaron un ECM (para un conjunto extra muestral de 200 observaciones semanales) menor que el obtenido a través del modelo GARCH (1,1) y el modelo GARCH generado aleatoriamente. Sin embargo, y como era de esperar, el resultado en ECM fue mayor al del modelo obtenido por Fuerza Bruta. La diferencia entre el resultado del Algoritmo Genético y el de un modelo GARCH (1,1) resultó ser, en todos los casos, estadísticamente significativa a un 1% de significancia. Al comparar los resultados con el modelo GARCH especificado de manera aleatoria, sólo la diferencia entre ECM es significativa, a un 5% de nivel de significancia, para el caso del índice GSPC. Al analizar las diferencias de ECM entre los modelos obtenidos mediante Algoritmo Genético y Fuerza Bruta, éstas resultaron ser no significativas, salvo para el índice GSPC que fue significativa a un 10%. De esta manera, se puede concluir que un modelo GARCH optimizado mediante Algoritmo Genético podría obtener mejores resultados que una modelo GARCH (1,1) usado ampliamente en la literatura financiera. Además, el resultado obtenido mediante Algoritmo Genético no presenta desviaciones significativas con respecto de la mejor especificación posible. De este modo, se presenta evidencia a favor del Algoritmo Genético como técnica de optimización de estructuras de modelos GARCH.', 0, '2019-07-30 16:00:00', '156447057341.pdf', 7),
(42, 'Rodrigo Ramirez', NULL, '18.345.456-3', NULL, 'Aplicar redes neuronales para la creación de modelo predictivo biologico', 'Ingenieria de Software', 2013, NULL, 'Xaviera Lopez', 'Ingenieria Civil Informatica', 'Tesis', 'La contribucion esperada es:', 'En esta tesis se espera que...', 'Objetivo 1 Objetivo2', 'Proyecto', 'UCM', 'El nombre del alumno esta incompleto', 5, NULL, NULL, '2019-07-27 18:56:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Walter Gonzalo Casanova Hurtado', NULL, '22.222.222-4', NULL, 'Tesis03', 'Ingenieria de Software', 2014, NULL, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion 1 2 3 4 5 6...', 'Descripcion0 Descripcion1 Descripcion2, Descripcion3', 'Objetivo1 Objetivo2 Objetivo3', 'Empresa', 'Empresa03', 'Tesis muy buena', 4, 1, NULL, '2019-07-31 14:17:18', NULL, NULL, NULL, NULL, '2019-07-31', '1564587080PDF DE TESIS RELACIONADAS A EMPRESAS.pdf', 'La especificación y el análisis de requisitos son actividades fundamentales en el desarrollo de proyectos de software, ya que en base a ellos se decidirá qué caminos tomar durante todo el proceso de implementación. Asímismo, la documentación es una parte importante de todas las etapas de la ingeniería de software; ésta debe ser completa, actualizada y de fácil acceso para todas las personas involucradas en el proyecto.\r\n \r\n Para la administración de requisitos se ha creado la herramienta ReqAdmin, un sistema web que permite el acceso de la información tanto a desarrolladores como a clientes. Esta herramienta actualmente es usada en el curso Ingeniería de Software que imparte el Departamento de Ciencias de la Computación de la Universidad de Chile. ReqAdmin permite administrar los requisitos de un proyecto, pero carece de medios para administrar documentación.\r\n \r\n Para remediar esta situación se realizó una actualización a dicha herramienta, permitiendo ingresar y administrar la documentación dentro de ReqAdmin. Para ello se usó un editor de texto enriquecido que permite insertar texto con formato e imágenes. Además, con el sistema se puede generar cierta documentación, en particular documento de requisito, diseño e histórico, en formato digital.\r\n \r\n Se espera que esta actualización agregue valor a los desarrollos de software administrados con la herramienta ReqAdmin, permitiendo una documentación completa, de fácil acceso y vigente.', 1, '2019-07-31 11:35:00', '1564587375ActaOscar.pdf', 7),
(45, 'Fernando Ignacio Olmos Duran', NULL, '11.111.111-2', NULL, 'Realizando limpieza de datos sobre BI', 'BI', 2012, NULL, 'Angelica Urrutia', 'Ingenieria Civil Informatica', 'Tesis', 'Esto contribuirá a por ejemplo1, por ejemplo2, por ejemplo3, por ejemplo n', 'Se espera que el alumno descripcion1, descripcion2, descripcion3', 'Objetivo1,Objetivo2,Objetivo3', 'Proyecto', 'UCM', NULL, 4, 1, NULL, '2019-08-02 07:08:35', NULL, NULL, NULL, NULL, '2019-08-02', '156478693619.pdf', 'El siguiente es un proyecto realizado para Hewlett-Packard Chile, filial de HP Company, la cual vende productos de computación y ofrece servicios y soluciones tecnológicas. La empresa se divide funcionalmente en Imagen e Impresión, Sistemas Personales y Enterprise Business. El presente proyecto abordará las dos primeras áreas.\r\n \r\n La memoria cubre el campo de Aplicaciones de Inteligencia de Negocios y surge de la necesidad de la empresa de implementar herramientas de gestión para automatizar el control sobre los Puntos de Venta y la Fuerza de Venta a lo largo de Chile. Una herramienta capaz de entregar información útil en la toma de decisiones es fundamental para una empresa de la envergadura y tamaño de HP, la que cuenta con la mayor participación de mercado en el área de la tecnología.\r\n \r\n El trabajo se compone de un análisis de la situación actual, un levantamiento de los procesos relacionados con la entrega de reportes y un rediseño sobre éstos para que puedan ser implementados en un sistema de información. Los requerimientos y principales necesidades de la empresa son descritos, para posteriormente diseñar e implementar una solución rentable de Inteligencia de Negocios que automatice la creación de reportes, permitiendo visualizar Tableros o Dashboards dinámicos con acceso a información histórica.\r\n \r\n La propuesta elimina tareas duplicadas en ambas áreas que incluyen a más de 200 empleados, disminuyendo el costo en tiempo y recursos asociados a la creación de reportes, proporcionando una completa herramienta de gestión que incorpora siete Indicadores Clave de Desempeño definidos a partir de las necesidades de la empresa. Además se incluye un método de pronóstico de ventas para productos tecnológicos que genera importantes beneficios en comparación con la metodología actual.\r\n \r\n La herramienta es desarrollada a nivel de prototipo funcional, utilizando Visual Basic para Aplicaciones, Microsoft Access y PowerPivot para Excel. Esta memoria demuestra que una herramienta de Inteligencia de Negocios rentable y fácil de implementar puede ser sencillamente construida utilizando una base de datos, un proceso ETL y un sistema para la visualización de reportes.\r\n \r\n El trabajo puede ser extendido para incluir más fuentes de datos y cadenas de Retail, que permitirán incorporar nuevos indicadores de gestión. Además, modelos más complejos de pronóstico y agrupación pueden ser implementados, los que permitirán realizar mejores proyecciones de venta y quiebres de stock. A su vez, los tableros de gestión pueden ser visualizados en la nube utilizando Microsoft SharePoint 2010, facilitando así el acceso a éstos.', 1, '2019-08-02 19:30:00', '156478253045.pdf', 7),
(46, 'Sebastian Garrido', NULL, '18.333.333-7', NULL, 'Desarrollo de BI sobre datos de investigación UTALCA', 'Ingenieria de Software', 2013, NULL, 'Wladimir Soto', 'Ingenieria Civil Informatica', 'Tesis', 'Se espera que pueda contribuir a contribucion1, contribucion2, contribucion3, contribucion4, contribucion5', 'En este trabajo se espera descripcion1, descripcion2, descripcion3, descripcion4, descripcion5, descripcion6, descripcion7', 'objetivo1,objetivo2,objetivo3,objetivo4, objetivo5', 'Empresa', 'UTALCA', NULL, 3, 1, NULL, '2019-08-03 00:25:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Miguel Ignacio Cancino Nuñez', NULL, '18.111.111-k', NULL, 'Desarrollo aplicacion movil en Android', 'Ingenieria de Software', 2013, NULL, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion1, contribucion2, contribucion3, contribucion4, contribucion5, contribucion6', 'Descripcion1, Descripcion2, Descripcion3,Descripcion4', 'Objetivo1, Objetivo2,Objetivo3,Objetivo4, Objetivo5', 'Empresa', 'Empresa1', 'Escribe aquí su observacion', 4, 1, NULL, '2019-08-04 03:32:43', NULL, NULL, NULL, NULL, '2019-08-04', '156498255810.pdf', 'El presente informe describe un Plan de Marketing para GuanaBook, aplicación móvil de la\r\n categoría viajes, que permite a sus usuarios gestionar reservas para sitios de camping\r\n administrados por CONAF dentro del Parque Nacional Torres del Paine. El Plan de Marketing\r\n está orientado al consumidor final usuario de la aplicación móvil GuanaBook en el marco del\r\n año 2019. El objetivo de este plan de marketing es lograr que el 30% de los visitantes al Parque\r\n Nacional Torres del Paine durante el año 2019 realicen sus reservas de sitios de camping\r\n mediante la aplicación GuanaBook y no a través del actual sistema de reservas en línea.\r\n Lo anterior se fundamenta en las oportunidades detectadas en el análisis situacional donde se\r\n destaca que existe un gran interés de turistas nacionales y extranjeros por los atractivos\r\n naturales de Chile, quienes preparan con anticipación sus viajes, y donde el acceso a servicios\r\n online de viajes se realiza cada vez con mayor frecuencia a través de aplicaciones móviles.\r\n Asimismo, el análisis del consumidor muestra que existe una creciente tendencia al uso de\r\n dispositivos móviles por sobre TIC tradicionales, dentro de lo que destaca el uso de\r\n aplicaciones y, particularmente, apps destinadas a acceder a servicios de turismo y booking.\r\n En ese contexto, otra oportunidad detectada responde al crecimiento y masificación de las\r\n aplicaciones móviles dentro del análisis de la industria.', NULL, '2019-08-05 01:22:00', '156498465947.pdf', 7),
(48, 'Karina Patiño Albornoz', NULL, '17.678.345-5', NULL, 'Tesis 05', 'Ingenieria de Software', 2012, NULL, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion1, Contribucion2, Contribucion3, Contribucion4, Contribucion5.', 'Descripcion1, Descripcion2, descripcion3, descripcrion4, descripcion5', 'Objetivo1, Objetivo2,Objetivo3, Objetivo4, Objetivo5, Objetivo6', 'Empresa', 'Empresa04', NULL, 2, 1, NULL, '2019-08-05 06:26:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Jose Miguel Valdes Salgado', NULL, '18.678.987-3', NULL, 'Aplicando redes neuronales a investigación de reconocimiento de imagenes y audio.', 'IA', 2013, NULL, 'Sergio Hernandez', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion1, Contribucion2, contribucion3, contribucion4, contribucion5, contribucion6, contribucion7, contribucion8, contribucion9, contribucion10', 'Descripcion1, Descripcion2, Descripcion3, Descripcion4, Descripcion5, Descripcion6, Descripcion7, Descripcion8, Descripcion9, Descripcion10', 'Objetivo1, Objetivo2, Objetivo3, Objetivo4, Objetivo5, Objetivo6, Objetivo7, Objetivo8, Objetivo9,Objetivo10', 'Fondo concusable', 'Conicyt', 'Tesis interesante', 4, 1, NULL, '2019-08-05 17:27:26', NULL, NULL, NULL, NULL, '2019-08-05', '1565029021Autorizacion.pdf', 'En esta tesis presentamos un Sistema Experto que permite reconocer los mangos\r\ncuyas formas cumplen con los estándares de calidad exigidos por clientes de Estados\r\nUnidos y Europa.\r\nEl software está basado en el proceso de imágenes digitales de mangos mediante\r\nredes neuronales artificiales.\r\nPrimeramente seleccionamos una muestra de mangos exportables; luego, utilizando\r\nel sistema, tomamos una imagen digital de cada mango, con dichas imágenes\r\nentrenamos una Red Neuronal para que reconozca acertadamente todos los\r\nelementos de la muestra. Luego, procedemos con las pruebas de reconocimiento con\r\notros mangos de calidad y con los que no presentan dichas características, y si el\r\nsoftware los reconoce acertadamente, diremos que hemos cumplido con nuestro\r\nobjetivo.\r\nPalabras Clave:\r\nRedes neuronales artificiales, entrenamiento de redes neuronales, reconocimiento de\r\npatrones, reconocimiento de calidad del mango', NULL, '2019-08-05 15:00:00', '156504601349.pdf', 7),
(50, 'Felipe Antonio Matamala Lopez', NULL, '18.345.678-3', NULL, 'Implementación de tecnicas de machile learning para el estudio de patrones asociados a estados tempranos y tardios de la patologia del cancer oral', 'IA', 2013, NULL, 'Xaviera Lopez', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion1, Contribucion2, Contribucion3, Contribucion4, Contribución5, Contribución6, Contribución 7, Contribución8, Contribución 10 , Contribución11, Contribución 12, Contribución13, Contribución14, Contribución15, Contribución16', 'Descripcion1, Descripcion2, Descripcion3, Descripcion4, Descripcion5, Descripcion6, Descripcion7, Descripcion8', 'Objetivo1, Objetivo2, Objetivo3, Objetivo4, Objetivo5, Objetivo6, Objetivo7, Objetivo8, Objetivo9, Objetivo10', 'Fondo concusable', 'Conicyt', 'Escribe aquí su observacion', 4, 1, 1, '2019-08-05 23:42:47', NULL, NULL, NULL, NULL, '2019-08-05', '156505265245.pdf', 'La cantidad de datos biológicos y médicos que se produce hoy en día es enorme, y se podría decir que el campo de las ciencias de la vida forma parte ya del club del Big Data. Estos datos contienen información crucial que pueden ayudar a comprender mejor los mecanismos moleculares en los sistemas biológicos. Este conocimiento es fundamental para el progreso en el diagnóstico y en el tratamiento de las enfermedades. La Bioinformática, junto con la Biología Computacional, son disciplinas que se encargan de organizar, analizar e interpretar los datos procedentes de la Biología Molecular. De hecho, la complejidad y la heterogeneidad de los problemas biológicos requieren de un continuo diseño, implementación y aplicación de nuevos métodos y algoritmos. La minería de datos biológicos es una tarea complicada debido a la naturaleza heterogénea y compleja de dichos datos, siendo éstos muy dependientes de detalles específicos experimentales. Esta tesis se basa en el estudio de un problema biomédico complejo: la menor probabilidad de desarrollar algunos tipos de cáncer en pacientes con ciertos trastornos del sistema nervioso central (SNC) u otros trastornos neurológicos, y viceversa. Denominamos a esta condición como comorbilidad inversa. Desde el punto de vista médico, entender mejor las conexiones e interacciones entre cáncer y trastornos neurológicos podría mejorar la calidad de vida y el efecto de la asistencia médica de millones de personas en todo el mundo. Aunque la comorbilidad inversa ha sido estudiada a nivel médico, a través de estudios epidemiológicos, no se ha investigado en profundidad a nivel molecular...', NULL, '2019-08-05 20:55:00', NULL, NULL),
(51, 'Hector Carrasco Faundez', NULL, '18.456.965-4', NULL, 'Aplicando mineria de datos luego de BI', 'BI', 2013, NULL, 'Angelica Urrutia', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion1, Contribucion2, Contribucion3, Contribucion4.', 'Descripcion1, Descripcion2, Descripcion3, Descripcion4', 'Objetivo1, Objetivo2, Objetivo3, Objetivo4.', 'Proyecto', 'UCM', NULL, 4, 1, NULL, '2019-08-06 05:35:39', NULL, NULL, NULL, NULL, '2019-08-06', '156507364545.pdf', 'El uso de la Inteligencia de Negocios está tomando cada vez más fuerza dentro de las\r\nentidades y/o empresas, ya sea para cambiar sus estrategias, explotar su información o generar\r\nconocimiento importante. Todo ello se ve simplificado para el usuario, gracias al uso de las\r\nherramientas “B.I.”\r\nEn este documento, se mostrará detalladamente todo lo relacionado con un proyecto o\r\nsolución de inteligencia de negocios, dando un marco conceptual de sus fortalezas, debilidades\r\ny requisitos para poder implementarse, en este caso, dentro de un negocio específico.\r\nLuego, se introducirá de una manera resumida el proceso minero en sus etapas\r\ngenerales, como también el control de producción mina o CPM, base de datos empresarial,\r\nque servirá de fuente de datos para trabajar con una herramienta BI, específicamente con la\r\naplicación de “Data Discovery” y el descubrimiento de la información a través de los datos.\r\nPosteriormente, se ahondará en el problema a solucionar con la aplicación práctica de\r\nuna herramienta de inteligencia de negocios, específicamente acotada en Data Discovery,\r\ncomo lo es “QlikView”, testeo de solución y entrega.\r\nPalabras Clave: Inteligencia de Negocios, Data Discovery, Gestión de la Información,\r\nReportería, Visualizadores, Extracción minera, Qlikview, Modelos de Gestión, Modelo\r\nAsociativo.', NULL, '2019-08-06 02:48:00', NULL, NULL),
(52, 'Boris Salgado Lopez', NULL, '14.784562-3', NULL, 'Aplicando API REST a proyecto UCM', 'Ingenieria de Software', 2012, NULL, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Escriba aqui los objetivos', 'Descripcion1, Descripcion2, Descripcion3, Descripcion4', 'Escriba aqui los objetivos', 'Proyecto', 'UCM', NULL, 4, 1, NULL, '2019-08-06 06:43:31', NULL, NULL, NULL, NULL, '2019-08-06', '1565074081Evaluacion.pdf', 'Copie aqui su abstract o resumennn', NULL, '2019-08-06 00:00:00', NULL, NULL),
(53, 'Diego Gaete Bernales', NULL, '19.123.526-7', NULL, 'Tesis05', 'Imagenes', 2014, NULL, 'Paulo Gonzalez', 'Ingenieria Civil Informatica', 'Tesis', 'Escriba aqui los objetivos', 'Descripcion', 'Escriba aqui los objetivos', 'Proyecto', 'UCM', NULL, 4, 1, NULL, '2019-08-06 07:01:29', '2019-08-14', NULL, '2019-08-30', NULL, '2019-08-06', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Humberto Muñoz Norambuena', NULL, '13.564.231-4', NULL, 'Tesis10', 'Ingenieria de Software', 2012, NULL, 'Paulo Gonzalez', 'Ingenieria Civil Informatica', 'Tesis', 'Escriba aqui los objetivos', 'Descripcion', 'Escriba aqui los objetivos', 'Proyecto', 'UCM', NULL, 4, 1, NULL, '2019-08-06 07:43:24', NULL, NULL, NULL, NULL, '2019-08-06', '156507864249.pdf', 'Este proyecto explica el diseño e implementación de una aplicación.\r\npara dispositivos móviles para el estudio de un estilo de vida saludable. Para este propósito, el corazón\r\nSe debe obtener una estimación de la tasa y el estado de ánimo de un usuario. El corazón\r\nla detección de velocidad se obtiene a través de la señal del acelerómetro móvil, procesándola y\r\ncomparándolo con un umbral fijo para detectar los latidos del corazón. Mientras tanto,\r\nEl estado de ánimo se determina mediante un cuestionario realizado después de la medición de la frecuencia cardíaca, obteniendo los componentes de estrés, depresión, hostilidad, vigor y\r\nfatiga. Los datos obtenidos dentro del proceso de medición se envían a un\r\ncentro de análisis para poder realizar un estudio a largo plazo. La estimación de la frecuencia cardíaca fue realizada por el acelerómetro móvil y se comparó con\r\nseñal de electrocardiograma de referencia y con acelerómetro externo. los\r\nLos resultados muestran una gran aproximación y están fuertemente influenciados por la inestabilidad en la frecuencia de muestreo del acelerómetro móvil. Las diferencias\r\nentre las medidas del valor del ritmo cardíaco son menos de 2 latidos por minuto', 1, '2019-08-06 09:30:00', '156507878354.pdf', NULL),
(56, 'Ignacio Lillo', NULL, '18.666.444-2', NULL, 'Visualizacion de UCM en 3D', 'Imagenes', 2013, NULL, 'Paulo Gonzalez', 'Ingenieria en Ejecucion e Informatica', 'Memoria', 'La contribucion esperada es, poder generaaar un plano 3D de la Universidadad...', 'Descripcion1, Descripcion2, Descripcion3, Descripcion4', 'Objetivo1, Objetivo2,Objetivo3', 'Proyecto', 'UCM', 'Escribe aquí su observacion', 3, 1, NULL, '2019-08-24 07:23:15', NULL, NULL, NULL, NULL, '2019-08-24', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Jose Lopez', NULL, '18.146.721-k', NULL, 'Tesis 55', 'BI', 2012, NULL, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion1, Contribucion2, Contribucion3', 'La tesis tratara sobre Tesis55', 'Objetivo1, Objetivovo2, Objetivo3, Objetivo4', 'Empresa', 'UCM', NULL, 4, 1, NULL, '2019-09-01 05:14:24', NULL, NULL, NULL, NULL, '2019-09-01', '1567381138Evaluacion.pdf', 'Se ha dicho que el Derecho no existe ni es imaginable al margen de su historia. Sin duda, la afirmación precedente, conlleva un reconocimiento del enorme contenido de información que se asocia al Derecho en cada uno de sus ámbitos. La información, en este sentido, significa	descripción de algún objeto o suceso.\r\n Para que esta información fluya en forma adecuada y resulte útil, debe organizarse según algún método o sistema, de allí que se debe entender como sistema de información “todo conjunto de elementos diseñado para el soporte, administración y gestión de información” \r\n Información es ante todo un conocimiento y la posibilidad de entregar ese conocimiento a todos los probables usuarios, ella constituye la finalidad esencial de la Ciencia de la Información. Ésta comprende a su vez tres grandes disciplinas: La Documentación, la Informática y las Ciencias de la Comunicación, de las cuales, las dos primeras parecen ser más atingentes al tema abordado en la Separata del CEDI “Informática Jurídica Documental”, en torno a la cual se ha preparado el presente trabajo. La Documentación estudia el establecimiento, investigación, reunión y utilización de documentos, mientras que la Informática estudia el tratamiento automático de la información por medio de computadoras. \r\n Ambas disciplinas, Documentación e Informática abocadas a un objeto particular, la información jurídica, crean la Informática Jurídica Documental, la que como tal, no es una área, ni de la Ciencia de la Información, ni del ámbito de la Ciencia del Derecho. La Informática Jurídica Documental es un \"conjunto de técnicas\", significativas para las computadoras, aplicadas al tratamiento de la información jurídica. \r\n La revolución informática y sus proyecciones socio-económicas se vienen produciendo desde la década del 40, presentando una evolución caracterizada por un continuo crecimiento de su influencia e importancia, tanto en desarrollo tecnológico, mayor capacidad de manejo de datos y rapidez de respuestas, como en amplitud de su ámbito de influencia: se incluyen aquí, materias tan diversas que pueden ir desde la administración financiera hasta las tecnologías de la salud.\r\n Entendiendo la Informática como la ciencia del tratamiento lógico y automático de la información, y considerando que la información puede ir desde el dato científico más complejo hasta la más banal de las actividades, resulta que la Informática tiene un carácter multidisciplinario, ya que se ramifica en sus proyecciones a cualquier disciplina específica. El ámbito del Derecho no se excluye, por supuesto, de lo anterior.\r\n De ahí que al estudio de la concreta aplicación de la Informática al campo del Derecho se le ha denominado como Informática Jurídica.', 1, NULL, NULL, NULL),
(58, 'Boris Mora Garrido', NULL, '13.789.672-3', NULL, 'Tesis 56', 'Ingenieria de Software', 2012, NULL, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Escriba aqui los objetivos', 'Descripcion', 'Escriba aqui los objetivos', 'Proyecto', 'ICI UCM', NULL, 4, 1, NULL, '2019-09-01 06:12:07', NULL, NULL, NULL, NULL, '2019-09-01', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Hugo Gutierrez', 'Hugo Fuentes', '18.321.741-1', NULL, 'Tesis60', 'Ingenieria de Software', 2012, 2011, 'Hugo Araya', 'Ingenieria en Ejecucion e Informatica', 'Tesis', 'Escriba aqui los objetivos', 'Descripcion', 'Escriba aqui los objetivos', 'Proyecto', 'Proyecto2', 'Escribe aquí su observacion', 3, 1, NULL, '2019-10-03 21:16:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Adolfo Fuentes', NULL, '18.369.470-6', NULL, 'Tesis61', 'BI', 2012, NULL, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Contribución1', 'Descripcion1', 'Objetivos1', 'Empresa', 'Tutelkan', 'Escribe aquí su observacion', 4, 1, NULL, '2019-10-03 22:45:22', NULL, NULL, NULL, NULL, '2019-10-03', NULL, NULL, NULL, NULL, NULL, NULL);

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
  `director_escuela` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo_usuario`, `director_escuela`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@admin.com', NULL, '$2y$10$P7Por1l.Ep3mdBZyEvq5OOaTOCePQZw.T0S4Zkj9qF5LFJADxsrue', 0, NULL, NULL, NULL, NULL),
(3, 'Ivan Merino Gonzalez', 'IvanMer@gmail.com', NULL, '$2y$10$AG5RKsQM47Vjfo5CrlkFte/qGCZaj3hC/SBQRCf1tuzfj/NH//zXy', 3, NULL, NULL, NULL, '2019-08-24 01:35:10'),
(4, 'Leonardo Ignacio Bascuñan Fuentealba', 'leonardob94@hotmail.com', NULL, '$2y$10$6490PIadS/2p/RGUcq2j0eZ/Up/adnCsGAqoO3.7f7f2Wb/UZeMlS', 1, NULL, NULL, '2019-07-14 23:56:55', '2019-07-14 23:56:55'),
(7, 'Hugo Araya', 'Haraya@gmail.com', NULL, '$2y$10$rw7BfPGCEarFKsm/TMcy9OdZYszb./FJeu5gDcjkIx1yJ2vbP8ln6', 2, 0, NULL, NULL, '2019-10-11 00:14:17'),
(8, 'Carlos Andres Cancino Duran', 'CarlosCancino@gmail.com', NULL, '$2y$10$FI0FmorGtaq2VMHczi3RMO9aQNqozX1FNIeDet09n6TMf2.n8cZSK', 1, NULL, NULL, '2019-07-16 04:16:21', '2019-07-16 04:16:21'),
(9, 'Rafael  Alexis Perez Torres', 'RafaelPerez@gmail.com', NULL, '$2y$10$raKHvuUg4HJKAh6UO2pwXuiVfwzu7F5VTyesjCOvZxNoi3C7tsgJW', 1, NULL, NULL, '2019-07-16 04:18:50', '2019-07-16 04:18:50'),
(10, 'Oscar Raul Perez Fernandez', 'OscarPerez@gmail.com', NULL, '$2y$10$UHCQuJdxJw8aJTFDi3dL1.zW7F4HcfX35y99g.8iMiZvbPDkUin1.', 1, NULL, NULL, '2019-07-16 04:20:43', '2019-07-16 04:20:43'),
(11, 'Sergio Hernandez', 'SergioH@gmail.com', NULL, '$2y$10$bGwldwqEeiVRDetxT2ZjNOONUPt/q1n/k86ad4aGkSpOdvMMtxd5q', 2, NULL, NULL, NULL, '2019-10-10 08:15:28'),
(12, 'Paulo Gonzalez', 'PauloGonzalez@gmail.com', NULL, '$2y$10$W5PPczjvJ0HYjUnB4OrjOe7FpWju69ieVGaf/k4ZtnTAxxWOBSrM.', 2, 1, NULL, NULL, '2019-10-11 00:14:35'),
(13, 'Wladimir Soto', 'wsoto@hotmail.com', NULL, '$2y$10$HJz7PXN14.qafcKQmEHXoumhvGzLXHK4kGz.YXeDbN6PmTGw1MPoG', 2, NULL, NULL, NULL, '2019-10-10 06:50:22'),
(14, 'Xaviera Lopez', 'XavieraL@gmail.com', NULL, '$2y$10$Iy8sRhRFOl8EjoHFgjjAKegJzr5RoRKk8ZzIO/I4Zu2s5F4i1z2pC', 2, NULL, NULL, NULL, '2019-10-10 06:50:50'),
(15, 'Angelica Urrutia', 'AngelicaU@gmail.com', NULL, '$2y$10$UHeuUhqSxgVUMzTRCKgj2ewR3oS8oRGWLK1xwnxm24LKcrAwKdnu.', 2, NULL, NULL, NULL, '2019-10-10 06:56:34'),
(16, 'Rodrigo Chavez', 'RodrigoC@gmail.com', NULL, '$2y$10$IIMkIRIefVWEIR6u5Saby.szXbs5GmJ6cdumfFnmtgVArUi81R1c6', 1, NULL, NULL, '2019-07-16 07:55:40', '2019-07-17 22:44:22'),
(17, 'Marco Toranzo', 'mtoranzo@gmail.com', NULL, '$2y$10$/tGoCVb4KMYJvxU5/zTsTug0hnoqshVEAVuVkvqiChPqRSJS0hNcG', 2, 0, NULL, NULL, '2019-10-11 00:14:35'),
(18, 'Camilo Cavieres', 'CamiloC@gmail.com', NULL, '$2y$10$U9YUF0dsIGH.mtoDiuaOJuho1QeRg/kZCpK9GjiL7h0J24GbsqH/S', 1, NULL, NULL, '2019-07-16 08:27:48', '2019-07-16 08:27:48'),
(19, 'Gonzalo Ignacio Paredes Valenzuela', 'GonzaloParedes@gmail.com', NULL, '$2y$10$cqV6yLeBy8YZUIj6i13mFuye2MWyDwAHwa1KnGHFiaATaWVy.EGsu', 1, NULL, NULL, '2019-07-19 23:08:31', '2019-07-19 23:08:31'),
(20, 'Marco Mora', 'MarcoM@gmail.com', NULL, '$2y$10$TqMJh2XVrNb/EkpZMpepaO0lI2BaTmNUTsx0eSRKBVaVfyBsnfT0.', 2, NULL, NULL, NULL, NULL),
(21, 'Ricardo Barrientos', 'RicardoB@gmail.com', NULL, '$2y$10$zlT4j9NW096tlHmalTxpCePrS2E5C3MJ3J478RVKUqPVDZxIzBBpe', 2, NULL, NULL, NULL, '2019-10-10 06:57:39'),
(22, 'Felipe Nicolas Tapia Nuñez', 'FelipeTapia@gmail.com', NULL, '$2y$10$5GLPqQqZX7NP8TpC02U1Seb1gv.oBvlWyz1ZYYiGpz8ZWlG8UwSPe', 1, NULL, NULL, '2019-07-20 03:11:25', '2019-07-20 03:11:25'),
(23, 'Rosa Karina Gonzalez Gutierrez', 'RosaGonzalez@gmail.com', NULL, '$2y$10$A706x5VrUJACCLTtvYc6FuVKhOuYzGTnRPcdVCRELNF2BzBgcvp1S', 1, NULL, NULL, '2019-07-21 03:32:43', '2019-07-21 03:59:35'),
(24, 'Jorge Gabriel Ramirez Perez', 'JorgeRamirez@gmail.com', NULL, '$2y$10$3gm/ql.92ksvlce2epChJuNL8LzkWreslcv9E70uiY5FRFSQXQfpu', 1, NULL, NULL, '2019-07-26 04:26:50', '2019-07-26 04:26:50'),
(31, 'Daniel Alarcon Chambles', 'DanielA@gmail.com', NULL, '$2y$10$EIN4vEKP8bMJiBsp0SkF/umiq8/f82YV4jyRAiVScO42S61ERKuu2', 1, NULL, NULL, '2019-07-26 11:49:01', '2019-07-26 12:39:55'),
(32, 'Jhon Michael Faundez Miño', 'JhonF@gmail.com', NULL, '$2y$10$ahzlv/f8/FnFZvQrdE1jqujo0R8uSY/05ZSJiieOoL.lvzAW4ecPq', 1, NULL, NULL, '2019-07-26 14:38:52', '2019-07-26 15:09:51'),
(33, 'Vicente Valdes', 'VicenteV@gmail.com', NULL, '$2y$10$0Xdv3Oc5h6fm9QA6BoUov.hy4mjlrH99VmFf22jBEiiTAsUjq4IHS', 1, NULL, NULL, '2019-07-26 15:26:23', '2019-07-26 15:26:23'),
(34, 'Felipe Garrido Perez', 'FelipeGarrido@gmail.com', NULL, '$2y$10$PGtMfMTMeu3UBOkiEddSXOUfcrmr.fdhpgjfi8DUWiGdUzCEsLQ3K', 1, NULL, NULL, '2019-07-26 16:02:24', '2019-07-26 16:02:24'),
(35, 'Nelson Guerra', 'NelsonG@gmail.com', NULL, '$2y$10$vCoKsvhC3DmnMSK71AMOjOdjmmQOwuChYL3seANSUYjq5Tg3VZ3Ti', 1, NULL, NULL, '2019-07-26 16:11:18', '2019-07-26 16:11:18'),
(36, 'Cesar Poblete', 'CesarP@gmail.com', NULL, '$2y$10$Q8Fcs.1uOa8YhOrPqCFggOFFYIyCIVsYS7Vb98BsLDP/4Sec9iFh.', 1, NULL, NULL, '2019-07-26 16:13:34', '2019-07-26 16:13:34'),
(37, 'Arturo Fernandez', 'ArturoF@gmail.com', NULL, '$2y$10$9Z2QuIyLfuWERzcbwqbrteOz0wP89iQjzPKngWZCfAlMiLEHeOIiy', 1, NULL, NULL, '2019-07-26 16:16:47', '2019-07-26 16:16:47'),
(38, 'Pedro Lopez', 'PedroL@gmail.com', NULL, '$2y$10$ULR0DSxxqclNwxt/QWPPMutmrHszkr2b.EbJ6YFWkv1c4S/HZnjI.', 1, NULL, NULL, '2019-07-26 16:22:33', '2019-07-26 16:22:33'),
(39, 'Hugo Rodriguez', 'HugoR@gmail.com', NULL, '$2y$10$KVy3K0V88xuFo2z9xWFOkudUbAbr3N/gQnxSVUnRMZzTEvMJN9O8.', 1, NULL, NULL, '2019-07-26 16:24:52', '2019-07-26 16:24:52'),
(40, 'Felipe Javier Barrios Lopez', 'FelipeBarrios@gmail.com', NULL, '$2y$10$5xHZ3RncZ2QPluTsCXjCMug0xq4jF2r2q2iGcYPH4W7OZZhtnXw3W', 1, NULL, NULL, '2019-07-26 19:19:20', '2019-07-26 19:19:20'),
(41, 'Francisco De la Fuente', 'FranciscoDF@gmail.com', NULL, '$2y$10$BTQil1FC8u4kt3f/YmrMr.WdUv4BFo4dx0AyQG5zpKnzcx0wgdoKG', 1, NULL, NULL, '2019-07-27 07:06:43', '2019-07-27 07:06:43'),
(42, 'Rodrigo Ramirez', 'RodrigoR@gmail.com', NULL, '$2y$10$d9HZLRSpc/etYaMewAClnOKRZdTIq0o49jYG8Vkz9PMk0dA2nQ06y', 1, NULL, NULL, '2019-07-27 22:54:21', '2019-07-27 22:54:21'),
(43, 'Barbara Castro', 'bcastro@ucm.cl', NULL, '$2y$10$bQ2ai9f57L0x.btzIBgJ9e7xM48mJCfY/TDGULmcO97Cpfyqv39lG', 4, NULL, NULL, NULL, NULL),
(44, 'Walter Gonzalo Casanova Hurtado', 'WaterC@gmail.com', NULL, '$2y$10$zOb/mHTfVnhSmiyQN8KUS.ovDQauYKWCIocyh9wZ0yMccJg54SEG6', 1, NULL, NULL, '2019-07-31 18:14:50', '2019-07-31 18:14:50'),
(45, 'Fernando Ignacio Olmos Duran', 'FernandoOlmos@gmail.com', NULL, '$2y$10$Nvu1LcLeFHrDlIYG0Yy/9eqqPPKKNQ/ChxLFk4RJMgSgoJRZxIhAK', 1, NULL, NULL, '2019-08-02 11:05:35', '2019-08-02 11:05:35'),
(46, 'Sebastian Garrido', 'SebastianG@gmail.com', NULL, '$2y$10$GTku6pBK38kipS/vAjiy.uheUMFQlB0jjKfGy/YPpmK24EHB.MKFa', 1, NULL, NULL, '2019-08-03 00:16:28', '2019-08-03 00:16:28'),
(47, 'Miguel Ignacio Cancino Nuñez', 'MiguelCancino@gmail.com', NULL, '$2y$10$wJNMKinj8M3f9FVVc8UOxeDea2G9Uybl9cVJhcwNM4.yFogSCmsTm', 1, NULL, NULL, '2019-08-04 03:28:44', '2019-08-04 03:28:44'),
(48, 'Karina Patiño Albornoz', 'KarinaPA@gmail.com', NULL, '$2y$10$pW9lFbbkUs1pJcCN6jw1/OHlt7.avKI1XJmgbbECLIDi/sCC.wrVa', 1, NULL, NULL, '2019-08-05 06:12:09', '2019-08-05 06:12:09'),
(49, 'Jose Miguel Valdes Salgado', 'JoseValdes@gmail.com', NULL, '$2y$10$FPPhdYnm/7UwDghPIl1K8OCL0EMAXUMDGQGCmpOu8YXfXNhAYTZJm', 1, NULL, NULL, '2019-08-05 17:22:04', '2019-08-05 17:22:04'),
(50, 'Felipe Antonio Matamala Lopez', 'FelipeM@gmail.com', NULL, '$2y$10$I2cOwjlKUc7gWNbChsIm8OyFRAU5uinui43DptVoDsAq2dN2IAH.m', 1, NULL, NULL, '2019-08-05 23:31:38', '2019-08-06 00:38:02'),
(51, 'Hector Carrasco Faundez', 'HectorCarrasco@gmail.com', NULL, '$2y$10$8jw8pMMBbi/wh2icBgjoeOH3/M9KbMQvJ96dpdCffyLdjdVgPNpTq', 1, NULL, NULL, '2019-08-06 05:32:33', '2019-08-06 05:32:33'),
(52, 'Boris Salgado Lopez', 'BorisSalgado@gmail.com', NULL, '$2y$10$dFfBS7LRJCjuFVHANjiTNuzgn9KnD6hEiUQDQNhL1AkkUnk/VpTe2', 1, NULL, NULL, '2019-08-06 06:41:57', '2019-08-06 06:41:57'),
(53, 'Diego Gaete Bernales', 'DiegoGaete@gmail.com', NULL, '$2y$10$gCJpSgtKbaMRdFOQj/qBzOjaNopx5RykJObeGeHFSCxGc7VJBV9DS', 1, NULL, NULL, '2019-08-06 06:59:24', '2019-08-06 06:59:24'),
(54, 'Humberto Muñoz Norambuena', 'HumbertoM@gmail.com', NULL, '$2y$10$dbZHlhrVE8/IijIMVZHxuObaV8lkoM5jQyb4Iw7IcnTRFIGpOipne', 1, NULL, NULL, '2019-08-06 07:42:02', '2019-08-06 07:42:02'),
(55, 'Carlos Hernandez Gonzalez', 'CarlosHernandez@gmail.com', NULL, '$2y$10$rjMRjqebv8CIgsRMiq.H6eu8cpsnxIx1Xn4bDlIHvnM.7c/2IdE4e', 1, NULL, NULL, '2019-08-06 14:13:33', '2019-08-06 14:13:33'),
(56, 'Ignacio Lillo', 'IgnacioL@gmail.com', NULL, '$2y$10$nYTu46h4pWjmGQsPeNA72ui4wqKqcq3MocGKfNfILijiWaitZK/iq', 1, NULL, NULL, '2019-08-24 07:20:50', '2019-08-24 07:20:50'),
(57, 'Jose Lopez', 'Jl@gmail.com', NULL, '$2y$10$v960GkUnudmpxBGFonaOE.j9Mw5pluZYCm7755mid0WiLy3O7dbO.', 1, NULL, NULL, '2019-08-27 20:39:10', '2019-08-27 20:39:10'),
(58, 'Boris Mora Garrido', 'BorisMora@gmail.com', NULL, '$2y$10$wk.L5RhwYI0okK2xMd2OAeQUPsz1.jw9GkysqR6cILTT4Mvqq869S', 1, NULL, NULL, '2019-09-01 06:03:18', '2019-09-01 06:03:18'),
(59, 'Alfonso Bilocopetiuc Parra', 'AlfonsoB@gmail.com', NULL, '$2y$10$4K13XLIIl//D1SYcFYDNF.lr0yo1gxalUbBOiFvvhuE1zNpWUiHUq', 1, NULL, NULL, '2019-09-01 20:12:56', '2019-09-01 20:12:56'),
(60, 'Hugo Fuentes ', 'HugoF@gmail.com', NULL, '$2y$10$kFOp7oDiJm3w7PvdIY3SIOStnEXM8LRAIj0zZ.rDAdwlZjGV5VOUi', 1, NULL, NULL, '2019-10-03 16:02:49', '2019-10-03 16:02:49'),
(61, 'Hugo Gutierrez', 'HugoG@gmail.com', NULL, '$2y$10$m5a0LN31UgHZj/JAD5s6hOOHBJNq.vdUg2pAAXKV.pxTQ0OMQogQS', 1, NULL, NULL, '2019-10-03 16:03:53', '2019-10-03 16:03:53'),
(63, 'Adolfo Fuentes', 'AdolfoF@gmail.com', NULL, '$2y$10$Ss8/KBqPGEMnblkBAaKcq.YWzi80H3oeZcJzf8a3gzIbk8zK5Iqm2', 1, NULL, NULL, '2019-10-03 23:32:36', '2019-10-03 23:32:36'),
(96, 'Mary Carmen Jarur', 'Mjarur@gmail.com', NULL, '$2y$10$r35uyScKmDskm1R1uJy3POp.DDhiCo7tXuSbX1aYutoVBbDk/D7Du', 2, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_tesis`
--
ALTER TABLE `area_tesis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area_tesis` (`area_tesis`),
  ADD UNIQUE KEY `area_tesis_2` (`area_tesis`);

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fondo_concursable`
--
ALTER TABLE `fondo_concursable`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grado_academico_profesor_planta`
--
ALTER TABLE `grado_academico_profesor_planta`
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
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `area_tesis`
--
ALTER TABLE `area_tesis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fondo_concursable`
--
ALTER TABLE `fondo_concursable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comision`
--
ALTER TABLE `comision`
  ADD CONSTRAINT `comision_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tesis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grado_academico_profesor_planta`
--
ALTER TABLE `grado_academico_profesor_planta`
  ADD CONSTRAINT `grado_academico_profesor_planta_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
