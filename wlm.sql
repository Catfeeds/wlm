/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50173
Source Host           : localhost:3306
Source Database       : wlm

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2015-04-09 16:01:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for th_ability
-- ----------------------------
DROP TABLE IF EXISTS `th_ability`;
CREATE TABLE `th_ability` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aname` varchar(20) NOT NULL COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='能力表';

-- ----------------------------
-- Records of th_ability
-- ----------------------------
INSERT INTO `th_ability` VALUES ('1', '创业者');
INSERT INTO `th_ability` VALUES ('2', '投资人');
INSERT INTO `th_ability` VALUES ('3', '程序员');
INSERT INTO `th_ability` VALUES ('4', '设计师');
INSERT INTO `th_ability` VALUES ('5', '市场销售');
INSERT INTO `th_ability` VALUES ('6', '媒体');
INSERT INTO `th_ability` VALUES ('7', '学生');
INSERT INTO `th_ability` VALUES ('8', 'BD运营');
INSERT INTO `th_ability` VALUES ('9', '财务法务');
INSERT INTO `th_ability` VALUES ('10', '人力资源');
INSERT INTO `th_ability` VALUES ('11', '政府部门');
INSERT INTO `th_ability` VALUES ('12', '天使投资人');
INSERT INTO `th_ability` VALUES ('13', '顾问导师');
INSERT INTO `th_ability` VALUES ('14', '产品');
INSERT INTO `th_ability` VALUES ('15', '营销推广');
INSERT INTO `th_ability` VALUES ('16', '其他');

-- ----------------------------
-- Table structure for th_actity
-- ----------------------------
DROP TABLE IF EXISTS `th_actity`;
CREATE TABLE `th_actity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '活动标题',
  `atime` varchar(20) NOT NULL COMMENT '活动时间',
  `address` varchar(255) NOT NULL COMMENT '活动地点',
  `pnum` int(10) unsigned NOT NULL COMMENT '活动人数',
  `money` varchar(255) NOT NULL COMMENT '活动花费',
  `pubname` varchar(255) NOT NULL COMMENT '发布者',
  `content` text NOT NULL COMMENT '活动内容',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `addtime` varchar(20) NOT NULL COMMENT '添加时间',
  `isshow` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '显示',
  `status` int(10) unsigned NOT NULL COMMENT '1未开始2进行中3已结束',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='活动表';

