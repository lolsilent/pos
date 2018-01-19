<form method=post action="?onlineorders">
<table>
<tr><td>Waarde : </td><td width=100><input type=text name=waarde class=blue></td></tr>
<tr><th colspan=2 align=center><input type=submit value="Online bestellingen ZoekeN" class=red></th></tr>
</table>
</form>
<?php
#!/usr/local/bin/php

function clean_postz($in){
	global $search,$replace;
$in=preg_replace($search,$replace,$in);
$in=preg_replace("/[^A-Za-z0-9 ]/", '', $in);
$in=htmlentities("$in",ENT_QUOTES);
$in=strip_tags($in);
$in=trim($in);
$in=addslashes($in);
return $in;
}

if (isset($_POST['waarde'])) {
$waarde = $_POST['waarde'];
if($presult = mysql_query ("SELECT * FROM `$tbl_internet_members` WHERE `content` LIKE '%$waarde%' ORDER BY `id` DESC LIMIT 100")){
print '<table><tr><th>Gevonden : '.mysql_num_rows($presult).'</th></tr><tr><td>';
while  ($prow = mysql_fetch_object($presult)) {
foreach ($prow as $key => $val) {
if (!empty($val) and $key == 'content') {
$val = preg_replace("/^.*?via onze website:/sim","",$val);
$val = preg_replace("/\n/sim","<br>",$val);
$val = preg_replace("/Stuur alstublieft een .*?$/sim","<br>",$val);
print strlen($val)>3?$val:'1';
}
}
print '<b><a href="?onlineorders&reorder='.$prow->id.'">Deze bestelling uitdraaien</a></b><hr color=red>';
}
mysql_free_result($presult);
print '</td></tr></table>';
}
}


