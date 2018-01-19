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
//if (!isset($gins['clients'])) {	validate_referer();}
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//print_r($gins);print_r($pins);

/*_______________-=TheSilenT.CoM=-_________________*/

if ($wresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='$user_id' ORDER BY `id` DESC LIMIT 1000")){
if (mysql_num_rows($wresults) >= 1) {
while($wrow = mysql_fetch_object($wresults)) {
if (isset($wrow->value)) {
//print (isset(${$wrow->name})?${$wrow->name}:'').' || '.$wrow->name.' = '.$wrow->value.'<br>';
${$wrow->name} = $wrow->value;
}

}
mysql_free_result($wresults);
}
}

/*_______________-=TheSilenT.CoM=-_________________*/
	if (isset($gins['attach'])) {
	
	$attachd = isset($gins['attach'])?$gins['attach']:'';
if ($wresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='$user_id' AND `name`='attach' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wresults) >= 1) {
	if($wrow = mysql_fetch_object($wresults)) {

mysql_query("UPDATE `$tbl_config` SET `value`='$attachd' WHERE `id`='$wrow->id' LIMIT 1") or die_nice(mysql_error().' update error ');
$attach = $attachd;
	}
	mysql_free_result($wresults);
}else{
		mysql_query("INSERT INTO `$tbl_config` values (NULL,'$user_id','attach','$attachd')") or die_nice(mysql_error().' insert error ');
		$attach = $attachd;
}

	}

}else{
if (isset($gins['deattach'])) {
mysql_query("UPDATE `$tbl_config` SET `value`='0' WHERE `user_id`='$user_id' AND `name`='attach' LIMIT 1") or die_nice(mysql_error().' update error ');
$attach = '';
}

if (isset($gins[$txt_commands[1]]) || isset($gins[$txt_commands[5]]) || isset($gins[$txt_commands[9]])) {
mysql_query("UPDATE `$tbl_config` SET `value`='0' WHERE `user_id`='$user_id' AND `name`='attach' LIMIT 1") or die_nice(mysql_error().' update error ');
$workticket ='';
}

}

/*_______________-=TheSilenT.CoM=-_________________*/

	if (isset($gins['workticket']) || isset($pins['workticket'])) {
	
if ($wresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='$user_id' AND `name`='workticket' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wresults) >= 1) {
	if($wrow = mysql_fetch_object($wresults)) {
mysql_query("UPDATE `$tbl_config` SET `value`='".(!empty($gins['workticket'])?$gins['workticket']:(!empty($pins['workticket'])?$pins['workticket']:''))."' WHERE `id`='$wrow->id' LIMIT 1") or die_nice(mysql_error().' update error ');
$workticket = !empty($gins['workticket'])?$gins['workticket']:$pins['workticket'];
	}
	mysql_free_result($wresults);
}else{
		mysql_query("INSERT INTO `$tbl_config` values (NULL,'$user_id','workticket','".(!empty($gins['workticket'])?$gins['workticket']:(!empty($pins['workticket'])?$pins['workticket']:''))."')") or die_nice(mysql_error().' insert error ');
		$workticket = $gins['workticket'];
}

	}
}else{
if (isset($gins[$txt_commands[1]]) || isset($gins[$txt_commands[5]]) || isset($gins[$txt_commands[9]])) {
//mysql_query("DELETE FROM `$tbl_config` WHERE (`user_id`='$user_id' AND `name`='workticket') LIMIT 1") or die_nice(mysql_error().' delete error ');
mysql_query("UPDATE `$tbl_config` SET `value`='' WHERE `user_id`='$user_id' AND `name`='workticket' LIMIT 1") or die_nice(mysql_error().' update error ');
$workticket ='';
}
}

/*_______________-=TheSilenT.CoM=-_________________*/

	//if (isset($gins[$txt_commands[11]]) || isset($gins[$txt_commands[12]])) {
/*	
if ($wresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='$user_id' AND `name`='priceab' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wresults) >= 1) {
	if($wrow = mysql_fetch_object($wresults)) {
$pab = (isset($gins[$txt_commands[11]])?'1':'0') || (isset($gins[$txt_commands[12]])?'0':'0');
//print $pab;
mysql_query("UPDATE `$tbl_config` SET `value`='$pab' WHERE `id`='$wrow->id' LIMIT 1") or die_nice(mysql_error().' update error ');
	$priceab = $pab;
	}
	mysql_free_result($wresults);
}else{
		mysql_query("INSERT INTO `$tbl_config` values (NULL,'$user_id','priceab','".(isset($gins[$txt_commands[11]])?'1':'0')."".(isset($gins[$txt_commands[12]])?'0':'0')."')") or die_nice(mysql_error().' insert error ');
$priceab = (isset($gins[$txt_commands[11]])?'1':'0');
}

	}
*/
//}else{
if (isset($gins[$txt_commands[1]]) || isset($gins[$txt_commands[5]]) || isset($gins[$txt_commands[9]])) {
//mysql_query("DELETE FROM `$tbl_config` WHERE (`user_id`='$user_id' AND `name`='priceab') LIMIT 1") or die_nice(mysql_error().' delete error ');
mysql_query("UPDATE `$tbl_config` SET `value`='0' WHERE `user_id`='$user_id' AND `name`='priceab' LIMIT 1") or die_nice(mysql_error().' update error ');
$priceab =0;
}
//}

/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($gins[$txt_commands[1]]) || isset($gins[$txt_commands[5]]) || isset($gins[$txt_commands[9]]) || empty($workticket)) {
//if (isset($workticket)) {
	unset($workticket);
//}
}

/*_______________-=TheSilenT.CoM=-_________________*/

$alertness=array();
if ($wresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='1' AND `name`='alert' ORDER BY `id` DESC LIMIT 1000")){
if (mysql_num_rows($wresults) >= 1) {
while($wrow = mysql_fetch_object($wresults)) {
if (isset($wrow->value)) {
$alertness[] = $wrow->value;
//print $wrow->name.' '.$wrow->value;
}

}
mysql_free_result($wresults);
}
}
/*_______________-=TheSilenT.CoM=-_________________*/
?><html><head><title><? print $kassa_title;?></title>
<style>
<?
require_once 'admin/script.css.php';
?>
</style>
<?
/*
<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.1)">
<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.1)">
*/
?>
</head><body<? if (isset($gins['orderpad'])) {?> onLoad="document.getElementById('pnumber').focus()"<?}?>><center>