-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 19-06-12 15:36
-- 서버 버전: 5.7.26-0ubuntu0.18.04.1
-- PHP 버전: 7.2.19-0ubuntu0.18.04.1

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

--
-- 테이블의 덤프 데이터 `authorities`
--

INSERT INTO `authorities` (`ID`, `userId`, `role`) VALUES
(1, 1, 'IS_ADMIN'),
(2, 1, 'IS_USER'),
(4, 11, 'IS_USER'),
(6, 11, 'IS_ADMIN'),
(7, 12, 'IS_USER'),
(8, 13, 'IS_USER'),
(9, 14, 'IS_ADMIN'),
(10, 14, 'IS_USER'),
(11, 15, 'IS_USER'),
(12, 16, 'IS_USER'),
(13, 17, 'IS_USER'),
(14, 18, 'IS_USER'),
(15, 19, 'IS_USER'),
(16, 20, 'IS_USER'),
(17, 21, 'IS_USER'),
(18, 22, 'IS_USER'),
(19, 23, 'IS_USER'),
(20, 24, 'IS_USER'),
(21, 25, 'IS_USER');

-- --------------------------------------------------------

--
-- 테이블 구조 `baedal_list`
--

CREATE TABLE `baedal_list` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `itemName` varchar(40) NOT NULL,
  `itemNum` int(11) NOT NULL,
  `peopleName` varchar(40) NOT NULL,
  `addressName` varchar(40) NOT NULL,
  `phone1` varchar(40) NOT NULL,
  `phone2` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `memo` text NOT NULL,
  `usedCupon` varchar(400) NOT NULL,
  `usedPoint` int(11) NOT NULL,
  `price` varchar(40) NOT NULL,
  `orderedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baedal` tinyint(1) NOT NULL,
  `completeTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `baedal_list`
--

INSERT INTO `baedal_list` (`ID`, `userId`, `itemId`, `itemName`, `itemNum`, `peopleName`, `addressName`, `phone1`, `phone2`, `address`, `memo`, `usedCupon`, `usedPoint`, `price`, `orderedTime`, `baedal`, `completeTime`) VALUES
(1, 1, 1, '네 조각 치킨', 1, '조선주', '', '01024395618', '', 'asdasdas', '공짜 최고!!', '[\"2\"]', 2000, '0', '2019-06-02 18:03:20', 1, '2019-06-04 12:34:08'),
(2, 1, 2, '씨앗 치킨', 1, '탱탱탱', '한기대', '01036755868', '', '한기대 생활관 관리동', '배고파요', '[\"1\",\"2\"]', 4000, '9000', '2019-06-03 01:56:01', 1, '2019-06-04 12:34:24'),
(3, 1, 4, '몰디브 치킨', 2, '조선주', '한기대', '01024395618', '01036755868', '한기대 아우내참 앞', '빨리 와와아아아아아!!!', '[\"1\",\"2\"]', 10000, '17000', '2019-06-03 01:58:06', 1, '2019-06-04 12:33:17'),
(4, 1, 5, '선술집 치킨', 1, '나가!', '', '01024395618', '', 'asdasdas', '', '[\"1\",\"2\"]', 2000, '15000', '2019-06-03 02:05:04', 1, '2019-06-04 12:34:21'),
(5, 1, 9, '허니 칠리 치킨', 1, '조선주', '', '01024395618', '', 'asdasdas', '', '[]', 0, '17000', '2019-06-03 09:05:57', 1, '2019-06-04 12:33:15'),
(6, 1, 8, '벚꽃 치킨', 1, '조선주', '', '01024395618', '', 'asdasdas', '', '[]', 2000, '13000', '2019-06-03 09:20:39', 1, '2019-06-04 12:34:27'),
(8, 11, 1, '네 조각 치킨', 1, '이탱', '', '01036755868', '', '아산시 용화동 신도브레뉴 103동 401호', '', '[]', 1000, '3000', '2019-06-03 15:34:07', 1, '2019-06-04 12:22:34'),
(12, 12, 9, '허니 칠리 치킨', 1, '김실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 0, '17000', '2019-06-04 15:19:01', 1, '2019-06-05 10:05:06'),
(13, 12, 6, '그릴 치킨', 1, '김실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 2000, '11000', '2019-06-04 15:22:18', 1, '2019-06-06 03:02:12'),
(14, 12, 4, '몰디브 치킨', 1, '김실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 500, '14500', '2019-06-04 15:22:36', 1, '2019-06-05 12:59:49'),
(15, 11, 9, '허니 칠리 치킨', 1, '이탱', '', '01036755868', '', '아산시 용화동 신도브레뉴 103동 401호', '', '[]', 0, '17000', '2019-06-04 15:58:37', 1, '2019-06-05 10:05:01'),
(16, 16, 16, '간장 치킨', 1, '나는 쿠폰이 필요해', '', '01036755868', '', '쿠폰-좋아', '', '[\"2\"]', 0, '12000', '2019-06-05 05:04:59', 1, '2019-06-06 03:02:14'),
(17, 16, 6, '그릴 치킨', 1, '나는 쿠폰이 필요해', '', '01036755868', '', '쿠폰-좋아', '', '[\"1\"]', 0, '12000', '2019-06-05 05:05:36', 1, '2019-06-06 11:37:44'),
(18, 16, 1, '네 조각 치킨', 1, '나는 쿠폰이 필요해', '', '01036755868', '', '쿠폰-좋아', '', '[]', 240, '3760', '2019-06-05 05:06:03', 1, '2019-06-06 11:37:36'),
(19, 12, 13, '양념 치킨', 1, '최실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 0, '9800', '2019-06-05 06:11:29', 1, '2019-06-06 11:37:47'),
(20, 12, 16, '간장 치킨', 1, '최실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 0, '14000', '2019-06-05 06:11:55', 0, NULL),
(21, 12, 8, '벚꽃 치킨', 50, '최실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 0, '750000', '2019-06-05 06:28:03', 1, '2019-06-06 03:02:39'),
(22, 12, 9, '허니 칠리 치킨', 1, '최실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[\"3\"]', 7943, '4057', '2019-06-05 06:50:53', 1, '2019-06-06 03:02:36'),
(23, 12, 8, '벚꽃 치킨', 1, '최실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[\"1\"]', 0, '14000', '2019-06-05 06:51:38', 1, '2019-06-12 12:29:41'),
(24, 12, 5, '선술집 치킨', 1, '최실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[\"2\"]', 0, '18000', '2019-06-05 06:52:04', 1, '2019-06-06 11:37:21'),
(25, 12, 8, '벚꽃 치킨', 1, '임실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 0, '15000', '2019-06-05 11:12:07', 1, '2019-06-06 11:37:08'),
(26, 12, 5, '선술집 치킨', 4500, '임실험', '', '01045627845', '', '충청남도 천안시 동남구 병천면 충절로 1601', '', '[]', 0, '90000000', '2019-06-05 11:12:30', 0, NULL),
(27, 17, 16, '간장 치킨', 1, 'doge', '', '01022644918', '', '충청남도 천안시 북부 노스랜드 오그리마', 'doge 원하다 맛있는 메뉴 큰 양 당신의 협조에 감사를 표하지', '[\"3\"]', 1000, '8000', '2019-06-06 05:15:58', 1, '2019-06-12 12:29:48'),
(28, 19, 9, '허니 칠리 치킨', 1, 'whoami', '', '01012345678', '', '/var/www/html/B-D-Chicken', '', '[\"3\"]', 1000, '11000', '2019-06-11 12:50:58', 1, '2019-06-12 12:29:49'),
(29, 18, 7, '튼튼 마늘 치킨', 2, '록', '', '01015848491', '', '충청남도 천안 동북구 대아아파트 103동 224호', '', '[\"1\",\"2\",\"3\"]', 0, '22000', '2019-06-12 12:32:07', 0, NULL),
(30, 21, 7, '튼튼 마늘 치킨', 1, '최김박', '', '01014945844', '', '부산광역시 사하구 다대로 140번길 161', '', '[\"1\",\"2\",\"3\"]', 0, '7000', '2019-06-12 12:36:33', 0, NULL),
(31, 21, 2, '씨앗 치킨', 1, '최김박', '', '01014945844', '', '부산광역시 사하구 다대로 140번길 161', '', '[]', 0, '16000', '2019-06-12 12:36:38', 0, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `boardId` int(11) NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`ID`, `userId`, `boardId`, `context`) VALUES
(1, 1, 37, '달린다아아'),
(3, 14, 37, 'ㅁㄴㅇㄹ호ㅓ'),
(4, 15, 39, '안녕 친구야~!'),
(5, 12, 39, '호에엥'),
(6, 12, 39, '호에엥'),
(7, 12, 40, '저랑 이름이 같군요'),
(8, 21, 42, '아 자유게시판 맞나보네요'),
(9, 22, 45, 'ㅗ'),
(10, 18, 48, '요즘은 자동전투 에이전트도 말을하네'),
(11, 18, 45, 'ㅗ'),
(12, 11, 42, '맞아요. 활동 힘내주세요!'),
(13, 18, 50, '살려줘'),
(14, 18, 50, '아아ㅏㅏㅏㅏ아아'),
(15, 18, 54, '그러면 그냥 밥 처먹어'),
(16, 18, 56, '누가 fps 아니랄까봐 쌍권총 들려고하네'),
(17, 18, 56, '학고나 먹으라'),
(18, 18, 57, '그렇게 이번 학기는 멸망했다');

-- --------------------------------------------------------

--
-- 테이블 구조 `cupon`
--

CREATE TABLE `cupon` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `cuponId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `cupon`
--

