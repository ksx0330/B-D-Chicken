-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 19-05-25 15:09
-- 서버 버전: 5.7.26-0ubuntu0.18.04.1
-- PHP 버전: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `chicken`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `authorities`
--

CREATE TABLE `authorities` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `context` text CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`ID`, `userId`, `title`, `context`, `time`, `hit`) VALUES
(1, 1, '테스트으으으으!!!', '테스트다아아!!!!!아아아아아아!!!', '2019-05-25 05:44:37', 1),
(2, 1, '테스트으으으으0111', '테스트다아아!!!!!아아아아아아!!!', '2019-05-23 09:57:35', 3),
(4, 1, '입력을 해보자아', '얄루', '2019-05-25 05:00:45', 19),
(5, 1, '입력을 해보자아', '얄루ㅁㅁㅁㅁ', '2019-05-24 10:46:12', 4),
(27, 1, 'ㅁㅇㄴㅁㄴㅇ', 'ㅇㄴㅇ', '2019-05-24 10:35:00', 11),
(28, 1, '입력', '완료', '2019-05-24 11:02:06', 6),
(29, 1, 'sfdg', 'sdg', '2019-05-25 03:32:15', 3),
(30, 1, 'w', 'wsz', '2019-05-24 10:55:07', 17),
(31, 1, '얄루우우', '나 잘했지!!', '2019-05-25 03:59:04', 1),
(32, 1, '얄루2', '수정도 되지롱!', '2019-05-25 04:06:53', 1),
(33, 1, 'ㅁㅁㅁㅁㅁㅁ', 'ㅂㅂㅂㅂㅂㅂㅂㅂ', '2019-05-25 04:17:38', 2),
(34, 1, 'ㅂㅈㄷㄱ', 'ㅂㅈㄷㄳ', '2019-05-25 05:08:24', 7),
(35, 1, '수정완료', '끝이였으면..', '2019-05-25 05:44:06', 32);

-- --------------------------------------------------------

--
-- 테이블 구조 `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `price` varchar(40) NOT NULL,
  `context` mediumtext NOT NULL,
  `rec` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `items`
--

INSERT INTO `items` (`ID`, `title`, `price`, `context`, `rec`) VALUES
(1, '네 조각 치킨', '4,000', '간식으로 치킨을 먹고 싶은 당신에게 안☆성☆맞☆춤! 치킨이 비싸 못 사먹던 당신에게 1일 1 치킨을 선물해 드립니다!', 1),
(2, '씨앗 치킨', '16,000', '자연과 함께하는 맛. 치킨 곳곳에 숨어 있는 씨앗과 함께 웰빙의 향수를 느껴보아요.', 1),
(3, '민트 치킨', '0', '민-트-좋-아', 0),
(4, '몰디브 치킨', '15,000', '남국의 바다 내음을 담았다. 바다에서 온 천일염만을 사용해 만든 치킨. 육지와 바다를 한 번에 느껴보아요.', 1),
(5, '선술집 치킨', '20,000', '술 하면 튀김! 감자 튀김을 베이스로 한 술이 땡기는 치킨. 오늘 우리집 안주는 선술집 치킨!', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `items_comment`
--

CREATE TABLE `items_comment` (
  `ID` int(11) NOT NULL,
  `itemsId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `title` varchar(50) NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `item_images`
--

CREATE TABLE `item_images` (
  `ID` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `item_images`
--

INSERT INTO `item_images` (`ID`, `itemId`, `url`) VALUES
(3, 1, './assets/images/foreChicken.png'),
(4, 2, './assets/images/seedChicken.png'),
(5, 3, './assets/images/mintChicken.png'),
(6, 4, './assets/images/moldiv.png'),
(7, 5, './assets/images/sunsul.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `question`
--

CREATE TABLE `question` (
  `ID` int(11) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `sport_site`
--

CREATE TABLE `sport_site` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`userId`, `name`, `email`, `password`) VALUES
(1, '조선주', 'forTest', '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `items_comment`
--
ALTER TABLE `items_comment`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `sport_site`
--
ALTER TABLE `sport_site`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `authorities`
--
ALTER TABLE `authorities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- 테이블의 AUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 테이블의 AUTO_INCREMENT `items_comment`
--
ALTER TABLE `items_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `item_images`
--
ALTER TABLE `item_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 테이블의 AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `sport_site`
--
ALTER TABLE `sport_site`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
