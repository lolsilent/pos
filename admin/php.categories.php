<?php
#!/usr/local/bin/php

$use_images = 0;

	print '<table width=100% height=100% cellpadding=1 cellspacing=1><tr>';
	if ($cresults = mysql_query("SELECT * FROM `$tbl_categories` WHERE (`user_id`='$user_id') ORDER BY `id` ASC LIMIT 1000")){
	$i_categories = mysql_num_rows($cresults);

$percentage=round(100/$i_categories);

		while ($crow = mysql_fetch_object($cresults)) {
if ($use_images == 1) {
//USING images in categories
$cat_name='';
if (file_exists($image_dir.'/'.$crow->category_name.'.jpg')) {
//$cat_name=strtoupper(substr($crow->category_name,0,5));
print make_button('<td width="'.$percentage.'%" height=100%>','?products&category_id='.$crow->id,'frame_products','categoriez" style="vertical-align:top;background-image:url(script.php?imagine&image='.$image_dir.'/'.$crow->category_name.'.jpg&text='.strtoupper($crow->category_name).'); "','','',$cat_name,'</td>');
}else{
print make_button('<td width="'.$percentage.'%" height=100%>','?products&category_id='.$crow->id,'frame_products','categoriez','','',strtoupper($crow->category_name),'</td>');
}

}else{
//NOT USING IMAGES
print make_button('<td width="'.$percentage.'%" height=100%>','?products&category_id='.$crow->id,'frame_products','a'.$crow->id,'','',strtoupper($crow->category_name),'</td>');
}
		}
		mysql_free_result($cresults);
	}else{print mysql_error();}
print '</tr></table>';



//using imagine.php
//print make_button('<td width="'.$percentage.'%" height=100%>','?products&category_id='.$crow->id,'frame_products','categoriez" style="background-image:url(imagine.php?image='.$image_dir.'/'.$crow->category_name.'.jpg&text='.strtoupper($crow->category_name).'); "','','',strtoupper($crow->category_name),'</td>'); 

?>