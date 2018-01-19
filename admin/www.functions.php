<?php
#!/usr/local/bin/php
/*
###_______________-=TheSilenT.CoM=-_______________###
Project name	: Project name
Script name	: Script name
Version		: 1.00
Release date	: 24-2-2010 14:38:46
Last Update	: 24-2-2010 14:38:46
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
/*_______________-=TheSilenT.CoM=-_________________*/
function inventorization($category_id, $product_number,$product_name) {
global $inventorize,$tbl_inventory,$inventorize_populize;
if (in_array($category_id,$inventorize)) {

if ($imresults = mysql_query("SELECT * FROM `$tbl_inventory` WHERE (`product_number`='$product_number' AND `category_id`='$category_id') ORDER BY `id` DESC LIMIT 1")){
if (mysql_num_rows($imresults) >= 1) {
if ($imrow = mysql_fetch_object($imresults)) {
mysql_query("UPDATE `$tbl_inventory` SET `out`=`out`+1 WHERE (`product_number`='$product_number' AND `category_id`='$category_id') LIMIT 1") or print(mysql_error());
mysql_free_result($imresults);
//print 'OIOIOI';
}
}else{
//print 'AIAIAIAI';
if ($inventorize_populize == 1) {
mysql_query("INSERT INTO `$tbl_inventory` values (NULL, '$category_id', '$product_name', '$product_number', 0, 0, 0)") or print(mysql_error().'insert 115');
}
}
}else{
//print 'ZIOZIO';
if ($inventorize_populize == 1) {
mysql_query("INSERT INTO `$tbl_inventory` values (NULL, '$category_id', '$product_name', '$product_number', 0, 0, 0)") or print(mysql_error().'insert 115');
}
}
}
}
/*_______________-=TheSilenT.CoM=-_________________*/
function changer($payed,$costs) {
$ia = round(($payed-$costs)*100);
//print $ia.'||';
$txt='<table cellpadding=0 cellspacing=0 border=0>';
if ($ia >= 50000) {
for ($i=0;$ia >= 50000;$i++) {
$ia -= 50000;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 500.00</td></tr>';
}

if ($ia >= 20000) {
for ($i=0;$ia >= 20000;$i++) {
$ia -= 20000;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 200.00</td></tr>';
}

if ($ia >= 10000) {
for ($i=0;$ia >= 10000;$i++) {
$ia -= 10000;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 100.00</td></tr>';
}

if ($ia >= 5000) {
for ($i=0;$ia >= 5000;$i++) {
$ia -= 5000;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 50.00</td></tr>';
}

if ($ia >= 2000) {
for ($i=0;$ia >= 2000;$i++) {
$ia -= 2000;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 20.00</td></tr>';
}

if ($ia >= 1000) {
for ($i=0;$ia >= 1000;$i++) {
$ia -= 1000;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 10.00</td></tr>';
}

if ($ia >= 500) {
for ($i=0;$ia >= 500;$i++) {
$ia -= 500;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 5.00</td></tr>';
}

if ($ia >= 200) {
for ($i=0;$ia >= 200;$i++) {
$ia -= 200;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 2.00</td></tr>';
}

if ($ia >= 100) {
for ($i=0;$ia >= 100;$i++) {
$ia -= 100;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 1.00</td></tr>';
}

if ($ia >= 50) {
for ($i=0;$ia >= 50;$i++) {
$ia -= 50;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 0.50</td></tr>';
}

if ($ia >= 20) {
for ($i=0;$ia >= 20;$i++) {
$ia -= 20;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 0.20</td></tr>';
}

if ($ia >= 10) {
for ($i=0;$ia >= 10;$i++) {
$ia -= 10;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 0.10</td></tr>';
}

if ($ia >= 5) {
for ($i=0;$ia >= 5;$i++) {
$ia -= 5;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 0.05</td></tr>';
}
if ($ia >= 2) {
for ($i=0;$ia >= 2;$i++) {
$ia -= 2;
}
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 0.02</td></tr>';
}
if ($ia >= 1) {
for ($i=0;$ia >= 1;$i++) {
$ia -= 1;
}
//$txt .= $i.' x 0.01<br>';
$txt .= '<tr><td>'.$i.'</td><td>x</td><td>€ 0.01</td></tr>';
}
//print $ia.'|zz|';
return $txt.'</table>';
}
/*_______________-=TheSilenT.CoM=-_________________*/
function inputa_insert() {
}
/*_______________-=TheSilenT.CoM=-_________________*/
function inputa_clean() {
}
/*_______________-=TheSilenT.CoM=-_________________*/

/*_______________-=TheSilenT.CoM=-_________________*/
function restaurant_order_status($order_status,$user_id) {

if ($order_status == 3) {
return 'rticketconfirm';
}elseif ($order_status == 2) {
return 'rticketnota';
}elseif ($order_status == 4){
return 'crticket';
}elseif ($user_id == 3){
return 'rticket';
}else{
return 'ticket';
}

}
/*_______________-=TheSilenT.CoM=-_________________*/
function ticket_numbers($orow,$in,$reload) {
global $txt_commands,$user_id,$inet_user_id,$restaurant_user_id,$user_id;
			if (isset($GLOBALS['workticket']) and $orow->id == $GLOBALS['workticket']) {
$classy='aticket';
			}elseif ($orow->user_id == $user_id) {
$classy='ticket';
			}elseif ($orow->user_id == $inet_user_id) {
$classy='iticket';
			}elseif ($orow->user_id == $restaurant_user_id) {
if ($orow->order_status == 4) {
$classy='crticket';
}elseif ($orow->order_status == 3) {
$classy='rticketconfirm';
}elseif ($orow->order_status == 2) {
$classy='rticketnota';
}elseif ($orow->user_id == 3) {
$classy='rticket';
}else{
$classy='ticket';
}
		}else{
$classy='ticket';
		}
print '<td height=38><a href="?orders&workticket='.$orow->id.'" class="'.$classy.'" target="frame_orders"'.($reload == 1?' onclick="location.href=\'?'.$in.'&workticket='.$orow->id.'\'"':'').'>'.(isset($GLOBALS['restaurant_num']) && $orow->user_id == $restaurant_user_id && !empty($orow->order_name)?'':$orow->id.' ').(!empty($orow->order_name)?$orow->order_name:'').'</a></td>';

}
/*_______________-=TheSilenT.CoM=-_________________*/
function is_connected($in) { 
	if (empty($in)) {
		$in='www.xbros.com';
	}
     $connected = @fsockopen($in, 80); 
    if ($connected){ 
        $is_conn = true; 
        fclose($connected); 
    }else{ 
        $is_conn = false; 
    } 
    return $is_conn; 
    
}//end is_connected function 

/*_______________-=TheSilenT.CoM=-_________________*/

function print_file($filename)
{
    // path to your adobe executable
    $adobe_path='"C:/Program Files/Adobe/Acrobat 7.0/Reader/AcroRd32.exe"';

    $ext='';
    $ext=strrchr($filename,'.');
    $ext=substr($ext,1);
    $ext_xl=substr($ext,0,2);

    if ($ext=='pdf') {
        shell_exec ($adobe_path.' /t '.$filename);
    }
    else if ($ext=='doc'||$ext=='rtf'||$ext=='txt') {
        $word = new COM("Word.Application");
        $word->visible = true;
        $word->Documents->Open($filename);
        $word->ActiveDocument->PrintOut();
        $word->ActiveDocument->Close();
        $word->Quit();
    }
    else if ($ext_xl=='xl') {
        $excel = new COM("Excel.Application");
        $excel->visible = true;
        $excel->Workbooks->Open($filename);
        $excel->ActiveWorkBook->PrintOut();
        $excel->ActiveWorkBook->Close();
        $excel->Quit();
    }
}

// example of printing a PDF

//print_file("G:\pos\bon.pdf");
/*_______________-=TheSilenT.CoM=-_________________*/
$search=array("'fuck'i","'nigger'i","'vagina'i","'pussy'i","'penis'i");
$replace=array("","","","","","","","","","",);


/*_______________-=TheSilenT.CoM=-_________________*/

function die_nice($in){
print '<table><tr><th>'.$in.'</th></tr></table>';
}
/*_______________-=TheSilenT.CoM=-_________________*/

function clean_post($in){
	global $search,$replace;
$in=preg_replace($search,$replace,$in);
//$in=htmlentities($in,ENT_QUOTES);
//$in=strip_tags($in);
//$in=trim($in);
//$in=addslashes($in);
return $in;
}

/*_______________-=TheSilenT.CoM=-_________________*/

$gins=array();
$fgins=0;
if (!empty($_GET)) {
	foreach ($_GET as $key=>$val) {
if ($val !== 'null') {
	$gins[$key]=clean_post($val);
		$fgins++;
}
		}
}

$pins=array();
$fpins=0;
if (!empty($_POST)) {
	foreach ($_POST as $key=>$val) {
if ($val !== 'null') {
	$pins[$key]=clean_post($val);
		$fpins++;
}
	}
}

$cins=array();
$fcins=0;
if (!empty($_COOKIE)) {
	foreach ($_COOKIE as $key=>$val) {
if ($val !== 'null') {
	$cins[$key]=clean_post($val);
		$fcins++;
}
	}
}


/*_______________-=TheSilenT.CoM=-_________________*/


if (!empty($_GET)) {
	foreach ($_GET as $key=>$val) {
	$$key=clean_post($val);
	}
}

if (!empty($_POST)) {
	foreach ($_POST as $key=>$val) {
	$$key=clean_post($val);
	}
}

if (!empty($_COOKIE)) {
	foreach ($_COOKIE as $key=>$val) {
	$$key=clean_post($val);
	}
}

/*_______________-=TheSilenT.CoM=-_________________*/

/*
admin_setpassword()
admin_omzet(1)//1 lezen 2 opmaken


orders_new_order($user_id)

orders_retrieve_order($order_id)
orders_cancelled($order_id)

orders_add_new_product($product_id)
orders_minus_product($product_id,$amount)
orders_plus_product($product_id,$amount)

orders_delete_product($product_id)

orders_print_order($order_id,$printer)

*/

/*_______________-=TheSilenT.CoM=-_________________*/

function orders_minus_product($order_id,$input_id,$amount) {
	global $tbl_input,$tbl_inputa,$current_time;
if (isset($_GET['dproduct_id']) AND !empty($_GET['dproduct_id'])) {
//print 'AIAIAIAIA';
$product_id = $_GET['dproduct_id'];
	if ($iresults = mysql_query("SELECT * FROM `$tbl_inputa` WHERE (`order_id`='$order_id' and `product_id`='$product_id') ORDER BY `id` DESC LIMIT 1")){
		if ($irow = mysql_fetch_object($iresults)) {
			mysql_free_result($iresults);
			if ($irow->amount >= 1) {
mysql_query("UPDATE `$tbl_inputa` SET `amount`=`amount`-$amount, `timer`='$current_time' WHERE `id`='$irow->id' LIMIT 1") or die(mysql_error());
			}else{
			
			}
		}
	}
}

	if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$order_id' and `id`='$input_id') ORDER BY `id` DESC LIMIT 1")){
		if ($irow = mysql_fetch_object($iresults)) {
			mysql_free_result($iresults);
			if ($irow->amount >= 1) {
mysql_query("UPDATE `$tbl_input` SET `amount`=`amount`-$amount, `timer`='$current_time' WHERE `id`='$irow->id' LIMIT 1") or die(mysql_error());
			}else{
			
			}
		}
	}

}

/*_______________-=TheSilenT.CoM=-_________________*/

function orders_plus_product($order_id,$input_id,$amount) {
	global $tbl_input,$current_time;
	if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$order_id' and `id`='$input_id') ORDER BY `id` DESC LIMIT 1")){
		if ($irow = mysql_fetch_object($iresults)) {
			mysql_free_result($iresults);
mysql_query("UPDATE `$tbl_input` SET `amount`=`amount`+$amount, `timer`='$current_time' WHERE `id`='$irow->id' LIMIT 1") or die(mysql_error());
		}
	}
}
/*_______________-=TheSilenT.CoM=-_________________*/

function orders_cancelled($order_id) {
global $tbl_orders,$user_id,$tbl_input,$current_time;

if ($order_id > 0) {
	$where_iz = "(`id`='$order_id' AND `user_id`='$user_id')";
}else{
	$where_iz = "(`id` AND `user_id`='$user_id')";
}

if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE $where_iz ORDER BY `id` DESC LIMIT 1")){
	if ($orow = mysql_fetch_object($oresults)) {
		mysql_free_result($oresults);
		if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` DESC LIMIT 1000")){
			while ($irow = mysql_fetch_object($iresults)) {
				mysql_query("UPDATE `$tbl_input` SET `amount`='0', `timer`='$current_time' WHERE `id`='$irow->id' LIMIT 1") or die(mysql_error());
			}
			mysql_free_result($iresults);
		}
	}
}
}

/*_______________-=TheSilenT.CoM=-_________________*/

function orders_new_order($user_id) {
global $tbl_orders,$current_date,$current_clock,$current_time,$tbl_input;

if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT 1")){
	if ($orow = mysql_fetch_object($oresults)) {
		mysql_free_result($oresults);

if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` DESC LIMIT 1")){
	if ($irow = mysql_fetch_object($iresults)) {

if(mysql_num_rows($iresults) >= 1) {
		mysql_free_result($iresults);
mysql_query("INSERT INTO `$tbl_orders` values (NULL, '','','','','0.00','0.00','0','$user_id','$current_date $current_clock','$current_time')") or die(mysql_error().'insert 110');
}
	}
}

}else{mysql_query("INSERT INTO `$tbl_orders` values (NULL, '','','','','0.00','0.00','0','$user_id','$current_date $current_clock','$current_time')") or die(mysql_error().'insert 111');}
}else{mysql_query("INSERT INTO `$tbl_orders` values (NULL, '','','','','0.00','0.00','0','$user_id','$current_date $current_clock','$current_time')") or die(mysql_error().'insert 112');}

}

/*_______________-=TheSilenT.CoM=-_________________*/



function center_text($txt,$max) {
$txt_length = strlen($txt);
$work_txt = $txt;

if ($txt_length > $max) {
	$work_txt = substr($work_txt,0,$max);
}elseif ($txt_length < ($max-2)) {
	$over = floor(($max-$txt_length)/2);
	$spaces=str_repeat(" ",$over);
		$work_txt = $spaces.$txt.$spaces;
	
}

return $work_txt;
}

/*_______________-=TheSilenT.CoM=-_________________*/

function compute_space($txta,$txtb,$max) {
$txta_length = strlen($txta);
$txtb_length = strlen($txtb);
$total_length = $txta_length+$txtb_length;
$work_txt='';
$spaces='';

if ($total_length >= $max) {
	$work_txt = substr($txta,0,($max-$txtb_length)).$txtb;
}

if ($total_length < $max) {
$over = floor($max-$total_length);
$spaces=str_repeat(" ",$over);
}

$work_txt = $txta.$spaces.$txtb;

return $work_txt;
}

/*_______________-=TheSilenT.CoM=-_________________*/

function make_button($header,$action,$target,$class,$hidden,$name,$value,$footer) {
print '<form method=post action="'.$action.'" target="'.$target.'">'.$header;
if (is_array($hidden)) {
	foreach ($hidden as $key=>$val) {
		print '<input type=hidden name="'.$key.'" value="'.$val.'">';
	}
}
$value = preg_replace("/ /si","
",$value);
print '<input type="submit" name="'.$name.'" value="'.$value.'" class="'.$class.'">'.$footer.'</form>';

}

/*_______________-=TheSilenT.CoM=-_________________*/

function num_pad($faction,$ftarget) {
print '<form method=post action="'.$faction.'" target="'.$ftarget.'">
<table>
<tr><td colspan=3><input type=text name=amount value=""></td></tr>
<tr><td><input type=text name=amount value="7"></td><td><input type=text name=amount value="8"></td><td><input type=text name=amount value="9"></td></tr>
<tr><td><input type=text name=amount value="4"></td><td><input type=text name=amount value="5"></td><td><input type=text name=amount value="6"></td></tr>
<tr><td><input type=text name=amount value="1"></td><td><input type=text name=amount value="2"></td><td><input type=text name=amount value="3"></td></tr>
<tr><td><input type=text name=amount value="0"></td><td><input type=text name=amount value="00"></td><td><input type=submit name=amount value="Enter"></td></tr>
</form>';
}

/*_______________-=TheSilenT.CoM=-_________________*/

$allow_HTTP_REFERER =array(
			"http://www.thesilent.com/",
			"http://thesilent.com/",
			"http://localhost/",
			);

$allow_SERVER_ADDR =array(
			'66.98.254.23',
			'127.0.0.1',
			);

function validate_referer () {
/*
global $allow_SERVER_ADDR,$allow_HTTP_REFERER;
if (empty($_SERVER['HTTP_REFERER'])) {header("Location: http://thesilent.com");exit;}
if (!in_array($_SERVER['SERVER_ADDR'],$allow_SERVER_ADDR)) {header("Location: http://thesilent.com");exit;}
foreach ($allow_HTTP_REFERER as $val) {
$val = addslashes($val);
if (!preg_match("@^$val@si",$_SERVER['HTTP_REFERER'])) {$nogo=1;}
}
if (empty($nogo)) {header("Location: http://thesilent.com");exit;}
*/
}

/*_______________-=TheSilenT.CoM=-_________________*/
function extractdis($string, $open, $close){
    $string = trim($string);
    $start  = intval(strpos($string,$open) 
                      + strlen($open));
    $end    = intval(strpos($string,$close));

    if($start == 0 || $end ==0)
    return false;

    $mytext = substr($string,$start, $end - $start);
    return $mytext;
}

/*_______________-=TheSilenT.CoM=-_________________*/


function print_direct() {
}

/*_______________-=TheSilenT.CoM=-_________________*/

function print_graphics($docname,$array_lines,$array_prices) {

global $font_size_kitchen,$font_type_kitchen,$max_printer_width_k;
$font_size_kitchenh=25;
$font_size_kitchenw=18;
$font_size_kitchen=$font_size_kitchenh;
$max_printer_width_k=20;
$font_type_kitchen='Verdana';


$p = printer_open();
printer_start_doc($p, $docname);
printer_start_page($p);
$pen = printer_create_pen(PRINTER_PEN_SOLID, 1, "000000");
$font = printer_create_font($font_type_kitchen, $font_size_kitchenh, $font_size_kitchenw, PRINTER_FW_NORMAL, false, false, false, 0);

printer_select_pen($p, $pen);
printer_select_font($p, $font);

$i=0;$j=0;
foreach ($array_lines as $val) {
if (isset($array_prices[$j])) {
$val = compute_space($val,' €'.number_format($array_prices[$j],2,',','.'),$max_printer_width_k).'
';
}
printer_draw_text($p,$val,0,$i);
$i += $font_size_kitchen;$j++;
}

printer_delete_font($font);
printer_delete_pen($pen);
printer_end_page($p);
printer_end_doc($p);
printer_close($p);
}


/*_______________-=TheSilenT.CoM=-_________________*/

function attached() {
}

/*_______________-=TheSilenT.CoM=-_________________*/
function comments() {
}

/*_______________-=TheSilenT.CoM=-_________________*/


function orders_print_order($order_id,$printer){

global $gins,$titels, $tbl_orders,$tbl_input,$tbl_inputa,$tbl_products,$tbl_categories,$tbl_opmerking,$taxes,$max_printer_width,$alertness,$tickets_copy,$user_id,$inventorize;


$total_cost = array(0,0,0,0,0);
$total_products = 0;
$cat_set=array();
$copy_sender=array();
$array_lines=array();
$array_prices=array();

$max_printer_width_k=35;
$txt_bon='';

foreach ($titels as $val) {
$txt_bon .=(!empty($val)?center_text($val,$max_printer_width):'').'
';
}
$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";

if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`id`='$order_id') ORDER BY `id` DESC LIMIT 1")){
	if ($orow = mysql_fetch_object($oresults)) {
		mysql_free_result($oresults);

//TABLE NAME 09-02-2012
$table_name='';
global $workticket;
if ($wwresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `id`='$workticket' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wwresults) >= 1) {
	if($working_row = mysql_fetch_object($wwresults)) {
$table_name = ' TAFEL'.$working_row->order_name;
$bon_footer[] = ' TAFEL#'.$working_row->order_name;
	}
	}
mysql_free_result($wwresults);
}
//TABLE NAME 09-02-2012

$txt_bon .= compute_space('BON#'.$orow->id,$table_name,$max_printer_width).'
';
$txt_bon .= compute_space($orow->order_dater,'',$max_printer_width).'
';
$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";

		if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `category_id` ASC, `product_id` ASC LIMIT 1000")){
			while ($irow = mysql_fetch_object($iresults)) {
if (!isset($cat_set[$irow->category_id])) {
	if ($cresults = mysql_query("SELECT * FROM `$tbl_categories` WHERE (`id`='$irow->category_id') ORDER BY `id` ASC LIMIT 1000")){
		if ($crow = mysql_fetch_object($cresults)) {

$cat_set[$irow->category_id]=$crow->category_name;
/*-----------------------CATEGORY SEPERATOR NAME DISABLED CONFUSING
$txt_bon .= center_text('---'.strtoupper($crow->category_name).'---',$max_printer_width).'
';
*/
/*
$txt_bon .= '
';
*/
			mysql_free_result($cresults);
		}
	}
}
				if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`id`='$irow->product_id') ORDER BY `id` DESC LIMIT 10")){
					while ($prow = mysql_fetch_object($presults)) {

					
if (in_array($prow->product_number, $alertness)) {
$prow->product_name='***'.$prow->product_name.'***';
}
/*
if ($prow->category_id == 1) {
$prow->product_name=' * '.$prow->product_name;
}
*/
if ($irow->amount >= 1) {

	if ($irow->priceab == 1 && $prow->product_price > 0 && $prow->product_priceb > 0) {
	$prow->product_price = $prow->product_priceb;
	
	}else{
	
	}
							if ($prow->product_price <= 0 and $irow->price >= 0.01) {
								$prow->product_price=$irow->price;
							}
							$product_price = ($prow->product_price*$irow->amount);

//'.number_format($prow->product_price,2,',','.').' 
$txt_bon .= compute_space($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name),' €'.number_format($product_price,2,',','.'),$max_printer_width).'
';

$array_lines[]=($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name));
$array_prices[]=$product_price;
/*_______________-=TheSilenT.CoM=-_________________*/
//COPY TICKET 12-3-2010 0:40:19
if (in_array($irow->category_id,$tickets_copy)) {
if (isset($copy_sender[$irow->category_id])) {
$copy_sender[$irow->category_id] .= compute_space($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name),' €'.number_format($product_price,2,',','.'),$max_printer_width).'
';
}else{
$copy_sender[$irow->category_id]=compute_space($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name),' €'.number_format($product_price,2,',','.'),$max_printer_width).'
';
}
}
//COPY TICKET 12-3-2010 0:40:19

/*_______________-=TheSilenT.CoM=-_________________*/

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
}//amount

/*_______________-=TheSilenT.CoM=-_________________*/
//ATTACHED
if ($iiresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`attach_id`='$irow->id') ORDER BY `id` ASC LIMIT 1000")){

while ($iirow = mysql_fetch_object($iiresults)) {
	if ($ppresults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$iirow->product_id') ORDER BY `id` DESC LIMIT 1")){
		if ($pprow = mysql_fetch_object($ppresults)) {
		mysql_free_result($ppresults);

	if ($iirow->priceab == 1 && $pprow->product_price > 0 && $pprow->product_priceb > 0) {
	$pprow->product_price = $pprow->product_priceb;
	
	}else{
	
	}
	
$product_pricea = ($pprow->product_price*$iirow->amount);

$txt_bon .= compute_space('    &'.strtolower((empty($pprow->product_number)?'':$pprow->product_number.' ').strtoupper($pprow->product_name)),'€'.number_format($product_pricea,2),$max_printer_width).'
';

$array_lines[]=('    &'.strtolower((empty($pprow->product_number)?'':$pprow->product_number.' ').strtoupper($pprow->product_name)));
$array_prices[]=$product_pricea;

$total_cost[0] += $product_pricea;
$total_products += $irow->amount;
							if ($pprow->product_tax == 1 ) {
								$total_cost[1] += ($product_pricea/(100+$taxes[1]))*$taxes[1];
								$total_cost[3] += ($product_pricea/(100+$taxes[1]))*100;
							}
							if ($prow->product_tax == 2 ) {
								$total_cost[2] += ($product_pricea/(100+$taxes[2]))*$taxes[2];
								$total_cost[4] += ($product_pricea/(100+$taxes[2]))*100;
							}
		}
	}
}
mysql_free_result($iiresults);
}
//ATTACHED
/*_______________-=TheSilenT.CoM=-_________________*/
/*_______________-=TheSilenT.CoM=-_________________*/
//OPMERKING
				if ($opmresults = mysql_query("SELECT * FROM `$tbl_opmerking` WHERE (`order_id`='$irow->id') ORDER BY `id` DESC LIMIT 10")){

			if (mysql_num_rows($opmresults) >= 1) {

				while ($opmrow = mysql_fetch_object($opmresults)) {
$txt_bon .= compute_space('    ('.strtolower($opmrow->opmerking).')','',$max_printer_width).'
';

$array_lines[]='    ('.strtolower($opmrow->opmerking).')';
$array_prices[]='';
				}
				mysql_free_result($opmresults);
			}

				}
//OPMERKING
/*_______________-=TheSilenT.CoM=-_________________*/

					}
					mysql_free_result($presults);
				}
			}
			mysql_free_result($iresults);
		}



$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";


if ($total_cost[1] > 0) {
$txt_bon .= compute_space('BTW LAAG', '€'.number_format($total_cost[1],2,',','.'),$max_printer_width).'
';
$txt_bon .= compute_space('EX BTW LAAG', '€'.number_format($total_cost[3],2,',','.'),$max_printer_width).'
';

}
if ($total_cost[2] > 0) {
$txt_bon .=compute_space('BTW HOOG', '€'.number_format($total_cost[2],2,',','.'),$max_printer_width).'
';
$txt_bon .=compute_space('EX BTW HOOG', '€'.number_format($total_cost[4],2,',','.'),$max_printer_width).'
';

}

$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";

$txt_bon .=compute_space('SUBTOTAAL','€'.number_format($total_cost[0],2,',','.').'
',$max_printer_width);




	}
}


