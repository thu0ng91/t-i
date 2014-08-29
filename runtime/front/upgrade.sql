-- ----------------------------
-- Table structure for `searchlog`
-- ----------------------------
DROP TABLE IF EXISTS `searchlog`;
CREATE TABLE `searchlog` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `keywords` varchar(25) NOT NULL COMMENT '搜索关键词',
  `nums` int(8) unsigned NOT NULL,
  `result_nums` int(4) unsigned NOT NULL,
  `lasttime` int(11) unsigned NOT NULL COMMENT '最后搜索时间',
  `dateline` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;