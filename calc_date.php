<?php

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

function randomdate() {
$date_today = date("Y-m-j");
$datestart = strtotime($date_today);//you can change it to your timestamp;
$dateend = strtotime('3000-12-31');//you can change it to your timestamp;
$daystep = 86400; $datebetween = abs(($dateend - $datestart) / $daystep);
$randomday = rand(0, $datebetween);
return date("j.m.Y", $datestart + ($randomday * $daystep));
}
function encode_html($str,$type='code'){
    if($type=='code'){return htmlspecialchars($str,ENT_QUOTES);}
    if($type=='encode'){
        $trans=get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
        $trans=array_flip($trans);;
        return strtr($str, $trans);
    }
}



$text = $_POST['info'];
$text = preg_replace("/  +/", " ", trim($text));
$text = str_replace('\r\n', '', $text);
$text = str_replace('\n', '', $text);

$n_text = mb_strlen($text, 'utf-8');
if($n_text < 4) {
  header("Location:/?text=".$text."&error=num1#tab1");
}
else {
  if($n_text > 200) {
   header("Location:/?text=".$text."&error=num2#tab1");
  }
  else {
$text = encode_html($text);
$random = rand(1,4);
if($random==1) {$res=0;}
if($random==2 OR $random==3 OR $random==4) {$res = rand(1,19);}

if($res==0) { $date = randomdate(); }


if(isset($_POST['privacy'])) {
  if($_POST['privacy']==0 or $_POST['privacy']==1) {
    $pri = $_POST['privacy'];
  }
}
else {
  $pri = 0;
}


function auth_fail() {
  if($res==0) {  $sql5="INSERT INTO date(info, res, date_res, IP, date) VALUES ('$text', '$res', '$date', '$ip', NOW())"; }
else {
  $sql5="INSERT INTO date(info, res, IP, date) VALUES ('$text', '$res', '$ip', NOW())";
}
}
include 'auth_check.php';

$ip = $_SERVER['REMOTE_ADDR'];
$r=mysql_query("SELECT * FROM date WHERE info LIKE '%$text%'");
while ($row=mysql_fetch_array($r)) {
 $sql1="UPDATE date SET date=NOW(), IP='$ip' WHERE info LIKE '%$text%'";
$res1=mysql_query ($sql1);
header("Location:/d/".$row['id']."");
}
if (mysql_num_rows($r) == 0)
{
$sql4="SET time_zone = '+03:00'";
if($auth==1) { // если юзер авторизован
   if($res==0) {  $sql5="INSERT INTO date(info, res, date_res, IP, date, user, privacy) VALUES ('$text', '$res', '$date', '$ip', NOW(), '$id', '$pri')"; } else {
  $sql5="INSERT INTO date(info, res, IP, date, user, privacy) VALUES ('$text', '$res', '$ip', NOW(), '$id', '$pri')";
}
} else {
  if($res==0) {  $sql5="INSERT INTO date(info, res, date_res, IP, date) VALUES ('$text', '$res', '$date', '$ip', NOW())"; }
else {
  $sql5="INSERT INTO date(info, res, IP, date) VALUES ('$text', '$res', '$ip', NOW())";
}
}
$res4=mysql_query ($sql4);
$res5=mysql_query ($sql5);

$result = mysql_query("SELECT id FROM date WHERE info = '$text'");
$row = mysql_fetch_row($result);

$id = $row[0];
header("Location:/d/".$id."");
}
  }
}
?>