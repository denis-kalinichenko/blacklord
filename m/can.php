<?php

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

$id = $_GET['id'];

$result = mysql_query("SELECT info,res FROM can WHERE id = '$id'");
if (!$result) {
    echo 'Ошибка запроса';
    exit;
}
$row = mysql_fetch_row($result);

$text = $row[0];
$res = $row[1];
if($res=="") {
  header("Location:/404.php");
}
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Инфасотка / Можно <?php echo $text; ?>?</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link type="text/css" rel="stylesheet" href="/css/mobile.css" />
 </head>
 <body>

<center><img src="http://infa.t15.org/img/black_1.jpg" class="photo"/>
<br><br />Можно <?php echo $text; ?>?<br />
<b><?php include 'can_res.php'; ?></b><br /><br />
</center>
 <div id="bottom">
<a href="/c.php">Задать</a> <a href="http://infa.t15.org/c/<?php echo $id; ?>">Полная</a> <a href="/feed.php">Последнее</a></div>
 </body>
</html>