<?php

$seticat=array();

if($gresult=mysql_query("SELECT `name`,`value` FROM `$tbl_config` WHERE `user_id`='css' ORDER BY `id` DESC LIMIT 100000")){
	while($grow=mysql_fetch_object($gresult)){
print $grow->name.' {'.$grow->value.'}';
	}
	mysql_free_result($gresult);
}

if ($cresults = mysql_query("SELECT `id`,`category_image` FROM `$tbl_categories` WHERE (`user_id`='$user_id') ORDER BY `id` ASC LIMIT 1000")){
	while ($crow = mysql_fetch_object($cresults)) {

css_draw('a',$crow,$crow,1);

if ($presults = mysql_query("SELECT `sub_id` FROM `$tbl_products` WHERE (`category_id`='$crow->id') ORDER BY `id` ASC LIMIT 1000")){
	while ($prow = mysql_fetch_object($presults)) {
		if (!isset($seticat[$crow->id.''.$prow->sub_id])) {
			css_draw('s',$crow,$prow,0);
			$seticat[$crow->id.''.$prow->sub_id]=$prow->sub_id;
		}
	}
	mysql_free_result($presults);
}
	}
	mysql_free_result($cresults);
}

/*_______________-=TheSilenT.CoM=-_________________*/

function css_draw($preappend,$crow,$prow,$onoff) {
	global $image_dir;
$bg='#';
while (strlen($bg) < 7) {
$bg .= (isset($prow->sub_id)?$prow->sub_id:$crow->id);
}
$co='#FFFFF';
while (strlen($co) < 7) {
$co .= (isset($prow->sub_id)?$prow->sub_id:$crow->id);
}
$br='#12345';
while (strlen($br) < 7) {
$br .= (isset($prow->sub_id)?$prow->sub_id:$crow->id);
}
print '.'.$preappend.''.$crow->id.''.(isset($prow->sub_id)?$prow->sub_id:'').' {border:2px '.substr($br,0,7).' solid;
';
if (!empty($crow->category_image) && $onoff > 0) {
if (preg_match('/^#/si',$crow->category_image)) {
	print 'background:'.substr($crow->category_image,0,7);
}else{
if (file_exists($image_dir.'/'.$crow->category_image.'.jpg')) {
print 'background-image:url(script.php?imagine&image='.$image_dir.'/'.$crow->category_image.'.jpg&text='.strtoupper($crow->category_image).');';
}else{
	print 'background:'.substr($bg,0,7).';';
}
}

}else{
	print 'background:'.substr($bg,0,7).';';
}
print 'width:100%;
height:100%;
font-weight:bold;
color:'.substr($co,0,7).';
vertical-align: middle;
text-align:center;}';
}

/*_______________-=TheSilenT.CoM=-_________________*/

?>