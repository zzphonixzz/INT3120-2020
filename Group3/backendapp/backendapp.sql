-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for backendapp
CREATE DATABASE IF NOT EXISTS `backendapp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `backendapp`;

-- Dumping structure for table backendapp.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL DEFAULT '',
  `question_id` int(11) NOT NULL DEFAULT 0,
  `is_true` int(2) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.answers: ~9 rows (approximately)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `content`, `question_id`, `is_true`, `created`, `modified`) VALUES
	(1, 'of the', 1, 0, '2020-04-04 08:26:49', '2020-04-04 08:26:49'),
	(2, 'report', 1, 1, '2020-04-04 08:26:49', '2020-04-04 08:26:49'),
	(3, 'his or her name', 1, 0, '2020-04-04 08:26:49', '2020-04-04 08:26:49'),
	(4, 'is called', 1, 0, '2020-04-04 08:26:49', '2020-04-04 08:26:49'),
	(5, 'the', 2, 0, '2020-04-04 08:26:49', '2020-04-04 08:47:18'),
	(6, 'seems to', 2, 1, '2020-04-04 08:26:49', '2020-04-04 08:26:49'),
	(7, 'quite happily', 2, 0, '2020-04-04 08:26:49', '2020-04-04 08:26:49'),
	(8, 'like', 2, 0, '2020-04-04 08:26:49', '2020-04-04 08:47:18'),
	(9, '', 2, 1, '2020-04-04 08:48:05', '2020-04-04 08:48:05'),
	(10, 'a', 3, 0, '2020-04-04 12:07:44', '2020-04-04 12:07:44'),
	(11, 'b', 3, 0, '2020-04-04 12:07:44', '2020-04-04 12:07:44'),
	(12, 'c', 3, 1, '2020-04-04 12:07:44', '2020-04-04 12:07:44'),
	(13, 'd', 3, 0, '2020-04-04 12:07:44', '2020-04-04 12:07:44');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table backendapp.bookmarks
CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) NOT NULL DEFAULT '',
  `item_id` int(11) NOT NULL DEFAULT 0,
  `item_type` int(11) NOT NULL DEFAULT 0,
  `bookmark_type` int(11) NOT NULL DEFAULT 0,
  `time` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.bookmarks: ~0 rows (approximately)
/*!40000 ALTER TABLE `bookmarks` DISABLE KEYS */;
INSERT INTO `bookmarks` (`id`, `client_id`, `item_id`, `item_type`, `bookmark_type`, `time`) VALUES
	(1, 'abcd1234', 1, 2, 1, ''),
	(2, 'abcd1234', 2, 2, 1, '');
/*!40000 ALTER TABLE `bookmarks` ENABLE KEYS */;

-- Dumping structure for table backendapp.done_answers
CREATE TABLE IF NOT EXISTS `done_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) NOT NULL DEFAULT '',
  `exercise_id` int(11) NOT NULL DEFAULT 0,
  `question_id` int(11) NOT NULL DEFAULT 0,
  `answer_id` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.done_answers: ~0 rows (approximately)
/*!40000 ALTER TABLE `done_answers` DISABLE KEYS */;
INSERT INTO `done_answers` (`id`, `client_id`, `exercise_id`, `question_id`, `answer_id`, `created`, `modified`) VALUES
	(1, 'abcd1234', 1, 1, 1, '2020-04-03 00:00:00', '2020-04-03 00:00:00');
/*!40000 ALTER TABLE `done_answers` ENABLE KEYS */;

-- Dumping structure for table backendapp.exercises
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `test_id` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.exercises: ~0 rows (approximately)
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
INSERT INTO `exercises` (`id`, `name`, `description`, `test_id`, `created`, `modified`) VALUES
	(1, 'Incorect Word Test 1', 'Find the Incorrect Word', 1, '2020-04-04 08:26:49', '2020-04-04 12:11:00');
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;

