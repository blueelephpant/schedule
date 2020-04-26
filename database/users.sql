-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2019 a las 07:28:02
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- DataBase: `schedule`
--

-- --------------------------------------------------------

--
-- Users' Structure Table
--

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(20) NOT NULL ,
    `lastname` VARCHAR(40) NOT NULL ,
    `status` INT(1) DEFAULT 0,
    `email` VARCHAR(20) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Users' Data (firsts items)
--

INSERT INTO `users` (`id`, `name`, `lastname`, `status`, `email`) VALUES
(1, 'Testing', 'Testing LastName', 0, 'testing@testing.com'),
(2, 'Test', 'Test LastName', 1, 'test@test.com');

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;