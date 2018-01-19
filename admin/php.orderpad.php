<?

if (isset($workticket) || isset($attach)) {
print '<table><tr><td>';
if (isset($workticket) && !empty($workticket)) {
	print '<div class=borderz>BON#'.$workticket.'<div>';
}
print '</td><td>';
if (isset($attach) && !empty($attach)) {
	print '<div class=borderz>&&<div>';
}
print '</td></tr></table>';
}

print 'Snel orders opnemen op nummers of op naam:<br>
<table><tr><td><form method=post action="?orders" target="frame_orders">
<input type=text name="pnumber">'.(isset($workticket)?'<input type=hidden name=workticket value="'.$workticket.'">':'').'<input type=submit name="" value="" style="width:0;height:0;"></form>';

?>

<br>
<br>
Voorbeeld:<br>
3*15 = 3 x 15<br>
3*koffie = 3 x koffie<br>