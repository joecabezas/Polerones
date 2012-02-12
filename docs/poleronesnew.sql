-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 50.63.228.71
-- Generation Time: Jan 14, 2012 at 06:32 PM
-- Server version: 5.0.91
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `poleronesnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `is_in_top_menu` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(3, 'Poleron Generación', '2011-11-19 16:33:59', '2011-11-19 16:33:59');
INSERT INTO `categories` VALUES(4, 'Ropa Institucional', '2011-11-19 16:34:16', '2011-11-19 16:34:16');
INSERT INTO `categories` VALUES(5, 'Bordados', '2011-11-19 20:26:32', '2011-11-19 20:26:32');
INSERT INTO `categories` VALUES(6, 'Gorro', '2011-12-28 23:35:36', '2011-12-28 23:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` VALUES(3, 'Instituto Nacional', '2011-11-19 16:32:46', '2011-11-19 16:32:46');
INSERT INTO `institutions` VALUES(4, 'Colegio Internacional Alba', '2011-11-19 20:39:13', '2011-11-19 20:39:13');
INSERT INTO `institutions` VALUES(5, 'aa', '2011-12-28 13:30:42', '2011-12-28 13:30:42');
INSERT INTO `institutions` VALUES(6, 'Pontificia Universidad Católica de Chile', '2011-12-28 17:20:01', '2011-12-28 17:20:01');
INSERT INTO `institutions` VALUES(7, 'Colegio Saint James', '2011-12-28 18:01:51', '2011-12-28 18:01:51');
INSERT INTO `institutions` VALUES(8, 'Colegio Mahuida', '2011-12-28 18:02:04', '2011-12-28 18:02:04');
INSERT INTO `institutions` VALUES(9, 'Colegio San Rafael', '2011-12-28 18:05:14', '2011-12-28 18:05:14');
INSERT INTO `institutions` VALUES(10, 'Colegio Teresiano Vitacura', '2011-12-28 18:06:36', '2011-12-28 18:06:36');
INSERT INTO `institutions` VALUES(11, 'Escuela de Medicina de la Universidad de Chile', '2011-12-28 18:07:50', '2011-12-28 18:07:50');
INSERT INTO `institutions` VALUES(12, ' Colegio San Leonardo', '2011-12-28 18:08:17', '2011-12-28 18:08:17');
INSERT INTO `institutions` VALUES(13, 'Instituto Nacional', '2011-12-28 18:08:26', '2011-12-28 18:08:26');
INSERT INTO `institutions` VALUES(14, 'British College Antofagasta', '2011-12-28 23:30:53', '2011-12-28 23:30:53');
INSERT INTO `institutions` VALUES(15, 'Grupo Guias Scouts Hardy Vargas', '2011-12-28 23:35:09', '2011-12-28 23:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comuna` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_dir` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL auto_increment,
  `image` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` VALUES(30, 'Curso copia.jpg', '30', 15, '2011-11-19 20:29:53', '2011-11-19 20:29:53');
INSERT INTO `pictures` VALUES(31, 'casaca_4medio_2007_internacional_alba_front.jpg', '31', 17, '2011-11-19 20:41:13', '2011-11-19 20:41:13');
INSERT INTO `pictures` VALUES(32, 'casaca_4medio_2007_internacional_alba_back.jpg', '32', 17, '2011-11-19 20:41:45', '2011-11-19 20:41:45');
INSERT INTO `pictures` VALUES(34, 'Sin nombre.jpg', '34', 19, '2011-12-28 17:33:16', '2011-12-28 17:33:16');
INSERT INTO `pictures` VALUES(35, 'TutoresUCTrasero.jpg', '35', 19, '2011-12-28 17:34:14', '2011-12-28 17:34:14');
INSERT INTO `pictures` VALUES(36, 'casaca_4C_2007_IN_back.jpg', '36', 20, '2011-12-28 18:09:53', '2011-12-28 18:09:53');
INSERT INTO `pictures` VALUES(37, 'casaca_4C_2007_IN_front.jpg', '37', 20, '2011-12-28 18:10:04', '2011-12-28 18:10:04');
INSERT INTO `pictures` VALUES(38, '', '', 21, '2011-12-28 18:12:06', '2011-12-28 18:12:06');
INSERT INTO `pictures` VALUES(39, 'casaca_CSL_3medio_2007_delantero.jpg', '39', 21, '2011-12-28 18:12:21', '2011-12-28 18:12:21');
INSERT INTO `pictures` VALUES(40, 'casaca_CSL_3medio_2007_back.jpg', '40', 21, '2011-12-28 18:13:23', '2011-12-28 18:13:23');
INSERT INTO `pictures` VALUES(41, 'jpeg3.jpg', '41', 22, '2011-12-28 18:15:02', '2011-12-28 18:15:02');
INSERT INTO `pictures` VALUES(42, 'casaca_4B_2007_francisco_de_miranda_front.jpg', '42', 23, '2011-12-28 23:29:38', '2011-12-28 23:29:38');
INSERT INTO `pictures` VALUES(43, 'casaca_4B_2007_francisco_de_miranda_back.jpg', '43', 23, '2011-12-28 23:29:59', '2011-12-28 23:29:59');
INSERT INTO `pictures` VALUES(44, 'british_d.jpg', '44', 24, '2011-12-28 23:32:23', '2011-12-28 23:32:23');
INSERT INTO `pictures` VALUES(45, 'brtitsh_t.jpg', '45', 24, '2011-12-28 23:33:59', '2011-12-28 23:33:59');
INSERT INTO `pictures` VALUES(46, 'Gorro1.jpg', '46', 26, '2011-12-28 23:37:42', '2011-12-28 23:37:42');
INSERT INTO `pictures` VALUES(47, 'Gorro2.jpg', '47', 26, '2011-12-28 23:38:54', '2011-12-28 23:38:54');
INSERT INTO `pictures` VALUES(48, 'Gorro3.jpg', '48', 26, '2011-12-28 23:40:44', '2011-12-28 23:40:44');
INSERT INTO `pictures` VALUES(49, 'MedicinaChile_d.jpg', '49', 27, '2011-12-28 23:54:21', '2011-12-28 23:54:21');
INSERT INTO `pictures` VALUES(50, 'MedicinaChile_t.jpg', '50', 27, '2011-12-28 23:54:54', '2011-12-28 23:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES(15, 'polera pique', 11, 3, '2011-11-19 20:28:34', '2011-11-19 20:28:34');
INSERT INTO `products` VALUES(16, 'uguyg', 11, 3, '2011-11-19 20:35:40', '2011-11-19 20:35:40');
INSERT INTO `products` VALUES(17, 'Poleron algodon', 13, 3, '2011-11-19 20:39:40', '2011-11-19 20:39:40');
INSERT INTO `products` VALUES(19, 'Poleron Tutores UC', 15, 3, '2011-12-28 17:31:47', '2011-12-28 17:33:56');
INSERT INTO `products` VALUES(20, 'Matematicos   4° C   2007', 16, 3, '2011-12-28 18:09:40', '2011-12-28 18:09:40');
INSERT INTO `products` VALUES(21, '3° Medio Gira de Estudios 2007', 17, 3, '2011-12-28 18:11:59', '2011-12-28 18:11:59');
INSERT INTO `products` VALUES(22, '4° Medio 2009', 18, 3, '2011-12-28 18:14:25', '2011-12-28 18:14:25');
INSERT INTO `products` VALUES(23, '4° Medio B 2007', 19, 3, '2011-12-28 23:29:09', '2011-12-28 23:29:09');
INSERT INTO `products` VALUES(24, 'Promoción 2011', 20, 3, '2011-12-28 23:32:01', '2011-12-28 23:32:01');
INSERT INTO `products` VALUES(25, 'Gorro tipo Jockey bordado', 21, 3, '2011-12-28 23:36:25', '2011-12-28 23:36:25');
INSERT INTO `products` VALUES(26, 'Jockey de Scouts bordado', 21, 5, '2011-12-28 23:37:16', '2011-12-28 23:37:16');
INSERT INTO `products` VALUES(27, 'Poleron Medicina Universidad de Chile', 22, 3, '2011-12-28 23:53:52', '2011-12-28 23:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL auto_increment,
  `product_count` int(11) NOT NULL,
  `start` date default NULL,
  `end` date default NULL,
  `institution_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` VALUES(11, 2, '2011-11-19', '2011-11-19', 3, 4, 3, '2011-11-19 20:27:07', '2011-11-19 20:31:01');
INSERT INTO `projects` VALUES(12, 0, '2011-11-19', '2011-11-19', 3, 3, 4, '2011-11-19 20:27:46', '2011-11-19 20:27:46');
INSERT INTO `projects` VALUES(13, 1, '2011-11-19', '2011-11-19', 4, 4, 3, '2011-11-19 20:39:26', '2011-11-19 20:39:26');
INSERT INTO `projects` VALUES(14, 0, '2011-12-28', '2011-12-28', 3, 4, 5, '2011-12-28 13:31:55', '2011-12-28 13:34:22');
INSERT INTO `projects` VALUES(15, 1, '2011-12-28', '2011-12-28', 6, 4, 3, '2011-12-28 17:30:58', '2011-12-28 17:30:58');
INSERT INTO `projects` VALUES(16, 1, '2011-12-28', '2011-12-28', 3, 4, 3, '2011-12-28 18:08:40', '2011-12-28 18:08:40');
INSERT INTO `projects` VALUES(17, 1, '2011-12-28', '2011-12-28', 12, 4, 3, '2011-12-28 18:11:05', '2011-12-28 18:11:05');
INSERT INTO `projects` VALUES(18, 1, '2011-12-28', '2011-12-28', 7, 4, 3, '2011-12-28 18:14:03', '2011-12-28 18:14:03');
INSERT INTO `projects` VALUES(19, 1, '2011-12-28', '2011-12-28', 8, 4, 3, '2011-12-28 23:27:40', '2011-12-28 23:27:40');
INSERT INTO `projects` VALUES(20, 1, '2011-12-28', '2011-12-28', 14, 4, 3, '2011-12-28 23:31:06', '2011-12-28 23:31:06');
INSERT INTO `projects` VALUES(21, 2, '2011-12-28', '2011-12-28', 15, 4, 6, '2011-12-28 23:35:45', '2011-12-28 23:36:58');
INSERT INTO `projects` VALUES(22, 1, '2011-12-28', '2011-12-28', 11, 4, 3, '2011-12-28 23:42:00', '2011-12-28 23:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` VALUES(3, 'En Desarrollo', '2011-11-19 16:33:24', '2011-11-19 16:33:24');
INSERT INTO `statuses` VALUES(4, 'Terminado', '2011-11-19 16:33:34', '2011-11-19 16:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` VALUES(3, 'Polerón', '2011-11-19 16:34:26', '2011-11-19 16:34:26');
INSERT INTO `types` VALUES(4, 'Polera', '2011-11-19 16:34:38', '2011-11-19 16:34:45');
INSERT INTO `types` VALUES(5, 'Gorro', '2011-12-28 23:36:40', '2011-12-28 23:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `privileges` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(2, 'Joel Cabezas', '4b1c30ecd1bd1718355e482fddc7788bc460885d', 'joel@polerones.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES(3, 'Angelo Cabezas', '2d932bcdc2dc9674ece0102c72d4ec6897753651', 'angelo@polerones.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
