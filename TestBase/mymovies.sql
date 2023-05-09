-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 09 2023 г., 12:52
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mymovies`
--

-- --------------------------------------------------------

--
-- Структура таблицы `career`
--

CREATE TABLE `career` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `career`
--

INSERT INTO `career` (`Id`, `Name`, `Description`) VALUES
(9, 'Режиссер', ''),
(10, 'Актер', 'Исполнитель ролей в театральных и телевизионных постановках, кинофильмах');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`Id`, `Name`, `Description`) VALUES
(9, 'Боевик', ''),
(10, 'Драма', ''),
(11, 'Фэнтези', '');

-- --------------------------------------------------------

--
-- Структура таблицы `movieactors`
--

CREATE TABLE `movieactors` (
  `Id` int(11) NOT NULL,
  `MovieId` int(11) DEFAULT NULL,
  `ActorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `movieactors`
--

INSERT INTO `movieactors` (`Id`, `MovieId`, `ActorId`) VALUES
(7, 16, 14),
(8, 16, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Genre` int(11) DEFAULT NULL,
  `AgeToView` int(11) DEFAULT NULL,
  `YearOfIssue` date DEFAULT NULL,
  `Producer` int(11) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`Id`, `Name`, `Genre`, `AgeToView`, `YearOfIssue`, `Producer`, `Score`, `Description`) VALUES
(16, 'Пираты Карибского моря: Сундук мертвеца (2006)', 9, 12, '2006-02-11', 12, 5, 'Вновь оказавшись в ирреальном мире, лихой капитан Джек Воробей неожиданно узнает, что является должником легендарного капитана «Летучего Голландца» Дэйви Джонса. Джек должен в кратчайшие сроки решить эту проблему, иначе ему грозит вечное проклятие и рабское существование после смерти. '),
(20, 'Игра в имитацию', 10, 16, '2019-06-08', 16, 4, 'Английский математик и логик Алан Тьюринг пытается взломать код немецкой шифровальной машины Enigma во время Второй мировой войны.');

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Career` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`Id`, `FullName`, `FirstName`, `Surname`, `Career`) VALUES
(12, 'Гор Вербински ', 'Гор', 'Вербински ', 9),
(13, 'Джон Форд', 'Джон', 'Форд', 9),
(14, 'Джонни Депп', 'Джонни', 'Депп', 10),
(15, 'Кира Кира', 'Кира', 'Кира', 10),
(16, ' Мортен  Тильдум', ' Мортен ', 'Тильдум', 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `movieactors`
--
ALTER TABLE `movieactors`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MovieId` (`MovieId`),
  ADD KEY `ActorId` (`ActorId`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Genre` (`Genre`),
  ADD KEY `Producer` (`Producer`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Career` (`Career`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `career`
--
ALTER TABLE `career`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `movieactors`
--
ALTER TABLE `movieactors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `movieactors`
--
ALTER TABLE `movieactors`
  ADD CONSTRAINT `movieactors_ibfk_1` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`Id`),
  ADD CONSTRAINT `movieactors_ibfk_2` FOREIGN KEY (`ActorId`) REFERENCES `person` (`Id`);

--
-- Ограничения внешнего ключа таблицы `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`Genre`) REFERENCES `genre` (`Id`),
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`Producer`) REFERENCES `person` (`Id`);

--
-- Ограничения внешнего ключа таблицы `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`Career`) REFERENCES `career` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