//PRINT ORDER
if (isset($_GET['reorder'])) {

$reorderid=$_GET['reorder'];
if($presult = mysql_query ("SELECT * FROM `$tbl_internet_members` WHERE `id`='$reorderid' ORDER BY `id` DESC LIMIT 100")){
if($prow = mysql_fetch_object($presult)) {
mysql_free_result($presult);
$online_file='';
		foreach ($prow as $key => $val) {
$online_file .= '['.$key.']'.$val.'[/'.$key.']
';
		
		}

print $online_file;
}}

$finder = array('id','naam','bedrijf','telefoon','email','adres','wensen','personen','doe','opname_datum','opname_tijd','uitvoer_datum','uitvoer_tijd','content');

$captured =array();

$description='';
foreach ($finder as $val) {


$this_one = extractdis($online_file,"[$val]","[/$val]");

if ($val !== 'content') {
if (!empty($this_one) and $val !== 'doe') {
$icap[]=$this_one;

if ($val == $finder[9] or $val == $finder[11]) {
		$this_one = $current_date;
		}

if ($val == $finder[6]) {
//highlight comment
//$this_one = '!!!!!'.$this_one.'!!!!!';
$this_one = '*******************************
'.preg_replace("/[^A-Z a-z0-9 ]/", '', $this_one).'
***************************************';
}

if ($val == $finder[3]) {

//PRECHECK NEW GUEST
$this_one = preg_replace('%[^0-9]%', '', $this_one);
//print "$val == $finder[3] == $this_one<hr>";
if($pimresult = mysql_query ("SELECT * FROM `$tbl_internet_members` WHERE `telefoon`='$this_one'  ORDER BY `id` DESC LIMIT 100")){
	$numero = mysql_num_rows($pimresult);
	mysql_free_result($pimresult);
	print $numero;
	if ($numero <= 0) {
$description .= 'NEW ';
	}else{
$description .= $numero.' ';
	}
}

}

$description .= $val.': '.$this_one.'
';

}
}

if ($val == 'naam' or $val == 'bedrijf' or $val == 'wensen') {
$this_one = preg_replace("/[^A-Za-z0-9 ]/", '', $this_one);
$this_one = htmlspecialchars($this_one);
$this_one = clean_postz($this_one);
}
$captured[] = $this_one;
}

print "$captured[9] !== $captured[11]";
$captured[9]=$current_date;
$captured[11]=$current_date;
if ($captured[9] !== $captured[11]) {
$description .= '
************************************
*********'.clean_postz($captured[11]).'*********
************************************
';
}
print_r($captured);

//print $captured[count($captured)-1].'ZZZZZZZZZZZZZZZZZZZZZZZZZZ';
$order_inputs = $captured[count($captured)-1];
//print '<hr color=blue>'.$order_inputs.'<hr color=blue>';
//$order_inputs = preg_replace("/^.*?Uw bestelling : \n/sim","",$order_inputs);
//$order_inputs = preg_replace("/\nTotaal bedrag.*?$/sim","",$order_inputs);
$order_inputs = extractdis($order_inputs,"Uw bestelling : \n","\nTotaal bedrag");


//print '<hr color=red>'.$order_inputs.'<hr color=red>';
$orders = explode("\n", $order_inputs);


//if ($idebug > 0) {
//print_r($orders);
//}

//exit;
/*_______________-=TheSilenT.CoM=-_________________*/


//02/05/12 214934
//online reservation activated
//orders_new_order($inet_user_id);
mysql_query("INSERT INTO `$tbl_orders` values (NULL, '$captured[0]','','','','0.00','0.00','0','$inet_user_id','$current_date $current_clock','$current_time')") or die(mysql_error().'insert 110');
$idate=preg_replace("/ .*?$/sim","",$captured[11]);

foreach ($captured as $key=>$val) {
$captured[$key]=addslashes($val);
}
$inserto_im = "(NULL, '$captured[1]','$captured[2]','$captured[4]','$captured[3]','$captured[8]','$current_date $current_clock','0.00','$captured[13]','$idate','$captured[12]','$current_time')";
print $inserto_im;
mysql_query("INSERT INTO `$tbl_internet_members` values $inserto_im") or die(mysql_error().'insert 1111'.$inserto_im);

//print '<hr>'.$captured[0].'<hr>';
	if ($oresults = mysql_query("SELECT * FROM `$tbl_orders` WHERE (`order_ids`='$captured[0]' AND `user_id`='$inet_user_id') ORDER BY `id` DESC LIMIT 1")){

		if ($orow = mysql_fetch_object($oresults)) {
			mysql_free_result($oresults);
print 'ZAZAZA';
print_r($orders);
$i=0;foreach ($orders as $val) {$i++;
if (!empty($val)) {
$iamount = preg_replace("/ x.*?$/si","",$val);
$inumber = preg_replace("/^.*?x /si","",$val);
$inumber = preg_replace("/\..*?$/si","",$inumber);
print $iamount.' '.$inumber.'<hr color=red>';

	if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE (`user_id`='$user_id' and `product_number`='$inumber') ORDER BY `id` DESC LIMIT 1")){
	print 'ZAZAZA';
		if ($prow = mysql_fetch_object($presults)) {
			mysql_free_result($presults);
			
print $iamount.' '.$inumber.' '.$prow->product_name.'<br>';
mysql_query("INSERT INTO `$tbl_input` values (NULL, '$orow->id','','$prow->category_id','$prow->id','0','0.00','','$iamount','$current_time')") or die(mysql_error().'insert 119');

		}
	}
}
}

//if ($idebug > 0) {
print '<hr>'.$i.' == '.count($orders).'<hr>';
//}
//22703
//0884343120
if ($i == count($orders)) {

mysql_query("UPDATE `$tbl_orders` SET `order_description`='$description',`order_status`='1' WHERE `id`='$orow->id' LIMIT 1") or die(mysql_error().'update 109');
print $captured[7].'<hr>';
// and $captured[7] >= 1
if (isset($captured[7]) and !empty($captured[7])) {
orders_print_reservation($orow->id,1);
?><script type="text/javascript">
top.frames['frame_orders'].location.replace='?orders';
//alert("ONLINE RESERVERING!");
</script><?
 print 'ONLINE RESERVERING!';
 
}else{
orders_print_order($orow->id,1);
}

}
}
}
}
?>