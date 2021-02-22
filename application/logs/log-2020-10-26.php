<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-10-26 09:03:30 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:33:39 --> Query error: Table 'aapp_web.master_data' doesn't exist - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_data` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `sort`
ERROR - 2020-10-26 09:33:40 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\models\ModelMenu.php 110
ERROR - 2020-10-26 09:34:19 --> Query error: Table 'aapp_web.master_data' doesn't exist - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_data` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `sort`
ERROR - 2020-10-26 09:34:19 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\models\ModelMenu.php 100
ERROR - 2020-10-26 09:34:45 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:35:03 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:38:25 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:49:26 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:51:13 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:51:23 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:51:33 --> Query error: Table 'aapp_web.user' doesn't exist - Invalid query: SELECT `a`.`id`, `a`.`link`, `a`.`label`, `a`.`id`, `a`.`sort`, `a`.`icon`, `a`.`parent`, `a`.`tipe`, `b`.`access_show`, `b`.`access_add`, `b`.`access_detail`, `b`.`access_edit`, `b`.`access_delete`
FROM `master_menu_administrator` `a`
LEFT JOIN `users_access2` `b` ON `b`.`users_menu_id` = `a`.`id`
LEFT JOIN `user` `c` ON `c`.`users_level_id` = `b`.`users_level_id`
WHERE `a`.`parent` =0
AND `c`.`id` = '1'
ORDER BY `sort`
ERROR - 2020-10-26 09:51:33 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\models\ModelMenu.php 42
ERROR - 2020-10-26 09:52:59 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:54:42 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:54:55 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:55:42 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:56:15 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:56:39 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:56:52 --> 404 Page Not Found: /index
ERROR - 2020-10-26 09:57:43 --> Severity: error --> Exception: Too few arguments to function ModelMenu::MenuAdmin(), 2 passed in D:\xampp\htdocs\aapp-web\application\modules\front_home\controllers\Front_home.php on line 30 and exactly 5 expected D:\xampp\htdocs\aapp-web\application\models\ModelMenu.php 14
ERROR - 2020-10-26 09:58:50 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:00:11 --> Severity: error --> Exception: Call to undefined method ModelMenu::menu() D:\xampp\htdocs\aapp-web\application\models\ModelMenu.php 143
ERROR - 2020-10-26 10:00:44 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:01:01 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:01:21 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:05:11 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:07:09 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:08:16 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:08:51 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:09:08 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:09:42 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:09:59 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:10:38 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:11:04 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:11:28 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:11:43 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:13:04 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:13:24 --> 404 Page Not Found: ../modules/front_page/controllers//index
ERROR - 2020-10-26 10:13:26 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:15:37 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:17:23 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:19:24 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:22:26 --> Query error: Unknown column 'b.id_kat' in 'on clause' - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_posting_category` `b` ON `b`.`id_kat` = `a`.`id`
WHERE `a`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 4
ERROR - 2020-10-26 10:22:26 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\front_home\models\Model.php 24
ERROR - 2020-10-26 10:23:07 --> Query error: Unknown column 'b.id_kat' in 'on clause' - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_posting_category` `b` ON `b`.`id_kat` = `a`.`id`
WHERE `a`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 4
ERROR - 2020-10-26 10:23:07 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\front_home\models\Model.php 23
ERROR - 2020-10-26 10:23:46 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:26:35 --> Query error: Unknown column 'a.alug' in 'field list' - Invalid query: SELECT `a`.`alug`, `a`.`judul`, `a`.`deskripsi`, `a`.`tanggal_posting`, `a`.`jam`, `a`.`foto`, `b`.`nm_kat`
FROM `bucket_posting` `a`
LEFT JOIN `bucket_posting_category` `b` ON `b`.`id` = `a`.`id_kat`
WHERE `a`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 4
ERROR - 2020-10-26 10:26:35 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\front_home\models\Model.php 24
ERROR - 2020-10-26 10:26:56 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:27:48 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:28:05 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:28:36 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:49:56 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:50:36 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:50:50 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:51:14 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:51:30 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:52:40 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:58:53 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:59:11 --> 404 Page Not Found: /index
ERROR - 2020-10-26 10:59:45 --> 404 Page Not Found: /index
ERROR - 2020-10-26 11:00:40 --> 404 Page Not Found: ../modules/front_page/controllers//index
ERROR - 2020-10-26 11:00:42 --> 404 Page Not Found: /index
ERROR - 2020-10-26 11:00:42 --> 404 Page Not Found: /index
ERROR - 2020-10-26 11:01:10 --> 404 Page Not Found: /index
ERROR - 2020-10-26 11:02:34 --> 404 Page Not Found: /index
ERROR - 2020-10-26 11:02:58 --> 404 Page Not Found: /index
ERROR - 2020-10-26 11:03:32 --> 404 Page Not Found: /index
ERROR - 2020-10-26 11:04:03 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:20:58 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT COUNT(*) as total
FROM `bucket_kategori`
WHERE `id` = '5'
AND `is_trash` = 1
ERROR - 2020-10-26 16:20:58 --> Severity: error --> Exception: Call to a member function row() on boolean D:\xampp\htdocs\aapp-web\application\models\ModelMenu.php 167
ERROR - 2020-10-26 16:21:56 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:23:07 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:23:35 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:24:29 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:27:59 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:28:16 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:28:29 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:29:02 --> 404 Page Not Found: /index
ERROR - 2020-10-26 16:30:27 --> Severity: error --> Exception: Call to undefined function WaktuLalu() D:\xampp\htdocs\aapp-web\application\views\1_front_home\section1.php 14
ERROR - 2020-10-26 16:31:43 --> 404 Page Not Found: /index
