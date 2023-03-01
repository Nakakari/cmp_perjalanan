/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : coba-perjalanan

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 01/02/2023 00:03:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id_bank` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `an` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_bank`) USING BTREE,
  INDEX `bank_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `bank_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `bank_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `bank_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bank
-- ----------------------------

-- ----------------------------
-- Table structure for cabang
-- ----------------------------
DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang`  (
  `id_cabang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_cabang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cabang
-- ----------------------------
INSERT INTO `cabang` VALUES (1, 'Ngw', 'Ngawi', 1, 1);
INSERT INTO `cabang` VALUES (2, 'Njk', 'Nganjuk', 1, 1);
INSERT INTO `cabang` VALUES (3, 'Sby', 'Surabaya', 1, 1);

-- ----------------------------
-- Table structure for detail_koli
-- ----------------------------
DROP TABLE IF EXISTS `detail_koli`;
CREATE TABLE `detail_koli`  (
  `id_detail_koli` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `identitas_id` bigint(20) UNSIGNED NOT NULL,
  `koli_id` bigint(20) UNSIGNED NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_koli`) USING BTREE,
  INDEX `detail_koli_identitas_id_foreign`(`identitas_id`) USING BTREE,
  INDEX `detail_koli_koli_id_foreign`(`koli_id`) USING BTREE,
  INDEX `detail_koli_cabang_id_foreign`(`cabang_id`) USING BTREE,
  INDEX `detail_koli_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `detail_koli_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `detail_koli_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_koli_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_koli_identitas_id_foreign` FOREIGN KEY (`identitas_id`) REFERENCES `resi_identitas` (`id_identitas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_koli_koli_id_foreign` FOREIGN KEY (`koli_id`) REFERENCES `koli_cek` (`id_kolicek`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_koli_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_koli
-- ----------------------------

-- ----------------------------
-- Table structure for detail_manifest
-- ----------------------------
DROP TABLE IF EXISTS `detail_manifest`;
CREATE TABLE `detail_manifest`  (
  `id_detail_manifest` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pengiriman_id` bigint(20) UNSIGNED NOT NULL,
  `manifest_id` bigint(20) UNSIGNED NOT NULL,
  `estimasi` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_detail_manifest`) USING BTREE,
  INDEX `detail_manifest_pengiriman_id_foreign`(`pengiriman_id`) USING BTREE,
  INDEX `detail_manifest_manifest_id_foreign`(`manifest_id`) USING BTREE,
  CONSTRAINT `detail_manifest_manifest_id_foreign` FOREIGN KEY (`manifest_id`) REFERENCES `manifest` (`id_manifest`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detail_manifest_pengiriman_id_foreign` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_manifest
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id_jabatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'Admin', 1, 1);
INSERT INTO `jabatan` VALUES (2, 'Direktur', 1, 1);
INSERT INTO `jabatan` VALUES (3, 'Manager Oprasional', 1, 1);
INSERT INTO `jabatan` VALUES (4, 'Kepala Cabang', 1, 1);
INSERT INTO `jabatan` VALUES (5, 'Sales Counter', 1, 1);
INSERT INTO `jabatan` VALUES (6, 'Agen', 1, 1);
INSERT INTO `jabatan` VALUES (7, 'Checker', 1, 1);