if (!empty($orow->order_description)) {
if (preg_match("/wensen/si",$orow->order_description)) {
/*
$txt_bon = '

'.preg_replace("/opname_datum.*?$/si","",preg_replace("/^.*?wensen/si","",$orow->order_description)).
'
'.$txt_bon;
*/
/*$txt_bon = compute_space('***', '***',$max_printer_width).'
'.
compute_space('***', '***',$max_printer_width).'
'.
compute_space('***', '***',$max_printer_width).'
'.
'
'.$txt_bon;
*/
}
$txt_bon .= $orow->order_description.'
';
}

if ($printer == 1 and $total_cost[0] > 0) {

global $bon_footer;

$current_hour=date("H");
//if ($current_hour > 16 AND $current_hour < 22) {
if (isset($bon_footer)) {
$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";
$bon_footer[]=date("H:i:s");
	foreach ($bon_footer as $val) {
		$txt_bon .= center_text($val,$max_printer_width);
	}
}
//}

/*_______________-=TheSilenT.CoM=-_________________*/
//SMALL
global $txt_commands,$_GET;
$sbon=1;
$biggy = 1; //1 is small 2 is large
//if (!isset($_GET[$txt_commands[1]])) {

//print $txt_bon;

$handle = printer_open();
//printer_write($handle, preg_replace("/[a-z]/sim","",crypt($txt_bon),2).''.$txt_bon.'</b>');
global $minimium_dishes_split;
if (count($copy_sender) >= 1 AND $minimium_dishes_split < $total_products) {
$txt_bon .= str_repeat("-",$max_printer_width).compute_space('','SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width).'
';
}

printer_set_option($handle, PRINTER_MODE, "raw");
printer_write($handle,$txt_bon);
printer_close($handle);



$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
//PAPER CUT
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);

//SMALL

//print "$minimium_dishes_split < $total_products";
//KOPIE KLEIN
/* SPLIT BON DISABLED
if ($minimium_dishes_split < $total_products) {
if (!empty($copy_sender) && count($copy_sender) >= 1 && count($cat_set) >1 && !isset($gins['reprint'])) {
	foreach ($copy_sender as $key=>$val) {$sbon++;
		$handle = printer_open();

$val .= str_repeat("-",$max_printer_width).compute_space('','SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width).'
';
$val = compute_space($orow->order_dater,'BON#'.$orow->id,$max_printer_width).'
'.str_repeat("-",$max_printer_width).compute_space('',(isset($cat_set[$key])?strtoupper($cat_set[$key]).' - ':'').'SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width_k).'
'.str_repeat("-",$max_printer_width).$val;
		printer_set_option($handle, PRINTER_MODE, "raw");
		printer_write($handle,$val);
		printer_close($handle);

$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
//PAPER CUT
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);
	}
}
}
*/

}

