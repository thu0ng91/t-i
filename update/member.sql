/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : yunyue

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-08-13 13:37:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `realname` varchar(32) DEFAULT NULL,
  `gender` tinyint(1) unsigned DEFAULT NULL COMMENT '性别：1 男 2 女',
  `avatar` varchar(50) DEFAULT NULL,
  `level` tinyint(2) DEFAULT '0' COMMENT '等级：0 普通',
  `vip_level` tinyint(2) DEFAULT '0' COMMENT 'VIP等级：0 非VIP 1 一级VIP',
  `telephone` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '状态：0 待审 1 审核通过 -1 拒绝',
  `loginhits` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username_idx` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