-- ----------------------------
-- Records of th_actity
-- ----------------------------
INSERT INTO `th_actity` VALUES ('1', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('2', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('3', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('4', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('5', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('6', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('7', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('8', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('9', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('10', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('11', '和海尔一起再创业——海尔自由创业者招募行动 | 深圳站', '2014年10月26日', '深圳 · 3W咖啡 ', '150', '免费', 'it桔子', ' 随着智能终端的普及，移动互联网迅速崛起，移动应用已经从消费类客户全面渗透到向企业级客户以及企业业务的各个层面，无论是经营、内部控制还是战略决策，都在释放移动应用需求。去年开始有多个迹象表明，IT企业级市场正在爆发。根据IT桔子数据库统计，2013年企业级服务领域投资事件81起，而这一数字在2014年截止到10月底是120起。\r\n\r\n\r\n互联网企业进军企业IT市场一方面得益于IT消费化的大浪潮，互联网企业以“用户为中心”的产品开发理念，越来越多的被大家接纳。投资火热的当下，我们的创业公司在做怎样的实践？经营现状又如何？这也是本期的IT桔子沙龙将要与大家共同探讨的。\r\n本次活动计划11月16日（周日）下午2点-5点在北京车库咖啡举行，我们将邀请以下公司一起交流分享：', '', '', '1', '0');
INSERT INTO `th_actity` VALUES ('13', '德玛西亚', '2015年5月6日', '北京', '150', '免费', '德玛西亚', '&lt;p&gt;2015年5月6日&lt;br/&gt;&lt;/p&gt;', './Uploads/actity/20150328/5516c6839620e.jpg', '1427555971', '1', '1');

-- ----------------------------
-- Table structure for th_admin
-- ----------------------------
DROP TABLE IF EXISTS `th_admin`;
CREATE TABLE `th_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(32) NOT NULL COMMENT '密码',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1可登陆0不可登陆',
  `logintime` varchar(20) NOT NULL COMMENT '登陆时间',
  `loginip` varchar(20) NOT NULL COMMENT '登陆ip',
  `level` tinyint(1) NOT NULL DEFAULT '2' COMMENT '管理员等级',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of th_admin
-- ----------------------------
INSERT INTO `th_admin` VALUES ('1', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '1', '1428541277', '0.0.0.0', '1');
INSERT INTO `th_admin` VALUES ('2', 'demo', 'd9b1d7db4cd6e70935368a1efb10e377', '1', '1425731702', '127.0.0.1', '2');
INSERT INTO `th_admin` VALUES ('3', 'root', 'b9be11166d72e9e3ae7fd407165e4bd2', '0', '1425817265', '127.0.0.1', '2');
INSERT INTO `th_admin` VALUES ('4', '悟空1', '405fa33650a54b3ca6ae72c2965eefb0', '0', '1425729012', '127.0.0.1', '2');

-- ----------------------------
-- Table structure for th_adv
-- ----------------------------
DROP TABLE IF EXISTS `th_adv`;
CREATE TABLE `th_adv` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '广告标题',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `intro` varchar(1000) NOT NULL COMMENT '介绍',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='广告';

-- ----------------------------
-- Records of th_adv
-- ----------------------------
INSERT INTO `th_adv` VALUES ('1', '111', './Uploads/adv/20150408/5525293167b83.jpg', '广告内容');

-- ----------------------------
-- Table structure for th_anli
-- ----------------------------
DROP TABLE IF EXISTS `th_anli`;
CREATE TABLE `th_anli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '案例名称',
  `intro` varchar(1000) NOT NULL COMMENT '简介',
  `pic` varchar(255) NOT NULL COMMENT '案例图片',
  `content` text NOT NULL COMMENT '案例内容',
  `isshow` int(11) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='案例表';

-- ----------------------------
-- Records of th_anli
-- ----------------------------
INSERT INTO `th_anli` VALUES ('16', '案例后台添加1', '', './Uploads/anli/20150407/5523d05838bdc.jpg', '&lt;p&gt;内容&lt;br/&gt;&lt;/p&gt;', '1');
INSERT INTO `th_anli` VALUES ('3', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('4', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('5', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('6', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('7', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('8', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('9', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('10', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('11', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('12', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('13', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('14', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('15', '案例一', '案例一简介', '', '案例一内容', '1');
INSERT INTO `th_anli` VALUES ('17', '案例后台添加', '案例后台添加', './Uploads/anli/20150407/5523d306c4cf4.jpg', '&lt;p&gt;案例后台添加&lt;/p&gt;', '1');

-- ----------------------------
-- Table structure for th_article
-- ----------------------------
DROP TABLE IF EXISTS `th_article`;
CREATE TABLE `th_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '名称',
  `pid` int(10) unsigned NOT NULL,
  `isshow` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `content` text NOT NULL COMMENT '文章类容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of th_article
-- ----------------------------
INSERT INTO `th_article` VALUES ('1', '关于我们', '0', '1', '');
INSERT INTO `th_article` VALUES ('2', '产品服务', '0', '1', '');
INSERT INTO `th_article` VALUES ('4', '关于我们', '1', '1', '&lt;article class=&quot;two-col-big-left&quot;&gt;\r\n				\r\n				&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;h2&gt;关于IT桔子&lt;/h2&gt;&lt;p&gt;\r\n					\r\n					&lt;/p&gt;&lt;p&gt;IT桔子是关注IT互联网行业的结构化的公司数据库和商业信息服务提供商，于2013年5月21日上线。&lt;/p&gt;&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;h2&gt;1、产品和服务&lt;/h2&gt;&lt;p&gt;\r\n					\r\n					&lt;/p&gt;&lt;p&gt;IT桔子致力于通过信息和数据的生产、聚合、挖掘、加工、处理，帮助目标用户和客户节约时间和金钱、提高效率，以辅助其各类商业行为，包括风险投资、收购、竞争情报、细分行业信息、国外公司产品信息数据服务等。\r\n\r\n产品服务包括但不限于：IT桔子网站和APP、线下活动、数据和信息服务等。&lt;/p&gt;&lt;p&gt;\r\n					\r\n					&lt;/p&gt;&lt;h2&gt;2、团队成员&lt;/h2&gt;&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;p&gt;\r\n						文飞翔，IT桔子创始人，产品经理，Blogger，特立独行的做有价值的产品。&lt;br/&gt; \r\n						SS，IT桔子联合创始人，热爱code，热爱互联网。&lt;br/&gt;\r\n						冯婷，IT桔子华东区负责人，人要生活在趣味之中。&lt;br/&gt;\r\n						丁文超，IT桔子数据内容总监，相信信息的存在价值。&lt;br/&gt;\r\n						Eva，IT桔子市场总监，做有深度有干货的活动。&lt;br/&gt;\r\n						田海，IT桔子运营总监，一直被黑的处女座。&lt;br/&gt;\r\n						张丁杰，IT桔子产品负责人，问题少年，喜欢琢磨各种新产品。&lt;br/&gt;\r\n						于婧，IT桔子产品设计师，做有调性的设计。&lt;br/&gt; &amp;nbsp;\r\n						Eric，IT桔子iOS工程师，程序狂热者。&lt;br/&gt;\r\n						Niancode，IT桔子程序猿，爱coding，不走寻常路。&lt;br/&gt;\r\n						Actor，IT桔子程序猿，用代码说话。&lt;br/&gt;\r\n						LGY，IT桔子程序猿，coding、coding.cool					&lt;/p&gt;&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;h2&gt;3、IT桔子成长路(持续更新中)&lt;/h2&gt;&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;p&gt;\r\n						2013年5月，IT桔子上线，获得150万元天使投资&lt;br/&gt;\r\n						2013年7月，IT桔子成员从2人到4人&lt;br/&gt;\r\n						2013年8月，IT桔子开始举办系列线下活动&lt;br/&gt;\r\n						2014年1月，IT桔子发布《2013年度中国互联网创业投资盘点报告》，团队成员增至5人&lt;br/&gt;\r\n						2014年2月，IT桔子“专辑”功能上线&lt;br/&gt;\r\n						2014年3月，IT桔子“活动”页面上线&lt;br/&gt;\r\n						2014年5月，IT桔子和国信证券联合主办的Link沙龙活动品牌成立，旨在把传统行业、上市大公司和创业公司连接到一起&lt;br/&gt;\r\n						2014年7月，IT桔子主办的Focus系列活动开始启动，首期从教育行业开始&lt;br/&gt;\r\n						2014年8月，IT桔子“投资数据网”页面上线&lt;br/&gt;\r\n						2014年9月，IT桔子 iOS 客户端发布&lt;br/&gt;\r\n						2014年10月，IT桔子新产品 “Today” 上线。					&lt;/p&gt;&lt;p&gt;\r\n\r\n\r\n					&lt;/p&gt;&lt;p&gt;想了解更多？ &lt;br/&gt;\r\n						你也可以查看：&lt;a href=&quot;http://blog.itjuzi.com/&quot;&gt;IT桔子的博客&lt;/a&gt; \r\n					&lt;/p&gt;&lt;p&gt;\r\n					&lt;/p&gt;&lt;p&gt;\r\n						\r\n\r\n					联系我们：&lt;br/&gt;邮件：&lt;a href=&quot;mailto:hello@itjuzi.com&quot;&gt;hello@itjuzi.com&lt;/a&gt; &lt;br/&gt;微博：@IT桔子&lt;br/&gt;QQ群：241612257&lt;/p&gt;&lt;p&gt;\r\n\r\n\r\n\r\n\r\n\r\n				&lt;/p&gt;\r\n			\r\n			&lt;/article&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `th_article` VALUES ('5', '加入我们', '1', '1', '&lt;article class=&quot;two-col-big-left&quot;&gt;\r\n				\r\n				&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;h2&gt;加入我们&lt;/h2&gt;&lt;p&gt;\r\n					\r\n					&lt;/p&gt;&lt;p&gt;IT桔子致力于通过信息和数据的生产、聚合、挖掘、加工、处理，帮助目标用户和客户节约时间和金钱、提高效率，以辅助其各类商业行为，包括风险投资、收购、竞争情报、细分行业信息、国外公司产品信息数据服务等。希望通过数据+工具，为投资人和创业者提供各类增值服务。&lt;/p&gt;&lt;p&gt;在这里工作，您将和我们一起拥有、并得到：&lt;/p&gt;&lt;p&gt;\r\n	1）一份不错的起薪，不同岗位不一样，13薪，五险一金，项目奖金等。此外我们会有系统的股权和期权激励计划；&lt;br/&gt;&lt;br/&gt;2）弹性工作，不考勤，每周运动（长期预订了北大的一块羽毛球场地，欢迎爱好篮球的、足球的、爬山的、壁球的伙伴加盟），水果和休闲零食；&lt;br/&gt;&lt;br/&gt;3）北京中关村，一个宽松自由和开放式的办公环境；&lt;br/&gt;&lt;br/&gt;4）一起开发富有想象力和创造力的产品、构筑IT桔子世界。没有风格、不被定义。希望我们一起不被打标签的、做好的产品和服务。&lt;/p&gt;&lt;p&gt;简历投递邮箱：&lt;a href=&quot;mailto:hello@itjuzi.com&quot;&gt;hello@itjuzi.com&lt;/a&gt;&lt;/p&gt;&lt;p&gt;\r\n\r\n					\r\n		\r\n				&lt;/p&gt;\r\n			\r\n			&lt;/article&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `th_article` VALUES ('6', '合作伙伴', '1', '1', '&lt;article class=&quot;two-col-big-left&quot;&gt;\r\n				\r\n				&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;h2&gt;合作伙伴&lt;/h2&gt;&lt;p&gt;\r\n					&lt;/p&gt;&lt;p class=&quot;clearfix friend-url&quot;&gt;&lt;a target=&quot;_blank&quot; href=&quot;http://pingwest.com/&quot;&gt;PingWest&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.upyun.com&quot;&gt;又拍云&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.neitui.me/&quot;&gt;内推网&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://chekucafe.com/&quot;&gt;车库咖啡&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://youxiputao.com/&quot;&gt;游戏葡萄&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://angelcrunch.com/&quot;&gt;天使汇&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.huodongxing.com/&quot;&gt;活动行&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.qiniu.com/&quot;&gt;七牛云存储&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.ti-net.com.cn/&quot;&gt;天润融通&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://maimai.taou.com/&quot;&gt;脉脉&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.ucloud.cn/&quot;&gt;UCloud&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.easemob.com/&quot;&gt;环信即时通讯云&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.goldenages.tv&quot;&gt;光艾传播&lt;/a&gt;\r\n		 &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://chinaccelerator.com&quot;&gt;中国加速&lt;/a&gt;\r\n		 &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://segmentfault.com&quot;&gt;segmentfault&lt;/a&gt;\r\n		 &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.cloudwise.com&quot;&gt;云智慧&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;					\r\n					\r\n\r\n					&lt;/p&gt;&lt;h2&gt;友情链接&lt;/h2&gt;&lt;p&gt;\r\n					&lt;/p&gt;&lt;p class=&quot;clearfix friend-url&quot; style=&quot;&quot;&gt;&lt;a target=&quot;_blank&quot; href=&quot;https://mos.meituan.com/&quot;&gt;美团云&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.ycpai.com&quot;&gt;缘创派&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.3wzhaopin.com/&quot;&gt;3w招聘&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.iterduo.com/&quot;&gt;IT耳朵&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.8868.cn/&quot;&gt;8868.cn&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://wenjuan.com/&quot;&gt;问卷网&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.ikanchai.com/&quot;&gt;砍柴网&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.lagou.com/&quot;&gt;拉勾招聘&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.kuaifawu.com/&quot;&gt;快法务&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;a target=&quot;_blank&quot; href=&quot;http://www.weiot.net/&quot;&gt;威腾网&lt;/a&gt;\r\n &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;\r\n\r\n					\r\n		\r\n				&lt;/p&gt;\r\n			\r\n			&lt;/article&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `th_article` VALUES ('7', '联系我们', '1', '1', '&lt;article class=&quot;two-col-big-left&quot;&gt;\r\n				\r\n				&lt;p&gt;\r\n\r\n					&lt;/p&gt;&lt;h2&gt;联系我们&lt;/h2&gt;&lt;p&gt;\r\n					\r\n					&lt;/p&gt;&lt;p&gt;合作咨询：&lt;a href=&quot;mailto:hello@itjuzi.com&quot;&gt;hello@itjuzi.com&lt;/a&gt; &lt;br/&gt;活动咨询：&lt;a href=&quot;mailto:chenjing@itjuzi.com&quot;&gt;chenjing@itjuzi.com&lt;/a&gt; &lt;br/&gt;IT桔子上海站咨询：&lt;a href=&quot;mailto:fengting@itjuzi.com&quot;&gt;fengting@itjuzi.com&lt;/a&gt; &lt;br/&gt;&lt;/p&gt;&lt;hr/&gt;&lt;p&gt;北京岁月桔子科技有限公司 &lt;br/&gt;邮件：&lt;a href=&quot;mailto:hello@itjuzi.com&quot;&gt;hello@itjuzi.com&lt;/a&gt;&lt;br/&gt;微博：@IT桔子&lt;br/&gt;QQ群：241612257 &lt;br/&gt;地址：中国 北京市海淀区中关村善缘街1号立方庭2段-928室 &lt;br/&gt;&lt;/p&gt;&lt;p&gt;\r\n	&lt;img src=&quot;/ueditor/php/upload/image/20150404/1428136644127550.jpg&quot; alt=&quot;&quot; width=&quot;598&quot;/&gt;&lt;/p&gt;&lt;p&gt;	\r\n					\r\n		\r\n				&lt;/p&gt;\r\n			\r\n			&lt;/article&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `th_article` VALUES ('8', '订阅号(图片)', '2', '1', '');
INSERT INTO `th_article` VALUES ('9', '微博(图片+链接)', '2', '1', '');
INSERT INTO `th_article` VALUES ('10', 'APP(链接)', '2', '1', '');

-- ----------------------------
-- Table structure for th_category
-- ----------------------------
DROP TABLE IF EXISTS `th_category`;
CREATE TABLE `th_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL COMMENT '栏目名称',
  `url` varchar(255) NOT NULL COMMENT '地址',
  `mark` varchar(255) NOT NULL COMMENT '栏目介绍',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '统计数量',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '100' COMMENT '排序1-100，值越小越靠钱',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示：1是，2否',
  `isrec` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of th_category
-- ----------------------------
INSERT INTO `th_category` VALUES ('1', '创业者', '/wlm/Wlmeng?s=/Person/goPerson.html', '', '0', '100', '1', null);
INSERT INTO `th_category` VALUES ('2', '投资者', '/wlm/Wlmeng?s=/Person/goPersont.html', '', '0', '100', '1', null);
INSERT INTO `th_category` VALUES ('3', '投资机构', '/wlm/Wlmeng?s=/Company/goInvest.html', '', '0', '100', '1', null);
INSERT INTO `th_category` VALUES ('4', '投资数据', '/wlm/Wlmeng?s=/Invest/goInvstDeal.html', '', '0', '100', '1', null);
INSERT INTO `th_category` VALUES ('5', '案例', '/wlm/Wlmeng?s=/News/goNews.html', '', '0', '100', '1', null);
INSERT INTO `th_category` VALUES ('6', '观点', '', '', '0', '100', '1', null);
INSERT INTO `th_category` VALUES ('7', '咨询', '/wlm/Wlmeng?s=/News/goNews.html', '', '0', '100', '1', null);
INSERT INTO `th_category` VALUES ('8', '未来财富交易所', '', '', '0', '100', '1', null);

-- ----------------------------
-- Table structure for th_city
-- ----------------------------
DROP TABLE IF EXISTS `th_city`;
CREATE TABLE `th_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `provincecode` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=345 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_city
-- ----------------------------
INSERT INTO `th_city` VALUES ('1', '110100', '北京市', '110000');
INSERT INTO `th_city` VALUES ('2', '130100', '石家庄市', '130000');
INSERT INTO `th_city` VALUES ('3', '130200', '唐山市', '130000');
INSERT INTO `th_city` VALUES ('4', '130300', '秦皇岛市', '130000');
INSERT INTO `th_city` VALUES ('5', '130400', '邯郸市', '130000');
INSERT INTO `th_city` VALUES ('6', '130500', '邢台市', '130000');
INSERT INTO `th_city` VALUES ('7', '130600', '保定市', '130000');
INSERT INTO `th_city` VALUES ('8', '130700', '张家口市', '130000');
INSERT INTO `th_city` VALUES ('9', '130800', '承德市', '130000');
INSERT INTO `th_city` VALUES ('10', '130900', '沧州市', '130000');
INSERT INTO `th_city` VALUES ('11', '131000', '廊坊市', '130000');
INSERT INTO `th_city` VALUES ('12', '131100', '衡水市', '130000');
INSERT INTO `th_city` VALUES ('13', '140100', '太原市', '140000');
INSERT INTO `th_city` VALUES ('14', '140200', '大同市', '140000');
INSERT INTO `th_city` VALUES ('15', '140300', '阳泉市', '140000');
INSERT INTO `th_city` VALUES ('16', '140400', '长治市', '140000');
INSERT INTO `th_city` VALUES ('17', '140500', '晋城市', '140000');
INSERT INTO `th_city` VALUES ('18', '140600', '朔州市', '140000');
INSERT INTO `th_city` VALUES ('19', '140700', '晋中市', '140000');
INSERT INTO `th_city` VALUES ('20', '140800', '运城市', '140000');
INSERT INTO `th_city` VALUES ('21', '140900', '忻州市', '140000');
INSERT INTO `th_city` VALUES ('22', '141000', '临汾市', '140000');
INSERT INTO `th_city` VALUES ('23', '141100', '吕梁市', '140000');
INSERT INTO `th_city` VALUES ('24', '150100', '呼和浩特市', '150000');
INSERT INTO `th_city` VALUES ('25', '150200', '包头市', '150000');
INSERT INTO `th_city` VALUES ('26', '150300', '乌海市', '150000');
INSERT INTO `th_city` VALUES ('27', '150400', '赤峰市', '150000');
INSERT INTO `th_city` VALUES ('28', '150500', '通辽市', '150000');
INSERT INTO `th_city` VALUES ('29', '150600', '鄂尔多斯市', '150000');
INSERT INTO `th_city` VALUES ('30', '150700', '呼伦贝尔市', '150000');
INSERT INTO `th_city` VALUES ('31', '150800', '巴彦淖尔市', '150000');
INSERT INTO `th_city` VALUES ('32', '150900', '乌兰察布市', '150000');
INSERT INTO `th_city` VALUES ('33', '152200', '兴安盟', '150000');
INSERT INTO `th_city` VALUES ('34', '152500', '锡林郭勒盟', '150000');
INSERT INTO `th_city` VALUES ('35', '152900', '阿拉善盟', '150000');
INSERT INTO `th_city` VALUES ('36', '210100', '沈阳市', '210000');
INSERT INTO `th_city` VALUES ('37', '210200', '大连市', '210000');
INSERT INTO `th_city` VALUES ('38', '210300', '鞍山市', '210000');
INSERT INTO `th_city` VALUES ('39', '210400', '抚顺市', '210000');
INSERT INTO `th_city` VALUES ('40', '210500', '本溪市', '210000');
INSERT INTO `th_city` VALUES ('41', '210600', '丹东市', '210000');
INSERT INTO `th_city` VALUES ('42', '210700', '锦州市', '210000');
INSERT INTO `th_city` VALUES ('43', '210800', '营口市', '210000');
INSERT INTO `th_city` VALUES ('44', '210900', '阜新市', '210000');
INSERT INTO `th_city` VALUES ('45', '211000', '辽阳市', '210000');
INSERT INTO `th_city` VALUES ('46', '211100', '盘锦市', '210000');
INSERT INTO `th_city` VALUES ('47', '211200', '铁岭市', '210000');
INSERT INTO `th_city` VALUES ('48', '211300', '朝阳市', '210000');
INSERT INTO `th_city` VALUES ('49', '211400', '葫芦岛市', '210000');
INSERT INTO `th_city` VALUES ('50', '220100', '长春市', '220000');
INSERT INTO `th_city` VALUES ('51', '220200', '吉林市', '220000');
INSERT INTO `th_city` VALUES ('52', '220300', '四平市', '220000');
INSERT INTO `th_city` VALUES ('53', '220400', '辽源市', '220000');
INSERT INTO `th_city` VALUES ('54', '220500', '通化市', '220000');
INSERT INTO `th_city` VALUES ('55', '220600', '白山市', '220000');
INSERT INTO `th_city` VALUES ('56', '220700', '松原市', '220000');
INSERT INTO `th_city` VALUES ('57', '220800', '白城市', '220000');
INSERT INTO `th_city` VALUES ('58', '222400', '延边朝鲜族自治州', '220000');
INSERT INTO `th_city` VALUES ('59', '230100', '哈尔滨市', '230000');
INSERT INTO `th_city` VALUES ('60', '230200', '齐齐哈尔市', '230000');
INSERT INTO `th_city` VALUES ('61', '230300', '鸡西市', '230000');
INSERT INTO `th_city` VALUES ('62', '230400', '鹤岗市', '230000');
INSERT INTO `th_city` VALUES ('63', '230500', '双鸭山市', '230000');
INSERT INTO `th_city` VALUES ('64', '230600', '大庆市', '230000');
INSERT INTO `th_city` VALUES ('65', '230700', '伊春市', '230000');
INSERT INTO `th_city` VALUES ('66', '230800', '佳木斯市', '230000');
INSERT INTO `th_city` VALUES ('67', '230900', '七台河市', '230000');
INSERT INTO `th_city` VALUES ('68', '231000', '牡丹江市', '230000');
INSERT INTO `th_city` VALUES ('69', '231100', '黑河市', '230000');
INSERT INTO `th_city` VALUES ('70', '231200', '绥化市', '230000');
INSERT INTO `th_city` VALUES ('71', '232700', '大兴安岭地区', '230000');
INSERT INTO `th_city` VALUES ('72', '310100', '市辖区', '310000');
INSERT INTO `th_city` VALUES ('73', '310200', '县', '310000');
INSERT INTO `th_city` VALUES ('74', '320100', '南京市', '320000');
INSERT INTO `th_city` VALUES ('75', '320200', '无锡市', '320000');
INSERT INTO `th_city` VALUES ('76', '320300', '徐州市', '320000');
INSERT INTO `th_city` VALUES ('77', '320400', '常州市', '320000');
INSERT INTO `th_city` VALUES ('78', '320500', '苏州市', '320000');
INSERT INTO `th_city` VALUES ('79', '320600', '南通市', '320000');
INSERT INTO `th_city` VALUES ('80', '320700', '连云港市', '320000');
INSERT INTO `th_city` VALUES ('81', '320800', '淮安市', '320000');
INSERT INTO `th_city` VALUES ('82', '320900', '盐城市', '320000');
INSERT INTO `th_city` VALUES ('83', '321000', '扬州市', '320000');
INSERT INTO `th_city` VALUES ('84', '321100', '镇江市', '320000');
INSERT INTO `th_city` VALUES ('85', '321200', '泰州市', '320000');
INSERT INTO `th_city` VALUES ('86', '321300', '宿迁市', '320000');
INSERT INTO `th_city` VALUES ('87', '330100', '杭州市', '330000');
INSERT INTO `th_city` VALUES ('88', '330200', '宁波市', '330000');
INSERT INTO `th_city` VALUES ('89', '330300', '温州市', '330000');
INSERT INTO `th_city` VALUES ('90', '330400', '嘉兴市', '330000');
INSERT INTO `th_city` VALUES ('91', '330500', '湖州市', '330000');
INSERT INTO `th_city` VALUES ('92', '330600', '绍兴市', '330000');
INSERT INTO `th_city` VALUES ('93', '330700', '金华市', '330000');
INSERT INTO `th_city` VALUES ('94', '330800', '衢州市', '330000');
INSERT INTO `th_city` VALUES ('95', '330900', '舟山市', '330000');
INSERT INTO `th_city` VALUES ('96', '331000', '台州市', '330000');
INSERT INTO `th_city` VALUES ('97', '331100', '丽水市', '330000');
INSERT INTO `th_city` VALUES ('98', '340100', '合肥市', '340000');
INSERT INTO `th_city` VALUES ('99', '340200', '芜湖市', '340000');
INSERT INTO `th_city` VALUES ('100', '340300', '蚌埠市', '340000');
INSERT INTO `th_city` VALUES ('101', '340400', '淮南市', '340000');
INSERT INTO `th_city` VALUES ('102', '340500', '马鞍山市', '340000');
INSERT INTO `th_city` VALUES ('103', '340600', '淮北市', '340000');
INSERT INTO `th_city` VALUES ('104', '340700', '铜陵市', '340000');
INSERT INTO `th_city` VALUES ('105', '340800', '安庆市', '340000');
INSERT INTO `th_city` VALUES ('106', '341000', '黄山市', '340000');
INSERT INTO `th_city` VALUES ('107', '341100', '滁州市', '340000');
INSERT INTO `th_city` VALUES ('108', '341200', '阜阳市', '340000');
INSERT INTO `th_city` VALUES ('109', '341300', '宿州市', '340000');
INSERT INTO `th_city` VALUES ('110', '341400', '巢湖市', '340000');
INSERT INTO `th_city` VALUES ('111', '341500', '六安市', '340000');
INSERT INTO `th_city` VALUES ('112', '341600', '亳州市', '340000');
INSERT INTO `th_city` VALUES ('113', '341700', '池州市', '340000');
INSERT INTO `th_city` VALUES ('114', '341800', '宣城市', '340000');
INSERT INTO `th_city` VALUES ('115', '350100', '福州市', '350000');
INSERT INTO `th_city` VALUES ('116', '350200', '厦门市', '350000');
INSERT INTO `th_city` VALUES ('117', '350300', '莆田市', '350000');
INSERT INTO `th_city` VALUES ('118', '350400', '三明市', '350000');
INSERT INTO `th_city` VALUES ('119', '350500', '泉州市', '350000');
INSERT INTO `th_city` VALUES ('120', '350600', '漳州市', '350000');
INSERT INTO `th_city` VALUES ('121', '350700', '南平市', '350000');
INSERT INTO `th_city` VALUES ('122', '350800', '龙岩市', '350000');
INSERT INTO `th_city` VALUES ('123', '350900', '宁德市', '350000');
INSERT INTO `th_city` VALUES ('124', '360100', '南昌市', '360000');
INSERT INTO `th_city` VALUES ('125', '360200', '景德镇市', '360000');
INSERT INTO `th_city` VALUES ('126', '360300', '萍乡市', '360000');
INSERT INTO `th_city` VALUES ('127', '360400', '九江市', '360000');
INSERT INTO `th_city` VALUES ('128', '360500', '新余市', '360000');
INSERT INTO `th_city` VALUES ('129', '360600', '鹰潭市', '360000');
INSERT INTO `th_city` VALUES ('130', '360700', '赣州市', '360000');
INSERT INTO `th_city` VALUES ('131', '360800', '吉安市', '360000');
INSERT INTO `th_city` VALUES ('132', '360900', '宜春市', '360000');
INSERT INTO `th_city` VALUES ('133', '361000', '抚州市', '360000');
INSERT INTO `th_city` VALUES ('134', '361100', '上饶市', '360000');
INSERT INTO `th_city` VALUES ('135', '370100', '济南市', '370000');
INSERT INTO `th_city` VALUES ('136', '370200', '青岛市', '370000');
INSERT INTO `th_city` VALUES ('137', '370300', '淄博市', '370000');
INSERT INTO `th_city` VALUES ('138', '370400', '枣庄市', '370000');
INSERT INTO `th_city` VALUES ('139', '370500', '东营市', '370000');
INSERT INTO `th_city` VALUES ('140', '370600', '烟台市', '370000');
INSERT INTO `th_city` VALUES ('141', '370700', '潍坊市', '370000');
INSERT INTO `th_city` VALUES ('142', '370800', '济宁市', '370000');
INSERT INTO `th_city` VALUES ('143', '370900', '泰安市', '370000');
INSERT INTO `th_city` VALUES ('144', '371000', '威海市', '370000');
INSERT INTO `th_city` VALUES ('145', '371100', '日照市', '370000');
INSERT INTO `th_city` VALUES ('146', '371200', '莱芜市', '370000');
INSERT INTO `th_city` VALUES ('147', '371300', '临沂市', '370000');
INSERT INTO `th_city` VALUES ('148', '371400', '德州市', '370000');
INSERT INTO `th_city` VALUES ('149', '371500', '聊城市', '370000');
INSERT INTO `th_city` VALUES ('150', '371600', '滨州市', '370000');
INSERT INTO `th_city` VALUES ('151', '371700', '荷泽市', '370000');
INSERT INTO `th_city` VALUES ('152', '410100', '郑州市', '410000');
INSERT INTO `th_city` VALUES ('153', '410200', '开封市', '410000');
INSERT INTO `th_city` VALUES ('154', '410300', '洛阳市', '410000');
INSERT INTO `th_city` VALUES ('155', '410400', '平顶山市', '410000');
INSERT INTO `th_city` VALUES ('156', '410500', '安阳市', '410000');
INSERT INTO `th_city` VALUES ('157', '410600', '鹤壁市', '410000');
INSERT INTO `th_city` VALUES ('158', '410700', '新乡市', '410000');
INSERT INTO `th_city` VALUES ('159', '410800', '焦作市', '410000');
INSERT INTO `th_city` VALUES ('160', '410900', '濮阳市', '410000');
INSERT INTO `th_city` VALUES ('161', '411000', '许昌市', '410000');
INSERT INTO `th_city` VALUES ('162', '411100', '漯河市', '410000');
INSERT INTO `th_city` VALUES ('163', '411200', '三门峡市', '410000');
INSERT INTO `th_city` VALUES ('164', '411300', '南阳市', '410000');
INSERT INTO `th_city` VALUES ('165', '411400', '商丘市', '410000');
INSERT INTO `th_city` VALUES ('166', '411500', '信阳市', '410000');
INSERT INTO `th_city` VALUES ('167', '411600', '周口市', '410000');
INSERT INTO `th_city` VALUES ('168', '411700', '驻马店市', '410000');
INSERT INTO `th_city` VALUES ('169', '420100', '武汉市', '420000');
INSERT INTO `th_city` VALUES ('170', '420200', '黄石市', '420000');
INSERT INTO `th_city` VALUES ('171', '420300', '十堰市', '420000');
INSERT INTO `th_city` VALUES ('172', '420500', '宜昌市', '420000');
INSERT INTO `th_city` VALUES ('173', '420600', '襄樊市', '420000');
INSERT INTO `th_city` VALUES ('174', '420700', '鄂州市', '420000');
INSERT INTO `th_city` VALUES ('175', '420800', '荆门市', '420000');
INSERT INTO `th_city` VALUES ('176', '420900', '孝感市', '420000');
INSERT INTO `th_city` VALUES ('177', '421000', '荆州市', '420000');
INSERT INTO `th_city` VALUES ('178', '421100', '黄冈市', '420000');
INSERT INTO `th_city` VALUES ('179', '421200', '咸宁市', '420000');
INSERT INTO `th_city` VALUES ('180', '421300', '随州市', '420000');
INSERT INTO `th_city` VALUES ('181', '422800', '恩施土家族苗族自治州', '420000');
INSERT INTO `th_city` VALUES ('182', '429000', '省直辖行政单位', '420000');
INSERT INTO `th_city` VALUES ('183', '430100', '长沙市', '430000');
INSERT INTO `th_city` VALUES ('184', '430200', '株洲市', '430000');
INSERT INTO `th_city` VALUES ('185', '430300', '湘潭市', '430000');
INSERT INTO `th_city` VALUES ('186', '430400', '衡阳市', '430000');
INSERT INTO `th_city` VALUES ('187', '430500', '邵阳市', '430000');
INSERT INTO `th_city` VALUES ('188', '430600', '岳阳市', '430000');
INSERT INTO `th_city` VALUES ('189', '430700', '常德市', '430000');
INSERT INTO `th_city` VALUES ('190', '430800', '张家界市', '430000');
INSERT INTO `th_city` VALUES ('191', '430900', '益阳市', '430000');
INSERT INTO `th_city` VALUES ('192', '431000', '郴州市', '430000');
INSERT INTO `th_city` VALUES ('193', '431100', '永州市', '430000');
INSERT INTO `th_city` VALUES ('194', '431200', '怀化市', '430000');
INSERT INTO `th_city` VALUES ('195', '431300', '娄底市', '430000');
INSERT INTO `th_city` VALUES ('196', '433100', '湘西土家族苗族自治州', '430000');
INSERT INTO `th_city` VALUES ('197', '440100', '广州市', '440000');
INSERT INTO `th_city` VALUES ('198', '440200', '韶关市', '440000');
INSERT INTO `th_city` VALUES ('199', '440300', '深圳市', '440000');
INSERT INTO `th_city` VALUES ('200', '440400', '珠海市', '440000');
INSERT INTO `th_city` VALUES ('201', '440500', '汕头市', '440000');
INSERT INTO `th_city` VALUES ('202', '440600', '佛山市', '440000');
INSERT INTO `th_city` VALUES ('203', '440700', '江门市', '440000');
INSERT INTO `th_city` VALUES ('204', '440800', '湛江市', '440000');
INSERT INTO `th_city` VALUES ('205', '440900', '茂名市', '440000');
INSERT INTO `th_city` VALUES ('206', '441200', '肇庆市', '440000');
INSERT INTO `th_city` VALUES ('207', '441300', '惠州市', '440000');
INSERT INTO `th_city` VALUES ('208', '441400', '梅州市', '440000');
INSERT INTO `th_city` VALUES ('209', '441500', '汕尾市', '440000');
INSERT INTO `th_city` VALUES ('210', '441600', '河源市', '440000');
INSERT INTO `th_city` VALUES ('211', '441700', '阳江市', '440000');
INSERT INTO `th_city` VALUES ('212', '441800', '清远市', '440000');
INSERT INTO `th_city` VALUES ('213', '441900', '东莞市', '440000');
INSERT INTO `th_city` VALUES ('214', '442000', '中山市', '440000');
INSERT INTO `th_city` VALUES ('215', '445100', '潮州市', '440000');
INSERT INTO `th_city` VALUES ('216', '445200', '揭阳市', '440000');
INSERT INTO `th_city` VALUES ('217', '445300', '云浮市', '440000');
INSERT INTO `th_city` VALUES ('218', '450100', '南宁市', '450000');
INSERT INTO `th_city` VALUES ('219', '450200', '柳州市', '450000');
INSERT INTO `th_city` VALUES ('220', '450300', '桂林市', '450000');
INSERT INTO `th_city` VALUES ('221', '450400', '梧州市', '450000');
INSERT INTO `th_city` VALUES ('222', '450500', '北海市', '450000');
INSERT INTO `th_city` VALUES ('223', '450600', '防城港市', '450000');
INSERT INTO `th_city` VALUES ('224', '450700', '钦州市', '450000');
INSERT INTO `th_city` VALUES ('225', '450800', '贵港市', '450000');
INSERT INTO `th_city` VALUES ('226', '450900', '玉林市', '450000');
INSERT INTO `th_city` VALUES ('227', '451000', '百色市', '450000');
INSERT INTO `th_city` VALUES ('228', '451100', '贺州市', '450000');
INSERT INTO `th_city` VALUES ('229', '451200', '河池市', '450000');
INSERT INTO `th_city` VALUES ('230', '451300', '来宾市', '450000');
INSERT INTO `th_city` VALUES ('231', '451400', '崇左市', '450000');
INSERT INTO `th_city` VALUES ('232', '460100', '海口市', '460000');
INSERT INTO `th_city` VALUES ('233', '460200', '三亚市', '460000');
INSERT INTO `th_city` VALUES ('234', '469000', '省直辖县级行政单位', '460000');
INSERT INTO `th_city` VALUES ('235', '500100', '市辖区', '500000');
INSERT INTO `th_city` VALUES ('236', '500200', '县', '500000');
INSERT INTO `th_city` VALUES ('237', '500300', '市', '500000');
INSERT INTO `th_city` VALUES ('238', '510100', '成都市', '510000');
INSERT INTO `th_city` VALUES ('239', '510300', '自贡市', '510000');
INSERT INTO `th_city` VALUES ('240', '510400', '攀枝花市', '510000');
INSERT INTO `th_city` VALUES ('241', '510500', '泸州市', '510000');
INSERT INTO `th_city` VALUES ('242', '510600', '德阳市', '510000');
INSERT INTO `th_city` VALUES ('243', '510700', '绵阳市', '510000');
INSERT INTO `th_city` VALUES ('244', '510800', '广元市', '510000');
INSERT INTO `th_city` VALUES ('245', '510900', '遂宁市', '510000');
INSERT INTO `th_city` VALUES ('246', '511000', '内江市', '510000');
INSERT INTO `th_city` VALUES ('247', '511100', '乐山市', '510000');
INSERT INTO `th_city` VALUES ('248', '511300', '南充市', '510000');
INSERT INTO `th_city` VALUES ('249', '511400', '眉山市', '510000');
INSERT INTO `th_city` VALUES ('250', '511500', '宜宾市', '510000');
INSERT INTO `th_city` VALUES ('251', '511600', '广安市', '510000');
INSERT INTO `th_city` VALUES ('252', '511700', '达州市', '510000');
INSERT INTO `th_city` VALUES ('253', '511800', '雅安市', '510000');
INSERT INTO `th_city` VALUES ('254', '511900', '巴中市', '510000');
INSERT INTO `th_city` VALUES ('255', '512000', '资阳市', '510000');
INSERT INTO `th_city` VALUES ('256', '513200', '阿坝藏族羌族自治州', '510000');
INSERT INTO `th_city` VALUES ('257', '513300', '甘孜藏族自治州', '510000');
INSERT INTO `th_city` VALUES ('258', '513400', '凉山彝族自治州', '510000');
INSERT INTO `th_city` VALUES ('259', '520100', '贵阳市', '520000');
INSERT INTO `th_city` VALUES ('260', '520200', '六盘水市', '520000');
INSERT INTO `th_city` VALUES ('261', '520300', '遵义市', '520000');
INSERT INTO `th_city` VALUES ('262', '520400', '安顺市', '520000');
INSERT INTO `th_city` VALUES ('263', '522200', '铜仁地区', '520000');
INSERT INTO `th_city` VALUES ('264', '522300', '黔西南布依族苗族自治州', '520000');
INSERT INTO `th_city` VALUES ('265', '522400', '毕节地区', '520000');
INSERT INTO `th_city` VALUES ('266', '522600', '黔东南苗族侗族自治州', '520000');
INSERT INTO `th_city` VALUES ('267', '522700', '黔南布依族苗族自治州', '520000');
INSERT INTO `th_city` VALUES ('268', '530100', '昆明市', '530000');
INSERT INTO `th_city` VALUES ('269', '530300', '曲靖市', '530000');
INSERT INTO `th_city` VALUES ('270', '530400', '玉溪市', '530000');
INSERT INTO `th_city` VALUES ('271', '530500', '保山市', '530000');
INSERT INTO `th_city` VALUES ('272', '530600', '昭通市', '530000');
INSERT INTO `th_city` VALUES ('273', '530700', '丽江市', '530000');
INSERT INTO `th_city` VALUES ('274', '530800', '思茅市', '530000');
INSERT INTO `th_city` VALUES ('275', '530900', '临沧市', '530000');
INSERT INTO `th_city` VALUES ('276', '532300', '楚雄彝族自治州', '530000');
INSERT INTO `th_city` VALUES ('277', '532500', '红河哈尼族彝族自治州', '530000');
INSERT INTO `th_city` VALUES ('278', '532600', '文山壮族苗族自治州', '530000');
INSERT INTO `th_city` VALUES ('279', '532800', '西双版纳傣族自治州', '530000');
INSERT INTO `th_city` VALUES ('280', '532900', '大理白族自治州', '530000');
INSERT INTO `th_city` VALUES ('281', '533100', '德宏傣族景颇族自治州', '530000');
INSERT INTO `th_city` VALUES ('282', '533300', '怒江傈僳族自治州', '530000');
INSERT INTO `th_city` VALUES ('283', '533400', '迪庆藏族自治州', '530000');
INSERT INTO `th_city` VALUES ('284', '540100', '拉萨市', '540000');
INSERT INTO `th_city` VALUES ('285', '542100', '昌都地区', '540000');
INSERT INTO `th_city` VALUES ('286', '542200', '山南地区', '540000');
INSERT INTO `th_city` VALUES ('287', '542300', '日喀则地区', '540000');
INSERT INTO `th_city` VALUES ('288', '542400', '那曲地区', '540000');
INSERT INTO `th_city` VALUES ('289', '542500', '阿里地区', '540000');
INSERT INTO `th_city` VALUES ('290', '542600', '林芝地区', '540000');
INSERT INTO `th_city` VALUES ('291', '610100', '西安市', '610000');
INSERT INTO `th_city` VALUES ('292', '610200', '铜川市', '610000');
INSERT INTO `th_city` VALUES ('293', '610300', '宝鸡市', '610000');
INSERT INTO `th_city` VALUES ('294', '610400', '咸阳市', '610000');
INSERT INTO `th_city` VALUES ('295', '610500', '渭南市', '610000');
INSERT INTO `th_city` VALUES ('296', '610600', '延安市', '610000');
INSERT INTO `th_city` VALUES ('297', '610700', '汉中市', '610000');
INSERT INTO `th_city` VALUES ('298', '610800', '榆林市', '610000');
INSERT INTO `th_city` VALUES ('299', '610900', '安康市', '610000');
INSERT INTO `th_city` VALUES ('300', '611000', '商洛市', '610000');
INSERT INTO `th_city` VALUES ('301', '620100', '兰州市', '620000');
INSERT INTO `th_city` VALUES ('302', '620200', '嘉峪关市', '620000');
INSERT INTO `th_city` VALUES ('303', '620300', '金昌市', '620000');
INSERT INTO `th_city` VALUES ('304', '620400', '白银市', '620000');
INSERT INTO `th_city` VALUES ('305', '620500', '天水市', '620000');
INSERT INTO `th_city` VALUES ('306', '620600', '武威市', '620000');
INSERT INTO `th_city` VALUES ('307', '620700', '张掖市', '620000');
INSERT INTO `th_city` VALUES ('308', '620800', '平凉市', '620000');
INSERT INTO `th_city` VALUES ('309', '620900', '酒泉市', '620000');
INSERT INTO `th_city` VALUES ('310', '621000', '庆阳市', '620000');
INSERT INTO `th_city` VALUES ('311', '621100', '定西市', '620000');
INSERT INTO `th_city` VALUES ('312', '621200', '陇南市', '620000');
INSERT INTO `th_city` VALUES ('313', '622900', '临夏回族自治州', '620000');
INSERT INTO `th_city` VALUES ('314', '623000', '甘南藏族自治州', '620000');
INSERT INTO `th_city` VALUES ('315', '630100', '西宁市', '630000');
INSERT INTO `th_city` VALUES ('316', '632100', '海东地区', '630000');
INSERT INTO `th_city` VALUES ('317', '632200', '海北藏族自治州', '630000');
INSERT INTO `th_city` VALUES ('318', '632300', '黄南藏族自治州', '630000');
INSERT INTO `th_city` VALUES ('319', '632500', '海南藏族自治州', '630000');
INSERT INTO `th_city` VALUES ('320', '632600', '果洛藏族自治州', '630000');
INSERT INTO `th_city` VALUES ('321', '632700', '玉树藏族自治州', '630000');
INSERT INTO `th_city` VALUES ('322', '632800', '海西蒙古族藏族自治州', '630000');
INSERT INTO `th_city` VALUES ('323', '640100', '银川市', '640000');
INSERT INTO `th_city` VALUES ('324', '640200', '石嘴山市', '640000');
INSERT INTO `th_city` VALUES ('325', '640300', '吴忠市', '640000');
INSERT INTO `th_city` VALUES ('326', '640400', '固原市', '640000');
INSERT INTO `th_city` VALUES ('327', '640500', '中卫市', '640000');
INSERT INTO `th_city` VALUES ('328', '650100', '乌鲁木齐市', '650000');
INSERT INTO `th_city` VALUES ('329', '650200', '克拉玛依市', '650000');
INSERT INTO `th_city` VALUES ('330', '652100', '吐鲁番地区', '650000');
INSERT INTO `th_city` VALUES ('331', '652200', '哈密地区', '650000');
INSERT INTO `th_city` VALUES ('332', '652300', '昌吉回族自治州', '650000');
INSERT INTO `th_city` VALUES ('333', '652700', '博尔塔拉蒙古自治州', '650000');
INSERT INTO `th_city` VALUES ('334', '652800', '巴音郭楞蒙古自治州', '650000');
INSERT INTO `th_city` VALUES ('335', '652900', '阿克苏地区', '650000');
INSERT INTO `th_city` VALUES ('336', '653000', '克孜勒苏柯尔克孜自治州', '650000');
INSERT INTO `th_city` VALUES ('337', '653100', '喀什地区', '650000');
INSERT INTO `th_city` VALUES ('338', '653200', '和田地区', '650000');
INSERT INTO `th_city` VALUES ('339', '654000', '伊犁哈萨克自治州', '650000');
INSERT INTO `th_city` VALUES ('340', '654200', '塔城地区', '650000');
INSERT INTO `th_city` VALUES ('341', '654300', '阿勒泰地区', '650000');
INSERT INTO `th_city` VALUES ('342', '659000', '省直辖行政单位', '650000');
INSERT INTO `th_city` VALUES ('343', '120100', '天津市', '120000');
INSERT INTO `th_city` VALUES ('0', '000000', '无', '000000');

-- ----------------------------
-- Table structure for th_comment
-- ----------------------------
DROP TABLE IF EXISTS `th_comment`;
CREATE TABLE `th_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL COMMENT '评论者id',
  `member_name` varchar(255) NOT NULL COMMENT '评论者名称',
  `company_id` int(10) unsigned NOT NULL COMMENT '评论公司id',
  `company` varchar(255) NOT NULL COMMENT '评论公司名称',
  `content` varchar(1000) NOT NULL COMMENT '评论',
  `addtime` varchar(20) NOT NULL COMMENT '评论时间',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1显示0不显示',
  `nav_article_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='公司评论表';

-- ----------------------------
-- Records of th_comment
-- ----------------------------
INSERT INTO `th_comment` VALUES ('16', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('5', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('7', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('8', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('9', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('10', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('11', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('12', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('13', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('14', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('15', '1', '悟空', '1', '百度', '啦啦啦德玛西亚', '1425792056', '1', '0');
INSERT INTO `th_comment` VALUES ('17', '1', '悟空', '0', '', '啦啦啦德玛西亚', '1425792056', '1', '2');

-- ----------------------------
-- Table structure for th_company
-- ----------------------------
DROP TABLE IF EXISTS `th_company`;
CREATE TABLE `th_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL COMMENT '添加公司信息者',
  `name` varchar(255) NOT NULL COMMENT '公司名称',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1投资机构2公司0未知',
  `company_pic` varchar(255) DEFAULT NULL COMMENT '//公司图片',
  `company_url` varchar(255) NOT NULL COMMENT '公司网址',
  `intro` varchar(1000) NOT NULL COMMENT '公司简介',
  `year` varchar(4) DEFAULT NULL COMMENT '公司成立年份',
  `month` varchar(2) DEFAULT NULL COMMENT '公司成立月份',
  `province_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '公司所在省',
  `city_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '公司所在市',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '公司状态1运营中2未上线3已关闭4已转型',
  `phase` tinyint(1) unsigned DEFAULT NULL COMMENT '运营阶段1初创期2成长发展期3上市公司',
  `domain_id` varchar(100) NOT NULL COMMENT '公司所属领域 可以多个 |',
  `invest_type_id` varchar(100) DEFAULT NULL COMMENT '投资阶段 多个 |',
  `member_role` tinyint(1) unsigned DEFAULT NULL COMMENT '添加者身份1创始人2员工3投资者4用户5发现者',
  `addtime` varchar(20) NOT NULL COMMENT '添加时间',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '发布状态1显示0不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='机构表';

-- ----------------------------
-- Records of th_company
-- ----------------------------
INSERT INTO `th_company` VALUES ('1', '1', '百度', '1', './Uploads/nav/20150309/54fd97ca09094.png', 'http://www.baidu.com', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('2', '1', '百度', '2', './Uploads/nav/20150309/54fd97ca09094.png', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '2', '1', '5', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('3', '4', '腾讯4', '1', '', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('4', '5', '腾讯5', '1', '', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('5', '6', '腾讯5', '1', '', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('6', '7', '腾讯4', '1', '', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('7', '8', '腾讯', '1', '', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('8', '9', '腾讯4', '1', '', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('9', '10', '腾讯5', '2', '', 'http://www.qq.com/', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('10', '11', '百度', '2', '', 'http://www.baidu.com', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1', '1', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('11', '15', '百度', '2', './Uploads/nav/20150309/54fd97ca09094.png', 'http://www.baidu.com', '我们公司很牛B', '2001', '01', '1', '1', '1', '3', '1|5', '1|4', '1', '1425792056', '1');
INSERT INTO `th_company` VALUES ('12', '16', 'XX投资公司', '1', null, 'http://www.baidu.com', '史蒂夫舒服啥地方', null, null, '1', '1', null, null, '5|10', null, null, '1427633020', '1');
INSERT INTO `th_company` VALUES ('16', '16', 'X机构', '1', './Uploads/company/2015-04-09/5525ed76b508b.png', 'http://www.baidu.com', '展示到发送到发送到', null, null, '1', '1', null, '2', '6|7', null, '1', '1428548982', '1');

-- ----------------------------
-- Table structure for th_domain
-- ----------------------------
DROP TABLE IF EXISTS `th_domain`;
CREATE TABLE `th_domain` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dname` varchar(100) NOT NULL COMMENT '领域名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='有兴趣的领域';

-- ----------------------------
-- Records of th_domain
-- ----------------------------
INSERT INTO `th_domain` VALUES ('1', '移动互联网');
INSERT INTO `th_domain` VALUES ('2', '电子商务');
INSERT INTO `th_domain` VALUES ('3', 'SNS社交网络');
INSERT INTO `th_domain` VALUES ('4', '广告营销');
INSERT INTO `th_domain` VALUES ('5', '搜索引擎');
INSERT INTO `th_domain` VALUES ('6', '游戏动漫');
INSERT INTO `th_domain` VALUES ('7', '电子硬件');
INSERT INTO `th_domain` VALUES ('8', '媒体资讯');
INSERT INTO `th_domain` VALUES ('9', '多媒体娱乐');
INSERT INTO `th_domain` VALUES ('10', '工具软件');
INSERT INTO `th_domain` VALUES ('11', '消费生活');
INSERT INTO `th_domain` VALUES ('12', '金融服务');
INSERT INTO `th_domain` VALUES ('13', '医疗健康');
INSERT INTO `th_domain` VALUES ('14', '企业服务');
INSERT INTO `th_domain` VALUES ('15', '旅游户外');
INSERT INTO `th_domain` VALUES ('16', '房产酒店');
INSERT INTO `th_domain` VALUES ('17', '文化艺术体育');
INSERT INTO `th_domain` VALUES ('18', '教育培训');
INSERT INTO `th_domain` VALUES ('19', '汽车交通');
INSERT INTO `th_domain` VALUES ('20', '法律法务');
INSERT INTO `th_domain` VALUES ('21', '其他');

-- ----------------------------
-- Table structure for th_employee
-- ----------------------------
DROP TABLE IF EXISTS `th_employee`;
CREATE TABLE `th_employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '员工姓名',
  `company_id` int(10) unsigned NOT NULL COMMENT '所属公司',
  `position` varchar(30) NOT NULL COMMENT '职位',
  `intro` varchar(500) NOT NULL COMMENT '员工介绍',
  `blogurl` varchar(100) NOT NULL COMMENT '微博',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='结构员工表';

-- ----------------------------
-- Records of th_employee
-- ----------------------------
INSERT INTO `th_employee` VALUES ('1', '德玛西亚', '1', '上单', '很牛b的上单', '', '827400818@qq.com', '18612333844');
INSERT INTO `th_employee` VALUES ('2', '张三', '14', 'XXX职位', '水井坊快乐圣诞节拉开', 'http://www.youdao.com', '456465465@qq.com', '1234568');

-- ----------------------------
-- Table structure for th_finance
-- ----------------------------
DROP TABLE IF EXISTS `th_finance`;
CREATE TABLE `th_finance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL COMMENT '融资状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='融资状态表';

-- ----------------------------
-- Records of th_finance
-- ----------------------------
INSERT INTO `th_finance` VALUES ('1', '不明确融资');
INSERT INTO `th_finance` VALUES ('2', '需要融资');
INSERT INTO `th_finance` VALUES ('3', '寻求收购');
INSERT INTO `th_finance` VALUES ('4', '已完成天使融资');
INSERT INTO `th_finance` VALUES ('5', '已完成A轮融资');
INSERT INTO `th_finance` VALUES ('6', '已完成B轮融资');
INSERT INTO `th_finance` VALUES ('7', '已完成C轮融资');
INSERT INTO `th_finance` VALUES ('8', '已完成D轮融资');
INSERT INTO `th_finance` VALUES ('9', '已完成E轮融资');
INSERT INTO `th_finance` VALUES ('10', '已上市');
INSERT INTO `th_finance` VALUES ('11', '已被并购');
INSERT INTO `th_finance` VALUES ('12', '已完成F轮融资');

-- ----------------------------
-- Table structure for th_invest
-- ----------------------------
DROP TABLE IF EXISTS `th_invest`;
CREATE TABLE `th_invest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `investor` varchar(100) DEFAULT NULL COMMENT '投资公司',
  `company` varchar(100) NOT NULL COMMENT '投资对象',
  `addtime` varchar(20) NOT NULL COMMENT '投资时间',
  `round` varchar(20) NOT NULL COMMENT '轮次',
  `money` varchar(30) NOT NULL COMMENT '投资金额',
  `domain_id` int(10) unsigned NOT NULL COMMENT '投资领域',
  `country` tinyint(1) NOT NULL COMMENT '1国内2国外',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示1显示0不显示',
  `inv_id` int(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='投资数据';

-- ----------------------------
-- Records of th_invest
-- ----------------------------
INSERT INTO `th_invest` VALUES ('2', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '1', null, null);
INSERT INTO `th_invest` VALUES ('4', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '1', null, null);
INSERT INTO `th_invest` VALUES ('5', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '8', null, null);
INSERT INTO `th_invest` VALUES ('6', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '4', null, null);
INSERT INTO `th_invest` VALUES ('7', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '6', null, null);
INSERT INTO `th_invest` VALUES ('8', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '12', null, null);
INSERT INTO `th_invest` VALUES ('9', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '6', null, null);
INSERT INTO `th_invest` VALUES ('10', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '2', null, null);
INSERT INTO `th_invest` VALUES ('11', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '1', null, null);
INSERT INTO `th_invest` VALUES ('12', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '7', null, null);
INSERT INTO `th_invest` VALUES ('13', '<a href=\"http://itjuzi.com/investfirm/1\">红杉资本中国</a><br><a href=\"http://itjuzi.com/investfirm/7\">经纬中国', '<a href=\"http://itjuzi.com/company/3173\">销售易/仁科互动</a>', '2015.3.2', 'A轮', '500W', '1', '1', '1', '5', null, null);
INSERT INTO `th_invest` VALUES ('14', '张三', 'XX公司', '2015.03.29', 'A轮', '200W', '16', '1', '1', '12', null, null);
INSERT INTO `th_invest` VALUES ('16', '李四', 'XXX公司', '2015.04.09', 'A轮', '50W', '1', '1', '1', '16', './Uploads/company/2015-04-09/5525ed76b5c43.jpg', '师傅师傅说道');

-- ----------------------------
-- Table structure for th_invest_type
-- ----------------------------
DROP TABLE IF EXISTS `th_invest_type`;
CREATE TABLE `th_invest_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '投资阶段名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='投资阶段';

-- ----------------------------
-- Records of th_invest_type
-- ----------------------------
INSERT INTO `th_invest_type` VALUES ('1', '天使初创期');
INSERT INTO `th_invest_type` VALUES ('2', '成长发展期');
INSERT INTO `th_invest_type` VALUES ('3', '成熟期');
INSERT INTO `th_invest_type` VALUES ('4', '上市公司');
INSERT INTO `th_invest_type` VALUES ('5', '收购');

-- ----------------------------
-- Table structure for th_member
-- ----------------------------
DROP TABLE IF EXISTS `th_member`;
CREATE TABLE `th_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL COMMENT '用户名',
  `pwd` varchar(32) NOT NULL COMMENT '密码双md5加密',
  `regtime` varchar(50) NOT NULL COMMENT '注册时间（时间戳类型）',
  `regip` varchar(20) DEFAULT NULL COMMENT '注册ip',
  `logintime` varchar(50) DEFAULT NULL COMMENT '最近登录时间（时间戳类型）',
  `loginip` varchar(20) DEFAULT NULL COMMENT '最近登陆ip',
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '会员状态0锁定1正常',
  `face` varchar(255) DEFAULT NULL COMMENT '头像',
  `email` varchar(100) DEFAULT NULL COMMENT '常用邮箱',
  `blogurl` varchar(255) DEFAULT NULL COMMENT '微博',
  `qq` varchar(20) DEFAULT NULL COMMENT 'QQ号',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tel` (`tel`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of th_member
-- ----------------------------
INSERT INTO `th_member` VALUES ('1', '悟空', '405fa33650a54b3ca6ae72c2965eefb0', '1425792056', '127.0.0.1', '', '', '1', '', 'wukong@163.com', '', '', '123');
INSERT INTO `th_member` VALUES ('3', '蒙多', '201e34a4a322b5b2d82a6280ca379c89', '1425792295', '127.0.0.1', '', '', '1', '', 'mengduo@qq.com', '', '', '11');
INSERT INTO `th_member` VALUES ('4', '我叫MT', '14e1b600b1fd579f47433b88e8d85291', '1425792319', '127.0.0.1', '', '', '1', '', 'wojiaomt@qq.com', '', '', '5');
INSERT INTO `th_member` VALUES ('5', '隔壁老王', '14e1b600b1fd579f47433b88e8d85291', '1425792372', '127.0.0.1', '', '', '1', '', 'gebilaowang@qq.com', '', '', '125');
INSERT INTO `th_member` VALUES ('6', '王尼玛', '480a79f182b336c7673d9bb8b17d6ecb', '1425792401', '127.0.0.1', '', '', '1', '', 'wangnima@qq.com', '', '', '458');
INSERT INTO `th_member` VALUES ('7', '会飞的猪', '14e1b600b1fd579f47433b88e8d85291', '1425792451', '127.0.0.1', '', '', '1', '', 'huifeidezhu@qq.com', '', '', '124');
INSERT INTO `th_member` VALUES ('8', '插上翅膀的猪', '14e1b600b1fd579f47433b88e8d85291', '1425792484', '127.0.0.1', '', '', '1', '', 'feitianzhu@qq.com', '', '', '658');
INSERT INTO `th_member` VALUES ('9', '掉毛的天使', '14e1b600b1fd579f47433b88e8d85291', '1425792519', '127.0.0.1', '', '', '1', '', 'diaomaodetianshi@qq.com', '', '', '465');
INSERT INTO `th_member` VALUES ('10', '万恶的旧社会', '14e1b600b1fd579f47433b88e8d85291', '1425792569', '127.0.0.1', '', '', '1', '', 'wanedejiushehui@qq.com', '', '', '111');
INSERT INTO `th_member` VALUES ('11', 'only丶逆', '14e1b600b1fd579f47433b88e8d85291', '1425792640', '127.0.0.1', '1425792640', '127.0.0.1', '1', 'Uploads/face/2015/03/09/123456789.jpg', 'onlyni@qq.com', 'http://www.lstae.com', '827400818', '18612333844');
INSERT INTO `th_member` VALUES ('15', '王宝强', '14e1b600b1fd579f47433b88e8d85291', '1425832996', '127.0.0.1', '', '', '1', '', 'wangbaoqiang@qq.com', '', '', '222');
INSERT INTO `th_member` VALUES ('16', 'mengruoyanyu', '4eb07d084fecffc1f1a62ca422205656', '1427081098', '0.0.0.0', null, null, '1', './Uploads/face/2015-03-25/s_55125a0aea9a4.gif', null, 'http://t.qq.com/mengruoyanyu?pgv_ref=im.minicard.icon&amp;ptlang=2052', '526256541', '18622306940');

-- ----------------------------
-- Table structure for th_nav
-- ----------------------------
DROP TABLE IF EXISTS `th_nav`;
CREATE TABLE `th_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '导航名',
  `pic` varchar(255) NOT NULL COMMENT '展示图片',
  `url` varchar(255) NOT NULL COMMENT '地址',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '100' COMMENT '排序1-100，值越小越靠前',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示，1是，0否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='导航表';

-- ----------------------------
-- Records of th_nav
-- ----------------------------
INSERT INTO `th_nav` VALUES ('1', '活动', './Uploads/nav/20150309/54fd97ca09094.png', 'active.php', '100', '1');
INSERT INTO `th_nav` VALUES ('2', '微时代', '', 'wsd.php', '100', '1');
INSERT INTO `th_nav` VALUES ('3', '开门见山', '', 'kmjs.php', '100', '1');
INSERT INTO `th_nav` VALUES ('4', '忠心人物', '', 'zxrw.php', '100', '1');
INSERT INTO `th_nav` VALUES ('5', '一语双关', '', 'yysg.php', '100', '1');
INSERT INTO `th_nav` VALUES ('6', '未来地图', '', 'wldt.php', '100', '1');
INSERT INTO `th_nav` VALUES ('8', '隐藏测试', '', 'yccs.php', '100', '0');

-- ----------------------------
-- Table structure for th_nav_article
-- ----------------------------
DROP TABLE IF EXISTS `th_nav_article`;
CREATE TABLE `th_nav_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL COMMENT '所属导航',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `come` varchar(255) NOT NULL COMMENT '来源',
  `from_url` varchar(255) NOT NULL COMMENT '具体地址',
  `intro` text NOT NULL COMMENT '简介',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `isshow` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='导航文章';

-- ----------------------------
-- Records of th_nav_article
-- ----------------------------
INSERT INTO `th_nav_article` VALUES ('2', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('3', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('4', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('6', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('7', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('8', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('9', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('10', '3', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('11', '4', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('12', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('13', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '1', null);
INSERT INTO `th_nav_article` VALUES ('14', '2', '场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', 'money.163.com', 'http://itjuzi.com/overview/news/20318', '', '', '2015', '04', '05', '0', null);

-- ----------------------------
-- Table structure for th_news
-- ----------------------------
DROP TABLE IF EXISTS `th_news`;
CREATE TABLE `th_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `company_id` int(11) unsigned NOT NULL COMMENT '新闻所属公司',
  `url` varchar(255) NOT NULL COMMENT '地址',
  `news_type_id` int(10) unsigned NOT NULL COMMENT '新闻类型',
  `isshow` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  `addtime` varchar(255) DEFAULT NULL,
  `show_img` varchar(100) DEFAULT NULL,
  `from_url` varchar(255) DEFAULT NULL,
  `content` text,
  `domain_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='新闻';

-- ----------------------------
-- Records of th_news
-- ----------------------------
INSERT INTO `th_news` VALUES ('1', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '3', '1', '1425792056', '', 'http://news.sina.com.cn', '', '8,15');
INSERT INTO `th_news` VALUES ('2', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '16');
INSERT INTO `th_news` VALUES ('3', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('4', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('5', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('6', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('7', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('8', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('9', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('11', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('12', '市场“老大”全时通信收购“老二”视高，中国SAAS市场或将引爆', '1', 'money.163.com', '1', '1', '1425792056', '', '', '', '1');
INSERT INTO `th_news` VALUES ('15', '天使汇：创业大潮中的卖水人', '1', 'www.ishuxin.cn', '11', '1', '1426780015', '', '', '', '1,2');
INSERT INTO `th_news` VALUES ('16', '社交金融App熟信本周获得陶石资本天使投资，估值1亿', '2', 'www.lieyunwang.com', '0', '1', '1426780066', './Uploads/news/20150409/5525cedc76829.png', 'http://news.sina.com.cn/c/2015-03-29/175431657977.shtml', '', '');
INSERT INTO `th_news` VALUES ('18', '创业大潮中的卖水人', '2', 'www.ishuxin.cn', '0', '1', '1428543355', './Uploads/news/20150409/5525d77b7b100.png', 'www.ishuxin.cn', '&lt;p&gt;创业大潮中的卖水人&lt;br/&gt;&lt;/p&gt;', '');

-- ----------------------------
-- Table structure for th_news_type
-- ----------------------------
DROP TABLE IF EXISTS `th_news_type`;
CREATE TABLE `th_news_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='新闻类型表';

-- ----------------------------
-- Records of th_news_type
-- ----------------------------
INSERT INTO `th_news_type` VALUES ('1', '产品发布');
INSERT INTO `th_news_type` VALUES ('2', '投资并购');
INSERT INTO `th_news_type` VALUES ('3', '人物访谈');
INSERT INTO `th_news_type` VALUES ('4', '分析评论');
INSERT INTO `th_news_type` VALUES ('5', '活动会议');
INSERT INTO `th_news_type` VALUES ('6', '数据信息');
INSERT INTO `th_news_type` VALUES ('7', '竞争合作');
INSERT INTO `th_news_type` VALUES ('8', '传言预测');
INSERT INTO `th_news_type` VALUES ('9', '排名奖项');
INSERT INTO `th_news_type` VALUES ('10', '关停调整');
INSERT INTO `th_news_type` VALUES ('11', '人事变动');
INSERT INTO `th_news_type` VALUES ('12', '其他');

-- ----------------------------
-- Table structure for th_objective
-- ----------------------------
DROP TABLE IF EXISTS `th_objective`;
CREATE TABLE `th_objective` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='目的表';

-- ----------------------------
-- Records of th_objective
-- ----------------------------
INSERT INTO `th_objective` VALUES ('1', '找投资');
INSERT INTO `th_objective` VALUES ('2', '找合伙人');
INSERT INTO `th_objective` VALUES ('3', '找投资对象');
INSERT INTO `th_objective` VALUES ('4', '找联系方式');
INSERT INTO `th_objective` VALUES ('5', '找业务机会');
INSERT INTO `th_objective` VALUES ('6', '找工作机会');
INSERT INTO `th_objective` VALUES ('7', '找报道对象');
INSERT INTO `th_objective` VALUES ('8', '随便看看');
INSERT INTO `th_objective` VALUES ('9', '了解新公司新产品');

-- ----------------------------
-- Table structure for th_person
-- ----------------------------
DROP TABLE IF EXISTS `th_person`;
CREATE TABLE `th_person` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `ability_id` varchar(255) DEFAULT NULL COMMENT 'abilityid创业者可以有多个能力用‘|’隔开',
  `province_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '省id',
  `city_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '市id',
  `education` varchar(255) DEFAULT NULL COMMENT '教育',
  `work` varchar(255) DEFAULT NULL COMMENT '工作',
  `intro` varchar(500) DEFAULT NULL COMMENT '一句话介绍',
  `objective_id` varchar(255) DEFAULT NULL COMMENT '目的表',
  `domain_id` varchar(255) DEFAULT NULL COMMENT '领域id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='创业者表';

-- ----------------------------
-- Records of th_person
-- ----------------------------
INSERT INTO `th_person` VALUES ('1', '1', '', '0', '0', '', '', '', '', '1');
INSERT INTO `th_person` VALUES ('3', '3', '', '0', '0', '', '', '', '', '2');
INSERT INTO `th_person` VALUES ('4', '4', '', '0', '0', '', '', '', '', '5');
INSERT INTO `th_person` VALUES ('5', '5', '', '0', '0', '', '', '', '', '9');
INSERT INTO `th_person` VALUES ('6', '6', '', '0', '0', '', '', '', '', '3');
INSERT INTO `th_person` VALUES ('7', '7', '', '0', '0', '', '', '', '', '5');
INSERT INTO `th_person` VALUES ('8', '8', '', '0', '0', '', '', '', '', '7');
INSERT INTO `th_person` VALUES ('9', '9', '', '0', '0', '', '', '', '', '10');
INSERT INTO `th_person` VALUES ('10', '10', '', '0', '0', '', '', '', '', '8');
INSERT INTO `th_person` VALUES ('11', '11', '1|2|5', '1', '1', '大学', '程序员', '我是最帅的', '4|6', '6');
INSERT INTO `th_person` VALUES ('15', '15', '', '0', '0', '', '', '', '', '1');
INSERT INTO `th_person` VALUES ('16', '16', '6|7', '1', '1', 'XX大学', 'XXX工作', '双丰收的方法是第三代', '4', '5');

-- ----------------------------
-- Table structure for th_province
-- ----------------------------
DROP TABLE IF EXISTS `th_province`;
CREATE TABLE `th_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `intro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='省';

-- ----------------------------
-- Records of th_province
-- ----------------------------
INSERT INTO `th_province` VALUES ('1', '110000', '北京市', '北京-北京-北京-北京1');
INSERT INTO `th_province` VALUES ('2', '120000', '天津市', '123123123');
INSERT INTO `th_province` VALUES ('3', '130000', '河北省', '12312312');
INSERT INTO `th_province` VALUES ('4', '140000', '山西省', '');
INSERT INTO `th_province` VALUES ('5', '150000', '内蒙古', '');
INSERT INTO `th_province` VALUES ('6', '210000', '辽宁省', '');
INSERT INTO `th_province` VALUES ('7', '220000', '吉林省', '');
INSERT INTO `th_province` VALUES ('8', '230000', '黑龙江', '');
INSERT INTO `th_province` VALUES ('9', '310000', '上海市', '');
INSERT INTO `th_province` VALUES ('10', '320000', '江苏省', '');
INSERT INTO `th_province` VALUES ('11', '330000', '浙江省', '');
INSERT INTO `th_province` VALUES ('12', '340000', '安徽省', '');
INSERT INTO `th_province` VALUES ('13', '350000', '福建省', '');
INSERT INTO `th_province` VALUES ('14', '360000', '江西省', '');
INSERT INTO `th_province` VALUES ('15', '370000', '山东省', '');
INSERT INTO `th_province` VALUES ('16', '410000', '河南省', '');
INSERT INTO `th_province` VALUES ('17', '420000', '湖北省', '');
INSERT INTO `th_province` VALUES ('18', '430000', '湖南省', '');
INSERT INTO `th_province` VALUES ('19', '440000', '广东省', '');
INSERT INTO `th_province` VALUES ('20', '450000', '广  西', '');
INSERT INTO `th_province` VALUES ('21', '460000', '海南省', '');
INSERT INTO `th_province` VALUES ('22', '500000', '重庆市', '');
INSERT INTO `th_province` VALUES ('23', '510000', '四川省', '');
INSERT INTO `th_province` VALUES ('24', '520000', '贵州省', '');
INSERT INTO `th_province` VALUES ('25', '530000', '云南省', '');
INSERT INTO `th_province` VALUES ('26', '540000', '西  藏', '');
INSERT INTO `th_province` VALUES ('27', '610000', '陕西省', '');
INSERT INTO `th_province` VALUES ('28', '620000', '甘肃省', '');
INSERT INTO `th_province` VALUES ('29', '630000', '青海省', '');
INSERT INTO `th_province` VALUES ('30', '640000', '宁  夏', '');
INSERT INTO `th_province` VALUES ('31', '650000', '新  疆', '');
INSERT INTO `th_province` VALUES ('32', '710000', '台湾省', '');
INSERT INTO `th_province` VALUES ('33', '810000', '香  港', '');
INSERT INTO `th_province` VALUES ('34', '820000', '澳  门', '');

-- ----------------------------
-- Table structure for th_system
-- ----------------------------
DROP TABLE IF EXISTS `th_system`;
CREATE TABLE `th_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webname` varchar(225) NOT NULL COMMENT '网站名称',
  `home` varchar(255) NOT NULL COMMENT '网站首页地址',
  `keywords` varchar(255) NOT NULL COMMENT '关键字',
  `intro` varchar(255) NOT NULL COMMENT '描述',
  `icp` varchar(255) NOT NULL COMMENT '备案号',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `contact` varchar(255) NOT NULL COMMENT '联系人',
  `tel` varchar(255) NOT NULL COMMENT '电话',
  `address` varchar(255) NOT NULL COMMENT '地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统设置';

-- ----------------------------
-- Records of th_system
-- ----------------------------
INSERT INTO `th_system` VALUES ('1', '未来门官方网站', 'localhost', 'maxwei，IT桔子', 'maxwei，快微站创始人', '京ICP备14026526号-2', '827400818@qq.com', 'maxwei', '18612333844', '北京市昌平区');
