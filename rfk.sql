/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : rfk

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 16/08/2022 01:39:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bidang
-- ----------------------------
DROP TABLE IF EXISTS `bidang`;
CREATE TABLE `bidang`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `skpd_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bidang
-- ----------------------------
INSERT INTO `bidang` VALUES (2, 'Bidang Pembinaan PAUD.', 1, 5, '2022-07-25 03:02:12', '2022-07-25 08:16:30');
INSERT INTO `bidang` VALUES (3, 'Bidang Pembinaan SMP', 1, NULL, '2022-07-25 03:02:20', '2022-07-25 03:02:20');
INSERT INTO `bidang` VALUES (4, 'Bidang pembinaan SD', 1, 6, '2022-08-03 09:31:39', '2022-08-03 09:32:01');

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `program_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `program_id_kegiatan`(`program_id`) USING BTREE,
  CONSTRAINT `program_id_kegiatan` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------
INSERT INTO `kegiatan` VALUES (6, 'Pengelolaan Pendidikan Sekolah Dasar', 4, '2022-08-14 20:24:12', '2022-08-14 20:24:12');

-- ----------------------------
-- Table structure for log_buka_tutup
-- ----------------------------
DROP TABLE IF EXISTS `log_buka_tutup`;
CREATE TABLE `log_buka_tutup`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tahun` int(5) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ke` int(2) NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_buka_tutup
-- ----------------------------
INSERT INTO `log_buka_tutup` VALUES (18, 2022, 'murni', NULL, 'buka', '2022-08-16 01:02:46', '2022-08-16 01:02:46');
INSERT INTO `log_buka_tutup` VALUES (19, 2022, 'murni', NULL, 'tutup', '2022-08-16 01:02:50', '2022-08-16 01:02:50');
INSERT INTO `log_buka_tutup` VALUES (28, 2022, 'pergeseran', 1, 'buka', '2022-08-16 01:38:00', '2022-08-16 01:38:00');
INSERT INTO `log_buka_tutup` VALUES (29, 2022, 'pergeseran', 1, 'tutup', '2022-08-16 01:38:31', '2022-08-16 01:38:31');

-- ----------------------------
-- Table structure for program
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tahun` int(5) UNSIGNED NULL DEFAULT NULL,
  `bidang_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of program
