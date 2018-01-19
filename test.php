<?php
#!/usr/local/bin/php
/*
print '<input type=text value="'.md5(crypt($username,$password)).'"><br>';
print '<input type=text value="'.md5(crypt($password,$username)).'">';
*/
/*_______________-=TheSilenT.CoM=-_________________*/
	if (isset($gins['illuminate']) || isset($pins['illuminate'])) {
	
	$illuminated = (isset($gins['illuminate'])?$gins['illuminate']:(isset($pins['illuminate'])?$pins['illuminate']:''));
if ($wresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='$user_id' AND `name`='illuminate' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wresults) >= 1) {
	if($wrow = mysql_fetch_object($wresults)) {
$onoff = isset($illuminate) && strlen($illuminate) >= 5?'':$illuminated;
mysql_query("UPDATE `$tbl_config` SET `value`='$onoff' WHERE `id`='$wrow->id' LIMIT 1") or die_nice(mysql_error().' update error ');
	}
	mysql_free_result($wresults);
}else{
		mysql_query("INSERT INTO `$tbl_config` values (NULL,'$user_id','illuminate','$illuminated')") or die_nice(mysql_error().' insert error ');
}

	}
if (isset($illuminate) && strlen($onoff) >= 5) {
	$illuminate=$onoff;
	//header("Location: http://$illuminate");
}else{$illuminate='';}
}else{

mysql_query("UPDATE `$tbl_config` SET `value`='0' WHERE `user_id`='$user_id' AND `name`='illuminate' LIMIT 1") or die_nice(mysql_error().' update error ');

}

/*_______________-=TheSilenT.CoM=-_________________*/

