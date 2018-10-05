-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 05 2018 г., 14:55
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_8lesson`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(11) NOT NULL,
  `session` text NOT NULL,
  `id_good` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `alt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_basket`, `session`, `id_good`, `col`, `alt`) VALUES
(4, 'pssn19b87mbgl3d28hidih6kd3', 2, 3, 0),
(5, 'pssn19b87mbgl3d28hidih6kd3', 1, 1, 0),
(7, 'en4v36ohki52m12o73eh4j51s7', 2, 1, 0),
(8, '5pkthe4igupi5acjmc9ac080u2', 1, 2, 0),
(9, '5pkthe4igupi5acjmc9ac080u2', 2, 1, 0),
(10, '5pkthe4igupi5acjmc9ac080u2', 3, 1, 0),
(12, 'u3db3f9qj1hnmcg575hmlf1c63', 1, 1, 0),
(13, 'u3db3f9qj1hnmcg575hmlf1c63', 2, 1, 0),
(14, '2brunnsqebqpt9e5409npffhj1', 1, 1, 0),
(15, 'ae372nhacd39q1kugnlf1rs8lj9p77hb', 1, 2, 0),
(16, 'ae372nhacd39q1kugnlf1rs8lj9p77hb', 2, 3, 0),
(17, 'ae372nhacd39q1kugnlf1rs8lj9p77hb', 3, 1, 0),
(18, 'eicnqnrpp19e0cs2eo764rii579u9alb', 1, 1, 0),
(19, '9l5mtde41ivfv3l4rlrr7s03jrrpeimo', 1, 19, 0),
(20, '9l5mtde41ivfv3l4rlrr7s03jrrpeimo', 2, 9, 0),
(21, '9l5mtde41ivfv3l4rlrr7s03jrrpeimo', 3, 20, 0),
(22, 'eug888t77lvrg28lkclv4b72kqiuhm4b', 1, 1, 0),
(23, 'eug888t77lvrg28lkclv4b72kqiuhm4b', 2, 1, 0),
(25, 'qoeqes5221k7n2t913v0gqslm6gf0gl4', 1, 3, 0),
(27, '1rita092p816oc4fcbp1adakfgnvqs73', 1, 52, 0),
(30, 'eupavl0969mcp4fqdj196bnpudhe1ljm', 2, 3, 0),
(31, 'eupavl0969mcp4fqdj196bnpudhe1ljm', 3, 1, 0),
(36, 'ee3cab0mfes9m4v01fj5dm6vpnhgjuf8', 1, 4, 0),
(41, 'ukddldnkbcqa8rqb06rvc6edrsi7685r', 2, 1, 0),
(42, 'ukddldnkbcqa8rqb06rvc6edrsi7685r', 3, 1, 0),
(43, '6h3f5rhegg65tml4thmjpmh54ooguooq', 1, 3, 0),
(44, '6h3f5rhegg65tml4thmjpmh54ooguooq', 2, 1, 0),
(45, '6h3f5rhegg65tml4thmjpmh54ooguooq', 3, 1, 0),
(46, 'uep14qendfcmjs5b29nchh4mko7c4cas', 2, 1, 0),
(47, 'uep14qendfcmjs5b29nchh4mko7c4cas', 3, 1, 0),
(48, 'un5qfk28vr7h49h4q3ep9akgkldigg7s', 3, 1, 0),
(49, 'un5qfk28vr7h49h4q3ep9akgkldigg7s', 1, 1, 0),
(50, 'vci8pvvu7mbbro88g864rujj6u0mop5t', 3, 3, 0),
(56, 'dra63fkvmt45tau4m5796gi6lk53nqie', 2, 1, 0),
(62, '8ucgoeuarls59hcdd6u608otv1678fl2', 1, 1, 0),
(64, 'plk4orvkgf8d98v5htlqdvrkjjoa4s0g', 2, 2, 0),
(65, 'plk4orvkgf8d98v5htlqdvrkjjoa4s0g', 1, 2, 0),
(66, 'plk4orvkgf8d98v5htlqdvrkjjoa4s0g', 3, 2, 0),
(69, 'ettoedmosfqku6qkjh218ke4025dv447', 2, 1, 0),
(73, 'eic3i1rq2r1phdgklgo2kjrkahmva4b9', 1, 1, 0),
(74, 'eic3i1rq2r1phdgklgo2kjrkahmva4b9', 2, 1, 0),
(75, 'eic3i1rq2r1phdgklgo2kjrkahmva4b9', 3, 1, 0),
(76, 'pmvvkvonh9kqaue4uhts9n259al1hsfn', 2, 1, 0),
(77, '9jkuejcqbahgh2q9r2upu90ioul9j0lu', 2, 1, 0),
(78, '9jkuejcqbahgh2q9r2upu90ioul9j0lu', 3, 2, 0),
(79, '2m5iu8b6t5s9a39b264f3ir3lgvsj2e4', 3, 1, 0),
(81, '9086fac5vkf2c4vvrb6aje43n6i96inn', 3, 1, 0),
(82, '491n3cvamobn7nscpv21nkep346mo2jm', 3, 1, 0),
(83, 'gvmr192cla0euj3rsigiaog7jcu5rn63', 3, 1, 0),
(84, '909qdgfl0c4svlrkf89m93ue5k6dsj7r', 3, 1, 0),
(85, '9cp3vnade3hj0lr3tgrov73m1r4g8fd0', 1, 1, 0),
(86, 'vp8g4jiqjda1g87bj03slmuqkko4lf9i', 3, 1, 0),
(87, 'c8qshs91223jrf0gajhkcls5mrlilcsc', 3, 1, 0),
(88, 'hfoe7pf88n8j9f0932ofc65g2ubrjq61', 1, 1, 0),
(89, '40e1kv6lr3pkrgg4eq58duseistqqv69', 2, 1, 0),
(90, '6hf3bqhql6knmiqhf3npptgf85hqegdo', 1, 1, 0),
(91, 'tqcbkqnolg1q4rnnhpai1udueqpgosm8', 2, 1, 0),
(92, 'v9crofl3t1418vcm4qsi6ti9fajb5i5t', 3, 1, 0),
(93, 'fk4pkct26lr46pen22c9ct8bka2jn7s8', 1, 1, 0),
(94, 'ik251qtspdeldthaa11pcnfhh7a85tg6', 3, 1, 0),
(95, 'tcd2d8qftcmbi2dtrm0m8cehimh3gh3g', 2, 1, 0),
(96, 'bem48ggr2v8keve4giteet6sk2k3jf6f', 1, 1, 0),
(97, '0v5d72pncslubukg69oqo2a2v5kf3i7i', 2, 1, 0),
(98, '35migchb634pmiarkh40hms7gkk0i4au', 3, 1, 0),
(100, '2m59fvphs97ufv9955gp8togcltbs5il', 1, 1, 0),
(101, 'kqcg9msa8ivuss305s95u1hn1bh4kbnv', 1, 1, 0),
(106, 'm9niqs1sc7qb94bmp79d5q9kbfp920ds', 1, 2, 0),
(107, '2hmvv6ehni7r0vftseq4h19ret3js7k8', 2, 1, 0),
(108, 'f2befa5pfovb1699159llu91fmic8jfe', 1, 1, 0),
(109, '3ncqfb1a11clmpu2jpvk2s3oa17ot8ok', 1, 2, 0),
(110, '3ncqfb1a11clmpu2jpvk2s3oa17ot8ok', 2, 1, 0),
(111, '3ncqfb1a11clmpu2jpvk2s3oa17ot8ok', 3, 1, 0),
(112, '9u6rb8tadvllm41lan8thkt6q78r2uif', 1, 1, 0),
(120, 'ult81i22qa5p2nndqvb69cba8hfmo582', 2, 3, 0),
(121, '7vfiag0a3clalkbmt9dcbvrdl38b1g36', 2, 2, 0),
(122, 'e9rbmd6iageftq2s67g3k4u96c2ivbo4', 1, 1, 0),
(123, 'p5teg93c50oof6kof6knfr841lb5sk7m', 2, 1, 0),
(124, 'vc8dngr1s8m3vq09t8ccogm72481fvn5', 2, 1, 0),
(125, '85d41ic8c9hvg7g2fdpcl5uf251bj2d5', 3, 1, 0),
(126, '76rjfsnvoqeer9nga9qik3nl1g036b51', 1, 1, 0),
(127, '76rjfsnvoqeer9nga9qik3nl1g036b51', 2, 1, 0),
(129, 'qb9a5gpf6ffub5jktju5hcorb14go9l7', 11, 5, 0),
(131, 'acjnjb50mvond2b8ma1p48g9og0vosrm', 13, 1, 0),
(132, 'fo2718jrdmljb3b68u15n1kv3r7biq6c', 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `discounts`
--

CREATE TABLE `discounts` (
  `id_discount` int(8) NOT NULL,
  `discount_name` text NOT NULL,
  `discount_start` timestamp NOT NULL,
  `discount_finish` timestamp NOT NULL,
  `discount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `discounts`