/*_______________-=TheSilenT.CoM=-_________________*/
//remove inputa
mysql_query("DELETE FROM `$tbl_inputa` WHERE `order_id` = '$orow->id' LIMIT 1000") or print(mysql_error());
mysql_query("DELETE FROM `$tbl_inputa` WHERE `order_id` = 0 LIMIT 1000") or print(mysql_error());
//print $txt_bon;
}

/*_______________-=TheSilenT.CoM=-_________________*/
function orderprint ($order_id,$printer){
PRINT 'Bon geprint..';
global $gins,$titels, $tbl_orders,$tbl_input,$tbl_inputa,$tbl_products,$tbl_categories,$tbl_opmerking,$taxes,$max_printer_width,$alertness,$tickets_copy,$user_id,$table_name;


$total_cost = array(0,0,0,0,0);
$total_products = 0;
$cat_set=array();
$copy_sender=array();
$array_lines=array();
$array_prices=array();

$max_printer_width_k=35;
$txt_bon = '';
$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";

if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`id`='$order_id') ORDER BY `id` DESC LIMIT 1")){
	if ($orow = mysql_fetch_object($oresults)) {
		mysql_free_result($oresults);

//TABLE NAME 09-02-2012
$table_name='';
global $workticket;
if ($wwresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE `id`='$workticket' ORDER BY `id` DESC LIMIT 1")){
	if (mysql_num_rows($wwresults) >= 1) {
	if($working_row = mysql_fetch_object($wwresults)) {
$table_name = ' TAFEL'.$working_row->order_name;
$bon_footer[] = ' TAFEL#'.$working_row->order_name;
	}
	}
mysql_free_result($wwresults);
}
//TABLE NAME 09-02-2012

$txt_bon .= compute_space($table_name,'',$max_printer_width).'
';
$txt_bon .= compute_space('',$orow->order_dater,$max_printer_width).'
';

$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";

		if ($iresults = mysql_query("SELECT * FROM `$tbl_inputa` WHERE (`order_id`='$orow->id') ORDER BY `category_id` ASC, `product_id` ASC LIMIT 1000")){
			while ($irow = mysql_fetch_object($iresults)) {
if (!isset($cat_set[$irow->category_id])) {
	if ($cresults = mysql_query("SELECT * FROM `$tbl_categories` WHERE (`id`='$irow->category_id') ORDER BY `id` ASC LIMIT 1000")){
		if ($crow = mysql_fetch_object($cresults)) {

$cat_set[$irow->category_id]=$crow->category_name;
/*-----------------------CATEGORY SEPERATOR NAME DISABLED CONFUSING
$txt_bon .= center_text('---'.strtoupper($crow->category_name).'---',$max_printer_width).'
';
*/
/*
$txt_bon .= '
';
*/
			mysql_free_result($cresults);
		}
	}
}
				if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`id`='$irow->product_id') ORDER BY `id` DESC LIMIT 10")){
					while ($prow = mysql_fetch_object($presults)) {
if (in_array($prow->product_number, $alertness)) {
$prow->product_name='***'.$prow->product_name.'***';

}

if ($irow->amount >= 1) {

	if ($irow->priceab == 1 && $prow->product_price > 0 && $prow->product_priceb > 0) {
	$prow->product_price = $prow->product_priceb;
	
	}else{
	
	}
							if ($prow->product_price <= 0 and $irow->price >= 0.01) {
								$prow->product_price=$irow->price;
							}
							$product_price = ($prow->product_price*$irow->amount);

//'.number_format($prow->product_price,2,',','.').' 
$txt_bon .= compute_space($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name),' €'.number_format($product_price,2,',','.'),$max_printer_width).'
';

$array_lines[]=($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name));
$array_prices[]=$product_price;
/*_______________-=TheSilenT.CoM=-_________________*/
//COPY TICKET 12-3-2010 0:40:19
if (in_array($irow->category_id,$tickets_copy)) {
if (isset($copy_sender[$irow->category_id])) {
$copy_sender[$irow->category_id] .= compute_space($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name),' €'.number_format($product_price,2,',','.'),$max_printer_width).'
';
}else{
$copy_sender[$irow->category_id]=compute_space($irow->amount.'x'.(empty($prow->product_number)?'':$prow->product_number.' ').strtoupper($prow->product_name),' €'.number_format($product_price,2,',','.'),$max_printer_width).'
';
}
}
//COPY TICKET 12-3-2010 0:40:19

/*_______________-=TheSilenT.CoM=-_________________*/

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
}//amount

