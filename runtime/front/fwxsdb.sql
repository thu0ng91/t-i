-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.16 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出  表 fwxsdb.admin 结构
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.ads 结构
DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(500) NOT NULL COMMENT '广告代码',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态： -1 删除 0 待审 1 正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.article 结构
DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '章节标题',
  `bookid` int(10) NOT NULL COMMENT '章节所属书籍',
  `volumeid` int(10) NOT NULL DEFAULT '0' COMMENT '分卷编号',
  `chapterorder` smallint(6) NOT NULL DEFAULT '0' COMMENT '章节号',
  `createtime` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`),
  KEY `chapter` (`chapterorder`),
  KEY `bookid` (`bookid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.book 结构
DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  KEY `book_pinyin_idx` (`pinyin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.book_image 结构
DROP TABLE IF EXISTS `book_image`;
CREATE TABLE IF NOT EXISTS `book_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookid` int(10) NOT NULL COMMENT '书籍编号',
  `imgurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片地址',
  `iscover` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否封面图：0 否 1 是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.book_tags 结构
DROP TABLE IF EXISTS `book_tags`;
CREATE TABLE IF NOT EXISTS `book_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(11) NOT NULL DEFAULT '0' COMMENT 'tag编号',
  `bookid` int(11) NOT NULL DEFAULT '0' COMMENT '书籍编号',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.category 结构
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.friend_link 结构
DROP TABLE IF EXISTS `friend_link`;
CREATE TABLE IF NOT EXISTS `friend_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '站点名',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '站点LOGO',
  `linkurl` varchar(500) DEFAULT NULL COMMENT '站点地址',
  `sort` tinyint(2) NOT NULL DEFAULT '0' COMMENT '排序号',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.modules 结构
DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '模块标题',
  `name` varchar(50) NOT NULL COMMENT '模块名称：与模块目录名一致',
  `author` varchar(10) NOT NULL COMMENT '模块作者',
  `version` varchar(10) NOT NULL COMMENT '模块版本',
  `upgradeversion` varchar(10) DEFAULT NULL COMMENT '模块升级版本号',
  `fwversion` varchar(10) NOT NULL COMMENT '模块所需最低飞舞系统版本',
  `description` varchar(500) NOT NULL COMMENT '模块描述',
  `adminmenus` varchar(500) DEFAULT NULL COMMENT '管理员菜单数组序列化',
  `createtime` int(11) NOT NULL COMMENT '模块引入系统时间',
  `updatetime` int(11) NOT NULL COMMENT '模块调整时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0 未安装 1 已安装 -1 已禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_name_uniq` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.news 结构
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '新闻标题',
  `author` varchar(32) DEFAULT NULL COMMENT '作者',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键字',
  `cid` int(10) DEFAULT NULL COMMENT '栏目',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '封面图',
  `summary` varchar(255) DEFAULT NULL COMMENT '简介',
  `content` text COMMENT '内容',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `hits` int(10) DEFAULT NULL COMMENT '点击数',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.news_category 结构
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `shorttitle` varchar(100) DEFAULT NULL COMMENT '英文、拼音名称',
  `parentid` int(10) DEFAULT NULL,
  `imgurl` varchar(200) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` text,
  `createtime` int(10) NOT NULL COMMENT '创建时间',
  `updatetime` int(10) NOT NULL COMMENT '更新时间',
  `sort` tinyint(2) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.settings 结构
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.tags 结构
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_uniq_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='TAG表';

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.user 结构
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `realname` varchar(30) DEFAULT NULL,
  `roleid` tinyint(2) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `qq` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `loginhits` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.user_book_favorites 结构
DROP TABLE IF EXISTS `user_book_favorites`;
CREATE TABLE IF NOT EXISTS `user_book_favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0： 收藏 1：推荐',
  `title` varchar(100) NOT NULL COMMENT '小说名称',
  `bookid` int(10) NOT NULL COMMENT '小说编号',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 fwxsdb.volume 结构
DROP TABLE IF EXISTS `volume`;
CREATE TABLE IF NOT EXISTS `volume` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookid` int(10) NOT NULL DEFAULT '0' COMMENT '书籍编号',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '分卷标题',
  `chaptercount` smallint(6) NOT NULL DEFAULT '0' COMMENT '分卷章节数',
  `createtime` int(10) DEFAULT '0' COMMENT '章节创捷时间',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '分卷序号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='分卷';

-- 数据导出被取消选择。
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
