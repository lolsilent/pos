<?php
#!/usr/local/bin/php
/*
###_______________-=TheSilenT.CoM=-_______________###
Project name	: Project name
Script name	: Script name
Version		: 1.00
Release date	: 14-3-2010 0:10:14
Last Update	: 14-3-2010 0:10:14
Email		: admin@thesilent.com
Homepage	: http://www.thesilent.com
Created by	: TheSilent
Last modified by	: TheSilent
###_______________COPYRIGHT NOTICE_______________###
# Redistributing this software in part or in whole strictly prohibited.
# You may use and modified my software as you wish. 
# If you want to make money from my work please ask first. 
# By using this free software you agree not to blame me for any
# liability that might arise from it's use.
# In all cases this copyright notice and the comments above must remain intact.
# Copyright (c) 2001 TheSilenT.CoM.  All Rights Reserved.
###_______________COPYRIGHT NOTICE_______________###
*/

//include_once('script.css.php');

/*
$printer_port="ESDPRT001";
$printer_name="EPSON TM-T88IV Receipt";

exec("FoxitReader.exe -Noregister \"G:\pos\bon.pdf\" /t \"EPSON TM-T88IV Receipt\"", $output);
print_r($output);

*/

if (isset($workticket) || isset($attach)) {
print '<table><tr><td>';
if (isset($workticket) && !empty($workticket)) {
$table_name='';
if ($wwresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `id`='$workticket' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wwresults) >= 1) {
	if($working_row = mysql_fetch_object($wwresults)) {

	if (!empty($working_row->order_name)) {
	$table_name = ' TAFEL#'.$working_row->order_name;
	}
	}
	}
mysql_free_result($wwresults);
}
	print '<div class=borderz><a href="?orders&workticket='.$workticket.'" target="frame_orders">BON#'.$workticket.''.$table_name.'</a><div>';
}
print '</td><td>';
if (isset($attach) && !empty($attach)) {
	print '<div class=borderz>&&<div>';
}
print '</td></tr></table>';
}

if (isset($gins[$txt_commands[2]])) {
$txt_footer .= "<script language='Javascript'>\n q=prompt('".$txt_commands[2]."','');
document.location = '?products&q='+q+''; </script>";
}

$monitor_width = 13; //hoe breder de monitor hoe meer waarde
if (isset($gins['category_id']) && !empty($gins['category_id'])) {
if ($gins['category_id'] == 1) {
$monitor_width = 13; //hoe breder de monitor hoe meer waarde
}
if ($gins['category_id'] == 2) {
$monitor_width = 7; //hoe breder de monitor hoe meer waarde
}
if ($gins['category_id'] == 3) {
$monitor_width = 10; //hoe breder de monitor hoe meer waarde
}
if ($gins['category_id'] == 4) {
$monitor_width = 11; //hoe breder de monitor hoe meer waarde
}
if ($gins['category_id'] == 5) {
$monitor_width = 12; //hoe breder de monitor hoe meer waarde
}
if ($gins['category_id'] == 7) {
$monitor_width = 11; //hoe breder de monitor hoe meer waarde
}
}

if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
$monitor_width = 7; //hoe breder de monitor hoe meer waarde
}


$minimum_blocks = 3;
$limit = 1000;
$orderby='`sub_id` ASC, `id` ASC';
$whereis="`user_id`='$user_id'";

if(isset($gins['qm'])) {
	$monitor_width = 3;
	$disable_price=1;
if ($wresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='qm' ORDER BY `id` ASC LIMIT 1000")){
	$whereis='';
if (mysql_num_rows($wresults) >= 1) {
while($wrow = mysql_fetch_object($wresults)) {
if (isset($wrow->value)) {
$whereis .= (empty($whereis)?'':' OR ')."`product_name`='$wrow->value'";
//print $wrow->name.' '.$wrow->value;
}

}
mysql_free_result($wresults);
}
}
}elseif (!empty($gins['q'])) {
$whereis .= " AND (`product_name` LIKE CONVERT (_utf8 '%$q%' USING latin1) COLLATE latin1_swedish_ci OR `product_description` LIKE CONVERT (_utf8 '%$q%' USING latin1) COLLATE latin1_swedish_ci)";
include_once('admin/php.seekpad.php');
}elseif(!empty($gins['category_id'])) {
$whereis .= " && `category_id`='".$gins['category_id']."'";
}else{
$whereis .= " AND `product_hits` >= '1'";
$orderby ='`product_hits` DESC, `category_id` ASC, `product_timer` DESC';
$limit = 64;
//$monitor_width =3;

}

