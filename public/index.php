<?php

use App\App;

const DS = DIRECTORY_SEPARATOR;
define('PATH_ROOT', dirname(__DIR__) . DS);

require_once PATH_ROOT . 'vendor/autoload.php';

App::getApp()->start();