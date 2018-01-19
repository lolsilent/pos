<?php
#!/usr/local/bin/php

$percentage=round(100/(count($txt_commands)+1));

print '<table width=100% height=100% cellpadding=1 cellspacing=1><tr>';

$but_header = '<td width="'.$percentage.'%">';
$but_footer = '</td>';

//print make_button($but_header,'?products&','frame_products','red','','',$txt_commands[0],$but_footer);

print make_button($but_header,'?orders&'.$txt_commands[1],'frame_orders','red','','',$txt_commands[1],$but_footer);

print make_button($but_header,'?products&'.$txt_commands[2],'frame_products','blue','','',$txt_commands[2],$but_footer);

print ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')?'':make_button($but_header,'?orders&product_id=1&'.$txt_commands[3],'frame_orders','red','','',$txt_commands[3],$but_footer);

print ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')?'':make_button($but_header,'?orders&product_id=2&'.$txt_commands[4],'frame_orders','red','','',$txt_commands[4],$but_footer);

//print make_button($but_header,'?orders&product_id=2&'.$txt_commands[4],'frame_orders','blue','','',$txt_commands[4],$but_footer);

print make_button($but_header,'?orders&'.$txt_commands[9],'frame_orders','blue','','',$txt_commands[9],$but_footer);

print make_button($but_header,'?orders&'.$txt_commands[5],'frame_orders','red','','',$txt_commands[5],$but_footer);

if (isset($restaurant) && $restaurant == 1) {

print make_button($but_header,'?tafels&'.$txt_commands[10],'frame_products','blue','','',$txt_commands[10],$but_footer);

}

print make_button($but_header,'?orderpad&','frame_products','red','','',$txt_commands[11],$but_footer);

print make_button($but_header,'?order_commands&','frame_products','blue','','',$txt_commands[7],$but_footer);

print ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')?'':$but_header.'<form name="clockform" class=red><table cellpadding=1 cellspacing=1><tr><td nowrap align="center"><a href="?employees&" target="frame_products">'.$current_date.'</a></td></tr><tr><td align="center"><input type="text" class=clock name="clock" size="5"></td></tr></table></form>'.$but_footer;

print ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')?'':make_button($but_header,'?admin&','frame_products','red','','',$txt_commands[6],$but_footer);

print '<script type="text/javascript" src="script.php?clock"></script>';

print ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')?'':make_button($but_header,'?work&','frame_products','blue','','',$txt_commands[12],$but_footer);

print '</tr></table>';

?>