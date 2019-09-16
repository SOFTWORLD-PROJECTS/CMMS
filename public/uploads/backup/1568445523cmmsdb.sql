/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : cmmsdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-09-13 22:03:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for audit_trails
-- ----------------------------
DROP TABLE IF EXISTS `audit_trails`;
CREATE TABLE `audit_trails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of audit_trails
-- ----------------------------
INSERT INTO `audit_trails` VALUES ('2', '2019-09-01 03:16:49', 'Admin', 'Admin', 'machinery', 'add', 'machinery - add');
INSERT INTO `audit_trails` VALUES ('3', '2019-09-14 03:17:19', 'Admin', 'Admin', 'machinery', 'update', 'machinery - update');
INSERT INTO `audit_trails` VALUES ('4', '2019-09-14 03:18:13', 'Admin', 'Admin', 'machinery', 'type add', 'type add');
INSERT INTO `audit_trails` VALUES ('5', '2019-09-14 03:28:01', 'Admin', 'Admin', 'machinery', 'delete', 'machinery - delete');
INSERT INTO `audit_trails` VALUES ('6', '2019-09-14 03:28:15', 'Admin', 'Admin', 'machinery', 'type edit', 'type edit');
INSERT INTO `audit_trails` VALUES ('7', '2019-09-14 03:28:21', 'Admin', 'Admin', 'machinery', 'type delete', 'type delete');
INSERT INTO `audit_trails` VALUES ('8', '2019-09-14 03:28:32', 'Admin', 'Admin', 'machinery', 'brand add', 'brand add');
INSERT INTO `audit_trails` VALUES ('9', '2019-09-14 03:28:40', 'Admin', 'Admin', 'machinery', 'brand edit', 'brand edit');
INSERT INTO `audit_trails` VALUES ('10', '2019-09-14 03:28:44', 'Admin', 'Admin', 'machinery', 'brand delete', 'brand delete');
INSERT INTO `audit_trails` VALUES ('11', '2019-09-14 03:28:55', 'Admin', 'Admin', 'work order', 'complete', 'work order - complete');
INSERT INTO `audit_trails` VALUES ('12', '2019-09-14 03:29:52', 'Admin', 'Admin', 'work order', 'edit', 'work order - edit');
INSERT INTO `audit_trails` VALUES ('13', '2019-09-14 03:29:58', 'Admin', 'Admin', 'work order', 'part user edit', 'work order - part user edit');
INSERT INTO `audit_trails` VALUES ('14', '2019-09-14 03:30:05', 'Admin', 'Admin', 'work order', 'part user edit', 'work order - part user edit');
INSERT INTO `audit_trails` VALUES ('15', '2019-09-14 03:30:13', 'Admin', 'Admin', 'work order', 'service add', 'work order - service add');
INSERT INTO `audit_trails` VALUES ('16', '2019-09-14 03:30:17', 'Admin', 'Admin', 'work order', 'part user delete', 'work order - part user delete');
INSERT INTO `audit_trails` VALUES ('17', '2019-09-14 03:30:21', 'Admin', 'Admin', 'work order', 'service delete', 'work order - service delete');
INSERT INTO `audit_trails` VALUES ('18', '2019-09-14 03:30:31', 'Admin', 'Admin', 'work order', 'kiv', 'work order - kiv');
INSERT INTO `audit_trails` VALUES ('19', '2019-09-14 03:30:40', 'Admin', 'Admin', 'work order', 'complete', 'work order - complete');
INSERT INTO `audit_trails` VALUES ('20', '2019-09-14 03:30:54', 'Admin', 'Admin', 'work order', 'delete', 'work order - delete');
INSERT INTO `audit_trails` VALUES ('21', '2019-09-14 03:55:04', 'Admin', 'Admin', 'prevent maintenance', 'add', 'prevent maintenance - add');
INSERT INTO `audit_trails` VALUES ('22', '2019-09-14 03:56:52', 'Admin', 'Admin', 'prevent maintenance', 'kiv', 'prevent maintenance - kiv');
INSERT INTO `audit_trails` VALUES ('23', '2019-09-14 03:58:21', 'Admin', 'Admin', 'prevent maintenance', 'delete', 'prevent maintenance - delete');
INSERT INTO `audit_trails` VALUES ('24', '2019-09-14 04:11:02', 'Admin', 'Admin', 'setting', 'usermanage edit', 'usermanage edit');
INSERT INTO `audit_trails` VALUES ('25', '2019-09-14 04:11:24', 'Admin', 'Admin', 'setting', 'usermanage edit', 'usermanage edit');
INSERT INTO `audit_trails` VALUES ('26', '2019-09-14 04:35:44', 'Admin', 'Admin', 'setting', 'audittrail delete', 'audittrail delete');

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES ('1', 'Brand1', 'Description');
INSERT INTO `brands` VALUES ('3', 'Brand3', 'Description');
INSERT INTO `brands` VALUES ('4', 'AA', 'AA');

-- ----------------------------
-- Table structure for diesels
-- ----------------------------
DROP TABLE IF EXISTS `diesels`;
CREATE TABLE `diesels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `create_date` date NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `litres` decimal(20,0) NOT NULL DEFAULT '0',
  `month_year` varchar(255) NOT NULL,
  `last_update_by` int(10) NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of diesels
