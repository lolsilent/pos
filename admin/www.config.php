<?php
#!/usr/local/bin/php
/*
###_______________-=TheSilenT.CoM=-_______________###
Project name	: Project name
Script name	: Script name
Version		: 1.00
Release date	: 18-6-2009 22:02:48
Last Update	: 18-6-2009 22:02:48
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

date_default_timezone_set('Europe/Amsterdam');

$array_files = array(
'actie' => 'admin/html.actie.php',
'admin' => 'admin/php.admin.php',
'categories' => 'admin/php.categories.php',
'clients' => 'admin/php.clients.php',
'commands' => 'admin/php.commands.php',
'define' => 'admin/php.define.php',
'employees' => 'admin/php.employees.php',
'frames' => 'admin/php.frames.php',
'imagine' => 'admin/php.imagine.php',
'info' => 'admin/php.info.php',
'internet' => 'admin/php.internet.php',
'menu' => 'admin/php.menu.php',
'numpad' => 'admin/php.numpad.php',
'orderpad' => 'admin/php.orderpad.php',
'order_commands' => 'admin/php.order_commands.php',
'orders' => 'admin/php.orders.php',
'products' => 'admin/php.products.php',
'productsi' => 'admin/php.productsi.php',
'sauzen' => 'admin/php.sauzen.php',
'script' => 'admin/php.script.php',
'tafels' => 'admin/php.tafels.php',
'visual' => 'admin/php.visual.php',
'ajax' => 'admin/php.ajax.php',
'clients_frame' => 'admin/clients_frame.php',
'clients_info' => 'admin/clients_info.php',
'clients_order' => 'admin/clients_order.php',
'clients_order_checker' => 'admin/clients_order_checker.php',
'work' => 'admin/php.work.php',
'onlineorders' => 'admin/php.onlineorders.php',
'icheck' => 'admin/php.icheck.php',
'inventory' => 'admin/php.inventory.php',
'interact' => 'admin/php.interact.php',
);

$taxes=array(0=>0,1=>6,2=>21);

$current_time=time();
$current_date=date("d-M-Y");
$current_clock=date("H:i:s");


if (empty($category_id)) {
	$category_id = 1;
}

$user_id = 1; // required to pull config from db 15-3-2010 23:41:04
$inet_user_id = 2;
$restaurant_user_id = 3;
$ipad_user_id = 5;
$image_dir = 'img';
$opmerking_append='&';
$max_printer_width=40;
$redirect_time=15;//second
$inet_code='qwertpoiuy';
$inet_onoff=1;
$myemail='info@isushi.nl';
$myemaila='lolsilent@gmail.com';
$emailer=1;
$txt_footer='';
$merge_same=1;
$display_price=1;
$restaurant=1;
$font_size_kitchen=12;
$max_printer_width_k=20;
$font_type_kitchen='Arial';
$bon_limit=1;


$kassa_title='iSushi.nl';
$titels=array('iSushi', 'Hofland 60', '3641GG Mijdrecht', 'www.iSushi.nl', '0297 286 434');

$inventorize_populize=1;
$inventorize=array(3,4);

//SPLIT TICKETS CATEGORY
$tickets_copy = array(1,2);
$minimium_dishes_split=3;

$txt_commands = array('HOME','REKENING','ZOEKEN','LAAG', 'HOOG','ANNULEREN','ADMIN','BONNEN','WISSELGELD','NIEUW','TAFELS','NUMMERS','HCCP');

$bon_footer=array('MAANDAG GESLOTEN','OVERIGE DAGEN 16:00 - 22:00','Voor overige tijden bellen.'
);



//$illuminate_categories = array(8);
/*_______________-=TheSilenT.CoM=-_________________*/
?>