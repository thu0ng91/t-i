
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `bookcase`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- -----------------
--
-- -----------------
update modules set fwversion='1.0.0', version='1.0.0';