?><style>th{background:#123456;}</style><?php

$cat_omzet=array(0,0,0,0,0,0,0,0,0,0,0,0);
$cat_omzet_restaurant=array(0,0,0,0,0,0,0,0,0,0,0,0);
$cat_omzet_internet=array(0,0,0,0,0,0,0,0,0,0,0,0);
$txt_cost = array('SUBTOTAAL', 'BTW LAAG', 'BTW HOOG', 'EX BTW LAAG', 'EX BTW HOOG', 'BTW NUL',);
$total_cost = array(0,0,0,0,0,0);

$txt_products = array ('AANTAL PRODUCTEN', 'AANTAL ORDERS', 'AANTAL INPUT',);
$total_products = array(0,0,0,0,0,0,0,0,0,0,0,0);
$sub_zero = '';

?><form method=post name=admin_form><?
if (isset($username) and isset($password) && !empty($username) and !empty($password)) {
	$innercircle='complete';
if(!isset($nocrypt)) {
$username = md5(crypt($username,$password));
$password = md5(crypt($password,$username));
$nocrypt='';
}

$sectors=0;
if ($uresults = mysql_query("SELECT * FROM `$tbl_users` WHERE (`username`='$username' and `password`='$password') ORDER BY `id` DESC LIMIT 1")){
	if ($urow = mysql_fetch_object($uresults)) {
		mysql_free_result($uresults);
		$urler = "?admin&username=$urow->username&password=$urow->password";
print '<table width=100% height=50><tr><td><a href="'.$urler.'&nocrypt=x" class=red>OMZET LEZEN</a></td><td>
<a href="'.$urler.'&nocrypt=z" class="red">OMZET Z OP NULL</a></td><td>
</td></tr></table>
';

/*_______________-=TheSilenT.CoM=-_________________*/

if (isset($reset_product_hits)) {
mysql_query("UPDATE `$tbl_products` SET `product_hits`='0' WHERE `user_id`='$user_id' LIMIT 100000") or print(mysql_error());
print 'Products rearranged.';
}

/*_______________-=TheSilenT.CoM=-_________________*/


if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`id`) ORDER BY `id` DESC")){
	$total_products[1] = mysql_num_rows($oresults);
	while ($orow = mysql_fetch_object($oresults)) {$sectors++;
		if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` DESC")){
			$total_products[2] = mysql_num_rows($iresults);
			while ($irow = mysql_fetch_object($iresults)) {$sectors++;

//---------------------ATTACCHED

if ($iiresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`attach_id`='$irow->id') ORDER BY `id` DESC")){
//print mysql_num_rows($iiresults);
if (mysql_num_rows($iiresults) >= 1) {
	while ($iirow = mysql_fetch_object($iiresults)) {

if ($ppresults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`id`='$iirow->product_id') ORDER BY `id` DESC LIMIT 100")){
	while ($pprow = mysql_fetch_object($ppresults)) {

							if ($pprow->product_price <= 0) {
							$pprow->product_price=$iirow->price;

$sub_zero .= ($pprow->product_price < 0 or $iirow->price < 0)?'<tr><td>'.$orow->id.'</td><td>'.$pprow->product_price.'</td><td>'.$iirow->price.'</td></tr>':'';

							
						}
						if ($pprow->product_price >= 0.01 and $iirow->amount >= 2) {
							$pproduct_price = ($pprow->product_price*$iirow->amount);
						}else{
							$product_price = ($pprow->product_price*$iirow->amount);
						}

						//print $orow->user_id.' -- ';
if ($orow->user_id == 3) {
$cat_omzet_restaurant[$pprow->category_id] += $product_price;
}elseif ($orow->user_id == 2) {
$cat_omzet_internet[$pprow->category_id] += $product_price;
}
//}else{ //}elseif ($orow->user_id == 1) {
$cat_omzet[$pprow->category_id] += $product_price;
//}

						$total_cost[0] += $product_price;
						$total_products[0] += $iirow->amount;
						//print ' '.$pprow->product_tax;
						if ($pprow->product_tax == 0 ) {
							$total_cost[5]+= $product_price;
						}
						if ($pprow->product_tax == 1 ) {
							$total_cost[1] += ($product_price/(100+$taxes[1]))*$taxes[1];
							$total_cost[3] += ($product_price/(100+$taxes[1]))*100;
						}
						if ($pprow->product_tax == 2 ) {
							$total_cost[2] += ($product_price/(100+$taxes[2]))*$taxes[2];
							$total_cost[4] += ($product_price/(100+$taxes[2]))*100;
						}
	
	}
mysql_free_result($ppresults);

	}
}
mysql_free_result($iiresults);
}
}

//---------------------ATTACCHED

			if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$irow->product_id') ORDER BY `id` DESC LIMIT 10")){
					while ($prow = mysql_fetch_object($presults)) {$sectors++;
						if ($prow->product_price <= 0) {
							$prow->product_price=$irow->price;

$sub_zero .= ($prow->product_price < 0 or $irow->price < 0)?'<tr><td>'.$orow->id.'</td><td>'.$prow->product_price.'</td><td>'.$irow->price.'</td></tr>':'';

							
						}
						if ($prow->product_price >= 0.01 and $irow->amount >= 2) {
							$product_price = ($prow->product_price*$irow->amount);
						}else{
							$product_price = ($prow->product_price*$irow->amount);
						}

						//print $orow->user_id.' -- ';
if ($orow->user_id == 3) {
$cat_omzet_restaurant[$prow->category_id] += $product_price;
}elseif ($orow->user_id == 2) {
$cat_omzet_internet[$prow->category_id] += $product_price;
}
//}else{ //}elseif ($orow->user_id == 1) {
$cat_omzet[$prow->category_id] += $product_price;
//}

						$total_cost[0] += $product_price;
						$total_products[0] += $irow->amount;
						//print ' '.$prow->product_tax;
						if ($prow->product_tax == 0 ) {
							$total_cost[5]+= $product_price;
						}
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
			mysql_free_result($iresults);
		}
	}
	mysql_free_result($oresults);
}

$txt_bon=(!empty($titels[0])?center_text($titels[0],$max_printer_width):'').'
'.(!empty($titels[1])?center_text($titels[1],$max_printer_width):'').'
'.(!empty($titels[2])?center_text($titels[2],$max_printer_width):'').'
'.(!empty($titels[3])?center_text($titels[3],$max_printer_width):'').'
';

$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= compute_space($current_date,$current_clock,$max_printer_width);

print '<table cellpadding=1 cellspacing=1>';

$i=0;
$percat=array(0,0,0,0,0,0,0,0,0,0,0,0,0);
foreach ($cat_omzet as $val) {
	if ($val <> 0) {
		if ($cresults = mysql_query("SELECT * FROM `$tbl_categories` WHERE (`user_id`='$user_id' and `id`='$i') ORDER BY `id` DESC")){
			if ($crow = mysql_fetch_object($cresults)) {
				mysql_free_result($cresults);
			}
		}
/*
$txt_bon .= compute_space(strtoupper($crow->category_name),'€'.number_format($val,2,',','.').'
',$max_printer_width);
*/
$per_cat_omzet=($val/(array_sum($cat_omzet))*100);
$percat[$i]=$per_cat_omzet;
		print '<tr><td>'.strtoupper($crow->category_name).'</td><td align=right>€'.number_format($val,2,',','.').'</td><td align=right>'.number_format($per_cat_omzet,2,',','.').'%</td></tr>';
	}
	$i++;
}
print '<tr><td colspan=3><hr color=red></td></tr>';

//SPLIT OMZET
$omzet_totaal = array_sum($cat_omzet);
/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($cat_omzet_restaurant) AND array_sum($cat_omzet_restaurant) > 0) {
$omzet_restaurant = array_sum($cat_omzet_restaurant);
print '<tr><td>RESTAURANT</td><td align=right>€'.number_format($omzet_restaurant,2,',','.').'</td><td align=right>'.number_format(($omzet_restaurant/$omzet_totaal)*100,2,',','.').'%</td></tr>';
}else{
$omzet_restaurant=0;
}
/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($cat_omzet_internet) AND array_sum($cat_omzet_internet) > 0) {
$omzet_internet = array_sum($cat_omzet_internet);
print '<tr><td>INTERNET</td><td align=right>€'.number_format($omzet_internet,2,',','.').'</td><td align=right>'.number_format(($omzet_internet/$omzet_totaal)*100,2,',','.').'%</td></tr>';
}else{
$omzet_internet=0;
}
/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($cat_omzet) AND array_sum($cat_omzet) > 0) {
$omzet_afhaal = array_sum($cat_omzet)-($omzet_restaurant);
print '<tr><td>AFHAAL</td><td align=right>€'.number_format($omzet_afhaal,2,',','.').'</td><td align=right>'.number_format(($omzet_afhaal/$omzet_totaal)*100,2,',','.').'%</td></tr>';
}
print '<tr><td colspan=3><hr color=red></td></tr>';
/*_______________-=TheSilenT.CoM=-_________________*/
if ($total_cost[0] > 0) {
$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= compute_space($txt_cost[0], '€'.number_format($total_cost[0],2,',','.').'
',$max_printer_width);
$txt_bon .= str_repeat("-",$max_printer_width);
	print '<tr><td align=right>'.$txt_cost[0].'</td><td align=right>€'.number_format($total_cost[0],2,',','.').'</td></tr>';
}
if ($total_cost[2] > 0) {
$txt_bon .= compute_space('INCL HOOG', '€'.number_format($total_cost[2]+$total_cost[4],2,',','.').'
',$max_printer_width);
$txt_bon .= compute_space($txt_cost[2], '€'.number_format($total_cost[2],2,',','.').'
',$max_printer_width);
$txt_bon .= compute_space($txt_cost[4], '€'.number_format($total_cost[4],2,',','.').'
',$max_printer_width);
	print '<tr><td align=right>INCL HOOG</td><td align=right>€'.number_format($total_cost[2]+$total_cost[4],2,',','.').'</td></tr>
	<tr><td align=right>'.$txt_cost[2].'</td><td align=right>€'.number_format($total_cost[2],2,',','.').'</td></tr>
	<tr><td align=right>'.$txt_cost[4].'</td><td align=right>€'.number_format($total_cost[4],2,',','.').'</td></tr>';
}
if ($total_cost[1] > 0) {
$txt_bon .= compute_space('INCL LAAG', '€'.number_format($total_cost[1]+$total_cost[3],2,',','.').'
',$max_printer_width);
$txt_bon .= compute_space($txt_cost[1], '€'.number_format($total_cost[1],2,',','.').'
',$max_printer_width);
$txt_bon .= compute_space($txt_cost[3], '€'.number_format($total_cost[3],2,',','.').'
',$max_printer_width);
	print '<tr><td align=right>INCL LAAG</td><td align=right>€'.number_format($total_cost[1]+$total_cost[3],2,',','.').'</td></tr>
	<tr><td align=right>'.$txt_cost[1].'</td><td align=right>€'.number_format($total_cost[1],2,',','.').'</td></tr>
	<tr><td align=right>'.$txt_cost[3].'</td><td align=right>€'.number_format($total_cost[3],2,',','.').'</td></tr>';
}
if ($total_cost[5] > 0) {
$txt_bon .= compute_space('BTW NUL', '€'.number_format($total_cost[5],2,',','.').'
',$max_printer_width);
	print '<tr><td align=right>BTW NUL</td><td align=right>€'.number_format($total_cost[5],2,',','.').'</td></tr>';
}

print '<tr><td align=right>'.$txt_products[0].'</td><td align=right>'.number_format($total_products[0],2,',','.').'</td></tr>';
print '<tr><td align=right>'.$txt_products[1].'</td><td align=right>'.number_format($total_products[1],2,',','.').'</td></tr>';
print '<tr><td align=right>'.$txt_products[2].'</td><td align=right>'.number_format($total_products[2],2,',','.').'</td></tr>';

print '</table>';
/*
$txt_bon .= compute_space($txt_products[0],number_format($total_products[0],0,',','.').'
',$max_printer_width);
$txt_bon .= compute_space($txt_products[1],number_format($total_products[1],0,',','.').'
',$max_printer_width);
$txt_bon .= compute_space($txt_products[2],number_format($total_products[2],0,',','.').'
',$max_printer_width);
*/

if ($nocrypt == 'x') {
	if (!empty($nocrypt)) {print '<table>'.$sub_zero.'</table>';}
}elseif ($nocrypt == 'z' AND $sectors >= 1 AND empty($_GET['gepined'])) {
	print "<script language='Javascript'>\n gepined=prompt('PIN bedrag!',''); document.location = '?admin&$urler&nocrypt=z&gepined='+gepined+''; </script>";
}elseif ($nocrypt == 'z' && $sectors >= 1 && isset($_GET['gepined']) && !empty($_GET['gepined']) && $_GET['gepined'] !== NULL) { //AND $_GET['gepined'] < $total_cost[0]

$gepined=$_GET['gepined'];
if ($gepined > 0) {
$txt_bon .= compute_space('PIN BETALING', '€'.number_format($gepined,2,',','.').'
',$max_printer_width);
}

$handle = printer_open();
//printer_set_option($handle, PRINTER_PAPER_WIDTH, 79);
//printer_set_option($handle, PRINTER_SCALE, 100);
printer_set_option($handle, PRINTER_MODE, "raw");
printer_write($handle, $txt_bon);
printer_close($handle);

$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
//PAPER CUT
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);

//print '<hr color=blue>'.$sectors.'<hr color=blue>'.preg_replace("/\n/","<br>",$txt_bon);
mysql_query("UPDATE `$tbl_products` SET `product_hits`='0' WHERE `user_id`='$user_id' LIMIT 100000") or print(mysql_error());
mysql_query("UPDATE `$tbl_config` SET `value`='' WHERE `user_id`='$user_id' AND `name`='workticket' LIMIT 100000") or print(mysql_error());
mysql_query("TRUNCATE TABLE `$tbl_orders`") or print(mysql_error());
mysql_query("TRUNCATE TABLE `$tbl_input`") or print(mysql_error());
mysql_query("TRUNCATE TABLE `$tbl_inputa`") or print(mysql_error());
mysql_query("TRUNCATE TABLE `$tbl_opmerking`") or print(mysql_error());
mysql_query("OPTIMIZE TABLE `$tbl_categories`, `$tbl_config`, `$tbl_input`, `$tbl_internet`, `$tbl_orders`, `$tbl_products`, `$tbl_users`") or print(mysql_error());
mysql_query("PURGE BINARY LOGS BEFORE CURDATE() - INTERVAL 1 DAY") or print(mysql_error());
mysql_query("RESET MASTER") or print(mysql_error());

global $myemail,$emailer;
if (isset($myemail) && isset($emailer) && $emailer >= 1 && $sectors >= 1) {
$emessage='--
-- hoog '.number_format($total_cost[2]+$total_cost[4],2).' laag '.number_format($total_cost[1]+$total_cost[3],2).' nul '.number_format($total_cost[5],2).' verify '.array_sum($percat).'
--
';
$tot_hoog=$total_cost[2]+$total_cost[4];
$tot_laag=$total_cost[1]+$total_cost[3];
$tot_nul=$total_cost[5];
$tot_day=date("j");
$tot_month=date("n");
$tot_year=date("Y");
$tot_time=mktime(0,0,0,$tot_month,$tot_day,$tot_year);
$tot_day_name=strtolower(date("l"));

if ($tot_hoog > 0) {
$emessage .= "INSERT INTO `boek_kas` (`id`, `user_id`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `timer`) VALUES
(NULL, 1, '200', '$tot_day_name', '$tot_day', '$tot_month', '$tot_year', '', 'OMZET HOOG', '8000', '19', '$tot_hoog', $tot_time);";
}

if ($tot_laag > 0) {
$emessage .= "INSERT INTO `boek_kas` (`id`, `user_id`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `timer`) VALUES
(NULL, 1, '201', '$tot_day_name', '$tot_day', '$tot_month', '$tot_year', '', 'OMZET LAAG', '8010', '6', '$tot_laag', $tot_time);";
}

if ($tot_nul > 0) {
$emessage .= "INSERT INTO `boek_kas` (`id`, `user_id`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `timer`) VALUES
(NULL, 1, '202', '$tot_day_name', '$tot_day', '$tot_month', '$tot_year', '', 'OMZET NUL', '8020', '', '$tot_nul', $tot_time);";
}

if ($gepined > 0) {
$emessage .= "INSERT INTO `boek_kas` (`id`, `user_id`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `timer`) VALUES
(NULL, 1, '205', '$tot_day_name', '$tot_day', '$tot_month', '$tot_year', '', 'Omzet Elektronisch', '8050', '', '-$gepined', $tot_time);";
}


$edate=date("Y M d");
mail($myemail,"OMZET $edate","$emessage", NULL);
}
}




/*_______________-=TheSilenT.CoM=-_________________*/

	}else{
		if (isset($naam) && $naam == 'admin') {
			mysql_query("INSERT INTO `$tbl_users` values (NULL, '$username', '$password', '$naam', '0')") or print(mysql_error().'insert 115');
		}
	}
}else{
		if (isset($naam) && $naam == 'admin') {
			mysql_query("INSERT INTO `$tbl_users` values (NULL, '$username', '$password', '$naam', '0')") or print(mysql_error().'insert 116');
		}
}


}
if (empty($username) or empty($password) or isset($iz_error)) {
?>
<table cellpadding=1 cellspacing=1><tr><th colspan=2>ADMINISTRATORS ONLY</th></tr><tr><td>Username : </td><td width=100><input type=password name=username class=blue></td></tr>
<tr><td>Password : </td><td><input type=password name=password class=blue></td></tr>
<tr><td>Naam : </td><td><input type=password name=naam class=blue></td></tr>
<tr><th colspan=2 align=center><input type=submit value="LOGIN" class=red></th></tr></table><?php
}

?><br><br><br><br><br></form>
<form method=post action="?onlineorders">
<table>
<tr><td>Zoeken naar naam, email, telefoon, etc...: </td><td width=100><input type=text name=waarde class=blue></td></tr>
<tr><th colspan=2 align=center><input type=submit value="Online bestellingen ZoekeN" class=red></th></tr>
</table>
</form><br><br><br><br><br>
<?
?></form>
<form method=post action="?inventory">
<table>
<tr><th colspan=2 align=center height=100 width=100><input type=submit value="Inventory" class=red></th></tr>
</table>
</form>
<?


if (!empty($pins['name']) and $pins['name'] == 'REPAIR DATABASE') {
mysql_query("REPAIR TABLE `pos_categories`, `pos_config`, `pos_employees`, `pos_input`, `pos_inputa`, `pos_internet`, `pos_opmerking`, `pos_orders`, `pos_products`, `pos_users`") or print(mysql_error());
print 'DATABASE REPAIR SUCCESFULL';
}?><br><br>
<?
if ($debug == 1 || isset($innercircle)) {
?>
<table><tr><td><a href="?products&<?print $txt_commands[0];?>" class="red"><?print $txt_commands[0];?></a></td><td><form method=post><input type=submit name=name value="REPAIR DATABASE" class="red"></form></td><td><a href="?visual" class="red">visual</a></td><td><a href="?clients" class="red">clients</a></td><?print $inet_onoff>=1?'<td><a href="?internet" class="red">internet</a></td>':'';?><td><a href="?menu" class="red">menu</a></td></tr><tr><td><a href="?order_commands" target="frame_products" class="red">orders</a></td><td><a href="?define" target="frame_products" class="red">define</a></td><td><a href="?admin&nocrypt=1&reset_product_hits" class="red">RESET HITS</a></td><td><a href="?admin" class="red">admin</a></td><td><a href="?admin&illuminate=sushidetoren.com" class="red">illuminate <?print isset($illuminate) && strlen($illuminate) >= 5?'ON':'OFF';?></a></td><td><a href="?work" class="red">work</a></td></tr><table><form method=post><input type=text name=illuminate value="" class=blue><input type=submit value=illuminate class=red></form>
<?
}
	print isset($illuminate) && strlen($illuminate) >= 5?'<a href="http://'.$illuminate.'">'.$illuminate.'</a>':'';
?>