<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'php_2_3lesson');
define('DB_DRIVER','mysql');

define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT . '/public');
define('DATA_DIR', SITE_ROOT . 'data');
define('LIB_DIR', SITE_ROOT . 'engine');
define('TPL_DIR', SITE_ROOT . 'templates');

define('SITE_TITLE', 'Занятие 3 курс PHP2');
define('IMG_BIG_DIR', '../img/600x450');
define('IMG_LIT_DIR', '../img/200x150');

//Константы ошибок
define('ERROR_NOT_FOUND', 1);
define('ERROR_TEMPLATE_EMPTY', 2);

//подключаем автозагрузчик библиотек
require_once(LIB_DIR . '/lib_autoload.php');