<?php
#!/usr/local/bin/php
/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($_GET['items'])) {
foreach ($inventorize as $val) {

if ($presults = mysql_query("SELECT * FROM `$tbl_products` WHERE `category_id`='$val' ORDER BY `product_number` ASC LIMIT 1000")){
print '<table><tr><th>Naam</th><th>#</th></tr>';
		while ($prow = mysql_fetch_object($presults)) {
		print '<tr><td><a href="?inventory&items='.$prow->id.'">'.$prow->product_name.'</a></td><td>'.$prow->product_number.'</td></tr>';
if (!empty($_GET['items']) AND $_GET['items'] == $prow->id) {
$valuez = "NULL, '$prow->category_id', '$prow->product_name', '$prow->product_number', 0, 0, 0";
}
		}
		mysql_free_result($presults);
print '</tr></table>';

}
}
}
/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($_GET['inventory']) AND !empty($_GET['inventory']) AND isset($_POST['action']) AND !empty($_POST['action'])) {
$pid=$_GET['inventory'];
$amount=$_POST['amount'];
if ($_POST['action'] == 'ingekocht') {
mysql_query("UPDATE `$tbl_inventory` SET `in`=`in`+$amount WHERE (`id`='$pid') LIMIT 1") or print(mysql_error());
}elseif ($_POST['action'] == 'verkocht') {
mysql_query("UPDATE `$tbl_inventory` SET `in`=`in`-$amount WHERE (`id`='$pid') LIMIT 1") or print(mysql_error());
}
//print $_POST['amount'];
}
/*_______________-=TheSilenT.CoM=-_________________*/

$enabled_inventory = range(310,324);
$enabled_inventory[]=331;
$enabled_inventory[]=332;
$enabled_inventory[]=333;
$enabled_inventory[]='400F';
$enabled_inventory[]='401F';
$enabled_inventory[]='402F';
$enabled_inventory[]='410F';
$enabled_inventory[]='411F';
$enabled_inventory[]='420F';
$enabled_inventory[]='421F';
$enabled_inventory[]='422F';
$enabled_inventory[]='423F';
$enabled_inventory[]='424F';
$enabled_inventory[]='425F';
$enabled_inventory[]='430F';
$enabled_inventory[]='431F';
$enabled_inventory[]='432F';
$enabled_inventory[]='433F';
$enabled_inventory[]='434F';
$enabled_inventory[]='435F';

$but_size = 85;
$amount_alert = 5;

print '<table><tr>';
foreach ($inventorize as $val) {
print '<td valign=top>';
if ($imresults = mysql_query("SELECT * FROM `$tbl_inventory` WHERE `category_id`='$val' ORDER BY `product_number` ASC LIMIT 1000")){
print '<table><tr><th>Naam</th><th>#</th><th>+</th><th>-</th><th>Vooraad</th></tr>';
		while ($imrow = mysql_fetch_object($imresults)) {
		if (in_array($imrow->product_number,$enabled_inventory) OR isset($_GET['items']) OR ($imrow->in-$imrow->out) <= $amount_alert) {
if (empty($bgcolor)) {$bgcolor=" class=\"navy\"";} else {$bgcolor="";}
print '<tr'.$bgcolor.'><form method=post action="?inventory='.$imrow->id.'"><td>';

if ($val == 4) {
if (file_exists('images/'.$imrow->product_name.'.jpg')) {
print '<img src="images/'.$imrow->product_name.'.jpg" title="'.$imrow->product_name.'" alt="'.$imrow->product_name.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_name.'.png')) {
print '<img src="images/'.$imrow->product_name.'.png" title="'.$imrow->product_name.'" alt="'.$imrow->product_name.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_name.'.gif')) {
print '<img src="images/'.$imrow->product_name.'.gif" title="'.$imrow->product_name.'" alt="'.$imrow->product_name.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_name.'.bmp')) {
print '<img src="images/'.$imrow->product_name.'.bmp" title="'.$imrow->product_name.'" alt="'.$imrow->product_name.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_name.'.png')) {
print '<img src="images/'.$imrow->product_name.'.tif" title="'.$imrow->product_name.'" alt="'.$imrow->product_name.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_name.'.tif')) {
print '<img src="images/'.$imrow->product_name.'.tif" title="'.$imrow->product_name.'" alt="'.$imrow->product_name.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_number.'.jpg')) {
print '<img src="images/'.$imrow->product_number.'.jpg" title="'.$imrow->product_number.'" alt="'.$imrow->product_number.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_number.'.png')) {
print '<img src="images/'.$imrow->product_number.'.png" title="'.$imrow->product_number.'" alt="'.$imrow->product_number.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_number.'.gif')) {
print '<img src="images/'.$imrow->product_number.'.gif" title="'.$imrow->product_number.'" alt="'.$imrow->product_number.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_number.'.bmp')) {
print '<img src="images/'.$imrow->product_number.'.bmp" title="'.$imrow->product_number.'" alt="'.$imrow->product_number.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_number.'.png')) {
print '<img src="images/'.$imrow->product_number.'.tif" title="'.$imrow->product_number.'" alt="'.$imrow->product_number.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}elseif (file_exists('images/'.$imrow->product_number.'.tif')) {
print '<img src="images/'.$imrow->product_number.'.tif" title="'.$imrow->product_number.'" alt="'.$imrow->product_number.'" border=0 width='.$but_size.' height='.$but_size.'><br>';
}
}

print $imrow->product_number.' '.$imrow->product_name.'</td><td><input type=text name="amount" value="';
if (isset($_POST['amount'])) {
print $_POST['amount'];
}else{
print ($val == 3)?'24':'1';
}
print '" size=3></td><td'.($val == 4? ' height=100':'').'><input type=submit name="action" value="ingekocht" class="blue"></td><td><input type=submit name="action" value="verkocht" class="red"></td><td align=center><b>'.($imrow->in-$imrow->out).'</b></td></form></tr>';
		if (isset($valuez)){
if (preg_match("/$imrow->product_name/si",$valuez) AND preg_match("/$imrow->product_number/si",$valuez)) {
		$allclear=1;
		//print "ZZZZZZZZZZZZZZZZZ";
}
		}
		}
		}
		mysql_free_result($imresults);
print '</tr></table>';
}
print '</td>';
}
print '</tr></table><a href="?inventory&items">?</a>';
/*_______________-=TheSilenT.CoM=-_________________*/
if (isset($valuez) AND !isset($allclear)){
mysql_query("INSERT INTO `$tbl_inventory` values ($valuez)") or print(mysql_error().'insert 115');
}

?>
