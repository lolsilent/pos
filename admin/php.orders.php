<?php
#!/usr/local/bin/php
/*
###_______________-=TheSilenT.CoM=-_______________###
Project name	: Project name
Script name	: Script name
Version		: 1.00
Release date	: 13-3-2010 20:55:39
Last Update	: 13-3-2010 20:55:39
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
//$order_actions=array('plus','minus','amounter','comment','attach','');
//print_r($order_actions);
/*

mysql_modify($table,$id,$field,$value,$action);//UPDATE,INSERT,DELETE
order_modify_amount
order_modify_status($id)
order_add_comment($id,$comment)



*/

/*
function mysql_modify($table,$id,$field,$value,'UPDATE') {
	//UPDATE,INSERT,DELETE
if ($results = mysql_query("SELECT * FROM `$table` WHERE (`id`='$id') ORDER BY `id` DESC LIMIT 1")) {
	while ($porow = mysql_fetch_object($poresults)) {
	
	}
	mysql_free_result($poresults);
}

}
*/

/*_______________-=TheSilenT.CoM=-_________________*/


if (isset($gins['aid']) && isset($gins['deattach']) && !empty($gins['aid']) && !empty($gins['deattach'])) {
if ($poresults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`id`='".$gins['aid']."') ORDER BY `id` DESC LIMIT 1")) {
if ($prow = mysql_fetch_object($poresults)) {
	mysql_free_result($poresults);
	if ($prow->attach_price <= 0) {
		$prow->attach_price=$prow->product_price;
	}
	//print 'VDSF';
mysql_query("INSERT INTO `$tbl_input` values (NULL, '','".$gins['deattach']."','$prow->category_id','$prow->id','0','$prow->attach_price','','1','$current_time')") or print(mysql_error().'insert attach');

mysql_query("INSERT INTO `$tbl_inputa` values (NULL, '','".$gins['deattach']."','$prow->category_id','$prow->id','0','$prow->attach_price','','1','$current_time')") or print(mysql_error().'insert attach');

mysql_query("UPDATE `$tbl_config` SET `value`='' WHERE `user_id`='$user_id' AND `name`='attach' LIMIT 1") or die_nice(mysql_error().' update error ');
unset($attach);
}
}
}
/*_______________-=TheSilenT.CoM=-_________________*/
//TAFEL VERHUIZEN
if (isset($_GET['movetable'])) {
//print 'AAAA';
if (!isset($_GET['cmovetable'])) {
$txt_footer .= "<script language='Javascript'>\n cmovetable=prompt('Verhuis tafel.',''); document.location = '?orders&movetable=".$_GET['movetable']."&cmovetable='+cmovetable+''; </script>";
}elseif (isset($_GET['cmovetable'])) {
$moveid=$_GET['movetable'];
$movetoorder_name=$_GET['cmovetable'];
mysql_query("UPDATE `$tbl_orders` SET `order_name`='$movetoorder_name' WHERE `id`='$moveid' LIMIT 1") or die_nice(mysql_error().' update error ');

}
}
/*_______________-=TheSilenT.CoM=-_________________*/


if (isset($gins['amount']) && isset($gins['xinput_id']) && !empty($gins['amount']) && !empty($gins['xinput_id'])) {
//print 'KOLS';
mysql_query("UPDATE `$tbl_input` SET `amount`='".$gins['amount']."' WHERE `id`='".$gins['xinput_id']."' LIMIT 1") or print(mysql_error().'update opmerking removal');
mysql_query("UPDATE `$tbl_inputa` SET `amount`='".$gins['amount']."' WHERE `id`='".$gins['xinput_id']."' LIMIT 1") or print(mysql_error().'update opmerking removal');
}
/*_______________-=TheSilenT.CoM=-_________________*/
$billlinks=array();
//print '<table width=100% cellpadding=1 cellspacing=1><tr class="navy"><th>'.(isset($priceab) && !empty($priceab)?'RESTAURANT PRIJS':'AFHAAL PRIJS').'</th></tr></table>';


/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($gins['remove_opmerking'])) {
	$remove_opmerking = $gins['remove_opmerking'];
mysql_query("UPDATE `$tbl_opmerking` SET `order_id`='0' WHERE `id`='$remove_opmerking' LIMIT 1") or print(mysql_error().'update opmerking removal');
}
if (isset($gins['remove_attach'])) {

mysql_query("UPDATE `$tbl_input` SET `attach_id`='' WHERE `id`='".$gins['remove_attach']."' LIMIT 1") or print(mysql_error().'update opmerking removal');
}
/*_______________-=TheSilenT.CoM=-_________________*/