--

INSERT INTO `discounts` (`id_discount`, `discount_name`, `discount_start`, `discount_finish`, `discount`) VALUES
(1, 'Летняя акция', '2018-07-31 21:00:00', '2018-08-30 21:00:00', 10),
(19, 'Осенняя акция', '2018-08-31 21:00:00', '2018-09-29 21:00:00', 15),
(20, 'Зимняя акция', '2018-12-31 21:00:00', '2019-01-30 21:00:00', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `name_good` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `image_big` text NOT NULL,
  `descript_good` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `name_good`, `price`, `image`, `image_big`, `descript_good`) VALUES
(1, 'Ноутбук Acer', 10000, 'item1.jpg', 'item1-big.jpg', '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'),
(2, 'Ноутбук HP 15-bs516ur 2GF21EA', 20000, 'item2.jpg', 'item2-big.jpg', '222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222'),
(3, 'Ноутбук Lenovo IdeaPad 110-15IBR (80T700С2RK)', 30000, 'item3.jpg', 'item3-big.jpg', '33333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333'),
(4, 'Ноутбук Леново', 40000, 'item4.jpg', 'item4.jpg', '444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444'),
(5, 'Фотообои космические 1', 200, '1.jpg', '1-big.jpg', '11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'),
(6, 'Фотообои космические 2', 200, '2.jpg', '2-big.jpg', '22222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222'),
(7, 'Фотообои космические 3', 300, '3.jpg', '3-big.jpg', '333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333'),
(8, 'Фотообои космические 4', 200, '4.jpg', '4-big.jpg', '444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444'),
(9, 'Фотообои космические 5', 200, '5.jpg', '5-big.jpg', '555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555'),
(19, 'Фотообои космические 6', 300, '6.jpg', '6-big.jpg', '666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666'),
(20, 'Фотообои космические 7', 300, '7.jpg', '7-big.jpg', '77777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777'),
(21, 'Фотообои космические 8', 300, '8.jpg', '8-big.jpg', '888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888'),
(22, 'Фотообои космические 9', 300, '9.jpg', '9-big.jpg', '9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999');

