<?php
#!/usr/local/bin/php


if (!isset($link)) {
	$link=mysql_connect($db_host,$db_user,$db_password) or die(mysql_error().'100');
mysql_select_db($db_main) or die(mysql_error().'101');
}
//ZZZZZZZZZZ INTERACT
$intel='';
$intel_array =array();
$tosend_query = "SELECT * FROM `$tbl_products` WHERE `product_price`>0 ORDER BY `id` DESC LIMIT 10000";
if ($oresults = mysql_query($tosend_query)){
	while ($prow = mysql_fetch_object($oresults)) {
$sendt = $prow->id.'!'.
$prow->category_id.'!'.
$prow->product_number.'!'.
$prow->product_name.'!'.
$prow->product_description.'!'.
$prow->product_price.'|';
	$intel .= $sendt;
$intel_array[]= $sendt;
	}
	mysql_free_result($oresults);
}


$url= '';
$intel_array['pas']='1793';
//print $intel. '<hr>'. $contents.' ';
foreach ($intel_array as $key=>$val) {
print '<iframe src="http://www.isushi.nl/interact.php?pas=1793&'.$val.'"></iframe>';
}
//print file_get_contents("http://www.isushi.nl/interact.php?pas=1793&$url",true);

//ZZZZZZZZZZ INTERACT
?>