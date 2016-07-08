-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 05 月 30 日 03:45
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `back-stage_management`
--

-- --------------------------------------------------------

--
-- 表的结构 `academy`
--

CREATE TABLE IF NOT EXISTS `academy` (
  `Id` int(10) NOT NULL COMMENT '学院ID',
  `Name` varchar(30) NOT NULL COMMENT '学院名称',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `academy`
--

INSERT INTO `academy` (`Id`, `Name`) VALUES
(1, '信息科学与技术学院'),
(2, '化学工程学院'),
(3, '材料科学与工程学院'),
(4, '文法学院'),
(5, '理学院'),
(6, '机电工程学院'),
(7, '经济管理学院'),
(8, '生命科学与技术学院'),
(9, '继续教育学院'),
(10, '职业技术学院'),
(11, '马克思主义学院'),
(12, '国际教育学院'),
(13, '能源学院'),
(14, '侯德榜工程师学院');

-- --------------------------------------------------------

--
-- 表的结构 `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `Building_Id` int(10) NOT NULL COMMENT '教学楼id',
  `Classroom_Id` int(10) NOT NULL COMMENT '教室Id',
  `Event` varchar(100) NOT NULL COMMENT '活动名称',
  `Week` int(10) NOT NULL COMMENT '第几周',
  `Day` int(10) NOT NULL COMMENT '星期几',
  `Start_time` time NOT NULL COMMENT '开始时间',
  `End_time` time NOT NULL COMMENT '结束时间',
  KEY `Building_Id` (`Building_Id`,`Classroom_Id`),
  KEY `Classroom_Id` (`Classroom_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `Id` int(10) NOT NULL COMMENT '管理员ID',
  `Password` varchar(20) NOT NULL DEFAULT '000000' COMMENT '管理员密码',
  `Permission` int(10) NOT NULL COMMENT '普通管理员 超级管理员等',
  PRIMARY KEY (`Id`),
  KEY `Permission` (`Permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `administrator`
--

INSERT INTO `administrator` (`Id`, `Password`, `Permission`) VALUES
(2013014118, '123456', 1),
(2013014119, '123456', 2),
(2013014135, '123456', 1);

-- --------------------------------------------------------

--
-- 表的结构 `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `Id` int(10) NOT NULL COMMENT '教学楼ID',
  `Name` varchar(30) NOT NULL COMMENT '教学楼名称',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `building`
--

INSERT INTO `building` (`Id`, `Name`) VALUES
(1, '主教'),
(2, '电教'),
(3, '科教'),
(4, '计算机楼');

-- --------------------------------------------------------

--
-- 表的结构 `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `Id` int(10) NOT NULL COMMENT '教室ID',
  `Building_Id` int(10) NOT NULL COMMENT '教学楼ID',
  `Contain` int(10) NOT NULL COMMENT '教室容量',
  PRIMARY KEY (`Id`,`Building_Id`),
  KEY `Building_Id` (`Building_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `classroom`
--

INSERT INTO `classroom` (`Id`, `Building_Id`, `Contain`) VALUES
(101, 1, 100),
(110, 2, 100),
(210, 3, 50),
(211, 4, 30);

-- --------------------------------------------------------

--
-- 表的结构 `curricula`
--

CREATE TABLE IF NOT EXISTS `curricula` (
  `Id` int(10) NOT NULL COMMENT '课程ID',
  `Name` varchar(30) NOT NULL COMMENT '课程名',
  `Credit` double NOT NULL COMMENT '学分',
  `Hours` int(10) NOT NULL COMMENT '学时',
  `Speciality_Id` int(10) NOT NULL COMMENT '专业ID',
  `Academy_Id` int(10) NOT NULL COMMENT '学院ID',
  `Type` int(10) NOT NULL COMMENT '课程性质 必修选修之类',
  `Contain` int(10) NOT NULL COMMENT '课程容量',
  PRIMARY KEY (`Id`),
  KEY `Speciality_Id` (`Speciality_Id`),
  KEY `Academy_Id` (`Academy_Id`),
  KEY `Type` (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `curricula`
--

INSERT INTO `curricula` (`Id`, `Name`, `Credit`, `Hours`, `Speciality_Id`, `Academy_Id`, `Type`, `Contain`) VALUES
(1, '数据结构', 6, 64, 1, 3, 2, 40),
(2, '高等数学', 4, 64, 1, 1, 2, 60),
(11, '111', 11, 11, 3, 3, 2, 1111),
(222, '2222', 22, 222, 1, 1, 3, 222);

-- --------------------------------------------------------

--
-- 表的结构 `curricula_type`
--

CREATE TABLE IF NOT EXISTS `curricula_type` (
  `Id` int(10) NOT NULL COMMENT '课程类型ID',
  `Name` varchar(30) NOT NULL COMMENT '课程类型名称',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `curricula_type`
--

INSERT INTO `curricula_type` (`Id`, `Name`) VALUES
(1, '公共基础必修'),
(2, '专业必修'),
(3, '专业选修'),
(4, '通识'),
(5, '实践环节必修');

-- --------------------------------------------------------

--
-- 表的结构 `curricula_variable`
--

CREATE TABLE IF NOT EXISTS `curricula_variable` (
  `Id` int(10) NOT NULL AUTO_INCREMENT COMMENT '选课ID',
  `Student_Id` int(10) NOT NULL COMMENT '学生ID',
  `Curricula_Id` int(10) NOT NULL COMMENT '课程ID',
  `Score` int(10) DEFAULT NULL COMMENT '分数',
  `Year` date NOT NULL COMMENT '学年',
  `Term` int(10) NOT NULL COMMENT '学期',
  PRIMARY KEY (`Id`),
  KEY `Student_Id` (`Student_Id`),
  KEY `Curricula_Id` (`Curricula_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `curricula_variable`
--

INSERT INTO `curricula_variable` (`Id`, `Student_Id`, `Curricula_Id`, `Score`, `Year`, `Term`) VALUES
(1, 2013014135, 1, NULL, '2014-02-01', 2);

-- --------------------------------------------------------

--
-- 表的结构 `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `Id` int(10) NOT NULL AUTO_INCREMENT COMMENT '考试id',
  `Student_Id` int(10) NOT NULL COMMENT '学生id',
  `Teacher_Id` int(10) NOT NULL COMMENT '监考老师id',
  `Curricula_Id` int(10) NOT NULL COMMENT '课程id',
  `Start_time` datetime NOT NULL COMMENT '考试开始时间',
  `End_time` datetime NOT NULL COMMENT '考试结束时间',
  `Building_Id` int(10) NOT NULL COMMENT '考试地点在哪栋楼',
  `Classroom_Id` int(10) NOT NULL COMMENT '考试地点在哪个教室',
  PRIMARY KEY (`Id`),
  KEY `Student_Id` (`Student_Id`,`Teacher_Id`,`Curricula_Id`,`Building_Id`,`Classroom_Id`),
  KEY `Teacher_Id` (`Teacher_Id`),
  KEY `Curricula_Id` (`Curricula_Id`),
  KEY `Building_Id` (`Building_Id`),
  KEY `Classroom_Id` (`Classroom_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `exam`
--

INSERT INTO `exam` (`Id`, `Student_Id`, `Teacher_Id`, `Curricula_Id`, `Start_time`, `End_time`, `Building_Id`, `Classroom_Id`) VALUES
(1, 2013014135, 1111111111, 1, '2014-06-20 08:00:00', '2014-06-20 10:00:00', 1, 211);

-- --------------------------------------------------------

--
-- 表的结构 `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `Id` int(10) NOT NULL COMMENT '年级ID',
  `Name` varchar(30) NOT NULL COMMENT '年级名称',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `grade`
--

INSERT INTO `grade` (`Id`, `Name`) VALUES
(1, '2013级'),
(2, '2014级');

-- --------------------------------------------------------

--
-- 表的结构 `helpfile`
--

CREATE TABLE IF NOT EXISTS `helpfile` (
  `Id` int(10) NOT NULL COMMENT '帮助文件ID',
  `Title` text NOT NULL COMMENT '帮助文件标题',
  `Content` text NOT NULL COMMENT '帮助文件内容',
  `Visible` tinyint(2) NOT NULL COMMENT '帮助文件是否可见',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `issue`
--

CREATE TABLE IF NOT EXISTS `issue` (
  `Id` int(10) NOT NULL COMMENT '毕业设计课题ID',
  `Teacher_Id` int(10) NOT NULL COMMENT '毕业设计老师ID',
  `Title` varchar(50) NOT NULL COMMENT '课题标题',
  `Type` int(10) NOT NULL COMMENT '课题类型',
  `Contain` int(10) NOT NULL COMMENT '课题限定人数',
  `Introduction` text NOT NULL COMMENT '课题介绍',
  `Academy_Id` int(10) NOT NULL COMMENT '学院ID',
  `Speciality_Id` int(10) NOT NULL COMMENT '专业ID',
  `Curricula_Id` int(10) NOT NULL COMMENT '课程ID',
  PRIMARY KEY (`Id`),
  KEY `Teacher_Id` (`Teacher_Id`),
  KEY `Speciality` (`Speciality_Id`),
  KEY `Academy` (`Academy_Id`),
  KEY `Curricula_Id` (`Curricula_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `UserId` int(10) NOT NULL COMMENT '管理员登录账号',
  `Time` datetime NOT NULL COMMENT '时间',
  `Type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '登录或者退出 0表示退出 1表示登录',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`Id`, `UserId`, `Time`, `Type`) VALUES
(1, 2013014135, '2016-05-18 17:17:53', 1),
(2, 2013014135, '2016-05-18 17:18:23', 0),
(3, 2013014135, '2016-05-18 19:46:54', 0),
(4, 2013014135, '2016-05-18 19:48:59', 1),
(5, 2013014135, '2016-05-18 19:49:25', 0),
(6, 2013014135, '2016-05-18 20:06:03', 1),
(7, 2013014118, '2016-05-18 20:06:10', 0),
(8, 2013014118, '2016-05-18 20:06:48', 1),
(9, 2013014119, '2016-05-18 20:08:53', 0),
(10, 2013014119, '2016-05-18 20:11:05', 1),
(11, 2013014119, '2016-05-18 20:11:14', 0),
(12, 2013014119, '2016-05-18 20:11:22', 1),
(13, 2013014118, '2016-05-18 20:11:28', 0),
(14, 2013014118, '2016-05-18 20:12:23', 1),
(15, 2013014119, '2016-05-18 20:12:29', 0),
(16, 2013014119, '2016-05-18 20:25:14', 1),
(17, 2013014118, '2016-05-18 20:25:20', 0),
(18, 2013014118, '2016-05-18 20:25:35', 1),
(19, 2013014119, '2016-05-18 20:25:40', 0),
(20, 2013014119, '2016-05-18 20:32:04', 1),
(21, 2013014118, '2016-05-18 20:32:10', 0),
(22, 2013014118, '2016-05-18 21:03:36', 1),
(23, 2013014118, '2016-05-18 21:03:43', 0),
(24, 2013014118, '2016-05-18 21:21:35', 1),
(25, 2013014119, '2016-05-18 21:21:42', 0),
(26, 2013014119, '2016-05-18 21:25:59', 1),
(27, 2013014119, '2016-05-18 21:26:04', 0),
(28, 2013014119, '2016-05-18 21:47:29', 0),
(29, 2013014119, '2016-05-18 21:47:37', 1),
(30, 2013014118, '2016-05-18 21:47:46', 0),
(31, 2013014118, '2016-05-18 21:49:56', 0),
(32, 2013014118, '2016-05-18 21:50:56', 1),
(33, 2013014118, '2016-05-19 07:55:58', 0),
(34, 2013014118, '2016-05-19 07:57:46', 1),
(35, 2013014119, '2016-05-19 07:57:52', 0),
(36, 2013014119, '2016-05-19 07:58:26', 1),
(37, 2013014118, '2016-05-19 07:58:48', 0),
(38, 2013014118, '2016-05-19 07:59:51', 1),
(39, 2013014118, '2016-05-19 08:21:54', 0),
(40, 2013014118, '2016-05-19 08:27:42', 1),
(41, 2013014118, '2016-05-19 08:27:47', 0),
(42, 2013014118, '2016-05-19 08:45:48', 1),
(43, 2013014119, '2016-05-19 08:46:04', 0),
(44, 2013014119, '2016-05-19 08:58:31', 1),
(45, 2013014118, '2016-05-25 16:15:57', 0),
(46, 2013014118, '2016-05-25 23:14:34', 0),
(47, 2013014119, '2016-05-25 23:15:43', 0),
(48, 2013014118, '2016-05-25 23:20:26', 1),
(49, 2013014118, '2016-05-25 23:20:35', 0),
(50, 2013014119, '2016-05-25 23:21:53', 1),
(51, 2013014119, '2016-05-25 23:22:07', 0),
(52, 2013014119, '2016-05-25 23:22:50', 0),
(53, 2013014118, '2016-05-25 23:33:15', 0),
(54, 2013014118, '2016-05-27 08:32:53', 0),
(55, 2013014118, '2016-05-27 09:23:55', 1),
(56, 2013014119, '2016-05-27 09:24:05', 0),
(57, 2013014119, '2016-05-27 09:28:00', 0),
(58, 2013014118, '2016-05-27 09:29:22', 0),
(59, 2013014118, '2016-05-27 09:33:13', 0),
(60, 2013014118, '2016-05-27 09:45:07', 0),
(61, 2013014118, '2016-05-27 10:08:16', 0),
(62, 2013014118, '2016-05-30 10:37:14', 0),
(63, 2013014118, '2016-05-30 10:57:33', 7),
(64, 2013014118, '2016-05-30 11:04:36', 1),
(65, 2013014118, '2016-05-30 11:04:41', 0),
(66, 2013014118, '2016-05-30 11:06:49', 8),
(67, 2013014118, '2016-05-30 11:28:55', 1),
(68, 2013014118, '2016-05-30 11:29:09', 0),
(69, 2013014118, '2016-05-30 11:32:31', 22),
(70, 2013014118, '2016-05-30 11:34:14', 8),
(71, 2013014118, '2016-05-30 11:40:02', 22),
(72, 2013014118, '2016-05-30 11:40:53', 20),
(73, 2013014118, '2016-05-30 11:41:05', 1),
(74, 2013014119, '2016-05-30 11:41:12', 0),
(75, 2013014119, '2016-05-30 11:42:01', 5),
(76, 2013014119, '2016-05-30 11:42:15', 15);

-- --------------------------------------------------------

--
-- 表的结构 `logtype`
--

CREATE TABLE IF NOT EXISTS `logtype` (
  `TypeId` tinyint(2) NOT NULL,
  `TypeName` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`TypeId`),
  KEY `TypeName` (`TypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `logtype`
--

INSERT INTO `logtype` (`TypeId`, `TypeName`) VALUES
(18, '修改系统通知'),
(13, '删除学生信息'),
(15, '删除教室信息'),
(12, '删除教师信息'),
(16, '删除管理员信息'),
(19, '删除系统通知'),
(14, '删除课程信息'),
(22, '发送学位警告邮件'),
(21, '向学生群发邮件'),
(20, '向老师群发邮件'),
(8, '更改学生信息'),
(10, '更改教室信息'),
(7, '更改教师信息'),
(11, '更改管理员信息'),
(9, '更改课程信息'),
(3, '添加学生信息'),
(5, '添加教室信息'),
(2, '添加教师信息'),
(6, '添加管理员信息'),
(17, '添加系统通知'),
(4, '添加课程信息'),
(0, '登录'),
(1, '退出');

-- --------------------------------------------------------

--
-- 表的结构 `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `Id` int(10) NOT NULL COMMENT '邮件ID',
  `Title` text NOT NULL COMMENT '邮件标题',
  `Content` text NOT NULL COMMENT '邮件内容',
  `Sender` int(10) NOT NULL COMMENT '邮件发送者ID',
  `Recipient` int(10) NOT NULL COMMENT '邮件接收者ID',
  `Time` datetime NOT NULL COMMENT '邮件发送时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `Id` int(10) NOT NULL AUTO_INCREMENT COMMENT '通知消息ID',
  `Time` datetime NOT NULL COMMENT '通知消息时间',
  `Title` text NOT NULL COMMENT '通知消息标题',
  `Content` text NOT NULL COMMENT '通知消息内容',
  `Visible` tinyint(2) NOT NULL COMMENT '通知消息是否可见',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `notification`
--

INSERT INTO `notification` (`Id`, `Time`, `Title`, `Content`, `Visible`) VALUES
(1, '2016-05-17 09:11:22', '习近平谈从严治党：打铁还需自身硬', '“‘打铁还需自身硬’是我们党的庄严承诺，全面从严治党是我们立下的军令状。”习近平总书记这一重要论断，掷地有声，鲜明地表明了党中央全面从严治党的决心、信心、恒心。\r\n\r\n    全面从严治党是以习近平同志为总书记的党中央治国理政的鲜明特色。在推进全面从严治党新的实践中，习近平总书记以非凡的理论勇气、大无畏的担当精神，围绕从严管党治党提出一系列新的重要思想，强调把思想建党和制度治党紧密结合起来，坚持以思想建党为根本，以从严治吏为重点，以改进作风为突破口，以反腐肃贪为重要任务，以严明纪律和制度治党为保障，全面提高党的领导水平和执政能力，确保党始终成为中国特色社会主义事业的坚强领导核心，丰富了党的建设理论和实践，开辟了马克思主义执政党建设的新境界，为新的历史条件下加强党的建设提供了根本遵循。\r\n\r\n    一、以踏石留印、抓铁有痕的劲头抓作风建设，坚决惩治腐败不手软\r\n\r\n    党风如何，牵动党的面貌、党的形象，关系党心民心。切实解决党风上的突出问题，是全党和全国人民的热切期盼。\r\n\r\n    2012年11月，党的十八大刚刚闭幕，在十八届中共中央政治局常委同中外记者见面会上，习近平总书记斩钉截铁地提出：“打铁还需自身硬。我们的责任，就是同全党同志一道，坚持党要管党、从严治党，切实解决自身存在的突出问题，切实改进工作作风，密切联系群众，使我们党始终成为中国特色社会主义事业的坚强领导核心。”这是以习近平同志为总书记的新一届党中央向全党、全国人民作出的庄严承诺。\r\n\r\n    习近平总书记反复强调：“工作作风上的问题绝对不是小事。”“如果不坚决纠正不良风气，任其发展下去，就会像一座无形的墙把我们党和人民群众隔开，我们党就会失去根基、失去血脉、失去力量”，作风建设是党的建设突破口，作风建设永远在路上。在推进全面从严治党中，党中央把抓作风作为“先手棋”，把党风廉政建设和反腐败斗争作为重要内容，采取了一系列重大举措。三年多来，党中央制定和落实中央八项规定，加强作风建设从八项规定下手；在全党开展以为民务实清廉为主要内容的群众路线教育实践活动，着力解决“四风”问题；在县处级以上领导干部中开展“三严三实”专题教育，这是对党的群众路线教育实践活动成果的巩固和拓展；今年又决定在全体党员中开展“两学一做”学习教育，进一步解决党员队伍在思想、组织、作风、纪律等方面存在的问题。这一切，充分显示我们党在作风建设上一鼓作气、一抓到底的决心和恒心，经常抓、深入抓、持久抓，“坚持坚持再坚持，把作风建设抓到底”，善始善终、善作善成。\r\n\r\n    腐败是社会毒瘤，也是侵蚀我们党的健康肌体的腹心之患。党的十八大以来，以习近平同志为总书记的党中央，顺应党心军心民心，以最强决心、最大力度、最严态势吹响反腐败斗争集结号，坚决打赢这场输不起也决不能输的斗争。习近平总书记强调：“反腐败斗争没有禁区，没有特区，也不能有盲区”，“要以刮骨疗毒、壮士断腕的勇气，坚决把党风廉政建设和反腐败斗争进行到底。”三年多来，我们党以零容忍的态度重拳反腐。坚持“老虎”“苍蝇”一起打，坚决查处周永康、薄熙来、徐才厚、郭伯雄、令计划等严重违纪违法案件，深入推进反腐败斗争，下大气力拔“烂树”、治“病树”、正“歪树”，保持惩治腐败的高压态势，做到有腐必反、除恶务尽。\r\n\r\n    党的十八大以来查处的大量腐败案件告诉我们，反腐败斗争必须既治标又治本，必须把政治纪律和政治规矩挺在前面，必须筑起不敢腐、不能腐、不想腐的钢铁长城。改革党的纪律检查体制，加强反腐败工作体制机制创新，完善纪委派驻机构统一管理。健全和完善党内监督、民主监督、法律监督和舆论监督体系，强化对权力运行的制约和监督，铲除腐败现象的生存空间和滋生土壤。继续改进中央和省区市巡视制度，推进巡视和派驻监督全覆盖。加强反腐败国际追逃追赃，对腐败分子形成震慑，遏制腐败现象蔓延势头。运用监督执纪“四种形态”：让咬耳朵、扯袖子，红红脸、出出汗成为常态，党纪轻处分、组织调整成为大多数，重处分、重大职务调整的是少数，而严重违纪涉嫌违法立案审查的只能是极极少数。坚持标本兼治、综合治理、惩防并举、注重预防，不断健全惩治和预防腐败体系，坚定不移反对腐败，建设廉洁政治，努力实现干部清正、政府清廉、政治清明。通过一系列重大举措，不敢腐的震慑作用充分发挥，不能腐、不想腐的效应初步显现，反腐败斗争压倒性态势正在形成。党风廉政建设和反腐败斗争取得的重大成效振奋党心、深得民心，增强了人民群众对党的信任和支持，赢得了人民群众的高度评价。\r\n\r\n    二、坚持纪严于法、纪在法前，严明党的政治纪律政治规矩不含糊\r\n\r\n    “革命理想高于天”。从严管党治党，首先就要坚定党员干部的理想信念。习近平总书记有个形象的比喻：“理想信念是共产党人精神上的‘钙’。”共产党人任何时候都要坚定对马克思主义的信仰，对共产主义和社会主义的信念，对党和人民的忠诚。炼就“金刚不坏之身”，必须用科学理论武装头脑，培植好精神家园，虔诚而执着、至信而深厚，为信仰而拼搏奋斗。\r\n\r\n    没有规矩，不成方圆。我们党是肩负历史使命的政治组织，纪律是生命的保障，规矩是生存的基础，必须有严明的政治纪律和政治规矩。我们党有8700多万党员，在一个幅员辽阔、人口众多的发展中大国执政，如果没有铁的纪律，就没有党的团结统一，党的凝聚力和战斗力就会大大削弱，党的领导能力和执政能力就会大大削弱。习近平总书记指出：“党章等党规对党员的要求比法律要求更高，党员不仅要严格遵守法律法规，而且要严格遵守党章等党规，对自己提出更高的要求。”他强调，加强纪律建设是全面从严治党的治本之策，要把纪律建设摆在更加突出的位置，坚持纪严于法、纪在法前，把纪律和规矩挺在前面。党面临的形势越复杂、肩负的任务越艰巨，就越要加强纪律建设，越要维护党的团结统一，确保全党统一意志、统一行动、步调一致前进。\r\n\r\n    党的规矩包括哪些？习近平总书记指出，党章是全党必须遵循的总章程，也是总规矩。党的纪律是刚性约束，政治纪律更是全党在政治方向、政治立场、政治言论、政治行动方面必须遵守的刚性约束。国家法律是党员、干部必须遵守的规矩。党在长期实践中形成的优良传统和工作惯例也是重要的党内规矩。\r\n\r\n    严明党的纪律，首先要严格遵守党章。每一个共产党员都要牢固树立党章意识，自觉用党章规范自己的一言一行，在任何情况下都要做到政治信仰不变、政治立场不移、政治方向不偏。严明党的纪律，必须严明政治纪律。党的纪律是多方面的，政治纪律是最重要、最根本、最关键的纪律，遵守党的政治纪律是遵守党的全部纪律的重要基础。遵守党的政治纪律，最核心的，就是坚持党的领导，坚持党的基本理论、基本路线、基本纲领、基本经验、基本要求。必须增强政治意识、大局意识、核心意识、看齐意识，经常、主动向党中央看齐，向党的理论和路线方针政策看齐，自觉同以习近平同志为总书记的党中央在思想上政治上行动上保持高度一致，自觉维护中央权威。习近平总书记强调：“遵守党的纪律是无条件的，要说到做到，有纪必执，有违必查，而不能合意的就执行，不合意的就不执行，不能把纪律作为一个软约束或是束之高阁的一纸空文。”党中央颁布实施新修订的《中国共产党廉洁自律准则》和《中国共产党纪律处分条例》，是在党长期执政和依法治国条件下，落实全面从严治党战略部署，实现依规依纪治党，切实加强党内监督的重大举措。两项法规一正一反、相互配套，自律与他律互补、高标准与守底线兼顾，立起了“航标灯”、拉起了“警戒线”。当前正在深入开展的“两学一做”学习教育，一个重要的目的就是要使全体党员干部牢固树立党章党规党纪意识，尊崇敬畏党章，严格执行两项法规，把党规党纪刻印在心、落实于行，自觉做守纪律、讲规矩的模范，永葆共产党人政治本色。\r\n\r\n    三、坚持党的思想建设和制度建设紧密结合，扎实推进党的建设制度改革不停步\r\n\r\n    对一个长期执政的马克思主义政党来说，思想混乱、制度松弛是最大的危险。习近平总书记在党的群众路线教育实践活动总结大会上提出：“坚持思想建党和制度治党紧密结合。从严治党靠教育，也靠制度，二者一柔一刚，要同向发力、同时发力。”这为使管党治党真正从宽松软走向严紧硬，营造出风清气正的政治生态，指明了正确方向。\r\n\r\n    着重从思想上建设党，是党的建设长期积累的一条基本经验。坚定广大党员干部的理想信念，是党的思想建设的首要任务，为的是解决好世界观、人生观、价值观这个“总开关”问题，切实解决“为了谁、依靠谁、我是谁”这个根本问题。全面从严治党必须牢牢抓住坚定理想信念这个关键，坚守共产党人精神追求，筑牢拒腐防变思想道德防线。坚持思想建党，特别要解决好政治立场、政治方向、政治原则问题。这在任何时候都是根本性的大问题。党性教育是共产党人正心修身的必修课。党性坚强了，才能在大是大非面前旗帜鲜明，在风浪面前无所畏惧，在各种诱惑面前立场坚定，在关键时刻挺得住。\r\n\r\n    党要管党、从严治党，必须有坚强的制度作保证。党的十八大以来，以习近平同志为总书记的党中央，扎实推进建章立制工作，通过改革创新完善体制机制，全方位扎紧制度笼子，更多用制度治党、管权、治吏。用制度治党，就是要依法依规治党。坚持纪严于法、纪在法前，实现纪法分开，充分运用“四种形态”，用严明的纪律管住全体党员。注重党内法规同国家法律的衔接和协调，构建以党章为根本、若干配套党内法规为支撑的党内法规制度体系，做到前后衔接、左右联动、上下配套、系统集成。用制度管权，就是要把权力关进制度的笼子里。要按照决策、执行、监督既相互制约又相互协调的原则区分和配置权力，构建严密的权力运行制约和监督体系。要把党内监督同国家监察、群众监督结合起来，努力形成科学有效的监督体系，增强监督合力和实效。要让权力在阳光下运行，推进权力运行公开化、规范化，完善党务公开、政务公开、司法公开和各领域办事公开制度。要建立权力清单、实行权责对应，坚持有权就有责，失职要问责。用制度治吏，就是要用制度从严管理干部。要根据形势变化，完善干部管理规定，既重激励又重约束。严格执行干部管理各项规定，讲原则不讲关系，坚持以严的标准要求干部，以严的措施管理干部，以严的纪律约束干部，使干部心有所畏、言有所戒、行有所止。要引导广大干部牢固树立法治意识、制度意识、纪律意识，形成尊崇制度、遵守制度、捍卫制度的良好氛围。\r\n\r\n    四、加强和改善党的领导，不断提高党的治国理政能力不松劲\r\n\r\n    习近平总书记在十八届中央纪委六次全会上的重要讲话中指出：“全面从严治党，核心是加强党的领导，基础在全面，关键在严，要害在治。”这一重要论述，深刻阐释了全面从严治党的新内涵和新要求，为进一步管好党、治好党指明了方向。\r\n\r\n    办好中国的事情，关键在党。中国特色社会主义是我们党领导的伟大事业，中国共产党的领导是中国特色社会主义最本质的特征，是中国特色社会主义制度的最大优势。党坚强有力，事业才能兴旺发达，国家才能繁荣稳定，人民才能幸福安康。要坚持党的领导，必须不断改善党的领导，加强和改进党的建设。坚持党的领导和改善党的领导是辩证统一的。在新的历史条件下，只有改善党的领导，才能坚持和加强党的领导，更好地推进国家治理体系和治理能力现代化。\r\n\r\n    改善党的领导，从根本上说要靠掌握和运用共产党执政规律，完善党“总揽全局，协调各方”的体制机制，不断改进党的领导方式、提高党的领导水平。要站在“五位一体”总体布局和“四个全面”战略布局的高度，主动适应、把握、引领经济发展新常态，创新党领导经济社会发展的观念、体制、方式方法，提高党把握方向、谋划全局、提出战略、制定政策、推进改革的能力，为发展航船定好向、掌好舵。要切实提高科学执政、民主执政、依法执政的水平，加强制度化建设，改进工作体制机制和方式方法，使党的执政方略更加完善、执政体制更加巩固、执政方式更加科学、执政基础更加巩固。领导干部素养和能力如何，直接关系发展的水平和效果，必须加强领导干部能力培养。新发展理念就是指挥棒。提高领导干部领导发展的能力，关键是要提高统筹贯彻新发展理念的能力。各级领导干部要加强学习，加强实践历练，增强战略思维、历史思维、辩证思维、创新思维、底线思维、法治思维，增强把握和运用市场经济规律、社会发展规律、自然规律的能力，努力提高驾驭现代经济发展的本领，成为领导经济社会发展的行家里手。要更加自觉地运用法治思维和法治方式来深化改革、推动发展、化解矛盾、维护稳定，依法治理经济，依法协调和处理各种利益问题，推进依法执政制度化、规范化、程序化。要提高宣传和组织群众能力，加强思想政治工作，创新群众工作体制机制和方式方法，及时解决群众思想认识问题和现实利益问题，把群众的积极性主动性创造性调动起来，把党的正确主张转化为群众的自觉行动。\r\n\r\n    面向未来，加强和改进党的建设的任务依然艰巨繁重。我们在坚定信心的同时，切不可掉以轻心。增强管党治党意识，落实管党治党责任，是全面从严治党的重要保证。从党中央到省市县党委，从中央部委党组到基层党支部，都要肩负起党风廉政建设和反腐败斗争主体责任，各级纪委要担负起监督责任，敢于执纪问责。各级领导干部既要敢管敢治、严管严治、长管长治，又要敢做敢为敢担当，营造风清气正的政治生态，使管党治党真正从宽松软走向严紧硬，确保我们党始终成为中国特色社会主义事业的坚强领导核心，为实现“两个一百年”奋斗目标和中华民族伟大复兴的中国梦提供最坚强的政治保证。', 0),
(2, '2016-05-15 20:47:30', '李克强如何重塑民间投资信心 ', '国务院总理李克强近日主持召开国务院常务会议，决定对促进民间投资政策落实情况开展专项督查，着力扩大民间投资。国务院此次还罕见地派出督查组。会议指出，督查组将围绕国务院2014年出台的关于创新重点领域投融资机制鼓励社会投资的相关文件落实情况，选择部分地区进行督查，同时开展第三方评估。\r\n\r\n对于国务院派出督查组，市场普遍解读的信号都是，因为民间投资活力正在下降，督查组从地方对投融资体制改革落实情况进行督查，从而找到民间投资活力下降的原因。\r\n\r\n确实，近期的民间投资数据不尽如人意。今年一季度，民间固定资产投资增速相比去年同期回落了7.9个百分点，仅为5.7%。与此同时，全社会固定资产投资增速为10.7%。这与以往民间固投增速往往高于全国平均水平的情况形成了反差。\r\n\r\n与公共投资着眼于公益性为主不同，民间投资行动的动力无他，说白了，就是能不能从中赚钱。天下熙熙，皆为利往，民间资本作为市场的自由资金，自发流向没有门槛限制、最有利可图的地方是其必然的发展规律。而当前的民间投资增速下滑，很显然也就反映了缺乏赚钱空间的民间投资开始普遍进入了观望的“惜投”心态。\r\n\r\n改革开放以来，民间资本和民营企业一直是实体经济中的“鲶鱼”。那么为何当前连“鲶鱼”也遭遇活力不足的困境？一方面，与市场经济不断发展、竞争不断充分有关系，但更为重要的是，其他领域在完成充分竞争之后，越发暴露了未能开放领域的高墙。\r\n\r\n比如水电能源、公路铁路、电信运营等行业，国有资本长期垄断经营，尽管产业规模更大，但运营效率不高，垄断导致市场竞争不充分，有效供给不足的同时还进一步导致内需不足，这反过来还使得一些垄断行业成为经济发展的瓶颈。但事实上，这些行业往往集中在基础领域，是市场规模较大、增长前景较好、具备赚钱可能性的领域。\r\n\r\n此外，这样的难以逾越的高墙不仅在于行业准入，甚至在于行政准入。比如，PPP项目推出的本意初心在于给地方政府搭建与民间资本合作的政策平台。然而，PPP项目推进至今，却陷入了两个极端方向：一是有良好回报预期的项目，大多给了政府融资平台和国有公司，留给民间资本的大多是回报预期不佳、甚至风险大过于收益的项目；另一个极端，是部分地方政府始终未能准确把握PPP项目的标准，而是急于把其作为化解地方债务的融资渠道，对于PPP项目的投资方向有时甚至私利大于公益，甚至出现此前媒体报道的“伪PPP项目”，这种情况下，地方政府不仅变相被迫为商业利益背书、甚至有时还要因政府担保承担更大的风险。\r\n\r\n这也是地方政府对于与民间资本合作爱恨交加的原因，恐怕也更是地方政府不愿与民间资本合作的心理动因——李克强总理此前在会议上就表示，“我到基层考察调研时听到，个别地方群众甚至编出了顺口溜，说地方政府当前对民营企业有‘三不’：不听电话、不接材料、不予办事。”\r\n\r\n正如总理所说，“一些民营企业现在面临的问题，不是‘玻璃门’、‘弹簧门’、‘旋转门’，而是‘没门’！不知道‘门’在哪儿！”无论是对于民间资本还是对于民营企业来说，面临的困境确实不仅仅是门，而是行业准入和行政准入甚至心理准入的高墙。\r\n\r\n因此，针对民间投资情况的实地督查、了解地方与民间资本之间的“隔阂”究竟在哪里十分有必要，也只有这样才能真正实现低成本高效率的定向突破。\r\n\r\n而未来重新激活民间投资的破题之方，还是在于把此前的会议中所说的“凡是法律法规未明确禁入的行业和领域都应鼓励民间资本进入，凡是我国政府已向外资开放或承诺开放的领域都应向国内民间资本开放”落到实处。打破准入的高墙之后，在此基础上完善符合民资实际的准入规则和实行标准，这不仅仅能够重塑地方政府与民间资本合作的信心，同样也能够给民间资本打一针行动的“强心剂”。（边际）', 0),
(3, '2016-05-15 20:48:30', '糗事百科', '同事失恋，咬手指用血写了封遗 书，然后爬到高桥上想轻生，消防员经过半小时的劝说，总算成功把他劝心软了。\r\n愁眉苦脸的去上班，到那用指纹打卡打不上，罚他旷工，现在又爬到高桥上去了', 0),
(4, '2016-05-16 08:31:09', '哈哈ha adad', '哈哈哈哈哈哈哈哈哈哈adadadadadadadada', 1),
(21, '2016-05-18 03:38:38', 'qewqe', 'eqeqeddd', 0),
(22, '2016-05-16 09:01:51', 'qeqeqe', 'qeqeqeqeq', 0),
(29, '2016-05-17 09:05:22', '23e2', '2332e2e', 0),
(32, '2016-05-17 11:12:21', '企鹅王企鹅企鹅去', '企鹅企鹅请问请问 切切 切去\r\n去\r\n去\r\n而且eq额q额q额qeqe去\r\nq eq额q额\r\nq额q额qe切q额\r\n去', 1),
(35, '2016-05-18 09:00:18', '12121', '212121212', 0);

-- --------------------------------------------------------

--
-- 表的结构 `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `Id` int(10) NOT NULL COMMENT '权限ID',
  `Name` varchar(30) NOT NULL COMMENT '权限名称',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `permission`
--

INSERT INTO `permission` (`Id`, `Name`) VALUES
(1, '超级管理员'),
(2, '普通管理员'),
(3, '本科生'),
(4, '研究生'),
(5, '博士生'),
(6, '老师');

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `Id` int(10) NOT NULL,
  `Sender_Id` int(10) NOT NULL COMMENT '发消息者',
  `Receiver_Id` int(10) NOT NULL COMMENT '接收消息者',
  `Create_time` datetime NOT NULL COMMENT '创建时间',
  `Modify_time` datetime NOT NULL COMMENT '最后修改时间',
  `Content` tinytext NOT NULL COMMENT '内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `select_issue`
--

CREATE TABLE IF NOT EXISTS `select_issue` (
  `Issue_Id` int(10) NOT NULL COMMENT '毕业设计课题id',
  `Student_Id` int(10) NOT NULL COMMENT '学生id',
  `Status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '教师是否同意 0表示不同意 1表示同意',
  `Score` int(10) DEFAULT NULL COMMENT '成绩',
  `Summary` text COMMENT '毕业设计完成情况总结',
  `Production` text COMMENT '毕业设计作品',
  PRIMARY KEY (`Issue_Id`,`Student_Id`),
  KEY `Issue_Id` (`Issue_Id`,`Student_Id`),
  KEY `Student_Id` (`Student_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shouke`
--

CREATE TABLE IF NOT EXISTS `shouke` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Curricula_Id` int(10) NOT NULL COMMENT '课程Id',
  `Building_Id` int(10) NOT NULL,
  `Classroom_Id` int(10) NOT NULL COMMENT '教室id',
  `Teacher_Id` int(10) NOT NULL COMMENT '老师id',
  `Start_week` int(10) NOT NULL COMMENT '第几周开始',
  `End_week` int(10) NOT NULL COMMENT '第几周结束',
  `Day` int(10) DEFAULT NULL COMMENT '星期几 ',
  `Start_class` time NOT NULL COMMENT '第几节课开始',
  `End_class` time NOT NULL COMMENT '第几节课结束',
  PRIMARY KEY (`Id`),
  KEY `Curricula_Id` (`Curricula_Id`,`Classroom_Id`,`Teacher_Id`),
  KEY `Classroom_Id` (`Classroom_Id`),
  KEY `Teacher_Id` (`Teacher_Id`),
  KEY `Building_Id` (`Building_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `shouke`
--

INSERT INTO `shouke` (`Id`, `Curricula_Id`, `Building_Id`, `Classroom_Id`, `Teacher_Id`, `Start_week`, `End_week`, `Day`, `Start_class`, `End_class`) VALUES
(1, 1, 1, 110, 1111111111, 1, 16, 1, '08:00:00', '09:35:00');

-- --------------------------------------------------------

--
-- 表的结构 `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `Id` int(10) NOT NULL COMMENT '专业ID',
  `Name` varchar(50) NOT NULL COMMENT '专业名称',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `speciality`
--

INSERT INTO `speciality` (`Id`, `Name`) VALUES
(1, '计科'),
(2, '自动化'),
(3, '测控'),
(4, '信工'),
(5, '化工'),
(6, '应化'),
(7, '高材'),
(8, '经管');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Id` int(10) NOT NULL COMMENT '学生ID',
  `Name` varchar(30) NOT NULL COMMENT '学生姓名',
  `Sex` varchar(10) NOT NULL COMMENT '学生性别',
  `Password` varchar(20) NOT NULL COMMENT '学生登录密码',
  `Academy` int(10) NOT NULL COMMENT '所属学院ID',
  `Speciality` int(10) NOT NULL COMMENT '所属专业ID',
  `Class` varchar(10) NOT NULL COMMENT '班级 编号',
  `Grade` int(10) NOT NULL COMMENT '所属年级ID',
  `Permission` int(10) NOT NULL COMMENT '权限ID',
  `Dates_Attendance` date NOT NULL COMMENT '入学时间',
  `Phone` varchar(20) NOT NULL COMMENT '联系电话',
  `Identification_Card` varchar(20) NOT NULL COMMENT '身份证号',
  `Nation` varchar(20) DEFAULT '汉' COMMENT '民族',
  `BirthPlace` varchar(20) DEFAULT NULL COMMENT '出生地',
  `BirthDay` date DEFAULT NULL COMMENT '生日',
  `EMail` varchar(50) NOT NULL COMMENT '电子邮箱',
  PRIMARY KEY (`Id`),
  KEY `Grade` (`Grade`),
  KEY `Class` (`Class`),
  KEY `Permission` (`Permission`),
  KEY `Academy` (`Academy`),
  KEY `Speciality` (`Speciality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`Id`, `Name`, `Sex`, `Password`, `Academy`, `Speciality`, `Class`, `Grade`, `Permission`, `Dates_Attendance`, `Phone`, `Identification_Card`, `Nation`, `BirthPlace`, `BirthDay`, `EMail`) VALUES
(2013014118, '万波', '男', '123456', 1, 8, '2班', 1, 3, '2013-09-01', '13120310025', '123456789012345678', '汉', '湖北', '1995-01-01', '1534940124@qq.com'),
(2013014119, '丁亮锋', '男', '123456', 1, 1, '2班', 1, 3, '2013-09-01', '16354654656', '987654321087654321', '汉', '江西', '1995-02-01', '13120310025@163.com'),
(2013014120, '马骁睿', '男', '123456', 1, 1, '2班', 1, 3, '2013-09-01', '13546614894', '486546465462643264', '汉', '河北', '1995-03-01', '951618106@qq.com'),
(2013014121, '马跃', '男', '123456', 1, 1, '2班', 1, 3, '2013-09-01', '12345678910', '987962646264656226', '汉', '黑龙江', '1995-05-01', '456456456@qq.com'),
(2013014135, '陈朝祥', '男', '123456', 1, 1, '2班', 1, 3, '2013-09-01', '12345678910', '12345678910111213', '汉', '安徽', '1995-08-01', '1094842712@qq.com'),
(2013014140, '戴小款', '男', '123456', 2, 5, '1班', 1, 3, '2013-09-01', '1234567890', '1234567890', '汉', '武汉', '1993-01-01', '12345678@qq.com'),
(2013014141, '哈哈', '男', '123456', 8, 7, '7班', 1, 2, '2016-05-12', '1234567890', '1234567890', '汉', '北极', '2016-05-15', '13120310025@163.com'),
(2013014142, '呵呵', '男', '', 1, 1, '1班', 1, 1, '0000-00-00', '', '', '汉', '', '0000-00-00', ''),
(2013014144, '123', '男', '123456', 1, 1, '1302', 1, 4, '2016-05-12', '123', '123', '汉', '1', '2016-05-17', '12345678@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `Id` int(10) NOT NULL COMMENT '教师ID',
  `Name` varchar(30) NOT NULL COMMENT '教师姓名',
  `Sex` varchar(10) NOT NULL COMMENT '教师性别',
  `Password` varchar(20) NOT NULL COMMENT '教师登录密码',
  `Academy` int(10) NOT NULL COMMENT '教师所属学院ID',
  `Permission` int(10) NOT NULL COMMENT '权限ID',
  `Speciality` int(10) NOT NULL COMMENT '专业ID',
  `Dates_Enrollment` date NOT NULL COMMENT '入校时间',
  `Phone` varchar(20) NOT NULL COMMENT '联系电话',
  `Identification_Card` varchar(20) NOT NULL COMMENT '身份证号',
  `Nation` varchar(20) NOT NULL COMMENT '民族',
  `BirthPlace` varchar(20) DEFAULT NULL COMMENT '出生地',
  `BirthDay` date DEFAULT NULL COMMENT '出生日期',
  `EMail` varchar(50) NOT NULL COMMENT '邮箱',
  PRIMARY KEY (`Id`),
  KEY `Permission` (`Permission`),
  KEY `Academy` (`Academy`),
  KEY `Speciality` (`Speciality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`Id`, `Name`, `Sex`, `Password`, `Academy`, `Permission`, `Speciality`, `Dates_Enrollment`, `Phone`, `Identification_Card`, `Nation`, `BirthPlace`, `BirthDay`, `EMail`) VALUES
(2, '2', '男', '2', 1, 6, 1, '1974-02-19', '2', '2', '2', '2', '1973-11-18', '13120310025@163.com'),
(1212, '21212', '男', '12121', 3, 6, 2, '1975-01-18', '121212', '1212121', '1212', '121212', '1969-11-18', '121212'),
(12212212, '12121', '男', '121212', 1, 6, 3, '1975-03-14', '1212121', '21212', '21212', '12121', '1971-09-17', '12121212'),
(1111111111, 'zero', '男', '000000', 1, 6, 5, '2013-09-01', '12312312312', '333333333333333333', '汉', '北京', '1983-08-01', '875905224@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `tribune`
--

CREATE TABLE IF NOT EXISTS `tribune` (
  `Id` int(10) NOT NULL,
  `Question_Id` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `warning`
--

CREATE TABLE IF NOT EXISTS `warning` (
  `Id` int(10) NOT NULL AUTO_INCREMENT COMMENT '警告ID',
  `StudentId` int(10) NOT NULL COMMENT '学生ID',
  `Title` text NOT NULL COMMENT '警告标题',
  `Content` text NOT NULL COMMENT '警告内容',
  `Time` datetime NOT NULL COMMENT '警告时间',
  PRIMARY KEY (`Id`),
  KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`Building_Id`) REFERENCES `building` (`Id`),
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`Classroom_Id`) REFERENCES `classroom` (`Id`);

--
-- 限制表 `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`Permission`) REFERENCES `permission` (`Id`);

--
-- 限制表 `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`Building_Id`) REFERENCES `building` (`Id`);

--
-- 限制表 `curricula`
--
ALTER TABLE `curricula`
  ADD CONSTRAINT `curricula_ibfk_2` FOREIGN KEY (`Speciality_Id`) REFERENCES `speciality` (`Id`),
  ADD CONSTRAINT `curricula_ibfk_3` FOREIGN KEY (`Academy_Id`) REFERENCES `academy` (`Id`),
  ADD CONSTRAINT `curricula_ibfk_4` FOREIGN KEY (`Type`) REFERENCES `curricula_type` (`Id`);

--
-- 限制表 `curricula_variable`
--
ALTER TABLE `curricula_variable`
  ADD CONSTRAINT `curricula_variable_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Id`),
  ADD CONSTRAINT `curricula_variable_ibfk_2` FOREIGN KEY (`Curricula_Id`) REFERENCES `curricula` (`Id`);

--
-- 限制表 `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Id`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Id`),
  ADD CONSTRAINT `exam_ibfk_3` FOREIGN KEY (`Curricula_Id`) REFERENCES `curricula` (`Id`),
  ADD CONSTRAINT `exam_ibfk_4` FOREIGN KEY (`Building_Id`) REFERENCES `building` (`Id`),
  ADD CONSTRAINT `exam_ibfk_5` FOREIGN KEY (`Classroom_Id`) REFERENCES `classroom` (`Id`);

--
-- 限制表 `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Id`),
  ADD CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`Speciality_Id`) REFERENCES `speciality` (`Id`),
  ADD CONSTRAINT `issue_ibfk_4` FOREIGN KEY (`Academy_Id`) REFERENCES `academy` (`Id`),
  ADD CONSTRAINT `issue_ibfk_5` FOREIGN KEY (`Curricula_Id`) REFERENCES `curricula` (`Id`);

--
-- 限制表 `select_issue`
--
ALTER TABLE `select_issue`
  ADD CONSTRAINT `select_issue_ibfk_1` FOREIGN KEY (`Issue_Id`) REFERENCES `issue` (`Id`),
  ADD CONSTRAINT `select_issue_ibfk_2` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Id`);

--
-- 限制表 `shouke`
--
ALTER TABLE `shouke`
  ADD CONSTRAINT `shouke_ibfk_1` FOREIGN KEY (`Curricula_Id`) REFERENCES `curricula` (`Id`),
  ADD CONSTRAINT `shouke_ibfk_2` FOREIGN KEY (`Classroom_Id`) REFERENCES `classroom` (`Id`),
  ADD CONSTRAINT `shouke_ibfk_3` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Id`),
  ADD CONSTRAINT `shouke_ibfk_4` FOREIGN KEY (`Building_Id`) REFERENCES `building` (`Id`);

--
-- 限制表 `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Grade`) REFERENCES `grade` (`Id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`Permission`) REFERENCES `permission` (`Id`),
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`Academy`) REFERENCES `academy` (`Id`),
  ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`Speciality`) REFERENCES `speciality` (`Id`);

--
-- 限制表 `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Permission`) REFERENCES `permission` (`Id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`Academy`) REFERENCES `academy` (`Id`),
  ADD CONSTRAINT `teacher_ibfk_3` FOREIGN KEY (`Speciality`) REFERENCES `speciality` (`Id`);

--
-- 限制表 `warning`
--
ALTER TABLE `warning`
  ADD CONSTRAINT `warning_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `student` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
