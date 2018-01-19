<?php
#!/usr/local/bin/php

$tablestaken=array();
if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `user_id`='$restaurant_user_id' AND `order_name`!='' ORDER BY `id` ASC LIMIT 1000")){
	while ($orow = mysql_fetch_object($oresults)) {
if (!empty($orow->order_name)) {
$tablestaken[]=$orow->order_name;
}
	}
	mysql_free_result($oresults);
}
/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($workticket) || isset($attach)) {
print '<table><tr><td>';
if (isset($workticket) && !empty($workticket)) {
$table_name='';
if ($wwresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `id`='$workticket' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wwresults) >= 1) {
	if($working_row = mysql_fetch_object($wwresults)) {
$table_name = ' TAFEL#'.$working_row->order_name;
	}
	}
mysql_free_result($wwresults);
}
	print '<div class=borderz>BON#'.$workticket.''.$table_name.'<div>';
}
print '</td><td>';
if (isset($attach) && !empty($attach)) {
	print '<div class=borderz>&&<div>';
}
print '</td></tr></table>';
}
/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($floormap)) {

$defineds= array();
/*_______________-=TheSilenT.CoM=-_________________*/
function table_status ($table_number,$table_xy,$table_persons,$table_color) {
global $tbl_orders,$defineds;

$table_status ='<a href="?tafels&tablenaam&tablenum='.$table_number.'"><img src="script.php?gd=1&persons='.$table_persons.'&align='.$table_xy.'&color='.$table_color.'&itext='.$table_number.'"></a>';

if ($cresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `order_name`!='' AND `order_status`<4 ORDER BY `order_name` DESC LIMIT 10000")){
	if (mysql_num_rows($cresults) >= 1) {
	
	while($crow = mysql_fetch_object($cresults)) {
if (preg_match("/^$table_number /sim",$crow->order_name) or $table_number == $crow->order_name) {
//$table_status ='<a href="?tafels&tablenaam&tablenum='.$table_number.'"><img src="script.php?gd=1&persons='.$table_persons.'&align='.$table_xy.'&tcolor='.$crow->order_status.'&itext='.$crow->order_name.'">'.$crow->order_name.'</a>';
$table_status ='<a href="?orders&workticket='.$crow->id.'&open_table='.$table_number.'" target="frame_orders"><img src="script.php?gd=1&persons='.$table_persons.'&align='.$table_xy.'&tcolor='.$crow->order_status.'&itext='.$crow->order_name.'"></a>';

//$defineds[]=$crow->order_name;
//(!in_array($crow->order_name,$defineds)?$crow->order_name:'')

//print $crow->order_name.' '.$crow->order_status.'<br>';
break;
}
//print $crow->order_name.' '.$crow->order_status.'<br>';
	}
mysql_free_result($cresults);
	}
}

return $table_status;

}
/*_______________-=TheSilenT.CoM=-_________________*/
//<style>table, tr, th, td{border:1px solid red;}</style>

print '

<table border=0 cellpadding=0 cellspacing=0 background="/img/eiken.jpg">
<tr>
<td colspan=2 align=right><table><tr><td>'.table_status (11,'y',2,'').'</td><td><img src="/img/55.png" width=20></td></tr></table></td>

<td>'.table_status (12,'x',2,'').''.table_status (12,'x',2,'').'</td>
<td width=50> </td>
<td>'.table_status (13,'x',2,'').''.table_status (13,'x',2,'').'</td>
</tr>
<tr><td colspan=10 height=50> </td></tr>
<tr>

<td>'.table_status (18,'x',2,'').''.table_status (19,'x',2,'').'</td>
<td width=90> </td>
<td>'.table_status (17,'x',2,'').''.table_status (17,'x',2,'').'</td>
<td width=50> </td>
<td><table><tr><td>'.table_status (14,'y',2,'').'</td><td>'.table_status (14,'y',2,'').'</td></tr></table></td>
</tr>
<tr><td colspan=10 height=50> </td></tr>
<tr>

<td>'.table_status (20,'x',2,'').''.table_status (20,'x',2,'').'</td>
<td width=90> </td>
<td>'.table_status (16,'x',2,'').''.table_status (16,'x',2,'').'</td>
<td width=50> </td>
<td><table><tr><td>'.table_status (15,'y',2,'').'</td><td>'.table_status (15,'y',2,'').'</td></tr></table></td>
</tr>
<tr><td colspan=10 height=50> </td></tr>
<tr>

<td colspan=10 ><table><tr><td width=20></td><td>'.table_status ('B1','y',1,'').'</td><td width=10></td><td>
'.table_status ('B2','y',1,'').'</td><td width=10></td><td>
'.table_status ('b3','y',1,'').'</td><td width=10></td><td>
'.table_status ('b4','y',1,'').'</td></tr></table>
</tr>

</table>

</td><td bgcolor=white></td></tr>
<tr><td bgcolor=white width=5></td><td height=5 bgcolor=white></td><td bgcolor=white width=5></td></tr>
</table>
';
/*

print '
<table border=0 cellpadding=0 cellspacing=0>
<tr><td bgcolor=white width=3></td><td height=3 bgcolor=white></td><td bgcolor=white width=3></td></tr>
<tr><td bgcolor=white></td><td>

<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td valign=top><table><tr><td><img src="img/black.jpg" width=25></td><td>
'.table_status (2,'x',2,'').'
'.table_status (2,'x',2,'').'
</td></tr><tr><td colspan=2>
<table><tr><td>
'.table_status (1,'y',2,'').'</td><td>
'.table_status (1,'y',2,'').'</td></tr></table>
</td></tr></table></td>
<td valign=top><img src="img/black.jpg" height=3>
'.table_status (3,'x',2,'').'
'.table_status (3,'x',2,'').'</td>
<td width=3 valign=top><img src="img/white.jpg" height=130 width=3></td>
<td valign=top>
'.table_status (4,'x',2,'').'
'.table_status (4,'x',2,'').'
'.table_status (4,'x',2,'').'</td>
<td valign=top><img src="img/black.jpg" height=3>
'.table_status (5,'x',2,'').'
'.table_status (5,'x',2,'').'</td>
<td valign=top><img src="img/black.jpg" height=3>
'.table_status (6,'x',2,'').'
'.table_status (6,'x',2,'').'</td>
<td valign=top> </td>
<td valign=top> </td>
</tr>

<tr>
<td height=3></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr><td valign=center><table><tr><td><img src="img/black.jpg" height=10></td><td>
'.table_status (7,'y',2,'').'</td></tr></table>
</td>
<td valign=top><table><tr><td>
'.table_status (9,'y',2,'').'</td><td>
'.table_status (9,'y',2,'').'</td></tr></table>
<table><tr><td>
'.table_status (8,'y',2,'').'</td><td>
'.table_status (8,'y',2,'').'</td></tr></table></td>
<td width=18 valign=bottom><img src="img/white.jpg" height=220 width=3></td>
<td valign=top>
'.table_status (10,'y',2,'').'
'.table_status (11,'y',2,'').'
</td>
<td valign=top colspan=2>
<table><tr>
<td>'.table_status ('B1','y',1,'').'</td>
<td>'.table_status ('B2','y',1,'').'</td>

</tr></table>
</td>
<td valign=top>
<img src="img/black.jpg" width=15>
</td>
<td valign=top>
<table><tr>
<td>'.table_status ('B6','y',1,'').'</td>
<td>'.table_status ('B7','y',1,'').'</td>


</tr></table>
</td>
<td valign=top>
</td></tr>
</table>

</td><td bgcolor=white></td></tr>
<tr><td bgcolor=white width=5></td><td height=5 bgcolor=white></td><td bgcolor=white width=5></td></tr>
</table>
';
*/
/*
print '<table><tr>';
$tablebr=array(15,10,6,4,2);
$tabledis=array(12);
for ($i=19;$i>=1;$i--) {
if (!in_array($i,$tabledis)) {
print '<td><a href="?tafels&tablenaam&tablenum='.$i.'"><img src="script.php?gd&4p&itext='.$i.'"></a></td>';
if (in_array($i,$tablebr)) {
print '</tr><tr>';
}
}
}

for ($i=1;$i<=8;$i++) {
if (!in_array($i,$tabledis)) {
print '<td><a href="?tafels&tablenaam&tablenum='.$i.'"><img src="script.php?gd=1&2p&itext='.$i.'"></a></td>';
if (in_array($i,$tablebr)) {
print '</tr><tr>';
}
}
}
print '</tr></table>';
*/

}

