/*
Navicat MySQL Data Transfer

Source Server         : honny
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : luoyou

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2015-02-26 21:04:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'admin', 'ly_admin');

-- ----------------------------
-- Table structure for `t_article`
-- ----------------------------
DROP TABLE IF EXISTS `t_article`;
CREATE TABLE `t_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) DEFAULT NULL,
  `article_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL,
  `article_title` text,
  `article_content` longtext,
  `article_label` varchar(255) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_top` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_article
-- ----------------------------

-- ----------------------------
-- Table structure for `t_category`
-- ----------------------------
DROP TABLE IF EXISTS `t_category`;
CREATE TABLE `t_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) DEFAULT NULL,
  `relate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_category
-- ----------------------------
INSERT INTO `t_category` VALUES ('1', '裸游论坛', '0');
INSERT INTO `t_category` VALUES ('2', '裸游锦囊', '0');
INSERT INTO `t_category` VALUES ('3', 'AA结伴', '1');
INSERT INTO `t_category` VALUES ('4', '裸游分享', '1');
INSERT INTO `t_category` VALUES ('5', '一起啊啊', '1');
INSERT INTO `t_category` VALUES ('6', '一起裸游', '0');
INSERT INTO `t_category` VALUES ('7', '一起裸游', '1');

-- ----------------------------
-- Table structure for `t_member`
-- ----------------------------
DROP TABLE IF EXISTS `t_member`;
CREATE TABLE `t_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `signature` text,
  `gender` char(4) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_member
-- ----------------------------

-- ----------------------------
-- Table structure for `t_message`
-- ----------------------------
DROP TABLE IF EXISTS `t_message`;
CREATE TABLE `t_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `message_content` text,
  `is_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_message
-- ----------------------------

-- ----------------------------
-- Table structure for `t_reply`
-- ----------------------------
DROP TABLE IF EXISTS `t_reply`;
CREATE TABLE `t_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `reply_content` text,
  `member_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `relate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_reply
-- ----------------------------
