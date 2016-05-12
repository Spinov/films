<?php
define('PATH_WWW', '');
define('PATH_LIB', dirname(__FILE__).'/lib');
define('PATH_TPL', dirname(__FILE__).'/templates');

session_start();

include_once PATH_LIB.'/functions.php';
include_once PATH_LIB.'/db.php';
include_once PATH_LIB.'/user.php';
