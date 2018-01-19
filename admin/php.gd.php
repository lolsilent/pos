<?php

/*
persons 2 4
align x y

*/
$unos=55;
$dos=55;
$tres=55;

if (isset($gins['tcolor']) && !empty($gins['tcolor'])) {
if ($gins['tcolor'] == 1) {
$unos=0;
$dos=255;
$tres=0;
}elseif ($gins['tcolor'] == 2) {
$unos=255;
$dos=0;
$tres=0;
}elseif ($gins['tcolor'] == 3) {
$unos=0;
$dos=255;
$tres=255;
}
}

if (isset($gins['itext']) && !empty($gins['itext'])) {
$itext = $gins['itext'];
}else{
$itext = 'o-)';
}
//-------------------------------------------------------
if (isset($gins['align']) && !empty($gins['align']) && isset($gins['persons']) && !empty($gins['persons'])) {

if ($gins['align'] == 'x') {
if ($gins['persons'] == '4') {
$width = 160;
$height = 160;
draw_table_4p_x($itext);
}elseif ($gins['persons'] == '2') {
$width = 160;
$height = 80;
draw_table_2p_x($itext);
}elseif ($gins['persons'] == '1') {
$width = 60;
$height = 80;
draw_table_1p_x($itext);
}
}elseif ($gins['align'] == 'y') {
if ($gins['persons'] == '4') {
$width = 160;
$height = 160;
draw_table_4p_y($itext);
}elseif ($gins['persons'] == '2') {
$width = 80;
$height = 160;
draw_table_2p_y($itext);
}elseif ($gins['persons'] == '1') {
$width = 60;
$height = 80;
draw_table_1p_y($itext);
}
}

}

//-------------------------------------------------------
function draw_table_1p_y ($itext) {
header("Content-type: image/png"); 
global $width,$height,$unos,$dos,$tres;
$im = ImageCreateTrueColor($width, $height); 
ImageAntiAlias($im, true);
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$red = ImageColorAllocate($im, $unos, $dos, $tres);

ImageFillToBorder($im, 0, 0, $black, $black);

$r_width = $width*0.70;
$r_height = $height*0.15;
$r_x = $width*0.15;
$r_y = $height*0.05;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_width = $width*0.90;
$r_height = $height*0.50;
$r_x = $width*0.05;
$r_y = $height*0.25;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $red);

imagestring($im, 5, $width*0.25, $height*0.35, $itext, $white);

ImagePNG($im); 
ImageDestroy($im); 
}
//-------------------------------------------------------
function draw_table_1p_x ($itext) {
header("Content-type: image/png"); 
global $width,$height,$unos,$dos,$tres;
$im = ImageCreateTrueColor($width, $height); 
ImageAntiAlias($im, true);
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$red = ImageColorAllocate($im, $unos, $dos, $tres);
ImageFillToBorder($im, 0, 0, $black, $black);

$r_width = $width*0.15;
$r_height = $height*0.7;
$r_x = $width*0.05;
$r_y = $height*0.15;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_width = $width*0.50;
$r_height = $height*0.90;
$r_x = $width*0.25;
$r_y = $height*0.05;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $red);

imagestring($im, 5, $width*0.35, $height*0.45, $itext, $white);

ImagePNG($im); 
ImageDestroy($im); 
}
//-------------------------------------------------------
function draw_table_2p_y ($itext) {
header("Content-type: image/png"); 
global $width,$height,$unos,$dos,$tres;
$im = ImageCreateTrueColor($width, $height); 
ImageAntiAlias($im, true);
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$red = ImageColorAllocate($im, $unos, $dos, $tres);

ImageFillToBorder($im, 0, 0, $black, $black);

$r_width = $width*0.70;
$r_height = $height*0.90;
$r_x = $width*0.15;
$r_y = $height*0.05;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_width = $width*0.90;
$r_height = $height*0.50;
$r_x = $width*0.05;
$r_y = $height*0.25;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $red);

imagestring($im, 5, $width*0.25, $height*0.35, $itext, $white);

ImagePNG($im); 
ImageDestroy($im); 
}
//-------------------------------------------------------
function draw_table_2p_x ($itext) {
header("Content-type: image/png"); 
global $width,$height,$unos,$dos,$tres;
$im = ImageCreateTrueColor($width, $height); 
ImageAntiAlias($im, true);
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$red = ImageColorAllocate($im, $unos, $dos, $tres);
ImageFillToBorder($im, 0, 0, $black, $black);

$r_width = $width*0.90;
$r_height = $height*0.7;
$r_x = $width*0.05;
$r_y = $height*0.15;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_width = $width*0.50;
$r_height = $height*0.90;
$r_x = $width*0.25;
$r_y = $height*0.05;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $red);

imagestring($im, 5, $width*0.35, $height*0.45, $itext, $white);

ImagePNG($im); 
ImageDestroy($im); 
}
//-------------------------------------------------------
function draw_table_4p_y ($itext) {
header("Content-type: image/png"); 
global $width,$height,$unos,$dos,$tres;
$im = ImageCreateTrueColor($width, $height); 
ImageAntiAlias($im, true);
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$red = ImageColorAllocate($im, $unos, $dos, $tres);

ImageFillToBorder($im, 0, 0, $black, $black);

$r_width = $width*0.30;
$r_height = $height*0.90;
$r_x = $width*0.15;
$r_y = $height*0.05;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_x = $width*0.55;
$r_y = $height*0.05;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_width = $width*0.90;
$r_height = $height*0.50;
$r_x = $width*0.05;
$r_y = $height*0.25;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $red);

imagestring($im, 5, $width*0.25, $height*0.35, $itext, $white);

ImagePNG($im); 
ImageDestroy($im); 
}
//-------------------------------------------------------
function draw_table_4p_x ($itext) {
header("Content-type: image/png"); 
global $width,$height,$unos,$dos,$tres;
$im = ImageCreateTrueColor($width, $height); 
ImageAntiAlias($im, true);
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$red = ImageColorAllocate($im, $unos, $dos, $tres);

ImageFillToBorder($im, 0, 0, $black, $black);

$r_width = $width*0.90;
$r_height = $height*0.25;
$r_x = $width*0.05;
$r_y = $height*0.15;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_x = $width*0.05;
$r_y = $height*0.60;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);

$r_width = $width*0.50;
$r_height = $height*0.90;
$r_x = $width*0.25;
$r_y = $height*0.05;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $red);

imagestring($im, 5, $width*0.35, $height*0.45, $itext, $white);

ImagePNG($im); 
ImageDestroy($im); 
}

//-------------------------------------------------------
?> 