-- Dumping structure for table backendapp.grammars
CREATE TABLE IF NOT EXISTS `grammars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL DEFAULT '',
  `sound` varchar(255) NOT NULL DEFAULT '',
  `meaning` text NOT NULL DEFAULT '',
  `thumbnail` text NOT NULL DEFAULT '',
  `lesson_id` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.grammars: ~0 rows (approximately)
/*!40000 ALTER TABLE `grammars` DISABLE KEYS */;
INSERT INTO `grammars` (`id`, `word`, `sound`, `meaning`, `thumbnail`, `lesson_id`, `created`, `modified`) VALUES
	(1, 'Hotel', '/hou\'tel/', 'dsdadad', '', 4, '2020-03-28 08:24:56', '2020-03-28 08:24:56'),
	(2, 'dasdasd', 'asdasd', 'asdasdasd', 'files/uploads/140279179.jpg', 5, '2020-03-29 10:59:00', '2020-03-29 10:59:00');
/*!40000 ALTER TABLE `grammars` ENABLE KEYS */;

-- Dumping structure for table backendapp.lessons
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.lessons: ~3 rows (approximately)
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` (`id`, `name`, `thumbnail`, `description`, `created`, `modified`) VALUES
	(1, 'adsasd', 'files/uploads/30000002100473446_wh.jpg', '<p>asdads<br></p>', '2020-03-24 09:59:02', '2020-03-24 09:59:02'),
	(2, '', '', 'dấd', '2020-03-28 08:23:09', '2020-03-28 08:23:09'),
	(3, 'dasd', 'files/uploads/che11.jpg', 'bài 1', '2020-03-28 08:24:11', '2020-03-28 08:24:11'),
	(4, 'backendApp', 'files/uploads/Capture.PNG', 'dấd', '2020-03-28 08:24:56', '2020-03-28 08:24:56'),
	(5, 'sadasd', 'files/uploads/aa854fd46ed68a88d3c7.jpg', 'asdasd', '2020-03-29 10:59:00', '2020-03-29 10:59:00');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;

