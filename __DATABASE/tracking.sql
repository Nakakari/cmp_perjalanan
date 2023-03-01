/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : coba-perjalanan

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 05/02/2023 20:49:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tracking
-- ----------------------------
DROP TABLE IF EXISTS `tracking`;
CREATE TABLE `tracking`  (
  `id_tracking` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengiriman_id` bigint UNSIGNED NOT NULL,
  `status_sent` bigint UNSIGNED NOT NULL,
  `cabang_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tracking`) USING BTREE,
  UNIQUE INDEX `tracking_uuid_unique`(`uuid` ASC) USING BTREE,
  INDEX `tracking_status_sent_foreign`(`status_sent` ASC) USING BTREE,
  INDEX `tracking_cabang_id_foreign`(`cabang_id` ASC) USING BTREE,
  INDEX `tracking_created_by_foreign`(`created_by` ASC) USING BTREE,
  INDEX `tracking_updated_by_foreign`(`updated_by` ASC) USING BTREE,
  INDEX `tracking_pengiriman_id_foreign`(`pengiriman_id` ASC) USING BTREE,
  CONSTRAINT `tracking_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tracking_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tracking_status_sent_foreign` FOREIGN KEY (`status_sent`) REFERENCES `tbl_status_pengiriman` (`id_stst_pngrmn`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tracking_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tracking_pengiriman_id_foreign` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
