/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : cms

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 31/10/2019 18:09:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pre_admin
-- ----------------------------
DROP TABLE IF EXISTS `pre_admin`;
CREATE TABLE `pre_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `salt` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `times` int(11) NULL DEFAULT NULL,
  `last_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `last_ip` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `ip` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `contacts` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `sex` int(2) NULL DEFAULT NULL,
  `phone` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `office_phone` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `pic` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `province` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `county` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `town` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `up_id` int(11) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `add_user` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pre_admin
-- ----------------------------
INSERT INTO `pre_admin` VALUES (1, 'admin', 'fd1663ffd1bdeccb9d2acc879573e7ee', '07fd5b51e3fbc75937dea94f09fe14c0', NULL, '2019-10-31 17:38:20', '2019-10-31 18:09:15', '127.0.0.1', '127.0.0.1', '李四', 2, '18365498564', '15623658645', '4546789@qq.com', '33.png', '/uploads/image/20191028\\33fc66b3de55fc9c5de6d6697741ca6e.png', '370000', '370100', '370102', NULL, 0, 1, 'root', '<p>数据都是打工的封建快攻尽快答复即可观看</p>', '', '2019-10-30 11:43:12');
INSERT INTO `pre_admin` VALUES (21, 'www', '0fcc9562b88cc55108e8456d1e41174a', 'eee44aeb2aa18de7aeaf8447e44f5e4f', NULL, '', '2019-10-29 17:29:31', '', '127.0.0.1', '张三', 1, '18326598654', '1856236589', '4556655@qq.com', '33.png', '/uploads/image/20191029\\6a420f3bd3e457af6bf811a39f9417c3.png', '120000', '120100', '120101', NULL, 14, 33, 'root', '<p style=\"text-align: center;\">费德勒和对方考虑的反对鬼地方的功放开关</p>\n<p style=\"text-indent: 2em;\">费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关</p>\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\n<tbody>\n<tr>\n<td style=\"width: 50%;\"><img src=\"../../uploads/image/20191029\\7e9140ebd1634527bd47751e9afd9184.png\" alt=\"33.png\" width=\"220\" height=\"230\" /></td>\n<td style=\"width: 50%;\"><img src=\"../../uploads/image/20191029\\8d3260b03818bb113f5c58784c6d29a3.jpg\" alt=\"1.jpg\" width=\"220\" height=\"147\" /></td>\n</tr>\n</tbody>\n</table>', '2019-10-29 17:29:31', '2019-10-29 17:53:27');
INSERT INTO `pre_admin` VALUES (22, 'root', '9739f32b622007cb6594a0d131bedd66', '6f77ebf94385b5c1560d4abae0e4f49f', NULL, '', '2019-10-29 17:33:06', '', '127.0.0.1', '户籍科', 1, '18352654562', '21457876', '1452865@qq.com', '33.png', '/uploads/image/20191029\\f7302d389c726c9af81da2285b11ddff.png', '140000', '140100', '140105', NULL, 14, 33, 'root', '<p style=\"text-align: center;\">十大科技高科技的世界观豆腐干反对开挂看</p>\n<p style=\"text-align: left; text-indent: 2em;\">十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看</p>\n<p style=\"text-align: left; text-indent: 2em;\">十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看</p>\n<p style=\"text-align: left; text-indent: 2em;\">十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看</p>', '2019-10-29 17:33:06', '2019-10-29 17:38:46');

