<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-12-31 07:19:14 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 07:19:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:19:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:24:22 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 07:24:22 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_kategori`
WHERE `is_trash` = 1
ERROR - 2020-12-31 07:24:22 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::result() D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 160
ERROR - 2020-12-31 07:26:20 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 07:26:20 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::result() D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 160
ERROR - 2020-12-31 07:35:35 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 07:35:35 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:35:35 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:35:55 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:36:38 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 07:36:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:36:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:36:41 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:36:45 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 07:36:45 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:36:45 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:37:30 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:38:53 --> 404 Page Not Found: /index
ERROR - 2020-12-31 07:50:12 --> Query error: Table 'aapp_web.bc_indag_p_blog' doesn't exist - Invalid query: SELECT *
FROM `bc_indag_p_blog`
WHERE `is_trash` = 1
ERROR - 2020-12-31 07:50:12 --> Severity: error --> Exception: Call to a member function num_rows() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 26
ERROR - 2020-12-31 07:50:40 --> Query error: Table 'aapp_web.bc_indag_p_blog' doesn't exist - Invalid query: SELECT *
FROM `bc_indag_p_blog` `a`
RIGHT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 07:50:40 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 18
ERROR - 2020-12-31 07:51:02 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
RIGHT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 07:51:02 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 18
ERROR - 2020-12-31 07:51:34 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
RIGHT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 07:51:34 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 17
ERROR - 2020-12-31 08:00:46 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
RIGHT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 08:00:46 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 18
ERROR - 2020-12-31 08:07:12 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 08:07:12 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 18
ERROR - 2020-12-31 08:08:16 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 08:08:16 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 18
ERROR - 2020-12-31 08:12:36 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 08:12:36 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 17
ERROR - 2020-12-31 08:43:09 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 08:43:09 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 17
ERROR - 2020-12-31 08:48:46 --> Query error: Table 'aapp_web.statis_home' doesn't exist - Invalid query: SELECT *
FROM `statis_home`
ORDER BY `page_order`
ERROR - 2020-12-31 08:48:46 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 65
ERROR - 2020-12-31 08:49:18 --> Severity: error --> Exception: Call to undefined method Front_posting::menu() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 66
ERROR - 2020-12-31 08:49:43 --> Severity: error --> Exception: Call to undefined method Front_posting::MenuFront() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 66
ERROR - 2020-12-31 08:50:28 --> Severity: error --> Exception: Call to undefined method Front_posting::modelMenuFront() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 08:50:50 --> Severity: error --> Exception: Call to undefined method Front_posting::MenuFront() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 08:51:18 --> Severity: error --> Exception: Call to undefined method Front_posting::MenuFront() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 08:51:20 --> Severity: error --> Exception: Call to undefined method Front_posting::MenuFront() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 08:51:42 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 08:51:42 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 112
ERROR - 2020-12-31 08:52:27 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 08:52:27 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 109
ERROR - 2020-12-31 08:52:50 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 08:52:50 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 108
ERROR - 2020-12-31 08:52:52 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 08:52:52 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 108
ERROR - 2020-12-31 08:53:27 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 08:53:27 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 112
ERROR - 2020-12-31 08:56:37 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `b`.`judul`, `b`.`slug`, `a`.`page_type`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 08:56:37 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 08:58:00 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 08:58:00 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:00:39 --> Query error: Table 'aapp_web.statis_home' doesn't exist - Invalid query: SELECT *
FROM `statis_home`
ORDER BY `page_order`
ERROR - 2020-12-31 09:00:39 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 89
ERROR - 2020-12-31 09:01:03 --> Query error: Table 'aapp_web.statis_home' doesn't exist - Invalid query: SELECT *
FROM `statis_home`
ORDER BY `page_order`
ERROR - 2020-12-31 09:01:03 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 89
ERROR - 2020-12-31 09:02:12 --> Query error: Table 'aapp_web.statis_home' doesn't exist - Invalid query: SELECT *
FROM `statis_home`
ORDER BY `page_order`
ERROR - 2020-12-31 09:02:12 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 89
ERROR - 2020-12-31 09:02:30 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:02:30 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:03:27 --> Query error: Table 'aapp_web.statis_home' doesn't exist - Invalid query: SELECT *
FROM `statis_home`
ORDER BY `page_order`
ERROR - 2020-12-31 09:03:27 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 89
ERROR - 2020-12-31 09:04:25 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
WHERE `a`.`is_trash` = 1
AND `b`.`is_trash` = 1
ORDER BY `a`.`tanggal_posting` DESC
 LIMIT 3
ERROR - 2020-12-31 09:04:25 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 18
ERROR - 2020-12-31 09:12:48 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
ORDER BY `a`.`tanggal_posting` DESC
ERROR - 2020-12-31 09:12:48 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\models\Model.php 16
ERROR - 2020-12-31 09:15:31 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
ORDER BY `a`.`tanggal_posting` DESC
ERROR - 2020-12-31 09:15:31 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 25
ERROR - 2020-12-31 09:16:06 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `a`.`id_kat` = `b`.`id`
ERROR - 2020-12-31 09:16:06 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 24
ERROR - 2020-12-31 09:16:34 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_posting` `a`
LEFT JOIN `bucket_kategori` `b` ON `b`.`id` = `a`.`id_kat`
ORDER BY `a`.`tanggal_posting` DESC
ERROR - 2020-12-31 09:16:34 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 25
ERROR - 2020-12-31 09:17:31 --> Severity: error --> Exception: Call to undefined method Front_posting::modelMenuFront() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 09:18:14 --> Severity: error --> Exception: Call to a member function MenuFront() on null D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 09:18:48 --> Severity: error --> Exception: Call to a member function MenuFront() on null D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 09:19:08 --> Severity: error --> Exception: Call to a member function MenuFront() on null D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 67
ERROR - 2020-12-31 09:20:44 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:20:44 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:27:22 --> Query error: Table 'aapp_web.master_menu6' doesn't exist - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `b`.`judul`, `b`.`slug`
FROM `master_menu6` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:27:22 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:30:05 --> Query error: Table 'aapp_web.master_menu6' doesn't exist - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `b`.`judul`, `b`.`slug`
FROM `master_menu6` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:30:05 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:30:23 --> Query error: Table 'aapp_web.master_menu6' doesn't exist - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `b`.`judul`, `b`.`slug`
FROM `master_menu6` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`
ERROR - 2020-12-31 09:30:23 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:31:53 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `a`.`sort`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`
ERROR - 2020-12-31 09:31:53 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:32:10 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `a`.`sort`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:32:10 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:34:03 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `a`.`sort`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:34:03 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:34:28 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `a`.`sort`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:34:28 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:35:22 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `a`.`sort`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:35:22 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:36:06 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `a`.`sort`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort`
ERROR - 2020-12-31 09:36:06 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:36:21 --> Query error: Unknown column 'page_order' in 'order clause' - Invalid query: SELECT `a`.`custome_link`, `a`.`label`, `a`.`id`, `a`.`page_type`, `a`.`sort`, `b`.`judul`, `b`.`slug`
FROM `master_menu` `a`
LEFT JOIN `bucket_page` `b` ON `b`.`id` = `a`.`link`
WHERE `a`.`parent` =0
ORDER BY `page_order`, `sort` DESC
ERROR - 2020-12-31 09:36:21 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\models\ModelMenu.php 110
ERROR - 2020-12-31 09:37:48 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_kategori`
WHERE `id` = '55'
ERROR - 2020-12-31 09:37:48 --> Severity: error --> Exception: Call to a member function row() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 30
ERROR - 2020-12-31 09:37:49 --> 404 Page Not Found: /index
ERROR - 2020-12-31 09:37:49 --> 404 Page Not Found: /index
ERROR - 2020-12-31 09:37:49 --> 404 Page Not Found: /index
ERROR - 2020-12-31 09:37:50 --> 404 Page Not Found: /index
ERROR - 2020-12-31 09:39:10 --> Query error: Table 'aapp_web.statis_home' doesn't exist - Invalid query: SELECT *
FROM `statis_home`
ORDER BY `page_order`
ERROR - 2020-12-31 09:39:10 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 65
ERROR - 2020-12-31 09:40:10 --> Query error: Table 'aapp_web.statis_home' doesn't exist - Invalid query: SELECT *
FROM `statis_home`
ORDER BY `page_order`
ERROR - 2020-12-31 09:40:10 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 66
ERROR - 2020-12-31 09:41:00 --> Severity: error --> Exception: Call to undefined method Front_posting::menu() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 65
ERROR - 2020-12-31 09:41:35 --> Severity: error --> Exception: Call to undefined method Front_posting::menu() D:\xampp\htdocs\easy-ci\application\modules\front_posting\controllers\Front_posting.php 65
ERROR - 2020-12-31 09:42:01 --> Query error: Table 'aapp_web.bucket_kategori' doesn't exist - Invalid query: SELECT *
FROM `bucket_kategori`
WHERE `id` = '55'
ERROR - 2020-12-31 09:42:01 --> Severity: error --> Exception: Call to a member function row() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 30
ERROR - 2020-12-31 09:42:01 --> 404 Page Not Found: /index
ERROR - 2020-12-31 09:42:01 --> 404 Page Not Found: /index
ERROR - 2020-12-31 09:42:02 --> 404 Page Not Found: /index
ERROR - 2020-12-31 09:42:02 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:07:31 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:07:32 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:10:43 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:12:29 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:12:49 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:15:05 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:21:50 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:23:23 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:25:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:25:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:25:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:25:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:25:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:26:59 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:26:59 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:26:59 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:26:59 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:26:59 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:27:14 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:27:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:27:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:27:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:27:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:27:39 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:28:20 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:28:21 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:28:24 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:28:24 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:28:24 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:31:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:31:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:31:49 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:31:49 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:31:49 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:32:34 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:32:34 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:32:34 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:32:34 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:32:34 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:50:59 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:51:09 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:51:09 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:51:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:51:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:51:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:52:36 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:52:37 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:52:37 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:52:37 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:52:37 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:10 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:10 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:27 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:27 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:28 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:28 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:53:29 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:54:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:54:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:54:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:54:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:54:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:55:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:55:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:55:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:55:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:55:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:18 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:18 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:19 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:19 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:21 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:32 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:32 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:35 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:35 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:56:36 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:58:34 --> Query error: Table 'aapp_web.user' doesn't exist - Invalid query: SELECT *
FROM `user`
WHERE `id` IS NULL
ERROR - 2020-12-31 10:58:34 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 15
ERROR - 2020-12-31 10:58:49 --> Query error: Table 'aapp_web.user' doesn't exist - Invalid query: SELECT *
FROM `user`
WHERE `id` = '55'
ERROR - 2020-12-31 10:58:49 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 15
ERROR - 2020-12-31 10:59:10 --> Query error: Table 'aapp_web.user' doesn't exist - Invalid query: SELECT *
FROM `user`
WHERE `id` = '1'
ERROR - 2020-12-31 10:59:10 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 15
ERROR - 2020-12-31 10:59:34 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:59:35 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:59:36 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:59:37 --> 404 Page Not Found: /index
ERROR - 2020-12-31 10:59:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:00:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:00:12 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:00:13 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:00:13 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:00:13 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:02:10 --> Severity: error --> Exception: Call to undefined function ModelWaktuLalu() D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 16
ERROR - 2020-12-31 11:02:26 --> Severity: error --> Exception: Call to undefined function WaktuLalu() D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 16
ERROR - 2020-12-31 11:03:34 --> Severity: error --> Exception: Call to undefined method MY_Loader::WaktuLalu() D:\xampp\htdocs\easy-ci\application\modules\front_posting\views\main-all.php 16
ERROR - 2020-12-31 11:04:32 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:33 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:33 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:33 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:33 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:52 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:52 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:04:52 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:06:13 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:06:13 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:06:16 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:06:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:06:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:07:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:07:33 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:07:34 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:07:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:07:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:07:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:07:43 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:09:09 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:09:55 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:10:08 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:10:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:11:05 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:11:09 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:11:14 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:23:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:23:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:23:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:23:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:23:15 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:23:25 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:26:21 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:27:07 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:29:10 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:59:53 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 11:59:53 --> 404 Page Not Found: /index
ERROR - 2020-12-31 11:59:53 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:20:01 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:20:14 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:20:14 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:20:53 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:21:27 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:21:27 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:27 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:27 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:27 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:39 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:21:39 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:39 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:39 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:39 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:21:58 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:38:08 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:38:37 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:40:21 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:40:34 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:42:15 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:42:29 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:43:12 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:43:25 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:43:30 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:43:49 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:44:39 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:44:54 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:44:54 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:44:54 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:44:55 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:44:55 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:50 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:45:51 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:51 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:54 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:54 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:45:54 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:18 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:22 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:47:23 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:23 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:23 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:25 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:27 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:28 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 12:47:30 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:30 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:30 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:30 --> 404 Page Not Found: /index
ERROR - 2020-12-31 12:47:30 --> 404 Page Not Found: /index
ERROR - 2020-12-31 20:56:48 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:24:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:24:51 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 21:25:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:25:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:25:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:25:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:25:17 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:26:27 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 21:26:28 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:26:28 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:26:28 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:26:28 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:26:28 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:38 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 21:33:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:38 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:39 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:46 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 21:33:46 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:46 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:33:47 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:43:50 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 21:43:50 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO) D:\xampp\htdocs\easy-ci\application\modules\front_page\views\main.php 42
ERROR - 2020-12-31 21:44:02 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 21:44:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:03 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:24 --> Query error: Table 'aapp_web.array' doesn't exist - Invalid query: UPDATE Array SET `read` = 7
ERROR - 2020-12-31 21:44:25 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:25 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:25 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:25 --> 404 Page Not Found: /index
ERROR - 2020-12-31 21:44:25 --> 404 Page Not Found: /index
