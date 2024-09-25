-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 08:53:46
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
-- Base de datos: `pixel-plaza-db`
--
CREATE DATABASE IF NOT EXISTS `pixel-plaza-db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pixel-plaza-db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(1, 'reprehenderit', 'Minima sed sit rerum exercitationem debitis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(2, 'sit', 'Non totam et fugiat quaerat sequi dolore.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(3, 'nostrum', 'Non assumenda atque accusantium animi.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(4, 'nisi', 'Amet et assumenda et blanditiis voluptas et aperiam.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(5, 'quia', 'Velit blanditiis omnis perferendis qui.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `custom_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `custom_user_id`, `created_at`, `updated_at`) VALUES(1, 'Gorczany-Rosenbaum', '9219 Kunze Locks\nPort Sedrick, IL 88725-6097', 1, '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `companies` (`id`, `name`, `address`, `custom_user_id`, `created_at`, `updated_at`) VALUES(2, 'Langosh-Stoltenberg', '2095 Botsford Mount Apt. 185\nSouth Ashlynnville, DC 84528', 1, '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `companies` (`id`, `name`, `address`, `custom_user_id`, `created_at`, `updated_at`) VALUES(3, 'Braun Inc', '41154 Kuvalis Pine\nEmmetbury, VT 09425-3097', 10, '2024-09-25 08:31:49', '2024-09-25 08:31:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custom_users`
--

DROP TABLE IF EXISTS `custom_users`;
CREATE TABLE `custom_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `custom_users`
--

INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(1, 'margarete.kuhic', 'lesch.mario@example.com', '$2y$12$rMQIQqwIPsniZnbsKscpMeWf9kPzpXtIyleB4.qgVKHi4/hkWR4hO', 0, '2024-09-25 08:31:46', '2024-09-25 08:31:46');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(2, 'elisha34', 'haley.lolita@example.org', '$2y$12$DpYGiF5FdEJKoItAFQabOeBqROU5cJ6nF9KwCD8MPuM8XMHWEOzBe', 0, '2024-09-25 08:31:46', '2024-09-25 08:31:46');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(3, 'julie.fahey', 'lstokes@example.org', '$2y$12$ZvNO30tFTA.RYwqMSv8e9O5ZORigN/m55v5ZkCXJ/PZcNZyagLha6', 0, '2024-09-25 08:31:47', '2024-09-25 08:31:47');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(4, 'davis.summer', 'langworth.deontae@example.net', '$2y$12$7/1hrhGroL0cCGSkM6.IzesNLFlpADfyJufi6vPjtHI3niueu.kMi', 0, '2024-09-25 08:31:47', '2024-09-25 08:31:47');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(5, 'hackett.yessenia', 'gwendolyn.hartmann@example.org', '$2y$12$pmyUyLvXR2J7hILpNmsoneaVl7YymJiHxnM/PfpanBkzp9SHcSgMG', 0, '2024-09-25 08:31:47', '2024-09-25 08:31:47');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(6, 'adrienne96', 'carolina.kirlin@example.org', '$2y$12$L296d5efRmFT9t7z5pZnEukVzpYZs83MO//C746InGUg.qT0.0cyi', 1, '2024-09-25 08:31:48', '2024-09-25 08:31:48');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(7, 'madisen.metz', 'emmerich.forest@example.org', '$2y$12$nR/g2uJMiDJC99ev4HY5R.aXU26UOgb9t12TzvbSVJxoN870hVNK6', 1, '2024-09-25 08:31:48', '2024-09-25 08:31:48');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(8, 'memard', 'alberta29@example.com', '$2y$12$0MOq3o0HvDj9ZqNAdQ6exObcyGaOCJCeSEZcx0LvXdYMhfuhlbQ9.', 0, '2024-09-25 08:31:48', '2024-09-25 08:31:48');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(9, 'crooks.breanne', 'mae42@example.com', '$2y$12$BISODob9eSrjllAH2Ca3c.yBDBoTvMqf7fSyJuFyZV3RG2yN.hx.e', 0, '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(10, 'kilback.may', 'allison67@example.net', '$2y$12$bTz4VQEUqUbSUd3uVLCMpeaHSt5IkXljTdTPiouz0YpLyeW84kXDC', 0, '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `custom_users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES(11, 'Esteban Vergara Giraldo', 'teteban0917@gmail.com', '$2y$12$j2nq7CYltvoVXEKs7/nwxeNi7tvMcfnlIyaLd44hpiZJLHDBXfGSy', 1, '2024-09-25 08:35:14', '2024-09-25 08:35:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `reviewsSum` decimal(8,2) NOT NULL DEFAULT 0.00,
  `reviewsCount` int(11) NOT NULL DEFAULT 0,
  `balance` text DEFAULT NULL,
  `balanceDate` timestamp NULL DEFAULT NULL,
  `balanceReviewsCount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(1, 'Aut ex aut nihil.', 'https://via.placeholder.com/640x480.png/00aa66?text=dolorum', 34.27, 'Incidunt qui esse porro non.', 16.00, 6, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(2, 'Consequuntur id nostrum aspernatur.', 'https://via.placeholder.com/640x480.png/002277?text=veritatis', 98.95, 'Praesentium doloribus minima quas inventore mollitia voluptatem.', 31.00, 10, '<strong>Summary of Game Feedback for &quot;Consequuntur id nostrum aspernatur&quot; (Rating: 3.1)</strong><br><br><strong>Positive Comments:</strong><br><br>* Cool exploration system<br>* Rare characters<br><br><strong>Negative Comments:</strong><br><br>* Generic and repetitive content<br>* Lack of gameplay depth<br>* Poorly optimized<br>* Unintuitive controls<br>* Missing features and content', '2024-09-25 08:47:05', 10, '2024-09-25 08:31:49', '2024-09-25 08:47:05', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(3, 'Unde esse commodi.', 'https://via.placeholder.com/640x480.png/00cc33?text=et', 28.50, 'Ipsum et delectus repellat et mollitia quaerat.', 3.00, 1, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 1);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(4, 'Et unde quaerat ut.', 'https://via.placeholder.com/640x480.png/00aa77?text=consectetur', 43.57, 'Consectetur et unde occaecati voluptate placeat error sed.', 11.00, 4, '<strong>Summary of Reviews (Rating: 2.8)</strong><br><br><strong>Positive Reviews:</strong><br><br>* Praises the game&#039;s unique and engaging gameplay.<br>* Appreciates its accessible design, making it enjoyable for a wide range of players.<br>* Commends its stunning visuals and immersive atmosphere.<br><br><strong>Negative Reviews:</strong><br><br>* Criticizes the game&#039;s repetitive nature and lack of variety in the content.<br>* Complains about frequent technical issues and bugs that hinder gameplay.<br>* Expresses disappointment with the game&#039;s short campaign and limited replayability.', '2024-09-25 08:57:42', 4, '2024-09-25 08:31:49', '2024-09-25 08:57:42', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(5, 'Tempora officiis eligendi.', 'https://via.placeholder.com/640x480.png/0099ee?text=reprehenderit', 39.78, 'Minus qui unde possimus vero rerum officiis.', 15.00, 6, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(6, 'Aliquam doloremque in sit.', 'https://via.placeholder.com/640x480.png/00bb00?text=quasi', 20.97, 'Ratione blanditiis minus perferendis officia beatae.', 18.00, 7, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(7, 'Aut voluptatem dolores reprehenderit.', 'https://via.placeholder.com/640x480.png/005544?text=enim', 45.05, 'Aliquid eveniet voluptatem dolorum odio.', 5.00, 2, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 2);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(8, 'Dolor voluptatum blanditiis sed.', 'https://via.placeholder.com/640x480.png/00ccdd?text=ducimus', 68.35, 'Consequatur perferendis omnis possimus et quaerat explicabo.', 15.00, 4, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(9, 'Voluptatem expedita quasi.', 'https://via.placeholder.com/640x480.png/001122?text=qui', 27.96, 'Itaque quae impedit modi ipsa sint nihil.', 7.00, 3, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(10, 'Ipsam quasi sapiente.', 'https://via.placeholder.com/640x480.png/000066?text=eaque', 97.38, 'Voluptatem eveniet sunt occaecati.', 3.00, 2, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 2);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(11, 'Repellendus velit laborum.', 'https://via.placeholder.com/640x480.png/009988?text=ex', 66.29, 'Similique quia ea ratione molestiae.', 10.00, 3, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 2);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(12, 'Minus quia rerum ut.', 'https://via.placeholder.com/640x480.png/0088cc?text=laboriosam', 87.31, 'Quisquam qui neque autem in.', 15.00, 5, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 2);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(13, 'Et rem iusto.', 'https://via.placeholder.com/640x480.png/00dd77?text=consequatur', 37.06, 'Est sed ut minima.', 3.00, 1, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 1);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(14, 'Occaecati qui repudiandae.', 'https://via.placeholder.com/640x480.png/0044cc?text=nihil', 98.68, 'Molestiae et quam esse blanditiis et molestiae.', 17.00, 6, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 2);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(15, 'Et accusamus error.', 'https://via.placeholder.com/640x480.png/005533?text=distinctio', 68.81, 'Soluta recusandae saepe molestiae dolores quo consequatur voluptas.', 23.00, 6, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(16, 'Incidunt officia animi aut.', 'https://via.placeholder.com/640x480.png/008855?text=itaque', 62.20, 'Fugit a qui illum et temporibus rem qui.', 16.00, 5, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(17, 'Qui nihil dolor aut debitis.', 'https://via.placeholder.com/640x480.png/00eedd?text=exercitationem', 37.69, 'Eum voluptatem non enim reprehenderit.', 14.00, 6, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 1);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(18, 'Eum sint pariatur quo.', 'https://via.placeholder.com/640x480.png/00dd00?text=facere', 1.97, 'Harum soluta et voluptates quae delectus.', 12.00, 3, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 1);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(19, 'Culpa sint et perferendis id.', 'https://via.placeholder.com/640x480.png/0077dd?text=sit', 25.68, 'Consequatur deleniti excepturi nostrum sunt vitae et libero.', 2.00, 1, NULL, NULL, 0, '2024-09-25 08:31:49', '2024-09-25 08:31:50', 3);
INSERT INTO `games` (`id`, `name`, `image`, `price`, `description`, `reviewsSum`, `reviewsCount`, `balance`, `balanceDate`, `balanceReviewsCount`, `created_at`, `updated_at`, `company_id`) VALUES(20, 'Dolor eum aspernatur accusamus velit.', 'https://via.placeholder.com/640x480.png/0055bb?text=vel', 76.30, 'Voluptas placeat eligendi eius eaque porro.', 11.00, 3, '<strong>Summary of Feedback for Dolor eum aspernatur accusamus velit</strong><br><br>Despite an average rating of 3.7, feedback for this game is highly polarized.<br><br><strong>Positive Comments:</strong><br><br>* Praised for its enjoyable gameplay with friends<br>* Appreciated for its captivating and immersive experience<br>* Noted for its challenging and engaging gameplay<br><br><strong>Negative Comments:</strong><br><br>* Criticized for its repetitive and uninspired gameplay<br>* Faulted for its lack of originality and innovation<br>* Disapproved for its technical bugs and performance issues', '2024-09-25 08:58:32', 3, '2024-09-25 08:31:49', '2024-09-25 08:58:32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game_category`
--

DROP TABLE IF EXISTS `game_category`;
CREATE TABLE `game_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `game_category`
--

INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(1, 1, 1, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(2, 2, 1, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(3, 2, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(4, 2, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(5, 3, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(6, 3, 3, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(7, 3, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(8, 4, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(9, 4, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(10, 5, 3, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(11, 6, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(12, 7, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(13, 7, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(14, 7, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(15, 8, 1, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(16, 8, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(17, 8, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(18, 9, 1, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(19, 9, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(20, 9, 3, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(21, 10, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(22, 11, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(23, 11, 3, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(24, 12, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(25, 12, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(26, 13, 1, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(27, 13, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(28, 13, 3, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(29, 14, 1, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(30, 14, 3, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(31, 15, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(32, 16, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(33, 16, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(34, 17, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(35, 18, 5, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(36, 19, 1, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(37, 19, 2, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(38, 19, 4, NULL, NULL);
INSERT INTO `game_category` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES(39, 20, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(1, 5, 10, 7, 66.24, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(2, 2, 18, 7, 11.56, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(3, 7, 5, 2, 98.22, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(4, 4, 8, 9, 80.73, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(5, 10, 4, 2, 3.21, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(6, 3, 19, 8, 83.38, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(7, 9, 14, 5, 72.87, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(8, 3, 19, 5, 51.36, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(9, 5, 12, 8, 54.00, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(10, 8, 7, 9, 85.11, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(11, 2, 11, 4, 72.39, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(12, 10, 13, 2, 46.77, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(13, 10, 12, 4, 87.37, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(14, 4, 19, 1, 18.94, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(15, 7, 14, 9, 98.73, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(16, 3, 12, 6, 68.41, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(17, 10, 4, 8, 83.87, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(18, 7, 17, 1, 7.17, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(19, 7, 19, 4, 76.53, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(20, 10, 5, 3, 93.90, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(21, 10, 9, 5, 41.71, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(22, 3, 16, 3, 68.76, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(23, 9, 13, 4, 98.98, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(24, 4, 19, 3, 82.80, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(25, 9, 15, 6, 86.71, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(26, 6, 16, 4, 71.51, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(27, 1, 2, 10, 50.28, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(28, 8, 7, 8, 18.70, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(29, 3, 12, 7, 3.48, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `items` (`id`, `order_id`, `game_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES(30, 4, 3, 7, 84.56, '2024-09-25 08:31:50', '2024-09-25 08:31:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(112, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(113, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(114, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(115, '2024_08_24_230902_create_reviews_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(116, '2024_08_25_230552_create_categories_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(117, '2024_08_28_011013_create_custom_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(118, '2024_09_17_005059_create_minimal_games_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(119, '2024_09_17_033608_create_company_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(120, '2024_09_17_043209_add_company_to_games_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(121, '2024_09_23_230730_add_is_admin_to_custom_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(122, '2024_09_24_042046_add_custom_user_id_and_game_id_to_reviews_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(123, '2024_09_24_172303_create_orders_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES(124, '2024_09_24_172505_create_items_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `custom_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(1, 50.28, 9, '2024-09-25 08:31:50', '2024-09-25 08:31:51');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(2, 83.95, 9, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(3, 275.39, 3, '2024-09-25 08:31:50', '2024-09-25 08:31:51');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(4, 267.03, 9, '2024-09-25 08:31:50', '2024-09-25 08:31:51');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(5, 120.24, 4, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(6, 71.51, 6, '2024-09-25 08:31:50', '2024-09-25 08:31:51');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(7, 280.65, 2, '2024-09-25 08:31:50', '2024-09-25 08:31:50');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(8, 103.81, 2, '2024-09-25 08:31:50', '2024-09-25 08:31:51');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(9, 258.56, 4, '2024-09-25 08:31:50', '2024-09-25 08:31:51');
INSERT INTO `orders` (`id`, `total_price`, `custom_user_id`, `created_at`, `updated_at`) VALUES(10, 356.83, 1, '2024-09-25 08:31:50', '2024-09-25 08:31:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_user_id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(1, 7, 2, 1, 'Ad quasi ut tenetur impedit sint. Aspernatur deleniti vel dolor magni dignissimos voluptatem. Dignissimos delectus enim ut inventore quia et. Beatae ipsam itaque vel modi eligendi quasi.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(2, 2, 6, 4, 'Sed sit voluptas et neque atque. Reprehenderit corporis corrupti dicta corrupti numquam. Facilis ut autem sint commodi animi accusamus. Quam eligendi sapiente est expedita est ea.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(3, 6, 15, 4, 'Soluta ut autem ratione dicta quo eligendi harum. Voluptatem exercitationem libero voluptatem assumenda quas aliquam ex iste. Quia laborum quia et est adipisci blanditiis tempore. Voluptatem pariatur praesentium voluptatum sunt quas nobis ut rerum.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(4, 6, 17, 1, 'Numquam recusandae consectetur rerum nulla blanditiis quas tempore. Perferendis vel itaque at magnam non. Tempora placeat voluptatem blanditiis blanditiis. Ut consequatur aut et quasi.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(5, 4, 2, 3, 'Et amet occaecati quia ea dolores assumenda sequi. At ut perspiciatis cumque error. Quo at repudiandae aut molestiae molestiae. Ipsam est quo ad impedit.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(6, 8, 17, 1, 'Voluptatum nisi eos qui consequatur exercitationem. Reprehenderit consequatur expedita quam ut sit. Odio nobis dolores enim sequi. Eligendi tempora assumenda pariatur et aperiam similique quibusdam similique.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(7, 8, 14, 2, 'Voluptatem eius tenetur facere pariatur. Voluptates ut consequatur quidem iste laborum. Autem praesentium voluptatibus eligendi nihil harum qui voluptas.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(8, 8, 4, 5, 'Itaque consequatur ex aliquam eum. Perferendis dolores sed laudantium. Aut sunt enim non sapiente animi. Excepturi dolore commodi quae laborum. Saepe vel error inventore aut et dolor.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(9, 8, 20, 1, 'Nobis ipsam omnis tenetur odit. Inventore velit non enim numquam impedit ut. Occaecati consequatur id voluptates animi ut ipsa et excepturi. Voluptates recusandae necessitatibus vel et quia quia.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(10, 7, 12, 3, 'Asperiores saepe officia dolores dicta eius. Odit totam eum sed saepe dolorem deleniti ipsam. Excepturi veniam voluptas qui error incidunt dolor consequuntur. Placeat ut ut fugit provident possimus occaecati expedita. Veniam ut quaerat alias non voluptate odit veritatis explicabo.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(11, 3, 4, 2, 'Qui totam vitae a expedita. Qui culpa quas et nostrum quisquam libero. Temporibus et eveniet eos nihil nesciunt.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(12, 3, 15, 4, 'Id repudiandae suscipit recusandae iure voluptatem. Eius officia dolorum voluptatem quibusdam aut molestiae. Ab quia quaerat iusto quam vero est. Et eligendi rerum et architecto aut architecto et.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(13, 8, 6, 1, 'Ut consequuntur maxime quis quos libero et. Fugiat occaecati earum quisquam recusandae nihil eveniet.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(14, 9, 7, 1, 'Exercitationem impedit omnis et in. Laboriosam qui tenetur tenetur consequatur impedit. Laboriosam omnis tempore reiciendis. Cupiditate tenetur perspiciatis eos laudantium at reiciendis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(15, 5, 16, 3, 'Vel provident optio laborum illum in. Iusto sapiente fugit deserunt pariatur eum id ad. Optio nulla atque ut non ducimus blanditiis sunt sapiente. Eligendi et veniam perspiciatis quis omnis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(16, 10, 18, 5, 'Iste quos ut nihil et distinctio architecto. Et voluptatem est deserunt consequatur et iste. Placeat quia rerum fugit qui.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(17, 1, 18, 3, 'Veniam veniam molestias inventore ad. At voluptatum nihil sint magnam deleniti dolores cumque tenetur.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(18, 8, 12, 5, 'Officiis omnis nobis repudiandae magni. Et sed earum aut quia placeat accusantium soluta. Id non et aliquid.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(19, 8, 10, 2, 'Veniam accusamus aliquam laborum velit ratione dolorem. Fugiat voluptates harum libero nostrum sit. Recusandae expedita laudantium sapiente ipsa voluptatibus ab. Illum aut sunt sed ea laboriosam aperiam.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(20, 4, 7, 4, 'Accusamus autem voluptatem placeat delectus exercitationem quaerat optio dolor. Perspiciatis aperiam quam rem facilis quam qui dicta. Et ea rem esse veniam qui quis in fugiat. Quis ut ut voluptatem officia.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(21, 3, 5, 3, 'Modi voluptatibus et cupiditate repellat nulla. Voluptate illum sed veritatis sed. Non hic ratione dolor asperiores culpa ipsam.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(22, 8, 8, 4, 'Labore quaerat et non voluptatem. Libero dolorum ea id. Distinctio veniam adipisci nobis ea nulla placeat vitae sit.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(23, 3, 2, 3, 'Sit id aut consequatur aut rerum. Laboriosam autem velit sit. Eum consequuntur illo laudantium est.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(24, 6, 14, 4, 'Illum veniam ducimus ducimus accusantium. Eveniet accusamus quia voluptatum est facere adipisci animi. Voluptate sit nemo architecto ullam voluptas.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(25, 7, 17, 4, 'Cumque officiis numquam saepe est adipisci. Doloribus ut non et natus voluptatem. Placeat vel sequi id quo ut quasi voluptatem.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(26, 5, 6, 5, 'Ut eos et cum corrupti ut. Molestias reprehenderit est qui praesentium. Qui cum vero sed expedita tempora accusantium blanditiis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(27, 5, 11, 5, 'Rem vel et est rerum. Nobis ipsa voluptatem molestias assumenda explicabo iste. Pariatur et aspernatur qui qui. Esse debitis non cumque minus sed.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(28, 4, 2, 3, 'Est illum et quis molestiae et sit. Aut quaerat rerum autem quia et minus eaque. Voluptatem iusto ut sapiente minima deserunt omnis. Dolor ipsum accusantium a. Dolorem quis dolor quis veritatis accusamus.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(29, 9, 5, 3, 'Labore voluptate praesentium eaque nobis laudantium. Non impedit voluptas vel dolorem numquam. Rem enim perferendis sunt expedita quisquam. Nobis pariatur natus rerum totam qui suscipit eligendi.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(30, 9, 2, 4, 'Harum qui sit consequuntur magnam quam sit laudantium. Voluptate ipsa enim rem laudantium. Similique iure eum atque quo. Sapiente eligendi officiis officiis molestiae voluptas soluta.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(31, 3, 10, 1, 'Eum reiciendis ipsam quos alias ipsa et tenetur. Quis vel qui vero voluptatem voluptas architecto quis. Natus ab labore accusantium quia consequatur quo et omnis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(32, 8, 5, 3, 'Labore ut est sed ut veritatis voluptatum. Veritatis eum ut recusandae nisi quaerat vel. Delectus sunt excepturi modi fugiat aut neque qui. Tempore animi molestiae quia.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(33, 8, 4, 3, 'Dolore eaque fugiat molestiae sit sit et sapiente. Et ipsam rerum modi est fugit nisi dolores. Adipisci occaecati molestiae in vitae quis vel et. Iste ducimus ut amet maxime.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(34, 9, 1, 2, 'Ipsam consequatur accusantium et rerum. Sunt voluptatem aliquam doloribus et occaecati labore provident quia. Excepturi iusto atque perspiciatis. Quibusdam minima voluptatibus temporibus necessitatibus distinctio sed est. Dolores qui id perspiciatis omnis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(35, 4, 11, 3, 'Maiores suscipit veniam distinctio maxime distinctio quis eum. Molestias libero facere iure necessitatibus sint. Explicabo in accusamus dolor natus dignissimos repudiandae non consequatur.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(36, 6, 11, 2, 'Dignissimos aut illum qui maiores. Quos nesciunt ut et consequatur. Qui aut consequuntur qui voluptates perferendis in reiciendis eos. Culpa molestiae tempore tenetur earum quia.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(37, 9, 4, 1, 'Voluptatibus facilis et in est dolore. Illo ipsam aut omnis voluptatem rerum fuga ut. Aut id velit id consectetur ea. Est corrupti voluptas ut est similique.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(38, 8, 6, 1, 'Qui impedit distinctio itaque. Quia voluptate autem consequuntur. Error eos dolores voluptates labore doloribus voluptates. Tempora similique iure corrupti fuga.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(39, 3, 3, 3, 'Aut mollitia quia exercitationem ex voluptatem recusandae rerum reprehenderit. Magni et eaque excepturi sapiente blanditiis ut.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(40, 4, 5, 1, 'Soluta nisi ducimus beatae eum voluptas repudiandae velit. Ut magni et et. Sit laboriosam totam minus cupiditate ut natus. Ut iste doloremque molestiae et consequatur. Officiis neque distinctio labore.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(41, 3, 8, 5, 'Possimus consequuntur dolorem aut inventore eveniet quas ad exercitationem. Voluptatem sunt a eos aliquid. Qui architecto exercitationem est officiis sit. Rerum velit non labore eligendi ab nulla dolorem.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(42, 2, 14, 2, 'Consequatur ipsa totam reprehenderit provident qui. Ipsam blanditiis quia vel in nobis modi voluptas culpa. Ipsa possimus libero et doloribus libero. Libero placeat temporibus est nulla iste et. Maiores nostrum consequuntur sapiente explicabo error eos dolorem.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(43, 2, 8, 3, 'Beatae accusantium et cumque modi modi dignissimos ea. Nisi tempore voluptatem aliquam dolor vitae sapiente. Eum rerum dolorem ipsam explicabo. Ex omnis unde doloremque eligendi voluptatem sint consequatur.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(44, 7, 9, 2, 'Quaerat voluptatem et perspiciatis aut. Veritatis et qui ipsam harum molestias. Soluta ducimus quia et ut qui.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(45, 6, 9, 3, 'Doloribus et recusandae aut est. Laborum id et atque. Reiciendis debitis doloremque aut voluptas maiores sed.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(46, 8, 14, 3, 'Et et ut eum nisi soluta. Velit nihil id cum accusantium illo. Est quaerat deserunt minima animi qui.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(47, 5, 15, 3, 'Vel voluptatem eum minima possimus tenetur est soluta. Quisquam voluptatem qui eos itaque eius quas. Hic distinctio quis voluptatem. Laborum non molestias numquam perferendis quia aliquid similique debitis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(48, 3, 1, 2, 'Corrupti necessitatibus aliquam quos non ipsa mollitia veniam. Dolore dolores animi laboriosam voluptate eum. Eveniet tenetur debitis aut quisquam minima pariatur rerum.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(49, 8, 14, 3, 'Nisi voluptates et voluptatem praesentium. Voluptatibus maxime et corrupti ducimus. Culpa omnis ut assumenda non pariatur. Incidunt tenetur voluptas architecto necessitatibus harum.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(50, 6, 17, 4, 'Quia aperiam repudiandae amet vel quae. Dolorem voluptatem vitae voluptas veniam voluptatem. Placeat exercitationem sed voluptas et.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(51, 9, 12, 1, 'Illum reprehenderit veniam mollitia quam nam. Qui ex fugiat non molestiae veritatis aliquid et. Quidem quaerat ut doloribus temporibus hic odit est.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(52, 7, 6, 2, 'Ut architecto debitis molestiae eveniet dolores odio. Quos dolorem exercitationem perferendis soluta. Cupiditate odio porro est. Impedit eos ut minus quidem eveniet aut ducimus.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(53, 6, 1, 3, 'Magni perferendis id rem tempore culpa qui quasi. Repudiandae optio iusto omnis quidem. Assumenda fugit quaerat eos. Laudantium est tempora fugiat saepe consequatur consequuntur.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(54, 7, 5, 4, 'Sed facilis consequuntur numquam ipsam ut qui atque est. Praesentium eos enim illum aliquid aut. Temporibus et accusantium commodi non fugiat enim aut. Sequi dignissimos velit beatae quis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(55, 4, 8, 3, 'Error minus amet adipisci aliquid aliquam ullam et. Sunt et laboriosam ab eligendi temporibus. Facilis ut iure libero atque.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(56, 5, 15, 4, 'Voluptatibus quasi doloribus nihil sed voluptas eius est. Quos veniam fuga nam. Dolores quia tempore voluptatem sapiente omnis at perspiciatis.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(57, 6, 1, 2, 'Ut aut porro voluptatum laudantium eos. Sint laboriosam accusamus enim eius eos. Commodi voluptatibus nemo fugit est eveniet eum. Animi harum ut aut qui. Illum velit non veniam sint.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(58, 4, 13, 3, 'Accusamus quisquam libero asperiores aut. Qui labore aliquid blanditiis atque. Quia nihil eaque enim aut quo odit et.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(59, 6, 1, 3, 'Rem facere ratione asperiores quia voluptatum debitis laudantium. Similique sit est dolorem earum qui eos velit.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(60, 7, 12, 3, 'Sunt ut excepturi rerum est commodi. Necessitatibus et omnis qui. Voluptatem tempore praesentium quos porro sed sed aut.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(61, 7, 5, 1, 'Est et quam velit repellat. Qui perspiciatis sunt sint voluptatem nisi saepe sapiente. Voluptas saepe consequuntur minima molestiae saepe quam eligendi. Natus nesciunt odio aliquid et.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(62, 8, 14, 3, 'Totam maiores exercitationem nulla quis modi ipsum dolorem. Molestiae et nemo dolores amet sed. Amet a sed et eaque.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(63, 4, 20, 5, 'Voluptas dicta ratione aut asperiores velit ut. Cupiditate aut nihil ut libero nihil non. Cum consequuntur natus sint exercitationem velit incidunt excepturi quos. Adipisci aut molestiae reprehenderit officia et dicta quod fugiat. Sed consequatur velit suscipit vel ex cupiditate placeat odio.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(64, 6, 16, 2, 'Provident quisquam labore quia atque aliquid veniam ipsam at. Vel et alias omnis rerum. Officiis quo delectus exercitationem aut tempore. Aliquam quibusdam sunt reiciendis facere.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(65, 8, 17, 3, 'Vel voluptatibus ullam qui beatae quod. Tempore est nihil autem quo.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(66, 1, 16, 4, 'Rem velit laborum culpa repellendus aliquid et omnis. Itaque minus eos fugit impedit sint assumenda natus.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(67, 1, 17, 1, 'Quo possimus molestiae unde unde sit voluptas omnis. Autem nobis quisquam est quibusdam provident. Aut id occaecati molestias. Fuga qui eos possimus at esse. Illum deserunt et et placeat aut rem vero.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(68, 9, 6, 3, 'Incidunt voluptatem quo odio beatae officiis. Aut nihil nihil dolorum nemo rerum placeat voluptatem quibusdam. Et velit sunt consectetur dolores sapiente excepturi.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(69, 10, 18, 4, 'Doloribus harum placeat facere quo. Deleniti dolores veritatis sequi quidem et enim vitae sit. Ea vel sapiente praesentium quod. Nesciunt omnis illo quisquam veniam excepturi quia quam. Tenetur consequatur itaque vel fugit esse doloremque unde.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(70, 3, 15, 4, 'Ipsa facere illum quis qui quis velit optio. Officia repellat quos enim quae et molestiae. Quos quia voluptatem placeat voluptas sapiente. Totam nisi et placeat rerum quaerat.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(71, 9, 1, 4, 'Quaerat est nihil sint eius. Sequi dicta laudantium fugit officia asperiores. Ipsa omnis earum qui nihil et. Eaque est rerum sit cumque corrupti.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(72, 1, 6, 2, 'Ducimus totam officia distinctio vitae doloremque. Id ad eaque vero neque sed. Voluptatem ad consequatur quam sapiente.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(73, 2, 12, 3, 'Sed illum et odit ducimus quia similique quis. Aut consequatur harum doloremque molestiae similique aut et omnis. Provident sint sint quos voluptatem. Laudantium consequatur hic aut laudantium illum aut omnis necessitatibus.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(74, 5, 16, 2, 'Autem accusantium possimus eligendi amet aut impedit animi. Ut accusamus quidem dolores et laudantium. Consequuntur eveniet ea ut et soluta iste eos tempore.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(75, 10, 15, 4, 'Autem voluptates aspernatur quia ipsum rerum atque nemo consequuntur. Animi voluptate ut officia ratione est odio. Velit maxime deleniti sapiente animi.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(76, 3, 16, 5, 'Vel expedita commodi totam eum dolor. Aut magnam modi quas nostrum. Ea delectus voluptatibus ex esse delectus quos eos.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(77, 10, 19, 2, 'Aut nesciunt sed explicabo debitis sint impedit quia. Quaerat iste quia aspernatur et animi itaque a provident. Aut et et aut facere autem explicabo quae. Aut autem quidem minus impedit sint sit et.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(78, 9, 9, 2, 'Voluptas delectus placeat iste. Nam consequuntur totam aut praesentium. Tempore qui id quia perspiciatis exercitationem et. Reiciendis sit placeat et consequatur porro eos maxime fugit.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(79, 5, 2, 2, 'Et est voluptatem facilis nobis quibusdam ipsa nihil. Sapiente enim doloremque accusantium impedit voluptate earum maiores. Consequuntur aliquid vero explicabo. Incidunt voluptates nihil corporis quibusdam ad.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(80, 5, 2, 4, 'Fugiat qui saepe adipisci. Voluptas eum perferendis et commodi odit. Vitae autem placeat eligendi doloremque at. Temporibus ullam rerum qui voluptatem et omnis rerum.', '2024-09-25 08:31:49', '2024-09-25 08:31:49');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(81, 11, 2, 5, 'This game is awesome!, please ignore the other commentaries, they are loremipsum-like generated, just drop any balance', '2024-09-25 08:36:03', '2024-09-25 08:36:03');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(82, 11, 2, 5, 'This game has a cool exploration system', '2024-09-25 08:37:08', '2024-09-25 08:37:08');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(83, 11, 2, 1, 'The characters are so rare', '2024-09-25 08:37:19', '2024-09-25 08:37:19');
INSERT INTO `reviews` (`id`, `custom_user_id`, `game_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES(84, 11, 20, 5, 'THIS GAME IS GREAT TO PLAY WITH FRIENDS', '2024-09-25 08:58:26', '2024-09-25 08:58:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES('TkR3ZKhmwvE0LbYxmqoh4VNubwvvSU7eihMWxxBu', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ05DdHlwVU5yT2lGdHFTQUxWb2lhbUFNVHdUSHJoOTBHb1JuT1MzaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6NDoiY2FydCI7YToxOntpOjA7czoxOiI0Ijt9fQ==', 1727237132);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_custom_user_id_foreign` (`custom_user_id`);

--
-- Indices de la tabla `custom_users`
--
ALTER TABLE `custom_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custom_users_email_unique` (`email`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_company_id_foreign` (`company_id`);

--
-- Indices de la tabla `game_category`
--
ALTER TABLE `game_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_category_game_id_foreign` (`game_id`),
  ADD KEY `game_category_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_order_id_foreign` (`order_id`),
  ADD KEY `items_game_id_foreign` (`game_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_custom_user_id_foreign` (`custom_user_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_custom_user_id_foreign` (`custom_user_id`),
  ADD KEY `reviews_game_id_foreign` (`game_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `custom_users`
--
ALTER TABLE `custom_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `game_category`
--
ALTER TABLE `game_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_custom_user_id_foreign` FOREIGN KEY (`custom_user_id`) REFERENCES `custom_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `game_category`
--
ALTER TABLE `game_category`
  ADD CONSTRAINT `game_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_category_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_custom_user_id_foreign` FOREIGN KEY (`custom_user_id`) REFERENCES `custom_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_custom_user_id_foreign` FOREIGN KEY (`custom_user_id`) REFERENCES `custom_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
