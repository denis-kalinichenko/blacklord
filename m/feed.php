<?php

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

if(isset($_GET['p'])) {
  $page = $_GET['p'];
  if($page==1) {
    $p = "0,30";
    $page_button = 1;
  }
  else {
    if($page==2) {
    $p = "31,61";
    $page_button = 2;
  }
  else {
    header("Location:/feed");
  }
  }
}
else {
  $p = "0,30";
  $page_button = 1;
}
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Инфасотка / Последнее</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link type="text/css" rel="stylesheet" href="/css/feed.css" />
   <link type="text/css" rel="stylesheet" href="/css/mobile.css" />
 </head>
 <body>

 <div class="title"><b>Последняя инфа</b></div>
 <?php
if($page_button==2) {
  echo "<center><a href=\"/feed?p=1\"><b>«</b> Вернуться к последним</a></center>";
}
?>
 <table border="0" class="main">
 <?php

$r=mysql_query ("SELECT * FROM infos ORDER BY id DESC LIMIT ".$p."");
while ($row=mysql_fetch_array($r)) // для каждой записи организуем вывод.
{
		?>
         <tr>
         <td class="info"><a href="/i/<?php echo $row['id']; ?>" class="href"><?php echo $row['info']; ?></a></td>
         <td style="background-color:#444444;padding:5px;" align="center"><b><?php
           echo $row['res']."%"; ?></b></td></tr>
		<?php
	$c++;
}
if ($c==0)
	echo "История очищена.";
   ?>
</table>
<?php
if($page_button==1) {
  echo "<br /><center><a href=\"/feed?p=2\" class=\"button\">Загрузить ещё</a></center><br />";
}
?>
 <div id="bottom">
 <a href="/">На главную</a> <a href="http://infa.t15.org/feed">Полная версия</a>
 </div>
 </body>
</html>