INSERT INTO `cupon` (`ID`, `userId`, `cuponId`) VALUES
(7, 16, 3),
(14, 12, 1),
(15, 12, 1),
(16, 12, 2),
(17, 12, 3),
(18, 12, 3),
(19, 12, 3),
(20, 16, 1),
(21, 16, 2),
(22, 17, 1),
(23, 17, 2),
(28, 19, 1),
(29, 19, 2),
(31, 20, 1),
(32, 20, 2),
(33, 20, 3),
(37, 22, 1),
(38, 22, 2),
(39, 22, 3),
(40, 23, 1),
(41, 23, 2),
(42, 23, 3),
(43, 24, 1),
(44, 24, 2),
(45, 24, 3),
(46, 25, 1),
(47, 25, 2),
(48, 25, 3);

-- --------------------------------------------------------

--
-- 테이블 구조 `cupon_list`
--

CREATE TABLE `cupon_list` (
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` varchar(40) NOT NULL,
  `context` text NOT NULL,
  `minPrice` varchar(40) NOT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `cupon_list`
--

INSERT INTO `cupon_list` (`ID`, `name`, `price`, `context`, `minPrice`, `startTime`, `endTime`) VALUES
(1, '1,000원 할인권', '1000', '개업 기념 무조건 1,000원 할인 쿠폰', '0', '2019-06-01', '2099-12-31'),
(2, '2,000원 할인권', '2000', '개업 기념 무조건 2,000원 할인 쿠폰', '0', '2019-06-01', '2099-12-31'),
(3, '5,000원 할인권', '5000', '10,000원 이상 구매 시 5,000원 할인!', '10000', '2019-06-01', '2099-12-31');

-- --------------------------------------------------------

--
-- 테이블 구조 `free`
--

CREATE TABLE `free` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `context` text CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `free`
--

INSERT INTO `free` (`ID`, `userId`, `title`, `context`, `time`, `hit`) VALUES
(36, 2, '헤헤헤', '예외 처리 끝!', '2019-05-28 07:38:17', 15),
(37, 1, '아니오', '아닙니다', '2019-05-29 05:21:52', 45),
(38, 1, '사이버 망령이 누구인가요?', '공지사항에 사이버 망령이 있다고 하는데, 해킹 당한건가요?\r\n무서워요;;', '2019-06-03 17:31:24', 16),
(39, 11, '다른 이름 첫 글', '회원가입 첫 글은 이탱이 장식할 것이다!', '2019-06-03 16:02:27', 35),
(40, 14, '자유', '게시판', '2019-06-05 22:17:32', 4),
(41, 12, '와 글이 써진다', '우효옷', '2019-06-06 06:05:25', 22),
(42, 21, '여긴 뭐하는 게시판인가요?', ' 그냥 회원들 맘대로 글 올려도 되는 곳인가요?', '2019-06-12 12:14:00', 8),
(43, 22, '5252 믿고 있었다구~', ' 이런 신생 사이트를 찾아내다니 오레사마 쵸★럭★키 다제~', '2019-06-12 12:19:40', 3),
(44, 17, 'WOW', 'SO MUCH COUPON\r\nSUCH EVENT\r\nWOW\r\nDOGE', '2019-06-12 12:21:00', 5),
(45, 18, '헐 지금 스팀에서 게임 무료선택권 나눔하는중 링크 ㄱㄱㄱㄱㄱ', '블리자드의 앨런 다비리는 아무것도 몰라요 ㅎㅎ', '2019-06-12 12:24:38', 8),
(46, 22, '치킨 시켜야겠다', 'ㅎㅎ 치킨 먹어야징 ^^', '2019-06-12 12:26:27', 4),
(47, 12, '아 시험때문에 휴대폰에 집중이 안돼네;;', '증말 화난다 ㅡ.ㅡ', '2019-06-12 12:28:55', 17),
(48, 23, '교ㅅ순님살려주세요', '실험다 끝낫서요 내보내주세세요 치킨그만ㅁ머고고싶아요', '2019-06-12 12:30:34', 5),
(49, 21, '이번 시즌 한화 계속 이렇게 가면', '라이더', '2019-06-12 12:33:34', 4),
(50, 18, '여러분들 잘들어요', '지금 저 공부안해요.\r\n여러분들도 존나 공부 안해요.\r\n근데 제가 여러분들보다 대부분이 엄청나게 공부안해요.\r\n\r\n학사경고! 학사경고!\r\n학사경고가 왜 제일 멋있는 사람인지 알아요?\r\n끝까지 공부 안했기 때문이에요!\r\n무슨말인지 알죠?\r\n\r\n몰라 씨발 난 좆됐어', '2019-06-12 12:35:31', 9),
(51, 21, '안녕하세요', '안녕하세요. 한국귀술교육대학교 검부터공학부 최김박이라고 합니다. 다름이 아니라 이번 학기 종강을 앞두고 안타까운 사고로 사망해버리신 학점님의 장례식을 열고자 합니다. 저 혼자서는 진행하기 어려운 일이니 여러분의 도움을 청하고자 합니다. 마음이 있으신 분들은 다음 번호로 연락주시길 부탁드립니다 : 010-5221-4949', '2019-06-12 12:38:56', 7),
(52, 12, '친구가 올려달라는 글 대신 전해드립니다', '많은 분들이 반박하시고 아니꼽게 보실 제보입니다만 꼭 하구 싶은 푸념이 있어서 써봅니다. 학교를 왜 다니는지 모르겠는 학우분들이 가끔 계십니다. 수업 시간에 노트북으로 애니메이션을 보고 하스X톤까지 하는 학우분도 봤습니다. 본인 인생이니까 어련히 알아서 하시겠죠. 당연히 제가 감히 신경 쓸 바가 아니고 제 이런 생각은 지나친 오지랖이라는 사실을 압니다. 하지만 비교적 앞자리에 앉아서 뒷사람들한테 다 보이게 노시면 집중하기가 어렵습니다. 저기서 크툰을??? 이런 식으로 말입니다. 이것도 저만 집중을 못 하는 제 문제일 수도 있습니다. 하지만 이런 학우분들이 팀플 조원이 된다면 어떻게 해야할까요. 조 토의 시간에 참여도 안 하시고 참여하신다고 하더라도 몰래 또 하스스톤을 하시면 아무리 그래도 아니꼽게 볼 수가 없게됩니다. 아니 대체 우리 조원은 왜 킬각인데 크툰을 내가지고 역전을 당하고 아니 거기서 왜 크툰을 진짜 왜 아니 이길 수 있는데 그걸 또 킬각을 못보고...', '2019-06-12 12:42:10', 9),
(53, 24, '내 주문에 한 점 후회없다!!!', '평소엔 한 마리도 다 못먹는데 겁나 배고파서 두 마리 시킴 ㅎㅎ', '2019-06-12 12:43:57', 3),
(54, 24, '아 근데 두 마리 다 못먹으면 어떻하지', '그럼 괜히 돈 낭비했다고 어무니가 손찌검하겠지? 아쒸 아버지한테도 맞은 적 없는데!!!', '2019-06-12 12:44:44', 5),
(55, 23, '방금 시험 백지로 낸 학생이 이딴 시험지 수정해주겠다고 찾아옴', '이것이 젊음이구나', '2019-06-12 12:50:57', 5),
(56, 12, '새벽 2시... 사람이 가장 긴 잠에 빠지는 보편적인 시각!', '시험공부를 준비하기 시작한 2시간 전부터 지금까지.\r\n강의자료에 제대로 집중해 본 적이 없다.\r\n\r\n이제 본격적인 시험을 하루 앞 둔 오늘.\r\n바람소리와 스산한 빗소리가 사무실 창밖을 때린다.\r\n\r\n폭풍전야.\r\n\r\n톡방에서 공부를 해야한다던 이들에게 반박글을 달지 않았다.\r\n니들이 허접한지, 내 학점이 허접한지는 결과가 말해줄 것이다.', '2019-06-12 12:55:57', 6),
(57, 18, '학기말에 공학설계를 끝내라 신지.', '까짓거 한번 해보죠!', '2019-06-12 12:59:26', 5),
(58, 12, '시간은 금이라고 친구!', '근데 금으로 시간을 살 수도 시간 쓴다고 돈이 벌리지도 않더라. 역시 고블린들은 믿을 게 못됨', '2019-06-12 13:03:16', 3),
(59, 24, '치킨 도착함', '육질 쫀득쫀득 한 거봐 ㅎㅎㅎ... 오늘 밤 닭다리 다뒤져따ㅋㅋㅋ', '2019-06-12 13:05:55', 4);

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
(1, '네 조각 치킨', '4000', '간식으로 치킨을 먹고 싶은 당신에게 안☆성☆맞☆춤! 치킨이 비싸 못 사먹던 당신에게 1일 1 치킨을 선물해 드립니다!', 1),
(2, '씨앗 치킨', '16000', '자연과 함께하는 맛. 치킨 곳곳에 숨어 있는 씨앗과 함께 웰빙의 향수를 느껴보아요.', 1),
(3, '민트 치킨', '0', '민-트-좋-아', 0),
(4, '몰디브 치킨', '15000', '남국의 바다 내음을 담았다. 바다에서 온 천일염만을 사용해 만든 치킨. 육지와 바다를 한 번에 느껴보아요.', 0),
(5, '선술집 치킨', '20000', '술 하면 튀김! 감자 튀김을 베이스로 한 술이 땡기는 치킨. 오늘 우리집 안주는 선술집 치킨!', 1),
(6, '그릴 치킨', '13000', '바쁜 현대인을 위한 간단하면서도 풍족한 한끼 식사! 뜨거운 오븐에서 갓 꺼내온 당신만을 위한 그릴 치킨!', 1),
(7, '튼튼 마늘 치킨', '15000', '에어프라이기에 직접 구운 튼튼 마늘 치킨! 몸에 좋은 영양만 바짝 구운 뒤 남은, 치킨과 마늘의 환상적인 조화가 여러분의 입 속에 가득!', 1),
(8, '벚꽃 치킨', '15000', '벚꽃의 내음을 가지고 있는 치킨. 체리 블라썸 맛 벚꽃이 사르르... ', 1),
(9, '허니 칠리 치킨', '17000', '달콤? 매콤? 당신의 입맛은 B&D 치킨의 것. 허니 버터와 칠리 소스의 조화를 한 그릇에 담아 새로운 경지의 맛을 느껴보아요.', 1),
(13, '양념 치킨', '9800', '미각을 수놓는 황금색 진미. 너의 입맛은 우리의 양념이 정복하겠다! 어서 지갑을 열거라!', 0),
(14, '후라이드 치킨', '14000', '전통은 위대하다. 세상 어디에서도 맛볼 수 \"있는\" 그 맛을 입속으로~ 슝~', 0),
(16, '간장 치킨', '14000', '이 것은 치킨인가 깐풍기인가 간장으로 볶은 너의 이름은...! ???: 나 간장 치킨이야....', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `items_carousel`
--

CREATE TABLE `items_carousel` (
  `ID` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `items_carousel`
--

INSERT INTO `items_carousel` (`ID`, `itemId`, `img`) VALUES
(1, 8, './assets/images/cherryChicken_lg.png'),
(2, 9, './assets/images/huneyChili_lg.png'),
(3, -1, './assets/images/cuponEvent.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `items_comment`
--

CREATE TABLE `items_comment` (
  `ID` int(11) NOT NULL,
  `itemsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `context` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `items_comment`
--

INSERT INTO `items_comment` (`ID`, `itemsId`, `userId`, `name`, `title`, `context`) VALUES
(1, 2, 1, 'kimpark', 'comment_title_bro', 'comment_context_man\r\nlorem ipsum shala shala babababa omg tons of damage faker what was that blah blah brainpower ahahahahahahah s stands for suka blyat shiki blyki iv damke lolololo'),
(4, 2, 1, 'commentname', 'commenttitle', 'context'),
(5, 2, 1, 'commentname2', 'commenttitle2', 'context2'),
(8, 2, 1, '이탱탱', 'ㅁㄴㅇㄴㅁㅇ', 'ㅁㄴㅇㅁㄴㅇㅁㄴㅇ'),
(10, 2, 1, '조선주', '존맛탱!', '존 맛 이탱이라는 의미'),
(11, 9, 12, '박실험', '', ''),
(12, 9, 12, '박실험', '아', '잘못씀'),
(13, 9, 14, '선주', '나도 댓글', '달고싶다......'),
(14, 9, 12, '임실험', '맛있겠당', '오늘 저녁에 먹어야지'),
(15, 3, 19, 'whoami', '민트', '조-아');

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
(7, 5, './assets/images/sunsul.png'),
(8, 6, './assets/images/grill.png'),
(9, 7, './assets/images/airfry.png'),
(10, 8, './assets/images/cherryChicken.png'),
(11, 9, './assets/images/huneyChili.png'),
(13, 11, './assets/images/ynChicken.png'),
(15, 12, './assets/images/ynChicken.png'),
(18, 13, './assets/images/ynChicken.png'),
(20, 14, './assets/images/huridChicken.png'),
(22, 16, './assets/images/ganzangChicken.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `context` text CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`ID`, `userId`, `title`, `context`, `time`, `hit`) VALUES
(41, 14, '댓글이 안달립니다', '현재 복구중이니 잠시만 기다려 주세요...', '2019-06-04 05:53:40', 15);

-- --------------------------------------------------------

--
-- 테이블 구조 `question`
--

CREATE TABLE `question` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `context` text CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `question`
--

INSERT INTO `question` (`ID`, `userId`, `title`, `context`, `answer`, `time`, `hit`) VALUES
(30, 1, '질문!', '어려우면 어쩌죠?', '몰라요!', '2019-05-28 08:23:52', 29),
(31, 1, '답변있는거!', 'ㅁㄴㅇㄹ', '이야아아ㅏ', '2019-05-28 09:28:54', 9),
(32, 1, 'DNA', '나나낭난', '이건 대답입니다\r\n잘 들어가겠죠?', '2019-05-29 17:20:05', 43),
(33, 1, '사이버 망령을 찾아요!', '너는 누구냐!! \r\n댓글을 달ㅇ라!', '', '2019-06-03 19:51:00', 46),
(34, 14, '왜 댓글이 안달리죠?', '저도 모르겠어요', '지금 수정중에 있습니다.', '2019-06-04 05:52:12', 19),
(35, 14, 'ㅁㄴ', 'ㅇㄹ', NULL, '2019-06-05 22:49:16', 25),
(36, 18, '4시간 동안 8시간 자려면 어떻게 해야하나요?', '시험공부해야하는데', NULL, '2019-06-12 12:57:29', 1),
(37, 12, '수학 문제 좀 풀어주세요', '로지스틱 함수가 모든 상황에서 확률적 함수로 쓰일 수 있다는 걸 증명하라는 데 대충 답 적어서 답변 좀 해주세요. 전 치킨 먹고 있겠음 ㅎ', NULL, '2019-06-12 13:01:58', 4),
(38, 24, '포인트는 ㅓ떤 방식으로 누적되나요', '일단 주문하니까 늘긴 늘던데', NULL, '2019-06-12 13:06:55', 1),
(39, 24, '쿠폰 이벤트 나중에 또 하나요', '많이많이 해주세여', NULL, '2019-06-12 13:07:24', 5),
(40, 12, '55도발 왜하시나요', '에? 에? 왜 하셨냐고요', NULL, '2019-06-12 13:08:00', 3),
(41, 18, '무슨 마약하시길래 이런 생각을 했어요?', '넘나 좋은듯 ㅎㅎ', NULL, '2019-06-12 13:09:16', 3),
(42, 22, '포인트 작은 단위로 쓰고 현금 결제하면 어찌되는지 궁금합ㄴ디ㅏ', '아니면 그냥 포인트 쓰면 현금 결제 안되나요 안해봐서', NULL, '2019-06-12 13:10:32', 2),
(43, 23, '질문 있습니다.', '방금 누가 기침소리를 낸 것같은데 누군가요? 머리에 마구니있음 빨랑 때려잡아야 되는데', NULL, '2019-06-12 13:11:26', 3),
(44, 21, '궁금한 거 있어요!', '친구가 여기서 치킨 시켜주면서 넌지시 \"셋이 하나를 상대한다\"라는데 뭔 뜻인가요? 걍 아무말이나 한 걸까요?', NULL, '2019-06-12 13:12:39', 6),
(45, 25, '여기 사이트', '일자리도 열리고 그러나요? 아님 걍 자체적으로 유지보수도 하고 다 하나여', NULL, '2019-06-12 13:14:47', 3),
(46, 17, '치킨 가격 책정 기준이 궁금합니다.', 'OO치킨 같은 경우는 준내게 맛없는데 비싸고 막 그래요. 이 치킨 안되겠어요 빨리 어떻게든 하지 않으면', NULL, '2019-06-12 13:16:10', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(400) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(40) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`userId`, `name`, `email`, `password`, `tel`, `address`, `point`) VALUES
(1, '조선주', 'forTest', '', '01045627845', '충청남도 천안시 동남구 병천면 충절로 1601', 8100),
(11, '이탱탱', 'ksx0330@naver.com', 'b39fe87b1ceb6abd1905ad3561e84938de17afcddedeb7c3c205221d4b5f0e0f', '01036755868', '충청남도 천안시 동남구 병천면 충절로 1601', 1900),
(12, '김실험', 'testid@naver.com', '5191cb770347dd309b9799e4ffd7fbb27f8f432329ad12812994d407ad39e9e1', '01045627845', '충청남도 천안시 동남구 병천면 충절로 1601', 900511),
(14, '선주세요', '11qq@naver.com', '38c1c976f622af92508f0bc27ae29411994b658402b71208a92885db71179a32', '01045627845', '충청남도 천안시 동남구 병천면 충절로 1601', 1000),
(15, '탱탱탱탱', 'aaaa@naver.com', 'b39fe87b1ceb6abd1905ad3561e84938de17afcddedeb7c3c205221d4b5f0e0f', '01045627845', '충청남도 천안시 동남구 병천면 충절로 1601', 1000),
(16, '나는 쿠폰이 필요해', 'cupon@naver.com', 'b39fe87b1ceb6abd1905ad3561e84938de17afcddedeb7c3c205221d4b5f0e0f', '01036755868', '쿠폰-좋아', 1038),
(17, 'doge', 'doge@gabe.dog', '69be09f67bc08747672220e88404f5b4e94135cf025a79d57e0f1c693d8fcde7', '01022644918', '충청남도 천안시 북부 노스랜드 오그리마', 80),
(18, '록', 'rok@never.com', 'd145d3318752dbbd65b41a54741abf80b1492b64a2779b77e268755814ca2a0b', '01015848491', '충청남도 천안 동북구 대아아파트 103동 224호', 1220),
(19, 'whoami', 'chicken@local.host', '38c1c976f622af92508f0bc27ae29411994b658402b71208a92885db71179a32', '01012345678', '/var/www/html/B-D-Chicken', 110),
(20, '탱탱탱탱', 'abcd@naver.com', 'b39fe87b1ceb6abd1905ad3561e84938de17afcddedeb7c3c205221d4b5f0e0f', '01036755868', '탱~!', 1000),
(21, '최김박', 'choi@kim.park', '398a4e445ddf763586bb152f900c022c6f880b53820fbdc79fb2ae813aa3655a', '01014945844', '부산광역시 사하구 다대로 140번길 161', 1230),
(22, '오대구', 'oi@oi.mit', '706f258dc2218b599dd6b87c88e9190543c92e18abf3b04f1c40bced82e800c6', '01044817293', '대구광역시 중구 태평로 161', 1000),
(23, '랩랫', 'lab@koreatech.ac.kr', 'e0a35d2d6869499a4a03e24daf0324a85029b791da92eae582a5e5298d521101', '01016118846', '충청남도 천안시 동남구 코리아택 랩실 구석탱이', 1000),
(24, '신유미', 'yumi@lol.man', '0dc1ac4ffdb0dc545bc84e1a65edfc27bdf91ec157ca1b86e784d5baa8079a80', '01011848844', '대전광역시 둔산동 신길로 55', 1000),
(25, '함필규', 'rkd@fmd.com', '3d325b88366be5ea0866bcdf7bddef437865d47303db6d6a1c2c0db2b118ce2e', '01069444816', '강릉 37대손 소재지', 1000);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `baedal_list`
--
ALTER TABLE `baedal_list`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `cupon_list`
--
ALTER TABLE `cupon_list`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `free`
--
ALTER TABLE `free`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `items_carousel`
--
ALTER TABLE `items_carousel`
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
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `question`
--
ALTER TABLE `question`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 테이블의 AUTO_INCREMENT `baedal_list`
--
ALTER TABLE `baedal_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 테이블의 AUTO_INCREMENT `cupon`
--
ALTER TABLE `cupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- 테이블의 AUTO_INCREMENT `cupon_list`
--
ALTER TABLE `cupon_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 테이블의 AUTO_INCREMENT `free`
--
ALTER TABLE `free`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- 테이블의 AUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 테이블의 AUTO_INCREMENT `items_carousel`
--
ALTER TABLE `items_carousel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 테이블의 AUTO_INCREMENT `items_comment`
--
ALTER TABLE `items_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 테이블의 AUTO_INCREMENT `item_images`
--
ALTER TABLE `item_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- 테이블의 AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- 테이블의 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
