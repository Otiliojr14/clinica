-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2022 a las 01:24:15
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cl_personals`
--

CREATE TABLE `cl_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unv_personal_id` int(10) UNSIGNED DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cl_personals`
--

INSERT INTO `cl_personals` (`id`, `unv_personal_id`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-03-10 22:44:09', '2022-03-10 22:44:09'),
(2, 3, 1, '2022-03-10 22:44:28', '2022-03-10 22:44:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medical_histories`
--

CREATE TABLE `medical_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cl_personal_id_nurse` int(10) UNSIGNED NOT NULL,
  `cl_personal_id_medical` int(10) UNSIGNED DEFAULT NULL,
  `unv_personal_id` int(10) UNSIGNED NOT NULL,
  `sintomas_respiratorios` tinyint(1) NOT NULL,
  `peso` decimal(8,2) UNSIGNED NOT NULL,
  `talla` decimal(8,2) UNSIGNED NOT NULL,
  `circunferencia` decimal(8,2) UNSIGNED NOT NULL,
  `arterial_diastolica` mediumint(9) NOT NULL,
  `arterial_sistolica` mediumint(9) NOT NULL,
  `frecuencia_cardiaca` mediumint(9) NOT NULL,
  `frecuencia_respiratoria` mediumint(9) NOT NULL,
  `temperatura` decimal(8,2) UNSIGNED DEFAULT 0.00,
  `saturacion_oxigeno` decimal(8,2) DEFAULT NULL,
  `glucosa_ayuno` decimal(8,2) NOT NULL,
  `tb_sintomas` tinyint(1) NOT NULL,
  `imc` decimal(8,2) DEFAULT NULL,
  `discapacidad` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnostico` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enfermedad_cronica` tinyint(1) DEFAULT NULL,
  `consulta_integral` tinyint(1) DEFAULT NULL,
  `resistencia_insulina` tinyint(1) DEFAULT NULL,
  `nutricion` tinyint(1) DEFAULT NULL,
  `act_fisica` tinyint(1) DEFAULT NULL,
  `psicologia` tinyint(1) DEFAULT NULL,
  `ultimos_lab` date DEFAULT NULL,
  `medicina_interna` tinyint(1) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `nino_sano` tinyint(1) DEFAULT NULL,
  `adulto_mayor` tinyint(1) DEFAULT NULL,
  `trimestre` tinyint(4) DEFAULT NULL,
  `consulta_prenatal` tinyint(4) DEFAULT NULL,
  `riesgo` tinyint(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `labs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estudios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medical_histories`
--

INSERT INTO `medical_histories` (`id`, `created_at`, `updated_at`, `cl_personal_id_nurse`, `cl_personal_id_medical`, `unv_personal_id`, `sintomas_respiratorios`, `peso`, `talla`, `circunferencia`, `arterial_diastolica`, `arterial_sistolica`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `temperatura`, `saturacion_oxigeno`, `glucosa_ayuno`, `tb_sintomas`, `imc`, `discapacidad`, `diagnostico`, `enfermedad_cronica`, `consulta_integral`, `resistencia_insulina`, `nutricion`, `act_fisica`, `psicologia`, `ultimos_lab`, `medicina_interna`, `specialty_id`, `nino_sano`, `adulto_mayor`, `trimestre`, `consulta_prenatal`, `riesgo`, `fecha`, `labs`, `estudios`) VALUES
(1, '2022-03-11 00:15:44', '2022-03-11 00:23:28', 1, 3, 2, 0, '63.40', '162.00', '60.20', 43, 56, 120, 276, '36.90', '76.00', '46.00', 0, '24.16', 'ninguna', 'Diag. 1<br />\r\nDiag. 2', 0, 1, 0, 0, 1, 0, '2022-03-01', 0, 2, 0, 0, 3, 1, 0, '2022-03-24', 'Descr.', 'Descr.');

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
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2022_02_15_012634_create_cl_personals_table', 1),
(9, '2022_02_15_012716_create_unv_personals_table', 1),
(10, '2022_03_03_024105_create_specialties_table', 1),
(11, '2022_02_15_235809_create_medical_histories_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialties`
--

CREATE TABLE `specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ALERGOLOGIA', '2022-03-11 00:20:47', '2022-03-11 00:20:47'),
(2, 'CARDIOLOGIA', '2022-03-11 00:21:23', '2022-03-11 00:21:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unv_personals`
--

CREATE TABLE `unv_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricula` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_beneficiario` tinyint(4) NOT NULL,
  `parentesco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unv_personals`
--

INSERT INTO `unv_personals` (`id`, `nombre`, `apellido`, `telefono`, `matricula`, `no_beneficiario`, `parentesco`, `sexo`, `fecha_nacimiento`, `created_at`, `updated_at`) VALUES
(1, 'Fernando', 'Gutierrez Martinez', '9341324532', '932849', 0, 'Derechohabiente', 'H', '1982-03-10', '2022-03-10 22:33:52', '2022-03-10 22:33:52'),
(2, 'Alejandra', 'Hernández Martinez', '9341324212', '932849', 1, 'Esposa', 'M', '1984-05-10', '2022-03-10 22:35:01', '2022-03-10 22:35:01'),
(3, 'Ramón', 'Cuj Escamilla', '9341354212', '932850', 0, 'Derecho', 'H', '1976-05-10', '2022-03-10 22:36:10', '2022-03-10 22:36:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cl_personals`
--
ALTER TABLE `cl_personals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medical_histories`
--
ALTER TABLE `medical_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unv_personals`
--
ALTER TABLE `unv_personals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cl_personals`
--
ALTER TABLE `cl_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medical_histories`
--
ALTER TABLE `medical_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unv_personals`
--
ALTER TABLE `unv_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
