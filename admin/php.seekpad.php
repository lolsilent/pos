<?php
#!/usr/local/bin/php

$asasd = range(1,9);
$asdasd = range('a','z');
$asasd = array_merge($asasd,$asdasd);


print '<table width=100% height=300><tr>';
$i=0;

foreach ($asasd as $val) {

$i++;
print make_button('<td height=50>','?productsi&q='.$val,'frame_products','blue','','',$val,'</td>');

if ($i == 5) {$i=0;
print '</tr><tr>';
}

}


print '</tr></table>';
?>
