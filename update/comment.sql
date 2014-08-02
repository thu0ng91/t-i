/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50615
Source Host           : localhost:3306
Source Database       : free55

Target Server Type    : MYSQL
Target Server Version : 50615
File Encoding         : 65001

Date: 2014-08-02 14:58:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(8) unsigned NOT NULL,
  `username` varchar(25) NOT NULL,
  `book_id` int(8) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL COMMENT '评论内容',
  `digest` tinyint(1) unsigned NOT NULL COMMENT '是否精华',
  `recommends` int(6) unsigned NOT NULL COMMENT '推荐数',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态1为开启，2为关闭',
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', 'go123', '2', 'asdasd', '0', '0', '1', '1406950860');
INSERT INTO `comment` VALUES ('2', '1', 'go123', '3', 'dsdsdsdsd', '0', '0', '1', '1406951859');
INSERT INTO `comment` VALUES ('3', '1', 'cz2051', '2', '我梦想着绘画，我画着我的梦想', '1', '23', '1', '1406951874');
