<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-02 08:08:24 --> Severity: Warning --> DOMDocument::loadHTML(): Tag section invalid in Entity, line: 1 D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 49
ERROR - 2020-11-02 08:08:24 --> Severity: Warning --> DOMDocument::loadHTML(): Tag section invalid in Entity, line: 4 D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 49
ERROR - 2020-11-02 08:08:24 --> Severity: Warning --> DOMDocument::loadHTML(): Tag section invalid in Entity, line: 11 D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 49
ERROR - 2020-11-02 08:08:24 --> Severity: Warning --> DOMDocument::loadHTML(): Tag section invalid in Entity, line: 22 D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 49
ERROR - 2020-11-02 11:30:54 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\views\view.php 15
ERROR - 2020-11-02 19:17:09 --> Query error: Unknown column 'a.newtab' in 'field list' - Invalid query: SELECT `a`.`id`, `a`.`link`, `a`.`label`, `a`.`id`, `a`.`sort`, `a`.`icon`, `a`.`parent`, `a`.`tipe`, `a`.`newtab`, `b`.`access_show`, `b`.`access_add`, `b`.`access_detail`, `b`.`access_edit`, `b`.`access_delete`
FROM `master_menu_administrator` `a`
LEFT JOIN `users_access2` `b` ON `b`.`users_menu_id` = `a`.`id`
LEFT JOIN `users` `c` ON `c`.`users_level_id` = `b`.`users_level_id`
WHERE `a`.`parent` =0
AND `c`.`id` = '1'
ORDER BY `sort`
ERROR - 2020-11-02 19:17:09 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\models\ModelMenu.php 42
ERROR - 2020-11-02 19:19:05 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:20:03 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:20:50 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:42 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:42 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:42 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:42 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:42 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:56 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:56 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:56 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:56 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:56 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:23:58 --> Query error: Table 'aapp_web.page_builder' doesn't exist - Invalid query: SELECT *
FROM `page_builder`
ERROR - 2020-11-02 19:23:58 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\mod_page_builder\controllers\Mod_page_builder.php 41
ERROR - 2020-11-02 19:30:53 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:30:53 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:30:53 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:30:53 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:30:53 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:31:05 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:31:05 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:31:17 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:31:17 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:31:18 --> 404 Page Not Found: /index
ERROR - 2020-11-02 19:31:50 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: DELETE FROM `page_builder`
WHERE `id` IS NOT NULL
ERROR - 2020-11-02 19:31:50 --> Query error: Unknown column 'source' in 'field list' - Invalid query: INSERT INTO `page_builder` (`page_url`, `source`, `page_order`, `status`) VALUES ('1_front_home/section1', '<section class=\"container\" style=\"margin-bottom: 25px\">\n        <div class=\"row\">\n            <div class=\"col-sm-12 ui-resizable\" data-type=\"container-content\"><div class=\"row\">\n        <div class=\"col-sm-6 ui-resizable\" data-type=\"container-content\"><div data-type=\"component-photo\">\n                <div class=\"photo-panel\" style=\"text-align: center;\">\n                    <img class=\"img-responsive img-circle\" height=\"\" src=\"snippets/img/sydney_australia_squared.jpg\" style=\"display: inline-block; height: 334px; width: 334px;\" width=\"100%\"></img>\n                </div>\n            </div></div>\n        <div class=\"col-sm-6 ui-resizable\" data-type=\"container-content\"><div data-type=\"component-text\">\n<h3>Lorem ipsum</h3>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestias eius quaerat, adipisci ratione aliquid eum explicabo illum temporibus? Optio facilis eveniet quam, impedit eos architecto sequi dolorum illo facere, consequatur sit voluptatibus sunt eius ad officia corrupti modi quia minima voluptas vero. Minus, maxime! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestias eius quaerat, adipisci ratione aliquid eum explicabo.</p>\n</div>\n</div>\n    </div></div>\n        </div>\n    </section>', 1, 1)
