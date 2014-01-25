/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : fwxsdb

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-01-26 00:07:57
*/

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'ce17e9af3c4ad636c26a240b0e2c73cb', null, '1', null, null, null, null, '1388063493', '1388063493', null, '1', '0');

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(500) NOT NULL COMMENT '广告代码',
  `createtime` int(11) NOT NULL COMMENT '创建时间',
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态： -1 删除 0 待审 1 正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ads
-- ----------------------------

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
  KEY `book_createtime_idx` (`createtime`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('14', '苍天霸业', '一般不发言', '0', '1', '1', '神奇、飞舞', '玄武大陆，宗门林立，征战不休。　　林枫，一个来自乡间的普通少年，因为一个神秘老者，一个玉坠，命运发现惊人的逆转。　　纷乱世间，只有自己强大，才可以守护心爱之人。变强，才不会被他人欺辱。　　变强，才有资格与心爱的女人比肩。变强，才能带领宗门，从默默无闻走向傲视天下。　　且看一个乡下少年，如何从一个最小的宗门开始起步，一步步崛起，最终横扫整个玄武大陆，...... ', 'cangtianbaye', 'c', '0', '0', '1', '0', '3794', '1', '第一章 林枫', '1390572443', '0', '0', '0', '0', null, '46', '46', '46', '46', '1390665045', '1', '1390571590', '1390571590', '1');
INSERT INTO `book` VALUES ('15', '苍天霸业2', '一般不发言', '0', '1', '1', '神奇、飞舞', '玄武大陆，宗门林立，征战不休。　　林枫，一个来自乡间的普通少年，因为一个神秘老者，一个玉坠，命运发现惊人的逆转。　　纷乱世间，只有自己强大，才可以守护心爱之人。变强，才不会被他人欺辱。　　变强，才有资格与心爱的女人比肩。变强，才能带领宗门，从默默无闻走向傲视天下。　　且看一个乡下少年，如何从一个最小的宗门开始起步，一步步崛起，最终横扫整个玄武大陆，...... ', 'cangtianbaye', 'c', '0', '0', '1', '0', '3794', '1', '第一章 林枫', '1390572443', '0', '0', '0', '0', null, '0', '0', '0', '0', null, '1', '1390571590', '1390571590', '1');
INSERT INTO `book` VALUES ('16', '苍天霸业3', '一般不发言', '0', '1', '1', '神奇、飞舞', '玄武大陆，宗门林立，征战不休。　　林枫，一个来自乡间的普通少年，因为一个神秘老者，一个玉坠，命运发现惊人的逆转。　　纷乱世间，只有自己强大，才可以守护心爱之人。变强，才不会被他人欺辱。　　变强，才有资格与心爱的女人比肩。变强，才能带领宗门，从默默无闻走向傲视天下。　　且看一个乡下少年，如何从一个最小的宗门开始起步，一步步崛起，最终横扫整个玄武大陆，...... ', 'cangtianbaye', 'c', '0', '0', '1', '0', '3794', '1', '第一章 林枫', '1390572443', '0', '0', '0', '0', null, '0', '0', '0', '0', null, '1', '1390571590', '1390571590', '1');
INSERT INTO `book` VALUES ('17', '苍天霸业4', '一般不发言', '0', '1', '1', '神奇、飞舞', '玄武大陆，宗门林立，征战不休。　　林枫，一个来自乡间的普通少年，因为一个神秘老者，一个玉坠，命运发现惊人的逆转。　　纷乱世间，只有自己强大，才可以守护心爱之人。变强，才不会被他人欺辱。　　变强，才有资格与心爱的女人比肩。变强，才能带领宗门，从默默无闻走向傲视天下。　　且看一个乡下少年，如何从一个最小的宗门开始起步，一步步崛起，最终横扫整个玄武大陆，...... ', 'cangtianbaye', 'c', '0', '0', '1', '0', '3794', '1', '第一章 林枫', '1390572443', '0', '0', '0', '0', null, '0', '0', '0', '0', null, '1', '1390571590', '1390571590', '1');
INSERT INTO `book` VALUES ('18', '苍天霸业5', '一般不发言', '0', '1', '1', '神奇、飞舞', '玄武大陆，宗门林立，征战不休。　　林枫，一个来自乡间的普通少年，因为一个神秘老者，一个玉坠，命运发现惊人的逆转。　　纷乱世间，只有自己强大，才可以守护心爱之人。变强，才不会被他人欺辱。　　变强，才有资格与心爱的女人比肩。变强，才能带领宗门，从默默无闻走向傲视天下。　　且看一个乡下少年，如何从一个最小的宗门开始起步，一步步崛起，最终横扫整个玄武大陆，...... ', 'cangtianbaye', 'c', '0', '0', '1', '0', '3794', '1', '第一章 林枫', '1390572443', '0', '0', '0', '0', null, '0', '0', '0', '0', null, '1', '1390571590', '1390571590', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of book_image
-- ----------------------------
INSERT INTO `book_image` VALUES ('1', '9', '0', '/uploads/book/2014-01/138953446823805.jpg', '1', '1389534468');
INSERT INTO `book_image` VALUES ('2', '10', '0', '/uploads/book/2014-01/139014712411154.jpg', '1', '1390147124');
INSERT INTO `book_image` VALUES ('3', '11', '0', '/uploads/book/2014-01/139014727223126.jpg', '1', '1390147272');
INSERT INTO `book_image` VALUES ('4', '12', '0', '/uploads/book/2014-01/139031938519435.jpg', '1', '1390319385');
INSERT INTO `book_image` VALUES ('5', '13', '0', '/uploads/book/2014-01/139039541812187.jpg', '1', '1390395418');
INSERT INTO `book_image` VALUES ('6', '13', '0', '/uploads/book/2014-01/139039541812088.jpg', '1', '1390395418');
INSERT INTO `book_image` VALUES ('7', '14', '0', '/uploads/book/2014-01/1390571590104.jpg', '1', '1390571590');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of book_tags
-- ----------------------------
INSERT INTO `book_tags` VALUES ('1', '9', '14', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '玄幻小说', 'xuanhuanxiaoshuo', '0', null, null, '', '玄幻、东方玄幻', '好看的玄幻小说', '1389021958', '1389021958', '1', '0', '1');

-- ----------------------------
-- Table structure for friend_link
-- ----------------------------
DROP TABLE IF EXISTS `friend_link`;
CREATE TABLE `friend_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '站点名',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '站点LOGO',
  `linkurl` varchar(500) DEFAULT NULL COMMENT '站点地址',
  `sort` tinyint(2) NOT NULL DEFAULT '0' COMMENT '排序号',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '状态：0 待审 1 审核通过 -1 删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend_link
-- ----------------------------

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
  `fwversion` varchar(10) NOT NULL COMMENT '模块所需最低飞舞系统版本',
  `description` varchar(500) NOT NULL COMMENT '模块描述',
  `adminmenus` varchar(500) DEFAULT NULL COMMENT '管理员菜单数组序列化',
  `createtime` int(11) NOT NULL COMMENT '模块引入系统时间',
  `updatetime` int(11) NOT NULL COMMENT '模块调整时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态：0 未安装 1 已安装 -1 已禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_name_uniq` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('14', '小说连载模块', 'book', 'pizigou', '1.0.1', null, '1.2.3', '小说连载系统', 'a:2:{s:3:\"top\";a:2:{s:5:\"label\";s:12:\"小说管理\";s:3:\"url\";s:21:\"book/admin/book/index\";}s:4:\"left\";a:2:{i:0;a:2:{s:5:\"label\";s:18:\"小说栏目管理\";s:3:\"url\";s:25:\"book/admin/category/index\";}i:1;a:2:{s:5:\"label\";s:12:\"小说管理\";s:3:\"url\";s:21:\"book/admin/book/index\";}}}', '1389445562', '1389445562', '1');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `shorttitle` varchar(100) DEFAULT NULL COMMENT '英文、拼音名称',
  `parentid` int(11) DEFAULT NULL,
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

-- ----------------------------
-- Records of news_category
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'system', 'SystemBaseConfig', 'O:16:\"SystemBaseConfig\":13:{s:8:\"SiteName\";s:15:\"飞舞小说网\";s:12:\"SiteKeywords\";s:12:\"飞舞小说\";s:9:\"SiteIntro\";s:0:\"\";s:13:\"SiteCopyright\";s:0:\"\";s:14:\"SiteAdminEmail\";s:16:\"pizigou@yeah.net\";s:18:\"SiteAttachmentPath\";N;s:9:\"SiteTheme\";s:6:\"paitxt\";s:15:\"SiteIsUsedCache\";s:1:\"0\";s:15:\"\0CModel\0_errors\";a:0:{}s:19:\"\0CModel\0_validators\";O:5:\"CList\":5:{s:9:\"\0CList\0_d\";a:5:{i:0;O:18:\"CRequiredValidator\":11:{s:13:\"requiredValue\";N;s:6:\"strict\";b:0;s:10:\"attributes\";a:1:{i:0;s:8:\"SiteName\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:1;O:15:\"CEmailValidator\":16:{s:7:\"pattern\";s:163:\"/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/\";s:11:\"fullPattern\";s:170:\"/^[^@]*<[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/\";s:9:\"allowName\";b:0;s:7:\"checkMX\";b:0;s:9:\"checkPort\";b:0;s:10:\"allowEmpty\";b:1;s:11:\"validateIDN\";b:0;s:10:\"attributes\";a:1:{i:0;s:14:\"SiteAdminEmail\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:2;O:17:\"CBooleanValidator\":13:{s:9:\"trueValue\";s:1:\"1\";s:10:\"falseValue\";s:1:\"0\";s:6:\"strict\";b:0;s:10:\"allowEmpty\";b:1;s:10:\"attributes\";a:1:{i:0;s:15:\"SiteIsUsedCache\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:3;O:16:\"CStringValidator\":16:{s:3:\"max\";i:100;s:3:\"min\";N;s:2:\"is\";N;s:8:\"tooShort\";N;s:7:\"tooLong\";N;s:10:\"allowEmpty\";b:1;s:8:\"encoding\";N;s:10:\"attributes\";a:1:{i:0;s:8:\"SiteName\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:4;O:16:\"CStringValidator\":16:{s:3:\"max\";i:255;s:3:\"min\";N;s:2:\"is\";N;s:8:\"tooShort\";N;s:7:\"tooLong\";N;s:10:\"allowEmpty\";b:1;s:8:\"encoding\";N;s:10:\"attributes\";a:5:{i:0;s:12:\"SiteKeywords\";i:1;s:9:\"SiteIntro\";i:2;s:13:\"SiteCopyright\";i:3;s:18:\"SiteAttachmentPath\";i:4;s:9:\"SiteTheme\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}}s:9:\"\0CList\0_c\";i:5;s:9:\"\0CList\0_r\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}s:17:\"\0CModel\0_scenario\";s:0:\"\";s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}');
INSERT INTO `settings` VALUES ('2', 'system', 'SystemRewriteConfig', 'O:19:\"SystemRewriteConfig\":13:{s:34:\"\0SystemRewriteConfig\0idPatternRule\";s:14:\"/(\\{id\\}){1}/i\";s:42:\"\0SystemRewriteConfig\0shortTitlePatternRule\";s:22:\"/(\\{shorttitle\\}){1}/i\";s:9:\"UrlSuffix\";s:1:\"0\";s:12:\"CategoryRule\";s:0:\"\";s:14:\"BookDetailRule\";s:0:\"\";s:17:\"ChapterDetailRule\";s:0:\"\";s:12:\"NewsListRule\";s:0:\"\";s:14:\"NewsDetailRule\";s:0:\"\";s:15:\"\0CModel\0_errors\";a:0:{}s:19:\"\0CModel\0_validators\";O:5:\"CList\":5:{s:9:\"\0CList\0_d\";a:6:{i:0;O:15:\"CRangeValidator\":13:{s:5:\"range\";a:6:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;}s:6:\"strict\";b:0;s:10:\"allowEmpty\";b:1;s:3:\"not\";b:0;s:10:\"attributes\";a:1:{i:0;s:9:\"UrlSuffix\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:1;O:27:\"CRegularExpressionValidator\":12:{s:7:\"pattern\";s:22:\"/(\\{shorttitle\\}){1}/i\";s:10:\"allowEmpty\";b:1;s:3:\"not\";b:0;s:10:\"attributes\";a:1:{i:0;s:12:\"CategoryRule\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:2;O:27:\"CRegularExpressionValidator\":12:{s:7:\"pattern\";s:14:\"/(\\{id\\}){1}/i\";s:10:\"allowEmpty\";b:1;s:3:\"not\";b:0;s:10:\"attributes\";a:1:{i:0;s:14:\"BookDetailRule\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:3;O:27:\"CRegularExpressionValidator\":12:{s:7:\"pattern\";s:14:\"/(\\{id\\}){1}/i\";s:10:\"allowEmpty\";b:1;s:3:\"not\";b:0;s:10:\"attributes\";a:1:{i:0;s:17:\"ChapterDetailRule\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:4;O:27:\"CRegularExpressionValidator\":12:{s:7:\"pattern\";s:14:\"/(\\{id\\}){1}/i\";s:10:\"allowEmpty\";b:1;s:3:\"not\";b:0;s:10:\"attributes\";a:1:{i:0;s:12:\"NewsListRule\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}i:5;O:27:\"CRegularExpressionValidator\":12:{s:7:\"pattern\";s:14:\"/(\\{id\\}){1}/i\";s:10:\"allowEmpty\";b:1;s:3:\"not\";b:0;s:10:\"attributes\";a:1:{i:0;s:14:\"NewsDetailRule\";}s:7:\"message\";N;s:11:\"skipOnError\";b:0;s:2:\"on\";a:0:{}s:6:\"except\";a:0:{}s:4:\"safe\";b:1;s:22:\"enableClientValidation\";b:1;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}}s:9:\"\0CList\0_c\";i:6;s:9:\"\0CList\0_r\";b:0;s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}s:17:\"\0CModel\0_scenario\";s:0:\"\";s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_uniq_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='TAG表';

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('19', 'tese');
INSERT INTO `tags` VALUES ('14', '伦理');
INSERT INTO `tags` VALUES ('3', '发觉');
INSERT INTO `tags` VALUES ('1', '同人');
INSERT INTO `tags` VALUES ('18', '奇幻');
INSERT INTO `tags` VALUES ('20', '奇葩');
INSERT INTO `tags` VALUES ('2', '女性');
INSERT INTO `tags` VALUES ('13', '张山');
INSERT INTO `tags` VALUES ('10', '快餐');
INSERT INTO `tags` VALUES ('15', '暴力');
INSERT INTO `tags` VALUES ('6', '测试');
INSERT INTO `tags` VALUES ('9', '玄幻');
INSERT INTO `tags` VALUES ('16', '神功');
INSERT INTO `tags` VALUES ('17', '神奇');
INSERT INTO `tags` VALUES ('4', '祸水');
INSERT INTO `tags` VALUES ('5', '红颜');
INSERT INTO `tags` VALUES ('11', '美女');
INSERT INTO `tags` VALUES ('12', '选美');
INSERT INTO `tags` VALUES ('8', '铁血');
INSERT INTO `tags` VALUES ('7', '飞舞');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for user_book_favorites
-- ----------------------------
DROP TABLE IF EXISTS `user_book_favorites`;
CREATE TABLE `user_book_favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0： 收藏 1：推荐',
  `title` varchar(100) NOT NULL COMMENT '小说名称',
  `bookid` int(10) NOT NULL COMMENT '小说编号',
  `createtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_book_favorites
-- ----------------------------