-- ----------------------------
-- Table structure for koli_cek
-- ----------------------------
DROP TABLE IF EXISTS `koli_cek`;
CREATE TABLE `koli_cek`  (
  `id_kolicek` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nopol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_buat` date NULL DEFAULT NULL,
  `jumlah_resi` bigint(20) NULL DEFAULT NULL,
  `jumlah_koli` bigint(20) NULL DEFAULT NULL,
  `id_cabang` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_kolicek`) USING BTREE,
  INDEX `koli_cek_id_cabang_foreign`(`id_cabang`) USING BTREE,
  INDEX `koli_cek_created_by_foreign`(`created_by`) USING BTREE,
  CONSTRAINT `koli_cek_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `koli_cek_id_cabang_foreign` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of koli_cek
-- ----------------------------

-- ----------------------------
-- Table structure for manifest
-- ----------------------------
DROP TABLE IF EXISTS `manifest`;
CREATE TABLE `manifest`  (
  `id_manifest` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_manifest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp_driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nopol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `estimasi_tiba` date NULL DEFAULT NULL,
  `tgl_buat` date NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_cabang` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_manifest`) USING BTREE,
  INDEX `manifest_id_cabang_foreign`(`id_cabang`) USING BTREE,
  CONSTRAINT `manifest_id_cabang_foreign` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manifest
-- ----------------------------

-- ----------------------------
-- Table structure for member_sales
-- ----------------------------
DROP TABLE IF EXISTS `member_sales`;
CREATE TABLE `member_sales`  (
  `id_member_sales` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sales` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_member_sales`) USING BTREE,
  UNIQUE INDEX `member_sales_uuid_unique`(`uuid`) USING BTREE,
  UNIQUE INDEX `member_sales_kode_unique`(`kode`) USING BTREE,
  INDEX `member_sales_id_sales_foreign`(`id_sales`) USING BTREE,
  INDEX `member_sales_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `member_sales_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `member_sales_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `member_sales_id_sales_foreign` FOREIGN KEY (`id_sales`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `member_sales_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of member_sales
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 851 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (574, '2023_01_26_134245_create_member_sales_table', 1);
INSERT INTO `migrations` VALUES (825, '2014_10_11_000000_create_cabang_table', 2);
INSERT INTO `migrations` VALUES (826, '2014_10_11_000001_create_jabatan_table', 2);
INSERT INTO `migrations` VALUES (827, '2014_10_12_000000_create_users_table', 2);
INSERT INTO `migrations` VALUES (828, '2014_10_12_000001_create_member_sales_table', 2);
INSERT INTO `migrations` VALUES (829, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` VALUES (830, '2019_08_19_000000_create_failed_jobs_table', 2);
INSERT INTO `migrations` VALUES (831, '2019_12_14_000001_create_personal_access_tokens_table', 2);
INSERT INTO `migrations` VALUES (832, '2023_01_12_154411_create_bank_table', 2);
INSERT INTO `migrations` VALUES (833, '2023_01_12_162314_create_pelanggan_table', 2);
INSERT INTO `migrations` VALUES (834, '2023_01_12_162718_create_moda_table', 2);
INSERT INTO `migrations` VALUES (835, '2023_01_12_162847_create_tipe_pembayaran_table', 2);
INSERT INTO `migrations` VALUES (836, '2023_01_12_162952_create_tipe_pelayanan_table', 2);
INSERT INTO `migrations` VALUES (837, '2023_01_12_163556_create_tbl_status_pengiriman_table', 2);
INSERT INTO `migrations` VALUES (838, '2023_01_13_124256_create_pengiriman_table', 2);
INSERT INTO `migrations` VALUES (839, '2023_01_13_135130_create_tbl_kondisi_resi_table', 2);
INSERT INTO `migrations` VALUES (840, '2023_01_13_135737_create_tbl_surat_kembali_table', 2);
INSERT INTO `migrations` VALUES (841, '2023_01_13_140149_create_manifest_table', 2);
INSERT INTO `migrations` VALUES (842, '2023_01_13_140542_create_detail_manifest_table', 2);
INSERT INTO `migrations` VALUES (843, '2023_01_13_140936_create_resi_identitas_table', 2);
INSERT INTO `migrations` VALUES (844, '2023_01_14_022926_create_tbl_invoice_table', 2);
INSERT INTO `migrations` VALUES (845, '2023_01_14_023622_create_tbl_bea_tambahan_invoice_table', 2);
INSERT INTO `migrations` VALUES (846, '2023_01_14_023934_create_tbl_detail_invoice_table', 2);
INSERT INTO `migrations` VALUES (847, '2023_01_14_024148_create_tbl_klaim_invoice_table', 2);
INSERT INTO `migrations` VALUES (848, '2023_01_14_024409_create_tbl_pelunasan_table', 2);
INSERT INTO `migrations` VALUES (849, '2023_01_30_132646_create_koli_cek_table', 2);
INSERT INTO `migrations` VALUES (850, '2023_01_30_132715_create_detail_koli_table', 2);

-- ----------------------------
-- Table structure for moda
-- ----------------------------
DROP TABLE IF EXISTS `moda`;
CREATE TABLE `moda`  (
  `id_moda` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_moda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_moda`) USING BTREE,
  INDEX `moda_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `moda_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `moda_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `moda_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of moda
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_spv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_spv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_prshn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE,
  INDEX `pelanggan_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `pelanggan_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `pelanggan_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pelanggan_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------

-- ----------------------------
-- Table structure for pengiriman
-- ----------------------------
DROP TABLE IF EXISTS `pengiriman`;
CREATE TABLE `pengiriman`  (
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dari_cabang` bigint(20) UNSIGNED NOT NULL,
  `no_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi_manual` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_pengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_pengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengirim` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_pengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cabang_tujuan` bigint(20) UNSIGNED NOT NULL,
  `status_sent` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `nama_penerima` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_penerima` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penerima` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_penerima` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_barang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) NULL DEFAULT NULL,
  `volume` int(11) NULL DEFAULT NULL,
  `koli` int(11) NOT NULL,
  `no_ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_pelayanan` bigint(20) UNSIGNED NOT NULL,
  `no_moda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bea` bigint(20) NOT NULL,
  `bea_penerus` bigint(20) NOT NULL,
  `bea_packing` bigint(20) NOT NULL,
  `asuransi` bigint(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `tipe_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `id_transit` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `tgl_tiba` date NULL DEFAULT NULL,
  `file_bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_buat` int(11) NULL DEFAULT NULL,
  `is_kondisi_resi` int(11) NULL DEFAULT NULL,
  `is_lunas` int(11) NULL DEFAULT NULL,
  `id_member_sales` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengiriman`) USING BTREE,
  INDEX `pengiriman_dari_cabang_foreign`(`dari_cabang`) USING BTREE,
  INDEX `pengiriman_id_cabang_tujuan_foreign`(`id_cabang_tujuan`) USING BTREE,
  INDEX `pengiriman_status_sent_foreign`(`status_sent`) USING BTREE,
  INDEX `pengiriman_id_pelanggan_foreign`(`id_pelanggan`) USING BTREE,
  INDEX `pengiriman_no_pelayanan_foreign`(`no_pelayanan`) USING BTREE,
  INDEX `pengiriman_tipe_pembayaran_foreign`(`tipe_pembayaran`) USING BTREE,
  INDEX `pengiriman_id_transit_foreign`(`id_transit`) USING BTREE,
  INDEX `pengiriman_id_member_sales_foreign`(`id_member_sales`) USING BTREE,
  INDEX `pengiriman_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `pengiriman_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `pengiriman_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_dari_cabang_foreign` FOREIGN KEY (`dari_cabang`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_id_cabang_tujuan_foreign` FOREIGN KEY (`id_cabang_tujuan`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_id_member_sales_foreign` FOREIGN KEY (`id_member_sales`) REFERENCES `member_sales` (`id_member_sales`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_id_transit_foreign` FOREIGN KEY (`id_transit`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_no_pelayanan_foreign` FOREIGN KEY (`no_pelayanan`) REFERENCES `tipe_pelayanan` (`id_pelayanan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_status_sent_foreign` FOREIGN KEY (`status_sent`) REFERENCES `tbl_status_pengiriman` (`id_stst_pngrmn`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_tipe_pembayaran_foreign` FOREIGN KEY (`tipe_pembayaran`) REFERENCES `tipe_pembayaran` (`id_pembayaran`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengiriman_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengiriman
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for resi_identitas
-- ----------------------------
DROP TABLE IF EXISTS `resi_identitas`;
CREATE TABLE `resi_identitas`  (
  `id_identitas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL,
  `nama_identitas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_identitas`) USING BTREE,
  INDEX `resi_identitas_id_pengiriman_foreign`(`id_pengiriman`) USING BTREE,
  CONSTRAINT `resi_identitas_id_pengiriman_foreign` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resi_identitas
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_bea_tambahan_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bea_tambahan_invoice`;
CREATE TABLE `tbl_bea_tambahan_invoice`  (
  `id_bea_tambahan_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `bea_tambahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_bea` bigint(20) NOT NULL,
  PRIMARY KEY (`id_bea_tambahan_invoice`) USING BTREE,
  INDEX `tbl_bea_tambahan_invoice_id_invoice_foreign`(`id_invoice`) USING BTREE,
  CONSTRAINT `tbl_bea_tambahan_invoice_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`id_invoice`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_bea_tambahan_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_detail_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_invoice`;
CREATE TABLE `tbl_detail_invoice`  (
  `id_detail_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_detail_invoice`) USING BTREE,
  INDEX `tbl_detail_invoice_id_invoice_foreign`(`id_invoice`) USING BTREE,
  INDEX `tbl_detail_invoice_id_pengiriman_foreign`(`id_pengiriman`) USING BTREE,
  CONSTRAINT `tbl_detail_invoice_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`id_invoice`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_detail_invoice_id_pengiriman_foreign` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detail_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tbl_invoice`;
CREATE TABLE `tbl_invoice`  (
  `id_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bank` bigint(20) UNSIGNED NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `pembuat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mengetahui` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diterbitkan` date NOT NULL,
  `ppn` double(8, 2) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `biaya_invoice` bigint(20) NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `is_lunas` tinyint(4) NOT NULL,
  `ttl_biaya_invoice` bigint(20) NOT NULL,
  PRIMARY KEY (`id_invoice`) USING BTREE,
  INDEX `tbl_invoice_id_bank_foreign`(`id_bank`) USING BTREE,
  INDEX `tbl_invoice_id_pelanggan_foreign`(`id_pelanggan`) USING BTREE,
  CONSTRAINT `tbl_invoice_id_bank_foreign` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_invoice_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_klaim_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tbl_klaim_invoice`;
CREATE TABLE `tbl_klaim_invoice`  (
  `id_klaim_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `klaim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_klaim` bigint(20) NOT NULL,
  PRIMARY KEY (`id_klaim_invoice`) USING BTREE,
  INDEX `tbl_klaim_invoice_id_invoice_foreign`(`id_invoice`) USING BTREE,
  CONSTRAINT `tbl_klaim_invoice_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`id_invoice`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_klaim_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_kondisi_resi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kondisi_resi`;
CREATE TABLE `tbl_kondisi_resi`  (
  `id_kondisi_resi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kondisi_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_kondisi_resi`) USING BTREE,
  INDEX `tbl_kondisi_resi_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `tbl_kondisi_resi_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `tbl_kondisi_resi_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_kondisi_resi_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kondisi_resi
-- ----------------------------
INSERT INTO `tbl_kondisi_resi` VALUES (1, 'SURAT BELUM KEMBALI', 1, 1);
INSERT INTO `tbl_kondisi_resi` VALUES (2, 'TANPA KETERANGAN', 1, 1);

-- ----------------------------
-- Table structure for tbl_pelunasan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelunasan`;
CREATE TABLE `tbl_pelunasan`  (
  `id_pelunasan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `nominal_pelunasan` bigint(20) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelunasan`) USING BTREE,
  INDEX `tbl_pelunasan_id_invoice_foreign`(`id_invoice`) USING BTREE,
  CONSTRAINT `tbl_pelunasan_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`id_invoice`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pelunasan
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_status_pengiriman
-- ----------------------------
DROP TABLE IF EXISTS `tbl_status_pengiriman`;
CREATE TABLE `tbl_status_pengiriman`  (
  `id_stst_pngrmn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_stst_pngrmn`) USING BTREE,
  INDEX `tbl_status_pengiriman_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `tbl_status_pengiriman_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `tbl_status_pengiriman_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_status_pengiriman_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_status_pengiriman
-- ----------------------------
INSERT INTO `tbl_status_pengiriman` VALUES (1, 'Order Masuk', 'class=\"badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3\"', 1, 1);
INSERT INTO `tbl_status_pengiriman` VALUES (2, 'Perjalanan Ke Kota Tujuan', 'class=\"badge rounded-pill text-primary bg-light-primary p-2 text-uppercase px-3\"', 1, 1);
INSERT INTO `tbl_status_pengiriman` VALUES (3, 'Transit', 'class=\"badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3\"', 1, 1);
INSERT INTO `tbl_status_pengiriman` VALUES (4, 'Sampai di Warehouse Kota Tujuan', 'class=\"badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3\"', 1, 1);
INSERT INTO `tbl_status_pengiriman` VALUES (5, 'Proses Antar Kurir', 'class=\"badge rounded-pill text-secondary bg-light-secondary p-2 text-uppercase px-3\"', 1, 1);
INSERT INTO `tbl_status_pengiriman` VALUES (6, 'Diterima dengan Baik', 'class=\"badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3\"', 1, 1);
INSERT INTO `tbl_status_pengiriman` VALUES (7, 'Cancelled', 'class=\"badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3\"', 1, 1);

-- ----------------------------
-- Table structure for tbl_surat_kembali
-- ----------------------------
DROP TABLE IF EXISTS `tbl_surat_kembali`;
CREATE TABLE `tbl_surat_kembali`  (
  `id_surat_kembali` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL,
  `no_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat_kembali` date NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_isi` int(11) NOT NULL,
  PRIMARY KEY (`id_surat_kembali`) USING BTREE,
  INDEX `tbl_surat_kembali_id_pengiriman_foreign`(`id_pengiriman`) USING BTREE,
  CONSTRAINT `tbl_surat_kembali_id_pengiriman_foreign` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_surat_kembali
-- ----------------------------

-- ----------------------------
-- Table structure for tipe_pelayanan
-- ----------------------------
DROP TABLE IF EXISTS `tipe_pelayanan`;
CREATE TABLE `tipe_pelayanan`  (
  `id_pelayanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_pelayanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelayanan`) USING BTREE,
  INDEX `tipe_pelayanan_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `tipe_pelayanan_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `tipe_pelayanan_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tipe_pelayanan_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipe_pelayanan
-- ----------------------------
INSERT INTO `tipe_pelayanan` VALUES (1, 'One Day Service', 1, 1);
INSERT INTO `tipe_pelayanan` VALUES (2, 'Cargo', 1, 1);

-- ----------------------------
-- Table structure for tipe_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tipe_pembayaran`;
CREATE TABLE `tipe_pembayaran`  (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_tipe_pemb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`) USING BTREE,
  INDEX `tipe_pembayaran_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `tipe_pembayaran_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `tipe_pembayaran_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tipe_pembayaran_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipe_pembayaran
-- ----------------------------
INSERT INTO `tipe_pembayaran` VALUES (1, 'Tagihan', 1, 1);
INSERT INTO `tipe_pembayaran` VALUES (2, 'COD', 1, 1);
INSERT INTO `tipe_pembayaran` VALUES (3, 'Cash', 1, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `peran` bigint(20) UNSIGNED NOT NULL,
  `file_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cabang` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_uuid_unique`(`uuid`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_peran_foreign`(`peran`) USING BTREE,
  INDEX `users_id_cabang_foreign`(`id_cabang`) USING BTREE,
  CONSTRAINT `users_id_cabang_foreign` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `users_peran_foreign` FOREIGN KEY (`peran`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '181d0e30-f7a8-4c55-a135-e9e56d53585c', 'Admin', 'admin@admin.com', NULL, 1, 'avatar1.png', '2023-01-31', '-', 1, '$2y$10$dhUB/ErrLMeRswjxaCPp6eZt/ycr9Dp6reWYJYmf6Ocmfzp8qFyhm', NULL, 1, 1, '2023-01-31 17:01:07', '2023-01-31 17:01:07');
INSERT INTO `users` VALUES (2, '4bb035ec-2979-46ae-a731-5cee2f114633', 'Sales', 'sales@gmail.com', NULL, 5, 'avatar1.png', '2023-01-31', '-', 1, '$2y$10$sI6/HOTPOx2JTub5IKVTXuXlYYMdewLY/VNk7KVFYfUh2tWqziZSa', NULL, 1, 1, '2023-01-31 17:01:07', '2023-01-31 17:01:07');
INSERT INTO `users` VALUES (3, 'fb35733b-3892-4f6b-83e9-5b31972c04d9', 'Checker', 'checker@gmail.com', NULL, 7, 'avatar1.png', '2023-01-31', '-', 1, '$2y$10$0.BQeHjhrbbvy/5/2fKkjuTj9iJJpqkRYs55rWjXVQUsTM5Pjc30.', NULL, 1, 1, '2023-01-31 17:01:07', '2023-01-31 17:01:07');

SET FOREIGN_KEY_CHECKS = 1;
