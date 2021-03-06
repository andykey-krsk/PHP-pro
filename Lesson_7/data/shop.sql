-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 01 2020 г., 18:17
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

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `product` int NOT NULL,
  `quantyti` int NOT NULL DEFAULT '1',
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `product`, `quantyti`, `price`, `session`) VALUES
(53, 1, 1, '22', 'd6jmkelm6kd28ucpe1u9fo0qsjsag8cl'),
(54, 1, 1, '22', 'd6jmkelm6kd28ucpe1u9fo0qsjsag8cl'),
(58, 1, 1, '22', '4u1ijta4v4es0ennos58optuic4uadv7'),
(59, 2, 1, '55', '4u1ijta4v4es0ennos58optuic4uadv7'),
(60, 1, 1, '22', 'pa6hh0blojrispvfs2gd22t77jqh430m'),
(61, 2, 1, '55', 'pa6hh0blojrispvfs2gd22t77jqh430m'),
(62, 20, 1, '1', 'pa6hh0blojrispvfs2gd22t77jqh430m');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

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
(4, 'Андрей', 'Заработало'),
(8, 'ddd', '2323');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

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

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$mQQikjg/YuuFHZQTVoG5dOO4IVDEho1yZ6PsCGBOXGiLngjUJy0RC', '13664756065f25849f436a12.62825769');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
