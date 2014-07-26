CREATE TABLE `block` (
  `bid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `blockname` varchar(50) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `vars` varchar(255) NOT NULL,
  `blocktype` varchar(10) NOT NULL DEFAULT '0',
  `sequence` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cachetime` int(10) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;