//print $whereis;

/*_______________-=TheSilenT.CoM=-_________________*/


//print $whereis;

	if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE ($whereis) ORDER BY $orderby LIMIT $limit")){
	$total_rowz=mysql_num_rows($presults);
		$wortel = round(sqrt($total_rowz));
		print '<table width=100% height=95% cellpadding=1 cellspacing=1><tr>';
		$j=0;$i=0;while ($prow = mysql_fetch_object($presults)) {

$tosend=(!isset($gins['category_id'])?$prow->product_hits.' ':'').((empty($prow->product_number)?'':$prow->product_number.'.<br> ').''.$prow->product_name.($prow->product_price<=0?'':(isset($disable_price)?'':'
<br>€'.$prow->product_price)).($prow->product_priceb<=0?'':(isset($disable_price)?'':'
<br>r€'.$prow->product_priceb)));

print '<td width="'.round(100/$monitor_width).'%" height="'.round(100/$wortel).'%" align="center" valign="center">';
//link image
print '<a href="?orders&'.(isset($attach) && $attach >= 1?'deattach='.$attach.'&aid':'product_id').'='.$prow->id.'" '.(!isset($gins['qm']) && !isset($attach)?'onclick="location.href=\'?products&deattach&category_id='.$prow->category_id.'\'"':'').' target=frame_orders class="';

/*_______________-=TheSilenT.CoM=-_________________*/
//CLASS
if (in_array($prow->id, $alertness)) {
print 'alert';
}else{

	print 's'.$prow->category_id;
	if (isset($category_id)) {
	print ($category_id>=1?($prow->sub_id>=1?$prow->sub_id:'0'):'');
	}

}
//CLASS

/*_______________-=TheSilenT.CoM=-_________________*/

print '">';

$but_size = '"100"';
$but_sizeh = '125';
if (!isset($gins['qm'])) {
if (file_exists('images/'.$prow->product_name.'.jpg')) {
print '<img src="images/'.$prow->product_name.'.jpg" title="'.$prow->product_name.'" alt="'.$prow->product_name.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_name.'.png')) {
print '<img src="images/'.$prow->product_name.'.png" title="'.$prow->product_name.'" alt="'.$prow->product_name.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_name.'.gif')) {
print '<img src="images/'.$prow->product_name.'.gif" title="'.$prow->product_name.'" alt="'.$prow->product_name.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_name.'.bmp')) {
print '<img src="images/'.$prow->product_name.'.bmp" title="'.$prow->product_name.'" alt="'.$prow->product_name.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_name.'.png')) {
print '<img src="images/'.$prow->product_name.'.tif" title="'.$prow->product_name.'" alt="'.$prow->product_name.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_name.'.tif')) {
print '<img src="images/'.$prow->product_name.'.tif" title="'.$prow->product_name.'" alt="'.$prow->product_name.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_number.'.jpg')) {
print '<img src="images/'.$prow->product_number.'.jpg" title="'.$prow->product_number.'" alt="'.$prow->product_number.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_number.'.png')) {
print '<img src="images/'.$prow->product_number.'.png" title="'.$prow->product_number.'" alt="'.$prow->product_number.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_number.'.gif')) {
print '<img src="images/'.$prow->product_number.'.gif" title="'.$prow->product_number.'" alt="'.$prow->product_number.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_number.'.bmp')) {
print '<img src="images/'.$prow->product_number.'.bmp" title="'.$prow->product_number.'" alt="'.$prow->product_number.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_number.'.png')) {
print '<img src="images/'.$prow->product_number.'.tif" title="'.$prow->product_number.'" alt="'.$prow->product_number.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}elseif (file_exists('images/'.$prow->product_number.'.tif')) {
print '<img src="images/'.$prow->product_number.'.tif" title="'.$prow->product_number.'" alt="'.$prow->product_number.'" border=0 width='.$but_size.' height='.$but_sizeh.'><br>';
}
}
//link image
print strtolower($tosend).'</a></td>';
$j++;$i++;if($j < $total_rowz AND $i >= $monitor_width AND $i >= $minimum_blocks) {$i=0;print '</tr><tr>';}
//print "$i $j $total_rowz $monitor_width";
		}
		mysql_free_result($presults);
		print '</tr></table>';
	}


?>