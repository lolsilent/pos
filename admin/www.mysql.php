<?php
#!/usr/local/bin/php
/*
###_______________-=TheSilenT.CoM=-_______________###
Project name	: Project name
Script name	: Script name
Version		: 1.00
Release date	: 18-6-2009 22:02:48
Last Update	: 2018-01-10 1:18:09 AM
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

$cfg->mysql = array(
'host' => 'localhost',
'user' => 'root',
'password' => '123',
'main' => 'xbros_silent_pos',
'mainb' => 'xbros_silent_posc',
);

$tbl_categories='pos_categories';
$tbl_config='pos_config';
$tbl_employees='pos_employees';
$tbl_input='pos_input';
$tbl_inputa='pos_inputa';
$tbl_internet='pos_internet';
$tbl_inventory='pos_inventory';
$tbl_internet_members='pos_internet_members';
$tbl_opmerking='pos_opmerking';
$tbl_orders='pos_orders';
$tbl_products='pos_products';
$tbl_usage='pos_usage';
$tbl_users='pos_users';
$tbl_work='pos_work';

/*_______________-=TheSilenT.CoM=-_________________*/


if (!isset($link)) {
	$link=mysql_connect($cfg->mysql['host'],$cfg->mysql['user'],$cfg->mysql['password']);
	if ($link) {
		$db_select = mysql_select_db($cfg->mysql['main'], $link);
			if (!$db_select) {
				$db_select = mysql_select_db($cfg->mysql['mainb'], $link);
				if (!$db_select) {
mysql_query("REPAIR TABLE `pos_categories`, `pos_config`, `pos_employees`, `pos_input`, `pos_internet`, `pos_opmerking`, `pos_orders`, `pos_products`, `pos_users`") or print(mysql_error());
					die(mysql_error());
				}
			}
	}else{
		die(mysql_error());
	}
}



?>