-- ----------------------------
INSERT INTO `diesels` VALUES ('1', '38', '2019-09-16', 'D.00015', 'AAA', '22', '2019-09', '1', '2019-09-11');
INSERT INTO `diesels` VALUES ('2', '38', '2019-09-25', 'D.00016', 'AAA', '0', '2019-09', '1', '2019-09-11');
INSERT INTO `diesels` VALUES ('3', '38', '2019-09-17', 'D.00017', 'asds', '0', '2019-09', '1', '2019-09-11');
INSERT INTO `diesels` VALUES ('4', '38', '2019-09-17', 'D.00018', '2', '0', '2019-09', '1', '2019-09-11');
INSERT INTO `diesels` VALUES ('5', '38', '2019-09-16', 'D.00019', 'asd', '0', '2019-09', '1', '2019-09-11');
INSERT INTO `diesels` VALUES ('6', '38', '2019-09-24', 'D.00020', '12', '0', '2019-09', '1', '2019-09-11');
INSERT INTO `diesels` VALUES ('7', '38', '2019-09-19', 'D.00021', '12212', '0', '2019-09', '1', '2019-09-11');
INSERT INTO `diesels` VALUES ('8', '39', '2019-09-22', 'D.00022', '121212', '0', '2019-09', '1', '2019-09-11');

-- ----------------------------
-- Table structure for diesel_items
-- ----------------------------
DROP TABLE IF EXISTS `diesel_items`;
CREATE TABLE `diesel_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diesel_id` int(10) NOT NULL,
  `create_date` date NOT NULL,
  `litre` decimal(10,0) NOT NULL,
  `by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of diesel_items
-- ----------------------------
INSERT INTO `diesel_items` VALUES ('1', '5', '2019-09-30', '12', 'asd');
INSERT INTO `diesel_items` VALUES ('2', '7', '2019-09-23', '12', '12212');
INSERT INTO `diesel_items` VALUES ('3', '8', '2019-09-23', '12', '121212');
INSERT INTO `diesel_items` VALUES ('4', '8', '2019-09-22', '12', '121212');
INSERT INTO `diesel_items` VALUES ('12', '1', '2019-09-09', '22', 'AAA');

-- ----------------------------
-- Table structure for diesel_requests
-- ----------------------------
DROP TABLE IF EXISTS `diesel_requests`;
CREATE TABLE `diesel_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_date` date NOT NULL,
  `request_no` varchar(255) NOT NULL,
  `remaining_cm` decimal(10,0) NOT NULL,
  `remaining_litre` decimal(10,0) NOT NULL,
  `request_quality` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL,
  `last_update` date NOT NULL,
  `last_update_by` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of diesel_requests
-- ----------------------------
INSERT INTO `diesel_requests` VALUES ('2', '2019-09-09', '1222', '12', '12', '12', 'complete', '2019-09-12', '1');

-- ----------------------------
-- Table structure for diesel_stocks
-- ----------------------------
DROP TABLE IF EXISTS `diesel_stocks`;
CREATE TABLE `diesel_stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_date` date NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchased` decimal(10,0) NOT NULL,
  `actual` decimal(10,0) NOT NULL,
  `variance` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `last_update` date NOT NULL,
  `last_update_by` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of diesel_stocks
