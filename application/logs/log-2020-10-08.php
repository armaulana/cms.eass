<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-10-08 21:39:07 --> Query error: Table 'aapp_web.bucket_blog' doesn't exist - Invalid query: SELECT *
FROM `bucket_blog`
WHERE `id_kat` = 54
AND `is_trash` = 1
ORDER BY `tanggal_posting` DESC
 LIMIT 4
ERROR - 2020-10-08 21:39:07 --> Severity: error --> Exception: Call to a member function result() on boolean D:\xampp\htdocs\aapp-web\application\modules\front_home\models\Model.php 23