if (!empty($change) and !empty($ichange)) {
$change += $ichange;
}elseif (!empty($ichange)) {
$change = $ichange;
}
/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($gins[$txt_commands[9]])) {
orders_new_order($user_id);

mysql_query("DELETE FROM `$tbl_inputa` WHERE `id` LIMIT 1000") or print(mysql_error());
}

/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($gins[$txt_commands[1]])) {
$bon_limit =2;
if ($poresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT 1")) {
if ($porow = mysql_fetch_object($poresults)) {
	mysql_free_result($poresults);
	
}
}
orders_new_order($user_id);
}elseif(isset($gins[$txt_commands[5]])) {
$bon_limit =2;
orders_cancelled((isset($workticket)?$workticket:0));
orders_new_order($user_id);
}elseif(isset($gins[$txt_commands[9]])) {
$bon_limit =2;
}

/*_______________-=TheSilenT.CoM=-_________________*/

if (!empty($bonnen)) {
	$bon_limit=$bonnen;	
}else{
if (!isset($bon_limit)) {
	$bon_limit=1;
	}
}

if (isset($workticket) && !empty($workticket)) {
	$tosend_query = "SELECT * FROM `$tbl_orders` WHERE (`id`='".$workticket."') ORDER BY `id` DESC LIMIT 1";
	$to_work='workticket='.$workticket;

}else{
	$tosend_query = "SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT $bon_limit";
	$to_work='';
}


/*_______________-=TheSilenT.CoM=-_________________*/

									//cost, tax0,tax1,tax2
	if ($oresults = mysql_query($tosend_query)){
		if (mysql_num_rows($oresults) <= 0) {//incase of first order
			orders_new_order($user_id);
			$oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT $bon_limit");
		}
			while ($orow = mysql_fetch_object($oresults)) {



/*_______________-=TheSilenT.CoM=-_________________*/
//15-2-2011 2:27:12 NUMBER FAST INJECTION
//14-2-2011 21:41:56
if (isset($pins['pnumber']) && !empty($pins['pnumber'])) {

//print 'aaa';

$amounters = 1;
$pnumberz = $pins['pnumber'];

if (preg_match("/\*/si",$pins['pnumber'])) {
	//print 'bbb';
$amounters = preg_replace("/\*.*?$/si","",$pnumberz);
$pnumberz = preg_replace("/^.*?\*/si","",$pnumberz);
}

//print "$amounters $pnumberz";

if ($zporesults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`product_number`='$pnumberz' OR `product_name`='$pnumberz') ORDER BY `id` DESC LIMIT 1")) {
	if ($zprow = mysql_fetch_object($zporesults)) {
		mysql_free_result($zporesults);

//print 'CDSA';

/*_______________-=TheSilenT.CoM=-_________________*/

if ($ziresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id' AND `product_id`='$zprow->id') ORDER BY `id` DESC LIMIT 1")) {
$num_rowz = mysql_num_rows($ziresults);
mysql_free_result($ziresults);
}

if (isset($num_rowz) && !empty($num_rowz)) {
//print $num_rowz;
			mysql_query("UPDATE `$tbl_input` SET `amount`=`amount`+'$amounters' WHERE `order_id`='$orow->id' AND `product_id`='$zprow->id' LIMIT 1") or die_nice(mysql_error().' update error ');
} else {
			mysql_query("INSERT INTO `$tbl_input` values (NULL, '$orow->id','','$zprow->category_id','$zprow->id','0','','','$amounters','$current_time')") or print(mysql_error().'insert 113');
}

/*_______________-=TheSilenT.CoM=-_________________*/

if ($aziresults = mysql_query("SELECT * FROM `$tbl_inputa` WHERE (`order_id`='$orow->id' AND `product_id`='$zprow->id') ORDER BY `id` DESC LIMIT 1")) {
$num_rowza = mysql_num_rows($aziresults);
mysql_free_result($aziresults);
}
//print $num_rowza.'<br>';
if (isset($num_rowza) && !empty($num_rowza)) {
//print $num_rowz;
			mysql_query("UPDATE `$tbl_inputa` SET `amount`=`amount`+'$amounters' WHERE `order_id`='$orow->id' AND `product_id`='$zprow->id' LIMIT 1") or die_nice(mysql_error().' update error ');
} else {
			mysql_query("INSERT INTO `$tbl_inputa` values (NULL, '$orow->id','','$zprow->category_id','$zprow->id','0','','','$amounters','$current_time')") or print(mysql_error().'insert 113');
}

/*_______________-=TheSilenT.CoM=-_________________*/

$txt_footer .='<script>parent.frame_products.location = "?orderpad";</script>';

	}
}

}
//15-2-2011 2:27:12 NUMBER FAST INJECTION
/*_______________-=TheSilenT.CoM=-_________________*/

/*_______________-=TheSilenT.CoM=-_________________*/
//ORDER_STATUS


/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($gins['bill']) && $gins['bill'] == $orow->id) {
	mysql_query("UPDATE `$tbl_orders` SET `order_status`='2', `order_timer`='$current_time' WHERE `id`='$orow->id' LIMIT 1") or print(mysql_error().'update 100');
}

