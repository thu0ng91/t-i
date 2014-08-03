/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50615
Source Host           : localhost:3306
Source Database       : free55

Target Server Type    : MYSQL
Target Server Version : 50615
File Encoding         : 65001

Date: 2014-08-03 23:32:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `friendlink`
-- ----------------------------
DROP TABLE IF EXISTS `friendlink`;
CREATE TABLE `friendlink` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `sequence` tinyint(3) NOT NULL DEFAULT '0' COMMENT '显示顺序，正序',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT 'url',
  `description` mediumtext NOT NULL COMMENT '解释说明',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT 'logo',
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL,
  `dateline` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of friendlink
-- ----------------------------
INSERT INTO `friendlink` VALUES ('5', '0', '梦想论坛2', 'http://www.mxphp.com', 'SAD', 'uploads/friendlink/1407079629.jpg', '1', '1', '1407079358');
