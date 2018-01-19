<?php
#!/usr/local/bin/php
$monthz=array(
'Jan' => 1,
'Feb' => 2,
'Mar' => 3,
'Apr' => 4,
'May' => 5,
'Jun' => 6,
'Jul' => 7,
'Aug' => 8,
'Sep' => 9,
'Oct' => 10,
'Nov' => 11,
'Dec' => 12,
);
$txt_checkin ='AANMELDEN';
$txt_checkout ='AFMELDEN';
$current_month=date("n");
$current_year=date("Y");
$super_user='kipsoep';
$name='';
if (!empty($pins['name'])) {
 $name=$pins['name'];
}
 
?><style>th{background:#123456;}</style><form method=post>
<table cellpadding=1 cellspacing=1><tr><th colspan=2>Werk Rooster</th></tr><tr><td>Naam : </td><td><input type=text name=name value="<?php print !empty($pins['name'])?$pins['name']:'';?>" class=blue></td></tr><?php
if ($name == $super_user) {
print '<tr><td>iNaam : </td><td><input type=text name=iname value="'.(!empty($pins['iname'])?$pins['iname']:'').'" class=blue></td></tr>';
print '<tr><td>inDate : </td><td><input type=text name=indate value="'.(!empty($pins['indate'])?$pins['indate']:date("H").' '.date("i").' '.date("s").' '.date("M").' '.date("j").' '.date("Y")).'" class=blue></td></tr>';
print '<tr><td>outDate : </td><td><input type=text name=outdate value="'.(!empty($pins['outdate'])?$pins['outdate']:date("H").' '.date("i").' '.date("s").' '.date("M").' '.date("j").' '.date("Y")).'" class=blue></td></tr>';
}else{
}
?><tr><td align=center><input type=submit name=action value="<?php print $txt_checkin;?>" class=red></td><td align=center><input type=submit name=action value="<?php print $txt_checkout;?>" class=red></td></tr>
</table><?php
if ($name == $super_user) {
if (!empty($pins['indate']) and !empty($pins['outdate']) and !empty($pins['iname'])) {
if ($pins['indate'] !== $pins['outdate']) {
$indate=$pins['indate'];
$outdate=$pins['outdate'];
$ind=explode(' ',$indate);
$outd=explode(' ',$outdate);
$intime=mktime($ind[0],$ind[1],$ind[2],ucfirst($monthz[$ind[3]]),$ind[4],$ind[5]);
$outtime=mktime($outd[0],$outd[1],$outd[2],ucfirst($monthz[$outd[3]]),$outd[4],$outd[5]);
$indate="$ind[4]-$ind[3]-$ind[5] $ind[0]:$ind[1]:$ind[2]";
$outdate="$outd[4]-$outd[3]-$outd[5] $outd[0]:$outd[1]:$outd[2]";
mysql_query("INSERT INTO `$tbl_employees` values (NULL, '$iname',0,".ucfirst($monthz[$ind[3]]).",$ind[5],'$intime','$indate','$outtime','$outdate')") or die(mysql_error().'insert 301');
}
}
if (!empty($pins['iname'])) {
 $iname=$pins['iname'];
print '<input type=submit name=emailrooster value="Urenrooster Mailen">';
 if ($eresults = mysql_query("SELECT * FROM `$tbl_employees` WHERE (`employee_name`='$iname') ORDER BY `check_in` DESC LIMIT 100")){
 $emessage = '<table border=1><tr><th colspan=4>Urenregister voor '.$iname.' </th></tr><tr><th></th><th>'.$txt_checkin.' </th><th>'.$txt_checkout.' </th><th>WERKDUUR </th></tr>
 ';
 $werkduur=0;
 $werkdagen=0;
 $montly_stats = array();
 $montly_statsd = array();
 while ($erow = mysql_fetch_object($eresults)) {
 $didy=0;
 $werkdagen++;
  if ($erow->check_out >= 1 AND $erow->check_in >= 1) {
   $werktijd = $erow->check_out-$erow->check_in;
   $werkduur += $werktijd;
  }else{$werktijd=0;}
  //print $werktijd;
  $date_this = preg_replace("/ .*?$/","",$erow->check_indate);
  $date_this=explode("-",$date_this);
  $date_this=$date_this[2].'/'.$monthz[ucfirst($date_this[1])].'/'.$date_this[0];
  //print $date_this;
  $weekday = date('l', strtotime($date_this));
  //print $weekday;
if (!empty($pins['did'])) {
if ($pins['did'] == $erow->id) {
mysql_query("DELETE FROM `$tbl_employees` WHERE `id`='$erow->id' LIMIT 1") or die(mysql_error());
$didy=1;
}
}
$emessage .= '<tr><td width=50>'.($didy == 0 ? '<input type=submit name=did value="'.$erow->id.'" style="width:100%;">':'DELETED').' </td><td>'.$weekday.' '.$erow->check_indate.' </td><td>'.$weekday.' '.$erow->check_outdate.' </td><td>'.($erow->check_outdate?dater($werktijd):'').' </td></tr>
';
if (isset($montly_stats["$erow->year $erow->month"])) {
$montly_stats["$erow->year $erow->month"] += $werktijd;
$montly_statsd["$erow->year $erow->month"] ++;
}else{
$montly_stats["$erow->year $erow->month"] = $werktijd;
$montly_statsd["$erow->year $erow->month"] = 1;
}
 }
 mysql_free_result($eresults);
 $emessage.='<tr><th colspan=4>Totaal dagen: '.$werkdagen.', Totaal Uren:'.dater($werkduur).' </th></tr></table>
 ';

$emessage.='<table><tr><th colspan=3>jaaroverzicht</th></tr><tr><th>jaar maand</th><th>meldingen</th><th>uren</th></tr>';
$i=0;
foreach ($montly_stats as $key => $val) {
$emessage.='<tr><td>'.$key.'</td><td>'.$montly_statsd[$key].'</td><td>'.dater($val).'</td></tr>';
$i++;
}
$emessage.='</table>';
 print $emessage;
}
if (isset($pins['emailrooster'])) {
//$emessage = strip_tags($emessage);
global $myemail,$myemaila,$emailer;

$headers = 'From: '.$myemail. "\r\n" .
    'Reply-To: '.$myemail. "\r\n" . 
	'Content-Type: text/html; charset="utf-8"' . "\r\n";


mail($myemail,"iSushi Urenregister $iname","$emessage", $headers);

print strip_tags($emessage);
}
}else{
if ($eresults = mysql_query("SELECT * FROM `$tbl_employees` WHERE `id` ORDER BY `employee_name` DESC, `check_in` DESC LIMIT 100000")){
 print '<table border=1><tr><th colspan=4>Urenregister GLOBAAL</th></tr><tr><th>NAAM</th><th>'.$txt_checkin.'</th><th>'.$txt_checkout.'</th><th>WERKDUUR</th></tr>';
 $werkduur=0;
 while ($erow = mysql_fetch_object($eresults)) {
  if ($erow->check_out >= 1 AND $erow->check_in >= 1) {
   $werktijd = $erow->check_out-$erow->check_in;
   $werkduur += $werktijd;
  }else{$werktijd=0;}
  //print $werktijd;
  $date_this = preg_replace("/ .*?$/","",$erow->check_indate);
  $date_this=explode("-",$date_this);
  $date_this=$date_this[2].'/'.$monthz[$date_this[1]].'/'.$date_this[0];
  //print $date_this;
  $weekday = date('l', strtotime($date_this));
  //print $weekday;
  print '<tr><td>'.$erow->employee_name.'</td><td>'.$weekday.' '.$erow->check_indate.'</td><td>'.$weekday.' '.$erow->check_outdate.'</td><td>'.($erow->check_outdate?dater($werktijd):'').'</td></tr>';
 }
 mysql_free_result($eresults);
 print '<tr><th colspan=4>Totaal '.dater($werkduur).'</th></tr></table>';
}
}

}else{
if (!empty($pins['action']) && !empty($name)) {
 if ($pins['action'] == $txt_checkin) {
 if ($eresults = mysql_query("SELECT * FROM `$tbl_employees` WHERE (`employee_name`='$name' and `check_out`='') ORDER BY `check_in` DESC LIMIT 1")){
  if (mysql_num_rows($eresults) >= 1) {
   mysql_free_result($eresults);
   print '<script>alert(\'FOUT EERST '.$txt_checkout.' AUB!\')</script>';
  }else{
mysql_query("INSERT INTO `$tbl_employees` values (NULL, '$name',0,$current_month,$current_year,'$current_time','$current_date $current_clock',0,'')") or die(mysql_error().'insert 301');
  }
 }

 }elseif ($pins['action'] == $txt_checkout) {

 if ($eresults = mysql_query("SELECT * FROM `$tbl_employees` WHERE (`employee_name`='$name' and `check_out`='') ORDER BY `check_in` DESC LIMIT 1")){
  if ($erow = mysql_fetch_object($eresults)) {
  mysql_free_result($eresults);
mysql_query("UPDATE `$tbl_employees` SET `check_out`='$current_time',`check_outdate`='$current_date $current_clock' WHERE `id`='$erow->id' LIMIT 1") or die(mysql_error());
  }else{
   print '<script>alert(\'FOUT EERST '.$txt_checkin.' AUB!\')</script>';
  }
 }

 }
}
if ($eresults = mysql_query("SELECT * FROM `$tbl_employees` WHERE (`employee_name`='$name') ORDER BY `check_in` DESC LIMIT 1000000")){
 print '<table border=1><tr><th colspan=3>Urenregister voor '.$name.'</th></tr><tr><th>'.$txt_checkin.'</th><th>'.$txt_checkout.'</th><th>WERKDUUR</th></tr>';
 $werktijd=0;
 $werkduur=0;
 $werkdagen=0;
 $montly_stats=array();
 while ($erow = mysql_fetch_object($eresults)) {
 $werkdagen++;
  if ($erow->check_out >= 1 AND $erow->check_in >= 1) {
   $werktijd = $erow->check_out-$erow->check_in;
   $werkduur += $werktijd;
  }
 if ($erow->check_in >= (time()-2678500)) {
  $date_this = preg_replace("/ .*?$/","",$erow->check_indate);
  $date_this=explode("-",$date_this);
  //print $monthz[$date_this[1]].' -- '.$date_this[2].' '.$date_this[0].' '.$date_this[1];
  
  
  $date_this=$date_this[2].'/'.$monthz[$date_this[1]].'/'.$date_this[0];
  $weekday = date('l', strtotime($date_this));
  print '<tr><td>'.$weekday.' '.$erow->check_indate.'</td><td>'.$weekday.' '.$erow->check_outdate.'</td><td>'.($erow->check_outdate?dater($werktijd):'').'</td></tr>';
}
  //print "$erow->year $erow->month--";
if (isset($montly_stats["$erow->year $erow->month"])) {
$montly_stats["$erow->year $erow->month"] += $werktijd;
$montly_statsd["$erow->year $erow->month"] ++;
}else{
$montly_stats["$erow->year $erow->month"] = $werktijd;
$montly_statsd["$erow->year $erow->month"] = 1;
}
 }
 mysql_free_result($eresults);
 //print '<tr><th colspan=3>Totaal dagen: '.$werkdagen.', Totaal Uren: '.dater($werkduur).'</th></tr></table>';
print '<table><tr><th colspan=3>jaaroverzicht</th></tr><tr><th>jaar maand</th><th>meldingen</th><th>uren</th></tr>';
$i=0;
foreach ($montly_stats as $key => $val) {
print '<tr><td>'.$key.'</td><td>'.$montly_statsd[$key].'</td><td>'.dater($val).'</td></tr>';
$i++;
}
print '</table>';
}
}//superuse else continue
?></form><?

function dater($secs){
$s='';$i=0;
if($secs>= 3600){
$n=(int)($secs/3600);$s .=($n<=9?'0'.$n:$n).':';$secs %= 3600;
}else{$s .= '00:';}
if($secs>= 60){
$n=(int)($secs/60);$s .=($n<=9?'0'.$n:$n).':';$secs %= 60;
}else{$s .= '00:';}
if($secs>=1){
$s .=($secs<=9?'0'.$secs:$secs);
}else{$s .= '00';}
return trim($s);
}
?>
