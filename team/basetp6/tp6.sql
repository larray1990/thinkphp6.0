/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : tp6

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 23/11/2019 16:53:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pre_admin
-- ----------------------------
DROP TABLE IF EXISTS `pre_admin`;
CREATE TABLE `pre_admin`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '管理员用户名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '管理员密码',
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `access_token` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'token',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `sex` tinyint(10) NOT NULL COMMENT '性别 1：男  2：女',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件名',
  `pic` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文件名路径',
  `province` int(11) NOT NULL DEFAULT 0 COMMENT '省',
  `city` int(11) NOT NULL DEFAULT 0 COMMENT '市',
  `county` int(11) NOT NULL DEFAULT 0 COMMENT '县',
  `town` int(11) NOT NULL DEFAULT 0 COMMENT '乡',
  `login_times` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登陆次数',
  `login_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'IP地址',
  `login_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登陆时间',
  `last_login_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '上次登陆ip',
  `last_login_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上次登陆时间',
  `user_agent` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'user_agent',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否管理员',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1可用0禁用',
  `remarks` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '备注',
  `add_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作员',
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_admin
-- ----------------------------
INSERT INTO `pre_admin` VALUES (1, 'admin', 'fd1663ffd1bdeccb9d2acc879573e7ee', '07fd5b51e3fbc75937dea94f09fe14c0', '超级管理员', '18052635455', '', '44655@qq.com', 1, '', '/uploads/images/20191112\\ef70d83335d022f1782202f08f9a427c.png', 120000, 120100, 120101, 0, 0, '', 0, '', 0, '', 1, 1, '<p>好好说分手的监控房价多少积分</p>', 'admin', '1574495278', '2019-11-10 10:17:23');

-- ----------------------------
-- Table structure for pre_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `pre_admin_log`;
CREATE TABLE `pre_admin_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `admin_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '日志名称',
  `ip` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'ip地址',
  `action` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '方法',
  `sql_cont` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'sql内容',
  `db_level` int(2) NOT NULL COMMENT '数据等级',
  `remarks` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '备注',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '创建时间',
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 281 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '系统日志表' ROW_FORMAT = Compact;
-- ----------------------------
-- Table structure for pre_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_group`;
CREATE TABLE `pre_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态：为1正常，为0禁用',
  `rules` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则\",\"隔开',
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户组表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_auth_group
-- ----------------------------
INSERT INTO `pre_auth_group` VALUES (1, '超级管理员', 1, '1|2&3:4,5&6:7,8&11:12,13,14|15&16:17|', '2019-11-20 16:05:06', '2019-11-14 10:44:31');
INSERT INTO `pre_auth_group` VALUES (2, '机构管理员', 1, '', '0', '2019-11-14 10:44:31');

-- ----------------------------
-- Table structure for pre_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_group_access`;
CREATE TABLE `pre_auth_group_access`  (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组id',
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户组明细表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_auth_group_access
-- ----------------------------
INSERT INTO `pre_auth_group_access` VALUES (1, 1);

-- ----------------------------
-- Table structure for pre_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_rule`;
CREATE TABLE `pre_auth_rule`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(5) NOT NULL DEFAULT 0 COMMENT '上级id',
  `level` int(5) NOT NULL DEFAULT 0 COMMENT '等级',
  `sort` int(5) NOT NULL DEFAULT 0 COMMENT '排序',
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '图标',
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态：为1正常，为0禁用',
  `add_user` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作员',
  `remarks` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '备注',
  `condition` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '规则表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_auth_rule
-- ----------------------------
INSERT INTO `pre_auth_rule` VALUES (1, 0, 0, 10, 'index/console', '首页', 'layui-icon-home', 1, 1, 'admin', '', '', '2019-11-11 11:45:49', '2019-11-11 10:38:43');
INSERT INTO `pre_auth_rule` VALUES (2, 0, 0, 100, '', '系统管理', 'layui-icon-set-fill', 1, 1, 'admin', '', '', '2019-11-19 10:52:43', '2019-11-11 11:50:45');
INSERT INTO `pre_auth_rule` VALUES (3, 2, 1, 110, 'admin/index', '管理员管理', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '0', '2019-11-11 12:04:35');
INSERT INTO `pre_auth_rule` VALUES (4, 3, 0, 111, 'admin/form', '编辑', '', 1, 1, 'admin', '', '', '2019-11-11 14:00:59', '2019-11-11 13:58:21');
INSERT INTO `pre_auth_rule` VALUES (5, 3, 0, 112, 'admin/destroy', '删除', '', 1, 1, 'admin', '', '', '0', '2019-11-11 14:01:48');
INSERT INTO `pre_auth_rule` VALUES (6, 2, 0, 120, 'AuthRule/index', '权限管理', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '0', '2019-11-11 14:02:50');
INSERT INTO `pre_auth_rule` VALUES (7, 6, 0, 121, 'AuthRule/form', '编辑', '', 1, 1, 'admin', '', '', '0', '2019-11-11 14:03:45');
INSERT INTO `pre_auth_rule` VALUES (8, 6, 0, 122, 'AuthRule/destroy', '删除', '', 1, 1, 'admin', '', '', '2019-11-11 14:04:28', '2019-11-11 14:04:18');
INSERT INTO `pre_auth_rule` VALUES (9, 3, 0, 123, 'admin/show', '查看', '', 1, 1, 'admin', '', '', '0', '2019-11-11 14:05:33');
INSERT INTO `pre_auth_rule` VALUES (10, 3, 0, 124, 'admin/import', '导入Excel', '', 1, 1, 'admin', '', '', '0', '2019-11-11 14:08:08');
INSERT INTO `pre_auth_rule` VALUES (11, 2, 0, 130, 'AuthGroup/index', '角色管理', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '2019-11-11 14:10:09', '2019-11-11 14:09:55');
INSERT INTO `pre_auth_rule` VALUES (12, 11, 0, 131, 'AuthGroup/form', '编辑', '', 1, 1, 'admin', '', '', '0', '2019-11-11 14:11:33');
INSERT INTO `pre_auth_rule` VALUES (13, 11, 0, 132, 'AuthGroup/destroy', '删除', '', 1, 1, 'admin', '', '', '0', '2019-11-11 14:12:00');
INSERT INTO `pre_auth_rule` VALUES (14, 11, 0, 133, 'AuthGroup/power', '赋权', '', 1, 1, 'admin', '', '', '0', '2019-11-11 14:12:52');
INSERT INTO `pre_auth_rule` VALUES (15, 0, 0, 200, NULL, '系统设置', 'layui-icon-set-fill', 1, 1, 'admin', '', '', '2019-11-11 14:16:09', '2019-11-11 14:14:55');
INSERT INTO `pre_auth_rule` VALUES (16, 15, 0, 210, 'system/index', '配置管理', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '0', '2019-11-12 17:39:38');
INSERT INTO `pre_auth_rule` VALUES (17, 16, 0, 211, 'system/form', '编辑', '', 1, 1, 'admin', '', '', '0', '2019-11-12 17:43:30');

SET FOREIGN_KEY_CHECKS = 1;
