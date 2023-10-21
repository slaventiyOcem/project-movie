-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Окт 21 2023 г., 14:22
-- Версия сервера: 5.7.39
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_vyacheslav_khymenko`
--

-- --------------------------------------------------------

--
-- Структура таблицы `directors`
--

CREATE TABLE `directors` (
  `directorId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `directors`
--

INSERT INTO `directors` (`directorId`, `name`) VALUES
(125, 'Джордж Лукас'),
(126, 'Дэвид Финчер'),
(127, 'Стивен Спилберг'),
(132, ' Рассел Кроу');

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `movieId` int(11) NOT NULL,
  `directorId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `releaseDate` date NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`movieId`, `directorId`, `name`, `description`, `releaseDate`, `image_path`) VALUES
(90, 125, 'Звёздные войны: Пробуждение Силы', 'Через тридцать лет после гибели Дарта Вейдера и Императора галактика по-прежнему в опасности. Государственное образование Первый Орден во главе с таинственным верховным лидером Сноуком и его правой рукой Кайло Реном идёт по стопам Империи, пытаясь захватить всю власть. В это нелёгкое время судьба сводит юную девушку Рей и бывшего штурмовика Первого Ордена Финна с героями войны с Империей — Ханом Соло, Чубаккой и генералом Леей. Вместе они должны дать бой Первому Ордену, однако настаёт тот момент, когда становится очевидно, что лишь джедаи могут остановить Сноука и Кайло Рена.', '2015-10-27', '/img/starWarslastdjet.jpg'),
(91, 125, 'Звездные войны: Империя мечты', 'История создания оригинальной трилогии Звездных войн грандиозна и драматична, как и сама сага. Теперь вы можете проследить весь путь - обо всех испытаниях, выпавших на долю Джорджа Лукаса и его команды во время работы над знаменитой сагой.', '2003-05-01', '/img/starWars2.jpg'),
(95, 125, 'Одинокие сердца', '«Одино́кие сердца́» — американский телесериал в жанре подростковой драмы, созданный Джошем Шварцем, первоначально транслировавшийся на канале FOX с 5 августа 2003 по 22 января 2007. Сериал рассказывает о юноше из неблагополучного района, волею судьбы оказавшемся в престижном округе', '2005-09-27', '/img/lonelyHeart.jpg'),
(96, 125, 'Уиллоу', '«Уи́ллоу», «Виллоу» — кинофильм режиссёра Рона Ховарда по сюжету Джорджа Лукаса, тринадцатая полнометражная картина «Lucasfilm». Несмотря на то, что фильм получил две номинации на «Оскар» и пять номинаций на «Сатурн», он собрал не очень хорошую', '2023-10-11', '/img/willow_2.jpg'),
(97, 125, 'Звёздные войны. Эпизод 6', 'В заключительном шестом эпизоде «Звездных войн» Дарт Вейдер создает вторую «Звезду Смерти». Он объединяет все силы зла, чтобы с помощью этого смертоносного оружия нанести последний сокрушительный удар по повстанцам и их союзникам.', '2023-09-30', '/img/starWars.jpg'),
(98, 132, 'Покерфейс', 'Джейк с детства был азартным. Он обожал риск и карточные игры. Вместе со своими лучшими друзьями он часто играл в покер: Дро-покер, Стад, Омаха, Лоуболл и, конечно, Техасский холдем. Его страсть приносила ему не только радость, но он заработал целое состояние, благодаря своему увлечению. Но не всем его друзьям так повезло. Кто-то ударился в политику, занялся написанием книг, а кто-то с трудом сводит концы с концами. Что ж, скоро им всем предстоит вспомнить старые добрые времена.', '2023-10-15', '/img/pokerfeca.webp'),
(99, 127, 'Меню', 'Небольшой океанский остров с некоторых пор стал пользоваться большой популярностью туристов, которые прибывают сюда не ради того, чтобы отдохнуть на великолепных пляжах, а с целью отведать блюда здешнего ресторана. Главный повар этого заведения прослыл настоящим кулинарным гением, кулинарные шедевры которого способны поразить гостей с самым изысканным вкусом. Однако обычным людям вход сюда заказан: здешние цены не всегда по карманам даже самым богатым. Однако очаровательной девушке и её спутнику это условие не стало препятствием. Героем фильма «Меню» хочется побаловать себя приготовленными здесь изысканными блюдами. Находясь в предвкушении получения неслыханного кулинарного удовольствия, молодые люди вдруг понимают, что они неожиданно для себя попали в очень странную ситуации', '2023-10-22', '/img/menju.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES
(13, 'slaventiy_11', 'himenko9595@gmail.com', '$2y$10$M.XLLwvp32AiqZ20hXBf8.bUwoRCUfwz3.kRB8IGX8ajIYIWoGQsC'),
(16, 'admin', 'admin', '$2y$10$XN/bi5gp3JC/Vm4kS8lDiOcKjY4JvNbRmjTq3TRTy7HCE8s9LbeK.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`directorId`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieId`),
  ADD KEY `directorId` (`directorId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `directors`
--
ALTER TABLE `directors`
  MODIFY `directorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`directorId`) REFERENCES `directors` (`directorId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