-- ----------------------------
-- Table structure for pre_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `pre_admin_log`;
CREATE TABLE `pre_admin_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ip` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `action` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sql_cont` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `db_level` int(2) NOT NULL,
  `remarks` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 147 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pre_admin_log
-- ----------------------------
INSERT INTO `pre_admin_log` VALUES (1, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-11 09:34:39\' , `time` = \'2019-10-11 09:51:24\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-11 09:51:24', '2019-10-11 09:51:24');
INSERT INTO `pre_admin_log` VALUES (2, 1, 'admin', '127.0.0.1', '用户【】添加成功', 'INSERT INTO `pre_admin` (`name` , `password` , `contacts` , `sex` , `pic` , `office_phone` , `phone` , `email` , `role_id` , `remarks` , `id` , `add_user` , `salt` , `create_time` , `time` , `ip` , `up_id`) VALUES (\'root\' , \'fb3be6eba5a3eddc5d13db3c913c9431\' , \'张三\' , 1 , \'/uploads/20191011\\\\db89a0238d1ee24ccae2aec064cfe277.png\' , \'156236586\' , \'18365498564\' , \'4546789@qq.com\' , 7 , \'\' , 0 , \'admin\' , \'02b1a816294fa45bf2877f1ea755645d\' , \'2019-10-11 10:26:12\' , \'2019-10-11 10:26:12\' , \'127.0.0.1\' , 1)', 1, '', '2019-10-11 10:26:12', '2019-10-11 10:26:12');
INSERT INTO `pre_admin_log` VALUES (3, 14, 'root', '127.0.0.1', '用户【root】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-11 10:26:12\' , `time` = \'2019-10-11 10:32:28\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 14', 3, '', '2019-10-11 10:32:28', '2019-10-11 10:32:28');
INSERT INTO `pre_admin_log` VALUES (4, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-11 09:51:24\' , `time` = \'2019-10-11 10:33:12\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-11 10:33:12', '2019-10-11 10:33:12');
INSERT INTO `pre_admin_log` VALUES (5, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-11 10:33:12\' , `time` = \'2019-10-11 15:48:28\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-11 15:48:28', '2019-10-11 15:48:28');
INSERT INTO `pre_admin_log` VALUES (6, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-11 15:48:28\' , `time` = \'2019-10-12 09:06:59\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-12 09:07:00', '2019-10-12 09:07:00');
INSERT INTO `pre_admin_log` VALUES (7, 4, 'user_admin', '127.0.0.1', '用户【user_admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2018-04-10 09:59:49\' , `time` = \'2019-10-12 09:09:31\' , `last_ip` = \'58.56.62.34\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 4', 3, '', '2019-10-12 09:09:31', '2019-10-12 09:09:31');
INSERT INTO `pre_admin_log` VALUES (8, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-12 09:06:59\' , `time` = \'2019-10-12 09:10:01\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-12 09:10:01', '2019-10-12 09:10:01');
INSERT INTO `pre_admin_log` VALUES (9, 1, 'admin', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'1&336:|2&3:31,32,58&4:33,35,59,70,71&5:36,38,43,60|123&124:130,131,132,133&125:126,127,128,129|134&135:136,137,138,139,140&296:297,298,299,300|11&12:&13:78&80:81&14:\' , `ac_path` = \'index,admin,permission,role,Institution,Manager,Merchant,MerchantNum,Password,AdminLog,AdminLog,Profile\' , `update_time` = \'2019-10-12 18:19:14\'  WHERE  `id` = 1', 3, '', '2019-10-12 18:19:14', '2019-10-12 18:19:14');
INSERT INTO `pre_admin_log` VALUES (10, 1, 'admin', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'1&336:|2&3:31,32,58&4:33,35,59,70,71&5:36,38,43,60|123&124:130,131,132,133&125:126,127,128,129|134&135:136,137,138,139,140&296:297,298,299,300\' , `ac_path` = \'index,admin,permission,role,Institution,Manager,Merchant,MerchantNum\' , `update_time` = \'2019-10-12 18:21:16\'  WHERE  `id` = 33', 3, '', '2019-10-12 18:21:17', '2019-10-12 18:21:17');
INSERT INTO `pre_admin_log` VALUES (11, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-12 09:10:01\' , `time` = \'2019-10-14 11:15:05\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-14 11:15:05', '2019-10-14 11:15:05');
INSERT INTO `pre_admin_log` VALUES (12, 1, 'admin', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'1|2&3:4,5&6:343,344&345:346,347\' , `ac_path` = \'admin,permission,role\' , `update_time` = \'2019-10-14 11:32:19\'  WHERE  `id` = 1', 3, '', '2019-10-14 11:32:19', '2019-10-14 11:32:19');
INSERT INTO `pre_admin_log` VALUES (13, 1, 'admin', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'2&3:4,5&6:343,344&345:346,347\' , `ac_path` = \'admin,permission,role\' , `update_time` = \'2019-10-14 13:10:48\'  WHERE  `id` = 33', 3, '', '2019-10-14 13:10:49', '2019-10-14 13:10:49');
INSERT INTO `pre_admin_log` VALUES (14, 14, 'root', '127.0.0.1', '用户【root】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-11 10:32:28\' , `time` = \'2019-10-14 13:11:42\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 14', 3, '', '2019-10-14 13:11:43', '2019-10-14 13:11:43');
INSERT INTO `pre_admin_log` VALUES (15, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-14 11:15:05\' , `time` = \'2019-10-14 13:52:41\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-14 13:52:41', '2019-10-14 13:52:41');
INSERT INTO `pre_admin_log` VALUES (16, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-14 13:52:41\' , `time` = \'2019-10-14 16:12:32\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-14 16:12:32', '2019-10-14 16:12:32');
INSERT INTO `pre_admin_log` VALUES (17, 14, 'root', '127.0.0.1', '用户【root】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-14 13:11:42\' , `time` = \'2019-10-14 16:24:48\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 14', 3, '', '2019-10-14 16:24:48', '2019-10-14 16:24:48');
INSERT INTO `pre_admin_log` VALUES (18, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-14 16:12:32\' , `time` = \'2019-10-14 16:48:22\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-14 16:48:22', '2019-10-14 16:48:22');
INSERT INTO `pre_admin_log` VALUES (19, 14, 'root', '127.0.0.1', '用户【root】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-14 16:24:48\' , `time` = \'2019-10-14 16:48:56\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 14', 3, '', '2019-10-14 16:48:56', '2019-10-14 16:48:56');
INSERT INTO `pre_admin_log` VALUES (20, 14, 'root', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'2&3:4,5&6:343,344&345:346,347\' , `ac_path` = \'admin,permission,role\' , `update_time` = \'2019-10-14 17:13:48\'  WHERE  `id` = 33', 3, '', '2019-10-14 17:13:48', '2019-10-14 17:13:48');
INSERT INTO `pre_admin_log` VALUES (21, 14, 'root', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'1|2&3:4,5&6:343,344&345:346,347\' , `ac_path` = \'admin,permission,role\' , `update_time` = \'2019-10-14 17:22:18\'  WHERE  `id` = 1', 3, '', '2019-10-14 17:22:18', '2019-10-14 17:22:18');
INSERT INTO `pre_admin_log` VALUES (22, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-14 16:48:22\' , `time` = \'2019-10-16 09:27:56\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-16 09:27:56', '2019-10-16 09:27:56');
INSERT INTO `pre_admin_log` VALUES (23, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-16 09:27:56\' , `time` = \'2019-10-16 11:33:11\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-16 11:33:11', '2019-10-16 11:33:11');
INSERT INTO `pre_admin_log` VALUES (24, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-16 11:33:11\' , `time` = \'2019-10-17 08:48:21\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-17 08:48:21', '2019-10-17 08:48:21');
INSERT INTO `pre_admin_log` VALUES (25, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-17 08:48:21\' , `time` = \'2019-10-17 17:51:02\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-17 17:51:02', '2019-10-17 17:51:02');
INSERT INTO `pre_admin_log` VALUES (26, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-17 17:51:02\' , `time` = \'2019-10-18 09:02:06\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-18 09:02:06', '2019-10-18 09:02:06');
INSERT INTO `pre_admin_log` VALUES (27, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-18 09:02:06\' , `time` = \'2019-10-18 15:32:43\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-18 15:32:43', '2019-10-18 15:32:43');
INSERT INTO `pre_admin_log` VALUES (28, 1, 'admin', '127.0.0.1', '用户【admin】导入数据成功', 'INSERT INTO `pre_admin` (`name` , `contacts` , `phone` , `email` , `ip` , `password` , `salt` , `create_time` , `time` , `up_id` , `sex`) VALUES ( \'admin\',\'超级管理员\',\'17862795733\',\'phpsix@163.com\',\'127.0.0.1\',\'402dc2a6a9060e1acd45d82b291cfd78\',\'7adae80c8c322a7be826c3d25010b188\',\'2019-10-18 16:37:48\',\'2019-10-18 16:37:48\',1,1 ) , ( \'root\',\'张三\',\'18365498564\',\'4546789@qq.com\',\'127.0.0.1\',\'b16b41886ceb3efc7917bb880bb245fc\',\'ae114ed472a07af4f853e4bb0304b711\',\'2019-10-18 16:37:48\',\'2019-10-18 16:37:48\',1,1 )', 1, '', '2019-10-18 16:37:49', '2019-10-18 16:37:49');
INSERT INTO `pre_admin_log` VALUES (29, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-18 15:32:43\' , `time` = \'2019-10-18 17:44:17\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-18 17:44:17', '2019-10-18 17:44:17');
INSERT INTO `pre_admin_log` VALUES (30, 1, 'admin', '127.0.0.1', '用户【admin】导入数据成功', 'INSERT INTO `pre_admin` (`name` , `contacts` , `phone` , `email` , `ip` , `password` , `salt` , `create_time` , `time` , `up_id` , `sex`) VALUES ( \'admin\',\'超级管理员\',\'17862795733\',\'phpsix@163.com\',\'127.0.0.1\',\'e8426dccfc720db6ef775c4f543b0ab8\',\'a63e9b7d42a7fee09f2bc07770fe7f68\',\'2019-10-18 18:28:19\',\'2019-10-18 18:28:19\',1,1 ) , ( \'root\',\'张三\',\'18365498564\',\'4546789@qq.com\',\'127.0.0.1\',\'1409c36db0f94a60d8edd1270a7b8a4d\',\'0da4592dbf2f1f5c883539b620d9e101\',\'2019-10-18 18:28:19\',\'2019-10-18 18:28:19\',1,1 )', 1, '', '2019-10-18 18:28:19', '2019-10-18 18:28:19');
INSERT INTO `pre_admin_log` VALUES (31, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-18 17:44:17\' , `time` = \'2019-10-19 09:09:26\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 09:09:26', '2019-10-19 09:09:26');
INSERT INTO `pre_admin_log` VALUES (32, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 09:09:26\' , `time` = \'2019-10-19 09:31:38\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 09:31:38', '2019-10-19 09:31:38');
INSERT INTO `pre_admin_log` VALUES (33, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\89bd251757d4558bbcb6f12005173a2d.png\' , `file_name` = \'33.png\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:36:16\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:36:16', '2019-10-19 11:36:16');
INSERT INTO `pre_admin_log` VALUES (34, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\89bd251757d4558bbcb6f12005173a2d.png\' , `file_name` = \'33.png\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:37:54\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:37:54', '2019-10-19 11:37:54');
INSERT INTO `pre_admin_log` VALUES (35, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\89bd251757d4558bbcb6f12005173a2d.png\' , `file_name` = \'33.png\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:38:25\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:38:25', '2019-10-19 11:38:25');
INSERT INTO `pre_admin_log` VALUES (36, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\97642d8d7e3810e5e64f8c125a50d478.jpg\' , `file_name` = \'1.jpg\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:44:08\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:44:09', '2019-10-19 11:44:09');
INSERT INTO `pre_admin_log` VALUES (37, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\97642d8d7e3810e5e64f8c125a50d478.jpg\' , `file_name` = \'1.jpg\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:44:29\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:44:29', '2019-10-19 11:44:29');
INSERT INTO `pre_admin_log` VALUES (38, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\97642d8d7e3810e5e64f8c125a50d478.jpg\' , `file_name` = \'1.jpg\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:47:23\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:47:23', '2019-10-19 11:47:23');
INSERT INTO `pre_admin_log` VALUES (39, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\97642d8d7e3810e5e64f8c125a50d478.jpg\' , `file_name` = \'1.jpg\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:49:37\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:49:37', '2019-10-19 11:49:37');
INSERT INTO `pre_admin_log` VALUES (40, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\97642d8d7e3810e5e64f8c125a50d478.jpg\' , `file_name` = \'1.jpg\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 11:49:49\'  WHERE  `id` = 14', 3, '', '2019-10-19 11:49:49', '2019-10-19 11:49:49');
INSERT INTO `pre_admin_log` VALUES (41, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 09:31:38\' , `time` = \'2019-10-19 15:32:20\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 15:32:20', '2019-10-19 15:32:20');
INSERT INTO `pre_admin_log` VALUES (42, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 15:32:20\' , `time` = \'2019-10-19 15:32:49\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 15:32:49', '2019-10-19 15:32:49');
INSERT INTO `pre_admin_log` VALUES (43, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 15:32:49\' , `time` = \'2019-10-19 15:38:26\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 15:38:26', '2019-10-19 15:38:26');
INSERT INTO `pre_admin_log` VALUES (44, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\97642d8d7e3810e5e64f8c125a50d478.jpg\' , `file_name` = \'1.jpg\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 15:41:45\'  WHERE  `id` = 14', 3, '', '2019-10-19 15:41:45', '2019-10-19 15:41:45');
INSERT INTO `pre_admin_log` VALUES (45, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\97642d8d7e3810e5e64f8c125a50d478.jpg\' , `file_name` = \'1.jpg\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 15:42:40\'  WHERE  `id` = 14', 3, '', '2019-10-19 15:42:40', '2019-10-19 15:42:40');
INSERT INTO `pre_admin_log` VALUES (46, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\576f54c29bde2cd9cddbe994fd077376.png\' , `file_name` = \'33.png\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 15:42:53\'  WHERE  `id` = 14', 3, '', '2019-10-19 15:42:53', '2019-10-19 15:42:53');
INSERT INTO `pre_admin_log` VALUES (47, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\576f54c29bde2cd9cddbe994fd077376.png\' , `file_name` = \'33.png\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 15:45:15\'  WHERE  `id` = 14', 3, '', '2019-10-19 15:45:15', '2019-10-19 15:45:15');
INSERT INTO `pre_admin_log` VALUES (48, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `name` = \'root\' , `password` = \'fb3be6eba5a3eddc5d13db3c913c9431\' , `contacts` = \'张三\' , `sex` = 2 , `pic` = \'/uploads/20191019\\\\576f54c29bde2cd9cddbe994fd077376.png\' , `file_name` = \'33.png\' , `province` = \'120000\' , `city` = \'120100\' , `county` = \'120103\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `role_id` = 1 , `remarks` = \'\' , `add_user` = \'admin\' , `update_time` = \'2019-10-19 16:10:37\'  WHERE  `id` = 14', 3, '', '2019-10-19 16:10:37', '2019-10-19 16:10:37');
INSERT INTO `pre_admin_log` VALUES (49, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 15:38:26\' , `time` = \'2019-10-19 16:39:19\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 16:39:19', '2019-10-19 16:39:19');
INSERT INTO `pre_admin_log` VALUES (50, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 16:39:19\' , `time` = \'2019-10-19 16:56:57\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 16:56:57', '2019-10-19 16:56:57');
INSERT INTO `pre_admin_log` VALUES (51, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 16:56:57\' , `time` = \'2019-10-19 17:00:04\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-19 17:00:04', '2019-10-19 17:00:04');
INSERT INTO `pre_admin_log` VALUES (52, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-19 17:05:24', '2019-10-19 17:05:24');
INSERT INTO `pre_admin_log` VALUES (53, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-19 17:05:40', '2019-10-19 17:05:40');
INSERT INTO `pre_admin_log` VALUES (54, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-19 17:45:01', '2019-10-19 17:45:01');
INSERT INTO `pre_admin_log` VALUES (55, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-19 17:00:04\' , `time` = \'2019-10-21 10:35:23\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-21 10:35:23', '2019-10-21 10:35:23');
INSERT INTO `pre_admin_log` VALUES (56, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-21 10:35:23\' , `time` = \'2019-10-21 17:09:48\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-21 17:09:48', '2019-10-21 17:09:48');
INSERT INTO `pre_admin_log` VALUES (57, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-21 17:50:05', '2019-10-21 17:50:05');
INSERT INTO `pre_admin_log` VALUES (58, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-21 17:09:48\' , `time` = \'2019-10-22 09:14:08\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-22 09:14:08', '2019-10-22 09:14:08');
INSERT INTO `pre_admin_log` VALUES (59, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-22 09:14:08\' , `time` = \'2019-10-22 16:30:43\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-22 16:30:43', '2019-10-22 16:30:43');
INSERT INTO `pre_admin_log` VALUES (60, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-22 16:30:43\' , `time` = \'2019-10-22 16:31:16\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-22 16:31:16', '2019-10-22 16:31:16');
INSERT INTO `pre_admin_log` VALUES (61, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-22 16:31:16\' , `time` = \'2019-10-22 16:33:50\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-22 16:33:50', '2019-10-22 16:33:50');
INSERT INTO `pre_admin_log` VALUES (62, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-22 16:33:50\' , `time` = \'2019-10-22 16:38:11\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-22 16:38:11', '2019-10-22 16:38:11');
INSERT INTO `pre_admin_log` VALUES (63, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-22 16:38:11\' , `time` = \'2019-10-22 16:56:40\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-22 16:56:40', '2019-10-22 16:56:40');
INSERT INTO `pre_admin_log` VALUES (64, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-22 16:56:40\' , `time` = \'2019-10-23 10:33:05\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-23 10:33:05', '2019-10-23 10:33:05');
INSERT INTO `pre_admin_log` VALUES (65, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-23 10:33:05\' , `time` = \'2019-10-23 12:04:29\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-23 12:04:29', '2019-10-23 12:04:29');
INSERT INTO `pre_admin_log` VALUES (66, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-23 12:04:29\' , `time` = \'2019-10-23 17:01:32\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-23 17:01:32', '2019-10-23 17:01:32');
INSERT INTO `pre_admin_log` VALUES (67, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-23 17:01:32\' , `time` = \'2019-10-23 18:18:55\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-23 18:18:55', '2019-10-23 18:18:55');
INSERT INTO `pre_admin_log` VALUES (68, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-23 18:18:55\' , `time` = \'2019-10-24 09:44:21\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-24 09:44:21', '2019-10-24 09:44:21');
INSERT INTO `pre_admin_log` VALUES (69, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-24 09:44:53', '2019-10-24 09:44:53');
INSERT INTO `pre_admin_log` VALUES (70, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-24 09:44:21\' , `time` = \'2019-10-24 13:45:08\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-24 13:45:08', '2019-10-24 13:45:08');
INSERT INTO `pre_admin_log` VALUES (71, 1, 'admin', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'1|2&3:4,5&6:343,344&345:346,347|348&349:\' , `ac_path` = \'admin,permission,role,system\' , `update_time` = \'2019-10-24 14:08:17\'  WHERE  `id` = 1', 3, '', '2019-10-24 14:08:17', '2019-10-24 14:08:17');
INSERT INTO `pre_admin_log` VALUES (72, 1, 'admin', '127.0.0.1', '角色赋权成功！', 'UPDATE `pre_role`  SET `permis_ids` = \'1|2&3:4,5&6:343,344&345:346,347\' , `ac_path` = \'admin,permission,role\' , `update_time` = \'2019-10-24 14:13:09\'  WHERE  `id` = 33', 3, '', '2019-10-24 14:13:09', '2019-10-24 14:13:09');
INSERT INTO `pre_admin_log` VALUES (73, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-24 13:45:08\' , `time` = \'2019-10-24 15:38:38\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-24 15:38:38', '2019-10-24 15:38:38');
INSERT INTO `pre_admin_log` VALUES (74, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-24 15:38:38\' , `time` = \'2019-10-24 15:50:29\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-24 15:50:29', '2019-10-24 15:50:29');
INSERT INTO `pre_admin_log` VALUES (75, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-24 15:54:08', '2019-10-24 15:54:08');
INSERT INTO `pre_admin_log` VALUES (76, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-24 16:14:13', '2019-10-24 16:14:13');
INSERT INTO `pre_admin_log` VALUES (77, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-24 15:50:29\' , `time` = \'2019-10-24 17:25:20\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-24 17:25:20', '2019-10-24 17:25:20');
INSERT INTO `pre_admin_log` VALUES (78, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-24 17:25:20\' , `time` = \'2019-10-25 09:11:07\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-25 09:11:08', '2019-10-25 09:11:08');
INSERT INTO `pre_admin_log` VALUES (79, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-25 09:11:07\' , `time` = \'2019-10-25 14:10:01\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-25 14:10:01', '2019-10-25 14:10:01');
INSERT INTO `pre_admin_log` VALUES (80, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-25 14:10:24', '2019-10-25 14:10:24');
INSERT INTO `pre_admin_log` VALUES (81, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-25 14:25:47', '2019-10-25 14:25:47');
INSERT INTO `pre_admin_log` VALUES (82, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-25 14:10:01\' , `time` = \'2019-10-25 15:19:54\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-25 15:19:55', '2019-10-25 15:19:55');
INSERT INTO `pre_admin_log` VALUES (83, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-25 16:42:43', '2019-10-25 16:42:43');
INSERT INTO `pre_admin_log` VALUES (84, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-25 17:26:28', '2019-10-25 17:26:28');
INSERT INTO `pre_admin_log` VALUES (85, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-25 17:29:17', '2019-10-25 17:29:17');
INSERT INTO `pre_admin_log` VALUES (86, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-25 17:30:21', '2019-10-25 17:30:21');
INSERT INTO `pre_admin_log` VALUES (87, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-25 15:19:54\' , `time` = \'2019-10-25 18:28:14\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-25 18:28:14', '2019-10-25 18:28:14');
INSERT INTO `pre_admin_log` VALUES (88, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-25 18:28:14\' , `time` = \'2019-10-26 09:03:38\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-26 09:03:38', '2019-10-26 09:03:38');
INSERT INTO `pre_admin_log` VALUES (89, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-26 09:03:38\' , `time` = \'2019-10-26 15:56:32\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-26 15:56:32', '2019-10-26 15:56:32');
INSERT INTO `pre_admin_log` VALUES (90, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-26 15:56:32\' , `time` = \'2019-10-26 17:46:38\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-26 17:46:38', '2019-10-26 17:46:38');
INSERT INTO `pre_admin_log` VALUES (91, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-26 17:46:38\' , `time` = \'2019-10-28 09:10:13\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-28 09:10:13', '2019-10-28 09:10:13');
INSERT INTO `pre_admin_log` VALUES (92, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-28 09:10:13\' , `time` = \'2019-10-28 09:22:27\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-28 09:22:27', '2019-10-28 09:22:27');
INSERT INTO `pre_admin_log` VALUES (93, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-28 09:22:27\' , `time` = \'2019-10-28 12:08:21\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-28 12:08:21', '2019-10-28 12:08:21');
INSERT INTO `pre_admin_log` VALUES (94, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 12:11:18', '2019-10-28 12:11:18');
INSERT INTO `pre_admin_log` VALUES (95, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-28 12:13:42', '2019-10-28 12:13:42');
INSERT INTO `pre_admin_log` VALUES (96, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-28 13:58:22', '2019-10-28 13:58:22');
INSERT INTO `pre_admin_log` VALUES (97, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 15:13:48', '2019-10-28 15:13:48');
INSERT INTO `pre_admin_log` VALUES (98, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 15:38:02', '2019-10-28 15:38:02');
INSERT INTO `pre_admin_log` VALUES (99, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-28 16:03:15', '2019-10-28 16:03:15');
INSERT INTO `pre_admin_log` VALUES (100, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 16:05:27', '2019-10-28 16:05:27');
INSERT INTO `pre_admin_log` VALUES (101, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 16:05:49', '2019-10-28 16:05:49');
INSERT INTO `pre_admin_log` VALUES (102, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 16:09:08', '2019-10-28 16:09:08');
INSERT INTO `pre_admin_log` VALUES (103, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 16:30:34', '2019-10-28 16:30:34');
INSERT INTO `pre_admin_log` VALUES (104, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-28 16:31:13', '2019-10-28 16:31:13');
INSERT INTO `pre_admin_log` VALUES (105, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-28 12:08:21\' , `time` = \'2019-10-29 09:13:56\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-29 09:13:57', '2019-10-29 09:13:57');
INSERT INTO `pre_admin_log` VALUES (106, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 09:29:41', '2019-10-29 09:29:41');
INSERT INTO `pre_admin_log` VALUES (107, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 09:32:55', '2019-10-29 09:32:55');
INSERT INTO `pre_admin_log` VALUES (108, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 09:33:25', '2019-10-29 09:33:25');
INSERT INTO `pre_admin_log` VALUES (109, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 09:36:15', '2019-10-29 09:36:15');
INSERT INTO `pre_admin_log` VALUES (110, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 14:23:06', '2019-10-29 14:23:06');
INSERT INTO `pre_admin_log` VALUES (111, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 14:24:43', '2019-10-29 14:24:43');
INSERT INTO `pre_admin_log` VALUES (112, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 14:25:00', '2019-10-29 14:25:00');
INSERT INTO `pre_admin_log` VALUES (113, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 14:26:14', '2019-10-29 14:26:14');
INSERT INTO `pre_admin_log` VALUES (114, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-29 09:13:56\' , `time` = \'2019-10-29 14:29:17\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-29 14:29:17', '2019-10-29 14:29:17');
INSERT INTO `pre_admin_log` VALUES (115, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 14:29:45', '2019-10-29 14:29:45');
INSERT INTO `pre_admin_log` VALUES (116, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-29 14:29:17\' , `time` = \'2019-10-29 15:36:23\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-29 15:36:23', '2019-10-29 15:36:23');
INSERT INTO `pre_admin_log` VALUES (117, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 15:39:17', '2019-10-29 15:39:17');
INSERT INTO `pre_admin_log` VALUES (118, 1, 'admin', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 15:45:20', '2019-10-29 15:45:20');
INSERT INTO `pre_admin_log` VALUES (119, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 16:17:03', '2019-10-29 16:17:03');
INSERT INTO `pre_admin_log` VALUES (120, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-29 16:18:34', '2019-10-29 16:18:34');
INSERT INTO `pre_admin_log` VALUES (121, 14, 'root', '127.0.0.1', '用户【root】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-14 16:48:56\' , `time` = \'2019-10-29 16:23:41\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 14', 3, '', '2019-10-29 16:23:41', '2019-10-29 16:23:41');
INSERT INTO `pre_admin_log` VALUES (122, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 16:25:14', '2019-10-29 16:25:14');
INSERT INTO `pre_admin_log` VALUES (123, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 16:30:11', '2019-10-29 16:30:11');
INSERT INTO `pre_admin_log` VALUES (124, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 16:31:46', '2019-10-29 16:31:46');
INSERT INTO `pre_admin_log` VALUES (125, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 17:19:31', '2019-10-29 17:19:31');
INSERT INTO `pre_admin_log` VALUES (126, 14, 'www', '127.0.0.1', '用户【www】添加成功', 'INSERT INTO `pre_admin` (`name` , `password` , `contacts` , `sex` , `pic` , `file_name` , `province` , `city` , `county` , `office_phone` , `phone` , `email` , `role_id` , `remarks` , `add_user` , `salt` , `time` , `ip` , `up_id` , `create_time`) VALUES (\'www\' , \'0fcc9562b88cc55108e8456d1e41174a\' , \'asdas\' , 1 , \'/uploads/image/20191029\\\\6a420f3bd3e457af6bf811a39f9417c3.png\' , \'33.png\' , \'120000\' , \'120100\' , \'120101\' , \'1856236589\' , \'18326598654\' , \'4556655@qq.com\' , 33 , \'<p style=\\\"text-align: center;\\\">费德勒和对方考虑的反对鬼地方的功放开关</p>\n<p style=\\\"text-indent: 2em;\\\">费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关费德勒和对方考虑的反对鬼地方的功放开关</p>\n<p>&nbsp;</p>\' , \'root\' , \'eee44aeb2aa18de7aeaf8447e44f5e4f\' , \'2019-10-29 17:29:31\' , \'127.0.0.1\' , 14 , \'2019-10-29 17:29:31\')', 1, '', '2019-10-29 17:29:31', '2019-10-29 17:29:31');
INSERT INTO `pre_admin_log` VALUES (127, 14, 'root', '127.0.0.1', '用户【root】添加成功', 'INSERT INTO `pre_admin` (`name` , `password` , `contacts` , `sex` , `pic` , `file_name` , `province` , `city` , `county` , `office_phone` , `phone` , `email` , `role_id` , `remarks` , `add_user` , `salt` , `time` , `ip` , `up_id` , `create_time`) VALUES (\'root\' , \'9739f32b622007cb6594a0d131bedd66\' , \'asdads\' , 1 , \'/uploads/image/20191029\\\\f7302d389c726c9af81da2285b11ddff.png\' , \'33.png\' , \'140000\' , \'140100\' , \'140105\' , \'21457876\' , \'18352654562\' , \'1452865@qq.com\' , 33 , \'<p style=\\\"text-align: center;\\\">十大科技高科技的世界观豆腐干反对开挂看</p>\n<p style=\\\"text-align: left; text-indent: 2em;\\\">十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看</p>\n<p style=\\\"text-align: left; text-indent: 2em;\\\">十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看</p>\n<p style=\\\"text-align: left; text-indent: 2em;\\\">十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看十大科技高科技的世界观豆腐干反对开挂看</p>\' , \'root\' , \'6f77ebf94385b5c1560d4abae0e4f49f\' , \'2019-10-29 17:33:06\' , \'127.0.0.1\' , 14 , \'2019-10-29 17:33:06\')', 1, '', '2019-10-29 17:33:06', '2019-10-29 17:33:06');
INSERT INTO `pre_admin_log` VALUES (128, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 17:33:31', '2019-10-29 17:33:31');
INSERT INTO `pre_admin_log` VALUES (129, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 17:33:57', '2019-10-29 17:33:57');
INSERT INTO `pre_admin_log` VALUES (130, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 17:38:46', '2019-10-29 17:38:46');
INSERT INTO `pre_admin_log` VALUES (131, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 17:41:00', '2019-10-29 17:41:00');
INSERT INTO `pre_admin_log` VALUES (132, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 17:53:28', '2019-10-29 17:53:28');
INSERT INTO `pre_admin_log` VALUES (133, 14, 'root', '127.0.0.1', '更新成功', '', 0, '', '2019-10-29 17:53:51', '2019-10-29 17:53:51');
INSERT INTO `pre_admin_log` VALUES (134, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-29 15:36:23\' , `time` = \'2019-10-30 09:05:19\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-30 09:05:19', '2019-10-30 09:05:19');
INSERT INTO `pre_admin_log` VALUES (135, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-30 09:05:19\' , `time` = \'2019-10-30 11:16:13\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-30 11:16:13', '2019-10-30 11:16:13');
INSERT INTO `pre_admin_log` VALUES (136, 1, 'admin', '127.0.0.1', '更新成功', 'UPDATE `pre_admin`  SET `role_id` = 1 , `name` = \'admin\' , `contacts` = \'李四\' , `sex` = 2 , `pic` = \'/uploads/image/20191028\\\\33fc66b3de55fc9c5de6d6697741ca6e.png\' , `file_name` = \'33.png\' , `province` = \'370000\' , `city` = \'370100\' , `county` = \'370102\' , `office_phone` = \'15623658645\' , `phone` = \'18365498564\' , `email` = \'4546789@qq.com\' , `remarks` = \'<p>数据都是打工的封建快攻尽快答复即可观看</p>\' , `update_time` = \'2019-10-30 11:37:37\'  WHERE  `id` = 1', 3, '', '2019-10-30 11:37:37', '2019-10-30 11:37:37');
INSERT INTO `pre_admin_log` VALUES (137, 1, 'admin', '127.0.0.1', '更新成功！', '', 0, '', '2019-10-30 11:43:12', '2019-10-30 11:43:12');
INSERT INTO `pre_admin_log` VALUES (138, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-30 11:16:13\' , `time` = \'2019-10-30 14:13:52\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-30 14:13:52', '2019-10-30 14:13:52');
INSERT INTO `pre_admin_log` VALUES (139, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-30 14:13:52\' , `time` = \'2019-10-30 15:26:20\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-30 15:26:20', '2019-10-30 15:26:20');
INSERT INTO `pre_admin_log` VALUES (140, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-30 15:26:20\' , `time` = \'2019-10-30 15:51:06\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-30 15:51:06', '2019-10-30 15:51:06');
INSERT INTO `pre_admin_log` VALUES (141, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-30 15:51:06\' , `time` = \'2019-10-30 15:59:05\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-30 15:59:05', '2019-10-30 15:59:05');
INSERT INTO `pre_admin_log` VALUES (142, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-30 15:59:05\' , `time` = \'2019-10-31 09:32:51\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 09:32:51', '2019-10-31 09:32:51');
INSERT INTO `pre_admin_log` VALUES (143, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-31 09:32:51\' , `time` = \'2019-10-31 10:58:26\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 10:58:26', '2019-10-31 10:58:26');
INSERT INTO `pre_admin_log` VALUES (144, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-31 10:58:26\' , `time` = \'2019-10-31 11:10:15\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 11:10:15', '2019-10-31 11:10:15');
INSERT INTO `pre_admin_log` VALUES (145, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-31 11:10:15\' , `time` = \'2019-10-31 11:11:16\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 11:11:16', '2019-10-31 11:11:16');
INSERT INTO `pre_admin_log` VALUES (146, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-31 11:11:16\' , `time` = \'2019-10-31 11:12:09\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 11:12:09', '2019-10-31 11:12:09');
INSERT INTO `pre_admin_log` VALUES (147, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-31 11:12:09\' , `time` = \'2019-10-31 14:02:41\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 14:02:41', '2019-10-31 14:02:41');
INSERT INTO `pre_admin_log` VALUES (148, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-31 14:02:41\' , `time` = \'2019-10-31 17:38:20\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 17:38:20', '2019-10-31 17:38:20');
INSERT INTO `pre_admin_log` VALUES (149, 1, 'admin', '127.0.0.1', '用户【admin】登录', 'UPDATE `pre_admin`  SET `last_time` = \'2019-10-31 17:38:20\' , `time` = \'2019-10-31 18:09:15\' , `last_ip` = \'127.0.0.1\' , `ip` = \'127.0.0.1\'  WHERE  `id` = 1', 3, '', '2019-10-31 18:09:15', '2019-10-31 18:09:15');

-- ----------------------------
-- Table structure for pre_permission
-- ----------------------------
DROP TABLE IF EXISTS `pre_permission`;
CREATE TABLE `pre_permission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '上级id',
  `show_order` int(11) NOT NULL COMMENT '排序',
  `level` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '权限名称',
  `con_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '控制器名称',
  `fun_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '方法名称',
  `ca_path` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '全路径名称',
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '图标',
  `add_user` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '操作员',
  `remarks` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '备注',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '创建时间',
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 350 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pre_permission
-- ----------------------------
INSERT INTO `pre_permission` VALUES (1, 0, 1, '0', '首页', 'index', 'index', 'index/index', 'layui-icon-home', 'admin', '', '2019-10-12 18:54:48', '2019-10-14 13:54:06');
INSERT INTO `pre_permission` VALUES (2, 0, 2, '0', '系统管理', '', '', '', 'layui-icon-set-fill', 'admin', '', '2019-10-12 18:56:50', NULL);
INSERT INTO `pre_permission` VALUES (3, 2, 3, '1', '管理员管理', 'admin', 'index', 'admin/index', 'layui-icon-spread-left', 'admin', '', '2019-10-12 18:57:51', NULL);
INSERT INTO `pre_permission` VALUES (4, 3, 4, '2', '编辑', 'admin', 'form', 'admin/form', '', 'admin', '', '2019-10-12 18:58:49', NULL);
INSERT INTO `pre_permission` VALUES (5, 3, 5, '2', '删除', 'admin', 'destroy', 'admin/destroy', '', 'admin', '', '2019-10-12 18:59:50', NULL);
INSERT INTO `pre_permission` VALUES (6, 2, 6, '1', '权限管理', 'permission', 'index', 'permission/index', 'layui-icon-spread-left', 'admin', '', '2019-10-12 19:00:43', NULL);
INSERT INTO `pre_permission` VALUES (343, 6, 7, '2', '编辑', 'permission', 'form', 'permission/form', '', 'admin', '', '2019-10-14 11:18:26', NULL);
INSERT INTO `pre_permission` VALUES (344, 6, 8, '2', '删除', 'permission', 'destroy', 'permission/destroy', '', 'admin', '', '2019-10-14 11:19:19', NULL);
INSERT INTO `pre_permission` VALUES (345, 2, 9, '1', '角色管理', 'role', 'index', 'role/index', 'layui-icon-spread-left', 'admin', '', '2019-10-14 11:20:10', '2019-10-14 12:18:16');
INSERT INTO `pre_permission` VALUES (346, 345, 10, '2', '编辑', 'role', 'form', 'role/form', '', 'admin', '', '2019-10-14 11:20:49', NULL);
INSERT INTO `pre_permission` VALUES (347, 345, 11, '2', '删除', 'role', 'destroy', 'role/destroy', '', 'admin', '', '2019-10-14 11:21:26', NULL);
INSERT INTO `pre_permission` VALUES (348, 0, 12, '0', '系统设置', '', '', '', 'layui-icon-set', 'admin', '', '2019-10-24 14:06:34', NULL);
INSERT INTO `pre_permission` VALUES (349, 348, 13, '1', '网站设置', 'system', 'index', 'system/index', 'layui-icon-spread-left', 'admin', '', '2019-10-24 14:07:47', NULL);