/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($gins['tablenaam']) && isset($gins['tablenum']) && $gins['tablenaam'] !== 'null' && !empty($gins['tablenaam'])) {

mysql_query("INSERT INTO `$tbl_orders` values (NULL, '','".$gins['tablenum'].' '.$gins['tablenaam']."','0','1','0.00','0.00','0','$restaurant_user_id','$current_date $current_clock','$current_time')") or die(mysql_error().'insert 111');
$workticket=mysql_insert_id();
mysql_query("UPDATE `$tbl_config` SET `value`='$workticket' WHERE `name`='workticket' LIMIT 1") or die_nice(mysql_error().' update error ');
				?><SCRIPT language="JavaScript">
<!--
top.frames['frame_products'].location.replace='?products&category_id=3';
top.frames['frame_orders'].location.replace='?orders&workticket=<?print $workticket;?>';
//-->
</SCRIPT><?
}

if (isset($gins['tablenaam']) && isset($gins['tablenum']) && !isset($settled)) {
$txt_footer .= "<script language='Javascript'>\n tablenaam=prompt('TAFEL NUMMER, TAFEL NAAM EN/OF TAFEL OMSCHRIJVING OPGEVEN.',''); document.location = '?tafels&tablenaam='+tablenaam+'&tablenum=".$gins['tablenum']."&settled=1'; </script>";


}



