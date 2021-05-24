-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2021 at 10:23 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootstrap4`
--
CREATE DATABASE IF NOT EXISTS `bootstrap4` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bootstrap4`;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(52) COLLATE utf8_unicode_ci NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('AT', 'Austria', 8205000),
('AU', 'Australia', 24016400),
('BA', 'Bosnia and Herzegovina', 4590000),
('BE', 'Belgium', 10403000),
('BG', 'Bulgaria', 7148785),
('BR', 'Brazil', 205722000),
('CA', 'Canada', 35985751),
('CN', 'China', 1330044000),
('CZ', 'Czech Republic', 10476000),
('DE', 'Germany', 81459000),
('DK', 'Denmark', 5484000),
('ES', 'Spain', 46505963),
('FI', 'Finland', 5244000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('GR', 'Greece', 11000000),
('HR', 'Croatia', 4491000),
('HU', 'Nungary', 9982000),
('ID', 'Indonesia', 242968342),
('IE', 'Ireland', 4622917),
('IN', 'India', 1285400000),
('IT', 'Italy', 60340328),
('NL', 'Netherlands', 16645000),
('PL', 'Poland', 38500000),
('PT', 'Portugal', 10676000),
('RO', 'Romania', 21959278),
('RS', 'Serbia', 7344847),
('RU', 'Russia', 146519759),
('SE', 'Sweden', 9555893),
('SK', 'Slovakia', 5455000),
('US', 'United States', 322976000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
