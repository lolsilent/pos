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
					header("Location: ?clients_info");
					//print $current_time-$orow->order_timer;exit;
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
/*
print '<table width=100% height=100%>
<tr><td valign=top width=*><iframe src="?clients_order" width="100%" height="100%" name="iframe_order" frameborder=0 scrolling=no></iframe></td><td valign=top align=center width=400>';
//ACTIE
include_once('admin/html.actie.php');
//ACTIE
print '</td></tr></table>';
*/
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
"http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title><?print $kassa_title;?></title>
<link rel="stylesheet" type="text/css" href="script.php?css">
</head>

<frameset cols="*,400" border=0 framespacing=0 frameborder=0>

<frame src="?clients_order" name="frame_clients" scrolling=no framespacing=0 frameborder=0 noresize>
<frame src="?actie" name="frame_actie" scrolling=no framespacing=0 frameborder=0 noresize>

</frameset>


<noframes>
<body>
This website uses frames.
</body>
</noframes>

</frameset>
</html>