CREATE TABLE `bookcase` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(8) unsigned NOT NULL COMMENT '小说ID',
  `userid` int(8) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(25) NOT NULL COMMENT '用户名',
  `lastviewtime` int(11) unsigned NOT NULL COMMENT '最后查看时间',
  `dateline` int(11) unsigned NOT NULL COMMENT '添加时间',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态，1为正常，2为删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
