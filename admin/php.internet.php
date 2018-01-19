<pre><?php
#!/usr/local/bin/php
#exit;
$idebug=0;

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

function clean_inputz($in){
	global $search,$replace;
$in=preg_replace($search,$replace,$in);
$in=preg_replace("/[^A-Za-z0-9 ]/", '', $in);
$in=strip_tags($in);
$in=trim($in);
$in=addslashes($in);
if(ctype_alnum($in) and strlen($in)>=4){
return $in;
}else{
$in=NULL; return $in;
}
}

$weekd = array(
'Monday' => 'Maandag',
'Tuesday' => 'Dinsdag',
'Wednesday' => 'Woensdag',
'Thursday' => 'Donderdag',
'Friday' => 'Vrijdag',
'Saturday' => 'Zaterdag',
'Sunday' => 'Zondag',
);

if($iresult = mysql_query ("SELECT * FROM `$tbl_internet` WHERE `id`  ORDER BY `id` DESC LIMIT 1")){
	if ($irow=mysql_fetch_object ($iresult)) {
	mysql_free_result($iresult);
	}else{
		mysql_query("INSERT INTO `$tbl_internet` values (NULL, '0')") or die(mysql_error().'insert 113');
		$irow->internet_id=1;
	}

}

if (!isset($_GET['norefresh'])) {
?><script language="javascript" type="text/javascript">setTimeout("location.reload();",5000);</script>
<meta http-equiv="refresh" content="10">
<meta http-equiv="refresh" content="20">
<meta http-equiv="refresh" content="30"><?
}
//print $current_date.' '. $current_clock;

if ($online_file = file_get_contents('http://isushi.nl/command.php?'.$inet_code.'='.$irow->internet_id)) {


$finder = array('id','naam','bedrijf','telefoon','email','adres','wensen','personen','doe','opname_datum','opname_tijd','uitvoer_datum','uitvoer_tijd','content');

$captured =array();

$description='';
foreach ($finder as $val) {


$this_one = extractdis($online_file,"[$val]","[/$val]");

if ($val !== 'content') {
if (!empty($this_one) and $val !== 'doe') {
$icap[]=$this_one;

if ($val == $finder[9] or $val == $finder[11]) {
		$date_this=explode("-",$this_one);
		$date_this=$date_this[2].'/'.$date_this[1].'/'.$date_this[0];
		//print $date_this;
		$weekday = date('l', strtotime($date_this));
		//print $weekday;
		$this_one .= ' '.$weekd[$weekday];//weekdays translate to dutch
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

print "||$irow->internet_id === $captured[0]||";
if ($irow->internet_id <= $captured[0]) {

//02/05/12 214934
//online reservation activated
//orders_new_order($inet_user_id);
mysql_query("INSERT INTO `$tbl_orders` values (NULL, '$captured[0]','','','','0.00','0.00','0','$inet_user_id','$current_date $current_clock','$current_time')") or die(mysql_error().'insert 110');
$idate=preg_replace("/ .*?$/sim","",$captured[11]);

foreach ($captured as $key=>$val) {
$captured[$key]=addslashes($val);
}
mysql_query("INSERT INTO `$tbl_internet_members` values (NULL, '$captured[1]','$captured[2]','$captured[4]','$captured[3]','$captured[8]','$current_date $current_clock','0.00','$captured[13]','$idate','$captured[12]','$current_time')") or die(mysql_error().'insert 1111');

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

if ($idebug <= 0) {
mysql_query("UPDATE `$tbl_internet` SET `internet_id`=`internet_id`+1 WHERE `id`='$irow->id' LIMIT 1") or die(mysql_error().'update 109');
}
mysql_query("UPDATE `$tbl_orders` SET `order_description`='$description',`order_status`='1' WHERE `id`='$orow->id' LIMIT 1") or die(mysql_error().'update 109');
print $captured[7].'<hr>';
// and $captured[7] >= 1
$resorbes = 'bestelling';
if (isset($captured[7]) and !empty($captured[7])) {
orders_print_reservation($orow->id,1);
?><script type="text/javascript">
top.frames['frame_orders'].location.replace='?orders';
//alert("ONLINE RESERVERING!");
</script><?
 print 'ONLINE RESERVERING!';
 $resorbes = 'reservering';
}else{
orders_print_order($orow->id,1);
?><script type="text/javascript">
top.frames['frame_orders'].location.replace='?orders';
//alert("ONLINE BESTELLING!");
</script><?
print 'ONLINE BESTELLING!';
$resorbes = 'bestelling';

}
//EMAILING
if (isset($captured[4]) and !empty($captured[4])) {
global $myemail;
$headers = 'From: '.$myemail. "\r\n" .
    'Reply-To: '.$myemail. "\r\n";
$myimessage = '
Geachte '.$captured[1].', 

Hartelijk bedankt voor uw '.$resorbes.'. 
We hebben uw online '.$resorbes.' in goede orde ontvangen.

Met vriendelijk groet,
http://www.isushi.nl
info@isushi.nl
0297 286 434
06 543 345 54

_____________________________________
Dit is geen spam! Dit is een geautomatiseerde beantwoorder van de website restaurant iSushi.
Bent u zelf niet op onze website geweest vraag eerst uw omgeving of zij uw email address hebben gebruikt.
Mocht het niet zo zijn dan is het waarschijnlijk een grapje van iemand, mocht dit vaker voorkomen neem contact met ons op en we blokkeren uw email address. Dank u.
_____________________________________
';
mail($captured[4],"iSushi ontvangstbevestiging","$myimessage", $headers);
print "".$captured[4];
}
//EMAILING
print 'XXXXXXXXXXXXXXXXXXXXXXXXXX';
}




		}
	}


/*_______________-=TheSilenT.CoM=-_________________*/

}

}else{
$online_file = file_get_contents('http://isushi.nl/command.php?'.$inet_code.'');
$online_id = extractdis($online_file,"[id]","[/id]");
print 'Geen online bestelling!<br> LOCAL ID:'.$irow->internet_id.' - ONLINE ID:'.$online_id.'.';
}//online file
 

?>