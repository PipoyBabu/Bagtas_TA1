<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Force development environment so errors are never masked by "Whoops!"
defined('CI_ENVIRONMENT') || define('CI_ENVIRONMENT', 'development');

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

require FCPATH . 'app/Config/Paths.php';
$paths = new Config\Paths();

require $paths->systemDirectory . '/Boot.php';

exit(CodeIgniter\Boot::bootWeb($paths));
