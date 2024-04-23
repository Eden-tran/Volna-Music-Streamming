<?php

// // Đường dẫn tới hệ  thống
define('PATH_SYSTEM', __DIR__ . '/system');
session_start();
// session_destroy();
// // Lấy thông số cấu hình
require_once(PATH_SYSTEM . '/core/library/function.php');

// //mở file FT_Common.php, file này chứa hàm FT_Load() chạy hệ thống
require_once(PATH_SYSTEM . '/core/FT_Common.php');
if (file_exists(PATH_SYSTEM . '/config/config.php')) {
    require_once(PATH_SYSTEM . '/config/config.php');
    require_once(PATH_SYSTEM . '/db/connection.php');
    require_once(PATH_SYSTEM . '/db/database.php');
}
require_once(PATH_SYSTEM . '/model/model.php');
require_once(PATH_SYSTEM . '/model/user.php');
// var_dump($_POST);
// var_dump($_SESSION);
// var_dump($_FILES);
// print_r($_FILES);

// unset($_SESSION);
// unset($_POST);

// // Chương trình chính
FT_load();