/*_______________-=TheSilenT.CoM=-_________________*/
//ATTACHED
if ($iiresults = mysql_query("SELECT * FROM `$tbl_inputa` WHERE (`attach_id`='$irow->id') ORDER BY `id` ASC LIMIT 1000")){

while ($iirow = mysql_fetch_object($iiresults)) {
	if ($ppresults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `id`='$iirow->product_id') ORDER BY `id` DESC LIMIT 1")){
		if ($pprow = mysql_fetch_object($ppresults)) {
		mysql_free_result($ppresults);

	if ($iirow->priceab == 1 && $pprow->product_price > 0 && $pprow->product_priceb > 0) {
	$pprow->product_price = $pprow->product_priceb;
	
	}else{
	
	}
	
$product_pricea = ($pprow->product_price*$iirow->amount);

$txt_bon .= compute_space('    &'.strtolower((empty($pprow->product_number)?'':$pprow->product_number.' ').strtoupper($pprow->product_name)),'€'.number_format($product_pricea,2),$max_printer_width).'
';

$array_lines[]=('    &'.strtolower((empty($pprow->product_number)?'':$pprow->product_number.' ').strtoupper($pprow->product_name)));
$array_prices[]=$product_pricea;

$total_cost[0] += $product_pricea;
$total_products += $irow->amount;
							if ($pprow->product_tax == 1 ) {
								$total_cost[1] += ($product_pricea/(100+$taxes[1]))*$taxes[1];
								$total_cost[3] += ($product_pricea/(100+$taxes[1]))*100;
							}
							if ($prow->product_tax == 2 ) {
								$total_cost[2] += ($product_pricea/(100+$taxes[2]))*$taxes[2];
								$total_cost[4] += ($product_pricea/(100+$taxes[2]))*100;
							}
		}
	}
}
mysql_free_result($iiresults);
}
//ATTACHED
/*_______________-=TheSilenT.CoM=-_________________*/
/*_______________-=TheSilenT.CoM=-_________________*/
//OPMERKING
print $irow->id.'<hr>';
				if ($opmresults = mysql_query("SELECT * FROM `$tbl_inputa` WHERE (`attach_id`='$irow->product_id') ORDER BY `id` DESC LIMIT 10")){
			if (mysql_num_rows($opmresults) >= 1) {
				while ($opmrow = mysql_fetch_object($opmresults)) {
$txt_bon .= compute_space('    ('.strtolower($opmrow->category_id).')','',$max_printer_width).'
';
$array_lines[]='    ('.strtolower($opmrow->opmerking).')';
$array_prices[]='';
				}
				mysql_free_result($opmresults);
			}

				}
