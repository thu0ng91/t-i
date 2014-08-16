--
-- 表的结构 `member`
--
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 表的结构 `member_book`
--
CREATE TABLE IF NOT EXISTS `member_book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `memberid` int(11) NOT NULL COMMENT '用户编号',
  `bookid` int(11) NOT NULL COMMENT '小说编号',
  `readchapterid` int(11) DEFAULT NULL COMMENT '最后更新章节编号',
  `readchaptertitle` varchar(100) DEFAULT NULL COMMENT '最后更新章节名',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `memberid_idx` (`memberid`),
  KEY `bookid_idx` (`bookid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 表的结构 `bookcase`
--
DROP TABLE IF EXISTS `bookcase`;
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