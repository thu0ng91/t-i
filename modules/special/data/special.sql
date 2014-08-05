/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50615
Source Host           : localhost:3306
Source Database       : free55

Target Server Type    : MYSQL
Target Server Version : 50615
File Encoding         : 65001

Date: 2014-08-05 23:20:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `special`
-- ----------------------------
DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL COMMENT '专题简介',
  `template` varchar(100) NOT NULL COMMENT '专题模板',
  `author` varchar(25) NOT NULL COMMENT '作者',
  `status` tinyint(1) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of special
-- ----------------------------
