<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Vozimsan\Core\Application\App;
use Vozimsan\Core\Application\Bootstrap;

$bootstrap = new Bootstrap(PROJECT_ROOT);

$bootstrap->init();