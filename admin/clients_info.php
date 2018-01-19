<?php
#!/usr/local/bin/php
if (isset($illuminate) && strlen($illuminate) >= 5) {
	header("Location: http://$illuminate");
}
//IMAGE USED 22-10-2009 4:41:46
//word image 8 cm height
//crop image in photoshop to 400 px height
print '
<table width=100% height=100%><tr><td valign=middle align=center><table width=98% height=98%><tr><td valign=middle align=center bgcolor=white>
<h1 style="font-size:58;color:red;">
'.$titels[0].'
</h1>
<h1 style="font-size:18;color:red;">
'.$titels[1].'
</h1>'.(isset($actie_text)?'<br><font color=blue>
<h1 style="font-size:28;">'.$actie_text.'</h1></font>
<br><br>':'');?>
<script type="text/javascript">
/***********************************************
* Conveyor belt slideshow script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/


//Specify the slider's width (in pixels)
var sliderwidth="100%"
//Specify the slider's height
var sliderheight="350"
//Specify the slider's slide speed (larger is faster 1-10)
var slidespeed=1
//configure background color:
slidebgcolor="#FFFFFF"

//Specify the slider's images
var leftrightslide=new Array()
var finalslide=''
<?
$filez = array();
if ($handle = opendir('slide')) {
    while (false !== ($file = readdir($handle))) {
        if (preg_match("/.*?\.jpg$/i",$file)) {
$filez[]=$file;
        }
    }
    closedir($handle);
}

shuffle($filez);
$i=0;foreach ($filez as $file) {
print "leftrightslide[".$i."]='<img src=\"slide/".$file."\" height=350 border=0></a>'
";$i++;
}
?>

//Specify gap between each image (use HTML):
var imagegap=" "

//Specify pixels gap between each slideshow rotation (use integer):
var slideshowgap=5


////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=slidespeed
leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>'
var iedom=document.all||document.getElementById
if (iedom)
document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+leftrightslide+'</span>')
var actualwidth=''
var cross_slide, ns_slide

function fillup(){
if (iedom){
cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2
cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3
cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide
actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth
cross_slide2.style.left=actualwidth+slideshowgap+"px"
}
else if (document.layers){
ns_slide=document.ns_slidemenu.document.ns_slidemenu2
ns_slide2=document.ns_slidemenu.document.ns_slidemenu3
ns_slide.document.write(leftrightslide)
ns_slide.document.close()
actualwidth=ns_slide.document.width
ns_slide2.left=actualwidth+slideshowgap
ns_slide2.document.write(leftrightslide)
ns_slide2.document.close()
}
lefttime=setInterval("slideleft()",30)
}
window.onload=fillup

function slideleft(){
if (iedom){
if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8))
cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed+"px"
else
cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"

if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8))
cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed+"px"
else
cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"

}
else if (document.layers){
if (ns_slide.left>(actualwidth*(-1)+8))
ns_slide.left-=copyspeed
else
ns_slide.left=ns_slide2.left+actualwidth+slideshowgap

if (ns_slide2.left>(actualwidth*(-1)+8))
ns_slide2.left-=copyspeed
else
ns_slide2.left=ns_slide.left+actualwidth+slideshowgap
}
}


if (iedom||document.layers){
with (document){
document.write('<table border="0" cellspacing="0" cellpadding="0" width=100% height=350><td>')
if (iedom){
write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">')
write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed">')
write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')
write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')
write('</div></div>')
}
else if (document.layers){

}
document.write('</td></table>')
}
}
</script>
<?php
print '
<font color=black><h1 style="font-size:35;">
'.$titels[2].'<br>'.$titels[3].'
</h1>
';
print '<div class="floater" align=right>';
foreach ($titels as $val) {print $val.'<br>';}
print '&copy;XBROS.COM '.date("Y").'</div>';
?></font>
<iframe src="?clients_order_checker" width=0 height=0 frameborder=0 scrolling=no>
</td></tr></table></td></tr></table>