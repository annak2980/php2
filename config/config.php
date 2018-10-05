<?php
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT . '/public');

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'php_8lesson');

define('DATA_DIR', SITE_ROOT . 'data');
define('LIB_DIR', SITE_ROOT . 'engine');
define('TPL_DIR', SITE_ROOT . 'templates');

define('SALT2', 'awOIHO@EN@Oine q2enq2kbkb');

define('SITE_TITLE', 'Интернет-магазин ноутбуков');

define('ERROR_NOT_FOUND', 1); //Константа ошибок

require_once(LIB_DIR . '/lib_autoload.php');