-- ----------------------------
INSERT INTO `program` VALUES (4, 2022, 2, 'Program Pengelolaan Pendidikan', '2022-08-14 20:24:02', '2022-08-14 20:24:02');

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  UNIQUE INDEX `role_users_user_id_role_id_unique`(`user_id`, `role_id`) USING BTREE,
  INDEX `role_users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
INSERT INTO `role_users` VALUES (1, 1);
INSERT INTO `role_users` VALUES (2, 2);
INSERT INTO `role_users` VALUES (5, 3);
INSERT INTO `role_users` VALUES (6, 3);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
INSERT INTO `roles` VALUES (2, 'admin', '2020-12-23 23:17:36', '2020-12-23 23:17:36');
INSERT INTO `roles` VALUES (3, 'bidang', '2022-07-24 23:01:43', '2022-07-24 23:01:43');

-- ----------------------------
-- Table structure for skpd
-- ----------------------------
DROP TABLE IF EXISTS `skpd`;
CREATE TABLE `skpd`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_skpd` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` bigint(11) UNSIGNED NULL DEFAULT NULL,
  `is_aktif` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  `murni` int(1) UNSIGNED NULL DEFAULT 0,
  `perubahan` int(1) UNSIGNED NULL DEFAULT 0,
  `realisasi` int(1) UNSIGNED NULL DEFAULT 0,
  `pergeseran` int(1) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id_skpd`(`user_id`) USING BTREE,
  INDEX `kode_skpd`(`kode_skpd`) USING BTREE,
  CONSTRAINT `skpd_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of skpd
-- ----------------------------
INSERT INTO `skpd` VALUES (1, '1.01.01.', 'Dinas Pendidikan', '2022-08-16 01:38:31', '2022-08-16 01:38:31', 2, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (3, '1.03.01.', 'Dinas Pekerjaan Umum dan Penataan Ruang', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (4, '1.04.01.', 'Dinas Perumahan Rakyat dan Kawasan Permukiman', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (5, '1.06.01.', 'Satuan Polisi Pamong Praja', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (6, '1.06.02.', 'Badan Kesatuan Bangsa dan Politik', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (7, '1.07.01.', 'Dinas Sosial', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (8, '2.02.01.', 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (9, '2.03.01.', 'Dinas Ketahanan Pangan, Pertanian dan Perikanan', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (10, '2.05.01.', 'Dinas Lingkungan Hidup', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (11, '2.06.01.', 'Dinas Kependudukan dan Pencatatan Sipil', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (12, '2.08.01.', 'Dinas Pengendalian Penduduk, Keluarga Berencana, dan Pemberdayaan Masyarakat', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (13, '2.09.01.', 'Dinas Perhubungan', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (14, '2.10.01.', 'Dinas Komunikasi, Informatika dan Statistik', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (15, '2.11.01.', 'Dinas Koperasi, Usaha Mikro dan Tenaga Kerja', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (16, '2.12.01.', 'Dinas Penamaan Modal dan Pelayanan Terpadu Satu Pintu', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (17, '2.13.01.', 'Dinas Kepemudaan dan Olahraga', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (18, '2.16.01.', 'Dinas Kebudayaan dan Pariwisata', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (19, '2.17.01.', 'Dinas Perpustakaan dan Kearsipan', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (20, '3.04.01.', 'Dinas Perdagangan dan Perindustrian', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (21, '4.01.03.', 'Sekretariat Daerah', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (22, '4.01.04.', 'Sekretariat DPRD', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (23, '4.01.05.', 'Badan Pengelolaan Keuangan Pendapatan dan Aset Daerah', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (24, '4.01.06.', 'Inspektorat', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (25, '4.01.07.', 'Badan Kepegawaian Daerah, Pendidikan dan Pelatihan', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (26, '4.01.08.', 'Badan Penanggulangan Bencana Daerah', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (27, '4.01.09.', 'Kecamatan Banjarmasin Timur', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (28, '4.01.10.', 'Kecamatan Banjarmasin Utara', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (29, '4.01.11.', 'Kecamatan Banjarmasin Tengah', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (30, '4.01.12.', 'Kecamatan Banjarmasin Barat', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (31, '4.01.13.', 'Kecamatan Banjarmasin Selatan', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (32, '4.02.01.', 'Badan Perencanaan Pembangunan Daerah, Penelitian dan Pengembangan', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (34, '1.02.01.', 'Dinas Kesehatan', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (35, '11111', 'Dinas Baru', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (36, '1.05.01.', 'Dinas Pemadam Kebakaran dan Penyelamatan Kota Banjarmasin', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);
INSERT INTO `skpd` VALUES (37, '2.22.3.', 'Dinas Kebudayaan, Kepemudaan, Olahraga dan Pariwisata Kota Banjarmasin', '2022-08-02 16:57:41', '2022-08-02 16:57:41', NULL, '1', 0, 0, 0, 0);

-- ----------------------------
-- Table structure for subkegiatan
-- ----------------------------
DROP TABLE IF EXISTS `subkegiatan`;
CREATE TABLE `subkegiatan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tahun` int(5) NULL DEFAULT NULL,
  `skpd_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `bidang_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `program_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `kegiatan_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kegiatan_id_subkegaitan`(`kegiatan_id`) USING BTREE,
  CONSTRAINT `kegiatan_id_subkegaitan` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subkegiatan
-- ----------------------------
INSERT INTO `subkegiatan` VALUES (23, 2022, 1, 2, 4, 6, 'Pengadaan Perlengkapan Sekolah.', '2022-08-14 20:24:27', '2022-08-15 22:41:31');

