<?php
#!/usr/local/bin/php

if (isset($_GET['icheck'])) {
$icheck = $_GET['icheck'];

if ($imresults = mysql_query("SELECT * FROM `$tbl_internet_members` WHERE (`id`='$icheck') ORDER BY `id` DESC LIMIT 100")){
print '<table><tr>';
		while ($imrow = mysql_fetch_object($imresults)) {
//$imrow->content = extractdis($imrow->content,"Uw bestelling : \n","\nTotaal bedrag");
$imrow->content=preg_replace("/\n/","<br>",$imrow->content);
		print '<td>'.$imrow->content.'</td>';
		}
		mysql_free_result($imresults);
print '</tr></table>';
}

}
?>