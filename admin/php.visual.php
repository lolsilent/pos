<?php
#!/usr/local/bin/php


	$bon_limit=10;
	$rowzzz=5;
	$row_width=round(100/$rowzzz);
	$show_price=0;//0 = off 1 = onn

?><script language="javascript" type="text/javascript">setTimeout("location.reload();",5000);</script>
<meta http-equiv="refresh" content="5"><?

	$tosend_query = "SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT $bon_limit";
	$to_work='';

	if ($oresults = mysql_query($tosend_query)){
		if (mysql_num_rows($oresults) <= 0) {//incase of first order
			orders_new_order($user_id);
			$oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT $bon_limit");
		}
		print '<table width=100% cellpadding=1 cellspacing=1><tr>';
			$i=0;while ($orow = mysql_fetch_object($oresults)) {
print '<td valign="top" width="'.$row_width.'%">';
$total_cost = array(0,0,0,0,0);
$total_products = 0;
print '<table width=100% cellpadding=1 cellspacing=1><tr class="navy"><td colspan=2><a onclick="return confirm(\'#'.$orow->id.' afdrukken?\')"  href="?reprint='.$orow->id.'">#'.$orow->id.'</a></td><td colspan=2 align=right>'.$orow->order_dater.'</td></tr>';

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
<td width="20"'.$borders.' NOWRAP>'.(isset($plusmin)?'':'<a href="?product_id='.$prow->id.'&amount='.$irow->amount.(!empty($to_work)?'&'.$to_work:'').'" class="active">').$irow->amount.(isset($plusmin)?'':'</a>').'</td><td valign=center>x</td><td'.$borders.'>'.(isset($plusmin)?'':'<a href="?product_id='.$prow->id.(!empty($to_work)?'&'.$to_work:'').'">').(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name).(isset($plusmin)?'':'</a>').'</td>';

if ($show_price == 1) {
print '<td align=right'.$borders.'>'.(isset($plusmin)?'':'<a href="?dproduct_id='.$prow->id.(!empty($to_work)?'&'.$to_work:'').'">').'€'.number_format($product_price,2,',','.').(isset($plusmin)?'':'</a>').'</td>';

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

/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($gins[$txt_commands[1]]) or isset($gins['reprint'])) {
if (!isset($printed)) {
	$printed=1;
	if (isset($gins['reprint'])) {
		if (!empty($gins['reprint'])) {
			$orow->id = $gins['reprint'];
		}else{$orow->id--;}
	}else{$orow->id--;}
	orders_print_order($orow->id,1);	
}
}elseif (isset($gins[$txt_commands[5]])) {
	//$orow->id--;
	orders_print_order($orow->id,0);	
}

/*_______________-=TheSilenT.CoM=-_________________*/
print '</td>';
$i++;if ($i == $rowzzz) {
	print '</tr><tr>';
$i=0;
}
	}
	mysql_free_result($oresults);
	print '</tr></table>';

}
					/*_______________-=TheSilenT.CoM=-_________________*/

?><div class="floater">
<? print $titels[0].'</font>';?>
<br>&copy;XBROS.COM
<?
print date("Y");?></div>
?>