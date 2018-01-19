<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
"http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title><?print $kassa_title;?></title>
<link rel="stylesheet" type="text/css" href="script.php?css">

</head>

<script>
{
document.addEventListener("keydown", function(e) {
  if (e.keyCode == 13) {
    toggleFullScreen();
  }
}, false);

function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}
"kiosk_enabled" : true;
}
</script>

<frameset cols="*,25%" border=0 framespacing=0 frameborder=0>

	<frameset rows="6%,*,6%" border=0 framespacing=0 frameborder=0 noresize>
		<frame src="?categories" name="frame_categories" scrolling=no framespacing=0 frameborder=0 noresize>
		<frame src="?tafels&TAFELS" name="frame_products" scrolling=auto framespacing=0 frameborder=0 noresize>
		

	<frameset cols="*,0%" border=0 bordercolor="#000000" framespacing=0 frameborder=0 noresize>
		<frame src="?commands" name="frame_commands" scrolling=no framespacing=0 frameborder=0 noresize>
		<?print $inet_onoff>=1?'<frame src="?internet" name="frame_internet" scrolling=no framespacing=0 frameborder=0 noresize>':'';?>
	</frameset>

	</frameset>

<?
/*
//quickmenu and numpad disabled 01/25/12 194503 for isushi

	<frameset rows="*,138" border=0 bordercolor="#000000" framespacing=0 frameborder=0 noresize>
		<frame src="?orders" name="frame_orders" scrolling=auto framespacing=0 frameborder=0 noresize>
		<frame src="?products&category_id=3&qm" name="frame_saus" scrolling=no framespacing=0 frameborder=0 noresize>
	</frameset>

*/
?>
		<frame src="?orders" name="frame_orders" scrolling=auto framespacing=0 frameborder=0 noresize>

<noframes>
<body>
This website uses frames.
</body>
</noframes>

</frameset>
</html>