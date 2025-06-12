-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2025 a las 01:45:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libros` int(11) NOT NULL,
  `id_local` varchar(15) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `genero` varchar(25) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `edicion` varchar(15) NOT NULL,
  `ano_publ` year(4) NOT NULL,
  `estatus` int(11) NOT NULL,
  `nom_autor` varchar(25) NOT NULL,
  `ap_autor` varchar(20) NOT NULL,
  `am_autor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libros`, `id_local`, `isbn`, `titulo`, `genero`, `editorial`, `edicion`, `ano_publ`, `estatus`, `nom_autor`, `ap_autor`, `am_autor`) VALUES
(13, '1', '12345678901', 'asd', 's', 'Jesucristroedition', 'nuevo testament', '2112', 0, 'Padre', 'Hijo', 'Espiritusanto'),
(14, '1', '111', 'asd', 's', 'Jesucristroedition', 'nuevo testament', '2112', 0, 'Padre', 'Hijo', 'Espiritusanto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libros`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
