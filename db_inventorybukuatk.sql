/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : 127.0.0.1:3306
 Source Schema         : db_inventorybukuatk

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 09/03/2020 21:29:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `desc` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `id_supplier` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'pesil abc', 100000, 'pcs', NULL, '7');
INSERT INTO `barang` VALUES (2, 'buku', 15000, 'lusin', NULL, '7');
INSERT INTO `barang` VALUES (3, 'pulpen', 200, 'psc', NULL, '7');
INSERT INTO `barang` VALUES (4, 'tipe x ', 10, 'pcs', NULL, '11');
INSERT INTO `barang` VALUES (5, 'spidol', 100000, 'pcs', NULL, '11');
INSERT INTO `barang` VALUES (6, 'penghapus', 2, 'pcs', NULL, '11');
INSERT INTO `barang` VALUES (8, 'meja belajar', 99, 'meja lesehan', NULL, '13');
INSERT INTO `barang` VALUES (9, 'tipe x ', 99, 'box', NULL, '13');
INSERT INTO `barang` VALUES (10, 'tipe x y z', 99000, 'box', NULL, '13');
INSERT INTO `barang` VALUES (11, 'tipe x ', 321, 'box', NULL, '7');
INSERT INTO `barang` VALUES (12, 'tipe x asda', 123, 'box', NULL, '7');
INSERT INTO `barang` VALUES (13, 'twst', 22, 'twsting', NULL, '11');
INSERT INTO `barang` VALUES (14, 'buku tulis', 12, 'biku tulis abc', NULL, '11');
INSERT INTO `barang` VALUES (15, 'test barang', 2106, 'test', NULL, '7');
INSERT INTO `barang` VALUES (16, 'test barang', 2106, 'test', NULL, '7');
INSERT INTO `barang` VALUES (17, 'test barang', 2106, 'test', NULL, '7');

-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS `budget`;
CREATE TABLE `budget`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budget` int(255) NULL DEFAULT NULL,
  `year` year NULL DEFAULT NULL,
  `month` enum('januari','febuari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of budget
-- ----------------------------
INSERT INTO `budget` VALUES (1, 3000, 2020, 'januari', '2020-01-01 00:00:00', '2020-03-31 00:00:00', NULL);
INSERT INTO `budget` VALUES (2, 3000, 2020, 'febuari', '2020-03-01 00:00:00', '2020-03-31 00:00:00', NULL);
INSERT INTO `budget` VALUES (3, 3000, 2020, 'maret', '2020-03-01 00:00:00', '2020-03-31 00:00:00', NULL);
INSERT INTO `budget` VALUES (4, 3000, 2020, 'april', '2020-03-01 00:00:00', '2020-03-31 00:00:00', NULL);
INSERT INTO `budget` VALUES (5, 2000000, 2019, 'januari', '2020-03-05 12:08:14', NULL, NULL);
INSERT INTO `budget` VALUES (6, 2000000, 2019, 'febuari', '2020-03-05 12:14:18', NULL, NULL);
INSERT INTO `budget` VALUES (7, 11111, 2019, 'maret', '2020-03-05 12:15:55', NULL, NULL);
INSERT INTO `budget` VALUES (8, 11123123, 2019, 'april', '2020-03-05 12:18:02', '2020-03-05 14:56:40', NULL);
INSERT INTO `budget` VALUES (9, 900000, 2019, 'oktober', '2020-03-05 14:45:17', NULL, NULL);
INSERT INTO `budget` VALUES (10, 10000, 2020, 'desember', '2020-03-05 14:49:34', NULL, NULL);

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES (1, 'staff');
INSERT INTO `group` VALUES (2, 'admin');
INSERT INTO `group` VALUES (3, 'supplier');

-- ----------------------------
-- Table structure for kirim
-- ----------------------------
DROP TABLE IF EXISTS `kirim`;
CREATE TABLE `kirim`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_request` int(11) NULL DEFAULT NULL,
  `tgl_kirim` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kirim
-- ----------------------------
INSERT INTO `kirim` VALUES (1, '7', 2, '2020-02-19');
INSERT INTO `kirim` VALUES (2, '7', 3, '2020-02-11');

-- ----------------------------
-- Table structure for request
-- ----------------------------
DROP TABLE IF EXISTS `request`;
CREATE TABLE `request`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_staff` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_supplier` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('New','Process','Send','Received','Reject_By_Supplier','Reject_By_Staff') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'New',
  `tgl_request` date NULL DEFAULT NULL,
  `tgl_selesai` date NULL DEFAULT NULL,
  `noted` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `total` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of request
