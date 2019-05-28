<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("APP", ROOT.'/app');
define("CORE", ROOT.'/vendor/myshop/core');
define("LIBS",ROOT.'/vendor/myshop/core/libs');
define("WEB", ROOT.'/public');
define("CACHE", ROOT.'/tmp/cache');
define("CONFIG", ROOT.'/config');
define("LAYOUT", 'default');

$_SERVER['HTTPS'] == 'on' ? $protocol = 'https://' : $protocol = 'http://';

define("HOME_PAGE", $protocol . $_SERVER['SERVER_NAME']);
define("ADMIN_PAGE", $protocol . $_SERVER['SERVER_NAME'] . '/admin');

require_once ROOT.'/vendor/autoload.php';