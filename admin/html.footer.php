<?php
#!/usr/local/bin/php
if (isset($link)) {

	mysql_close($link) or die(mysql_error().'102');
}


if (!empty($txt_footer)) {
	print $txt_footer;
}
?><a name="bottom"></a></center></body></html>