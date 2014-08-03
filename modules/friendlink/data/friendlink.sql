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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接表';