function table_open($in) {
	
}



print '<table width=100%><tr>';
print '<td height=50><a href="?tafels&tablenaam&tablenum" class=rticket>Tafel Openen</a></td>';
$max_rows=5;
//(`user_id`='$user_id' or `user_id`='$inet_user_id' or `user_id`='$restaurant_user_id')
if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `user_id`='$restaurant_user_id' AND `order_status`<4 ORDER BY `id` DESC LIMIT 1000")){
	//`order_status` ASC, `order_name` ASC
		$i=1;while ($orow = mysql_fetch_object($oresults)) {$i++;
ticket_numbers($orow,'tafels',1);
			if ($i>=$max_rows) {$i=0;
				print '</tr><tr>';
			}
		}
		mysql_free_result($oresults);
}
print '</tr></table>';


/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($workticket)) {
	$tosend_query = "SELECT * FROM `$tbl_orders` WHERE (`id`='$workticket') ORDER BY `id` DESC LIMIT 1";
	$to_work='workticket='.$workticket;
}else{
	$tosend_query = "SELECT * FROM `$tbl_orders` WHERE `user_id`='$restaurant_user_id' ORDER BY `id` DESC LIMIT 1000";
	$to_work='';
}

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
/*_______________-=TheSilenT.CoM=-_________________*/

	if ($oresults = mysql_query($tosend_query)){
		if (mysql_num_rows($oresults) <= 0) {//incase of first order
			orders_new_order($user_id);
			$oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT 1");
		}

			$i=0;while ($orow = mysql_fetch_object($oresults)) {

$total_cost = array(0,0,0,0,0);
$total_products = 0;
print '<table width=100% cellpadding=1 cellspacing=1><tr class="navy"><td colspan=2><a onclick="return confirm(\'#'.$orow->id.' afdrukken?\')"  href="?orders&reprint='.$orow->id.'" target="frame_orders">#'.$orow->id.'</a></td><td colspan=2 align=right>'.$orow->order_dater.'</td></tr>';

if (!isset($borders)) {$borders=" class=\"borderz\"";}else{$borders='';}
				if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` ASC LIMIT 1000")){
				while ($irow = mysql_fetch_object($iresults)) {
	//print_r($irow);
					if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$irow->product_id') ORDER BY `id` DESC LIMIT 10")){
						while ($prow = mysql_fetch_object($presults)) {
							if ($prow->product_price <= 0 and $irow->price >= 0.01) {
								$prow->product_price=$irow->price;
							}
							$product_price = ($prow->product_price*$irow->amount);

if (empty($bgcolor)) {$bgcolor=" class=\"navy\"";} else {$bgcolor="";}

print '<tr'.$bgcolor.'>
<td width="20"'.$borders.' NOWRAP>'.(isset($plusmin)?'':'<a href="?orders&product_id='.$prow->id.'&amount='.$irow->amount.(!empty($to_work)?'&'.$to_work:'').'" class="active" target="frame_orders">').$irow->amount.(isset($plusmin)?'':'</a>').'</td><td valign=center>x</td><td'.$borders.'>'.(isset($plusmin)?'':'<a href="?orders&product_id='.$prow->id.(!empty($to_work)?'&'.$to_work:'').'" target="frame_orders">').(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name).(isset($plusmin)?'':'</a>').'</td>';


print '<td align=right'.$borders.'>'.(isset($plusmin)?'':'<a href="?orders&dproduct_id='.$prow->id.(!empty($to_work)?'&'.$to_work:'').'" target="frame_orders">').'€'.number_format($product_price,2,',','.').(isset($plusmin)?'':'</a>').'</td>';

$total_cost[0] += $product_price;
$total_products += $irow->amount;
							if ($prow->product_tax == 1 ) {
								$total_cost[1] += ($product_price/(100+$taxes[1]))*$taxes[1];
								$total_cost[3] += ($product_price/(100+$taxes[1]))*100;
							}
							if ($prow->product_tax == 2 ) {
								$total_cost[2] += ($product_price/(100+$taxes[2]))*$taxes[2];
								$total_cost[4] += ($product_price/(100+$taxes[2]))*100;
							}

print '</tr>';
						}
						mysql_free_result($presults);
					}
			}
			mysql_free_result($iresults);
				$plusmin=1;
		}


if ($total_cost[0] > 0) {
	print '<tr><th colspan=3 align=right>SUBTOTAAL</th><th align=right>€'.number_format($total_cost[0],2,',','.').'</th></tr>';
}

print (!empty($orow->order_description)?'<tr><td colspan=4>'.$orow->order_description.'</td></tr>':'').'</table>';
}
mysql_free_result($oresults);


}
/*_______________-=TheSilenT.CoM=-_________________*/

}

?>