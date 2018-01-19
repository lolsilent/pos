<?php
validate_referer();
// Set the content-type
if (isset($gins['text']) && !empty($gins['text'])) {
$text = $gins['text'];
}else{
$text = 'Tes ting...';
}
$text = preg_replace("/ /si","\n",$text);

if (isset($gins['image']) && !empty($gins['image'])) {
$image = $gins['image'];
}

function LoadJpeg($image,$text) {
    /* Attempt to open */
    $im = @imagecreatefromjpeg($image);

    /* See if it failed */

        /* Create a black image */
        //$im  = imagecreatetruecolor(150, 30);
        //$bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 255, 255, 255);

        //imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Output an error message */
        imagestring($im, 5, 3, 3, $text, $tc);

    return $im;
}

header('Content-Type: image/jpeg');

//$text='TEST';
$img = LoadJpeg($image,$text);

imagejpeg($img);
imagedestroy($img);



function draw_square () {
header("Content-type: image/png"); 
 
// set the width and height of the new image in pixels
$width = 350;
$height = 360;
 
// create a pointer to a new true colour image
$im = ImageCreateTrueColor($width, $height); 
 
// switch on image antialising if it is available
ImageAntiAlias($im, true);
 
// sets background to white
$white = ImageColorAllocate($im, 255, 255, 255); 
ImageFillToBorder($im, 0, 0, $white, $white);
 
// define black and blue colours
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
 
// define the dimensions of our rectangle
$r_width = 150;
$r_height = 100;
$r_x = 100;
$r_y = 50;
 
ImageRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $black);
 
// define the dimensions of our filled rectangle
$r_width = 150;
$r_height = 100;
$r_x = 100;
$r_y = 200;
 
ImageFilledRectangle($im, $r_x, $r_y, $r_x+$r_width, $r_y+$r_height, $blue);
 
// send the new PNG image to the browser
ImagePNG($im); 
 
// destroy the reference pointer to the image in memory to free up resources
ImageDestroy($im); 
}

function draw_circle () {
header("Content-type: image/png"); 
 
// set the width and height of the new image in pixels
$width = 350;
$height = 360;
 
// create a pointer to a new true colour image
$im = ImageCreateTrueColor($width, $height); 
 
// switch on image antialising if it is available
ImageAntiAlias($im, true);
 
// sets background to white
$white = ImageColorAllocate($im, 255, 255, 255); 
ImageFillToBorder($im, 0, 0, $white, $white);
 
// define black and blue colours
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
 
// draw an empty circle
ImageEllipse($im, 180, 100, 100, 100, $black);
 
// draw a filled ellipse
ImageFilledEllipse($im, 180, 220, 150, 50, $blue);
 
// send the new PNG image to the browser
ImagePNG($im); 
 
// destroy the reference pointer to the image in memory to free up resources
ImageDestroy($im); 
}
?> 