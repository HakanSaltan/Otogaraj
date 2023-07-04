/*
 Navicat Premium Data Transfer

 Source Server         : 213.238.183.166
 Source Server Type    : MySQL
 Source Server Version : 100334 (10.3.34-MariaDB-cll-lve)
 Source Host           : localhost:3306
 Source Schema         : ekonsoft_otogaraj2

 Target Server Type    : MySQL
 Target Server Version : 100334 (10.3.34-MariaDB-cll-lve)
 File Encoding         : 65001

 Date: 04/07/2023 17:07:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for arac_marka
-- ----------------------------
DROP TABLE IF EXISTS `arac_marka`;
CREATE TABLE `arac_marka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arac_marka
-- ----------------------------
BEGIN;
INSERT INTO `arac_marka` (`id`, `name`) VALUES (1, 'Opel');
COMMIT;

-- ----------------------------
-- Table structure for arac_model
-- ----------------------------
DROP TABLE IF EXISTS `arac_model`;
CREATE TABLE `arac_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marka_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arac_model
-- ----------------------------
BEGIN;
INSERT INTO `arac_model` (`id`, `marka_id`, `name`) VALUES (1, 1, 'Astra');
COMMIT;

-- ----------------------------
-- Table structure for arac_uye
-- ----------------------------
DROP TABLE IF EXISTS `arac_uye`;
CREATE TABLE `arac_uye` (
  `arac_id` int(11) DEFAULT NULL,
  `uye_id` int(11) DEFAULT NULL,
  `sahip_ad_soyad` varchar(255) DEFAULT NULL,
  `sahip_tel` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arac_uye
-- ----------------------------
BEGIN;
INSERT INTO `arac_uye` (`arac_id`, `uye_id`, `sahip_ad_soyad`, `sahip_tel`) VALUES (1, 1, 'Hakan SAL', '5674545');
COMMIT;

-- ----------------------------
-- Table structure for araclar
-- ----------------------------
DROP TABLE IF EXISTS `araclar`;
CREATE TABLE `araclar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marka_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `sase` varchar(255) DEFAULT NULL,
  `km` varchar(255) DEFAULT NULL,
  `plaka` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of araclar
-- ----------------------------
BEGIN;
INSERT INTO `araclar` (`id`, `marka_id`, `model_id`, `sase`, `km`, `plaka`, `created_at`, `updated_at`) VALUES (1, 1, 1, '12312312312', '546', '54HN570', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for log_login
-- ----------------------------
DROP TABLE IF EXISTS `log_login`;
CREATE TABLE `log_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `aciklama` varchar(100) NOT NULL,
  `islem_kodu` int(2) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_login
-- ----------------------------
BEGIN;
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (1, 1, 'Admin Giriş Yaptı', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (2, 1, 'Admin Çıkış Yaptı', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (3, 2, 'Üye Giriş Yaptı', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (4, 2, 'Üye Çıkış Yaptı', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (5, 1, 'Admin Giriş Yaptı', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (6, 1, 'Admin Çıkış Yaptı', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (7, 2, 'Üye Giriş Yaptı', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (8, 2, 'Üye Çıkış Yaptı', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_login` (`id`, `user_id`, `aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (9, 3, 'Tedarikçi Giriş Yaptı', 1, '161.9.211.10', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for log_uyeler
-- ----------------------------
DROP TABLE IF EXISTS `log_uyeler`;
CREATE TABLE `log_uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `islem` varchar(150) NOT NULL,
  `islem_aciklama` text NOT NULL,
  `islem_kodu` int(2) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_uyeler
-- ----------------------------
BEGIN;
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (1, 0, 'Guest (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (2, 0, 'Guest (url:://login) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (3, 1, 'Admin login sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"IpEaJO0c2mZUh6dYyOE7F1ex2JCdteI3WacWWaHZ\",\"email\":\"admin@otogaraj.com\",\"password\":\"123456\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (4, 1, 'Admin (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (5, 1, 'Admin (url:://muhasebe) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (6, 1, 'Admin (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (7, 1, 'Admin (url:://qrcode) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (8, 1, 'Admin (url:://admin/profile) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (9, 1, 'Admin (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (10, 1, 'Admin (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (11, 1, 'Admin (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (12, 1, 'Admin (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (13, 1, 'Admin (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (14, 1, 'Admin (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (15, 0, 'Guest logout sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"AeCeTuYWHZ32bKOW3OB393Q7Jtm3mHcZiJ34od4v\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (16, 0, 'Guest (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (17, 0, 'Guest (url:://login) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (18, 2, 'Üye login sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"nOJz2YLWSED29Ec2GvDY0sPC7fThq30AzDqpE6h9\",\"email\":\"uye@otogaraj.com\",\"password\":\"123456\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (19, 2, 'Üye (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (20, 2, 'Üye (url:://uye/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (21, 2, 'Üye uye/aracPost sayfasında kayıt düzenlemesi yaptı.', '{\"tip\":\"yeni\",\"plaka\":\"54HN570\",\"sase\":\"12312adsa23123\",\"km\":\"456\",\"sahipAdi\":\"Hakan SALTAN\",\"sahipTel\":\"05453601002\",\"marka\":1,\"model\":1}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (22, 2, 'Üye (url:://uye/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (23, 2, 'Üye (url:://uye/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (24, 2, 'Üye (url:://uye/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (25, 2, 'Üye (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (26, 2, 'Üye (url:://uye/profile) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (27, 2, 'Üye (url:://uye/profile) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (28, 2, 'Üye (url:://uye/profile) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (29, 2, 'Üye (url:://uye/profile) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (30, 2, 'Üye (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (31, 2, 'Üye (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (32, 2, 'Üye (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (33, 2, 'Üye (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (34, 2, 'Üye (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (35, 2, 'Üye (url:://uye/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (36, 2, 'Üye (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (37, 0, 'Guest logout sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"rQWQzfNHs5aEuXtqY4cQ3s9IFNh1L4Yyu8hEVfW3\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (38, 0, 'Guest (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (39, 0, 'Guest (url:://login) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (40, 1, 'Admin login sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"aiUCKfqU2hvf9FSM3EyvvoU3DOz9UgOH7J6BmUCm\",\"email\":\"admin@otogaraj.com\",\"password\":\"123456\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (41, 1, 'Admin (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (42, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (43, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (44, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (45, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (46, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (47, 1, 'Admin (url:://reload/admin/basvurular) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (48, 1, 'Admin (url:://muhasebe) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (49, 1, 'Admin (url:://admin/muhasebe) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (50, 1, 'Admin (url:://admin/araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (51, 1, 'Admin (url:://reload/admin/araclar) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"arac_marka.name\",\"orderbycolumn\":\"id\",\"orderbytype\":\"ASC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (52, 1, 'Admin (url:://admin/kullanicilar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (53, 1, 'Admin (url:://reload/admin/kullanicilar) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (54, 1, 'Admin (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (55, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (56, 1, 'Admin (url:://reload/admin/basvurular) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (57, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (58, 1, 'Admin (url:://reload/admin/basvurular) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (59, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (60, 1, 'Admin (url:://reload/admin/basvurular) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (61, 1, 'Admin admin/uyeOnay sayfasında kayıt düzenlemesi yaptı.', '{\"tip\":\"onayla\",\"id\":1}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (62, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (63, 1, 'Admin (url:://reload/admin/basvurular) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (64, 1, 'Admin admin/uyeOnay sayfasında kayıt düzenlemesi yaptı.', '{\"tip\":\"onayla\",\"id\":1}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (65, 1, 'Admin (url:://reload/admin/basvurular) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (66, 1, 'Admin (url:://admin/kullanicilar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (67, 1, 'Admin (url:://reload/admin/kullanicilar) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (68, 1, 'Admin (url:://reload/admin/kullanicilar) sayfasına girdi', '{\"page\":\"2\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (69, 1, 'Admin (url:://reload/admin/kullanicilar) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (70, 1, 'Admin (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (71, 1, 'Admin (url:://admin/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (72, 1, 'Admin (url:://reload/admin/basvurular) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"name\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (73, 1, 'Admin (url:://muhasebe) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (74, 1, 'Admin (url:://admin/muhasebe) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (75, 0, 'Guest logout sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"YWshCsoPv9Fmqdp6CADXNfC0VOiuC1it1Yf8q2DW\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (76, 0, 'Guest (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (77, 0, 'Guest (url:://login) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (78, 0, 'Guest (url:://login) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (79, 2, 'Üye login sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"x1eUPPW5B7uiGVBIrtQFj6AXLe6z88eLKhs9Eg2N\",\"email\":\"uye@otogaraj.com\",\"password\":\"123456\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (80, 2, 'Üye (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (81, 2, 'Üye (url:://uye/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (82, 2, 'Üye (url:://uye/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (83, 2, 'Üye (url:://araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (84, 2, 'Üye (url:://uye/araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (85, 2, 'Üye (url:://uye/araclar) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (86, 2, 'Üye (url:://reload/uye/araclar) sayfasına girdi', '{\"page\":\"1\",\"aranacakKelime\":null,\"aranacakSutun\":\"plaka\",\"orderbycolumn\":\"created_at\",\"orderbytype\":\"DESC\"}', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (87, 2, 'Üye (url:://uye/aracDetay/12312312312) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (88, 0, 'Guest logout sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"5ChK6UA6wr2EcqChARNAPkTkd8AqNZIj5SaTApqG\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (89, 0, 'Guest (url::///) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (90, 0, 'Guest (url:://login) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (91, 3, 'Tedarikçi login sayfasında kayıt düzenlemesi yaptı.', '{\"_token\":\"w7mEW0FUFmVq3Svz6CBaIgJdtDVJppFXYHoJdDVf\",\"email\":\"tedarikci@otogaraj.com\",\"password\":\"123456\"}', 1, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (92, 3, 'Tedarikçi (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (93, 3, 'Tedarikçi (url:://tedarikci/home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (94, 3, 'Tedarikçi (url:://login) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (95, 3, 'Tedarikçi (url:://home) sayfasına girdi', '[]', 0, '161.9.211.10', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (96, 0, 'Guest (url::///) sayfasına girdi', '[]', 0, '35.237.4.214', NULL, NULL);
INSERT INTO `log_uyeler` (`id`, `user_id`, `islem`, `islem_aciklama`, `islem_kodu`, `ip`, `created_at`, `updated_at`) VALUES (97, 0, 'Guest (url::///) sayfasına girdi', '[]', 0, '35.227.62.178', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2020_07_07_085048_create_permission_tables', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2020_07_08_135858_create_ayar_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1, 'App\\User', 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\User', 2);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (3, 'App\\User', 3);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'KullaniciGor', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'KullaniciDuzenle', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'RoleAta', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 'RoleKaldir', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, 'IzinleriGor', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (6, 'RolleriGor', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (2, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (3, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (4, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (5, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (6, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'super-admin', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'uye', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'tedarikci', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 'role-manager', 'web', '2023-07-04 12:24:02', '2023-07-04 12:24:02', NULL);
COMMIT;

-- ----------------------------
-- Table structure for user_uye
-- ----------------------------
DROP TABLE IF EXISTS `user_uye`;
CREATE TABLE `user_uye` (
  `user_id` int(11) DEFAULT NULL,
  `uye_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_uye
-- ----------------------------
BEGIN;
INSERT INTO `user_uye` (`user_id`, `uye_id`) VALUES (2, 1);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'Admin', 'admin@otogaraj.com', NULL, '$2y$10$UhxeJDP3pw4nbVRMaVXTR.6Tp.5oyaEBHEQBoXjOvILIxLAsv44yi', NULL, '2023-07-04 12:24:10', '2023-07-04 12:24:10', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'Üye', 'uye@otogaraj.com', NULL, '$2y$10$UhxeJDP3pw4nbVRMaVXTR.6Tp.5oyaEBHEQBoXjOvILIxLAsv44yi', NULL, '2023-07-04 12:24:10', '2023-07-04 12:24:10', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'Tedarikçi', 'tedarikci@otogaraj.com', NULL, '$2y$10$UhxeJDP3pw4nbVRMaVXTR.6Tp.5oyaEBHEQBoXjOvILIxLAsv44yi', NULL, '2023-07-04 12:24:10', '2023-07-04 12:24:10', NULL);
COMMIT;

-- ----------------------------
-- Table structure for uye_ayar
-- ----------------------------
DROP TABLE IF EXISTS `uye_ayar`;
CREATE TABLE `uye_ayar` (
  `uye_id` int(11) NOT NULL,
  `ayarJSON` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of uye_ayar
-- ----------------------------
BEGIN;
INSERT INTO `uye_ayar` (`uye_id`, `ayarJSON`, `deleted_at`) VALUES (1, '{\"id\":\"2\",\"firma_adi\":\"Kodgarj\",\"firma_sahibi\":\"Kodgarj\",\"firma_telefon\":\"05453601002\",\"firma_adresi\":\"Kurtulu\\u015f, Ey\\u00fcp Sk. \\u00d6zel Neva Fen ve Anadolu Lisesi)\",\"firma_logo\":{\"yol\":\"uploads\\/5e0bd0f009551\",\"eskiAd\":\"kodgaraj.png\"}}	NULL', NULL);
COMMIT;

-- ----------------------------
-- Table structure for uyeler
-- ----------------------------
DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `isyeri_adi` varchar(255) DEFAULT NULL,
  `isyeri_adres` varchar(255) DEFAULT NULL,
  `vergi_no` int(11) DEFAULT NULL,
  `sektor` varchar(255) DEFAULT NULL,
  `hakkinda` varchar(255) DEFAULT NULL,
  `durum` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uyeler
-- ----------------------------
BEGIN;
INSERT INTO `uyeler` (`id`, `name`, `email`, `isyeri_adi`, `isyeri_adres`, `vergi_no`, `sektor`, `hakkinda`, `durum`, `created_at`, `updated_at`) VALUES (1, 'Hakan SALTAN', 'hakannsaltan@gmail.com', 'Hakan KAPORTA', 'Erenler', 124124, 'KAPORTA', 'YENİ BAŞLADIM', '1', NULL, '2023-07-04 13:58:36');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
