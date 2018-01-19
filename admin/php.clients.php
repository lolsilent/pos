<?php
#!/usr/local/bin/php


if (!isset($link)) {
	$link=mysql_connect($db_host,$db_user,$db_password) or die(mysql_error().'100');
mysql_select_db($db_main) or die(mysql_error().'101');
}

$tosend_query = "SELECT * FROM `$tbl_orders` WHERE (`user_id`='$user_id') ORDER BY `id` DESC LIMIT 1";
if ($oresults = mysql_query($tosend_query)){
	if ($orow = mysql_fetch_object($oresults)) {
		mysql_free_result($oresults);
		//Print_r($orow);
		if ($iresults = mysql_query("SELECT * FROM `$tbl_input` WHERE (`order_id`='$orow->id') ORDER BY `id` ASC LIMIT 1")){
			if (mysql_num_rows($iresults) >= 1) {
				mysql_free_result($iresults);
				//header("Location: ?clients_frame");
				?><SCRIPT language="JavaScript">
<!--
top.location="?clients_frame";
//-->
</SCRIPT><?
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

?><meta http-equiv="refresh" content="1"><?


?>