<?php
#!/usr/local/bin/php


if (!empty($pins['numpad'])) {
header("Location: sauzen.php");exit;
}

$product_id='';
if (isset($gins['product_id'])) {
	$product_id=$gins['product_id'];
}

$price='';
if (isset($pins['action'])) {
	$price=$pins['action'];
}

if (isset($pins['preaction'])) {
	$preaction=$pins['preaction'];
	if (isset($pins['action']) AND isset($pins['preaction'])) {
		$preaction = "$preaction$price";
	}
}else{
	$preaction='';
}
//print "aa $preaction - $price - $product_id";

if (!empty($pins['empty'])) {
	$price='';
	$preaction='';
}
?><form method=post action="?orders&product_id=<?print $product_id;?>" target="frame_orders"><?
print '<input type=hidden name=price value="'.$preaction.'">';
print '<input type=hidden name=product_id value="'.$product_id.'">';
?><table width=100% height=200>
<tr><td width=33%><input type=submit name=numpad class=red value="Enter"></td></form><form method=post><?
print '<input type=hidden name=preaction value="'.$preaction.'">';
print '<input type=hidden name=product_id value="'.$product_id.'">';
?><td width=33%><input type=text name=price class=red value="<?print $preaction;?>"></td><td width=33%><input type=submit name=empty class=red value="Legen"></td></tr>
<tr><td><input type=submit name=action class=blue value=7></td><td><input type=submit name=action class=blue value=8></td><td><input type=submit name=action class=blue value=9></td></tr>
<tr><td><input type=submit name=action class=blue value=4></td><td><input type=submit name=action class=blue value=5></td><td><input type=submit name=action class=blue value=6></td></tr>
<tr><td><input type=submit name=action class=blue value=1></td><td><input type=submit name=action class=blue value=2></td><td><input type=submit name=action class=blue value=3></td></tr>
<tr><td><input type=submit name=action class=blue value="."></td><td><input type=submit name=action class=blue value="0"></td><td><input type=submit name=action class=blue value="-"></td></tr>
</table></form><?

?>