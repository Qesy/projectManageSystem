-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 03 月 06 日 11:03
-- 服务器版本: 5.5.29-0ubuntu0.12.04.1
-- PHP 版本: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `project_manager`
--

-- --------------------------------------------------------

--
-- 表的结构 `pj_mail`
--

CREATE TABLE IF NOT EXISTS `pj_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_host` varchar(100) CHARACTER SET latin1 NOT NULL,
  `smtp_user` varchar(100) CHARACTER SET latin1 NOT NULL,
  `smtp_pass` varchar(50) CHARACTER SET latin1 NOT NULL,
  `smtp_port` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `pj_mail`
--

INSERT INTO `pj_mail` (`id`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`) VALUES
(1, 'smtp.qq.com', 'admin@qq.com', '123456', 25);

-- --------------------------------------------------------

--
-- 表的结构 `pj_system`
--

CREATE TABLE IF NOT EXISTS `pj_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `is_open_reg` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `pj_system`
--

INSERT INTO `pj_system` (`id`, `project_name`, `logo`, `copyright`, `is_open_reg`) VALUES
(1, '项目管理系统', '/static/img/logo.png', '项目管理系统', 0);

-- --------------------------------------------------------

--
-- 表的结构 `pj_ticket`
--

CREATE TABLE IF NOT EXISTS `pj_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `process_user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `post_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pj_user`
--

CREATE TABLE IF NOT EXISTS `pj_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `workgroup_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `reg_time` int(11) NOT NULL,
  `is_no_process` tinyint(4) NOT NULL,
  `is_processing` tinyint(4) NOT NULL,
  `is_finished` tinyint(4) NOT NULL,
  `is_cancled` tinyint(4) NOT NULL,
  `is_closed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `pj_user`
--

INSERT INTO `pj_user` (`id`, `username`, `password`, `email`, `workgroup_id`, `status`, `last_login_time`, `reg_time`, `is_no_process`, `is_processing`, `is_finished`, `is_cancled`, `is_closed`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'young@9yuejiu.com', 2, 1, 1352182255, 1352182255, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pj_workgroup`
--

CREATE TABLE IF NOT EXISTS `pj_workgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workgroupname` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `pj_workgroup`
--

INSERT INTO `pj_workgroup` (`id`, `workgroupname`) VALUES
(1, '普通用户'),
(2, '管理员');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