-- --------------------------------------------------------

--
-- Структура таблицы `guestbook`
--

CREATE TABLE `guestbook` (
  `id_record` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `text` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guestbook`
--

INSERT INTO `guestbook` (`id_record`, `name`, `email`, `text`, `data`) VALUES
(1, 'Олег', 'Evebay', 'Все хорошо', '2018-03-22'),
(5, 'Иван', 'evebay@mail.ru', 'Проверка', '2018-03-22'),
(6, 'Петя', 'evebay3@gmail.com', 'Хороший магазин', '2018-03-22'),
(17, 'Anna', 'evebay@mail.ru', '88888', '2018-08-05'),
(19, 'Anna', 'evebay@mail.ru', '999999999', '2018-08-05'),
(20, 'Anna', 'annak2980@gmail.com', 'Хорошие ноутбуки', '2018-09-01');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `idx` int(11) NOT NULL,
  `filename` text NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`idx`, `filename`, `likes`) VALUES
(1, '01.jpg', 47),
(2, '02.jpg', 9),
(3, '03.jpg', 1),
(4, '04.jpg', 6),
(5, '05.jpg', 0),
(6, '06.jpg', 8),
(7, '07.jpg', 9),
(8, '08.jpg', 8),
(9, '09.jpg', 11),
(10, '10.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `prev` text NOT NULL,
  `news_body` text NOT NULL,
  `date_news` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `news_title`, `prev`, `news_body`, `date_news`) VALUES
(1, 'Новость 1', 'Краткая новость 1', 'Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 Полная новость 1 ', '2018-07-31 21:00:00'),
(2, 'Новость 2', 'Краткая новость 2', 'Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 Полная новость 2 ', '2018-08-08 21:00:00'),
(4, '1 сентября', '1 сентября', '1 сентября - день знаний', '2018-09-01 08:16:36'),
(9, '2 сентября', '2 сентября', '2 сентября', '2018-09-02 08:08:14');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `idx` int(11) NOT NULL,
  `session` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `adres` text NOT NULL,
  `date_order` date NOT NULL,
  `user` int(11) NOT NULL,
  `order_sum` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`idx`, `session`, `status`, `name`, `phone`, `adres`, `date_order`, `user`, `order_sum`) VALUES
(25, '2m5iu8b6t5s9a39b264f3ir3lgvsj2e4', 1, 'dyhj', '888', '999', '2018-08-08', 2, '27000.00'),
(26, '9086fac5vkf2c4vvrb6aje43n6i96inn', 1, 'Anna', '888', '77777777777', '2018-08-08', 2, '27000.00'),
(27, '491n3cvamobn7nscpv21nkep346mo2jm', 1, 'Anna', '999', '77777777777', '2018-08-08', 2, '27000.00'),
(28, 'gvmr192cla0euj3rsigiaog7jcu5rn63', 1, 'yjhf', '888', '999', '2018-08-08', 2, '27000.00'),
(29, '909qdgfl0c4svlrkf89m93ue5k6dsj7r', 1, 'yjhf', '12543645', '77777777777', '2018-08-08', 2, '27000.00'),
(31, '909qdgfl0c4svlrkf89m93ue5k6dsj7r', 1, 'Anna', '888', '77777777777', '2018-08-08', 2, '27000.00'),
(33, '9cp3vnade3hj0lr3tgrov73m1r4g8fd0', 1, 'yjhf', '999', '77777777777', '2018-08-08', 2, '9000.00'),
(34, 'vp8g4jiqjda1g87bj03slmuqkko4lf9i', 1, 'dyhj', '999', '77777777777', '2018-08-08', 2, '27000.00'),
(38, '6hf3bqhql6knmiqhf3npptgf85hqegdo', 1, 'Anna', '888', '7', '2018-08-08', 0, '9000.00'),
(39, 'tqcbkqnolg1q4rnnhpai1udueqpgosm8', 2, 'yjhf', '888', '999', '2018-08-08', 0, '18000.00'),
(40, 'v9crofl3t1418vcm4qsi6ti9fajb5i5t', 1, 'Anna', '12543645', '999', '2018-08-08', 0, '27000.00'),
(43, 'tcd2d8qftcmbi2dtrm0m8cehimh3gh3g', 1, 'Anna', '888', '999', '2018-08-08', 0, '18000.00'),
(45, 'p5teg93c50oof6kof6knfr841lb5sk7m', 2, 'Anna', '12543645', '77777777777', '2018-08-28', 0, '18000.00'),
(46, 'acjnjb50mvond2b8ma1p48g9og0vosrm', 1, 'Anna', '12543645', '77777777777', '2018-09-02', 2, '170.00');

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_status` int(8) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id_status`, `status_name`) VALUES
(1, 'Новый'),
(2, 'Обработан'),
(3, 'Удален');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_last_login` timestamp NOT NULL,
  `user_status` int(8) DEFAULT NULL,
  `user_mail` text NOT NULL,
  `user_registr_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_login`, `user_password`, `user_last_login`, `user_status`, `user_mail`, `user_registr_date`) VALUES
(0, 'Не заполнен', '', '', '0000-00-00 00:00:00', NULL, 'Не заполнен', '0000-00-00 00:00:00'),
(1, 'admin', 'admin', '$26WWL4tK/9TE', '2018-10-05 07:25:57', 1, 'annak2980@gmail.com', '2018-09-13 10:24:57'),
(2, 'user', 'user', '$26WWL4tK/9TE', '2018-09-13 10:36:06', 2, 'annak2980@gmail.com', '2018-09-13 10:28:54');

-- --------------------------------------------------------

--
-- Структура таблицы `user_status`
--

CREATE TABLE `user_status` (
  `id_status` int(8) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_status`
--

INSERT INTO `user_status` (`id_status`, `status_name`) VALUES
(1, 'admin'),
(2, 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Индексы таблицы `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id_discount`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`);

--
-- Индексы таблицы `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id_record`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_status` (`user_status`);

--
-- Индексы таблицы `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT для таблицы `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id_discount` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id_record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`status`) REFERENCES `order_status` (`id_status`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`id_status`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
