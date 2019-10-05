-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 02 2019 г., 17:33
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_camagram`
--
CREATE DATABASE IF NOT EXISTS `db_camagram` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_camagram`;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_com` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_com`, `id_user`, `id_profile`, `id_img`, `text`, `date`, `active`) VALUES
(178, 11, 2, 21, 'Great!', '2019-10-01 11:00:00', '0'),
(179, 4, 11, 2, 'Wooooow!', '2019-10-01 15:27:45', '1'),
(180, 4, 4, 38, 'Super!', '2019-10-01 15:28:29', '0'),
(181, 13, 2, 21, 'Cool!', '2019-10-01 15:32:42', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id_like`, `id_user`, `id_img`, `date`, `active`, `id_profile`) VALUES
(387, 11, 8, '2019-10-01 11:00:00', '1', 13),
(388, 11, 35, '2019-10-01 10:00:00', '1', 4),
(390, 11, 37, '2019-10-01 10:00:00', '1', 4),
(391, 11, 33, '2019-10-01 10:00:00', '1', 4),
(392, 11, 34, '2019-10-01 15:26:50', '1', 4),
(393, 11, 7, '2019-10-01 15:26:53', '0', 11),
(395, 11, 24, '2019-10-01 15:27:02', '0', 2),
(396, 4, 2, '2019-10-01 15:27:49', '1', 11),
(397, 4, 3, '2019-10-01 15:27:53', '1', 11),
(398, 4, 15, '2019-10-01 15:27:59', '1', 13),
(400, 4, 13, '2019-10-01 15:28:04', '1', 13),
(401, 4, 23, '2019-10-01 15:28:14', '0', 2),
(402, 4, 22, '2019-10-01 15:28:19', '0', 2),
(403, 4, 5, '2019-10-01 15:28:43', '1', 11),
(405, 13, 13, '2019-10-01 15:32:29', '0', 13),
(406, 13, 26, '2019-10-01 15:33:03', '0', 2),
(407, 13, 36, '2019-10-01 15:33:15', '1', 4),
(408, 13, 22, '2019-10-01 15:33:20', '0', 2),
(409, 13, 25, '2019-10-01 15:33:31', '0', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `picture`
--

CREATE TABLE `picture` (
  `id_img` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `like` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `picture`
--

INSERT INTO `picture` (`id_img`, `id_user`, `img`, `date`, `like`) VALUES
(1, 11, 'https://images.freeimages.com/images/large-previews/56c/salat-tomato-cheese-on-bread-1322759.jpg', '2019-09-07 10:00:00', 1),
(2, 11, 'https://images.freeimages.com/images/large-previews/cf7/fruit-basket-1640523.jpg', '2019-09-24 10:00:00', 2),
(3, 11, 'https://images.freeimages.com/images/large-previews/350/avocados-1640473.jpg', '2019-09-13 10:00:00', 3),
(4, 11, 'https://images.freeimages.com/images/large-previews/c28/chocolate-cheesecake-1-1321098.jpg', '2019-09-08 10:00:00', 0),
(5, 11, 'https://images.freeimages.com/images/large-previews/b69/cheese-plate-1640439.jpg', '2019-09-10 11:00:00', 1),
(6, 11, 'https://images.freeimages.com/images/large-previews/93c/raspberries-1639538.jpg', '2019-09-20 10:00:00', 0),
(7, 11, 'https://images.freeimages.com/images/large-previews/7e6/mediterranean-food-1311330.jpg', '2019-09-04 10:00:00', 0),
(8, 13, 'https://freerangestock.com/sample/6550/beach-vacations-scenes.jpg', '2019-10-01 10:00:00', 0),
(9, 13, 'https://freerangestock.com/sample/888/mountains-and-airplanes.jpg', '2019-09-15 10:00:00', 0),
(13, 13, 'https://freerangestock.com/sample/41585/celebrating-life--a-woman-raises-her-arms-at-sunset-on-a-desert.jpg', '2019-09-05 10:00:00', 2),
(14, 13, 'https://freerangestock.com/sample/18865/houses-of-parliament.jpg', '2019-09-22 10:00:00', 1),
(15, 13, 'https://freerangestock.com/sample/18302/greenwich-village-street-scene.jpg', '2019-09-17 10:00:00', 1),
(21, 2, 'https://freerangestock.com/sample/1431/three-twenties.jpg', '2019-09-23 10:00:00', 0),
(22, 2, 'https://freerangestock.com/sample/61016/analyst-working-on-laptop.jpg', '2019-09-01 10:00:00', 0),
(23, 2, 'https://freerangestock.com/sample/40053/taking-notes.jpg', '2019-09-15 10:00:00', 1),
(24, 2, 'https://freerangestock.com/sample/41171/success-just-ahead-road-sign--life-success-concept.jpg', '2019-09-27 10:00:00', 0),
(25, 2, 'https://freerangestock.com/sample/38663/connectivity-idea-with-lightbulb.jpg', '2019-09-09 10:00:00', 0),
(26, 2, 'https://freerangestock.com/sample/39442/businessman-drawing-a-financial-graph-histogram.jpg', '2019-09-16 10:00:00', 0),
(33, 4, 'https://freerangestock.com/sample/2398/zen-still-life.jpg', '2019-09-03 10:00:00', 0),
(34, 4, 'https://freerangestock.com/sample/1924/photo.jpg', '2019-09-25 10:00:00', 0),
(35, 4, 'https://freerangestock.com/sample/1802/horseshoe-bend-colorado-river.jpg', '2019-09-19 10:00:00', 0),
(36, 4, 'https://freerangestock.com/sample/1721/one-tree-in-a-field-of-lupin.jpg', '2019-09-06 10:00:00', 0),
(37, 4, 'https://freerangestock.com/sample/348/photo.jpg', '2019-09-30 10:00:00', 0),
(38, 4, 'https://freerangestock.com/sample/1693/rudgelines.jpg', '2019-09-18 10:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sticker`
--

CREATE TABLE `sticker` (
  `id_stickers` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img_stickers` varchar(255) DEFAULT NULL,
  `date` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sticker`
--

INSERT INTO `sticker` (`id_stickers`, `name`, `img_stickers`, `date`) VALUES
(1, 'doggy', './public/stickers/doggy.png', '0'),
(2, 'cat', './public/stickers/cat.png', '0'),
(3, 'mustache', './public/stickers/mustache.png', '0'),
(4, '42', './public/stickers/42.png', '0'),
(5, 'day', './public/stickers/Monday.png', '1'),
(6, 'day', './public/stickers/Tuesday.png', '1'),
(7, 'day', './public/stickers/Wednesday.png', '1'),
(8, 'day', './public/stickers/Thursday.png', '1'),
(9, 'day', './public/stickers/Friday.png', '1'),
(10, 'day', './public/stickers/Saturday.png', '1'),
(11, 'day', './public/stickers/Sunday.png', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `pass` varchar(255) NOT NULL,
  `admin` enum('0','1') DEFAULT NULL,
  `profile` varchar(255) NOT NULL DEFAULT './public/icons/profile.png',
  `bio` text DEFAULT NULL,
  `activation_key` varchar(32) NOT NULL,
  `notif_cmt` enum('0','1') NOT NULL DEFAULT '1',
  `notif_like` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
-- business Business12345
-- nature_picture Nature12345
-- food_picture Food12345
-- travel Travel12345
--

INSERT INTO `user` (`id`, `login`, `mail`, `active`, `pass`, `admin`, `profile`, `bio`, `activation_key`, `notif_cmt`, `notif_like`) VALUES
(2, 'business', 'business@mail.com', '1', 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab352021cf2a32657057b766f035346525bc5fc9b32d7348f4fbdf1072395746103876448a92b05907a17768347d13c88f36fcb92247dceeda682a0e6c142d560349', '0', 'https://freerangestock.com/sample/119650/technology-background--digital-hand.jpg', 'Бизнес идеи!', '', '1', '1'),
(4, 'nature_picture', 'nature@mail.com', '1', '4b227777d4dd1fc61c6f884f48641d02b4d121d3fd328cb08b5531fcacdabf8abd16e8d39f83dac68d7da272504b0b4f34e1b8db48a5801743108d3472558318726c10a8705495f699d4ed40a5209015662ffd86a991691e4eab95669655dd55', '0', 'https://freerangestock.com/sample/39975/hand-silhouette-in-heart-shape-with-sunset-in-the-middle-and-oce.jpg', 'What a wonderfull world', '', '1', '1'),
(11, 'food_picture', 'food@mail.com', '1', '4fc82b26aecb47d2868c4efbe3581732a3e7cbcc6c2efb32062c08170a05eeb8d578873302ff6985eb536a582721a69c4351c96b1369543734f49650df9e370beb19c037bcf5a0647c98d3c927aa944ea2917b79054160113085dddebfadedb2', '0', 'https://images.freeimages.com/images/large-previews/cf7/apples-1324784.jpg', 'Food not for living', '', '0', '0'),
(13, 'travel', 'travel@mail.com', '1', '3fdba35f04dc8c462986c992bcf875546257113072a909c162f7e470e581e27846456866a87c67ccd3c6b147c286db2369b66d80f475e2fc2d1897519905fafc7d0d84101e5ce9b0f04ca2112bd8a47c769f379f70f6231e455eda04aa9667a2', '0', 'https://images.unsplash.com/photo-1504609773096-104ff2c73ba4?ixlib=rb-0.3.5&s=509df440981436b4c96e5e2dd42b9977&auto=format&fit=crop&w=1950&q=80', 'Voyage Voyage !', '', '1', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_com`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Индексы таблицы `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_img`);

--
-- Индексы таблицы `sticker`
--
ALTER TABLE `sticker`
  ADD PRIMARY KEY (`id_stickers`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT для таблицы `picture`
--
ALTER TABLE `picture`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `sticker`
--
ALTER TABLE `sticker`
  MODIFY `id_stickers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
