<?php
#!/usr/local/bin/php

/* deprecated
if (!$result = mysql_list_tables($cfg->mysql['main'])) {
$result = mysql_list_tables($cfg->mysql['mainb']);
}
*/
/*deprecated
$num_rows = mysql_num_rows($result);
for ($i = 0; $i < $num_rows; $i++) {
$table_name = mysql_tablename($result, $i);
$cfg->mysql_tables[preg_replace("/^.*?_/si","",$table_name)] = $table_name;
}
mysql_free_result($result);
*/


if (!$result = mysql_query("SHOW TABLES FROM ".$cfg->mysql['main'])) {
$result = mysql_query("SHOW TABLES FROM ".$cfg->mysql['mainb']);
}

while ($row = mysql_fetch_row($result)) {
$cfg->mysql_tables[preg_replace("/^.*?_/si","",$row[0])] = $row[0];
//echo "Table: {$row[0]}<br>";
}

mysql_free_result($result);




print '<table><tr><td valign=top><table>';
foreach ($cfg->mysql_tables as $key=>$val) {
print '<tr><th><a href="?define='.$key.'">'.$key.'</a></th></tr>';
}
print '<form method=post><tr><th><input type=text name=q value="'.(empty($pins['q'])?'':$pins['q']).'"></th></tr><tr><th><input type=submit name=action value="ZOEKEN"></th></tr></form></table></td><td td valign=top>';

if (empty($gins['define'])) {
$gins['define'] = 'products';
}
if (in_array($gins['define'],array_keys($cfg->mysql_tables))) {
mysql_modify($cfg->mysql_tables[$gins['define']],array('id'));
}else{
die_nice('key error');
}
//'id','user_id','sytem_id','category_timer','timer'
print '</td></tr></table>';
/*_______________-=TheSilenT.CoM=-_________________*/

function mysql_modify($tbl_in,$ignorethiz) {
	global $pins,$gins,$cins;
	$new_name='NEW';
	$new_name='NEW';
	$workid='id';
	$inserto = array();
	$txt_used = array('NIEUW','VERANDEREN','VERWIJDEREN');

if (!empty($pins['q'])) {
$query_this = "SELECT * FROM `$tbl_in` WHERE 
(`product_name` LIKE CONVERT (_utf8 '%".$pins['q']."%' USING latin1) COLLATE latin1_swedish_ci OR `product_description` LIKE CONVERT (_utf8 '%".$pins['q']."%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY `id` DESC LIMIT 100000";
}elseif (!empty($pins['id']) && $pins['action'] !== $txt_used[2]) {
$query_this = "SELECT * FROM `$tbl_in` WHERE (`id`>=".($pins['id']-5).") ORDER BY `id` ASC LIMIT 100000";
}else{
$query_this = "SELECT * FROM `$tbl_in` ORDER BY ".(preg_match("/config/",$tbl_in)?'`user_id` ASC, ':'')."`id` DESC LIMIT 100000";
}

/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($pins[$workid])) {
$query_thisb = "SELECT * FROM `$tbl_in` WHERE ".(($pins[$workid] !== $new_name)?"`id`='".$pins[$workid]."'":'`id`')." ORDER BY `id` DESC LIMIT 100000";
if($result=mysql_query($query_thisb)){
	if($row=mysql_fetch_object($result)){
	mysql_free_result($result);
	foreach ($row as $key=>$val) {
		if (isset($pins[$key])) {
		if ($pins[$workid] == $new_name) {
			$inserto[$key] = $pins[$key];
			//print $pins[$key];
		}elseif($pins[$workid] == $row->id) {
			$inserto[$key] = $pins[$key];
			//print $pins[$key];
		}else{
		}
		}else{
			$inserto[$key] = '';
		}
	}
}


if (isset($inserto)) {
$inorup='';
foreach ($inserto as $key=>$val) {
if (!empty($inorup)) {
	$inorup .= ', ';
}
if ($key == 'user_id') {
	$val = $GLOBALS['user_id'];
}
if ($key == 'system_id') {
	$val = $system_id;
}
if ($pins[$workid] == $new_name) {
	$inorup .= "'$val'";
}else{
	$inorup .= "`$key`='$val'";
}
}
	if ($pins[$workid] == $new_name && $pins['action'] == $txt_used[0]) {
		mysql_query("INSERT INTO `$tbl_in` values ($inorup)") or die_nice(mysql_error().' insert error ');
	} elseif($pins['action'] == $txt_used[1]) {
		mysql_query("UPDATE `$tbl_in` SET $inorup WHERE `id`='$row->id' LIMIT 1") or die_nice(mysql_error().' update error ');
	} elseif($pins['action'] == $txt_used[2]) {
		mysql_query("DELETE FROM `$tbl_in` WHERE (`id`='$row->id') LIMIT 1") or die_nice(mysql_error().' delete error ');
	}
//print $inorup;
//print_r($inserto);
}

}
}
/*_______________-=TheSilenT.CoM=-_________________*/


if($result=mysql_query($query_this)){
	print '<table>';

if (mysql_num_rows($result) <= 0) {
mysql_query("INSERT INTO `$tbl_in` values ()") or die_nice(mysql_error().' insert error ');
}

	while($row=mysql_fetch_object($result)){
		if(!isset($kip)) {
		print '<tr><form method=post><input type=hidden name=q value="'.(empty($pins['q'])?'':$pins['q']).'"><input type=hidden name='.$workid.' value="'.$new_name.'">';
		foreach ($row as $key=>$val) {
			if (!in_array($key,$ignorethiz)) {
				//preg_replace("/^.*?_/si","",$key)
		print '<th>'.$key.'<br><input type=text name="'.$key.'" value="'.(isset($pins[$key])?$pins[$key]:'').'"></th>';
			}
		}$kip=1;
		print '<th><br><input type=submit name=action value="'.$txt_used[0].'"></th></form></tr>';
		}


		print '<tr><form method=post><input type=hidden name=q value="'.(empty($pins['q'])?'':$pins['q']).'"><input type=hidden name='.$workid.' value="'.$row->id.'">';
		foreach ($row as $key=>$val) {

			if (!in_array($key,$ignorethiz)) {
		print '<td><input type=text name="'.$key.'" value="'.$val.'"></td>';
			}
		}
		print '<td><input type=submit name=action value="'.$txt_used[1].'"></td><td><input type=submit name=action value="'.$txt_used[2].'"></td></form></tr>';
	}
	mysql_free_result($result);
	print '</table>';
}

}

/*_______________-=TheSilenT.CoM=-_________________*/


?>