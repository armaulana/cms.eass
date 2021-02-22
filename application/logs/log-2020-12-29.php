<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-12-29 07:40:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: 
            SELECT *
            FROM (SELECT
                    a.id,
                    `d`.`access_show`,
                    `d`.`access_add`,
                    `d`.`access_detail`,
                    `d`.`access_edit`,
                    `d`.`access_delete`
                FROM users a
                    LEFT JOIN users_groups b
                    ON b.user_id = a.id
                    LEFT JOIN groups c
                    ON c.id = a.users_level_id
                    LEFT JOIN users_access2 d
                    ON d.users_level_id = a.users_level_id
                    LEFT JOIN master_menu_administrator e
                    ON e.id = d.users_menu_id
                WHERE e.link = 'mod_kecamatan') sub
            WHERE sub.id = ;
ERROR - 2020-12-29 07:40:04 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\easy-ci\application\modules\mod_kecamatan\models\MyModel.php 149
ERROR - 2020-12-29 07:42:18 --> 404 Page Not Found: /index
ERROR - 2020-12-29 07:42:18 --> 404 Page Not Found: /index
ERROR - 2020-12-29 07:42:18 --> 404 Page Not Found: /index
ERROR - 2020-12-29 07:42:18 --> 404 Page Not Found: /index
ERROR - 2020-12-29 07:42:18 --> 404 Page Not Found: /index
ERROR - 2020-12-29 07:42:25 --> 404 Page Not Found: /index
ERROR - 2020-12-29 07:42:25 --> 404 Page Not Found: /index
ERROR - 2020-12-29 07:42:25 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:37:40 --> Severity: error --> Exception: syntax error, unexpected '}' D:\xampp\htdocs\easy-ci\application\modules\mod_kota\controllers\Mod_kota.php 135
ERROR - 2020-12-29 09:37:54 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file D:\xampp\htdocs\easy-ci\application\modules\mod_kota\controllers\Mod_kota.php 240
ERROR - 2020-12-29 09:41:30 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:41:30 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:41:31 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:41:31 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:42:08 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:42:08 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:42:08 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:42:08 --> 404 Page Not Found: /index
ERROR - 2020-12-29 09:42:08 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:39 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:39 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:40 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:55 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:55 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:55 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:55 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:55 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:04:55 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:05:56 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:05:56 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:05:56 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:05:56 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:05:56 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:05:56 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:07:28 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:07:28 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:07:28 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:07:28 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:07:28 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:07:28 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:25 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:26 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:26 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:26 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:57 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:57 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:57 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:57 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:57 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:12:58 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:23 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:27 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:48 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:48 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:48 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:13:48 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:14:02 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:14:02 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:14:02 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:14:03 --> 404 Page Not Found: /index
ERROR - 2020-12-29 11:14:03 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:11:38 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:11:38 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:11:39 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:11:39 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:11:39 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:11:47 --> Severity: error --> Exception: Call to a member function post() on null D:\xampp\htdocs\easy-ci\application\modules\mod_kecamatan\controllers\Mod_kecamatan.php 145
ERROR - 2020-12-29 13:11:55 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:12:11 --> Severity: error --> Exception: Call to a member function post() on null D:\xampp\htdocs\easy-ci\application\modules\mod_kecamatan\controllers\Mod_kecamatan.php 145
ERROR - 2020-12-29 13:15:59 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:00 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:00 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:00 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:00 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:36 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:36 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:36 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:36 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:16:36 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:18:07 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:18:07 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:18:07 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:18:07 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:18:07 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:02 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:02 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:02 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:03 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:03 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:25 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:25 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:25 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:26 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:19:26 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:21:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:21:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:21:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:21:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:21:22 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:22:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:22:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:22:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:22:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:22:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:23:49 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:23:49 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:23:49 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:23:50 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:24:36 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:24:37 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:25:45 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:25:45 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:25:45 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:25:46 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:25:46 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:26:38 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:26:38 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:26:38 --> 404 Page Not Found: /index
ERROR - 2020-12-29 13:26:38 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:07:42 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:07:42 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:07:42 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:07:42 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:07:43 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:07:43 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:17 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:17 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:17 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:17 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:17 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:31 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:31 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:31 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:09:31 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:19:58 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:19:58 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:31:53 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:31:54 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:31:54 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:31:54 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:33:31 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:33:32 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:33:32 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:33:32 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:50:11 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:50:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 15:50:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 18:03:39 --> 404 Page Not Found: /index
ERROR - 2020-12-29 18:04:11 --> 404 Page Not Found: /index
ERROR - 2020-12-29 18:04:51 --> 404 Page Not Found: /index
ERROR - 2020-12-29 18:06:23 --> 404 Page Not Found: /index
ERROR - 2020-12-29 18:06:56 --> 404 Page Not Found: /index
ERROR - 2020-12-29 18:07:16 --> 404 Page Not Found: /index
ERROR - 2020-12-29 19:18:06 --> 404 Page Not Found: /index
ERROR - 2020-12-29 19:19:12 --> 404 Page Not Found: /index
ERROR - 2020-12-29 19:20:04 --> 404 Page Not Found: /index