-- ----------------------------
INSERT INTO `diesel_stocks` VALUES ('2', '2019-09-17', 'AAA', '12', '12', '0', '12', '2019-09-12', '1');
INSERT INTO `diesel_stocks` VALUES ('3', '2019-09-12', 'asd', '12', '12', '0', '12', '2019-09-12', '1');

-- ----------------------------
-- Table structure for doc_runnings
-- ----------------------------
DROP TABLE IF EXISTS `doc_runnings`;
CREATE TABLE `doc_runnings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_number` varchar(255) NOT NULL,
  `digit_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of doc_runnings
-- ----------------------------
INSERT INTO `doc_runnings` VALUES ('2', 'workorder', 'W.O.', '00028', '5');
INSERT INTO `doc_runnings` VALUES ('3', 'record', 'R.', '00019', '5');
INSERT INTO `doc_runnings` VALUES ('4', 'renewal', 'R.N.', '00020', '5');
INSERT INTO `doc_runnings` VALUES ('6', 'diesel', 'D.', '00024', '5');
INSERT INTO `doc_runnings` VALUES ('7', 'machinery', 'M.', '9', '5');
INSERT INTO `doc_runnings` VALUES ('8', 'diesel', 'D.', '15', '5');
INSERT INTO `doc_runnings` VALUES ('10', 'premaintenance', 'P.M.', '24', '5');

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES ('1', 'Admin', 'Administrator');
INSERT INTO `jobs` VALUES ('2', 'User', 'User');
INSERT INTO `jobs` VALUES ('3', 'Driver', 'Driver');

-- ----------------------------
-- Table structure for job_accesses
-- ----------------------------
DROP TABLE IF EXISTS `job_accesses`;
CREATE TABLE `job_accesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `is_add` tinyint(2) NOT NULL,
  `is_edit` tinyint(2) NOT NULL,
  `is_view` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of job_accesses