if (isset($gins['payed']) && $gins['payed'] == $orow->id) {
	mysql_query("UPDATE `$tbl_orders` SET `order_status`='3', `order_timer`='$current_time' WHERE `id`='$orow->id' LIMIT 1") or print(mysql_error().'update 100');
}

if (isset($gins['clear_table']) && $gins['clear_table'] == $orow->id) {
	mysql_query("UPDATE `$tbl_orders` SET `order_status`='4', `order_timer`='$current_time' WHERE `id`='$orow->id' LIMIT 1") or print(mysql_error().'update 100');
}

/*_______________-=TheSilenT.CoM=-_________________*/

	//print_r($orow);


	
if (!empty($product_id)) {

	if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$product_id') ORDER BY `id` DESC LIMIT 1")){
			if ($prow = mysql_fetch_object($presults)) {
				mysql_free_result($presults);

$db_price='';
if (!isset($price)) {$price='';}
if(isset($price)) {
$db_price = ", `price`=`price`+'$price'";
}

if ($prow->product_define == 1 and !preg_match("/price/si",$_SERVER['REQUEST_URI'])) {

if (empty($pins['numpad'])) {
	$txt_footer .= "<script language='Javascript'>\n price=prompt('".$prow->product_name."',''); document.location = '?orders&product_id=".$prow->id."&price='+price+''; </script>";
}

$txt_footer .='<script>parent.frame_saus.location = "?numpad&product_id='.$prow->id.'";</script>';

}

if (!empty($pins['numpad'])) {
$txt_footer .='<script>parent.frame_saus.location = "?sauzen&category_id=1";</script>';
}

$check_prices='';
if ($prow->product_price > 0 && $prow->product_price !== $prow->product_priceb && $prow->product_priceb > 0) {
 $check_prices = " AND `priceab`='$priceab'";
}

/*_______________-=TheSilenT.CoM=-_________________*/

	if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id' AND `product_id`='$prow->id'$check_prices) ORDER BY `id` DESC LIMIT 1")){
		if ($irow = mysql_fetch_object($iresults)) {
			mysql_free_result($iresults);

			if (isset($amount)) {
				if ($amount <> 0) {
					$amounter="'$amount'";
				}
			}else{
				
				if ($prow->product_define == 1) {
					$amounter=1;
				}else{
					$amounter="`amount`+1";
				}
			}
			if (isset($amounter)) {
				if (!empty($amounter)) {

if ($merge_same == 1) {
	mysql_query("UPDATE `$tbl_input` SET `amount`=$amounter, `timer`='$current_time' $db_price WHERE `id`='$irow->id' LIMIT 1");// or print(mysql_error().'update 1000');
}else{
	//print 'LKOS';
	mysql_query("INSERT INTO `$tbl_input` values (NULL, '$orow->id','','$prow->category_id','$prow->id','0','".round($price)."','$priceab','1','$current_time')") or print(mysql_error().'insert 113');
}
				}
			}
		}else{
			//print 'aaa';
		//if (empty($price)) {$price='';}else{$price=number_format($price,2);}
			mysql_query("INSERT INTO `$tbl_input` values (NULL, '$orow->id','','$prow->category_id','$prow->id','0','".round($price)."','$priceab','1','$current_time')") or print(mysql_error().'insert 113');
		}
	}else{
	//if (empty($price)) {$price='';}else{$price=number_format($price,2);}
	//print 'bbb';
		mysql_query("INSERT INTO `$tbl_input` values (NULL, '$orow->id','','$prow->category_id','$prow->id','0','$price','$priceab','1','$current_time')") or print(mysql_error().'insert 114');
	}

/*_______________-=TheSilenT.CoM=-_________________*/
	if ($airesults = mysql_query("SELECT * FROM `$tbl_inputa` WHERE (`order_id`='$orow->id' AND `product_id`='$prow->id'$check_prices) ORDER BY `id` DESC LIMIT 1")){
		if ($airow = mysql_fetch_object($airesults)) {
			mysql_free_result($airesults);

			if (isset($amount)) {
				if ($amount <> 0) {
					$amounter="'$amount'";
				}
			}else{
				
				if ($prow->product_define == 1) {
					$amounter=1;
				}else{
					$amounter="`amount`+1";
				}
			}
			if (isset($amounter)) {
				if (!empty($amounter)) {

if ($merge_same == 1) {
	mysql_query("UPDATE `$tbl_inputa` SET `amount`=$amounter, `timer`='$current_time' $db_price WHERE `id`='$airow->id' LIMIT 1") or print(mysql_error().'update 1000');
	//print 'DDD';
}else{
	//print 'LKOS';
	mysql_query("INSERT INTO `$tbl_inputa` values (NULL, '$orow->id','','$prow->category_id','$prow->id','0','".round($price)."','$priceab','1','$current_time')") or print(mysql_error().'insert 113');
}
				}
			}
		}else{
			//print 'aaa';
		//if (empty($price)) {$price='';}else{$price=number_format($price,2);}
			mysql_query("INSERT INTO `$tbl_inputa` values (NULL, '$orow->id','','$prow->category_id','$prow->id','0','".round($price)."','$priceab','1','$current_time')") or print(mysql_error().'insert 113');
		}
	}else{
	//if (empty($price)) {$price='';}else{$price=number_format($price,2);}
	//print 'bbb';
		mysql_query("INSERT INTO `$tbl_inputa` values (NULL, '$orow->id','','$prow->category_id','$prow->id','0','$price','$priceab','1','$current_time')") or print(mysql_error().'insert 114');
	}

/*_______________-=TheSilenT.CoM=-_________________*/

//INVENTORIZE
inventorization($prow->category_id, $prow->product_number,$prow->product_name);
//PRODUCT HITS
mysql_query("UPDATE `$tbl_products` SET `product_hits`=`product_hits`+1, `product_timer`='$current_time' WHERE `product_hits` <= 1000 AND `id`='$product_id' LIMIT 1") or print(mysql_error());

mysql_query("UPDATE `$tbl_orders` SET `order_dater`='$current_date $current_clock' WHERE `id`='$orow->id' LIMIT 1") or print(mysql_error());

$product_id='';
$db_price='';
$price='';
		}
	}

}
/*_______________-=TheSilenT.CoM=-_________________*/
if (!empty($dinput_id)) {
orders_minus_product($orow->id,$dinput_id,1);
$dinput_id='';}
/*_______________-=TheSilenT.CoM=-_________________*/

