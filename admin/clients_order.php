<?php
#!/usr/local/bin/php

$tosend_query = "SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT 1";
if ($oresults = mysql_query($tosend_query)){
	if ($orow = mysql_fetch_object($oresults)) {
		mysql_free_result($oresults);
		//Print_r($orow);
		if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` ASC LIMIT 1")){
			if (mysql_num_rows($iresults) >= 1) {
				mysql_free_result($iresults);
				//header("Location: clients_frame.php");
			}else{
				if ($current_time-$orow->order_timer >= $redirect_time) {
					//header("Location: ?clients_info");
					//print $current_time-$orow->order_timer;exit;
				?><SCRIPT language="JavaScript">
<!--
top.location="?clients_info";
//-->
</SCRIPT><?
				}
			}
		}
	}else{
		header("Location: ?clients_info");
	}
}

if (!isset($link)) {
	mysql_close($link);
}

?><?php
#!/usr/local/bin/php


$suggest_this=array();
?><style>
<style>
* {
font-face:Arial;
font-weight:strong;
}

th {
	background:#123456;
	}
.clock2{
	background:none;
	color:white;
}

}
</style><?
	$bon_limit=2;
	$rowzzz=5;
	$row_width=round(100/$rowzzz);
	$show_price=1;//0 = off 1 = onn
$seconds_to_reload =1;

?><meta http-equiv="refresh" content="<?print $seconds_to_reload;?>"><?

	$tosend_query = "SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT $bon_limit";
	$to_work='';

	if ($oresults = mysql_query($tosend_query)) {
		if (mysql_num_rows($oresults) <= 0) {//incase of first order
			orders_new_order($user_id);
			$oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT $bon_limit");
		}
		print '<table width=100% cellpadding=1 cellspacing=1><tr><th>UW BESTELLING</th><tr>';
			$i=0;while ($orow = mysql_fetch_object($oresults)) {
if (isset($send_uno)){break;}
/*if ($bon_limit >= 2 and isset($tjaka)) {
print '<tr><td valign=top><br><br><br></td></tr><tr><th>VORIGE BESTELLING</th></tr>';
}else {
$tjaka=1;
}*/
print '<tr><td valign="top" width="'.$row_width.'%">';
$total_cost = array(0,0,0,0,0);
$total_products = 0;
print '<table width=100% cellpadding=1 cellspacing=1>'.(!isset($tjakb)?'':'');

$tjakb=1;

if (!isset($borders)) {$borders=" class=\"borderz\"";}else{$borders='';}
				if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` ASC LIMIT 1000")){
					if (mysql_num_rows($iresults) <= 0) {
						
					}
				while ($irow = mysql_fetch_object($iresults)) {
	if ($irow->amount >= 1) {
	//print_r($irow);
					if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$irow->product_id') ORDER BY `id` DESC LIMIT 10")){
						while ($prow = mysql_fetch_object($presults)) {

	if ($irow->priceab == 1 && $prow->product_price > 0 && $prow->product_priceb > 0) {
	$prow->product_price = $prow->product_priceb;
	
	}else{
	
	}
							if ($prow->product_price <= 0 and $irow->price >= 0.01) {
								$prow->product_price=$irow->price;
							}
							$product_price = ($prow->product_price*$irow->amount);

if (empty($bgcolor)) {$bgcolor=" class=\"navy\"";} else {$bgcolor="";}

//SUGGEST THIS

if (!isset($kippy) and $irow->amount >= 1) {
if (isset($suggest_this[$prow->category_id])) {
	$suggest_this[$prow->category_id] .= '|'.$prow->product_name;
}else{
	$suggest_this[$prow->category_id]=$prow->product_name;
}

}

print '<tr'.$bgcolor.'>
<td width="20" align=center valign=top NOWRAP>'.$irow->amount.'</td><td valign=top align=center><b>X</b></td><td valign=top>'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name);


/*_______________-=TheSilenT.CoM=-_________________*/
//OPMERKING
				if ($opmresults = mysql_query("SELECT * FROM `$tbl_opmerking` WHERE (`order_id`='$irow->id') ORDER BY `id` DESC LIMIT 10")){

			if (mysql_num_rows($opmresults) >= 1) {

				while ($opmrow = mysql_fetch_object($opmresults)) {
					print '<br><a href="?remove_opmerking='.$opmrow->id.''.(!empty($to_work)?'&'.$to_work:'').'" class="opmerking">'.$opmrow->opmerking.'</a>';
				}
				mysql_free_result($opmresults);
			}

				}
//OPMERKING
/*_______________-=TheSilenT.CoM=-_________________*/

/*_______________-=TheSilenT.CoM=-_________________*/
//ATTACHED
if ($iiresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`attach_id`='$irow->id') ORDER BY `id` ASC LIMIT 1000")){

while ($iirow = mysql_fetch_object($iiresults)) {
	if ($ppresults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$iirow->product_id') ORDER BY `id` DESC LIMIT 1")){
		if ($pprow = mysql_fetch_object($ppresults)) {
		mysql_free_result($ppresults);
$product_pricea = ($pprow->product_price*$iirow->amount);

		print '<a href="?orders&remove_attach='.$iirow->id.'" class=attach>{'.(empty($pprow->product_number)?'':$pprow->product_number.' ').strtoupper($pprow->product_name).'} + €'.number_format($product_pricea,2).'</a>';

$total_cost[0] += $product_pricea;
$total_products += $irow->amount;
		}
	}
}
mysql_free_result($iiresults);
}
//ATTACHED
/*_______________-=TheSilenT.CoM=-_________________*/
print '</td>';

if ($show_price == 1) {
print '<td align=right valign=top>€'.$prow->product_price.'</td><td align=right valign=top>€'.number_format($product_price,2,',','.').(isset($plusmin)?'':'</a>').'</td>';

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

}//amount >= 1
					}
			mysql_free_result($iresults);
				$plusmin=1;
		}


if ($total_cost[0] > 0) {
	print '<tr><th align=right colspan=3 class=total_red>TOTAAL</th><th align=right colspan=2 class=total_red>€'.number_format($total_cost[0],2,',','.').'</th></tr>';
$send_uno=1;
}

print (!empty($orow->order_description)?'<tr><td colspan=4>'.$orow->order_description.'</td></tr>':'').'</table>';

print '</td></tr>';

$kippy=1;
	}//orders
	mysql_free_result($oresults);
print '</table>';
}
?><script type="text/javascript">

onload = function()
{
scrollTo(0,5000);
}

</script>