-- ----------------------------
-- Table structure for pre_role
-- ----------------------------
DROP TABLE IF EXISTS `pre_role`;
CREATE TABLE `pre_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `up_id` int(11) NULL DEFAULT NULL,
  `show_order` int(11) NULL DEFAULT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `permis_ids` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `ac_path` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `ac_menu` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `add_user` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `remarks` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pre_role
-- ----------------------------
INSERT INTO `pre_role` VALUES (1, 0, 1, '超级管理员', '1|2&3:4,5&6:343,344&345:346,347|348&349:', 'admin,permission,role,system', '|主页,主页,Admin/Index/index,|系统管理,管理员管理,Admin/Users/index,权限管理,Admin/pre_permission/index,角色管理,Admin/pre_role/index,|机构管理,机构列表,Admin/Company/index,客户经理管理,Admin/Manager/index,|产品管理,产品列表,Admin/Product/index,银行配置,Admin/Bank/index,|数据管理,订单汇总,Admin/Order/index,机构汇总,Admin/CompanySummary/index,客户经理汇总,Admin/ManagerSummary/index,|个人资料与安全,密码修改,Admin/Password/index,日志查看,Admin/AdminLog/index,个人资料,Admin/Profile/index,', 'admin', '0', '2017-10-06 12:17:02', '2019-10-24 14:08:17');
INSERT INTO `pre_role` VALUES (33, 1, 2, '机构管理员', '1|2&3:4,5&6:343,344&345:346,347', 'admin,permission,role', NULL, 'admin', NULL, '2019-10-12 18:20:28', '2019-10-30 15:51:25');

SET FOREIGN_KEY_CHECKS = 1;
