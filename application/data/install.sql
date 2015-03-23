DROP TABLE IF EXISTS `skeeter_member`;
CREATE TABLE IF NOT EXISTS `skeeter_member` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
`reg_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
`username` varchar(15) collate utf8_unicode_ci NOT NULL,
`password` varchar(40) collate utf8_unicode_ci NOT NULL,
`email` varchar(40) collate utf8_unicode_ci NOT NULL,
`active` tinyint(1) unsigned NOT NULL,
`reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
`last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
`last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
`update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
`sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
`birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
`qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
`score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
`signature` text,
`tox_money` int(11),
`pos_province` int(11),
`pos_city` int(11),
`hash` varchar(40) collate utf8_unicode_ci NOT NULL,
`change_password` tinyint(1) unsigned NOT NULL default '0',
`last_failure` int(10) unsigned NOT NULL default '0',
`failed_logins` tinyint(2) unsigned NOT NULL default '0',
`pos_district` int(11),
`login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
`status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
PRIMARY KEY (`id`),
UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `skeeter_avatar`;
CREATE TABLE IF NOT EXISTS `skeeter_avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `create_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `is_temp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `skeeter_school_detail`;
CREATE TABLE IF NOT EXISTS `skeeter_school_detail` (
`sch_id` int(11) NOT NULL AUTO_INCREMENT,
`sch_name` varchar(50) NOT NULL,
`type` int(11) NOT NULL COMMENT '学校性质',
`band` varchar(50) NULL COMMENT '学校标签',
`build_time` varchar(20) NOT NULL COMMENT '学校成立时间',
`com_score` int(11) COMMENT '学校评分',
`com_num` int(11) COMMENT '评价人数',
`range` int(4) COMMENT '历史排名趋势',
`district` int(4) COMMENT '学区',
`site` varchar(50) COMMENT '网站',
`tel` varchar(20) COMMENT '学校电话',
`level` varchar(20) COMMENT '学校层次',
`address` varchar(100) NOT NULL COMMENT '学校地址',
`country` varchar(4) COMMENT '国家',
`province` varchar(4) COMMENT '省',
`city` varchar(4) COMMENT '市',
`status` int(11) NOT NULL,
`introduce` varchar(200) NOT NULL COMMENT '学校简介',
PRIMARY KEY (`sch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `skeeter_school_score`;
CREATE TABLE IF NOT EXISTS `skeeter_school_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL default 0,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `skeeter_school_image`;
CREATE TABLE IF NOT EXISTS `skeeter_school_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `create_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `is_temp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `skeeter_school_comment`;
CREATE TABLE IF NOT EXISTS `skeeter_school_comment` (
`comment_id` int(11) NOT NULL AUTO_INCREMENT,
`school_id`  int(11) NOT NULL,
`uid` int(11) NOT NULL,
`title` text NOT NULL,
`content` text NOT NULL,
`create_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
`update_time` timestamp,
`praise_num` int(11) NOT NULL,
`status` int(11) NOT NULL,
PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `skeeter_school_reply`;
CREATE TABLE IF NOT EXISTS `skeeter_school_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `replayto_uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_time`  timestamp NOT NULL default CURRENT_TIMESTAMP,
  `update_time`  timestamp,
  `praise_num` int(11) NOT NULL default 0,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `skeeter_praise`;
CREATE TABLE IF NOT EXISTS `skeeter_praise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `praisetoid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `praisetype` int(4) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `skeeter_focus`;
CREATE TABLE IF NOT EXISTS `skeeter_focus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `skeeter_thanks`;
CREATE TABLE IF NOT EXISTS `skeeter_thanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
//id采用最大加随机数产生
				