-- ----------------------------
INSERT INTO `job_accesses` VALUES ('15', '7', '3', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('170', '9', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('272', '1', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('273', '2', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('274', '3', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('275', '4', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('276', '5', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('277', '6', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('278', '7', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('279', '8', '1', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('280', '9', '1', '0', '0', '1');
INSERT INTO `job_accesses` VALUES ('281', '4', '2', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('282', '7', '2', '1', '1', '1');
INSERT INTO `job_accesses` VALUES ('283', '9', '2', '1', '1', '1');

-- ----------------------------
-- Table structure for machineries
-- ----------------------------
DROP TABLE IF EXISTS `machineries`;
CREATE TABLE `machineries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reg_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `chasis_no` varchar(255) NOT NULL,
  `engine_no` varchar(255) NOT NULL,
  `reg_card_url` varchar(255) NOT NULL,
  `acc_code` varchar(255) NOT NULL,
  `date_purchase` date NOT NULL,
  `year_made` date NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of machineries
-- ----------------------------
INSERT INTO `machineries` VALUES ('2', '38', '1', '1', null, 'A', 'A', 'A', 'A', 'uploads/machinery/15676658781.png', 'ACC Code 3', '2019-09-23', '2019-09-09', '12.00');
INSERT INTO `machineries` VALUES ('3', '38', '1', '1', null, 'ABBBBBB', 'A', 'A', 'A', 'uploads/machinery/1567666933bg2.jpg', 'B', '2019-09-09', '2019-09-10', '123.00');
INSERT INTO `machineries` VALUES ('5', '38', '1', '1', null, 'QQQ', 'T', 'T', 'T', 'uploads/machinery/1567672309bg2.jpg', 'Q', '2019-09-22', '2019-09-09', '123.00');
INSERT INTO `machineries` VALUES ('7', '38', '1', '1', null, 'M.00001', '12', '12', '12', 'uploads/machinery/1567678803logo.png', '12', '2019-09-23', '2019-09-17', '12.00');
INSERT INTO `machineries` VALUES ('8', '38', '1', '1', null, 'M.00002', '12', '121', '12', 'uploads/machinery/1567678866job-title.png', '12', '2019-09-23', '2019-09-11', '12.00');
INSERT INTO `machineries` VALUES ('9', '38', '1', '1', null, 'M.00003', '123', '123', '123', 'uploads/machinery/1567678959profile.png', '12', '2019-09-23', '2019-09-10', '12.00');
INSERT INTO `machineries` VALUES ('10', '38', '1', '1', 'A', 'M.00005', 'A', 'A', 'A', 'uploads/machinery/1568430886community_img.png', 'A', '2019-09-22', '2019-09-09', '12.00');
INSERT INTO `machineries` VALUES ('11', '38', '1', '1', 'B', 'M.00006', 'B', 'B', 'B', 'uploads/machinery/1568430919community_img.png', 'B', '2019-09-16', '2019-09-16', '12.00');
INSERT INTO `machineries` VALUES ('12', '38', '1', '1', '12', 'M.00007', 'C', 'C', 'C', 'uploads/machinery/1568430948community_img.png', 'A', '2019-09-23', '2019-09-01', '12.00');
INSERT INTO `machineries` VALUES ('13', '38', '1', '1', 'D', 'M.00008', 'D', 'D', 'D', 'uploads/machinery/1568431009community_img.png', 'D', '2019-09-22', '2019-09-10', '12.00');

-- ----------------------------
-- Table structure for machinery_pics
-- ----------------------------
DROP TABLE IF EXISTS `machinery_pics`;
CREATE TABLE `machinery_pics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `machinery_id` int(10) NOT NULL,
  `pic_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(19) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of machinery_pics
-- ----------------------------
INSERT INTO `machinery_pics` VALUES ('1', '3', 'uploads/machinery/15676669330bg2.jpg', '0');
INSERT INTO `machinery_pics` VALUES ('2', '3', 'uploads/machinery/15676669331bg2.jpg', '1');
INSERT INTO `machinery_pics` VALUES ('6', '6', 'uploads/machinery/15676723460bg2.jpg', '0');
INSERT INTO `machinery_pics` VALUES ('7', '6', 'uploads/machinery/15676723461bg2.jpg', '1');
INSERT INTO `machinery_pics` VALUES ('8', '6', 'uploads/machinery/15676723462bg2.jpg', '3');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for models
-- ----------------------------
DROP TABLE IF EXISTS `models`;
CREATE TABLE `models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of models
-- ----------------------------
INSERT INTO `models` VALUES ('1', 'Model1', null);

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'Dashboard', 'dashboard');
INSERT INTO `pages` VALUES ('2', 'Machinery', 'machinery');
INSERT INTO `pages` VALUES ('3', 'Work Order', 'workorder');
INSERT INTO `pages` VALUES ('4', 'Prevent Maintenance', 'premaintenance');
INSERT INTO `pages` VALUES ('5', 'Record', 'record');
INSERT INTO `pages` VALUES ('6', 'Renewal', 'renewal');
INSERT INTO `pages` VALUES ('7', 'Diesel', 'diesal');
INSERT INTO `pages` VALUES ('8', 'Report', 'report');
INSERT INTO `pages` VALUES ('9', 'Setting', 'setting');

-- ----------------------------
-- Table structure for parts_uses
-- ----------------------------
DROP TABLE IF EXISTS `parts_uses`;
CREATE TABLE `parts_uses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_order_id` int(10) NOT NULL DEFAULT '0',
  `irf` tinyint(4) NOT NULL DEFAULT '0',
  `part_no` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `required_qty` int(10) NOT NULL,
  `onhand_qty` int(10) DEFAULT '0',
  `order_qty` int(11) NOT NULL,
  `u_price` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of parts_uses
-- ----------------------------
INSERT INTO `parts_uses` VALUES ('1', '1', '1', '1', '2', '1', '0', '1', '1', '1', 'incomplete');
INSERT INTO `parts_uses` VALUES ('3', '11', '0', 'a', 'a', '12', '0', '12', '4', '48', 'complete');

-- ----------------------------
-- Table structure for pre_maintenances
-- ----------------------------
DROP TABLE IF EXISTS `pre_maintenances`;
CREATE TABLE `pre_maintenances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `service_unit` varchar(20) NOT NULL,
  `routine_service` decimal(10,0) NOT NULL,
  `current` decimal(10,0) NOT NULL,
  `last_service_date` date NOT NULL,
  `last_update` datetime NOT NULL,
  `last_update_by` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `left` decimal(10,0) NOT NULL,
  `reason` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pre_maintenances
-- ----------------------------
INSERT INTO `pre_maintenances` VALUES ('2', '1', '1', '38', 'AASSSS', 'P.M.00018', 'date', '13', '13', '2019-09-10', '2019-09-10 01:49:59', '1', 'kiv', '0', '');
INSERT INTO `pre_maintenances` VALUES ('6', '1', '1', '38', '123', 'P.M.00022', 'km', '123', '12', '2019-09-17', '2019-09-13 05:01:55', '1', 'kiv', '111', 'sdsd');

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `co_reg_no` varchar(255) NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `fax` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', '1', 'A', 'A', 'AB', 'AA', 'A', 'A', 'A', 'uploads/user/1568426416community_img.png');

-- ----------------------------
-- Table structure for records
-- ----------------------------
DROP TABLE IF EXISTS `records`;
CREATE TABLE `records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `model_id` int(10) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `current_meter` decimal(20,0) NOT NULL,
  `last_meter` decimal(20,0) NOT NULL,
  `create_date` date NOT NULL,
  `last_update` datetime NOT NULL,
  `last_update_by` int(10) NOT NULL,
  `record_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of records
-- ----------------------------
INSERT INTO `records` VALUES ('1', '38', '1', 'R.00016', '123', '12', '2019-09-16', '2019-09-10 07:04:28', '1', 'smu');
INSERT INTO `records` VALUES ('2', '38', null, 'R.00017', '22', '22', '2019-09-17', '2019-09-10 06:28:51', '1', 'mileage');

-- ----------------------------
-- Table structure for renewals
-- ----------------------------
DROP TABLE IF EXISTS `renewals`;
CREATE TABLE `renewals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(255) NOT NULL,
  `insurance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_routine` decimal(10,0) NOT NULL,
  `insurance_last_renewal` date NOT NULL,
  `road_tax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `road_tax_routine` decimal(10,0) NOT NULL,
  `road_tax_last_renewal` date NOT NULL,
  `puspakom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puspakom_routine` decimal(10,0) NOT NULL,
  `puspakom_last_renewal` date NOT NULL,
  `insurance_upload` varchar(255) DEFAULT '',
  `road_tax_upload` varchar(255) DEFAULT '',
  `puspakom_upload` varchar(255) DEFAULT '',
  `insurance_left` int(10) DEFAULT '0',
  `road_tax_left` int(10) DEFAULT '0',
  `puspakom_left` int(10) DEFAULT '0',
  `last_update` datetime NOT NULL,
  `last_update_by` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of renewals
-- ----------------------------
INSERT INTO `renewals` VALUES ('1', 'R.N.00015', 'ABBBB', '12', '2019-11-27', 'Road Tax', '12', '2019-09-30', 'Puspakom', '12', '2019-09-28', 'uploads/renewal/1568168540chrome_100_percent.pak', 'uploads/renewal/1568168808snapshot_blob.bin', 'uploads/renewal/1568183437chrome_200_percent.pak', '442', '384', '382', '2019-09-11 01:39:42', '1', 'complete');
INSERT INTO `renewals` VALUES ('2', 'R.N.00016', '12', '12', '2019-09-24', '12', '12', '2019-09-30', '12', '12', '2019-09-24', 'uploads/renewal/1568168571chrome_child.dll.sig', 'uploads/renewal/1568168785chrome_watcher.dll', 'uploads/renewal/1568168845natives_blob.bin', '378', '384', '378', '2019-09-11 01:40:42', '1', 'complete');
INSERT INTO `renewals` VALUES ('3', 'R.N.00018', '12', '12', '2019-09-23', '12', '12', '2019-09-22', '12', '12', '2019-09-16', 'uploads/renewal/1568352491community_img.png', '', '', '375', '374', '368', '2019-09-13 05:26:57', '0', 'complete');
INSERT INTO `renewals` VALUES ('4', 'R.N.00019', 'AA', '12', '2018-08-14', 'AA', '12', '2018-09-24', '12', '12', '2018-07-24', '', '', '', '-31', '9', '-52', '2019-09-13 05:28:00', '0', 'upcoming');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `rfs` tinyint(4) NOT NULL DEFAULT '0',
  `assigned_to` varchar(255) DEFAULT NULL,
  `work_order_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', 'Q', 'Q', '', '0', '0', 'Q', '5', 'complete');
INSERT INTO `services` VALUES ('2', 't', 'T', '', '0', '0', 'T', '4', 'complete');
INSERT INTO `services` VALUES ('3', 'AA', 'AAA', '', '0', '0', 'AAA', '1', 'complete');
INSERT INTO `services` VALUES ('4', 'T', 'T', '', '0', '0', 'T', '1', 'complete');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('38', 'Type1', 'ACC Code1', 'ABCDEFG');
INSERT INTO `types` VALUES ('39', 'Type2', 'ACC Code2', 'A');
INSERT INTO `types` VALUES ('40', 'Type3', 'ACC Code 3', '');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` int(10) NOT NULL,
  `u_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin', 'admin@admin.com', 'Department', '1', 'active', '$2y$10$7hAfRIq5iin.oNviqO9jN.AZ1tNQGOxj3UBetTxFBZDPe4ZfbSKK6', 'AIBHVouQeVD01GmQQP2P9wxNLB2NJSxBooaaHoTwqYhgisP3XiNk3jyCjWeG');
INSERT INTO `users` VALUES ('2', 'Partner', 'partner@partner.com', 'Department', '2', 'active', '$2y$10$sK0HZRxmDQYzYYh4C4KoyOQ/7HG2VY5QuBQtXzaqbSnhF6ee.EOvG', null);

-- ----------------------------
-- Table structure for work_orders
-- ----------------------------
DROP TABLE IF EXISTS `work_orders`;
CREATE TABLE `work_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `wo_no` varchar(255) NOT NULL,
  `type_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `estimate_time` date NOT NULL,
  `last_update_by` int(10) NOT NULL,
  `last_update` datetime NOT NULL,
  `remarks` text NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pre_maintenance_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of work_orders
-- ----------------------------
INSERT INTO `work_orders` VALUES ('1', '1222', '2019-09-10 13:40:36', '123333', '38', '1', 'W.O.00017', '122', '2019-09-10', '1', '2019-09-14 03:30:40', '', 'self', 'complete', null);
INSERT INTO `work_orders` VALUES ('4', 'Q', '2019-09-10 17:57:09', 'Q', '38', '1', 'P.M.00020', 'Q', '2019-09-10', '1', '2019-09-13 03:43:13', '', 'self', 'complete', null);
INSERT INTO `work_orders` VALUES ('5', 'T', '2019-09-10 17:57:32', 'Q', '38', '1', 'W.O.00021', 'T', '2019-09-10', '1', '2019-09-10 08:57:38', '', 'self', 'complete', null);
INSERT INTO `work_orders` VALUES ('11', 'A', '2019-09-12 22:18:31', 'A', '38', '1', 'P.M.00021', 'A', '2019-09-12', '1', '2019-09-14 03:30:30', '', 'self', 'kiv', null);
INSERT INTO `work_orders` VALUES ('12', 'A', '2019-09-13 17:55:23', 'A', '38', '1', 'W.O.00027', 'A', '2019-09-04', '1', '2019-09-14 00:55:30', '', 'self', 'new', null);

-- ----------------------------
-- Table structure for work_order_pics
-- ----------------------------
DROP TABLE IF EXISTS `work_order_pics`;
CREATE TABLE `work_order_pics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_order_id` int(10) NOT NULL,
  `pic_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of work_order_pics
-- ----------------------------
INSERT INTO `work_order_pics` VALUES ('1', '1', 'uploads/workorder/15683471220community_img.png');

-- ----------------------------
-- Table structure for work_order_remarks
-- ----------------------------
DROP TABLE IF EXISTS `work_order_remarks`;
CREATE TABLE `work_order_remarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_order_id` int(10) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of work_order_remarks
-- ----------------------------