/*_______________-=TheSilenT.CoM=-_________________*/
if (!empty($input_id) && !isset($gins['opmerking'])) {
orders_plus_product($orow->id,$input_id,1);
$input_id='';}
/*_______________-=TheSilenT.CoM=-_________________*/

//BON NUMMER EN DATUM
$total_cost = array(0,0,0,0,0);
$total_products = 0;
print '<table width=100% cellpadding=1 cellspacing=1>
<tr class="navy">
<td><b>
<a onclick="return confirm(\'BON#'.$orow->id.(!empty($orow->order_name)?' TAFEL'.$orow->order_name:'').' afdrukken?\')" href="?orders&reprint='.$orow->id.'">#'.$orow->id.'</a></b>
</td>
<td colspan=4 align=right>'.$orow->order_dater.'</td></tr>';

/*_______________-=TheSilenT.CoM=-_________________*/

//RESTAURANT OF AFHAAL
if ($orow->user_id == 3) {
print '<tr><td colspan=5 align=center class="'.restaurant_order_status($orow->order_status,$orow->user_id).'">';

/*
//MOVED To BOTTOM OF THE PAGE
if ($orow->order_status == 2) {
print '<a onclick="return confirm(\'BON#'.$orow->id.(!empty($orow->order_name)?' TAFEL'.$orow->order_name:'').' afgerekend bevestiggen?\')" href="?orders&payed='.$orow->id.'">';
}elseif($orow->order_status == 3){
print '<a onclick="return confirm(\'BON#'.$orow->id.(!empty($orow->order_name)?' TAFEL'.$orow->order_name:'').' rekening gevraagd?\')" href="?orders&bill='.$orow->id.'&reprint='.$orow->id.'">';
}
*/
print '<b><a onclick="return confirm(\''.(!empty($orow->order_name)?' TAFEL'.$orow->order_name:'BON #'.$orow->id).' verhuizen?\')" href="?orders&movetable='.$orow->id.'">';
print (!empty($orow->order_name)?'TAFEL '.$orow->order_name:'').'</a></b></td></tr>';

}elseif ($orow->user_id == 1) {
print '<tr><td colspan=5 align=center class="'.restaurant_order_status($orow->order_status,$orow->user_id).'">AFHAAL</td></tr>';
}

