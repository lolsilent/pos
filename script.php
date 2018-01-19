<?php
#!/usr/local/bin/php
require_once('admin/www.config.php');
require_once('admin/www.mysql.php');
require_once('admin/www.functions.php');
require_once('admin/www.html.php');

//validate_referer();

if (isset($gins['css'])) {
require_once 'admin/script.css.php';
}

if (isset($gins['clock'])) {
require_once 'admin/script.clock.php';
}

if (isset($gins['imagine'])) {
require_once 'admin/php.imagine.php';
}

if (isset($gins['ajax'])) {
require_once 'admin/script.ajax.php';
}

if (isset($gins['gd'])) {
require_once 'admin/php.gd.php';
}
?>