<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-04 06:53:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: 
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
                WHERE e.link = 'mod_subcribe') sub
            WHERE sub.id = ;
ERROR - 2020-11-04 06:53:53 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_subcribe\models\MyModel.php 125
ERROR - 2020-11-04 06:55:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: 
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
                WHERE e.link = 'mod_subcribe') sub
            WHERE sub.id = ;
ERROR - 2020-11-04 06:55:12 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_subcribe\models\MyModel.php 125
ERROR - 2020-11-04 06:55:44 --> 404 Page Not Found: /index
ERROR - 2020-11-04 06:56:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 19 - Invalid query: 
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
                WHERE e.link = 'mod_subcribe') sub
            WHERE sub.id = ;
ERROR - 2020-11-04 06:56:18 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_subcribe\models\MyModel.php 125
ERROR - 2020-11-04 06:59:17 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
ERROR - 2020-11-04 06:59:17 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\models\MyModel.php 46
ERROR - 2020-11-04 06:59:28 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                WHERE e.link = 'mod_page') sub
            WHERE sub.id = 1;
ERROR - 2020-11-04 06:59:28 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_page\models\MyModel.php 133
ERROR - 2020-11-04 07:00:18 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                WHERE e.link = 'mod_posting_category') sub
            WHERE sub.id = 1;
ERROR - 2020-11-04 07:00:18 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_posting_category\models\MyModel.php 134
ERROR - 2020-11-04 07:00:47 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: SELECT *
FROM `mainmenu`
ERROR - 2020-11-04 07:00:47 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_posting_category\models\MyModel.php 104
ERROR - 2020-11-04 07:01:32 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                WHERE e.link = 'mod_posting') sub
            WHERE sub.id = 1;
ERROR - 2020-11-04 07:01:32 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_posting\models\MyModel.php 134
ERROR - 2020-11-04 07:03:06 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
                WHERE e.link = 'mod_album_name') sub
            WHERE sub.id = 1;
ERROR - 2020-11-04 07:03:06 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_album_name\models\MyModel.php 131
ERROR - 2020-11-04 07:03:45 --> Severity: error --> Exception: Call to undefined method MyModel::menu_utama() D:\xampp\htdocs\aapp-web\application\modules\mod_album_name\controllers\Mod_album_name.php 48
ERROR - 2020-11-04 07:04:10 --> Query error: Table 'aapp_web.mainmenu' doesn't exist - Invalid query: 
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
ERROR - 2020-11-04 07:04:10 --> Severity: error --> Exception: Call to a member function result_array() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_album\models\MyModel.php 141