-- ----------------------------
INSERT INTO `request` VALUES (1, '10', '11', 'New', '2020-01-01', NULL, 'Pesanan diterima oleh ohansyah', 999);
INSERT INTO `request` VALUES (2, '2', '7', 'Received', '2020-01-10', '2020-03-08', 'test 2', 999);
INSERT INTO `request` VALUES (3, '2', '7', 'Received', '2020-01-01', '2020-02-19', 'diterima oleh bla bla bla', 999);
INSERT INTO `request` VALUES (4, '10', '7', 'Process', '2020-02-22', NULL, 'lagi diproses', 999);
INSERT INTO `request` VALUES (5, '10', '7', 'Process', '2020-02-22', NULL, 'lagi diproses', 999);
INSERT INTO `request` VALUES (6, '10', '11', 'New', '2020-03-05', NULL, 'yg keren', 999);
INSERT INTO `request` VALUES (7, '2', '11', 'Reject_By_Staff', '2020-03-05', '2020-02-19', 'yg keren', 999);
INSERT INTO `request` VALUES (8, '2', '11', 'Received', '2020-04-01', '2020-03-08', 'yg keren', 999);
INSERT INTO `request` VALUES (9, '10', '11', 'Received', '2020-04-01', NULL, 'yg keren', 999);
INSERT INTO `request` VALUES (10, '10', '11', 'New', '2020-05-01', NULL, 'yg keren', 999);
INSERT INTO `request` VALUES (11, '2', '11', 'Process', '2020-05-01', NULL, 'yg keren', 999);
INSERT INTO `request` VALUES (12, '2', '11', 'New', '2020-02-29', NULL, 'yg keren', 999);
INSERT INTO `request` VALUES (13, '2', '7', 'Process', '2020-02-29', NULL, '', 999);
INSERT INTO `request` VALUES (15, '2', '7', 'Send', '2020-04-01', NULL, 'dalam satuan box', 999);
INSERT INTO `request` VALUES (16, '2', '7', 'Received', '2020-02-29', '2020-02-19', '123', 999);
INSERT INTO `request` VALUES (17, '2', '7', 'Reject_By_Staff', '2020-05-01', NULL, '123', 999);
INSERT INTO `request` VALUES (18, '12', '7', 'Reject_By_Staff', '2020-02-29', NULL, 'buku 10', 999);
INSERT INTO `request` VALUES (19, '12', '7', 'Reject_By_Staff', '2019-11-01', NULL, '', 11000);
INSERT INTO `request` VALUES (20, '12', '11', 'Reject_By_Staff', '2020-11-01', NULL, 'test  buku', 12000);
INSERT INTO `request` VALUES (21, '12', '11', 'New', '2020-03-08', NULL, '', NULL);
INSERT INTO `request` VALUES (22, '12', '7', 'Reject_By_Supplier', '2020-03-08', '2020-03-09', '', NULL);
INSERT INTO `request` VALUES (23, '12', '13', 'New', '2020-03-08', NULL, '', NULL);
INSERT INTO `request` VALUES (24, '2', '7', 'Received', '2020-03-08', '2020-03-09', '', 0);
INSERT INTO `request` VALUES (25, '2', '11', 'New', '2020-03-08', NULL, '', 0);
INSERT INTO `request` VALUES (26, '2', '13', 'New', '2020-03-08', NULL, '', 0);
INSERT INTO `request` VALUES (27, '2', '7', 'New', '2020-03-08', NULL, '', 550);
INSERT INTO `request` VALUES (28, '2', '11', 'New', '2020-03-08', NULL, '', 12);
INSERT INTO `request` VALUES (29, '2', '13', 'New', '2020-03-08', NULL, '', 99);
INSERT INTO `request` VALUES (30, '10', '7', 'New', '2020-03-08', NULL, 'test 22-54', 550);
INSERT INTO `request` VALUES (31, '10', '11', 'Reject_By_Staff', '2020-03-08', NULL, 'test 22-54', 12);
INSERT INTO `request` VALUES (32, '2', '13', 'Reject_By_Staff', '2020-03-08', NULL, 'test 22-54', 99);

