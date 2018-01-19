<?php
#!/usr/local/bin/php

$whereis='`id`';
	print '<table width=100% cellpadding=1 cellspacing=1><tr>';
	if ($cresults = mysql_query("SELECT * FROM `$tbl_categories` WHERE (`user_id`='$user_id') ORDER BY `id` ASC LIMIT 1000")){
$i=0;$m=5;
		while ($crow = mysql_fetch_object($cresults)) {
			if(isset($gins['menu']) && !empty($gins['menu']) && $gins['menu'] == $crow->id) {
			$whereis = "`category_id`='$crow->id'";
			}
print '<td height=50><a href="?menu='.$crow->id.'&menu_print" class="red">'.strtoupper($crow->category_name).'</a></td>';
		$i++;
		if ($i >= 5) {
		print '</tr><tr>';
		$i=0;
		}
		}
		mysql_free_result($cresults);
	}else{print mysql_error();}
print '</tr></table>';

$txt_bon = '';

$txt_bon=(!empty($titels[0])?center_text($titels[0],$max_printer_width):'').'
'.(!empty($titels[1])?center_text($titels[1],$max_printer_width):'').'
'.(!empty($titels[2])?center_text($titels[2],$max_printer_width):'').'
'.(!empty($titels[3])?center_text($titels[3],$max_printer_width):'').'
';
$txt_bon .= str_repeat("-",$max_printer_width);

if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE $whereis ORDER BY `id` LIMIT 1000")){
		
$last_cat=0;	while ($prow = mysql_fetch_object($presults)) {
if ($prow->product_price > 0 or $prow->product_priceb > 0) {
if ($last_cat !== $prow->category_id) {
print '<br>';
$txt_bon .= compute_space(' ', '€'.number_format($prow->product_price,2,',','.'),$max_printer_width).'
';
}
$last_cat=$prow->category_id;
	if ($prow->product_price > 0) {
print ((empty($prow->product_number)?'':$prow->product_number.' ').''.$prow->product_name.($prow->product_price<=0?'':'
€'.$prow->product_price)).'<br>';
$txt_bon .= compute_space($prow->product_number.' '.$prow->product_name, '€'.number_format($prow->product_price,2,',','.'),$max_printer_width).'
';
}
}
	}
	mysql_free_result($presults);
}

if (isset($gins['menu_print'])) {

if (!empty($bon_footer)) {
$txt_bon .= str_repeat("-",$max_printer_width);
	foreach ($bon_footer as $val) {
		$txt_bon .= center_text($val,$max_printer_width);
	}
}

$handle = printer_open();
global $bon_footer;

$current_hour=date("H");
if ($current_hour == 12 or $current_hour == 13 or $current_hour == 16 or $current_hour == 17 or $current_hour == 18 or $current_hour == 19) {
if (!empty($bon_footer)) {
$txt_bon .= str_repeat("-",$max_printer_width);
	foreach ($bon_footer as $val) {
		$txt_bon .= center_text($val,$max_printer_width);
	}
}
}

//print $txt_bon;
printer_write($handle, $txt_bon);
printer_close($handle);
}


?>