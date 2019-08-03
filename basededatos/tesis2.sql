-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2019 a las 23:38:15
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
  `profesor1_comision` varchar(255) DEFAULT NULL,
  `profesor2_comision` varchar(255) DEFAULT NULL,
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
(8, 3, 'Carlos Andres Cancino Duran', 'Xaviera Lopez', 'Paulo Gonzalez', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 17, 'Oscar Raul Perez Fernandez', 'Hugo Araya', 'Paulo Gonzalez', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 12, 'Rodrigo Chavez', 'Hugo Araya', 'Marco Toranzo', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 3, 'Camilo Cavieres', 'Paulo Gonzalez', 'Hugo Araya', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 17, 'Gonzalo Ignacio Paredes Valenzuela', 'Hugo Araya', 'Paulo Gonzalez', 'Wladimir Soto', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 21, 'Felipe Nicolas Tapia Nuñez', 'Sergio Hernandez', 'Paulo Gonzalez', 'Xaviera Lopez', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 3, 'Rosa Karina Gonzalez Gutierrez', 'Paulo Gonzalez', 'Hugo Araya', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 3, 'Daniel Alarcon Chambles', 'Hugo Araya', 'Marco Toranzo', 'Paulo Gonzalez', 'Jose Torres', 'JoseT@gmail.com', 'Universidad de Talca', 'Gabriel Perez', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(32, 3, 'Jhon Michael Faundez Miño', 'Paulo Gonzalez', 'Marco Toranzo', 'Ricardo Barrientos', 'Jose Torres', 'JoseT@gmail.com', 'Universidad de Talca', NULL, NULL, NULL),
(38, 3, 'Pedro Lopez', 'Paulo Gonzalez', 'Hugo Araya', 'Ricardo Barrientos', 'Jose Torres', 'JoseTorres@utal.com', 'Universidad de Talca', 'Gabriel Perez', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(39, 3, 'Hugo Rodriguez', 'Hugo Araya', 'Paulo Gonzalez', 'Sergio Hernandez', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 3, 'Felipe Javier Barrios Lopez', 'Hugo Araya', 'Paulo Gonzalez', 'Ricardo Barrientos', 'Jose Torres', 'JoseT@gmail.com', 'Universidad de Talca', 'Gabriel Perez', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(41, 13, 'Francisco De la Fuente', 'Hugo Araya', 'Xaviera Lopez', 'Ricardo Barrientos', 'Jose Torres', 'JoseTorres@utal.com', 'Universidad de Talca', NULL, NULL, NULL),
(42, 3, 'Rodrigo Ramirez', 'Sergio Hernandez', 'Angelica Urrutia', 'Ninguno', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 3, 'Walter Gonzalo Casanova Hurtado', 'Paulo Gonzalez', 'Marco Toranzo', 'Ninguno', 'Hugo Perez', 'HugoP@gmail.com', 'Universidad de Concepcion', 'Gabriel Perez', 'GabrielP@gmail.com', 'Universidad Autonoma'),
(45, 15, 'Fernando Ignacio Olmos Duran', 'Xaviera Lopez', 'Marco Toranzo', 'Xaviera Lopez', 'Jose Torres', 'JoseTorres@utal.com', 'Universidad de Talca', 'Hugo Yañez', 'HugoY@utal.com', 'Universidad de Talca'),
(46, 13, 'Sebastian Garrido', 'Angelica Urrutia', 'Marco Toranzo', 'Hugo Araya', 'Jose Torres', 'JoseT@utal.com', 'Universidad de Talca', 'Gabriel Perez', 'GabrielP@gmail.com', 'Universidad Autonoma');

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
  `estado3` int(11) DEFAULT NULL,
  `fecha_peticion` timestamp NOT NULL DEFAULT current_timestamp(),
  `nota_pendiente` date DEFAULT NULL,
  `nota_prorroga` date DEFAULT NULL,
  `fecha_inscripcion` date DEFAULT NULL,
  `constancia_ex` varchar(255) DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `publicar` int(11) DEFAULT NULL,
  `abstract_res` text DEFAULT NULL,
  `fecha_presentacion_tesis` datetime DEFAULT NULL,
  `acta_ex` varchar(255) DEFAULT NULL,
  `nota_tesis` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id`, `nombre_completo`, `rut`, `nombre_tesis`, `area_tesis`, `ano_ingreso`, `profesor_guia`, `carrera`, `tipo`, `contribucion`, `descripcion`, `objetivos`, `tipo_vinculacion`, `nombre_vinculacion`, `observacion`, `estado1`, `estado2`, `estado3`, `fecha_peticion`, `nota_pendiente`, `nota_prorroga`, `fecha_inscripcion`, `constancia_ex`, `abstract`, `publicar`, `abstract_res`, `fecha_presentacion_tesis`, `acta_ex`, `nota_tesis`) VALUES
(8, 'Carlos Andres Cancino Duran', '18670608', 'Reconocimiento de patrones con redes neuronalesen imagenes', 'Ingenieria de Software', 2013, 'Sergio Hernandez', 'Ingenieria Civil Informatica', 'Tesis', 'Promover y potenciar el concepto de ciudades inteligentes', 'Descripcion1 Descripcion2 Descripcion3', 'Aplicación de IA, en camaras de seguridad', 'Proyecto', 'Ciudades inteligentes XX', 'Tesis interesante', 4, 1, NULL, '2019-07-16 04:02:26', '2019-07-01', '2019-07-18', '2019-07-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Oscar Raul Perez Fernandez', '16788324', 'Sistema de control', 'Ingenieria de Software', 2013, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Automatizar y agilizar el proceso', 'Descripcion1 Descripcion2', 'Sistema de evidencias para la Universidad', 'Comunidad', 'Municiaplidad de San Clemente', NULL, 4, 1, NULL, '2019-07-16 04:12:04', NULL, NULL, '2019-07-18', 'dGMtd68RUpkq7Cdol1KMRIX4HbuXMqqIY9OgYF1g.pdf', 'Es cada vez más evidente que la informática (manejo de información) y los computadores (procesadores de información), están cambiando nuestro sistema de vida. Por ahora podemos decir que el computador nos ofrece las ventajas de una rapídez, seguridad y gran capacidad de trabajo de datos, por ejemplo: informática y estadísticas, y eso también nos alcanzará.', 1, NULL, '2019-07-02 15:00:00', NULL, NULL),
(16, 'Rodrigo Chavez', '18063911', 'Aplicacion movil', 'Ingenieria de Software', 2014, 'Paulo Gonzalez', 'Ingenieria en Ejecucion e Informatica', 'Memoria', 'Contribucion1,Contribucion2', 'Descripcion1Descripcion2', 'Ayudar a la comunidad', 'Empresa', 'Tutelkan', NULL, 1, NULL, NULL, '2019-07-16 03:56:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Camilo Cavieres', '18738562', 'Aplicacion en Ionix para ed fisica', 'Ingenieria de Software', 2013, 'Marco Toranzo', 'Ingenieria en Ejecucion e Informatica', 'Memoria', 'Se espera ser un apoyo para la carrera de de ed. fisica en la Universidad.', 'Descripcion1, Descripcion2', 'objetivo1 objetivo2', 'Empresa', 'Ed fisica.', 'Nombre incompleto', 4, 1, NULL, '2019-07-18 06:43:00', '2019-10-25', '2019-12-20', '2019-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Gonzalo Ignacio Paredes Valenzuela', '17345456', 'Sistema de inventario UCM', 'Ingenieria de Software', 2012, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Se espera apoyar la automatizacion de un sistema de la universidad, y agilizar procesos.', 'Descripcion1, Descripcion2', 'objetivo1 objetivo2', 'Proyecto', 'Departamento de informatica UCM', NULL, 4, 1, NULL, '2019-07-19 19:11:32', NULL, '2019-07-24', '2019-07-28', '6kJevUClPeZ06vTKSelIPZAvdNPBhgehShMazLeW.pdf', 'presenta en algunos pasajes de esta obra viene a demostrar, como han cambiado las relaciones humanas y jurídicas con el advenimiento de la informática y de las telecomunicaciones. Sin pretender sentar bases sólidas, esta investigación pretende despertar el...', 1, NULL, '2019-07-26 20:52:00', 'TdIvKakaANdcnRINpzvLETmCxlCkqQlm67qN12fe.pdf', 7),
(22, 'Felipe Nicolas Tapia Nuñez', '18732564', 'Estudio de Patrones de venas de la mano', 'IA', 2013, 'Ricardo Barrientos', 'Ingenieria Civil Informatica', 'Tesis', 'Permitir ahorrar recursos en el reconocimiento unico de la poblacion, que actualmente se hace por huella dactilar.', 'El alumno deberá ayudar a generar en el reconocimiento de patrones de las venas de la mano.', 'Generar un modelo que permite el reconocimiento de las venas de la mano.', 'Fondo concusable', 'Conicyt', NULL, 4, 1, NULL, '2019-07-19 23:14:28', NULL, '2019-07-23', '2019-07-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Rosa Karina Gonzalez Gutierrez', '18923457', 'Analisis de sentimientos aplicando una taxonomia de encuestas', 'BI', 2013, 'Angelica Urrutia', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Comunidad', 'Jardin Infantil', 'Escribe aquí su observacion', 4, 1, 1, '2019-07-20 23:38:34', '2019-07-19', '2019-08-20', '2019-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Daniel Alarcon Chambles', '18123456', 'Desarrollo modelo de optimización en java', 'Ingenieria de Software', 2013, 'Wladimir Soto', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'objetivo1 objetivo2', 'Proyecto', 'UTALCA-UCM', 'Sin observacion', 4, 1, NULL, '2019-07-26 08:22:02', '2019-07-31', NULL, '2019-07-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Jhon Michael Faundez Miño', '18123467', 'Desarrollo de aplicacion movil educacion fisica', 'Ingenieria de Software', 2013, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Memoria', 'Contribuir a...', 'Descripcion1 Descripcion2', 'objetivo1 objetivo2', 'Empresa', 'UCM carrera ed. fisica', 'Tesis rechazada por...', 3, 1, NULL, '2019-07-26 10:52:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Felipe Garrido Perez', '19234544', 'Desarrollo de algoritmo de limpieza de imagenes', 'Imagenes', 2014, 'Paulo Gonzalez', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Proyecto', 'Proyecto F2', NULL, 1, NULL, NULL, '2019-07-26 12:03:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Nelson Guerra', '12345678', 'Desarrollo aplicacion', 'Imagenes', 2013, 'Ricardo Barrientos', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'objetivo1 objetivo2', 'Fondo concusable', 'Conycit', NULL, 1, NULL, NULL, '2019-07-26 12:12:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Cesar Poblete', '12356789', 'Aplicando BI sobre datos registro civil', 'BI', 2014, 'Angelica Urrutia', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'objetivo1 objetivo2', 'Empresa', '3it', NULL, 1, NULL, NULL, '2019-07-26 12:14:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Arturo Fernandez', '18889456', 'Desarrollo Aplicacion Movil', 'Ingenieria de Software', 2014, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1, Descripcion2', 'Objetivo1, Objetivo2', 'Empresa', 'Tutelkan', NULL, 1, NULL, NULL, '2019-07-26 12:18:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Pedro Lopez', '12345679', 'Filtro de imagenes', 'Ingenieria de Software', 2013, 'Paulo Gonzalez', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Proyecto', 'Desarrollo de aplicacion movil ed. fisica', 'Escribe aquí su observacion', 3, 1, NULL, '2019-07-26 12:23:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Hugo Rodriguez', '18772441', 'Optimizacion de filtro de imagenes', 'Imagenes', 2013, 'Marco Mora', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'Objetivo1, Objetivo2', 'Fondo concusable', 'Conicyt', 'Tesis muy llamativa', 4, 1, NULL, '2019-07-26 12:26:07', NULL, NULL, '2019-07-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Felipe Javier Barrios Lopez', '12345677', 'Tesis1', 'Ingenieria de Software', 2014, 'Marco Toranzo', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2', 'Objetivo1, Objetivo2', 'Proyecto', 'Proyecto1', 'Escribe aquí su observacion', 3, 1, NULL, '2019-07-26 15:21:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Francisco De la Fuente', '18928324', 'Tesis2', 'BI', 2013, 'Wladimir Soto', 'Ingenieria Civil Informatica', 'Tesis', 'Contribuir a...', 'Descripcion1 Descripcion2 Descripcion3', 'objetivo1 objetivo2', 'Proyecto', 'Utalca', NULL, 4, 1, NULL, '2019-07-27 03:14:20', NULL, NULL, '2019-07-30', '156447033341.pdf', 'Utilizando valores de cierres semanales de los índices bursátiles estadounidenses Dow Jones(DJI), S&P500 (GSPC), Nasdaq (IXIC) y NYSE Composite (NYA), correspondientes al período comprendido entre el 4 de enero de 1980 al 31 de diciembre de 2005, se analiza la eficacia del Algoritmo Genético como técnica de optimización de estructuras de modelos GARCH para la predicción de retornos bursátiles. Los resultados obtenidos mediante Algoritmo Genético, considerando el Error Cuadrático Medio (ECM) como criterio de comparación, fueron contrastados con los de un modelo GARCH (1,1), un modelo GARCH especificado aleatoriamente y un modelo GARCH optimizado mediante Fuerza Bruta (probando todos los modelos posibles). Se efectuó un test de significancia estadística sobre la diferencia de ECM entre los modelos contrastados, además de realizar algunos test complementarios para medir el nivel de la aplicabilidad de los modelos (test LM de Engle, test Portmentau de bicorrelaciones de Hinich (test H) y test de correlaciones simples (testC)). Para todos los índices bajo análisis, los modelos GARCH optimizados por el Algoritmo Genético alcanzaron un ECM (para un conjunto extra muestral de 200 observaciones semanales) menor que el obtenido a través del modelo GARCH (1,1) y el modelo GARCH generado aleatoriamente. Sin embargo, y como era de esperar, el resultado en ECM fue mayor al del modelo obtenido por Fuerza Bruta. La diferencia entre el resultado del Algoritmo Genético y el de un modelo GARCH (1,1) resultó ser, en todos los casos, estadísticamente significativa a un 1% de significancia. Al comparar los resultados con el modelo GARCH especificado de manera aleatoria, sólo la diferencia entre ECM es significativa, a un 5% de nivel de significancia, para el caso del índice GSPC. Al analizar las diferencias de ECM entre los modelos obtenidos mediante Algoritmo Genético y Fuerza Bruta, éstas resultaron ser no significativas, salvo para el índice GSPC que fue significativa a un 10%. De esta manera, se puede concluir que un modelo GARCH optimizado mediante Algoritmo Genético podría obtener mejores resultados que una modelo GARCH (1,1) usado ampliamente en la literatura financiera. Además, el resultado obtenido mediante Algoritmo Genético no presenta desviaciones significativas con respecto de la mejor especificación posible. De este modo, se presenta evidencia a favor del Algoritmo Genético como técnica de optimización de estructuras de modelos GARCH.', 0, NULL, '2019-07-30 16:00:00', '156447057341.pdf', 7),
(42, 'Rodrigo Ramirez', '18345456', 'Aplicar redes neuronales para la creación de modelo predictivo biologico', 'Ingenieria de Software', 2013, 'Xaviera Lopez', 'Ingenieria Civil Informatica', 'Tesis', 'La contribucion esperada es:', 'En esta tesis se espera que...', 'Objetivo 1 Objetivo2', 'Proyecto', 'UCM', 'El nombre del alumno esta incompleto', 5, NULL, NULL, '2019-07-27 18:56:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Walter Gonzalo Casanova Hurtado', '22222222', 'Tesis03', 'Ingenieria de Software', 2014, 'Hugo Araya', 'Ingenieria Civil Informatica', 'Tesis', 'Contribucion 1 2 3 4 5 6...', 'Descripcion0 Descripcion1 Descripcion2, Descripcion3', 'Objetivo1 Objetivo2 Objetivo3', 'Empresa', 'Empresa03', 'Tesis muy buena', 4, 1, NULL, '2019-07-31 14:17:18', NULL, NULL, '2019-07-31', '1564587080PDF DE TESIS RELACIONADAS A EMPRESAS.pdf', 'La especificación y el análisis de requisitos son actividades fundamentales en el desarrollo de proyectos de software, ya que en base a ellos se decidirá qué caminos tomar durante todo el proceso de implementación. Asímismo, la documentación es una parte importante de todas las etapas de la ingeniería de software; ésta debe ser completa, actualizada y de fácil acceso para todas las personas involucradas en el proyecto.\r\n \r\n Para la administración de requisitos se ha creado la herramienta ReqAdmin, un sistema web que permite el acceso de la información tanto a desarrolladores como a clientes. Esta herramienta actualmente es usada en el curso Ingeniería de Software que imparte el Departamento de Ciencias de la Computación de la Universidad de Chile. ReqAdmin permite administrar los requisitos de un proyecto, pero carece de medios para administrar documentación.\r\n \r\n Para remediar esta situación se realizó una actualización a dicha herramienta, permitiendo ingresar y administrar la documentación dentro de ReqAdmin. Para ello se usó un editor de texto enriquecido que permite insertar texto con formato e imágenes. Además, con el sistema se puede generar cierta documentación, en particular documento de requisito, diseño e histórico, en formato digital.\r\n \r\n Se espera que esta actualización agregue valor a los desarrollos de software administrados con la herramienta ReqAdmin, permitiendo una documentación completa, de fácil acceso y vigente.', 1, NULL, '2019-07-31 11:35:00', '1564587375ActaOscar.pdf', 7),
(45, 'Fernando Ignacio Olmos Duran', '11111111', 'Realizando limpieza de datos sobre BI', 'BI', 2012, 'Angelica Urrutia', 'Ingenieria Civil Informatica', 'Tesis', 'Esto contribuirá a por ejemplo1, por ejemplo2, por ejemplo3, por ejemplo n', 'Se espera que el alumno descripcion1, descripcion2, descripcion3', 'Objetivo1,Objetivo2,Objetivo3', 'Proyecto', 'UCM', NULL, 4, 1, NULL, '2019-08-02 07:08:35', NULL, NULL, '2019-08-02', '156478693619.pdf', 'El siguiente es un proyecto realizado para Hewlett-Packard Chile, filial de HP Company, la cual vende productos de computación y ofrece servicios y soluciones tecnológicas. La empresa se divide funcionalmente en Imagen e Impresión, Sistemas Personales y Enterprise Business. El presente proyecto abordará las dos primeras áreas.\r\n \r\n La memoria cubre el campo de Aplicaciones de Inteligencia de Negocios y surge de la necesidad de la empresa de implementar herramientas de gestión para automatizar el control sobre los Puntos de Venta y la Fuerza de Venta a lo largo de Chile. Una herramienta capaz de entregar información útil en la toma de decisiones es fundamental para una empresa de la envergadura y tamaño de HP, la que cuenta con la mayor participación de mercado en el área de la tecnología.\r\n \r\n El trabajo se compone de un análisis de la situación actual, un levantamiento de los procesos relacionados con la entrega de reportes y un rediseño sobre éstos para que puedan ser implementados en un sistema de información. Los requerimientos y principales necesidades de la empresa son descritos, para posteriormente diseñar e implementar una solución rentable de Inteligencia de Negocios que automatice la creación de reportes, permitiendo visualizar Tableros o Dashboards dinámicos con acceso a información histórica.\r\n \r\n La propuesta elimina tareas duplicadas en ambas áreas que incluyen a más de 200 empleados, disminuyendo el costo en tiempo y recursos asociados a la creación de reportes, proporcionando una completa herramienta de gestión que incorpora siete Indicadores Clave de Desempeño definidos a partir de las necesidades de la empresa. Además se incluye un método de pronóstico de ventas para productos tecnológicos que genera importantes beneficios en comparación con la metodología actual.\r\n \r\n La herramienta es desarrollada a nivel de prototipo funcional, utilizando Visual Basic para Aplicaciones, Microsoft Access y PowerPivot para Excel. Esta memoria demuestra que una herramienta de Inteligencia de Negocios rentable y fácil de implementar puede ser sencillamente construida utilizando una base de datos, un proceso ETL y un sistema para la visualización de reportes.\r\n \r\n El trabajo puede ser extendido para incluir más fuentes de datos y cadenas de Retail, que permitirán incorporar nuevos indicadores de gestión. Además, modelos más complejos de pronóstico y agrupación pueden ser implementados, los que permitirán realizar mejores proyecciones de venta y quiebres de stock. A su vez, los tableros de gestión pueden ser visualizados en la nube utilizando Microsoft SharePoint 2010, facilitando así el acceso a éstos.', 1, NULL, '2019-08-02 19:30:00', '156478253045.pdf', 7),
(46, 'Sebastian Garrido', '18333333', 'Desarrollo de BI sobre datos de investigación UTALCA', 'Ingenieria de Software', 2013, 'Wladimir Soto', 'Ingenieria Civil Informatica', 'Tesis', 'Se espera que pueda contribuir a contribucion1, contribucion2, contribucion3, contribucion4, contribucion5', 'En este trabajo se espera descripcion1, descripcion2, descripcion3, descripcion4, descripcion5, descripcion6, descripcion7', 'objetivo1,objetivo2,objetivo3,objetivo4, objetivo5', 'Empresa', 'UTALCA', NULL, 2, 1, NULL, '2019-08-03 00:25:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(16, 'Rodrigo Chavez', 'RodrigoC@gmail.com', NULL, '$2y$10$IIMkIRIefVWEIR6u5Saby.szXbs5GmJ6cdumfFnmtgVArUi81R1c6', 1, NULL, '2019-07-16 07:55:40', '2019-07-17 22:44:22'),
(17, 'Marco Toranzo', 'mtoranzo@gmail.com', NULL, '$2y$10$/tGoCVb4KMYJvxU5/zTsTug0hnoqshVEAVuVkvqiChPqRSJS0hNcG', 2, NULL, NULL, NULL),
(18, 'Camilo Cavieres', 'CamiloC@gmail.com', NULL, '$2y$10$U9YUF0dsIGH.mtoDiuaOJuho1QeRg/kZCpK9GjiL7h0J24GbsqH/S', 1, NULL, '2019-07-16 08:27:48', '2019-07-16 08:27:48'),
(19, 'Gonzalo Ignacio Paredes Valenzuela', 'GonzaloParedes@gmail.com', NULL, '$2y$10$cqV6yLeBy8YZUIj6i13mFuye2MWyDwAHwa1KnGHFiaATaWVy.EGsu', 1, NULL, '2019-07-19 23:08:31', '2019-07-19 23:08:31'),
(20, 'Marco Mora', 'MarcoM@gmail.com', NULL, '$2y$10$TqMJh2XVrNb/EkpZMpepaO0lI2BaTmNUTsx0eSRKBVaVfyBsnfT0.', 2, NULL, NULL, NULL),
(21, 'Ricardo Barrientos', 'RicardoB@gmail.com', NULL, '$2y$10$YyLBVMuVK7mj47bwiWntP.srBH/yvye4RoHdSd3fckhI.skppMfYG', 2, NULL, NULL, NULL),
(22, 'Felipe Nicolas Tapia Nuñez', 'FelipeTapia@gmail.com', NULL, '$2y$10$5GLPqQqZX7NP8TpC02U1Seb1gv.oBvlWyz1ZYYiGpz8ZWlG8UwSPe', 1, NULL, '2019-07-20 03:11:25', '2019-07-20 03:11:25'),
(23, 'Rosa Karina Gonzalez Gutierrez', 'RosaGonzalez@gmail.com', NULL, '$2y$10$A706x5VrUJACCLTtvYc6FuVKhOuYzGTnRPcdVCRELNF2BzBgcvp1S', 1, NULL, '2019-07-21 03:32:43', '2019-07-21 03:59:35'),
(24, 'Jorge Gabriel Ramirez Perez', 'JorgeRamirez@gmail.com', NULL, '$2y$10$3gm/ql.92ksvlce2epChJuNL8LzkWreslcv9E70uiY5FRFSQXQfpu', 1, NULL, '2019-07-26 04:26:50', '2019-07-26 04:26:50'),
(31, 'Daniel Alarcon Chambles', 'DanielA@gmail.com', NULL, '$2y$10$EIN4vEKP8bMJiBsp0SkF/umiq8/f82YV4jyRAiVScO42S61ERKuu2', 1, NULL, '2019-07-26 11:49:01', '2019-07-26 12:39:55'),
(32, 'Jhon Michael Faundez Miño', 'JhonF@gmail.com', NULL, '$2y$10$ahzlv/f8/FnFZvQrdE1jqujo0R8uSY/05ZSJiieOoL.lvzAW4ecPq', 1, NULL, '2019-07-26 14:38:52', '2019-07-26 15:09:51'),
(33, 'Vicente Valdes', 'VicenteV@gmail.com', NULL, '$2y$10$0Xdv3Oc5h6fm9QA6BoUov.hy4mjlrH99VmFf22jBEiiTAsUjq4IHS', 1, NULL, '2019-07-26 15:26:23', '2019-07-26 15:26:23'),
(34, 'Felipe Garrido Perez', 'FelipeGarrido@gmail.com', NULL, '$2y$10$PGtMfMTMeu3UBOkiEddSXOUfcrmr.fdhpgjfi8DUWiGdUzCEsLQ3K', 1, NULL, '2019-07-26 16:02:24', '2019-07-26 16:02:24'),
(35, 'Nelson Guerra', 'NelsonG@gmail.com', NULL, '$2y$10$vCoKsvhC3DmnMSK71AMOjOdjmmQOwuChYL3seANSUYjq5Tg3VZ3Ti', 1, NULL, '2019-07-26 16:11:18', '2019-07-26 16:11:18'),
(36, 'Cesar Poblete', 'CesarP@gmail.com', NULL, '$2y$10$Q8Fcs.1uOa8YhOrPqCFggOFFYIyCIVsYS7Vb98BsLDP/4Sec9iFh.', 1, NULL, '2019-07-26 16:13:34', '2019-07-26 16:13:34'),
(37, 'Arturo Fernandez', 'ArturoF@gmail.com', NULL, '$2y$10$9Z2QuIyLfuWERzcbwqbrteOz0wP89iQjzPKngWZCfAlMiLEHeOIiy', 1, NULL, '2019-07-26 16:16:47', '2019-07-26 16:16:47'),
(38, 'Pedro Lopez', 'PedroL@gmail.com', NULL, '$2y$10$ULR0DSxxqclNwxt/QWPPMutmrHszkr2b.EbJ6YFWkv1c4S/HZnjI.', 1, NULL, '2019-07-26 16:22:33', '2019-07-26 16:22:33'),
(39, 'Hugo Rodriguez', 'HugoR@gmail.com', NULL, '$2y$10$KVy3K0V88xuFo2z9xWFOkudUbAbr3N/gQnxSVUnRMZzTEvMJN9O8.', 1, NULL, '2019-07-26 16:24:52', '2019-07-26 16:24:52'),
(40, 'Felipe Javier Barrios Lopez', 'FelipeBarrios@gmail.com', NULL, '$2y$10$5xHZ3RncZ2QPluTsCXjCMug0xq4jF2r2q2iGcYPH4W7OZZhtnXw3W', 1, NULL, '2019-07-26 19:19:20', '2019-07-26 19:19:20'),
(41, 'Francisco De la Fuente', 'FranciscoDF@gmail.com', NULL, '$2y$10$BTQil1FC8u4kt3f/YmrMr.WdUv4BFo4dx0AyQG5zpKnzcx0wgdoKG', 1, NULL, '2019-07-27 07:06:43', '2019-07-27 07:06:43'),
(42, 'Rodrigo Ramirez', 'RodrigoR@gmail.com', NULL, '$2y$10$d9HZLRSpc/etYaMewAClnOKRZdTIq0o49jYG8Vkz9PMk0dA2nQ06y', 1, NULL, '2019-07-27 22:54:21', '2019-07-27 22:54:21'),
(43, 'Barbara Castro', 'bcastro@ucm.cl', NULL, '$2y$10$bQ2ai9f57L0x.btzIBgJ9e7xM48mJCfY/TDGULmcO97Cpfyqv39lG', 4, NULL, NULL, NULL),
(44, 'Walter Gonzalo Casanova Hurtado', 'WaterC@gmail.com', NULL, '$2y$10$zOb/mHTfVnhSmiyQN8KUS.ovDQauYKWCIocyh9wZ0yMccJg54SEG6', 1, NULL, '2019-07-31 18:14:50', '2019-07-31 18:14:50'),
(45, 'Fernando Ignacio Olmos Duran', 'FernandoOlmos@gmail.com', NULL, '$2y$10$Nvu1LcLeFHrDlIYG0Yy/9eqqPPKKNQ/ChxLFk4RJMgSgoJRZxIhAK', 1, NULL, '2019-08-02 11:05:35', '2019-08-02 11:05:35'),
(46, 'Sebastian Garrido', 'SebastianG@gmail.com', NULL, '$2y$10$GTku6pBK38kipS/vAjiy.uheUMFQlB0jjKfGy/YPpmK24EHB.MKFa', 1, NULL, '2019-08-03 00:16:28', '2019-08-03 00:16:28');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