-- Dumping structure for table backendapp.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL DEFAULT '',
  `image` text NOT NULL DEFAULT '',
  `audio` text NOT NULL DEFAULT '',
  `exercise_id` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.questions: ~2 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `content`, `image`, `audio`, `exercise_id`, `created`, `modified`) VALUES
	(1, 'Each of the nurses report to the operating room when his or her name is called', '', '', 1, '2020-04-04 08:26:49', '2020-04-04 12:11:00'),
	(2, 'Species likes snake, lizards, coyotes, squirre, edited', '', '', 1, '2020-04-04 08:26:49', '2020-04-04 12:11:00');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Dumping structure for table backendapp.tests
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `icon` varchar(50) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.tests: ~0 rows (approximately)
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` (`id`, `name`, `description`, `icon`, `created`, `modified`) VALUES
	(1, 'Part 1', 'Photographs', 'logo-instagram', '2020-04-02 09:07:40', '2020-04-02 09:07:40');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;

-- Dumping structure for table backendapp.words
CREATE TABLE IF NOT EXISTS `words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` text NOT NULL DEFAULT '',
  `start_character` varchar(10) NOT NULL DEFAULT '',
  `sound` varchar(255) NOT NULL DEFAULT '',
  `meaning` text NOT NULL DEFAULT '',
  `synonymous` text NOT NULL DEFAULT '',
  `antonymous` text NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table backendapp.words: ~8 rows (approximately)
/*!40000 ALTER TABLE `words` DISABLE KEYS */;
INSERT INTO `words` (`id`, `word`, `thumbnail`, `start_character`, `sound`, `meaning`, `synonymous`, `antonymous`, `created`, `modified`) VALUES
	(1, 'bad', '', '', '/bæd/', '                <ul class="list1"><li><b>xấu, tồi, dở</b><ul class="list2"><li><span class="example-original">bad weather</span><br> thời tiết xấu</li></ul></li></ul><ul class="list1"><li><b>ác, bất lương, xấu</b><ul class="list2"><li><span class="example-original">bad man</span><br> người ác, người xấu</li></ul><ul class="list2"><li><span class="example-original">bad blood</span><br> ác cảm</li></ul><ul class="list2"><li><span class="example-original">bad action</span><br> hành động ác, hành động bất lương</li></ul></li></ul><ul class="list1"><li><b>có hại cho, nguy hiểm cho</b><ul class="list2"><li><span class="example-original">be bad for health</span><br> có hại cho sức khoẻ</li></ul></li></ul><ul class="list1"><li><b>nặng, trầm trọng</b><ul class="list2"><li><span class="example-original">to have a bad cold</span><br> bị cảm nặng</li></ul><ul class="list2"><li><span class="example-original">bad blunder</span><br> sai lầm trầm trọng</li></ul></li></ul><ul class="list1"><li><b>ươn, thiu, thối, hỏng</b><ul class="list2"><li><span class="example-original">bad fish</span><br> cá ươn</li></ul><ul class="list2"><li><span class="example-original">to go bad</span><br> bị thiu, thối, hỏng</li></ul></li></ul><ul class="list1"><li><b>khó chịu</b><ul class="list2"><li><span class="example-original">bad smell</span><br> mùi khó chịu</li></ul><ul class="list2"><li><span class="example-original">to feel bad</span><br> cảm thấy khó chịu</li></ul></li></ul>', '[{"name":"defective"},{"name":"badness"},{"name":"sorry"}]', '[{"name":"unregretful"},{"name":" unregretting"},{"name":"good"}]', '2020-03-22 08:36:00', '2020-03-22 08:36:00'),
	(2, 'cat', '', 'c', '/kæt/', '                <ul class="list1"><li><b>con mèo</b></li></ul><ul class="list1"><li><b>(động vật học) thú thuộc giống mèo (sư tử, hổ, báo...)</b></li></ul><ul class="list1"><li><b>mụ đàn bà nanh ác; đứa bé hay cào cấu</b></li></ul><ul class="list1"><li><b>(hàng hải) đòn kéo neo ((cũng) cat head)</b></li></ul><ul class="list1"><li><b>roi chín dài (để tra tấn) ((cũng) cat o-nine-tails)</b></li></ul><ul class="list1"><li><b>con khăng (để chơi đanh khăng)</b></li></ul>', '', '', '2020-03-23 09:36:44', '2020-03-23 09:36:44'),
	(3, 'sadasd', '', '', 'ádsadas', 'ádad<br>', 'null', 'null', '2020-03-28 02:28:42', '2020-03-28 02:28:42'),
	(4, 'sadasd', '', 's', 'ádsadas', 'ádad<br>', '', '', '2020-03-28 02:29:27', '2020-03-28 02:29:27'),
	(5, 'ádasd', '', '?', 'adsasd', '                sadad', '[{"name":"adasđ"},{"name":"ádasdadsda"},{"name":"dsadadadsd"}]', '[{"name":"ádad"},{"name":"gwewgwe"}]', '2020-03-28 02:30:13', '2020-03-28 02:30:13'),
	(6, 'ádasd', '', '?', 'ádasdad', 'ádasdadasd<br>', '', '', '2020-03-28 03:18:53', '2020-03-28 03:18:53'),
	(7, 'dqwd', '', 'd', 'qưeq', '                ewqweqewqeqw', '[{"name":"eqweqwe"}]', '', '2020-03-28 03:41:40', '2020-03-28 03:41:40'),
	(8, 'đâs', '', '?', 'đâsd', '                adsads', '', '', '2020-03-28 08:18:17', '2020-03-28 08:18:17'),
	(9, 'dasd', '', 'd', 'sada', '                sdaddasdad', '[{"name":"asdasd"},{"name":"asdads"}]', '[{"name":"erwr"},{"name":"gdsgdsg"}]', '2020-03-28 10:00:03', '2020-03-28 10:00:03'),
	(10, 'dasdasd', '', 'd', 'asdadsadas', '                ddasdasdasd', '[{"name":"dasdasd"}]', '[{"name":"dasdasda"}]', '2020-03-29 10:58:34', '2020-03-29 10:58:34');
/*!40000 ALTER TABLE `words` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
