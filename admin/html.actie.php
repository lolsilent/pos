<?php

print '<table width=100% height=100%><tr><form name="clockform" style="margin:0;border:0;"><tr class="navy"><td colspan=2 align=right height=10 style="margin:0;border:0;">'.$current_date.' <input type="text" class=clock2 name="clock" size="8" style="margin:0;border:0;"></td></tr></form><script type="text/javascript" src="script.php?clock"></script><tr><td valign=top>';
/*_______________-=TheSilenT.CoM=-_________________*/


if(is_connected('')) {
?><IFRAME SRC="http://ticker.beursplaza.com/?speed=3&stop=1&color=ffffee" NORESIZE SCROLLING=no HSPACE=0 FRAMEBORDER=0 MARGINHEIGHT=1 MARGINWIDTH=1 WIDTH=100% HEIGHT=15  align="center"></IFRAME>

<img border="0" src="http://www3.buienradar.nl/images.aspx?jaar=-3&soort=sp-loop">
<?
//if (rand(1,99) <50) {
//}else{}

}
/*
<IFRAME SRC="http://tickertape.beurs.nl/beursnl/ticker.aspx?speed=15" NORESIZE SCROLLING=no HSPACE=0 FRAMEBORDER=0 MARGINHEIGHT=1 MARGINWIDTH=1 WIDTH=100% HEIGHT=50  align="center"></IFRAME>

<iframe width="400" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=de+toren+vught&amp;sll=37.0625,-95.677068&amp;sspn=42.716829,61.962891&amp;ie=UTF8&amp;hq=de+toren&amp;hnear=Vught,+Nederland&amp;ll=51.666433,5.2985&amp;spn=0.007867,0.015128&amp;z=14&amp;iwloc=A&amp;cid=8830450103567157291&amp;output=embed"></iframe><br />
*/


/*_______________-=TheSilenT.CoM=-_________________*/

/*
<script type="text/javascript" src="script.php?ajax"></script>

<form>
Select a User:
<select name="users" onchange="showUser(this.value)">
<option value="1">Peter Griffin</option>
<option value="2">Lois Griffin</option>
<option value="3">Glenn Quagmire</option>
<option value="4">Joseph Swanson</option>
</select>
</form>
<br />
<div id="txtHint"><b>Person info will be listed here.</b></div>
*/

print '<div class="floater" align=right>';
foreach ($titels as $val) {print $val.'<br>';}
print '&copy;XBROS.COM '.date("Y").'</div>';
?></td></tr></table>
