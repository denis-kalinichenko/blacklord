<?php
mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

if($_GET['lastPost']){
$sqlQuery = mysql_query('SELECT * FROM infos WHERE id < "'.mysql_real_escape_string($_GET['lastPost']).'" ORDER BY id DESC LIMIT 0 , 20');
$val = $_GET['lastPost'];
while($data = mysql_fetch_object($sqlQuery)) {
$id = $data->id;
$res = $data->res ;
$info = $data->info;

echo "<a href=\"/i/$id\" class=\"post\" id=\"$id\">";
echo "<table><tr><td>$info</td>";
echo "<td ";
if($res==100) {
echo "class=\"gold\">
<small>Оценка</small><br />
".$res."%</td>";
}
else {
if($res>49) {
echo "class=\"gr\">
<small>Оценка</small><br />
".$res."%</td>";
}
else {
echo "class=\"red\">
<small>Оценка</small><br />
".$res."%</td>";
}
}
echo "</tr></table>\n";
echo "</a>\n";
}
}
?>