//OPMERKING

/*_______________-=TheSilenT.CoM=-_________________*/

					}
					mysql_free_result($presults);
				}
			}
			mysql_free_result($iresults);
		}



$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";
$txt_bon .=compute_space('SUBTOTAAL','€'.number_format($total_cost[0],2,',','.').'
',$max_printer_width);

$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";

	}
}


if (!empty($orow->order_description)) {
$txt_bon .= $orow->order_description.'
';
}



if ($printer == 1 and $total_cost[0] > 0) {

/*_______________-=TheSilenT.CoM=-_________________*/
//SMALL
global $txt_commands,$_GET;
$sbon=1;

$handle = printer_open();
//printer_write($handle, preg_replace("/[a-z]/sim","",crypt($txt_bon),2).''.$txt_bon.'</b>');
global $minimium_dishes_split;
if (count($copy_sender) >= 1 AND $minimium_dishes_split < $total_products) {
$txt_bon .= str_repeat("-",$max_printer_width).compute_space('','SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width).'
';
}


$bon_footer=array();
//$bon_footer[]=date("H:i:s"). ' ' . $table_name;
$bon_footer[] = compute_space(date("H:i:s"),$table_name.'
',$max_printer_width);

	foreach ($bon_footer as $val) {
		$txt_bon .= center_text($val,$max_printer_width);
	}


printer_set_option($handle, PRINTER_MODE, "raw");
printer_write($handle,$txt_bon);
printer_close($handle);




$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
//PAPER CUT
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);
//SMALL
/*_______________-=TheSilenT.CoM=-_________________*/

//KOPIE KLEIN
/* SPLIT BON DISABLED
if ($minimium_dishes_split < $total_products) {
if (!empty($copy_sender) && count($copy_sender) >= 1 && count($cat_set) >1 && !isset($gins['reprint'])) {
	foreach ($copy_sender as $key=>$val) {$sbon++;
		$handle = printer_open();

$val .= str_repeat("-",$max_printer_width).compute_space('','SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width).'
';

$val = compute_space($table_name,'',$max_printer_width).'
'.compute_space('',$orow->order_dater,$max_printer_width).'
'.str_repeat("-",$max_printer_width).compute_space('',(isset($cat_set[$key])?strtoupper($cat_set[$key]).' - ':'').'SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width_k).'
'.str_repeat("-",$max_printer_width).$val;
		printer_set_option($handle, PRINTER_MODE, "raw");
		printer_write($handle,$val);
		printer_close($handle);

$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
//PAPER CUT
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);
	}
}
}
*/

}

/*_______________-=TheSilenT.CoM=-_________________*/
//remove inputa
mysql_query("DELETE FROM `$tbl_inputa` WHERE `order_id` = '$orow->id' LIMIT 1000") or print(mysql_error());
mysql_query("DELETE FROM `$tbl_inputa` WHERE `order_id` = 0 LIMIT 1000") or print(mysql_error());

//print $txt_bon;
}