-- ----------------------------
-- Table structure for request_detail
-- ----------------------------
DROP TABLE IF EXISTS `request_detail`;
CREATE TABLE `request_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_request` int(11) NULL DEFAULT NULL,
  `id_barang` int(11) NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `status` enum('cart','order','deleted') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_staff` int(11) NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of request_detail
-- ----------------------------
INSERT INTO `request_detail` VALUES (1, 1, 1, 10, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (2, 1, 2, 20, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (3, 1, 3, 30, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (4, 2, 2, 1, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (5, 3, 3, 12, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (6, NULL, NULL, NULL, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (7, NULL, NULL, NULL, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (8, NULL, 3, 30, 'deleted', 2, 100);
INSERT INTO `request_detail` VALUES (9, NULL, NULL, NULL, 'deleted', NULL, 100);
INSERT INTO `request_detail` VALUES (10, NULL, NULL, NULL, 'deleted', NULL, 100);
INSERT INTO `request_detail` VALUES (11, NULL, NULL, NULL, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (12, NULL, NULL, NULL, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (13, NULL, NULL, NULL, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (14, NULL, NULL, NULL, 'deleted', NULL, 100);
INSERT INTO `request_detail` VALUES (15, NULL, 1, 20, 'deleted', 2, 100);
INSERT INTO `request_detail` VALUES (16, 14, NULL, NULL, 'order', NULL, 100);
INSERT INTO `request_detail` VALUES (17, 17, 6, 200, 'order', 2, 100);
INSERT INTO `request_detail` VALUES (18, 17, 2, 30, 'order', 2, 100);
INSERT INTO `request_detail` VALUES (19, 18, 2, 10, 'order', 2, 100);
INSERT INTO `request_detail` VALUES (20, 19, 6, 10, 'order', 2, 100);
INSERT INTO `request_detail` VALUES (21, 19, 6, 1, 'order', 2, 100);
INSERT INTO `request_detail` VALUES (22, NULL, 2, 1, 'deleted', 2, 100);
INSERT INTO `request_detail` VALUES (23, 20, 14, 12, 'order', 2, 100);
INSERT INTO `request_detail` VALUES (24, NULL, 2, 1, 'deleted', 2, NULL);
INSERT INTO `request_detail` VALUES (25, NULL, 6, 1, 'deleted', 2, NULL);
INSERT INTO `request_detail` VALUES (26, NULL, 2, 1, 'deleted', 2, NULL);
INSERT INTO `request_detail` VALUES (27, NULL, 2, 1, 'deleted', 2, NULL);
INSERT INTO `request_detail` VALUES (28, NULL, 5, 10, 'order', 2, 100000);
INSERT INTO `request_detail` VALUES (29, 30, 2, 10, 'order', 2, 50);
INSERT INTO `request_detail` VALUES (30, 30, 2, 1, 'order', 2, 50);
INSERT INTO `request_detail` VALUES (31, 31, 14, 1, 'order', 2, 12);
INSERT INTO `request_detail` VALUES (32, 32, 9, 1, 'order', 2, 99);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `perusahaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `group` tinyint(4) NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, '90d479ca890855617c4c8528d2dcb228ca69304e', 'O00', 'jalan puri pamulang mas', 'ud 3 putra', 'oohaa@oohaa.com', 2, '089612445164', NULL);
INSERT INTO `user` VALUES (2, '90d479ca890855617c4c8528d2dcb228ca69304e', 'staff', 'jalan jauh sekali', 'smk', 'staff@gmail.com', 1, '085960123404', NULL);
INSERT INTO `user` VALUES (7, '499b0f3ac9e5e105fd5d545b122671ce82a81f24', 'supplier gaul', 'jalan puri pamulang', 'pt pulpen abc', 'supplier@gmail.com', 3, '08977223311', NULL);
INSERT INTO `user` VALUES (8, '90d479ca890855617c4c8528d2dcb228ca69304e', 'admin2222 123', 'admin@admin.com', 'weekend', '123@123.com', 2, '087788123', NULL);
INSERT INTO `user` VALUES (10, '601f1889667efaebb33b8c12572835da3f027f78', 'test staff', 'alamat', 'tes', 'teststaff@staff.com', 1, '0881232', NULL);
INSERT INTO `user` VALUES (11, '601f1889667efaebb33b8c12572835da3f027f78', 'supplier kayu', 'jalan kayu raya', 'pt kayu tbk', 'kayu@gmail.com', 3, '088342352', NULL);
INSERT INTO `user` VALUES (12, '499b0f3ac9e5e105fd5d545b122671ce82a81f24', 'ilham', 'jalan depok', 'SMP Muhammadiyah 4 depok', 'ilham@gmail.com', 1, '08922113344', NULL);
INSERT INTO `user` VALUES (13, '499b0f3ac9e5e105fd5d545b122671ce82a81f24', 'test supplier', 'alamat nan jauh', 'supplier buku', 'sup@sup.com', 3, '08911233', NULL);

SET FOREIGN_KEY_CHECKS = 1;
