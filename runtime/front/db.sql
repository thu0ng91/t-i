SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `realname` varchar(32) DEFAULT NULL,
  `roleid` tinyint(2) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `loginhits` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '书名',
  `author` varchar(32) DEFAULT NULL COMMENT '作者',
  `authorid` int(10) NOT NULL DEFAULT '0' COMMENT '作者编号',
  `cid` int(10) DEFAULT NULL COMMENT '栏目',
  `flag` tinyint(1) DEFAULT NULL COMMENT '小说完本标志：1 连载 2 完本 ',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键字',
  `summary` varchar(1000) DEFAULT NULL COMMENT '简介',
  `pinyin` varchar(200) DEFAULT NULL COMMENT '拼音',
  `initial` char(1) DEFAULT NULL COMMENT '首字母',
  `recommendlevel` tinyint(2) DEFAULT '0' COMMENT '后台推荐等级',
  `favoritenum` int(11) DEFAULT '0' COMMENT '收藏数',
  `chaptercount` int(11) DEFAULT '0' COMMENT '章节数',
  `volumecount` int(11) DEFAULT '0' COMMENT '分卷数',
  `wordcount` int(11) DEFAULT '0' COMMENT '字数',
  `lastchapterid` int(11) DEFAULT NULL COMMENT '最后更新章节编号',
  `lastchaptertitle` varchar(100) DEFAULT NULL COMMENT '最后更新章节名',
  `lastchaptertime` int(11) DEFAULT NULL COMMENT '章节最后更新时间',
  `alllikenum` int(11) NOT NULL DEFAULT '0' COMMENT '总推荐数',
  `monthlikenum` int(11) NOT NULL DEFAULT '0' COMMENT '月推荐数',
  `weeklikenum` int(11) NOT NULL DEFAULT '0' COMMENT '周推荐数',
  `daylikenum` int(11) NOT NULL DEFAULT '0' COMMENT '日推荐数',
  `lastliketime` int(11) DEFAULT NULL COMMENT '最后推荐时间',
  `allclicks` int(11) NOT NULL DEFAULT '0' COMMENT '总点击数',
  `monthclicks` int(11) NOT NULL DEFAULT '0' COMMENT '月点击数',
  `weekclicks` int(11) NOT NULL DEFAULT '0' COMMENT '周点击数',
  `dayclicks` int(11) NOT NULL DEFAULT '0' COMMENT '日点击数',
  `lastclicktime` int(11) DEFAULT NULL COMMENT '最后点击时间',
  `hascover` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否存在封面图，0 否 1 是',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_uniq_title_idx` (`title`),
  KEY `book_cid_idx` (`cid`),
  KEY `book_pinyin_idx` (`pinyin`),
  KEY `book_lastchpatertime_idx` (`lastchaptertime`),
  KEY `book_createtime_idx` (`createtime`),
  FULLTEXT KEY `book_fulltext_idx` (`title`,`author`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for book_image
-- ----------------------------
DROP TABLE IF EXISTS `book_image`;
CREATE TABLE `book_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL COMMENT '书籍编号',
  `chapterid` int(11) NOT NULL DEFAULT '0' COMMENT '章节编号，当为章节编号时，封面编号为0',
  `imgurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片地址',
  `iscover` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否封面图：0 否 1 是',
  `createtime` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for book_tags
-- ----------------------------
DROP TABLE IF EXISTS `book_tags`;
CREATE TABLE `book_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(11) NOT NULL DEFAULT '0' COMMENT 'tag编号',
  `bookid` int(11) NOT NULL DEFAULT '0' COMMENT '书籍编号',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `shorttitle` varchar(100) DEFAULT NULL COMMENT '英文、拼音名称',
  `parentid` int(10) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `imgurl` varchar(200) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` text,
  `createtime` int(10) NOT NULL COMMENT '创建时间',
  `updatetime` int(10) NOT NULL COMMENT '更新时间',
  `isnav` tinyint(1) DEFAULT '0' COMMENT '是否显示在导航上，0 不显示 1 显示',
  `sort` tinyint(4) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '模块标题',
  `name` varchar(50) NOT NULL COMMENT '模块名称：与模块目录名一致',
  `author` varchar(10) NOT NULL COMMENT '模块作者',
  `version` varchar(10) NOT NULL COMMENT '模块版本',
  `upgradeversion` varchar(10) DEFAULT NULL COMMENT '模块升级版本号',
  `fwversion` varchar(10) NOT NULL COMMENT '模块所需最低云阅系统版本',
  `description` varchar(500) NOT NULL COMMENT '模块描述',
  `adminmenus` varchar(1000) DEFAULT NULL COMMENT '管理员菜单数组序列化',
  `createtime` int(11) NOT NULL COMMENT '模块引入系统时间',
  `updatetime` int(11) NOT NULL COMMENT '模块调整时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0 未安装 1 已安装 -1 已禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_name_uniq` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_uniq_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='TAG表';


-- ----------------------------
-- Table structure for plugins
-- ----------------------------
DROP TABLE IF EXISTS `plugins`;
CREATE TABLE `plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '插件标题',
  `name` varchar(50) NOT NULL COMMENT '插件名称：与插件目录名一致',
  `author` varchar(10) NOT NULL COMMENT '插件作者',
  `version` varchar(10) NOT NULL COMMENT '插件版本',
  `upgradeversion` varchar(10) DEFAULT NULL COMMENT '插件升级版本号',
  `fwversion` varchar(10) NOT NULL COMMENT '插件所需最低云阅系统版本',
  `description` varchar(500) NOT NULL COMMENT '插件描述',
  `adminmenus` varchar(1000) DEFAULT NULL COMMENT '管理员菜单数组序列化',
  `createtime` int(11) NOT NULL COMMENT '插件引入系统时间',
  `updatetime` int(11) NOT NULL COMMENT '插件调整时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0 未安装 1 已安装 -1 已禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_name_uniq` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;