/*_______________-=TheSilenT.CoM=-_________________*/

function orders_print_reservation($order_id,$printer){
global $gins,$titels, $tbl_orders,$tbl_input,$tbl_inputa,$tbl_products,$tbl_categories,$tbl_opmerking,$taxes,$max_printer_width,$alertness,$tickets_copy,$user_id;

$max_printer_width_k=35;
$txt_bon='ONLINE RESERVERING:
';



if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`id`='$order_id') ORDER BY `id` DESC LIMIT 1")){
	if ($orow = mysql_fetch_object($oresults)) {
		mysql_free_result($oresults);
	}
}
$txt_bon .= compute_space($orow->order_dater,'BON#'.$orow->id,$max_printer_width).'
';
$txt_bon .= str_repeat("-",$max_printer_width);
$txt_bon .= "
";

if (!empty($orow->order_description)) {
$txt_bon .= $orow->order_description.'
';
}

if ($printer == 1) {

//SMALL
global $txt_commands,$_GET;
$sbon=1;
$biggy = 1; //1 is small 2 is large
//if (!isset($_GET[$txt_commands[1]])) {
if ($biggy = 1) {
//print $txt_bon;

$handle = printer_open();
//printer_write($handle, preg_replace("/[a-z]/sim","",crypt($txt_bon),2).''.$txt_bon.'</b>');
if (isset($copy_sender) AND count($copy_sender) >= 1) {
$txt_bon .= str_repeat("-",$max_printer_width).compute_space('','SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width).'
';
}

printer_set_option($handle, PRINTER_MODE, "raw");
printer_write($handle,$txt_bon);
printer_close($handle);



$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
//PAPER CUT
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);
}else{
//SMALL
/*_______________-=TheSilenT.CoM=-_________________*/
global $font_size_kitchen,$font_type_kitchen,$max_printer_width_k;
//BIG

$font_type_kitchen_header='Bonzai';
$font_type_kitchen='Arial';
$max_printer_width_k = 55;
$docname='big';
$font_size_kitchen_h=28;
$font_size_kitchen_w=16;

//print_graphics($docname,$array_lines,$array_prices);

//KOPIE GROOT
$p = printer_open();
//printer_set_option($p, PRINTER_PAPER_FORMAT, PRINTER_FORMAT_B5);
printer_start_doc($p, "Testpage");
printer_start_page($p);


//logo print
$pen = printer_create_pen(PRINTER_PEN_SOLID, 1, "000000");
$font = printer_create_font($font_type_kitchen_header, 88, 38, PRINTER_FW_MEDIUM, false, false, false, 0);
printer_select_pen($p, $pen);
printer_select_font($p, $font);
printer_draw_text($p, " iSushi", 0, 0);
printer_delete_font($font);
printer_delete_pen($pen);
//logo print

$pen = printer_create_pen(PRINTER_PEN_SOLID, 1, "000000");
$font = printer_create_font($font_type_kitchen, $font_size_kitchen_h, $font_size_kitchen_w, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_pen($p, $pen);
printer_select_font($p, $font);

$array_txt_bon = explode("\n",$txt_bon_big);




$i=0;
foreach ($array_txt_bon as $val) {$i += $font_size_kitchen;
//$val = trim($val);
//$val = preg_replace("/€.*?$/si","",$val);

//print $val.'<br>';
printer_draw_text($p,$val,0,$i);
}

printer_delete_font($font);
printer_delete_pen($pen);
printer_end_page($p);
printer_end_doc($p);
printer_close($p);
}
//BIG
/*_______________-=TheSilenT.CoM=-_________________*/


//print 'ZZZZZZZZZ'.count($copy_sender).'<hr>';
//print_r($copy_sender);

//KOPIE KLEIN
if (!empty($copy_sender) && count($copy_sender) >= 1 && count($cat_set) >1 && !isset($gins['reprint'])) {
	foreach ($copy_sender as $key=>$val) {$sbon++;
		$handle = printer_open();

$val .= str_repeat("-",$max_printer_width).compute_space('','SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width).'
';
$val = compute_space($orow->order_dater,'BON#'.$orow->id,$max_printer_width).'
'.str_repeat("-",$max_printer_width).compute_space('',(isset($cat_set[$key])?strtoupper($cat_set[$key]).' - ':'').'SPLIT BON# '.$sbon.'/'.(count($copy_sender)+1),$max_printer_width_k).'
'.str_repeat("-",$max_printer_width).$val;
		printer_set_option($handle, PRINTER_MODE, "raw");
		printer_write($handle,$val);
		printer_close($handle);

$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
//PAPER CUT
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);
	}
}


}

/*_______________-=TheSilenT.CoM=-_________________*/
//remove inputa
mysql_query("DELETE FROM `$tbl_inputa` WHERE `order_id` = '$orow->id' LIMIT 1000") or print(mysql_error());
mysql_query("DELETE FROM `$tbl_inputa` WHERE `order_id` = 0 LIMIT 1000") or print(mysql_error());
//print $txt_bon;
}
/*_______________-=TheSilenT.CoM=-_________________*/

?>