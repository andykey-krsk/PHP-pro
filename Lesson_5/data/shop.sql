-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 25 2020 г., 21:54
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `id` int NOT NULL,
  `product` int NOT NULL,
  `quantyti` int NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `product`, `quantyti`, `price`, `session`) VALUES
(3, 2, 1, '55', 'sbft1l1u336m60slu52mdt7kft5so401'),
(5, 2, 1, '55', 'sbft1l1u336m60slu52mdt7kft5so401'),
(7, 2, 1, '55', 'sbft1l1u336m60slu52mdt7kft5so401'),
(9, 20, 1, '1', 'sbft1l1u336m60slu52mdt7kft5so401'),
(10, 2, 1, '55', 'sbft1l1u336m60slu52mdt7kft5so401'),
(11, 3, 1, '100', 'sbft1l1u336m60slu52mdt7kft5so401'),
(12, 20, 1, '1', 'sbft1l1u336m60slu52mdt7kft5so401'),
(13, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(14, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(15, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(16, 3, 1, '100', 'sbft1l1u336m60slu52mdt7kft5so401'),
(17, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(19, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(20, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(21, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(22, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(23, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(24, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(25, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(28, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(29, 1, 1, '22', 'sbft1l1u336m60slu52mdt7kft5so401'),
(30, 1, 1, ' 22 ', 'sbft1l1u336m60slu52mdt7kft5so401'),
(31, 20, 1, ' 1 ', 'sbft1l1u336m60slu52mdt7kft5so401');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(2, 'Jonh', 'It\'s good'),
(4, 'Андрей', 'Заработало');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Чай', 'Цейлонский', 22),
(2, 'Пицца', 'Пепперони', 55),
(3, 'Одежда', 'Брендовая', 100),
(20, 'Одежда', 'Секонд хенд', 1),
(21, 'Одежда', 'Брендовая', 2),
(22, 'Одежда', 'Брендовая', 200),
(23, 'Одежда', 'Брендовая', 200),
(24, 'Одежда', 'Брендовая', 200),
(25, 'Одежда', 'Брендовая', 200),
(26, 'Одежда', 'Брендовая', 200),
(27, 'Одежда', 'Брендовая', 200),
(28, 'Одежда', 'Брендовая', 200),
(29, 'Одежда', 'Брендовая', 200),
(30, 'Одежда', 'Брендовая', 200),
(31, 'Одежда', 'Брендовая', 200),
(32, 'Одежда', 'Брендовая', 200),
(33, 'Одежда', 'Брендовая', 200),
(34, 'Одежда', 'Брендовая', 200),
(35, 'Одежда', 'Брендовая', 200);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
