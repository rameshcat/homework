<?php

$config = parse_ini_file('../config/config.ini',true);

// define site domain
define('SITE', $config['domain']);
define('BASE_PATH', dirname(__DIR__, 1));

// define DB configuration
$configDb = $config['db'];

define('DB_HOST', $configDb['host']);
define('DB_USER', $configDb['user']);
define('DB_PASS', $configDb['password']);
define('DB_NAME', $configDb['dbname']);
define('DB_PORT', $configDb['port']);
