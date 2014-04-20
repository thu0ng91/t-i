--
-- 表的结构 `member`
--
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `realname` varchar(32) DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

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
  KEY `memberid_idx` (`memberid`) USING BTREE,
  KEY `bookid_idx` (`bookid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
