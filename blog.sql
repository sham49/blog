-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 29 2024 г., 21:05
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `post_id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `content`) VALUES
(13, 21, '123'),
(14, 23, '123'),
(15, 23, 'amaizing'),
(17, 37, 'gfdgfdgdf');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `short_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `full_content` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `short_content`, `full_content`) VALUES
(21, 'Dolores dolorem sint', 'Dicta possimus arch', 'Quo sit sed et esse', 'Minima minim minima '),
(23, 'Omnis dignissimos fu', 'Sint in tempor volu', 'Rem officia nihil te', 'Voluptatum non at vo'),
(25, 'Eum autem voluptatem222', 'Distinctio Similiqu', 'Alias anim debitis e', 'Qui autem fuga Dolo'),
(26, 'Velit voluptatem sim', 'Est reprehenderit q', 'Corrupti eum molest', 'Officiis velit error'),
(27, 'Eiusmod consequuntur', 'Est in lorem qui ve', 'Odit id eveniet par', 'Ea omnis animi et f'),
(28, 'Omnis rem fuga Recu', 'Ea quis fuga Repreh', 'Eveniet autem est i', 'Consectetur minus i'),
(29, 'In sed duis est nos', 'Eius architecto aper', 'Ut quo delectus duc', 'Id sed sed eos inci'),
(30, 'Velit iusto quas des', 'Aliquam reprehenderi', 'Nesciunt numquam re', 'Tempor blanditiis au'),
(31, 'Totam velit sed ali', 'Eiusmod omnis duis o', 'Sit dignissimos mod', 'Consectetur sint et'),
(32, 'Rerum minus et omnis', 'Eius voluptatem vero', 'Rem mollitia invento', 'Odio ut impedit a e'),
(33, 'Doloremque quae modi', 'Et ut dignissimos in', 'Sunt voluptates non ', 'Excepteur proident '),
(34, 'Minus inventore in s', 'Aliquam voluptas qui', 'Dolores mollitia cup', 'Illo voluptas adipis'),
(35, 'In nostrud quibusdam', 'Doloribus duis eius ', 'Aut iste repellendus', 'Molestiae aperiam re'),
(36, 'Dolorem voluptas ea ', 'Quo nulla proident ', 'Pariatur Et autem o', 'Officia est suscipi'),
(37, 'Alias occaecat nihil', 'Laborum qui et labor', 'Dolore natus amet c', 'Quia expedita repreh');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD UNIQUE KEY `id` (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