-- ----------------------------
-- Table structure for uraiansubkegiatan
-- ----------------------------
DROP TABLE IF EXISTS `uraiansubkegiatan`;
CREATE TABLE `uraiansubkegiatan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tahun` int(5) NULL DEFAULT NULL,
  `skpd_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `bidang_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `program_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `kegiatan_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `subkegiatan_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `kode_rekening` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `dpa` int(11) UNSIGNED NULL DEFAULT NULL,
  `p_januari_keuangan` int(11) NULL DEFAULT 0,
  `p_februari_keuangan` int(11) NULL DEFAULT 0,
  `p_maret_keuangan` int(11) NULL DEFAULT 0,
  `p_april_keuangan` int(11) NULL DEFAULT 0,
  `p_mei_keuangan` int(11) NULL DEFAULT 0,
  `p_juni_keuangan` int(11) NULL DEFAULT 0,
  `p_juli_keuangan` int(11) NULL DEFAULT 0,
  `p_agustus_keuangan` int(11) NULL DEFAULT 0,
  `p_september_keuangan` int(11) NULL DEFAULT 0,
  `p_oktober_keuangan` int(11) NULL DEFAULT 0,
  `p_november_keuangan` int(11) NULL DEFAULT 0,
  `p_desember_keuangan` int(11) NULL DEFAULT 0,
  `p_januari_fisik` int(11) NULL DEFAULT 0,
  `p_februari_fisik` int(11) NULL DEFAULT 0,
  `p_maret_fisik` int(11) NULL DEFAULT 0,
  `p_april_fisik` int(11) NULL DEFAULT 0,
  `p_mei_fisik` int(11) NULL DEFAULT 0,
  `p_juni_fisik` int(11) NULL DEFAULT 0,
  `p_juli_fisik` int(11) NULL DEFAULT 0,
  `p_agustus_fisik` int(11) NULL DEFAULT 0,
  `p_september_fisik` int(11) NULL DEFAULT 0,
  `p_oktober_fisik` int(11) NULL DEFAULT 0,
  `p_november_fisik` int(11) NULL DEFAULT 0,
  `p_desember_fisik` int(11) NULL DEFAULT 0,
  `r_januari_keuangan` int(11) NULL DEFAULT 0,
  `r_februari_keuangan` int(11) NULL DEFAULT 0,
  `r_maret_keuangan` int(11) NULL DEFAULT 0,
  `r_april_keuangan` int(11) NULL DEFAULT 0,
  `r_mei_keuangan` int(11) NULL DEFAULT 0,
  `r_juni_keuangan` int(11) NULL DEFAULT 0,
  `r_juli_keuangan` int(11) NULL DEFAULT 0,
  `r_agustus_keuangan` int(11) NULL DEFAULT 0,
  `r_september_keuangan` int(11) NULL DEFAULT 0,
  `r_oktober_keuangan` int(11) NULL DEFAULT 0,
  `r_november_keuangan` int(11) NULL DEFAULT 0,
  `r_desember_keuangan` int(11) NULL DEFAULT 0,
  `r_januari_fisik` int(11) NULL DEFAULT 0,
  `r_februari_fisik` int(11) NULL DEFAULT 0,
  `r_maret_fisik` int(11) NULL DEFAULT 0,
  `r_april_fisik` int(11) NULL DEFAULT 0,
  `r_mei_fisik` int(11) NULL DEFAULT 0,
  `r_juni_fisik` int(11) NULL DEFAULT 0,
  `r_juli_fisik` int(11) NULL DEFAULT 0,
  `r_agustus_fisik` int(11) NULL DEFAULT 0,
  `r_september_fisik` int(11) NULL DEFAULT 0,
  `r_oktober_fisik` int(11) NULL DEFAULT 0,
  `r_november_fisik` int(11) NULL DEFAULT 0,
  `r_desember_fisik` int(11) NULL DEFAULT 0,
  `status` int(2) UNSIGNED NULL DEFAULT NULL COMMENT '1:murni, 2-98:pergeseran, 99 : perubahan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uraian_id` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uraian_subkegiatan_id`(`subkegiatan_id`) USING BTREE,
  INDEX `uraian_id_uraian`(`uraian_id`) USING BTREE,
  CONSTRAINT `uraian_subkegiatan_id` FOREIGN KEY (`subkegiatan_id`) REFERENCES `subkegiatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `uraian_id_uraian` FOREIGN KEY (`uraian_id`) REFERENCES `uraiansubkegiatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uraiansubkegiatan
-- ----------------------------
INSERT INTO `uraiansubkegiatan` VALUES (1, 2022, 1, 2, 4, 6, 23, '5.2.02.10.01.0002.', 'Belanja Alat/Bahan untuk Kegiatan Kantor - Alat/Bahan untuk Kegiatan Kantor Lainnya', 655200, 0, 0, 0, 0, 0, 0, 655200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 655200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2022-08-14 21:02:45', '2022-08-14 22:14:48', NULL);
INSERT INTO `uraiansubkegiatan` VALUES (2, 2022, 1, 2, 4, 6, 23, '5.1.02.01.01.0036.', 'Belanja Modal Personal Computer', 1049344800, 1000000, 1000000, 1000000, 1000000, 1000000, 0, 1040344800, 3000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000000, 1045344800, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, NULL, '2022-08-14 21:03:03', '2022-08-15 21:59:42', NULL);
INSERT INTO `uraiansubkegiatan` VALUES (15, 2022, 1, 2, 4, 6, 23, '5.2.02.10.01.0002.', 'Belanja Alat/Bahan untuk Kegiatan Kantor - Alat/Bahan untuk Kegiatan Kantor Lainnya', 655200, 0, 0, 0, 0, 0, 0, 655200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 655200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-14 13:02:45', '2022-08-14 14:14:48', 1);
INSERT INTO `uraiansubkegiatan` VALUES (16, 2022, 1, 2, 4, 6, 23, '5.1.02.01.01.0036.', 'Belanja Modal Personal Computer', 1049344800, 1000000, 1000000, 1000000, 1000000, 1000000, 0, 1040344800, 3000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000000, 1045344800, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 1, '2022-08-14 13:03:03', '2022-08-15 13:59:42', 2);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_superadmin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_session` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `change_password` int(1) UNSIGNED NULL DEFAULT 0 COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin', NULL, 'superadmin', '2022-08-14 21:49:05', '$2y$10$3k7FLC2TkBzYnumOyiv7BOmTOsTzzJHb3/p4aKcBUoGonp4Jij0Wu', NULL, '7gaOYsLx2BLL2ZDEmL57nC10ngEwJN26X3WoyGa9bjbzWyIoCFIjGTfSNkBm', '2022-08-14 21:49:05', '2022-08-14 21:49:05', NULL, NULL, 0);
INSERT INTO `users` VALUES (2, 'Dinas Pendidikan', NULL, '1.01.01.', '2022-08-14 21:49:00', '$2y$10$tosptfdovqYS7xbf.aQYwedJHBzYEJBxGXTD4AHssP.O4nNAnUUne', NULL, 'SFR3NxeSGIoPGE4DzEDGm6pMqIThShVxcRvvnynntxS51KNCgw6WG9DXMqB4', '2022-08-14 21:49:00', '2022-08-14 21:49:00', NULL, NULL, 0);
INSERT INTO `users` VALUES (5, 'Bidang Pembinaan PAUD.', NULL, 'bidangpaud', '2022-08-03 07:53:54', '$2y$10$9rrtwPoG6Ipeb7.BdUFJHOLDVHuLJo83.zupW5CkajeIeADMGVdqK', NULL, '1SoH3vnOjtSwLBe3AJioDKkNsXvU2fPlOJYIevtQRcM0ZQPfo0VZkYQvpuet', '2022-08-03 07:53:54', '2022-08-03 07:53:54', NULL, NULL, 0);
INSERT INTO `users` VALUES (6, 'Bidang pembinaan SD', NULL, 'pptkbidangsd', '2022-08-03 09:32:47', '$2y$10$IHGLUVwzykgfucRDe6YogeQAcZ2Z4Kz9ozge09ypRnrnQfbSHWD8a', NULL, 'SfCpksOM8JsKim5MfDN4jEhBwS1laLDgzQlAG4SqmA4ahLIY8EbTCIJeMDxp', '2022-08-03 09:32:47', '2022-08-03 09:32:47', NULL, NULL, 0);

SET FOREIGN_KEY_CHECKS = 1;
