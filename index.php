<?php
#!/usr/local/bin/php

$poskey = '1793qwe';
if (isset($_POST['poskey']) && !empty($_POST['poskey'])) {
$poskey = $_POST['poskey'];
setcookie("poskey", $poskey, time()+(86400*360));  /* expire in 1 year */
}

if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {

if (!isset($_COOKIE['poskey']) || empty($_COOKIE['poskey'])) {
$stopit=1;
}elseif ($_COOKIE['poskey'] !== $poskey) {
$stopit=2;
}

if (isset($stopit)) {
print 'Access denied!<br>'; 
print '<form method=post action="\" target="_top">wachtwoord <input type=password name=poskey><input type=submit></form>';
print '<br><br><a href="http://isushi.nl">www.isushi.nl</a>';
exit;
}

} else {}

if (isset($_SERVER['HTTP_REFERER']) and preg_match("/bank/si",$_SERVER['HTTP_REFERER'])) {
exit;
}

require_once('admin/www.config.php');
require_once('admin/www.mysql.php');
require_once('admin/www.functions.php');
require_once('admin/www.html.php');

if (empty($gins)) {
include_once($array_files['frames']);exit;
}elseif (isset($gins['ajax'])) {
include_once($array_files['ajax']);exit;
}elseif (isset($gins['clients_frame'])) {
include_once($array_files['clients_frame']);exit;
}else{

foreach ($array_files as $key=>$val) {
if (isset($gins[$key])) {
	//print $key.' '.$val;
include_once('admin/html.header.php');
//print_r($gins);
include_once($val);
include_once('admin/html.footer.php');
break;
}
}
}

//print_r($gins);
?>