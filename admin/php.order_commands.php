<?php
#!/usr/local/bin/php

$sushibon=0;
$sushisi=0;



print '<table width=100% height=50><tr>';
$max_rows=10;
//(`user_id`='$user_id' or `user_id`='$inet_user_id' or `user_id`='$restaurant_user_id')
if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `id` ORDER BY `id` ASC LIMIT 1000")){
		$i=0;while ($orow = mysql_fetch_object($oresults)) {$i++;
	ticket_numbers($orow,'order_commands',1);
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
	$tosend_query = "SELECT * FROM `$tbl_orders` WHERE `id` ORDER BY `id` DESC LIMIT 1000";
	$to_work='';
}

/*_______________-=TheSilenT.CoM=-_________________*/

	if ($oresults = mysql_query($tosend_query)){
		if (mysql_num_rows($oresults) <= 0) {//incase of first order
			orders_new_order($user_id);
			$oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT $bon_limit");
		}

			$i=0;while ($orow = mysql_fetch_object($oresults)) {


			if ($suresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id' AND `category_id` = '1') ORDER BY `id` ASC LIMIT 1000")){
			$cat_eight = mysql_num_rows($suresults);
			if ($cat_eight >= 1) {
			$sushisi = $sushisi+$cat_eight;
			$sushibon++;
			print $sushibon;
			
			}
			mysql_free_result($suresults);
			}
			//print $sushibon.' '.$sushisi;
			

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
<td width="20"'.$borders.' NOWRAP valign=top>'.(isset($plusmin)?'':'<a href="?orders&product_id='.$prow->id.'&amount='.$irow->amount.(!empty($to_work)?'&'.$to_work:'').'" class="active" target="frame_orders">').$irow->amount.(isset($plusmin)?'':'</a>').'</td><td valign=top>x</td><td'.$borders.' valign=top>'.(isset($plusmin)?'':'<a href="?orders&product_id='.$prow->id.(!empty($to_work)?'&'.$to_work:'').'" target="frame_orders">').(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name).(isset($plusmin)?'':'</a>');



/*_______________-=TheSilenT.CoM=-_________________*/
//ATTACHED
if ($iiresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`attach_id`='$irow->id') ORDER BY `id` ASC LIMIT 1000")){

while ($iirow = mysql_fetch_object($iiresults)) {
	if ($ppresults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$iirow->product_id') ORDER BY `id` DESC LIMIT 1")){
		if ($pprow = mysql_fetch_object($ppresults)) {
		mysql_free_result($ppresults);
		print '<a href="?orders&remove_attach='.$iirow->id.'" class=attach>{'.(empty($pprow->product_number)?'':$pprow->product_number.' ').strtoupper($pprow->product_name).'+'.$pprow->product_price.'}</a>';
$product_pricea = ($pprow->product_price*$iirow->amount);
$total_cost[0] += $product_pricea;
$total_products += $irow->amount;
		}
	}
}
mysql_free_result($iiresults);
}
//ATTACHED
/*_______________-=TheSilenT.CoM=-_________________*/

/*_______________-=TheSilenT.CoM=-_________________*/
//OPMERKING

$last_input_id = isset($gins['input_id']) && !empty($gins['input_id'])?$gins['input_id']:$irow->id;

if (isset($gins['input_id']) && isset($gins['opmerking'])) {
if (!empty($gins['opmerking']) && $gins['input_id'] == $irow->id && $gins['opmerking'] !== 'null') {
	$opmerking = $gins['opmerking'];
	mysql_query("INSERT INTO `$tbl_opmerking` values (NULL, '$irow->id','$opmerking_append$opmerking')") or print(mysql_error().'insert opmerking');
}
}

				if ($opmresults = mysql_query("SELECT * FROM `$tbl_opmerking` WHERE (`order_id`='$irow->id') ORDER BY `id` DESC LIMIT 10")){

			if (mysql_num_rows($opmresults) >= 1) {

				while ($opmrow = mysql_fetch_object($opmresults)) {
					print '<a href="?orders&remove_opmerking='.$opmrow->id.''.(!empty($to_work)?'&'.$to_work.'&':'').'" class="opmerking">('.$opmrow->opmerking.')</a>';
				}
				mysql_free_result($opmresults);
			}

				}
//OPMERKING
/*_______________-=TheSilenT.CoM=-_________________*/



print '</td>';


print '<td align=right'.$borders.' valign=top>'.(isset($plusmin)?'':'<a href="?orders&dproduct_id='.$prow->id.(!empty($to_work)?'&'.$to_work:'').'" target="frame_orders">').'€'.number_format($product_price,2,',','.').(isset($plusmin)?'':'</a>');

print '</td>';

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

print 'Bonnen met sushi : '.$sushibon.' Aantal sushi gerechten: '.$sushisi;

?>