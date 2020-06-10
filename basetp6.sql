/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : basetp6

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 18/03/2020 18:22:52
*/

SET NAMES utf8;
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
  `login_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '登陆时间',
  `last_login_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '上次登陆ip',
  `last_login_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '上次登陆时间',
  `user_agent` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'user_agent',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否管理员',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1可用0禁用',
  `remarks` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '备注',
  `add_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作员',
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_admin
-- ----------------------------
INSERT INTO `pre_admin` VALUES (1, 'admin', '5ebbb167d3d357d85b484c02d6e14dde', 'adf7d39405ca9500e7a262bbdc0faf0a', '超级管理员', '18052635454', '', '44655@qq.com', 1, '', '/uploads/images/20191112\\ef70d83335d022f1782202f08f9a427c.png', 370000, 370100, 370102, 0, 53, '127.0.0.1', '2020-03-18 10:30:59', '127.0.0.1', '2020-03-17 09:46:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 1, 1, '', '1', '1584498659', '1576046065');
INSERT INTO `pre_admin` VALUES (3, 'test', '66ba25bf6f517b5698f4d9587925d0f6', 'd0dcc822966d265ebd9c30a9e1401e67', '123', '18325625632', '', '14525@qq.com', 2, '', '/uploads/images/20191223\\a8a24dcd5328bbdb9658f5086ea445dd.jpg', 370000, 371300, 371302, 0, 1, '127.0.0.1', '2020-03-16 15:09:40', '', ' ', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', 1, 1, '', '1', '1584342580', '1576046065');

-- ----------------------------
-- Table structure for pre_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `pre_admin_log`;
CREATE TABLE `pre_admin_log`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '管理员id',
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '管理员用户名',
  `useragent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'User-Agent',
  `ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'ip地址',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '请求链接',
  `method` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '请求类型',
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '资源类型',
  `param` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '请求参数',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '日志备注',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 953 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员日志' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_admin_log
-- ----------------------------
INSERT INTO `pre_admin_log` VALUES (895, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Log/destroy.html', 'POST', 'html', '{\"ids\":[\"894\",\"763\",\"762\",\"761\",\"760\",\"759\",\"758\",\"757\",\"756\",\"755\",\"754\",\"753\",\"752\",\"751\"]}', '删除成功！', 1583743253);
INSERT INTO `pre_admin_log` VALUES (896, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/form.html', 'POST', 'html', '{\"username\":\"test\",\"password\":\"66ba25bf6f517b5698f4d9587925d0f6\",\"fullname\":\"123\",\"sex\":\"2\",\"file\":\"\",\"pic\":\"\\/uploads\\/images\\/20191223\\\\a8a24dcd5328bbdb9658f5086ea445dd.jpg\",\"file_name\":\"\",\"province\":\"370000\",\"city\":\"371300\",\"county\":\"371302\",\"phone\":\"18325625632\",\"email\":\"14525@qq.com\",\"group_id\":\"2\",\"is_admin\":\"1\",\"status\":\"1\",\"remarks\":\"\",\"id\":\"3\"}', '更新成功', 1583744519);
INSERT INTO `pre_admin_log` VALUES (897, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/state.html', 'POST', 'html', '{\"id\":\"1\"}', '修改状态成功！', 1583745183);
INSERT INTO `pre_admin_log` VALUES (898, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/state.html', 'POST', 'html', '{\"id\":\"1\"}', '修改状态成功！', 1583745185);
INSERT INTO `pre_admin_log` VALUES (899, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/state.html', 'POST', 'html', '{\"id\":\"3\"}', '修改状态成功！', 1583745186);
INSERT INTO `pre_admin_log` VALUES (900, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/state.html', 'POST', 'html', '{\"id\":\"3\"}', '修改状态成功！', 1583745187);
INSERT INTO `pre_admin_log` VALUES (901, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/checkAdmin.html', 'POST', 'html', '{\"id\":\"3\"}', '修改管理员状态成功！', 1583745188);
INSERT INTO `pre_admin_log` VALUES (902, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/checkAdmin.html', 'POST', 'html', '{\"id\":\"3\"}', '修改管理员状态成功！', 1583745191);
INSERT INTO `pre_admin_log` VALUES (903, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/form.html', 'POST', 'html', '{\"username\":\"test\",\"password\":\"66ba25bf6f517b5698f4d9587925d0f6\",\"fullname\":\"123\",\"sex\":\"2\",\"file\":\"\",\"pic\":\"\\/uploads\\/images\\/20191223\\\\a8a24dcd5328bbdb9658f5086ea445dd.jpg\",\"file_name\":\"\",\"province\":\"370000\",\"city\":\"371300\",\"county\":\"371302\",\"phone\":\"18325625632\",\"email\":\"14525@qq.com\",\"group_id\":\"2\",\"is_admin\":\"1\",\"status\":\"1\",\"remarks\":\"\",\"id\":\"3\"}', '更新成功', 1583745429);
INSERT INTO `pre_admin_log` VALUES (933, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Log/destroy.html', 'POST', 'html', '{\"ids\":[\"932\",\"931\",\"921\",\"920\",\"917\",\"916\",\"910\",\"905\"]}', '删除成功！', 1583992796);
INSERT INTO `pre_admin_log` VALUES (934, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/form.html', 'POST', 'html', '{\"username\":\"test\",\"password\":\"66ba25bf6f517b5698f4d9587925d0f6\",\"fullname\":\"123\",\"sex\":\"2\",\"file\":\"\",\"pic\":\"\\/uploads\\/images\\/20191223\\\\a8a24dcd5328bbdb9658f5086ea445dd.jpg\",\"file_name\":\"\",\"province\":\"370000\",\"city\":\"371300\",\"county\":\"371302\",\"phone\":\"18325625632\",\"email\":\"14525@qq.com\",\"group_id\":\"2\",\"is_admin\":\"1\",\"status\":\"1\",\"remarks\":\"\",\"id\":\"3\"}', '更新成功！', 1583993587);
INSERT INTO `pre_admin_log` VALUES (935, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/form.html', 'POST', 'html', '{\"username\":\"admin\",\"password\":\"5ebbb167d3d357d85b484c02d6e14dde\",\"fullname\":\"\\u8d85\\u7ea7\\u7ba1\\u7406\\u5458\",\"sex\":\"1\",\"file\":\"\",\"pic\":\"\\/uploads\\/images\\/20191112\\\\ef70d83335d022f1782202f08f9a427c.png\",\"file_name\":\"\",\"province\":\"370000\",\"city\":\"370100\",\"county\":\"370102\",\"phone\":\"18052635454\",\"email\":\"44655@qq.com\",\"group_id\":\"1\",\"is_admin\":\"1\",\"status\":\"1\",\"remarks\":\"\",\"id\":\"1\"}', '更新成功！', 1583993699);
INSERT INTO `pre_admin_log` VALUES (936, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/checkAdmin.html', 'POST', 'html', '{\"id\":\"1\"}', '修改管理员状态成功！', 1583999392);
INSERT INTO `pre_admin_log` VALUES (937, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Admin/state.html', 'POST', 'html', '{\"id\":\"1\"}', '修改状态成功！', 1583999393);
INSERT INTO `pre_admin_log` VALUES (940, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/Log/destroy.html', 'POST', 'html', '{\"ids\":[\"939\",\"938\"]}', '删除成功！', 1584000736);
INSERT INTO `pre_admin_log` VALUES (941, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/login/index.html', 'POST', 'html', '{\"username\":\"admin\",\"password\":\"123456\",\"vercode\":\"fwll\"}', '登录成功', 1584062516);
INSERT INTO `pre_admin_log` VALUES (942, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/form.html', 'POST', 'html', '{\"username\":\"test\",\"password\":\"66ba25bf6f517b5698f4d9587925d0f6\",\"fullname\":\"123\",\"sex\":\"2\",\"file\":\"\",\"pic\":\"\\/uploads\\/images\\/20191223\\\\a8a24dcd5328bbdb9658f5086ea445dd.jpg\",\"file_name\":\"\",\"province\":\"370000\",\"city\":\"371300\",\"county\":\"371302\",\"phone\":\"18325625632\",\"email\":\"14525@qq.com\",\"group_id\":\"2\",\"is_admin\":\"1\",\"status\":\"1\",\"remarks\":\"\",\"id\":\"3\"}', '更新成功！', 1584094463);
INSERT INTO `pre_admin_log` VALUES (943, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/login/index.html', 'POST', 'html', '{\"username\":\"admin\",\"password\":\"123456\",\"vercode\":\"amun\"}', '登录成功', 1584153849);
INSERT INTO `pre_admin_log` VALUES (944, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/login/index.html', 'POST', 'html', '{\"username\":\"admin\",\"password\":\"123456\",\"vercode\":\"xt8t\"}', '登录成功', 1584341441);
INSERT INTO `pre_admin_log` VALUES (945, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/form.html', 'POST', 'html', '{\"username\":\"popop\",\"password\":\"123456\",\"fullname\":\"asdf\",\"sex\":\"1\",\"province\":\"370000\",\"city\":\"370100\",\"county\":\"370102\",\"phone\":\"18325635624\",\"email\":\"125635@qq.com\",\"group_id\":\"2\",\"is_admin\":\"1\",\"status\":\"1\",\"remarks\":\"\",\"id\":\"\"}', '添加成功！', 1584342053);
INSERT INTO `pre_admin_log` VALUES (946, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/destroy.html', 'DELETE', 'html', '{\"ids\":[\"4\"]}', '删除成功！', 1584342063);
INSERT INTO `pre_admin_log` VALUES (947, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/form.html', 'POST', 'html', '{\"username\":\"lokp\",\"password\":\"123456\",\"fullname\":\"sdfsdfs\",\"sex\":\"1\",\"province\":\"140000\",\"city\":\"140100\",\"county\":\"140105\",\"phone\":\"18325635465\",\"email\":\"145263665@qq.com\",\"group_id\":\"2\",\"is_admin\":\"1\",\"status\":\"1\",\"remarks\":\"\",\"id\":\"\"}', '添加成功！', 1584342152);
INSERT INTO `pre_admin_log` VALUES (948, 3, 'test', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/login/index.html', 'POST', 'html', '{\"username\":\"test\",\"password\":\"123456\",\"vercode\":\"ae3p\"}', '登录成功', 1584342580);
INSERT INTO `pre_admin_log` VALUES (949, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/login/index.html', 'POST', 'html', '{\"username\":\"admin\",\"password\":\"123456\",\"vercode\":\"mblc\"}', '登录成功', 1584342613);
INSERT INTO `pre_admin_log` VALUES (950, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/login/index.html', 'POST', 'html', '{\"username\":\"admin\",\"password\":\"123456\",\"vercode\":\"jamv\"}', '登录成功', 1584409602);
INSERT INTO `pre_admin_log` VALUES (951, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/admin/destroy.html', 'DELETE', 'html', '{\"ids\":[\"5\"]}', '删除成功！', 1584425295);
INSERT INTO `pre_admin_log` VALUES (952, 1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.116 Safari/537.36', '127.0.0.1', 'http://www.basetp6.com/admin/login/index.html', 'POST', 'html', '{\"username\":\"admin\",\"password\":\"123456\",\"vercode\":\"euru\"}', '登录成功', 1584498659);

-- ----------------------------
-- Table structure for pre_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `pre_auth_group`;
CREATE TABLE `pre_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态：为1正常，为0禁用',
  `rules` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户组拥有的规则id， 多个规则\",\"隔开',
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '更新时间',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户组表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_auth_group
-- ----------------------------
INSERT INTO `pre_auth_group` VALUES (1, '超级管理员', 1, '1,2,3,4,5,9,10,6,7,8,11,12,13,14,18,19,15,16,17', '1583808938', '1576046065');
INSERT INTO `pre_auth_group` VALUES (2, '机构管理员', 1, '2,3,4,5,9,10,6,7,8,11,12,13,14,18,19', '1577067869', '1576046065');
INSERT INTO `pre_auth_group` VALUES (3, '编辑管理员', 1, '1,2,3,4,5,9,10,6,7,8,11,12,13,14', '1576046065', '1576046065');

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
INSERT INTO `pre_auth_group_access` VALUES (3, 2);

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
  `update_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '更新时间',
  `create_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '规则表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pre_auth_rule
-- ----------------------------
INSERT INTO `pre_auth_rule` VALUES (1, 0, 1, 11, 'admin/Index/welcome', '首页', 'layui-icon-home', 1, 1, 'admin', '', '', '1583808016', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (2, 0, 1, 100, '', '系统管理', 'layui-icon-set-fill', 1, 1, 'admin', '', '', '1583738642', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (3, 2, 2, 110, 'admin/Admin/index', '管理员管理列表', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '1583894615', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (4, 3, 3, 111, 'admin/Admin/form', '编辑', '', 1, 1, 'admin', '', '', '1576046065', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (5, 3, 3, 112, 'admin/Admin/destroy', '删除', '', 1, 1, 'admin', '', '', '', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (6, 2, 2, 120, 'admin/Permission/index', '权限管理列表', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '1583894631', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (7, 6, 3, 121, 'admin/Permission/form', '编辑', '', 1, 1, 'admin', '', '', '1577067490', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (8, 6, 3, 122, 'admin/Permission/destroy', '删除', '', 1, 1, 'admin', '', '', '1576046065', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (9, 3, 3, 113, 'admin/Admin/show', '查看', '', 1, 1, 'admin', '', '', '1577067392', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (10, 3, 3, 114, 'admin/Admin/import', '导入Excel', '', 1, 1, 'admin', '', '', '1577067401', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (11, 2, 2, 130, 'admin/Role/index', '角色管理列表', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '1583894646', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (12, 11, 3, 131, 'admin/Role/form', '编辑', '', 1, 1, 'admin', '', '', '', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (13, 11, 3, 132, 'admin/Role/destroy', '删除', '', 1, 1, 'admin', '', '', '', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (14, 11, 3, 133, 'admin/Role/power', '赋权', '', 1, 1, 'admin', '', '', '', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (15, 0, 1, 200, NULL, '系统设置', 'layui-icon-set-fill', 1, 1, 'admin', '', '', '1576046065', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (16, 15, 2, 210, 'admin/System/index', '配置管理', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (17, 16, 3, 211, 'admin/System/form', '编辑', '', 1, 1, 'admin', '', '', '1584005585', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (18, 2, 2, 140, 'admin/Log/index', '日志管理列表', 'layui-icon-spread-left', 1, 1, 'admin', '', '', '1583894664', '1576046065');
INSERT INTO `pre_auth_rule` VALUES (19, 18, 3, 141, 'admin/Log/destroy', '删除', '', 1, 1, 'admin', '', '', '', '1576046065');

SET FOREIGN_KEY_CHECKS = 1;
