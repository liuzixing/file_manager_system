-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 02 月 25 日 22:58
-- 服务器版本: 5.5.34-0ubuntu0.13.04.1
-- PHP 版本: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fmsys`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_files`
--

CREATE TABLE IF NOT EXISTS `tb_files` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `tb_user_cid` int(11) NOT NULL,
  `corg_file_name` varchar(256) NOT NULL,
  `cguid_file_name` char(40) NOT NULL,
  `ctype` tinyint(2) NOT NULL,
  `cdir` varchar(32) NOT NULL,
  `cstatus` int(11) NOT NULL DEFAULT '1',
  `tb_folder_cid` int(11) NOT NULL,
  `cdate` datetime NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `tb_user_cid` (`tb_user_cid`),
  KEY `tb_folder_cid` (`tb_folder_cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- 表的结构 `tb_folder`
--

CREATE TABLE IF NOT EXISTS `tb_folder` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `tb_user_cid` int(11) NOT NULL,
  `cname` varchar(64) NOT NULL,
  `cdate` datetime NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `tb_user_id` (`tb_user_cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cusername` char(32) NOT NULL,
  `cpassword` varchar(256) NOT NULL,
  `cemail` varchar(256) NOT NULL,
  `clevel` int(11) NOT NULL DEFAULT '1000',
  `cstatus` int(11) NOT NULL DEFAULT '0',
  `cdate` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
