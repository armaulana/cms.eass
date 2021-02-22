<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-05 14:14:19 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_page_builder') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:14:19 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\models\MyModel.php 46
ERROR - 2020-11-05 14:14:38 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_album') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:14:38 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_album\models\MyModel.php 135
ERROR - 2020-11-05 14:17:01 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_page_builder') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:17:01 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\models\MyModel.php 46
ERROR - 2020-11-05 14:17:30 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_section_management') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:17:30 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_section_management\models\MyModel.php 144
ERROR - 2020-11-05 14:17:55 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_master_menu') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:17:55 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_master_menu\models\MyModel.php 113
ERROR - 2020-11-05 14:18:23 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_menu_admin') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:18:23 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_menu_admin\models\MyModel.php 45
ERROR - 2020-11-05 14:18:43 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_sett_prof_aplikasi') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:18:43 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_sett_prof_aplikasi\models\MyModel.php 153
ERROR - 2020-11-05 14:19:10 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_users') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:19:10 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_users\models\MyModel.php 139
ERROR - 2020-11-05 14:19:30 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: SELECT *
FROM `mainmenu`
ERROR - 2020-11-05 14:19:30 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_users\models\MyModel.php 109
ERROR - 2020-11-05 14:19:51 --> Severity: error --> Exception: Call to undefined method MyModel::menu_utama() D:\xampp\htdocs\aapp-web\application\modules\mod_users\controllers\Mod_users.php 48
ERROR - 2020-11-05 14:20:20 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_user_access') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:20:20 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_user_access\models\MyModel.php 122
ERROR - 2020-11-05 14:20:50 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:20:50 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:20:50 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:20:50 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:20:50 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:20:53 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                        LEFT JOIN mainmenu f
                        ON f.id_main = d.users_menu_id
                    WHERE e.link = 'mod_users_level') sub
                WHERE sub.id = 1;
ERROR - 2020-11-05 14:20:53 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_users_level\models\MyModel.php 151
ERROR - 2020-11-05 14:21:14 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: SELECT *
FROM `mainmenu`
ERROR - 2020-11-05 14:21:14 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_users_level\models\MyModel.php 120
ERROR - 2020-11-05 14:21:28 --> Severity: error --> Exception: Call to undefined method MyModel::menu_utama() D:\xampp\htdocs\aapp-web\application\modules\mod_users_level\controllers\Mod_users_level.php 47
ERROR - 2020-11-05 14:23:12 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_provinsi') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:23:12 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_provinsi\models\MyModel.php 147
ERROR - 2020-11-05 14:23:32 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:23:32 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:23:32 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:23:32 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:23:35 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_kota') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:23:35 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_kota\models\MyModel.php 116
ERROR - 2020-11-05 14:25:14 --> Severity: error --> Exception: Call to undefined method MyModel::check_allow_access() D:\xampp\htdocs\aapp-web\application\modules\mod_kota\controllers\Mod_kota.php 34
ERROR - 2020-11-05 14:25:51 --> Severity: error --> Exception: Call to undefined method MyModel::check_allow_access() D:\xampp\htdocs\aapp-web\application\modules\mod_kota\controllers\Mod_kota.php 34
ERROR - 2020-11-05 14:26:50 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_kecamatan') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:26:50 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_kecamatan\models\MyModel.php 132
ERROR - 2020-11-05 14:30:08 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:30:08 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:30:08 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:30:08 --> 404 Page Not Found: /index
ERROR - 2020-11-05 14:30:12 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_desa') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:30:12 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_desa\models\MyModel.php 157
ERROR - 2020-11-05 14:30:50 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                    LEFT JOIN mainmenu f
                    ON f.id_main = d.users_menu_id
                WHERE e.link = 'mod_desa') sub
            WHERE sub.id = 1;
ERROR - 2020-11-05 14:30:50 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_desa\models\MyModel.php 157
ERROR - 2020-11-05 14:35:31 --> Severity: Warning --> fopen(D:\xampp\htdocs\aapp-web\application\views): failed to open stream: No error D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 71
ERROR - 2020-11-05 14:35:31 --> Severity: Warning --> fwrite() expects parameter 1 to be resource, boolean given D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 73
ERROR - 2020-11-05 14:35:31 --> Severity: Warning --> fclose() expects parameter 1 to be resource, boolean given D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 74
ERROR - 2020-11-05 14:43:23 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:23 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:23 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:30 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:30 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:30 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:30 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:31 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:31 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:31 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:31 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:31 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:31 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:43:52 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:44:03 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:44:03 --> Severity: Warning --> strlen() expects parameter 1 to be string, array given D:\xampp\htdocs\aapp-web\system\helpers\file_helper.php 94
ERROR - 2020-11-05 14:45:13 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:50:08 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:50:11 --> Severity: Warning --> unlink(./application/views/1_front_home/test.tmp): No such file or directory D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 51
ERROR - 2020-11-05 14:50:29 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:52:00 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 14:54:05 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 17:33:12 --> 404 Page Not Found: ../modules/mod_page_builder/controllers/Mod_page_builder/snippets
ERROR - 2020-11-05 17:34:02 --> Severity: Warning --> unlink(./application/views/1_front_home/test1.tmp): No such file or directory D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 50
ERROR - 2020-11-05 17:57:32 --> Severity: Warning --> unlink(./application/views/1_front_home/1section.php): No such file or directory D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 66
ERROR - 2020-11-05 17:58:26 --> Severity: Warning --> unlink(./application/views/1_front_home/1section.php): No such file or directory D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 66