/*_______________-=TheSilenT.CoM=-_________________*/

if (!isset($borders)) {$borders=" class=\"borderz\"";}else{$borders='';}
				if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` ASC LIMIT 1000")){

				while ($irow = mysql_fetch_object($iresults)) {
		//if ($irow->amount >= 1) {
	//print_r($irow);
					if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$irow->product_id') ORDER BY `id` DESC LIMIT 10")){

						while ($prow = mysql_fetch_object($presults)) {

	if ($irow->priceab == 1 && $prow->product_price > 0 && $prow->product_priceb > 0) {
	$prow->product_price = $prow->product_priceb;
	
	}else{
	
	}
	
	if (isset($gins['amount']) && !isset($settled) && isset($gins['xinput_id']) && $gins['xinput_id'] == $irow->id) { $settled=1;
$txt_footer .= "<script language='Javascript'>\n amount=prompt('".strtoupper($prow->product_name)."',''); document.location = '?orders&".(!empty($to_work)?$to_work.'&':'')."xinput_id=".$irow->id."&amount='+amount+'&settled=1'; </script>";
}
							if ($prow->product_price <= 0 && $irow->price > 0) {
								$prow->product_price=$irow->price;
	
							}
							$product_price = ($prow->product_price*$irow->amount);

	

/*_______________-=TheSilenT.CoM=-_________________*/
//NEW IPUTA DISPLAY
$inputas = array();
$inputasids = array();
if ($iaresults = mysql_query("SELECT * FROM `$tbl_inputa` WHERE (`order_id`='$orow->id') ORDER BY `id` ASC LIMIT 1000")){

				while ($iarow = mysql_fetch_object($iaresults)) {
$inputas[$iarow->product_id] = $iarow->amount;
//				print "$iarow->product_id $iarow->amount<br>";

				}
mysql_free_result($iaresults);
}
//NEW IPUTA DISPLAY
/*_______________-=TheSilenT.CoM=-_________________*/

if (empty($bgcolor)) {$bgcolor=" class=\"navy\"";} else {$bgcolor="";}

if (array_key_exists($prow->id, $inputas) AND $orow->user_id == 3) {
$irow->amount = $irow->amount - $inputas[$prow->id];
}

print '<tr'.$bgcolor.'><td width="20"'.$borders.' NOWRAP align=center>'.(isset($plusmin)?'':'<a href="?orders&xinput_id='.$irow->id.'&amount='.$irow->amount.(!empty($to_work)?'&'.$to_work:'').'" class="active">').$irow->amount.(isset($plusmin)?'':'</a>');
if (array_key_exists($prow->id, $inputas) AND $orow->user_id == 3) {
print '<font color=#FF0000>'.$inputas[$prow->id].'</font>';
}
print '</td><td'.$borders.' align=left>'.(isset($plusmin)?'':'<a href="?orders&product_id='.$prow->id.(!empty($to_work)?'&'.$to_work:'').'">').(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name).(isset($plusmin)?'':' €'.number_format($product_price,2,',','.').'</a>');


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
	mysql_query("INSERT INTO `$tbl_opmerking` values (NULL, '$irow->id','','$opmerking_append$opmerking')") or print(mysql_error().'insert opmerking');
	//OPMERKING VOOR INPUTA
	mysql_query("INSERT INTO `$tbl_inputa` values (NULL, '','$prow->id','$opmerking_append$opmerking','','','','','','')") or print(mysql_error().'insert opmerking');
	
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
if (isset($orders_options) && !isset($plusmin)) {
	print '<td width=50 align=center'.$borders.' NOWRAP>'.(isset($plusmin)?'':'<a href="?orders&dproduct_id='.$prow->id.'&dinput_id='.$irow->id.(!empty($to_work)?'&'.$to_work:'').'" class=red>').'-'.(isset($plusmin)?'':'</a>').'</td><td width=50 align=center'.$borders.'  NOWRAP><a href="?orders&opmerking&input_id='.$irow->id.'" class=red>!</a></td>
<td width=50 align=center'.$borders.'  NOWRAP><a href="?products&category_id=1&attach='.$irow->id.'" target=frame_products class=red>&</a></td>';
}else{
print '<td colspan=3 align=center'.$borders.'>'.(isset($plusmin)?'':'<a href="?orders&dinput_id='.$irow->id.(!empty($to_work)?'&'.$to_work:'').'">').'€'.number_format($product_price,2,',','.').(isset($plusmin)?'':'</a>').'</td>';
}
print '</tr>';


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
						mysql_free_result($presults);
					}

			}
		//}//amount >= 1
			mysql_free_result($iresults);
				$plusmin=1;
		}



if ($total_cost[0] > 0) {
	print '<tr><th>'.number_format($total_products,0,',','.').'</th><th align=right>SUBTOTAAL</th><th align=right colspan=3><span class="subtotaal">€'.number_format($total_cost[0],2,',','.').'</span></th></tr>';

if (!empty($total_cost[0]) and !empty($change) and is_numeric($change)) {
print '<tr><th colspan=2>Gegeven bedrag!</th><th align=right colspan=3>€'.number_format($change,2).'</th></tr>';
print '<tr><th colspan=2>WISSELGELD</th><th align=right colspan=3>€'.number_format($change-$total_cost[0],2).'</th></tr>';
print '<tr><td align=right colspan=5>'.changer($change,$total_cost[0]).'</td></tr>';
}

}
/*
//BTW
if ($total_cost[1] > 0) {
	print '<tr><td colspan=2 align=right>BTW LAAG</td><td align=right>€'.number_format($total_cost[1],2,',','.').'</td></tr><tr><td colspan=3 align=right>EX BTW LAAG</td><td align=right>€'.number_format($total_cost[3],2,',','.').'</td></tr>';
}
if ($total_cost[2] > 0) {
	print '<tr><td colspan=2 align=right>BTW HOOG</td><td align=right>€'.number_format($total_cost[2],2,',','.').'</td></tr><tr><td colspan=3 align=right>EX BTW HOOG</td><td align=right>€'.number_format($total_cost[4],2,',','.').'</td></tr>';
}
*/
print (!empty($orow->order_description)?'<tr><td colspan=3>'.$orow->order_description.'</td></tr>':'').'</table>';

/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($gins[$txt_commands[1]]) or isset($gins['reprint'])) {
//print 'AAAAA';
if (!isset($printed)) {

	$printed=1;
	if (isset($porow->id)) {
		$orow->id = $porow->id;
		}
		
	if (isset($gins['reprint'])) {
		if (!empty($gins['reprint'])) {
			$orow->id = $gins['reprint'];
		}
	}
	//print 'ZZZZ';
	orders_print_order($orow->id,1);	
}
}elseif (isset($gins[$txt_commands[5]])) {
	//$orow->id--;
	orders_print_order($orow->id,0);	
}

if (isset($gins['orderprint'])) {
orderprint($orow->id,1);
?><SCRIPT language="JavaScript">
<!--
top.frames['frame_orders'].location.replace='?orders&NIEUW';
top.frames['frame_products'].location.replace='?tafels&TAFELS';
top.frames['frame_products'].location.replace='?tafels&TAFELS';
//-->
</SCRIPT><?	
}
/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($workticket) AND $orow->user_id == 3) {
//$billlinks[] = '<a onclick="return confirm(\'BON#'.$orow->id.' AFDRUKKEN?\')" href="?orders&reprint='.$orow->id.'" class=red>REKENING</a>';
$billlinks[] = '<a href="?orders&orderprint='.$orow->id.'" class=red>BON</a>';
if ($orow->order_status == 2) {
$billlinks[] = '<a href="?orders&payed='.$orow->id.'" class=blue>AFGEREKEND BEVESTIGEN</a>';
}elseif($orow->order_status < 2){
$billlinks[] = '<a href="?orders&bill='.$orow->id.'&reprint='.$orow->id.'" class=red>REKENING PRINTEN</a>';
}elseif ($orow->order_status == 3) {
$billlinks[] = '<a href="?orders&clear_table='.$orow->id.'" class=red>TAFEL LEEG VERKLAREN</a>';
}else{
$billlinks[] = '<a href="?tafels&TAFELS" class=blue target="frame_products">TAFELS</a>';
}
}
$thiss_id = $orow->id;
/*_______________-=TheSilenT.CoM=-_________________*/

$bon_copy = '<a onclick="return confirm(\'BON#'.$orow->id.(!empty($orow->order_name)?' TAFEL'.$orow->order_name:'').' afdrukken?\')" href="?orders&reprint='.$orow->id.'" class=red>Kopie rekening</a>';
	}//orow while
	mysql_free_result($oresults);

/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($billlinks[0])) {
	print '<table width=100% height=38><tr>';
	foreach ($billlinks as $val) {
	print '<td valign=center align=center width=50%>'.$val.'</td>';
	}
	print '</tr></table>';
}

/*_______________-=TheSilenT.CoM=-_________________*/

}else{
orders_new_order($user_id);
}
/*_______________-=TheSilenT.CoM=-_________________*/

/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($fast_tickets) or (isset($legenda) && $legenda == 1 && isset($gins['helplegend']))) {
print '<table width=100% height=25><tr>';
$max_rows=5;
//(`user_id`='$user_id' or `user_id`='$inet_user_id' or `user_id`='$restaurant_user_id')
if ($ooresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `id` ORDER BY `order_timer` DESC LIMIT 10")){
		$i=0;while ($oorow = mysql_fetch_object($ooresults)) {$i++;
ticket_numbers($oorow,'tafels',0);
			if ($i==$max_rows) {$i=0;
				print '</tr><tr>';
			}
		}
		mysql_free_result($ooresults);
}

//print (isset($workticket) && !empty($workticket)?'<tr><th colspan="'.$max_rows.'">#'.$workticket.'</th></tr>':'');
print '<form method=post action="?onlineorders" target="frame_products">
<table>
<tr><td>Zoeken naar naam, email, telefoon, etc...: </td><td width=100><input type=text name=waarde class=blue></td></tr>
<tr><th colspan=2 align=center><input type=submit value="Online bestellingen ZoekeN" class=red></th></tr>
</table>
</form>';
print '</tr></table>';
}
/*_______________-=TheSilenT.CoM=-_________________*/


			


if (!empty($pins['change'])) {
	$txt_footer .= "<script language='Javascript'>\n change=prompt('Gegeven bedrag!',''); document.location = '?orders&change='+change+''; </script>";
}

/*
//tafels nummers button
print '<td><form method=post action="?tafels&in_id='.$thiss_id.'" target="frame_products">
<input type=submit name="TAFELS" value="TAFELS" class="change"></form>
</td><td><form method=post action="?orderpad" target="frame_products">
<input type=submit name="GO" value="NUMMERS" class="change">
</td></form>';
*/
//wisselgeld
if (isset($total_cost[0]) AND $total_cost[0] > 0) {
print '<table width=100%><tr><td height=38><form method=post action="?orders"><input type=submit name=change value="WISSELGELD" class="change" style="height:38;">'.(!empty($change)?'<input type=hidden name=ichange value="'.$change.'"':'').'</form></td></tr><tr><td height=38>'.$bon_copy.'</td></tr></table>';
}


/*_______________-=TheSilenT.CoM=-_________________*/

//print $last_input_id;
if (isset($gins['opmerking']) and !isset($settledop) and isset($last_input_id)) {
$txt_footer .= "<script language='Javascript'>\n opmerking=prompt('OPMERKING TOEVOEGEN',''); document.location = '?orders&input_id=".$last_input_id."&opmerking='+opmerking+'&settledop=1".(!empty($to_work)?'&'.$to_work:'')."'; </script>";
}

//<a href="?orders&input_id=1671'.(!empty($to_work)?'&'.$to_work:'').'" class=a2>ACTIE MINI LOEMPIA</a><br>
//print '<table><tr><td></td><td></td></tr></table>';


if (isset($legenda) && $legenda == 1 && isset($gins['helplegend'])) {
print '<table><tr><th>LegendA</th></tr>
<tr>
<td>Druk op een van de reeds bestelde artikellen om bij te bestellen.<br>
! = Opmerking toevoegen aan een artikel.<br>
- = MIN voor aftrekken.<br>
& = iets Aanvoegen aan een artikel.<br>
<a href="?orders=actief" class="aticket">bon actief</a>
<a href="?orders=afhaal" class="ticket">afhaal bon</a>
<a href="?orders=restaurant" class="rticket">restaurant bon</a>
<a href="?orders=restaurant" class="rticketnota">restaurant rekening gevraagd</a>
<a href="?orders=restaurant" class="rticketconfirm">restaurant afgerekend</a>
'.($inet_onoff >= 1?'<a href="?orders=internet" class="iticket">internet bon</a>':'').'
</td></tr></table>';


}

//online reservering en bestelling check
$idate = date("d-m-Y");
if ($imresults = mysql_query("SELECT * FROM `$tbl_internet_members` WHERE (`uitvoer_datum`='$idate') ORDER BY `doe`,`uitvoer_tijd` DESC LIMIT 100")){
if (mysql_num_rows($imresults) >= 1) {
print '<table>';
		$i=0;while ($imrow = mysql_fetch_object($imresults)) {
		$personen='';
		if (preg_match("/Aantal personen/",$imrow->content)) {
		$personen=preg_replace("/^.*?Aantal personen : /si","",$imrow->content);
		$personen=preg_replace("/Datum en tijdstip.*?$/si","",$personen).'p';
		}
		print '<tr class="iticket"><td><a href="?icheck='.$imrow->id.'" class="iticket" target="frame_products">'.($imrow->doe == 'reserveren'?'R':'A').$imrow->uitvoer_tijd.'</a></td><td><a href="?icheck='.$imrow->id.'" class="iticket" target="frame_products">'.$imrow->naam.' '.$personen.'</a></td></tr>';
		
		//print '<pre>';print_r($imrow);
		$i++;
		if ($i == 5){
		print '<tr>';$i=0;
		}}
		mysql_free_result($imresults);
print '</tr></table>';
}
}


/*_______________-=TheSilenT.CoM=-_________________*/
//14-2-2011 21:41:56

//print '<table><tr><td><form method=post action="?orders" target="frame_orders"><input type=text name="pnumber" style="width:50;height:50;"><input type=submit name="" value="" style="width:0;height:0;"></form>';



/*_______________-=TheSilenT.CoM=-_________________*/

/*
print_r($gins);
print_r($pins);
*/
if (isset($gins['open_table']) && !empty($gins['open_table'])) {
?><SCRIPT language="JavaScript">
<!--
top.frames['frame_products'].location.replace='?products&category_id=3';
//-->
</SCRIPT><?
}
if (isset($gins['bill']) OR isset($gins['payed']) OR isset($gins['clear_table']) OR isset($gins['orderprint']) OR isset($gins['cmovetable']) OR isset($gins[$txt_commands[9]])) {
?><SCRIPT language="JavaScript">
<!--
top.frames['frame_products'].location.replace='?tafels&TAFELS';
top.frames['frame_orders'].location.replace='?orders';
//-->
</SCRIPT><?
}

if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
//include_once('admin/php.numpad.php');
//include_once('admin/php.seekpad.php');
}
?>
<a href="?orders&helplegend" title="OMAS BONNEN HELP">?</a><div class="floater">
<? print $titels[0].'</font>';?>
<br>&copy;thesilent.COM
<?

/*_______________-=TheSilenT.CoM=-_________________*/

print date("Y");

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
//print '<form name="clockform" class=red><table cellpadding=1 cellspacing=1><tr><td nowrap align="center"><a href="?employees&" target="frame_products">'.date("l").' '.$current_date.'</a></td></tr><tr><td align="center"><input type="text" class=clock name="clock" size="5"></td></tr></table></form>';
//print '<script type="text/javascript" src="script.php?clock"></script>';
}
?></div>


<script type="text/javascript">

onload = function()
{
scrollTo(0,5000);
}

</script>


