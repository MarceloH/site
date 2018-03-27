-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2017 at 04:13 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ressu`
--

-- --------------------------------------------------------

--
-- Table structure for table `albuns`
--

CREATE TABLE IF NOT EXISTS `albuns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `albuns`
--

INSERT INTO `albuns` (`id`, `titulo`, `data`, `created_at`, `updated_at`) VALUES
(1, 'Igreja', '2017-05-18', '2017-05-12 18:11:36', '2017-05-19 11:03:40'),
(2, 'Discipulado de Casais', '2017-05-31', '2017-05-19 11:04:28', '2017-05-19 11:04:28'),
(3, 'Novo album teste', '2017-05-30', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(4, 'Album teste paginação', '2017-05-16', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(5, 'Novo album teste', '2017-05-30', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(6, 'Album teste paginação', '2017-05-16', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(7, 'Novo album teste', '2017-05-30', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(8, 'Album teste paginação', '2017-05-16', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(9, 'Novo album teste', '2017-05-30', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(10, 'Album teste paginação', '2017-05-16', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(11, 'Novo album teste', '2017-05-30', '2017-05-29 03:00:00', '2017-05-29 03:00:00'),
(12, 'Album teste paginação', '2017-05-16', '2017-05-29 03:00:00', '2017-05-29 03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ativsemanais`
--

CREATE TABLE IF NOT EXISTS `ativsemanais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hora` time NOT NULL,
  `atividade` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ativsemanais`
--

INSERT INTO `ativsemanais` (`id`, `dia`, `hora`, `atividade`, `created_at`, `updated_at`) VALUES
(1, '1', '09:00:00', 'Escola Bíblica Dominical', '2017-05-12 18:51:10', '2017-05-22 13:51:20'),
(2, '1', '19:00:00', 'Culto', '2017-05-12 20:18:59', '2017-05-22 13:51:26'),
(4, '3', '19:30:00', 'Reunião das Organizações(MCA, União de Homens, Grupo de Estudo de Adoslescentes', '2017-05-19 12:21:38', '2017-05-22 13:51:36'),
(5, '5', '19:30:00', 'Culto de Oração e Estudo Bíblico', '2017-05-19 12:22:29', '2017-05-22 13:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `avisos`
--

CREATE TABLE IF NOT EXISTS `avisos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `avisos`
--

INSERT INTO `avisos` (`id`, `titulo`, `descricao`, `created_at`, `updated_at`) VALUES
(3, 'No dia 25 de Dezembro', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?', '2017-05-15 17:11:03', '2017-05-18 16:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `titulo`, `foto`, `link`, `created_at`, `updated_at`) VALUES
(8, 'Oração', 'oracao.jpg', '#', '2017-05-12 14:37:14', '2017-06-29 17:14:27'),
(9, 'Bem vindo', 'LogoIBR.png', '#', '2017-05-22 18:53:03', '2017-06-29 17:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `telefone`, `email`, `mensagem`, `created_at`, `updated_at`) VALUES
(1, 'Teste', '(38) 91992-3453', 'teste@gmail.com', 'Nova mensagem', '2017-05-15 14:16:28', '2017-05-15 14:16:28'),
(2, 'Teste', '(38) 91992-3453', 'teste@gmail.com', 'Nova mensagem', '2017-05-15 14:17:33', '2017-05-15 14:17:33'),
(3, 'Teste', '(38) 99191-6532', 'teste@gmail.com.br', 'mensagem de teste no site', '2017-06-07 12:07:24', '2017-06-07 12:07:24'),
(4, 'Novo', '(44) 44444-4444', 'novo@gmail.com', 'nova mensagem', '2017-06-07 18:00:21', '2017-06-07 18:00:21'),
(5, 'Novo', '(44) 44444-4444', 'novo@gmail.com', 'nova mensagem', '2017-06-07 18:02:07', '2017-06-07 18:02:07'),
(6, 'Novo', '(44) 44444-4444', 'novo@gmail.com', 'nova mensagem', '2017-06-07 18:02:42', '2017-06-07 18:02:42'),
(7, 'Novo', '(44) 44444-4444', 'novo@gmail.com', 'nova mensagem', '2017-06-07 18:04:21', '2017-06-07 18:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkmaps` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `enderecos`
--

INSERT INTO `enderecos` (`id`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `email`, `linkmaps`, `created_at`, `updated_at`) VALUES
(1, 'Av Osmane Barbosa', '1639', 'JK', 'Montes Claros', 'MG', '39404-006', '(38) 3015-7583', '(38) 99141-1512', 'ibressurreicao@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3821.6554233289853!2d-43.84539748513316!3d-16.69411778849752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9624555ab930ce4b!2sIgreja+Batista+da+Ressurrei%C3%A7%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1482194281828', '2017-05-12 13:34:04', '2017-05-12 13:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_album` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `fotos_id_album_foreign` (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `titulo`, `foto`, `id_album`, `created_at`, `updated_at`) VALUES
(6, 'Ressurreição', 'LogoIBR.png', 1, '2017-05-19 12:00:59', '2017-05-19 12:00:59'),
(7, 'Oração', 'oracao.jpg', 2, '2017-05-19 12:01:23', '2017-05-19 12:01:23'),
(8, 'Oração', '1oracao.jpg', 1, '2017-05-29 20:09:10', '2017-05-29 20:09:10'),
(9, 'teste', '2oracao.jpg', 1, '2017-06-09 13:22:38', '2017-06-09 13:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `igrejas`
--

CREATE TABLE IF NOT EXISTS `igrejas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `igrejas`
--

INSERT INTO `igrejas` (`id`, `titulo`, `texto`, `created_at`, `updated_at`) VALUES
(1, 'História', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>', '2017-05-15 14:32:02', '2017-05-19 12:23:48'),
(3, 'Doutrina', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>', '2017-05-19 12:24:01', '2017-05-19 12:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `linksuteis`
--

CREATE TABLE IF NOT EXISTS `linksuteis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `linksuteis`
--

INSERT INTO `linksuteis` (`id`, `nome`, `link`, `imagem`, `created_at`, `updated_at`) VALUES
(1, 'Convenção Batista Brasileira', 'http://www.batistas.com/', 'batista.png', '2017-06-08 16:21:03', '2017-06-08 16:21:03'),
(2, 'Junta de MIssões Mundiais', 'http://missoesmundiais.com.br/', 'jm.png', '2017-06-08 16:22:12', '2017-06-08 16:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `audio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mensagens`
--

INSERT INTO `mensagens` (`id`, `titulo`, `descricao`, `data`, `audio`, `created_at`, `updated_at`) VALUES
(1, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 17:02:32', '2017-05-19 12:27:02'),
(2, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(3, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(4, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(5, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(6, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(7, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(8, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(9, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(10, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(11, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(12, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(13, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(14, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02'),
(15, 'Primeira mensagem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.', '2017-05-25', 'pastor_Adilson.mp3', '2017-05-15 20:02:32', '2017-05-19 15:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_08_101248_banners', 1),
('2017_05_08_102329_albuns', 1),
('2017_05_08_102759_fotos', 1),
('2017_05_08_140857_linksuteis', 1),
('2017_05_09_083740_redessociais', 1),
('2017_05_12_091855_pastorais', 2),
('2017_05_12_091900_igrejas', 2),
('2017_05_12_091906_pastores', 2),
('2017_05_12_091911_mensagens', 2),
('2017_05_12_091921_ministerios', 2),
('2017_05_12_091927_contatos', 2),
('2017_05_12_091933_enderecos', 2),
('2017_05_12_091942_avisos', 2),
('2017_05_12_091948_oracoes', 2),
('2017_05_12_092003_ativsemanais', 2),
('2017_05_08_134659_enderecos', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ministerios`
--

CREATE TABLE IF NOT EXISTS `ministerios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `escala` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataescala` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ministerios`
--

INSERT INTO `ministerios` (`id`, `nome`, `descricao`, `escala`, `dataescala`, `created_at`, `updated_at`) VALUES
(1, 'Música', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>', 'Integrante 1,Integrante 2,Integrante 3,Integrante 4', '2017-05-21', '2017-05-19 18:34:13', '2017-05-19 18:34:13'),
(2, 'Infantil', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Sed voluptate nihil eum consectetur similique? \r\nConsectetur, quod, incidunt, harum nisi dolores delectus reprehenderit \r\nvoluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem\r\n ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, \r\naperiam vitae illum voluptatum aut sequi impedit non velit ab ea \r\npariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit \r\ndolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit. Et, consequuntur, modi mollitia corporis \r\nipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in\r\n eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem\r\n ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil\r\n eum consectetur similique? Consectetur, quod, incidunt, harum nisi \r\ndolores delectus reprehenderit voluptatem perferendis dicta dolorem non \r\nblanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum \r\ndolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam \r\nvitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint \r\nquidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem\r\n ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, \r\nmodi mollitia corporis ipsa voluptate corrupti eum ratione ex ea \r\npraesentium quibusdam? Aut, in eum facere corrupti necessitatibus \r\nperspiciatis quis?</p>', '', NULL, '2017-05-26 20:44:11', '2017-06-06 12:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `oracoes`
--

CREATE TABLE IF NOT EXISTS `oracoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `motivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `oracoes`
--

INSERT INTO `oracoes` (`id`, `motivo`, `created_at`, `updated_at`) VALUES
(2, 'Pastor e família', '2017-05-19 11:02:20', '2017-05-19 11:02:20'),
(3, 'Igreja e seus departamentos', '2017-05-19 11:02:29', '2017-05-19 11:02:29'),
(4, 'Missionários e Seminaristas', '2017-05-19 11:02:36', '2017-05-19 11:02:36'),
(5, 'Famílias da Igreja', '2017-05-19 11:02:44', '2017-05-19 11:02:44'),
(6, 'Irmãos ennfermos e desempregados', '2017-05-19 11:02:50', '2017-05-19 11:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('teste@gmail.com', '4a6f8ae141fadf864008f2f0a7304957e22b4beff05baba5d842ae015591b7b0', '2017-06-09 20:08:19'),
('robson.djsilva@gmail.com', '0c087badff356184dc9a3909c74c8539dfa9df1fa997ec5f99c4125566ad4ad1', '2017-06-09 20:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `pastorais`
--

CREATE TABLE IF NOT EXISTS `pastorais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pastorais`
--

INSERT INTO `pastorais` (`id`, `titulo`, `texto`, `created_at`, `updated_at`) VALUES
(3, 'Pense Nisso', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><span style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</span><p style="text-align: justify;"></p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>', '2017-05-18 11:15:28', '2017-05-18 11:15:28'),
(4, 'Pense Nisso', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><span style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</span><p style="text-align: justify;"></p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p><p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>', '2017-05-23 12:52:31', '2017-05-23 12:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `pastores`
--

CREATE TABLE IF NOT EXISTS `pastores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pastores`
--

INSERT INTO `pastores` (`id`, `categoria`, `nome`, `observacao`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Pastor Presidente', 'Adilson Neres de Queiroz', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.', 'LogoIBR.png', '2017-05-19 12:24:50', '2017-06-05 13:19:03'),
(3, 'Pastor Adjunto', 'Alan Queine', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.', '1LogoIBR.png', '2017-05-19 12:25:15', '2017-06-05 13:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `redessociais`
--

CREATE TABLE IF NOT EXISTS `redessociais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `redessociais`
--

INSERT INTO `redessociais` (`id`, `nome`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'teste', '2017-05-12 18:27:46', '2017-05-12 18:27:46'),
(2, 'Twitter', 'Novo', '2017-05-12 18:27:57', '2017-05-12 18:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'teste@gmail.com', '$2y$10$Aej8Xoev2jRpnsiAI2.YXeQTKpBbBFbIWy0CVvZ0nC2UX1CwsO.i.', 'axDboyY514Bz1puGOmFIvaSyP6uxA4fFwLgBl3gTzu1B1rRFnshvD82CPvRm', '2017-05-09 03:00:00', '2017-06-09 20:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `versiculos`
--

CREATE TABLE IF NOT EXISTS `versiculos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `versiculo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `versiculos`
--

INSERT INTO `versiculos` (`id`, `versiculo`, `created_at`, `updated_at`) VALUES
(1, '"Assim que, se alguém está em Cristo, nova criatura é; as coisas velhas já passaram; eis que tudo se fez novo." 2 Coríntios 5.17.', '2017-06-08 13:04:20', '2017-06-08 13:04:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_id_album_foreign` FOREIGN KEY (`id_album`) REFERENCES `albuns` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
