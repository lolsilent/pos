<?php
#!/usr/local/bin/php
$tbl_work = 'pos_work';
$txt_checkin ='AANMELDEN';
$txt_checkout ='AFMELDEN';
$current_clock=date("H:i:s");
$current_day=date("d");
$current_month=date("n");
$current_year=date("Y");

$name='';
$task='';
$outcome='';
if (!empty($pins['name'])) {
 $name=$pins['name'];
}
if (!empty($pins['task'])) {
 $task=$pins['task'];
}
if (!empty($gins['task'])) {
 $task=$gins['task'];
}
if (isset($pins['taskb']) AND !empty($pins['taskb'])) {
 $task=$pins['taskb'];
 $taskb=$pins['taskb'];
}

//print $task.' '.$taskb;
if (!empty($pins['outcome'])) {
 $outcome=$pins['outcome'];
}

$alltasks = array();

if ($imresults = mysql_query("SELECT * FROM `$tbl_config` WHERE `user_id`='work' ORDER BY `id` ASC LIMIT 1000")){
	while ($imrow = mysql_fetch_object($imresults)) {
$alltasks[]=$imrow->name;
	}
	mysql_free_result($imresults);
}
/*
$alltasks = array(
'tonijn fileren',
'zalm fileren',

'garnalen blancheren',
'omelet bakken',
'tempura garnaal',

'ama ebi',
'paling',
'krabstick',

'komkommer',
'avocado',

'wasabi',
'wasabi mayonaise',
'shichimi aioli',
'spicy mayonaise',

'zalmeitjes',
'masago',
'tobiko',

'toonbank keuken 1 schoonmaak',
'toonbank keuken 1 temperatuur',
'toonbank keuken 2 schoonmaak',
'toonbank keuken 2 temperatuur',

'koeling keuken 1 schoonmaak',
'koeling keuken 1 temperatuur',
'koeling keuken 2 schoonmaak',
'koeling keuken 2 temperatuur',
'vriezer keuken 1 schoonmaak',
'vriezer keuken 1 temperatuur',

'frisdrank koeling achter bar schoonmaak',
'frisdrank koeling achter bar temperatuur',

'frisdrank koeling spoelkeuken schoonmaak',
'frisdrank koeling spoelkeuken temperatuur',

'vriezer spoelkeuken 1 schoonmaak',
'vriezer spoelkeuken 1 temperatuur',
'koel en vriezer spoelkeuken 1 schoonmaak',
'koel en vriezer spoelkeuken 1 temperatuur',

'onderhoud koffie aparaat',
'onderhoud biertap installatie',
'onderhoud luchtreiniger',

'schoonmaak afzuigkap',
'schoonmaak pitten',
'schoonmaak stoelen en tafels',
'schoonmaak toiletten',
'schoonmaak vloeren',

);
*/
?><style>th{background:#123456;}</style>
<form method=post>
<table cellpadding=1 cellspacing=1><tr><th colspan=2>Werk Rooster</th></tr>
<tr><td>Naam : </td><td width=100><input type=text name=name value="<?php print !empty($pins['name'])?$pins['name']:'';?>" class=blue></td></tr>
<tr><td>Taken : </td><td><select name=task><?
foreach ($alltasks as $val) {
if (!empty($pins['task']) AND $pins['task'] == $val) {
$selected=' SELECTED';
}else{
$selected='';
}
print '<option value="'.$val.'"'.$selected.'>'.$val.'</option>';
}
?></select></td></tr>
<tr><td>Overige taken : </td><td><input type=text name=taskb value="<?php print !empty($pins['taskb'])?$pins['taskb']:'';?>" class=blue></td></tr>
<tr><td>Waarneming : </td><td><input type=text name=outcome value="<?php print !empty($pins['outcome'])?$pins['outcome']:'';?>" class=blue></td></tr>
<tr><th align=center colspan=2><input type=submit name=action value="<?php print $txt_checkin;?>" class=red></th></tr>
</table>
<?php
if (!empty($pins['name']) AND !empty($pins['task']) AND !empty($pins['outcome'])) {
mysql_query("INSERT INTO `$tbl_work` values (NULL, '$name','$task','$outcome','$current_clock',$current_day, $current_month,$current_year)") or die(mysql_error().'insert 301');
}
$whereiz="`id`";
if (!empty($name) or !empty($task)) {
$whereiz = "`name`='$name' OR `task`='$task'";
}
//print $whereiz;

if ($eresults = mysql_query("SELECT * FROM `$tbl_work` WHERE ($whereiz) ORDER BY `id` DESC LIMIT 25")){
print '<table><tr><th>Werknemer</th><th>Taak</th><th>Waarneming</th><th>Datum</th></tr>';
while ($erow = mysql_fetch_object($eresults)) {
print '<tr><td>'.$erow->name.'</td><td><a href="?work&task='.$erow->task.'">'.$erow->task.'</a></td><td>'.$erow->outcome.'</td><td>'.$erow->clock.' '.$erow->day.'-'.$erow->month.'-'.$erow->year.'</td></tr>';
}
print '</table>';
mysql_free_result($eresults);
}
?>
